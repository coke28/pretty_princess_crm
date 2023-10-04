// Class definition
var editGroupValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("edit_group_form"),
            {
                fields: {
                    group_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    // group_description: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "This field is required.",
                    //         },
                    //     },
                    // },
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
                .getElementById("editGroupSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("editGroupSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#edit_group_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            var selectedID = formDatax.get("id");
            $.ajax({
                url: "/group/edit/"+selectedID,
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
                        $("#edit_group_form").trigger("reset");
                        $("#editGroup").modal("toggle");
                        $("#group_dt").DataTable().ajax.reload();
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
                        // window.group.reload();
                    }
                    $(".error-box").hide();
                    document
                        .getElementById("editGroupSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editGroupSubmitBtn"
                    ).disabled = false;
                    //  event.preventDefault();
                },
                error: function (response) {
                    // Handle BACK END validation errors and display them to the user
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        // Display errors for each field (e.g., in a div with the corresponding field name)
                        $("#" + field + "_error_edit").html(errors[field][0]);
                    }
                    document
                        .getElementById("editGroupSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editGroupSubmitBtn"
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
    editGroupValidation.init();
    // event.preventDefault();
    jQuery(document).off("click", "#edit_group_btn");
    jQuery(document).on("click", "#edit_group_btn", function (e) {
        $(".error-box").hide();
        var selectedID = $(this).data("id");
        var target = document.querySelector("#groupModalContent");
        var blockUI = new KTBlockUI(target, {
            message:
                '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
        });
        blockUI.block();
        $.ajax({
            url: "/group/get/"+selectedID,
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
                    $('#edit_group_form [name="id"]').val(obj.id);
                    $('#edit_group_form [name="group_name"]').val(obj.group_name);
                    $('#edit_group_form [name="group_description"]').val(obj.group_description);
                    $('#edit_group_form [name="status"]').val(obj.status);
                }
            },
        });
    });
});
