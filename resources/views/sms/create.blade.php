@extends('layouts/contentLayoutMaster')

@section('title', 'Invoice Creation')

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
            <span class="bs-stepper-title"> Send SMS  </span>
            <span class="bs-stepper-subtitle">Enter New Recipient   Information</span>
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
                        <h5 class="mb-0">Receiver Phone </h5>
                        <small class="text-muted">Enter Phone Number.</small>
                    </div>


                    <form enctype="multipart/form-data" id="form1">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="modern-username"><strong> Receiver Phone
                                    </strong></label>
                                <input type="text" id="receiverPhone" name="receiverPhone" class="form-control"
                                       placeholder=""/>
                                <p class="invalid-feedback" id="phoneError"> Please fill out this input </p>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control" id="message" name="message" rows="3"
                                              placeholder="Type your message"></textarea>
                                    <label for="label-textarea">Message</label>
                                </div>
                            </div>
                                <p class="invalid-feedback"> Please fill out this input </p>





                        </div>









                        <div class="row">


                            <div class="d-flex justify-content-between">


                                <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                                    <span class="align-middle d-sm-inline-block d-none">Send Message</span>
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
    <script src="{{ asset(mix('js/scripts/forms/new-sms-form-wizard.js')) }}"></script>
@endsection





