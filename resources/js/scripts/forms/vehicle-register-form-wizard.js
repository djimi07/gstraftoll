/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  "use strict";

  var bsStepper = document.querySelectorAll(".bs-stepper"),
    select = $(".select2"),
    horizontalWizard = document.querySelector(".horizontal-wizard-example"),
    verticalWizard = document.querySelector(".vertical-wizard-example"),
    modernWizard = document.querySelector(".modern-wizard-example"),
    modernVerticalWizard = document.querySelector(
      ".modern-vertical-wizard-example"
    );

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener("show.bs-stepper", function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find(".step").length - 1;
        var line = $(event.target).find(".step");

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add("crossed");

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove("crossed");
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove("crossed");
          }
          line[0].classList.remove("crossed");
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: "Select value",
      dropdownParent: $this.parent(),
    });
  });

  // Horizontal Wizard

  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find("form");
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          username: {
            required: true,
          },
          email: {
            required: true,
          },
          password: {
            required: true,
          },
          "confirm-password": {
            required: true,
            equalTo: "#password",
          },
          "first-name": {
            required: true,
          },
          "last-name": {
            required: true,
          },
          address: {
            required: true,
          },
          landmark: {
            required: true,
          },
          country: {
            required: true,
          },
          language: {
            required: true,
          },
          twitter: {
            required: true,
            url: true,
          },
          facebook: {
            required: true,
            url: true,
          },
          google: {
            required: true,
            url: true,
          },
          linkedin: {
            required: true,
            url: true,
          },
        },
      });
    });

    $(horizontalWizard)
      .find(".btn-next")
      .each(function () {
        $(this).on("click", function (e) {
          var isValid = $(this).parent().siblings("form").valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(horizontalWizard)
      .find(".btn-prev")
      .on("click", function () {
        numberedStepper.previous();
      });

    $(horizontalWizard)
      .find(".btn-submit")
      .on("click", function () {
        var isValid = $(this).parent().siblings("form").valid();
        if (isValid) {
          alert("Submitted..!!");
        }
      });
  }

  // Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof verticalWizard !== undefined && verticalWizard !== null) {
    var verticalStepper = new Stepper(verticalWizard, {
      linear: false,
    });
    $(verticalWizard)
      .find(".btn-next")
      .on("click", function () {
        verticalStepper.next();
      });
    $(verticalWizard)
      .find(".btn-prev")
      .on("click", function () {
        verticalStepper.previous();
      });

    $(verticalWizard)
      .find(".btn-submit")
      .on("click", function () {
        alert("Submitted..!!");
      });
  }

  // Modern Wizard
  // --------------------------------------------------------------------
  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false,
    });
    $(modernWizard)
      .find(".btn-next")
      .on("click", function () {
        //progress...

        var error = 0;

        var asin = $("[name='asin']");
        var name = $("[name='name']");
        var email = $("[name='email']");
        var vehicleRegistrationNumber = $("[name='vehicleRegistrationNumber']");
        var phone = $("[name='phone']");
        var physicalAddress = $("[name='physicalAddress']");
        var postalAddress = $("[name='postalAddress']");
        var identificationType = $("[name='identificationType']");
        var identificationNumber = $("[name='identificationNumber']");
        var drivingLicenseNumber = $("[name='drivingLicenseNumber']");
        var contactDetail = $("[name='contactDetail']");
        var vehicleType = $("[name='vehicleType']");
        var vehicleModel = $("[name='vehicleModel']");
        // var vehicleSize = $("[name='vehicleSize']");
         var vehicleColor = $("[name='vehicleColor']");
        var vehicleCapacityEngine = $("[name='vehicleCapacityEngine']");
        var vehicleCapacityPassenger = $("[name='vehicleCapacityPassenger']");
        var vehicleCapacityHaulage = $("[name='vehicleCapacityHaulage']");

        // reinitilise error message
        (() => {
          //reinitiliase errors
          asin.removeClass("is-invalid");
          name.removeClass("is-invalid");
          email.removeClass("is-invalid");
          vehicleRegistrationNumber.removeClass("is-invalid");
          phone.removeClass("is-invalid");
          physicalAddress.removeClass("is-invalid");
          postalAddress.removeClass("is-invalid");
          identificationType.removeClass("is-invalid");
          identificationNumber.removeClass("is-invalid");
          drivingLicenseNumber.removeClass("is-invalid");
          contactDetail.removeClass("is-invalid");
          vehicleType.removeClass("is-invalid");
          vehicleModel.removeClass("is-invalid");
          vehicleColor.removeClass("is-invalid");
          vehicleCapacityEngine.removeClass("is-invalid");
          vehicleCapacityPassenger.removeClass("is-invalid");
          vehicleCapacityHaulage.removeClass("is-invalid");
        })();

        //input validation
        (() => {
          // if (asin.val() == "") {
          //   asin.addClass("is-invalid");
          //   error += 1;
          // }

          if (name.val() == "") {
            name.addClass("is-invalid");
            error += 1;
          }

          /* if (email.val() == "") {
              email.addClass("is-invalid");
              error += 1;
            } */

          if (vehicleRegistrationNumber.val() == "") {
            vehicleRegistrationNumber.addClass("is-invalid");
            error += 1;
          }

          if (phone.val() == "") {
            phone.addClass("is-invalid");
            error += 1;
          }

            if (!GsTraftoll.isMobilePhone(phone.val())) {
                phone.addClass("is-invalid")
                $("#phoneError").text("Mobile Number must be 11 digits, starting with 0");
                error += 1;
            }
          if (physicalAddress.val() == "") {
            physicalAddress.addClass("is-invalid");
            error += 1;
          }

          /*

            if (postalAddress.val() == "") {
              postalAddress.addClass("is-invalid");
              error += 1;
            } */

          if (identificationType.val() == "") {
            identificationType.addClass("is-invalid");
            error += 1;
          }

          if (identificationNumber.val() == "") {
            identificationNumber.addClass("is-invalid");
            error += 1;
          }

          if (drivingLicenseNumber.val() == "") {
            drivingLicenseNumber.addClass("is-invalid");
            error += 1;
          }

          if (contactDetail.val() == "") {
            contactDetail.addClass("is-invalid");
            error += 1;
          }

          if (vehicleType.val() == "") {
            vehicleType.addClass("is-invalid");
            error += 1;
          }

          if (vehicleModel.val() == "") {
            vehicleModel.addClass("is-invalid");
            error += 1;
          }

          if (vehicleColor.val() == "") {
            vehicleColor.addClass("is-invalid");
            error += 1;
          }

          if (vehicleCapacityEngine.val() == "") {
            vehicleCapacityEngine.addClass("is-invalid");
            error += 1;
          }

          if (vehicleCapacityPassenger.val() == "") {
            vehicleCapacityPassenger.addClass("is-invalid");
            error += 1;
          }

          if (vehicleCapacityHaulage.val() == "") {
            vehicleCapacityHaulage.addClass("is-invalid");
            error += 1;
          }
        })();

        if (error == 0) {
          var formData = $("#form1").serializeArray();

          var jsonData = {};

          $.each(formData, function (index, element) {
            jsonData[element.name] = element.value;
          });

          var payload = JSON.stringify(jsonData);

          console.log(payload);

          $.post({
            url: "/v1/vehicle/register/applicants",
            contentType: "application/json",
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: payload,
            success: function (response) {
              console.log("Request successful:", response);

              if (
                response.description == "Vehicle applicant is enrolled already!"
              ) {
                // use another vehicule
                alert("Vehicle applicant is enrolled already!");
              } else if (response.status == 201) {
                $('input[name="vehicleId"]').val(response.data.id);
                modernStepper.next();
              } else {
                alert("error occured");
              }
            },
            error: function (xhr, status, error) {
              console.log("Request error:", error);
              alert("an error occured");
            },
          });
        }
      });

    $(modernWizard)
      .find(".btn-prev")
      .on("click", function () {
        modernStepper.previous();
      });

    // on change handler for file upload

    let files = $('#form2 input[type="file"]');

    files.each(function () {
      $(this).on("change", function () {
        $(this).removeClass("is-invalid");
        getBase64($(this), function (base64Data, fileInput) {
          // Handle the base64-encoded data here
          fileInput[0].setAttribute("data-base64", base64Data);
          fileInput[0].setAttribute(
            "data-fileType",
            fileInput[0].files[0].type
          );
        });
      });
    });

    /* -------- */

    $(modernWizard)
      .find(".btn-submit")
      .on("click", function (e) {
        e.preventDefault();

        let errors = 0; // initiate errors for 0

        let vehicleId = window.vehiculeId ? window.vehiculeId : null;

        let completedApplicationForm = $("[name='completedApplicationForm']");

        let validDriverLicense = $("[name='validDriverLicense']");

        let certificateOfRoadWorthiness = $(
          "[name='certificateOfRoadWorthiness']"
        );

        let vehicleCertificateOfOwnership = $(
          "[name='vehicleCertificateOfOwnership']"
        );

        let receiptOfApplicationAcknowledgement = $(
          "[name='receiptOfApplicationAcknowledgement']"
        );

        let supportingDocument1 = $("[name='supportingDocument1']");

        let supportingDocument2 = $("[name='supportingDocument2']");

        // data validation
        (() => {
          if ($('input[name="vehicleId"]').val() == "") {
            window.location.replace("/vehicles/register");
          }

          /*

            if (completedApplicationForm.val() == "") {
              completedApplicationForm.addClass("is-invalid");
              errors += 1;
            }
            if (validDriverLicense.val() == "") {
              validDriverLicense.addClass("is-invalid");
              errors += 1;
            }
            if (certificateOfRoadWorthiness.val() == "") {
              certificateOfRoadWorthiness.addClass("is-invalid");
              errors += 1;
            }
            if (vehicleCertificateOfOwnership.val() == "") {
              vehicleCertificateOfOwnership.addClass("is-invalid");
              errors += 1;
            }
            if (receiptOfApplicationAcknowledgement.val() == "") {
              receiptOfApplicationAcknowledgement.addClass("is-invalid");
              errors += 1;
            }
            if (supportingDocument1.val() == "") {
              supportingDocument1.addClass("is-invalid");
              errors += 1;
            }
            if (supportingDocument2.val() == "") {
              supportingDocument2.addClass("is-invalid");
              errors += 1;
            }

            */
        })();

        if (errors == 0) {
          let jsonData = {
            vehicleId: $('input[name="vehicleId"]').val(),

            completedApplicationForm:
              completedApplicationForm.attr("data-base64"),
            completedApplicationFormFiletype:
              completedApplicationForm.attr("data-fileType"),

            validDriverLicense: validDriverLicense.attr("data-base64"),
            validDriverLicenseFiletype:
              validDriverLicense.attr("data-fileType"),

            certificateOfRoadWorthiness:
              certificateOfRoadWorthiness.attr("data-base64"),
            certificateOfRoadWorthinessFiletype:
              certificateOfRoadWorthiness.attr("data-fileType"),

            vehicleCertificateOfOwnership:
              vehicleCertificateOfOwnership.attr("data-base64"),
            vehicleCertificateOfOwnershipFiletype:
              vehicleCertificateOfOwnership.attr("data-fileType"),

            receiptOfApplicationAcknowledgement:
              receiptOfApplicationAcknowledgement.attr("data-base64"),
            receiptOfApplicationAcknowledgementFiletype:
              receiptOfApplicationAcknowledgement.attr("data-fileType"),

            supportingDocument1: supportingDocument1.attr("data-base64"),
            supportingDocument1Filetype:
              supportingDocument1.attr("data-fileType"),

            supportingDocument2: supportingDocument2.attr("data-base64"),
            supportingDocument2Filetype:
              supportingDocument2.attr("data-fileType"),

            deleted: true,
          };

          var payload = JSON.stringify(jsonData);

          //console.log(payload);

          $.post({
            url: "/v1/vehicle/register/documents",
            contentType: "application/json",
            data: payload,
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
              console.log("Request successful:", response);
              if (response.status == 201) {
                alert("Submitted successfully");
                window.location.replace("/vehicles");
              } else if (response.status == 413) {
                alert("Files are over sized");
              }
            },
            error: function (xhr, status, error) {
              console.log("Request error:", error);
              //alert("an error occured");
            },
          });
        }
      });
  }

  // Modern Vertical Wizard
  // --------------------------------------------------------------------
  if (
    typeof modernVerticalWizard !== undefined &&
    modernVerticalWizard !== null
  ) {
    var modernVerticalStepper = new Stepper(modernVerticalWizard, {
      linear: false,
    });
    $(modernVerticalWizard)
      .find(".btn-next")
      .on("click", function () {
        modernVerticalStepper.next();
      });
    $(modernVerticalWizard)
      .find(".btn-prev")
      .on("click", function () {
        modernVerticalStepper.previous();
      });

    $(modernVerticalWizard)
      .find(".btn-submit")
      .on("click", function () {
        alert("Submitted..!!");
      });
  }

  function getBase64(fileInput, callback) {
    var reader = new FileReader();
    var file = fileInput[0].files[0];

    reader.onload = function () {
      var base64Data = reader.result.split(",")[1];
      callback(base64Data, fileInput);
    };

    reader.readAsDataURL(file);
  }
});
