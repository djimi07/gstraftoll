@extends('layouts/contentLayoutMaster')

@section('title', 'Hackney Permit Purchase')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')

    <!-- Modern Horizontal Wizard -->
    <section class="modern-horizontal-wizard">
        <div class="bs-stepper wizard-modern modern-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#account-details-modern">
                    <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="file-text" class="font-medium-3"></i>
          </span>
                        <span class="bs-stepper-label">
            <span class="bs-stepper-title"> Ticket Details </span>
            <span class="bs-stepper-subtitle">Enter New  Ticket  Information</span>
          </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>


            </div>
            <div class="bs-stepper-content">
                <div id="account-details-modern" class="content">
                    <div class="content-header">
                        <h5 class="mb-0">Owner Details</h5>
                        <small class="text-muted">Enter Owner Details.</small>
                    </div>


                    <form enctype="multipart/form-data" id="form1">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username"><strong> State Identity Number (SIN)
                                    </strong></label>
                                <input type="text" id="modern-name" name="asin" class="form-control" placeholder=""/>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="hidden" id="revenueHeadCode" name="revenueHeadCode"
                                       value="{{$revenueHeadCode}}">

                                <label class="form-label" for="revenueItem">Revenue Item</label>


                                <select required name="revenueItemCode" id="revenueItem" class="form-control
                                item-details">
                                    <option value="">--Select--</option>


                                </select>

                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>

                        </div>

                        <div class="row">


                            <div class="form-group col-md-6">
                                <label class="form-label" for="vehicleType">Vehicle Type</label>


                                <select id="vehicleType" name="vehicleType" class="form-control item-details">
                                    <option value="">--Select--</option>
                                    <option value="TRUCK">Heavy Duty /Truck</option>
                                    <option value="MINI_TRUCK">Mini Truck</option>
                                    <option value="BUS">Bus</option>
                                    <option value="SEDAN_SALOON">Sedan/Saloon</option>
                                    <option value="TRICYCLE">Tricycle</option>
                                    <option value="MOTORCYCLE">Motor Cycle</option>


                                </select>

                                <p class="invalid-feedback"> Please select vehicle type </p>
                            </div>


                            <div class="form-group col-md-6">

                                <label class="form-label" for="paymentChannel">Payment Channel</label>


                                <select name="paymentChannel" id="paymentChannel" class="form-control
                                item-details">
                                    <option value="">Select Payment Channel</option>
                                    <option value="BANK_TRANSFER">Pay With Bank Transfer</option>
                                    <option value="ONLINE">Pay with Debit Card</option>
                                    <option value="BANK">Pay at Bank</option>

                                </select>

                                <p class="invalid-feedback"> Please select payment channel </p>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Name</label>
                                <input type="text" id="modern-name" name="name" class="form-control"
                                       placeholder="Nneka John"/>
                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-phone">Phone</label>
                                <input
                                    type="text"
                                    name="phone"
                                    id="modern-phone"
                                    class="form-control"
                                    placeholder="09094566798"

                                />
                                <p class="invalid-feedback" id="phoneError"> Please fill out this input </p>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Vehicle Registration Number</label>
                                <input type="text" id="modern-name" name="vehicleRegistrationNumber"
                                       class="form-control" placeholder="SMK1234AD"/>
                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Chassis Number/VIN</label>
                                <input type="text" id="modern-phone" name="chasisNumber" class="form-control"
                                       placeholder="123477576767999"/>

                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Engine Number</label>
                                <input type="text" id="modern-name" name="engineNumber" class="form-control"
                                       placeholder="SMK1234AD"/>
                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Color</label>
                                <input type="text" id="modern-phone" name="vehicleColor" class="form-control"
                                       placeholder="Blue"/>

                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="vehicleCapacityEngine">Engine Capacity</label>
                                <input type="text" id="vehicleCapacityEngine" name="vehicleCapacityEngine"
                                       class="form-control"
                                       placeholder="SMK1234AD"/>
                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="vehicleModel">Vehicle Model</label>


                                <input type="text" id="vehicleModel" name="vehicleModel" class="form-control"
                                       placeholder="Honda"/>

                                <p class="invalid-feedback"> Please fill out this input </p>

                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Nigerian State </label>
                                <input disabled type="text" id="stateName" name="stateName" class="form-control"
                                       placeholder="Anambra" value="Anambra"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="vehicleModel">LGA</label>


                                <select required name="lga" id="lgas" class="form-control item-details">
                                    <option>Loading Local Governments...</option>


                                </select>

                                <p class="invalid-feedback"> Please select a local government </p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="form-label" for="modern-username">Email</label>
                                <input type="text" id="modern-phone" name="email" class="form-control"
                                       placeholder="john.doe@yopmail.com"/>

                            </div>
                            <div class="form-group col-md-6">

                                <label class="form-label" for="modern-email">Contact Address</label>
                                <input
                                    type="text" name="contactAddress"
                                    id="modern-physical-address"
                                    class="form-control"
                                    placeholder="Onitsha"
                                    aria-label="Onitsha"
                                />
                                <p class="invalid-feedback"> Please fill out this input </p>
                            </div>


                        </div>





                        <div class="row">


                            <div class="d-flex justify-content-between">


                                <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                                    <span class="align-middle d-sm-inline-block d-none">Generate Invoice</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-arrow-right align-middle ml-sm-25 ml-0">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </button>
                            </div>
                    </form>
                </div>


            </div>
        </div>

    </section>
    <!-- /Modern Horizontal Wizard -->

@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/hackney-form-wizard.js')) }}"></script>
@endsection





