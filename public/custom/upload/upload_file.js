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
                    campaignGroup: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
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
                        // $('#add_user_form [name="supervisor_id"]').val('').trigger('change');
                        // $('#add_user_form [name="crm_user_group_id"]').val('').trigger('change');
                        // $('#add_user_form [name="user_level_id"]').val('').trigger('change');
                        //   $('#application_type_dt').DataTable().ajax.reload();
                    }
                    $(".error-box").hide();

                    document
                        .getElementById("uploadSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById("uploadSubmitBtn").disabled = false;
                    //  event.preventDefault();
                },
                error: function (response) {
                    // Handle BACK END validation errors and display them to the user
                    var errors = response.responseJSON.error;
                    console.log(errors);
                
                    var errorMessages = "<ul>";
                    errors.forEach(function(error) {
                        errorMessages += "<li>Error Occurred at row " + error.row +
                            " for the attribute " + error.attribute +
                            ". Error: " + error.errors.join(', ') + "</li>";
                    });
                    errorMessages += "</ul>";
                    console.log(errorMessages);
                
                    // Display all error messages in the #error-message div
                    $("#error-message").html(errorMessages);
                
                    // Show the error box
                    $(".error-box").show();
                    $('#upload_form [name="file"]').val('');

                    document
                        .getElementById("uploadSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById("uploadSubmitBtn").disabled = false;
                },
            });
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

jQuery(document).ready(function () {
    document
        .getElementById("uploadSubmitBtn")
        .setAttribute("data-kt-indicator", "on");
    document.getElementById("uploadSubmitBtn").disabled = false;
    //DONT FOGET THIS!!!
    uploadValidation.init();
});
