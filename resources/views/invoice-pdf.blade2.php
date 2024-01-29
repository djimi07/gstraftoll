<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


    <title>GSTraftoll Payment Invoice</title>

    <style type="text/css">

        .paymant_sec {
            background: #fff;
            max-width: 360px;
            margin: 20px auto;
            padding: 33px 0px 48px;
        }
        .paymet_main a {
            display: block;
            text-align: center;
        }
        .paymet_main h2 {
            font-weight: 700;
            font-size: 18px;
            line-height: 24px;
            text-align: center;
            margin-top: 10px;
            text-transform: uppercase;
            margin-bottom: 26px;
        }
        .item_cont {
            display: flex;
            justify-content: space-between;
            padding: 11px 39px;
            border-top: 1px dashed #000000;
            border-bottom: 1px dashed #000000;
        }
        .item_cont p {
            margin-bottom: 0px;
            font-weight: 400 !important;
            font-size: 14px;
            line-height: 20px;
        }
        .payment_rec {
            padding: 13px  0px;
            display: flex;
            justify-content: space-between;
            margin: 0px 39px;
            border-bottom: 1px dashed #000000;
        }
        .payment_rec p {
            margin-bottom: 0px;
            font-size: 12px;
            line-height: 16px;
        }
        .payment_rec:nth-child(2) {
            border-top: none !important;
            margin-top: 10px;
        }
        .payment_rec p:nth-child(1) {
            font-weight: 500 !important;
            text-transform: uppercase;
        }
        .footer_logo_pay {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 25px;
        }
        .footer_logo_pay p {
            margin-bottom: 0px;
            font-size: 12px;
            line-height: 16px;
            margin-right: 11px;
        }
        .qr_image{
            padding: 20px 39px 0px;
        }

    </style>
</head>
<body>

<section class="paymant_sec">
    <div class="paymet_main">
        <a href="#"><img src="{{asset('images/marketing/images/payment-logo.svg')}}"></a>
        <h2>**PAYMENT Invoice**</h2>
        <div class="item_cont">
            <div class="amount_text">
                <p><b>Amount Paid</b></p>
                <p>&#x20A6;{{number_format($inv->amount/100,2)}}</p>
            </div>
            <div class="amount_text">
                <p>Revenue Item</p>
                <p>{{$inv->revenueItem->categoryLabel}}</p>
            </div>
        </div>



            <div class="payment_rec">
                <p> Description</p>
                <p> {{$inv->revenueItem->description}}</p>
            </div>


        <div class="payment_rec">
            <p>Validity:</p>
            <p>{{\Carbon\Carbon::parse($inv->dateFrom)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($inv->dateTo)
            ->format('d/m/Y')}}</p>
        </div>
        <div class="payment_rec">
            <p>Payment Code:</p>
            <p>{{$inv->referenceNumber}}</p>
        </div>
        <div class="payment_rec">
            <p>Name:</p>
            <p>{{$inv->name}}</p>
        </div>
        <div class="payment_rec">
            <p>Phone Number:</p>
            <p>{{$inv->phone}}</p>
        </div>
        <div class="payment_rec">
            <p>Vehicle Registration  Number:</p>
            <p>{{$inv->invoicePayload->vehicleRegistrationNumber}}</p>
        </div>
        <div class="payment_rec">
            <p>Payment Channel</p>
            <p>{{ucfirst(strtolower($inv->paymentChannel))}}</p>
        </div>

        @if ($inv->paymentChannel == "BANK_TRANSFER" && $inv->paymentChannelAccount->processor == "MONNIFY")
            <div class="payment_rec">
                <p class="pr-1">Bank Name:</p>
                <p>{{ucfirst(strtolower($inv->paymentChannel))}}</p>
            </div>

            <div class="payment_rec">
                <p >Bank Account Name:</p>
                <p>{{$inv->paymentChannelAccount->responseBody->accountName}}</p>
            </div>

            <div class="payment_rec">
                <p>Bank Name:</p>
                <p>{{$inv->paymentChannelAccount->responseBody->bankName}}</p>
            </div>>
            <div class="payment_rec">
                <p>Bank Account:</p>
                <p>{{$inv->paymentChannelAccount->responseBody->accountNumber }}</p>
            </div>

        @elseif ($inv->paymentChannel == "BANK_TRANSFER" && $inv->paymentChannelAccount->processor ==
                 "KORAPAY")
            <div class="payment_rec">
                <p >Bank Account Name:</p>
                <p>{{$inv->paymentChannelAccount->data->account_name}}</p>
            </div>

            <div class="payment_rec">
                <p >Bank Name:</p>
                <p>{{strtoupper($inv->paymentChannelAccount->data->bank_name)}}
                    BANK</p>
            </div>
            <div class="payment_rec">
                <p >Bank Account:</p>
                <p>{{$inv->paymentChannelAccount->data->account_number }}</p>
            </div>

        @endif

        <div class="footer_logo_pay">
            <p>Powered by:</p>
                <img src="{{asset('images/marketing/images/payment-footer.svg')}}">
        </div>
        <div class="qr_image">
            <img src="{{asset('images/marketing/images/qr_code_barcode.jpg')}}">
        </div>
    </div>
</section>

<script src="{{asset(mix('/vendors/js/marketing/js/bootstrap.bundle.min.js'))}}"></script>

</body>
</html>

