// Class definition
var addUserRoleValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("add_user_role_form"),
            {
                fields: {
                    first_name: {
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
                .getElementById("addUserRoleSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("addUserRoleSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#add_user_role_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            var userRoleAddRoute = $("#addUserRoleSubmitBtn").data(
                "user-role-add-route"
            );
            $.ajax({
                url: userRoleAddRoute,
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
                        $("#add_user_role_form").trigger("reset");
                        // $('#add_user_role_form [name="supervisor_id"]').val('').trigger('change');
                        // $('#add_user_role_form [name="crm_user_group_id"]').val('').trigger('change');
                        // $('#add_user_role_form [name="user_level_id"]').val('').trigger('change');
                        $("#addUserRole").modal("toggle");
                        $("#user_role_dt").DataTable().ajax.reload();
                        // $("#add_user_role_form .userImagePreview").html("");
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
                        .getElementById("addUserRoleSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "addUserRoleSubmitBtn"
                    ).disabled = false;
                    //  event.preventDefault();
                },
                error: function (response) {
                    // Handle BACK END validation errors and display them to the user
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        // Display errors for each field (e.g., in a div with the corresponding field name)
                        $("#" + field + "_error").html(errors[field][0]);
                    }
                    document
                        .getElementById("addUserRoleSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "addUserRoleSubmitBtn"
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
    addUserRoleValidation.init();
    // event.preventDefault();
    jQuery(document).off("change", '#add_user_role_form [type="checkbox"]');
    jQuery(document).on(
        "change",
        '#add_user_role_form [type="checkbox"]',
        function (e) {
            console.log($(this).is(":checkbox"));
            var thisname = $(this).attr("name");
            if ($(this).is(":checked")) {
                $("#add_user_role_form ." + thisname)
                    .slideDown(250)
                    .prop("checked", true);
            } else {
                $("#add_user_role_form ." + thisname)
                    .slideUp(250)
                    .prop("checked", false);
            }
        }
    );
});
