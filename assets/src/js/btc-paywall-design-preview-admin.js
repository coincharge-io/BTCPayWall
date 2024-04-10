(function($) {
  "use strict";

  $(document).ready(function() {
    $("#btcpw_general_settings_duration_type").change(function() {
      if ($(this).val() === "unlimited" || $(this).val() === "onetime") {
        $("#btcpw_general_settings_duration").prop("disabled", true);
      } else {
        $("#btcpw_general_settings_duration").prop("disabled", false);
      }
    });
    $(
      ".btcpw_pay_per_post_button_color, .btcpaywall_pay_per_post_button_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $("#btcpw_pay__button_preview").css(
          "backgroundColor",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $(
      ".btcpw_pay_per_post_button_color_hover, .btcpaywall_pay_per_post_button_color_hover"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $("#btcpw_pay__button_preview").css(
          "backgroundColor",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $(
      ".btcpw_pay_per_post_background, .btcpaywall_pay_per_post_background"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(".btcpw_pay_preview.pay_per_post").css(
          "backgroundColor",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(
      ".btcpw_pay_per_post_header_color, .btcpaywall_pay_per_post_title_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(".btcpw_pay__content_preview.pay_per_post h2").css(
          "color",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $(
      ".btcpw_pay_per_post_info_color, .btcpaywall_pay_per_post_info_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(".btcpw_pay__content_preview.pay_per_post p").css(
          "color",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(
      ".btcpw_pay_per_post_button_text_color, .btcpaywall_pay_per_post_button_text_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $("#btcpw_pay__button_preview").css("color", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $("#btcpw_pay_per_post_title, #btcpaywall_pay_per_post_title").on(
      "input",
      function() {
        $(
          ".btcpw_pay__content_preview.pay_per_post h2, .btcpaywall_pay__content_preview.pay_per_post h2"
        ).text($(this).val());
      }
    );
    $("#btcpw_pay_per_post_width, #btcpaywall_pay_per_post_width").on(
      "input, change",
      function() {
        $(
          ".btcpw_pay_preview.pay_per_post, .btcpaywall_pay_preview.pay_per_post"
        ).css("width", $(this).val() + "px");
      }
    );
    $("#btcpw_pay_per_post_height, #btcpaywall_pay_per_post_height").on(
      "input, change",
      function() {
        $(
          ".btcpw_pay_preview.pay_per_post, .btcpaywall_pay_preview.pay_per_post"
        ).css("height", $(this).val() + "px");
      }
    );
    $("#btcpaywall_pay_per_post_info").on("change input", function() {
      var mapObj = {
        "{price}": $("#btcpaywall_pay_per_post_price").val(),
        "{currency}": $("#btcpaywall_pay_per_post_currency").val(),
        "{duration}":
          $("#btcpaywall_pay_per_post_duration_type").val() == "onetime" ||
            $("#btcpaywall_pay_per_post_duration_type").val() == "unlimited"
            ? ""
            : $("#btcpaywall_pay_per_post_duration").val(),
        "{dtype}": $("#btcpaywall_pay_per_post_duration_type").val(),
      };
      $(".btcpw_pay__content_preview.pay_per_post p").text($(this).val());
      $(".btcpw_pay__content_preview.pay_per_post p").text(
        $(".btcpw_pay__content_preview.pay_per_post p")
          .text()
          .replaceAll(
            /\{price\}|\{currency\}|\{duration\}|\{dtype\}/gi,
            function(matched) {
              return mapObj[matched];
            }
          )
      );
    });
    $("#btcpw_pay_per_post_button,#btcpaywall_pay_per_post_button").on(
      "input",
      function() {
        $("#btcpw_pay__button_preview").text($(this).val());
      }
    );
    $(
      "#btcpw_pay_per_post_show_help_link, #btcpaywall_pay_per_post_show_help_link"
    ).change(function() {
      $(
        ".btcpw_help_preview.pay_per_post, .btcpaywall_help_preview.pay_per_post"
      ).toggle();
    });
    $(
      "#btcpw_pay_per_post_help_link_text, #btcpaywall_pay_per_post_help_link_text"
    ).on("input", function() {
      $(
        ".btcpw_help_preview.pay_per_post a, .btcpaywall_help__link_preview.pay_per_post a"
      ).text($(this).val());
    });
    $("#btcpw_pay_per_post_help_link, #btcpaywall_pay_per_post_help_link").on(
      "input",
      function() {
        $(
          ".btcpw_help__link_preview.pay_per_post, .btcpaywall_help__link_preview.pay_per_post"
        ).attr("href", $(this).val());
      }
    );
    $(
      "#btcpw_pay_per_post_show_additional_help_link, #btcpaywall_pay_per_post_show_additional_help_link"
    ).change(function() {
      $(
        ".btcpw_additional_help_preview.pay_per_post, .btcpaywall_additional_help_preview.pay_per_post"
      ).toggle();
    });
    $(
      "#btcpw_pay_per_post_additional_help_link_text, #btcpaywall_pay_per_post_additional_help_link_text"
    ).on("input", function() {
      $(
        ".btcpw_additional_help_preview.pay_per_post a, .btcpaywall_additional_help_preview.pay_per_post a"
      ).text($(this).val());
    });
    $(
      "#btcpw_pay_per_post_additional_help_link, #btcpaywall_pay_per_post_additional_help_link"
    ).on("input", function() {
      $(
        ".btcpw_help__additional_link_preview.pay_per_post, .btcpaywall_help__additional_link_preview.pay_per_post"
      ).attr("href", $(this).val());
    });
    $("#btcpaywall_pay_per_post_duration_type").change(function() {
      if ($(this).val() === "unlimited" || $(this).val() === "onetime") {
        $("#btcpaywall_pay_per_post_duration").prop({
          required: false,
          disabled: true,
        });
        $("#btcpaywall_pay_per_post_duration").val("");
      } else {
        $("#btcpaywall_pay_per_post_duration").prop({
          required: true,
          disabled: false,
        });
      }
    });
    $(
      ".btcpw_pay_per_post_price_placeholder, .btcpw_pay_per_post_currency_placeholder, .btcpw_pay_per_post_duration_placeholder, .btcpw_pay_per_post_duration_type_placeholder, .btcpaywall_pay_per_post_price_placeholder, .btcpaywall_pay_per_post_currency_placeholder, .btcpaywall_pay_per_post_duration_placeholder, .btcpaywall_pay_per_post_duration_type_placeholder"
    ).on("click", function() {
      var buttonValue = $(this).val();
      $("#btcpw_pay_per_post_info, #btcpaywall_pay_per_post_info").val(
        function() {
          $(this).focus();
          return $(this).prop("value") + " " + buttonValue;
        }
      );

      $("#btcpw_pay_per_post_info, #btcpaywall_pay_per_post_info").trigger(
        "change"
      );
    });

    $(
      "#btcpw_pay_per_view_show_help_link, #btcpaywall_pay_per_view_show_help_link"
    ).change(function() {
      $(
        ".btcpw_help_preview.pay_per_view, .btcpaywall_help_preview.pay_per_view"
      ).toggle();
    });
    $(
      "#btcpw_pay_per_view_help_link_text, #btcpaywall_pay_per_view_help_link_text"
    ).on("input", function() {
      $(
        ".btcpw_help_preview.pay_per_view a,.btcpaywall_help_preview.pay_per_view a"
      ).text($(this).val());
    });
    $("#btcpw_pay_per_view_help_link, #btcpaywall_pay_per_view_help_link").on(
      "input",
      function() {
        $(
          ".btcpw_help__link_preview.pay_per_view, .btcpaywall_help__link_preview.pay_per_view"
        ).attr("href", $(this).val());
      }
    );
    $(
      "#btcpw_pay_per_view_show_additional_help_link, #btcpaywall_pay_per_view_show_additional_help_link"
    ).change(function() {
      $(
        ".btcpw_additional_help_preview.pay_per_view, .btcpaywall_additional_help_preview.pay_per_view"
      ).toggle();
    });
    $(
      "#btcpw_pay_per_view_additional_help_link_text, #btcpaywall_pay_per_view_additional_help_link_text"
    ).on("input", function() {
      $(
        ".btcpw_additional_help_preview.pay_per_view a, .btcpaywall_additional_help_preview.pay_per_view a"
      ).text($(this).val());
    });
    $(
      "#btcpw_pay_per_view_additional_help_link, #btcpaywall_pay_per_view_additional_help_link"
    ).on("input", function() {
      $(
        ".btcpw_additional_help__link_preview.pay_per_view, .btcpaywall_additional_help__link_preview.pay_per_view"
      ).attr("href", $(this).val());
    });
    $("#btcpw_pay_per_view_title, #btcpaywall_pay_per_view_title").on(
      "input",
      function() {
        $(
          ".btcpw_pay__content_preview.pay_per_view h2, .btcpaywall_pay__content_preview.pay_per_view h2"
        ).text($(this).val());
      }
    );
    $("#btcpw_pay_per_view_info, #btcpaywall_pay_per_view_info").on(
      "change input",
      function() {
        $(".btcpw_pay__content_preview.pay_per_view p").text($(this).val());
        var mapObj = {
          "{price}": $("#btcpaywall_pay_per_view_price").val(),
          "{currency}": $("#btcpaywall_pay_per_view_currency").val(),
          "{duration}":
            $("#btcpaywall_pay_per_view_duration_type").val() == "onetime" ||
              $("#btcpaywall_pay_per_view_duration_type").val() == "unlimited"
              ? ""
              : $("#btcpaywall_pay_per_view_duration").val(),
          "{dtype}": $("#btcpaywall_pay_per_view_duration_type").val(),
        };
        $(".btcpw_pay__content_preview.pay_per_view p").text(
          $(".btcpw_pay__content_preview.pay_per_view p")
            .text()
            .replaceAll(
              /\{price\}|\{currency\}|\{duration\}|\{dtype\}/gi,
              function(matched) {
                return mapObj[matched];
              }
            )
        );
      }
    );
    $("#btcpw_pay_per_view_button, #btcpaywall_pay_per_view_button").on(
      "input",
      function() {
        $(
          "#btcpw_pay__button_preview_pay_per_view, #btcpaywall_pay__button_preview_pay_per_view"
        ).text($(this).val());
      }
    );
    $("#btcpw_pay_per_view_width, #btcpaywall_pay_per_view_width").on(
      "input, change",
      function() {
        $(
          ".btcpw_pay_preview.pay_per_view, .btcpaywall_pay_preview.pay_per_view"
        ).css("width", $(this).val() + "px");
      }
    );
    $("#btcpw_pay_per_view_height, #btcpaywall_pay_per_view_height").on(
      "input, change",
      function() {
        $(
          ".btcpw_pay_preview.pay_per_view, .btcpaywall_pay_preview.pay_per_view"
        ).css("height", $(this).val() + "px");
      }
    );
    $(
      ".btcpw_pay_per_view_price_placeholder, .btcpw_pay_per_view_currency_placeholder, .btcpw_pay_per_view_duration_placeholder, .btcpw_pay_per_view_duration_type_placeholder, .btcpaywall_pay_per_view_price_placeholder, .btcpaywall_pay_per_view_currency_placeholder, .btcpaywall_pay_per_view_duration_placeholder, .btcpaywall_pay_per_view_duration_type_placeholder"
    ).on("click", function() {
      var buttonValue = $(this).val();
      $("#btcpw_pay_per_view_info, #btcpaywall_pay_per_view_info").val(
        function() {
          $(this).focus();
          return $(this).prop("value") + " " + buttonValue;
        }
      );
      $("#btcpw_pay_per_view_info, #btcpaywall_pay_per_view_info").trigger(
        "change"
      );
    });
    $(
      ".btcpw_pay_per_view_button_color, #btcpaywall_pay_per_view_button_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          "#btcpw_pay__button_preview_pay_per_view, #btcpaywall_pay__button_preview_pay_per_view"
        ).css("backgroundColor", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(
      ".btcpw_pay_per_view_button_color_hover, #btcpaywall_pay_per_view_button_color_hover"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $("#btcpw_pay__button_preview:hover").css(
          "backgroundColor",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(
      ".btcpw_pay_per_view_background, #btcpaywall_pay_per_view_background"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          ".btcpw_pay_preview.pay_per_view, .btcpaywall_pay_preview.pay_per_view"
        ).css("backgroundColor", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $("#btcpaywall_pay_per_view_preview_title").on("input", function() {
      $(".btcpw_pay__preview_preview.preview_description h3").text(
        $(this).val()
      );
    });
    $("#btcpaywall_pay_per_view_preview_description").on(
      "change input",
      function() {
        $(".btcpw_pay__preview_preview.preview_description p").text(
          $(this).val()
        );
      }
    );
    $(
      ".btcpw_pay_per_view_header_color, #btcpaywall_pay_per_view_preview_title_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          ".btcpw_pay__content_preview.pay_per_view h2, .btcpaywall_pay__content_preview.pay_per_view h2"
        ).css("color", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $(
      ".btcpw_pay_per_view_info_color, #btcpaywall_pay_per_view_info_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          ".btcpw_pay__content_preview.pay_per_view p, .btcpaywall_pay__content_preview.pay_per_view p"
        ).css("color", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(
      ".btcpw_pay_per_view_button_text_color, #btcpaywall_pay_per_view_button_text_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          "#btcpw_pay__button_preview_pay_per_view, #btcpaywall_pay__button_preview_pay_per_view"
        ).css("color", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(".btcpaywall_pay_per_view_title_color").iris({
      defaultColor: true,

      change: function(event, ui) {
        $(".btcpw_pay__content_preview.pay_per_view h2").css(
          "color",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $(
      "#btcpaywall_pay_per_view_duration_type, #btcpaywall_pay_per_view_duration,#btcpaywall_pay_per_view_price,#btcpaywall_pay_per_view_currency"
    ).change(function() {
      $("#btcpaywall_pay_per_view_info").trigger("change");
    });
    $(
      "#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_post_duration,#btcpaywall_pay_per_post_price,#btcpaywall_pay_per_post_currency"
    ).change(function() {
      $("#btcpaywall_pay_per_post_info").trigger("change");
    });
    $("#btcpaywall_pay_per_view_duration_type").change(function() {
      if ($(this).val() === "unlimited" || $(this).val() === "onetime") {
        $("#btcpaywall_pay_per_view_duration").prop({
          required: false,
          disabled: true,
        });
        $("#btcpaywall_pay_per_view_duration").val("");
      } else {
        $("#btcpaywall_pay_per_view_duration").prop({
          required: true,
          disabled: false,
        });
      }
    });
    $(
      ".btcpw_pay_per_view_preview_title_color, #btcpaywall_pay_per_view_preview_title_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          ".btcpw_pay__preview_preview.pay_per_view h2, .btcpw_pay__preview_preview.preview_description h3"
        ).css("color", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $(
      ".btcpw_pay_per_view_preview_description_color, #btcpaywall_pay_per_view_preview_description_color"
    ).iris({
      defaultColor: true,

      change: function(event, ui) {
        $(
          ".btcpw_pay__preview_preview.pay_per_view p, .btcpw_pay__preview_preview.preview_description p"
        ).css("color", ui.color.toString());
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
    $("#btcpw_pay_per_file_button").on("input", function() {
      $(".btcpw_pay_preview.content_store button").text($(this).val());
    });

    $(".btcpw_pay_per_file_button_color").iris({
      defaultColor: true,

      change: function(event, ui) {
        $(".btcpw_pay_preview.content_store button").css(
          "backgroundColor",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });

    $(".btcpw_pay_per_file_button_text_color").iris({
      defaultColor: true,

      change: function(event, ui) {
        $(".btcpw_pay_preview.content_store button").css(
          "color",
          ui.color.toString()
        );
      },

      clear: function() { },

      hide: true,

      palettes: true,
    });
  });
})(jQuery);
