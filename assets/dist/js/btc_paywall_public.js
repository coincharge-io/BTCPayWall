!function(e){var t={};function a(r){if(t[r])return t[r].exports;var p=t[r]={i:r,l:!1,exports:{}};return e[r].call(p.exports,p,p.exports,a),p.l=!0,p.exports}a.m=e,a.c=t,a.d=function(e,t,r){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(a.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var p in e)a.d(r,p,function(t){return e[t]}.bind(null,p));return r},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="",a(a.s=9)}({9:function(e,t){!function(e){"use strict";function t(e,t,a,r,p,_){var n=Number(t);switch(e){case"BTC":return(n*a).toFixed(2);case"USD":return(p/a*n).toFixed(0);case"EUR":return(p/r*n).toFixed(0);case"GBP":return(p/_*n).toFixed(0);default:return(a/p*n).toFixed(2)}}function a(e){switch(e){case"BTC":return"USD";case"USD":case"EUR":case"GBP":return"SATS";default:return"USD"}}e(document).ready((function(){e(".btcpaywall_cart_remove_item_btn").on("click",(function(t){t.preventDefault();var a=e(this).data("cart-key");e.ajax({url:"/wp-admin/admin-ajax.php",type:"POST",data:{action:"btcpw_remove_from_cart",cart_item:a},success:function(){location.reload()}})})),e("#btcpaywall_download_form").submit((function(t){t.preventDefault();var a=e("#btcpw_download_id").data("post_id"),r=e("#btcpw_download_id").data("post_title");e.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_add_to_cart",id:a,title:r},success:function(e){e.success&&location.replace(e.data.data)},error:function(e){console.log(e.message)}})}))})),e(document).ready((function(){e("#btcpw_tipping_currency").change((function(){var t="BTC"===e(this).val()?"0.00000001":"SATS"===e(this).val()?"1":"0.50";e("#btcpw_tipping_amount").attr({step:t,value:parseInt(e("#btcpw_tipping_amount").val())})}))})),e(document).ready((function(){var r,p,_,n;e.ajax({url:"/wp-admin/admin-ajax.php",method:"GET",data:{action:"btcpw_convert_currencies"},success:function(e){e.success?(r=e.data.eur.value,p=e.data.usd.value,_=e.data.sats.value,n=e.data.gbp.value):console.log(e)}}),e("#btcpw_tipping_amount").on("input",(function(){var i=e("#btcpw_tipping_currency").val(),c=e(this).val();t(i,c,p,r,_,n),e("#btcpw_converted_amount").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_converted_currency").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#btcpw_tipping_amount_btcpw_widget").on("input",(function(){var i=e("#btcpw_tipping_currency_btcpw_widget").val(),c=e(this).val();t(i,c,p,r,_,n),e("#btcpw_converted_amount_btcpw_widget").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_converted_currency_btcpw_widget").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#btcpw_page_tipping_amount").on("input",(function(){var i=e("#btcpw_page_tipping_currency").val(),c=e(this).val();t(i,c,p,r,_,n),e("#btcpw_page_converted_amount").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_page_converted_currency").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on("input",(function(){var i=e("#btcpw_widget_btcpw_skyscraper_tipping_currency_high").val(),c=e(this).val();t(i,c,p,r,_,n),e("#btcpw_widget_btcpw_skyscraper_converted_amount_high").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_high").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on("input",(function(){var i=e("#btcpw_widget_btcpw_skyscraper_tipping_currency_wide").val(),c=e(this).val();t(i,c,p,r,_,n),e("#btcpw_widget_btcpw_skyscraper_converted_amount_wide").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_wide").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#btcpw_skyscraper_tipping_high_amount").on("input",(function(){var i=e("#btcpw_skyscraper_tipping_high_currency").val(),c=e(this).val();t(i,c,p,r,_,n),e("#btcpw_skyscraper_high_converted_amount").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_skyscraper_high_converted_currency").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#value_1_high, #value_2_high, #value_3_high").change((function(){if(e(this).is(":checked")){var i=e(this).val().split(" ");t(i[1],i[0],p,r,_,n),t(i[1],i[0],p,r,_,n),a(i[1]),e("#btcpw_skyscraper_high_converted_amount").attr("readonly",!1).val(t(i[1],i[0],p,r,_,n)).attr("readonly",!0),e("#btcpw_skyscraper_high_converted_currency").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)}})),e("#btcpw_skyscraper_tipping_wide_amount").on("input",(function(){var i=e("#btcpw_skyscraper_tipping_wide_currency").val(),c=e(this).val();t(i,c,p,r,_),e("#btcpw_skyscraper_wide_converted_amount").attr("readonly",!1).val(t(i,c,p,r,_,n)).attr("readonly",!0),e("#btcpw_skyscraper_wide_converted_currency").attr("readonly",!1).val(a(i)).attr("readonly",!0)})),e("#value_1_wide, #value_2_wide, #value_3_wide").change((function(){if(e(this).is(":checked")){var i=e(this).val().split(" ");t(i[1],i[0],p,r,_,n),t(i[1],i[0],p,r,_,n),a(i[1]),e("#btcpw_skyscraper_wide_converted_amount").attr("readonly",!1).val(t(i[1],i[0],p,r,_,n)).attr("readonly",!0),e("#btcpw_skyscraper_wide_converted_currency").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)}})),e(".btcpw_page_amount_value_1, .btcpw_page_amount_value_2, .btcpw_page_amount_value_3").on("click",(function(){switch(e(this)[0].className){case"btcpw_page_amount_value_1":e(".btcpw_page_amount_value_2").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected");break;case"btcpw_page_amount_value_2":e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected");break;case"btcpw_page_amount_value_3":e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_2").removeClass("selected");break;default:e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_2").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var i=e(this).children().find("input:radio").val().split(" ");t(i[1],i[0],p,r,_,n),t(i[1],i[0],p,r,_,n),a(i[1]),e("#btcpw_page_converted_amount").attr("readonly",!1).val(t(i[1],i[0],p,r,_,n)).attr("readonly",!0),e("#btcpw_page_converted_currency").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)})),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high, .btcpw_widget.btcpw_skyscraper_amount_value_2.high, .btcpw_widget.btcpw_skyscraper_amount_value_3.high").on("click",(function(){switch(e(this)[0].className){case"btcpw_widget.btcpw_skyscraper_amount_value_1.high":e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_2.high":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_3.high":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected");break;default:e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var i=e(this).children().find("input:radio").val().split(" ");t(i[1],i[0],p,r,_,n),t(i[1],i[0],p,r,_,n),a(i[1]),e("#btcpw_widget_btcpw_skyscraper_converted_amount_high").attr("readonly",!1).val(t(i[1],i[0],p,r,_,n)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_high").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)})),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide, .btcpw_widget.btcpw_skyscraper_amount_value_2.wide, .btcpw_widget.btcpw_skyscraper_amount_value_3.wide").on("click",(function(){switch(e(this)[0].className){case"btcpw_widget.btcpw_skyscraper_amount_value_1.wide":e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_2.wide":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_widget.btcpw_skyscraper_amount_value_3.wide":e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected");break;default:e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var i=e(this).children().find("input:radio").val().split(" ");t(i[1],i[0],p,r,_,n),t(i[1],i[0],p,r,_,n),a(i[1]),e("#btcpw_widget_btcpw_skyscraper_converted_amount_wide").attr("readonly",!1).val(t(i[1],i[0],p,r,_)).attr("readonly",!0),e("#btcpw_widget_btcpw_skyscraper_converted_currency_wide").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)})),e(".btcpw_skyscraper_amount_value_1.high, .btcpw_skyscraper_amount_value_2.high, .btcpw_skyscraper_amount_value_3.high").on("click",(function(){switch(e(this)[0].className){case"btcpw_skyscraper_amount_value_1.high":e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_skyscraper_amount_value_2.high":e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected");break;case"btcpw_skyscraper_amount_value_3.high":e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected");break;default:e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var i=e(this).children().find("input:radio").val().split(" ");t(i[1],i[0],p,r,_,n),t(i[1],i[0],p,r,_),a(i[1]),e("#btcpw_skyscraper_converted_amount").attr("readonly",!1).val(t(i[1],i[0],p,r,_,n)).attr("readonly",!0),e("#btcpw_skyscraper_converted_currency").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)})),e(".btcpw_skyscraper_amount_value_1.wide, .btcpw_skyscraper_amount_value_2.wide, .btcpw_skyscraper_amount_value_3.wide").on("click",(function(){switch(e(this)[0].className){case"btcpw_skyscraper_amount_value_1.wide":e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_skyscraper_amount_value_2.wide":e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected");break;case"btcpw_skyscraper_amount_value_3.wide":e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected");break;default:e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected")}e(this).children().find("input:radio").prop("checked",!0).change(),e(this).children().find("input:radio").is(":checked")&&e(this).toggleClass("selected");var i=e(this).children().find("input:radio").val().split(" ");t(i[1],i[0],p,r,_),t(i[1],i[0],p,r,_),a(i[1]),e("#btcpw_skyscraper_converted_amount").attr("readonly",!1).val(t(i[1],i[0],p,r,_,n)).attr("readonly",!0),e("#btcpw_skyscraper_converted_currency").attr("readonly",!1).val(a(i[1])).attr("readonly",!0)}))})),e(document).ready((function(){e("input[type=radio][name=btcpw_tipping_default_amount]").change((function(){e("input[type=radio][name=btcpw_tipping_default_amount]").attr("required",!0),e("#btcpw_tipping_amount").removeAttr("required"),e("#btcpw_tipping_amount").val("")})),e("#btcpw_tipping_amount").on("click",(function(){e("#btcpw_tipping_amount").attr("required",!0),e("input[type=radio][name=btcpw_tipping_default_amount]").removeAttr("required"),e("input[type=radio][name=btcpw_tipping_default_amount]").prop("checked",!1)})),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").change((function(){e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").attr("required",!0),e("input[name=btcpw_skyscraper_tipping_amount_wide]").removeAttr("required"),e("input[name=btcpw_skyscraper_tipping_amount_wide]").val("")})),e("input[name=btcpw_skyscraper_tipping_amount_wide]").on("click",(function(){e("input[name=btcpw_skyscraper_tipping_amount_wide]").attr("required",!0),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").removeAttr("required"),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]").prop("checked",!1),e(".btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.wide").removeClass("selected")})),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").change((function(){e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").attr("required",!0),e("input[name=btcpw_skyscraper_tipping_amount_high]").removeAttr("required"),e("input[name=btcpw_skyscraper_tipping_amount_high]").val("")})),e("input[name=btcpw_skyscraper_tipping_amount_high]").on("click",(function(){e("input[name=btcpw_skyscraper_tipping_amount_high]").attr("required",!0),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").removeAttr("required"),e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]").prop("checked",!1),e(".btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_skyscraper_amount_value_3.high").removeClass("selected")})),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").attr("required",!0),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").removeAttr("required"),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").val("")})),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").on("click",(function(){e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").prop("checked",!1),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.wide").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.wide").removeClass("selected")})),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").attr("required",!0),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").removeAttr("required"),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").val("")})),e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").on("click",(function(){e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").prop("checked",!1),e(".btcpw_widget.btcpw_skyscraper_amount_value_1.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_2.high").removeClass("selected"),e(".btcpw_widget.btcpw_skyscraper_amount_value_3.high").removeClass("selected")}))})),e(document).ready((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").attr("required",!0),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").removeAttr("required"),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").val("")})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").on("click",(function(){e("#btcpw_widget_btcpw_skyscraper_tipping_amount_high").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]").prop("checked",!1)}))})),e(document).ready((function(){e("input[name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").change((function(){e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").attr("required",!0),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").removeAttr("required"),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").val("")})),e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").on("click",(function(){e("#btcpw_widget_btcpw_skyscraper_tipping_amount_wide").attr("required",!0),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").removeAttr("required"),e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]").prop("checked",!1)})),e("input[type=radio][name=btcpw_page_tipping_default_amount]").change((function(){e("input[type=radio][name=btcpw_page_tipping_default_amount]").attr("required",!0),e("#btcpw_page_tipping_amount").removeAttr("required"),e("#btcpw_page_tipping_amount").val("")})),e("#btcpw_page_tipping_amount").on("click",(function(){e("#btcpw_page_tipping_amount").attr("required",!0),e("input[type=radio][name=btcpw_page_tipping_default_amount]").removeAttr("required"),e("input[type=radio][name=btcpw_page_tipping_default_amount]").prop("checked",!1),e(".btcpw_page_amount_value_1").removeClass("selected"),e(".btcpw_page_amount_value_2").removeClass("selected"),e(".btcpw_page_amount_value_3").removeClass("selected")}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_high]"),r=e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_high]"),p=0!==r.length&&0===a.length?r:a;e("input.btcpw_widget.skyscraper-next-form.high").on("click",(function(){p[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):p[0].reportValidity()})),e("input.btcpw_widget.skyscraper-previous-form.high").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_widget_btcpw_skyscraper_tipping_amount_wide]"),r=e("input[type=radio][name=btcpw_widget_btcpw_skyscraper_tipping_default_amount_wide]"),p=0!==r.length&&0===a.length?r:a;e("input.btcpw_widget.skyscraper-next-form.wide").on("click",(function(){p[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):p[0].reportValidity()})),e("input.btcpw_widget.skyscraper-previous-form.wide").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("#btcpw_page_tipping_amount"),r=e(".btcpw_page_tipping_default_amount"),p=0!==r.length&&0===a.length?r:a;e("input.page-next-form").on("click",(function(){p[0].checkValidity()?(e(".btcpw_page_bar_container.bar-1").removeClass("active"),e(".btcpw_page_bar_container.bar-2").addClass("active"),t=e(this).parent().parent(),e(this).parent().parent().next().show(),t.hide()):p[0].reportValidity()})),e("input.page-previous-form").on("click",(function(){e(".btcpw_page_bar_container.bar-2").removeClass("active"),e(".btcpw_page_bar_container.bar-1").addClass("active"),t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_skyscraper_tipping_amount_high]"),r=e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_high]"),p=0!==r.length&&0===a.length?r:a;e("input.skyscraper-next-form.high").on("click",(function(){p[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):p[0].reportValidity()})),e("input.skyscraper-previous-form.high").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t,a=e("input[name=btcpw_skyscraper_tipping_amount_wide]"),r=e("input[type=radio][name=btcpw_skyscraper_tipping_default_amount_wide]"),p=0!==r.length&&0===a.length?r:a;e("input.skyscraper-next-form.wide").on("click",(function(){p[0].checkValidity()?(t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()):p[0].reportValidity()})),e("input.skyscraper-previous-form.wide").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".revenue-post-next-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()})),e("input.revenue-post-previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".revenue-view-next-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()})),e("input.revenue-view-previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".revenue-file-next-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().next().show(),t.hide()})),e("input.revenue-file-previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))})),e(document).ready((function(){var t;e(".btcpw_digital_download_protected_area fieldset").length,e("input.btcpw_digital_download.next-form").on("click",(function(){t=e(this).parent().parent(),e(this).parent().parent().next().show(),t.hide()})),e("input.btcpw_digital_download.previous-form").on("click",(function(){t=e(this).parent().parent().parent(),e(this).parent().parent().parent().prev().show(),t.hide()}))}))}(jQuery)}});