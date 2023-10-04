// Class definition
var uploadValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("upload_form"),
            {
                fields: {
                    campaign_name: {
                        validators: {
                            regexp: {
                                regexp: /^[a-zA-Z0-9\s,_\(\)\-]+$/,
                                message:
                                    "Only letters, numbers, space, comma, underscore, hyphen, and parentheses are allowed.",
                            },
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    // campaignGroup: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "This field is required.",
                    //         },
                    //     },
                    // },
                    location: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    category: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    file: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                            file: {
                                extension: "csv,xlsx,xls",
                                type: "application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv",
                                maxSize: 5 * 1024 * 1024, // 5 MB
                                message:
                                    "The selected file is not valid. Please upload a CSV or an EXCEL file.",
                            },
                        },
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    excluded: new FormValidation.plugins.Excluded({
                        excluded: function (field, element, elements) {
                            // field is the field name
                            // element is the field element
                            // elements is the list of field elements in case
                            // we have multiple elements with the same name
                            return $(element).is(":hidden");
                            // return true if you want to exclude the field
                        },
                    }),
                },
            }
        );

        // this function listens to the form validation
        fv.on("core.form.valid", function () {
            // Show loading indication

            document
                .getElementById("uploadSubmitBtn")
                .setAttribute("data-kt-indicator", "on");
            $("#uploadSubmitBtn").text("Please wait. Uploading...");
            // Disable button to avoid multiple click
            document.getElementById("uploadSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#upload_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            $.ajax({
                url: "/upload",
                type: "POST",
                data: formDatax,
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success) {
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
                        toastr.success(data.message, "Success");
                        $("#upload_form").trigger("reset");
                    }
                    $(".error-box").hide();
                    var campaignUploadLogTable = $(
                        "#campaign_upload_log_dt"
                    ).DataTable();
                    // Call ajax.reload() to refresh the table
                    campaignUploadLogTable.ajax.reload();
                },
                error: function (response) {
                    if (response.responseJSON.alert) {
                        Swal.fire({
                            text: response.responseJSON.error,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    } else {
                        // Handle BACK END validation errors and display them to the user
                        var errors = response.responseJSON.error;
                        console.log(errors);

                        var errorMessages = "<ul>";
                        errors.forEach(function (error) {
                            errorMessages +=
                                "<li>Error Occurred at row " +
                                error.row +
                                " for the attribute " +
                                error.attribute +
                                ". Error: " +
                                error.errors.join(", ") +
                                "</li>";
                        });
                        errorMessages += "</ul>";
                        // Display all error messages in the #error-message div
                        $("#error-message").html(errorMessages);
                        // Show the error box
                        $(".error-box").show();
                        $('#upload_form [name="file"]').val("");
                    }
                },
            });
         
            document.getElementById("uploadSubmitBtn").disabled = false;
            document
            .getElementById("uploadSubmitBtn")
            .setAttribute("data-kt-indicator", "off");
            $("#uploadSubmitBtn").text("Upload File");
        });
    };
    return {
        // public functions
        init: function () {
            // form is binded and initiliazed here
            initDatatable();
        },
    };
})();

var KTDatatablesServerSide = (function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

    // alert("in ajax");

    // Private functions
    var initDatatable = function () {
        var campaignUploadLogTableRoute = $("#campaign_upload_log_dt").data(
            "table-route"
        );
        dt = $("#campaign_upload_log_dt").DataTable({
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
                input: $("#campaignUploadLogSearch"),
                key: "dtsearch",
            },
            ajax: {
                url: campaignUploadLogTableRoute,
                type: "POST",
                beforeSend: function (request) {
                    request.setRequestHeader(
                        "X-CSRF-TOKEN",
                        $('meta[name="csrf-token"]').attr("content")
                    );
                },
            },
            language: {
                lengthMenu: " _MENU_",
            },
            columns: [
                { data: "id" },
                { data: "campaign_name" },
                { data: "campaign_uploader" },
                { data: "rows_uploaded" },
                { data: "created_at" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 5,
                    orderable: false,
                    render: function (data, type, row) {
                        return (
                            `
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" id="delete_campaign_upload_log" data-id="` +
                            data.id +
                            `" data-campaignname="` +
                            data.campaign_name +
                            `" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                    Delete Campaign and Leads!
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
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
        const filterSearch = document.querySelector("#campaignUploadLogSearch");
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

jQuery(document).ready(function () {
    document.getElementById("uploadSubmitBtn").disabled = false;
    //DONT FOGET THIS!!!
    uploadValidation.init();
    KTDatatablesServerSide.init();

    jQuery(document).off("change", "#campaignUploadLogSearch");
    jQuery(document).on("change", "#campaignUploadLogSearch", function (e) {
        if ($(this).val().length == 0) {
            $("#campaign_upload_log_dt")
                .DataTable()
                .search($("#campaignUploadLogSearch").val())
                .draw();
        }
    });

    jQuery(document).off("click", ".clearInp");
    jQuery(document).on("click", ".clearInp", function (e) {
        e.preventDefault();
        $(this).closest(".input-group").find("input").val("").trigger("change");
    });
});
