@extends('layouts.sb')
@section('title')
{{ config('app.name', 'Laravel') }} | Test 
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Test</h5>
                        <span>All Test.</span>
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
                            <a href="{{route('tests.index')}}">Test</a>
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
                                <th>Category</th>
                                <th>Price</th>
                                <th>Min Price</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tests as $test)

                            <tr>
                                <td>{{$test->id}}</td>
                                <td class="text-capitalize">{{$test->name}}</td>
                                <td class="text-capitalize">{{$test->category}}</td>
                                <td class="text-capitalize">{{$test->price}}</td>
                                <td class="text-capitalize">{{$test->min_price}}</td>
                                
                                <td>
                                    <div class="table-actions">
                                        {{-- <a href="{{route('testcategories.show',$category->id)}}"><i class="ik ik-eye"></i></a> --}}
                                        <a href="{{route('tests.show',$test->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('tests.destroy', $test->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $test->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $test->id }}" action="{{ route('tests.destroy', $test->id) }}" method="POST" style="display: none;">
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
                    {!! Form::open(['route' => 'tests.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('name', 'Test Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'category name']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('category', 'Category Name') !!}
                                <select name="category" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::text('price', null, ['class'=>'form-control','id'=>'price','placeholder'=>'000']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('min_price', 'Minimum Price') !!}
                                {!! Form::number('min_price', null, ['class'=>'form-control','id'=>'min_price','placeholder'=>'000']) !!}
                            </div>
                        </div>
                        
                        {!! Form::submit('Create', ['class'=>'btn btn-primary mr-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection