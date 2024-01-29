$(function () {
    "use strict";
    var $lgaSelect = $('#lgas');

    var $revenueHeads = $('#revenueHeadCode');
    var $revenueItems = $('#revenueItem');
    var $vehicleId = $('#vehicleId');

    var asin = $("[name='asin']");
    var name = $("[name='name']");
    var email = $("[name='email']");
    var revenueHeadCode = $("[name='revenueHeadCode']");
    var revenueItem = $("[name='revenueItemCode']");
    var lga = $("[name='lga']");
    var vehicleRegistrationNumber = $("[name='vehicleRegistrationNumber']");
    var chasisNumber = $("[name='chasisNumber']");
    var engineNumber = $("[name='engineNumber']");
    var vehicleColor = $("[name='vehicleColor']");
    var paymentChannel = $("[name='paymentChannel']");
    var phone = $("[name='phone']");
    var contactAddress = $("[name='contactAddress']");


    var vehicleType = $("[name='vehicleType']");
    var vehicleModel = $("[name='vehicleModel']");

    var vehicleCapacityEngine = $("[name='vehicleCapacityEngine']");
    $.ajax(
        {
            url: GsTraftoll.url('v1/get-lgas?state=' + $('#stateName').val()),
            success: function (result) {
                // console.log(result);

                if ("data" in result == true) {

                    $lgaSelect.empty(); // remove old options
                    $lgaSelect.append($("<option value=''> --Select LGA---</option>"));

                    $.each(result.data.localGovts, function (index, lga) {
                        $lgaSelect.append($("<option> --Select---</option>")
                            .attr("value", lga.id).text(lga.localName));
                    });

                }

            },

            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $lgaSelect.empty();
                $lgaSelect.html($("<option>" + textStatus.toUpperCase() + " : " + errorThrown.toUpperCase() + "---</option>"));
                $('.btn-next').prop('disabled', true);

            }
        });

    $.ajax(
        {
            url: GsTraftoll.url('v1/get-revenue-items?type=all-compliance'),
            success: function (result) {

                if ("data" in result == true) {

                    $revenueItems.empty(); // remove old options
                    $revenueItems.append($("<option value=''> --Select Revenue Item---</option>"));

                    $.each(result.data, function (index, lga) {
                        $revenueItems.append($("<option value=''> --Select---</option>")
                            .attr("value", lga.code).text(lga.categoryLabel + ' [' + GsTraftoll.formatNumber(lga.amount / 100) + ']'));
                    });


                }

            },

            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $revenueItems.empty();
                $revenueItems.html($("<option value=''>" + textStatus.toUpperCase() + " : " + errorThrown.toUpperCase() + "---</option>"));
                $('.btn-next').prop('disabled', true);

            }
        });


    console.log($vehicleId.val());
    $.ajax(
        {
            url: GsTraftoll.url(`v1/capture/view/${$vehicleId.val()}`),
            success: function (result) {
                console.log(result);

                if ("data" in result == true && result.data !=  null) {
                    var $anprCapture = result.data;

                    vehicleRegistrationNumber.attr('value', $anprCapture.vehicleRegistrationNumber)

                }

            },

            error: function (XMLHttpRequest, textStatus, errorThrown) {console.log(textStatus)}
        });

    if( vehicleRegistrationNumber.val() == null ||  vehicleRegistrationNumber.val() == ""){


        $.ajax(
            {
                url: GsTraftoll.url(`v1/vehicle/view/${$vehicleId.val()}`),
                success: function (result) {
                    console.log(result);

                    if ("id" in result == true) {
                        var $anprCapture = result;

                        vehicleRegistrationNumber.attr('value', $anprCapture.vehicleRegistrationNumber)
                        name.attr('value', $anprCapture.name)
                        email.attr('value', $anprCapture.email)
                        phone.attr('value', $anprCapture.phone)
                        vehicleCapacityEngine.attr('value', $anprCapture.vehicleCapacityEngine)
                        vehicleType.val( $anprCapture.vehicleType).change()
                        vehicleColor.attr('value', $anprCapture.vehicleColor)
                        vehicleModel.attr('value', $anprCapture.vehicleModel)
                        contactAddress.attr('value', $anprCapture.physicalAddress)

                    }

                },

                error: function (XMLHttpRequest, textStatus, errorThrown) {console.log(textStatus)}
            });
        //vehicle api for car info
    }



    $revenueItems.change(function (e) {

        $.ajax(
            {
                url: GsTraftoll.url(`v1/get-revenue-items/${$revenueItems.val()}`),
                success: function (result) {
                    // console.log(result);

                    if ("data" in result == true) {

                        $revenueHeads.empty();
                        $revenueHeads.append(
                            $('<option>', {
                                value: result.data.revenueHead.revenueCode,
                                text:result.data.revenueHead.name
                            })
                        );


                    }

                },

                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $revenueHeads.empty();
                    $revenueHeads.html($("<option value=''>" + textStatus.toUpperCase() + " : " + errorThrown.toUpperCase() + "---</option>"));
                    $('.btn-next').prop('disabled', true);

                }
            });

    });

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


                // reinitilise error message
                (() => {
                    //reinitiliase errors
                    asin.removeClass("is-invalid");
                    name.removeClass("is-invalid");

                    phone.removeClass("is-invalid");
                    vehicleRegistrationNumber.removeClass("is-invalid");
                    phone.removeClass("is-invalid");
                    contactAddress.removeClass("is-invalid");
                    chasisNumber.removeClass("is-invalid");
                    engineNumber.removeClass("is-invalid");
                    vehicleColor.removeClass("is-invalid");
                    paymentChannel.removeClass("is-invalid");

                    vehicleType.removeClass("is-invalid");
                    vehicleModel.removeClass("is-invalid");
                    vehicleCapacityEngine.removeClass("is-invalid");
                    lga.removeClass("is-invalid");
                    revenueItem.removeClass("is-invalid");
                    revenueHeadCode.removeClass("is-invalid");


                })();

                //input validation
                (() => {


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

                    if (contactAddress.val() == "") {
                        contactAddress.addClass("is-invalid");
                        error += 1;
                    }


                    if (paymentChannel.val() == "") {
                        paymentChannel.addClass("is-invalid");
                        error += 1;
                    }

                    if (lga.val() == "") {
                        lga.addClass("is-invalid");
                        error += 1;
                    }

                    if (revenueItem.val() == "") {
                        revenueItem.addClass("is-invalid");
                        error += 1;
                    }
                    if (revenueHeadCode.val() == "") {
                        revenueHeadCode.addClass("is-invalid");
                        error += 1;
                    }

                    if (chasisNumber.val() == "") {
                        chasisNumber.addClass("is-invalid");
                        error += 1;
                    }

                    if (vehicleColor.val() == "") {
                        vehicleColor.addClass("is-invalid");
                        error += 1;
                    }
                    if (paymentChannel.val() == "") {
                        paymentChannel.addClass("is-invalid");
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

                    if (engineNumber.val() == "") {
                        engineNumber.addClass("is-invalid");
                        error += 1;
                    }

                    if (vehicleCapacityEngine.val() == "") {
                        vehicleCapacityEngine.addClass("is-invalid");
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
                        url: "/v1/invoices/create",
                        contentType: "application/json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: payload,
                        success: function (response) {
                            console.log("Request successful:", response);

                            if (response.status == 201) {

                                alert("Invoice Created!");
                                window.location.href = "/invoices";
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
