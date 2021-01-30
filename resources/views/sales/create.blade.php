@extends('layouts.sb')

@section('title')
Sales
@endsection


@section('content')
    {{-- <style>
        .delete_row { width: 4% }
    </style> --}}

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Sales</h5>
                        <span>All Broker who can give ....</span>
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
                            <a href="{{route('sales.index')}}">Sales</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sale Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => 'sales.store', 'method' => 'post','id' => 'sellForm']) !!}
    {{csrf_field()}}
        {{Form::label('invoice','Invoice: #') }}
        {{Form::text('invoice', $inv, ['class'=>'border-0 bg-none','required','readonly']) }}
        @error('invoice')
        <span>{{ $message }}</span>
        @enderror
    <div class="card card-accent-primary mb-3" style="background: #f9fbff">
        <div class="card-body text-dark">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <!-- Patients_id Select Field  select2_op -->
                    <div class="form-group  ">
                        <div class="form-group  ">
                            {!! Form::label('patients_id','Patient Name') !!}
                            {!! Form::select('patients_id', $patients, null, ['class' => 'select2_op form-control','id' => 'patients_id', 'required']) !!}
                            @if ($errors->has('patients_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('patients_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- dekhi --}}
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group  ">
                        {!! Form::label('doctor_id','Refred By') !!}
                        {!! Form::select('doctor_id', $doctors, null, ['class' => 'select2_op form-control','id' => 'doctor_id', 'placeholder' => 'Pick a Doctor']) !!}
                        @error('doctor_id')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group  ">
                        {{Form::label('broker_id','Broker') }}
                        {!! Form::select('broker_id', $brokers, null, ['class' => 'select2_op form-control','id' => 'broker_id', 'placeholder' => 'Who is the broker?']) !!}
                        @error('broker_id')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>




        <div class="card-accent-primary text-dark">
            <div class="card p-4" style="background: #f9fbff">
                <div class="table-responsive ">
                    <table style="width: 100%;">
                        <thead>
                            <th style="width: 2%">#</th>
                            <th style="width: 12%">Test Name</th>
                            <th style="width: 10%">Price</th>
                            <th style="width: 10%">Quantity</th>
                            <th style="width: 10%">Discount %</th>
                            <th style="width: 10%">Sampling</th>
                            <th style="width: 10%">Delivery</th>
                            <th style="width: 10%">Cost</th>
                            <th style="width: 10%">Total cost</th>
                            <th style="width: 10%">Total Price</th>
                            <th style="width: 2%">Action</th>
                        </thead>
                        <tbody id="invoiceItem">
                        <!-- invoice item will show here by ajax  -->
                        </tbody>
                    </table>
                </div>
                <div class="form-group text-right mt-3">
                    <button type="button" class="btn btn-primary" id="addNewRowBtn"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="invoice-area pt-3 card-accent-primary" style="background: #f9fbff">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-5 offset-md-2 col-lg-5 offset-lg-2 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="subtotal">Subtoal</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('subtotal', null, ['id' => 'subtotal','class' => 'form-control form-control-sm', 'placeholder' => 'Subtotal', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="total_qty">Total QTY</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('total_qty', null, ['id' => 'total_qty','class' => 'form-control form-control-sm', 'placeholder' => 'Total QTY', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="discount">Discount %</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('discount', 0, ['id' => 'discount','class' => 'form-control form-control-sm', 'placeholder' => 'Discount %', 'step' => '0.01','required' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="discount">Discount</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('discount_amount', 0, ['id' => 'discount_amount','class' => 'form-control form-control-sm', 'placeholder' => 'Discount Amount','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="discount">Vat & Tax %</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('vat', 15, ['id' => 'vat','class' => 'form-control form-control-sm', 'placeholder' => 'Vat & Tax' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="netTotal">Net Total</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('netTotal', null, ['id' => 'netTotal','class' => 'form-control form-control-sm', 'placeholder' => 'Net Total', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="paid">Paid bill</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('paid', null, ['id' => 'paid','class' => 'form-control form-control-sm', 'placeholder' => 'Paid Bill', 'step' => '0.01','required' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="oldDue">Previous Due</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('oldDue', null, ['id' => 'oldDue','class' => 'form-control form-control-sm', 'placeholder' => 'Previous Due', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="due">Due bill</label>
                                </div>
                                <div class="col-md-7">
                                    {{Form::number('due', null, ['id' => 'due','class' => 'form-control form-control-sm', 'placeholder' => 'Due bill', 'step' => '0.01','required','readonly' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="due">Total Cost</label>
                                </div>
                                <div class="col-md-7">
                                    {!! Form::number('totalCost', null,['class' => 'form-control form-control-sm','id'=>'totalCost']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-11">
                                    {{Form::text('word', null, ['id' => 'word','class' => 'form-control form-control-sm', 'placeholder' => 'In Word','required' ]) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-7 text-right">
                                    {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}

@endsection

@section('scripts')
    <script>
        //js code here..............................
        $('.select2_op').select2({
        placeholder: 'Select an option'
        });

        // sell option js
        $(document).ready(function() {
            addNewRow();
            $('#addNewRowBtn').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                addNewRow();
            });
            function addNewRow() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/addNewRow",
                    method: "POST",
                    data: {getOrderItem: 1},
                    success: function(data) {
                        $('#invoiceItem').append(data);
                        $(".select2_op").select2();
                        var n = 0;
                        $('.si_number').each(function() {
                            $(this).html(++n);
                        });
                    }
                });
            }

            $(document).on('click', '.cancelThisItem', function(event) {
                event.preventDefault();
                /* Act on the event */
                $(this).parent().parent().remove();
                invoice_calculate(0);
            });

            $(document).on('change', '.test_id', function(event) {
                event.preventDefault();
                var product_model_id = $(this).val();
                var tr = $(this).parent().parent();
                $.ajax({
                    url: '/single_sell_item',
                    method: 'POST',
                    // dataType: 'json',
                    data: {getSellSingleInfo: 1, id: product_model_id},
                    success: function(data) {

                        var price = data.price;
                        var cost = data.cost;

                        tr.find('.oqty').val(1);
                        tr.find('.price').val(price);//price
                        tr.find('.odcs').val(0);//Discount
                        tr.find('.tprice').val(tr.find('.oqty').val() * tr.find('.price').val());
                        tr.find('.cost').val(cost);//cost
                        tr.find('.tcost').val(tr.find('.oqty').val() * cost);//TCost
                        invoice_calculate(0);
                    }
                });
            });


            //calculating discount

            //calculating discount

            $(document).on('keyup', '.oqty', function(event) {
                var qty = $(this);
                var tr = $(this).parent().parent();
                if ((qty.val() - 0) > (tr.find('.qaty').val() - 0)) {
                    alert('please enter a valid quantity');
                } else {
                    tr.find('.tprice').val(tr.find('.oqty').val() * tr.find('.price').val());
                    tr.find('.tcost').val(tr.find('.oqty').val() * tr.find('.cost').val());
                    invoice_calculate(0);
                }
            });

            // calculate function
            function invoice_calculate(dis) {
                var set_sub_total = 0;
                var set_qty_total = 0;
                var set_cost_total = 0;
                var net_total = 0;
                var vat =  $('#vat').val();

                var discount = dis;


                $('.tprice').each(function() {
                    set_sub_total = set_sub_total + ($(this).val() * 1);
                });

                $('.oqty').each(function() {
                    set_qty_total = set_qty_total + ($(this).val() * 1);
                });

                $('.tcost').each(function() {
                    set_cost_total = set_cost_total + ($(this).val() * 1);
                });

                // var make_discount = (set_sub_total / 100) * discount;
                var make_discount = discount;
                var make_vat = (set_sub_total / 100) * vat;

                $('#discount_amount').val(make_discount);
                net_total = (set_sub_total - make_discount) + make_vat;
                $('#subtotal').val(set_sub_total);
                $('#netTotal').val(net_total.toFixed(2));
                $('#total_qty').val(set_qty_total.toFixed(2));
                $('#totalCost').val(set_cost_total.toFixed(2));
                // $('#due')
            }
            // discount calaulation js
            $('#discount').on('keyup', function(event) {
                event.preventDefault();
                /* Act on the event */
                var discount = $(this).val();
                invoice_calculate(discount);
            });

            // Var calaulation js
            $('#vat').on('keyup', function(event) {
                event.preventDefault();
                invoice_calculate(0);
            });

            $(document).on('keyup', '.price', function(event) {
                event.preventDefault();
                /* Act on the event */
                var tr = $(this).parent().parent();
                var new_price = $(this).val();
                var new_res = tr.find('.tprice').val(new_price);
                invoice_calculate(0);
            });

            $(document).on('keyup', '.odcs', function(event) {
                event.preventDefault();
                /* Act on the event */
                var tr = $(this).parent().parent();
                var new_price = (tr.find('.price').val() - (tr.find('.price').val() * (tr.find('.odcs').val()/100))) * tr.find('.oqty').val();
                var new_res = tr.find('.tprice').val(new_price);
                invoice_calculate(0);
            });

            $(document).on('keyup', '#discount_amount', function(event) {
                event.preventDefault();
                /* Act on the event */
                var discount_amount = $('#discount_amount').val();
                var subtotal = $('#subtotal').val();
                var p_make_dis_amount = subtotal - discount_amount;
                $('#netTotal').val(p_make_dis_amount);
            });
            // paid and due bill calaulation
            $('#paid').on('keyup', function(event) {
                event.preventDefault();
                /* Act on the event */
                var paid_bill = $(this).val();
                var due_bill = $('#netTotal').val() - paid_bill;
                $('#due').val(due_bill.toFixed(2));
            });
        });

        //js code up here..............................
    </script>
@endsection

