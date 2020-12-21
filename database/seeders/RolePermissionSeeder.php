<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $super_admin = Role::create(['name' => 'super_admin']);
        $admin = Role::create(['name' => 'admin']);
        $technician = Role::create(['name' => 'technician']);
        $verifier = Role::create(['name' => 'verifier']);
        $data_operator = Role::create(['name' => 'data_operator']);
        $viwer = Role::create(['name' => 'viwer']);
        //permission list as array
        $permissions =[
            [
                'group_name'=>'common',
                'permission'=>['/',
                'home',
                'welcome',
                'dashboard',],
            ],
            [
                'group_name'=>'role',
                'permission'=>['role.create',
                'role.edit',
                'role.index',
                'role.show',
                'role.delete',
                'role.approve',],
            ],
            [
                'group_name'=>'customer',
                'permission'=>['customer.create',
                'customer.edit',
                'customer.index',
                'customer.show',
                'customer.delete',
                'customer.approve',],
            ],
            [
                'group_name'=>'test',
                'permission'=>['test.create',
                'test.edit',
                'test.index',
                'test.show',
                'test.delete',
                'test.approve',],
            ],
            
            [
                'group_name'=>'test_category',
                'permission'=>['test_category.create',
                'test_category.edit',
                'test_category.index',
                'test_category.show',
                'test_category.delete',
                'test_category.approve',],
            ],
            [
                'group_name'=>'doctor',
                'permission'=>['doctor.create',
                'doctor.edit',
                'doctor.index',
                'doctor.show',
                'doctor.delete',
                'doctor.approve',],
            ],
            [
                'group_name'=>'broker',
                'permission'=>['broker.create',
                'broker.edit',
                'broker.index',
                'broker.show',
                'broker.delete',
                'broker.approve',],
            ],
            [
                'group_name'=>'g_settings',
                'permission'=>['g_settings.create',
                'g_settings.edit',
                'g_settings.index',
                'g_settings.show',
                'g_settings.delete',
                'g_settings.approve',],
            ],
            [
                'group_name'=>'sale',
                'permission'=>['sale.create',
                'sale.edit',
                'sale.index',
                'sale.show',
                'sale.delete',
                'sale.approve',],
            ],
            [
                'group_name'=>'report',
                'permission'=>['report.create',
                'report.edit',
                'report.index',
                'report.show',
                'report.delete',
                'report.approve',],
            ],
            [
                'group_name'=>'profile',
                'permission'=>['profile.edit',
                'profile.show',],
            ],
        ];
        //create and assignpermission
        for ($i=0; $i < count($permissions) ; $i++) { 

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j=0; $j < count($permissions[$i]['permission']); $j++) { 
                $permission = Permission::create([
                    'name' => $permissions[$i]['permission'][$j],
                    'group_name'=> $permissionGroup
                    ]);
                $super_admin->givePermissionTo($permission);
            }

            
        }
    }
}
