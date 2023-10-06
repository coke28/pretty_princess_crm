"use strict";

var currentRoleFilter = 0;
var dt;

// Class definition
var KTDatatablesServerSide = (function () {
    // Shared variables
    var table;

    var filterPayment;

    // alert("in ajax");

    // Private functions
    var initDatatable = function () {
        var leadTableRoute = $("#lead_dt").data("table-route");
        dt = $("#lead_dt").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            stateSave: false,
            dom:
                "<'row'<'col-sm-6 mt-0 mb-5'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-1 'l><'col-sm-4 mt-2'i><'col-sm-7'p>>",
            buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
            search: {
                input: $("#leadSearch"),
                key: "dtsearch",
            },
            ajax: {
                //   url: "/admin/userTB",
                url: leadTableRoute,
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader(
                        "X-CSRF-TOKEN",
                        $('meta[name="csrf-token"]').attr("content")
                    );
                },
                data: function (d) {
                    (d.campaign_name_filter = $("#campaign_name_filter").val()),
                    (d.campaign_group_filter = $("#campaign_group_filter").val()),
                    (d.location_filter = $("#location_filter").val()),
                    (d.category_filter = $("#category_filter").val()),
                    (d.email_sent_filter =$("#email_sent_filter").val());
                },
            },
            language: {
                lengthMenu: " _MENU_",
            },
            columns: [
                { data: "campaign_name" },
                { data: "company_name" },
                { data: "address" },
                { data: "email_address" },
                { data: "contact_information" },
                { data: "website" },
                { data: "instagram" },
                { data: "facebook" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 8,
                    orderable: false,
                    render: function (data, type, row) {
                        return (
                            `
                <a href="#" class="btn btn-primary btn-active-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                Actions
                <span class="svg-icon svg-icon-5 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                        </g>
                    </svg>
                </span>
            </a>
            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-docs-table-filter="edit_row" id="edit_lead_btn" data-id="` +
                            data.id +
                            `" data-bs-toggle="modal" data-bs-target="#editLead">
                        Edit
                    </a>
                </div>
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" id="delete_lead" data-id="` +
                            data.id +
                            `" data-email_address="` +
                            data.email_address +
                            `" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                        Delete
                    </a>
                </div>
                <!--end::Menu item-->
            </div>
          
        </div>
        <!--end::Menu-->

          
        `
                        );
                    },
                },
            ],
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on("draw", function () {
            KTMenu.createInstances();
        });
    };

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector("#leadSearch");
        filterSearch.addEventListener("keyup", function (e) {
            dt.search(e.target.value).draw();
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
        },
    };
})();


// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
    changeButtonStatus(false);


    jQuery(document).off("change", "#leadSearch");
    jQuery(document).on("change", "#leadSearch", function (e) {
        if ($(this).val().length == 0) {
            $("#lead_dt").DataTable().search($("#leadSearch").val()).draw();
        }
    });

    jQuery(document).off("click", ".clearInp");
    jQuery(document).on("click", ".clearInp", function (e) {
        e.preventDefault();
        $(this).closest(".input-group").find("input").val("").trigger("change");
    });

    jQuery(document).off("click", "#lead_filter_btn");
    jQuery(document).on("click", "#lead_filter_btn", function (e) {
        e.preventDefault();
        changeButtonStatus(true);
        dt.ajax.reload();
        changeButtonStatus(false);
    });

    jQuery(document).off("click", "#send_emails_btn");
    jQuery(document).on("click", "#send_emails_btn", function (e) {
        e.preventDefault();
        changeButtonStatus(true);

        var totalRecords = dt.page.info().recordsTotal;

        // Display the total number of records in the console or wherever you need
        if (totalRecords === 0 || totalRecords == null) {
            // Handle the case where there are no records
            Swal.fire({
                text: "There are no leads to send emails to.",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
            });
            changeButtonStatus(false);
            return; // Exit the function
        }
        var email_template_value = $("#email_template").val();
        if (email_template_value === null || email_template_value === undefined || email_template_value === "") {
            // Handle the case where there are no records
            Swal.fire({
                text: "Please Select an Email Template to Use!",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
            });
            changeButtonStatus(false);
            return; // Exit the function
        }


        Swal.fire({
            html:
                `Please confirm if you want send emails to the currently displayed leads. Number of leads to send emails to` +
                " " +
                totalRecords +
                ".",
            icon: "info",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger",
            },
        }).then(function (result) {
            if (result.isConfirmed) {
                  var target = document.querySelector("#lead_dt");
                  var blockUI = new KTBlockUI(target, {
                      message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
                  });
                  blockUI.block();
                $.ajax({
                    url: "/lead/send/",
                    type: "POST",
                    contentType: false,
                    cache: false,
                    processData: false,
                    search: {
                        input: $("#leadSearch"),
                        key: "dtsearch",
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: function (d) {
                        (d.campaign_name_filter = $("#campaign_name_filter").val()),
                        (d.campaign_group_filter = $("#campaign_group_filter").val()),
                        (d.location_filter = $("#location_filter").val()),
                        (d.category_filter = $("#category_filter").val()),
                        (d.email_sent_filter =$("#email_sent_filter").val());

                        (d.email_template =$("#email_template").val());

                    },
                    success: function (data) {
                        toastr.options = {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: false,
                            positionClass: "toast-bottom-right",
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "5000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };
                        data = JSON.parse(data);
                        toastr.success(data.message, "Success");
                         blockUI.release();
                         blockUI.destroy();
                        //  $('#lead_dt').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        // Handle BACK END validation errors and display them to the user
                        toastr.options = {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: false,
                            positionClass: "toast-bottom-right",
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "5000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };
                        data = JSON.parse(data);
                        toastr.error(data.message, "Fail");
                        blockUI.release();
                        blockUI.destroy();
                    },

                });
            }
        });
        changeButtonStatus(false);
    });

    function changeButtonStatus(boolean){
        document.getElementById("send_emails_btn").disabled = boolean;
        document.getElementById("lead_filter_btn").disabled = boolean;
    };

   
});
