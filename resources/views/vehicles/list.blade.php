@extends('layouts.app')


@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
@endsection


@section('content')
<div class="row">

    <div class="col-12">
        <a href="{{route('vehicles.register')}}" class="btn btn-icon btn-primary waves-effect waves-float waves-light"
           type="button"
           data-repeater-create="">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Register Vehicle</span>
        </a>
        <p></p>
    </div>

</div>

    <div class="row" id="table-hover-animation">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">

                        GSTraftoll Registered Vehicles</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Vehicle #</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Model</th>
                            <th>Created</th>

                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="tblError">
                            <td id="tblInfo" colspan="8"> Loading Vehicles  Log...</td>
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
                    url: GsTraftoll.url('v1/list-vehicles'),
                    success: function (result) {


                        if ("data" in result == true) {
                            console.log(result.data.links);


                            // change pagination bar //////

                            let pages = result.data.meta.totalPages;
                            let currentPage = result.data.meta.currentPage;

                            for (let i=0; i < pages; i++)
                            {
                                let pagination_number = "<li "+((i+1)== currentPage ? "aria-current='page'" : null)+"  class='page-item "+((i+1)== currentPage ? ' active' : null)+"'>"+
                                        "<a class='page-link'>"+ (i+1) +"</a>"+
                                    "</li>";

                                (i== 0) ? $('.prev-item').after(pagination_number) : $('.next-item').before(pagination_number);
                            }

                            /*******------ */


                            $.each(result.data.data, function (index,anpr) {


                                   var row= '<tr>'+
                                        '<td><span class="font-weight-bold">'+ (index+1) +'</span></td>' +
                                        '<td><span class="font-weight-bold">'+ anpr['vehicleRegistrationNumber']+'</span></td>' +
                                       ' <td>'+ anpr['name']+'</td>' +
                                        '<td>'+  anpr['vehicleType']+' </td>' +


                                        '<td>'+ anpr['vehicleModel']+'</td>' +

                                        '<td><span class="badge badge-pill badge-light-primary ' +
                                        'mr-1">'+  moment(new Date(anpr['createdAt'])).format('DD MMM YYYY HH:ss a')
                                       +'</span></td>';











                                  row+=  '<td> <div class="d-flex align-items-center col-actions">'+
                                                '<a onclick="viewRedirection(event)" data-id='+anpr['id']+' class="mr-1" href="javascript:void(0);" ' +
                                    'data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail' + '"><svg onclick="viewRedirection(event)" data-id='+anpr['id']+' xmlns="http://www.w3.org/2000/svg" width="24" height="24" ' +
                                      'viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-2"><path onclick="viewRedirection(event)" data-id='+anpr['id']+' d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle onclick="viewRedirection(event)" data-id='+anpr['id']+' cx="12" cy="12" r="3"></circle></svg></a>'+

                                                '<div class="dropdown"><button type="button" class="btn btn-sm ' +
                                                'dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown">'+
                                                        '<svg xmlns="http://www.w3.org/2000/svg" width="14" ' +
                                                        'height="14" viewBox="0 0 24 24" fill="none" ' +
                                    'stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">' +
                                      '<circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg> </button>'+


                                                    '<div class="dropdown-menu">' +

                                      '<a onclick="editRedirection(event)" data-id='+anpr['id']+' class="dropdown-item" href="javascript:void(0);"><span onclick="editRedirection(event)" data-id='+anpr['id']+'>Edit ' +

                                      '</span> </a>'+

                                                        '<a class="dropdown-item" href="javascript:void(0);">'+


                                                            '<span onclick="deleteRow(event)" data-id='+anpr['id']+' class="delete_buttons">Delete</span></a></div>'+
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



        function deleteRow(e)
        {
            let id = $(e.target).attr('data-id');

            $.get({
            url: "/v1/vehicle/delete/"+id,
            contentType: "application/json",
            data: JSON.stringify({vehicleId:id}),
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
              console.log("Request successful:", response);
              if (response.description == 'Deleted vehicle')
              {
                window.location.replace("/vehicles");
              }
              else
              {
                alert('error');
              }

            },
            error: function (xhr, status, error) {
              console.log("Request error:", error);
              //alert("an error occured");
            },
          });

        }

        function editRedirection(e)
        {
            let id = $(e.target).attr('data-id');

            window.location = '/v1/vehicle/edit/'+id;

        }

        function viewRedirection(e)
        {
            let id = $(e.target).attr('data-id');

            window.location = '/vehicles/view/'+ id;
        }


    </script>
@endsection
