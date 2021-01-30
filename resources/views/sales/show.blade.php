@extends('layouts.sb')

@section('content')
<style>
    p{
        margin: 0 !important;
        padding: 0 !important;
    }
</style>
    <div id="invoice">
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button onclick="printDiv()" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            </div>
            <hr>
        </div>
        <div id="printDiv" class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header class="logoh">
                    <div class="row d-none">
                        <div class="col-3">
                            <img src="https://picsum.photos/50/50" alt="" srcset="">
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                               Diagon Diagonostic Center
                            </h2>
                            <div class="d-flex">
                                <p class="mx-2">Khulna, Bangladesh</p>
                                <p>|</p>
                                <p class="mx-2">01700000000</p>
                                <p>|</p>
                                <p class="mx-2">abc@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="p-2">
                    <div class="row">
                        <div class="col-sm-12 invoice-to">
                            <div class="text-gray-light text-center"><h2 class="border border-primary">Total Bill/Receipt</h2></div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 invoice-details">
                            <p class="invoice-id">
                                @php
                                echo DNS1D::getBarcodeSVG($sale->invoice, 'C39');
                                @endphp
                            </p>
                            <p class="">Name: {{$patient->name}}</p>
                            <p class="">Consultent: {{$doctor[0]->name}}</p>
                            <p class="date">Date of Invoice: {{$sale->created_at->format('d-m-Y')}}</p>
                        </div>
                        <div class="col-md-6 invoice-details">
                            <p class="invoice-id">&nbsp;</p>
                            <p class="to">Age: {{$patient->age}}</p>
                            <p class="address">{{$patient->address}}</p>
                            <p class="date">Printing Date: {{Carbon\Carbon::now()->format('d-m-y')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="w-5">#</th>
                                        <th class="w-15  text-left">Test NAME</th>
                                        <th class="w-10"></th>
                                        <th class="w-10"></th>
                                        <th class="w-10"></th>
                                        <th class="w-10"></th>
                                        <th class="w-10"></th>
                                        <th class="w-10"></th>
                                        <th class="w-10"></th>
                                        <th class="w-10 text-right">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sale->sale_items as $sale_item)
                                        <tr>
                                            <td class="">{{++$i}}</td>
                                            <td class="text-left">{{$tests[$sale_item->test_id - 1]->name}}</td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class="text-right">{{$sale_item->price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>SUBTOTAL</td>
                                        <td class="text-right">{{$sale->subtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>Total QTY</td>
                                        <td class="text-right">{{$sale->total_qty}}</td>
                                    </tr>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>TAX {{$sale->vat}} %</td>
                                        <td class="text-right">{{($sale->subtotal / 100)*$sale->vat}}</td>
                                    </tr>

                                    <tr class="">
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>DISCOUNT {{$sale->discount}} %</td>
                                        <td class="text-right"><span class=" text-danger">(-{{($sale->subtotal / 100)*$sale->discount}})</span></td>
                                    </tr>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>GRAND TOTAL</td>
                                        <td class="text-right">{{$sale->netTotal}}</td>
                                    </tr>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>PAID</td>
                                        <td class="text-right">{{$sale->paid}}</td>
                                    </tr>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>DUE</td>
                                        <td class="text-right">{{$sale->due}}</td>
                                    </tr>

                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td>Total Due</td>
                                        <td class="text-right">{{$total_due}}</td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                    <div class="text-right">
                        <p>
                            {{$sale->word}}
                        </p>
                    </div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">Sale Product will not be returned.</div>
                    </div>
                </main>
            </div>
            <div></div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script !src="">

        function printDiv() {
            Popup($('#printDiv').outerHTML);
            function Popup(data)
            {
                // $('#printDiv').print();
                window.print();
                return true;
            }
        }
    </script>
    @endsection

