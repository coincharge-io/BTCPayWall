!function(t){var e={};function i(n){if(e[n])return e[n].exports;var a=e[n]={i:n,l:!1,exports:{}};return t[n].call(a.exports,a,a.exports,i),a.l=!0,a.exports}i.m=t,i.c=e,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)i.d(n,a,function(e){return t[e]}.bind(null,a));return n},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=13)}({13:function(t,e){!function(t){"use strict";function e(e,i){e.append('<div id=lnbits_modal style="padding:20px; margin: 0 auto;"><div class=btcpaywall-qr-code></div></div>'),t(".btcpaywall-qr-code").qrcode({width:450,height:450,text:i}),t("#lnbits_modal").dialog({dialogClass:"no-close",autoOpen:!0,modal:!0,resizable:!1,width:500,height:600,buttons:{"Copy invoice":function(){navigator.clipboard.writeText(i).then(()=>t(".ui-dialog-buttonset button:first-child").text("Copied to clipboard").css({backgroundColor:"green"}))},Close:function(){t("#lnbits_modal").remove()}}})}function i(e){return t.ajax({url:"/wp-admin/admin-ajax.php",method:"GET",data:{action:"btcpw_lnbits_monitor_invoice_status",invoice_id:e}})}function n(n,a,p){setInterval(()=>{i(a).done((function(e){"paid"===e.data.status&&t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_paid_content_file_invoice",invoice_id:a},success:function(t){t.success&&location.replace(payment.success_url)},error:function(t){console.error(t)}})}))},1e4),e(p,n)}function a(n,a,p){let _=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null;setInterval(()=>{i(a).done((function(e){"paid"===e.data.status&&t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"lnbits_paid_invoice",id:a},success:function(t){t.success&&(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(_)?location.replace(_):location.reload(!0))},error:function(t){console.error(t)}})}))},1e4),e(p,n)}function p(n,a,p){let _=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null;setInterval(()=>{i(a).done((function(e){"paid"===e.data.status&&t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"lnbits_tipping_paid_invoice",id:a},success:function(t){t.success&&(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(_)?location.replace(_):location.reload(!0))},error:function(t){console.error(t)}})}))},1e4),e(p,n)}t(document).ready((function(){var e,i=null,_=null;t("#btcpw_digital_download_form").submit((function(a){if(a.preventDefault(),e&&i&&_)n(e,i,_);else{var p=t(".btcpw_digital_download").text();t(".btcpw_digital_download").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_generate_content_file_invoice_id",full_name:t("#btcpw_digital_download_customer_name").val(),email:t("#btcpw_digital_download_customer_email").val(),address:t("#btcpw_digital_download_customer_address").val(),phone:t("#btcpw_digital_download_customer_phone").val(),message:t("#btcpw_digital_download_customer_message").val()},success:function(a){t(".btcpw_digital_download").html(p),a.success&&(console.log(a),e=a.data.payment_request,i=a.data.invoice_id,_=t("#btcpw_digital_download_customer_info").length?t("#btcpw_digital_download_customer_info"):t("#btcpaywall_checkout_cart"),n(e,i,_))},error:function(t){console.error(t)}})}})),t("#view_revenue_type, #post_revenue_type").submit((function(n){if(n.preventDefault(),e&&i&&_)a(e,i,_);else{var p=t("#btcpw_pay__button").text();t("#btcpw_pay__button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>');var r=t("#btcpw_pay__button").data("post_id");t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_get_invoice_id",post_id:r,full_name:t("#btcpw_revenue_post_customer_name, #btcpw_revenue_view_customer_name, #btcpw_revenue_file_customer_name").val(),email:t("#btcpw_revenue_post_customer_email, #btcpw_revenue_view_customer_email, #btcpw_revenue_file_customer_email").val(),address:t("#btcpw_revenue_post_customer_address, #btcpw_revenue_view_customer_address, #btcpw_revenue_file_customer_address").val(),phone:t("#btcpw_revenue_post_customer_phone, #btcpw_revenue_view_customer_phone, #btcpw_revenue_file_customer_phone").val(),message:t("#btcpw_revenue_post_customer_message, #btcpw_revenue_view_customer_message, #btcpw_revenue_file_customer_message").val()},success:function(n){t("#btcpw_pay__button").html(p),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_revenue_post_container,.btcpw_revenue_view_container"),a(e,i,_))},error:function(t){console.error(t)}})}})),t("#tipping_form_box").submit((function(n){if(n.preventDefault(),e&&i&&_)a(e,i,_);else{var r=t("#btcpw_tipping__button").text();t("#btcpw_tipping__button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),n.preventDefault(),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_tipping_currency").val(),amount:t("#btcpw_tipping_amount").val(),predefined_amount:t("input[type=radio][name=btcpw_tipping_default_amount]:checked").val(),type:"Tipping Box"},success:function(n){t("#btcpw_tipping__button").html(r),n.success&&(e=n.data.payment_request,window.location.href,n.data.donor,i=n.data.invoice_id,_=t(".btcpw_tipping_box_container"),p(e,i,_,t("#btcpw_redirect_link").val()))},error:function(t){console.error(t)}})}})),t("#tipping_form_box_widget").submit((function(n){if(n.preventDefault(),e&&i&&_)a(e,i,_);else{var r=t("#btcpw_tipping__button_btcpw_widget").text();t("#btcpw_tipping__button_btcpw_widget").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_tipping_currency_btcpw_widget").val(),amount:t("#btcpw_tipping_amount_btcpw_widget").val(),type:"Tipping Box Widget"},success:function(n){t("#btcpw_tipping__button_btcpw_widget").html(r),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_widget.btcpw_tipping_box_container"),p(e,i,_,t("#btcpw_redirect_link_btcpw_widget").val()),window.location.href,n.data.donor)},error:function(t){console.error(t)}})}})),t("#page_tipping_form").submit((function(n){if(n.preventDefault(),e&&i&&_)a(e,i,_);else{var r=t("#btcpw_page_tipping__button").text();t("#btcpw_page_tipping__button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_page_tipping_currency").val(),amount:t("#btcpw_page_tipping_amount").val(),predefined_amount:t("input[type=radio][name=btcpw_page_tipping_default_amount]:checked").val(),name:t("#btcpw_page_tipping_donor_name").val(),email:t("#btcpw_page_tipping_donor_email").val(),address:t("#btcpw_page_tipping_donor_address").val(),phone:t("#btcpw_page_tipping_donor_phone").val(),message:t("#btcpw_page_tipping_donor_message").val(),type:"Tipping Page"},success:function(n){t("#btcpw_page_tipping__button").html(r),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_page_tipping_container"),p(e,i,_,t("#btcpw_page_redirect_link").val()),window.location.href,n.data.donor)},error:function(t){console.error(t)}})}})),t("#skyscraper_tipping_high_form").submit((function(n){if(n.preventDefault(),i&&_)a(e,i,_);else{var r=t("#btcpw_skyscraper_tipping_high_button").text();t("#btcpw_skyscraper_tipping_high_button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_skyscraper_tipping_high_currency").val(),amount:t("#btcpw_skyscraper_tipping_high_amount").val(),predefined_amount:t(" input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]:checked").val(),name:t("#btcpw_skyscraper_tipping_donor_name_high").val(),email:t("#btcpw_skyscraper_tipping_donor_email_high").val(),address:t("#btcpw_skyscraper_tipping_donor_address_high").val(),phone:t("#btcpw_skyscraper_tipping_donor_phone_high").val(),message:t("#btcpw_skyscraper_tipping_donor_message_high").val(),type:"Tipping Banner High"},success:function(n){t("#btcpw_skyscraper_tipping_high_button").html(r),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_skyscraper_banner.high"),p(i,_,t("#btcpw_skyscraper_redirect_link_high").val()),window.location.href,n.data.donor)},error:function(t){console.error(t)}})}})),t("#btcpw_widget_skyscraper_tipping_form_high").submit((function(n){if(n.preventDefault(),i&&_)a(e,i,_);else{var r=t("#btcpw_widget_btcpw_skyscraper_tipping__button_high").text();t("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_widget_btcpw_skyscraper_tipping_currency_high").val(),amount:t("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val(),predefined_amount:t("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]:checked").val(),name:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_name_high").val(),email:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_email_high").val(),address:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_address_high").val(),phone:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_high").val(),message:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_message_high").val(),type:"Tipping Banner High Widget"},success:function(n){t("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(r),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_widget.btcpw_skyscraper_banner.high"),p(i,_,t("#btcpw_widget_btcpw_skyscraper_redirect_link_high").val()),window.location.href,n.data.donor)},error:function(t){console.error(t)}})}})),t("#skyscraper_tipping_wide_form").submit((function(n){if(n.preventDefault(),i&&_)a(e,i,_);else{var r=t("#btcpw_skyscraper_tipping_wide_button").text();t("#btcpw_skyscraper_tipping_wide_button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_skyscraper_tipping_wide_currency").val(),amount:t("#btcpw_skyscraper_tipping_wide_amount").val(),predefined_amount:t("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]:checked").val(),name:t("#btcpw_skyscraper_tipping_donor_name_wide").val(),email:t("#btcpw_skyscraper_tipping_donor_email_wide").val(),address:t("#btcpw_skyscraper_tipping_donor_address_wide").val(),phone:t("#btcpw_skyscraper_tipping_donor_phone_wide").val(),message:t("#btcpw_skyscraper_tipping_donor_message_wide").val(),type:"Tipping Banner Wide"},success:function(n){t("#btcpw_skyscraper_tipping_wide_button").html(r),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_skyscraper_banner.wide"),p(e,i,_,t("#btcpw_skyscraper_redirect_link_wide").val()),window.location.href,n.data.donor)},error:function(t){console.error(t)}})}})),t("#btcpw_widget_skyscraper_tipping_form_wide").submit((function(n){if(n.preventDefault(),i&&_)a(e,i,_);else{var r=t("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").text();t("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_widget_btcpw_skyscraper_tipping_currency_wide").val(),amount:t("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val(),predefined_amount:t("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]:checked").val(),name:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_name_wide").val(),email:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_email_wide").val(),address:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_address_wide").val(),phone:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_wide").val(),message:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_message_wide").val(),type:"Tipping Banner Wide Widget"},success:function(n){t("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(r),n.success&&(e=n.data.payment_request,i=n.data.invoice_id,_=t(".btcpw_widget.btcpw_skyscraper_banner.wide"),p(e,i,_,t("#btcpw_widget_btcpw_skyscraper_redirect_link_wide").val()),window.location.href,n.data.donor)},error:function(t){console.error(t)}})}}))}))}(jQuery)}});