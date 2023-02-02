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
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/src/js/opennode.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/js/opennode.js":
/*!***********************************!*\
  !*** ./assets/src/js/opennode.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  "use strict";

  $(document).ready(function () {
    var btcpw_invoice_id = null;
    var form_container = null;
    $("#btcpw_digital_download_form").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeFileInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $(".btcpw_digital_download").text();
      $(".btcpw_digital_download").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_generate_content_file_invoice_id",
          full_name: $("#btcpw_digital_download_customer_name").val(),
          email: $("#btcpw_digital_download_customer_email").val(),
          address: $("#btcpw_digital_download_customer_address").val(),
          phone: $("#btcpw_digital_download_customer_phone").val(),
          message: $("#btcpw_digital_download_customer_message").val()
        },
        success: function (response) {
          $(".btcpw_digital_download").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $("#btcpw_digital_download_customer_info").length ? $("#btcpw_digital_download_customer_info") : $("#btcpaywall_checkout_cart");
            btcpwShowOpenNodeFileInvoice(btcpw_invoice_id, form_container);
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
  });
  $(document).ready(function () {
    var btcpw_invoice_id = null;
    var form_container = null;
    $("#view_revenue_type, #post_revenue_type").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_pay__button").text();
      $("#btcpw_pay__button").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      var post_id = $("#btcpw_pay__button").data("post_id");
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_get_invoice_id",
          post_id: post_id,
          full_name: $("#btcpw_revenue_post_customer_name, #btcpw_revenue_view_customer_name, #btcpw_revenue_file_customer_name").val(),
          email: $("#btcpw_revenue_post_customer_email, #btcpw_revenue_view_customer_email, #btcpw_revenue_file_customer_email").val(),
          address: $("#btcpw_revenue_post_customer_address, #btcpw_revenue_view_customer_address, #btcpw_revenue_file_customer_address").val(),
          phone: $("#btcpw_revenue_post_customer_phone, #btcpw_revenue_view_customer_phone, #btcpw_revenue_file_customer_phone").val(),
          message: $("#btcpw_revenue_post_customer_message, #btcpw_revenue_view_customer_message, #btcpw_revenue_file_customer_message").val()
        },
        success: function (response) {
          $("#btcpw_pay__button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_revenue_post_container,.btcpw_revenue_view_container");
            btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
  });
  $(document).ready(function () {
    var btcpw_invoice_id = null;
    var form_container = null;
    var donor = null;
    $("#tipping_form_box").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_tipping__button").text();
      $("#btcpw_tipping__button").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      e.preventDefault();
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_tipping_currency").val(),
          amount: $("#btcpw_tipping_amount").val(),
          predefined_amount: $("input[type=radio][name=btcpw_tipping_default_amount]:checked").val(),
          type: "Tipping Box"
        },
        success: function (response) {
          $("#btcpw_tipping__button").html(text);

          if (response.success) {
            donor = "Type: Tipping Box" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_tipping_box_container");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_redirect_link").val());
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    $("#tipping_form_box_widget").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_tipping__button_btcpw_widget").text();
      $("#btcpw_tipping__button_btcpw_widget").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_tipping_currency_btcpw_widget").val(),
          amount: $("#btcpw_tipping_amount_btcpw_widget").val(),
          type: "Tipping Box Widget"
        },
        success: function (response) {
          $("#btcpw_tipping__button_btcpw_widget").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_widget.btcpw_tipping_box_container");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_redirect_link_btcpw_widget").val());
            donor = "Type: Tipping Box Widget" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    $("#page_tipping_form").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_page_tipping__button").text();
      $("#btcpw_page_tipping__button").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_page_tipping_currency").val(),
          amount: $("#btcpw_page_tipping_amount").val(),
          predefined_amount: $("input[type=radio][name=btcpw_page_tipping_default_amount]:checked").val(),
          name: $("#btcpw_page_tipping_donor_name").val(),
          email: $("#btcpw_page_tipping_donor_email").val(),
          address: $("#btcpw_page_tipping_donor_address").val(),
          phone: $("#btcpw_page_tipping_donor_phone").val(),
          message: $("#btcpw_page_tipping_donor_message").val(),
          type: "Tipping Page"
        },
        success: function (response) {
          $("#btcpw_page_tipping__button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_page_tipping_container");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_page_redirect_link").val());
            donor = "Type: Tipping Page" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    $("#skyscraper_tipping_high_form").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_skyscraper_tipping_high_button").text();
      $("#btcpw_skyscraper_tipping_high_button").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_skyscraper_tipping_high_currency").val(),
          amount: $("#btcpw_skyscraper_tipping_high_amount").val(),
          predefined_amount: $(" input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]:checked").val(),
          name: $("#btcpw_skyscraper_tipping_donor_name_high").val(),
          email: $("#btcpw_skyscraper_tipping_donor_email_high").val(),
          address: $("#btcpw_skyscraper_tipping_donor_address_high").val(),
          phone: $("#btcpw_skyscraper_tipping_donor_phone_high").val(),
          message: $("#btcpw_skyscraper_tipping_donor_message_high").val(),
          type: "Tipping Banner High"
        },
        success: function (response) {
          $("#btcpw_skyscraper_tipping_high_button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_skyscraper_banner.high");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_skyscraper_redirect_link_high").val());
            donor = "Type: Tipping Banner High" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    $("#btcpw_widget_skyscraper_tipping_form_high").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").text();
      $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_widget_btcpw_skyscraper_tipping_currency_high").val(),
          amount: $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val(),
          predefined_amount: $("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]:checked").val(),
          name: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_name_high").val(),
          email: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_email_high").val(),
          address: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_address_high").val(),
          phone: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_high").val(),
          message: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_message_high").val(),
          type: "Tipping Banner High Widget"
        },
        success: function (response) {
          $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_widget.btcpw_skyscraper_banner.high");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_widget_btcpw_skyscraper_redirect_link_high").val());
            donor = "Type: Tipping Banner High Widget" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    $("#skyscraper_tipping_wide_form").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_skyscraper_tipping_wide_button").text();
      $("#btcpw_skyscraper_tipping_wide_button").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_skyscraper_tipping_wide_currency").val(),
          amount: $("#btcpw_skyscraper_tipping_wide_amount").val(),
          predefined_amount: $("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]:checked").val(),
          name: $("#btcpw_skyscraper_tipping_donor_name_wide").val(),
          email: $("#btcpw_skyscraper_tipping_donor_email_wide").val(),
          address: $("#btcpw_skyscraper_tipping_donor_address_wide").val(),
          phone: $("#btcpw_skyscraper_tipping_donor_phone_wide").val(),
          message: $("#btcpw_skyscraper_tipping_donor_message_wide").val(),
          type: "Tipping Banner Wide"
        },
        success: function (response) {
          $("#btcpw_skyscraper_tipping_wide_button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_skyscraper_banner.wide");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_skyscraper_redirect_link_wide").val());
            donor = "Type: Tipping Banner Wide" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    $("#btcpw_widget_skyscraper_tipping_form_wide").submit(function (e) {
      e.preventDefault();

      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }

      var text = $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").text();
      $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(`<span class="tipping-border" role="status" aria-hidden="true"></span>`);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_widget_btcpw_skyscraper_tipping_currency_wide").val(),
          amount: $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val(),
          predefined_amount: $("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]:checked").val(),
          name: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_name_wide").val(),
          email: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_email_wide").val(),
          address: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_address_wide").val(),
          phone: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_wide").val(),
          message: $("#btcpw_widget_btcpw_skyscraper_tipping_donor_message_wide").val(),
          type: "Tipping Banner Wide Widget"
        },
        success: function (response) {
          $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_widget.btcpw_skyscraper_banner.wide");
            btcpwShowTippingOpenNodeInvoice(btcpw_invoice_id, form_container, $("#btcpw_widget_btcpw_skyscraper_redirect_link_wide").val());
            donor = "Type: Tipping Banner Wide Widget" + "\n" + "Url: " + window.location.href + "\n" + response.data.donor;
          }
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
  });

  function btcpaywall_monitor_invoice(id) {
    return $.ajax({
      url: "/wp-admin/admin-ajax.php",
      method: "GET",
      data: {
        action: "btcpw_opennode_monitor_invoice_status",
        invoice_id: id
      }
    });
  }

  function btcpwShowOpenNodeFileInvoice(invoice_id, form_container) {
    setInterval(() => {
      btcpaywall_monitor_invoice(invoice_id).done(function (response) {
        if (response.data.status === "paid") {
          $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
              action: "btcpw_paid_content_file_invoice",
              invoice_id: invoice_id
            },
            success: function (response) {
              if (response.success) {
                /* notifyAdmin(
                  response.data.notify + 'Url:' + window.location.href
                ) */
                location.replace(payment.success_url);
              }
            },
            error: function (error) {
              console.error(error);
            }
          });
        }
      });
    }, 10000);
    var redirect = "https://checkout.opennode.com/" + invoice_id;
    form_container.append(`<div id=opennode_modal><iframe title=OpenNode height=700px width=400px src=${redirect}> </iframe></div>`);
    $("#opennode_modal").dialog({
      autoOpen: true,
      modal: true,
      resizable: false,
      width: "auto",
      height: 700,
      buttons: {
        Close: function () {
          $("#opennode_modal").remove();
        }
      }
    });
  }

  function btcpwShowOpenNodeInvoice(invoice_id, form_container) {
    let redirectTo = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
    setInterval(() => {
      btcpaywall_monitor_invoice(invoice_id).done(function (response) {
        if (response.data.status === "paid") {
          $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
              action: "opennode_paid_invoice",
              id: invoice_id
            },
            success: function (response) {
              if (response.success) {
                /* notifyAdmin(
                  response.data.notify + 'Url:' + window.location.href
                ) */
                if (/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(redirectTo)) {
                  location.replace(redirectTo);
                } else {
                  location.reload(true);
                }
              }
            },
            error: function (error) {
              console.error(error);
            }
          });
        }
      });
    }, 10000);
    var redirect = "https://checkout.opennode.com/" + invoice_id;
    form_container.append(`<div id=opennode_modal><iframe title=OpenNode height=700px width=400px src=${redirect}> </iframe></div>`);
    $("#opennode_modal").dialog({
      autoOpen: true,
      modal: true,
      resizable: false,
      width: "auto",
      height: 700,
      buttons: {
        Close: function () {
          $("#opennode_modal").remove();
        }
      }
    });
  }

  function btcpwShowTippingOpenNodeInvoice(invoice_id, form_container) {
    let redirectTo = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
    setInterval(() => {
      btcpaywall_monitor_invoice(invoice_id).done(function (response) {
        if (response.data.status === "paid") {
          $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
              action: "opennode_tipping_paid_invoice",
              id: invoice_id
            },
            success: function (response) {
              if (response.success) {
                /* notifyAdmin(
                  response.data.notify + 'Url:' + window.location.href
                ) */
                if (/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(redirectTo)) {
                  location.replace(redirectTo);
                } else {
                  location.reload(true);
                }
              }
            },
            error: function (error) {
              console.error(error);
            }
          });
        }
      });
    }, 10000);
    var redirect = "https://checkout.opennode.com/" + invoice_id;
    form_container.append(`<div id=opennode_modal><iframe title=OpenNode height=700px width=400px src=${redirect}> </iframe></div>`);
    $("#opennode_modal").dialog({
      autoOpen: true,
      modal: true,
      resizable: false,
      width: "auto",
      height: 700,
      buttons: {
        Close: function () {
          $("#opennode_modal").remove();
        }
      }
    });
  }
})(jQuery);

/***/ })

/******/ });
//# sourceMappingURL=opennode.js.map