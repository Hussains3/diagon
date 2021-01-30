@extends('layouts.sb')

@section('content')
    <div class="card-content">
        <table id="sales_table" class="table is-narrow">
            <thead>
            <tr>
                <th>No</th>
                <th>Patient Name</th>
                <th>Test Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Result</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($saleItems as $item)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$item->patient->name}}</td>
                    <td>{{$item->test->name}}</th>
                    <td>{{$item->patient->age}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->result}}</td>
                    <td class="has-text-right text-center d-flex">
                        @if ($item->status != 'Delivered')
                            <a class="btn btn-success mr-2" href="{{route('saleItems.show', $item->id)}}" target="_blank">Make Report</a>
                        @endif

                        <a class="btn-sm btn-info" href="{{route('saleItems.edit', $item->id)}}"><i class="ik ik-edit-2"></i></a>

                        <form id="deleteForm{{$item->id}}" action="{{ route('sales.destroy',$item->id) }}" method="POST">
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
