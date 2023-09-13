// Class definition
var editUserValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("edit_user_form"),
            {
                fields: {
                    // username: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "This field is required.",
                    //         },
                    //         stringLength: {
                    //             min: 4,
                    //             max: 10,
                    //             message:
                    //                 "Must be maximum 10 & minimum 4 characters.",
                    //         },
                    //         regexp: {
                    //             regexp: "^[a-zA-Z0-9]*$",
                    //             message: "Must not have special characters.",
                    //         },
                    //     },
                    // },

                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                            regexp: {
                                regexp: "^[a-zA-Z0-9]*$",
                                message: "Must not have special characters.",
                            },
                        },
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                            regexp: {
                                regexp: "^[a-zA-Z0-9]*$",
                                message: "Must not have special characters.",
                            },
                        },
                    },
                    user_level_id: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    password: {
                        validators: {
                            // notEmpty: {
                            //     message: "This field is required.",
                            // },
                            stringLength: {
                                min: 4,
                                message: "Must be at least 4 characters.",
                            },
                        },
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                            emailAddress: {
                                message: "A valid email address is required.",
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
                    // file: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "This field is required.",
                    //         },
                    //     },
                    // },
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
                .getElementById("editUserSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("editUserSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#edit_user_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            var selectedID = formDatax.get('id');
            $.ajax({
                url: "/user/edit/"+selectedID,
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
                        $("#edit_user_form").trigger("reset");
                        // $('#edit_user_form [name="supervisor_id"]').val('').trigger('change');
                        // $('#edit_user_form [name="crm_user_group_id"]').val('').trigger('change');
                        // $('#edit_user_form [name="user_level_id"]').val('').trigger('change');
                        $("#editUser").modal("toggle");
                        $("#edit_user_form .userImagePreview").html("");
                        $("#user_dt").DataTable().ajax.reload();
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
                    $(".error-box").hide();
                    document
                        .getElementById("editUserSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editUserSubmitBtn"
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
                        .getElementById("editUserSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editUserSubmitBtn"
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
    editUserValidation.init();

    jQuery(document).off('click', '#edit_user_btn');
    jQuery(document).on('click', '#edit_user_btn', function(e) {
      var selectedID = $(this).data('id');
      var target = document.querySelector("#userModalContent");
      var blockUI = new KTBlockUI(target, {
          message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
      });
      blockUI.block();
      $.ajax({
        url: "/user/get/"+selectedID,
        type: "GET",
        contentType: false,
        cache: false,
        processData:false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data){
          blockUI.release();
          blockUI.destroy();
          var obj = JSON.parse(data);
          if(obj){
            $('#edit_user_form [name="id"]').val(obj.id);
            $('#edit_user_form [name="first_name"]').val(obj.first_name);
            $('#edit_user_form [name="last_name"]').val(obj.last_name);
            $('#edit_user_form [name="user_level_id"]').val(obj.user_level_id);
            $('#edit_user_form [name="email"]').val(obj.email);
            $('#edit_user_form [name="status"]').val(obj.status);
            // $('#edit_user_form .userImagePreview').html(`<img class="img-fluid" src="`+"/"+obj.avatar+`">`);
          } 
        }
      });
    });
});
