
@extends('layouts.sb')
@section('title')
Settings
@endsection


@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>General Settings</h5>
                        <span>Current App is in {{$appmodes[$goption->appMode]}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Advance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['goptions.update', $goption->id], 'method' => 'PATCH','class'=>'forms-sample',]) !!}
                        {{csrf_field()}}
                            <div class="mb-5">
                                <h4 class="sub-title">Change Apps Mode</h4>
                                <div class="form-group">
                                    {!! Form::select('appMode', $appmodes, null, ['class'=>'form-control','id'=>'appMode']) !!}
                                </div>
                            </div>
                        {!! Form::submit('Save', ['class'=>'btn btn-primary mr-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


threshold
