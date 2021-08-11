/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/blocks/end_content.js":
/*!***********************************!*\
  !*** ./src/blocks/end_content.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);


Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-end-block", {
  title: "BP Pay-per-Post End",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "517.000000pt",
    height: "372.000000pt",
    viewBox: "0 0 517.000000 372.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,372.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 470 0 471 0 -6 29\n-6 29 216 -5 216 -6 0 287 0 287 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2276 3659 l-26 -20 0 -289 0 -288 418 -5 c387 -4 423 -5 500 -25 70\n-19 111 -22 258 -22 97 0 184 4 194 10 10 5 23 24 29 41 14 42 15 525 1 566\n-6 17 -22 35 -36 42 -18 8 -209 11 -668 11 -636 0 -644 0 -670 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M63 2930 c-12 -5 -26 -18 -32 -29 -7 -13 -11 -122 -11 -304 0 -283 0\n-284 23 -305 l23 -22 661 0 662 0 20 26 c20 26 21 39 21 306 0 163 -4 287 -10\n298 -5 10 -24 23 -41 29 -39 13 -1282 14 -1316 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1549 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -25 c24 -24 29 -25\n132 -22 l108 3 -3 324 c-1 178 -5 327 -8 332 -7 12 -172 10 -205 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3479 2873 c80 -80 133 -180 152 -287 12 -70 8 -264 -6 -298 -7 -17\n14 -18 363 -18 l371 0 20 26 c20 26 21 39 21 300 0 289 -3 313 -47 333 -16 8\n-168 11 -483 11 l-460 0 69 -67z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4519 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -24 24 -25 289 0\n289 0 21 23 c22 23 22 29 22 309 0 266 -1 287 -19 309 l-19 24 -279 2 c-162 1\n-289 -2 -304 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 2460 l0 -190 305 0 c292 0 306 1 325 20 18 18 20 33 20 184 l0\n163 -52 7 c-29 3 -176 6 -325 6 l-273 0 0 -190z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2990 2465 c0 -142 2 -157 20 -175 26 -26 114 -29 124 -4 12 32 6\n165 -10 202 -17 43 -67 97 -106 118 l-28 15 0 -156z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M40 2170 c-19 -19 -20 -33 -20 -310 0 -277 1 -291 20 -310 19 -19 33\n-20 314 -20 l295 0 20 26 c20 26 21 39 21 304 0 265 -1 278 -21 304 l-20 26\n-295 0 c-281 0 -295 -1 -314 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M781 2164 c-20 -26 -21 -38 -21 -304 0 -266 1 -278 21 -304 l21 -26\n481 2 482 3 0 325 0 325 -482 3 -481 2 -21 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2272 2178 c-7 -7 -12 -29 -12 -51 l0 -38 338 3 c328 3 338 4 389 26\n28 13 61 35 74 48 l22 24 -399 0 c-298 0 -403 -3 -412 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3569 2148 c-37 -73 -134 -160 -228 -206 -83 -40 -84 -41 -57 -52 15\n-5 32 -10 37 -10 6 0 44 -15 85 -34 72 -34 172 -120 231 -201 l22 -30 -2 266\nc-2 247 -3 269 -21 288 -28 31 -43 26 -67 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3750 2168 c-19 -21 -20 -34 -20 -310 0 -275 1 -289 20 -308 20 -20\n33 -20 685 -20 652 0 665 0 685 20 19 19 20 33 20 310 0 277 -1 291 -20 310\n-20 20 -33 20 -685 20 l-664 0 -21 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1617 c0 -36 5 -68 12 -75 14 -14 898 -18 898 -4 0 20 -78 87\n-129 111 l-56 26 -362 3 -363 3 0 -64z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M42 1427 c-22 -23 -22 -29 -22 -309 0 -266 1 -287 19 -309 l19 -24\n667 0 667 0 19 24 c18 22 19 42 19 306 0 270 -1 283 -21 309 l-20 26 -663 0\n-663 0 -21 -23z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1529 1431 l-24 -19 -3 -278 c-2 -188 1 -286 8 -305 16 -39 49 -49\n155 -49 l95 0 1 138 c1 75 2 226 3 334 l1 198 -106 0 c-90 0 -110 -3 -130 -19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1245 l0 -205 325 0 325 0 0 185 c0 172 -1 186 -20 205 -19 19\n-33 20 -325 20 l-305 0 0 -205z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3012 1430 c-21 -20 -22 -29 -22 -195 0 -128 3 -175 12 -175 29 0\n101 45 136 85 50 57 72 126 72 226 l0 79 -88 0 c-75 0 -92 -3 -110 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3716 1428 c14 -41 7 -250 -10 -320 -22 -96 -79 -202 -144 -270 l-55\n-58 412 0 c444 0 461 2 475 52 3 13 6 146 6 296 l0 273 -25 24 -24 25 -321 0\n-321 0 7 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 1425 l-25 -24 0 -275 c0 -183 4 -283 11 -300 20 -44 46 -47\n343 -44 l278 3 19 24 c18 22 19 43 19 310 l0 288 -23 21 c-23 22 -29 22 -311\n22 l-287 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 685 l-25 -24 0 -284 c0 -265 1 -286 19 -308 l19 -24 660 -3\nc655 -2 659 -2 685 19 l27 20 0 271 0 271 -215 -6 -215 -5 6 49 7 49 -472 0\n-472 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3303 679 c-142 -51 -235 -59 -665 -59 l-388 0 0 -267 c0 -148 4\n-273 8 -279 21 -33 50 -34 691 -34 457 0 647 3 665 11 14 7 30 25 36 42 14 41\n13 524 -1 566 -6 17 -19 36 -29 41 -10 6 -67 10 -127 9 -92 -1 -120 -5 -190\n-30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }))),
  category: "widgets",
  keywords: ["paywall", "end-paywall"],
  edit: props => {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    });
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/end_video.js":
/*!*********************************!*\
  !*** ./src/blocks/end_video.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);


Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-end-video-block", {
  title: "BP Pay-per-View End",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "517.000000pt",
    height: "372.000000pt",
    viewBox: "0 0 517.000000 372.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,372.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 470 0 471 0 -6 29\n-6 29 216 -5 216 -6 0 287 0 287 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2276 3659 l-26 -20 0 -289 0 -288 418 -5 c387 -4 423 -5 500 -25 70\n-19 111 -22 258 -22 97 0 184 4 194 10 10 5 23 24 29 41 14 42 15 525 1 566\n-6 17 -22 35 -36 42 -18 8 -209 11 -668 11 -636 0 -644 0 -670 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M63 2930 c-12 -5 -26 -18 -32 -29 -7 -13 -11 -122 -11 -304 0 -283 0\n-284 23 -305 l23 -22 661 0 662 0 20 26 c20 26 21 39 21 306 0 163 -4 287 -10\n298 -5 10 -24 23 -41 29 -39 13 -1282 14 -1316 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1549 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -25 c24 -24 29 -25\n132 -22 l108 3 -3 324 c-1 178 -5 327 -8 332 -7 12 -172 10 -205 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3479 2873 c80 -80 133 -180 152 -287 12 -70 8 -264 -6 -298 -7 -17\n14 -18 363 -18 l371 0 20 26 c20 26 21 39 21 300 0 289 -3 313 -47 333 -16 8\n-168 11 -483 11 l-460 0 69 -67z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4519 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -24 24 -25 289 0\n289 0 21 23 c22 23 22 29 22 309 0 266 -1 287 -19 309 l-19 24 -279 2 c-162 1\n-289 -2 -304 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 2460 l0 -190 305 0 c292 0 306 1 325 20 18 18 20 33 20 184 l0\n163 -52 7 c-29 3 -176 6 -325 6 l-273 0 0 -190z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2990 2465 c0 -142 2 -157 20 -175 26 -26 114 -29 124 -4 12 32 6\n165 -10 202 -17 43 -67 97 -106 118 l-28 15 0 -156z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M40 2170 c-19 -19 -20 -33 -20 -310 0 -277 1 -291 20 -310 19 -19 33\n-20 314 -20 l295 0 20 26 c20 26 21 39 21 304 0 265 -1 278 -21 304 l-20 26\n-295 0 c-281 0 -295 -1 -314 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M781 2164 c-20 -26 -21 -38 -21 -304 0 -266 1 -278 21 -304 l21 -26\n481 2 482 3 0 325 0 325 -482 3 -481 2 -21 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2272 2178 c-7 -7 -12 -29 -12 -51 l0 -38 338 3 c328 3 338 4 389 26\n28 13 61 35 74 48 l22 24 -399 0 c-298 0 -403 -3 -412 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3569 2148 c-37 -73 -134 -160 -228 -206 -83 -40 -84 -41 -57 -52 15\n-5 32 -10 37 -10 6 0 44 -15 85 -34 72 -34 172 -120 231 -201 l22 -30 -2 266\nc-2 247 -3 269 -21 288 -28 31 -43 26 -67 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3750 2168 c-19 -21 -20 -34 -20 -310 0 -275 1 -289 20 -308 20 -20\n33 -20 685 -20 652 0 665 0 685 20 19 19 20 33 20 310 0 277 -1 291 -20 310\n-20 20 -33 20 -685 20 l-664 0 -21 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1617 c0 -36 5 -68 12 -75 14 -14 898 -18 898 -4 0 20 -78 87\n-129 111 l-56 26 -362 3 -363 3 0 -64z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M42 1427 c-22 -23 -22 -29 -22 -309 0 -266 1 -287 19 -309 l19 -24\n667 0 667 0 19 24 c18 22 19 42 19 306 0 270 -1 283 -21 309 l-20 26 -663 0\n-663 0 -21 -23z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1529 1431 l-24 -19 -3 -278 c-2 -188 1 -286 8 -305 16 -39 49 -49\n155 -49 l95 0 1 138 c1 75 2 226 3 334 l1 198 -106 0 c-90 0 -110 -3 -130 -19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1245 l0 -205 325 0 325 0 0 185 c0 172 -1 186 -20 205 -19 19\n-33 20 -325 20 l-305 0 0 -205z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3012 1430 c-21 -20 -22 -29 -22 -195 0 -128 3 -175 12 -175 29 0\n101 45 136 85 50 57 72 126 72 226 l0 79 -88 0 c-75 0 -92 -3 -110 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3716 1428 c14 -41 7 -250 -10 -320 -22 -96 -79 -202 -144 -270 l-55\n-58 412 0 c444 0 461 2 475 52 3 13 6 146 6 296 l0 273 -25 24 -24 25 -321 0\n-321 0 7 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 1425 l-25 -24 0 -275 c0 -183 4 -283 11 -300 20 -44 46 -47\n343 -44 l278 3 19 24 c18 22 19 43 19 310 l0 288 -23 21 c-23 22 -29 22 -311\n22 l-287 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 685 l-25 -24 0 -284 c0 -265 1 -286 19 -308 l19 -24 660 -3\nc655 -2 659 -2 685 19 l27 20 0 271 0 271 -215 -6 -215 -5 6 49 7 49 -472 0\n-472 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3303 679 c-142 -51 -235 -59 -665 -59 l-388 0 0 -267 c0 -148 4\n-273 8 -279 21 -33 50 -34 691 -34 457 0 647 3 665 11 14 7 30 25 36 42 14 41\n13 524 -1 566 -6 17 -19 36 -29 41 -10 6 -67 10 -127 9 -92 -1 -120 -5 -190\n-30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }))),
  category: "widgets",
  keywords: ["paywall", "end-video-paywall"],
  edit: props => {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    });
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/file.js":
/*!****************************!*\
  !*** ./src/blocks/file.js ***!
  \****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-file-block", {
  title: "BP Pay-per-File",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "517.000000pt",
    height: "372.000000pt",
    viewBox: "0 0 517.000000 372.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,372.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 470 0 471 0 -6 29\n-6 29 216 -5 216 -6 0 287 0 287 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2276 3659 l-26 -20 0 -289 0 -288 418 -5 c387 -4 423 -5 500 -25 70\n-19 111 -22 258 -22 97 0 184 4 194 10 10 5 23 24 29 41 14 42 15 525 1 566\n-6 17 -22 35 -36 42 -18 8 -209 11 -668 11 -636 0 -644 0 -670 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M63 2930 c-12 -5 -26 -18 -32 -29 -7 -13 -11 -122 -11 -304 0 -283 0\n-284 23 -305 l23 -22 661 0 662 0 20 26 c20 26 21 39 21 306 0 163 -4 287 -10\n298 -5 10 -24 23 -41 29 -39 13 -1282 14 -1316 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1549 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -25 c24 -24 29 -25\n132 -22 l108 3 -3 324 c-1 178 -5 327 -8 332 -7 12 -172 10 -205 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3479 2873 c80 -80 133 -180 152 -287 12 -70 8 -264 -6 -298 -7 -17\n14 -18 363 -18 l371 0 20 26 c20 26 21 39 21 300 0 289 -3 313 -47 333 -16 8\n-168 11 -483 11 l-460 0 69 -67z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4519 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -24 24 -25 289 0\n289 0 21 23 c22 23 22 29 22 309 0 266 -1 287 -19 309 l-19 24 -279 2 c-162 1\n-289 -2 -304 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 2460 l0 -190 305 0 c292 0 306 1 325 20 18 18 20 33 20 184 l0\n163 -52 7 c-29 3 -176 6 -325 6 l-273 0 0 -190z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2990 2465 c0 -142 2 -157 20 -175 26 -26 114 -29 124 -4 12 32 6\n165 -10 202 -17 43 -67 97 -106 118 l-28 15 0 -156z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M40 2170 c-19 -19 -20 -33 -20 -310 0 -277 1 -291 20 -310 19 -19 33\n-20 314 -20 l295 0 20 26 c20 26 21 39 21 304 0 265 -1 278 -21 304 l-20 26\n-295 0 c-281 0 -295 -1 -314 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M781 2164 c-20 -26 -21 -38 -21 -304 0 -266 1 -278 21 -304 l21 -26\n481 2 482 3 0 325 0 325 -482 3 -481 2 -21 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2272 2178 c-7 -7 -12 -29 -12 -51 l0 -38 338 3 c328 3 338 4 389 26\n28 13 61 35 74 48 l22 24 -399 0 c-298 0 -403 -3 -412 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3569 2148 c-37 -73 -134 -160 -228 -206 -83 -40 -84 -41 -57 -52 15\n-5 32 -10 37 -10 6 0 44 -15 85 -34 72 -34 172 -120 231 -201 l22 -30 -2 266\nc-2 247 -3 269 -21 288 -28 31 -43 26 -67 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3750 2168 c-19 -21 -20 -34 -20 -310 0 -275 1 -289 20 -308 20 -20\n33 -20 685 -20 652 0 665 0 685 20 19 19 20 33 20 310 0 277 -1 291 -20 310\n-20 20 -33 20 -685 20 l-664 0 -21 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1617 c0 -36 5 -68 12 -75 14 -14 898 -18 898 -4 0 20 -78 87\n-129 111 l-56 26 -362 3 -363 3 0 -64z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M42 1427 c-22 -23 -22 -29 -22 -309 0 -266 1 -287 19 -309 l19 -24\n667 0 667 0 19 24 c18 22 19 42 19 306 0 270 -1 283 -21 309 l-20 26 -663 0\n-663 0 -21 -23z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1529 1431 l-24 -19 -3 -278 c-2 -188 1 -286 8 -305 16 -39 49 -49\n155 -49 l95 0 1 138 c1 75 2 226 3 334 l1 198 -106 0 c-90 0 -110 -3 -130 -19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1245 l0 -205 325 0 325 0 0 185 c0 172 -1 186 -20 205 -19 19\n-33 20 -325 20 l-305 0 0 -205z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3012 1430 c-21 -20 -22 -29 -22 -195 0 -128 3 -175 12 -175 29 0\n101 45 136 85 50 57 72 126 72 226 l0 79 -88 0 c-75 0 -92 -3 -110 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3716 1428 c14 -41 7 -250 -10 -320 -22 -96 -79 -202 -144 -270 l-55\n-58 412 0 c444 0 461 2 475 52 3 13 6 146 6 296 l0 273 -25 24 -24 25 -321 0\n-321 0 7 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 1425 l-25 -24 0 -275 c0 -183 4 -283 11 -300 20 -44 46 -47\n343 -44 l278 3 19 24 c18 22 19 43 19 310 l0 288 -23 21 c-23 22 -29 22 -311\n22 l-287 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 685 l-25 -24 0 -284 c0 -265 1 -286 19 -308 l19 -24 660 -3\nc655 -2 659 -2 685 19 l27 20 0 271 0 271 -215 -6 -215 -5 6 49 7 49 -472 0\n-472 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3303 679 c-142 -51 -235 -59 -665 -59 l-388 0 0 -267 c0 -148 4\n-273 8 -279 21 -33 50 -34 691 -34 457 0 647 3 665 11 14 7 30 25 36 42 14 41\n13 524 -1 566 -6 17 -19 36 -29 41 -10 6 -67 10 -127 9 -92 -1 -120 -5 -190\n-30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }))),
  category: "widgets",
  keywords: ["paywall", "file-paywall"],
  attributes: {
    pay_file_block: {
      type: "boolean",
      default: true
    },
    btc_format: {
      type: "string"
    },
    file: {
      type: "string",
      default: ""
    },
    title: {
      type: "string",
      default: "Untitled"
    },
    description: {
      type: "string",
      default: "No description"
    },
    preview: {
      type: "string",
      default: ""
    },
    currency: {
      type: "string"
    },
    price: {
      type: "number"
    },
    duration_type: {
      type: "string"
    },
    duration: {
      type: "number"
    }
  },
  edit: props => {
    const {
      attributes: {
        pay_file_block,
        btc_format,
        file,
        title,
        description,
        preview,
        currency,
        duration_type,
        price,
        duration
      },
      setAttributes
    } = props;
    const [show, setShow] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(currency === "SATS");
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "btcpw_pay__gutenberg_block_file"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "BP Paywall File",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ToggleControl"], {
      label: "Enable payment block",
      checked: pay_file_block,
      onChange: checked => {
        setAttributes({
          pay_file_block: checked
        });
      },
      value: pay_file_block
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Title",
      help: "Enter file title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Description",
      help: "Enter file description",
      onChange: desc => {
        setAttributes({
          description: desc
        });
      },
      value: description
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          preview: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
        onClick: open
      }, "File preview")
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        selectedItem === "SATS" ? setShow(true) : setShow(false);
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    })), show && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
      label: "BTC format",
      value: btc_format,
      onChange: selectedItem => setAttributes({
        btc_format: selectedItem
      }),
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
      label: "Price",
      value: price,
      onChange: nextValue => setAttributes({
        price: Number(nextValue)
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
      label: "Duration type",
      value: duration_type,
      onChange: selectedItem => setAttributes({
        duration_type: selectedItem
      }),
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "minute",
        label: "Minute"
      }, {
        value: "hour",
        label: "Hour"
      }, {
        value: "week",
        label: "Week"
      }, {
        value: "month",
        label: "Month"
      }, {
        value: "year",
        label: "Year"
      }, {
        value: "onetime",
        label: "Onetime"
      }, {
        value: "unlimited",
        label: "Unlimited"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
      label: "Duration",
      value: duration,
      onChange: nextValue => setAttributes({
        duration: Number(nextValue)
      })
    })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaPlaceholder"], {
      labels: {
        title: "BP Pay-per-File"
      },
      onSelect: el => setAttributes({
        file: el.url
      }),
      multiple: false,
      onSelectURL: el => setAttributes({
        file: el
      })
    }));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/start_content.js":
/*!*************************************!*\
  !*** ./src/blocks/start_content.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-start-block", {
  title: "BP Pay-per-Post Start",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "517.000000pt",
    height: "372.000000pt",
    viewBox: "0 0 517.000000 372.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,372.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 470 0 471 0 -6 29\n-6 29 216 -5 216 -6 0 287 0 287 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2276 3659 l-26 -20 0 -289 0 -288 418 -5 c387 -4 423 -5 500 -25 70\n-19 111 -22 258 -22 97 0 184 4 194 10 10 5 23 24 29 41 14 42 15 525 1 566\n-6 17 -22 35 -36 42 -18 8 -209 11 -668 11 -636 0 -644 0 -670 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M63 2930 c-12 -5 -26 -18 -32 -29 -7 -13 -11 -122 -11 -304 0 -283 0\n-284 23 -305 l23 -22 661 0 662 0 20 26 c20 26 21 39 21 306 0 163 -4 287 -10\n298 -5 10 -24 23 -41 29 -39 13 -1282 14 -1316 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1549 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -25 c24 -24 29 -25\n132 -22 l108 3 -3 324 c-1 178 -5 327 -8 332 -7 12 -172 10 -205 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3479 2873 c80 -80 133 -180 152 -287 12 -70 8 -264 -6 -298 -7 -17\n14 -18 363 -18 l371 0 20 26 c20 26 21 39 21 300 0 289 -3 313 -47 333 -16 8\n-168 11 -483 11 l-460 0 69 -67z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4519 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -24 24 -25 289 0\n289 0 21 23 c22 23 22 29 22 309 0 266 -1 287 -19 309 l-19 24 -279 2 c-162 1\n-289 -2 -304 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 2460 l0 -190 305 0 c292 0 306 1 325 20 18 18 20 33 20 184 l0\n163 -52 7 c-29 3 -176 6 -325 6 l-273 0 0 -190z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2990 2465 c0 -142 2 -157 20 -175 26 -26 114 -29 124 -4 12 32 6\n165 -10 202 -17 43 -67 97 -106 118 l-28 15 0 -156z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M40 2170 c-19 -19 -20 -33 -20 -310 0 -277 1 -291 20 -310 19 -19 33\n-20 314 -20 l295 0 20 26 c20 26 21 39 21 304 0 265 -1 278 -21 304 l-20 26\n-295 0 c-281 0 -295 -1 -314 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M781 2164 c-20 -26 -21 -38 -21 -304 0 -266 1 -278 21 -304 l21 -26\n481 2 482 3 0 325 0 325 -482 3 -481 2 -21 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2272 2178 c-7 -7 -12 -29 -12 -51 l0 -38 338 3 c328 3 338 4 389 26\n28 13 61 35 74 48 l22 24 -399 0 c-298 0 -403 -3 -412 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3569 2148 c-37 -73 -134 -160 -228 -206 -83 -40 -84 -41 -57 -52 15\n-5 32 -10 37 -10 6 0 44 -15 85 -34 72 -34 172 -120 231 -201 l22 -30 -2 266\nc-2 247 -3 269 -21 288 -28 31 -43 26 -67 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3750 2168 c-19 -21 -20 -34 -20 -310 0 -275 1 -289 20 -308 20 -20\n33 -20 685 -20 652 0 665 0 685 20 19 19 20 33 20 310 0 277 -1 291 -20 310\n-20 20 -33 20 -685 20 l-664 0 -21 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1617 c0 -36 5 -68 12 -75 14 -14 898 -18 898 -4 0 20 -78 87\n-129 111 l-56 26 -362 3 -363 3 0 -64z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M42 1427 c-22 -23 -22 -29 -22 -309 0 -266 1 -287 19 -309 l19 -24\n667 0 667 0 19 24 c18 22 19 42 19 306 0 270 -1 283 -21 309 l-20 26 -663 0\n-663 0 -21 -23z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1529 1431 l-24 -19 -3 -278 c-2 -188 1 -286 8 -305 16 -39 49 -49\n155 -49 l95 0 1 138 c1 75 2 226 3 334 l1 198 -106 0 c-90 0 -110 -3 -130 -19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1245 l0 -205 325 0 325 0 0 185 c0 172 -1 186 -20 205 -19 19\n-33 20 -325 20 l-305 0 0 -205z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3012 1430 c-21 -20 -22 -29 -22 -195 0 -128 3 -175 12 -175 29 0\n101 45 136 85 50 57 72 126 72 226 l0 79 -88 0 c-75 0 -92 -3 -110 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3716 1428 c14 -41 7 -250 -10 -320 -22 -96 -79 -202 -144 -270 l-55\n-58 412 0 c444 0 461 2 475 52 3 13 6 146 6 296 l0 273 -25 24 -24 25 -321 0\n-321 0 7 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 1425 l-25 -24 0 -275 c0 -183 4 -283 11 -300 20 -44 46 -47\n343 -44 l278 3 19 24 c18 22 19 43 19 310 l0 288 -23 21 c-23 22 -29 22 -311\n22 l-287 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 685 l-25 -24 0 -284 c0 -265 1 -286 19 -308 l19 -24 660 -3\nc655 -2 659 -2 685 19 l27 20 0 271 0 271 -215 -6 -215 -5 6 49 7 49 -472 0\n-472 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3303 679 c-142 -51 -235 -59 -665 -59 l-388 0 0 -267 c0 -148 4\n-273 8 -279 21 -33 50 -34 691 -34 457 0 647 3 665 11 14 7 30 25 36 42 14 41\n13 524 -1 566 -6 17 -19 36 -29 41 -10 6 -67 10 -127 9 -92 -1 -120 -5 -190\n-30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }))),
  category: "widgets",
  keywords: ["paywall", "start-paywall"],
  attributes: {
    pay_block: {
      type: "boolean",
      default: true
    },
    btc_format: {
      type: "string"
    },
    currency: {
      type: "string"
    },
    price: {
      type: "number"
    },
    duration_type: {
      type: "string"
    },
    duration: {
      type: "number"
    }
  },
  edit: props => {
    const {
      attributes: {
        pay_block,
        btc_format,
        currency,
        duration_type,
        price,
        duration
      },
      setAttributes
    } = props;
    const [show, setShow] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(currency === "SATS");
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "BP Paywall Text",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ToggleControl"], {
      label: "Enable paywall",
      checked: pay_block,
      onChange: checked => {
        setAttributes({
          pay_block: checked
        });
      },
      value: pay_block
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        selectedItem === "SATS" ? setShow(true) : setShow(false);
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    })), show && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
      label: "BTC format",
      value: btc_format,
      onChange: selectedItem => setAttributes({
        btc_format: selectedItem
      }),
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
      label: "Price",
      value: price,
      onChange: nextValue => setAttributes({
        price: Number(nextValue)
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SelectControl"], {
      label: "Duration type",
      value: duration_type,
      onChange: selectedItem => setAttributes({
        duration_type: selectedItem
      }),
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "minute",
        label: "Minute"
      }, {
        value: "hour",
        label: "Hour"
      }, {
        value: "week",
        label: "Week"
      }, {
        value: "month",
        label: "Month"
      }, {
        value: "year",
        label: "Year"
      }, {
        value: "onetime",
        label: "Onetime"
      }, {
        value: "unlimited",
        label: "Unlimited"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
      label: "Duration",
      value: duration,
      onChange: nextValue => setAttributes({
        duration: Number(nextValue)
      })
    })))));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/start_video.js":
/*!***********************************!*\
  !*** ./src/blocks/start_video.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-start-video-block", {
  title: "BP Pay-per-View Start",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "517.000000pt",
    height: "372.000000pt",
    viewBox: "0 0 517.000000 372.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,372.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 470 0 471 0 -6 29\n-6 29 216 -5 216 -6 0 287 0 287 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2276 3659 l-26 -20 0 -289 0 -288 418 -5 c387 -4 423 -5 500 -25 70\n-19 111 -22 258 -22 97 0 184 4 194 10 10 5 23 24 29 41 14 42 15 525 1 566\n-6 17 -22 35 -36 42 -18 8 -209 11 -668 11 -636 0 -644 0 -670 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M63 2930 c-12 -5 -26 -18 -32 -29 -7 -13 -11 -122 -11 -304 0 -283 0\n-284 23 -305 l23 -22 661 0 662 0 20 26 c20 26 21 39 21 306 0 163 -4 287 -10\n298 -5 10 -24 23 -41 29 -39 13 -1282 14 -1316 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1549 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -25 c24 -24 29 -25\n132 -22 l108 3 -3 324 c-1 178 -5 327 -8 332 -7 12 -172 10 -205 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3479 2873 c80 -80 133 -180 152 -287 12 -70 8 -264 -6 -298 -7 -17\n14 -18 363 -18 l371 0 20 26 c20 26 21 39 21 300 0 289 -3 313 -47 333 -16 8\n-168 11 -483 11 l-460 0 69 -67z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4519 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -24 24 -25 289 0\n289 0 21 23 c22 23 22 29 22 309 0 266 -1 287 -19 309 l-19 24 -279 2 c-162 1\n-289 -2 -304 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 2460 l0 -190 305 0 c292 0 306 1 325 20 18 18 20 33 20 184 l0\n163 -52 7 c-29 3 -176 6 -325 6 l-273 0 0 -190z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2990 2465 c0 -142 2 -157 20 -175 26 -26 114 -29 124 -4 12 32 6\n165 -10 202 -17 43 -67 97 -106 118 l-28 15 0 -156z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M40 2170 c-19 -19 -20 -33 -20 -310 0 -277 1 -291 20 -310 19 -19 33\n-20 314 -20 l295 0 20 26 c20 26 21 39 21 304 0 265 -1 278 -21 304 l-20 26\n-295 0 c-281 0 -295 -1 -314 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M781 2164 c-20 -26 -21 -38 -21 -304 0 -266 1 -278 21 -304 l21 -26\n481 2 482 3 0 325 0 325 -482 3 -481 2 -21 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2272 2178 c-7 -7 -12 -29 -12 -51 l0 -38 338 3 c328 3 338 4 389 26\n28 13 61 35 74 48 l22 24 -399 0 c-298 0 -403 -3 -412 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3569 2148 c-37 -73 -134 -160 -228 -206 -83 -40 -84 -41 -57 -52 15\n-5 32 -10 37 -10 6 0 44 -15 85 -34 72 -34 172 -120 231 -201 l22 -30 -2 266\nc-2 247 -3 269 -21 288 -28 31 -43 26 -67 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3750 2168 c-19 -21 -20 -34 -20 -310 0 -275 1 -289 20 -308 20 -20\n33 -20 685 -20 652 0 665 0 685 20 19 19 20 33 20 310 0 277 -1 291 -20 310\n-20 20 -33 20 -685 20 l-664 0 -21 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1617 c0 -36 5 -68 12 -75 14 -14 898 -18 898 -4 0 20 -78 87\n-129 111 l-56 26 -362 3 -363 3 0 -64z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M42 1427 c-22 -23 -22 -29 -22 -309 0 -266 1 -287 19 -309 l19 -24\n667 0 667 0 19 24 c18 22 19 42 19 306 0 270 -1 283 -21 309 l-20 26 -663 0\n-663 0 -21 -23z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1529 1431 l-24 -19 -3 -278 c-2 -188 1 -286 8 -305 16 -39 49 -49\n155 -49 l95 0 1 138 c1 75 2 226 3 334 l1 198 -106 0 c-90 0 -110 -3 -130 -19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1245 l0 -205 325 0 325 0 0 185 c0 172 -1 186 -20 205 -19 19\n-33 20 -325 20 l-305 0 0 -205z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3012 1430 c-21 -20 -22 -29 -22 -195 0 -128 3 -175 12 -175 29 0\n101 45 136 85 50 57 72 126 72 226 l0 79 -88 0 c-75 0 -92 -3 -110 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3716 1428 c14 -41 7 -250 -10 -320 -22 -96 -79 -202 -144 -270 l-55\n-58 412 0 c444 0 461 2 475 52 3 13 6 146 6 296 l0 273 -25 24 -24 25 -321 0\n-321 0 7 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 1425 l-25 -24 0 -275 c0 -183 4 -283 11 -300 20 -44 46 -47\n343 -44 l278 3 19 24 c18 22 19 43 19 310 l0 288 -23 21 c-23 22 -29 22 -311\n22 l-287 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 685 l-25 -24 0 -284 c0 -265 1 -286 19 -308 l19 -24 660 -3\nc655 -2 659 -2 685 19 l27 20 0 271 0 271 -215 -6 -215 -5 6 49 7 49 -472 0\n-472 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3303 679 c-142 -51 -235 -59 -665 -59 l-388 0 0 -267 c0 -148 4\n-273 8 -279 21 -33 50 -34 691 -34 457 0 647 3 665 11 14 7 30 25 36 42 14 41\n13 524 -1 566 -6 17 -19 36 -29 41 -10 6 -67 10 -127 9 -92 -1 -120 -5 -190\n-30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }))),
  category: "widgets",
  keywords: ["paywall", "start-video-paywall"],
  attributes: {
    pay_view_block: {
      type: "boolean",
      default: true
    },
    btc_format: {
      type: "string"
    },
    title: {
      type: "string",
      default: "Untitled"
    },
    description: {
      type: "string",
      default: "No description"
    },
    preview: {
      type: "string",
      default: ""
    },
    currency: {
      type: "string"
    },
    price: {
      type: "number"
    },
    duration_type: {
      type: "string"
    },
    duration: {
      type: "number"
    }
  },
  edit: props => {
    const {
      attributes: {
        pay_view_block,
        btc_format,
        title,
        description,
        preview,
        currency,
        duration_type,
        price,
        duration
      },
      setAttributes
    } = props;
    const [show, setShow] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(currency === "SATS");
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "BP Paywall Video",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ToggleControl"], {
      label: "Enable payment block",
      checked: pay_view_block,
      onChange: checked => {
        setAttributes({
          pay_view_block: checked
        });
      },
      value: pay_view_block
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Title",
      help: "Enter video title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Description",
      help: "Enter video description",
      onChange: desc => {
        setAttributes({
          description: desc
        });
      },
      value: description
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          preview: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Video preview")
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        selectedItem === "SATS" ? setShow(true) : setShow(false);
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    })), show && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      label: "BTC format",
      value: btc_format,
      onChange: selectedItem => setAttributes({
        btc_format: selectedItem
      }),
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      label: "Price",
      value: price,
      onChange: nextValue => setAttributes({
        price: Number(nextValue)
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      label: "Duration type",
      value: duration_type,
      onChange: selectedItem => setAttributes({
        duration_type: selectedItem
      }),
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "minute",
        label: "Minute"
      }, {
        value: "hour",
        label: "Hour"
      }, {
        value: "week",
        label: "Week"
      }, {
        value: "month",
        label: "Month"
      }, {
        value: "year",
        label: "Year"
      }, {
        value: "onetime",
        label: "Onetime"
      }, {
        value: "unlimited",
        label: "Unlimited"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      label: "Duration",
      value: duration,
      onChange: nextValue => setAttributes({
        duration: Number(nextValue)
      })
    })))));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/tipping_banner.js":
/*!**************************************!*\
  !*** ./src/blocks/tipping_banner.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-tipping-banner", {
  title: "BP Tipping Banner",
  icon: "dashicons-screenoptions",
  category: "widgets",
  keywords: ["tipping", "tipping-banner"],
  attributes: {
    dimension: {
      type: "string",
      default: "250x300"
    },
    title: {
      type: "string",
      default: "Support my work"
    },
    description: {
      type: "string",
      default: ""
    },
    currency: {
      type: "string"
    },
    background_color: {
      type: "string"
    },
    title_text_color: {
      type: "string"
    },
    tipping_text: {
      type: "string",
      default: "Enter Tipping Amount"
    },
    tipping_text_color: {
      type: "string"
    },
    background_image: {
      type: "string",
      default: ""
    },
    redirect: {
      type: "string"
    },
    description_color: {
      type: "string"
    },
    button_text: {
      type: "string",
      default: "Tipping now"
    },
    button_text_color: {
      type: "string"
    },
    button_color: {
      type: "string"
    },
    input_background: {
      type: "string"
    },
    logo_id: {
      type: "string"
    },
    background: {
      type: "string"
    },
    background_id: {
      type: "string"
    },
    value1_enabled: {
      type: "boolean",
      default: true
    },
    value1_amount: {
      type: "number",
      default: 1000
    },
    value1_currency: {
      type: "string",
      default: "SATS"
    },
    value1_icon: {
      type: "string",
      default: "fas fa-coffee"
    },
    value2_enabled: {
      type: "boolean",
      default: true
    },
    value2_amount: {
      type: "number",
      default: 2000
    },
    value2_currency: {
      type: "string",
      default: "SATS"
    },
    value2_icon: {
      type: "string",
      default: "fas fa-beer"
    },
    value3_enabled: {
      type: "boolean",
      default: true
    },
    value3_amount: {
      type: "number",
      default: 3000
    },
    value3_currency: {
      type: "string",
      default: "SATS"
    },
    value3_icon: {
      type: "string",
      default: "fas fa-cocktail"
    },
    display_name: {
      type: "boolean",
      default: true
    },
    mandatory_name: {
      type: "boolean",
      default: false
    },
    display_email: {
      type: "boolean",
      default: true
    },
    mandatory_email: {
      type: "boolean",
      default: false
    },
    display_address: {
      type: "boolean",
      default: true
    },
    mandatory_address: {
      type: "boolean",
      default: false
    },
    display_phone: {
      type: "boolean",
      default: true
    },
    mandatory_phone: {
      type: "boolean",
      default: false
    },
    display_message: {
      type: "boolean",
      default: true
    },
    mandatory_message: {
      type: "boolean",
      default: false
    },
    freeInput: {
      type: "boolean",
      default: true
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        dimension,
        background_color,
        background,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
        background_image,
        currency,
        value1_amount,
        value1_currency,
        value1_enabled,
        value1_icon,
        value2_amount,
        value2_currency,
        value2_enabled,
        value2_icon,
        value3_amount,
        value3_currency,
        value3_enabled,
        value3_icon,
        display_name,
        display_email,
        display_message,
        display_phone,
        display_address,
        mandatory_address,
        mandatory_email,
        mandatory_phone,
        mandatory_message,
        mandatory_name,
        freeInput
      },
      setAttributes
    } = props;
    const [displayName, setDisplayName] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_name);
    const [mandatoryName, setMandatoryName] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_name);
    const [displayEmail, setDisplayEmail] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_email);
    const [mandatoryEmail, setMandatoryEmail] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_email);
    const [displayAddress, setDisplayAddress] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_address);
    const [mandatoryAddress, setMandatoryAddress] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_address);
    const [displayPhone, setDisplayPhone] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_phone);
    const [mandatoryPhone, setMandatoryPhone] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_phone);
    const [displayMessage, setDisplayMessage] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_message);
    const [mandatoryMessage, setMandatoryMessage] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_message);
    const [value1, setValue1_enabled] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value1_enabled);
    const [value2, setValue2_enabled] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value2_enabled);
    const [value3, setValue3_enabled] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value3_enabled);
    const [freeInputEnabled, setFreeInput] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(freeInput);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Dimension",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "200x710",
        label: "200x710"
      }, {
        value: "600x280",
        label: "600x280"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Background"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          background_image: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Background image")
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Description"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          logo_id: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Logo")
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Description",
      help: "Enter description",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Tipping text",
      help: "Enter tipping text",
      onChange: content => {
        setAttributes({
          tipping_text: content
        });
      },
      value: tipping_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: content
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["URLInputButton"], {
      label: "Redirect link",
      value: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display free input",
      help: "Do you want to display free input field?",
      checked: freeInput,
      onChange: value => {
        setFreeInput(value);
        setAttributes({
          freeInput: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Amount"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display value 1",
      help: "Do you want to display value 1?",
      checked: value1_enabled,
      onChange: newval => setAttributes({
        value1_enabled: newval
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: value1_currency,
      onChange: selectedItem => {
        setAttributes({
          value1_currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value1_amount: amount
        });
      },
      shiftStep: 10,
      value: value1_amount
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: "FA Icon class",
      value: value1_icon,
      onChange: value => setAttributes({
        value1_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display value 2",
      help: "Do you want to display value 2?",
      checked: value2_enabled,
      onChange: value => {
        setValue2_enabled(value);
        setAttributes({
          value2_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: value2_currency,
      onChange: selectedItem => {
        setAttributes({
          value2_currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value2_amount: amount
        });
      },
      shiftStep: 10,
      value: value2_amount
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: "FA Icon class",
      value: value2_icon,
      onChange: value => setAttributes({
        value2_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display value 3",
      help: "Do you want to display value 3?",
      checked: value3_enabled,
      onChange: value => {
        setValue3_enabled(value);
        setAttributes({
          value3_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: value3_currency,
      onChange: selectedItem => {
        setAttributes({
          value3_currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value3_amount: amount
        });
      },
      shiftStep: 10,
      value: value3_amount
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: "FA Icon class",
      value: value3_icon,
      onChange: value => setAttributes({
        value3_icon: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Button"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Collect further information"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setDisplayName(value);
        setAttributes({
          display_name: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setMandatoryName(value);
        setAttributes({
          mandatory_name: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setDisplayEmail(value);
        setAttributes({
          display_email: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setMandatoryEmail(value);
        setAttributes({
          mandatory_email: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setDisplayAddress(value);
        setAttributes({
          display_address: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setMandatoryAddress(value);
        setAttributes({
          mandatory_address: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => {
        setDisplayPhone(value);
        setAttributes({
          display_phone: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setMandatoryPhone(value);
        setAttributes({
          mandatory_phone: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setDisplayMessage(value);
        setAttributes({
          display_message: displayMessage
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setMandatoryMessage(value);
        setAttributes({
          mandatory_message: mandatory_message
        });
      }
    }))))));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/tipping_box.js":
/*!***********************************!*\
  !*** ./src/blocks/tipping_box.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-tipping-box", {
  title: "BP Tipping Box",
  icon: "dashicons-screenoptions",
  category: "widgets",
  keywords: ["tipping", "tipping-box"],
  attributes: {
    dimension: {
      type: "string",
      default: "250x300"
    },
    title: {
      type: "string",
      default: "Support my work"
    },
    description: {
      type: "string",
      default: ""
    },
    currency: {
      type: "string"
    },
    background_color: {
      type: "string"
    },
    title_text_color: {
      type: "string"
    },
    tipping_text: {
      type: "string",
      default: "Enter Tipping Amount"
    },
    tipping_text_color: {
      type: "string"
    },
    background_image: {
      type: "string",
      default: ""
    },
    redirect: {
      type: "string"
    },
    description_color: {
      type: "string"
    },
    button_text: {
      type: "string",
      default: "Tipping now"
    },
    button_text_color: {
      type: "string"
    },
    button_color: {
      type: "string"
    },
    input_background: {
      type: "string"
    },
    logo_id: {
      type: "string"
    },
    background: {
      type: "string"
    },
    background_id: {
      type: "string"
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        dimension,
        background_color,
        background,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
        background_image,
        currency
      },
      setAttributes
    } = props;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Dimension",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "250x300",
        label: "250x300"
      }, {
        value: "300x300",
        label: "300x300"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Background"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          background_image: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Background image")
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Description"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          logo_id: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Logo")
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Description",
      help: "Enter description",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Tipping text",
      help: "Enter tipping text",
      onChange: content => {
        setAttributes({
          tipping_text: content
        });
      },
      value: tipping_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["URLInputButton"], {
      label: "Redirect link",
      value: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Button"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    })))));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/tipping_page.js":
/*!************************************!*\
  !*** ./src/blocks/tipping_page.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-tipping-page", {
  title: "BP Tipping Page",
  icon: "dashicons-screenoptions",
  category: "widgets",
  keywords: ["tipping", "tipping-page"],
  attributes: {
    dimension: {
      type: "string",
      default: "250x300"
    },
    title: {
      type: "string",
      default: "Support my work"
    },
    description: {
      type: "string",
      default: ""
    },
    currency: {
      type: "string"
    },
    background_color: {
      type: "string"
    },
    title_text_color: {
      type: "string"
    },
    tipping_text: {
      type: "string",
      default: "Enter Tipping Amount"
    },
    tipping_text_color: {
      type: "string"
    },
    background_image: {
      type: "string",
      default: ""
    },
    redirect: {
      type: "string"
    },
    description_color: {
      type: "string"
    },
    button_text: {
      type: "string",
      default: "Tipping now"
    },
    button_text_color: {
      type: "string"
    },
    button_color: {
      type: "string"
    },
    input_background: {
      type: "string"
    },
    logo_id: {
      type: "string"
    },
    background: {
      type: "string"
    },
    background_id: {
      type: "string"
    },
    value1_enabled: {
      type: "boolean",
      default: true
    },
    value1_amount: {
      type: "number",
      default: 1000
    },
    value1_currency: {
      type: "string",
      default: "SATS"
    },
    value1_icon: {
      type: "string",
      default: "fas fa-coffee"
    },
    value2_enabled: {
      type: "boolean",
      default: true
    },
    value2_amount: {
      type: "number",
      default: 2000
    },
    value2_currency: {
      type: "string",
      default: "SATS"
    },
    value2_icon: {
      type: "string",
      default: "fas fa-beer"
    },
    value3_enabled: {
      type: "boolean",
      default: true
    },
    value3_amount: {
      type: "number",
      default: 3000
    },
    value3_currency: {
      type: "string",
      default: "SATS"
    },
    value3_icon: {
      type: "string",
      default: "fas fa-cocktail"
    },
    display_name: {
      type: "boolean",
      default: true
    },
    mandatory_name: {
      type: "boolean",
      default: false
    },
    display_email: {
      type: "boolean",
      default: true
    },
    mandatory_email: {
      type: "boolean",
      default: false
    },
    display_address: {
      type: "boolean",
      default: true
    },
    mandatory_address: {
      type: "boolean",
      default: false
    },
    display_phone: {
      type: "boolean",
      default: true
    },
    mandatory_phone: {
      type: "boolean",
      default: false
    },
    display_message: {
      type: "boolean",
      default: true
    },
    mandatory_message: {
      type: "boolean",
      default: false
    },
    freeInput: {
      type: "boolean",
      default: true
    },
    step1: {
      type: "string",
      default: "Pledge"
    },
    step2: {
      type: "string",
      default: "Info"
    },
    active_color: {
      type: "string"
    },
    inactive_color: {
      type: "string"
    },
    show_icon: {
      type: "boolean"
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        dimension,
        background_color,
        background,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
        background_image,
        currency,
        value1_amount,
        value1_currency,
        value1_enabled,
        value1_icon,
        value2_amount,
        value2_currency,
        value2_enabled,
        value2_icon,
        value3_amount,
        value3_currency,
        value3_enabled,
        value3_icon,
        display_name,
        display_email,
        display_message,
        display_phone,
        display_address,
        mandatory_address,
        mandatory_email,
        mandatory_phone,
        mandatory_message,
        mandatory_name,
        freeInput,
        step1,
        step2,
        active_color,
        inactive_color,
        show_icon
      },
      setAttributes
    } = props;
    const [displayName, setDisplayName] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_name);
    const [mandatoryName, setMandatoryName] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_name);
    const [displayEmail, setDisplayEmail] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_email);
    const [mandatoryEmail, setMandatoryEmail] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_email);
    const [displayAddress, setDisplayAddress] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_address);
    const [mandatoryAddress, setMandatoryAddress] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_address);
    const [displayPhone, setDisplayPhone] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_phone);
    const [mandatoryPhone, setMandatoryPhone] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_phone);
    const [displayMessage, setDisplayMessage] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(display_message);
    const [mandatoryMessage, setMandatoryMessage] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(mandatory_message);
    const [value1, setValue1_enabled] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value1_enabled);
    const [value2, setValue2_enabled] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value2_enabled);
    const [value3, setValue3_enabled] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value3_enabled);
    const [freeInputEnabled, setFreeInput] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(freeInput);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Dimension",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "200x710",
        label: "200x710"
      }, {
        value: "600x280",
        label: "600x280"
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Background"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          background_image: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Background image")
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Description"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: pic => {
        setAttributes({
          logo_id: pic.sizes.full.url
        });
      },
      render: ({
        open
      }) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["Button"], {
        onClick: open
      }, "Logo")
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Description",
      help: "Enter description",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Tipping text",
      help: "Enter tipping text",
      onChange: content => {
        setAttributes({
          tipping_text: content
        });
      },
      value: tipping_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: content
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["URLInputButton"], {
      label: "Redirect link",
      value: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display free input",
      help: "Do you want to display free input field?",
      checked: freeInput,
      onChange: value => {
        setFreeInput(value);
        setAttributes({
          freeInput: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display icon",
      help: "Do you want to display icons?",
      checked: show_icon,
      onChange: value => {
        setAttributes({
          show_icon: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Amount"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display value 1",
      help: "Do you want to display value 1?",
      checked: value1_enabled,
      onChange: newval => setAttributes({
        value1_enabled: newval
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: value1_currency,
      onChange: selectedItem => {
        setAttributes({
          value1_currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value1_amount: amount
        });
      },
      shiftStep: 10,
      value: value1_amount
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: "FA Icon class",
      value: value1_icon,
      onChange: value => setAttributes({
        value1_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display value 2",
      help: "Do you want to display value 2?",
      checked: value2_enabled,
      onChange: value => {
        setValue2_enabled(value);
        setAttributes({
          value2_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: value2_currency,
      onChange: selectedItem => {
        setAttributes({
          value2_currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value2_amount: amount
        });
      },
      shiftStep: 10,
      value: value2_amount
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: "FA Icon class",
      value: value2_icon,
      onChange: value => setAttributes({
        value2_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Display value 3",
      help: "Do you want to display value 3?",
      checked: value3_enabled,
      onChange: value => {
        setValue3_enabled(value);
        setAttributes({
          value3_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
      value: value3_currency,
      onChange: selectedItem => {
        setAttributes({
          value3_currency: selectedItem
        });
      },
      options: [{
        value: "",
        label: "Default"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "BTC",
        label: "BTC"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value3_amount: amount
        });
      },
      shiftStep: 10,
      value: value3_amount
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
      label: "FA Icon class",
      value: value3_icon,
      onChange: value => setAttributes({
        value3_icon: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Button"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Tabs"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Step1",
      help: "Enter step1 text",
      onChange: content => {
        setAttributes({
          step1: content
        });
      },
      value: step1
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: active_color,
      onChangeComplete: value => setAttributes({
        active_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextareaControl"], {
      label: "Step2",
      help: "Enter step2 text",
      onChange: content => {
        setAttributes({
          step2: content
        });
      },
      value: step1
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["ColorPicker"], {
      color: inactive_color,
      onChangeComplete: value => setAttributes({
        inactive_color: value.hex
      }),
      disableAlpha: true
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
      title: "Collect further information"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setDisplayName(value);
        setAttributes({
          display_name: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setMandatoryName(value);
        setAttributes({
          mandatory_name: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setDisplayEmail(value);
        setAttributes({
          display_email: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setMandatoryEmail(value);
        setAttributes({
          mandatory_email: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setDisplayAddress(value);
        setAttributes({
          display_address: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setMandatoryAddress(value);
        setAttributes({
          mandatory_address: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => {
        setDisplayPhone(value);
        setAttributes({
          display_phone: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setMandatoryPhone(value);
        setAttributes({
          mandatory_phone: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setDisplayMessage(value);
        setAttributes({
          display_message: displayMessage
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setMandatoryMessage(value);
        setAttributes({
          mandatory_message: mandatory_message
        });
      }
    }))))));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/blocks/video_catalog.js":
/*!*************************************!*\
  !*** ./src/blocks/video_catalog.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);


Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btc-paywall/gutenberg-catalog-view", {
  title: "BP Video Catalog",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "517.000000pt",
    height: "372.000000pt",
    viewBox: "0 0 517.000000 372.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,372.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 470 0 471 0 -6 29\n-6 29 216 -5 216 -6 0 287 0 287 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2276 3659 l-26 -20 0 -289 0 -288 418 -5 c387 -4 423 -5 500 -25 70\n-19 111 -22 258 -22 97 0 184 4 194 10 10 5 23 24 29 41 14 42 15 525 1 566\n-6 17 -22 35 -36 42 -18 8 -209 11 -668 11 -636 0 -644 0 -670 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 3655 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M63 2930 c-12 -5 -26 -18 -32 -29 -7 -13 -11 -122 -11 -304 0 -283 0\n-284 23 -305 l23 -22 661 0 662 0 20 26 c20 26 21 39 21 306 0 163 -4 287 -10\n298 -5 10 -24 23 -41 29 -39 13 -1282 14 -1316 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1549 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -25 c24 -24 29 -25\n132 -22 l108 3 -3 324 c-1 178 -5 327 -8 332 -7 12 -172 10 -205 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3479 2873 c80 -80 133 -180 152 -287 12 -70 8 -264 -6 -298 -7 -17\n14 -18 363 -18 l371 0 20 26 c20 26 21 39 21 300 0 289 -3 313 -47 333 -16 8\n-168 11 -483 11 l-460 0 69 -67z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4519 2929 c-46 -17 -49 -40 -49 -335 l0 -275 25 -24 24 -25 289 0\n289 0 21 23 c22 23 22 29 22 309 0 266 -1 287 -19 309 l-19 24 -279 2 c-162 1\n-289 -2 -304 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 2460 l0 -190 305 0 c292 0 306 1 325 20 18 18 20 33 20 184 l0\n163 -52 7 c-29 3 -176 6 -325 6 l-273 0 0 -190z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2990 2465 c0 -142 2 -157 20 -175 26 -26 114 -29 124 -4 12 32 6\n165 -10 202 -17 43 -67 97 -106 118 l-28 15 0 -156z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M40 2170 c-19 -19 -20 -33 -20 -310 0 -277 1 -291 20 -310 19 -19 33\n-20 314 -20 l295 0 20 26 c20 26 21 39 21 304 0 265 -1 278 -21 304 l-20 26\n-295 0 c-281 0 -295 -1 -314 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M781 2164 c-20 -26 -21 -38 -21 -304 0 -266 1 -278 21 -304 l21 -26\n481 2 482 3 0 325 0 325 -482 3 -481 2 -21 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2272 2178 c-7 -7 -12 -29 -12 -51 l0 -38 338 3 c328 3 338 4 389 26\n28 13 61 35 74 48 l22 24 -399 0 c-298 0 -403 -3 -412 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3569 2148 c-37 -73 -134 -160 -228 -206 -83 -40 -84 -41 -57 -52 15\n-5 32 -10 37 -10 6 0 44 -15 85 -34 72 -34 172 -120 231 -201 l22 -30 -2 266\nc-2 247 -3 269 -21 288 -28 31 -43 26 -67 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3750 2168 c-19 -21 -20 -34 -20 -310 0 -275 1 -289 20 -308 20 -20\n33 -20 685 -20 652 0 665 0 685 20 19 19 20 33 20 310 0 277 -1 291 -20 310\n-20 20 -33 20 -685 20 l-664 0 -21 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1617 c0 -36 5 -68 12 -75 14 -14 898 -18 898 -4 0 20 -78 87\n-129 111 l-56 26 -362 3 -363 3 0 -64z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M42 1427 c-22 -23 -22 -29 -22 -309 0 -266 1 -287 19 -309 l19 -24\n667 0 667 0 19 24 c18 22 19 42 19 306 0 270 -1 283 -21 309 l-20 26 -663 0\n-663 0 -21 -23z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1529 1431 l-24 -19 -3 -278 c-2 -188 1 -286 8 -305 16 -39 49 -49\n155 -49 l95 0 1 138 c1 75 2 226 3 334 l1 198 -106 0 c-90 0 -110 -3 -130 -19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2260 1245 l0 -205 325 0 325 0 0 185 c0 172 -1 186 -20 205 -19 19\n-33 20 -325 20 l-305 0 0 -205z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3012 1430 c-21 -20 -22 -29 -22 -195 0 -128 3 -175 12 -175 29 0\n101 45 136 85 50 57 72 126 72 226 l0 79 -88 0 c-75 0 -92 -3 -110 -20z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3716 1428 c14 -41 7 -250 -10 -320 -22 -96 -79 -202 -144 -270 l-55\n-58 412 0 c444 0 461 2 475 52 3 13 6 146 6 296 l0 273 -25 24 -24 25 -321 0\n-321 0 7 -22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 1425 l-25 -24 0 -275 c0 -183 4 -283 11 -300 20 -44 46 -47\n343 -44 l278 3 19 24 c18 22 19 43 19 310 l0 288 -23 21 c-23 22 -29 22 -311\n22 l-287 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M45 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 284 0 c266 0 286 1\n308 19 l24 19 0 297 0 297 -24 19 c-22 18 -42 19 -308 19 l-284 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M785 685 l-25 -24 0 -284 c0 -265 1 -286 19 -308 l19 -24 660 -3\nc655 -2 659 -2 685 19 l27 20 0 271 0 271 -215 -6 -215 -5 6 49 7 49 -472 0\n-472 0 -24 -25z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3303 679 c-142 -51 -235 -59 -665 -59 l-388 0 0 -267 c0 -148 4\n-273 8 -279 21 -33 50 -34 691 -34 457 0 647 3 665 11 14 7 30 25 36 42 14 41\n13 524 -1 566 -6 17 -19 36 -29 41 -10 6 -67 10 -127 9 -92 -1 -120 -5 -190\n-30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3755 685 l-25 -24 0 -286 0 -286 25 -24 24 -25 656 0 656 0 24 25\n25 24 0 286 0 286 -25 24 -24 25 -656 0 -656 0 -24 -25z"
  }))),
  category: "widgets",
  keywords: ["paywall", "end-video-paywall"],
  edit: props => {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("hr", {
      class: "btcpw_pay__gutenberg_block_separator"
    });
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_start_content__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/start_content */ "./src/blocks/start_content.js");
/* harmony import */ var _blocks_end_content__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/end_content */ "./src/blocks/end_content.js");
/* harmony import */ var _blocks_start_video__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./blocks/start_video */ "./src/blocks/start_video.js");
/* harmony import */ var _blocks_end_video__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./blocks/end_video */ "./src/blocks/end_video.js");
/* harmony import */ var _blocks_video_catalog__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/video_catalog */ "./src/blocks/video_catalog.js");
/* harmony import */ var _blocks_file__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/file */ "./src/blocks/file.js");
/* harmony import */ var _blocks_tipping_box__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./blocks/tipping_box */ "./src/blocks/tipping_box.js");
/* harmony import */ var _blocks_tipping_banner__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./blocks/tipping_banner */ "./src/blocks/tipping_banner.js");
/* harmony import */ var _blocks_tipping_page__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./blocks/tipping_page */ "./src/blocks/tipping_page.js");










/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map