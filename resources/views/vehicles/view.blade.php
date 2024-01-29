@extends('layouts.app')


@section('title', 'View vehicle')

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

                <div class="card invoice-preview-card mt-1">

                    <div class="btn-group action-right">
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split waves-effect waves-float waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="">Quick Actions</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="">
                            <h6 class="dropdown-header">Actions</h6>
                            <a class="dropdown-item" href="javascript:window.location.href = '/vehicles';">Back to Log</a>
                            <a class="dropdown-item"
                               href="/invoices/create/compliance?logId={{$vehicle->id}}">Compliance</a>
                            <a class="dropdown-item" href="/invoices/create/violations?logId={{$vehicle->id}}"> Offence</a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </div>

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
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> Name: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->name}} </span></td>
                                        </tr>
                                        <tr>
                                            <td> Type: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->vehicleType}}</span></td>
                                        </tr>
                                        <tr>
                                            <td> Model: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->vehicleModel}}</span></td>
                                        </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="mt-md-0 mt-2">
                                <h4 class="invoice-title">
                                    #Vehicle:
                                    <span class="invoice-number"> {{$vehicle->vehicleRegistrationNumber}}</span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Created at:</p>
                                    <p class="invoice-date">{{\Carbon\Carbon::parse($vehicle->createdAt)->format('d/m/Y h:m:s A')}}</p>
                                </div>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Modified at:</p>
                                    <p class="invoice-date">{{\Carbon\Carbon::parse($vehicle->modifiedAt)->format('d/m/Y h:m:s A')}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing"/>

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                            <h6 class="mb-2">Applicant details:</h6>
                            <table>
                                    <tbody>
                                        <tr>
                                            <td>Anambra State Identity Number (ASIN):</td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->asin}} </span></td>
                                        </tr>
                                        <tr>
                                            <td> Email: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->email}}</span></td>
                                        </tr>
                                        <tr>
                                            <td> Phone: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->phone}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Physical Address: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->physicalAddress}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Postal Address: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->postalAddress}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Identification Type: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->identificationType}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Driving License Number: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->drivingLicenseNumber}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Contact Detail: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->contactDetail}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Vehicle Size: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->vehicleSize}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Vehicle Engine Capacity: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->vehicleCapacityEngine}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Vehicle Passenger Capacity: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->vehicleCapacityPassenger}}</span></td>
                                        </tr>

                                        <tr>
                                            <td> Vehicle Haulage Capacity: </td>
                                            <td><span class="pl-1 font-weight-bold"> {{$vehicle->vehicleCapacityHaulage}}</span></td>
                                        </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                            <table>
                                    <tbody>

                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                            <h6 class="mb-2">Documents:</h6>
                            <table>
                                    <tbody>
                                        <tr>
                                            <td>Completed Application Form:</td>
                                            <td><span class="pl-1 font-weight-bold">
                                                    @if(!empty($vehicle->documents[0]->completedApplicationForm))
                                                        <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->completedApplicationForm}}" data-fileType="{{$vehicle->documents[0]->completedApplicationFormFiletype}}"> view document </a>
                                                    @else
                                                        <span> - </span>
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Valid Driver Licence: </td>
                                            <td><span class="pl-1 font-weight-bold">
                                                @if(!empty($vehicle->documents[0]->validDriverLicense))
                                                    <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->validDriverLicense}}" data-fileType="{{$vehicle->documents[0]->validDriverLicenseFiletype}}"> view document </a>
                                                @else
                                                    <span> - </span>
                                                @endif
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Certificate of RoadWorthiness: </td>
                                            <td><span class="pl-1 font-weight-bold">
                                                @if(!empty($vehicle->documents[0]->certificateOfRoadWorthiness))
                                                    <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->certificateOfRoadWorthiness}}" data-fileType="{{$vehicle->documents[0]->certificateOfRoadWorthinessFiletype}}"> view document </a>
                                                @else
                                                    <span> - </span>
                                                @endif
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Certificate of Ownership: </td>
                                            <td><span class="pl-1 font-weight-bold">
                                                @if(!empty($vehicle->documents[0]->vehicleCertificateOfOwnership))
                                                    <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->vehicleCertificateOfOwnership}}" data-fileType="{{$vehicle->documents[0]->vehicleCertificateOfOwnershipFiletype}}"> view document </a>
                                                @else
                                                    <span> - </span>
                                                @endif
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Receipt of Application Acknowledgement: </td>
                                            <td><span class="pl-1 font-weight-bold">
                                                @if(!empty($vehicle->documents[0]->receiptOfApplicationAcknowledgement))
                                                    <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->receiptOfApplicationAcknowledgement}}" data-fileType="{{$vehicle->documents[0]->receiptOfApplicationAcknowledgementFiletype}}"> view document </a>
                                                @else
                                                    <span> - </span>
                                                @endif
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Supporting Document (1): </td>
                                            <td><span class="pl-1 font-weight-bold">
                                                @if(!empty($vehicle->documents[0]->supportingDocument1))
                                                    <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->supportingDocument1}}" data-fileType="{{$vehicle->documents[0]->supportingDocument1Filetype}}"> view document </a>
                                                @else
                                                    <span> - </span>
                                                @endif
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Supporting Document (2): </td>
                                            <td><span class="pl-1 font-weight-bold">
                                                @if(!empty($vehicle->documents[0]->supportingDocument2))
                                                    <a href="javascript:void(0);" onclick="displayDocument(event)" data-base64="{{$vehicle->documents[0]->supportingDocument2}}" data-fileType="{{$vehicle->documents[0]->supportingDocument2Filetype}}"> view document </a>
                                                @else
                                                    <span> - </span>
                                                @endif
                                                </span>
                                            </td>
                                        </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                            <table>
                                    <tbody>

                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-sales-total-wrapper">
                            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">

                            </div>

                        </div>
                    </div>
                    <!-- Invoice Description ends -->

                    <hr class="invoice-spacing"/>

                </div>
            </div>
            <!-- /Invoice -->

        </div>
    </section>

@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/vehicle-preview-invoice.js')}}"></script>
@endsection
