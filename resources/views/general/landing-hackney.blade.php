@extends('layouts/marketing/marketing')

@section('content')


    <section class="invoice_main">
        <div class="container">
            <h1>Generate your Invoice</h1>
            <div class="invoice_cont_main">
                <div class="invoice_left">
                    <img src="{{ asset(mix('images/marketing/images/information.svg'))}}">
                    <p>Fill in the information about the paying entity. This entity refers to either organization, persons, business or any Tax Payer. </p>
                </div>
                <div class="invoice_form">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
{{--                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">--}}
{{--                                <img src="{{ asset(mix('images/marketing/images/tax.svg'))}}" class="active_icon">--}}
{{--                                <img src="{{ asset(mix('images/marketing/images/tax-no.svg'))}}" class="none_active"> General Tax Invoice</button>--}}
{{--                            <button  class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" --}}
{{--                                     data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">--}}
{{--                                <img src="{{ asset(mix('images/marketing/images/non-tax-active.svg'))}}"--}}
{{--                                     class="active_icon">--}}
{{--                                <img src="{{ asset(mix('images/marketing/images/non-tax.svg'))}}" class="none_active">--}}
{{--                                Non-tax Invoice</button>--}}
                            <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                            aria-selected="false"><img src="{{ asset(mix('images/marketing/images/permit-active.svg')
                            )}}" class="active_icon"><img src="{{ asset(mix('images/marketing/images/permit.svg'))}}"
                                                          class="none_active"> Daily Ticketing
                                </button>
                        </div>
                    </nav>
                    <!-- <ul>
                      <li><a href="#" class="active_in"><img src="images/tax.svg"> General Tax Invoice</a></li>
                      <li><a href="#"><img src="images/non-tax.svg"> Non-tax Invoice</a></li>
                      <li><a href="#"><img src="images/permit.svg"> Hackney Permit</a></li>
                    </ul> -->
                    <div class="tab-content" id="nav-tabContent">
{{--                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">--}}
{{--                            <div class="invoice_fom">--}}
{{--                                <h4>Personal Information</h4>--}}
{{--                                <form>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">State Identity Number (SIN)</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter State Identity Number (SIN)">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Email Address</label>--}}
{{--                                            <input type="email" class="form-control" id="exampleInputemail1" placeholder="Enter Email Address">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Full Name</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Full Name">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Phone Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="07 Jun 2020">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Email Address</label>--}}
{{--                                            <select class="form-select" aria-label="Default select example">--}}
{{--                                                <option selected>Select LGA</option>--}}
{{--                                                <option value="1">One</option>--}}
{{--                                                <option value="2">Two</option>--}}
{{--                                                <option value="3">Three</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Contact Address</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Contact Address">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="vehicel_head">Vehicle Information</h4>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Vehicle Registration Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Vehicle Registration Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Chassis Number/VIN</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Chassis Number/VIN">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Engine Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Engine Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Color</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Enter Vehicle color">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Engine Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Engine Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Color</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Enter Vehicle color">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Engine Capacity</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Engine Capacity">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Vehicle Model</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Enter Vehicle Model">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="vehicel_head">Vehicle Information</h4>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Revenue Item</label>--}}
{{--                                            <select class="form-select" aria-label="Default select example">--}}
{{--                                                <option selected>Select Revenue Item</option>--}}
{{--                                                <option value="1">One</option>--}}
{{--                                                <option value="2">Two</option>--}}
{{--                                                <option value="3">Three</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Payment Method</label>--}}
{{--                                            <select class="form-select" aria-label="Default select example">--}}
{{--                                                <option selected>Select Payment Method</option>--}}
{{--                                                <option value="1">One</option>--}}
{{--                                                <option value="2">Two</option>--}}
{{--                                                <option value="3">Three</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="invoice_btn text-end">--}}
{{--                                        <button type="submit" class="btn btn-primary">Clear form</button>--}}
{{--                                        <button type="submit" class="btn btn-primary btn_with_bg">Generate Invoice</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
{{--                            <div class="invoice_fom">--}}
{{--                                <h4>Personal Information</h4>--}}
{{--                                <form>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">State Identity Number (SIN)</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter State Identity Number (SIN)">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Email Address</label>--}}
{{--                                            <input type="email" class="form-control" id="exampleInputemail1" placeholder="Enter Email Address">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Full Name</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Full Name">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Phone Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="07 Jun 2020">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Email Address</label>--}}
{{--                                            <select class="form-select" aria-label="Default select example">--}}
{{--                                                <option selected>Select LGA</option>--}}
{{--                                                <option value="1">One</option>--}}
{{--                                                <option value="2">Two</option>--}}
{{--                                                <option value="3">Three</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Contact Address</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Contact Address">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="vehicel_head">Vehicle Information</h4>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Vehicle Registration Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Vehicle Registration Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Chassis Number/VIN</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Chassis Number/VIN">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Engine Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Engine Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Color</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Enter Vehicle color">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Engine Number</label>--}}
{{--                                            <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Engine Number">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Color</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Enter Vehicle color">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputNumber1" class="form-label">Engine Capacity</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Engine Capacity">--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Vehicle Model</label>--}}
{{--                                            <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Enter Vehicle Model">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="vehicel_head">Vehicle Information</h4>--}}
{{--                                    <div class="input_main">--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Revenue Item</label>--}}
{{--                                            <select class="form-select" aria-label="Default select example">--}}
{{--                                                <option selected>Select Revenue Item</option>--}}
{{--                                                <option value="1">One</option>--}}
{{--                                                <option value="2">Two</option>--}}
{{--                                                <option value="3">Three</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="full_input">--}}
{{--                                            <label for="exampleInputemail1" class="form-label">Payment Method</label>--}}
{{--                                            <select class="form-select" aria-label="Default select example">--}}
{{--                                                <option selected>Select Payment Method</option>--}}
{{--                                                <option value="1">One</option>--}}
{{--                                                <option value="2">Two</option>--}}
{{--                                                <option value="3">Three</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="invoice_btn text-end">--}}
{{--                                        <button type="submit" class="btn btn-primary">Clear form</button>--}}
{{--                                        <button type="submit" class="btn btn-primary btn_with_bg">Generate Invoice</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="tab-pane fade active show " id="nav-contact" role="tabpanel"
                             aria-labelledby="nav-contact-tab">
                            <div class="invoice_fom">
                                <h4>Personal Information</h4>
                                <form  id="form1" method="post">
                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1" class="form-label">State Identity Number (SIN)</label>
                                            <input  name="asin" type="text" class="form-control"
                                                    id="exampleInputNumber1"
                                                    placeholder="Enter State Identity Number (SIN)">
                                        </div>
                                        <div class="full_input">
                                            <label for="exampleInputemail1" class="form-label">Email Address</label>
                                            <input type="email"  name="email" class="form-control"
                                                   id="exampleInputemail1"
                                                   placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1" class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputNumber1"
                                                   placeholder="Enter Full Name">

                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                    </div>
                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1" class="form-label">Phone Number</label>
                                            <input type="text"    name="phone"
                                                   id="modern-phone" class="form-control" id="exampleInputNumber1"
                                                   placeholder="Enter Phone Number">
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                        <div class="full_input">
                                            <input  type="hidden" id="stateName" name="stateName" class="form-control"
                                                   placeholder="Anambra" value="Anambra"/>
                                            <label for="exampleInputemail1"  class="form-label">Local Government</label>
                                            <select class="form-select" required name="lga" id="lgas"
                                                    aria-label="Default select example">
                                                <option>Loading Local Governments...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <p class="invalid-feedback"> Please select a local government </p>
                                        </div>
                                    </div>
                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1"  class="form-label">Contact Address</label>
                                            <input type="text" name="contactAddress" class="form-control" id="exampleInputNumber1"
                                                   placeholder="Enter Contact Address">
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                    </div>
                                    <h4 class="vehicel_head">Vehicle Information</h4>
                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1" class="form-label">Vehicle Registration Number</label>
                                            <input name="vehicleRegistrationNumber" type="text" class="form-control" id="exampleInputNumber1"
                                                   placeholder="Enter Vehicle Registration Number">

                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                        <div class="full_input">
                                            <label for="exampleInputemail1" class="form-label">Chassis Number/VIN</label>
                                            <input type="text" name="chasisNumber" class="form-control" id="exampleInputNumber1"
                                                   placeholder="Enter Chassis Number/VIN">
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                    </div>
                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1" class="form-label">Engine Number</label>
                                            <input type="text"  name="engineNumber"  class="form-control"
                                                   id="exampleInputNumber1"
                                                   placeholder="Enter Engine Number">
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>

                                        <div class="full_input">
                                            <label for="exampleInputemail1"  class="form-label">Color</label>
                                            <input type="text" name="vehicleColor" class="form-control"
                                                   id="exampleInputNumber1"
                                                   placeholder="Enter Enter Vehicle color">

                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                    </div>

                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputNumber1" class="form-label">Engine Capacity</label>
                                            <input type="text"  name="vehicleCapacityEngine" class="form-control"
                                                   id="exampleInputNumber1"
                                                   placeholder="Enter Engine Capacity">
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                        <div class="full_input">
                                            <label for="exampleInputemail1"  class="form-label">Vehicle
                                                Model</label>
                                            <input type="text"  name="vehicleModel" class="form-control"
                                                   id="exampleInputNumber1"
                                                   placeholder="Enter Enter Vehicle Model">
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                    </div>
                                    <h4 class="vehicel_head">Vehicle Information</h4>

                                    <div class="input_main">
                                        <div class="full_input">
                                            <label for="exampleInputemail1" class="form-label">Vehicle Type</label>
                                    <select id="vehicleType" name="vehicleType" class="form-select"
                                            aria-label="Default select example">
                                        <option value="">--Select--</option>
                                        <option value="TRUCK">Heavy Duty /Truck</option>
                                        <option value="MINI_TRUCK">Mini Truck</option>
                                        <option value="BUS">Bus</option>
                                        <option value="SEDAN_SALOON">Sedan/Saloon</option>
                                        <option value="TRICYCLE">Tricycle</option>
                                        <option value="MOTORCYCLE">Motor Cycle</option>


                                    </select>

                                            <p class="invalid-feedback"> Please select vehicle type </p></div>
                            </div>


                            <div class="input_main">
                                        <input type="hidden" id="revenueHeadCode" name="revenueHeadCode"
                                               value="{{$revenueHeadCode}}">

                                        <div class="full_input">
                                            <label for="exampleInputemail1" class="form-label">Revenue Item</label>
                                            <select  name="revenueItemCode" id="revenueItem" class="form-select"
                                                     aria-label="Default select example">
                                                <option selected>Select Revenue Item</option>

                                            </select>
                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                        <div class="full_input">
                                            <label for="exampleInputemail1" class="form-label">Payment Method</label>
                                            <select name="paymentChannel" id="paymentChannel" class="form-select" aria-label="Default select example">


                                                <option value="">Select Payment Channel</option>
                                                <option value="BANK_TRANSFER">Pay With Bank Transfer</option>
                                                <option value="ONLINE">Pay with Debit Card</option>
                                                <option value="BANK">Pay at Bank</option>
                                            </select>

                                            <p class="invalid-feedback"> Please fill out this input </p>
                                        </div>
                                    </div>


                                    <div class="invoice_btn text-end">
                                        <button type="reset" class="btn btn-primary">Clear form</button>
                                        <button type="submit" id="hackneySubmit" class="btn btn-primary btn_with_bg
                                        hackneySubmit">Generate
                                            Invoice</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection


@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/hackney-form-wizard-public.js')) }}"></script>
    <script>
        $(function () {




            @if(Session::has('message'))
            var txt = "{{Session::get('message')}}";
            console.log(txt);
            $("#check_box").text(txt);

            setTimeout(function () {
                $(".check_box").fadeOut(1200);
            }, 1000)
        @endif
        });
    </script>
@endsection
