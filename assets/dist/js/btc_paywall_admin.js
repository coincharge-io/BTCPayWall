!function(t){var _={};function e(i){if(_[i])return _[i].exports;var a=_[i]={i:i,l:!1,exports:{}};return t[i].call(a.exports,a,a.exports,e),a.l=!0,a.exports}e.m=t,e.c=_,e.d=function(t,_,i){e.o(t,_)||Object.defineProperty(t,_,{enumerable:!0,get:i})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,_){if(1&_&&(t=e(t)),8&_)return t;if(4&_&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(e.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&_&&"string"!=typeof t)for(var a in t)e.d(i,a,function(_){return t[_]}.bind(null,a));return i},e.n=function(t){var _=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(_,"a",_),_},e.o=function(t,_){return Object.prototype.hasOwnProperty.call(t,_)},e.p="",e(e.s=7)}({7:function(t,e){!function(t){"use strict";function e(e){e.find(".widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-button_color_hover,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high,.widget-tipping-basic-continue_button_text_color_high,.widget-tipping-basic-continue_button_color_high,.widget-tipping-basic-previous_button_text_color_high,.widget-tipping-basic-previous_button_color_high,.widget-tipping-basic-button_color_hover_wide,.widget-tipping-basic-continue_button_color_hover_wide,.widget-tipping-basic-previous_button_color_hover_wide,.widget-tipping-basic-continue_button_text_color_wide,.widget-tipping-basic-continue_button_color_wide,.widget-tipping-basic-previous_button_text_color_wide,.widget-tipping-basic-previous_button_color_wide,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color,.widget-tipping-basic-selected_amount_background_wide,.widget-tipping-basic-selected_amount_background_high,.widget-tipping-basic-button_color_hover_high,.widget-tipping-basic-continue_button_color_hover_high,.widget-tipping-basic-previous_button_color_hover_high").iris({defaultColor:!0,change:_.throttle((function(){t(this).val()&&t(this).trigger("change")}),3e3),clear:function(){},hide:!0,palettes:!0})}function i(t,_){var e;t.click((function(i){i.preventDefault(),e||(e=wp.media.frames.file_frame=wp.media({title:"Choose Image",button:{text:"Choose Image"},multiple:!1})).on("select",(function(){var i=e.state().get("selection").first().toJSON();_.val(i.id).trigger("change"),t.html('<img height=100px width=100px src="'+i.url+'">').next().show()})),e.open()}))}function a(_){t(_).on("click",(function(_){_.preventDefault();var e=t(this);e.next().val("").trigger("change"),e.hide().prev().html("Upload")}))}t(document).ready((function(){t("#btcpw_btcpay_check_status").click((function(){t(".btcpw_btcpay_status").hide(500),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_check_greenfield_api_work",auth_key_view:t("#btcpw_btcpay_auth_key_view").val(),auth_key_create:t("#btcpw_btcpay_auth_key_create").val(),server_url:t("#btcpw_btcpay_server_url").val()},success:function(_){_.success?(t("#btcpw_btcpay_store_id").val(_.data.store_id),t("#btcpw_btcpay_status_success").fadeIn(500)):t("#btcpw_btcpay_status_error").html(_.data.message).fadeIn(500)},error:function(t){console.log(t)}})}))})),t(document).ready((function(){t("#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_view_duration_type").change((function(){var _=t(this).val();"unlimited"===_||"onetime"===_?t("#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration").prop({required:!1,disabled:!0}):t("#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration").prop({required:!0,disabled:!1})}))})),t(document).ready((function(){t("#btcpaywall_pay_per_post_currency, #btcpaywall_pay_per_view_currency").change((function(){var _="SATS"===t(this).val()?"1":"BTC"===t(this).val()?"0.00000001":"0.50";t("#btcpaywall_pay_per_post_price,#btcpaywall_pay_per_view_price").attr({step:_,value:parseInt(t("#btcpaywall_pay_per_post_price,#btcpaywall_pay_per_view_price").val())})})),t("#btcpw_default_page_currency1, #btcpw_default_page_currency2, #btcpw_default_page_currency3, #btcpw_banner_wide_default_currency1, #btcpw_banner_wide_default_currency2, #btcpw_banner_wide_default_currency3, #btcpw_banner_high_default_currency1, #btcpw_banner_high_default_currency2, #btcpw_banner_high_default_currency3").change((function(){var _="BTC"===t(this).val()?"0.00000001":"SATS"===t(this).val()?"1":"0.50";t(this).prev("input").attr({step:_,value:parseInt(t(this).prev("input").val())})}))})),t(document).ready((function(){t("#btcpw_btcpay_server_url").change((function(){var _=function(t){return"string"==typeof t?t.replace(/^(.+?)\/*?$/,"$1"):null}(t(this).val()),e=t(".btcpw_auth_key");0!=_.length&&function(t){return"string"==typeof t&&(0==t.indexOf("http://")||0==t.indexOf("https://"))}(_)&&(_+="/account/apikeys",e.attr("href",_).html(_).show())}))})),t("#design-button").click((function(t){t.preventDefault()})),t(document).ready((function(){t(".btcpw_fixed_amount_enable").change((function(){t(this).is(":checked")?t(this).next().prop("required",!0):t(this).next().prop("required",!1)}))})),t(document).ready((function(){t(".btcpw_tipping_enter_amount").click((function(){t(this).is(":checked")?t(".container_predefined_amount").hide():t(".container_predefined_amount").show()}))})),t(document).on("widget-updated widget-added ready",(function(){i(t(".widget-tipping-basic-upload_box_logo"),t(".widget-tipping-basic-logo_id")),a(t(".widget-tipping-basic-remove_box_logo")),i(t(".widget-tipping-basic-upload_box_image_high"),t(".widget-tipping-basic-background_id_high")),a(t(".widget-tipping-basic-remove_box_image_high")),i(t(".widget-tipping-basic-upload_box_logo_high"),t(".widget-tipping-basic-logo_id_high")),a(t(".widget-tipping-basic-remove_box_logo_high")),i(t(".widget-tipping-basic-upload_box_image_wide"),t(".widget-tipping-basic-background_id_wide")),a(t(".widget-tipping-basic-remove_box_image_wide")),i(t(".widget-tipping-basic-upload_box_logo_wide"),t(".widget-tipping-basic-logo_id_wide")),a(t(".widget-tipping-basic-remove_box_logo_wide"))})),t(document).on("widget-added widget-updated ready",(function(t,_){e(_)})),t(document).ready((function(){t("#widgets-right .widget:has( .widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-button_color_hover,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high, .widget-tipping-basic-button_color_hover_high,.widget-tipping-basic-continue_button_color_hover_high,.widget-tipping-basic-previous_button_color_hover_high,.widget-tipping-basic-continue_button_text_color_high,.widget-tipping-basic-continue_button_color_high,.widget-tipping-basic-previous_button_text_color_high,.widget-tipping-basic-previous_button_color_high,.widget-tipping-basic-continue_button_text_color_wide,.widget-tipping-basic-continue_button_color_wide,.widget-tipping-basic-previous_button_text_color_wide,.widget-tipping-basic-previous_button_color_wide,.widget-tipping-basic-previous_button_color_hover_wide,.widget-tipping-basic-continue_button_color_hover_wide,.widget-tipping-basic-button_color_hover_wide,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color,.widget-tipping-basic-selected_amount_background_wide,.widget-tipping-basic-selected_amount_background_high)").each((function(){t(this).val()&&e(t(this))}))})),t(document).ready((function(){t("#btcpaywall_tipping_color_background, #btcpaywall_tipping_color_header_footer_background, #btcpaywall_tipping_color_title, #btcpaywall_tipping_color_description, #btcpaywall_tipping_color_progress_bar_step1,#btcpaywall_tipping_color_progress_bar_step2,#btcpaywall_tipping_color_main,#btcpaywall_tipping_color_amounts,#btcpaywall_tipping_color_button_text,#btcpaywall_tipping_color_button, #btcpaywall_tipping_color_continue_button_text, #btcpaywall_tipping_color_continue_button, #btcpaywall_tipping_color_continue_button_hover,#btcpaywall_tipping_color_previous_button_hover,#btcpaywall_tipping_color_button_hover,#btcpaywall_tipping_color_previous_button_text,#btcpaywall_tipping_color_previous_button, #btcpaywall_tipping_color_selected_amount, #btcpw_pay_per_post_continue_button_color,#btcpaywall_pay_per_post_continue_button_color_hover,#btcpw_pay_per_post_continue_button_text_color,  #btcpw_pay_per_post_previous_button_color,#btcpw_pay_per_post_previous_button_text_color, #btcpw_pay_per_view_continue_button_color,#btcpw_pay_per_view_continue_button_text_color,  #btcpw_pay_per_view_previous_button_color,#btcpw_pay_per_view_previous_button_text_color,#btcpaywall_pay_per_post_continue_button_color,#btcpaywall_pay_per_post_continue_button_text_color,  #btcpaywall_pay_per_post_previous_button_color,#btcpaywall_pay_per_post_previous_button_color_hover,#btcpaywall_pay_per_post_previous_button_text_color, #btcpaywall_pay_per_view_continue_button_color, #btcpaywall_pay_per_view_continue_button_color_hover,#btcpaywall_pay_per_view_continue_button_text_color,  #btcpaywall_pay_per_view_previous_button_color,#btcpaywall_pay_per_view_previous_button_color_hover,#btcpaywall_pay_per_view_previous_button_text_color").iris({defaultColor:!0,change:function(t,_){},clear:function(){},hide:!0,palettes:!0})})),t(document).ready((function(t){i(t("#btcpw_product_image_button"),t("#btcpw_product_image_id")),a(t(".btcpw_remove_product_image")),i(t("#btcpaywall_tipping_text_button_background"),t("#btcpaywall_tipping_background")),a(t(".btcpaywall_tipping_button_remove_background")),i(t("#btcpaywall_tipping_text_button_logo"),t("#btcpaywall_tipping_logo")),a(t(".btcpaywall_tipping_button_remove_logo")),i(t("#btcpaywall_pay_per_view_preview_image"),t("#btcpaywall_pay_per_view_preview_image_id")),a(t(".btcpaywall_pay_per_view_remove_preview_image"))})),t(document).ready((function(){t("#pay-per-post-shortcode-generator-form, #pay-per-view-shortcode-generator-form").on("submit",(function(_){_.preventDefault(),t.ajax({type:"POST",url:"/wp-admin/admin-ajax.php",dataType:"json",url:shortcode_ajax_object.ajax_url,data:{action:"btcpw_create_shortcode",nonce_ajax:shortcode_ajax_object.security,id:t("#btcpaywall_pay_per_post_id, #btcpaywall_pay_per_view_id").val(),type:t("#btcpaywall_pay_per_post_type, #btcpaywall_pay_per_view_type").val(),name:t("#btcpaywall_pay_per_post_shortcode_name, #btcpaywall_pay_per_view_shortcode_name").val(),width:t("#btcpaywall_pay_per_post_width, #btcpaywall_pay_per_view_width").val(),height:t("#btcpaywall_pay_per_post_height, #btcpaywall_pay_per_view_height").val(),pay_block:t("input[name='btcpaywall_pay_per_post_paywall']:checked, input[name='btcpaywall_pay_per_view_paywall']:checked").val(),btc_format:t("input[name='btcpaywall_pay_per_post_btc_format']:checked, input[name='btcpaywall_pay_per_view_btc_format']:checked").val(),preview_title:t("#btcpaywall_pay_per_view_preview_title").val(),preview_title_color:t("#btcpaywall_pay_per_view_preview_title_color").val(),preview_description:t("#btcpaywall_pay_per_view_preview_description").val(),preview_description_color:t("#btcpaywall_pay_per_view_preview_description_color").val(),preview_image:t("#btcpaywall_pay_per_view_preview_image_id").val(),currency:t("#btcpaywall_pay_per_post_currency, #btcpaywall_pay_per_view_currency").val(),price:t("#btcpaywall_pay_per_post_price, #btcpaywall_pay_per_view_price").val(),duration:t("#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration").val(),duration_type:t("#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_view_duration_type").val(),background_color:t("#btcpaywall_pay_per_post_background, #btcpaywall_pay_per_view_background").val(),header_text:t("#btcpaywall_pay_per_post_title, #btcpaywall_pay_per_view_title").val(),info_text:t("#btcpaywall_pay_per_post_info, #btcpaywall_pay_per_view_info").val(),header_color:t("#btcpaywall_pay_per_post_title_color, #btcpaywall_pay_per_view_title_color").val(),info_color:t("#btcpaywall_pay_per_post_info_color, #btcpaywall_pay_per_view_info_color").val(),button_text:t("#btcpaywall_pay_per_post_button, #btcpaywall_pay_per_view_button").val(),button_color:t("#btcpaywall_pay_per_post_button_color, #btcpaywall_pay_per_view_button_color").val(),button_color_hover:t("#btcpaywall_pay_per_post_button_color_hover, #btcpaywall_pay_per_view_button_color_hover").val(),button_text_color:t("#btcpaywall_pay_per_post_button_text_color, #btcpaywall_pay_per_view_button_text_color").val(),continue_button_text:t("#btcpaywall_pay_per_post_continue_button, #btcpaywall_pay_per_view_continue_button").val(),continue_button_text_color:t("#btcpaywall_pay_per_post_continue_button_text_color,#btcpaywall_pay_per_view_continue_button_text_color").val(),continue_button_color:t("#btcpaywall_pay_per_post_continue_button_color,#btcpaywall_pay_per_view_continue_button_color").val(),continue_button_color_hover:t("#btcpaywall_pay_per_post_continue_button_color_hover,#btcpaywall_pay_per_view_continue_button_color_hover").val(),previous_button_text:t("#btcpaywall_pay_per_post_previous_button, #btcpaywall_pay_per_view_previous_button").val(),previous_button_text_color:t("#btcpaywall_pay_per_post_previous_button_text_color,#btcpaywall_pay_per_view_previous_button_text_color").val(),previous_button_color:t("#btcpaywall_pay_per_post_previous_button_color,#btcpaywall_pay_per_view_previous_button_color").val(),previous_button_color_hover:t("#btcpaywall_pay_per_post_previous_button_color_hover,#btcpaywall_pay_per_view_previous_button_color_hover").val(),link:t("input[name='btcpaywall_pay_per_post_show_help_link']:checked, input[name='btcpaywall_pay_per_view_show_help_link']:checked").val(),help_link:t("#btcpaywall_pay_per_post_help_link, #btcpaywall_pay_per_view_help_link").val(),help_text:t("#btcpaywall_pay_per_post_help_link_text, #btcpaywall_pay_per_view_help_link_text").val(),additional_link:t("input[name='btcpaywall_pay_per_post_show_additional_help_link']:checked, input[name='btcpaywall_pay_per_view_show_additional_help_link']:checked").val(),additional_help_link:t("#btcpaywall_pay_per_post_additional_help_link, #btcpaywall_pay_per_view_additional_help_link").val(),additional_help_text:t("#btcpaywall_pay_per_post_additional_help_link_text, #btcpaywall_pay_per_view_additional_help_link_text").val(),display_name:t("input[name='btcpaywall_pay_per_post_display_name']:checked, input[name='btcpaywall_pay_per_view_display_name']:checked").val(),mandatory_name:t("input[name='btcpaywall_pay_per_post_mandatory_name']:checked,input[name='btcpaywall_pay_per_view_mandatory_name']:checked").val(),display_email:t("input[name='btcpaywall_pay_per_post_display_email']:checked, input[name='btcpaywall_pay_per_view_display_email']:checked").val(),mandatory_email:t("input[name='btcpaywall_pay_per_post_mandatory_email']:checked,input[name='btcpaywall_pay_per_view_mandatory_email']:checked").val(),display_phone:t("input[name='btcpaywall_pay_per_post_display_phone']:checked, input[name='btcpaywall_pay_per_view_display_phone']:checked").val(),mandatory_phone:t("input[name='btcpaywall_pay_per_post_mandatory_phone']:checked,input[name='btcpaywall_pay_per_view_mandatory_phone']:checked").val(),display_address:t("input[name='btcpaywall_pay_per_post_display_address']:checked, input[name='btcpaywall_pay_per_view_display_address']:checked").val(),mandatory_address:t("input[name='btcpaywall_pay_per_post_mandatory_address']:checked,input[name='btcpaywall_pay_per_view_mandatory_address']:checked").val(),display_message:t("input[name='btcpaywall_pay_per_post_display_message']:checked, input[name='btcpaywall_pay_per_view_display_message']:checked").val(),mandatory_message:t("input[name='btcpaywall_pay_per_post_mandatory_message']:checked,input[name='btcpaywall_pay_per_view_mandatory_message']:checked").val()},success:function(_){t("#btcpaywall_pay_per_post_id, #btcpaywall_pay_per_view_id").val()<1?location.replace(shortcode_ajax_object.redirectUrl+_.data.data.id+"#btcpaywall_pay_per_shortcode"):location.reload()},error:function(t){console.log(t)}})}))})),t(document).ready((function(){t("#btcpw_shortcodes").click((function(){t("#sc_menu").toggle(),t("#btcpw_shortcodes span i").toggleClass("fas fa-arrow-down fas fa-arrow-up")})),t(".sc_menu_item.btcpw_shortcode").click((function(){return send_to_editor(t(this).attr("data")),t("#sc_menu").toggle(),t("#btcpw_shortcodes span i").toggleClass("fas fa-arrow-down fas fa-arrow-up"),!1}))})),t(document).ready((function(){t(document).ready((function(){var _,e,i,a,p;t(".btcpaywall-demo-shortcode-attributes").click((function(){t(".btcpaywall-demo-shortcode-attributes").toggleClass("inactive"),t(".btcpaywall-demo-shortcode-usage").toggle()})),e=t("#btcpw_digital_download_upload_button"),i=t("#btcpw_product_file"),a=t("#btcpw_product_filename",t("#btcpw_product_file_id")),e.click((function(t){t.preventDefault(),p||(p=wp.media.frames.file_frame=wp.media({title:"Choose File",button:{text:"Choose File"},multiple:!1})).on("select",(function(){var t=p.state().get("selection").first().toJSON();i.val(t.url),a.val(t.filename),(void 0).val(t.id)})),p.open()})),t(".js-btcpaywall-shortcode-button").click((function(){var _=t(this).data("btcpaywall-shortcode"),e=t("<input>");t("body").append(e),e.val(_).select(),document.execCommand("copy"),t(this).text("Copied to clipboard"),e.remove()})),t(".btcpaywall_pay_per_container_header").click((function(){var _=t(this).data("id");t(".btcpaywall_pay_per_container_body."+_+"-body").toggle(),t(this).toggleClass("inactive")})),t(".btcpaywall_container_header").click((function(){var _=t(this).data("id");t(".btcpaywall_container_body."+_+"-body").toggle(),t(this).toggleClass("inactive")})),t(".btcpaywall_tipping_selected_template button").click((function(){t(".btcpaywall_tipping_selected_template").css("display","none"),t(".btcpaywall_tipping_templates").css("display","flex"),t("#btcpaywall_template_appearance-wrap").toggle(),t("#btcpaywall_tipping_template_name").val("")})),t(".btcpaywall_tipping_templates button").click((function(e){if(e.preventDefault(),_=t(this).data("id"),t(document).scrollTop(0),t("#btcpaywall_tipping_template_name").val(_),t(".btcpaywall_tipping_selected_template").css("display","flex"),t(".btcpaywall_tipping_templates").css("display","none"),t("#btcpaywall_template_appearance-wrap").toggle(),"btcpaywall_tipping_page"==_)t(".btcpaywall_tipping_selected_template div").text("Donation Page"),t(".btcpaywall_tipping_page").addClass("common"),t(".btcpaywall_tipping_banner_and_page").removeClass("common"),t(".btcpaywall_tipping_banner_and_page").addClass("common"),t(".btcpaywall_tipping_box").removeClass("common"),t(".btcpaywall_tipping_banner_and_box").removeClass("common"),t(".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]").css("display","block");else if("btcpaywall_tipping_banner_high"==_||"btcpaywall_tipping_banner_wide"==_){var i="btcpaywall_tipping_banner_high"==_?"Tipping Banner High":"Tipping Banner Wide";t(".btcpaywall_tipping_selected_template div").text(i),t(".btcpaywall_tipping_banner_and_page").addClass("common"),t(".btcpaywall_tipping_banner_and_box").addClass("common"),t(".btcpaywall_tipping_page").removeClass("common"),t(".btcpaywall_tipping_box").removeClass("common"),t(".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]").css("display","block")}else"btcpaywall_tipping_box"==_&&(t(".btcpaywall_tipping_selected_template div").text("Tipping Box"),t(".btcpaywall_tipping_box").addClass("common"),t(".btcpaywall_tipping_banner_and_box").addClass("common"),t(".btcpaywall_tipping_banner_and_page").removeClass("common"),t(".btcpaywall_tipping_page").removeClass("common"),t(".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]").css("display","none"))}))}))}))}(jQuery)}});