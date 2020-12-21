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
                        <h5>Doctor Create</h5>
                        <span>Assigning Permission to New Doctor.</span>
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
                            <a href="{{route('doctors.index')}}">Doctor</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Doctor Create</li>
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
                    {!! Form::open(['route' => 'doctors.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('name', 'Doctor Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Name']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('degree', 'Email Address') !!}
                                {!! Form::text('degree', null, ['class'=>'form-control','id'=>'degree','placeholder'=>'MBBS']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                                {!! Form::label('designation', 'Designation') !!}
                                {!! Form::text('designation', null, ['class'=>'form-control','id'=>'designation','placeholder'=>'Assistent Professor']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('phone', 'Phone Number') !!}
                                {!! Form::text('phone', null, ['class'=>'form-control','id'=>'phone','placeholder'=>'012345678910']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('comission', 'Comission') !!}
                                {!! Form::number('comission', null, ['class'=>'form-control','id'=>'comission','placeholder'=>'30%']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('balance', 'Balance') !!}
                                {!! Form::number('balance', 0, ['class'=>'form-control','id'=>'balance']) !!}
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
     @include('doctors.script')
@endsection