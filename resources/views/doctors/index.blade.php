@extends('layouts.sb')
@section('title')
Doctor
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctor</h5>
                        <span>All doctor who can give treatment.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('doctors.create')}}" class="btn btn-success text-light"><i class="ik ik-plus"></i> Add</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table">
                        @include('layouts.messages')
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Balance</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->id}}</td>
                                <td class="text-capitalize">{{$doctor->name}}</td>
                                <td class="text-capitalize">{{$doctor->phone}}</td>
                                <td class="text-capitalize">{{$doctor->balance}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('doctors.show',$doctor->id)}}"><i class="ik ik-eye"></i></a>
                                        <a href="{{route('doctors.show',$doctor->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('doctors.destroy', $doctor->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $doctor->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $doctor->id }}" action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display: none;">
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
    </div>
</div>
@endsection