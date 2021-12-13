;(function ($) {
  'use strict'
  $(document).ready(function () {
    var btcpw_invoice_id = localStorage.getItem('opennode_file_invoice_id')
    if (btcpw_invoice_id) {
      btcpwShowOpenNodeFileInvoice(btcpw_invoice_id)
    }
    $('#btcpw_digital_download_form').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_file_invoice_id')
      var text = $('#btcpw_pay__button').text()
      $('#btcpw_pay__button').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )
      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_generate_content_file_invoice_id',
          full_name: $('#btcpw_digital_download_customer_name').val(),
          email: $('#btcpw_digital_download_customer_email').val(),
          address: $('#btcpw_digital_download_customer_address').val(),
          phone: $('#btcpw_digital_download_customer_phone').val(),
          message: $('#btcpw_digital_download_customer_message').val()
        },
        success: function (response) {
          $('#btcpw_pay__button').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            localStorage.setItem('opennode_file_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('#btcpw_digital_download_customer_info').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })
  })
  $(document).ready(function () {
    var btcpw_invoice_id = localStorage.getItem('opennode_invoice_id')

    var btcpw_order_id = null
    var amount

    if (btcpw_invoice_id) {
      btcpwShowOpenNodeInvoice(btcpw_invoice_id)
    }
    $(
      '#btcpw_widget_skyscraper_tipping_form_high,#btcpw_widget_skyscraper_tipping_form_wide,#view_revenue_type,#post_revenue_type,#tipping_form_box_widget'
    ).submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')
      var text = $('#btcpw_pay__button').text()
      $('#btcpw_pay__button').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )
      var post_id = $('#btcpw_pay__button').data('post_id')

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'GET',
        data: {
          action: 'btcpw_get_invoice_id',
          post_id: post_id,
          full_name: $(
            '#btcpw_revenue_post_customer_name, #btcpw_revenue_view_customer_name, #btcpw_revenue_file_customer_name'
          ).val(),
          email: $(
            '#btcpw_revenue_post_customer_email, #btcpw_revenue_view_customer_email, #btcpw_revenue_file_customer_email'
          ).val(),
          address: $(
            '#btcpw_revenue_post_customer_address, #btcpw_revenue_view_customer_address, #btcpw_revenue_file_customer_address'
          ).val(),
          phone: $(
            '#btcpw_revenue_post_customer_phone, #btcpw_revenue_view_customer_phone, #btcpw_revenue_file_customer_phone'
          ).val(),
          message: $(
            '#btcpw_revenue_post_customer_message, #btcpw_revenue_view_customer_message, #btcpw_revenue_file_customer_message'
          ).val()
        },
        success: function (response) {
          $('#btcpw_pay__button').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            btcpw_order_id = response.data.order_id
            amount = response.data.amount

            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $(
              '.btcpw_digital_download_protected_area, .btcpw_revenue_post_container,.btcpw_revenue_view_container'
            ).html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })
  })

  function btcpwShowOpenNodeFileInvoice () {
    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      method: 'POST',
      data: {
        action: 'btcpw_paid_content_file_invoice',
        invoice_id: localStorage.getItem('opennode_file_invoice_id')
      },
      success: function (response) {
        if (response.success) {
          localStorage.removeItem('opennode_file_invoice_id')
          notifyAdmin(response.data.notify + 'Url:' + window.location.href)
          location.replace(payment.success_url)
        }
      },
      error: function (error) {
        console.error(error)
      }
    })
  }
  function btcpwShowOpenNodeInvoice () {
    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      method: 'POST',
      data: {
        action: 'btcpw_paid_opennode_invoice',
        id: localStorage.getItem('opennode_invoice_id')
      },
      success: function (response) {
        if (response.success) {
          localStorage.removeItem('opennode_invoice_id')
          notifyAdmin(response.data.notify + 'Url:' + window.location.href)
        }
      },
      error: function (error) {
        console.error(error)
      }
    })
  }
  $(document).ready(function () {
    var btcpw_invoice_id = localStorage.getItem('opennode_invoice_id')
    var donor

    if (btcpw_invoice_id) {
      btcpwShowOpenNodeInvoice(btcpw_invoice_id)
    }
    $('#tipping_form_box').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_tipping__button').text()
      $('#btcpw_tipping__button').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )
      e.preventDefault()

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $('#btcpw_tipping_currency').val(),
          amount: $('#btcpw_tipping_amount').val(),
          predefined_amount: $(
            'input[type=radio][name=btcpw_tipping_default_amount]:checked'
          ).val(),
          type: 'Tipping Box'
        },
        success: function (response) {
          $('#btcpw_tipping__button').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Box' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor
            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_tipping_box_container').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })

    $('#tipping_form_box_widget').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_tipping__button_btcpw_widget').text()
      $('#btcpw_tipping__button_btcpw_widget').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )
      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $('#btcpw_tipping_currency_btcpw_widget').val(),
          amount: $('#btcpw_tipping_amount_btcpw_widget').val(),
          type: 'Tipping Box Widget'
        },
        success: function (response) {
          $('#btcpw_tipping__button_btcpw_widget').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Box Widget' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor
            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_widget.btcpw_tipping_box_container').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })

    $('#page_tipping_form').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_page_tipping__button').text()
      $('#btcpw_page_tipping__button').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $('#btcpw_page_tipping_currency').val(),
          amount: $('#btcpw_page_tipping_amount').val(),
          predefined_amount: $(
            'input[type=radio][name=btcpw_page_tipping_default_amount]:checked'
          ).val(),
          name: $('#btcpw_page_tipping_donor_name').val(),
          email: $('#btcpw_page_tipping_donor_email').val(),
          address: $('#btcpw_page_tipping_donor_address').val(),
          phone: $('#btcpw_page_tipping_donor_phone').val(),
          message: $('#btcpw_page_tipping_donor_message').val(),
          type: 'Tipping Page'
        },
        success: function (response) {
          $('#btcpw_page_tipping__button').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Page' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor
            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_page_tipping_container').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })
    $('#skyscraper_tipping_high_form').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_skyscraper_tipping_high_button').text()
      $('#btcpw_skyscraper_tipping_high_button').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $('#btcpw_skyscraper_tipping_high_currency').val(),
          amount: $('#btcpw_skyscraper_tipping_high_amount').val(),
          predefined_amount: $(
            ' input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]:checked'
          ).val(),
          name: $('#btcpw_skyscraper_tipping_donor_name_high').val(),
          email: $('#btcpw_skyscraper_tipping_donor_email_high').val(),
          address: $('#btcpw_skyscraper_tipping_donor_address_high').val(),
          phone: $('#btcpw_skyscraper_tipping_donor_phone_high').val(),
          message: $('#btcpw_skyscraper_tipping_donor_message_high').val(),
          type: 'Tipping Banner High'
        },
        success: function (response) {
          $('#btcpw_skyscraper_tipping_high_button').html(text)

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Banner High' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor
            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_skyscraper_banner.high').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })

    $('#btcpw_widget_skyscraper_tipping_form_high').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_widget_btcpw_skyscraper_tipping__button_high').text()
      $('#btcpw_widget_btcpw_skyscraper_tipping__button_high').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_currency_high'
          ).val(),
          amount: $('#btcpw_widget_btcpw_skyscraper_tipping_amount_high').val(),
          predefined_amount: $(
            'input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]:checked'
          ).val(),
          name: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_name_high'
          ).val(),
          email: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_email_high'
          ).val(),
          address: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_address_high'
          ).val(),
          phone: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_high'
          ).val(),
          message: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_message_high'
          ).val(),
          type: 'Tipping Banner High Widget'
        },
        success: function (response) {
          $('#btcpw_widget_btcpw_skyscraper_tipping__button_high').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Banner High Widget' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor

            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_widget.btcpw_skyscraper_banner.high').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })
    $('#skyscraper_tipping_wide_form').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_skyscraper_tipping_wide_button').text()
      $('#btcpw_skyscraper_tipping_wide_button').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $('#btcpw_skyscraper_tipping_wide_currency').val(),
          amount: $('#btcpw_skyscraper_tipping_wide_amount').val(),
          predefined_amount: $(
            'input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]:checked'
          ).val(),
          name: $('#btcpw_skyscraper_tipping_donor_name_wide').val(),
          email: $('#btcpw_skyscraper_tipping_donor_email_wide').val(),
          address: $('#btcpw_skyscraper_tipping_donor_address_wide').val(),
          phone: $('#btcpw_skyscraper_tipping_donor_phone_wide').val(),
          message: $('#btcpw_skyscraper_tipping_donor_message_wide').val(),
          type: 'Tipping Banner Wide'
        },
        success: function (response) {
          $('#btcpw_skyscraper_tipping_wide_button').html(text)

          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Banner Wide' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor
            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_skyscraper_banner.wide').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })
    $('#btcpw_widget_skyscraper_tipping_form_wide').submit(function (e) {
      e.preventDefault()
      localStorage.removeItem('opennode_invoice_id')

      var text = $('#btcpw_widget_btcpw_skyscraper_tipping__button_wide').text()
      $('#btcpw_widget_btcpw_skyscraper_tipping__button_wide').html(
        `<span class="tipping-border" role="status" aria-hidden="true"></span>`
      )

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        method: 'POST',
        data: {
          action: 'btcpw_tipping',
          currency: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_currency_wide'
          ).val(),
          amount: $('#btcpw_widget_btcpw_skyscraper_tipping_amount_wide').val(),
          predefined_amount: $(
            'input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]:checked'
          ).val(),
          name: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_name_wide'
          ).val(),
          email: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_email_wide'
          ).val(),
          address: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_address_wide'
          ).val(),
          phone: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_wide'
          ).val(),
          message: $(
            '#btcpw_widget_btcpw_skyscraper_tipping_donor_message_wide'
          ).val(),
          type: 'Tipping Banner Wide Widget'
        },
        success: function (response) {
          $('#btcpw_widget_btcpw_skyscraper_tipping__button_wide').html(text)
          if (response.success) {
            btcpw_invoice_id = response.data.invoice_id
            donor =
              'Type: Tipping Banner Wide Widget' +
              '\n' +
              'Url: ' +
              window.location.href +
              '\n' +
              response.data.donor
            localStorage.setItem('opennode_invoice_id', btcpw_invoice_id)
            var urlRedirect =
              'https://checkout.opennode.com/' + btcpw_invoice_id
            $('.btcpw_widget.btcpw_skyscraper_banner.wide').html(`
<iframe title=NodeOpen width=500 height=600 src=${urlRedirect}> </iframe>`)
          }
        },
        error: function (error) {
          console.error(error)
        }
      })
    })
  })
})
