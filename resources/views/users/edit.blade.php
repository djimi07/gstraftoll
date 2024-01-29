@extends('layouts/contentLayoutMaster')

@section('title', 'User Edit')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- users edit start -->
<section class="app-user-edit">
  <button type="button" class="btn btn-gradient-primary" onclick="window.location.href = '/users'"><- Back</button>
  <div class="card mt-1">
    <div class="card-body">
      <ul class="nav nav-pills" role="tablist">
        <!-- Deleted nav buttons -->
      </ul>
      <div class="tab-content">
        <!-- Account Tab starts -->
        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
          <!-- users edit media object start -->
          <div class="media mb-2">
            <img
              src="data:{{$user->data->profilePicFiletype}};base64,{{$user->data->profilePic}}"
              alt="users avatar"
              class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
              height="90"
              width="90"
              id="image"
            />
            <div class="media-body mt-50">
              <h4>{{$user->data->fullName}}</h4>
              <div class="col-12 d-flex mt-1 px-0">
                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                  <span class="d-none d-sm-block">Change</span>
                  <input
                    class="form-control"
                    type="file"
                    id="change-picture"
                    hidden
                    accept="image/png, image/jpeg, image/jpg"
                    id="profilePic"
                    name="profilePic"
                    data-base64="{{$user->data->profilePic}}"
                    data-fileType="{{$user->data->profilePicFiletype}}"
                  />
                  <span class="d-block d-sm-none">
                    <i class="mr-0" data-feather="edit"></i>
                  </span>
                </label>
                <button id="remove_pic" class="btn btn-outline-secondary d-none d-sm-block">Remove</button>
                <button class="btn btn-outline-secondary d-block d-sm-none">
                  <i class="mr-0" data-feather="trash-2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form class="form-validate">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="username">Full name</label>
                  <input
                    type="text"
                    class="form-control"
                    value="{{$user->data->fullName}}"
                    name="fullName"
                    id="fullName"
                    data-id="{{$user->data->id}}"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    value="{{$user->data->phone}}"
                    name="phone"
                    id="phone"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input
                    type="email"
                    class="form-control"
                    value="{{$user->data->email}}"
                    name="email"
                    id="email"
                    disabled
                  />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">Role</label>
                  <select name="role" id="role" class="form-control item-details">
                    @if (isset($user->data->role->name))
                        @foreach ($roles->data as $role)
                            <option value="{{$role->id}}" {{  $role->name == $user->data->role->name ? "selected" : null }} >{{$role->name}}</option>
                        @endforeach
                    @else
                        <option value="0" >---Select role---</option>
                        @foreach ($roles->data as $role)
                            <option value="{{$role->id}}" >{{$role->name}}</option>
                        @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label class="form-label" for="basic-icon-default-email">Agency</label>
                  <select name="agency" id="agency" class="form-control item-details">
                        @if (isset($user->data->agency->name))
                            @foreach ($agencies as $agency)
                                <option value="{{$agency->id}}" {{  $agency->name == $user->data->agency->name ? "selected" : null }} >{{$agency->name}}</option>
                            @endforeach
                        @else
                    
                            <option value="0"> -- Select agency -- </option>
                            @foreach ($agencies as $agency)
                                <option value="{{$agency->id}}">{{$agency->name}}</option>
                            @endforeach
                        @endif
                  </select>
              </div>

              <table class="table table-striped table-borderless mt-1">
                    <thead class="thead-light">
                      <tr>
                        <th></th>
                        <th>Yes</th>
                        <th>No</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Master Admin</td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="radio" name="master_admin" class="custom-control-input" id="master_admin_true" value="1" {{  $user->data->isMasterAdmin == true ? "checked" : null }} />
                            <label class="custom-control-label" for="master_admin_true"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="radio" name="master_admin" class="custom-control-input" id="master_admin_false" value="0"  {{  $user->data->isMasterAdmin == false ? "checked" : null }} />
                            <label class="custom-control-label" for="master_admin_false"></label>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>Super Admin</td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="radio" name="super_admin" class="custom-control-input" id="super_admin_true" value="1" {{  $user->data->isSuperAdmin == true ? "checked" : null }} />
                            <label class="custom-control-label" for="super_admin_true"></label>
                          </div>
                        </td>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="radio" name="super_admin" class="custom-control-input" id="super_admin_false" value="0" {{  $user->data->isSuperAdmin == false ? "checked" : null }}  />
                            <label class="custom-control-label" for="super_admin_false"></label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              
              <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                <button type="submit" id="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        <!-- Account Tab ends -->

      

      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/users-app-user-edit.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
@endsection
