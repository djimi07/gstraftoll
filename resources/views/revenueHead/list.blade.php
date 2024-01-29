@extends('layouts/contentLayoutMaster')

@section('title', 'Revenue Head')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<!-- head list start -->
<section class="revenue-head-list">
  <!-- list section start -->
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <table class="revenue-head-table table">
      <thead class="thead-light">
          <tr>
            <th>Name</th>
            <th>Revenue Code</th>
            <th>Description</th>
            <th>Agency</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Modal for revenue head starts-->
    <div class="modal modal-slide-in revenue-head-modal fade" id="modals-slide-in">
      <div class="modal-dialog">
        <form class="revenue-head-form modal-content pt-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Revenue Head</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="form-group">
              <label class="form-label" for="revenue-head-name">Name</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="revenue-head-name"
                placeholder="Booking"
                name="revenue-head-name"
                aria-label="John Doe"
                aria-describedby="revenue-head-name2"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-head-code">Revenue Code</label>
              <input
                type="text"
                id="revenue-head-code"
                class="form-control dt-code"
                placeholder="xxxxxxxx"
                aria-label="jdoe1"
                aria-describedby="revenue-head-code2"
                name="revenue-head-code"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-head-description">Description</label>
              <textarea
                type="text"
                id="revenue-head-description"
                class="form-control dt-description"
                aria-label=""
                aria-describedby="revenue-head-description2"
                name="revenue-head-description"
              ></textarea>
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-head-agency">Agency</label>
              <select id="revenue-head-agency" class="form-control">
                @if(isset($agency_list))
                @foreach($agency_list as $agency)
                    <option value="{{$agency['id']}}">{{$agency['label']}}</option>
                @endforeach
                @endif
              </select>
            </div>
            <button type="submit" id="revenue-head-submit" class="btn btn-primary mr-1 data-submit">Add</button>
            <button type="reset" id="revenue-head-cancel" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal for revenue head Ends-->
  </div>
  <!-- list section end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
<script>
var dtUserTable = $('.revenue-head-table'),
    newUserSidebar = $('.revenue-head-modal'),
    newUserForm = $('.revenue-head-form'),
    statusObj = {
        1: { title: 'Pending', class: 'badge-light-warning' },
        2: { title: 'Active', class: 'badge-light-success' },
        3: { title: 'Inactive', class: 'badge-light-secondary' }
    };

let revenueHeadData = {
    "name": "",
    "revenueCode": "",
    "description": "",
    "agencyId": null
}

var revenueHeadId = null;

var assetPath = '../../../app-assets/',
    userView = 'app-user-view.html',
    userEdit = 'app-user-edit.html';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    userView = assetPath + 'app/user/view';
    userEdit = assetPath + 'app/user/edit';
  }

function submitRevenue() {
    revenueHeadData.name = $('#revenue-head-name').val();
    revenueHeadData.revenueCode = $('#revenue-head-code').val();
    revenueHeadData.description = $('#revenue-head-description').val();
    revenueHeadData.agencyId = $('#revenue-head-agency').val();

    let submitStatus = $('#revenue-head-submit').text();
    if(submitStatus == 'Edit') {
        $.ajax({
            url: '/revenue-head',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": revenueHeadId,
                "data": revenueHeadData,
                "flag": submitStatus
            },
            success:function(resp) {
                $('#revenue-head-name').val('');
                $('#revenue-head-code').val('');
                $('#revenue-head-description').val('');
                $('#revenue-head-agency').val(null);
                newUserSidebar.modal('hide');
                toastr['success'](
                    'Successfully Edited!',
                    'SUCCESS!'
                );
                dtUserTable.DataTable().ajax.reload();
            },
            error:function(resp) {
                toastr['error'](
                    'Edit Failed!',
                    'ERROR!'
                );
            }
        });
    }else {
        $.ajax({
            url: '/revenue-head',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": revenueHeadId,
                "data": revenueHeadData,
                "flag": submitStatus
            },
            success:function(resp) {
                $('#revenue-head-name').val('');
                $('#revenue-head-code').val('');
                $('#revenue-head-description').val('');
                $('#revenue-head-agency').val(null);
                newUserSidebar.modal('hide');
                toastr['success'](
                    'Successfully Added!',
                    'SUCCESS!'
                );
                dtUserTable.DataTable().ajax.reload();
            },
            error:function(resp) {
                toastr['error'](
                    'Add Failed!',
                    'ERROR!'
                );
            }
        });
    }

}
function detailRevenue(data) {
    $('#revenue-head-name').val(data.name).attr('readonly', true);
    $('#revenue-head-code').val(data.revenueCode).attr('readonly', true);
    $('#revenue-head-description').val(data.description).attr('readonly', true);
    $('#revenue-head-agency').val(data.agency.id).attr('readonly', true);
    $('#revenue-head-submit').hide();
    $('#revenue-head-cancel').hide();
    newUserSidebar.modal('show');
}
function editRevenue(data) {
    revenueHeadId = data.id;
    $('#revenue-head-name').val(data.name).attr('readonly', false);
    $('#revenue-head-code').val(data.revenueCode).attr('readonly', false);
    $('#revenue-head-description').val(data.description).attr('readonly', false);
    $('#revenue-head-agency').val(data.agency.id).attr('readonly', false);
    $('#revenue-head-submit').show().text('Edit');
    $('#revenue-head-cancel').show();
    newUserSidebar.modal('show');
}
function deleteRevenue(data) {
    $.ajax({
        url: '/revenue-head',
        method: 'DELETE',
        data: {
            "_token": "{{ csrf_token() }}",
            "id": data.id
        },
        success:function(resp) {
            toastr['success'](
                'Successfully deleted!',
                'SUCCESS!'
            );
            dtUserTable.DataTable().ajax.reload();
        },
        error:function(resp) {
            toastr['error'](
                'Delete Failed!',
                'ERROR!'
            );
        }
    });
}

