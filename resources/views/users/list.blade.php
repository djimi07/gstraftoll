@extends('layouts/contentLayoutMaster')

@section('title', 'User List')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">
  
  <!-- users filter start -->
  <div class="card d-none">
    <h5 class="card-header">Search Filter</h5>
    <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
      <div class="col-md-4 user_role"></div>
      <div class="col-md-4 user_plan"></div>
      <div class="col-md-4 user_status"></div>
    </div>
  </div>
  <!-- users filter end -->

  <div class="row">
    <div class="col-12">
        <a href="#" data-toggle="modal" data-target="#modals-slide-in" class="btn btn-icon btn-primary waves-effect waves-float waves-light" type="button" data-repeater-create="">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Add new user</span>
        </a>
        <p></p>
    </div>
  </div>
  <!-- list section start -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">GSTraftoll  Users</h4>
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table">
        <thead class="thead-light">
          <tr>
            <th> #</th>
            <th>User</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            <tr id="tblError">
                <td id="tblInfo" colspan="8"> Loading Users ...</td>
            </tr>

        </tbody>

        <tfoot>
                        <tr>
                            <td colspan="9">
                                <div class="col-md-12 col-sm-12">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end mt-2">
                                                    <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                                    <li aria-current='page' class='page-item active'>
                                                        <a class='page-link'>1</a>
                                                    </li>
                                                    <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                                </ul>
                                            </nav>
                                </div>

                            </td>
                        </tr>
                        </tfoot>
      </table>
    </div>
    <!-- Modal to add new user starts-->


    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
      <div class="modal-dialog">
        <form id="add-user-form" class="add-new-user modal-content pt-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">New User</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="form-group">
              <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="fullName"
                name="fullName"
                aria-label="John Doe"
                aria-describedby="basic-icon-default-fullname2"
              />
            </div>

            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Email</label>
              <input
                type="text"
                id="email"
                class="form-control dt-email"
                aria-label="john.doe@example.com"
                aria-describedby="basic-icon-default-email2"
                name="email"
              />
              <small class="form-text text-muted">  </small>
            </div>

            <div class="form-group">
              <label class="form-label" for="user-role">Phone</label>
              <input
                type="text"
                id="phone"
                class="form-control dt-email"
                aria-label="john.doe@example.com"
                aria-describedby="basic-icon-default-email2"
                name="phone"
              />
            </div>

            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Password</label>
              <input
                type="password"
                id="password"
                class="form-control dt-email"
                aria-label="john.doe@example.com"
                aria-describedby="basic-icon-default-email2"
                name="password"
              />
              <small class="form-text text-muted">  </small>
            </div>

            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Confirm password</label>
              <input
                type="password"
                id="confirmPassword"
                class="form-control dt-email"
                aria-label="john.doe@example.com"
                aria-describedby="basic-icon-default-email2"
                name="confirmPassword"
              />
              <small class="form-text text-muted">  </small>
            </div>

            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Role</label>
                  <select name="role" id="role" class="form-control item-details">
                        <option value=""> -- Select Role -- </option>
                        @foreach ($roles->data as $role)
                            <option value="{{$role->id}}"> {{$role->name}}</option>
                        @endforeach
                  </select>
            </div>

            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Agency</label>
                  <select name="agency" id="agency" class="form-control item-details">
                        <option value="0"> -- Select agency -- </option>
                        @foreach ($agencies as $agency)
                            <option value="{{$agency->id}}"> {{$agency->name}}</option>
                        @endforeach
                  </select>
            </div>
            

            <div class="form-group mb-2">
              <label class="form-label" for="user-plan">Profile picture</label>
              <input
                type="file"
                id="profilePic"
                class="form-control dt-email"
                aria-label="john.doe@example.com"
                aria-describedby="basic-icon-default-email2"
                name="profilePic"
                data-base64=""
                data-fileType=""
              />
            </div>
            <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal to add new user Ends-->
  </div>
  <!-- list section end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}

  <script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>

  <script src="{{ asset(mix('js/scripts/pages/users-app-user-list.js')) }}"></script>

  <!-- Page js files -->


@endsection
