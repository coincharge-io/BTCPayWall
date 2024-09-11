!function(e){"use strict";function t(){let t;return e.ajax({url:"/wp-admin/admin-ajax.php",async:!1,method:"GET",data:{action:"btcpw_convert_currencies"},success:function(e){e.success?t=e:console.log(e)}}),t}function a(e,t,a,_,r,p){var n=Number(t);switch(e){case"BTC":return(n*a).toFixed(2);case"USD":return(r/a*n).toFixed(0);case"EUR":return(r/_*n).toFixed(0);case"GBP":return(r/p*n).toFixed(0);default:return(a/r*n).toFixed(2)}}function _(e){switch(e){case"BTC":default:return"USD";case"USD":case"EUR":case"GBP":return"SATS"}}e(document).ready((function(){e(".btcpaywall_cart_remove_item_btn").on("click",(function(t){t.preventDefault();var a=e(this).data("cart-key");e.ajax({url:"/wp-admin/admin-ajax.php",type:"POST",data:{action:"btcpw_remove_from_cart",cart_item:a,nonce_ajax:payment.security},success:function(){location.reload()}})})),e("#btcpaywall_download_form").submit((function(t){t.preventDefault();var a=e("#btcpw_download_id").data("post_id"),_=e("#btcpw_download_id").data("post_title");e.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_add_to_cart",id:a,title:_,nonce_ajax:payment.security},success:function(e){e.success&&location.replace(e.data.data)},error:function(e){console.log(e.message)}})}))})),e(document).ready((function(){e("#btcpw_tipping_currency").change((function(){var t="BTC"===e(this).val()?"0.00000001":"SATS"===e(this).val()?"1":"0.50";e("#btcpw_tipping_amount").attr({step:t,value:parseInt(e("#btcpw_tipping_amount").val())})}))})),e(document).ready((function(){var r,p,n,i;e("#btcpw_tipping_amount,#btcpw_tipping_amount_btcpw_widget,#btcpw_page_tipping_amount,#btcpw_widget_btcpw_skyscraper_tipping_amount_high,#btcpw_widget_btcpw_skyscraper_tipping_amount_wide,#btcpw_skyscraper_tipping_high_amount,#btcpw_skyscraper_tipping_wide_amount ").on("input",(function(){if(r)return;let e=t();r=e.data.eur.value,p=e.data.usd.value,n=e.data.sats.value,i=e.data.gbp.value})),e("#value_1_high, #value_2_high, #value_3_high,#value_1_wide, #value_2_wide, #value_3_wide").on("change",(function(){if(r)return;let e=t();r=e.data.eur.value,p=e.data.usd.value,n=e.data.sats.value,i=e.data.gbp.value})),e(".btcpw_skyscraper_amount_value_1, .btcpw_skyscraper_amount_value_2, .btcpw_skyscraper_amount_value_3,.btcpw_page_amount_value_1, .btcpw_page_amount_value_2, .btcpw_page_amount_value_3").on("click",(function(){if(r)return;let e=t();r=e.data.eur.value,p=e.data.usd.value,n=e.data.sats.value,i=e.data.gbp.value})),e("#btcpw_tipping_amount").on("input",(function(){var t=e("#btcpw_tipping_currency").val(),c=e(this).val();e("#btcpw_converted_amount").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_converted_currency").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#btcpw_tipping_amount_btcpw_widget").on("input",(function(){var t=e("#btcpw_tipping_currency_btcpw_widget").val(),c=e(this).val();e("#btcpw_converted_amount_btcpw_widget").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_converted_currency_btcpw_widget").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#btcpw_page_tipping_amount").on("input",(function(){var t=e("#btcpw_page_tipping_currency").val(),c=e(this).val();e("#btcpw_page_converted_amount").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_page_converted_currency").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on("input",(function(){var t=e("#btcpw_widget_btcpw_skyscraper_tipping_currency_high").val(),c=e(this).val();e("#btcpw_widget_btcpw_skyscraper_converted_amount_high").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_high").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on("input",(function(){var t=e("#btcpw_widget_btcpw_skyscraper_tipping_currency_wide").val(),c=e(this).val();e("#btcpw_widget_btcpw_skyscraper_converted_amount_wide").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_wide").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#btcpw_skyscraper_tipping_high_amount").on("input",(function(){var t=e("#btcpw_skyscraper_tipping_high_currency").val(),c=e(this).val();e("#btcpw_skyscraper_high_converted_amount").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_skyscraper_high_converted_currency").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#value_1_high, #value_2_high, #value_3_high").change((function(){if(e(this).is(":checked")){var t=e(this).val().split(" ");e("#btcpw_skyscraper_high_converted_amount").attr("readonly",!1).val(a(t[1],t[0],p,r,n,i)).attr("readonly",!0),e("#btcpw_skyscraper_high_converted_currency").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)}})),e("#btcpw_skyscraper_tipping_wide_amount").on("input",(function(){var t=e("#btcpw_skyscraper_tipping_wide_currency").val(),c=e(this).val();e("#btcpw_skyscraper_wide_converted_amount").attr("readonly",!1).val(a(t,c,p,r,n,i)).attr("readonly",!0),e("#btcpw_skyscraper_wide_converted_currency").attr("readonly",!1).val(_(t)).attr("readonly",!0)})),e("#value_1_wide, #value_2_wide, #value_3_wide").change((function(){if(e(this).is(":checked")){var t=e(this).val().split(" ");e("#btcpw_skyscraper_wide_converted_amount").attr("readonly",!1).val(a(t[1],t[0],p,r,n,i)).attr("readonly",!0),e("#btcpw_skyscraper_wide_converted_currency").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)}})),e(".btcpw_page_amount_value_1, .btcpw_page_amount_value_2, .btcpw_page_amount_value_3").on("click",(function(){switch(e(this)[0].className){case"btcpw_page_amount_value_1":e(".btcpw_page_amount_value_2").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected");break;case"btcpw_page_amount_value_2":e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected");break;case"btcpw_page_amount_value_3":e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_2").removeClass("selected");break;default:e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_2").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var t=e(this).children().find("input:radio").val().split(" ");e("#btcpw_page_converted_amount").attr("readonly",!1).val(a(t[1],t[0],p,r,n,i)).attr("readonly",!0),e("#btcpw_page_converted_currency").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)})),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high, .btcpw_widget.btcpw_skyscraper_amount_value_2.high, .btcpw_widget.btcpw_skyscraper_amount_value_3.high").on("click",(function(){switch(e(this)[0].className){case"btcpw_widget.btcpw_skyscraper_amount_value_1.high":e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_2.high":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_3.high":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected");break;default:e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var t=e(this).children().find("input:radio").val().split(" ");e("#btcpw_widget_btcpw_skyscraper_converted_amount_high").attr("readonly",!1).val(a(t[1],t[0],p,r,n,i)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_high").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)})),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide, .btcpw_widget.btcpw_skyscraper_amount_value_2.wide, .btcpw_widget.btcpw_skyscraper_amount_value_3.wide").on("click",(function(){switch(e(this)[0].className){case"btcpw_widget.btcpw_skyscraper_amount_value_1.wide":e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_2.wide":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_3.wide":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected");break;default:e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var t=e(this).children().find("input:radio").val().split(" ");e("#btcpw_widget_btcpw_skyscraper_converted_amount_wide").attr("readonly",!1).val(a(t[1],t[0],p,r,n)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_wide").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)})),e(".btcpw_skyscraper_amount_value_1.high, .btcpw_skyscraper_amount_value_2.high, .btcpw_skyscraper_amount_value_3.high").on("click",(function(){switch(e(this)[0].className){case"btcpw_skyscraper_amount_value_1.high":e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_skyscraper_amount_value_2.high":e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_skyscraper_amount_value_3.high":e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected");break;default:e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var t=e(this).children().find("input:radio").val().split(" ");e("#btcpw_skyscraper_converted_amount").attr("readonly",!1).val(a(t[1],t[0],p,r,n,i)).attr("readonly",!0),e("#btcpw_skyscraper_converted_currency").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)})),e(".btcpw_skyscraper_amount_value_1.wide, .btcpw_skyscraper_amount_value_2.wide, .btcpw_skyscraper_amount_value_3.wide").on("click",(function(){switch(e(this)[0].className){case"btcpw_skyscraper_amount_value_1.wide":e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_skyscraper_amount_value_2.wide":e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_skyscraper_amount_value_3.wide":e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected");break;default:e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var t=e(this).children().find("input:radio").val().split(" ");e("#btcpw_skyscraper_converted_amount").attr("readonly",!1).val(a(t[1],t[0],p,r,n,i)).attr("readonly",!0),e("#btcpw_skyscraper_converted_currency").attr("readonly",!1).val(_(t[1])).attr("readonly",!0)}))})),e(document).ready((function(){e("input[type=radio][name=btcpw_tipping_default_amount]").change((function(){e("input[type=radio][name=btcpw_tipping_default_amount]").attr("required",!0),e("#btcpw_tipping_amount").removeAttr("required"),e("#btcpw_tipping_amount").val("")})),e("#btcpw_tipping_amount").on("click",(function(){e("#btcpw_tipping_amount").attr("required",!0),e("input[type=radio][name=btcpw_tipping_default_amount]").removeAttr("required"),e("input[type=radio][name=btcpw_tipping_default_amount]").prop("checked",!1)})),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").change((function(){e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").attr("required",!0),e("input[name=btcpw_skyscraper_tipping_amount_wide]").removeAttr("required"),e("input[name=btcpw_skyscraper_tipping_amount_wide]").val("")})),e("input[name=btcpw_skyscraper_tipping_amount_wide]").on("click",(function(){e("input[name=btcpw_skyscraper_tipping_amount_wide]").attr("required",!0),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").removeAttr("required"),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").prop("checked",!1),e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected")})),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").change((function(){e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").attr("required",!0),e("input[name=btcpw_skyscraper_tipping_amount_high]").removeAttr("required"),e("input[name=btcpw_skyscraper_tipping_amount_high]").val("")})),e("input[name=btcpw_skyscraper_tipping_amount_high]").on("click",(function(){e("input[name=btcpw_skyscraper_tipping_amount_high]").attr("required",!0),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").removeAttr("required"),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").prop("checked",!1),e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected")})),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").attr("required",!0),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").removeAttr("required"),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").val("")})),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").on("click",(function(){e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").prop("checked",!1),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected")})),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").attr("required",!0),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").removeAttr("required"),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").val("")})),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").on("click",(function(){e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").prop("checked",!1),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected")}))})),e(document).ready((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").attr("required",!0),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").removeAttr("required"),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val("")})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on("click",(function(){e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").prop("checked",!1)}))})),e(document).ready((function(){e("input[name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").attr("required",!0),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").removeAttr("required"),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val("")})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on("click",(function(){e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").prop("checked",!1)})),e("input[type=radio][name=btcpw_page_tipping_default_amount]").change((function(){e("input[type=radio][name=btcpw_page_tipping_default_amount]").attr("required",!0),e("#btcpw_page_tipping_amount").removeAttr("required"),e("#btcpw_page_tipping_amount").val("")})),e("#btcpw_page_tipping_amount").on("click",(function(){e("#btcpw_page_tipping_amount").attr("required",!0),e("input[type=radio][name=btcpw_page_tipping_default_amount]").removeAttr("required"),e("input[type=radio][name=btcpw_page_tipping_default_amount]").prop("checked",!1),e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_2").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected")}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]"),_=e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"),r=0!==_.length&&0===a.length?_:a;e("input.btcpw_widget.skyscraper-next-form.high").on("click",(function(){r[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):r[0].reportValidity()})),e("input.btcpw_widget.skyscraper-previous-form.high").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]"),_=e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"),r=0!==_.length&&0===a.length?_:a;e("input.btcpw_widget.skyscraper-next-form.wide").on("click",(function(){r[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):r[0].reportValidity()})),e("input.btcpw_widget.skyscraper-previous-form.wide").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("#btcpw_page_tipping_amount"),_=e(".btcpw_page_tipping_default_amount"),r=0!==_.length&&0===a.length?_:a;e("input.page-next-form").on("click",(function(){r[0].checkValidity()?(e(".btcpw_page_bar_container.bar-1").removeClass("active"),e(".btcpw_page_bar_container.bar-2").addClass("active"),t=e(this).parent().parent(),e(this).parent().parent().next().show(),t.hide()):r[0].reportValidity()})),e("input.page-previous-form").on("click",(function(){e(".btcpw_page_bar_container.bar-2").removeClass("active"),e(".btcpw_page_bar_container.bar-1").addClass("active"),t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_skyscraper_tipping_amount_high]"),_=e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"),r=0!==_.length&&0===a.length?_:a;e("input.skyscraper-next-form.high").on("click",(function(){r[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):r[0].reportValidity()})),e("input.skyscraper-previous-form.high").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_skyscraper_tipping_amount_wide]"),_=e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"),r=0!==_.length&&0===a.length?_:a;e("input.skyscraper-next-form.wide").on("click",(function(){r[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):r[0].reportValidity()})),e("input.skyscraper-previous-form.wide").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".revenue-post-next-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()})),e("input.revenue-post-previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".revenue-view-next-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()})),e("input.revenue-view-previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".revenue-file-next-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()})),e("input.revenue-file-previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".btcpw_digital_download_protected_area fieldset").length,e("input.btcpw_digital_download.next-form").on("click",(function(){t=e(this).parent().parent(),e(this).parent().parent().next().show(),t.hide()})),e("input.btcpw_digital_download.previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))}))}(jQuery);