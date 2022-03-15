(function ($) {
  "use strict";

  $(document).ready(function () {
    $("#btcpw_btcpay_check_status").click(function () {
      $(".btcpw_btcpay_status").hide(500);
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        method: "POST",
        data: {
          action: "btcpw_check_greenfield_api_work",
          auth_key_view: $("#btcpw_btcpay_auth_key_view").val(),
          auth_key_create: $("#btcpw_btcpay_auth_key_create").val(),
          server_url: $("#btcpw_btcpay_server_url").val(),
        },
        success: function (response) {
          if (response.success) {
            $("#btcpw_btcpay_store_id").val(response.data.store_id);
            $("#btcpw_btcpay_status_success").fadeIn(500);
          } else {
            $("#btcpw_btcpay_status_error")
              .html(response.data.message)
              .fadeIn(500);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  });
  $(document).ready(function () {
    $("#btcpw_default_currency").change(function () {
      var stepValue = $(this).val() === "SATS" ? "1" : "0.50";

      $("#btcpw_default_price").attr({
        step: stepValue,
        value: parseInt($("#btcpw_default_price").val()),
      });
    });
  });
  $(document).ready(function () {
    $(
      "#btcpw_default_page_currency1, #btcpw_default_page_currency2, #btcpw_default_page_currency3, #btcpw_banner_wide_default_currency1, #btcpw_banner_wide_default_currency2, #btcpw_banner_wide_default_currency3, #btcpw_banner_high_default_currency1, #btcpw_banner_high_default_currency2, #btcpw_banner_high_default_currency3"
    ).change(function () {
      var stepValue =
        $(this).val() === "BTC" ?
        "0.00000001" :
        $(this).val() === "SATS" ?
        "1" :
        "0.50";

      $(this)
        .prev("input")
        .attr({
          step: stepValue,
          value: parseInt($(this).prev("input").val()),
        });
    });
  });
  $(document).ready(function () {
    $("#btcpw_default_currency").change(function () {
      if ($("#btcpw_default_currency").val() !== "SATS") {
        $(".btcpw_price_format").hide();
      } else {
        $(".btcpw_price_format").show();
      }
    });
  });
  $(document).ready(function () {
    $("#btcpw_default_pay_per_post_duration_type").change(function () {
      var dtype = $(this).val();

      if (dtype === "unlimited" || dtype === "onetime") {
        $("#btcpw_default_pay_per_post_duration").prop({
          required: false,
          disabled: true,
        });
      } else {
        $("#btcpw_default_pay_per_post_duration").prop({
          required: true,
          disabled: false,
        });
      }
    });

    $("#btcpw_default_pay_per_view_duration_type").change(function () {
      var dtype = $(this).val();

      if (dtype === "unlimited" || dtype === "onetime") {
        $("#btcpw_default_pay_per_view_duration").prop({
          required: false,
          disabled: true,
        });
      } else {
        $("#btcpw_default_pay_per_view_duration").prop({
          required: true,
          disabled: false,
        });
      }
    });
  });

  function isValidUrl(url) {
    if (
      typeof url === "string" &&
      (url.indexOf("http://") == 0 || url.indexOf("https://") == 0)
    ) {
      return true;
    }

    return false;
  }

  function formatUrl(url) {
    if (typeof url === "string") {
      return url.replace(/^(.+?)\/*?$/, "$1");
    }

    return null;
  }
  $(document).ready(function () {
    $("#btcpw_btcpay_server_url").change(function () {
      var url = formatUrl($(this).val());

      var redirectLink = $(".btcpw_auth_key");

      if (url.length == 0) {
        return;
      }

      if (isValidUrl(url)) {
        url = url + "/account/apikeys";
        redirectLink.attr("href", url).html(url).show();
      }
    });
  });

  function convertDate(d) {
    var year = d.getFullYear();
    var month = pad(d.getMonth() + 1);
    var day = pad(d.getDate());
    var hour = pad(d.getHours());
    var minutes = pad(d.getMinutes());

    return year + "-" + month + "-" + day + " " + hour + ":" + minutes;
  }

  function pad(num) {
    var num = "0" + num;
    return num.slice(-2);
  }
  $("#design-button").click(function (e) {
    e.preventDefault();
  });

  $(document).ready(function () {
    $(".btcpw_fixed_amount_enable").change(function () {
      $(this).is(":checked") ?
        $(this).next().prop("required", true) :
        $(this).next().prop("required", false);
    });
  });

  $(document).ready(function () {
    $(".btcpw_tipping_enter_amount").click(function () {
      if (!$(this).is(":checked")) {
        $(".container_predefined_amount").show();
      } else {
        $(".container_predefined_amount").hide();
      }
    });
  });
  $(document).on("widget-added", function () {
    imagePreview(
      $(".widget-tipping-basic-upload_box_image"),
      $(".widget-tipping-basic-background_id")
    );
    imageRemove($(".widget-tipping-basic-remove_box_image"));

    imagePreview(
      $(".widget-tipping-basic-upload_box_logo"),
      $(".widget-tipping-basic-logo_id")
    );
    imageRemove($(".widget-tipping-basic-remove_box_logo"));

    imagePreview(
      $(".widget-tipping-basic-upload_box_image_high"),
      $(".widget-tipping-basic-background_id_high")
    );
    imageRemove($(".widget-tipping-basic-remove_box_image_high"));

    imagePreview(
      $(".widget-tipping-basic-upload_box_logo_high"),
      $(".widget-tipping-basic-logo_id_high")
    );
    imageRemove($(".widget-tipping-basic-remove_box_logo_high"));

    imagePreview(
      $(".widget-tipping-basic-upload_box_image_wide"),
      $(".widget-tipping-basic-background_id_wide")
    );
    imageRemove($(".widget-tipping-basic-remove_box_image_wide"));

    imagePreview(
      $(".widget-tipping-basic-upload_box_logo_wide"),
      $(".widget-tipping-basic-logo_id_wide")
    );
    imageRemove($(".widget-tipping-basic-remove_box_logo_wide"));
  });
  $(document).on("widget-added", function () {
    $(
      ".widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color"
    ).iris({
      defaultColor: true,

      change: function (event, ui) {},

      clear: function () {},

      hide: true,

      palettes: true,
    });
  });
  $(document).ready(function () {
    $(".btcpw_expand_notice").click(function () {
      $(".btcpw_expanded_notice").toggle();
      $(".btcpw_expand_notice span i").toggleClass(
        "fas fa-arrow-down fas fa-arrow-up"
      );
    });
  });
  $(document).ready(function () {
    $("#tipping-form-design").change(function () {
      var design = $(this).val();
      $(".toggle-preview").hide();
      switch (design) {
        case "Box":
          $("#tipping-box-preview").show();
          break;
        case "High-Banner":
          $("#tipping-banner-high-preview").show();
          break;
        case "Wide-Banner":
          $("#tipping-banner-wide-preview").show();
          break;
        case "Page":
          $("#tipping-page-preview").show();
          break;

        default:
          $("#tipping-box-preview").show();
          break;
      }
    });
  });
  $(document).ready(function () {
    $("#btcpaywall_tipping_color_background, #btcpaywall_tipping_color_header_footer_background, #btcpaywall_tipping_color_title, #btcpaywall_tipping_color_description, #btcpaywall_tipping_color_progress_bar_step1,#btcpaywall_tipping_color_progress_bar_step2,#btcpaywall_tipping_color_main,#btcpaywall_tipping_color_amounts,#btcpaywall_tipping_color_button_text,#btcpaywall_tipping_color_button").iris({
      defaultColor: true,

      change: function (event, ui) {},

      clear: function () {},

      hide: true,

      palettes: true,
    });
  });
  /* $(document).ready(function () {
    $(
      ".btcpw_tipping_box_title_color,.btcpw_tipping_box_description_color,.btcpw_tipping_box_tipping_box_color,.btcpw_tipping_box_hf_background,.btcpw_tipping_box_button_text_color,.btcpw_tipping_box_button_color,.btcpw_tipping_box_background,.btcpw_tipping_banner_high_hf_background,.btcpw_tipping_banner_high_title_color,.btcpw_tipping_banner_high_description_color,.btcpw_tipping_banner_high_tipping_box_color,.btcpw_tipping_banner_high_button_text_color,.btcpw_tipping_banner_high_button_color,.btcpw_tipping_banner_high_background,.btcpw_tipping_banner_high_tipping_color,.btcpw_tipping_banner_high_input_background,.btcpw_tipping_banner_wide_hf_background,.btcpw_tipping_banner_wide_title_color,.btcpw_tipping_banner_wide_description_color,.btcpw_tipping_banner_wide_tipping_box_color,.btcpw_tipping_banner_wide_button_text_color,.btcpw_tipping_banner_wide_button_color,.btcpw_tipping_banner_wide_background,.btcpw_tipping_banner_wide_tipping_color,.btcpw_tipping_banner_wide_input_background,.btcpw_tipping_box_input_background,.btcpw_tipping_page_title_color,.btcpw_tipping_page_tipping_box_color,.btcpw_tipping_page_button_text_color,.btcpw_tipping_page_button_color,.btcpw_tipping_page_background,.btcpw_tipping_page_tipping_color,.btcpw_tipping_page_input_background,.btcpw_tipping_page_tipping_color_active,.btcpw_tipping_page_tipping_color_inactive,.btcpw_tipping_hf_background"
    ).iris({
      defaultColor: true,

      change: function (event, ui) {},

      clear: function () {},

      hide: true,

      palettes: true,
    });
  }); */
  $(document).ready(function ($) {
    /* imagePreview(
      $("#btcpw_tipping_banner_high_button_image"),
      $("#btcpw_tipping_banner_high_image")
    );
    imageRemove($(".btcpw_tipping_banner_high_button_remove"));

    imagePreview(
      $("#btcpw_tipping_banner_high_button_image_background"),
      $("#btcpw_tipping_banner_high_image_background")
    );
    imageRemove($(".btcpw_tipping_banner_high_button_remove_background"));

    imagePreview(
      $("#btcpw_tipping_banner_wide_button_image"),
      $("#btcpw_tipping_banner_wide_image")
    );
    imageRemove($(".btcpw_tipping_banner_wide_button_remove"));

    imagePreview(
      $("#btcpw_tipping_banner_wide_button_image_background"),
      $("#btcpw_tipping_banner_wide_image_background")
    );
    imageRemove($(".btcpw_tipping_banner_wide_button_remove_background"));

    imagePreview(
      $("#btcpw_tipping_box_button_image"),
      $("#btcpw_tipping_box_image")
    );
    imageRemove($(".btcpw_tipping_box_button_remove"));

    imagePreview(
      $("#btcpw_tipping_box_button_image_background"),
      $("#btcpw_tipping_box_image_background")
    );
    imageRemove($(".btcpw_tipping_box_button_remove_background"));

    imagePreview(
      $("#btcpw_tipping_page_button_image"),
      $("#btcpw_tipping_page_image")
    );
    imageRemove($(".btcpw_tipping_page_button_remove"));

    imagePreview(
      $("#btcpw_tipping_page_button_image_background"),
      $("#btcpw_tipping_page_image_background")
    );
    imageRemove($(".btcpw_tipping_page_button_remove_background")); */

    imagePreview(
      $("#btcpw_product_image_button"),
      $("#btcpw_product_image_id")
    );
    imageRemove($(".btcpw_remove_product_image"));


    imagePreview(
      $("#btcpaywall_tipping_text_button_background"),
      $("#btcpaywall_tipping_background")
    );
    imageRemove($(".btcpaywall_tipping_button_remove_background"));

    imagePreview(
      $("#btcpaywall_tipping_text_button_logo"),
      $("#btcpaywall_tipping_logo")
    );
    imageRemove($(".btcpaywall_tipping_button_remove_logo"));
  });
  $(document).ready(function () {
    showMore(
      $(".btcpw_tipping_banner_high_collect_email"),
      $(
        '.btcpw_tipping_banner_high_collect_email_mandatory, label[for="btcpw_tipping_banner_high_collect[email][mandatory]"]'
      )
    );
    showMore(
      $(".btcpw_tipping_banner_high_collect_name"),
      $(
        '.btcpw_tipping_banner_high_collect_name_mandatory, label[for="btcpw_tipping_banner_high_collect[name][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_banner_high_collect_phone"),
      $(
        '.btcpw_tipping_banner_high_collect_phone_mandatory, label[for="btcpw_tipping_banner_high_collect[phone][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_banner_high_collect_address"),
      $(
        '.btcpw_tipping_banner_high_collect_address_mandatory, label[for="btcpw_tipping_banner_high_collect[address][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_banner_high_collect_message"),
      $(
        '.btcpw_tipping_banner_high_collect_message_mandatory, label[for="btcpw_tipping_banner_high_collect[message][mandatory]"]'
      )
    );
    showMore(
      $(".btcpw_tipping_banner_wide_collect_email"),
      $(
        '.btcpw_tipping_banner_wide_collect_email_mandatory, label[for="btcpw_tipping_banner_wide_collect[email][mandatory]"]'
      )
    );
    showMore(
      $(".btcpw_tipping_banner_wide_collect_name"),
      $(
        '.btcpw_tipping_banner_wide_collect_name_mandatory, label[for="btcpw_tipping_banner_wide_collect[name][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_banner_wide_collect_phone"),
      $(
        '.btcpw_tipping_banner_wide_collect_phone_mandatory, label[for="btcpw_tipping_banner_wide_collect[phone][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_banner_wide_collect_address"),
      $(
        '.btcpw_tipping_banner_wide_collect_address_mandatory, label[for="btcpw_tipping_banner_wide_collect[address][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_banner_wide_collect_message"),
      $(
        '.btcpw_tipping_banner_wide_collect_message_mandatory, label[for="btcpw_tipping_banner_wide_collect[message][mandatory]"]'
      )
    );
    showMore(
      $(".btcpw_tipping_page_collect_email"),
      $(
        '.btcpw_tipping_page_collect_email_mandatory, label[for="btcpw_tipping_page_collect[email][mandatory]"]'
      )
    );
    showMore(
      $(".btcpw_tipping_page_collect_name"),
      $(
        '.btcpw_tipping_page_collect_name_mandatory, label[for="btcpw_tipping_page_collect[name][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_page_collect_phone"),
      $(
        '.btcpw_tipping_page_collect_phone_mandatory, label[for="btcpw_tipping_page_collect[phone][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_page_collect_address"),
      $(
        '.btcpw_tipping_page_collect_address_mandatory, label[for="btcpw_tipping_page_collect[address][mandatory]"]'
      )
    );

    showMore(
      $(".btcpw_tipping_page_collect_message"),
      $(
        '.btcpw_tipping_page_collect_message_mandatory, label[for="btcpw_tipping_page_collect[message][mandatory]"]'
      )
    );
  });

  function imagePreview(click_elem, target) {
    var custom_uploader, click_elem, target;

    click_elem.click(function (e) {
      e.preventDefault();
      if (custom_uploader) {
        custom_uploader.open();
        return;
      }

      custom_uploader = wp.media.frames.file_frame = wp.media({
        title: "Choose Image",
        button: {
          text: "Choose Image",
        },
        multiple: false,
      });

      custom_uploader.on("select", function () {
        var attachment = custom_uploader
          .state()
          .get("selection")
          .first()
          .toJSON();
        target.val(attachment.id);
        click_elem
          .html('<img height=100px width=100px src="' + attachment.url + '">')
          .next()
          .show();
      });

      custom_uploader.open();
    });
  }

  function imageRemove(remove) {
    $(remove).click(function (e) {
      e.preventDefault();

      var button = $(this);
      button.next().val("");
      button.hide().prev().html("Upload");
    });
  }

  function showMore(click_elem, target) {
    $(click_elem).click(function () {
      if (!$(this).is(":checked")) {
        $(target).prop("checked", false).css("visibility", "hidden");
      } else {
        $(target).css("visibility", "visible");
      }
    });
  }
  $(document).ready(function () {
    $("#btcpw_shortcodes").click(function () {
      $("#sc_menu").toggle();
      $("#btcpw_shortcodes span i").toggleClass(
        "fas fa-arrow-down fas fa-arrow-up"
      );
    });
    $(".sc_menu_item.btcpw_shortcode").click(function () {
      send_to_editor($(this).attr("data"));
      $("#sc_menu").toggle();
      $("#btcpw_shortcodes span i").toggleClass(
        "fas fa-arrow-down fas fa-arrow-up"
      );
      return false;
    });
  });

  $(document).ready(function () {
    $(
      "#tipping_box_add_form, #tipping_banner_wide_add_form, #tipping_banner_high_add_form, #tipping_page_add_form"
    ).on("submit", function (e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "json",
        url: shortcode_ajax_object.ajax_url,
        data: {
          action: "btcpw_create_shortcode",
          nonce_ajax: shortcode_ajax_object.security,
          id: $(
            "#btc_tipping_banner_high_id, #btc_tipping_banner_wide_id, #btc_tipping_box_id, #btc_tipping_page_id"
          ).val(),
          form_name: $(
            "#btcpw_tipping_page_form_name, #btcpw_tipping_box_form_name, #btcpw_tipping_banner_high_form_name, #btcpw_tipping_banner_wide_form_name"
          ).val(),
          dimension: $(
            "#btcpw_tipping_box_dimension, #btcpw_tipping_banner_high_dimension, #btcpw_tipping_banner_wide_dimension"
          ).val(),
          background: $(
            "#btcpw_tipping_box_image_background, #btcpw_tipping_banner_high_image_background, #btcpw_tipping_banner_wide_image_background, #btcpw_tipping_page_image_background"
          ).val(),
          background_color: $(
            "#btcpw_tipping_box_background, #btcpw_tipping_banner_high_background, #btcpw_tipping_banner_wide_background,#btcpw_tipping_page_background"
          ).val(),
          hf_background: $(
            "#btcpw_tipping_box_hf_background, #btcpw_tipping_hf_background, #btcpw_tipping_banner_wide_hf_background, #btcpw_tipping_banner_high_hf_background"
          ).val(),
          logo: $(
            "#btcpw_tipping_box_image, #btcpw_tipping_banner_high_image, #btcpw_tipping_banner_wide_image, #btcpw_tipping_page_image"
          ).val(),
          title_text: $(
            "#btcpw_tipping_box_title, #btcpw_tipping_banner_high_title, #btcpw_tipping_banner_wide_title,#btcpw_tipping_page_title"
          ).val(),
          title_text_color: $(
            "#btcpw_tipping_box_title_color, #btcpw_tipping_banner_high_title_color, #btcpw_tipping_banner_wide_title_color,#btcpw_tipping_page_title_color"
          ).val(),
          description_text: $(
            "#btcpw_tipping_box_description, #btcpw_tipping_banner_high_description, #btcpw_tipping_banner_wide_description, #btcpw_tipping_page_description"
          ).val(),
          description_text_color: $(
            "#btcpw_tipping_box_description_color, #btcpw_tipping_banner_high_description_color, #btcpw_tipping_banner_wide_description_color,#btcpw_tipping_page_description_color"
          ).val(),
          tipping_text: $(
            "#btcpw_tipping_box_text, #btcpw_tipping_banner_high_text, #btcpw_tipping_banner_wide_text,#btcpw_tipping_page_text"
          ).val(),
          tipping_text_color: $(
            "#btcpw_tipping_box_tipping_box_color, #btcpw_tipping_banner_high_tipping_color, btcpw_tipping_banner_wide_tipping_color, #btcpw_tipping_page_tipping_banner_color"
          ).val(),
          redirect: $(
            "#btcpw_tipping_box_redirect, #btcpw_tipping_banner_high_redirect, #btcpw_tipping_banner_wide_redirect, #btcpw_tipping_page_redirect"
          ).val(),
          currency: $(
            "#btcpw_tipping_box_currency, #btcpw_tipping_banner_high_currency, #btcpw_tipping_banner_wide_currency,#btcpw_tipping_page_currency"
          ).val(),
          input_background: $(
            "#btcpw_tipping_box_input_background, #btcpw_tipping_banner_high_input_background, #btcpw_tipping_banner_wide_input_background,#btcpw_tipping_page_input_background"
          ).val(),
          button_text: $(
            "#btcpw_tipping_box_button_text, #btcpw_tipping_banner_high_button_text, #btcpw_tipping_banner_wide_button_text, #btcpw_tipping_page_button_text"
          ).val(),
          button_text_color: $(
            "#btcpw_tipping_box_button_text_color, #btcpw_tipping_banner_high_button_text_color, #btcpw_tipping_banner_wide_button_text_color, #btcpw_tipping_page_button_text_color"
          ).val(),
          button_color: $(
            "#btcpw_tipping_box_button_color, #btcpw_tipping_banner_high_button_color, #btcpw_tipping_banner_wide_button_color,#btcpw_tipping_page_button_color"
          ).val(),
          free_input: $(
            "input[name='btcpw_tipping_banner_wide_enter_amount']:checked, input[name='btcpw_tipping_banner_high_enter_amount']:checked, input[name='btcpw_tipping_page_enter_amount']:checked"
          ).val(),
          value1_enabled: $(
            "input[name='btcpw_tipping_banner_wide_fixed_amount[value1][enabled]']:checked, input[name='btcpw_tipping_banner_high_fixed_amount[value1][enabled]']:checked, input[name='btcpw_tipping_page_fixed_amount[value1][enabled]']:checked"
          ).val(),
          value1_currency: $(
            "#btcpw_banner_high_default_currency1, #btcpw_banner_wide_default_currency1, #btcpw_default_page_currency1"
          ).val(),
          value1_amount: $(
            "#btcpw_banner_high_default_price1, #btcpw_banner_wide_default_price1,#btcpw_default_page_price1"
          ).val(),
          value1_icon: $(
            "#btcpw_tipping_banner_high_icon1, #btcpw_tipping_banner_wide_icon1, #btcpw_tipping_page_icon1"
          ).val(),
          value2_enabled: $(
            "input[name='btcpw_tipping_banner_wide_fixed_amount[value2][enabled]']:checked, input[name='btcpw_tipping_banner_high_fixed_amount[value2][enabled]']:checked,input[name='btcpw_tipping_page_fixed_amount[value2][enabled]']:checked"
          ).val(),
          value2_currency: $(
            "#btcpw_banner_high_default_currency2, #btcpw_banner_wide_default_currency2, #btcpw_default_page_currency2"
          ).val(),
          value2_amount: $(
            "#btcpw_banner_high_default_price2, #btcpw_banner_wide_default_price2, #btcpw_default_page_price2"
          ).val(),
          value2_icon: $(
            "#btcpw_tipping_banner_high_icon2, #btcpw_tipping_banner_wide_icon2, #btcpw_tipping_page_icon2"
          ).val(),
          value3_enabled: $(
            "input[name='btcpw_tipping_banner_wide_fixed_amount[value3][enabled]']:checked, input[name='btcpw_tipping_banner_high_fixed_amount[value3][enabled]']:checked,input[name='btcpw_tipping_page_fixed_amount[value3][enabled]']:checked"
          ).val(),
          value3_currency: $(
            "#btcpw_banner_high_default_currency3, #btcpw_banner_wide_default_currency3,#btcpw_default_page_currency3"
          ).val(),
          value3_amount: $(
            "#btcpw_banner_high_default_price3, #btcpw_banner_wide_default_price3, #btcpw_default_page_price3"
          ).val(),
          value3_icon: $(
            "#btcpw_tipping_banner_high_icon3, #btcpw_tipping_banner_wide_icon3, #btcpw_tipping_page_icon3"
          ).val(),
          collect_name: $(
            "input[name='btcpw_tipping_banner_high_collect[name][collect]']:checked,input[name='btcpw_tipping_banner_wide_collect[name][collect]']:checked, input[name='btcpw_tipping_page_collect[name][collect]']:checked"
          ).val(),
          mandatory_name: $(
            "input[name='btcpw_tipping_banner_high_collect[name][mandatory]']:checked, input[name='btcpw_tipping_banner_wide_collect[name][mandatory]']:checked, input[name='btcpw_tipping_page_collect[name][mandatory]']:checked"
          ).val(),
          collect_email: $(
            "input[name='btcpw_tipping_banner_high_collect[email][collect]']:checked, input[name='btcpw_tipping_banner_wide_collect[email][collect]']:checked, input[name='btcpw_tipping_page_collect[email][collect]']:checked"
          ).val(),
          mandatory_email: $(
            "input[name='btcpw_tipping_banner_high_collect[email][mandatory]']:checked, input[name='btcpw_tipping_banner_wide_collect[email][mandatory]']:checked, input[name='btcpw_tipping_page_collect[email][mandatory]']:checked"
          ).val(),
          collect_phone: $(
            "input[name='btcpw_tipping_banner_high_collect[phone][collect]']:checked, input[name='btcpw_tipping_banner_wide_collect[phone][collect]']:checked, input[name='btcpw_tipping_page_collect[phone][collect]']:checked"
          ).val(),
          mandatory_phone: $(
            "input[name='btcpw_tipping_banner_high_collect[phone][mandatory]']:checked, input[name='btcpw_tipping_banner_wide_collect[phone][mandatory]']:checked, input[name='btcpw_tipping_page_collect[phone][mandatory]']:checked"
          ).val(),
          collect_address: $(
            "input[name='btcpw_tipping_banner_high_collect[address][collect]']:checked, input[name='btcpw_tipping_banner_wide_collect[address][collect]']:checked, input[name='btcpw_tipping_page_collect[address][collect]']:checked"
          ).val(),
          mandatory_address: $(
            "input[name='btcpw_tipping_banner_high_collect[address][mandatory]']:checked, input[name='btcpw_tipping_banner_wide_collect[address][mandatory]']:checked, input[name='btcpw_tipping_page_collect[address][mandatory]']:checked"
          ).val(),
          collect_message: $(
            "input[name='btcpw_tipping_banner_high_collect[message][collect]']:checked, input[name='btcpw_tipping_banner_wide_collect[message][collect]']:checked, input[name='btcpw_tipping_page_collect[message][collect]']:checked"
          ).val(),
          mandatory_message: $(
            "input[name='btcpw_tipping_banner_high_collect[message][mandatory]']:checked, input[name='btcpw_tipping_banner_wide_collect[message][mandatory]']:checked, input[name='btcpw_tipping_page_collect[message][mandatory]']:checked"
          ).val(),
          show_icon: $(
            "input[name='btcpw_tipping_page_show_icon']:checked, input[name='btcpw_tipping_banner_wide_show_icon']:checked, input[name='btcpw_tipping_banner_high_show_icon']:checked"
          ).val(),
          step1: $("#btcpw_tipping_page_step1").val(),
          step2: $("#btcpw_tipping_page_step2").val(),
          active_color: $("#btcpw_tipping_page_tipping_color_active").val(),
          inactive_color: $("#btcpw_tipping_page_tipping_color_inactive").val(),
        },
        success: function (data) {
          if (
            $(
              "#btc_tipping_banner_high_id, #btc_tipping_banner_wide_id, #btc_tipping_box_id, #btc_tipping_page_id"
            ).val() < 1
          ) {
            location.replace(
              shortcode_ajax_object.redirectUrl + data.data.data.id
            );
          }
        },
        error: function () {
          console.log("error handling here");
        },
      });
    });
  });

  function uploadFile(click_elem, fileUrl, fileName, fileId) {
    var custom_uploader, click_elem, fileUrl, fileName, fileId;

    click_elem.click(function (e) {
      e.preventDefault();
      if (custom_uploader) {
        custom_uploader.open();
        return;
      }

      custom_uploader = wp.media.frames.file_frame = wp.media({
        title: "Choose File",
        button: {
          text: "Choose File",
        },
        multiple: false,
      });

      custom_uploader.on("select", function () {
        var attachment = custom_uploader
          .state()
          .get("selection")
          .first()
          .toJSON();
        fileUrl.val(attachment.url);
        fileName.val(attachment.filename);
        fileId.val(attachment.id);
      });

      custom_uploader.open();
    });
  }
  $(document).ready(function () {
    var template_id;
    uploadFile(
      $("#btcpw_digital_download_upload_button"),
      $("#btcpw_product_file"),
      $("#btcpw_product_filename", $("#btcpw_product_file_id"))
    );
    //Tipping Metabox
    $('.js-btcpaywall-shortcode-button').click(function () {

      var shortcode = $(this).data('btcpaywall-shortcode');
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val(shortcode).select()
      document.execCommand("copy");
      $(this).text('Copied to clipboard');
      $temp.remove();
    })
    /* $(".btcpaywall_metabox_wrap_metabox_tabs li").click(function () {
      var tab_id = $(this).attr("data-tab");
      $(".btcpaywall_metabox_wrap_metabox_tabs li").removeClass("current");
      $(".btcpaywall_tabset").removeClass("current");
      $(this).addClass("current");
      $("#" + tab_id).addClass("current");
    }); */
    $(".btcpaywall_container_header").click(function () {
      var header_id = $(this).data("id");
      $(".btcpaywall_container_body." + header_id + "-body").toggle();
    })
    $(".btcpaywall_tipping_selected_template button").click(function () {
      $(".btcpaywall_tipping_selected_template").css("display", "none");
      $(".btcpaywall_tipping_templates").css("display", "flex");
      $("#btcpaywall_template_appearance-wrap").toggle();
      //$('.btcpaywall_tipping_templates button').removeClass('activated')
      $("#btcpaywall_tipping_template_name").val('');
    })
    $(".btcpaywall_tipping_templates button").click(function (e) {
      e.preventDefault();
      template_id = $(this).data('id');
      $("#btcpaywall_tipping_template_name").val(template_id);
      /* if ($(this).hasClass('activated')) {
        $('.btcpaywall_tipping_templates button').removeClass('activated')
        $("#btcpaywall_tipping_template_name").val('');
        $(this).text('Activate');
      } else { */
      $(".btcpaywall_tipping_selected_template").css("display", "flex");
      $(".btcpaywall_tipping_templates").css("display", "none");
      $("#btcpaywall_template_appearance-wrap").toggle();
      /* 
            $('.btcpaywall_tipping_templates button').removeClass('activated')
            $('.btcpaywall_tipping_templates > div').removeClass("btcpaywall_chosen_template"); */

      /*   $(this).parent().parent().addClass("btcpaywall_chosen_template"); 
        $(this).addClass('activated')
        $('.btcpaywall_tipping_templates button').text('Activate')*/
      //$(this).text('Deactivate')
      //}

      if (template_id == 'btcpaywall_tipping_page') {
        $(".btcpaywall_tipping_selected_template div").text('Donation Page')
        $('.btcpaywall_tipping_page').addClass("common")
        $('.btcpaywall_tipping_banner_and_page').removeClass("common")
        $('.btcpaywall_tipping_banner_and_page').addClass("common")
        $('.btcpaywall_tipping_box').removeClass('common')
        $('.btcpaywall_tipping_banner_and_box').removeClass("common")
        $('.btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]').css("display", "block")
      } else if (template_id == 'btcpaywall_tipping_banner_high' || template_id == 'btcpaywall_tipping_banner_wide') {
        var text = template_id == 'btcpaywall_tipping_banner_high' ? 'Tipping Banner High' : 'Tipping Banner Wide';
        $(".btcpaywall_tipping_selected_template div").text(text)

        $('.btcpaywall_tipping_banner_and_page').addClass("common")
        $('.btcpaywall_tipping_banner_and_box').addClass("common")
        $('.btcpaywall_tipping_page').removeClass("common")
        $('.btcpaywall_tipping_box').removeClass('common')
        $('.btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]').css("display", "block")
      } else if (template_id == 'btcpaywall_tipping_box') {
        $(".btcpaywall_tipping_selected_template div").text('Tipping Box')

        $('.btcpaywall_tipping_box').addClass('common')
        $('.btcpaywall_tipping_banner_and_box').addClass("common")
        $('.btcpaywall_tipping_banner_and_page').removeClass("common")
        $('.btcpaywall_tipping_page').removeClass('common')
        $('.btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]').css("display", "none")
      }
    })


  });

})(jQuery);