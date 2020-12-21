@extends('layouts.sb')
@section('title')
Users
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Users</h5>
                        <span>All user who can use this application.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('users.create')}}" class="btn btn-success text-light"><i class="ik ik-plus"></i> Add</a>
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
                                <th>Roles</th>
                                <th>Balance</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td class="text-capitalize">{{$user->name}}</td>
                                <td class="text-capitalize">{{$user->phone}}</td>
                                <td class="text-capitalize">
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-info mr-1">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="text-capitalize">{{$user->balance}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('users.show',$user->id)}}"><i class="ik ik-eye"></i></a>
                                        <a href="{{route('users.show',$user->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('users.destroy', $user->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
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