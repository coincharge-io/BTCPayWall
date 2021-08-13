(function ($) {
  "use strict";
  $(document).ready(function () {
    var btcpw_invoice_id = null;
    var btcpw_order_id = null;
    var amount;

    $("#btcpw_pay__button").click(function () {
      $(".btcpw_pay__loading p.loading").addClass("spinner");
      var post_id = $(this).data("post_id");
      if (btcpw_invoice_id && btcpw_order_id) {
        btcpwShowInvoice(btcpw_invoice_id, btcpw_order_id);
        return;
      }

      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "GET",
        data: {
          action: "btcpw_get_invoice_id",
          post_id: post_id,
        },
        success: function (response) {
          $(".btcpw_pay__loading p.loading").removeClass("spinner");
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            btcpw_order_id = response.data.order_id;
            amount = response.data.amount;
            btcpwShowInvoice(btcpw_invoice_id, btcpw_order_id, amount);
          } else {
            console.error(response);
          }
        },
      });
    });
  });

  function btcpwShowInvoice(invoice_id, order_id, amount) {
    btcpay.onModalReceiveMessage(function (event) {
      if (event.data.status === "complete") {
        $.ajax({
          url: "/wp-admin/admin-ajax.php",
          method: "POST",
          data: {
            action: "btcpw_paid_invoice",
            invoice_id: invoice_id,
            order_id: order_id,
            amount: amount,
          },
          success: function (response) {
            if (response.success) {
              notifyAdmin(response.data.notify + "Url:" + window.location.href);
              location.reload(true);
            } else {
              console.error(response);
            }
          },
        });
      }
    });

    btcpay.showInvoice(invoice_id);
  }

  $(document).ready(function () {
    var btcpw_invoice_id = null;
    var donor;
    $("#tipping_form_box").submit(function (e) {
      var text = $("#btcpw_tipping__button").text();
      $("#btcpw_tipping__button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      e.preventDefault();
      if (btcpw_invoice_id) {
        btcpwShowDonationBoxInvoice(btcpw_invoice_id);
        return;
      }
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
        },
        success: function (response) {
          $("#btcpw_tipping__button").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            donor =
              response.data.donor +
              "Type: Tipping Box" +
              "\n" +
              "Url: " +
              window.location.href;
            btcpwShowDonationBoxInvoice(
              btcpw_invoice_id,
              donor,
              $("#btcpw_redirect_link").val()
            );
          } else {
            console.error(response);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });

    $("#tipping_form_box_widget").submit(function (e) {
      e.preventDefault();
      var text = $("#btcpw_tipping__button_btcpw_widget").text();
      $("#btcpw_tipping__button_btcpw_widget").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      if (btcpw_invoice_id) {
        btcpwShowDonationBoxInvoice(btcpw_invoice_id);
        return;
      }
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_tipping_currency_btcpw_widget").val(),
          amount: $("#btcpw_tipping_amount_btcpw_widget").val(),
        },
        success: function (response) {
          $("#btcpw_tipping__button_btcpw_widget").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            donor =
              response.data.donor +
              "Type: Tipping Box Widget" +
              "\n" +
              "Url: " +
              window.location.href;
            btcpwShowDonationBoxInvoice(
              btcpw_invoice_id,
              donor,
              $("#btcpw_redirect_link_btcpw_widget").val()
            );
          } else {
            console.error(response);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });

    $("#skyscraper_tipping_form").submit(function (e) {
      e.preventDefault();
      var text = $("#btcpw_skyscraper_tipping__button").text();
      $("#btcpw_skyscraper_tipping__button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      if (btcpw_invoice_id) {
        btcpwShowDonationBannerInvoice(btcpw_invoice_id);
        return;
      }
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_tipping",
          currency: $("#btcpw_skyscraper_tipping_currency").val(),
          amount: $("#btcpw_skyscraper_tipping_amount").val(),
          predefined_amount: $(
            "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]:checked, input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]:checked"
          ).val(),
          name: $("#btcpw_skyscraper_tipping_donor_name").val(),
          email: $("#btcpw_skyscraper_tipping_donor_email").val(),
          address: $("#btcpw_skyscraper_tipping_donor_address").val(),
          phone: $("#btcpw_skyscraper_tipping_donor_phone").val(),
          message: $("#btcpw_skyscraper_tipping_donor_message").val(),
        },
        success: function (response) {
          $("#btcpw_skyscraper_tipping__button").html(text);

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            donor =
              response.data.donor +
              "Type: Tipping Banner" +
              "\n" +
              "Url: " +
              window.location.href;
            btcpwShowDonationBannerInvoice(
              btcpw_invoice_id,
              donor,
              $("#btcpw_skyscraper_redirect_link_wide, #btcpw_skyscraper_redirect_link_high").val()
            );
          } else {
            console.error(response);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });

    $("#page_tipping_form").submit(function (e) {
      e.preventDefault();
      var text = $("#btcpw_page_tipping__button").text();
      $("#btcpw_page_tipping__button").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      if (btcpw_invoice_id) {
        btcpwShowDonationBannerInvoice(btcpw_invoice_id);
        return;
      }
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
        },
        success: function (response) {
          $("#btcpw_page_tipping__button").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            donor =
              response.data.donor +
              "Type: Tipping Page" +
              "\n" +
              "Url: " +
              window.location.href;
            btcpwShowDonationBannerInvoice(
              btcpw_invoice_id,
              donor,
              $("#btcpw_page_redirect_link").val()
            );
          } else {
            console.error(response);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });

    $("#btcpw_widget_skyscraper_tipping_form_high").submit(function (e) {
      e.preventDefault();
      var text = $(
        "#btcpw_widget_btcpw_skyscraper_tipping__button_high"
      ).text();
      $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );

      if (btcpw_invoice_id) {
        btcpwShowDonationBannerInvoice(btcpw_invoice_id);
        return;
      }
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
        },
        success: function (response) {
          $("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            donor =
              response.data.donor +
              "Type: Tipping Banner High Widget" +
              "\n" +
              "Url: " +
              window.location.href;
            btcpwShowDonationBannerInvoice(
              btcpw_invoice_id,
              donor,
              $("#btcpw_widget_btcpw_skyscraper_redirect_link_high").val()
            );
          } else {
            console.error(response);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });

    $("#btcpw_widget_skyscraper_tipping_form_wide").submit(function (e) {
      e.preventDefault();
      var text = $(
        "#btcpw_widget_btcpw_skyscraper_tipping__button_wide"
      ).text();
      $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      );
      if (btcpw_invoice_id) {
        btcpwShowDonationBannerInvoice(btcpw_invoice_id);
        return;
      }
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
        },
        success: function (response) {
          $("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(text);
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id;
            donor =
              response.data.donor +
              "Type: Tipping Banner Wide Widget" +
              "\n" +
              "Url: " +
              window.location.href;
            btcpwShowDonationBannerInvoice(
              btcpw_invoice_id,
              donor,
              $("#btcpw_widget_btcpw_skyscraper_redirect_link_wide").val()
            );
          } else {
            console.error(response);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  });
  function btcpwShowDonationBoxInvoice(invoice_id, donor, redirect) {
    btcpay.onModalReceiveMessage(function (event) {
      if (event.data.status === "complete") {
        notifyAdmin(donor)
        //(redirect.is(":empty")? location.reload(true): location.replace(redirect));
        !redirect? location.reload(true): location.replace(redirect);
      }
    });

    btcpay.showInvoice(invoice_id);
  }

  function btcpwShowDonationBannerInvoice(invoice_id, donor, redirect) {
    btcpay.onModalReceiveMessage(function (event) {
      if (event.data.status === "complete") {
        notifyAdmin(donor)
        !redirect? location.reload(true): location.replace(redirect)
        
      }
    });

    btcpay.showInvoice(invoice_id);
  }
  function notifyAdmin(donor_info) {
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      method: "POST",
      data: {
        action: "btcpw_notify_admin",
        donor_info: donor_info,
      },
    });
  }
  $(document).ready(function () {
    $("#btcpw_tipping_currency").change(function () {
      var stepValue =
        $(this).val() === "BTC"
          ? "0.00000001"
          : $(this).val() === "SATS"
          ? "1"
          : "0.50";
      $("#btcpw_tipping_amount").attr({
        step: stepValue,
        value: parseInt($("#btcpw_tipping_amount").val()),
      });
    });
  });
  $(document).ready(function () {
    var eur, usd, sats;
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      method: "GET",
      data: {
        action: "btcpw_convert_currencies",
      },
      success: function (response) {
        if (response.success) {
          eur = response["data"]["eur"]["value"];
          usd = response["data"]["usd"]["value"];
          sats = response["data"]["sats"]["value"];
        } else {
          console.error(response);
        }
      },
    });
    $("#btcpw_tipping_amount").on("input", function () {
      var currency = $("#btcpw_tipping_currency").val();
      var amount = $(this).val();
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats);
      $("#btcpw_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });

    $("#btcpw_tipping_amount_btcpw_widget").on("input", function () {
      var currency = $("#btcpw_tipping_currency_btcpw_widget").val();
      var amount = $(this).val();
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats);
      $("#btcpw_converted_amount_btcpw_widget")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_converted_currency_btcpw_widget")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });

    $("#btcpw_page_tipping_amount").on("input", function () {
      var currency = $("#btcpw_page_tipping_currency").val();
      var amount = $(this).val();
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats);
      $("#btcpw_page_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_page_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });

    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on(
      "input",
      function () {
        var currency = $(
          "#btcpw_widget_btcpw_skyscraper_tipping_currency_high"
        ).val();
        var amount = $(this).val();
        var converted = fiat_to_crypto(currency, amount, usd, eur, sats);
        $("#btcpw_widget_btcpw_skyscraper_converted_amount_high")
          .attr("readonly", false)
          .val(fiat_to_crypto(currency, amount, usd, eur, sats))
          .attr("readonly", true);
        $("#btcpw_widget_btcpw_skyscraper_converted_currency_high")
          .attr("readonly", false)
          .val(get_currency(currency))
          .attr("readonly", true);
      }
    );

    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on(
      "input",
      function () {
        var currency = $(
          "#btcpw_widget_btcpw_skyscraper_tipping_currency_wide"
        ).val();
        var amount = $(this).val();
        var converted = fiat_to_crypto(currency, amount, usd, eur, sats);
        $("#btcpw_widget_btcpw_skyscraper_converted_amount_wide")
          .attr("readonly", false)
          .val(fiat_to_crypto(currency, amount, usd, eur, sats))
          .attr("readonly", true);
        $("#btcpw_widget_btcpw_skyscraper_converted_currency_wide")
          .attr("readonly", false)
          .val(get_currency(currency))
          .attr("readonly", true);
      }
    );
    $("#btcpw_skyscraper_tipping_amount").on("input", function () {
      var currency = $("#btcpw_skyscraper_tipping_currency").val();
      var amount = $(this).val();
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats);
      $("#btcpw_skyscraper_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_skyscraper_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });
    $("#value_1, #value_2, #value_3").change(function () {
      if ($(this).is(":checked")) {
        var predefined = $(this).val().split(" ");
        var converted_icon = fiat_to_crypto(
          predefined[1],
          predefined[0],
          usd,
          eur,
          sats
        );
        var converted_icon_amount =
          fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
          " " +
          get_currency(predefined[1]);
        $("#btcpw_skyscraper_converted_amount")
          .attr("readonly", false)
          .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
          .attr("readonly", true);
        $("#btcpw_skyscraper_converted_currency")
          .attr("readonly", false)
          .val(get_currency(predefined[1]))
          .attr("readonly", true);
      }
    });
    $(
      ".btcpw_page_amount_value_1, .btcpw_page_amount_value_2, .btcpw_page_amount_value_3"
    ).click(function () {
      switch ($(this)[0].className) {
        case "btcpw_page_amount_value_1":
          $(".btcpw_page_amount_value_2").removeClass("selected");
          $(".btcpw_page_amount_value_3").removeClass("selected");
          break;
        case "btcpw_page_amount_value_2":
          $(".btcpw_page_amount_value_1").removeClass("selected");
          $(".btcpw_page_amount_value_3").removeClass("selected");
          break;
        case "btcpw_page_amount_value_3":
          $(".btcpw_page_amount_value_1").removeClass("selected");
          $(".btcpw_page_amount_value_2").removeClass("selected");
          break;
        default:
          $(".btcpw_page_amount_value_1").removeClass("selected");
          $(".btcpw_page_amount_value_2").removeClass("selected");
          $(".btcpw_page_amount_value_3").removeClass("selected");
      }
      $(this).children().find("input:radio").prop("checked", true).change();
      if ($(this).children().find("input:radio").is(":checked")) {
        $(this).toggleClass("selected");
      }
      var predefined = $(this).children().find("input:radio").val().split(" ");
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      );
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        " " +
        get_currency(predefined[1]);
      $("#btcpw_page_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_page_converted_currency")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });

    $(
      ".btcpw_widget.btcpw_skyscraper_amount_value_1.high, .btcpw_widget.btcpw_skyscraper_amount_value_2.high, .btcpw_widget.btcpw_skyscraper_amount_value_3.high"
    ).click(function () {
      switch ($(this)[0].className) {
        case "btcpw_widget.btcpw_skyscraper_amount_value_1.high":
          $(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass(
            "selected"
          );
          break;
        case "btcpw_widget.btcpw_skyscraper_amount_value_2.high":
          $(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass(
            "selected"
          );
          break;
        case "btcpw_widget.btcpw_skyscraper_amount_value_3.high":
          $(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass(
            "selected"
          );
          break;
        default:
          $(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass(
            "selected"
          );
      }
      $(this).children().find("input:radio").prop("checked", true).change();
      if ($(this).children().find("input:radio").is(":checked")) {
        $(this).toggleClass("selected");
      }
      var predefined = $(this).children().find("input:radio").val().split(" ");
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      );
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        " " +
        get_currency(predefined[1]);
      $("#btcpw_widget_btcpw_skyscraper_converted_amount_high")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_widget_btcpw_skyscraper_converted_currency_high")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });

    $(
      ".btcpw_widget.btcpw_skyscraper_amount_value_1.wide, .btcpw_widget.btcpw_skyscraper_amount_value_2.wide, .btcpw_widget.btcpw_skyscraper_amount_value_3.wide"
    ).click(function () {
      switch ($(this)[0].className) {
        case "btcpw_widget.btcpw_skyscraper_amount_value_1.wide":
          $(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass(
            "selected"
          );
          break;
        case "btcpw_widget.btcpw_skyscraper_amount_value_2.wide":
          $(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass(
            "selected"
          );
          break;
        case "btcpw_widget.btcpw_skyscraper_amount_value_3.wide":
          $(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass(
            "selected"
          );
          break;
        default:
          $(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass(
            "selected"
          );
          $(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass(
            "selected"
          );
      }
      $(this).children().find("input:radio").prop("checked", true).change();
      if ($(this).children().find("input:radio").is(":checked")) {
        $(this).toggleClass("selected");
      }
      var predefined = $(this).children().find("input:radio").val().split(" ");
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      );
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        " " +
        get_currency(predefined[1]);
      $("#btcpw_widget_btcpw_skyscraper_converted_amount_wide")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_widget_btcpw_skyscraper_converted_currency_wide")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });
    $(
      ".btcpw_skyscraper_amount_value_1.high, .btcpw_skyscraper_amount_value_2.high, .btcpw_skyscraper_amount_value_3.high"
    ).click(function () {
      switch ($(this)[0].className) {
        case "btcpw_skyscraper_amount_value_1.high":
          $(".btcpw_skyscraper_amount_value_2.high").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");
          break;
        case "btcpw_skyscraper_amount_value_2.high":
          $(".btcpw_skyscraper_amount_value_1.high").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");
          break;
        case "btcpw_skyscraper_amount_value_3.high":
          $(".btcpw_skyscraper_amount_value_1.high").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_2.high").removeClass("selected");
          break;
        default:
          $(".btcpw_skyscraper_amount_value_1.high").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_2.high").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");
      }
      $(this).children().find("input:radio").prop("checked", true).change();
      if ($(this).children().find("input:radio").is(":checked")) {
        $(this).toggleClass("selected");
      }
      var predefined = $(this).children().find("input:radio").val().split(" ");
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      );
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        " " +
        get_currency(predefined[1]);
      $("#btcpw_skyscraper_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_skyscraper_converted_currency")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });
    $(
      ".btcpw_skyscraper_amount_value_1.wide, .btcpw_skyscraper_amount_value_2.wide, .btcpw_skyscraper_amount_value_3.wide"
    ).click(function () {
      switch ($(this)[0].className) {
        case "btcpw_skyscraper_amount_value_1.wide":
          $(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");
          break;
        case "btcpw_skyscraper_amount_value_2.wide":
          $(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");
          break;
        case "btcpw_skyscraper_amount_value_3.wide":
          $(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected");
          break;
        default:
          $(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected");
          $(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");
      }
      $(this).children().find("input:radio").prop("checked", true).change();
      if ($(this).children().find("input:radio").is(":checked")) {
        $(this).toggleClass("selected");
      }
      var predefined = $(this).children().find("input:radio").val().split(" ");
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      );
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        " " +
        get_currency(predefined[1]);
      $("#btcpw_skyscraper_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr("readonly", true);
      $("#btcpw_skyscraper_converted_currency")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });
  });
  function fiat_to_crypto(currency, val, usd, eur, sats) {
    var value = Number(val);
    switch (currency) {
      case "BTC":
        return (value * usd).toFixed(2);
      case "USD":
        return ((sats / usd) * value).toFixed(0);
      case "EUR":
        return ((sats / eur) * value).toFixed(0);
      default:
        return ((usd / sats) * value).toFixed(2);
    }
  }
  function get_currency(currency) {
    switch (currency) {
      case "BTC":
        return "USD";
      case "USD":
        return "SATS";
      case "EUR":
        return "SATS";
      default:
        return "USD";
    }
  }

  $(document).ready(function () {
    $("input[type=radio][name=btcpw_tipping_default_amount]").change(
      function () {
        $("input[type=radio][name=btcpw_tipping_default_amount]").attr(
          "required",
          true
        );
        $("#btcpw_tipping_amount").removeAttr("required");
        $("#btcpw_tipping_amount").val("");
      }
    );
    $("#btcpw_tipping_amount").click(function () {
      $("#btcpw_tipping_amount").attr("required", true);
      $("input[type=radio][name=btcpw_tipping_default_amount]").removeAttr(
        "required"
      );
      $("input[type=radio][name=btcpw_tipping_default_amount]").prop(
        "checked",
        false
      );
    });

    $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
    ).change(function () {
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
      ).attr("required", true);
      $("input[name=btcpw_skyscraper_tipping_amount_wide]").removeAttr(
        "required"
      );
      $("input[name=btcpw_skyscraper_tipping_amount_wide]").val("");
    });
    $("input[name=btcpw_skyscraper_tipping_amount_wide]").click(function () {
      $("input[name=btcpw_skyscraper_tipping_amount_wide]").attr(
        "required",
        true
      );
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
      ).removeAttr("required");
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
      ).prop("checked", false);
      $(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected");
      $(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected");
      $(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");
    });

    $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
    ).change(function () {
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
      ).attr("required", true);
      $("input[name=btcpw_skyscraper_tipping_amount_high]").removeAttr(
        "required"
      );
      $("input[name=btcpw_skyscraper_tipping_amount_high]").val("");
    });
    $("input[name=btcpw_skyscraper_tipping_amount_high]").click(function () {
      $("input[name=btcpw_skyscraper_tipping_amount_high]").attr(
        "required",
        true
      );
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
      ).removeAttr("required");
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
      ).prop("checked", false);
      $(".btcpw_skyscraper_amount_value_1.high").removeClass("selected");
      $(".btcpw_skyscraper_amount_value_2.high").removeClass("selected");
      $(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");
    });

    $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
    ).change(function () {
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
      ).attr("required", true);
      $(
        "input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]"
      ).removeAttr("required");
      $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").val(
        ""
      );
    });
    $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").click(
      function () {
        $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").attr(
          "required",
          true
        );
        $(
          "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
        ).removeAttr("required");
        $(
          "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
        ).prop("checked", false);
        $(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass(
          "selected"
        );
        $(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass(
          "selected"
        );
        $(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass(
          "selected"
        );
      }
    );

    $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
    ).change(function () {
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
      ).attr("required", true);
      $(
        "input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]"
      ).removeAttr("required");
      $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").val(
        ""
      );
    });
    $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").click(
      function () {
        $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").attr(
          "required",
          true
        );
        $(
          "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
        ).removeAttr("required");
        $(
          "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
        ).prop("checked", false);
        $("btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass(
          "selected"
        );
        $(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass(
          "selected"
        );
        $(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass(
          "selected"
        );
      }
    );
  });
  $(document).ready(function () {
    $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
    ).change(function () {
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
      ).attr("required", true);
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").removeAttr(
        "required"
      );
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val("");
    });
    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").click(function () {
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").attr(
        "required",
        true
      );
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
      ).removeAttr("required");
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
      ).prop("checked", false);
    });
  });
  $(document).ready(function () {
    $(
      "input[name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
    ).change(function () {
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
      ).attr("required", true);
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").removeAttr(
        "required"
      );
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val("");
    });
    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").click(function () {
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").attr(
        "required",
        true
      );
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
      ).removeAttr("required");
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
      ).prop("checked", false);
    });

    $("input[type=radio][name=btcpw_page_tipping_default_amount]").change(
      function () {
        $("input[type=radio][name=btcpw_page_tipping_default_amount]").attr(
          "required",
          true
        );
        $("#btcpw_page_tipping_amount").removeAttr("required");
        $("#btcpw_page_tipping_amount").val("");
      }
    );
    $("#btcpw_page_tipping_amount").click(function () {
      $("#btcpw_page_tipping_amount").attr("required", true);
      $("input[type=radio][name=btcpw_page_tipping_default_amount]").removeAttr(
        "required"
      );
      $("input[type=radio][name=btcpw_page_tipping_default_amount]").prop(
        "checked",
        false
      );
      $(".btcpw_page_amount_value_1").removeClass("selected");
      $(".btcpw_page_amount_value_2").removeClass("selected");
      $(".btcpw_page_amount_value_3").removeClass("selected");
    });
  });

  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms;
    total_forms = $(".btcpw_skyscraper_tipping_container fieldset").length;
    var freeInput = $(
      "input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]"
    );
    var fixedAmount = $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
    );
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.btcpw_widget.skyscraper-next-form.high").click(function () {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.btcpw_widget.skyscraper-previous-form.high").click(function () {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms;
    total_forms = $(".btcpw_skyscraper_tipping_container fieldset").length;
    var freeInput = $(
      "input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]"
    );
    var fixedAmount = $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
    );

    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.btcpw_widget.skyscraper-next-form.wide").click(function () {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.btcpw_widget.skyscraper-previous-form.wide").click(function () {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });
  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms;
    total_forms = $(".btcpw_page_tipping_container fieldset").length;
    var freeInput = $("#btcpw_page_tipping_amount");
    var fixedAmount = $(".btcpw_page_tipping_default_amount");
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.page-next-form").click(function () {
      if (validationField[0].checkValidity()) {
        $(".btcpw_page_bar_container.bar-1").removeClass("active");
        $(".btcpw_page_bar_container.bar-2").addClass("active");
        previous_form = $(this).parent().parent();
        next_form = $(this).parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.page-previous-form").click(function () {
      $(".btcpw_page_bar_container.bar-2").removeClass("active");
      $(".btcpw_page_bar_container.bar-1").addClass("active");
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });
  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms;
    total_forms = $(".btcpw_skyscraper_tipping_container fieldset").length;
    var freeInput = $("input[name=btcpw_skyscraper_tipping_amount_high]");
    var fixedAmount = $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
    );
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.skyscraper-next-form.high").click(function () {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.skyscraper-previous-form.high").click(function () {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms;
    total_forms = $(".btcpw_skyscraper_tipping_container fieldset").length;
    var freeInput = $("input[name=btcpw_skyscraper_tipping_amount_wide]");
    var fixedAmount = $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
    );
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.skyscraper-next-form.wide").click(function () {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.skyscraper-previous-form.wide").click(function () {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });
})(jQuery);
