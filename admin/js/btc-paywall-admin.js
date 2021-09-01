;(function ($) {
  'use strict'

  $(document).ready(function () {
    $('#btcpw_btcpay_check_status').click(function () {
      $('.btcpw_btcpay_status').hide(500)
      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_check_greenfield_api_work',
          auth_key_view: $('#btcpw_btcpay_auth_key_view').val(),
          auth_key_create: $('#btcpw_btcpay_auth_key_create').val(),
          server_url: $('#btcpw_btcpay_server_url').val()
        },
        success: function (response) {
          if (response.success) {
            $('#btcpw_btcpay_store_id').val(response.data.store_id)
            $('#btcpw_btcpay_status_success').fadeIn(500)
          } else {
            $('#btcpw_btcpay_status_error')
              .html(response.data.message)
              .fadeIn(500)
          }
        },
        error: function (error) {
          console.log(error)
        }
      })
    })
  })
  $(document).ready(function () {
    $('#btcpw_default_currency').change(function () {
      var stepValue = $(this).val() === 'SATS' ? '1' : '0.50'

      $('#btcpw_default_price').attr({
        step: stepValue,
        value: parseInt($('#btcpw_default_price').val())
      })
    })
  })
  $(document).ready(function () {
    $('#btcpw_default_currency').change(function () {
      if ($('#btcpw_default_currency').val() !== 'SATS') {
        $('.btcpw_price_format').hide()
      } else {
        $('.btcpw_price_format').show()
      }
    })
  })
  $(document).ready(function () {
    $('#btcpw_default_duration_type').change(function () {
      var dtype = $(this).val()

      if (dtype === 'unlimited' || dtype === 'onetime') {
        $('#btcpw_default_duration').prop({ required: false, disabled: true })
      } else {
        $('#btcpw_default_duration').prop({ required: true, disabled: false })
      }
    })
  })
  function isValidUrl (url) {
    if (
      typeof url === 'string' &&
      (url.indexOf('http://') == 0 || url.indexOf('https://') == 0)
    ) {
      return true
    }

    return false
  }

  function formatUrl (url) {
    if (typeof url === 'string') {
      return url.replace(/^(.+?)\/*?$/, '$1')
    }

    return null
  }
  $(document).ready(function () {
    $('#btcpw_btcpay_server_url').change(function () {
      var url = formatUrl($(this).val())

      var redirectLink = $('.btcpw_auth_key')

      if (url.length == 0) {
        return
      }

      if (isValidUrl(url)) {
        url = url + '/Manage/APIKeys'
        redirectLink
          .attr('href', url)
          .html(url)
          .show()
      }
    })
  })
  function convertDate (d) {
    var year = d.getFullYear()
    var month = pad(d.getMonth() + 1)
    var day = pad(d.getDate())
    var hour = pad(d.getHours())
    var minutes = pad(d.getMinutes())

    return year + '-' + month + '-' + day + ' ' + hour + ':' + minutes
  }

  function pad (num) {
    var num = '0' + num
    return num.slice(-2)
  }
  $('#design-button').click(function (e) {
    e.preventDefault()
  })
  $(document).ready(function () {
    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      method: 'GET',
      data: {
        action: 'btcpw_get_greenfield_invoices'
      },
      success: function (response) {
        if (response.success) {
          var data = JSON.parse(JSON.stringify(response['data']))

          var body = $('.section.invoices')

          $.each(data, function (i, value) {
            var parseUrl = value['checkoutLink'].split('/')

            var base = parseUrl[0] + '//' + parseUrl[2]

            var redirectLink = base + '/invoices/' + value['id']

            var creationDate = new Date(parseInt(value['createdTime']) * 1000)

            var formatted = convertDate(creationDate)

            body.append(
              '<tr><td>' +
                formatted +
                '</td><td>' +
                value['metadata']['itemDesc'] +
                '</td><td class=' +
                value['status'] +
                '>' +
                value['status'] +
                '</td><td>' +
                value['amount'] +
                '</td><td>' +
                value['currency'] +
                '</td><td><a target=_blank href=' +
                redirectLink +
                '>' +
                value['id'] +
                '</a></td></tr>'
            )
          })
        } else {
          console.log(response)
        }
      }
    })
  })
  $(document).ready(function () {
    $('.btcpw_fixed_amount_enable').change(function () {
      $(this).is(':checked')
        ? $(this)
            .next()
            .prop('required', true)
        : $(this)
            .next()
            .prop('required', false)
    })
  })

  $(document).ready(function () {
    $('.btcpw_tipping_enter_amount').click(function () {
      if (!$(this).is(':checked')) {
        $('.container_predefined_amount').show()
      } else {
        $('.container_predefined_amount').hide()
      }
    })
  })
  $(document).on('widget-added', function () {
    imagePreview(
      $('.widget-tipping-basic-upload_box_image'),
      $('.widget-tipping-basic-background_id')
    )
    imageRemove($('.widget-tipping-basic-remove_box_image'))

    imagePreview(
      $('.widget-tipping-basic-upload_box_logo'),
      $('.widget-tipping-basic-logo_id')
    )
    imageRemove($('.widget-tipping-basic-remove_box_logo'))

    imagePreview(
      $('.widget-tipping-basic-upload_box_image_high'),
      $('.widget-tipping-basic-background_id_high')
    )
    imageRemove($('.widget-tipping-basic-remove_box_image_high'))

    imagePreview(
      $('.widget-tipping-basic-upload_box_logo_high'),
      $('.widget-tipping-basic-logo_id_high')
    )
    imageRemove($('.widget-tipping-basic-remove_box_logo_high'))

    imagePreview(
      $('.widget-tipping-basic-upload_box_image_wide'),
      $('.widget-tipping-basic-background_id_wide')
    )
    imageRemove($('.widget-tipping-basic-remove_box_image_wide'))

    imagePreview(
      $('.widget-tipping-basic-upload_box_logo_wide'),
      $('.widget-tipping-basic-logo_id_wide')
    )
    imageRemove($('.widget-tipping-basic-remove_box_logo_wide'))
  })
  $(document).on('widget-added', function () {
    $(
      '.widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color'
    ).iris({
      defaultColor: true,

      change: function (event, ui) {},

      clear: function () {},

      hide: true,

      palettes: true
    })
  })
  $(document).ready(function () {
    $('#tipping-form-design').change(function () {
      var design = $(this).val()
      $('#tipping-form-preview').empty()
      if ($('#tipping-form-preview').children().length === 0) {
        switch (design) {
          case 'Box':
            $('#tipping-form-preview').append(
              '<div id="btcpw_page"><div class="btcpw_tipping_box_container" style=width:250px;height:300px;background-color:#E6E6E6;><form method="POST" action="" id="tipping_form_box"><fieldset disabled=disabled><div class="btcpw_tipping_box_header_container" style=background-color:#1d5aa3><div id="btcpw_box_logo_wrap"><img alt="Tipping logo" src=https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg /></div><div><h6 style=color:#ffffff;>Title</h6></div></div><h6 style=color:#000000>Enter Tipping Amount</h6><div class="btcpw_tipping_box_amount"><div class=btcpw_tipping_free_input style=background-color:#ffa500;><input type="number" id="btcpw_tipping_amount" name="btcpw_tipping_amount" placeholder="0.00" required /><select required name="btcpw_tipping_currency" id="btcpw_tipping_currency"><option disabled value="">Select currency</option><option value="SATS">SATS</option></select><i class="fas fa-arrows-alt-v"></i></div><div class="btcpw_tipping_converted_values"><input type="text" id="btcpw_converted_amount" name="btcpw_converted_amount" readonly /><input type="text" id="btcpw_converted_currency" name="btcpw_converted_currency" readonly /></div></div><div id="button" style=background-color:#1d5aa3><button type="submit" id="btcpw_tipping__button" style=color:#FFFFFF;background:#FE642E;>Tip</button></div></fieldset></form></div><div id="powered_by_box"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          case 'High-Banner':
            $('#tipping-form-preview').append(
              '<div id="btcpw_page"><div class="btcpw_skyscraper_banner high"><div class="btcpw_skyscraper_header_container high" style="background-color:#1d5aa3"><div id="btcpw_skyscraper_logo_wrap_high"><img alt="Tipping logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" /></div><div><h6 style="color:#ffffff;">Title</h6 style="color:#000000;"><p>Description</p></div></div><div class="btcpw_skyscraper_tipping_container high" style=background-color:#E6E6E6;><form method="POST" action="" id="skyscraper_tipping_form"><fieldset><h6>Enter Tipping Amount</h6><div class="btcpw_skyscraper_amount high"><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_1 high"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount high" id="value_1_high" name="btcpw_skyscraper_tipping_default_amount_high" value="1000 SATS"><i class="fas fa-coffee"></i></div><label for="value_1">1000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_2 high"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount high" id="value_2_high" name="btcpw_skyscraper_tipping_default_amount_high" value="2000 SATS"><i class="fas fa-coffee"></i></div><label for="value_2">2000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_3 high"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount high" id="value_3_high" name="btcpw_skyscraper_tipping_default_amount_high" value="3000 SATS"><i class="fas fa-coffee"></i></div><label for="value_3">3000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_tipping_free_input"><input type="number" id="btcpw_skyscraper_tipping_amount" name="btcpw_skyscraper_tipping_amount" placeholder="0.00" required /><select required name="btcpw_skyscraper_tipping_currency_high" id="btcpw_skyscraper_tipping_currency"><option disabled value="">Select currency</option><option value=SATS>SATS</option></select><i class="fas fa-arrows-alt-v"></i></div></div><div class="btcpw_skyscraper_tipping_converted_values high"><input type="text" id="btcpw_skyscraper_converted_amount" name="btcpw_skyscraper_converted_amount_high" readonly /><input type="text" id="btcpw_skyscraper_converted_currency" name="btcpw_skyscraper_converted_currency_high" readonly /></div><div class="btcpw_skyscraper_button high" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" style="color:#FFFFFF;background:#FE642E;" name="next" class="skyscraper-next-form high" value="Continue"></div></fieldset><fieldset><div class="btcpw_skyscraper_donor_information high"><div class="btcpw_skyscraper_tipping_donor_name_wrap high"><input type="text" placeholder="Full name" id="btcpw_skyscraper_tipping_donor_name_high" name="btcpw_skyscraper_tipping_donor_Full name_high" /></div></div><div class="btcpw_skyscraper_button high" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" name="previous" class="skyscraper-previous-form high" value="< Previous" /></div><div><button type="submit" id="btcpw_skyscraper_tipping__button">Tip</button></div></div></fieldset></form></div></div><div id="powered_by_skyscraper"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          case 'Wide-Banner':
            $('#tipping-form-preview').append(
              '<div id="btcpw_page"><div class="btcpw_skyscraper_banner wide"><div class="btcpw_skyscraper_header_container wide" style="background-color:#1d5aa3"><div id="btcpw_skyscraper_logo_wrap_wide"><img alt="Tipping logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" /></div><div><h6 style="color:#ffffff;">Title</h6 style="color:#000000;"><p>Description</p></div></div><div class="btcpw_skyscraper_tipping_container wide" style=background-color:#E6E6E6;><form method="POST" action="" id="skyscraper_tipping_form"><fieldset><h6>Enter Tipping Amount</h6><div class="btcpw_skyscraper_amount wide"><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_1 wide"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="value_1_wide" name="btcpw_skyscraper_tipping_default_amount_wide" value="1000 SATS"><i class="fas fa-coffee"></i></div><label for="value_1">1000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_2 wide"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="value_2_wide" name="btcpw_skyscraper_tipping_default_amount_wide" value="2000 SATS"><i class="fas fa-coffee"></i></div><label for="value_21">2000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_3 wide"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="value_3_wide" name="btcpw_skyscraper_tipping_default_amount_wide" value="3000 SATS"><i class="fas fa-coffee"></i></div><label for="value_3">3000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_tipping_free_input"><input type="number" id="btcpw_skyscraper_tipping_amount" name="btcpw_skyscraper_tipping_amount" placeholder="0.00" required /><select required name="btcpw_skyscraper_tipping_currency_wide" id="btcpw_skyscraper_tipping_currency"><option disabled value="">Select currency</option><option value=SATS>SATS</option></select><i class="fas fa-arrows-alt-v"></i></div></div><div class="btcpw_skyscraper_tipping_converted_values wide"><input type="text" id="btcpw_skyscraper_converted_amount" name="btcpw_skyscraper_converted_amount_wide" readonly /><input type="text" id="btcpw_skyscraper_converted_currency" name="btcpw_skyscraper_converted_currency_wide" readonly /></div><div class="btcpw_skyscraper_button wide" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" style="color:#FFFFFF;background:#FE642E;" name="next" class="skyscraper-next-form wide" value="Continue"></div></fieldset><fieldset><div class="btcpw_skyscraper_donor_information wide"><div class="btcpw_skyscraper_tipping_donor_name_wrap wide"><input type="text" placeholder="Full name" id="btcpw_skyscraper_tipping_donor_name_wide" name="btcpw_skyscraper_tipping_donor_Full name_wide" /></div></div><div class="btcpw_skyscraper_button wide" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" name="previous" class="skyscraper-previous-form wide" value="< Previous" /></div><div><button type="submit" id="btcpw_skyscraper_tipping__button">Tip</button></div></div></fieldset></form></div></div><div id="powered_by_skyscraper"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          case 'Page':
            $('#tipping-form-preview').append(
              '<div id="btcpw_page"><div class="btcpw_page_tipping_container" style="width:520px; height:600px; background-color:#E6E6E6"><form method="POST" action="" id="page_tipping_form"><div class="btcpw_page_header_container" style="background-color:#1d5aa3"><div id="btcpw_page_logo_wrap"><img alt="Tipping page logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" /></div><div><h6 style="color:#ffffff;">Title</h6></div></div><div class="btcpw_page_bar_container"><div class="btcpw_page_bar_container bar-1 active">1.Pledge</div><div class="btcpw_page_bar_container bar-2">2.Info</div></div><fieldset><h6>Enter Tipping Amount</h6><div class="btcpw_page_amount"><div style="background-color: #ffa500;" class="btcpw_page_amount_value_1"><div><input type="radio" class="btcpw_page_tipping_default_amount" id="value_1_page"  name="btcpw_page_tipping_default_amount" value="1000 SATS"><i class="fas fa-coffee"></i></div><label for="value_1">1000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_page_amount_value_2"><div><input type="radio" class="btcpw_page_tipping_default_amount" id="value_2_page"  name="btcpw_page_tipping_default_amount" value="2000 SATS"><i class="fas fa-coffee"></i></div><label for="value_2">2000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_page_amount_value_3"><div><input type="radio" class="btcpw_page_tipping_default_amount" id="value_3_page"  name="btcpw_page_tipping_default_amount" value="3000 SATS"><i class="fas fa-coffee"></i></div><label for="value_3">3000 SATS</label></div><div class="btcpw_page_tipping_free_input" style="background-color: #ffa500;"><input type="number" id="btcpw_page_tipping_amount" name="btcpw_page_tipping_amount" placeholder="0.00" required /><select required name="btcpw_page_tipping_currency" id="btcpw_page_tipping_currency"><option disabled value="">Select currency</option><option value="SATS">SATS</option></select><i class="fas fa-arrows-alt-v"></i></div></div><div class="btcpw_page_tipping_converted_values"><input type="text" id="btcpw_page_converted_amount" name="btcpw_page_converted_amount" readonly /><input type="text" id="btcpw_page_converted_currency" name="btcpw_page_converted_currency" readonly /></div><div id="btcpw_page_button" style="background-color:#1d5aa3"><input type="button" style="background:#FE642E;"name="next" class="page-next-form" value="continue " /></div></fieldset><fieldset><div class="btcpw_page_donor_information"><div class="btcpw_page_tipping_donor_name_wrap"><input type="text" placeholder="Full name" id="name" name="<?php echo "btcpw_page_tipping_donor_Full name"; ?>" /></div></div><div id="btcpw_page_button"><div><input type="button" name="previous" class="page-previous-form" value="< previous" /></div><div><button type="submit" id="btcpw_page_tipping__button">Tip</button></div></div></fieldset></form></div><div id="powered_by"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          default:
            $('#tipping-form-preview').append(
              '<div id="btcpw_page"><div class="btcpw_tipping_box_container" style=width:250px;height:300px;background-color:#E6E6E6;><form method="POST" action="" id="tipping_form_box"><fieldset disabled=disabled><div class="btcpw_tipping_box_header_container" style=background-color:#1d5aa3><div id="btcpw_box_logo_wrap"><img alt="Tipping logo" src=https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg /></div><div><h6 style=color:#ffffff;>Title</h6></div></div><h6 style=color:#000000>Enter Tipping Amount</h6><div class="btcpw_tipping_box_amount"><div class=btcpw_tipping_free_input style=background-color:#ffa500;><input type="number" id="btcpw_tipping_amount" name="btcpw_tipping_amount" placeholder="0.00" required /><select required name="btcpw_tipping_currency" id="btcpw_tipping_currency"><option disabled value="">Select currency</option><option value="SATS">SATS</option></select><i class="fas fa-arrows-alt-v"></i></div><div class="btcpw_tipping_converted_values"><input type="text" id="btcpw_converted_amount" name="btcpw_converted_amount" readonly /><input type="text" id="btcpw_converted_currency" name="btcpw_converted_currency" readonly /></div></div><div id="button" style=background-color:#1d5aa3><button type="submit" id="btcpw_tipping__button" style=color:#FFFFFF;background:#FE642E;>Tip</button></div></fieldset></form></div><div id="powered_by_box"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
        }
      } else {
        switch (design) {
          case 'Box':
            $('#tipping-form-preview').replaceWith(
              '<div id="btcpw_page"><div class="btcpw_tipping_box_container" style=width:250px;height:300px;background-color:#E6E6E6;><form method="POST" action="" id="tipping_form_box"><fieldset disabled=disabled><div class="btcpw_tipping_box_header_container" style=background-color:#1d5aa3><div id="btcpw_box_logo_wrap"><img alt="Tipping logo" src=https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg /></div><div><h6 style=color:#ffffff;>Title</h6></div></div><h6 style=color:#000000>Enter Tipping Amount</h6><div class="btcpw_tipping_box_amount"><div class=btcpw_tipping_free_input style=background-color:#ffa500;><input type="number" id="btcpw_tipping_amount" name="btcpw_tipping_amount" placeholder="0.00" required /><select required name="btcpw_tipping_currency" id="btcpw_tipping_currency"><option disabled value="">Select currency</option><option value="SATS">SATS</option></select><i class="fas fa-arrows-alt-v"></i></div><div class="btcpw_tipping_converted_values"><input type="text" id="btcpw_converted_amount" name="btcpw_converted_amount" readonly /><input type="text" id="btcpw_converted_currency" name="btcpw_converted_currency" readonly /></div></div><div id="button" style=background-color:#1d5aa3><button type="submit" id="btcpw_tipping__button" style=color:#FFFFFF;background:#FE642E;>Tip</button></div></fieldset></form></div><div id="powered_by_box"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          case 'High-Banner':
            $('#tipping-form-preview').replaceWith(
              '<div id="btcpw_page"><div class="btcpw_skyscraper_banner high"><div class="btcpw_skyscraper_header_container high" style="background-color:#1d5aa3"><div id="btcpw_skyscraper_logo_wrap_high"><img alt="Tipping logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" /></div><div><h6 style="color:#ffffff;">Title</h6 style="color:#000000;"><p>Description</p></div></div><div class="btcpw_skyscraper_tipping_container high" style=background-color:#E6E6E6;><form method="POST" action="" id="skyscraper_tipping_form"><fieldset><h6>Enter Tipping Amount</h6><div class="btcpw_skyscraper_amount high"><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_1 high"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount high" id="value_1_high" name="btcpw_skyscraper_tipping_default_amount_high" value="1000 SATS"><i class="fas fa-coffee"></i></div><label for="value_1">1000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_2 high"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount high" id="value_2_high" name="btcpw_skyscraper_tipping_default_amount_high" value="2000 SATS"><i class="fas fa-coffee"></i></div><label for="value_2">2000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_3 high"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount high" id="value_3_high" name="btcpw_skyscraper_tipping_default_amount_high" value="3000 SATS"><i class="fas fa-coffee"></i></div><label for="value_3">3000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_tipping_free_input"><input type="number" id="btcpw_skyscraper_tipping_amount" name="btcpw_skyscraper_tipping_amount" placeholder="0.00" required /><select required name="btcpw_skyscraper_tipping_currency_high" id="btcpw_skyscraper_tipping_currency"><option disabled value="">Select currency</option><option value=SATS>SATS</option></select><i class="fas fa-arrows-alt-v"></i></div></div><div class="btcpw_skyscraper_tipping_converted_values high"><input type="text" id="btcpw_skyscraper_converted_amount" name="btcpw_skyscraper_converted_amount_high" readonly /><input type="text" id="btcpw_skyscraper_converted_currency" name="btcpw_skyscraper_converted_currency_high" readonly /></div><div class="btcpw_skyscraper_button high" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" style="color:#FFFFFF;background:#FE642E;" name="next" class="skyscraper-next-form high" value="Continue"></div></fieldset><fieldset><div class="btcpw_skyscraper_donor_information high"><div class="btcpw_skyscraper_tipping_donor_name_wrap high"><input type="text" placeholder="Full name" id="btcpw_skyscraper_tipping_donor_name_high" name="btcpw_skyscraper_tipping_donor_Full name_high" /></div></div><div class="btcpw_skyscraper_button high" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" name="previous" class="skyscraper-previous-form high" value="< Previous" /></div><div><button type="submit" id="btcpw_skyscraper_tipping__button">Tip</button></div></div></fieldset></form></div></div><div id="powered_by_skyscraper"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          case 'Wide-Banner':
            $('#tipping-form-preview').replaceWith(
              '<div id="btcpw_page"><div class="btcpw_skyscraper_banner wide"><div class="btcpw_skyscraper_header_container wide" style="background-color:#1d5aa3"><div id="btcpw_skyscraper_logo_wrap_wide"><img alt="Tipping logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" /></div><div><h6 style="color:#ffffff;">Title</h6 style="color:#000000;"><p>Description</p></div></div><div class="btcpw_skyscraper_tipping_container wide" style=background-color:#E6E6E6;><form method="POST" action="" id="skyscraper_tipping_form"><fieldset><h6>Enter Tipping Amount</h6><div class="btcpw_skyscraper_amount wide"><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_1 wide"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="value_1_wide" name="btcpw_skyscraper_tipping_default_amount_wide" value="1000 SATS"><i class="fas fa-coffee"></i></div><label for="value_1">1000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_2 wide"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="value_2_wide" name="btcpw_skyscraper_tipping_default_amount_wide" value="2000 SATS"><i class="fas fa-coffee"></i></div><label for="value_21">2000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_amount_value_3 wide"><div><input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="value_3_wide" name="btcpw_skyscraper_tipping_default_amount_wide" value="3000 SATS"><i class="fas fa-coffee"></i></div><label for="value_3">3000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_skyscraper_tipping_free_input"><input type="number" id="btcpw_skyscraper_tipping_amount" name="btcpw_skyscraper_tipping_amount" placeholder="0.00" required /><select required name="btcpw_skyscraper_tipping_currency_wide" id="btcpw_skyscraper_tipping_currency"><option disabled value="">Select currency</option><option value=SATS>SATS</option></select><i class="fas fa-arrows-alt-v"></i></div></div><div class="btcpw_skyscraper_tipping_converted_values wide"><input type="text" id="btcpw_skyscraper_converted_amount" name="btcpw_skyscraper_converted_amount_wide" readonly /><input type="text" id="btcpw_skyscraper_converted_currency" name="btcpw_skyscraper_converted_currency_wide" readonly /></div><div class="btcpw_skyscraper_button wide" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" style="color:#FFFFFF;background:#FE642E;" name="next" class="skyscraper-next-form wide" value="Continue"></div></fieldset><fieldset><div class="btcpw_skyscraper_donor_information wide"><div class="btcpw_skyscraper_tipping_donor_name_wrap wide"><input type="text" placeholder="Full name" id="btcpw_skyscraper_tipping_donor_name_wide" name="btcpw_skyscraper_tipping_donor_Full name_wide" /></div></div><div class="btcpw_skyscraper_button wide" style="background-color:#1d5aa3;" id="btcpw_skyscraper_button"><div><input type="button" name="previous" class="skyscraper-previous-form wide" value="< Previous" /></div><div><button type="submit" id="btcpw_skyscraper_tipping__button">Tip</button></div></div></fieldset></form></div></div><div id="powered_by_skyscraper"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          case 'Page':
            $('#tipping-form-preview').replaceWith(
              '<div id="btcpw_page"><div class="btcpw_page_tipping_container" style="width:520px; height:600px; background-color:#E6E6E6"><form method="POST" action="" id="page_tipping_form"><div class="btcpw_page_header_container" style="background-color:#1d5aa3"><div id="btcpw_page_logo_wrap"><img alt="Tipping page logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" /></div><div><h6 style="color:#ffffff;">Title</h6></div></div><div class="btcpw_page_bar_container"><div class="btcpw_page_bar_container bar-1 active">1.Pledge</div><div class="btcpw_page_bar_container bar-2">2.Info</div></div><fieldset><h6>Enter Tipping Amount</h6><div class="btcpw_page_amount"><div style="background-color: #ffa500;" class="btcpw_page_amount_value_1"><div><input type="radio" class="btcpw_page_tipping_default_amount" id="value_1_page"  name="btcpw_page_tipping_default_amount" value="1000 SATS"><i class="fas fa-coffee"></i></div><label for="value_1">1000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_page_amount_value_2"><div><input type="radio" class="btcpw_page_tipping_default_amount" id="value_2_page"  name="btcpw_page_tipping_default_amount" value="2000 SATS"><i class="fas fa-coffee"></i></div><label for="value_2">2000 SATS</label></div><div style="background-color: #ffa500;" class="btcpw_page_amount_value_3"><div><input type="radio" class="btcpw_page_tipping_default_amount" id="value_3_page"  name="btcpw_page_tipping_default_amount" value="3000 SATS"><i class="fas fa-coffee"></i></div><label for="value_3">3000 SATS</label></div><div class="btcpw_page_tipping_free_input" style="background-color: #ffa500;"><input type="number" id="btcpw_page_tipping_amount" name="btcpw_page_tipping_amount" placeholder="0.00" required /><select required name="btcpw_page_tipping_currency" id="btcpw_page_tipping_currency"><option disabled value="">Select currency</option><option value="SATS">SATS</option></select><i class="fas fa-arrows-alt-v"></i></div></div><div class="btcpw_page_tipping_converted_values"><input type="text" id="btcpw_page_converted_amount" name="btcpw_page_converted_amount" readonly /><input type="text" id="btcpw_page_converted_currency" name="btcpw_page_converted_currency" readonly /></div><div id="btcpw_page_button" style="background-color:#1d5aa3"><input type="button" style="background:#FE642E;"name="next" class="page-next-form" value="continue " /></div></fieldset><fieldset><div class="btcpw_page_donor_information"><div class="btcpw_page_tipping_donor_name_wrap"><input type="text" placeholder="Full name" id="name" name="<?php echo "btcpw_page_tipping_donor_Full name"; ?>" /></div></div><div id="btcpw_page_button"><div><input type="button" name="previous" class="page-previous-form" value="< previous" /></div><div><button type="submit" id="btcpw_page_tipping__button">Tip</button></div></div></fieldset></form></div><div id="powered_by"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
          default:
            $('#tipping-form-preview').replaceWith(
              '<div id="btcpw_page"><div class="btcpw_tipping_box_container" style=width:250px;height:300px;background-color:#E6E6E6;><form method="POST" action="" id="tipping_form_box"><fieldset disabled=disabled><div class="btcpw_tipping_box_header_container" style=background-color:#1d5aa3><div id="btcpw_box_logo_wrap"><img alt="Tipping logo" src=https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg /></div><div><h6 style=color:#ffffff;>Title</h6></div></div><h6 style=color:#000000>Enter Tipping Amount</h6><div class="btcpw_tipping_box_amount"><div class=btcpw_tipping_free_input style=background-color:#ffa500;><input type="number" id="btcpw_tipping_amount" name="btcpw_tipping_amount" placeholder="0.00" required /><select required name="btcpw_tipping_currency" id="btcpw_tipping_currency"><option disabled value="">Select currency</option><option value="SATS">SATS</option></select><i class="fas fa-arrows-alt-v"></i></div><div class="btcpw_tipping_converted_values"><input type="text" id="btcpw_converted_amount" name="btcpw_converted_amount" readonly /><input type="text" id="btcpw_converted_currency" name="btcpw_converted_currency" readonly /></div></div><div id="button" style=background-color:#1d5aa3><button type="submit" id="btcpw_tipping__button" style=color:#FFFFFF;background:#FE642E;>Tip</button></div></fieldset></form></div><div id="powered_by_box"><p>Powered by <a href=https://btcpaywall.com/ target=_blank>BTCPayWall</a></p></div></div>'
            )
            break
        }
      }
    })
  })
  $(document).ready(function () {
    $(
      '.btcpw_tipping_box_title_color,.btcpw_tipping_box_description_color,.btcpw_tipping_box_tipping_box_color,.btcpw_tipping_box_hf_background,.btcpw_tipping_box_button_text_color,.btcpw_tipping_box_button_color,.btcpw_tipping_box_background,.btcpw_tipping_banner_high_hf_background,.btcpw_tipping_banner_high_title_color,.btcpw_tipping_banner_high_description_color,.btcpw_tipping_banner_high_tipping_box_color,.btcpw_tipping_banner_high_button_text_color,.btcpw_tipping_banner_high_button_color,.btcpw_tipping_banner_high_background,.btcpw_tipping_banner_high_tipping_color,.btcpw_tipping_banner_high_input_background,.btcpw_tipping_banner_wide_hf_background,.btcpw_tipping_banner_wide_title_color,.btcpw_tipping_banner_wide_description_color,.btcpw_tipping_banner_wide_tipping_box_color,.btcpw_tipping_banner_wide_button_text_color,.btcpw_tipping_banner_wide_button_color,.btcpw_tipping_banner_wide_background,.btcpw_tipping_banner_wide_tipping_color,.btcpw_tipping_banner_wide_input_background,.btcpw_tipping_box_input_background,.btcpw_tipping_page_title_color,.btcpw_tipping_page_tipping_box_color,.btcpw_tipping_page_button_text_color,.btcpw_tipping_page_button_color,.btcpw_tipping_page_background,.btcpw_tipping_page_tipping_color,.btcpw_tipping_page_input_background,.btcpw_tipping_page_tipping_color_active,.btcpw_tipping_page_tipping_color_inactive,.btcpw_tipping_hf_background'
    ).iris({
      defaultColor: true,

      change: function (event, ui) {},

      clear: function () {},

      hide: true,

      palettes: true
    })
  })
  $(document).ready(function ($) {
    imagePreview(
      $('#btcpw_tipping_banner_high_button_image'),
      $('#btcpw_tipping_banner_high_image')
    )
    imageRemove($('.btcpw_tipping_banner_high_button_remove'))

    imagePreview(
      $('#btcpw_tipping_banner_high_button_image_background'),
      $('#btcpw_tipping_banner_high_image_background')
    )
    imageRemove($('.btcpw_tipping_banner_high_button_remove_background'))

    imagePreview(
      $('#btcpw_tipping_banner_wide_button_image'),
      $('#btcpw_tipping_banner_wide_image')
    )
    imageRemove($('.btcpw_tipping_banner_wide_button_remove'))

    imagePreview(
      $('#btcpw_tipping_banner_wide_button_image_background'),
      $('#btcpw_tipping_banner_wide_image_background')
    )
    imageRemove($('.btcpw_tipping_banner_wide_button_remove_background'))

    imagePreview(
      $('#btcpw_tipping_box_button_image'),
      $('#btcpw_tipping_box_image')
    )
    imageRemove($('.btcpw_tipping_box_button_remove'))

    imagePreview(
      $('#btcpw_tipping_box_button_image_background'),
      $('#btcpw_tipping_box_image_background')
    )
    imageRemove($('.btcpw_tipping_box_button_remove_background'))

    imagePreview(
      $('#btcpw_tipping_page_button_image'),
      $('#btcpw_tipping_page_image')
    )
    imageRemove($('.btcpw_tipping_page_button_remove'))

    imagePreview(
      $('#btcpw_tipping_page_button_image_background'),
      $('#btcpw_tipping_page_image_background')
    )
    imageRemove($('.btcpw_tipping_page_button_remove_background'))
  })
  $(document).ready(function () {
    showMore(
      $('.btcpw_tipping_banner_high_collect_email'),
      $(
        '.btcpw_tipping_banner_high_collect_email_mandatory, label[for="btcpw_tipping_banner_high_collect[email][mandatory]"]'
      )
    )
    showMore(
      $('.btcpw_tipping_banner_high_collect_name'),
      $(
        '.btcpw_tipping_banner_high_collect_name_mandatory, label[for="btcpw_tipping_banner_high_collect[name][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_banner_high_collect_phone'),
      $(
        '.btcpw_tipping_banner_high_collect_phone_mandatory, label[for="btcpw_tipping_banner_high_collect[phone][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_banner_high_collect_address'),
      $(
        '.btcpw_tipping_banner_high_collect_address_mandatory, label[for="btcpw_tipping_banner_high_collect[address][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_banner_high_collect_message'),
      $(
        '.btcpw_tipping_banner_high_collect_message_mandatory, label[for="btcpw_tipping_banner_high_collect[message][mandatory]"]'
      )
    )
    showMore(
      $('.btcpw_tipping_banner_wide_collect_email'),
      $(
        '.btcpw_tipping_banner_wide_collect_email_mandatory, label[for="btcpw_tipping_banner_wide_collect[email][mandatory]"]'
      )
    )
    showMore(
      $('.btcpw_tipping_banner_wide_collect_name'),
      $(
        '.btcpw_tipping_banner_wide_collect_name_mandatory, label[for="btcpw_tipping_banner_wide_collect[name][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_banner_wide_collect_phone'),
      $(
        '.btcpw_tipping_banner_wide_collect_phone_mandatory, label[for="btcpw_tipping_banner_wide_collect[phone][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_banner_wide_collect_address'),
      $(
        '.btcpw_tipping_banner_wide_collect_address_mandatory, label[for="btcpw_tipping_banner_wide_collect[address][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_banner_wide_collect_message'),
      $(
        '.btcpw_tipping_banner_wide_collect_message_mandatory, label[for="btcpw_tipping_banner_wide_collect[message][mandatory]"]'
      )
    )
    showMore(
      $('.btcpw_tipping_page_collect_email'),
      $(
        '.btcpw_tipping_page_collect_email_mandatory, label[for="btcpw_tipping_page_collect[email][mandatory]"]'
      )
    )
    showMore(
      $('.btcpw_tipping_page_collect_name'),
      $(
        '.btcpw_tipping_page_collect_name_mandatory, label[for="btcpw_tipping_page_collect[name][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_page_collect_phone'),
      $(
        '.btcpw_tipping_page_collect_phone_mandatory, label[for="btcpw_tipping_page_collect[phone][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_page_collect_address'),
      $(
        '.btcpw_tipping_page_collect_address_mandatory, label[for="btcpw_tipping_page_collect[address][mandatory]"]'
      )
    )

    showMore(
      $('.btcpw_tipping_page_collect_message'),
      $(
        '.btcpw_tipping_page_collect_message_mandatory, label[for="btcpw_tipping_page_collect[message][mandatory]"]'
      )
    )
  })
  function imagePreview (click_elem, target) {
    var custom_uploader, click_elem, target

    click_elem.click(function (e) {
      e.preventDefault()
      if (custom_uploader) {
        custom_uploader.open()
        return
      }

      custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {
          text: 'Choose Image'
        },
        multiple: false
      })

      custom_uploader.on('select', function () {
        var attachment = custom_uploader
          .state()
          .get('selection')
          .first()
          .toJSON()
        target.val(attachment.id)
        click_elem
          .html('<img src="' + attachment.url + '">')
          .next()
          .show()
      })

      custom_uploader.open()
    })
  }
  function imageRemove (remove) {
    $(remove).click(function (e) {
      e.preventDefault()

      var button = $(this)
      button.next().val('')
      button
        .hide()
        .prev()
        .html('Upload image')
    })
  }
  function showMore (click_elem, target) {
    $(click_elem).click(function () {
      if (!$(this).is(':checked')) {
        $(target)
          .prop('checked', false)
          .css('visibility', 'hidden')
      } else {
        $(target).css('visibility', 'visible')
      }
    })
  }
  $(document).ready(function () {
    var custom_uploader, click_elem, target

    $('#lnpw_tipping_button_image_background_box').click(function (e) {
      e.preventDefault()
      if (custom_uploader) {
        custom_uploader.open()
        return
      }

      custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {
          text: 'Choose Image'
        },
        multiple: false
      })

      custom_uploader.on('select', function () {
        var attachment = custom_uploader
          .state()
          .get('selection')
          .first()
          .toJSON()
        target.val(attachment.id)
        click_elem
          .html('<img src="' + attachment.url + '">')
          .next()
          .show()
      })

      custom_uploader.open()
    })
  })
  $(document).ready(function () {
    $(
      '#tipping_box_add_form, #tipping_banner_wide_add_form, #tipping_banner_high_add_form, #tipping_page_add_form'
    ).on('submit', function (e) {
      e.preventDefault()
      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'json',
        url: shortcode_ajax_object.ajax_url,
        data: {
          action: 'btcpw_create_shortcode',
          nonce_ajax: shortcode_ajax_object.security,
          id: $('#btc_tipping_banner_high_id, #btc_tipping_banner_wide_id, #btc_tipping_box_id, #btc_tipping_page_id').val(),
          dimension: $(
            '#btcpw_tipping_box_dimension, #btcpw_tipping_banner_high_dimension, #btcpw_tipping_banner_wide_dimension'
          ).val(),
          background: $(
            '#btcpw_tipping_box_image_background, #btcpw_tipping_banner_high_image_background, #btcpw_tipping_banner_wide_image_background, #btcpw_tipping_page_image_background'
          ).val(),
          background_color: $(
            '#btcpw_tipping_box_background, #btcpw_tipping_banner_high_background, #btcpw_tipping_banner_wide_background,#btcpw_tipping_page_background'
          ).val(),
          hf_color: $(
            '#btcpw_tipping_box_hf_background, #btcpw_tipping_hf_background, #btcpw_tipping_banner_wide_hf_background, #btcpw_tipping_banner_high_hf_background'
          ).val(),
          logo: $(
            '#btcpw_tipping_box_image, #btcpw_tipping_banner_high_image, #btcpw_tipping_banner_wide_image, #btcpw_tipping_page_image'
          ).val(),
          title_text: $(
            '#btcpw_tipping_box_title, #btcpw_tipping_banner_high_title, #btcpw_tipping_banner_wide_title,#btcpw_tipping_page_title'
          ).val(),
          title_text_color: $(
            '#btcpw_tipping_box_title_color, #btcpw_tipping_banner_high_title_color, #btcpw_tipping_banner_wide_title_color,#btcpw_tipping_page_title_color'
          ).val(),
          description_text: $(
            '#btcpw_tipping_box_description, #btcpw_tipping_banner_high_description, #btcpw_tipping_banner_wide_description, #btcpw_tipping_page_description'
          ).val(),
          description_text_color: $(
            '#btcpw_tipping_box_description_color, #btcpw_tipping_banner_high_description_color, #btcpw_tipping_banner_wide_description_color,#btcpw_tipping_page_description_color'
          ).val(),
          tipping_text: $(
            '#btcpw_tipping_box_text, #btcpw_tipping_banner_high_text, #btcpw_tipping_banner_wide_text,#btcpw_tipping_page_text'
          ).val(),
          tipping_text_color: $(
            '#btcpw_tipping_box_tipping_box_color, #btcpw_tipping_banner_high_tipping_color, btcpw_tipping_banner_wide_tipping_color, #btcpw_tipping_page_tipping_banner_color'
          ).val(),
          redirect: $(
            '#btcpw_tipping_box_redirect, #btcpw_tipping_banner_high_redirect, #btcpw_tipping_banner_wide_redirect, #btcpw_tipping_page_redirect'
          ).val(),
          currency: $(
            '#btcpw_tipping_box_currency, #btcpw_tipping_banner_high_currency, #btcpw_tipping_banner_wide_currency,#btcpw_tipping_page_currency'
          ).val(),
          input_background: $(
            '#btcpw_tipping_box_input_background, #btcpw_tipping_banner_high_input_background, #btcpw_tipping_banner_wide_input_background,#btcpw_tipping_page_input_background'
          ).val(),
          button_text: $(
            '#btcpw_tipping_box_button_text, #btcpw_tipping_banner_high_button_text, #btcpw_tipping_banner_wide_button_text, #btcpw_tipping_page_button_text'
          ).val(),
          button_text_color: $(
            '#btcpw_tipping_box_button_text_color, #btcpw_tipping_banner_high_button_text_color, #btcpw_tipping_banner_wide_button_text_color, #btcpw_tipping_page_button_text_color'
          ).val(),
          button_color: $(
            '#btcpw_tipping_box_button_color, #btcpw_tipping_banner_high_button_color, #btcpw_tipping_banner_wide_button_color,#btcpw_tipping_page_button_color'
          ).val(),
          free_input: $(
            "input[name='btcpw_tipping_banner_wide_enter_amount']:checked, input[name='btcpw_tipping_banner_high_enter_amount']:checked, input[name='btcpw_tipping_page_enter_amount']:checked"
          ).val(),
          value1_enabled: $(
            "input[name='btcpw_tipping_banner_wide_fixed_amount[value1][enabled]']:checked, input[name='btcpw_tipping_banner_high_fixed_amount[value1][enabled]']:checked, input[name='btcpw_tipping_page_fixed_amount[value1][enabled]']:checked"
          ).val(),
          value1_currency: $(
            '#btcpw_banner_high_default_currency1, #btcpw_banner_wide_default_currency1, #btcpw_default_page_currency1'
          ).val(),
          value1_amount: $(
            '#btcpw_banner_high_default_price1, #btcpw_banner_wide_default_price1,#btcpw_default_page_price1'
          ).val(),
          value1_icon: $(
            '#btcpw_tipping_banner_high_icon1, #btcpw_tipping_banner_wide_icon1, #btcpw_tipping_page_icon1'
          ).val(),
          value2_enabled: $(
            "input[name='btcpw_tipping_banner_wide_fixed_amount[value2][enabled]']:checked, input[name='btcpw_tipping_banner_high_fixed_amount[value2][enabled]']:checked,input[name='btcpw_tipping_page_fixed_amount[value2][enabled]']:checked"
          ).val(),
          value2_currency: $(
            '#btcpw_banner_high_default_currency2, #btcpw_banner_wide_default_currency2, #btcpw_default_page_currency2'
          ).val(),
          value2_amount: $(
            '#btcpw_banner_high_default_price2, #btcpw_banner_wide_default_price2, #btcpw_default_page_price2'
          ).val(),
          value2_icon: $(
            '#btcpw_tipping_banner_high_icon2, #btcpw_tipping_banner_wide_icon2, #btcpw_tipping_page_icon2'
          ).val(),
          value3_enabled: $(
            "input[name='btcpw_tipping_banner_wide_fixed_amount[value3][enabled]']:checked, input[name='btcpw_tipping_banner_high_fixed_amount[value3][enabled]']:checked,input[name='btcpw_tipping_page_fixed_amount[value3][enabled]']:checked"
          ).val(),
          value3_currency: $(
            '#btcpw_banner_high_default_currency3, #btcpw_banner_wide_default_currency3,#btcpw_default_page_currency3'
          ).val(),
          value3_amount: $(
            '#btcpw_banner_high_default_price3, #btcpw_banner_wide_default_price3, #btcpw_default_page_price3'
          ).val(),
          value3_icon: $(
            '#btcpw_tipping_banner_high_icon3, #btcpw_tipping_banner_wide_icon3, #btcpw_tipping_page_icon3'
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
          step1: $('#btcpw_tipping_page_step1').val(),
          step2: $('#btcpw_tipping_page_step2').val(),
          active_color: $('#btcpw_tipping_page_tipping_color_active').val(),
          inactive_color: $('#btcpw_tipping_page_tipping_color_inactive').val()
        },
        success: function (data) {
          /*$('#' + data.data.data.type+' p').html(
            data.data.data.shortcode
          )*/
          if(!$('#btc_tipping_banner_high_id, #btc_tipping_banner_wide_id, #btc_tipping_box_id, #btc_tipping_page_id').val()){
            location.replace(shortcode_ajax_object.redirectUrl+data.data.data.id)
          }
        },
        error: function () {
          console.log('error handling here')
        }
      })
    })
  })
})(jQuery)
