@extends('layouts/contentLayoutMaster')

@section('title', 'Revenue Item')

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
<!-- item list start -->
<section class="revenue-item-list">
  <!-- list section start -->
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <table class="revenue-item-table table">
      <thead class="thead-light">
          <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Description</th>
            <th>Additional</th>
            <th>Point</th>
            <th>Item Classification</th>
            <th>Item Duration</th>
            <th>Amount</th>
            <th>Category Label</th>
            <th>Revenue Head</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Modal for revenue item starts-->
    <div class="modal modal-slide-in revenue-item-modal fade" id="modals-slide-in">
      <div class="modal-dialog">
        <form class="revenue-item-form modal-content pt-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Revenue Item</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="form-group">
              <label class="form-label" for="revenue-item-name"> Name</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="revenue-item-name"
                placeholder="Driving without licence"
                name="revenue-item-name"

                aria-describedby="revenue-item-name2"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-code">Code</label>
              <input
                type="text"
                id="revenue-item-code"
                class="form-control dt-code"
                placeholder="xxxxxxxx"
                aria-label="jdoe1"
                aria-describedby="revenue-item-code2"
                name="revenue-item-code"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-description">Description</label>
              <textarea
                type="text"
                id="revenue-item-description"
                class="form-control dt-description"
                aria-label="john.doe@example.com"
                aria-describedby="revenue-item-description2"
                name="revenue-item-description"
              ></textarea>
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-additional">Additional</label>
              <input
                type="text"
                id="revenue-item-additional"
                class="form-control dt-additional"
                placeholder="xxxxxxxx"
                aria-label="jdoe1"
                aria-describedby="revenue-item-additional2"
                name="revenue-item-additional"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-point">Point</label>
              <input
                type="number"
                id="revenue-item-point"
                class="form-control dt-point"
                placeholder="xxxxxxxx"


                name="revenue-item-point"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-classification">Item Classification</label>

                <select id="revenue-item-classification"  class="form-control dt-classification"

                        name="revenue-item-classification">
                    <option value="">--SELECT</option>
                    <option value="OFFENCE">OFFENCE</option>
                    <option value="COMPLIANCE">COMPLIANCE</option>

                </select>
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-duration">Item Duration</label>
              <select id="revenue-item-duration" class="form-control">
                <option value="" >--SELECT--</option>
                <option value="DAILY">DAILY</option>
                <option value="WEEKLY">WEEKLY</option>
                <option value="MONTHLY">MONTHLY</option>
                <option value="ANNUAL">ANNUAL</option>
                <option value="NOT_APPLICABLE">NOT_APPLICABLE</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-amount">Amount</label>
              <input
                type="number" step=".01"
                id="revenue-item-amount"
                class="form-control dt-amount"
                placeholder="xxxxxxxx"
                aria-label="jdoe1"
                aria-describedby="revenue-item-amount2"
                name="revenue-item-amount"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-item-category-label">Category Label</label>
              <input
                type="text"
                id="revenue-item-category-label"
                class="form-control dt-category-label"
                placeholder="UNI-LABEL"
                maxlength="20"
                aria-describedby="revenue-item-category-label2"
                name="revenue-item-category-label"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="revenue-head-agency">Revenue Head</label>
              <select id="revenue-head-id" class="form-control">
                @if(isset($revenue_head))
                @foreach($revenue_head as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
                @endif
              </select>
            </div>
            <button type="submit" id="revenue-item-submit" class="btn btn-primary mr-1 data-submit">Add</button>
            <button type="reset" id="revenue-item-cancel" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal for revenue item Ends-->
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
var dtUserTable = $('.revenue-item-table'),
    newUserSidebar = $('.revenue-item-modal'),
    newUserForm = $('.revenue-item-form'),
    statusObj = {
        1: { title: 'Pending', class: 'badge-light-warning' },
        2: { title: 'Active', class: 'badge-light-success' },
        3: { title: 'Inactive', class: 'badge-light-secondary' }
    };

let revenueItemData = {
    "name": "",
    "code": "",
    "description": "",
    "additional": "",
    "point": "",
    "itemClassification": "",
    "itemDuration": "",
    "amount": "",
    "categoryLabel": "",
    "revenueHeadId": null
}

var revenueItemId = null;

var assetPath = '../../../app-assets/',
    userView = 'app-user-view.html',
    userEdit = 'app-user-edit.html';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    userView = assetPath + 'app/user/view';
    userEdit = assetPath + 'app/user/edit';
  }

