@extends('layouts.sb')
@section('title')
Test Categories
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Test Categories</h5>
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
                        <li class="breadcrumb-item">
                            <a href="{{route('testcategories.index')}}">Test Category</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testcategories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td class="text-capitalize">{{$category->name}}</td>
                                
                                <td>
                                    <div class="table-actions">
                                        {{-- <a href="{{route('testcategories.show',$category->id)}}"><i class="ik ik-eye"></i></a> --}}
                                        <a href="{{route('testcategories.show',$category->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('testcategories.destroy', $category->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $category->id }}" action="{{ route('testcategories.destroy', $category->id) }}" method="POST" style="display: none;">
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @include('layouts.messages')
                    {!! Form::open(['route' => 'testcategories.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-12">
                                {!! Form::label('name', 'Category Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'category name']) !!}
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