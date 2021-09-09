;(function ($) {
  'use strict'

  $(document).ready(function () {
    var eur, usd, sats
    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      method: 'GET',
      data: {
        action: 'btcpw_convert_currencies'
      },
      success: function (response) {
        if (response.success) {
          eur = response['data']['eur']['value']
          usd = response['data']['usd']['value']
          sats = response['data']['sats']['value']
        } else {
          console.error(response)
        }
      }
    })
    $('#preview_btcpw_tipping_amount').on('input', function () {
      var currency = $('#preview_btcpw_tipping_currency').val()
      var amount = $(this).val()
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
      $('#preview_btcpw_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_converted_currency')
        .attr('readonly', false)
        .val(get_currency(currency))
        .attr('readonly', true)
    })

    $('#preview_btcpw_tipping_amount_btcpw_widget').on('input', function () {
      var currency = $('#preview_btcpw_tipping_currency_btcpw_widget').val()
      var amount = $(this).val()
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
      $('#preview_btcpw_converted_amount_btcpw_widget')
        .attr('readonly', false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_converted_currency_btcpw_widget')
        .attr('readonly', false)
        .val(get_currency(currency))
        .attr('readonly', true)
    })

    $('#preview_btcpw_page_tipping_amount').on('input', function () {
      var currency = $('#preview_btcpw_page_tipping_currency').val()
      var amount = $(this).val()
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
      $('#preview_btcpw_page_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_page_converted_currency')
        .attr('readonly', false)
        .val(get_currency(currency))
        .attr('readonly', true)
    })

    $('#preview_btcpw_widget_btcpw_skyscraper_tipping_amount_high').on(
      'input',
      function () {
        var currency = $(
          '#preview_btcpw_widget_btcpw_skyscraper_tipping_currency_high'
        ).val()
        var amount = $(this).val()
        var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
        $('#preview_btcpw_widget_btcpw_skyscraper_converted_amount_high')
          .attr('readonly', false)
          .val(fiat_to_crypto(currency, amount, usd, eur, sats))
          .attr('readonly', true)
        $('#preview_btcpw_widget_btcpw_skyscraper_converted_currency_high')
          .attr('readonly', false)
          .val(get_currency(currency))
          .attr('readonly', true)
      }
    )

    $('#preview_btcpw_widget_btcpw_skyscraper_tipping_amount_wide').on(
      'input',
      function () {
        var currency = $(
          '#preview_btcpw_widget_btcpw_skyscraper_tipping_currency_wide'
        ).val()
        var amount = $(this).val()
        var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
        $('#preview_btcpw_widget_btcpw_skyscraper_converted_amount_wide')
          .attr('readonly', false)
          .val(fiat_to_crypto(currency, amount, usd, eur, sats))
          .attr('readonly', true)
        $('#preview_btcpw_widget_btcpw_skyscraper_converted_currency_wide')
          .attr('readonly', false)
          .val(get_currency(currency))
          .attr('readonly', true)
      }
    )
    /* $("#btcpw_skyscraper_tipping_amount").on("input", function () {
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
    }); */

    $('#preview_btcpw_skyscraper_tipping_high_amount').on('input', function () {
      var currency = $('#preview_btcpw_skyscraper_tipping_high_currency').val()
      var amount = $(this).val()
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
      $('#preview_btcpw_skyscraper_high_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_skyscraper_high_converted_currency')
        .attr('readonly', false)
        .val(get_currency(currency))
        .attr('readonly', true)
    })
    $(
      '#preview_value_1_high, #preview_value_2_high, #preview_value_3_high'
    ).change(function () {
      if ($(this).is(':checked')) {
        var predefined = $(this)
          .val()
          .split(' ')
        var converted_icon = fiat_to_crypto(
          predefined[1],
          predefined[0],
          usd,
          eur,
          sats
        )
        var converted_icon_amount =
          fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
          ' ' +
          get_currency(predefined[1])
        $('#preview_btcpw_skyscraper_high_converted_amount')
          .attr('readonly', false)
          .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
          .attr('readonly', true)
        $('#preview_btcpw_skyscraper_high_converted_currency')
          .attr('readonly', false)
          .val(get_currency(predefined[1]))
          .attr('readonly', true)
      }
    })
    /* $("#value_1, #value_2, #value_3").change(function () {
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
    }); */
    $('#preview_btcpw_skyscraper_tipping_wide_amount').on('input', function () {
      var currency = $('#preview_btcpw_skyscraper_tipping_wide_currency').val()
      var amount = $(this).val()
      var converted = fiat_to_crypto(currency, amount, usd, eur, sats)
      $('#preview_btcpw_skyscraper_wide_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(currency, amount, usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_skyscraper_wide_converted_currency')
        .attr('readonly', false)
        .val(get_currency(currency))
        .attr('readonly', true)
    })
    $(
      '#preview_value_1_wide, #preview_value_2_wide, #preview_value_3_wide'
    ).change(function () {
      if ($(this).is(':checked')) {
        var predefined = $(this)
          .val()
          .split(' ')
        var converted_icon = fiat_to_crypto(
          predefined[1],
          predefined[0],
          usd,
          eur,
          sats
        )
        var converted_icon_amount =
          fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
          ' ' +
          get_currency(predefined[1])
        $('#preview_btcpw_skyscraper_wide_converted_amount')
          .attr('readonly', false)
          .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
          .attr('readonly', true)
        $('#preview_btcpw_skyscraper_wide_converted_currency')
          .attr('readonly', false)
          .val(get_currency(predefined[1]))
          .attr('readonly', true)
      }
    })
    $(
      '.preview_btcpw_page_amount_value_1, .preview_btcpw_page_amount_value_2, .preview_btcpw_page_amount_value_3'
    ).click(function () {
      switch ($(this)[0].className) {
        case 'preview_btcpw_page_amount_value_1':
          $('.preview_btcpw_page_amount_value_2').removeClass('selected')
          $('.preview_btcpw_page_amount_value_3').removeClass('selected')
          break
        case 'preview_btcpw_page_amount_value_2':
          $('.preview_btcpw_page_amount_value_1').removeClass('selected')
          $('.preview_btcpw_page_amount_value_3').removeClass('selected')
          break
        case 'preview_btcpw_page_amount_value_3':
          $('.preview_btcpw_page_amount_value_1').removeClass('selected')
          $('.preview_btcpw_page_amount_value_2').removeClass('selected')
          break
        default:
          $('.preview_btcpw_page_amount_value_1').removeClass('selected')
          $('.preview_btcpw_page_amount_value_2').removeClass('selected')
          $('.preview_btcpw_page_amount_value_3').removeClass('selected')
      }
      $(this)
        .children()
        .find('input:radio')
        .prop('checked', true)
        .change()
      if (
        $(this)
          .children()
          .find('input:radio')
          .is(':checked')
      ) {
        $(this).toggleClass('selected')
      }
      var predefined = $(this)
        .children()
        .find('input:radio')
        .val()
        .split(' ')
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      )
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        ' ' +
        get_currency(predefined[1])
      $('#preview_btcpw_page_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_page_converted_currency')
        .attr('readonly', false)
        .val(get_currency(predefined[1]))
        .attr('readonly', true)
    })

    $(
      '.preview_btcpw_skyscraper_amount_value_1.high, .preview_btcpw_skyscraper_amount_value_2.high, .preview_btcpw_skyscraper_amount_value_3.high'
    ).click(function () {
      switch ($(this)[0].className) {
        case 'preview_btcpw_skyscraper_amount_value_1.high':
          $('.preview_btcpw_skyscraper_amount_value_2.high').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_3.high').removeClass(
            'selected'
          )
          break
        case 'preview_btcpw_skyscraper_amount_value_2.high':
          $('.preview_btcpw_skyscraper_amount_value_1.high').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_3.high').removeClass(
            'selected'
          )
          break
        case 'preview_btcpw_skyscraper_amount_value_3.high':
          $('.preview_btcpw_skyscraper_amount_value_1.high').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_2.high').removeClass(
            'selected'
          )
          break
        default:
          $('.preview_btcpw_skyscraper_amount_value_1.high').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_2.high').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_3.high').removeClass(
            'selected'
          )
      }
      $(this)
        .children()
        .find('input:radio')
        .prop('checked', true)
        .change()
      if (
        $(this)
          .children()
          .find('input:radio')
          .is(':checked')
      ) {
        $(this).toggleClass('selected')
      }
      var predefined = $(this)
        .children()
        .find('input:radio')
        .val()
        .split(' ')
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      )
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        ' ' +
        get_currency(predefined[1])
      $('#preview_btcpw_skyscraper_high_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_skyscraper_high_converted_currency')
        .attr('readonly', false)
        .val(get_currency(predefined[1]))
        .attr('readonly', true)
    })
    $(
      '.preview_btcpw_skyscraper_amount_value_1.wide, .preview_btcpw_skyscraper_amount_value_2.wide, .preview_btcpw_skyscraper_amount_value_3.wide'
    ).click(function () {
      switch ($(this)[0].className) {
        case 'preview_btcpw_skyscraper_amount_value_1.wide':
          $('.preview_btcpw_skyscraper_amount_value_2.wide').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_3.wide').removeClass(
            'selected'
          )
          break
        case 'preview_btcpw_skyscraper_amount_value_2.wide':
          $('.preview_btcpw_skyscraper_amount_value_1.wide').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_3.wide').removeClass(
            'selected'
          )
          break
        case 'preview_btcpw_skyscraper_amount_value_3.wide':
          $('.preview_btcpw_skyscraper_amount_value_1.wide').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_2.wide').removeClass(
            'selected'
          )
          break
        default:
          $('.preview_btcpw_skyscraper_amount_value_1.wide').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_2.wide').removeClass(
            'selected'
          )
          $('.preview_btcpw_skyscraper_amount_value_3.wide').removeClass(
            'selected'
          )
      }
      $(this)
        .children()
        .find('input:radio')
        .prop('checked', true)
        .change()
      if (
        $(this)
          .children()
          .find('input:radio')
          .is(':checked')
      ) {
        $(this).toggleClass('selected')
      }
      var predefined = $(this)
        .children()
        .find('input:radio')
        .val()
        .split(' ')
      var converted_icon = fiat_to_crypto(
        predefined[1],
        predefined[0],
        usd,
        eur,
        sats
      )
      var converted_icon_amount =
        fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats) +
        ' ' +
        get_currency(predefined[1])
      $('#preview_btcpw_skyscraper_wide_converted_amount')
        .attr('readonly', false)
        .val(fiat_to_crypto(predefined[1], predefined[0], usd, eur, sats))
        .attr('readonly', true)
      $('#preview_btcpw_skyscraper_converted_wide_currency')
        .attr('readonly', false)
        .val(get_currency(predefined[1]))
        .attr('readonly', true)
    })
  })
  function fiat_to_crypto (currency, val, usd, eur, sats) {
    var value = Number(val)
    switch (currency) {
      case 'BTC':
        return (value * usd).toFixed(2)
      case 'USD':
        return ((sats / usd) * value).toFixed(0)
      case 'EUR':
        return ((sats / eur) * value).toFixed(0)
      default:
        return ((usd / sats) * value).toFixed(2)
    }
  }
  function get_currency (currency) {
    switch (currency) {
      case 'BTC':
        return 'USD'
      case 'USD':
        return 'SATS'
      case 'EUR':
        return 'SATS'
      default:
        return 'USD'
    }
  }

  $(document).ready(function () {
    $('input[type=radio][name=preview_btcpw_tipping_default_amount]').change(
      function () {
        $('input[type=radio][name=preview_btcpw_tipping_default_amount]').attr(
          'required',
          true
        )
        $('#preview_btcpw_tipping_amount').removeAttr('required')
        $('#preview_btcpw_tipping_amount').val('')
      }
    )
    $('#preview_btcpw_tipping_amount').click(function () {
      $('#preview_btcpw_tipping_amount').attr('required', true)
      $(
        'input[type=radio][name=preview_btcpw_tipping_default_amount]'
      ).removeAttr('required')
      $('input[type=radio][name=preview_btcpw_tipping_default_amount]').prop(
        'checked',
        false
      )
    })

    $(
      'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_wide]'
    ).change(function () {
      $(
        'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_wide]'
      ).attr('required', true)
      $('input[name=preview_btcpw_skyscraper_tipping_amount_wide]').removeAttr(
        'required'
      )
      $('input[name=preview_btcpw_skyscraper_tipping_amount_wide]').val('')
    })
    $('input[name=preview_btcpw_skyscraper_tipping_amount_wide]').click(
      function () {
        $('input[name=preview_btcpw_skyscraper_tipping_amount_wide]').attr(
          'required',
          true
        )
        $(
          'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_wide]'
        ).removeAttr('required')
        $(
          'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_wide]'
        ).prop('checked', false)
        $('.preview_btcpw_skyscraper_amount_value_1.wide').removeClass(
          'selected'
        )
        $('.preview_btcpw_skyscraper_amount_value_2.wide').removeClass(
          'selected'
        )
        $('.preview_btcpw_skyscraper_amount_value_3.wide').removeClass(
          'selected'
        )
      }
    )

    $(
      'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_high]'
    ).change(function () {
      $(
        'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_high]'
      ).attr('required', true)
      $('input[name=preview_btcpw_skyscraper_tipping_amount_high]').removeAttr(
        'required'
      )
      $('input[name=preview_btcpw_skyscraper_tipping_amount_high]').val('')
    })
    $('input[name=preview_btcpw_skyscraper_tipping_amount_high]').click(
      function () {
        $('input[name=preview_btcpw_skyscraper_tipping_amount_high]').attr(
          'required',
          true
        )
        $(
          'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_high]'
        ).removeAttr('required')
        $(
          'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_high]'
        ).prop('checked', false)
        $('.preview_btcpw_skyscraper_amount_value_1.high').removeClass(
          'selected'
        )
        $('.preview_btcpw_skyscraper_amount_value_2.high').removeClass(
          'selected'
        )
        $('.preview_btcpw_skyscraper_amount_value_3.high').removeClass(
          'selected'
        )
      }
    )

    $(
      'input[type=radio][name=preview_btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]'
    ).change(function () {
      $(
        'input[type=radio][name=preview_btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]'
      ).attr('required', true)
      $(
        'input[name=preview_btcpw_widget_btcpw_skyscraper_tipping_amount_wide]'
      ).removeAttr('required')
      $(
        'input[name=preview_btcpw_widget_btcpw_skyscraper_tipping_amount_wide]'
      ).val('')
    })
    $(
      'input[name=preview_btcpw_widget_btcpw_skyscraper_tipping_amount_wide]'
    ).click(function () {
      $(
        'input[name=preview_btcpw_widget_btcpw_skyscraper_tipping_amount_wide]'
      ).attr('required', true)
      $(
        'input[type=radio][name=preview_btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]'
      ).removeAttr('required')
      $(
        'input[type=radio][name=preview_btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]'
      ).prop('checked', false)
      $(
        '.preview_btcpw_widget.btcpw_skyscraper_amount_value_1.wide'
      ).removeClass('selected')
      $(
        '.preview_btcpw_widget.btcpw_skyscraper_amount_value_2.wide'
      ).removeClass('selected')
      $(
        '.preview_btcpw_widget.btcpw_skyscraper_amount_value_3.wide'
      ).removeClass('selected')
    })

    $(
      'input[type=radio][name=preview_btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]'
    ).change(function () {
      $(
        'input[type=radio][name=preview_btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]'
      ).attr('required', true)
      $(
        'input[name=preview_btcpw_widget_btcpw_skyscraper_tipping_amount_high]'
      ).removeAttr('required')
      $(
        'input[name=preview_btcpw_widget_btcpw_skyscraper_tipping_amount_high]'
      ).val('')
    })
  })

  $(document).ready(function () {
    $(
      'input[type=radio][name=preview_btcpw_page_tipping_default_amount]'
    ).change(function () {
      $(
        'input[type=radio][name=preview_btcpw_page_tipping_default_amount]'
      ).attr('required', true)
      $('#preview_btcpw_page_tipping_amount').removeAttr('required')
      $('#preview_btcpw_page_tipping_amount').val('')
    })
    $('#preview_btcpw_page_tipping_amount').click(function () {
      $('#preview_btcpw_page_tipping_amount').attr('required', true)
      $(
        'input[type=radio][name=preview_btcpw_page_tipping_default_amount]'
      ).removeAttr('required')
      $(
        'input[type=radio][name=preview_btcpw_page_tipping_default_amount]'
      ).prop('checked', false)
      $('.preview_btcpw_page_amount_value_1').removeClass('selected')
      $('.preview_btcpw_page_amount_value_2').removeClass('selected')
      $('.preview_btcpw_page_amount_value_3').removeClass('selected')
    })
  })

  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms
    total_forms = $('.preview_btcpw_page_tipping_container fieldset').length
    var freeInput = $('#preview_btcpw_page_tipping_amount')
    var fixedAmount = $('.preview_btcpw_page_tipping_default_amount')
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput

    $('input.page-next-form').click(function () {
      if (validationField[0].checkValidity()) {
        $('.preview_btcpw_page_bar_container.bar-1').removeClass('active')
        $('.preview_btcpw_page_bar_container.bar-2').addClass('active')
        previous_form = $(this)
          .parent()
          .parent()
        next_form = $(this)
          .parent()
          .parent()
          .next()
        next_form.show()
        previous_form.hide()
      } else {
        validationField[0].reportValidity()
      }
    })
    $('input.preview_page-previous-form').click(function () {
      $('.preview_btcpw_page_bar_container.bar-2').removeClass('active')
      $('.preview_btcpw_page_bar_container.bar-1').addClass('active')
      previous_form = $(this)
        .parent()
        .parent()
        .parent()
      next_form = $(this)
        .parent()
        .parent()
        .parent()
        .prev()
      next_form.show()
      previous_form.hide()
    })
  })
  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms
    total_forms = $('.preview_btcpw_skyscraper_tipping_container fieldset')
      .length
    var freeInput = $(
      'input[name=preview_btcpw_skyscraper_tipping_amount_high]'
    )
    var fixedAmount = $(
      'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_high]'
    )
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput

    $('input.skyscraper-next-form.high').click(function () {
      if (validationField[0].checkValidity()) {
        previous_form = $(this)
          .parent()
          .parent()
          .parent()
        next_form = $(this)
          .parent()
          .parent()
          .parent()
          .next()
        next_form.show()
        previous_form.hide()
      } else {
        validationField[0].reportValidity()
      }
    })
    $('input.preview_skyscraper-previous-form.high').click(function () {
      previous_form = $(this)
        .parent()
        .parent()
        .parent()
      next_form = $(this)
        .parent()
        .parent()
        .parent()
        .prev()
      next_form.show()
      previous_form.hide()
    })
  })

  $(document).ready(function () {
    var form_count = 1,
      previous_form,
      next_form,
      total_forms
    total_forms = $('.preview_btcpw_skyscraper_tipping_container fieldset')
      .length
    var freeInput = $(
      'input[name=preview_btcpw_skyscraper_tipping_amount_wide]'
    )
    var fixedAmount = $(
      'input[type=radio][name=preview_btcpw_skyscraper_tipping_default_amount_wide]'
    )
    var validationField =
      fixedAmount.length !== 0 && freeInput.length === 0
        ? fixedAmount
        : freeInput

    $('input.skyscraper-next-form.wide').click(function () {
      if (validationField[0].checkValidity()) {
        previous_form = $(this)
          .parent()
          .parent()
          .parent()
        next_form = $(this)
          .parent()
          .parent()
          .parent()
          .next()
        next_form.show()
        previous_form.hide()
      } else {
        validationField[0].reportValidity()
      }
    })
    $('input.preview_skyscraper-previous-form.wide').click(function () {
      previous_form = $(this)
        .parent()
        .parent()
        .parent()
      next_form = $(this)
        .parent()
        .parent()
        .parent()
        .prev()
      next_form.show()
      previous_form.hide()
    })
  })
})(jQuery)
