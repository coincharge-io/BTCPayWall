;(function ($) {
  'use strict'

  $(document).ready(function () {
    $('.btcpw_pay_per_post_button_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('#btcpw_pay__button_preview').css('backgroundColor', $(this).val())
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_post_background').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay_preview.pay_per_post').css(
          'backgroundColor',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })

    $('.btcpw_pay_per_post_header_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__content_preview.pay_per_post h2').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_post_info_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__content_preview.pay_per_post p').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })

    $('.btcpw_pay_per_post_button_text_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('#btcpw_pay__button_preview').css('color', $(this).val())
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('#btcpw_pay_per_post_title').on('input', function () {
      $('.btcpw_pay__content_preview.pay_per_post h2').text($(this).val())
    })
    $('#btcpw_pay_per_post_info').on('change input', function () {
      $('.btcpw_pay__content_preview.pay_per_post p').text($(this).val())
    })
    $('#btcpw_pay_per_post_button').on('input', function () {
      $('#btcpw_pay__button_preview').text($(this).val())
    })
    $('#btcpw_pay_per_post_show_help_link').change(function () {
      $('.btcpw_help_preview.pay_per_post').toggle()
    })
    $('#btcpw_pay_per_post_help_link_text').on('input', function () {
      $('.btcpw_help__link_preview.pay_per_post a').text($(this).val())
    })
    $('#btcpw_pay_per_post_help_link').on('input', function () {
      $('.btcpw_help__link_preview.pay_per_post').attr('href', $(this).val())
    })
    $('#btcpw_pay_per_post_show_additional_help_link').change(function () {
      $('.btcpw_additional_help_preview.pay_per_post').toggle()
    })
    $('#btcpw_pay_per_post_additional_help_link_text').on('input', function () {
      $('.btcpw_additional_help_preview.pay_per_post a').text($(this).val())
    })
    $('#btcpw_pay_per_post_additional_help_link').on('input', function () {
      $('.btcpw_help__additional_link_preview.pay_per_post').attr(
        'href',
        $(this).val()
      )
    })
    $(
      '.btcpw_pay_per_post_price_placeholder, .btcpw_pay_per_post_currency_placeholder, .btcpw_pay_per_post_duration_placeholder, .btcpw_pay_per_post_duration_type_placeholder'
    ).click(function () {
      var buttonValue = $(this).val()
      $('#btcpw_pay_per_post_info').val(function () {
        $(this).focus()
        return $(this).prop('value') + ' ' + buttonValue
      })
      $('#btcpw_pay_per_post_info').trigger('change')
    })

    $('#btcpw_pay_per_view_show_help_link').change(function () {
      $('.btcpw_help_preview.pay_per_view').toggle()
    })
    $('#btcpw_pay_per_view_help_link_text a').on('input', function () {
      $('.btcpw_help__link_preview.pay_per_view a').text($(this).val())
    })
    $('#btcpw_pay_per_view_help_link').on('input', function () {
      $('.btcpw_help__link_preview.pay_per_view').attr('href', $(this).val())
    })
    $('#btcpw_pay_per_view_show_additional_help_link').change(function () {
      $('.btcpw_additional_help_preview.pay_per_view').toggle()
    })
    $('#btcpw_pay_per_view_additional_help_link_text').on('input', function () {
      $('.btcpw_additional_help_preview.pay_per_view a').text($(this).val())
    })
    $('#btcpw_pay_per_view_additional_help_link').on('input', function () {
      $('.btcpw_additional_help__link_preview.pay_per_view').attr(
        'href',
        $(this).val()
      )
    })
    $('#btcpw_pay_per_view_title').on('input', function () {
      $('.btcpw_pay__content_preview.pay_per_view h2').text($(this).val())
    })
    $('#btcpw_pay_per_view_info').on('change input', function () {
      $('.btcpw_pay__content_preview.pay_per_view p').text($(this).val())
    })
    $('#btcpw_pay_per_view_button').on('input', function () {
      $('#btcpw_pay__button_preview_pay_per_view').text($(this).val())
    })
    $(
      '.btcpw_pay_per_view_price_placeholder, .btcpw_pay_per_view_currency_placeholder, .btcpw_pay_per_view_duration_placeholder, .btcpw_pay_per_view_duration_type_placeholder'
    ).click(function () {
      var buttonValue = $(this).val()
      $('#btcpw_pay_per_view_info').val(function () {
        $(this).focus()
        return $(this).prop('value') + ' ' + buttonValue
      })
      $('#btcpw_pay_per_view_info').trigger('change')
    })
    $('.btcpw_pay_per_view_button_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('#btcpw_pay__button_preview_pay_per_view').css(
          'backgroundColor',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_view_background').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay_preview.pay_per_view').css(
          'backgroundColor',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })

    $('.btcpw_pay_per_view_header_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__content_preview.pay_per_view h2').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_view_info_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__content_preview.pay_per_view p').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })

    $('.btcpw_pay_per_view_button_text_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('#btcpw_pay__button_preview_pay_per_view').css('color', $(this).val())
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_view_preview_title_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__preview_preview.pay_per_view h2').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_view_preview_description_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__preview_preview.pay_per_view p').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('#btcpw_pay_per_file_title').on('input', function () {
      $('.btcpw_pay__content_preview.pay_per_file h2').text($(this).val())
    })
    $('#btcpw_pay_per_file_info').on('change input', function () {
      $('.btcpw_pay__content_preview.pay_per_file p').text($(this).val())
    })
    $('#btcpw_pay_per_file_button').on('input', function () {
      $('#btcpw_pay__button_preview_pay_per_file').text($(this).val())
    })
    $('#btcpw_pay_per_file_show_help_link').change(function () {
      $('.btcpw_help_preview.pay_per_file').toggle()
    })
    $('#btcpw_pay_per_file_help_link_text').on('input', function () {
      $('.btcpw_help__link_preview.pay_per_file a').text($(this).val())
    })
    $('#btcpw_pay_per_file_help_link').on('input', function () {
      $('.btcpw_help__link_preview.pay_per_file').attr('href', $(this).val())
    })
    $('#btcpw_pay_per_file_show_additional_help_link').change(function () {
      $('.btcpw_additional_help_preview.pay_per_file').toggle()
    })
    $('#btcpw_pay_per_file_additional_help_link_text').on('input', function () {
      $('.btcpw_additional_help_preview.pay_per_file a').text($(this).val())
    })
    $('#btcpw_pay_per_file_additional_help_link').on('input', function () {
      $('.btcpw_additional_help__link_preview.pay_per_file').attr(
        'href',
        $(this).val()
      )
    })
    $(
      '.btcpw_pay_per_file_price_placeholder, .btcpw_pay_per_file_currency_placeholder, .btcpw_pay_per_file_duration_placeholder, .btcpw_pay_per_file_duration_type_placeholder'
    ).click(function () {
      var buttonValue = $(this).val()
      $('#btcpw_pay_per_file_info').val(function () {
        $(this).focus()
        return $(this).prop('value') + ' ' + buttonValue
      })
      $('#btcpw_pay_per_file_info').trigger('change')
    })
    $('.btcpw_pay_per_file_button_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('#btcpw_pay__button_preview_pay_per_file').css(
          'backgroundColor',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_file_background').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay_preview.pay_per_file').css(
          'backgroundColor',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })

    $('.btcpw_pay_per_file_header_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__content_preview.pay_per_file h2').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_file_info_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__content_preview.pay_per_file p').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })

    $('.btcpw_pay_per_file_button_text_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('#btcpw_pay__button_preview_pay_per_file').css('color', $(this).val())
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_file_preview_title_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__preview_preview.pay_per_file h2').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
    $('.btcpw_pay_per_file_preview_description_color').iris({
      defaultColor: true,

      change: function (event, ui) {
        $('.btcpw_pay__preview_preview.pay_per_file p').css(
          'color',
          $(this).val()
        )
      },

      clear: function () {},

      hide: true,

      palettes: true
    })
  })
})(jQuery)
