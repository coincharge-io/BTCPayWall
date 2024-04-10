(function($) {
  "use strict";
  $(document).ready(function() {
    var btcpw_invoice_id = null;
    var form_container = null;
    $("#btcpw_digital_download_form").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeFileInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $(".btcpw_digital_download").text();
      $(".btcpw_digital_download").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_generate_content_file_invoice_id",
          full_name: $("#btcpw_digital_download_customer_name").val(),
          email: $("#btcpw_digital_download_customer_email").val(),
          address: $("#btcpw_digital_download_customer_address").val(),
          phone: $("#btcpw_digital_download_customer_phone").val(),
          message: $("#btcpw_digital_download_customer_message").val(),
        },
        success: function(response) {
          $(".btcpw_digital_download").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $("#btcpw_digital_download_customer_info").length
              ? $("#btcpw_digital_download_customer_info")
              : $("#btcpaywall_checkout_cart");
            btcpwShowOpenNodeFileInvoice(btcpw_invoice_id, form_container);
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
    if (getCookie("btcpw_donation_initiated_" + payment.post_id)) {
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_paid_tipping",
          invoice_id: getCookie("btcpw_donation_initiated_" + payment.post_id),
        },
        success: function(response) {
          if (response.success) {
            location.reload();
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    }
    if (getCookie("btcpw_initiated_" + payment.post_id)) {
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_check_order_after_expiration",
          order_id: getCookie("btcpw_initiated_" + payment.post_id),
        },
        success: function(response) {
          if (response.success) {
            location.reload();
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    }
    if (getCookie("btcpaywall_initiated_purchase")) {
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_paid_content_file_invoice",
          invoice_id: getCookie("btcpaywall_initiated_purchase"),
        },
        success: function(response) {
          if (response.success) {
            location.reload();
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    }
  });
  $(document).ready(function() {
    var btcpw_invoice_id = null;
    var form_container = null;

    $("#view_revenue_type, #post_revenue_type").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $("#btcpw_pay__button").text();
      $("#btcpw_pay__button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      var post_id = $("#btcpw_pay__button").data("post_id");

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_get_invoice_id",
          post_id: post_id,
          full_name: $(
            "#btcpw_revenue_post_customer_name, #btcpw_revenue_view_customer_name, #btcpw_revenue_file_customer_name"
          ).val(),
          email: $(
            "#btcpw_revenue_post_customer_email, #btcpw_revenue_view_customer_email, #btcpw_revenue_file_customer_email"
          ).val(),
          address: $(
            "#btcpw_revenue_post_customer_address, #btcpw_revenue_view_customer_address, #btcpw_revenue_file_customer_address"
          ).val(),
          phone: $(
            "#btcpw_revenue_post_customer_phone, #btcpw_revenue_view_customer_phone, #btcpw_revenue_file_customer_phone"
          ).val(),
          message: $(
            "#btcpw_revenue_post_customer_message, #btcpw_revenue_view_customer_message, #btcpw_revenue_file_customer_message"
          ).val(),
        },
        success: function(response) {
          $("#btcpw_pay__button").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(
              ".btcpw_revenue_post_container,.btcpw_revenue_view_container"
            );
            btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
  });
  $(document).ready(function() {
    var btcpw_invoice_id = null;
    var form_container = null;
    var donor = null;
    $("#tipping_form_box").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $("#btcpw_tipping__button").text();
      $("#btcpw_tipping__button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      e.preventDefault();

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_tipping_currency").val(),
          amount: $("#btcpw_tipping_amount").val(),
          predefined_amount: $(
            "input[type=radio][name=btcpw_tipping_default_amount]:checked"
          ).val(),
          type: "Tipping Box",
        },
        success: function(response) {
          $("#btcpw_tipping__button").html(text);
          if (response.success) {
            donor =
              "Type: Tipping Box" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_tipping_box_container");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_redirect_link").val()
            );
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });

    $("#tipping_form_box_widget").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $("#btcpw_tipping__button_btcpw_widget").text();
      $("#btcpw_tipping__button_btcpw_widget").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_tipping_currency_btcpw_widget").val(),
          amount: $("#btcpw_tipping_amount_btcpw_widget").val(),
          type: "Tipping Box Widget",
        },
        success: function(response) {
          $("#btcpw_tipping__button_btcpw_widget").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_widget.btcpw_tipping_box_container");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_redirect_link_btcpw_widget").val()
            );
            donor =
              "Type: Tipping Box Widget" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });

    $("#page_tipping_form").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $("#btcpw_page_tipping__button").text();
      $("#btcpw_page_tipping__button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_page_tipping_currency").val(),
          amount: $("#btcpw_page_tipping_amount").val(),
          predefined_amount: $(
            "input[type=radio][name=btcpw_page_tipping_default_amount]:checked"
          ).val(),
          name: $("#btcpw_page_tipping_donor_name").val(),
          email: $("#btcpw_page_tipping_donor_email").val(),
          address: $("#btcpw_page_tipping_donor_address").val(),
          phone: $("#btcpw_page_tipping_donor_phone").val(),
          message: $("#btcpw_page_tipping_donor_message").val(),
          type: "Tipping Page",
        },
        success: function(response) {
          $("#btcpw_page_tipping__button").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_page_tipping_container");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_page_redirect_link").val()
            );
            donor =
              "Type: Tipping Page" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
    $("#skyscraper_tipping_high_form").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $("#btcpw_skyscraper_tipping_high_button").text();
      $("#btcpw_skyscraper_tipping_high_button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_skyscraper_tipping_high_currency").val(),
          amount: $("#btcpw_skyscraper_tipping_high_amount").val(),
          predefined_amount: $(
            " input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]:checked"
          ).val(),
          name: $("#btcpw_skyscraper_tipping_donor_name_high").val(),
          email: $("#btcpw_skyscraper_tipping_donor_email_high").val(),
          address: $("#btcpw_skyscraper_tipping_donor_address_high").val(),
          phone: $("#btcpw_skyscraper_tipping_donor_phone_high").val(),
          message: $("#btcpw_skyscraper_tipping_donor_message_high").val(),
          type: "Tipping Banner High",
        },
        success: function(response) {
          $("#btcpw_skyscraper_tipping_high_button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_skyscraper_banner.high");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_skyscraper_redirect_link_high").val()
            );
            donor =
              "Type: Tipping Banner High" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });

    $("#btcpw_widget_skyscraper_tipping_form_high").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $(
        "#btcpw_widget_btcpw_skyscraper_tipping__button_high"
      ).text();
      $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_currency_high"
          ).val(),
          amount: $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val(),
          predefined_amount: $(
            "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]:checked"
          ).val(),
          name: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_name_high"
          ).val(),
          email: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_email_high"
          ).val(),
          address: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_address_high"
          ).val(),
          phone: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_high"
          ).val(),
          message: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_message_high"
          ).val(),
          type: "Tipping Banner High Widget",
        },
        success: function(response) {
          $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_widget.btcpw_skyscraper_banner.high");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_widget_btcpw_skyscraper_redirect_link_high").val()
            );
            donor =
              "Type: Tipping Banner High Widget" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
    $("#skyscraper_tipping_wide_form").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $("#btcpw_skyscraper_tipping_wide_button").text();
      $("#btcpw_skyscraper_tipping_wide_button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_skyscraper_tipping_wide_currency").val(),
          amount: $("#btcpw_skyscraper_tipping_wide_amount").val(),
          predefined_amount: $(
            "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]:checked"
          ).val(),
          name: $("#btcpw_skyscraper_tipping_donor_name_wide").val(),
          email: $("#btcpw_skyscraper_tipping_donor_email_wide").val(),
          address: $("#btcpw_skyscraper_tipping_donor_address_wide").val(),
          phone: $("#btcpw_skyscraper_tipping_donor_phone_wide").val(),
          message: $("#btcpw_skyscraper_tipping_donor_message_wide").val(),
          type: "Tipping Banner Wide",
        },
        success: function(response) {
          $("#btcpw_skyscraper_tipping_wide_button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_skyscraper_banner.wide");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_skyscraper_redirect_link_wide").val()
            );
            donor =
              "Type: Tipping Banner Wide" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
    $("#btcpw_widget_skyscraper_tipping_form_wide").submit(function(e) {
      e.preventDefault();
      if (btcpw_invoice_id && form_container) {
        btcpwShowOpenNodeInvoice(btcpw_invoice_id, form_container);
        return;
      }
      var text = $(
        "#btcpw_widget_btcpw_skyscraper_tipping__button_wide"
      ).text();
      $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_currency_wide"
          ).val(),
          amount: $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val(),
          predefined_amount: $(
            "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]:checked"
          ).val(),
          name: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_name_wide"
          ).val(),
          email: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_email_wide"
          ).val(),
          address: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_address_wide"
          ).val(),
          phone: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_wide"
          ).val(),
          message: $(
            "#btcpw_widget_btcpw_skyscraper_tipping_donor_message_wide"
          ).val(),
          type: "Tipping Banner Wide Widget",
        },
        success: function(response) {
          $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            form_container = $(".btcpw_widget.btcpw_skyscraper_banner.wide");
            btcpwShowTippingOpenNodeInvoice(
              btcpw_invoice_id,
              form_container,
              $("#btcpw_widget_btcpw_skyscraper_redirect_link_wide").val()
            );
            donor =
              "Type: Tipping Banner Wide Widget" +
              "\n" +
              "Url: " +
              window.location.href +
              "\n" +
              response.data.donor;
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
  });
  function btcpaywall_monitor_invoice(id) {
    return $.ajax({
      url: "/wp-admin/admin-ajax.php",
      method: "GET",
      data: {
        action: "btcpw_opennode_monitor_invoice_status",
        invoice_id: id,
      },
    });
  }
  function btcpwShowOpenNodeFileInvoice(invoice_id, form_container) {
    let check = setInterval(() => {
      btcpaywall_monitor_invoice(invoice_id).done(function(response) {
        if (response.data.status === "paid") {
          clearInterval(check);
          $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
              action: "btcpw_paid_content_file_invoice",
              invoice_id: invoice_id,
            },
            success: function(response) {
              if (response.success) {
                /* notifyAdmin(
                  response.data.notify + 'Url:' + window.location.href
                ) */
                location.replace(payment.success_url);
              }
            },
            error: function(error) {
              console.log(error.message);
            },
          });
        }
      });
    }, 10000);

    var redirect = "https://checkout.opennode.com/" + invoice_id;
    location.replace(redirect);

    /*form_container.append(
      `<div id=opennode_modal><iframe title=OpenNode height=700px width=400px src=${redirect}> </iframe></div>`
    );
    $("#opennode_modal").dialog({
      autoOpen: true,
      modal: true,
      resizable: false,
      width: "auto",
      height: 700,
      buttons: {
        Close: function() {
          $("#opennode_modal").remove();
        },
      },
    });*/
  }
  function btcpwShowOpenNodeInvoice(
    invoice_id,
    form_container,
    redirectTo = null
  ) {
    let check = setInterval(() => {
      btcpaywall_monitor_invoice(invoice_id).done(function(response) {
        if (response.data.status === "paid") {
          clearInterval(check);
          $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
              action: "opennode_paid_invoice",
              id: invoice_id,
            },
            success: function(response) {
              if (response.success) {
                /* notifyAdmin(
                  response.data.notify + 'Url:' + window.location.href
                ) */

                if (
                  /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(
                    redirectTo
                  )
                ) {
                  location.replace(redirectTo);
                } else {
                  location.reload(true);
                }
              }
            },
            error: function(error) {
              console.log(error.message);
            },
          });
        }
      });
    }, 10000);

    var redirect = "https://checkout.opennode.com/" + invoice_id;
    location.replace(redirect);

    /*form_container.append(
      `<div id=opennode_modal><iframe title=OpenNode height=700px width=400px src=${redirect}> </iframe></div>`
    );
    $("#opennode_modal").dialog({
      autoOpen: true,
      modal: true,
      resizable: false,
      width: "auto",
      height: 700,
      buttons: {
        Close: function() {
          $("#opennode_modal").remove();
        },
      },
    });*/
  }
  function btcpwShowTippingOpenNodeInvoice(
    invoice_id,
    form_container,
    redirectTo = null
  ) {
    let check = setInterval(() => {
      btcpaywall_monitor_invoice(invoice_id).done(function(response) {
        if (response.data.status === "paid") {
          clearInterval(check);
          $.ajax({
            url: "/wp-admin/admin-ajax.php",
            method: "POST",
            data: {
              action: "opennode_tipping_paid_invoice",
              id: invoice_id,
            },
            success: function(response) {
              if (response.success) {
                /* notifyAdmin(
                  response.data.notify + 'Url:' + window.location.href
                ) */

                if (
                  /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(
                    redirectTo
                  )
                ) {
                  location.replace(redirectTo);
                } else {
                  location.reload(true);
                }
              }
            },
            error: function(error) {
              console.log(error.message);
            },
          });
        }
      });
    }, 10000);

    var redirect = "https://checkout.opennode.com/" + invoice_id;
    location.replace(redirect);

    /*form_container.append(
  `<div id=opennode_modal><iframe title=OpenNode height=700px width=400px src=${redirect}> </iframe></div>`
);
$("#opennode_modal").dialog({
  autoOpen: true,
  modal: true,
  resizable: false,
  width: "auto",
  height: 700,
  buttons: {
    Close: function() {
      $("#opennode_modal").remove();
    },
  },
});*/
  }
  function getCookie(name) {
    const cookies = document.cookie.split(";");
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith(name + "=")) {
        return cookie.substring(name.length + 1);
      }
    }
    return null;
  }
})(jQuery);
