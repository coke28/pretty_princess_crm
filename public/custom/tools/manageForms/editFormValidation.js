// Class definition
var editFormValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("edit_form_form"),
            {
                fields: {
                    form_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    data_set: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    file_template_url: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },

                    status: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
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
                .getElementById("editFormSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("editFormSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#edit_form_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            var selectedID = formDatax.get("id");
            $.ajax({
                url: "/form/edit/"+selectedID,
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
                        $("#edit_form_form").trigger("reset");
                        $("#editForm").modal("toggle");
                        $("#form_dt").DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            text: data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                        // window.location.reload();
                    }
                    document
                        .getElementById("editFormSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editFormSubmitBtn"
                    ).disabled = false;
                    //  event.preventDefault();
                },
                error: function (response) {
                    // Handle BACK END validation errors and display them to the user
                    var errors = response.responseJSON.errors;
                    console.log(errors);
                    for (var field in errors) {
                        // Display errors for each field (e.g., in a div with the corresponding field name)
                        $("#" + field + "_error_edit").html(errors[field][0]);
                    }
                    document
                        .getElementById("editFormSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editFormSubmitBtn"
                    ).disabled = false;
                    // Show the error box
                    $(".error-box").show();
                },
            });
        });
    };
    return {
        // public functions
        init: function () {
            console.log("here");
            // form is binded and initiliazed here
            initDatatable();
        },
    };
})();

jQuery(document).ready(function () {
    //DONT FOGET THIS!!!
    editFormValidation.init();
    // event.preventDefault();
    jQuery(document).off("click", "#edit_form_btn");
    jQuery(document).on("click", "#edit_form_btn", function (e) {
        var selectedID = $(this).data("id");
        var target = document.querySelector("#formModalContent");
        var blockUI = new KTBlockUI(target, {
            message:
                '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
        });
        blockUI.block();
        $.ajax({
            url: "/form/get/"+selectedID,
            type: "GET",
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                blockUI.release();
                blockUI.destroy();
                var obj = JSON.parse(data);
                if (obj) {
                    $('#edit_form_form [name="id"]').val(obj.id);
                    $('#edit_form_form [name="form_name"]').val(obj.form_name);
                    $('#edit_form_form [name="data_set"]').val(obj.data_set);
                    $('#edit_form_form [name="file_template_url"]').val(
                        obj.file_template_url
                    );
                    $('#edit_form_form [name="status"]').val(obj.status);
                }
            },
        });
    });
});
