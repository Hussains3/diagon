
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
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Apps mode</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'options.store', 'method' => 'post','class'=>'forms-sample',]) !!}
                        {{csrf_field()}}
                        <div class="row">
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-30">
                                    <h4 class="sub-title">Select Apps Mode</h4>
                                    <div class="form-radio">
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="app_mode" value="1" checked="checked">
                                                    <i class="helper"></i>Normal Mode
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="app_mode" value="2">
                                                    <i class="helper"></i>S Mode
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="app_mode" value="3">
                                                    <i class="helper"></i>D Mode
                                                </label>
                                            </div>
                                            
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-30">
                                    <h4 class="sub-title">S Mode</h4>
                                    <p class="">Current Balance:<span>0</span></p>
                                    <div class="form-group">
                                        {!! Form::label('s_mode_thld', 'Threshold') !!}
                                        {!! Form::number('s_mode_thld', 25000, ['class'=>'form-control','id'=>'s_mode_thld']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-30">
                                    <h4 class="sub-title">D Mode</h4>
                                    <p class="">Current Balance:<span>0</span></p>
                                    <div class="form-group">
                                        {!! Form::label('d_mode_thld', 'Threshold') !!}
                                        {!! Form::number('d_mode_thld', 25000, ['class'=>'form-control','id'=>'d_mode_thld']) !!}
                                    </div>
                                </div>
                        </div>
                    
                        
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


threshold