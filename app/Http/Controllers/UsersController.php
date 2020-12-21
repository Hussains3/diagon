<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $roles = Role::all();
        $users = User::all();
        return view('users.index',compact('users','roles','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $users = User::all();
        $permission_groups = User::getpermissionGroups();
        return view('users.create', compact('roles','users','permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        // getting images Data
        $profileImage = $request->file('profile_photo');
        $profileImageSaveAsName = time()."-profile." . $profileImage->getClientOriginalExtension();
        $upload_path = 'img/users/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        $signeture = $request->file('signeture');
        $signetureSaveAsName = time()."-profile." . $signeture->getClientOriginalExtension();
        $upload_path = 'img/signeture/';
        $signeture_url = $upload_path . $signetureSaveAsName;
        $success = $signeture->move($upload_path, $signetureSaveAsName);
        //saving on database
        $user =new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_picture = $profile_image_url;
        $user->signeture = $signeture_url;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->balance = $request->balance;
        $user->nid = $request->nid;
        $user->save();


        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been created !!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findByID($id);
        $roles = Role::all();
        $user = User::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('users.show', compact('role','roles','user','permissions','permission_groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all($id);
        $
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('users.edit', compact('permissions', 'permission_groups','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);


        if ($request->file('profile_photo')) {
            $profileImage = $request->file('profile_photo');
            $profileImageSaveAsName = time()."-profile." . $profileImage->getClientOriginalExtension();
            $upload_path = 'img/users/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }
        

        if ($request->file('signeture')) {
            $signeture = $request->file('signeture');
            $signetureSaveAsName = time()."-profile." . $signeture->getClientOriginalExtension();
            $upload_path = 'img/signeture/';
            $signeture_url = $upload_path . $signetureSaveAsName;
            $success = $signeture->move($upload_path, $signetureSaveAsName);
        }
        

        
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($profile_image_url) {
            $user->profile_picture = $profile_image_url;
        }
        if ($signeture_url) {
            $user->signeture = $signeture_url ;
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Role::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
