<tr class="mt-2">
    <td>
        <b class="si_number">1</b>
    </td>
    <td>
        {{Form::select('test_id[]', $tests, null, ['class' => 'select2_op form-control-sm test_id', 'placeholder' => 'Pick a test...', 'required']) }}
    </td>
    <td>
        {{Form::number('price[]', null, ['class' => 'form-control form-control-sm price', 'placeholder' => 'Price', 'step' => '1','required' ]) }}
    </td>
    <td>
        {{Form::number('orderQuantity[]', null, ['class' => 'form-control form-control-sm oqty', 'placeholder' => 'Order Qty', 'step' => '1','required' ]) }}
    </td>
    <td>
        {{Form::number('testDiscount[]', null, ['class' => 'form-control form-control-sm odcs', 'placeholder' => 'Discount', 'step' => '1','required' ]) }}
    </td>
    <td>
        {{Form::date('sample_date[]', \Carbon\Carbon::now(), ['class' => 'form-control form-control-sm odcs', 'placeholder' => 'Sampling Date', 'step' => '1','required' ]) }}
    </td>
    <td>
        {{Form::date('deli_date[]', \Carbon\Carbon::now(), ['class' => 'form-control form-control-sm odcs', 'placeholder' => 'Delivery Date', 'step' => '1','required' ]) }}
    </td>
    <td>
        {{Form::number('cost[]', null, ['class' => 'form-control form-control-sm cost', 'placeholder' => 'Cost', 'step' => '0.01','required','readonly' ]) }}
    </td>
    <td>
        {{Form::number('totalCost[]', null, ['class' => 'form-control form-control-sm tcost', 'placeholder' => 'Total Cost', 'step' => '0.01','required','readonly' ]) }}
    </td>
    <td>
        {{Form::number('totalPrice[]', null, ['class' => 'form-control form-control-sm tprice', 'placeholder' => 'Total Price', 'step' => '0.01','required','readonly' ]) }}
    </td>
    <td style="text-align: right">
        <button type="button" class="btn btn-danger cancelThisItem" id="cancelThisItem"><i class="fas fa-times"></i></button>
    </td>
</tr>



<div class="col-lg-2 col-sm-12">
    <!-- Date Input Form -->
    <div class="form-group">
        {{Form::date('sample_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-2 col-sm-12">
    <!-- Date Input Form -->
    <div class="form-group">
        {{Form::date('deli_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
    </div>
</div>
