@extends('layouts.app')


@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
@endsection


@section('content')

    <div class="row" id="table-hover-animation">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">

                        GSTraftoll Capture Log</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Vehicle #</th>
                            <th>Confidence</th>
                            <th>Location</th>
                            <th>Country</th>
                            <th>TimeIn</th>
                            <th>Reg?</th>
                            <th>Exp?</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="tblError">
                            <td id="tblInfo" colspan="8"> Loading Cameras Log...</td>
                        </tr>

                        </tbody>

                        <tfoot>

                        <tr >
                            <td colspan="9">
                                <div class="col-md-12 col-sm-12">



                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end mt-2">
                                                    <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item active" aria-current="page">
                                                        <a class="page-link" href="javascript:void(0);">4</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
                                                    <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                                </ul>
                                            </nav>
                                </div>

                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>

@endsection



@section('page-script')

    <!-- Page js files -->
    <script>

        $(function () {
            'use strict';

            //load camera list

            $.ajax(
                {
                    url: GsTraftoll.url('v1/list-capture'),
                    success: function (result) {


                        if ("data" in result == true) {
                            console.log(result.data.links);

                            $.each(result.data.data, function (index,anpr) {


                                   var row= '<tr>'+
                                        '<td><span class="font-weight-bold">'+ (index+1) +'</span></td>' +
                                        '<td><span class="font-weight-bold">'+ anpr['vehicleRegistrationNumber']+'</span></td>' +
                                       ' <td>'+ anpr['confidence']+'</td>' +
                                        '<td> <div class="avatar-group">'+
                                                '<div data-toggle="tooltip" data-popup="tooltip-custom" ' +
                                    'data-placement="top" title="" class="avatar pull-up my-0" data-original-title="'+ anpr['vehicleRegistrationNumber']+'">'+
                                                    '<img src="data:image/png;base64,'+anpr['primaryImage'] +'" ' +
                                       'alt="Avatar" ' +'height="26" width="32">'+
                                         '</div> </div>'+ anpr['location']+' </td>' +


                                        '<td>'+ anpr['country']+'</td>' +

                                        '<td><span class="badge badge-pill badge-light-primary ' +
                                        'mr-1">'+  moment(new Date(anpr['timeIn'])).format('DD MMM YYYY HH:ss a')
                                       +'</span></td>';

                                var mloRegd =  anpr['mloRegistered']== true ? ' <td><span class="badge badge-pill ' +
                                    'badge-light-success mr-1" > Yes </span></td>' : '<td><span class="badge badge-pill ' +
                                    'badge-light-danger mr-1" >No</span></td>';


                                row+=    mloRegd ;

                                var expiredReg = "<td>";
                                expiredReg+= anpr['mloExpired']== true ?  +'<span class="badge badge-pill ' +
                                    'badge-light-success mr-0" > Yes </span>' : '<span class="badge badge-pill ' +
                                    'badge-light-danger mr-0" >No</span>';
                                    expiredReg+='</td>';

                                row+=    expiredReg ;




                                  row+=  '<td> <div class="d-flex align-items-center col-actions">'+
                                                '<a class="mr-1" onclick="viewRedirection(event)" data-id='+anpr['id']+' href="javascript:void(0);"  ' +
                                    'data-toggle="tooltip" data-placement="top" title="" data-original-title="View  Log' + '"><svg onclick="viewRedirection(event)" data-id='+anpr['id']+' href="javascript:void(0);"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" ' +
                                      'viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-2"><path onclick="viewRedirection(event)" data-id='+anpr['id']+' href="javascript:void(0);"  d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle onclick="viewRedirection(event)" data-id='+anpr['id']+' href="javascript:void(0);"  cx="12" cy="12" r="3"></circle></svg></a>'+

                                                '<div class="dropdown"><button type="button" class="btn btn-sm ' +
                                                'dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown">'+
                                                        '<svg xmlns="http://www.w3.org/2000/svg" width="14" ' +
                                                        'height="14" viewBox="0 0 24 24" fill="none" ' +
                                    'stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">' +
                                      '<circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg> </button>'+


                                                    '<div class="dropdown-menu">' +
                                      '<a class="dropdown-item" href="/invoices/create/compliance?logId='   + anpr["id"]+
                                      '"><span>Process ' +
                                      'Compliance</span> </a>'+
                                      '<a class="dropdown-item" href="/invoices/create/violations?logId='+ anpr["id"]+
                                      '"><span>Process ' +
                                      'Violation</span> </a>'+
                                                        '<a class="dropdown-item" href="javascript:void(0);">'+

                                                            '<span>Delete</span></a></div>'+
                                                '</div></div></td>' +
                                    '</tr>';


                                   $('#tblError').remove();
                                   $('table').append(row);

                            });

                        }
                    },

                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#tblInfo").text( errorThrown);
                        $("#tblInfo").attr("class","alert alert-danger");
                    }
                });



        });

        function viewRedirection(e)
        {
            let id = $(e.target).attr('data-id');

            window.location = '/captures/view/'+ id;
        }


    </script>
@endsection
