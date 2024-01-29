$(function () {
    "use strict";





    var modernWizard = document.querySelector(".modern-wizard-example");


    // Modern Wizard
    // --------------------------------------------------------------------
    if (typeof modernWizard !== undefined && modernWizard !== null) {
        var modernStepper = new Stepper(modernWizard, {
            linear: false,
        });
        $(modernWizard)
            .find(".btn-next")
            .on("click", function (e) {
                //progress...

                e.preventDefault();

                var error = 0;

                var phone = $("[name='receiverPhone']");
                var mesage = $("[name='message']");



                 // reinitilise error message
                (() => {
                    //reinitiliase errors
                    phone.removeClass("is-invalid");
                    mesage.removeClass("is-invalid");


                })();

                //input validation
                (() => {


                    if (mesage.val() == "") {
                        mesage.addClass("is-invalid");
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
                        url: "/v1/sms/create",
                        contentType: "application/json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: payload,
                        success: function (response) {
                            console.log("Request successful:", response);

                            if (response.status == 201) {

                                alert("Sms Created!");
                                window.location.href = "/sms";
                            } else {
                                alert("error occurred!");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log("Request error:", error);
                            alert("an error occurred!");
                        },
                    });
                }
            });
    }


});
