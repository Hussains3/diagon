@extends('layouts.sb')

@section('title')
Create User - Admin Panel
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>User Create</h5>
                        <span>Assigning Permission to New User.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('users.index')}}">User</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('layouts.messages')
                    {!! Form::open(['route' => 'users.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('name', 'User Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'exampleInputUsername1','placeholder'=>'Username']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('email', 'Email Address') !!}
                                {!! Form::email('email', null, ['class'=>'form-control','id'=>'email','placeholder'=>'abc@mail.com']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::text('address', null, ['class'=>'form-control','id'=>'address','placeholder'=>'Khulna,Bangladesh']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('phone', 'Phone Number') !!}
                                {!! Form::text('phone', null, ['class'=>'form-control','id'=>'phone','placeholder'=>'012345678910']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('dob', 'Date Of Birth') !!}
                                {!! Form::date('dob', null, ['class'=>'form-control','id'=>'dob']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('nid', 'NID Number') !!}
                                {!! Form::text('nid', null, ['class'=>'form-control','id'=>'nid','placeholder'=>'19921565498465']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('balance', 'balance') !!}
                                {!! Form::number('balance', 0, ['class'=>'form-control','id'=>'balance']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('profile_picture', 'Photo') !!}
                                {!! Form::file('profile_picture', ['class'=>'form-control','id'=>'profile_picture']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('signeture', 'Signeture') !!}
                                {!! Form::file('signeture', ['class'=>'form-control','id'=>'signeture']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('roles', 'Roles') !!}
                                <select name="roles" id="roles" class="form-control select2" multiple="multiple">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class'=>'form-control','id'=>'password','placeholder'=>'Password']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control','id'=>'password_confirmation','placeholder'=>'Password']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Create', ['class'=>'btn btn-primary mr-2']) !!}
                        <button class="btn btn-light">Cancel</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('scripts')
     @include('users.script')
@endsection