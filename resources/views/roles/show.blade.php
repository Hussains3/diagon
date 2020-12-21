@extends('layouts.sb')

@section('title')
Role {{$role->name}}
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        @include('layouts.messages')
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-server bg-blue"></i>
                    <div class="d-inline">
                        <h5 class="text-capitalize">{{$role->name}}</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
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
                            <a href="{{route('roles.index')}}"><i class="ik ik-arrow-left"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('roles.edit',$role->id)}}"><i class="ik ik-edit-2"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('roles.destroy',$role->id)}}"><i class="ik ik-trash-2"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3 class="text-capitalize">Permissions</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body todo-task">
                    <div class="dd" data-plugin="nestable">
                        <ol class="dd-list">
                            <div class="row">
                            @foreach ($permissions as $permission)
                                @if ($role->hasPermissionTo($permission->name))
                                <div class="col-3">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            <h6 class="text-capitalize">{{ $permission->name }}</h6>
                                        </div>
                                    </li>
                                </div>
                                @endif
                            @endforeach
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 


@section('scripts')
     @include('roles.script')
@endsection