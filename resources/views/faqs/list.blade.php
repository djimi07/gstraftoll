@extends('layouts.contentLayoutMaster')

@section('title', 'TMC Frequently Asked Question')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{asset('css/base/pages/app-invoice-list.css')}}">
@endsection

@section('content')
    <section class="invoice-list-wrapper">
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="invoice-list-table table">
                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Title</th>
                        <th>Answer</th>
                        <th>Language</th>
                        <th class="text-truncate">Created Date</th>
                        <th class="cell-fit">Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
@endsection

@section('page-script')
     <script src="{{asset('js/scripts/pages/faq-list.js')}}"></script>
@endsection
