<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="{{url('/vendors/css/marketing/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/vendors/css/marketing/css/style.css')}}" rel="stylesheet">


    <title>GSTraftoll Payment Invoice</title>
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

        <input type="button" id="generate_pdf" style="margin:10px 100px;" class="btn btn-outline-secondary btn-block
        mb-75
        waves-effect"
               value="Generate PDF">

    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    {{--<script src="{{asset('/vendors/js/marketing/js/bootstrap.bundle.min.js')}}"></script>--}}


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    $(document).ready(function () {
        var form = $('.paymet_main'),
            cache_width = form.width(),
            a4 = [595.28, 841.89]; // for a4 size paper width and height
            a5 = [420.28, 595.89]; // for a4 size paper width and height
             a6 = [298.28, 420.89]; // for a4 size paper width and height
            a7 = [210.28, 105.89]; // for a4 size paper width and height

        $('#generate_pdf').on('click', function () {
            $('body').scrollTop(0);
            generatePDF();
        });

        function generatePDF() {
            getCanvas().then(function (canvas) {
                var img = canvas.toDataURL("image/png"),
                    doc = new jsPDF({
                        unit: 'px',
                        format: 'a5'
                    });
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save('{{$inv->id}}.pdf');
                form.width(cache_width);
            });
        }

        function getCanvas() {
            form.width((a5[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: false
            });
        }
    });
</script>
</html>

