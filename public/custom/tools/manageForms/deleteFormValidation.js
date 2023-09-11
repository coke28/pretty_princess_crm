$(document).ready(function (){

    jQuery(document).off('click', '#delete_form');
    jQuery(document).on('click', '#delete_form', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
        //makes sent data name in dt to lowercase
      //console.log($(this).data());
      Swal.fire({
          html: `Are you sure you want to delete ID: `+$(this).data('id')+` `+$(this).data('name')+`?`,
          icon: "info",
          buttonsStyling: false,
          showCancelButton: true,
          confirmButtonText: "Delete",
          cancelButtonText: 'Cancel',
          customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: 'btn btn-danger'
          }
      }).then(function (result) {

          if(result.isConfirmed){
            var target = document.querySelector("#form_dt");
            var blockUI = new KTBlockUI(target, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
            });
            blockUI.block();
            $.ajax({
              url: "/form/delete/"+id,
              type: "POST",
              contentType: false,
              cache: false,
              processData:false,
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              success: function (data){
                toastr.options = {
                 "closeButton": false,
                 "debug": false,
                 "newestOnTop": false,
                 "progressBar": false,
                 "positionClass": "toast-bottom-right",
                 "preventDuplicates": false,
                 "onclick": null,
                 "showDuration": "300",
                 "hideDuration": "1000",
                 "timeOut": "5000",
                 "extendedTimeOut": "1000",
                 "showEasing": "swing",
                 "hideEasing": "linear",
                 "showMethod": "fadeIn",
                 "hideMethod": "fadeOut"
               };

               toastr.success(data.message, "Success");
               blockUI.release();
               blockUI.destroy();
               $('#form_dt').DataTable().ajax.reload();
              }
            });
          }
      });

    });

  });