$(function () {
  'use strict';

   // Users List datatable
   if (dtUserTable.length) {
    dtUserTable.DataTable({
      ajax: assetPath + 'revenue-head/list',
      columns: [
        // columns according to JSON
        { data: 'name' },
        { data: 'revenueCode' },
        { data: 'description' },
        { data: '' },
        { data: '' }
      ],
      columnDefs: [
        {
          // Agency Id
          targets: 3,
          render: function (data, type, full, meta) {
            return "<span class='text-truncate align-middle'>" + full['agency']['label'] + '</span>';
          }
        },
        {
          // Actions
          targets: 4,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="btn-group">' +
              '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-right">' +
              "<a href='#' class='dropdown-item' onclick='detailRevenue("+
              JSON.stringify(full) +
              ")'>" +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Details</a>' +
              "<a href='#' class='dropdown-item' onclick='editRevenue("+
              JSON.stringify(full) +
              ")'>" +
              feather.icons['archive'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Edit</a>' +
              "<a href='#' class='dropdown-item' onclick='deleteRevenue("+
              JSON.stringify(full) +
              ")'>" +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Delete</a></div>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
        '<"col-lg-12 col-xl-6" l>' +
        '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'Add New Item',
          className: 'add-new btn btn-primary mt-50',
          attr: {
            'data-toggle': 'modal',
            'data-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          },
          action: function(e, dt, node, config) {
            $('#revenue-head-name').val('').attr('readonly', false);
            $('#revenue-head-code').val('').attr('readonly', false);
            $('#revenue-head-description').val('').attr('readonly', false);
            $('#revenue-head-agency').val(1).attr('readonly', false);
            $('#revenue-head-submit').show().text('Add');
            $('#revenue-head-cancel').show();
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['name'];
            }
          }),
          type: 'column',
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: 'table',
            columnDefs: [
              {
                targets: 2,
                visible: false
              },
              {
                targets: 3,
                visible: false
              }
            ]
          })
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      initComplete: function () {}
    });
  }

  // Check Validity
  function checkValidity(el) {
    if (el.validate().checkForm()) {
      submitBtn.attr('disabled', false);
    } else {
      submitBtn.attr('disabled', true);
    }
  }

  // Form Validation
  if (newUserForm.length) {
    newUserForm.validate({
      errorClass: 'error',
      rules: {
        'revenue-head-name': {
          required: true
        },
        'revenue-head-code': {
          required: true
        },
        'revenue-head-description': {
          required: true
        }
      }
    });

    newUserForm.on('submit', function (e) {
      e.preventDefault();
      var isValid = newUserForm.valid();
      if (isValid) {
        submitRevenue();
        newUserSidebar.modal('hide');
      }
    });
  }

  // To initialize tooltip with body container
  $('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body'
  });
});

</script>
@endsection
