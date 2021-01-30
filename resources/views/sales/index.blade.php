@extends('layouts.sb')

@section('content')

    <div class="row">
        <div class="col">
            <h2>All Sales</h2>
        </div>
        <div class="col text-right">
            <a href="{{route('sales.create')}}" class="btn btn-primary"><i class="ik ik-plus"></i></a>
        </div>
    </div>


    <div class="card-content">
        <table id="sales_table" class="table is-narrow">
            <thead>
            <tr>
                <th>SL</th>
                <th>Invoice</th>
                <th>Patient</th>
                <th>Date</th>
                <th>Doctor</th>
                <th>Broker</th>
                <th>Status</th>
                <th>Total</th>
                <th>Due</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{++$i}}</td>
                    {{-- DNS1D::getBarcodeSVG($sale->invoice, 'C39') --}}
                    <td>{{$sale->invoice}}</td>
                    <td>{{$sale->patient->name}}</td>
                    <td>{{$sale->created_at}}</td>
                    <td>{{$sale->doctor->name}}</td>
                    <td>
                        @if ($sale->broker)
                        {{$sale->broker->name}}
                        @endif
                    </td>
                    <td>{{$sale->status}}</td>
                    <td>{{$sale->netTotal}}</td>
                    <td>{{$sale->due}}</td>
                    <td class="has-text-right text-center">
                        <a class="text-primary" href="{{route('sales.edit', $sale->id)}}"><i class="ik ik-edit-2"></i></a>
                        <a class="text-success mx-1" href="{{route('sales.show', $sale->id)}}" target="_blank"><i class="ik ik-list"></i></a>
                        <a class="text-danger" href="{{route('sales.show', $sale->id)}}" target="_blank"><i class="ik ik-trash"></i></a>
                        <form id="deleteForm{{$sale->id}}" action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>


    <script>
        $('#sales_table').DataTable();
    </script>

    <script !src="">
        function deleteform(id){
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "It will permanently deleted !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result=> {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    $("#deleteForm"+id).submit();
                }
            })
        }
    </script>
@endsection
