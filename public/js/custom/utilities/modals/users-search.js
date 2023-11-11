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

/***/ "./resources/assets/core/js/custom/utilities/modals/users-search.js":
/*!**************************************************************************!*\
  !*** ./resources/assets/core/js/custom/utilities/modals/users-search.js ***!
  \**************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTModalUserSearch = function () {\n  // Private variables\n  var element;\n  var suggestionsElement;\n  var resultsElement;\n  var wrapperElement;\n  var emptyElement;\n  var searchObject;\n\n  // Private functions\n  var processs = function processs(search) {\n    var timeout = setTimeout(function () {\n      var number = KTUtil.getRandomInt(1, 3);\n\n      // Hide recently viewed\n      suggestionsElement.classList.add('d-none');\n      if (number === 3) {\n        // Hide results\n        resultsElement.classList.add('d-none');\n        // Show empty message \n        emptyElement.classList.remove('d-none');\n      } else {\n        // Show results\n        resultsElement.classList.remove('d-none');\n        // Hide empty message \n        emptyElement.classList.add('d-none');\n      }\n\n      // Complete search\n      search.complete();\n    }, 1500);\n  };\n  var clear = function clear(search) {\n    // Show recently viewed\n    suggestionsElement.classList.remove('d-none');\n    // Hide results\n    resultsElement.classList.add('d-none');\n    // Hide empty message \n    emptyElement.classList.add('d-none');\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      // Elements\n      element = document.querySelector('#kt_modal_users_search_handler');\n      if (!element) {\n        return;\n      }\n      wrapperElement = element.querySelector('[data-kt-search-element=\"wrapper\"]');\n      suggestionsElement = element.querySelector('[data-kt-search-element=\"suggestions\"]');\n      resultsElement = element.querySelector('[data-kt-search-element=\"results\"]');\n      emptyElement = element.querySelector('[data-kt-search-element=\"empty\"]');\n\n      // Initialize search handler\n      searchObject = new KTSearch(element);\n\n      // Search handler\n      searchObject.on('kt.search.process', processs);\n\n      // Clear handler\n      searchObject.on('kt.search.clear', clear);\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTModalUserSearch.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL3V0aWxpdGllcy9tb2RhbHMvdXNlcnMtc2VhcmNoLmpzLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsaUJBQWlCLEdBQUcsWUFBWTtFQUNoQztFQUNBLElBQUlDLE9BQU87RUFDWCxJQUFJQyxrQkFBa0I7RUFDdEIsSUFBSUMsY0FBYztFQUNsQixJQUFJQyxjQUFjO0VBQ2xCLElBQUlDLFlBQVk7RUFDaEIsSUFBSUMsWUFBWTs7RUFFaEI7RUFDQSxJQUFJQyxRQUFRLEdBQUcsU0FBWEEsUUFBUSxDQUFhQyxNQUFNLEVBQUU7SUFDN0IsSUFBSUMsT0FBTyxHQUFHQyxVQUFVLENBQUMsWUFBWTtNQUNqQyxJQUFJQyxNQUFNLEdBQUdDLE1BQU0sQ0FBQ0MsWUFBWSxDQUFDLENBQUMsRUFBRSxDQUFDLENBQUM7O01BRXRDO01BQ0FYLGtCQUFrQixDQUFDWSxTQUFTLENBQUNDLEdBQUcsQ0FBQyxRQUFRLENBQUM7TUFFMUMsSUFBSUosTUFBTSxLQUFLLENBQUMsRUFBRTtRQUNkO1FBQ0FSLGNBQWMsQ0FBQ1csU0FBUyxDQUFDQyxHQUFHLENBQUMsUUFBUSxDQUFDO1FBQ3RDO1FBQ0FWLFlBQVksQ0FBQ1MsU0FBUyxDQUFDRSxNQUFNLENBQUMsUUFBUSxDQUFDO01BQzNDLENBQUMsTUFBTTtRQUNIO1FBQ0FiLGNBQWMsQ0FBQ1csU0FBUyxDQUFDRSxNQUFNLENBQUMsUUFBUSxDQUFDO1FBQ3pDO1FBQ0FYLFlBQVksQ0FBQ1MsU0FBUyxDQUFDQyxHQUFHLENBQUMsUUFBUSxDQUFDO01BQ3hDOztNQUVBO01BQ0FQLE1BQU0sQ0FBQ1MsUUFBUSxFQUFFO0lBQ3JCLENBQUMsRUFBRSxJQUFJLENBQUM7RUFDWixDQUFDO0VBRUQsSUFBSUMsS0FBSyxHQUFHLFNBQVJBLEtBQUssQ0FBYVYsTUFBTSxFQUFFO0lBQzFCO0lBQ0FOLGtCQUFrQixDQUFDWSxTQUFTLENBQUNFLE1BQU0sQ0FBQyxRQUFRLENBQUM7SUFDN0M7SUFDQWIsY0FBYyxDQUFDVyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxRQUFRLENBQUM7SUFDdEM7SUFDQVYsWUFBWSxDQUFDUyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxRQUFRLENBQUM7RUFDeEMsQ0FBQzs7RUFFRDtFQUNBLE9BQU87SUFDSEksSUFBSSxFQUFFLGdCQUFZO01BQ2Q7TUFDQWxCLE9BQU8sR0FBR21CLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLGdDQUFnQyxDQUFDO01BRWxFLElBQUksQ0FBQ3BCLE9BQU8sRUFBRTtRQUNWO01BQ0o7TUFFQUcsY0FBYyxHQUFHSCxPQUFPLENBQUNvQixhQUFhLENBQUMsb0NBQW9DLENBQUM7TUFDNUVuQixrQkFBa0IsR0FBR0QsT0FBTyxDQUFDb0IsYUFBYSxDQUFDLHdDQUF3QyxDQUFDO01BQ3BGbEIsY0FBYyxHQUFHRixPQUFPLENBQUNvQixhQUFhLENBQUMsb0NBQW9DLENBQUM7TUFDNUVoQixZQUFZLEdBQUdKLE9BQU8sQ0FBQ29CLGFBQWEsQ0FBQyxrQ0FBa0MsQ0FBQzs7TUFFeEU7TUFDQWYsWUFBWSxHQUFHLElBQUlnQixRQUFRLENBQUNyQixPQUFPLENBQUM7O01BRXBDO01BQ0FLLFlBQVksQ0FBQ2lCLEVBQUUsQ0FBQyxtQkFBbUIsRUFBRWhCLFFBQVEsQ0FBQzs7TUFFOUM7TUFDQUQsWUFBWSxDQUFDaUIsRUFBRSxDQUFDLGlCQUFpQixFQUFFTCxLQUFLLENBQUM7SUFDN0M7RUFDSixDQUFDO0FBQ0wsQ0FBQyxFQUFFOztBQUVIO0FBQ0FOLE1BQU0sQ0FBQ1ksa0JBQWtCLENBQUMsWUFBWTtFQUNsQ3hCLGlCQUFpQixDQUFDbUIsSUFBSSxFQUFFO0FBQzVCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vdXRpbGl0aWVzL21vZGFscy91c2Vycy1zZWFyY2guanM/ZDU0OCJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtUTW9kYWxVc2VyU2VhcmNoID0gZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gUHJpdmF0ZSB2YXJpYWJsZXNcclxuICAgIHZhciBlbGVtZW50O1xyXG4gICAgdmFyIHN1Z2dlc3Rpb25zRWxlbWVudDtcclxuICAgIHZhciByZXN1bHRzRWxlbWVudDtcclxuICAgIHZhciB3cmFwcGVyRWxlbWVudDtcclxuICAgIHZhciBlbXB0eUVsZW1lbnQ7XHJcbiAgICB2YXIgc2VhcmNoT2JqZWN0O1xyXG5cclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgcHJvY2Vzc3MgPSBmdW5jdGlvbiAoc2VhcmNoKSB7XHJcbiAgICAgICAgdmFyIHRpbWVvdXQgPSBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgdmFyIG51bWJlciA9IEtUVXRpbC5nZXRSYW5kb21JbnQoMSwgMyk7XHJcblxyXG4gICAgICAgICAgICAvLyBIaWRlIHJlY2VudGx5IHZpZXdlZFxyXG4gICAgICAgICAgICBzdWdnZXN0aW9uc0VsZW1lbnQuY2xhc3NMaXN0LmFkZCgnZC1ub25lJyk7XHJcblxyXG4gICAgICAgICAgICBpZiAobnVtYmVyID09PSAzKSB7XHJcbiAgICAgICAgICAgICAgICAvLyBIaWRlIHJlc3VsdHNcclxuICAgICAgICAgICAgICAgIHJlc3VsdHNFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpO1xyXG4gICAgICAgICAgICAgICAgLy8gU2hvdyBlbXB0eSBtZXNzYWdlIFxyXG4gICAgICAgICAgICAgICAgZW1wdHlFbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgLy8gU2hvdyByZXN1bHRzXHJcbiAgICAgICAgICAgICAgICByZXN1bHRzRWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcclxuICAgICAgICAgICAgICAgIC8vIEhpZGUgZW1wdHkgbWVzc2FnZSBcclxuICAgICAgICAgICAgICAgIGVtcHR5RWxlbWVudC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgLy8gQ29tcGxldGUgc2VhcmNoXHJcbiAgICAgICAgICAgIHNlYXJjaC5jb21wbGV0ZSgpO1xyXG4gICAgICAgIH0sIDE1MDApO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciBjbGVhciA9IGZ1bmN0aW9uIChzZWFyY2gpIHtcclxuICAgICAgICAvLyBTaG93IHJlY2VudGx5IHZpZXdlZFxyXG4gICAgICAgIHN1Z2dlc3Rpb25zRWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcclxuICAgICAgICAvLyBIaWRlIHJlc3VsdHNcclxuICAgICAgICByZXN1bHRzRWxlbWVudC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuICAgICAgICAvLyBIaWRlIGVtcHR5IG1lc3NhZ2UgXHJcbiAgICAgICAgZW1wdHlFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBtZXRob2RzXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgLy8gRWxlbWVudHNcclxuICAgICAgICAgICAgZWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9tb2RhbF91c2Vyc19zZWFyY2hfaGFuZGxlcicpO1xyXG5cclxuICAgICAgICAgICAgaWYgKCFlbGVtZW50KSB7XHJcbiAgICAgICAgICAgICAgICByZXR1cm47XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHdyYXBwZXJFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cIndyYXBwZXJcIl0nKTtcclxuICAgICAgICAgICAgc3VnZ2VzdGlvbnNFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cInN1Z2dlc3Rpb25zXCJdJyk7XHJcbiAgICAgICAgICAgIHJlc3VsdHNFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cInJlc3VsdHNcIl0nKTtcclxuICAgICAgICAgICAgZW1wdHlFbGVtZW50ID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1rdC1zZWFyY2gtZWxlbWVudD1cImVtcHR5XCJdJyk7XHJcblxyXG4gICAgICAgICAgICAvLyBJbml0aWFsaXplIHNlYXJjaCBoYW5kbGVyXHJcbiAgICAgICAgICAgIHNlYXJjaE9iamVjdCA9IG5ldyBLVFNlYXJjaChlbGVtZW50KTtcclxuXHJcbiAgICAgICAgICAgIC8vIFNlYXJjaCBoYW5kbGVyXHJcbiAgICAgICAgICAgIHNlYXJjaE9iamVjdC5vbigna3Quc2VhcmNoLnByb2Nlc3MnLCBwcm9jZXNzcyk7XHJcblxyXG4gICAgICAgICAgICAvLyBDbGVhciBoYW5kbGVyXHJcbiAgICAgICAgICAgIHNlYXJjaE9iamVjdC5vbigna3Quc2VhcmNoLmNsZWFyJywgY2xlYXIpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RNb2RhbFVzZXJTZWFyY2guaW5pdCgpO1xyXG59KTsiXSwibmFtZXMiOlsiS1RNb2RhbFVzZXJTZWFyY2giLCJlbGVtZW50Iiwic3VnZ2VzdGlvbnNFbGVtZW50IiwicmVzdWx0c0VsZW1lbnQiLCJ3cmFwcGVyRWxlbWVudCIsImVtcHR5RWxlbWVudCIsInNlYXJjaE9iamVjdCIsInByb2Nlc3NzIiwic2VhcmNoIiwidGltZW91dCIsInNldFRpbWVvdXQiLCJudW1iZXIiLCJLVFV0aWwiLCJnZXRSYW5kb21JbnQiLCJjbGFzc0xpc3QiLCJhZGQiLCJyZW1vdmUiLCJjb21wbGV0ZSIsImNsZWFyIiwiaW5pdCIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsIktUU2VhcmNoIiwib24iLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/utilities/modals/users-search.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/utilities/modals/users-search.js"]();
/******/ 	
/******/ })()
;