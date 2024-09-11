!function(t){"use strict";function e(e){return t.ajax({url:"/wp-admin/admin-ajax.php",method:"GET",data:{action:"btcpw_opennode_monitor_invoice_status",invoice_id:e}})}function a(a,i){let n=setInterval((()=>{e(a).done((function(e){"paid"===e.data.status&&(clearInterval(n),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_paid_content_file_invoice",invoice_id:a,nonce_ajax:payment.security},success:function(t){t.success&&location.replace(payment.success_url)},error:function(t){console.log(t.message)}}))}))}),1e4);var p="https://checkout.opennode.com/"+a;location.replace(p)}function i(a,i,n=null){let p=setInterval((()=>{e(a).done((function(e){"paid"===e.data.status&&(clearInterval(p),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"opennode_paid_invoice",id:a,nonce_ajax:payment.security},success:function(t){t.success&&(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(n)?location.replace(n):location.reload(!0))},error:function(t){console.log(t.message)}}))}))}),1e4);var _="https://checkout.opennode.com/"+a;location.replace(_)}function n(a,i,n=null){let p=setInterval((()=>{e(a).done((function(e){"paid"===e.data.status&&(clearInterval(p),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"opennode_tipping_paid_invoice",id:a,nonce_ajax:payment.security},success:function(t){t.success&&(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(n)?location.replace(n):location.reload(!0))},error:function(t){console.log(t.message)}}))}))}),1e4);var _="https://checkout.opennode.com/"+a;location.replace(_)}function p(t){const e=document.cookie.split(";");for(let a=0;a<e.length;a++){const i=e[a].trim();if(i.startsWith(t+"="))return i.substring(t.length+1)}return null}t(document).ready((function(){var e=null,i=null;t("#btcpw_digital_download_form").submit((function(n){if(n.preventDefault(),e&&i)a(e);else{var p=t(".btcpw_digital_download").text();t(".btcpw_digital_download").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_generate_content_file_invoice_id",full_name:t("#btcpw_digital_download_customer_name").val(),email:t("#btcpw_digital_download_customer_email").val(),address:t("#btcpw_digital_download_customer_address").val(),phone:t("#btcpw_digital_download_customer_phone").val(),message:t("#btcpw_digital_download_customer_message").val(),nonce_ajax:payment.security},success:function(n){t(".btcpw_digital_download").html(p),n.success&&(e=n.data.invoice_id,i=t("#btcpw_digital_download_customer_info").length?t("#btcpw_digital_download_customer_info"):t("#btcpaywall_checkout_cart"),a(e))},error:function(t){console.log(t.message)}})}})),p("btcpw_donation_initiated_"+payment.post_id)&&t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_paid_tipping",invoice_id:p("btcpw_donation_initiated_"+payment.post_id),nonce_ajax:payment.security},success:function(t){t.success&&location.reload()},error:function(t){console.log(t.message)}}),p("btcpw_initiated_"+payment.post_id)&&t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_check_order_after_expiration",order_id:p("btcpw_initiated_"+payment.post_id),nonce_ajax:payment.security},success:function(t){t.success&&location.reload()},error:function(t){console.log(t.message)}}),p("btcpaywall_initiated_purchase")&&t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_paid_content_file_invoice",invoice_id:p("btcpaywall_initiated_purchase"),nonce_ajax:payment.security},success:function(t){t.success&&location.reload()},error:function(t){console.log(t.message)}})})),t(document).ready((function(){var e=null,a=null;t("#view_revenue_type, #post_revenue_type").submit((function(n){if(n.preventDefault(),e&&a)i(e);else{var p=t("#btcpw_pay__button").text();t("#btcpw_pay__button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>');var _=t("#btcpw_pay__button").data("post_id");t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_get_invoice_id",post_id:_,full_name:t("#btcpw_revenue_post_customer_name, #btcpw_revenue_view_customer_name, #btcpw_revenue_file_customer_name").val(),email:t("#btcpw_revenue_post_customer_email, #btcpw_revenue_view_customer_email, #btcpw_revenue_file_customer_email").val(),address:t("#btcpw_revenue_post_customer_address, #btcpw_revenue_view_customer_address, #btcpw_revenue_file_customer_address").val(),phone:t("#btcpw_revenue_post_customer_phone, #btcpw_revenue_view_customer_phone, #btcpw_revenue_file_customer_phone").val(),message:t("#btcpw_revenue_post_customer_message, #btcpw_revenue_view_customer_message, #btcpw_revenue_file_customer_message").val(),nonce_ajax:payment.security},success:function(n){t("#btcpw_pay__button").html(p),n.success&&(e=n.data.invoice_id,a=t(".btcpw_revenue_post_container,.btcpw_revenue_view_container"),i(e))},error:function(t){console.log(t.message)}})}}))})),t(document).ready((function(){var e=null,a=null;t("#tipping_form_box").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_tipping__button").text();t("#btcpw_tipping__button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),p.preventDefault(),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_tipping_currency").val(),amount:t("#btcpw_tipping_amount").val(),predefined_amount:t("input[type=radio][name=btcpw_tipping_default_amount]:checked").val(),type:"Tipping Box",nonce_ajax:payment.security},success:function(i){t("#btcpw_tipping__button").html(_),i.success&&(window.location.href,i.data.donor,e=i.data.invoice_id,a=t(".btcpw_tipping_box_container"),n(e,0,t("#btcpw_redirect_link").val()))},error:function(t){console.log(t.message)}})}})),t("#tipping_form_box_widget").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_tipping__button_btcpw_widget").text();t("#btcpw_tipping__button_btcpw_widget").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_tipping_currency_btcpw_widget").val(),amount:t("#btcpw_tipping_amount_btcpw_widget").val(),type:"Tipping Box Widget",nonce_ajax:payment.security},success:function(i){t("#btcpw_tipping__button_btcpw_widget").html(_),i.success&&(e=i.data.invoice_id,a=t(".btcpw_widget.btcpw_tipping_box_container"),n(e,0,t("#btcpw_redirect_link_btcpw_widget").val()),window.location.href,i.data.donor)},error:function(t){console.log(t.message)}})}})),t("#page_tipping_form").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_page_tipping__button").text();t("#btcpw_page_tipping__button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_page_tipping_currency").val(),amount:t("#btcpw_page_tipping_amount").val(),predefined_amount:t("input[type=radio][name=btcpw_page_tipping_default_amount]:checked").val(),name:t("#btcpw_page_tipping_donor_name").val(),email:t("#btcpw_page_tipping_donor_email").val(),address:t("#btcpw_page_tipping_donor_address").val(),phone:t("#btcpw_page_tipping_donor_phone").val(),message:t("#btcpw_page_tipping_donor_message").val(),type:"Tipping Page",nonce_ajax:payment.security},success:function(i){t("#btcpw_page_tipping__button").html(_),i.success&&(e=i.data.invoice_id,a=t(".btcpw_page_tipping_container"),n(e,0,t("#btcpw_page_redirect_link").val()),window.location.href,i.data.donor)},error:function(t){console.log(t.message)}})}})),t("#skyscraper_tipping_high_form").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_skyscraper_tipping_high_button").text();t("#btcpw_skyscraper_tipping_high_button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_skyscraper_tipping_high_currency").val(),amount:t("#btcpw_skyscraper_tipping_high_amount").val(),predefined_amount:t(" input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]:checked").val(),name:t("#btcpw_skyscraper_tipping_donor_name_high").val(),email:t("#btcpw_skyscraper_tipping_donor_email_high").val(),address:t("#btcpw_skyscraper_tipping_donor_address_high").val(),phone:t("#btcpw_skyscraper_tipping_donor_phone_high").val(),message:t("#btcpw_skyscraper_tipping_donor_message_high").val(),type:"Tipping Banner High",nonce_ajax:payment.security},success:function(i){t("#btcpw_skyscraper_tipping_high_button").html(_),i.success&&(e=i.data.invoice_id,a=t(".btcpw_skyscraper_banner.high"),n(e,0,t("#btcpw_skyscraper_redirect_link_high").val()),window.location.href,i.data.donor)},error:function(t){console.log(t.message)}})}})),t("#btcpw_widget_skyscraper_tipping_form_high").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_widget_btcpw_skyscraper_tipping__button_high").text();t("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_widget_btcpw_skyscraper_tipping_currency_high").val(),amount:t("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val(),predefined_amount:t("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]:checked").val(),name:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_name_high").val(),email:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_email_high").val(),address:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_address_high").val(),phone:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_high").val(),message:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_message_high").val(),type:"Tipping Banner High Widget",nonce_ajax:payment.security},success:function(i){t("#btcpw_widget_btcpw_skyscraper_tipping__button_high").html(_),i.success&&(e=i.data.invoice_id,a=t(".btcpw_widget.btcpw_skyscraper_banner.high"),n(e,0,t("#btcpw_widget_btcpw_skyscraper_redirect_link_high").val()),window.location.href,i.data.donor)},error:function(t){console.log(t.message)}})}})),t("#skyscraper_tipping_wide_form").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_skyscraper_tipping_wide_button").text();t("#btcpw_skyscraper_tipping_wide_button").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_skyscraper_tipping_wide_currency").val(),amount:t("#btcpw_skyscraper_tipping_wide_amount").val(),predefined_amount:t("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]:checked").val(),name:t("#btcpw_skyscraper_tipping_donor_name_wide").val(),email:t("#btcpw_skyscraper_tipping_donor_email_wide").val(),address:t("#btcpw_skyscraper_tipping_donor_address_wide").val(),phone:t("#btcpw_skyscraper_tipping_donor_phone_wide").val(),message:t("#btcpw_skyscraper_tipping_donor_message_wide").val(),type:"Tipping Banner Wide",nonce_ajax:payment.security},success:function(i){t("#btcpw_skyscraper_tipping_wide_button").html(_),i.success&&(e=i.data.invoice_id,a=t(".btcpw_skyscraper_banner.wide"),n(e,0,t("#btcpw_skyscraper_redirect_link_wide").val()),window.location.href,i.data.donor)},error:function(t){console.log(t.message)}})}})),t("#btcpw_widget_skyscraper_tipping_form_wide").submit((function(p){if(p.preventDefault(),e&&a)i(e);else{var _=t("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").text();t("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html('<span class="tipping-border" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_tipping",currency:t("#btcpw_widget_btcpw_skyscraper_tipping_currency_wide").val(),amount:t("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val(),predefined_amount:t("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]:checked").val(),name:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_name_wide").val(),email:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_email_wide").val(),address:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_address_wide").val(),phone:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_phone_wide").val(),message:t("#btcpw_widget_btcpw_skyscraper_tipping_donor_message_wide").val(),type:"Tipping Banner Wide Widget",nonce_ajax:payment.security},success:function(i){t("#btcpw_widget_btcpw_skyscraper_tipping__button_wide").html(_),i.success&&(e=i.data.invoice_id,a=t(".btcpw_widget.btcpw_skyscraper_banner.wide"),n(e,0,t("#btcpw_widget_btcpw_skyscraper_redirect_link_wide").val()),window.location.href,i.data.donor)},error:function(t){console.log(t.message)}})}}))}))}(jQuery);