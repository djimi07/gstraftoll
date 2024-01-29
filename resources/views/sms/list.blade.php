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

                        GSTraftoll SMS</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Phone </th>
                            <th>Message</th>
                            <th>MessageID</th>


                            <th>Created</th>



                        </tr>
                        </thead>
                        <tbody>
                        <tr id="tblError">
                            <td id="tblInfo" colspan="8"> Loading Messages...</td>
                        </tr>

                        </tbody>

                        <tfoot>

                        <tr>
                            <td colspan="9">
                                <div class="col-md-12 col-sm-12">


                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-end mt-2">
                                            <li class="page-item prev-item"><a class="page-link"
                                                                               href="javascript:void(0);"></a></li>

                                            <li class="page-item next-item"><a class="page-link"
                                                                               href="javascript:void(0);"></a></li>
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

            let base_url = '/api/v1/sms?page=1&limit=50&sortBy=createdAt:DESC';
            let prev_button = $('.prev-item');
            let next_button = $('.next-item');

            // Waiting for pagination


            $.ajax(
                {
                    url: GsTraftoll.url('v1/list-sms'),
                    success: function (result) {

                        if ("data" in result == true) {
                            console.log(result.data.links);

                            // change pagination bar //////

                            let pages = result.data.meta.totalPages;
                            let currentPage = result.data.meta.currentPage;

                            for (let i = 0; i < pages; i++) {

                                let pagination_number = "<li " + ((i + 1) == currentPage ? "aria-current='page'" : null) + "  class='page-item " + ((i + 1) == currentPage ? ' active' : null) + "'>" +
                                    "<a class='page-link'>" + (i + 1) + "</a>" +
                                    "</li>";

                                (i == 0) ? $('.prev-item').after(pagination_number) : $('.next-item').before(pagination_number);
                            }

                            /*******------ */

                            $.each(result.data.data, function (index, anpr) {

                                var $isPaid = anpr['isPaid'] == true ? 'Paid' : 'Unpaid';
                                var $badge = anpr['isPaid'] == true ? 'badge badge-pill badge-light-success' : 'badge' +
                                    ' badge-pill badge-light-danger';
                                var row = '<tr>' +
                                    '<td><span class="font-weight-bold">' + (index + 1) + '</span></td>' +
                                    '<td><span class="font-weight-bold">' + anpr['receiverPhone'] + '</span></td>' +
                                    '<td><span class="font-small-2 font-weight-bold">' + anpr['message'] +
                                    '</span></td>' +
                                    ' <td>' + anpr['id'] + '</td>' +




                                    '<td><span class="badge badge-pill badge-light-primary ' +
                                    'mr-1">' + moment(new Date(anpr['createdAt'])).format('DD MMM YYYY HH:ss a')
                                    + '</span></td>';



                                    '</tr>';


                                $('#tblError').remove();
                                $('table').append(row);

                            });


                        }
                    },

                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#tblInfo").text(errorThrown);
                        $("#tblInfo").attr("class", "alert alert-danger");
                    }
                });

        });


        function deleteRow(e) {
            let id = $(e.target).attr('data-id');

            $.get({
                url: "/vehicles/delete/" + id,
                contentType: "application/json",
                data: JSON.stringify({vehicleId: id}),
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    console.log("Request successful:", response);
                    if (response.description == 'Deleted vehicle') {
                        window.location.replace("/vehicles");
                    } else {
                        alert('error');
                    }

                },
                error: function (xhr, status, error) {
                    console.log("Request error:", error);
                    //alert("an error occured");
                },
            });

        }

        function editRedirection(e) {
            let id = $(e.target).attr('data-id');

            window.location = '/vehicles/edit/' + id;

        }


    </script>
@endsection
