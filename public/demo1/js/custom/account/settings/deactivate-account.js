/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/demo1/js/custom/account/settings/deactivate-account.js":
/*!*********************************************************************************!*\
  !*** ./resources/assets/demo1/js/custom/account/settings/deactivate-account.js ***!
  \*********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTAccountSettingsDeactivateAccount = function () {\n  // Private variables\n  var form;\n  var validation;\n  var submitButton; // Private functions\n\n  var initValidation = function initValidation() {\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    validation = FormValidation.formValidation(form, {\n      fields: {\n        deactivate: {\n          validators: {\n            notEmpty: {\n              message: 'Please check the box to deactivate your account'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger(),\n        submitButton: new FormValidation.plugins.SubmitButton(),\n        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation\n        bootstrap: new FormValidation.plugins.Bootstrap5({\n          rowSelector: '.fv-row',\n          eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    });\n  };\n\n  var handleForm = function handleForm() {\n    submitButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      validation.validate().then(function (status) {\n        if (status == 'Valid') {\n          swal.fire({\n            text: \"Are you sure you would like to deactivate your account?\",\n            icon: \"warning\",\n            buttonsStyling: false,\n            showDenyButton: true,\n            confirmButtonText: \"Yes\",\n            denyButtonText: 'No',\n            customClass: {\n              confirmButton: \"btn btn-light-primary\",\n              denyButton: \"btn btn-danger\"\n            }\n          }).then(function (result) {\n            if (result.isConfirmed) {\n              Swal.fire({\n                text: 'Your account has been deactivated.',\n                icon: 'success',\n                confirmButtonText: \"Ok\",\n                buttonsStyling: false,\n                customClass: {\n                  confirmButton: \"btn btn-light-primary\"\n                }\n              });\n            } else if (result.isDenied) {\n              Swal.fire({\n                text: 'Account not deactivated.',\n                icon: 'info',\n                confirmButtonText: \"Ok\",\n                buttonsStyling: false,\n                customClass: {\n                  confirmButton: \"btn btn-light-primary\"\n                }\n              });\n            }\n          });\n        } else {\n          swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-light-primary\"\n            }\n          });\n        }\n      });\n    });\n  }; // Public methods\n\n\n  return {\n    init: function init() {\n      form = document.querySelector('#kt_account_deactivate_form');\n      submitButton = document.querySelector('#kt_account_deactivate_account_submit');\n      initValidation();\n      handleForm();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTAccountSettingsDeactivateAccount.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2RlbW8xL2pzL2N1c3RvbS9hY2NvdW50L3NldHRpbmdzL2RlYWN0aXZhdGUtYWNjb3VudC5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxrQ0FBa0MsR0FBRyxZQUFZO0FBQ2pEO0FBQ0EsTUFBSUMsSUFBSjtBQUNBLE1BQUlDLFVBQUo7QUFDQSxNQUFJQyxZQUFKLENBSmlELENBTWpEOztBQUNBLE1BQUlDLGNBQWMsR0FBRyxTQUFqQkEsY0FBaUIsR0FBWTtBQUM3QjtBQUNBRixJQUFBQSxVQUFVLEdBQUdHLGNBQWMsQ0FBQ0MsY0FBZixDQUNUTCxJQURTLEVBRVQ7QUFDSU0sTUFBQUEsTUFBTSxFQUFFO0FBQ0pDLFFBQUFBLFVBQVUsRUFBRTtBQUNSQyxVQUFBQSxVQUFVLEVBQUU7QUFDUkMsWUFBQUEsUUFBUSxFQUFFO0FBQ05DLGNBQUFBLE9BQU8sRUFBRTtBQURIO0FBREY7QUFESjtBQURSLE9BRFo7QUFVSUMsTUFBQUEsT0FBTyxFQUFFO0FBQ0xDLFFBQUFBLE9BQU8sRUFBRSxJQUFJUixjQUFjLENBQUNPLE9BQWYsQ0FBdUJFLE9BQTNCLEVBREo7QUFFTFgsUUFBQUEsWUFBWSxFQUFFLElBQUlFLGNBQWMsQ0FBQ08sT0FBZixDQUF1QkcsWUFBM0IsRUFGVDtBQUdMO0FBQ0FDLFFBQUFBLFNBQVMsRUFBRSxJQUFJWCxjQUFjLENBQUNPLE9BQWYsQ0FBdUJLLFVBQTNCLENBQXNDO0FBQzdDQyxVQUFBQSxXQUFXLEVBQUUsU0FEZ0M7QUFFN0NDLFVBQUFBLGVBQWUsRUFBRSxFQUY0QjtBQUc3Q0MsVUFBQUEsYUFBYSxFQUFFO0FBSDhCLFNBQXRDO0FBSk47QUFWYixLQUZTLENBQWI7QUF3QkgsR0ExQkQ7O0FBNEJBLE1BQUlDLFVBQVUsR0FBRyxTQUFiQSxVQUFhLEdBQVk7QUFDekJsQixJQUFBQSxZQUFZLENBQUNtQixnQkFBYixDQUE4QixPQUE5QixFQUF1QyxVQUFVQyxDQUFWLEVBQWE7QUFDaERBLE1BQUFBLENBQUMsQ0FBQ0MsY0FBRjtBQUVBdEIsTUFBQUEsVUFBVSxDQUFDdUIsUUFBWCxHQUFzQkMsSUFBdEIsQ0FBMkIsVUFBVUMsTUFBVixFQUFrQjtBQUN6QyxZQUFJQSxNQUFNLElBQUksT0FBZCxFQUF1QjtBQUVuQkMsVUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVU7QUFDTkMsWUFBQUEsSUFBSSxFQUFFLHlEQURBO0FBRU5DLFlBQUFBLElBQUksRUFBRSxTQUZBO0FBR05DLFlBQUFBLGNBQWMsRUFBRSxLQUhWO0FBSU5DLFlBQUFBLGNBQWMsRUFBRSxJQUpWO0FBS05DLFlBQUFBLGlCQUFpQixFQUFFLEtBTGI7QUFNTkMsWUFBQUEsY0FBYyxFQUFFLElBTlY7QUFPTkMsWUFBQUEsV0FBVyxFQUFFO0FBQ1RDLGNBQUFBLGFBQWEsRUFBRSx1QkFETjtBQUVUQyxjQUFBQSxVQUFVLEVBQUU7QUFGSDtBQVBQLFdBQVYsRUFXR1osSUFYSCxDQVdRLFVBQUNhLE1BQUQsRUFBWTtBQUNoQixnQkFBSUEsTUFBTSxDQUFDQyxXQUFYLEVBQXdCO0FBQ3BCQyxjQUFBQSxJQUFJLENBQUNaLElBQUwsQ0FBVTtBQUNOQyxnQkFBQUEsSUFBSSxFQUFFLG9DQURBO0FBRU5DLGdCQUFBQSxJQUFJLEVBQUUsU0FGQTtBQUdORyxnQkFBQUEsaUJBQWlCLEVBQUUsSUFIYjtBQUlORixnQkFBQUEsY0FBYyxFQUFFLEtBSlY7QUFLTkksZ0JBQUFBLFdBQVcsRUFBRTtBQUNUQyxrQkFBQUEsYUFBYSxFQUFFO0FBRE47QUFMUCxlQUFWO0FBU0gsYUFWRCxNQVVPLElBQUlFLE1BQU0sQ0FBQ0csUUFBWCxFQUFxQjtBQUN4QkQsY0FBQUEsSUFBSSxDQUFDWixJQUFMLENBQVU7QUFDTkMsZ0JBQUFBLElBQUksRUFBRSwwQkFEQTtBQUVOQyxnQkFBQUEsSUFBSSxFQUFFLE1BRkE7QUFHTkcsZ0JBQUFBLGlCQUFpQixFQUFFLElBSGI7QUFJTkYsZ0JBQUFBLGNBQWMsRUFBRSxLQUpWO0FBS05JLGdCQUFBQSxXQUFXLEVBQUU7QUFDVEMsa0JBQUFBLGFBQWEsRUFBRTtBQUROO0FBTFAsZUFBVjtBQVNIO0FBQ0osV0FqQ0Q7QUFtQ0gsU0FyQ0QsTUFxQ087QUFDSFQsVUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVU7QUFDTkMsWUFBQUEsSUFBSSxFQUFFLHFFQURBO0FBRU5DLFlBQUFBLElBQUksRUFBRSxPQUZBO0FBR05DLFlBQUFBLGNBQWMsRUFBRSxLQUhWO0FBSU5FLFlBQUFBLGlCQUFpQixFQUFFLGFBSmI7QUFLTkUsWUFBQUEsV0FBVyxFQUFFO0FBQ1RDLGNBQUFBLGFBQWEsRUFBRTtBQUROO0FBTFAsV0FBVjtBQVNIO0FBQ0osT0FqREQ7QUFrREgsS0FyREQ7QUFzREgsR0F2REQsQ0FuQ2lELENBNEZqRDs7O0FBQ0EsU0FBTztBQUNITSxJQUFBQSxJQUFJLEVBQUUsZ0JBQVk7QUFDZDFDLE1BQUFBLElBQUksR0FBRzJDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1Qiw2QkFBdkIsQ0FBUDtBQUNBMUMsTUFBQUEsWUFBWSxHQUFHeUMsUUFBUSxDQUFDQyxhQUFULENBQXVCLHVDQUF2QixDQUFmO0FBRUF6QyxNQUFBQSxjQUFjO0FBQ2RpQixNQUFBQSxVQUFVO0FBQ2I7QUFQRSxHQUFQO0FBU0gsQ0F0R3dDLEVBQXpDLEMsQ0F3R0E7OztBQUNBeUIsTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDL0MsRUFBQUEsa0NBQWtDLENBQUMyQyxJQUFuQztBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2RlbW8xL2pzL2N1c3RvbS9hY2NvdW50L3NldHRpbmdzL2RlYWN0aXZhdGUtYWNjb3VudC5qcz83YTg3Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RBY2NvdW50U2V0dGluZ3NEZWFjdGl2YXRlQWNjb3VudCA9IGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIFByaXZhdGUgdmFyaWFibGVzXHJcbiAgICB2YXIgZm9ybTtcclxuICAgIHZhciB2YWxpZGF0aW9uO1xyXG4gICAgdmFyIHN1Ym1pdEJ1dHRvbjtcclxuXHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGluaXRWYWxpZGF0aW9uID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIC8vIEluaXQgZm9ybSB2YWxpZGF0aW9uIHJ1bGVzLiBGb3IgbW9yZSBpbmZvIGNoZWNrIHRoZSBGb3JtVmFsaWRhdGlvbiBwbHVnaW4ncyBvZmZpY2lhbCBkb2N1bWVudGF0aW9uOmh0dHBzOi8vZm9ybXZhbGlkYXRpb24uaW8vXHJcbiAgICAgICAgdmFsaWRhdGlvbiA9IEZvcm1WYWxpZGF0aW9uLmZvcm1WYWxpZGF0aW9uKFxyXG4gICAgICAgICAgICBmb3JtLFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICBmaWVsZHM6IHtcclxuICAgICAgICAgICAgICAgICAgICBkZWFjdGl2YXRlOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbGlkYXRvcnM6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG5vdEVtcHR5OiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbWVzc2FnZTogJ1BsZWFzZSBjaGVjayB0aGUgYm94IHRvIGRlYWN0aXZhdGUgeW91ciBhY2NvdW50J1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIHBsdWdpbnM6IHtcclxuICAgICAgICAgICAgICAgICAgICB0cmlnZ2VyOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5UcmlnZ2VyKCksXHJcbiAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5TdWJtaXRCdXR0b24oKSxcclxuICAgICAgICAgICAgICAgICAgICAvL2RlZmF1bHRTdWJtaXQ6IG5ldyBGb3JtVmFsaWRhdGlvbi5wbHVnaW5zLkRlZmF1bHRTdWJtaXQoKSwgLy8gVW5jb21tZW50IHRoaXMgbGluZSB0byBlbmFibGUgbm9ybWFsIGJ1dHRvbiBzdWJtaXQgYWZ0ZXIgZm9ybSB2YWxpZGF0aW9uXHJcbiAgICAgICAgICAgICAgICAgICAgYm9vdHN0cmFwOiBuZXcgRm9ybVZhbGlkYXRpb24ucGx1Z2lucy5Cb290c3RyYXA1KHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcm93U2VsZWN0b3I6ICcuZnYtcm93JyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlSW52YWxpZENsYXNzOiAnJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlVmFsaWRDbGFzczogJydcclxuICAgICAgICAgICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgKTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgaGFuZGxlRm9ybSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBzdWJtaXRCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICB2YWxpZGF0aW9uLnZhbGlkYXRlKCkudGhlbihmdW5jdGlvbiAoc3RhdHVzKSB7XHJcbiAgICAgICAgICAgICAgICBpZiAoc3RhdHVzID09ICdWYWxpZCcpIHtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgc3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJBcmUgeW91IHN1cmUgeW91IHdvdWxkIGxpa2UgdG8gZGVhY3RpdmF0ZSB5b3VyIGFjY291bnQ/XCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwid2FybmluZ1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNob3dEZW55QnV0dG9uOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJZZXNcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgZGVueUJ1dHRvblRleHQ6ICdObycsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tbGlnaHQtcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZGVueUJ1dHRvbjogXCJidG4gYnRuLWRhbmdlclwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9KS50aGVuKChyZXN1bHQpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHJlc3VsdC5pc0NvbmZpcm1lZCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiAnWW91ciBhY2NvdW50IGhhcyBiZWVuIGRlYWN0aXZhdGVkLicsIFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGljb246ICdzdWNjZXNzJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPa1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tbGlnaHQtcHJpbWFyeVwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIGlmIChyZXN1bHQuaXNEZW5pZWQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogJ0FjY291bnQgbm90IGRlYWN0aXZhdGVkLicsIFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGljb246ICdpbmZvJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPa1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tbGlnaHQtcHJpbWFyeVwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgc3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJTb3JyeSwgbG9va3MgbGlrZSB0aGVyZSBhcmUgc29tZSBlcnJvcnMgZGV0ZWN0ZWQsIHBsZWFzZSB0cnkgYWdhaW4uXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLWxpZ2h0LXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBtZXRob2RzXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgZm9ybSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9hY2NvdW50X2RlYWN0aXZhdGVfZm9ybScpO1xyXG4gICAgICAgICAgICBzdWJtaXRCdXR0b24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfYWNjb3VudF9kZWFjdGl2YXRlX2FjY291bnRfc3VibWl0Jyk7XHJcblxyXG4gICAgICAgICAgICBpbml0VmFsaWRhdGlvbigpO1xyXG4gICAgICAgICAgICBoYW5kbGVGb3JtKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RBY2NvdW50U2V0dGluZ3NEZWFjdGl2YXRlQWNjb3VudC5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RBY2NvdW50U2V0dGluZ3NEZWFjdGl2YXRlQWNjb3VudCIsImZvcm0iLCJ2YWxpZGF0aW9uIiwic3VibWl0QnV0dG9uIiwiaW5pdFZhbGlkYXRpb24iLCJGb3JtVmFsaWRhdGlvbiIsImZvcm1WYWxpZGF0aW9uIiwiZmllbGRzIiwiZGVhY3RpdmF0ZSIsInZhbGlkYXRvcnMiLCJub3RFbXB0eSIsIm1lc3NhZ2UiLCJwbHVnaW5zIiwidHJpZ2dlciIsIlRyaWdnZXIiLCJTdWJtaXRCdXR0b24iLCJib290c3RyYXAiLCJCb290c3RyYXA1Iiwicm93U2VsZWN0b3IiLCJlbGVJbnZhbGlkQ2xhc3MiLCJlbGVWYWxpZENsYXNzIiwiaGFuZGxlRm9ybSIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwicHJldmVudERlZmF1bHQiLCJ2YWxpZGF0ZSIsInRoZW4iLCJzdGF0dXMiLCJzd2FsIiwiZmlyZSIsInRleHQiLCJpY29uIiwiYnV0dG9uc1N0eWxpbmciLCJzaG93RGVueUJ1dHRvbiIsImNvbmZpcm1CdXR0b25UZXh0IiwiZGVueUJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJkZW55QnV0dG9uIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJTd2FsIiwiaXNEZW5pZWQiLCJpbml0IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/demo1/js/custom/account/settings/deactivate-account.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/demo1/js/custom/account/settings/deactivate-account.js"]();
/******/ 	
/******/ })()
;