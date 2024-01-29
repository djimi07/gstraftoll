@extends('layouts.app')


@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
@endsection


@section('content')
    <div class="row">

        <div class="col-12">
            <a href="{{route('invoices.new')}}"
               class="btn btn-icon btn-primary waves-effect waves-float waves-light"
               type="button"
               data-repeater-create="">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-plus mr-25">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Create Invoice</span>
            </a>
            <p></p>
        </div>

    </div>

    <div class="row" id="table-hover-animation">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">

                        GSTraftoll Payments</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Payment Code </th>
                            <th>Payment Channel </th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Fee</th>

                            <th>Created</th>


                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="tblError">
                            <td id="tblInfo" colspan="8"> Loading Payments...</td>
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

            let base_url = '/api/v1/payments?page=1&limit=50&sortBy=createdAt:DESC';
            let prev_button = $('.prev-item');
            let next_button = $('.next-item');

            // Waiting for pagination


            $.ajax(
                {
                    url: GsTraftoll.url('v1/list-payments'),
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
                              var previewUrl=GsTraftoll.url('payments/preview/' + anpr['id']);

                                var row = '<tr>' +
                                    '<td><span class="font-weight-bold">' + (index + 1) + '</span></td>' +
                                    '<td><span class="font-weight-bold">' + anpr['invoice']['referenceNumber'] +
                                    '</span></td>' +
                                    '<td><span class="font-weight-bold">' + anpr['paymentProvider'] + '</span></td>' +
                                    ' <td>' + anpr['invoice']['name'] + '</td>' +
                                    '<td>' + GsTraftoll.formatMoneyAmount(anpr['amountPaid'] / 100) + ' </td>' +
                                    '<td>' + GsTraftoll.formatMoneyAmount(anpr['fee'] / 100) + ' </td>' +




                                    '<td><span class="badge badge-pill badge-light-primary ' +
                                    'mr-1">' + moment(new Date(anpr['createdAt'])).format('DD MMM YYYY HH:ss a')
                                    + '</span></td>';


                                row += '<td> <div class="d-flex align-items-center col-actions">' +
                                    '<a class="mr-1" href="'+previewUrl + '"' +
                                    'data-toggle="tooltip" data-placement="top" title="view payment" ' +
                                    'data-original-title="View ' +
                                    'Detail' + '"> receipt</a>' +

                                       '</div></div></td>' +
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







    </script>
@endsection
