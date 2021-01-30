@extends('layouts.sb')
@section('title')
Parameters
@endsection


@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col">
                <div class="page-header-title">
                    <a href="{{route('parameters.create')}}"><i class="ik ik-plus bg-blue"></i></a>
                    <div class="d-inline">
                        <h5>Parameters</h5>
                        <span>All patient who can use this application.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Test</th>
                                <th>Normal Range</th>
                                <th>Unit</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parameters as $unit)
                            <tr>
                                <td>{{++$i}}</td>
                                <td class="text-capitalize">{{$unit->name}}</td>
                                <td class="text-capitalize">{{$unit->test->name}}</td>
                                <td class="text-capitalize">{{$unit->normal_range}}</td>
                                <td class="text-capitalize">{{$unit->unit->name}}</td>
                                <td>
                                    <div class="table-actions">
                                        <a class="text-primary" href="{{route('units.show',$unit->id)}}"><i class="ik ik-edit-2"></i></a>
                                        <a class="text-danger" href="{{ route('units.destroy', $unit->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $unit->id }}').submit();">
                                        <i class="ik ik-trash-2"></i>
                                        </a>

                                        <form id="delete-form-{{ $unit->id }}" action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display: none;">
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
