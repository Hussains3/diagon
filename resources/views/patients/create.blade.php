@extends('layouts.sb')

@section('title')
Create Patient
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Patient Create</h5>
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
                            <a href="{{route('patients.index')}}">Patient</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Patient Create</li>
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
                    {!! Form::open(['route' => 'patients.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-8 col-sm-12">
                                {!! Form::label('name', 'Patient Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'exampleInputUsername1','placeholder'=>'name','required']) !!}
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                {!! Form::label('age', 'Age') !!}
                                {!! Form::number('age', null, ['class'=>'form-control','id'=>'age','placeholder'=>'18']) !!}
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
                                {!! Form::label('email', 'Email Address') !!}
                                {!! Form::email('email', null, ['class'=>'form-control','id'=>'email']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('due', 'Due') !!}
                                {!! Form::number('due', 0, ['class'=>'form-control','id'=>'due','placeholder'=>'0']) !!}
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