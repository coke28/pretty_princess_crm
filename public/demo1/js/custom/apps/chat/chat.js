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

/***/ "./resources/assets/demo1/js/custom/apps/chat/chat.js":
/*!************************************************************!*\
  !*** ./resources/assets/demo1/js/custom/apps/chat/chat.js ***!
  \************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTAppChat = function () {\n  // Private functions\n  var handeSend = function handeSend(element) {\n    if (!element) {\n      return;\n    } // Handle send\n\n\n    KTUtil.on(element, '[data-kt-element=\"input\"]', 'keydown', function (e) {\n      if (e.keyCode == 13) {\n        handeMessaging(element);\n        e.preventDefault();\n        return false;\n      }\n    });\n    KTUtil.on(element, '[data-kt-element=\"send\"]', 'click', function (e) {\n      handeMessaging(element);\n    });\n  };\n\n  var handeMessaging = function handeMessaging(element) {\n    var messages = element.querySelector('[data-kt-element=\"messages\"]');\n    var input = element.querySelector('[data-kt-element=\"input\"]');\n\n    if (input.value.length === 0) {\n      return;\n    }\n\n    var messageOutTemplate = messages.querySelector('[data-kt-element=\"template-out\"]');\n    var messageInTemplate = messages.querySelector('[data-kt-element=\"template-in\"]');\n    var message; // Show example outgoing message\n\n    message = messageOutTemplate.cloneNode(true);\n    message.classList.remove('d-none');\n    message.querySelector('[data-kt-element=\"message-text\"]').innerText = input.value;\n    input.value = '';\n    messages.appendChild(message);\n    messages.scrollTop = messages.scrollHeight;\n    setTimeout(function () {\n      // Show example incoming message\n      message = messageInTemplate.cloneNode(true);\n      message.classList.remove('d-none');\n      message.querySelector('[data-kt-element=\"message-text\"]').innerText = 'Thank you for your awesome support!';\n      messages.appendChild(message);\n      messages.scrollTop = messages.scrollHeight;\n    }, 2000);\n  }; // Public methods\n\n\n  return {\n    init: function init(element) {\n      handeSend(element);\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  // Init inline chat messenger\n  KTAppChat.init(document.querySelector('#kt_chat_messenger')); // Init drawer chat messenger\n\n  KTAppChat.init(document.querySelector('#kt_drawer_chat_messenger'));\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2RlbW8xL2pzL2N1c3RvbS9hcHBzL2NoYXQvY2hhdC5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxTQUFTLEdBQUcsWUFBWTtBQUMzQjtBQUNBLE1BQUlDLFNBQVMsR0FBRyxTQUFaQSxTQUFZLENBQVVDLE9BQVYsRUFBbUI7QUFDbEMsUUFBSSxDQUFDQSxPQUFMLEVBQWM7QUFDYjtBQUNBLEtBSGlDLENBS2xDOzs7QUFDQUMsSUFBQUEsTUFBTSxDQUFDQyxFQUFQLENBQVVGLE9BQVYsRUFBbUIsMkJBQW5CLEVBQWdELFNBQWhELEVBQTJELFVBQVNHLENBQVQsRUFBWTtBQUN0RSxVQUFJQSxDQUFDLENBQUNDLE9BQUYsSUFBYSxFQUFqQixFQUFxQjtBQUNwQkMsUUFBQUEsY0FBYyxDQUFDTCxPQUFELENBQWQ7QUFDQUcsUUFBQUEsQ0FBQyxDQUFDRyxjQUFGO0FBRUEsZUFBTyxLQUFQO0FBQ0E7QUFDRCxLQVBEO0FBU0FMLElBQUFBLE1BQU0sQ0FBQ0MsRUFBUCxDQUFVRixPQUFWLEVBQW1CLDBCQUFuQixFQUErQyxPQUEvQyxFQUF3RCxVQUFTRyxDQUFULEVBQVk7QUFDbkVFLE1BQUFBLGNBQWMsQ0FBQ0wsT0FBRCxDQUFkO0FBQ0EsS0FGRDtBQUdBLEdBbEJEOztBQW9CQSxNQUFJSyxjQUFjLEdBQUcsU0FBakJBLGNBQWlCLENBQVNMLE9BQVQsRUFBa0I7QUFDdEMsUUFBSU8sUUFBUSxHQUFHUCxPQUFPLENBQUNRLGFBQVIsQ0FBc0IsOEJBQXRCLENBQWY7QUFDQSxRQUFJQyxLQUFLLEdBQUdULE9BQU8sQ0FBQ1EsYUFBUixDQUFzQiwyQkFBdEIsQ0FBWjs7QUFFTSxRQUFJQyxLQUFLLENBQUNDLEtBQU4sQ0FBWUMsTUFBWixLQUF1QixDQUEzQixFQUErQjtBQUMzQjtBQUNIOztBQUVQLFFBQUlDLGtCQUFrQixHQUFHTCxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsa0NBQXZCLENBQXpCO0FBQ0EsUUFBSUssaUJBQWlCLEdBQUdOLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixpQ0FBdkIsQ0FBeEI7QUFDQSxRQUFJTSxPQUFKLENBVnNDLENBWXRDOztBQUNBQSxJQUFBQSxPQUFPLEdBQUdGLGtCQUFrQixDQUFDRyxTQUFuQixDQUE2QixJQUE3QixDQUFWO0FBQ0FELElBQUFBLE9BQU8sQ0FBQ0UsU0FBUixDQUFrQkMsTUFBbEIsQ0FBeUIsUUFBekI7QUFDQUgsSUFBQUEsT0FBTyxDQUFDTixhQUFSLENBQXNCLGtDQUF0QixFQUEwRFUsU0FBMUQsR0FBc0VULEtBQUssQ0FBQ0MsS0FBNUU7QUFDQUQsSUFBQUEsS0FBSyxDQUFDQyxLQUFOLEdBQWMsRUFBZDtBQUNBSCxJQUFBQSxRQUFRLENBQUNZLFdBQVQsQ0FBcUJMLE9BQXJCO0FBQ0FQLElBQUFBLFFBQVEsQ0FBQ2EsU0FBVCxHQUFxQmIsUUFBUSxDQUFDYyxZQUE5QjtBQUdBQyxJQUFBQSxVQUFVLENBQUMsWUFBVztBQUNyQjtBQUNBUixNQUFBQSxPQUFPLEdBQUdELGlCQUFpQixDQUFDRSxTQUFsQixDQUE0QixJQUE1QixDQUFWO0FBQ0FELE1BQUFBLE9BQU8sQ0FBQ0UsU0FBUixDQUFrQkMsTUFBbEIsQ0FBeUIsUUFBekI7QUFDQUgsTUFBQUEsT0FBTyxDQUFDTixhQUFSLENBQXNCLGtDQUF0QixFQUEwRFUsU0FBMUQsR0FBc0UscUNBQXRFO0FBQ0FYLE1BQUFBLFFBQVEsQ0FBQ1ksV0FBVCxDQUFxQkwsT0FBckI7QUFDQVAsTUFBQUEsUUFBUSxDQUFDYSxTQUFULEdBQXFCYixRQUFRLENBQUNjLFlBQTlCO0FBQ0EsS0FQUyxFQU9QLElBUE8sQ0FBVjtBQVFBLEdBN0JELENBdEIyQixDQXFEM0I7OztBQUNBLFNBQU87QUFDTkUsSUFBQUEsSUFBSSxFQUFFLGNBQVN2QixPQUFULEVBQWtCO0FBQ3ZCRCxNQUFBQSxTQUFTLENBQUNDLE9BQUQsQ0FBVDtBQUNNO0FBSEQsR0FBUDtBQUtBLENBM0RlLEVBQWhCLEMsQ0E2REE7OztBQUNBQyxNQUFNLENBQUN1QixrQkFBUCxDQUEwQixZQUFZO0FBQ3JDO0FBQ0cxQixFQUFBQSxTQUFTLENBQUN5QixJQUFWLENBQWVFLFFBQVEsQ0FBQ2pCLGFBQVQsQ0FBdUIsb0JBQXZCLENBQWYsRUFGa0MsQ0FJckM7O0FBQ0FWLEVBQUFBLFNBQVMsQ0FBQ3lCLElBQVYsQ0FBZUUsUUFBUSxDQUFDakIsYUFBVCxDQUF1QiwyQkFBdkIsQ0FBZjtBQUNBLENBTkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2RlbW8xL2pzL2N1c3RvbS9hcHBzL2NoYXQvY2hhdC5qcz8zYjUyIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RBcHBDaGF0ID0gZnVuY3Rpb24gKCkge1xyXG5cdC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcblx0dmFyIGhhbmRlU2VuZCA9IGZ1bmN0aW9uIChlbGVtZW50KSB7XHJcblx0XHRpZiAoIWVsZW1lbnQpIHtcclxuXHRcdFx0cmV0dXJuO1xyXG5cdFx0fVxyXG5cclxuXHRcdC8vIEhhbmRsZSBzZW5kXHJcblx0XHRLVFV0aWwub24oZWxlbWVudCwgJ1tkYXRhLWt0LWVsZW1lbnQ9XCJpbnB1dFwiXScsICdrZXlkb3duJywgZnVuY3Rpb24oZSkge1xyXG5cdFx0XHRpZiAoZS5rZXlDb2RlID09IDEzKSB7XHJcblx0XHRcdFx0aGFuZGVNZXNzYWdpbmcoZWxlbWVudCk7XHJcblx0XHRcdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuXHRcdFx0XHRyZXR1cm4gZmFsc2U7XHJcblx0XHRcdH1cclxuXHRcdH0pO1xyXG5cclxuXHRcdEtUVXRpbC5vbihlbGVtZW50LCAnW2RhdGEta3QtZWxlbWVudD1cInNlbmRcIl0nLCAnY2xpY2snLCBmdW5jdGlvbihlKSB7XHJcblx0XHRcdGhhbmRlTWVzc2FnaW5nKGVsZW1lbnQpO1xyXG5cdFx0fSk7XHJcblx0fVxyXG5cclxuXHR2YXIgaGFuZGVNZXNzYWdpbmcgPSBmdW5jdGlvbihlbGVtZW50KSB7XHJcblx0XHR2YXIgbWVzc2FnZXMgPSBlbGVtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LWVsZW1lbnQ9XCJtZXNzYWdlc1wiXScpO1xyXG5cdFx0dmFyIGlucHV0ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1lbGVtZW50PVwiaW5wdXRcIl0nKTtcclxuXHJcbiAgICAgICAgaWYgKGlucHV0LnZhbHVlLmxlbmd0aCA9PT0gMCApIHtcclxuICAgICAgICAgICAgcmV0dXJuO1xyXG4gICAgICAgIH1cclxuXHJcblx0XHR2YXIgbWVzc2FnZU91dFRlbXBsYXRlID0gbWVzc2FnZXMucXVlcnlTZWxlY3RvcignW2RhdGEta3QtZWxlbWVudD1cInRlbXBsYXRlLW91dFwiXScpO1xyXG5cdFx0dmFyIG1lc3NhZ2VJblRlbXBsYXRlID0gbWVzc2FnZXMucXVlcnlTZWxlY3RvcignW2RhdGEta3QtZWxlbWVudD1cInRlbXBsYXRlLWluXCJdJyk7XHJcblx0XHR2YXIgbWVzc2FnZTtcclxuXHRcdFxyXG5cdFx0Ly8gU2hvdyBleGFtcGxlIG91dGdvaW5nIG1lc3NhZ2VcclxuXHRcdG1lc3NhZ2UgPSBtZXNzYWdlT3V0VGVtcGxhdGUuY2xvbmVOb2RlKHRydWUpO1xyXG5cdFx0bWVzc2FnZS5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcclxuXHRcdG1lc3NhZ2UucXVlcnlTZWxlY3RvcignW2RhdGEta3QtZWxlbWVudD1cIm1lc3NhZ2UtdGV4dFwiXScpLmlubmVyVGV4dCA9IGlucHV0LnZhbHVlO1x0XHRcclxuXHRcdGlucHV0LnZhbHVlID0gJyc7XHJcblx0XHRtZXNzYWdlcy5hcHBlbmRDaGlsZChtZXNzYWdlKTtcclxuXHRcdG1lc3NhZ2VzLnNjcm9sbFRvcCA9IG1lc3NhZ2VzLnNjcm9sbEhlaWdodDtcclxuXHRcdFxyXG5cdFx0XHJcblx0XHRzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1x0XHRcdFxyXG5cdFx0XHQvLyBTaG93IGV4YW1wbGUgaW5jb21pbmcgbWVzc2FnZVxyXG5cdFx0XHRtZXNzYWdlID0gbWVzc2FnZUluVGVtcGxhdGUuY2xvbmVOb2RlKHRydWUpO1x0XHRcdFxyXG5cdFx0XHRtZXNzYWdlLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xyXG5cdFx0XHRtZXNzYWdlLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWt0LWVsZW1lbnQ9XCJtZXNzYWdlLXRleHRcIl0nKS5pbm5lclRleHQgPSAnVGhhbmsgeW91IGZvciB5b3VyIGF3ZXNvbWUgc3VwcG9ydCEnO1xyXG5cdFx0XHRtZXNzYWdlcy5hcHBlbmRDaGlsZChtZXNzYWdlKTtcclxuXHRcdFx0bWVzc2FnZXMuc2Nyb2xsVG9wID0gbWVzc2FnZXMuc2Nyb2xsSGVpZ2h0O1xyXG5cdFx0fSwgMjAwMCk7XHJcblx0fVxyXG5cclxuXHQvLyBQdWJsaWMgbWV0aG9kc1xyXG5cdHJldHVybiB7XHJcblx0XHRpbml0OiBmdW5jdGlvbihlbGVtZW50KSB7XHJcblx0XHRcdGhhbmRlU2VuZChlbGVtZW50KTtcclxuICAgICAgICB9XHJcblx0fTtcclxufSgpO1xyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbiAoKSB7XHJcblx0Ly8gSW5pdCBpbmxpbmUgY2hhdCBtZXNzZW5nZXJcclxuICAgIEtUQXBwQ2hhdC5pbml0KGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9jaGF0X21lc3NlbmdlcicpKTtcclxuXHJcblx0Ly8gSW5pdCBkcmF3ZXIgY2hhdCBtZXNzZW5nZXJcclxuXHRLVEFwcENoYXQuaW5pdChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfZHJhd2VyX2NoYXRfbWVzc2VuZ2VyJykpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUQXBwQ2hhdCIsImhhbmRlU2VuZCIsImVsZW1lbnQiLCJLVFV0aWwiLCJvbiIsImUiLCJrZXlDb2RlIiwiaGFuZGVNZXNzYWdpbmciLCJwcmV2ZW50RGVmYXVsdCIsIm1lc3NhZ2VzIiwicXVlcnlTZWxlY3RvciIsImlucHV0IiwidmFsdWUiLCJsZW5ndGgiLCJtZXNzYWdlT3V0VGVtcGxhdGUiLCJtZXNzYWdlSW5UZW1wbGF0ZSIsIm1lc3NhZ2UiLCJjbG9uZU5vZGUiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJpbm5lclRleHQiLCJhcHBlbmRDaGlsZCIsInNjcm9sbFRvcCIsInNjcm9sbEhlaWdodCIsInNldFRpbWVvdXQiLCJpbml0Iiwib25ET01Db250ZW50TG9hZGVkIiwiZG9jdW1lbnQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/demo1/js/custom/apps/chat/chat.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/demo1/js/custom/apps/chat/chat.js"]();
/******/ 	
/******/ })()
;