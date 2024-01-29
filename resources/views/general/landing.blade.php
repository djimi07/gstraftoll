@extends('layouts/marketing/marketing')

@section('content')
    <section class="banner_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="banner_cont">
                        <h1> Traffic Tolling Service </h1>
                        <p><b>GSTRAFTOLL</b> is a traffic tolling service built for  state governments for the
                            generation of hackney permit and traffic related government revenue bills,
                            payment collection and reporting. </p>

                        <p><b>GSTRAFTOLL</b> combines the use of state-of-the-art mobile/fixed ANPR cameras and a robust
                            backoffice software platform to provide efficiency and increase in transport sector
                            revenue for government.
                        </p>
                        <a class="gs_btn" href="{{route('landing.invoices')}}">Generate Invoice <img src="{{ asset(mix
                    ('images/marketing/images/arrow-right.svg'))}}"></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="banner_img">
                        <img src="{{ asset(mix('images/marketing/images/banner-img.png'))}}">
                        <div class="check_box">
                            <img src="{{ asset(mix('images/marketing/images/check-iocn.svg'))}}">
                            <p id="check_box"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how_it_work" id="about">
        <div class="container">
            <div class="hoe_main">
                <h2>How it works</h2>
                <p>Generate your invoice in 3 simple steps.</p>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="how_step">
                            <img src="{{ asset(mix
                    ('images/marketing/images/image 6.png'))}}" class="back_img">
                            <img src="{{ asset(mix
                    ('images/marketing/images/image 2.png'))}}">
                            <h4>Fill Form</h4>
                            <p>The first step in generating an invoice using GSTraftoll is to fill out the necessary information on the online form. This information includes the customer's name, contact information, and the details of the product or service provided. Once you have filled out all the required information, you can proceed to the next step. </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="how_step">
                            <img src="{{ asset(mix
                    ('images/marketing/images/image 7.png'))}}" class="back_img">
                            <img src="{{ asset(mix
                    ('images/marketing/images/image 3.png'))}}">
                            <h4>Select Payment type</h4>
                            <p>After filling out the required information, you will need to select the payment type that you prefer. GSTraftoll accepts a range of payment methods including credit card, bank transfer, and online payment gateways. Once you have selected your preferred payment type, you can proceed to the next step. </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="how_step">
                            <img src="{{ asset(mix
                    ('images/marketing/images/image 4.png'))}}">
                            <h4>Successful</h4>
                            <p>After completing the first two steps, you will receive a notification that your invoice has been generated successfully. You can then proceed to make the payment using the selected payment method. Once the payment has been made, you will receive a confirmation of payment and the invoice will be marked as paid</p>
                        </div>
                    </div>
                </div>
                <a class="gs_btn" href="{{route('landing.invoices')}}
                ">Generate Invoice <img src="{{ asset(mix
                    ('images/marketing/images/arrow-right.svg'))}}"></a>
            </div>
        </div>
    </section>
    <section class="learn_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="{{ asset(mix
                    ('images/marketing/images/banner-img.png'))}}">
                </div>
                <div class="col-sm-7">
                    <h2>Welcome to GSTraftoll</h2>
                    <p>

                        Welcome to GSTraftoll, the cloud-based tolling platform that simplifies state transport agency services and makes compliance and invoicing a breeze!
                       
                    </p>
                    <a href="#" class="gs_btn">Learn more</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page-script')

    <script>
        $(function () {
            @if(Session::has('success'))
            var txt = "{{Session::get('success')}}";
            console.log(txt);
            $("#check_box").text(txt);

            setTimeout(function () {
                $(".check_box").fadeOut(1200);
            }, 1000)
        @endif
        });
    </script>
@endsection
