/*=========================================================================================
    File Name: app-user-edit.js
    Description: User Edit page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  "use strict";

  var changePicture = $("#change-picture"),
    userAvatar = $(".user-avatar"),
    languageSelect = $("#users-language-select2"),
    form = $(".form-validate"),
    birthdayPickr = $(".birthdate-picker");

  // Change user profile picture
  let files = $('[name="profilePic"]');
  console.log(files);

  files.each(function () {
    $(this).on("change", function () {
      $(this).removeClass("is-invalid");
      getBase64($(this), function (base64Data, fileInput) {
        // Handle the base64-encoded data here
        fileInput[0].setAttribute("data-base64", base64Data);
        fileInput[0].setAttribute("data-fileType", fileInput[0].files[0].type);

        let image = $("#image");
        image[0].setAttribute(
          "src",
          "data:" + fileInput[0].files[0].type + ";base64," + base64Data
        );
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

  //checkbox logic

  let master_admin = $("[name='master_admin']");
  let super_admin = $("[name='super_admin']");

  master_admin.on("change", function () {
    var selectedOption = $('input[name="master_admin"]:checked').val();
    if (selectedOption == "1") {
      $("#super_admin_false").click();
    } else {
      $("#super_admin_true").click();
    }
  });

  super_admin.on("change", function () {
    var selectedOption = $('input[name="super_admin"]:checked').val();
    if (selectedOption == "1") {
      $("#master_admin_false").click();
    } else {
      $("#master_admin_true").click();
    }
  });

  // users language select
  if (languageSelect.length) {
    languageSelect.wrap('<div class="position-relative"></div>').select2({
      dropdownParent: languageSelect.parent(),
      dropdownAutoWidth: true,
      width: "100%",
    });
  }

  // Validation

  $("#remove_pic").on("click", function (e) {
    let profilePic = $("[name='profilePic']");
    let image = $("#image");
    profilePic[0].setAttribute("data-base64", "");
    profilePic[0].setAttribute("data-fileType", "");
    image[0].setAttribute("src", "");
  });

  $("#submit").on("click", function (event) {
    event.preventDefault();
    //validate data
    // get the fields
    let fullName = $("[name='fullName']");
    let phone = $("[name='phone']");
    let profilePic = $("[name='profilePic']");
    let role = $("[name='role']");
    let master_admin = $('input[name="master_admin"]:checked');
    let super_admin = $('input[name="super_admin"]:checked');
    let agency = $("[name='agency']");

    // reinitilise error message
    (() => {
      //reinitiliase errors
      fullName.removeClass("is-invalid");
      phone.removeClass("is-invalid");
    })();

    //setup validation
    let error = 0;

    (() => {
      if (fullName.val() == "") {
        fullName.addClass("is-invalid");
        error += 1;
      }

      if (phone.val() == "") {
        phone.addClass("is-invalid");
        error += 1;
      }
      /*
              if (profilePic.attr("data-base64") == "") {
                profilePic.addClass("is-invalid");
                error += 1;
              }
              */
    })();

    if (error == 0) {
      // proceed with submit

      if (parseInt(role.val()) == 1) {
        var jsonData = {
          fullName: fullName.val(),
          phone: phone.val(),
          profilePic: profilePic.attr("data-base64"),
          profilePicFiletype: profilePic.attr("data-fileType"),
          active: 1,
          roleId: parseInt(role.val()),
          isSuperAdmin: parseInt(super_admin.val()) == 1 ? true : false,
          isMasterAdmin: parseInt(master_admin.val()) == 1 ? true : false,
        };
      } else {
        var jsonData = {
          fullName: fullName.val(),
          phone: phone.val(),
          profilePic: profilePic.attr("data-base64"),
          profilePicFiletype: profilePic.attr("data-fileType"),
          active: 1,
          roleId: parseInt(role.val()),
          isSuperAdmin: parseInt(super_admin.val()) == 1 ? true : false,
          isMasterAdmin: parseInt(master_admin.val()) == 1 ? true : false,
          agencyId: parseInt(agency.val()),
        };
      }

      var payload = JSON.stringify(jsonData);

      //console.log(payload);
      function gotoUsers() {
        window.location.href = "/users";
      }

      $.post({
        url: "/v1/user/edit/" + fullName.attr("data-id"),
        contentType: "application/json",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: payload,
        success: function (response) {
          console.log("Request successful:", response);
          if (response.statusCode && response.statusCode !== 200) {
            alert("Error code 500");
          } else {
            toastr["success"]("Successfully Edited!", "SUCCESS!");

            window.setTimeout(gotoUsers, 4000); // 4 seconds
          }
        },
        error: function (xhr, status, error) {
          console.log("Request error:", error);
          alert("an error occured");
        },
      });
    }
  });
});
