@extends('layouts.sb')
@section('title')
Measurement Units
@endsection


@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Sirial</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                            <tr>
                                <td>{{++$i}}</td>
                                <td class="text-capitalize">{{$unit->name}}</td>
                                <td class="text-capitalize">
                                        <span
                                        @if ($unit->status != 'active')
                                        class="badge badge-danger"
                                        @else
                                        class="badge badge-success"
                                        @endif>{{$unit->status}}
                                    </span></td>

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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @include('layouts.messages')
                    {!! Form::open(['route' => 'units.store', 'method' => 'post','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-12">
                                {!! Form::label('name', 'Unit Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'unit name']) !!}
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
