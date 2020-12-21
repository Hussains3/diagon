@extends('layouts.sb')
@section('title')
Roles
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>User Roles</h5>
                        <span>Designation and work permission role of user.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('roles.create')}}" class="btn btn-success text-light"><i class="ik ik-plus"></i> Add</a>
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
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td class="text-capitalize">{{$role->name}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('roles.show',$role->id)}}"><i class="ik ik-eye"></i></a>
                                        <a href="{{route('roles.edit',$role->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('roles.destroy', $role->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
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