/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/

function deleteRow(e) {
  let id = $(e.target).attr("data-id");

  $.get({
    url: "/v1/user/delete/" + id,
    success: function (response) {
      console.log("Request successful:", response);
      if (response.status == 200) {
        window.location.replace("/users");
      } else {
      }
    },
    error: function (xhr, status, error) {
      console.log("Request error:", error);
      //alert("an error occured");
    },
  });
}

function editRedirection(e) {
  let id = $(e.target).attr("data-id");

  window.location = "/v1/user/edit/" + id;
}

$(function () {
  "use strict";

  var dtUserTable = $(".user-list-table"),
    newUserSidebar = $(".new-user-modal"),
    newUserForm = $(".add-new-user"),
    statusObj = {
      1: { title: "Pending", class: "badge-light-warning" },
      2: { title: "Active", class: "badge-light-success" },
      3: { title: "Inactive", class: "badge-light-secondary" },
    };

  var assetPath = "../../../app-assets/",
    userView = "app-user-view.html",
    userEdit = "app-user-edit.html";
  if ($("body").attr("data-framework") === "laravel") {
    assetPath = $("body").attr("data-asset-path");
    userView = assetPath + "app/user/view";
    userEdit = assetPath + "app/user/edit";
  }

  // Users List datatable
  /*
    if (dtUserTable.length) {
      dtUserTable.DataTable({
        ajax: assetPath + "data/user-list.json", // JSON file to add data
        columns: [
          // columns according to JSON
          { data: "responsive_id" },
          { data: "full_name" },
          { data: "email" },
          { data: "role" },
          { data: "current_plan" },
          { data: "status" },
          { data: "" },
        ],
        columnDefs: [
          {
            // For Responsive
            className: "control",
            orderable: false,
            responsivePriority: 2,
            targets: 0,
          },
          {
            // User full name and username
            targets: 1,
            responsivePriority: 4,
            render: function (data, type, full, meta) {
              var $name = full["full_name"],
                $uname = full["username"],
                $image = full["avatar"];
              if ($image) {
                // For Avatar image
                var $output =
                  '<img src="' +
                  assetPath +
                  "images/avatars/" +
                  $image +
                  '" alt="Avatar" height="32" width="32">';
              } else {
                // For Avatar badge
                var stateNum = Math.floor(Math.random() * 6) + 1;
                var states = [
                  "success",
                  "danger",
                  "warning",
                  "info",
                  "dark",
                  "primary",
                  "secondary",
                ];
                var $state = states[stateNum],
                  $name = full["full_name"],
                  $initials = $name.match(/\b\w/g) || [];
                $initials = (
                  ($initials.shift() || "") + ($initials.pop() || "")
                ).toUpperCase();
                $output = '<span class="avatar-content">' + $initials + "</span>";
              }
              var colorClass = $image === "" ? " bg-light-" + $state + " " : "";
              // Creates full output for row
              var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar-wrapper">' +
                '<div class="avatar ' +
                colorClass +
                ' mr-1">' +
                $output +
                "</div>" +
                "</div>" +
                '<div class="d-flex flex-column">' +
                '<a href="' +
                userView +
                '" class="user_name text-truncate"><span class="font-weight-bold">' +
                $name +
                "</span></a>" +
                '<small class="emp_post text-muted">@' +
                $uname +
                "</small>" +
                "</div>" +
                "</div>";
              return $row_output;
            },
          },
          {
            // User Role
            targets: 3,
            render: function (data, type, full, meta) {
              var $role = full["role"];
              var roleBadgeObj = {
                Subscriber: feather.icons["user"].toSvg({
                  class: "font-medium-3 text-primary mr-50",
                }),
                Author: feather.icons["settings"].toSvg({
                  class: "font-medium-3 text-warning mr-50",
                }),
                Maintainer: feather.icons["database"].toSvg({
                  class: "font-medium-3 text-success mr-50",
                }),
                Editor: feather.icons["edit-2"].toSvg({
                  class: "font-medium-3 text-info mr-50",
                }),
                Admin: feather.icons["slack"].toSvg({
                  class: "font-medium-3 text-danger mr-50",
                }),
              };
              return (
                "<span class='text-truncate align-middle'>" +
                roleBadgeObj[$role] +
                $role +
                "</span>"
              );
            },
          },
          {
            // User Status
            targets: 5,
            render: function (data, type, full, meta) {
              var $status = full["status"];

              return (
                '<span class="badge badge-pill ' +
                statusObj[$status].class +
                '" text-capitalized>' +
                statusObj[$status].title +
                "</span>"
              );
            },
          },
          {
            // Actions
            targets: -1,
            title: "Actions",
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<div class="btn-group">' +
                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                feather.icons["more-vertical"].toSvg({ class: "font-small-4" }) +
                "</a>" +
                '<div class="dropdown-menu dropdown-menu-right">' +
                '<a href="' +
                userView +
                '" class="dropdown-item">' +
                feather.icons["file-text"].toSvg({
                  class: "font-small-4 mr-50",
                }) +
                "Details</a>" +
                '<a href="' +
                userEdit +
                '" class="dropdown-item">' +
                feather.icons["archive"].toSvg({ class: "font-small-4 mr-50" }) +
                "Edit</a>" +
                '<a href="javascript:;" class="dropdown-item delete-record">' +
                feather.icons["trash-2"].toSvg({ class: "font-small-4 mr-50" }) +
                "Delete</a></div>" +
                "</div>" +
                "</div>"
              );
            },
          },
        ],
        order: [[2, "desc"]],
        dom:
          '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
          '<"col-lg-12 col-xl-6" l>' +
          '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
          ">t" +
          '<"d-flex justify-content-between mx-2 row mb-1"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          ">",
        language: {
          sLengthMenu: "Show _MENU_",
          search: "Search",
          searchPlaceholder: "Search..",
        },
        // Buttons with Dropdown
        buttons: [
          {
            text: "Add New User",
            className: "add-new btn btn-primary mt-50",
            attr: {
              "data-toggle": "modal",
              "data-target": "#modals-slide-in",
            },
            init: function (api, node, config) {
              $(node).removeClass("btn-secondary");
            },
          },
        ],
        // For responsive popup
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return "Details of " + data["full_name"];
              },
            }),
            type: "column",
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
              tableClass: "table",
              columnDefs: [
                {
                  targets: 2,
                  visible: false,
                },
                {
                  targets: 3,
                  visible: false,
                },
              ],
            }),
          },
        },
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: "&nbsp;",
            next: "&nbsp;",
          },
        },
        initComplete: function () {
          // Adding role filter once table initialized
          this.api()
            .columns(3)
            .every(function () {
              var column = this;
              var select = $(
                '<select id="UserRole" class="form-control text-capitalize mb-md-0 mb-2"><option value=""> Select Role </option></select>'
              )
                .appendTo(".user_role")
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  column.search(val ? "^" + val + "$" : "", true, false).draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' +
                      d +
                      '" class="text-capitalize">' +
                      d +
                      "</option>"
                  );
                });
            });
          // Adding plan filter once table initialized
          this.api()
            .columns(4)
            .every(function () {
              var column = this;
              var select = $(
                '<select id="UserPlan" class="form-control text-capitalize mb-md-0 mb-2"><option value=""> Select Plan </option></select>'
              )
                .appendTo(".user_plan")
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  column.search(val ? "^" + val + "$" : "", true, false).draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' +
                      d +
                      '" class="text-capitalize">' +
                      d +
                      "</option>"
                  );
                });
            });
          // Adding status filter once table initialized
          this.api()
            .columns(5)
            .every(function () {
              var column = this;
              var select = $(
                '<select id="FilterTransaction" class="form-control text-capitalize mb-md-0 mb-2xx"><option value=""> Select Status </option></select>'
              )
                .appendTo(".user_status")
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  column.search(val ? "^" + val + "$" : "", true, false).draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' +
                      statusObj[d].title +
                      '" class="text-capitalize">' +
                      statusObj[d].title +
                      "</option>"
                  );
                });
            });
        },
      });
    }
    */

  // Check Validity
  function checkValidity(el) {
    if (el.validate().checkForm()) {
      submitBtn.attr("disabled", false);
    } else {
      submitBtn.attr("disabled", true);
    }
  }

  // Form Validation
  if (newUserForm.length) {
    newUserForm.validate({
      errorClass: "error",
      rules: {
        "user-fullname": {
          required: true,
        },
        "user-name": {
          required: true,
        },
        "user-email": {
          required: true,
        },
      },
    });

    newUserForm.on("submit", function (e) {
      e.preventDefault();

      // get the fields
      let fullName = $("[name='fullName']");
      let email = $("[name='email']");
      let phone = $("[name='phone']");
      let password = $("[name='password']");
      let confirmPassword = $("[name='confirmPassword']");
      let profilePic = $("[name='profilePic']");
      let agency = $("[name='agency']");
      let role = $("[name='role']");

      // reinitilise error message
      (() => {
        //reinitiliase errors
        fullName.removeClass("is-invalid");
        email.removeClass("is-invalid");
        phone.removeClass("is-invalid");
        password.removeClass("is-invalid");
        confirmPassword.removeClass("is-invalid");
        profilePic.removeClass("is-invalid");
        role.removeClass("is-invalid");
      })();

      //setup validation
      let error = 0;

      (() => {
        if (fullName.val() == "") {
          fullName.addClass("is-invalid");
          error += 1;
        }

        if (
          email.val() == "" ||
          /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val()) ==
            false
        ) {
          email.addClass("is-invalid");
          error += 1;
        }

        if (phone.val() == "") {
          phone.addClass("is-invalid");
          error += 1;
        }

        if (password.val() == "") {
          password.addClass("is-invalid");
          error += 1;
        }

        if (confirmPassword.val() == "") {
          confirmPassword.addClass("is-invalid");
          error += 1;
        }

        if (role.val() == "") {
          role.addClass("is-invalid");
          error += 1;
        }

        /*

        if (profilePic.attr("data-base64") == "") {
          profilePic.addClass("is-invalid");
          error += 1;
        }

        */

        // check pass and pass confirm
        if (password.val() != confirmPassword.val()) {
          password.addClass("is-invalid");
          confirmPassword.addClass("is-invalid");
          error += 1;
        }
      })();

      if (error == 0) {
        // proceed with submit

        if (parseInt(role.val()) == 1) {
          var jsonData = {
            fullName: fullName.val(),
            email: email.val(),
            phone: phone.val(),
            password: password.val(),
            confirmPassword: confirmPassword.val(),
            profilePic: profilePic.attr("data-base64"),
            profilePicFiletype: profilePic.attr("data-fileType"),
            active: 0,
            roleId: parseInt(role.val()),
            isSuperAdmin: false,
            isMasterAdmin: true,
          };
        } else {
          var jsonData = {
            fullName: fullName.val(),
            email: email.val(),
            phone: phone.val(),
            password: password.val(),
            confirmPassword: confirmPassword.val(),
            profilePic: profilePic.attr("data-base64"),
            profilePicFiletype: profilePic.attr("data-fileType"),
            active: 0,
            roleId: parseInt(role.val()),
            isSuperAdmin: false,
            isMasterAdmin: true,
            agencyId: parseInt(agency.val()),
          };
        }

        var payload = JSON.stringify(jsonData);

        console.log(jsonData);

        $.post({
          url: "/v1/user/add/",
          contentType: "application/json",
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: payload,
          success: function (response) {
            console.log("Request successful:", response);
            if (response.description == "Email is already taken!") {
              alert("Email is already taken!");
            } else if (response.description == "Successfully created user") {
              alert("user created successfully");
              window.location.replace("/users");
              newUserSidebar.modal("hide");
            }
          },
          error: function (xhr, status, error) {
            console.log("Request error:", error);
            alert("an error occured");
          },
        });
      }
    });
  }

  // To initialize tooltip with body container
  $("body").tooltip({
    selector: '[data-toggle="tooltip"]',
    container: "body",
  });

  let files = $('[name="profilePic"]');

  files.each(function () {
    $(this).on("change", function () {
      $(this).removeClass("is-invalid");
      getBase64($(this), function (base64Data, fileInput) {
        // Handle the base64-encoded data here
        fileInput[0].setAttribute("data-base64", base64Data);
        fileInput[0].setAttribute("data-fileType", fileInput[0].files[0].type);
      });
    });
  });

  function getBase64(fileInput, callback) {
    var reader = new FileReader();
    var file = fileInput[0].files[0];

    reader.onload = function () {
      var base64Data = reader.result.split(",")[1];
      callback(base64Data, fileInput);
    };

    reader.readAsDataURL(file);
  }

  /*--------*/

  $.get({
    url: "/v1/list-users",

    success: function (response) {
      console.log("Request successful:", response);

      if (response.data) {
        $.each(response.data, function (index, anpr) {
          var row =
            "<tr>" +
            '<td><span class="font-weight-bold">' +
            (index + 1) +
            "</span></td>" +
            '<td><span class="font-weight-bold">' +
            anpr["fullName"] +
            "</span></td>" +
            " <td>" +
            anpr["email"] +
            "</td>" +
            "<td>" +
            anpr["phone"] +
            " </td>" +
            "<td>" +
            (anpr["role"] ? anpr["role"].description : "-") +
            "</td>" +
            "<td>" +
            (anpr["active"]
              ? "<span class='badge-light-success badge'>Active</span>"
              : "-");

          row +=
            '<td> <div class="d-flex align-items-center col-actions">' +
            '<div class="dropdown"><button type="button" class="btn btn-sm ' +
            'dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="14" ' +
            'height="14" viewBox="0 0 24 24" fill="none" ' +
            'stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">' +
            '<circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg> </button>' +
            '<div class="dropdown-menu">' +
            '<a onclick="editRedirection(event)" data-id=' +
            anpr["id"] +
            ' class="dropdown-item" href="javascript:void(0);"><span onclick="editRedirection(event)" data-id=' +
            anpr["id"] +
            ">Edit " +
            "</span> </a>" +
            '<a onclick="deleteRow(event)" data-id=' +
            anpr["id"] +
            ' class="dropdown-item" href="javascript:void(0);">' +
            '<span onclick="deleteRow(event)" data-id=' +
            anpr["id"] +
            ' class="delete_buttons">Delete</span></a></div>' +
            "</div></div></td>" +
            "</tr>";

          $("#tblError").remove();
          $("table").append(row);
        });
      }
    },
    error: function (xhr, status, error) {
      console.log("Request error:", error);
    },
  });
});
