(function($) {
  "use strict";
  $(document).ready(function() {
    $(".btcpaywall_cart_remove_item_btn").on("click", function(e) {
      e.preventDefault();
      var item = $(this).data("cart-key");
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        data: {
          action: "btcpw_remove_from_cart",
          cart_item: item,
        },
        success: function() {
          location.reload();
        },
      });
    });
    $("#btcpaywall_download_form").submit(function(e) {
      e.preventDefault();
      var id = $("#btcpw_download_id").data("post_id");
      var title = $("#btcpw_download_id").data("post_title");
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_add_to_cart",
          id: id,
          title: title,
        },
        success: function(response) {
          if (response.success) {
            location.replace(response.data.data);
          }
        },
        error: function(error) {
          console.log(error.message);
        },
      });
    });
  });

  $(document).ready(function() {
    $("#btcpw_tipping_currency").change(function() {
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
  function get_rates() {
    let result;
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      async: false,
      method: "GET",
      data: {
        action: "btcpw_convert_currencies",
      },
      success: function(response) {
        if (response.success) {
          result = response;
          /*eur = response["data"]["eur"]["value"];
          usd = response["data"]["usd"]["value"];
          sats = response["data"]["sats"]["value"];
          gbp = response["data"]["gbp"]["value"];*/
        } else {
          console.log(response);
        }
      },
    });
    return result;
  }
  $(document).ready(function() {
    var eur, usd, sats, gbp;
    $(
      "#btcpw_tipping_amount,#btcpw_tipping_amount_btcpw_widget,#btcpw_page_tipping_amount,#btcpw_widget_btcpw_skyscraper_tipping_amount_high,#btcpw_widget_btcpw_skyscraper_tipping_amount_wide,#btcpw_skyscraper_tipping_high_amount,#btcpw_skyscraper_tipping_wide_amount "
    ).on("input", function() {
      if (eur) {
        return;
      }
      let rates = get_rates();
      eur = rates["data"]["eur"]["value"];
      usd = rates["data"]["usd"]["value"];
      sats = rates["data"]["sats"]["value"];
      gbp = rates["data"]["gbp"]["value"];
    });
    $(
      "#value_1_high, #value_2_high, #value_3_high,#value_1_wide, #value_2_wide, #value_3_wide"
    ).on("change", function() {
      if (eur) {
        return;
      }
      let rates = get_rates();
      eur = rates["data"]["eur"]["value"];
      usd = rates["data"]["usd"]["value"];
      sats = rates["data"]["sats"]["value"];
      gbp = rates["data"]["gbp"]["value"];
    });
    $(
      ".btcpw_skyscraper_amount_value_1, .btcpw_skyscraper_amount_value_2, .btcpw_skyscraper_amount_value_3,.btcpw_page_amount_value_1, .btcpw_page_amount_value_2, .btcpw_page_amount_value_3"
    ).on("click", function() {
      if (eur) {
        return;
      }
      let rates = get_rates();
      eur = rates["data"]["eur"]["value"];
      usd = rates["data"]["usd"]["value"];
      sats = rates["data"]["sats"]["value"];
      gbp = rates["data"]["gbp"]["value"];
    });
    $("#btcpw_tipping_amount").on("input", function() {
      var currency = $("#btcpw_tipping_currency").val();
      var amount = $(this).val();
      $("#btcpw_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });

    $("#btcpw_tipping_amount_btcpw_widget").on("input", function() {
      var currency = $("#btcpw_tipping_currency_btcpw_widget").val();
      var amount = $(this).val();
      $("#btcpw_converted_amount_btcpw_widget")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_converted_currency_btcpw_widget")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });

    $("#btcpw_page_tipping_amount").on("input", function() {
      var currency = $("#btcpw_page_tipping_currency").val();
      var amount = $(this).val();
      $("#btcpw_page_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_page_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });

    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on(
      "input",
      function() {
        var currency = $(
          "#btcpw_widget_btcpw_skyscraper_tipping_currency_high"
        ).val();
        var amount = $(this).val();
        $("#btcpw_widget_btcpw_skyscraper_converted_amount_high")
          .attr("readonly", false)
          .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
          .attr("readonly", true);
        $("#btcpw_widget_btcpw_skyscraper_converted_currency_high")
          .attr("readonly", false)
          .val(get_currency(currency))
          .attr("readonly", true);
      }
    );

    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on(
      "input",
      function() {
        var currency = $(
          "#btcpw_widget_btcpw_skyscraper_tipping_currency_wide"
        ).val();
        var amount = $(this).val();
        $("#btcpw_widget_btcpw_skyscraper_converted_amount_wide")
          .attr("readonly", false)
          .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
          .attr("readonly", true);
        $("#btcpw_widget_btcpw_skyscraper_converted_currency_wide")
          .attr("readonly", false)
          .val(get_currency(currency))
          .attr("readonly", true);
      }
    );

    $("#btcpw_skyscraper_tipping_high_amount").on("input", function() {
      var currency = $("#btcpw_skyscraper_tipping_high_currency").val();
      var amount = $(this).val();
      $("#btcpw_skyscraper_high_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_skyscraper_high_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });
    $("#value_1_high, #value_2_high, #value_3_high").change(function() {
      if ($(this).is(":checked")) {
        var predefined = $(this).val().split(" ");
        $("#btcpw_skyscraper_high_converted_amount")
          .attr("readonly", false)
          .val(
            fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats, gbp)
          )
          .attr("readonly", true);
        $("#btcpw_skyscraper_high_converted_currency")
          .attr("readonly", false)
          .val(get_currency(predefined[1]))
          .attr("readonly", true);
      }
    });

    $("#btcpw_skyscraper_tipping_wide_amount").on("input", function() {
      var currency = $("#btcpw_skyscraper_tipping_wide_currency").val();
      var amount = $(this).val();
      $("#btcpw_skyscraper_wide_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_skyscraper_wide_converted_currency")
        .attr("readonly", false)
        .val(get_currency(currency))
        .attr("readonly", true);
    });
    $("#value_1_wide, #value_2_wide, #value_3_wide").change(function() {
      if ($(this).is(":checked")) {
        var predefined = $(this).val().split(" ");
        $("#btcpw_skyscraper_wide_converted_amount")
          .attr("readonly", false)
          .val(
            fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats, gbp)
          )
          .attr("readonly", true);
        $("#btcpw_skyscraper_wide_converted_currency")
          .attr("readonly", false)
          .val(get_currency(predefined[1]))
          .attr("readonly", true);
      }
    });
    $(
      ".btcpw_page_amount_value_1, .btcpw_page_amount_value_2, .btcpw_page_amount_value_3"
    ).on("click", function() {
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
      $("#btcpw_page_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_page_converted_currency")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });

    $(
      ".btcpw_widget.btcpw_skyscraper_amount_value_1.high, .btcpw_widget.btcpw_skyscraper_amount_value_2.high, .btcpw_widget.btcpw_skyscraper_amount_value_3.high"
    ).on("click", function() {
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
      $("#btcpw_widget_btcpw_skyscraper_converted_amount_high")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_widget_btcpw_skyscraper_converted_currency_high")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });

    $(
      ".btcpw_widget.btcpw_skyscraper_amount_value_1.wide, .btcpw_widget.btcpw_skyscraper_amount_value_2.wide, .btcpw_widget.btcpw_skyscraper_amount_value_3.wide"
    ).on("click", function() {
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
    ).on("click", function() {
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
      $("#btcpw_skyscraper_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_skyscraper_converted_currency")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });
    $(
      ".btcpw_skyscraper_amount_value_1.wide, .btcpw_skyscraper_amount_value_2.wide, .btcpw_skyscraper_amount_value_3.wide"
    ).on("click", function() {
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
      $("#btcpw_skyscraper_converted_amount")
        .attr("readonly", false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats, gbp))
        .attr("readonly", true);
      $("#btcpw_skyscraper_converted_currency")
        .attr("readonly", false)
        .val(get_currency(predefined[1]))
        .attr("readonly", true);
    });
  });
  function fiat_to_crypto(currency, val, usd, eur, sats, gbp) {
    var value = Number(val);
    switch (currency) {
      case "BTC":
        return (value * usd).toFixed(2);
      case "USD":
        return ((sats / usd) * value).toFixed(0);
      case "EUR":
        return ((sats / eur) * value).toFixed(0);
      case "GBP":
        return ((sats / gbp) * value).toFixed(0);
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
      case "GBP":
        return "SATS";
      default:
        return "USD";
    }
  }

  $(document).ready(function() {
    $("input[type=radio][name=btcpw_tipping_default_amount]").change(
      function() {
        $("input[type=radio][name=btcpw_tipping_default_amount]").attr(
          "required",
          true
        );
        $("#btcpw_tipping_amount").removeAttr("required");
        $("#btcpw_tipping_amount").val("");
      }
    );
    $("#btcpw_tipping_amount").on("click", function() {
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
    ).change(function() {
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
      ).attr("required", true);
      $("input[name=btcpw_skyscraper_tipping_amount_wide]").removeAttr(
        "required"
      );
      $("input[name=btcpw_skyscraper_tipping_amount_wide]").val("");
    });
    $("input[name=btcpw_skyscraper_tipping_amount_wide]").on(
      "click",
      function() {
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
      }
    );

    $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
    ).change(function() {
      $(
        "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
      ).attr("required", true);
      $("input[name=btcpw_skyscraper_tipping_amount_high]").removeAttr(
        "required"
      );
      $("input[name=btcpw_skyscraper_tipping_amount_high]").val("");
    });
    $("input[name=btcpw_skyscraper_tipping_amount_high]").on(
      "click",
      function() {
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
      }
    );

    $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
    ).change(function() {
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
    $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").on(
      "click",
      function() {
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
    ).change(function() {
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
    $("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").on(
      "click",
      function() {
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
    );
  });
  $(document).ready(function() {
    $(
      "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
    ).change(function() {
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"
      ).attr("required", true);
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").removeAttr(
        "required"
      );
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val("");
    });
    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on(
      "click",
      function() {
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
      }
    );
  });
  $(document).ready(function() {
    $(
      "input[name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
    ).change(function() {
      $(
        "input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"
      ).attr("required", true);
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").removeAttr(
        "required"
      );
      $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val("");
    });
    $("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on(
      "click",
      function() {
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
      }
    );

    $("input[type=radio][name=btcpw_page_tipping_default_amount]").change(
      function() {
        $("input[type=radio][name=btcpw_page_tipping_default_amount]").attr(
          "required",
          true
        );
        $("#btcpw_page_tipping_amount").removeAttr("required");
        $("#btcpw_page_tipping_amount").val("");
      }
    );
    $("#btcpw_page_tipping_amount").on("click", function() {
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
  $(document).ready(function() {
    var previous_form, next_form;
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

    $("input.btcpw_widget.skyscraper-next-form.high").on("click", function() {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.btcpw_widget.skyscraper-previous-form.high").on(
      "click",
      function() {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().prev();
        next_form.show();
        previous_form.hide();
      }
    );
  });

  $(document).ready(function() {
    var previous_form, next_form;
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

    $("input.btcpw_widget.skyscraper-next-form.wide").on("click", function() {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.btcpw_widget.skyscraper-previous-form.wide").on(
      "click",
      function() {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().prev();
        next_form.show();
        previous_form.hide();
      }
    );
  });
  $(document).ready(function() {
    var previous_form, next_form;
    var freeInput = $("#btcpw_page_tipping_amount");
    var fixedAmount = $(".btcpw_page_tipping_default_amount");
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.page-next-form").on("click", function() {
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
    $("input.page-previous-form").on("click", function() {
      $(".btcpw_page_bar_container.bar-2").removeClass("active");
      $(".btcpw_page_bar_container.bar-1").addClass("active");
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  $(document).ready(function() {
    var previous_form, next_form;
    var freeInput = $("input[name=btcpw_skyscraper_tipping_amount_high]");
    var fixedAmount = $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"
    );
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.skyscraper-next-form.high").on("click", function() {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.skyscraper-previous-form.high").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  $(document).ready(function() {
    var previous_form, next_form;
    var freeInput = $("input[name=btcpw_skyscraper_tipping_amount_wide]");
    var fixedAmount = $(
      "input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"
    );
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput;

    $("input.skyscraper-next-form.wide").on("click", function() {
      if (validationField[0].checkValidity()) {
        previous_form = $(this).parent().parent().parent();
        next_form = $(this).parent().parent().parent().next();
        next_form.show();
        previous_form.hide();
      } else {
        validationField[0].reportValidity();
      }
    });
    $("input.skyscraper-previous-form.wide").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  //Revenue post
  $(document).ready(function() {
    var previous_form, next_form;

    $(".revenue-post-next-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().next();
      next_form.show();
      previous_form.hide();
    });
    $("input.revenue-post-previous-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  //Revenue view
  $(document).ready(function() {
    var previous_form, next_form;

    $(".revenue-view-next-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().next();
      next_form.show();
      previous_form.hide();
    });
    $("input.revenue-view-previous-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  //Revenue file
  $(document).ready(function() {
    var previous_form, next_form;

    $(".revenue-file-next-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().next();
      next_form.show();
      previous_form.hide();
    });
    $("input.revenue-file-previous-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });

  //Pay-per-file
  $(document).ready(function() {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms;
    total_forms = $(".btcpw_digital_download_protected_area fieldset").length;

    $("input.btcpw_digital_download.next-form").on("click", function() {
      previous_form = $(this).parent().parent();
      next_form = $(this).parent().parent().next();
      next_form.show();
      previous_form.hide();
    });

    $("input.btcpw_digital_download.previous-form").on("click", function() {
      previous_form = $(this).parent().parent().parent();
      next_form = $(this).parent().parent().parent().prev();
      next_form.show();
      previous_form.hide();
    });
  });
})(jQuery);
