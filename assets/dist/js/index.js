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
/******/ 	return __webpack_require__(__webpack_require__.s = "./blocks/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./blocks/blocks/end_content.js":
/*!**************************************!*\
  !*** ./blocks/blocks/end_content.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);


Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-end-block', {
  title: 'BTCPW Pay-per-Post End',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['paywall', 'end-paywall'],
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

/***/ "./blocks/blocks/end_video.js":
/*!************************************!*\
  !*** ./blocks/blocks/end_video.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);


Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-end-video-block', {
  title: 'BTCPW Pay-per-View End',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['paywall', 'end-video-paywall'],
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

/***/ "./blocks/blocks/shortcode_store.js":
/*!******************************************!*\
  !*** ./blocks/blocks/shortcode_store.js ***!
  \******************************************/
/*! exports provided: STORE_NAME */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "STORE_NAME", function() { return STORE_NAME; });
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);


const DEFAULT_STATE = {
  shortcodeList: {}
};
const STORE_NAME = 'btcpaywall/shortcode_data';
const actions = {
  setShortcodeList(shortcodeList) {
    return {
      type: 'SET_SHORTCODE_LIST',
      shortcodeList
    };
  },

  getShortcodeList(path) {
    return {
      type: 'GET_SHORTCODE_LIST',
      path
    };
  }

};

const reducer = function () {
  let state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : DEFAULT_STATE;
  let action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case 'SET_SHORTCODE_LIST':
      {
        return { ...state,
          shortcodeList: action.shortcodeList
        };
      }

    default:
      {
        return state;
      }
  }
};

const selectors = {
  getShortcodeList(state) {
    const {
      shortcodeList
    } = state;
    return shortcodeList;
  }

};
const controls = {
  GET_SHORTCODE_LIST(action) {
    return _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_0___default()({
      path: action.path
    });
  }

};
const resolvers = {
  *getShortcodeList() {
    const shortcodeList = yield actions.getShortcodeList('/btcpaywall/v1/shortcode-list');
    return actions.setShortcodeList(shortcodeList);
  }

};
const storeConfig = {
  reducer,
  controls,
  selectors,
  resolvers,
  actions
};
Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["registerStore"])(STORE_NAME, storeConfig);


/***/ }),

