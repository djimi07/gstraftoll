@extends('layouts.app')


@section('title', 'Invoice Preview')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">

            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper">
                                    <svg
                                        viewBox="0 0 139 95"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        height="24"
                                    >
                                        <defs>
                                            <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%"
                                                            x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </linearGradient>
                                            <linearGradient
                                                id="invoice-linearGradient-2"
                                                x1="64.0437835%"
                                                y1="46.3276743%"
                                                x2="37.373316%"
                                                y2="100%"
                                            >
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-400.000000, -178.000000)">
                                                <g transform="translate(400.000000, 178.000000)">
                                                    <path
                                                        class="text-primary"
                                                        d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                        style="fill: currentColor"
                                                    ></path>
                                                    <path
                                                        d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                        fill="url(#invoice-linearGradient-1)"
                                                        opacity="0.2"
                                                    ></path>
                                                    <polygon
                                                        fill="#000000"
                                                        opacity="0.049999997"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"
                                                    ></polygon>
                                                    <polygon
                                                        fill="#000000"
                                                        opacity="0.099999994"
                                                        points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"
                                                    ></polygon>
                                                    <polygon
                                                        fill="url(#invoice-linearGradient-2)"
                                                        opacity="0.099999994"
                                                        points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"
                                                    ></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h3 class="text-primary invoice-logo">GsTraftoll</h3>
                                </div>
                                <p class="card-text mb-25">Anambra Internal Revenue Service HQ</p>
                                <p class="card-text mb-25">Anambra</p>
                                <p class="card-text mb-0">+234 (803) 456 7891</p>
                            </div>
                            <div class="mt-md-0 mt-2">
                                <h4 class="invoice-title">
                                    Pay Code :
                                    <span class="invoice-number"> #{{$invoice->referenceNumber}}</span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Date Issued:</p>
                                    <p class="invoice-date">{{\Carbon\Carbon::parse($invoice->createdAt)->format('d/m/Y')}}</p>
                                </div>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Validity:</p>
                                    <p class="invoice-date">
                                        {{\Carbon\Carbon::parse($invoice->dateFrom)->format('d/m/Y')}} -
                                        {{\Carbon\Carbon::parse($invoice->dateTo)->format('d/m/Y')}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if($invoice->isPaid)
                            <div class="  col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                <img src="{{asset('images/paid.png')}}" style="transform: rotate(-45deg);"
                                     width="100" height="100"
                                     class="watermark" />
                            </div>
                        @endif
                        <!-- Header ends -->
                    </div>


                    <hr class="invoice-spacing"/>

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                                <h6 class="mb-2">Invoice To:</h6>
                                <h6 class="mb-25">{{$invoice->name}}</h6>
                                <p class="card-text mb-25">{{$invoice->invoicePayload->contactAddress}}</p>

                                <p class="card-text mb-25">{{$invoice->invoicePayload->phone}}</p>
                                <p class="card-text mb-0">{{$invoice->invoicePayload->email}}</p>
                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                <h6 class="mb-2">Payment Details:</h6>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="pr-1">Total Due:</td>
                                        <td> &#x20A6;<span
                                                class="font-weight-bold">{{number_format($invoice->amount/100,2)}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-1"> Pay Channel:</td>
                                        <td>{{ucfirst(strtolower($invoice->paymentChannel))}}</td>
                                    </tr>

                                    @if ($invoice->paymentChannel == "BANK_TRANSFER" &&
                                    $invoice->paymentChannelAccount->processor ==
                                    "MONNIFY")
                                        <tr>
                                            <td class="pr-1">Bank Account Name:</td>
                                            <td>{{$invoice->paymentChannelAccount->responseBody->accountName}}</td>
                                        </tr>

                                        <tr>
                                            <td class="pr-1">Bank Name:</td>
                                            <td>{{$invoice->paymentChannelAccount->responseBody->bankName}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pr-1">Bank Account:</td>
                                            <td>{{$invoice->paymentChannelAccount->responseBody->accountNumber }}</td>
                                        </tr>


                                    @elseif ($invoice->paymentChannel == "BANK_TRANSFER" &&
                                    $invoice->paymentChannelAccount->processor == "KORAPAY")
                                        <tr>
                                            <td class="pr-1">Bank Account Name:</td>
                                            <td>{{$invoice->paymentChannelAccount->data->account_name}}</td>
                                        </tr>

                                        <tr>
                                            <td class="pr-1">Bank Name:</td>
                                            <td>{{$invoice->paymentChannelAccount->data->bank_name == "test"?
                                            "WEMA" :strtoupper
                                            ($invoice->paymentChannelAccount->data->bank_name)}}
                                                BANK</td>
                                        </tr>
                                        <tr>
                                            <td class="pr-1">Bank Account:</td>
                                            <td>{{$invoice->paymentChannelAccount->data->account_number }}</td>
                                        </tr>
                                    @endif;
                                    <tr>
                                        <td class="pr-1">Country:</td>
                                        <td>Nigeria</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Address and Contact ends -->

                    <!-- Invoice Description starts -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="py-1">Revenue Item</th>
                                <th class="py-1">Rate</th>

                                <th class="py-1">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="py-1">
                                    <p class="card-text font-weight-bold mb-25">{{$invoice->revenueItem->categoryLabel}}</p>
                                    <p class="card-text text-nowrap">
                                        {{$invoice->revenueItem->description}}
                                    </p>
                                </td>
                                <td class="py-1">
                                    <span
                                        class="font-weight-bold"> &#x20A6;{{number_format($invoice->revenueItem->amount/100,2)}}</span>
                                </td>

                                <td class="py-1">
                                    <span
                                        class="font-weight-bold">&#x20A6;{{number_format($invoice->amount/100,2)}}</span>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-sales-total-wrapper">


                        </div>
                    </div>
                    <!-- Invoice Description ends -->

                    <hr class="invoice-spacing"/>

                    <!-- Invoice Note starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row">
                            <div class="col-12">
                                <span class="font-weight-bold">Note:</span>
                                <span>This invoice was generated for and by the Internal Revenue Service. Thank
                                    You!</span>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Note ends -->
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <div class="card-body">

                        <button class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Download</button>
                        <a class="btn btn-outline-secondary btn-block mb-75" href="{{route('invoices.print',
                        $invoice->id)}}" target="_blank">Print</a>
                        <a href="{{route('invoices.list')}}" class="btn btn-outline-secondary btn-block mb-75"
                           data-dismiss="modal">Back to invoices</a>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </section>

@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('js/scripts/watermark.jquery.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/preview-invoice.js')}}"></script>
@endsection


@section('page-script')
<script>
    /*
    "className": the class of the elements which should get an mark. (Optionally) Default: "watermark"
"position": "top-left"|"top-right"|"bottom-right"|"bottom-left". (Optionally) Default: "bottom-right"
"watermark": an img element which represents your watermark. (Optionally)
"path": the path to your watermark image. (Optionally)
"opacity": opacity percentage, no "%" only the number [0-100] (Optionally) Default: 50

     */
    $(function (){

    $(document).watermark({className:"watermark",position:"bottom-right",path:"/images/paid.png"});
    })

</script>
@endsection
