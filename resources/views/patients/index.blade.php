@extends('layouts.sb')
@section('title')
Patient
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col">
                <div class="page-header-title">
                    <a href="{{route('patients.create')}}"><i class="ik ik-plus bg-blue"></i></a>
                    <div class="d-inline">
                        <h5>Patient</h5>
                        <span>All patient who can use this application.</span>
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
                                <th>Due</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{$patient->id}}</td>
                                <td class="text-capitalize">{{$patient->name}}</td>
                                <td class="text-capitalize">{{$patient->phone}}</td>
                                <td class="text-capitalize">{{$patient->due}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('patients.show',$patient->id)}}"><i class="ik ik-eye"></i></a>
                                        <a href="{{route('patients.show',$patient->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="" href="{{ route('patients.destroy', $patient->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $patient->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $patient->id }}" action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display: none;">
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
