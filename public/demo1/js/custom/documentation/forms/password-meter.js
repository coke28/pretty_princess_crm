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

/***/ "./resources/assets/core/js/custom/documentation/forms/password-meter.js":
/*!*******************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/forms/password-meter.js ***!
  \*******************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTGeneralPasswordMeterDemos = function () {\n  // Private functions\n  var _showScore = function _showScore() {\n    // Select show score button\n    var showScoreButton = document.getElementById('kt_password_meter_example_show_score');\n\n    // Get password meter instance\n    var passwordMeterElement = document.querySelector(\"#kt_password_meter_example\");\n    var passwordMeter = KTPasswordMeter.getInstance(passwordMeterElement);\n\n    // Handle show score button click\n    showScoreButton.addEventListener('click', function (e) {\n      // Get password score\n      var score = passwordMeter.getScore();\n\n      // Show popup confirmation \n      Swal.fire({\n        text: \"Current Password Score: \" + score,\n        icon: \"success\",\n        buttonsStyling: false,\n        confirmButtonText: \"Ok, got it!\",\n        customClass: {\n          confirmButton: \"btn btn-primary\"\n        }\n      });\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      _showScore();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTGeneralPasswordMeterDemos.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZm9ybXMvcGFzc3dvcmQtbWV0ZXIuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSwyQkFBMkIsR0FBRyxZQUFXO0VBQ3pDO0VBQ0EsSUFBSUMsVUFBVSxHQUFHLFNBQWJBLFVBQVVBLENBQUEsRUFBYztJQUN4QjtJQUNBLElBQU1DLGVBQWUsR0FBR0MsUUFBUSxDQUFDQyxjQUFjLENBQUMsc0NBQXNDLENBQUM7O0lBRXZGO0lBQ0EsSUFBTUMsb0JBQW9CLEdBQUdGLFFBQVEsQ0FBQ0csYUFBYSxDQUFDLDRCQUE0QixDQUFDO0lBQ2pGLElBQU1DLGFBQWEsR0FBR0MsZUFBZSxDQUFDQyxXQUFXLENBQUNKLG9CQUFvQixDQUFDOztJQUV2RTtJQUNBSCxlQUFlLENBQUNRLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFBQyxDQUFDLEVBQUk7TUFDM0M7TUFDQSxJQUFNQyxLQUFLLEdBQUdMLGFBQWEsQ0FBQ00sUUFBUSxDQUFDLENBQUM7O01BRXRDO01BQ0FDLElBQUksQ0FBQ0MsSUFBSSxDQUFDO1FBQ05DLElBQUksRUFBRSwwQkFBMEIsR0FBR0osS0FBSztRQUN4Q0ssSUFBSSxFQUFFLFNBQVM7UUFDZkMsY0FBYyxFQUFFLEtBQUs7UUFDckJDLGlCQUFpQixFQUFFLGFBQWE7UUFDaENDLFdBQVcsRUFBRTtVQUNUQyxhQUFhLEVBQUU7UUFDbkI7TUFDSixDQUFDLENBQUM7SUFDTixDQUFDLENBQUM7RUFDTixDQUFDO0VBRUQsT0FBTztJQUNIO0lBQ0FDLElBQUksRUFBRSxTQUFBQSxLQUFBLEVBQVc7TUFDYnJCLFVBQVUsQ0FBQyxDQUFDO0lBQ2hCO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0FzQixNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVc7RUFDakN4QiwyQkFBMkIsQ0FBQ3NCLElBQUksQ0FBQyxDQUFDO0FBQ3RDLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9mb3Jtcy9wYXNzd29yZC1tZXRlci5qcz82YjM2Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RHZW5lcmFsUGFzc3dvcmRNZXRlckRlbW9zID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIF9zaG93U2NvcmUgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICAvLyBTZWxlY3Qgc2hvdyBzY29yZSBidXR0b25cclxuICAgICAgICBjb25zdCBzaG93U2NvcmVCdXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgna3RfcGFzc3dvcmRfbWV0ZXJfZXhhbXBsZV9zaG93X3Njb3JlJyk7ICBcclxuXHJcbiAgICAgICAgLy8gR2V0IHBhc3N3b3JkIG1ldGVyIGluc3RhbmNlXHJcbiAgICAgICAgY29uc3QgcGFzc3dvcmRNZXRlckVsZW1lbnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI2t0X3Bhc3N3b3JkX21ldGVyX2V4YW1wbGVcIik7XHJcbiAgICAgICAgY29uc3QgcGFzc3dvcmRNZXRlciA9IEtUUGFzc3dvcmRNZXRlci5nZXRJbnN0YW5jZShwYXNzd29yZE1ldGVyRWxlbWVudCk7XHJcblxyXG4gICAgICAgIC8vIEhhbmRsZSBzaG93IHNjb3JlIGJ1dHRvbiBjbGlja1xyXG4gICAgICAgIHNob3dTY29yZUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGUgPT4ge1xyXG4gICAgICAgICAgICAvLyBHZXQgcGFzc3dvcmQgc2NvcmVcclxuICAgICAgICAgICAgY29uc3Qgc2NvcmUgPSBwYXNzd29yZE1ldGVyLmdldFNjb3JlKCk7XHJcblxyXG4gICAgICAgICAgICAvLyBTaG93IHBvcHVwIGNvbmZpcm1hdGlvbiBcclxuICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgIHRleHQ6IFwiQ3VycmVudCBQYXNzd29yZCBTY29yZTogXCIgKyBzY29yZSxcclxuICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgX3Nob3dTY29yZSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEdlbmVyYWxQYXNzd29yZE1ldGVyRGVtb3MuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUR2VuZXJhbFBhc3N3b3JkTWV0ZXJEZW1vcyIsIl9zaG93U2NvcmUiLCJzaG93U2NvcmVCdXR0b24iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwicGFzc3dvcmRNZXRlckVsZW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwicGFzc3dvcmRNZXRlciIsIktUUGFzc3dvcmRNZXRlciIsImdldEluc3RhbmNlIiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJzY29yZSIsImdldFNjb3JlIiwiU3dhbCIsImZpcmUiLCJ0ZXh0IiwiaWNvbiIsImJ1dHRvbnNTdHlsaW5nIiwiY29uZmlybUJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/forms/password-meter.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/forms/password-meter.js"]();
/******/ 	
/******/ })()
;