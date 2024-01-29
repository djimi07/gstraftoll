
@extends('layouts/contentLayoutMaster')

@section('title', 'Form Wizard')

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
            <span class="bs-stepper-title"> Applicant </span>
            <span class="bs-stepper-subtitle">Enter New Vehicle Applicant</span>
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>
      <div class="step" data-target="#personal-info-modern">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="user" class="font-medium-3"></i>
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Documents</span>
            <span class="bs-stepper-subtitle">Upload Vehicle Applicant Documents</span>
          </span>
        </button>
      </div>

    </div>
    <div class="bs-stepper-content">
      <div id="account-details-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Applicant Details</h5>
          <small class="text-muted">Enter Applicant Details.</small>
        </div>





        <div class="row">
          <div class="form-group col-md-6">
            <label class="form-label" for="modern-username">Name</label>
            <input type="text" id="modern-name" name="name" class="form-control" placeholder="Nneka Adamu" />
          </div>
          <div class="form-group col-md-6">
            <label class="form-label" for="modern-email">Email</label>
            <input
              type="email"
              name="email"
              id="modern-email"
              class="form-control"
              placeholder="john.doe@yopmail.com"
              aria-label="john.doe"
            />
          </div>



        </div>

          <div class="row">
              <div class="form-group col-md-6">
                  <label class="form-label" for="modern-username">Vehicle Registration Number</label>
                  <input type="text" id="modern-name" name="vehicleRegistrationNumber" class="form-control" placeholder="SMK1234AD" />
              </div>
              <div class="form-group col-md-6">
                  <label class="form-label" for="modern-username">Phone</label>
                  <input type="text" id="modern-phone" name="phone" class="form-control" placeholder="08032898100" />
              </div>
          </div>

              <div class="row">

              <div class="form-group col-md-6">
                  <label class="form-label" for="modern-email">Physical Address</label>
                  <input
                      type="text" name="physicalAddress"
                      id="modern-physical-address"
                      class="form-control"
                      placeholder="Onitsha"
                      aria-label="Onitsha"
                  />
              </div>
                  <div class="form-group col-md-6">
                      <label class="form-label" for="modern-address">Postal Address</label>
                      <input name="postalAddress"
                             type="text"
                             id="modern-postal-address"
                             class="form-control"
                             placeholder="P.O Box 212, Anambra"
                      />
                  </div>

          </div>

          <div class="row">

              <div class="form-group col-md-6">
                  <label class="form-label" for="identificationType">Identification Type</label>


                  <select required name="identificationType" class="form-control item-details">
                      <option value="" selected="">Select ID Type</option>
                      <option value="INTERNATIONAL_PASSPORT">International Passport</option>
                      <option value="VOTER_CARD" >Voter's Card</option>


                  </select>
              </div>


              <div class="form-group col-md-6">
                  <label class="form-label" for="modern-landmark">Identification Number</label>
                  <input type="text" id="modern-identification" name="identificationNumber" class="form-control"
                         placeholder="" />
              </div>

          </div>
          <div class="row">





              <div class="form-group col-md-6">
                  <label class="form-label" for="city3">Driving License Number</label>
                  <input type="text" id="city3" name="drivingLicenseNumber" class="form-control" placeholder="" />
              </div>
              <div class="form-group col-md-6">
                  <label class="form-label" for="contactDetail">Contact Detail</label>
                  <input type="text" id="contactDetail" name="contactDetail" class="form-control" placeholder="" />
              </div>

          </div>

          <div class="row">


              <div class="form-group col-md-6">
                  <label class="form-label" for="vehicleType">Vehicle  Type</label>


                  <select required name="vehicleType" class="form-control item-details">
                      <option value="">--Select-- </option>
                      <option value="TRUCK">Heavy Duty /Truck </option>
                      <option value="MINI_TRUCK">Mini Truck </option>
                      <option value="BUS" >Bus</option>
                      <option value="SEDAN_SALOON" >Sedan/Saloon</option>
                      <option value="TRICYCLE" >Tricycle</option>
                      <option value="MOTORCYCLE" >Motor Cycle</option>


                  </select>
              </div>

              <div class="form-group col-md-6">
                  <label class="form-label" for="vehicleModel">Vehicle  Model</label>


                  <select required name="vehicleModel" class="form-control item-details">
                      <option value="" selected="">--Select--</option>
                      <option value="HEAVY_DUTY">Heavy Duty </option>
                      <option value="SEDAN_SALON" >Sedan/Salon</option>
                      <option value="TRICYCLE" >Tricycle</option>
                      <option value="TRICYCLE" >Motor Cycle</option>


                  </select>
              </div>





          </div>


          <div class="row">




              <div class="form-group col-md-6">
                  <label class="form-label" for="vehicleSize">Vehicle  Size</label>


                  <select required name="vehicleSize" class="form-control item-details">
                      <option value="" selected="">--Select--</option>
                      <option value="HEAVY_DUTY">Heavy Duty </option>
                      <option value="SEDAN_SALON" >Sedan/Salon</option>
                      <option value="TRICYCLE" >Tricycle</option>
                      <option value="TRICYCLE" >Motor Cycle</option>


                  </select>
              </div>

              <div class="form-group col-md-6">
                  <label class="form-label" for="vehicleCapacityEngine">Vehicle Engine  Capacity</label>


                  <select required name="vehicleCapacityEngine" class="form-control item-details">
                      <option value="" selected="">--Select--</option>
                      <option value="HEAVY_DUTY">Heavy Duty </option>
                      <option value="SEDAN_SALON" >Sedan/Salon</option>
                      <option value="TRICYCLE" >Tricycle</option>
                      <option value="TRICYCLE" >Motor Cycle</option>


                  </select>
              </div>


          </div>


          <div class="row">





              <div class="form-group col-md-6">
                  <label class="form-label" for="vehicleCapacityPassenger">Vehicle  Passenger Capacity</label>


                  <select required name="vehicleCapacityPassenger" class="form-control item-details">
                      <option value="" selected="">--Select--</option>
                      <option value="TRUCK">Heavy Duty /Truck </option>
                      <option value="MINI_TRUCK">Mini Truck </option>
                      <option value="BUS" >Bus</option>
                      <option value="SEDAN_SALOON" >Sedan/Saloon</option>
                      <option value="TRICYCLE" >Tricycle</option>
                      <option value="MOTORCYCLE" >Motor Cycle</option>


                  </select>
              </div>

              <div class="form-group col-md-6">
                  <label class="form-label" for="vehicleCapacityHaulage">Vehicle Haulage  Capacity</label>


                  <select required name="vehicleCapacityHaulage" class="form-control item-details">
                      <option value="" selected="">--Select--</option>
                      <option value="HEAVY_DUTY">Heavy Duty </option>
                      <option value="SEDAN_SALON" >Sedan/Salon</option>
                      <option value="TRICYCLE" >Tricycle</option>
                      <option value="TRICYCLE" >Motor Cycle</option>


                  </select>
              </div>


          </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
          </button>
        </div>
      </div>
      <div id="personal-info-modern" class="content">
        <div class="content-header">
          <h5 class="mb-0">Vehicle Applicant Document</h5>
          <small>Upload  Available Vehicle Documents </small>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label class="form-label" for="modern-first-name">First Name</label>
            <input type="text" id="modern-first-name" class="form-control" placeholder="John" />
          </div>
          <div class="form-group col-md-6">
            <label class="form-label" for="modern-last-name">Last Name</label>
            <input type="text" id="modern-last-name" class="form-control" placeholder="Doe" />
          </div>
        </div>


        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
          </button>


            <button class="btn btn-success btn-submit">Submit</button>
        </div>
      </div>



    </div></div>
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
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection
