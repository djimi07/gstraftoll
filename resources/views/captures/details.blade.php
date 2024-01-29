@extends('layouts/contentLayoutMaster')

@section('title', 'Product Details')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce-details.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-number-input.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">

@endsection

@section('content')
<!-- app e-commerce details start -->
<section class="app-ecommerce-details">



    <div class="card-body">


  <div class="card">


      <!-- Product Details starts -->

      <div class="row my-2">
        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
          <div class="d-flex align-items-center justify-content-center">
            <img
              src="data:image;base64,{{$capture->data->primaryImage}}"
              class="img-fluid product-img"
              alt="product image"
            />
          </div>
        </div>


        <div class="col-10 col-md-7">
            <div class="btn-group col-align-right">
                <button type="button" class="btn btn-success waves-effect waves-float waves-light">Quick Actions</button>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split waves-effect waves-float waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Quick Actions</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                    <h6 class="dropdown-header">Actions</h6>
                    <a class="dropdown-item" href="javascript:window.location.href = '/captures';">Back to Logs</a>
                    <a class="dropdown-item" href="/invoices/create/compliance?logId={{$capture->data->id}}">Compliance</a>
                    <a class="dropdown-item" href="/invoices/create/violations?logId={{$capture->data->id}}"> Offence</a>
                    <div class="dropdown-divider"></div>

                </div>
            </div>
          <h4>{{$capture->description}}</h4>
          <hr />

          <table>
            <tbody>
              <tr>
                <td>
                  #Vehicle:
                </td>
                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->vehicleRegistrationNumber}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Registration type:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->vehicleRegistrationType}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Time in:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{\Carbon\Carbon::parse($capture->data->timeIn)->format('d/m/Y h:m:s A')}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Location:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->location}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Camera ID:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->cameraId}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Country:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->country}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Country longitude:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->countryLong}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Country latitude:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->countryLat}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  State:
                </td>

                <td>
                  @if ($capture->data->state)
                      <span class="pl-1 font-weight-bold"> {{$capture->data->state}} </span>
                  @else
                      <span class="pl-1 font-weight-bold"> - </span>
                  @endif
                </td>
              </tr>

              <tr>
                <td>
                  State longitude:
                </td>

                <td>
                  @if ($capture->data->stateLong)
                      <span class="pl-1 font-weight-bold"> {{$capture->data->stateLong}} </span>
                  @else
                      <span class="pl-1 font-weight-bold"> - </span>
                  @endif
                </td>
              </tr>

              <tr>
                <td>
                  State latitude:
                </td>

                <td>
                  @if ($capture->data->stateLat)
                    <span class="pl-1 font-weight-bold"> {{$capture->data->stateLat}} </span>
                  @else
                    <span class="pl-1 font-weight-bold"> - </span>
                  @endif
                </td>
              </tr>

              <tr>
                <td>
                  Confidence:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->confidence}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Category:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->category}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Capture frame times:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->captureFrameTimes}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Processed status:
                </td>

                <td>
                  @if ($capture->data->processedStatus)
                      <span class="pl-1 font-weight-bold"> {{$capture->data->processedStatus}} </span>
                  @else
                      <span class="pl-1 font-weight-bold"> - </span>
                  @endif
                </td>
              </tr>

              <tr>
                <td>
                  Mlo registered:
                </td>

                <td>
                  @if ($capture->data->mloRegistered)
                      <span class="pl-1 font-weight-bold"> {{$capture->data->mloRegistered}} </span>
                  @else
                      <span class="pl-1 font-weight-bold"> - </span>
                  @endif
                </td>
              </tr>

              <tr>
                <td>
                  Mlo expired:
                </td>

                <td>
                  @if ($capture->data->mloExpired)
                      <span class="pl-1 font-weight-bold"> {{$capture->data->mloExpired}} </span>
                  @else
                      <span class="pl-1 font-weight-bold"> - </span>
                  @endif
                </td>
              </tr>

              <tr>
                <td>
                  Created At:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{\Carbon\Carbon::parse($capture->data->createdAt)->format('d/m/Y h:m:s A')}}  </span>
                </td>
              </tr>

              <tr>
                <td>
                  Modified at:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{\Carbon\Carbon::parse($capture->data->modifiedAt)->format('d/m/Y h:m:s A')}} </span>
                </td>
              </tr>

              <tr>
                <td>
                  Color:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->color}} </span>
                  <!--<div class="pl-1 font-weight-bold" style="width: 20px; height: 20px; border-radius: 50%; background-color: #{{$capture->data->color}};"></div>-->
                </td>
              </tr>

              <tr>
                <td>
                  Background color:
                </td>

                <td>
                  <span class="pl-1 font-weight-bold"> {{$capture->data->bgColor}} </span>
                  <!--<div class="pl-1 font-weight-bold" style="width: 20px; height: 20px; border-radius: 50%; background-color: #{{$capture->data->bgColor}};"></div>-->
                </td>
              </tr>

            </tbody>
          </table>
          <hr />
        </div>
      </div>
    </div>
    <!-- Product Details ends -->

    @if ($capture->data->primaryImage != $capture->data->secondaryImage)
    <div class="card-body">
      <div class="row my-2" style="justify-content:center;">
        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
          <div class="d-flex align-items-center justify-content-center">
            <img
              src="data:image;base64,{{$capture->data->secondaryImage}}"
              class="img-fluid product-img"
              alt="product image"
            />
          </div>
        </div>
      </div>
    </div>
    @endif



  </div>
</section>
<!-- app e-commerce details end -->
@endsection