function submitRevenue() {
    revenueItemData.name = $('#revenue-item-name').val();
    revenueItemData.code = $('#revenue-item-code').val();
    revenueItemData.description = $('#revenue-item-description').val();
    revenueItemData.additional = $('#revenue-item-additional').val();
    revenueItemData.point = $('#revenue-item-point').val();
    revenueItemData.itemClassification = $('#revenue-item-classification').val();
    revenueItemData.itemDuration = $('#revenue-item-duration').val();
    revenueItemData.amount = $('#revenue-item-amount').val();
    revenueItemData.categoryLabel = $('#revenue-item-category-label').val();
    revenueItemData.revenueHeadId = $('#revenue-head-id').val();

    let submitStatus = $('#revenue-item-submit').text();
    if(submitStatus == 'Edit') {
        $.ajax({
            url: '/revenue-item',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": revenueItemId,
                "data": revenueItemData,
                "flag": submitStatus
            },
            success:function(resp) {
                $('#revenue-item-name').val(null);
                $('#revenue-item-code').val(null);
                $('#revenue-item-description').val(null);
                $('#revenue-item-additional').val(null);
                $('#revenue-item-point').val(null);
                $('#revenue-item-classification').val(null);
                $('#revenue-item-duration').val(null);
                $('#revenue-item-amount').val(null);
                $('#revenue-item-category-label').val(null);
                $('#revenue-head-id').val(null);
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
            url: '/revenue-item',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": revenueItemId,
                "data": revenueItemData,
                "flag": submitStatus
            },
            success:function(resp) {
                $('#revenue-item-name').val(null);
                $('#revenue-item-code').val(null);
                $('#revenue-item-description').val(null);
                $('#revenue-item-additional').val(null);
                $('#revenue-item-point').val(null);
                $('#revenue-item-classification').val(null);
                $('#revenue-item-duration').val(null);
                $('#revenue-item-amount').val(null);
                $('#revenue-item-category-label').val(null);
                $('#revenue-head-id').val(null);
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
    $('#revenue-item-name').val(data.name).attr('readonly', true);
    $('#revenue-item-code').val(data.code).attr('readonly', true);
    $('#revenue-item-description').val(data.description).attr('readonly', true);
    $('#revenue-item-additional').val(data.additional).attr('readonly', true);
    $('#revenue-item-point').val(data.point).attr('readonly', true);
    $('#revenue-item-classification').val(data.itemClassification).attr('readonly', true);
    $('#revenue-item-duration').val(data.itemDuration).attr('readonly', true);
    $('#revenue-item-amount').val(data.amount).attr('readonly', true);
    $('#revenue-item-category-label').val(data.categoryLabel).attr('readonly', true);
    $('#revenue-head-id').val(data.revenueHead.id).attr('readonly', true);
    $('#revenue-item-submit').hide();
    $('#revenue-item-cancel').hide();
    newUserSidebar.modal('show');
}
function editRevenue(data) {
    revenueItemId = data.id;
    $('#revenue-item-name').val(data.name).attr('readonly', false);
    $('#revenue-item-code').val(data.code).attr('readonly', false);
    $('#revenue-item-description').val(data.description).attr('readonly', false);
    $('#revenue-item-additional').val(data.additional).attr('readonly', false);
    $('#revenue-item-point').val(data.point).attr('readonly', false);
    $('#revenue-item-classification').val(data.itemClassification).attr('readonly', false);
    $('#revenue-item-duration').val(data.itemDuration).attr('readonly', false);
    $('#revenue-item-amount').val(data.amount).attr('readonly', false);
    $('#revenue-item-category-label').val(data.categoryLabel).attr('readonly', false);
    $('#revenue-head-id').val(data.revenueHead.id).attr('readonly', false);
    $('#revenue-item-submit').show().text('Edit');
    $('#revenue-item-cancel').show();
    newUserSidebar.modal('show');
}
function deleteRevenue(data) {
    $.ajax({
        url: '/revenue-item',
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
      ajax: assetPath + 'revenue-item/list',
      columns: [
        // columns according to JSON
        { data: 'name' },
        { data: 'code' },
        { data: 'description' },
        { data: 'additional' },
        { data: 'point' },
        { data: 'itemClassification' },
        { data: 'itemDuration' },
        { data: 'amount' },
        { data: 'categoryLabel' },
        { data: '' },
        { data: '' }
      ],
      columnDefs: [

          {
              // Revenue Head Id
              targets: 7,
              render: function (data, type, full, meta) {
                  return "<span class='text-truncate align-middle'>" + GsTraftoll.formatMoneyAmount(
                      full['amount'] /100)+
                      '</span>';
              }
          },
        {
          // Revenue Head Id
          targets: 9,
          render: function (data, type, full, meta) {
            return "<span class='text-truncate align-middle'>" + full['revenueHead']['name'] + '</span>';
          }
        },
        {
          // Actions
          targets: 10,
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
            $('#revenue-item-name').val('').attr('readonly', false);
            $('#revenue-item-code').val('').attr('readonly', false);
            $('#revenue-item-description').val('').attr('readonly', false);
            $('#revenue-item-additional').val('').attr('readonly', false);
            $('#revenue-item-point').val('').attr('readonly', false);
            $('#revenue-item-classification').val('').attr('readonly', false);
            $('#revenue-item-duration').val('').attr('readonly', false);
            $('#revenue-item-amount').val('').attr('readonly', false);
            $('#revenue-item-category-label').val('').attr('readonly', false);
            $('#revenue-item-submit').show().text('Add');
            $('#revenue-item-cancel').show();
          }
        }
      ],
      // For responsive popup
      responsive: false,
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
        'revenue-item-name': {
          required: true
        },
        'revenue-item-code': {
          required: true
        },
        'revenue-item-description': {
          required: false
        },
        'revenue-item-additional': {
          required: false
        },
        'revenue-item-point': {
          required: true
        },
        'revenue-item-classification': {
          required: true
        },
        'revenue-item-duration': {
          required: true
        },
        'revenue-item-amount': {
          required: true
        },
        'revenue-item-category-label': {
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
