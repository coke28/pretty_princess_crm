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

/***/ "./resources/assets/core/js/custom/documentation/general/search/menu.js":
/*!******************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/search/menu.js ***!
  \******************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTGeneralSearchMenuDemos = function () {\n  // Private variables\n  var element;\n  var formElement;\n  var mainElement;\n  var resultsElement;\n  var wrapperElement;\n  var emptyElement;\n  var preferencesElement;\n  var preferencesShowElement;\n  var preferencesDismissElement;\n  var advancedOptionsFormElement;\n  var advancedOptionsFormShowElement;\n  var advancedOptionsFormCancelElement;\n  var advancedOptionsFormSearchElement;\n  var searchObject;\n\n  // Private functions\n  var processs = function processs(search) {\n    var timeout = setTimeout(function () {\n      var number = KTUtil.getRandomInt(1, 3);\n\n      // Hide recently viewed\n      mainElement.classList.add('d-none');\n      if (number === 3) {\n        // Hide results\n        resultsElement.classList.add('d-none');\n        // Show empty message \n        emptyElement.classList.remove('d-none');\n      } else {\n        // Show results\n        resultsElement.classList.remove('d-none');\n        // Hide empty message \n        emptyElement.classList.add('d-none');\n      }\n\n      // Complete search\n      search.complete();\n    }, 1500);\n  };\n  var clear = function clear(search) {\n    // Show recently viewed\n    mainElement.classList.remove('d-none');\n    // Hide results\n    resultsElement.classList.add('d-none');\n    // Hide empty message \n    emptyElement.classList.add('d-none');\n  };\n  var handlePreferences = function handlePreferences() {\n    // Preference show handler\n    preferencesShowElement.addEventListener('click', function () {\n      wrapperElement.classList.add('d-none');\n      preferencesElement.classList.remove('d-none');\n    });\n\n    // Preference dismiss handler\n    preferencesDismissElement.addEventListener('click', function () {\n      wrapperElement.classList.remove('d-none');\n      preferencesElement.classList.add('d-none');\n    });\n  };\n  var handleAdvancedOptionsForm = function handleAdvancedOptionsForm() {\n    // Show\n    advancedOptionsFormShowElement.addEventListener('click', function () {\n      wrapperElement.classList.add('d-none');\n      advancedOptionsFormElement.classList.remove('d-none');\n    });\n\n    // Cancel\n    advancedOptionsFormCancelElement.addEventListener('click', function () {\n      wrapperElement.classList.remove('d-none');\n      advancedOptionsFormElement.classList.add('d-none');\n    });\n\n    // Search\n    advancedOptionsFormSearchElement.addEventListener('click', function () {});\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      // Elements\n      element = document.querySelector('#kt_docs_search_handler_menu');\n      if (!element) {\n        return;\n      }\n      wrapperElement = element.querySelector('[data-kt-search-element=\"wrapper\"]');\n      formElement = element.querySelector('[data-kt-search-element=\"form\"]');\n      mainElement = element.querySelector('[data-kt-search-element=\"main\"]');\n      resultsElement = element.querySelector('[data-kt-search-element=\"results\"]');\n      emptyElement = element.querySelector('[data-kt-search-element=\"empty\"]');\n      preferencesElement = element.querySelector('[data-kt-search-element=\"preferences\"]');\n      preferencesShowElement = element.querySelector('[data-kt-search-element=\"preferences-show\"]');\n      preferencesDismissElement = element.querySelector('[data-kt-search-element=\"preferences-dismiss\"]');\n      advancedOptionsFormElement = element.querySelector('[data-kt-search-element=\"advanced-options-form\"]');\n      advancedOptionsFormShowElement = element.querySelector('[data-kt-search-element=\"advanced-options-form-show\"]');\n      advancedOptionsFormCancelElement = element.querySelector('[data-kt-search-element=\"advanced-options-form-cancel\"]');\n      advancedOptionsFormSearchElement = element.querySelector('[data-kt-search-element=\"advanced-options-form-search\"]');\n\n      // Initialize search handler\n      searchObject = new KTSearch(element);\n\n      // Search handler\n      searchObject.on('kt.search.process', processs);\n\n      // Clear handler\n      searchObject.on('kt.search.clear', clear);\n\n      // Custom handlers\n      handlePreferences();\n      handleAdvancedOptionsForm();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTGeneralSearchMenuDemos.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9zZWFyY2gvbWVudS5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYjtBQUNBLElBQUlBLHdCQUF3QixHQUFHLFlBQVc7RUFDdEM7RUFDQSxJQUFJQyxPQUFPO0VBQ1gsSUFBSUMsV0FBVztFQUNmLElBQUlDLFdBQVc7RUFDZixJQUFJQyxjQUFjO0VBQ2xCLElBQUlDLGNBQWM7RUFDbEIsSUFBSUMsWUFBWTtFQUVoQixJQUFJQyxrQkFBa0I7RUFDdEIsSUFBSUMsc0JBQXNCO0VBQzFCLElBQUlDLHlCQUF5QjtFQUU3QixJQUFJQywwQkFBMEI7RUFDOUIsSUFBSUMsOEJBQThCO0VBQ2xDLElBQUlDLGdDQUFnQztFQUNwQyxJQUFJQyxnQ0FBZ0M7RUFFcEMsSUFBSUMsWUFBWTs7RUFFaEI7RUFDQSxJQUFJQyxRQUFRLEdBQUcsU0FBWEEsUUFBUUEsQ0FBWUMsTUFBTSxFQUFFO0lBQzVCLElBQUlDLE9BQU8sR0FBR0MsVUFBVSxDQUFDLFlBQVc7TUFDaEMsSUFBSUMsTUFBTSxHQUFHQyxNQUFNLENBQUNDLFlBQVksQ0FBQyxDQUFDLEVBQUUsQ0FBQyxDQUFDOztNQUV0QztNQUNBbEIsV0FBVyxDQUFDbUIsU0FBUyxDQUFDQyxHQUFHLENBQUMsUUFBUSxDQUFDO01BRW5DLElBQUlKLE1BQU0sS0FBSyxDQUFDLEVBQUU7UUFDZDtRQUNBZixjQUFjLENBQUNrQixTQUFTLENBQUNDLEdBQUcsQ0FBQyxRQUFRLENBQUM7UUFDdEM7UUFDQWpCLFlBQVksQ0FBQ2dCLFNBQVMsQ0FBQ0UsTUFBTSxDQUFDLFFBQVEsQ0FBQztNQUMzQyxDQUFDLE1BQU07UUFDSDtRQUNBcEIsY0FBYyxDQUFDa0IsU0FBUyxDQUFDRSxNQUFNLENBQUMsUUFBUSxDQUFDO1FBQ3pDO1FBQ0FsQixZQUFZLENBQUNnQixTQUFTLENBQUNDLEdBQUcsQ0FBQyxRQUFRLENBQUM7TUFDeEM7O01BRUE7TUFDQVAs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QixHQUFHVixPQUFPLENBQUMrQixhQUFhLENBQUMsdURBQXVELENBQUM7TUFDL0dwQixnQ0FBZ0MsR0FBR1gsT0FBTyxDQUFDK0IsYUFBYSxDQUFDLHlEQUF5RCxDQUFDO01BQ25IbkIsZ0NBQWdDLEdBQUdaLE9BQU8sQ0FBQytCLGFBQWEsQ0FBQyx5REFBeUQsQ0FBQzs7TUFFbkg7TUFDQWxCLFlBQVksR0FBRyxJQUFJbUIsUUFBUSxDQUFDaEMsT0FBTyxDQUFDOztNQUVwQztNQUNBYSxZQUFZLENBQUNvQixFQUFFLENBQUMsbUJBQW1CLEVBQUVuQixRQUFRLENBQUM7O01BRTlDO01BQ0FELFlBQVksQ0FBQ29CLEVBQUUsQ0FBQyxpQkFBaUIsRUFBRVIsS0FBSyxDQUFDOztNQUV6QztNQUNBQyxpQkFBaUIsQ0FBQyxDQUFDO01BQ25CRSx5QkFBeUIsQ0FBQyxDQUFDO0lBQ3JDO0VBQ0QsQ0FBQztBQUNGLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0FULE1BQU0sQ0FBQ2Usa0JBQWtCLENBQUMsWUFBVztFQUNqQ25DLHdCQUF3QixDQUFDOEIsSUFBSSxDQUFDLENBQUM7QUFDbkMsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvc2VhcmNoL21lbnUuanM/ZmFiNSJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtUR2VuZXJhbFNlYXJjaE1lbnVEZW1vcyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gUHJpdmF0ZSB2YXJpYWJsZXNcclxuICAgIHZhciBlbGVtZW50O1xyXG4gICAgdmFyIGZvcm1FbGVtZW50O1xyXG4gICAgdmFyIG1haW5FbGVtZW50O1xyXG4gICAgdmFyIHJlc3VsdHNFbGVtZW50O1xyXG4gICAgdmFyIHdyYXBwZXJFbGVtZW50O1xyXG4gICAgdmFyIGVtcHR5RWxlbWVudDtcclxuXHJcbiAgICB2YXIgcHJlZmVyZW5jZXNFbGVtZW50O1xyXG4gICAgdmFyIHByZWZlcmVuY2VzU2hvd0VsZW1lbnQ7XHJcbiAgICB2YXIgcHJlZmVyZW5jZXNEaXNtaXNzRWxlbWVudDtcclxuICAgIFxyXG4gICAgdmFyIGFkdmFuY2VkT3B0aW9uc0Zvcm1FbGVtZW50O1xyXG4gICAgdmFyIGFkdmFuY2VkT3B0aW9uc0Zvcm1TaG93RWxlbWVudDtcclxuICAgIHZhciBhZHZhbmNlZE9wdGlvbnNGb3JtQ2FuY2VsRWxlbWVudDtcclxuICAgIHZhciBhZHZhbmNlZE9wdGlvbnNGb3JtU2VhcmNoRWxlbWVudDtcclxuICAgIFxyXG4gICAgdmFyIHNlYXJjaE9iamVjdDtcclxuXHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIHByb2Nlc3NzID0gZnVuY3Rpb24oc2VhcmNoKSB7XHJcbiAgICAgICAgdmFyIHRpbWVvdXQgPSBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICB2YXIgbnVtYmVyID0gS1RVdGlsLmdldFJhbmRvbUludCgxLCAzKTtcclxuXHJcbiAgICAgICAgICAgIC8vIEhpZGUgcmVjZW50bHkgdmlld2VkXHJcbiAgICAgICAgICAgIG1haW5FbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpO1xyXG5cclxuICAgICAgICAgICAgaWYgKG51bWJlciA9PT0gMykge1xyXG4gICAgICAgICAgICAgICAgLy8gSGlkZSByZXN1bHRzXHJcbiAgICAgICAgICAgICAgICByZXN1bHRzRWxlbWVudC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuICAgICAgICAgICAgICAgIC8vIFNob3cgZW1wdHkgbWVzc2FnZSBcclxuICAgICAgICAgICAgICAgIGVtcHR5RWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIC8vIFNob3cgcmVzdWx0c1xyXG4gICAgICAgICAgICAgICAgcmVzdWx0c0VsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnZC1ub25lJyk7XHJcbiAgICAgICAgICAgICAgICAvLyBIaWRlIGVtcHR5IG1lc3NhZ2UgXHJcbiAgICAgICAgICAgICAgICBlbXB0eUVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnZC1ub25lJyk7XHJcbiAgICAgICAgICAgIH0gICAgICAgICAgICAgICAgICBcclxuXHJcbiAgICAgICAgICAgIC8vIENvbXBsZXRlIHNlYXJjaFxyXG4gICAgICAgICAgICBzZWFyY2guY29tcGxldGUoKTtcclxuICAgICAgICB9LCAxNTAwKTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgY2xlYXIgPSBmdW5jdGlvbihzZWFyY2gpIHtcclxuICAgICAgICAvLyBTaG93IHJlY2VudGx5IHZpZXdlZFxyXG4gICAgICAgIG1haW5FbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xyXG4gICAgICAgIC8vIEhpZGUgcmVzdWx0c1xyXG4gICAgICAgIHJlc3VsdHNFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpO1xyXG4gICAgICAgIC8vIEhpZGUgZW1wdHkgbWVzc2FnZSBcclxuICAgICAgICBlbXB0eUVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnZC1ub25lJyk7XHJcbiAgICB9ICAgIFxyXG5cclxuICAgIHZhciBoYW5kbGVQcmVmZXJlbmNlcyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIC8vIFByZWZlcmVuY2Ugc2hvdyBoYW5kbGVyXHJcbiAgICAgICAgcHJlZmVyZW5jZXNTaG93RWxlbWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICB3cmFwcGVyRWxlbWVudC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuICAgICAgICAgICAgcHJlZmVyZW5jZXNFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBQcmVmZXJlbmNlIGRpc21pc3MgaGFuZGxlclxyXG4gICAgICAgIHByZWZlcmVuY2VzRGlzbWlzc0VsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgd3JhcHBlckVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnZC1ub25lJyk7XHJcbiAgICAgICAgICAgIHByZWZlcmVuY2VzRWxlbWVudC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICB2YXIgaGFuZGxlQWR2YW5jZWRPcHRpb25zRm9ybSA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIC8vIFNob3dcclxuICAgICAgICBhZHZhbmNlZE9wdGlvbnNGb3JtU2hvd0VsZW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgd3JhcHBlckVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnZC1ub25lJyk7XHJcbiAgICAgICAgICAgIGFkdmFuY2VkT3B0aW9uc0Zvcm1FbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBDYW5jZWxcclxuICAgICAgICBhZHZhbmNlZE9wdGlvbnNGb3JtQ2FuY2VsRWxlbWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICB3cmFwcGVyRWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcclxuICAgICAgICAgICAgYWR2YW5jZWRPcHRpb25zRm9ybUVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnZC1ub25lJyk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8vIFNlYXJjaFxyXG4gICAgICAgIGFkdmFuY2VkT3B0aW9uc0Zvcm1TZWFyY2hFbGVtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBtZXRob2RzXHJcblx0cmV0dXJuIHtcclxuXHRcdGluaXQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAvLyBFbGVtZW50c1xyXG4gICAgICAgICAgICBlbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2t0X2RvY3Nfc2VhcmNoX2hhbmRsZXJfbWVudScpO1xyXG5cclxuICAgICAgICAgICAgaWYgKCFlbGVtZW50KSB7XHJcbiAgICAgICAgICAgICAgICByZXR1cm47XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHdyYXBwZXJFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cIndyYXBwZXJcIl0nKTtcclxuICAgICAgICAgICAgZm9ybUVsZW1lbnQgPSBlbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LXNlYXJjaC1lbGVtZW50PVwiZm9ybVwiXScpO1xyXG4gICAgICAgICAgICBtYWluRWxlbWVudCA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEta3Qtc2VhcmNoLWVsZW1lbnQ9XCJtYWluXCJdJyk7XHJcbiAgICAgICAgICAgIHJlc3VsdHNFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cInJlc3VsdHNcIl0nKTtcclxuICAgICAgICAgICAgZW1wdHlFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cImVtcHR5XCJdJyk7XHJcblxyXG4gICAgICAgICAgICBwcmVmZXJlbmNlc0VsZW1lbnQgPSBlbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LXNlYXJjaC1lbGVtZW50PVwicHJlZmVyZW5jZXNcIl0nKTtcclxuICAgICAgICAgICAgcHJlZmVyZW5jZXNTaG93RWxlbWVudCA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEta3Qtc2VhcmNoLWVsZW1lbnQ9XCJwcmVmZXJlbmNlcy1zaG93XCJdJyk7XHJcbiAgICAgICAgICAgIHByZWZlcmVuY2VzRGlzbWlzc0VsZW1lbnQgPSBlbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LXNlYXJjaC1lbGVtZW50PVwicHJlZmVyZW5jZXMtZGlzbWlzc1wiXScpO1xyXG5cclxuICAgICAgICAgICAgYWR2YW5jZWRPcHRpb25zRm9ybUVsZW1lbnQgPSBlbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LXNlYXJjaC1lbGVtZW50PVwiYWR2YW5jZWQtb3B0aW9ucy1mb3JtXCJdJyk7XHJcbiAgICAgICAgICAgIGFkdmFuY2VkT3B0aW9uc0Zvcm1TaG93RWxlbWVudCA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEta3Qtc2VhcmNoLWVsZW1lbnQ9XCJhZHZhbmNlZC1vcHRpb25zLWZvcm0tc2hvd1wiXScpO1xyXG4gICAgICAgICAgICBhZHZhbmNlZE9wdGlvbnNGb3JtQ2FuY2VsRWxlbWVudCA9IGVsZW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEta3Qtc2VhcmNoLWVsZW1lbnQ9XCJhZHZhbmNlZC1vcHRpb25zLWZvcm0tY2FuY2VsXCJdJyk7XHJcbiAgICAgICAgICAgIGFkdmFuY2VkT3B0aW9uc0Zvcm1TZWFyY2hFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cImFkdmFuY2VkLW9wdGlvbnMtZm9ybS1zZWFyY2hcIl0nKTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIC8vIEluaXRpYWxpemUgc2VhcmNoIGhhbmRsZXJcclxuICAgICAgICAgICAgc2VhcmNoT2JqZWN0ID0gbmV3IEtUU2VhcmNoKGVsZW1lbnQpO1xyXG5cclxuICAgICAgICAgICAgLy8gU2VhcmNoIGhhbmRsZXJcclxuICAgICAgICAgICAgc2VhcmNoT2JqZWN0Lm9uKCdrdC5zZWFyY2gucHJvY2VzcycsIHByb2Nlc3NzKTtcclxuXHJcbiAgICAgICAgICAgIC8vIENsZWFyIGhhbmRsZXJcclxuICAgICAgICAgICAgc2VhcmNoT2JqZWN0Lm9uKCdrdC5zZWFyY2guY2xlYXInLCBjbGVhcik7XHJcblxyXG4gICAgICAgICAgICAvLyBDdXN0b20gaGFuZGxlcnNcclxuICAgICAgICAgICAgaGFuZGxlUHJlZmVyZW5jZXMoKTtcclxuICAgICAgICAgICAgaGFuZGxlQWR2YW5jZWRPcHRpb25zRm9ybSgpOyAgICAgICAgICAgIFxyXG5cdFx0fVxyXG5cdH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEdlbmVyYWxTZWFyY2hNZW51RGVtb3MuaW5pdCgpO1xyXG59KTsiXSwibmFtZXMiOlsiS1RHZW5lcmFsU2VhcmNoTWVudURlbW9zIiwiZWxlbWVudCIsImZvcm1FbGVtZW50IiwibWFpbkVsZW1lbnQiLCJyZXN1bHRzRWxlbWVudCIsIndyYXBwZXJFbGVtZW50IiwiZW1wdHlFbGVtZW50IiwicHJlZmVyZW5jZXNFbGVtZW50IiwicHJlZmVyZW5jZXNTaG93RWxlbWVudCIsInByZWZlcmVuY2VzRGlzbWlzc0VsZW1lbnQiLCJhZHZhbmNlZE9wdGlvbnNGb3JtRWxlbWVudCIsImFkdmFuY2VkT3B0aW9uc0Zvcm1TaG93RWxlbWVudCIsImFkdmFuY2VkT3B0aW9uc0Zvcm1DYW5jZWxFbGVtZW50IiwiYWR2YW5jZWRPcHRpb25zRm9ybVNlYXJjaEVsZW1lbnQiLCJzZWFyY2hPYmplY3QiLCJwcm9jZXNzcyIsInNlYXJjaCIsInRpbWVvdXQiLCJzZXRUaW1lb3V0IiwibnVtYmVyIiwiS1RVdGlsIiwiZ2V0UmFuZG9tSW50IiwiY2xhc3NMaXN0IiwiYWRkIiwicmVtb3ZlIiwiY29tcGxldGUiLCJjbGVhciIsImhhbmRsZVByZWZlcmVuY2VzIiwiYWRkRXZlbnRMaXN0ZW5lciIsImhhbmRsZUFkdmFuY2VkT3B0aW9uc0Zvcm0iLCJpbml0IiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiS1RTZWFyY2giLCJvbiIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/search/menu.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/search/menu.js"]();
/******/ 	
/******/ })()
;