@extends('layouts.sb')
@section('title')
Broker
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col">
                <div class="page-header-title">
                    <a href="{{route('brokers.create')}}"><i class="ik ik-plus bg-blue"></i></a>
                    <div class="d-inline">
                        <h5>Broker</h5>
                        <span>All Broker who can give ....</span>
                    </div>
                </div>
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
                            @foreach ($brokers as $broker)
                            <tr>
                                <td>{{$broker->id}}</td>
                                <td class="text-capitalize">{{$broker->name}}</td>
                                <td class="text-capitalize">{{$broker->phone}}</td>
                                <td class="text-capitalize">{{$broker->balance}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a class="text-primary" href="{{route('brokers.edit',$broker->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="text-success" href="{{route('brokers.show',$broker->id)}}"><i class="ik ik-eye"></i></a>
                                        <a class="text-danger" href="{{ route('brokers.destroy', $broker->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $broker->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $broker->id }}" action="{{ route('brokers.destroy', $broker->id) }}" method="POST" style="display: none;">
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