/***/ "./blocks/blocks/start_content.js":
/*!****************************************!*\
  !*** ./blocks/blocks/start_content.js ***!
  \****************************************/
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
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__);






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("btcpaywall/gutenberg-start-block", {
  title: "BTCPW Pay-per-Post Start",
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: "widgets",
  keywords: ["paywall", "start-paywall"],
  attributes: {
    className: {
      type: "string",
      default: ""
    },
    pay_block: {
      type: "boolean",
      default: true
    },
    background_color: {
      type: "string"
    },
    width: {
      type: "number",
      default: 500
    },
    height: {
      type: "number",
      default: 600
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
    },
    header_text: {
      type: "string",
      default: "Pay now to unlock blogpost"
    },
    header_color: {
      type: "string"
    },
    info_text: {
      type: "string",
      default: "For {price} {currency} you will have access for {duration} {dtype}."
    },
    info_color: {
      type: "string"
    },
    button_text: {
      type: "string",
      default: "Pay"
    },
    button_text_color: {
      type: "string"
    },
    button_color: {
      type: "string",
      default: "#FE642E"
    },
    button_color_hover: {
      type: "string",
      default: "#FFF"
    },
    continue_button_text: {
      type: "string",
      default: "Continue"
    },
    continue_button_text_color: {
      type: "string",
      default: "#FFF"
    },
    continue_button_color: {
      type: "string",
      default: "#FE642E"
    },
    continue_button_color_hover: {
      type: "string",
      default: "#FFF"
    },
    previous_button_text: {
      type: "string",
      default: "Previous"
    },
    previous_button_text_color: {
      type: "string",
      default: "#FFF"
    },
    previous_button_color: {
      type: "string",
      default: "#1d5aa3"
    },
    previous_button_color_hover: {
      type: "string",
      default: "#FFF"
    },
    link: {
      type: "boolean",
      default: false
    },
    help_link: {
      type: "string"
    },
    help_text: {
      type: "string",
      default: "Help"
    },
    additional_link: {
      type: "boolean",
      default: false
    },
    additional_help_link: {
      type: "string"
    },
    additional_help_text: {
      type: "string"
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
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        pay_block,
        background_color,
        width,
        height,
        currency,
        duration_type,
        price,
        duration,
        header_text,
        header_color,
        info_text,
        info_color,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
        link,
        help_link,
        help_text,
        additional_link,
        additional_help_link,
        additional_help_text,
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
        className
      },
      setAttributes
    } = props;
    const inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
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
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: "BTC",
        label: "BTC"
      }, {
        value: "SATS",
        label: "SATS"
      }, {
        value: "EUR",
        label: "EUR"
      }, {
        value: "USD",
        label: "USD"
      }, {
        value: "GBP",
        label: "GBP"
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
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "Paywall design"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
      label: "Width",
      value: width,
      onChange: nextValue => setAttributes({
        width: Number(nextValue)
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["__experimentalNumberControl"], {
      label: "Height",
      value: height,
      onChange: nextValue => setAttributes({
        height: Number(nextValue)
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "Main"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Title",
      help: "Enter title text",
      onChange: content => {
        setAttributes({
          header_text: content
        });
      },
      value: header_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Title color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: header_color,
      onChangeComplete: value => setAttributes({
        header_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Price information",
      help: "Enter price information text",
      onChange: content => {
        setAttributes({
          info_text: content
        });
      },
      value: info_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Price information color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: info_color,
      onChangeComplete: value => setAttributes({
        info_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "Buttons"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Button color on hover"), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: button_color_hover,
      onChangeComplete: value => setAttributes({
        button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Continue button",
      help: "Enter continue button text",
      onChange: content => {
        setAttributes({
          continue_button_text: content
        });
      },
      value: continue_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: continue_button_color,
      onChangeComplete: value => setAttributes({
        continue_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        continue_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: continue_button_color_hover,
      onChangeComplete: value => setAttributes({
        continue_button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Previous button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          previous_button_text: content
        });
      },
      value: previous_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: previous_button_color,
      onChangeComplete: value => setAttributes({
        previous_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: previous_button_text_color,
      onChangeComplete: value => setAttributes({
        previous_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      color: previous_button_color_hover,
      onChangeComplete: value => setAttributes({
        previous_button_color_hover: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "Help link",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Display help link",
      help: "Do you want to display help link?",
      checked: link,
      onChange: value => {
        setAttributes({
          link: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Help link url "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["URLInputButton"], {
      label: "Help link url",
      url: help_link,
      onChange: value => setAttributes({
        help_link: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Help link text",
      help: "Enter help link text",
      onChange: content => {
        setAttributes({
          help_text: content
        });
      },
      value: help_text
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "Additional link"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Display additional help link",
      help: "Do you want to display additional help link?",
      checked: additional_link,
      onChange: value => {
        setAttributes({
          additional_link: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Additional help link url "), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["URLInputButton"], {
      label: "Additional help link",
      url: additional_help_link,
      onChange: value => setAttributes({
        additional_help_link: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextareaControl"], {
      label: "Additional help link text",
      help: "Enter additional help link text",
      onChange: content => {
        setAttributes({
          additional_help_text: content
        });
      },
      value: additional_help_text
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelBody"], {
      title: "Customer information"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setAttributes({
          display_name: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setAttributes({
          mandatory_name: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setAttributes({
          display_email: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setAttributes({
          mandatory_email: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setAttributes({
          display_address: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setAttributes({
          mandatory_address: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => setAttributes({
        display_phone: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setAttributes({
          mandatory_phone: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setAttributes({
          display_message: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setAttributes({
          mandatory_message: value
        });
      }
    }))))));
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default.a, {
      block: "btcpaywall/gutenberg-start-block",
      attributes: {
        pay_block,
        background_color,
        width,
        height,
        currency,
        duration_type,
        price,
        duration,
        link,
        help_link,
        help_text,
        additional_link,
        additional_help_link,
        additional_help_text,
        header_text,
        header_color,
        info_text,
        info_color,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
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
        className
      }
    }), inspectorControls)];
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/blocks/start_video.js":
/*!**************************************!*\
  !*** ./blocks/blocks/start_video.js ***!
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
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__);







Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-start-video-block', {
  title: 'BTCPW Pay-per-View Start',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['paywall', 'start-video-paywall'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    pay_view_block: {
      type: 'boolean',
      default: true
    },
    title: {
      type: 'string',
      default: 'Untitled'
    },
    description: {
      type: 'string',
      default: 'No description'
    },
    title_color: {
      type: 'string'
    },
    description_color: {
      type: 'string'
    },
    preview: {
      type: 'number',
      default: 0
    },
    background_color: {
      type: 'string'
    },
    width: {
      type: 'number',
      default: 500
    },
    height: {
      type: 'number',
      default: 600
    },
    currency: {
      type: 'string'
    },
    price: {
      type: 'number'
    },
    duration_type: {
      type: 'string'
    },
    duration: {
      type: 'number'
    },
    header_text: {
      type: 'string',
      default: 'Pay now to watch the whole video'
    },
    header_color: {
      type: 'string'
    },
    info_text: {
      type: 'string',
      default: 'For {price} {currency} you will have access for {duration} {dtype}.'
    },
    info_color: {
      type: 'string'
    },
    button_text: {
      type: 'string',
      default: 'Pay'
    },
    button_text_color: {
      type: 'string'
    },
    button_color: {
      type: 'string',
      default: '#FE642E'
    },
    button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_text: {
      type: 'string',
      default: 'Continue'
    },
    continue_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_color: {
      type: 'string',
      default: '#FE642E'
    },
    continue_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_text: {
      type: 'string',
      default: 'Previous'
    },
    previous_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_color: {
      type: 'string',
      default: '#1d5aa3'
    },
    previous_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    link: {
      type: 'boolean',
      default: false
    },
    help_link: {
      type: 'string'
    },
    help_text: {
      type: 'string',
      default: 'Help'
    },
    additional_link: {
      type: 'boolean',
      default: false
    },
    additional_help_link: {
      type: 'string'
    },
    additional_help_text: {
      type: 'string'
    },
    display_name: {
      type: 'boolean',
      default: true
    },
    mandatory_name: {
      type: 'boolean',
      default: false
    },
    display_email: {
      type: 'boolean',
      default: true
    },
    mandatory_email: {
      type: 'boolean',
      default: false
    },
    display_address: {
      type: 'boolean',
      default: true
    },
    mandatory_address: {
      type: 'boolean',
      default: false
    },
    display_phone: {
      type: 'boolean',
      default: true
    },
    mandatory_phone: {
      type: 'boolean',
      default: false
    },
    display_message: {
      type: 'boolean',
      default: true
    },
    mandatory_message: {
      type: 'boolean',
      default: false
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        pay_view_block,
        background_color,
        width,
        height,
        title,
        description,
        title_color,
        description_color,
        preview,
        currency,
        duration_type,
        price,
        duration,
        link,
        help_link,
        help_text,
        additional_link,
        additional_help_link,
        additional_help_text,
        header_text,
        header_color,
        info_text,
        info_color,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
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
        className
      },
      setAttributes
    } = props;
    const [show, setShow] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(currency === 'SATS');
    const previewMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_3__["useSelect"])(select => {
      return preview ? select('core').getMedia(preview) : undefined;
    }, [preview]);
    const inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "BP Paywall Video",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ToggleControl"], {
      label: "Enable payment block",
      checked: pay_view_block,
      onChange: checked => {
        setAttributes({
          pay_view_block: checked
        });
      },
      value: pay_view_block
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      label: "Price",
      value: price,
      onChange: nextValue => setAttributes({
        price: Number(nextValue)
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      label: "Duration type",
      value: duration_type,
      onChange: selectedItem => setAttributes({
        duration_type: selectedItem
      }),
      options: [{
        value: 'minute',
        label: 'Minute'
      }, {
        value: 'hour',
        label: 'Hour'
      }, {
        value: 'week',
        label: 'Week'
      }, {
        value: 'month',
        label: 'Month'
      }, {
        value: 'year',
        label: 'Year'
      }, {
        value: 'onetime',
        label: 'Onetime'
      }, {
        value: 'unlimited',
        label: 'Unlimited'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      label: "Duration",
      value: duration,
      onChange: nextValue => setAttributes({
        duration: Number(nextValue)
      })
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Paywall design",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      label: "Width",
      value: width,
      onChange: nextValue => setAttributes({
        width: Number(nextValue)
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      label: "Height",
      value: height,
      onChange: nextValue => setAttributes({
        height: Number(nextValue)
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Video preview"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Title",
      help: "Enter video title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Title color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: title_color,
      onChangeComplete: value => setAttributes({
        title_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Description",
      help: "Enter video description text",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Description color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          preview: el.id
        });
      },
      value: preview,
      allowedTypes: ['image'],
      render: _ref => {
        let {
          open
        } = _ref;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: preview == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !preview && 'Choose preview image', !!preview && previewMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ResponsiveWrapper"], {
          naturalWidth: previewMedia.media_details.width,
          naturalHeight: previewMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: previewMedia.source_url
        })));
      }
    })), !!preview && previewMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUpload"], {
      title: "Replace preview image",
      value: preview,
      onSelect: el => {
        setAttributes({
          preview: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref2 => {
        let {
          open
        } = _ref2;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace preview image');
      }
    })), !!preview && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
      onClick: el => {
        setAttributes({
          preview: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, 'Remove preview image')))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Main"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Title",
      help: "Enter title text",
      onChange: content => {
        setAttributes({
          header_text: content
        });
      },
      value: header_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Title color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: header_color,
      onChangeComplete: value => setAttributes({
        header_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Price information",
      help: "Enter price information text",
      onChange: content => {
        setAttributes({
          info_text: content
        });
      },
      value: info_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Price information color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: info_color,
      onChangeComplete: value => setAttributes({
        info_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Buttons"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color on hover"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_color_hover,
      onChangeComplete: value => setAttributes({
        button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Continue button",
      help: "Enter continue button text",
      onChange: content => {
        setAttributes({
          continue_button_text: content
        });
      },
      value: continue_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: continue_button_color,
      onChangeComplete: value => setAttributes({
        continue_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        continue_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Continue button color on hover"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: continue_button_color_hover,
      onChangeComplete: value => setAttributes({
        continue_button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Previous button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          previous_button_text: content
        });
      },
      value: previous_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_color,
      onChangeComplete: value => setAttributes({
        previous_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_text_color,
      onChangeComplete: value => setAttributes({
        previous_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Previous button color on hover"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_color_hover,
      onChangeComplete: value => setAttributes({
        previous_button_color_hover: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Help link",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display help link",
      help: "Do you want to display help link?",
      checked: link,
      onChange: value => {
        setAttributes({
          link: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Help link url "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["URLInputButton"], {
      label: "Help link url",
      url: help_link,
      onChange: value => setAttributes({
        help_link: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Help link text",
      help: "Enter help link text",
      onChange: content => {
        setAttributes({
          help_text: content
        });
      },
      value: help_text
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Additional link"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display additional help link",
      help: "Do you want to display additional help link?",
      checked: additional_link,
      onChange: value => {
        setAttributes({
          additional_link: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Additional help link url "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["URLInputButton"], {
      label: "Additional help link",
      url: additional_help_link,
      onChange: value => setAttributes({
        additional_help_link: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Additional help link text",
      help: "Enter additional help link text",
      onChange: content => {
        setAttributes({
          additional_help_text: content
        });
      },
      value: additional_help_text
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Customer information"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setAttributes({
          display_name: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setAttributes({
          mandatory_name: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setAttributes({
          display_email: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setAttributes({
          mandatory_email: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setAttributes({
          display_address: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setAttributes({
          mandatory_address: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => setAttributes({
        display_phone: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setAttributes({
          mandatory_phone: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setAttributes({
          display_message: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setAttributes({
          mandatory_message: value
        });
      }
    }))))));
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default.a, {
      block: "btcpaywall/gutenberg-start-video-block",
      attributes: {
        pay_view_block,
        background_color,
        width,
        height,
        title,
        description,
        title_color,
        description_color,
        preview,
        currency,
        duration_type,
        price,
        duration,
        link,
        help_link,
        help_text,
        additional_link,
        additional_help_link,
        additional_help_text,
        header_text,
        header_color,
        info_text,
        info_color,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
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
        className
      }
    }), inspectorControls)];
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/blocks/tipping_banner_high.js":
/*!**********************************************!*\
  !*** ./blocks/blocks/tipping_banner_high.js ***!
  \**********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__);






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-tipping-banner-high', {
  title: 'BTCPW Tipping Banner High',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['tipping', 'tipping-banner-high'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    dimension: {
      type: 'string',
      default: '200x710'
    },
    title: {
      type: 'string',
      default: 'Support my work'
    },
    description: {
      type: 'string',
      default: ''
    },
    currency: {
      type: 'string'
    },
    title_text_color: {
      type: 'string'
    },
    tipping_text: {
      type: 'string',
      default: 'Enter Tipping Amount'
    },
    tipping_text_color: {
      type: 'string'
    },
    redirect: {
      type: 'string'
    },
    description_color: {
      type: 'string'
    },
    button_text: {
      type: 'string',
      default: 'Tipping now'
    },
    button_text_color: {
      type: 'string'
    },
    button_color: {
      type: 'string',
      default: '#FE642E'
    },
    button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_text: {
      type: 'string',
      default: 'Continue'
    },
    continue_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_color: {
      type: 'string',
      default: '#FE642E'
    },
    continue_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_text: {
      type: 'string',
      default: 'Previous'
    },
    previous_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_color: {
      type: 'string',
      default: '#1d5aa3'
    },
    previous_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    input_background: {
      type: 'string'
    },
    selected_amount_background: {
      type: 'string'
    },
    logo_id: {
      type: 'number'
    },
    background: {
      type: 'string'
    },
    background_color: {
      type: 'string'
    },
    background_id: {
      type: 'number'
    },
    value1_enabled: {
      type: 'boolean',
      default: true
    },
    value1_amount: {
      type: 'number',
      default: 1000
    },
    value1_currency: {
      type: 'string',
      default: 'SATS'
    },
    value1_icon: {
      type: 'string',
      default: 'fas fa-coffee'
    },
    value2_enabled: {
      type: 'boolean',
      default: true
    },
    value2_amount: {
      type: 'number',
      default: 2000
    },
    value2_currency: {
      type: 'string',
      default: 'SATS'
    },
    value2_icon: {
      type: 'string',
      default: 'fas fa-beer'
    },
    value3_enabled: {
      type: 'boolean',
      default: true
    },
    value3_amount: {
      type: 'number',
      default: 3000
    },
    value3_currency: {
      type: 'string',
      default: 'SATS'
    },
    value3_icon: {
      type: 'string',
      default: 'fas fa-cocktail'
    },
    display_name: {
      type: 'boolean',
      default: true
    },
    mandatory_name: {
      type: 'boolean',
      default: false
    },
    display_email: {
      type: 'boolean',
      default: true
    },
    mandatory_email: {
      type: 'boolean',
      default: false
    },
    display_address: {
      type: 'boolean',
      default: true
    },
    mandatory_address: {
      type: 'boolean',
      default: false
    },
    display_phone: {
      type: 'boolean',
      default: true
    },
    mandatory_phone: {
      type: 'boolean',
      default: false
    },
    display_message: {
      type: 'boolean',
      default: true
    },
    mandatory_message: {
      type: 'boolean',
      default: false
    },
    free_input: {
      type: 'boolean',
      default: true
    },
    show_icon: {
      type: 'boolean',
      default: true
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        dimension,
        background,
        background_id,
        background_color,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
        selected_amount_background,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
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
        free_input,
        show_icon,
        className
      },
      setAttributes
    } = props;
    const backgroundMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return background_id ? select('core').getMedia(background_id) : undefined;
    }, [background_id]);
    const logoMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return logo_id ? select('core').getMedia(logo_id) : undefined;
    }, [logo_id]);
    const inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "General",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: '200x710',
        label: '200x710'
      }]
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display free input",
      help: "Do you want to display free input field?",
      checked: free_input,
      onChange: newvalue => setAttributes({
        free_input: newvalue
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Link to Thank You Page"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["URLInputButton"], {
      label: "Link to Thank You Page",
      url: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Global",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      value: background_id,
      allowedTypes: ['image'],
      render: _ref => {
        let {
          open
        } = _ref;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: background_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !background_id && 'Choose background image', !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ResponsiveWrapper"], {
          naturalWidth: backgroundMedia.media_details.width,
          naturalHeight: backgroundMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: backgroundMedia.source_url
        })));
      }
    })), !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      title: "Replace background image",
      value: background_id,
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref2 => {
        let {
          open
        } = _ref2;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace background image');
      }
    })), !!background_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
      onClick: el => {
        setAttributes({
          background_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, 'Remove background image'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Header and footer background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Header",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      value: logo_id,
      allowedTypes: ['image'],
      render: _ref3 => {
        let {
          open
        } = _ref3;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: logo_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !logo_id && 'Choose an image', !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ResponsiveWrapper"], {
          naturalWidth: logoMedia.media_details.width,
          naturalHeight: logoMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: logoMedia.source_url
        })));
      }
    })), !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      title: "Replace logo",
      value: logo_id,
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref4 => {
        let {
          open
        } = _ref4;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace logo');
      }
    })), !!logo_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
      onClick: el => {
        setAttributes({
          logo_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, 'Remove logo'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Title text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Description",
      help: "Enter description",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Description text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Main",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Main text",
      help: "Enter main text",
      onChange: content => {
        setAttributes({
          tipping_text: content
        });
      },
      value: tipping_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Main text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: value
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Primary color for amount", ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      title: "This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field.",
      class: "btcpaywall_helper_tip"
    })), ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Secondary color for amount", ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      title: "This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields.",
      class: "btcpaywall_helper_tip"
    })), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: selected_amount_background,
      onChangeComplete: value => setAttributes({
        selected_amount_background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Footer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Button color on hover"), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_color_hover,
      onChangeComplete: value => setAttributes({
        button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Continue button",
      help: "Enter continue button text",
      onChange: content => {
        setAttributes({
          continue_button_text: content
        });
      },
      value: continue_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: continue_button_color,
      onChangeComplete: value => setAttributes({
        continue_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        continue_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: continue_button_color_hover,
      onChangeComplete: value => setAttributes({
        continue_button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Previous button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          previous_button_text: content
        });
      },
      value: previous_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_color,
      onChangeComplete: value => setAttributes({
        previous_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_text_color,
      onChangeComplete: value => setAttributes({
        previous_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_color_hover,
      onChangeComplete: value => setAttributes({
        previous_button_color_hover: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Fixed amount"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display icons",
      help: "Do you want to display icons?",
      checked: show_icon,
      onChange: newvalue => setAttributes({
        show_icon: newvalue
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display value 1",
      help: "Do you want to display value 1?",
      checked: value1_enabled,
      onChange: newval => setAttributes({
        value1_enabled: newval
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: value1_currency,
      onChange: selectedItem => {
        setAttributes({
          value1_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value1_amount: amount
        });
      },
      shiftStep: 10,
      value: value1_amount
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "FA Icon class",
      value: value1_icon,
      onChange: value => setAttributes({
        value1_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display value 2",
      help: "Do you want to display value 2?",
      checked: value2_enabled,
      onChange: value => {
        setAttributes({
          value2_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: value2_currency,
      onChange: selectedItem => {
        setAttributes({
          value2_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value2_amount: amount
        });
      },
      shiftStep: 10,
      value: value2_amount
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "FA Icon class",
      value: value2_icon,
      onChange: value => setAttributes({
        value2_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display value 3",
      help: "Do you want to display value 3?",
      checked: value3_enabled,
      onChange: value => {
        setAttributes({
          value3_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: value3_currency,
      onChange: selectedItem => {
        setAttributes({
          value3_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value3_amount: amount
        });
      },
      shiftStep: 10,
      value: value3_amount
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "FA Icon class",
      value: value3_icon,
      onChange: value => setAttributes({
        value3_icon: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Donor information"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setAttributes({
          display_name: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setAttributes({
          mandatory_name: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setAttributes({
          display_email: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setAttributes({
          mandatory_email: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setAttributes({
          display_address: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setAttributes({
          mandatory_address: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => setAttributes({
        display_phone: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setAttributes({
          mandatory_phone: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setAttributes({
          display_message: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setAttributes({
          mandatory_message: value
        });
      }
    })))));
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default.a, {
      block: "btcpaywall/gutenberg-tipping-banner-high",
      attributes: (dimension, background, background_id, background_color, logo_id, continue_button_color, continue_button_text, continue_button_text_color, previous_button_color, button_color_hover, previous_button_color_hover, continue_button_color_hover, previous_button_text, previous_button_text_color, selected_amount_background, input_background, button_color, button_text, button_text_color, description_color, redirect, title, title_text_color, tipping_text, tipping_text_color, description, currency, value1_amount, value1_currency, value1_enabled, value1_icon, value2_amount, value2_currency, value2_enabled, value2_icon, value3_amount, value3_currency, value3_enabled, value3_icon, display_name, display_email, display_message, display_phone, display_address, mandatory_address, mandatory_email, mandatory_phone, mandatory_message, mandatory_name, free_input, show_icon, className)
    }), inspectorControls)];
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/blocks/tipping_banner_wide.js":
/*!**********************************************!*\
  !*** ./blocks/blocks/tipping_banner_wide.js ***!
  \**********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-tipping-banner-wide', {
  title: 'BTCPW Tipping Banner Wide',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['tipping', 'tipping-banner-wide'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    dimension: {
      type: 'string',
      default: '600x280'
    },
    title: {
      type: 'string',
      default: 'Support my work'
    },
    description: {
      type: 'string',
      default: ''
    },
    currency: {
      type: 'string'
    },
    title_text_color: {
      type: 'string'
    },
    tipping_text: {
      type: 'string',
      default: 'Enter Tipping Amount'
    },
    tipping_text_color: {
      type: 'string'
    },
    redirect: {
      type: 'string'
    },
    description_color: {
      type: 'string'
    },
    button_text: {
      type: 'string',
      default: 'Tipping now'
    },
    button_text_color: {
      type: 'string'
    },
    button_color: {
      type: 'string',
      default: '#FE642E'
    },
    button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_text: {
      type: 'string',
      default: 'Continue'
    },
    continue_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_color: {
      type: 'string',
      default: '#FE642E'
    },
    continue_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_text: {
      type: 'string',
      default: 'Previous'
    },
    previous_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_color: {
      type: 'string',
      default: '#1d5aa3'
    },
    previous_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    input_background: {
      type: 'string'
    },
    selected_amount_background: {
      type: 'string'
    },
    logo_id: {
      type: 'number'
    },
    background: {
      type: 'string'
    },
    background_color: {
      type: 'string'
    },
    background_id: {
      type: 'number'
    },
    value1_enabled: {
      type: 'boolean',
      default: true
    },
    value1_amount: {
      type: 'number',
      default: 1000
    },
    value1_currency: {
      type: 'string',
      default: 'SATS'
    },
    value1_icon: {
      type: 'string',
      default: 'fas fa-coffee'
    },
    value2_enabled: {
      type: 'boolean',
      default: true
    },
    value2_amount: {
      type: 'number',
      default: 2000
    },
    value2_currency: {
      type: 'string',
      default: 'SATS'
    },
    value2_icon: {
      type: 'string',
      default: 'fas fa-beer'
    },
    value3_enabled: {
      type: 'boolean',
      default: true
    },
    value3_amount: {
      type: 'number',
      default: 3000
    },
    value3_currency: {
      type: 'string',
      default: 'SATS'
    },
    value3_icon: {
      type: 'string',
      default: 'fas fa-cocktail'
    },
    display_name: {
      type: 'boolean',
      default: true
    },
    mandatory_name: {
      type: 'boolean',
      default: false
    },
    display_email: {
      type: 'boolean',
      default: true
    },
    mandatory_email: {
      type: 'boolean',
      default: false
    },
    display_address: {
      type: 'boolean',
      default: true
    },
    mandatory_address: {
      type: 'boolean',
      default: false
    },
    display_phone: {
      type: 'boolean',
      default: true
    },
    mandatory_phone: {
      type: 'boolean',
      default: false
    },
    display_message: {
      type: 'boolean',
      default: true
    },
    mandatory_message: {
      type: 'boolean',
      default: false
    },
    free_input: {
      type: 'boolean',
      default: true
    },
    show_icon: {
      type: 'boolean',
      default: true
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        dimension,
        background,
        background_color,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
        selected_amount_background,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
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
        free_input,
        show_icon,
        className
      },
      setAttributes
    } = props;
    const backgroundMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return background_id ? select('core').getMedia(background_id) : undefined;
    }, [background_id]);
    const logoMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return logo_id ? select('core').getMedia(logo_id) : undefined;
    }, [logo_id]);
    const inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "General",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: '600x280',
        label: '600x280'
      }]
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Display free input",
      help: "Do you want to display free input field?",
      checked: free_input,
      onChange: newvalue => setAttributes({
        free_input: newvalue
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Link to Thank You Page"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["URLInputButton"], {
      label: "Link to Thank You Page",
      url: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Global",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      value: background_id,
      allowedTypes: ['image'],
      render: _ref => {
        let {
          open
        } = _ref;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: background_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !background_id && 'Choose background image', !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ResponsiveWrapper"], {
          naturalWidth: backgroundMedia.media_details.width,
          naturalHeight: backgroundMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: backgroundMedia.source_url
        })));
      }
    })), !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      title: "Replace background image",
      value: background_id,
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref2 => {
        let {
          open
        } = _ref2;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace background image');
      }
    })), !!background_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: el => {
        setAttributes({
          background_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, 'Remove background image'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Header and footer background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Header",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      value: logo_id,
      allowedTypes: ['image'],
      render: _ref3 => {
        let {
          open
        } = _ref3;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: logo_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !logo_id && 'Choose an image', !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ResponsiveWrapper"], {
          naturalWidth: logoMedia.media_details.width,
          naturalHeight: logoMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: logoMedia.source_url
        })));
      }
    })), !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      title: "Replace logo",
      value: logo_id,
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref4 => {
        let {
          open
        } = _ref4;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace logo');
      }
    })), !!logo_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: el => {
        setAttributes({
          logo_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, 'Remove logo'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Title text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Description",
      help: "Enter description",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Description text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Main",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Main text",
      help: "Enter main text",
      onChange: content => {
        setAttributes({
          tipping_text: content
        });
      },
      value: tipping_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Main text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: value
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Primary color for amount", ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      title: "This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field.",
      class: "btcpaywall_helper_tip"
    })), ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Secondary color for amount", ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      title: "This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields.",
      class: "btcpaywall_helper_tip"
    })), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: selected_amount_background,
      onChangeComplete: value => setAttributes({
        selected_amount_background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Footer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Button color on hover"), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_color_hover,
      onChangeComplete: value => setAttributes({
        button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Continue button",
      help: "Enter continue button text",
      onChange: content => {
        setAttributes({
          continue_button_text: content
        });
      },
      value: continue_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: continue_button_color,
      onChangeComplete: value => setAttributes({
        continue_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        continue_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: continue_button_color_hover,
      onChangeComplete: value => setAttributes({
        continue_button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Previous button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          previous_button_text: content
        });
      },
      value: previous_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: previous_button_color,
      onChangeComplete: value => setAttributes({
        previous_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: previous_button_text_color,
      onChangeComplete: value => setAttributes({
        previous_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: previous_button_color_hover,
      onChangeComplete: value => setAttributes({
        previous_button_color_hover: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Fixed amount"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Display icons",
      help: "Do you want to display icons?",
      checked: show_icon,
      onChange: newvalue => setAttributes({
        show_icon: newvalue
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Display value 1",
      help: "Do you want to display value 1?",
      checked: value1_enabled,
      onChange: newval => setAttributes({
        value1_enabled: newval
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      value: value1_currency,
      onChange: selectedItem => {
        setAttributes({
          value1_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value1_amount: amount
        });
      },
      shiftStep: 10,
      value: value1_amount
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextControl"], {
      label: "FA Icon class",
      value: value1_icon,
      onChange: value => setAttributes({
        value1_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Display value 2",
      help: "Do you want to display value 2?",
      checked: value2_enabled,
      onChange: value => {
        setAttributes({
          value2_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      value: value2_currency,
      onChange: selectedItem => {
        setAttributes({
          value2_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value2_amount: amount
        });
      },
      shiftStep: 10,
      value: value2_amount
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextControl"], {
      label: "FA Icon class",
      value: value2_icon,
      onChange: value => setAttributes({
        value2_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Display value 3",
      help: "Do you want to display value 3?",
      checked: value3_enabled,
      onChange: value => {
        setAttributes({
          value3_enabled: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      value: value3_currency,
      onChange: selectedItem => {
        setAttributes({
          value3_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value3_amount: amount
        });
      },
      shiftStep: 10,
      value: value3_amount
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextControl"], {
      label: "FA Icon class",
      value: value3_icon,
      onChange: value => setAttributes({
        value3_icon: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Donor information"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setAttributes({
          display_name: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setAttributes({
          mandatory_name: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setAttributes({
          display_email: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setAttributes({
          mandatory_email: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setAttributes({
          display_address: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setAttributes({
          mandatory_address: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => setAttributes({
        display_phone: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setAttributes({
          mandatory_phone: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setAttributes({
          display_message: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setAttributes({
          mandatory_message: value
        });
      }
    })))));
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default.a, {
      block: "btcpaywall/gutenberg-tipping-banner-wide",
      attributes: (dimension, background_color, background, background_id, logo_id, input_background, button_color, button_text, button_color_hover, continue_button_color_hover, previous_button_color_hover, button_text_color, continue_button_color, continue_button_text, continue_button_text_color, previous_button_color, previous_button_text, previous_button_text_color, selected_amount_background, description_color, redirect, title, title_text_color, tipping_text, tipping_text_color, description, currency, value1_amount, value1_currency, value1_enabled, value1_icon, value2_amount, value2_currency, value2_enabled, value2_icon, value3_amount, value3_currency, value3_enabled, value3_icon, display_name, display_email, display_message, display_phone, display_address, mandatory_address, mandatory_email, mandatory_phone, mandatory_message, mandatory_name, free_input, show_icon, className)
    }), inspectorControls)];
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/blocks/tipping_box.js":
/*!**************************************!*\
  !*** ./blocks/blocks/tipping_box.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-tipping-box', {
  title: 'BTCPW Tipping Box',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['tipping', 'tipping-box'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    dimension: {
      type: 'string',
      default: '250x300'
    },
    title: {
      type: 'string',
      default: 'Support my work'
    },
    description: {
      type: 'string'
    },
    currency: {
      type: 'string',
      default: 'SATS'
    },
    title_text_color: {
      type: 'string'
    },
    tipping_text: {
      type: 'string',
      default: 'Enter Tipping Amount'
    },
    tipping_text_color: {
      type: 'string'
    },
    background_image: {
      type: 'string',
      default: ''
    },
    redirect: {
      type: 'string'
    },
    description_color: {
      type: 'string'
    },
    button_text: {
      type: 'string',
      default: 'Tipping now'
    },
    button_text_color: {
      type: 'string'
    },
    button_color: {
      type: 'string',
      default: '#FE642E'
    },
    button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    input_background: {
      type: 'string'
    },
    logo_id: {
      type: 'number'
    },
    background: {
      type: 'string'
    },
    background_color: {
      type: 'string'
    },
    background_id: {
      type: 'number'
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
        button_color_hover,
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
        className
      },
      setAttributes
    } = props;
    const backgroundMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return background_id ? select('core').getMedia(background_id) : undefined;
    }, [background_id]);
    const logoMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return logo_id ? select('core').getMedia(logo_id) : undefined;
    }, [logo_id]);
    const inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "General",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: '250x300',
        label: '250x300'
      }, {
        value: '300x300',
        label: '300x300'
      }]
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Link to Thank You Page"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["URLInputButton"], {
      label: "Link to Thank You Page",
      url: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Global",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      value: background_id,
      allowedTypes: ['image'],
      render: _ref => {
        let {
          open
        } = _ref;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: background_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !background_id && 'Choose background image', !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ResponsiveWrapper"], {
          naturalWidth: backgroundMedia.media_details.width,
          naturalHeight: backgroundMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: backgroundMedia.source_url
        })));
      }
    })), !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUpload"], {
      title: "Replace background image",
      value: background_id,
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref2 => {
        let {
          open
        } = _ref2;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace background image');
      }
    })), !!background_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: el => {
        setAttributes({
          background_id: 0
        });
      },
      isLink: true,
      isDestructive: true,
      className: "btcpaywall editor-post-featured-image__remove"
    }, 'Remove background image'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Header and footer background color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Header",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      value: logo_id,
      allowedTypes: ['image'],
      render: _ref3 => {
        let {
          open
        } = _ref3;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: logo_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, !logo_id && 'Choose an image', !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ResponsiveWrapper"], {
          naturalWidth: logoMedia.media_details.width,
          naturalHeight: logoMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: logoMedia.source_url
        })));
      }
    })), !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUpload"], {
      title: "Replace logo",
      value: logo_id,
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref4 => {
        let {
          open
        } = _ref4;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace logo');
      }
    })), !!logo_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: el => {
        setAttributes({
          logo_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, 'Remove logo'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Title text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Description",
      help: "Enter description",
      onChange: content => {
        setAttributes({
          description: content
        });
      },
      value: description
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Description text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: description_color,
      onChangeComplete: value => setAttributes({
        description_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Main",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Main text",
      help: "Enter main text",
      onChange: content => {
        setAttributes({
          tipping_text: content
        });
      },
      value: tipping_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Main text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Background color for input"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: "Footer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color on hover"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPicker"], {
      color: button_color_hover,
      onChangeComplete: value => setAttributes({
        button_color_hover: value.hex
      }),
      disableAlpha: true
    }))));
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_3___default.a, {
      block: "btcpaywall/gutenberg-tipping-box",
      attributes: (dimension, background_color, background, button_color_hover, background_id, logo_id, input_background, button_color, button_text, button_text_color, description_color, redirect, title, title_text_color, tipping_text, tipping_text_color, description, background_image, currency, className)
    }), inspectorControls)];
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/blocks/tipping_list_shortcodes.js":
/*!**************************************************!*\
  !*** ./blocks/blocks/tipping_list_shortcodes.js ***!
  \**************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _shortcode_store__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./shortcode_store */ "./blocks/blocks/shortcode_store.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);









Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])('btcpaywall/gutenberg-shortcode-list', {
  title: 'BTCPW Shortcode List',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001-2015"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3\n-79 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7\n-55 0 -100 -4 -100 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4\n-226 -8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10\n-46 0 -61 -3 -50 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47\n14 67 3 20 21 60 40 88 l34 50 -117 -1 c-95 0 -113 -2 -98 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38\n-10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60\n10 -63 6 -4 10 12 10 42 0 71 15 110 60 165 l41 48 -90 0 c-50 0 -91 -2 -91\n-4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187\n-1 -184 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93\n11 -66 0 -101 -4 -101 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75\n-8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23\n42 0 5 -40 9 -90 9 -50 0 -90 -4 -90 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4\n-80 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55\n0 5 -53 9 -117 9 l-118 -1 50 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55\n-14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15\n-34 0 -48 -4 -38 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27\n29 c-15 15 -35 42 -44 60 -9 18 -21 32 -26 32 -4 0 -18 -20 -30 -45 -12 -24\n-33 -52 -47 -61 -32 -21 -124 -22 -280 -3 -93 12 -176 14 -370 9 l-250 -7 -41\n44 c-57 61 -95 57 -205 -21 -34 -25 -50 -30 -97 -29 -31 1 -150 3 -264 6\nl-208 4 0 -45 0 -44 148 7 c138 7 152 6 193 -13 24 -12 57 -31 72 -44 25 -20\n30 -21 50 -8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 -5 100 -10 16 -7\n129 -8 315 -3 288 7 290 7 330 -16 22 -12 53 -34 68 -48 l29 -27 -4 -114 c-3\n-104 -5 -116 -27 -139 -33 -35 -102 -60 -143 -52 -18 3 -193 8 -388 11 -195 3\n-374 8 -396 11 -23 2 -63 18 -88 35 l-47 30 -42 -33 c-37 -30 -50 -34 -132\n-40 -49 -4 -130 -4 -178 -1 l-88 6 3 -39 c2 -31 7 -39 28 -44 40 -9 89 -110\n90 -182 0 -126 -35 -198 -96 -198 -21 0 -24 -5 -24 -35 l0 -35 138 -2 c75 -2\n198 -2 271 0 148 3 219 -8 248 -40 15 -17 19 -41 22 -146 4 -147 -7 -198 -46\n-213 -14 -5 -75 -12 -135 -16 -143 -8 -150 -13 -104 -82 33 -49 36 -59 38\n-135 3 -121 1 -142 -22 -185 -29 -58 -48 -65 -161 -57 -53 3 -131 3 -173 0\nl-76 -7 0 -1870 0 -1870 175 5 c164 5 177 4 200 -14 51 -40 63 -82 60 -202 -3\n-97 -6 -111 -27 -133 -46 -49 -68 -54 -244 -55 l-164 -1 0 -53 c0 -47 2 -54\n20 -54 11 0 38 -16 60 -36 l40 -36 0 -115 c0 -121 -6 -142 -58 -210 l-24 -33\n96 0 96 0 -29 57 c-25 51 -29 73 -33 170 -5 95 -3 116 12 140 28 46 69 80 103\n87 17 4 213 9 434 13 452 6 434 9 473 -66 11 -22 24 -42 28 -45 5 -3 23 15 41\n40 55 79 24 76 706 78 94 0 122 -8 284 -87 49 -24 91 -69 91 -98 0 -27 7 -24\n61 26 54 51 79 55 137 26 54 -27 151 -39 437 -51 138 -5 284 -12 325 -13 43\n-2 88 -10 106 -20 30 -15 32 -15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71\n20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 -8 41 -68 c38\n-64 40 -71 34 -123 -7 -62 1 -110 18 -100 7 5 9 32 5 81 -5 68 -4 76 19 103\n14 16 48 46 76 66 l51 38 151 -5 c241 -7 578 -4 618 5 37 8 39 7 97 -53 79\n-82 105 -83 177 -6 l51 55 282 -5 c156 -3 287 -7 292 -10 4 -3 53 2 108 10 96\n16 102 15 143 -3 24 -10 65 -37 91 -60 27 -23 51 -42 54 -42 3 0 32 25 65 55\n47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 -39 0 c-54 0 -91 -15 -91\n-38 0 -11 24 -42 54 -71 70 -66 70 -65 50 -102 -14 -27 -14 -38 -3 -77 l13\n-46 -45 -39 c-24 -22 -64 -49 -89 -60 -39 -18 -55 -19 -140 -11 -52 4 -230 9\n-395 9 -165 1 -309 2 -321 3 -11 1 -41 16 -67 33 l-46 30 -82 -48 c-81 -46\n-86 -48 -159 -47 -41 1 -87 7 -102 12 -17 7 -125 9 -320 6 l-293 -5 -48 30\nc-26 17 -58 31 -70 31 -33 0 -108 -30 -151 -62 -30 -21 -51 -28 -87 -28 -26 0\n-54 3 -63 6 -36 14 -2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12\n54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17\n8 75 56 128 105 122 112 167 133 257 123 36 -5 120 -9 187 -10 203 -4 250 -19\n280 -92 14 -32 34 -45 34 -22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0\n27 c0 28 0 28 -79 31 -91 5 -112 18 -142 87 -10 23 -23 42 -28 42 -6 0 -22\n-22 -36 -50 -39 -77 -47 -78 -555 -78 -457 -1 -470 1 -470 50 0 24 67 148 80\n148 8 0 118 124 168 189 34 45 89 57 170 36 52 -13 110 -16 286 -14 271 2 283\n-1 321 -86 13 -31 30 -55 36 -53 7 2 20 26 31 53 32 82 45 90 138 87 l80 -3 0\n136 c0 79 -4 135 -10 135 -5 0 -19 -31 -30 -70 -17 -56 -28 -75 -57 -97 l-36\n-28 -405 0 c-326 0 -406 3 -415 13 -21 26 -13 79 20 119 16 21 40 66 53 101\n13 35 45 89 72 124 60 74 68 93 57 133 -15 50 -10 87 15 119 13 17 27 42 31\n56 32 103 47 130 95 164 59 42 68 69 46 135 -19 57 -20 91 -6 158 5 26 12 66\n16 87 8 58 60 106 111 106 52 0 134 -25 166 -51 l27 -20 41 33 c38 30 47 33\n125 37 l84 3 0 485 0 486 -66 -6 c-87 -8 -124 7 -157 65 -22 39 -24 53 -23\n153 1 97 5 115 25 148 37 61 57 69 145 61 l76 -7 0 262 0 262 -373 -2 c-268\n-1 -380 2 -395 10 -47 25 -57 57 -57 181 0 127 17 184 63 206 16 8 136 11 393\n10 l369 -1 0 33 0 32 -79 0 c-102 0 -133 22 -152 105 -7 30 -15 55 -19 55 -4\n0 -11 -17 -15 -37 -10 -54 -30 -87 -62 -103 -50 -24 -864 -43 -939 -22 -72 21\n-79 37 -79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 -1 32 -44 38 -76\n12 -475 10 -510 -3 -23 -8 -42 -8 -68 0 -57 17 -180 101 -246 167 l-58 59 6\n49 c6 59 29 87 95 119 44 22 55 23 271 21 332 -4 617 -13 637 -20 10 -4 35\n-18 55 -31 41 -27 39 -28 110 29 28 23 134 48 205 49 23 0 70 -7 104 -16 54\n-14 96 -15 275 -9 273 9 295 6 386 -56 l73 -49 3 86 c2 48 0 89 -3 92 -3 3\n-164 7 -358 9 -193 1 -356 3 -360 3 -4 0 -30 20 -56 45 -26 25 -51 45 -55 45\n-4 0 -22 -11 -39 -24 -18 -13 -57 -36 -87 -51 -63 -32 -27 -30 -504 -25 l-340\n4 -43 38 c-24 21 -55 41 -67 44 -30 7 -80 -17 -126 -61 l-35 -34 -415 -2\nc-448 -3 -433 -4 -498 52 -37 33 -76 37 -112 12 -22 -15 -56 -17 -285 -18\n-241 -1 -265 -3 -332 -24 -53 -17 -99 -23 -180 -24 -139 -3 -164 7 -199 79\n-14 30 -30 54 -34 54 -4 0 -15 -18 -25 -39z m825 -147 c63 -8 176 -19 250 -24\n147 -9 293 -37 368 -71 26 -11 78 -32 116 -45 38 -13 90 -37 115 -53 25 -16\n67 -39 93 -50 26 -11 70 -38 99 -60 28 -23 54 -41 59 -41 4 0 35 -25 69 -55\n34 -30 67 -55 73 -55 16 0 274 -270 338 -355 14 -18 60 -74 103 -125 43 -50\n88 -108 100 -128 11 -20 38 -56 59 -79 21 -24 38 -48 38 -54 0 -6 17 -37 38\n-68 21 -31 46 -79 56 -107 9 -29 30 -72 45 -95 16 -24 41 -84 56 -134 15 -49\n38 -111 51 -137 14 -27 34 -90 45 -141 12 -50 30 -108 40 -128 41 -82 54 -230\n52 -599 -2 -378 -10 -456 -74 -689 -16 -57 -29 -109 -29 -116 0 -6 -16 -30\n-34 -52 -19 -22 -44 -63 -55 -92 -10 -28 -33 -67 -50 -87 -17 -19 -37 -50 -45\n-68 -7 -18 -27 -44 -44 -57 -16 -13 -40 -44 -52 -69 -13 -25 -34 -58 -47 -74\n-13 -16 -37 -54 -53 -86 -16 -31 -36 -62 -45 -70 -9 -8 -32 -43 -50 -79 -18\n-36 -43 -75 -55 -86 -12 -11 -31 -38 -42 -60 -11 -22 -33 -53 -48 -70 -16 -16\n-57 -61 -91 -100 -35 -38 -95 -99 -134 -134 -38 -35 -85 -79 -104 -98 -19 -19\n-47 -41 -61 -48 -15 -8 -35 -25 -44 -40 -9 -14 -36 -37 -59 -51 -23 -15 -46\n-33 -50 -41 -5 -8 -30 -29 -56 -46 -67 -45 -170 -120 -211 -155 -19 -16 -51\n-37 -70 -47 -19 -9 -46 -28 -60 -41 -14 -13 -54 -36 -90 -52 -36 -17 -74 -40\n-85 -52 -11 -13 -48 -36 -83 -52 -35 -16 -81 -42 -102 -57 -22 -16 -59 -33\n-83 -40 -24 -6 -67 -26 -95 -46 -36 -24 -78 -41 -138 -55 -47 -11 -105 -32\n-129 -45 -23 -14 -84 -34 -135 -45 -51 -12 -118 -31 -149 -44 -106 -45 -220\n-58 -561 -63 -394 -6 -594 9 -717 56 -43 16 -107 37 -142 46 -36 9 -92 30\n-125 47 -34 17 -85 39 -115 49 -30 11 -75 32 -100 48 -25 16 -64 38 -86 48\n-22 10 -60 35 -84 55 -24 21 -49 38 -55 38 -7 0 -38 22 -71 50 -33 27 -62 50\n-66 50 -15 0 -163 143 -266 255 -130 143 -184 219 -214 300 -12 33 -33 78 -47\n99 -13 22 -34 69 -47 105 -12 37 -36 98 -53 136 -23 52 -35 104 -47 195 -17\n127 -28 190 -64 340 -61 256 -61 797 0 1020 12 41 31 133 44 204 16 86 34 150\n55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79\n45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33\n52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51\n89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96\n62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31\n18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68\n28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104\n32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79\n11 115 24 79 29 62 28 200 9z m-2521 -448 c8 -6 28 -41 46 -77 30 -63 32 -72\n29 -167 -4 -185 23 -176 -543 -167 l-445 7 -27 27 c-22 22 -29 41 -35 97 -4\n38 -7 85 -6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 -3 208 -2 315 2 296\n12 433 12 449 -1z m4742 -976 c10 -6 27 -27 38 -48 10 -20 28 -46 40 -56 24\n-22 27 -58 6 -76 -20 -17 -98 -4 -120 20 -22 24 -33 134 -15 155 15 18 25 19\n51 5z m164 -359 c36 -13 56 -27 72 -52 12 -19 33 -47 46 -64 37 -46 41 -69 18\n-117 -11 -24 -26 -50 -32 -59 -17 -23 -4 -63 31 -96 45 -42 101 -190 107 -284\n6 -83 5 -84 -55 -120 -29 -17 -33 -24 -28 -47 4 -15 22 -41 41 -59 47 -45 53\n-58 66 -160 11 -82 11 -93 -7 -128 -10 -21 -28 -42 -39 -46 -33 -11 -126 33\n-153 72 -13 19 -38 49 -55 67 l-32 33 3 107 c4 120 7 127 74 152 58 21 59 41\n4 100 -54 57 -72 113 -80 250 -6 89 -5 98 18 135 l24 39 -69 84 c-77 95 -88\n135 -48 186 24 30 27 30 94 7z m106 -1258 c32 -16 61 -36 65 -45 3 -10 22 -41\n42 -70 46 -67 56 -148 24 -188 -17 -21 -29 -25 -78 -25 -75 0 -81 -19 -25 -74\n31 -30 41 -49 47 -86 14 -96 -17 -234 -57 -256 -20 -10 -112 -3 -140 12 -8 4\n-21 25 -27 47 -11 37 -42 62 -77 62 -39 0 -47 111 -14 207 26 77 45 94 122\n108 75 13 81 28 34 79 -52 54 -65 162 -27 224 24 39 35 40 111 5z m-226 -693\nc25 -22 52 -40 59 -40 8 0 34 -25 59 -55 37 -45 46 -64 52 -111 6 -51 4 -62\n-26 -122 -39 -77 -76 -104 -133 -100 -35 3 -43 8 -65 46 -14 24 -57 68 -96 98\n-38 31 -78 68 -88 84 -17 27 -17 29 19 104 20 41 42 81 50 87 12 10 101 48\n116 49 4 0 28 -18 53 -40z m-189 -325 c16 -39 43 -60 91 -70 25 -5 42 -20 74\n-67 36 -53 41 -67 37 -102 -8 -65 -54 -153 -96 -181 -54 -37 -86 -33 -116 13\n-21 32 -92 100 -129 124 -7 4 -22 8 -34 8 -19 0 -23 -6 -23 -30 0 -19 8 -36\n22 -48 13 -9 41 -35 63 -58 22 -22 52 -48 68 -57 24 -16 27 -23 27 -73 0 -68\n-3 -73 -82 -156 -51 -53 -72 -68 -103 -73 -68 -12 -83 -27 -91 -92 -6 -47 -13\n-63 -36 -83 -17 -14 -49 -44 -73 -67 -38 -38 -49 -43 -88 -43 -58 0 -79 -20\n-101 -93 -15 -50 -24 -63 -64 -90 -25 -18 -62 -46 -81 -63 -49 -42 -74 -54\n-114 -54 -66 0 -103 24 -138 90 -18 34 -41 66 -51 71 -24 13 -49 5 -43 -13 2\n-7 9 -32 15 -56 10 -38 17 -46 56 -62 39 -17 44 -23 44 -53 0 -18 -10 -53 -22\n-77 -20 -39 -33 -50 -106 -86 -46 -23 -88 -46 -94 -52 -20 -20 -58 -13 -103\n19 -44 32 -65 32 -65 0 0 -9 -7 -41 -15 -69 -14 -47 -21 -54 -67 -78 -45 -23\n-61 -26 -119 -22 -75 6 -93 -1 -114 -41 -17 -33 -45 -46 -139 -61 -39 -6 -95\n-23 -125 -38 -36 -16 -79 -28 -118 -30 -62 -4 -62 -4 -101 38 -46 51 -69 50\n-87 -3 -17 -51 -40 -75 -79 -82 -17 -3 -61 -13 -98 -21 -84 -20 -146 -8 -218\n42 -59 41 -82 42 -122 9 -33 -28 -95 -33 -203 -15 -33 6 -113 17 -178 25 -64\n8 -127 20 -138 26 -19 10 -20 13 -7 26 11 10 73 20 204 34 196 21 213 21 278\n-4 51 -19 69 -13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114\n10 65 -4 74 -8 97 -36 34 -40 41 -39 28 3 -15 47 8 82 70 107 26 11 58 26 72\n34 89 50 124 65 177 74 79 12 109 5 140 -35 30 -40 59 -46 49 -11 -21 72 -20\n85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 -6 10 38 c16 57 65 101\n205 183 55 33 74 40 100 35 70 -14 68 -15 88 52 17 56 24 66 66 92 26 16 53\n38 59 49 20 32 69 52 131 54 56 2 57 2 77 -36 11 -21 34 -46 51 -56 17 -10 36\n-33 44 -50 20 -50 92 -54 76 -5 -3 11 -40 54 -81 98 -72 76 -75 80 -75 127 0\n47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39\n47 59 22 37 47 50 124 63 46 7 54 23 33 64 -22 41 -20 69 7 110 13 20 32 49\n41 64 22 36 68 56 129 57 46 0 49 -2 63 -35z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112\n-17 -133 -23 -184 -58 -19 -13 -66 -32 -103 -41 -38 -10 -93 -33 -123 -51 -31\n-19 -79 -42 -108 -50 -29 -9 -65 -26 -81 -40 -16 -13 -63 -39 -104 -58 -41\n-19 -79 -40 -82 -46 -4 -6 -35 -25 -69 -43 -34 -17 -77 -44 -96 -61 -19 -16\n-51 -36 -70 -44 -20 -8 -47 -25 -61 -37 -14 -13 -47 -35 -73 -50 -26 -15 -53\n-36 -60 -47 -7 -11 -39 -38 -72 -60 -112 -74 -165 -119 -325 -273 -41 -40 -92\n-93 -113 -117 -21 -24 -60 -70 -87 -101 -27 -31 -57 -72 -66 -90 -9 -18 -29\n-47 -45 -65 -15 -18 -37 -54 -49 -80 -12 -26 -32 -59 -45 -73 -14 -14 -36 -55\n-51 -90 -14 -35 -36 -77 -49 -92 -13 -15 -31 -49 -40 -75 -9 -26 -34 -84 -55\n-128 -21 -44 -48 -114 -60 -155 -12 -41 -30 -91 -40 -110 -31 -61 -90 -368\n-111 -570 -14 -138 -6 -432 16 -570 8 -52 24 -160 35 -240 17 -111 29 -163 55\n-220 18 -41 40 -99 50 -128 9 -29 31 -74 49 -100 18 -26 45 -79 60 -119 15\n-39 34 -77 42 -84 9 -7 22 -26 31 -43 8 -17 32 -49 53 -71 20 -22 49 -61 63\n-86 14 -25 38 -54 51 -63 14 -9 35 -34 46 -55 11 -22 34 -50 52 -62 18 -13 47\n-38 64 -56 17 -18 38 -33 47 -33 8 0 22 -3 31 -6 42 -16 -3 70 -88 168 -71 82\n-94 113 -112 153 -10 22 -31 59 -47 82 -15 24 -39 73 -53 110 -14 38 -39 91\n-55 119 -16 28 -38 89 -50 135 -11 46 -32 115 -45 154 -42 117 -67 384 -68\n740 -1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49\n111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57\n19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323\n444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90\n55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46\n31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252\n59 39 5 122 18 185 28 99 17 139 19 270 12 85 -4 190 -15 232 -24 42 -8 113\n-18 157 -22 75 -6 80 -8 91 -34 6 -15 22 -32 36 -39 31 -14 104 -26 104 -17 0\n31 -53 65 -123 81 -16 3 -32 16 -39 30 -11 25 -34 37 -108 56 -24 6 -70 24\n-101 39 -90 46 -200 60 -499 65 -146 2 -287 0 -314 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87\n18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83\n85 -39 0 25 -34 60 -58 60 -23 0 -42 19 -42 41 0 22 -37 49 -67 49 -16 0 -23\n-6 -23 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50\n4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29\n-73 -31 -109 -6 -97 26 -129 157 -162 47 -11 117 -38 155 -59 39 -21 87 -41\n107 -45 39 -7 118 -74 160 -137 13 -18 35 -49 50 -68 37 -49 98 -224 98 -283\n0 -26 -7 -64 -16 -85 -9 -20 -25 -66 -36 -102 -12 -41 -32 -78 -53 -100 -18\n-19 -40 -48 -48 -65 -29 -54 -179 -200 -257 -249 -25 -16 -36 -30 -38 -52 -5\n-47 28 -79 106 -105 55 -18 77 -33 122 -79 30 -31 61 -75 69 -96 7 -21 22 -51\n32 -65 27 -39 38 -74 50 -153 13 -98 -1 -194 -41 -269 -17 -33 -40 -83 -51\n-111 -27 -71 -119 -182 -216 -258 -66 -53 -94 -68 -148 -82 -37 -9 -89 -28\n-115 -41 -26 -13 -79 -29 -116 -35 -85 -13 -135 -37 -151 -70 -7 -14 -17 -93\n-23 -175 -5 -83 -15 -164 -21 -182 -13 -41 -122 -123 -164 -123 -45 0 -96 31\n-117 70 -17 31 -19 49 -13 165 3 72 8 160 11 197 5 58 3 69 -15 87 -11 11 -37\n23 -58 27 -51 10 -259 -10 -279 -27 -33 -27 -70 -161 -94 -339 -16 -115 -48\n-182 -100 -205 -52 -23 -106 -22 -156 3 -53 27 -91 105 -78 161 4 20 8 65 9\n101 2 42 10 82 24 113 16 34 21 62 19 99 -3 47 -7 55 -37 75 -33 22 -40 23\n-150 17 -104 -6 -118 -5 -139 12 -32 27 -54 115 -46 185 6 57 -4 81 -24 56 -5\n-6 -12 -58 -16 -114 -8 -113 -2 -132 56 -198 42 -48 77 -65 138 -65 45 0 55\n-4 80 -32 45 -49 56 -83 40 -126 -7 -20 -14 -91 -16 -158 l-4 -121 53 -55 c49\n-53 56 -57 111 -64 66 -8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163\n7 146 14 168 63 207 82 66 105 64 142 -12 22 -45 22 -50 10 -188 -7 -95 -8\n-151 -2 -168 14 -37 100 -109 131 -110 50 -3 106 3 146 16 22 7 65 20 95 29\n96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37\n130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1\n95 -31 229 -33 135 -43 161 -83 220 -25 36 -58 81 -73 98 -34 40 -53 102 -40\n135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135\n22 59 49 133 61 163 18 46 21 77 22 191 l0 136 -34 54 c-19 30 -43 72 -54 94\n-21 42 -138 165 -157 165 -7 0 -33 21 -60 48 -31 31 -66 53 -101 66 -30 10\n-68 31 -85 46 -22 19 -51 31 -95 39 -44 7 -71 18 -88 36 -26 26 -30 59 -22\n206 3 51 -18 103 -44 113 -22 8 -50 8 -58 -1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15\n-199 36 -218 30 -11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 -1 81\n-11 94 -13 17 -15 15 -26 -29 -26 -101 -55 -129 -110 -100 -38 19 -47 51 -32\n112 21 81 -7 152 -69 177 -53 21 -77 20 -90 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38\n-11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23\n22z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32\n-17 -51 -38 -87 -98 -13 -22 -73 -35 -163 -36 -76 0 -125 -16 -136 -45 -10\n-26 -8 -28 27 -21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3\n25 10 53 16 61 23 38 30 69 27 138 -3 63 -5 73 -16 59z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83\n-54 44z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8\n-10 -41z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82\n-43 82 -5 0 -12 -7 -15 -16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6\n-74 -15 -150 -21 -168 -20 -73 -4 -146 39 -174 31 -20 82 -21 257 -5 230 22\n270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45\n48 73 110 l41 87 -32 78 c-33 80 -67 128 -111 156 -14 9 -69 27 -124 41 -111\n29 -217 33 -306 10z m393 -142 c19 -8 35 -29 53 -69 21 -48 25 -68 21 -120 -3\n-37 -14 -82 -28 -110 -23 -46 -28 -49 -115 -83 -50 -19 -101 -43 -114 -52 -40\n-29 -110 -46 -212 -51 -89 -5 -100 -3 -130 17 -41 27 -43 42 -29 186 19 186\n21 197 44 231 45 65 69 71 287 66 115 -2 206 -8 223 -15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89\n-98 165 -61 38 18 56 21 99 16 53 -7 53 -7 70 27 20 43 20 57 0 85 -13 19 -24\n22 -72 21 -31 -1 -79 -5 -107 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14\n-150 -11 -188 14 -163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 -13\n309 -7 53 -23 74 -38 50z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54\n-17 -225 -2 -259 11 -27 10 -28 31 39 18 55 24 161 13 226 -7 40 -7 80 0 118\n7 39 7 62 0 69 -6 6 -12 6 -17 -2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244\n-16 -88 -6 -116 57 -158 40 -26 45 -27 193 -28 139 0 158 2 241 28 130 41 160\n56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38\n29 97 -3 47 -11 73 -31 103 -14 22 -32 61 -38 87 -8 30 -21 52 -37 63 -14 9\n-39 31 -57 48 -58 58 -62 58 -300 61 -166 2 -231 -1 -263 -11z m480 -126 c57\n-21 169 -124 182 -167 12 -39 -28 -109 -111 -192 -77 -78 -79 -79 -158 -96\n-44 -9 -113 -30 -153 -46 -97 -38 -114 -37 -151 8 -59 72 -65 95 -47 182 9 42\n20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 -11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21\n-30 -31 -89 -19 -108 14 -22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130\n0 61 -14 71 -39 29z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14\n-14 -14 -16 3 -26 24 -13 109 -11 158 6 47 15 61 51 51 122 -8 53 -19 58 -36\n16z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19\n-44 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18\n-32 -37 -37 -70 -3 -25 -4 -47 -1 -50 13 -13 47 19 67 63 13 27 36 60 53 74\n24 21 30 34 31 69 1 48 -12 60 -36 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45\n98 -3 15 -9 13 -35 -13z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52\n36 52 72 0 32 -9 35 -39 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11\n-58 -35 -58 -62 0 -34 33 -29 64 10 26 33 36 44 80 83 43 39 31 81 -17 53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50\n-6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13\n-55 -44 -45 -60 12 -20 45 -9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26\n-11 30 -47 15z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56\n-101 33z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16\n-106 -38 -106 -64 0 -12 11 -14 65 -9 73 7 101 18 130 53 11 13 47 35 80 47\n70 27 88 57 33 56 -18 0 -44 -5 -58 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68\n2z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51\n-62 61 -98 25 -102 25 -102 -4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23\n21 23 29 0 17 -55 19 -129 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106\n17 -106 4z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12\n-127 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14\n10 25 -20 12 -464 20 -530 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38\n45 -38 35 0 37 29 3 60 -46 42 -53 49 -79 83 -30 38 -54 42 -54 9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27\n17 0 13 -11 36 -25 51 -24 26 -36 31 -48 19z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46\n-45 -65 -57 -33 -20 -39 -21 -200 -10 -92 6 -170 9 -173 6 -4 -2 -123 -5 -264\n-6 l-257 -2 -44 31 c-24 18 -50 32 -56 32 -17 0 -100 -70 -100 -85 0 -7 17\n-19 38 -27 30 -12 106 -14 407 -13 205 1 381 -2 395 -7 14 -5 48 -35 76 -66\nl52 -57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 -7 0\n152 c0 83 -1 151 -3 151 -2 0 -8 -5 -15 -12z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115\n58 -13 42 -51 103 -68 109 -6 2 -17 -4 -26 -14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43\n5 95 l0 95 -42 -1 c-24 -1 -51 -3 -60 -6z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57\n100 -72 100 -5 0 -29 -21 -54 -47z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279\n-17 l267 -5 47 -27 c26 -16 52 -28 58 -28 14 0 80 71 80 86 0 6 -7 18 -17 25\n-23 20 -502 20 -628 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10\n-14 0 -25 -4 -25 -10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5\n0 -10 -12 -10 -26z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0\n2 -13 26 -30 52 -16 26 -30 54 -30 63 0 9 -6 25 -14 35 -13 18 -15 17 -25 -21z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94\n17 -32 21 -92 82 -105 106 -9 16 -14 13 -42 -30z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28\nc-8 15 -32 47 -53 71 l-39 44 -67 -63z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1\n101 18 -13 24 -91 112 -99 112 -4 0 -17 -8 -29 -18z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6\n0 7 -60 114 -63 114 -1 0 -15 -24 -32 -53z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34\n23 c-18 12 -44 38 -57 57 -29 44 -36 46 -55 17z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11\n180 -11 143 0 198 3 181 10 -35 14 -131 20 -161 10z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17\n-225 14z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19\n-198 8z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8\n-281 8 -140 0 -263 2 -273 5 -11 2 -28 2 -39 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614\n0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0\n-39 -4 -50 -9z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12\n-300 0z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }))),
  category: 'widgets',
  keywords: ['paywall', 'shortcode-list'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    shortcode: {
      type: 'string',
      default: ''
    }
  },
  edit: props => {
    const {
      attributes: {
        shortcode
      },
      setAttributes
    } = props;
    const shortcodes = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useSelect"])(select => select('btcpaywall/shortcode_data').getShortcodeList());
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["PanelBody"], {
      title: "Shortcodes",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["SelectControl"], {
      value: shortcode,
      onChange: selectedItem => {
        setAttributes({
          shortcode: selectedItem
        });
      },
      options: Object.entries(shortcodes).map(pair => ({
        label: pair[0],
        value: pair[1]
      }))
    }))))));
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/blocks/tipping_page.js":
/*!***************************************!*\
  !*** ./blocks/blocks/tipping_page.js ***!
  \***************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/server-side-render */ "@wordpress/server-side-render");
/* harmony import */ var _wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__);






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('btcpaywall/gutenberg-tipping-page', {
  title: 'BTCPW Tipping Page',
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    version: "1.0",
    xmlns: "http://www.w3.org/2000/svg",
    width: "700.000000pt",
    height: "700.000000pt",
    viewBox: "0 0 700.000000 700.000000",
    preserveAspectRatio: "xMidYMid meet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("metadata", null, "Created by potrace 1.12, written by Peter Selinger 2001 - 2015", ' ', ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
    transform: "translate(0.000000,700.000000) scale(0.100000,-0.100000)",
    fill: "#000000",
    stroke: "none"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 6990 c0 -12 49 -12 105 -1 36 8 33 9 -32 10 -43 1 -73 -3 -73 -9z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M275 6987 c27 -16 150 -16 166 1 10 10 -7 12 -87 12 -81 -1 -95 -3 - 79 - 13 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M600 6992 c0 -24 75 -72 112 -72 22 0 88 55 88 73 0 4 -45 7 -100 7 - 55 0 - 100 - 4 - 100 - 8 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M898 6992 c14 -9 450 -7 460 2 3 3 -102 6 -234 6 -131 0 -233 -4 - 226 - 8 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1450 6990 c8 -5 31 -10 50 -10 19 0 42 5 50 10 11 7 -4 10 -50 10 - 46 0 - 61 - 3 - 50 - 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1674 6987 c75 -47 99 -84 112 -172 7 -48 7 -49 15 -20 4 17 11 47 14 67 3 20 21 60 40 88 l34 50 - 117 - 1 c - 95 0 - 113 - 2 - 98 - 12 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2122 6988 c38 -7 70 -7 95 0 33 9 25 10 -57 10 -95 -1 -95 -1 -38 - 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2423 6993 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2800 6996 c0 -2 13 -33 30 -68 22 -47 30 -77 30 -120 0 -31 5 -60 10 - 63 6 - 4 10 12 10 42 0 71 15 110 60 165 l41 48 - 90 0 c - 50 0 - 91 - 2 - 91 - 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3232 6995 c10 -11 324 -16 349 -6 17 7 -32 10 -165 10 -104 1 -187 - 1 - 184 - 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3890 6989 c0 -18 57 -69 77 -69 20 0 106 51 117 69 5 8 -23 11 -93 11 - 66 0 - 101 - 4 - 101 - 11 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4206 6983 c27 -13 36 -13 80 0 l49 15 -80 0 c-79 1 -79 0 -49 -15z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4395 6990 c41 -10 136 -10 160 0 13 5 -18 8 -85 8 -69 0 -95 -3 -75 - 8 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4730 6984 c57 -18 81 -18 106 1 17 13 11 14 -66 14 l-85 0 45 -15z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4970 6990 c0 -5 17 -25 37 -45 48 -47 87 -45 120 4 13 19 23 38 23 42 0 5 - 40 9 - 90 9 - 50 0 - 90 - 4 - 90 - 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5355 6990 c44 -11 158 -11 175 0 10 7 -21 9 -95 9 -72 -1 -100 -4 - 80 - 9 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6055 6973 c28 -14 64 -39 81 -55 l32 -30 36 48 c20 26 36 51 36 55 0 5 - 53 9 - 117 9 l - 118 - 1 50 - 26 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6330 6995 c0 -17 52 -21 110 -10 l65 13 -87 1 c-49 1 -88 -1 -88 -4z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6610 6984 c61 -16 175 -13 193 5 8 8 -24 11 -118 10 l-130 -1 55 - 14 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6910 6991 c8 -5 32 -11 53 -15 30 -6 37 -4 37 9 0 12 -12 15 -52 15 - 34 0 - 48 - 4 - 38 - 9 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2845 6621 c-10 -22 -29 -50 -42 -63 l-25 -23 -444 -3 -445 -3 -27 29 c - 15 15 - 35 42 - 44 60 - 9 18 - 21 32 - 26 32 - 4 0 - 18 - 20 - 30 - 45 - 12 - 24 - 33 - 52 - 47 - 61 - 32 - 21 - 124 - 22 - 280 - 3 - 93 12 - 176 14 - 370 9 l - 250 - 7 - 41 44 c - 57 61 - 95 57 - 205 - 21 - 34 - 25 - 50 - 30 - 97 - 29 - 31 1 - 150 3 - 264 6 l - 208 4 0 - 45 0 - 44 148 7 c138 7 152 6 193 - 13 24 - 12 57 - 31 72 - 44 25 - 20 30 - 21 50 - 8 12 8 51 30 87 49 58 31 73 35 140 34 41 0 86 - 5 100 - 10 16 - 7 129 - 8 315 - 3 288 7 290 7 330 - 16 22 - 12 53 - 34 68 - 48 l29 - 27 - 4 - 114 c - 3 - 104 - 5 - 116 - 27 - 139 - 33 - 35 - 102 - 60 - 143 - 52 - 18 3 - 193 8 - 388 11 - 195 3 - 374 8 - 396 11 - 23 2 - 63 18 - 88 35 l - 47 30 - 42 - 33 c - 37 - 30 - 50 - 34 - 132 - 40 - 49 - 4 - 130 - 4 - 178 - 1 l - 88 6 3 - 39 c2 - 31 7 - 39 28 - 44 40 - 9 89 - 110 90 - 182 0 - 126 - 35 - 198 - 96 - 198 - 21 0 - 24 - 5 - 24 - 35 l0 - 35 138 - 2 c75 - 2 198 - 2 271 0 148 3 219 - 8 248 - 40 15 - 17 19 - 41 22 - 146 4 - 147 - 7 - 198 - 46 - 213 - 14 - 5 - 75 - 12 - 135 - 16 - 143 - 8 - 150 - 13 - 104 - 82 33 - 49 36 - 59 38 - 135 3 - 121 1 - 142 - 22 - 185 - 29 - 58 - 48 - 65 - 161 - 57 - 53 3 - 131 3 - 173 0 l - 76 - 7 0 - 1870 0 - 1870 175 5 c164 5 177 4 200 - 14 51 - 40 63 - 82 60 - 202 - 3 - 97 - 6 - 111 - 27 - 133 - 46 - 49 - 68 - 54 - 244 - 55 l - 164 - 1 0 - 53 c0 - 47 2 - 54 20 - 54 11 0 38 - 16 60 - 36 l40 - 36 0 - 115 c0 - 121 - 6 - 142 - 58 - 210 l - 24 - 33 96 0 96 0 - 29 57 c - 25 51 - 29 73 - 33 170 - 5 95 - 3 116 12 140 28 46 69 80 103 87 17 4 213 9 434 13 452 6 434 9 473 - 66 11 - 22 24 - 42 28 - 45 5 - 3 23 15 41 40 55 79 24 76 706 78 94 0 122 - 8 284 - 87 49 - 24 91 - 69 91 - 98 0 - 27 7 - 24 61 26 54 51 79 55 137 26 54 - 27 151 - 39 437 - 51 138 - 5 284 - 12 325 - 13 43 - 2 88 - 10 106 - 20 30 - 15 32 - 15 79 19 27 19 54 34 60 34 6 0 70 16 140 35 71 20 174 42 229 51 71 10 114 23 150 43 70 40 98 44 246 36 l129 - 8 41 - 68 c38 - 64 40 - 71 34 - 123 - 7 - 62 1 - 110 18 - 100 7 5 9 32 5 81 - 5 68 - 4 76 19 103 14 16 48 46 76 66 l51 38 151 - 5 c241 - 7 578 - 4 618 5 37 8 39 7 97 - 53 79 - 82 105 - 83 177 - 6 l51 55 282 - 5 c156 - 3 287 - 7 292 - 10 4 - 3 53 2 108 10 96 16 102 15 143 - 3 24 - 10 65 - 37 91 - 60 27 - 23 51 - 42 54 - 42 3 0 32 25 65 55 47 44 66 55 92 55 19 0 48 3 65 6 l31 6 0 254 0 254 - 39 0 c - 54 0 - 91 - 15 - 91 - 38 0 - 11 24 - 42 54 - 71 70 - 66 70 - 65 50 - 102 - 14 - 27 - 14 - 38 - 3 - 77 l13 - 46 - 45 - 39 c - 24 - 22 - 64 - 49 - 89 - 60 - 39 - 18 - 55 - 19 - 140 - 11 - 52 4 - 230 9 - 395 9 - 165 1 - 309 2 - 321 3 - 11 1 - 41 16 - 67 33 l - 46 30 - 82 - 48 c - 81 - 46 - 86 - 48 - 159 - 47 - 41 1 - 87 7 - 102 12 - 17 7 - 125 9 - 320 6 l - 293 - 5 - 48 30 c - 26 17 - 58 31 - 70 31 - 33 0 - 108 - 30 - 151 - 62 - 30 - 21 - 51 - 28 - 87 - 28 - 26 0 - 54 3 - 63 6 - 36 14 - 2 126 48 159 13 9 61 22 106 30 58 10 91 22 109 38 14 12 54 48 88 80 71 66 163 113 250 128 60 11 61 11 66 47 6 49 81 158 121 179 17 8 75 56 128 105 122 112 167 133 257 123 36 - 5 120 - 9 187 - 10 203 - 4 250 - 19 280 - 92 14 - 32 34 - 45 34 - 22 0 26 32 76 59 92 26 15 69 17 395 18 l366 2 0 27 c0 28 0 28 - 79 31 - 91 5 - 112 18 - 142 87 - 10 23 - 23 42 - 28 42 - 6 0 - 22 - 22 - 36 - 50 - 39 - 77 - 47 - 78 - 555 - 78 - 457 - 1 - 470 1 - 470 50 0 24 67 148 80 148 8 0 118 124 168 189 34 45 89 57 170 36 52 - 13 110 - 16 286 - 14 271 2 283 - 1 321 - 86 13 - 31 30 - 55 36 - 53 7 2 20 26 31 53 32 82 45 90 138 87 l80 - 3 0 136 c0 79 - 4 135 - 10 135 - 5 0 - 19 - 31 - 30 - 70 - 17 - 56 - 28 - 75 - 57 - 97 l - 36 - 28 - 405 0 c - 326 0 - 406 3 - 415 13 - 21 26 - 13 79 20 119 16 21 40 66 53 101 13 35 45 89 72 124 60 74 68 93 57 133 - 15 50 - 10 87 15 119 13 17 27 42 31 56 32 103 47 130 95 164 59 42 68 69 46 135 - 19 57 - 20 91 - 6 158 5 26 12 66 16 87 8 58 60 106 111 106 52 0 134 - 25 166 - 51 l27 - 20 41 33 c38 30 47 33 125 37 l84 3 0 485 0 486 - 66 - 6 c - 87 - 8 - 124 7 - 157 65 - 22 39 - 24 53 - 23 153 1 97 5 115 25 148 37 61 57 69 145 61 l76 - 7 0 262 0 262 - 373 - 2 c - 268 - 1 - 380 2 - 395 10 - 47 25 - 57 57 - 57 181 0 127 17 184 63 206 16 8 136 11 393 10 l369 - 1 0 33 0 32 - 79 0 c - 102 0 - 133 22 - 152 105 - 7 30 - 15 55 - 19 55 - 4 0 - 11 - 17 - 15 - 37 - 10 - 54 - 30 - 87 - 62 - 103 - 50 - 24 - 864 - 43 - 939 - 22 - 72 21 - 79 37 - 79 176 0 111 2 124 24 154 13 18 24 47 25 65 1 30 - 1 32 - 44 38 - 76 12 - 475 10 - 510 - 3 - 23 - 8 - 42 - 8 - 68 0 - 57 17 - 180 101 - 246 167 l - 58 59 6 49 c6 59 29 87 95 119 44 22 55 23 271 21 332 - 4 617 - 13 637 - 20 10 - 4 35 - 18 55 - 31 41 - 27 39 - 28 110 29 28 23 134 48 205 49 23 0 70 - 7 104 - 16 54 - 14 96 - 15 275 - 9 273 9 295 6 386 - 56 l73 - 49 3 86 c2 48 0 89 - 3 92 - 3 3 - 164 7 - 358 9 - 193 1 - 356 3 - 360 3 - 4 0 - 30 20 - 56 45 - 26 25 - 51 45 - 55 45 - 4 0 - 22 - 11 - 39 - 24 - 18 - 13 - 57 - 36 - 87 - 51 - 63 - 32 - 27 - 30 - 504 - 25 l - 340 4 - 43 38 c - 24 21 - 55 41 - 67 44 - 30 7 - 80 - 17 - 126 - 61 l - 35 - 34 - 415 - 2 c - 448 - 3 - 433 - 4 - 498 52 - 37 33 - 76 37 - 112 12 - 22 - 15 - 56 - 17 - 285 - 18 - 241 - 1 - 265 - 3 - 332 - 24 - 53 - 17 - 99 - 23 - 180 - 24 - 139 - 3 - 164 7 - 199 79 - 14 30 - 30 54 - 34 54 - 4 0 - 15 - 18 - 25 - 39 z m825 - 147 c63 - 8 176 - 19 250 - 24 147 - 9 293 - 37 368 - 71 26 - 11 78 - 32 116 - 45 38 - 13 90 - 37 115 - 53 25 - 16 67 - 39 93 - 50 26 - 11 70 - 38 99 - 60 28 - 23 54 - 41 59 - 41 4 0 35 - 25 69 - 55 34 - 30 67 - 55 73 - 55 16 0 274 - 270 338 - 355 14 - 18 60 - 74 103 - 125 43 - 50 88 - 108 100 - 128 11 - 20 38 - 56 59 - 79 21 - 24 38 - 48 38 - 54 0 - 6 17 - 37 38 - 68 21 - 31 46 - 79 56 - 107 9 - 29 30 - 72 45 - 95 16 - 24 41 - 84 56 - 134 15 - 49 38 - 111 51 - 137 14 - 27 34 - 90 45 - 141 12 - 50 30 - 108 40 - 128 41 - 82 54 - 230 52 - 599 - 2 - 378 - 10 - 456 - 74 - 689 - 16 - 57 - 29 - 109 - 29 - 116 0 - 6 - 16 - 30 - 34 - 52 - 19 - 22 - 44 - 63 - 55 - 92 - 10 - 28 - 33 - 67 - 50 - 87 - 17 - 19 - 37 - 50 - 45 - 68 - 7 - 18 - 27 - 44 - 44 - 57 - 16 - 13 - 40 - 44 - 52 - 69 - 13 - 25 - 34 - 58 - 47 - 74 - 13 - 16 - 37 - 54 - 53 - 86 - 16 - 31 - 36 - 62 - 45 - 70 - 9 - 8 - 32 - 43 - 50 - 79 - 18 - 36 - 43 - 75 - 55 - 86 - 12 - 11 - 31 - 38 - 42 - 60 - 11 - 22 - 33 - 53 - 48 - 70 - 16 - 16 - 57 - 61 - 91 - 100 - 35 - 38 - 95 - 99 - 134 - 134 - 38 - 35 - 85 - 79 - 104 - 98 - 19 - 19 - 47 - 41 - 61 - 48 - 15 - 8 - 35 - 25 - 44 - 40 - 9 - 14 - 36 - 37 - 59 - 51 - 23 - 15 - 46 - 33 - 50 - 41 - 5 - 8 - 30 - 29 - 56 - 46 - 67 - 45 - 170 - 120 - 211 - 155 - 19 - 16 - 51 - 37 - 70 - 47 - 19 - 9 - 46 - 28 - 60 - 41 - 14 - 13 - 54 - 36 - 90 - 52 - 36 - 17 - 74 - 40 - 85 - 52 - 11 - 13 - 48 - 36 - 83 - 52 - 35 - 16 - 81 - 42 - 102 - 57 - 22 - 16 - 59 - 33 - 83 - 40 - 24 - 6 - 67 - 26 - 95 - 46 - 36 - 24 - 78 - 41 - 138 - 55 - 47 - 11 - 105 - 32 - 129 - 45 - 23 - 14 - 84 - 34 - 135 - 45 - 51 - 12 - 118 - 31 - 149 - 44 - 106 - 45 - 220 - 58 - 561 - 63 - 394 - 6 - 594 9 - 717 56 - 43 16 - 107 37 - 142 46 - 36 9 - 92 30 - 125 47 - 34 17 - 85 39 - 115 49 - 30 11 - 75 32 - 100 48 - 25 16 - 64 38 - 86 48 - 22 10 - 60 35 - 84 55 - 24 21 - 49 38 - 55 38 - 7 0 - 38 22 - 71 50 - 33 27 - 62 50 - 66 50 - 15 0 - 163 143 - 266 255 - 130 143 - 184 219 - 214 300 - 12 33 - 33 78 - 47 99 - 13 22 - 34 69 - 47 105 - 12 37 - 36 98 - 53 136 - 23 52 - 35 104 - 47 195 - 17 127 - 28 190 - 64 340 - 61 256 - 61 797 0 1020 12 41 31 133 44 204 16 86 34 150 55 193 18 36 39 89 47 117 8 28 30 80 50 116 19 35 44 92 54 126 10 33 31 79 45 100 15 21 36 59 47 83 11 24 39 73 63 108 24 35 44 70 44 77 0 7 15 30 33 52 18 21 45 60 60 85 43 75 146 200 287 349 47 49 97 102 111 117 15 15 55 51 89 78 34 28 76 64 94 81 17 17 45 39 61 49 17 11 50 36 75 56 25 20 68 48 96 62 28 15 54 33 57 41 3 8 27 27 54 42 26 15 64 40 83 55 19 14 61 41 92 58 31 18 62 39 69 48 8 8 45 31 84 49 38 19 85 45 103 58 18 14 56 33 85 42 29 9 68 28 87 40 20 13 69 35 110 49 41 14 96 36 122 50 25 14 83 34 129 46 45 11 104 32 132 45 34 18 77 28 140 35 51 5 135 14 187 19 52 6 118 10 145 11 28 0 79 11 115 24 79 29 62 28 200 9 z m - 2521 - 448 c8 - 6 28 - 41 46 - 77 30 - 63 32 - 72 29 - 167 - 4 - 185 23 - 176 - 543 - 167 l - 445 7 - 27 27 c - 22 22 - 29 41 - 35 97 - 4 38 - 7 85 - 6 105 1 48 54 164 78 173 10 4 73 5 139 1 66 - 3 208 - 2 315 2 296 12 433 12 449 - 1 z m4742 - 976 c10 - 6 27 - 27 38 - 48 10 - 20 28 - 46 40 - 56 24 - 22 27 - 58 6 - 76 - 20 - 17 - 98 - 4 - 120 20 - 22 24 - 33 134 - 15 155 15 18 25 19 51 5 z m164 - 359 c36 - 13 56 - 27 72 - 52 12 - 19 33 - 47 46 - 64 37 - 46 41 - 69 18 - 117 - 11 - 24 - 26 - 50 - 32 - 59 - 17 - 23 - 4 - 63 31 - 96 45 - 42 101 - 190 107 - 284 6 - 83 5 - 84 - 55 - 120 - 29 - 17 - 33 - 24 - 28 - 47 4 - 15 22 - 41 41 - 59 47 - 45 53 - 58 66 - 160 11 - 82 11 - 93 - 7 - 128 - 10 - 21 - 28 - 42 - 39 - 46 - 33 - 11 - 126 33 - 153 72 - 13 19 - 38 49 - 55 67 l - 32 33 3 107 c4 120 7 127 74 152 58 21 59 41 4 100 - 54 57 - 72 113 - 80 250 - 6 89 - 5 98 18 135 l24 39 - 69 84 c - 77 95 - 88 135 - 48 186 24 30 27 30 94 7 z m106 - 1258 c32 - 16 61 - 36 65 - 45 3 - 10 22 - 41 42 - 70 46 - 67 56 - 148 24 - 188 - 17 - 21 - 29 - 25 - 78 - 25 - 75 0 - 81 - 19 - 25 - 74 31 - 30 41 - 49 47 - 86 14 - 96 - 17 - 234 - 57 - 256 - 20 - 10 - 112 - 3 - 140 12 - 8 4 - 21 25 - 27 47 - 11 37 - 42 62 - 77 62 - 39 0 - 47 111 - 14 207 26 77 45 94 122 108 75 13 81 28 34 79 - 52 54 - 65 162 - 27 224 24 39 35 40 111 5 z m - 226 - 693 c25 - 22 52 - 40 59 - 40 8 0 34 - 25 59 - 55 37 - 45 46 - 64 52 - 111 6 - 51 4 - 62 - 26 - 122 - 39 - 77 - 76 - 104 - 133 - 100 - 35 3 - 43 8 - 65 46 - 14 24 - 57 68 - 96 98 - 38 31 - 78 68 - 88 84 - 17 27 - 17 29 19 104 20 41 42 81 50 87 12 10 101 48 116 49 4 0 28 - 18 53 - 40 z m - 189 - 325 c16 - 39 43 - 60 91 - 70 25 - 5 42 - 20 74 - 67 36 - 53 41 - 67 37 - 102 - 8 - 65 - 54 - 153 - 96 - 181 - 54 - 37 - 86 - 33 - 116 13 - 21 32 - 92 100 - 129 124 - 7 4 - 22 8 - 34 8 - 19 0 - 23 - 6 - 23 - 30 0 - 19 8 - 36 22 - 48 13 - 9 41 - 35 63 - 58 22 - 22 52 - 48 68 - 57 24 - 16 27 - 23 27 - 73 0 - 68 - 3 - 73 - 82 - 156 - 51 - 53 - 72 - 68 - 103 - 73 - 68 - 12 - 83 - 27 - 91 - 92 - 6 - 47 - 13 - 63 - 36 - 83 - 17 - 14 - 49 - 44 - 73 - 67 - 38 - 38 - 49 - 43 - 88 - 43 - 58 0 - 79 - 20 - 101 - 93 - 15 - 50 - 24 - 63 - 64 - 90 - 25 - 18 - 62 - 46 - 81 - 63 - 49 - 42 - 74 - 54 - 114 - 54 - 66 0 - 103 24 - 138 90 - 18 34 - 41 66 - 51 71 - 24 13 - 49 5 - 43 - 13 2 - 7 9 - 32 15 - 56 10 - 38 17 - 46 56 - 62 39 - 17 44 - 23 44 - 53 0 - 18 - 10 - 53 - 22 - 77 - 20 - 39 - 33 - 50 - 106 - 86 - 46 - 23 - 88 - 46 - 94 - 52 - 20 - 20 - 58 - 13 - 103 19 - 44 32 - 65 32 - 65 0 0 - 9 - 7 - 41 - 15 - 69 - 14 - 47 - 21 - 54 - 67 - 78 - 45 - 23 - 61 - 26 - 119 - 22 - 75 6 - 93 - 1 - 114 - 41 - 17 - 33 - 45 - 46 - 139 - 61 - 39 - 6 - 95 - 23 - 125 - 38 - 36 - 16 - 79 - 28 - 118 - 30 - 62 - 4 - 62 - 4 - 101 38 - 46 51 - 69 50 - 87 - 3 - 17 - 51 - 40 - 75 - 79 - 82 - 17 - 3 - 61 - 13 - 98 - 21 - 84 - 20 - 146 - 8 - 218 42 - 59 41 - 82 42 - 122 9 - 33 - 28 - 95 - 33 - 203 - 15 - 33 6 - 113 17 - 178 25 - 64 8 - 127 20 - 138 26 - 19 10 - 20 13 - 7 26 11 10 73 20 204 34 196 21 213 21 278 - 4 51 - 19 69 - 13 95 34 19 33 30 41 79 54 31 9 77 23 101 32 31 11 64 14 114 10 65 - 4 74 - 8 97 - 36 34 - 40 41 - 39 28 3 - 15 47 8 82 70 107 26 11 58 26 72 34 89 50 124 65 177 74 79 12 109 5 140 - 35 30 - 40 59 - 46 49 - 11 - 21 72 - 20 85 16 119 19 18 56 50 84 72 48 37 50 38 111 32 l62 - 6 10 38 c16 57 65 101 205 183 55 33 74 40 100 35 70 - 14 68 - 15 88 52 17 56 24 66 66 92 26 16 53 38 59 49 20 32 69 52 131 54 56 2 57 2 77 - 36 11 - 21 34 - 46 51 - 56 17 - 10 36 - 33 44 - 50 20 - 50 92 - 54 76 - 5 - 3 11 - 40 54 - 81 98 - 72 76 - 75 80 - 75 127 0 47 3 52 68 118 75 76 94 89 155 99 l41 7 11 73 c9 58 17 78 37 95 14 12 35 39 47 59 22 37 47 50 124 63 46 7 54 23 33 64 - 22 41 - 20 69 7 110 13 20 32 49 41 64 22 36 68 56 129 57 46 0 49 - 2 63 - 35 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3236 6310 c-27 -5 -80 -25 -117 -44 -52 -27 -92 -39 -168 -51 -112 - 17 - 133 - 23 - 184 - 58 - 19 - 13 - 66 - 32 - 103 - 41 - 38 - 10 - 93 - 33 - 123 - 51 - 31 - 19 - 79 - 42 - 108 - 50 - 29 - 9 - 65 - 26 - 81 - 40 - 16 - 13 - 63 - 39 - 104 - 58 - 41 - 19 - 79 - 40 - 82 - 46 - 4 - 6 - 35 - 25 - 69 - 43 - 34 - 17 - 77 - 44 - 96 - 61 - 19 - 16 - 51 - 36 - 70 - 44 - 20 - 8 - 47 - 25 - 61 - 37 - 14 - 13 - 47 - 35 - 73 - 50 - 26 - 15 - 53 - 36 - 60 - 47 - 7 - 11 - 39 - 38 - 72 - 60 - 112 - 74 - 165 - 119 - 325 - 273 - 41 - 40 - 92 - 93 - 113 - 117 - 21 - 24 - 60 - 70 - 87 - 101 - 27 - 31 - 57 - 72 - 66 - 90 - 9 - 18 - 29 - 47 - 45 - 65 - 15 - 18 - 37 - 54 - 49 - 80 - 12 - 26 - 32 - 59 - 45 - 73 - 14 - 14 - 36 - 55 - 51 - 90 - 14 - 35 - 36 - 77 - 49 - 92 - 13 - 15 - 31 - 49 - 40 - 75 - 9 - 26 - 34 - 84 - 55 - 128 - 21 - 44 - 48 - 114 - 60 - 155 - 12 - 41 - 30 - 91 - 40 - 110 - 31 - 61 - 90 - 368 - 111 - 570 - 14 - 138 - 6 - 432 16 - 570 8 - 52 24 - 160 35 - 240 17 - 111 29 - 163 55 - 220 18 - 41 40 - 99 50 - 128 9 - 29 31 - 74 49 - 100 18 - 26 45 - 79 60 - 119 15 - 39 34 - 77 42 - 84 9 - 7 22 - 26 31 - 43 8 - 17 32 - 49 53 - 71 20 - 22 49 - 61 63 - 86 14 - 25 38 - 54 51 - 63 14 - 9 35 - 34 46 - 55 11 - 22 34 - 50 52 - 62 18 - 13 47 - 38 64 - 56 17 - 18 38 - 33 47 - 33 8 0 22 - 3 31 - 6 42 - 16 - 3 70 - 88 168 - 71 82 - 94 113 - 112 153 - 10 22 - 31 59 - 47 82 - 15 24 - 39 73 - 53 110 - 14 38 - 39 91 - 55 119 - 16 28 - 38 89 - 50 135 - 11 46 - 32 115 - 45 154 - 42 117 - 67 384 - 68 740 - 1 409 23 642 79 755 6 14 20 54 30 90 9 36 33 93 51 126 19 34 41 84 49 111 8 27 28 68 44 90 16 23 41 64 55 92 14 27 39 65 55 83 15 18 34 44 41 57 19 36 150 211 158 211 4 0 18 17 32 38 32 48 207 242 279 309 179 166 366 323 444 373 26 16 47 33 47 38 0 5 19 19 43 32 23 12 56 35 72 51 17 15 57 40 90 55 33 15 76 40 95 55 19 15 58 34 85 43 28 9 70 30 94 46 25 17 70 38 100 46 31 9 83 31 116 49 33 18 94 41 135 50 41 10 105 30 143 46 67 28 119 40 252 59 39 5 122 18 185 28 99 17 139 19 270 12 85 - 4 190 - 15 232 - 24 42 - 8 113 - 18 157 - 22 75 - 6 80 - 8 91 - 34 6 - 15 22 - 32 36 - 39 31 - 14 104 - 26 104 - 17 0 31 - 53 65 - 123 81 - 16 3 - 32 16 - 39 30 - 11 25 - 34 37 - 108 56 - 24 6 - 70 24 - 101 39 - 90 46 - 200 60 - 499 65 - 146 2 - 287 0 - 314 - 5 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4450 6001 c0 -21 49 -61 75 -61 27 0 32 16 12 43 -15 21 -87 36 -87 18 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4570 5902 c0 -25 29 -50 68 -58 24 -5 32 -13 37 -35 11 -49 85 -83 85 - 39 0 25 - 34 60 - 58 60 - 23 0 - 42 19 - 42 41 0 22 - 37 49 - 67 49 - 16 0 - 23 - 6 - 23 - 18 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 5714 c0 -29 21 -54 45 -54 31 0 33 22 5 50 -24 24 -50 26 -50 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4880 5602 c0 -23 19 -42 42 -42 21 0 24 30 6 48 -18 18 -48 15 -48 - 6 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3377 5593 c-4 -4 -4 -27 -1 -53 5 -39 1 -55 -22 -100 -18 -35 -29 - 73 - 31 - 109 - 6 - 97 26 - 129 157 - 162 47 - 11 117 - 38 155 - 59 39 - 21 87 - 41 107 - 45 39 - 7 118 - 74 160 - 137 13 - 18 35 - 49 50 - 68 37 - 49 98 - 224 98 - 283 0 - 26 - 7 - 64 - 16 - 85 - 9 - 20 - 25 - 66 - 36 - 102 - 12 - 41 - 32 - 78 - 53 - 100 - 18 - 19 - 40 - 48 - 48 - 65 - 29 - 54 - 179 - 200 - 257 - 249 - 25 - 16 - 36 - 30 - 38 - 52 - 5 - 47 28 - 79 106 - 105 55 - 18 77 - 33 122 - 79 30 - 31 61 - 75 69 - 96 7 - 21 22 - 51 32 - 65 27 - 39 38 - 74 50 - 153 13 - 98 - 1 - 194 - 41 - 269 - 17 - 33 - 40 - 83 - 51 - 111 - 27 - 71 - 119 - 182 - 216 - 258 - 66 - 53 - 94 - 68 - 148 - 82 - 37 - 9 - 89 - 28 - 115 - 41 - 26 - 13 - 79 - 29 - 116 - 35 - 85 - 13 - 135 - 37 - 151 - 70 - 7 - 14 - 17 - 93 - 23 - 175 - 5 - 83 - 15 - 164 - 21 - 182 - 13 - 41 - 122 - 123 - 164 - 123 - 45 0 - 96 31 - 117 70 - 17 31 - 19 49 - 13 165 3 72 8 160 11 197 5 58 3 69 - 15 87 - 11 11 - 37 23 - 58 27 - 51 10 - 259 - 10 - 279 - 27 - 33 - 27 - 70 - 161 - 94 - 339 - 16 - 115 - 48 - 182 - 100 - 205 - 52 - 23 - 106 - 22 - 156 3 - 53 27 - 91 105 - 78 161 4 20 8 65 9 101 2 42 10 82 24 113 16 34 21 62 19 99 - 3 47 - 7 55 - 37 75 - 33 22 - 40 23 - 150 17 - 104 - 6 - 118 - 5 - 139 12 - 32 27 - 54 115 - 46 185 6 57 - 4 81 - 24 56 - 5 - 6 - 12 - 58 - 16 - 114 - 8 - 113 - 2 - 132 56 - 198 42 - 48 77 - 65 138 - 65 45 0 55 - 4 80 - 32 45 - 49 56 - 83 40 - 126 - 7 - 20 - 14 - 91 - 16 - 158 l - 4 - 121 53 - 55 c49 - 53 56 - 57 111 - 64 66 - 8 211 1 267 16 45 12 95 66 108 117 5 21 12 94 16 163 7 146 14 168 63 207 82 66 105 64 142 - 12 22 - 45 22 - 50 10 - 188 - 7 - 95 - 8 - 151 - 2 - 168 14 - 37 100 - 109 131 - 110 50 - 3 106 3 146 16 22 7 65 20 95 29 96 27 120 67 166 270 13 60 32 118 41 128 28 31 153 94 233 117 41 12 100 37 130 55 30 17 69 38 85 46 44 21 214 195 262 267 48 73 99 245 109 363 5 65 1 95 - 31 229 - 33 135 - 43 161 - 83 220 - 25 36 - 58 81 - 73 98 - 34 40 - 53 102 - 40 135 5 12 21 34 36 48 15 14 34 39 42 55 8 17 26 42 40 57 14 14 43 75 65 135 22 59 49 133 61 163 18 46 21 77 22 191 l0 136 - 34 54 c - 19 30 - 43 72 - 54 94 - 21 42 - 138 165 - 157 165 - 7 0 - 33 21 - 60 48 - 31 31 - 66 53 - 101 66 - 30 10 - 68 31 - 85 46 - 22 19 - 51 31 - 95 39 - 44 7 - 71 18 - 88 36 - 26 26 - 30 59 - 22 206 3 51 - 18 103 - 44 113 - 22 8 - 50 8 - 58 - 1 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2740 5520 c-8 -15 -7 -33 4 -70 13 -45 13 -57 -5 -142 -26 -127 -15 - 199 36 - 218 30 - 11 136 13 184 42 19 12 53 31 75 42 l41 21 3 75 c2 52 - 1 81 - 11 94 - 13 17 - 15 15 - 26 - 29 - 26 - 101 - 55 - 129 - 110 - 100 - 38 19 - 47 51 - 32 112 21 81 - 7 152 - 69 177 - 53 21 - 77 20 - 90 - 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4980 5497 c0 -25 17 -47 37 -47 16 0 17 42 1 58 -19 19 -38 14 -38 - 11 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3057 5503 c-10 -10 -8 -83 2 -83 12 0 21 26 21 61 0 28 -9 37 -23 22 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2472 5397 c-7 -8 -18 -58 -24 -109 -10 -94 -10 -94 -46 -114 -32 - 17 - 51 - 38 - 87 - 98 - 13 - 22 - 73 - 35 - 163 - 36 - 76 0 - 125 - 16 - 136 - 45 - 10 - 26 - 8 - 28 27 - 21 17 3 88 8 157 12 75 3 135 11 151 20 46 23 88 83 94 133 3 25 10 53 16 61 23 38 30 69 27 138 - 3 63 - 5 73 - 16 59 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5080 5377 c0 -42 20 -84 45 -95 29 -14 30 -10 9 51 -19 55 -54 83 - 54 44 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5163 5219 c6 -44 37 -86 56 -75 30 19 -8 116 -46 116 -13 0 -15 -8 - 10 - 41 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5276 5044 c-3 -9 -2 -33 4 -54 19 -70 66 -80 54 -12 -7 40 -29 82 - 43 82 - 5 0 - 12 - 7 - 15 - 16 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2970 4794 c-30 -7 -84 -18 -120 -24 -196 -31 -208 -48 -230 -324 -6 - 74 - 15 - 150 - 21 - 168 - 20 - 73 - 4 - 146 39 - 174 31 - 20 82 - 21 257 - 5 230 22 270 28 305 49 19 11 60 28 90 36 72 21 79 26 94 69 7 21 26 46 45 59 24 16 45 48 73 110 l41 87 - 32 78 c - 33 80 - 67 128 - 111 156 - 14 9 - 69 27 - 124 41 - 111 29 - 217 33 - 306 10 z m393 - 142 c19 - 8 35 - 29 53 - 69 21 - 48 25 - 68 21 - 120 - 3 - 37 - 14 - 82 - 28 - 110 - 23 - 46 - 28 - 49 - 115 - 83 - 50 - 19 - 101 - 43 - 114 - 52 - 40 - 29 - 110 - 46 - 212 - 51 - 89 - 5 - 100 - 3 - 130 17 - 41 27 - 43 42 - 29 186 19 186 21 197 44 231 45 65 69 71 287 66 115 - 2 206 - 8 223 - 15 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2125 4750 c-27 -5 -71 -9 -96 -9 -61 -1 -74 -17 -59 -70 19 -72 89 - 98 165 - 61 38 18 56 21 99 16 53 - 7 53 - 7 70 27 20 43 20 57 0 85 - 13 19 - 24 22 - 72 21 - 31 - 1 - 79 - 5 - 107 - 9 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5504 4059 c-4 -7 -8 -96 -10 -198 -1 -102 -9 -256 -17 -341 -14 - 150 - 11 - 188 14 - 163 6 6 20 69 31 140 10 70 25 162 33 203 13 74 11 125 - 13 309 - 7 53 - 23 74 - 38 50 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2195 3880 c-4 -7 -9 -43 -11 -79 -1 -37 -8 -87 -14 -112 -15 -54 - 17 - 225 - 2 - 259 11 - 27 10 - 28 31 39 18 55 24 161 13 226 - 7 40 - 7 80 0 118 7 39 7 62 0 69 - 6 6 - 12 6 - 17 - 2 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2642 3676 c-92 -30 -106 -62 -122 -281 -6 -93 -18 -203 -26 -244 - 16 - 88 - 6 - 116 57 - 158 40 - 26 45 - 27 193 - 28 139 0 158 2 241 28 130 41 160 56 184 88 12 16 38 33 63 41 29 8 46 21 57 42 9 16 31 45 50 64 32 33 33 38 29 97 - 3 47 - 11 73 - 31 103 - 14 22 - 32 61 - 38 87 - 8 30 - 21 52 - 37 63 - 14 9 - 39 31 - 57 48 - 58 58 - 62 58 - 300 61 - 166 2 - 231 - 1 - 263 - 11 z m480 - 126 c57 - 21 169 - 124 182 - 167 12 - 39 - 28 - 109 - 111 - 192 - 77 - 78 - 79 - 79 - 158 - 96 - 44 - 9 - 113 - 30 - 153 - 46 - 97 - 38 - 114 - 37 - 151 8 - 59 72 - 65 95 - 47 182 9 42 20 108 26 148 5 39 15 83 21 97 18 39 91 69 184 77 137 10 153 10 207 - 11 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5381 3219 c-11 -18 -23 -49 -26 -69 -6 -34 -15 -52 -57 -111 -21 - 30 - 31 - 89 - 19 - 108 14 - 22 36 1 57 57 10 26 28 58 40 72 31 34 44 72 44 130 0 61 - 14 71 - 39 29 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2080 3170 c-18 -44 -72 -87 -119 -95 -23 -4 -48 -14 -57 -23 -14 - 14 - 14 - 16 3 - 26 24 - 13 109 - 11 158 6 47 15 61 51 51 122 - 8 53 - 19 58 - 36 16 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1796 2991 c-11 -12 -14 -21 -7 -25 15 -10 51 12 51 29 0 21 -24 19 - 44 - 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5188 2833 c-9 -10 -23 -35 -32 -56 -8 -21 -29 -49 -45 -63 -22 -18 - 32 - 37 - 37 - 70 - 3 - 25 - 4 - 47 - 1 - 50 13 - 13 47 19 67 63 13 27 36 60 53 74 24 21 30 34 31 69 1 48 - 12 60 - 36 33 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5003 2544 c-30 -29 -52 -79 -41 -90 3 -2 17 0 31 5 26 10 52 65 45 98 - 3 15 - 9 13 - 35 - 13 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4901 2423 c-11 -10 -24 -33 -27 -50 -6 -29 -4 -33 14 -33 26 0 52 36 52 72 0 32 - 9 35 - 39 11 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4796 2298 c-22 -31 -20 -58 2 -58 25 0 52 31 52 58 0 29 -34 29 -54 0 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4717 2209 c-9 -5 -23 -25 -31 -44 -8 -19 -24 -36 -38 -40 -35 -11 - 58 - 35 - 58 - 62 0 - 34 33 - 29 64 10 26 33 36 44 80 83 43 39 31 81 - 17 53 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4510 1991 c-14 -27 -13 -31 8 -31 21 0 42 18 42 37 0 20 -38 15 -50 - 6 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4423 1920 c-12 -5 -29 -22 -37 -38 -8 -16 -29 -35 -46 -42 -32 -13 - 55 - 44 - 45 - 60 12 - 20 45 - 9 83 28 22 20 51 45 66 55 16 11 26 27 26 42 0 26 - 11 30 - 47 15 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4198 1719 c-26 -15 -22 -39 5 -39 25 0 47 17 47 37 0 15 -28 17 -52 2 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1320 1531 c0 -23 91 -73 106 -58 3 3 1 14 -5 25 -15 29 -101 56 - 101 33 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3860 1519 c-14 -6 -36 -20 -50 -33 -14 -13 -55 -30 -94 -40 -71 -16 - 106 - 38 - 106 - 64 0 - 12 11 - 14 65 - 9 73 7 101 18 130 53 11 13 47 35 80 47 70 27 88 57 33 56 - 18 0 - 44 - 5 - 58 - 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1460 1426 c0 -20 39 -46 67 -46 29 0 30 24 1 44 -28 20 -68 21 -68 2 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1590 1335 c0 -20 7 -29 33 -39 43 -18 124 -29 131 -18 10 17 -25 51 - 62 61 - 98 25 - 102 25 - 102 - 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3441 1339 c-70 -14 -114 -51 -77 -65 22 -9 158 15 183 32 13 8 23 21 23 29 0 17 - 55 19 - 129 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1780 1250 c0 -37 101 -70 213 -70 99 0 31 41 -107 66 -96 17 -106 17 - 106 4 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3143 1230 c-39 -16 -26 -30 26 -30 55 0 101 14 101 30 0 12 -96 12 - 127 0 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2225 1143 c-49 -8 -51 -21 -4 -35 62 -18 482 -18 524 0 29 13 29 14 10 25 - 20 12 - 464 20 - 530 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5270 1827 c0 -27 16 -50 45 -65 11 -6 29 -28 40 -49 15 -28 26 -38 45 - 38 35 0 37 29 3 60 - 46 42 - 53 49 - 79 83 - 30 38 - 54 42 - 54 9 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4307 973 c-12 -11 -8 -60 6 -70 6 -6 24 -13 40 -17 24 -6 27 -3 27 17 0 13 - 11 36 - 25 51 - 24 26 - 36 31 - 48 19 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6982 6308 c-7 -7 -12 -36 -12 -65 0 -44 -5 -58 -31 -87 -17 -19 -46 - 45 - 65 - 57 - 33 - 20 - 39 - 21 - 200 - 10 - 92 6 - 170 9 - 173 6 - 4 - 2 - 123 - 5 - 264 - 6 l - 257 - 2 - 44 31 c - 24 18 - 50 32 - 56 32 - 17 0 - 100 - 70 - 100 - 85 0 - 7 17 - 19 38 - 27 30 - 12 106 - 14 407 - 13 205 1 381 - 2 395 - 7 14 - 5 48 - 35 76 - 66 l52 - 57 22 20 c12 11 31 38 42 60 12 22 26 43 32 47 6 5 44 5 84 2 l72 - 7 0 152 c0 83 - 1 151 - 3 151 - 2 0 - 8 - 5 - 15 - 12 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M0 5110 c0 -13 60 -13 80 0 11 7 2 10 -32 10 -27 0 -48 -4 -48 -10z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6728 2943 c-8 -10 -38 -48 -67 -85 l-51 -68 97 0 c121 0 131 5 115 58 - 13 42 - 51 103 - 68 109 - 6 2 - 17 - 4 - 26 - 14 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6445 2361 c-3 -5 0 -13 5 -16 15 -9 80 4 80 15 0 13 -77 13 -85 1z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6898 2363 c-22 -6 -23 -43 -4 -82 13 -25 89 -101 101 -101 3 0 5 43 5 95 l0 95 - 42 - 1 c - 24 - 1 - 51 - 3 - 60 - 6 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6115 1053 c-79 -82 -72 -105 33 -111 87 -5 110 10 93 58 -13 38 -57 100 - 72 100 - 5 0 - 29 - 21 - 54 - 47 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5315 961 c-49 -8 -92 -16 -94 -18 -3 -2 1 -9 8 -16 9 -9 86 -13 279 - 17 l267 - 5 47 - 27 c26 - 16 52 - 28 58 - 28 14 0 80 71 80 86 0 6 - 7 18 - 17 25 - 23 20 - 502 20 - 628 0 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6630 950 c0 -5 11 -10 25 -10 14 0 25 5 25 10 0 6 -11 10 -25 10 - 14 0 - 25 - 4 - 25 - 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1222 235 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5640 234 c0 -14 4 -23 10 -19 6 3 10 15 10 26 0 10 -4 19 -10 19 -5 0 - 10 - 12 - 10 - 26 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6743 244 c-3 -8 -1 -20 6 -27 8 -8 11 -4 11 16 0 30 -7 35 -17 11z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3431 134 c-6 -23 -27 -62 -46 -88 l-36 -46 91 0 c49 0 90 2 90 5 0 2 - 13 26 - 30 52 - 16 26 - 30 54 - 30 63 0 9 - 6 25 - 14 35 - 13 18 - 15 17 - 25 - 21 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1193 94 c-18 -27 -40 -59 -49 -72 l-16 -22 118 1 c115 0 118 1 94 17 - 32 21 - 92 82 - 105 106 - 9 16 - 14 13 - 42 - 30 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2277 80 c-37 -35 -67 -67 -67 -72 0 -4 54 -8 120 -8 l121 0 -15 28 c - 8 15 - 32 47 - 53 71 l - 39 44 - 67 - 63 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5613 112 c-26 -20 -83 -91 -83 -103 0 -5 50 -9 110 -9 102 0 110 1 101 18 - 13 24 - 91 112 - 99 112 - 4 0 - 17 - 8 - 29 - 18 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4495 67 c-16 -28 -31 -55 -33 -59 -2 -5 26 -8 62 -8 36 0 66 3 66 6 0 7 - 60 114 - 63 114 - 1 0 - 15 - 24 - 32 - 53 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6727 97 c-8 -13 -40 -36 -70 -50 -90 -42 -83 -47 74 -47 l142 0 -34 23 c - 18 12 - 44 38 - 57 57 - 29 44 - 36 46 - 55 17 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M870 21 c-14 -5 -59 -6 -100 -4 -41 3 -86 0 -100 -5 -18 -8 29 -11 180 - 11 143 0 198 3 181 10 - 35 14 - 131 20 - 161 10 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M3765 23 c-222 -6 -190 -23 40 -23 120 0 194 4 185 9 -24 14 -75 17 - 225 14 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5200 19 c-90 -15 -82 -17 70 -18 102 0 140 3 128 10 -26 14 -135 19 - 198 8 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M5875 23 c-74 -18 -6 -23 291 -22 187 0 317 4 302 9 -15 4 -142 8 - 281 8 - 140 0 - 263 2 - 273 5 - 11 2 - 28 2 - 39 0 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1470 10 c-10 -7 8 -10 60 -9 51 0 69 3 55 9 -27 12 -97 12 -115 0z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M1850 10 c-10 -7 6 -10 55 -9 48 0 64 3 50 9 -27 12 -87 12 -105 0z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2572 8 c-9 -4 127 -7 302 -7 176 -1 316 2 312 7 -10 9 -590 10 -614 0 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4085 10 c-14 -6 2 -9 50 -9 48 0 64 3 50 9 -11 5 -33 9 -50 9 -16 0 - 39 - 4 - 50 - 9 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M4780 10 c-10 -6 42 -9 155 -9 101 1 160 4 145 9 -36 12 -282 12 - 300 0 z "
  }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M2068 3 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"
  }, ' ', ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M6938 3 c12 -2 32 -2 45 0 12 2 2 4 -23 4 -25 0 -35 -2 -22 -4z"
  }, ' ', ' ', ' '), ' ', ' ', ' '), ' ', ' '),
  category: 'widgets',
  keywords: ['tipping', 'tipping-page'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    dimension: {
      type: 'string',
      default: '520x600'
    },
    title: {
      type: 'string',
      default: 'Support my work'
    },
    description: {
      type: 'string',
      default: ''
    },
    currency: {
      type: 'string'
    },
    title_text_color: {
      type: 'string'
    },
    tipping_text: {
      type: 'string',
      default: 'Enter Tipping Amount'
    },
    tipping_text_color: {
      type: 'string'
    },
    redirect: {
      type: 'string'
    },
    description_color: {
      type: 'string'
    },
    button_text: {
      type: 'string',
      default: 'Tipping now'
    },
    button_text_color: {
      type: 'string'
    },
    button_color: {
      type: 'string',
      default: '#FE642E'
    },
    button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_text: {
      type: 'string',
      default: 'Continue'
    },
    continue_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    continue_button_color: {
      type: 'string',
      default: '#FE642E'
    },
    continue_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_text: {
      type: 'string',
      default: 'Previous'
    },
    previous_button_text_color: {
      type: 'string',
      default: '#FFF'
    },
    previous_button_color: {
      type: 'string',
      default: '#1d5aa3'
    },
    previous_button_color_hover: {
      type: 'string',
      default: '#FFF'
    },
    input_background: {
      type: 'string'
    },
    selected_amount_background: {
      type: 'string'
    },
    logo_id: {
      type: 'number'
    },
    background: {
      type: 'string'
    },
    background_color: {
      type: 'string'
    },
    background_id: {
      type: 'number'
    },
    value1_enabled: {
      type: 'boolean',
      default: true
    },
    value1_amount: {
      type: 'number',
      default: 1000
    },
    value1_currency: {
      type: 'string',
      default: 'SATS'
    },
    value1_icon: {
      type: 'string',
      default: 'fas fa-coffee'
    },
    value2_enabled: {
      type: 'boolean',
      default: true
    },
    value2_amount: {
      type: 'number',
      default: 2000
    },
    value2_currency: {
      type: 'string',
      default: 'SATS'
    },
    value2_icon: {
      type: 'string',
      default: 'fas fa-beer'
    },
    value3_enabled: {
      type: 'boolean',
      default: true
    },
    value3_amount: {
      type: 'number',
      default: 3000
    },
    value3_currency: {
      type: 'string',
      default: 'SATS'
    },
    value3_icon: {
      type: 'string',
      default: 'fas fa-cocktail'
    },
    display_name: {
      type: 'boolean',
      default: true
    },
    mandatory_name: {
      type: 'boolean',
      default: false
    },
    display_email: {
      type: 'boolean',
      default: true
    },
    mandatory_email: {
      type: 'boolean',
      default: false
    },
    display_address: {
      type: 'boolean',
      default: true
    },
    mandatory_address: {
      type: 'boolean',
      default: false
    },
    display_phone: {
      type: 'boolean',
      default: true
    },
    mandatory_phone: {
      type: 'boolean',
      default: false
    },
    display_message: {
      type: 'boolean',
      default: true
    },
    mandatory_message: {
      type: 'boolean',
      default: false
    },
    step1: {
      type: 'string',
      default: 'Pledge'
    },
    step2: {
      type: 'string',
      default: 'Info'
    },
    active_color: {
      type: 'string',
      default: '#808080'
    },
    inactive_color: {
      type: 'string',
      default: '#D3D3D3'
    },
    free_input: {
      type: 'boolean',
      default: true
    },
    show_icon: {
      type: 'boolean',
      default: true
    }
  },
  example: {},
  edit: props => {
    const {
      attributes: {
        dimension,
        background,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        continue_button_color_hover,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        previous_button_color_hover,
        selected_amount_background,
        description_color,
        redirect,
        background_color,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
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
        free_input,
        step1,
        step2,
        active_color,
        inactive_color,
        show_icon,
        className
      },
      setAttributes
    } = props;
    const backgroundMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return background_id ? select('core').getMedia(background_id) : undefined;
    }, [background_id]);
    const logoMedia = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["useSelect"])(select => {
      return logo_id ? select('core').getMedia(logo_id) : undefined;
    }, [logo_id]);
    const inspectorControls = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Panel"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "General",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: dimension,
      onChange: selectedItem => {
        setAttributes({
          dimension: selectedItem
        });
      },
      options: [{
        value: '520x600',
        label: '520x600'
      }]
    }), ' ', ' '), ' '), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      label: "Currency",
      value: currency,
      onChange: selectedItem => {
        setAttributes({
          currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    }), ' ', ' '), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display free input",
      help: "Do you want to display free input field?",
      checked: free_input,
      onChange: newvalue => {
        setAttributes({
          free_input: newvalue
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpaywall_gutenberg_wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Link to Thank You Page "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["URLInputButton"], {
      label: "Link to Thank You Page",
      url: redirect,
      onChange: value => setAttributes({
        redirect: value
      })
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Global",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      value: background_id,
      allowedTypes: ['image'],
      render: _ref => {
        let {
          open
        } = _ref;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: background_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, ' ', ' ', !background_id && 'Choose background image', ' ', ' ', ' ', !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ResponsiveWrapper"], {
          naturalWidth: backgroundMedia.media_details.width,
          naturalHeight: backgroundMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: backgroundMedia.source_url
        }), ' ', ' '), ' ', ' ');
      }
    }), ' ', ' '), " ", !!background_id && backgroundMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      title: "Replace background image",
      value: background_id,
      onSelect: el => {
        setAttributes({
          background_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref2 => {
        let {
          open
        } = _ref2;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, 'Replace background image');
      }
    })), " ", !!background_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
      onClick: el => {
        setAttributes({
          background_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, ' ', " ", 'Remove background image', " ", ' ', ' '), ' ', ' '), ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Background color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: background_color,
      onChangeComplete: value => setAttributes({
        background_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Header and footer background color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: background,
      onChangeComplete: value => setAttributes({
        background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Header",
      initialOpen: true
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "editor-post-featured-image"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      value: logo_id,
      allowedTypes: ['image'],
      render: _ref3 => {
        let {
          open
        } = _ref3;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: logo_id == 0 ? 'btcpaywall editor-post-featured-image__toggle' : 'btcpaywall editor-post-featured-image__preview',
          onClick: open
        }, ' ', " ", !logo_id && 'Choose an image', " ", !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ResponsiveWrapper"], {
          naturalWidth: logoMedia.media_details.width,
          naturalHeight: logoMedia.media_details.height
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: logoMedia.source_url
        }), ' ', ' '), ' ', ' ');
      }
    }), ' ', ' '), " ", !!logo_id && logoMedia && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      title: "Replace logo",
      value: logo_id,
      onSelect: el => {
        setAttributes({
          logo_id: el.id
        });
      },
      allowedTypes: ['image'],
      render: _ref4 => {
        let {
          open
        } = _ref4;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: "btcpaywall editor-post-featured-image__remove",
          onClick: open,
          isLarge: true
        }, ' ', 'Replace logo', ' ');
      }
    }), ' ', ' '), " ", !!logo_id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
      onClick: el => {
        setAttributes({
          logo_id: 0
        });
      },
      className: "btcpaywall editor-post-featured-image__remove",
      isLink: true,
      isDestructive: true
    }, ' ', " ", 'Remove logo', " ", ' ', ' '), ' ', ' '), ' ', ' '), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Title",
      help: "Enter title",
      onChange: content => {
        setAttributes({
          title: content
        });
      },
      value: title
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Title text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: title_text_color,
      onChangeComplete: value => setAttributes({
        title_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Step1",
      help: "Enter text for first tab in progress bar",
      onChange: content => {
        setAttributes({
          step1: content
        });
      },
      value: step1
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Background color for active step in progress bar ", ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: active_color,
      onChangeComplete: value => setAttributes({
        active_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Step2",
      help: "Enter text for second step in progress bar",
      onChange: content => {
        setAttributes({
          step2: content
        });
      },
      value: step2
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Background color for inactive step in progress bar ", ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: inactive_color,
      onChangeComplete: value => setAttributes({
        inactive_color: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Main",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Main text",
      help: "Enter tipping text",
      onChange: content => setAttributes({
        tipping_text: content
      }),
      value: tipping_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Main text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: tipping_text_color,
      onChangeComplete: value => setAttributes({
        tipping_text_color: value
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Primary color for amount", ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      title: "This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field.",
      class: "btcpaywall_helper_tip"
    })), ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: input_background,
      onChangeComplete: value => setAttributes({
        input_background: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, ' ', ' ', "Secondary color for amount", ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      title: "This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields.",
      class: "btcpaywall_helper_tip"
    })), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: selected_amount_background,
      onChangeComplete: value => setAttributes({
        selected_amount_background: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Footer"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          button_text: content
        });
      },
      value: button_text
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_color,
      onChangeComplete: value => setAttributes({
        button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "Button text color"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Button color on hover"), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_color_hover,
      onChangeComplete: value => setAttributes({
        button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Continue button",
      help: "Enter continue button text",
      onChange: content => {
        setAttributes({
          continue_button_text: content
        });
      },
      value: continue_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: continue_button_color,
      onChangeComplete: value => setAttributes({
        continue_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: button_text_color,
      onChangeComplete: value => setAttributes({
        continue_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Continue button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: continue_button_color_hover,
      onChangeComplete: value => setAttributes({
        continue_button_color_hover: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextareaControl"], {
      label: "Previous button",
      help: "Enter button text",
      onChange: content => {
        setAttributes({
          previous_button_text: content
        });
      },
      value: previous_button_text
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_color,
      onChangeComplete: value => setAttributes({
        previous_button_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button text color "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_text_color,
      onChangeComplete: value => setAttributes({
        previous_button_text_color: value.hex
      }),
      disableAlpha: true
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, " Previous button color on hover "), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: previous_button_color_hover,
      onChangeComplete: value => setAttributes({
        previous_button_color_hover: value.hex
      }),
      disableAlpha: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Fixed amount",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display icon",
      help: "Do you want to display icons?",
      checked: show_icon,
      onChange: value => {
        setAttributes({
          show_icon: value
        });
      }
    }), ' ', ' ', ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display value 1",
      help: "Do you want to display value 1?",
      checked: value1_enabled,
      onChange: newval => setAttributes({
        value1_enabled: newval
      })
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: value1_currency,
      onChange: selectedItem => {
        setAttributes({
          value1_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value1_amount: amount
        });
      },
      shiftStep: 10,
      value: value1_amount
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "FA Icon class",
      value: value1_icon,
      onChange: value => setAttributes({
        value1_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display value 2",
      help: "Do you want to display value 2?",
      checked: value2_enabled,
      onChange: value => {
        setAttributes({
          value2_enabled: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: value2_currency,
      onChange: selectedItem => {
        setAttributes({
          value2_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value2_amount: amount
        });
      },
      shiftStep: 10,
      value: value2_amount
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "FA Icon class",
      value: value2_icon,
      onChange: value => setAttributes({
        value2_icon: value
      })
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Display value 3",
      help: "Do you want to display value 3?",
      checked: value3_enabled,
      onChange: value => {
        setAttributes({
          value3_enabled: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["SelectControl"], {
      value: value3_currency,
      onChange: selectedItem => {
        setAttributes({
          value3_currency: selectedItem
        });
      },
      options: [{
        value: 'SATS',
        label: 'SATS'
      }, {
        value: 'BTC',
        label: 'BTC'
      }, {
        value: 'EUR',
        label: 'EUR'
      }, {
        value: 'USD',
        label: 'USD'
      }, {
        value: 'GBP',
        label: 'GBP'
      }]
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "btcpw_gutenberg_sel_num_control"
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["__experimentalNumberControl"], {
      isShiftStepEnabled: true,
      onChange: amount => {
        setAttributes({
          value3_amount: amount
        });
      },
      shiftStep: 10,
      value: value3_amount
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "FA Icon class",
      value: value3_icon,
      onChange: value => setAttributes({
        value3_icon: value
      })
    }), ' ', ' '), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: "Donor information",
      initialOpen: true
    }, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Full name",
      help: "Do you want to collect full name?",
      checked: display_name,
      onChange: value => {
        setAttributes({
          display_name: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_name,
      onChange: value => {
        setAttributes({
          mandatory_name: value
        });
      }
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Email",
      help: "Do you want to collect email?",
      checked: display_email,
      onChange: value => {
        setAttributes({
          display_email: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_email,
      onChange: value => {
        setAttributes({
          mandatory_email: value
        });
      }
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Address",
      help: "Do you want to collect address?",
      checked: display_address,
      onChange: value => {
        setAttributes({
          display_address: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_address,
      onChange: value => {
        setAttributes({
          mandatory_address: value
        });
      }
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Phone",
      checked: display_phone,
      help: "Do you want to collect phone?",
      onChange: value => {
        setAttributes({
          display_phone: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_phone,
      onChange: value => {
        setAttributes({
          mandatory_phone: value
        });
      }
    }), ' ', ' '), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], null, ' ', Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      label: "Message",
      help: "Do you want to collect message?",
      checked: display_message,
      onChange: value => {
        setAttributes({
          display_message: value
        });
      }
    }), " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["CheckboxControl"], {
      help: "Do you want make this field mandatory?",
      checked: mandatory_message,
      onChange: value => {
        setAttributes({
          mandatory_message: mandatory_message
        });
      }
    }), ' ', ' '), ' ', ' '), ' ', ' '), ' ', ' ');
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default.a, {
      block: "btcpaywall/gutenberg-tipping-page",
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
        button_color_hover,
        previous_button_color_hover,
        continue_button_color_hover,
        continue_button_color,
        continue_button_text,
        continue_button_text_color,
        previous_button_color,
        previous_button_text,
        previous_button_text_color,
        selected_amount_background,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
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
        free_input,
        step1,
        step2,
        active_color,
        inactive_color,
        show_icon,
        className
      }
    }), " ", inspectorControls, ' ', ' ')];
  },
  save: props => {
    return null;
  }
});

/***/ }),

/***/ "./blocks/index.js":
/*!*************************!*\
  !*** ./blocks/index.js ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_start_content__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/start_content */ "./blocks/blocks/start_content.js");
/* harmony import */ var _blocks_end_content__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/end_content */ "./blocks/blocks/end_content.js");
/* harmony import */ var _blocks_start_video__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./blocks/start_video */ "./blocks/blocks/start_video.js");
/* harmony import */ var _blocks_end_video__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./blocks/end_video */ "./blocks/blocks/end_video.js");
/* harmony import */ var _blocks_tipping_box__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/tipping_box */ "./blocks/blocks/tipping_box.js");
/* harmony import */ var _blocks_tipping_banner_wide__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/tipping_banner_wide */ "./blocks/blocks/tipping_banner_wide.js");
/* harmony import */ var _blocks_tipping_banner_high__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./blocks/tipping_banner_high */ "./blocks/blocks/tipping_banner_high.js");
/* harmony import */ var _blocks_tipping_page__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./blocks/tipping_page */ "./blocks/blocks/tipping_page.js");
/* harmony import */ var _blocks_tipping_list_shortcodes__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./blocks/tipping_list_shortcodes */ "./blocks/blocks/tipping_list_shortcodes.js");










/***/ }),

/***/ "@wordpress/api-fetch":
/*!**********************************!*\
  !*** external ["wp","apiFetch"] ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["apiFetch"]; }());

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

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/server-side-render":
/*!******************************************!*\
  !*** external ["wp","serverSideRender"] ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["serverSideRender"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map