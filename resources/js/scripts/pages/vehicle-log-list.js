function viewRedirection(e) {
  if (e.target.parentNode.tagName == "A") {
    var id = e.target.parentNode.getAttribute("data-id");
  } else if (e.target.parentNode.tagName == "svg") {
    var id = e.target.parentNode.parentNode.getAttribute("data-id");
  }

  window.location = "/v1/capture/view/" + id;
}

$(function () {
  "use strict";

  var dtInvoiceTable = $(".invoice-list-table"),
    assetPath = "../../../app-assets/",
    invoicePreview = "app-invoice-preview.html";

  if ($("body").attr("data-framework") === "laravel") {
    assetPath = $("body").attr("data-asset-path");
    invoicePreview = assetPath + "app/invoice/preview";
  }

  // datatable
  if (dtInvoiceTable.length) {
    var dtInvoice = dtInvoiceTable.DataTable({
      ajax: {
        url: GsTraftoll.url("v1/recent-capture"),
      },
      autoWidth: false,
      columns: [
        // columns according to JSON

        { data: "vehicleRegistrationNumber" },
        { data: "confidence" },
        { data: "location" },
        { data: "country" },
        { data: "primaryImage" },
        { data: "mloRegistered" },
        { data: "mloExpired" },
        { data: "timeIn" },
        { data: "" },
      ],
      pageLength: 25,
      columnDefs: [
        {
          // Client name and Service
          targets: 2,
          responsivePriority: 4,
          width: "80px",
          render: function (data, type, full, meta) {
            var $name = full["country"],
              $image = full["primaryImage"],
              stateNum = Math.floor(Math.random() * 6),
              states = [
                "success",
                "danger",
                "warning",
                "info",
                "primary",
                "secondary",
              ],
              $state = states[stateNum],
              $name = full["location"],
              $initials = $name.match(/\b\w/g) || [];
            $initials = (
              ($initials.shift() || "") + ($initials.pop() || "")
            ).toUpperCase();
            if ($image) {
              // For Avatar image
              var $output =
                '<img  src="data:image/png;base64,' +
                $image +
                '" alt="Plate Number" width="50"' +
                ' height="50">';
            } else {
              // For Avatar badge
              $output = '<div class="avatar-content">' + $initials + "</div>";
            }
            // Creates full output for row
            var colorClass = $image === "" ? " bg-light-" + $state + " " : " ";

            var $rowOutput =
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar' +
              colorClass +
              'mr-50">' +
              $output +
              "</div>" +
              "</div>" +
              '<div class="d-flex flex-column">' +
              '<h6 class="user-name text-truncate mb-0">' +
              $name +
              "</h6>" +
              "</div>" +
              "</div>";
            return $rowOutput;
          },
        },

        {
          // Due Date
          targets: 4,
          width: "70px",
          render: function (data, type, full, meta) {
            var $dueDate = new Date(full["timeIn"]);
            // Creates full output for row
            var $rowOutput =
              '<span class="d-none">' +
              moment($dueDate).format("YYYYMMDD HH:ss") +
              "</span>" +
              moment($dueDate).format("DD MMM YYYY HH:ss a");
            $dueDate;
            return $rowOutput;
          },
        },
        {
          targets: 5,
          width: "25px",
          render: function (data, type, full, meta) {
            var $total = full["mloRegistered"] == "false" ? "Yes" : "No";
            return '<span class="d-none">' + $total + "</span>" + $total;
          },
        },

        {
          targets: 6,
          width: "25px",
          render: function (data, type, full, meta) {
            var $total = full["mloExpired"] == "false" ? "Yes" : "No";
            return '<span class="d-none">' + $total + "</span>" + $total;
          },
        },
        {
          targets: 7,
          visible: false,
        },

        {
          // Actions
          targets: -1,
          title: "Actions",
          width: "80px",
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center col-actions">' +
              '<a class="mr-1" href="javascript:void(0);" onclick="viewRedirection(event)" data-id=' +
              full["id"] +
              '  data-toggle="tooltip" data-placement="top" title="Captured Image">' +
              feather.icons["eye"].toSvg({ class: "font-medium-2" }) +
              "</a>" +
              '<div class="dropdown">' +
              '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
              feather.icons["more-vertical"].toSvg({ class: "font-medium-2" }) +
              "</a>" +
              '<div class="dropdown-menu dropdown-menu-right">' +
              '<a href="/invoices/create/violations?logId='+ full["id"]+ '" class="dropdown-item">' +
              feather.icons["alert-triangle"].toSvg({
                class: "font-small-4 mr-50",
              }) +
              " Offence</a>" +
              '<a href="/invoices/create/compliance?logId='+ full["id"]+ '" class="dropdown-item">' +
              feather.icons["alert-triangle"].toSvg({
                class: "font-small-4 mr-50",
              }) +
              " Compliance</a>" +
              '<a href="javascript:void(0);" class="dropdown-item">' +
              feather.icons["trash"].toSvg({ class: "font-small-4 mr-50" }) +
              "Delete</a>" +
              "</div>" +
              "</div>" +
              "</div>"
            );
          },
        },
      ],
      order: [[1, "desc"]],
      dom:
        '<"row d-flex justify-content-between align-items-center m-1"' +
        '<"col-lg-6 d-flex align-items-center"l<"dt-action-buttons text-xl-right text-lg-left text-lg-right text-left "B>>' +
        '<"col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0"f<"invoice_status ml-sm-2">>' +
        ">t" +
        '<"d-flex justify-content-between mx-2 row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        ">",
      language: {
        sLengthMenu: "Show _MENU_",
        search: "Search",
        searchPlaceholder: "Search Vehicle Registration",
        paginate: {
          // remove previous & next text from pagination
          previous: "&nbsp;",
          next: "&nbsp;",
        },
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: "Create Invoice",
          className: "btn btn-primary btn-add-record ml-2",
          action: function (e, dt, button, config) {
            window.location = "/invoices/create";
          },
        },
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return "Details of " + data["vehicleRegistrationNumber"];
            },
          }),
          type: "column",
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table",
            columnDefs: [
              // {
              //   targets: 6,
              //   visible: false
              // },
            ],
          }),
        },
      },
      initComplete: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
      },
      drawCallback: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
      },
    });
  }
});
