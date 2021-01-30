@extends('layouts.sb')
@section('title')
App Modes
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>App modes</h5>
                        <span>All Test Categories who can give treatment.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/"><i class="ik ik-home"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Threshold</th>
                                <th>Rate</th>
                                <th>Current Ammount</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appmodes as $appmode)
                            <tr>
                                <td>{{$appmode->id}}</td>
                                <td class="text-capitalize">{{$appmode->name}}</td>
                                <td class="text-capitalize">{{$appmode->threshold}}</td>
                                <td class="text-capitalize">{{$appmode->rate}}</td>
                                <td class="text-capitalize">{{$appmode->currentAmmount}}</td>

                                <td>
                                    <div class="table-actions">
                                        {{-- <a href="{{route('testcategories.show',$appmode->id)}}"><i class="ik ik-eye"></i></a> --}}
                                        <a href="{{route('appmodes.show',$appmode->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('appmodes.destroy', $appmode->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $appmode->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $appmode->id }}" action="{{ route('appmodes.destroy', $appmode->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @include('layouts.messages')
                    {!! Form::open(['route' => 'appmodes.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-12">
                                {!! Form::label('name', 'New Mode') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Mode name']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                {!! Form::number('threshold', null, ['class'=>'form-control','id'=>'threshold','placeholder'=>'Threshold']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                {!! Form::number('rate', null, ['class'=>'form-control','id'=>'rate','placeholder'=>'Rate']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                {!! Form::number('currentAmmount', null, ['class'=>'form-control','id'=>'currentAmmount','placeholder'=>'Current Ammount']) !!}
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
