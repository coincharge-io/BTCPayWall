!function(t){var e={};function _(a){if(e[a])return e[a].exports;var i=e[a]={i:a,l:!1,exports:{}};return t[a].call(i.exports,i,i.exports,_),i.l=!0,i.exports}_.m=t,_.c=e,_.d=function(t,e,a){_.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},_.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},_.t=function(t,e){if(1&e&&(t=_(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(_.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)_.d(a,i,function(e){return t[e]}.bind(null,i));return a},_.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return _.d(e,"a",e),e},_.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},_.p="",_(_.s=7)}({7:function(t,e){!function(t){"use strict";function e(t,e){var _;t.on("click",(function(a){a.preventDefault(),_||(_=wp.media.frames.file_frame=wp.media({title:"Choose Image",button:{text:"Choose Image"},multiple:!1})).on("select",(function(){var a=_.state().get("selection").first().toJSON();e.val(a.id).trigger("change"),t.html('<img height=100px width=100px src="'+a.url+'">').next().show()})),_.open()}))}function a(e){t(e).on("click",(function(e){e.preventDefault();var _=t(this);_.next().val("").trigger("change"),_.hide().prev().html("Upload")}))}function i(e){if(void 0===e)return!1;e.find(".widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-button_color_hover,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high,.widget-tipping-basic-continue_button_text_color_high,.widget-tipping-basic-continue_button_color_high,.widget-tipping-basic-previous_button_text_color_high,.widget-tipping-basic-previous_button_color_high,.widget-tipping-basic-button_color_hover_wide,.widget-tipping-basic-continue_button_color_hover_wide,.widget-tipping-basic-previous_button_color_hover_wide,.widget-tipping-basic-continue_button_text_color_wide,.widget-tipping-basic-continue_button_color_wide,.widget-tipping-basic-previous_button_text_color_wide,.widget-tipping-basic-previous_button_color_wide,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color,.widget-tipping-basic-selected_amount_background_wide,.widget-tipping-basic-selected_amount_background_high,.widget-tipping-basic-button_color_hover_high,.widget-tipping-basic-continue_button_color_hover_high,.widget-tipping-basic-previous_button_color_hover_high").iris({defaultColor:!0,change:_.throttle((function(){t(this).val()&&t(this).trigger("change")}),3e3),clear:function(){},hide:!0,palettes:!0})}t(document).ready((function(){var _,p,o,c,l;t("#btcpw_coinsnap_check_status").on("click",(function(){t(".btcpw_coinsnap_status").hide(500);let e=t("#btcpw_coinsnap_check_status").text();t("#btcpw_coinsnap_check_status").html('<span class="loading-spinner" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_coinsnap_test_connection",api_key:t("#btcpw_coinsnap_auth_key").val(),store_id:t("#btcpw_coinsnap_store_id").val()},success:function(_){t("#btcpw_coinsnap_check_status").html(e),_.success?t("#btcpw_coinsnap_status_success").fadeIn(500):t("#btcpw_coinsnap_status_error").html(_.data.message).fadeIn(500)},error:function(t){console.log(t.message)}})})),t("#btcpw_btcpay_check_status").on("click",(function(){t(".btcpw_btcpay_status").hide(500);var e=t("#btcpw_btcpay_check_status").text();t("#btcpw_btcpay_check_status").html('<span class="loading-spinner" role="status" aria-hidden="true"></span>'),t.ajax({url:"/wp-admin/admin-ajax.php",method:"POST",data:{action:"btcpw_check_greenfield_api_work",auth_key_view:t("#btcpw_btcpay_auth_key_view").val(),auth_key_create:t("#btcpw_btcpay_auth_key_create").val(),server_url:t("#btcpw_btcpay_server_url").val()},success:function(_){t("#btcpw_btcpay_check_status").html(e),_.success?(t("#btcpw_btcpay_store_id").val(_.data.store_id),t("#btcpw_btcpay_status_success").fadeIn(500)):t("#btcpw_btcpay_status_error").html(_.data.message).fadeIn(500)},error:function(t){console.log(t.message)}})})),t("#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_view_duration_type").change((function(){var e=t(this).val();"unlimited"===e||"onetime"===e?t("#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration").prop({required:!1,disabled:!0}):t("#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration").prop({required:!0,disabled:!1})})),t("#btcpw_btcpay_server_url").change((function(){var e=function(t){return"string"==typeof t?t.replace(/\/+$/,""):null}(t(this).val()),_=t(".btcpw_auth_key");0!=e.length&&function(t){return"string"==typeof t&&(0==t.indexOf("http://")||0==t.indexOf("https://"))}(e)&&(e+="/account/apikeys",_.attr("href",e).html(e).show())})),t("#design-button").on("click",(function(t){t.preventDefault()})),t(".btcpw_fixed_amount_enable").change((function(){t(this).is(":checked")?t(this).next().prop("required",!0):t(this).next().prop("required",!1)})),t(".btcpw_tipping_enter_amount").on("click",(function(){t(this).is(":checked")?t(".container_predefined_amount").hide():t(".container_predefined_amount").show()})),t("#widgets-right .widget:has( .widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-button_color_hover,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high, .widget-tipping-basic-button_color_hover_high,.widget-tipping-basic-continue_button_color_hover_high,.widget-tipping-basic-previous_button_color_hover_high,.widget-tipping-basic-continue_button_text_color_high,.widget-tipping-basic-continue_button_color_high,.widget-tipping-basic-previous_button_text_color_high,.widget-tipping-basic-previous_button_color_high,.widget-tipping-basic-continue_button_text_color_wide,.widget-tipping-basic-continue_button_color_wide,.widget-tipping-basic-previous_button_text_color_wide,.widget-tipping-basic-previous_button_color_wide,.widget-tipping-basic-previous_button_color_hover_wide,.widget-tipping-basic-continue_button_color_hover_wide,.widget-tipping-basic-button_color_hover_wide,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color,.widget-tipping-basic-selected_amount_background_wide,.widget-tipping-basic-selected_amount_background_high)").each((function(){t(this).val()&&i(t(this))})),t("#btcpaywall_tipping_color_background, #btcpaywall_tipping_color_header_footer_background, #btcpaywall_tipping_color_title, #btcpaywall_tipping_color_description, #btcpaywall_tipping_color_progress_bar_step1,#btcpaywall_tipping_color_progress_bar_step2,#btcpaywall_tipping_color_main,#btcpaywall_tipping_color_amounts,#btcpaywall_tipping_color_button_text,#btcpaywall_tipping_color_button, #btcpaywall_tipping_color_continue_button_text, #btcpaywall_tipping_color_continue_button, #btcpaywall_tipping_color_continue_button_hover,#btcpaywall_tipping_color_previous_button_hover,#btcpaywall_tipping_color_button_hover,#btcpaywall_tipping_color_previous_button_text,#btcpaywall_tipping_color_previous_button, #btcpaywall_tipping_color_selected_amount, #btcpw_pay_per_post_continue_button_color,#btcpaywall_pay_per_post_continue_button_color_hover,#btcpw_pay_per_post_continue_button_text_color,  #btcpw_pay_per_post_previous_button_color,#btcpw_pay_per_post_previous_button_text_color, #btcpw_pay_per_view_continue_button_color,#btcpw_pay_per_view_continue_button_text_color,  #btcpw_pay_per_view_previous_button_color,#btcpw_pay_per_view_previous_button_text_color,#btcpaywall_pay_per_post_continue_button_color,#btcpaywall_pay_per_post_continue_button_text_color,  #btcpaywall_pay_per_post_previous_button_color,#btcpaywall_pay_per_post_previous_button_color_hover,#btcpaywall_pay_per_post_previous_button_text_color, #btcpaywall_pay_per_view_continue_button_color, #btcpaywall_pay_per_view_continue_button_color_hover,#btcpaywall_pay_per_view_continue_button_text_color,  #btcpaywall_pay_per_view_previous_button_color,#btcpaywall_pay_per_view_previous_button_color_hover,#btcpaywall_pay_per_view_previous_button_text_color").iris({defaultColor:!0,change:function(t,e){},clear:function(){},hide:!0,palettes:!0}),e(t("#btcpw_product_image_button"),t("#btcpw_product_image_id")),a(t(".btcpw_remove_product_image")),e(t("#btcpaywall_tipping_text_button_background"),t("#btcpaywall_tipping_background")),a(t(".btcpaywall_tipping_button_remove_background")),e(t("#btcpaywall_tipping_text_button_logo"),t("#btcpaywall_tipping_logo")),a(t(".btcpaywall_tipping_button_remove_logo")),e(t("#btcpaywall_pay_per_view_preview_image"),t("#btcpaywall_pay_per_view_preview_image_id")),a(t(".btcpaywall_pay_per_view_remove_preview_image")),t("#pay-per-post-shortcode-generator-form, #pay-per-view-shortcode-generator-form").on("submit",(function(e){e.preventDefault(),t.ajax({type:"POST",url:"/wp-admin/admin-ajax.php",dataType:"json",url:shortcode_ajax_object.ajax_url,data:{action:"btcpw_create_shortcode",nonce_ajax:shortcode_ajax_object.security,id:t("#btcpaywall_pay_per_post_id, #btcpaywall_pay_per_view_id").val(),type:t("#btcpaywall_pay_per_post_type, #btcpaywall_pay_per_view_type").val(),name:t("#btcpaywall_pay_per_post_shortcode_name, #btcpaywall_pay_per_view_shortcode_name").val(),width:t("#btcpaywall_pay_per_post_width, #btcpaywall_pay_per_view_width").val(),height:t("#btcpaywall_pay_per_post_height, #btcpaywall_pay_per_view_height").val(),pay_block:t("input[name='btcpaywall_pay_per_post_paywall']:checked, input[name='btcpaywall_pay_per_view_paywall']:checked").val(),btc_format:t("input[name='btcpaywall_pay_per_post_btc_format']:checked, input[name='btcpaywall_pay_per_view_btc_format']:checked").val(),preview_title:t("#btcpaywall_pay_per_view_preview_title").val(),preview_title_color:t("#btcpaywall_pay_per_view_preview_title_color").val(),preview_description:t("#btcpaywall_pay_per_view_preview_description").val(),preview_description_color:t("#btcpaywall_pay_per_view_preview_description_color").val(),preview_image:t("#btcpaywall_pay_per_view_preview_image_id").val(),currency:t("#btcpaywall_pay_per_post_currency, #btcpaywall_pay_per_view_currency").val(),price:t("#btcpaywall_pay_per_post_price, #btcpaywall_pay_per_view_price").val(),duration:t("#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration").val(),duration_type:t("#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_view_duration_type").val(),background_color:t("#btcpaywall_pay_per_post_background, #btcpaywall_pay_per_view_background").val(),header_text:t("#btcpaywall_pay_per_post_title, #btcpaywall_pay_per_view_title").val(),info_text:t("#btcpaywall_pay_per_post_info, #btcpaywall_pay_per_view_info").val(),header_color:t("#btcpaywall_pay_per_post_title_color, #btcpaywall_pay_per_view_title_color").val(),info_color:t("#btcpaywall_pay_per_post_info_color, #btcpaywall_pay_per_view_info_color").val(),button_text:t("#btcpaywall_pay_per_post_button, #btcpaywall_pay_per_view_button").val(),button_color:t("#btcpaywall_pay_per_post_button_color, #btcpaywall_pay_per_view_button_color").val(),button_color_hover:t("#btcpaywall_pay_per_post_button_color_hover, #btcpaywall_pay_per_view_button_color_hover").val(),button_text_color:t("#btcpaywall_pay_per_post_button_text_color, #btcpaywall_pay_per_view_button_text_color").val(),continue_button_text:t("#btcpaywall_pay_per_post_continue_button, #btcpaywall_pay_per_view_continue_button").val(),continue_button_text_color:t("#btcpaywall_pay_per_post_continue_button_text_color,#btcpaywall_pay_per_view_continue_button_text_color").val(),continue_button_color:t("#btcpaywall_pay_per_post_continue_button_color,#btcpaywall_pay_per_view_continue_button_color").val(),continue_button_color_hover:t("#btcpaywall_pay_per_post_continue_button_color_hover,#btcpaywall_pay_per_view_continue_button_color_hover").val(),previous_button_text:t("#btcpaywall_pay_per_post_previous_button, #btcpaywall_pay_per_view_previous_button").val(),previous_button_text_color:t("#btcpaywall_pay_per_post_previous_button_text_color,#btcpaywall_pay_per_view_previous_button_text_color").val(),previous_button_color:t("#btcpaywall_pay_per_post_previous_button_color,#btcpaywall_pay_per_view_previous_button_color").val(),previous_button_color_hover:t("#btcpaywall_pay_per_post_previous_button_color_hover,#btcpaywall_pay_per_view_previous_button_color_hover").val(),link:t("input[name='btcpaywall_pay_per_post_show_help_link']:checked, input[name='btcpaywall_pay_per_view_show_help_link']:checked").val(),help_link:t("#btcpaywall_pay_per_post_help_link, #btcpaywall_pay_per_view_help_link").val(),help_text:t("#btcpaywall_pay_per_post_help_link_text, #btcpaywall_pay_per_view_help_link_text").val(),additional_link:t("input[name='btcpaywall_pay_per_post_show_additional_help_link']:checked, input[name='btcpaywall_pay_per_view_show_additional_help_link']:checked").val(),additional_help_link:t("#btcpaywall_pay_per_post_additional_help_link, #btcpaywall_pay_per_view_additional_help_link").val(),additional_help_text:t("#btcpaywall_pay_per_post_additional_help_link_text, #btcpaywall_pay_per_view_additional_help_link_text").val(),display_name:t("input[name='btcpaywall_pay_per_post_display_name']:checked, input[name='btcpaywall_pay_per_view_display_name']:checked").val(),mandatory_name:t("input[name='btcpaywall_pay_per_post_mandatory_name']:checked,input[name='btcpaywall_pay_per_view_mandatory_name']:checked").val(),display_email:t("input[name='btcpaywall_pay_per_post_display_email']:checked, input[name='btcpaywall_pay_per_view_display_email']:checked").val(),mandatory_email:t("input[name='btcpaywall_pay_per_post_mandatory_email']:checked,input[name='btcpaywall_pay_per_view_mandatory_email']:checked").val(),display_phone:t("input[name='btcpaywall_pay_per_post_display_phone']:checked, input[name='btcpaywall_pay_per_view_display_phone']:checked").val(),mandatory_phone:t("input[name='btcpaywall_pay_per_post_mandatory_phone']:checked,input[name='btcpaywall_pay_per_view_mandatory_phone']:checked").val(),display_address:t("input[name='btcpaywall_pay_per_post_display_address']:checked, input[name='btcpaywall_pay_per_view_display_address']:checked").val(),mandatory_address:t("input[name='btcpaywall_pay_per_post_mandatory_address']:checked,input[name='btcpaywall_pay_per_view_mandatory_address']:checked").val(),display_message:t("input[name='btcpaywall_pay_per_post_display_message']:checked, input[name='btcpaywall_pay_per_view_display_message']:checked").val(),mandatory_message:t("input[name='btcpaywall_pay_per_post_mandatory_message']:checked,input[name='btcpaywall_pay_per_view_mandatory_message']:checked").val()},success:function(e){t("#btcpaywall_pay_per_post_id, #btcpaywall_pay_per_view_id").val()<1?location.replace(shortcode_ajax_object.redirectUrl+e.data.data.id+"#btcpaywall_pay_per_shortcode"):location.reload()},error:function(t){console.log(t.message)}})})),t("#btcpw_shortcodes").on("click",(function(){t("#sc_menu").toggle(),t("#btcpw_shortcodes span i").toggleClass("fas fa-arrow-down fas fa-arrow-up")})),t(".sc_menu_item.btcpw_shortcode").on("click",(function(){return send_to_editor(t(this).attr("data")),t("#sc_menu").toggle(),t("#btcpw_shortcodes span i").toggleClass("fas fa-arrow-down fas fa-arrow-up"),!1})),null!==localStorage.getItem("BTCPayUrl")&&null!==localStorage.getItem("BTCPayViewKey")&&null!==localStorage.getItem("BTCPayCreateKey")&&location.href.indexOf("?page=btcpw_general_settings&section=btcpayserver")>-1&&(t("#btcpw_btcpay_server_url").val(localStorage.getItem("BTCPayUrl")),t("#btcpw_btcpay_auth_key_view").val(localStorage.getItem("BTCPayViewKey")),t("#btcpw_btcpay_auth_key_create").val(localStorage.getItem("BTCPayCreateKey")),localStorage.removeItem("BTCPayUrl"),localStorage.removeItem("BTCPayViewKey"),localStorage.removeItem("BTCPayCreateKey"),t(".button.button-secondary.btcpw_button").trigger("click"),setTimeout((function(){t(".button.button-primary.btcpw_button").trigger("click")}),6e3)),t(".btcpaywall-demo-shortcode-attributes").on("click",(function(){t(".btcpaywall-demo-shortcode-attributes").toggleClass("inactive"),t(".btcpaywall-demo-shortcode-usage").toggle()})),p=t("#btcpw_digital_download_upload_button"),o=t("#btcpw_product_file"),c=t("#btcpw_product_filename",t("#btcpw_product_file_id")),p.on("click",(function(t){t.preventDefault(),l||(l=wp.media.frames.file_frame=wp.media({title:"Choose File",button:{text:"Choose File"},multiple:!1})).on("select",(function(){var t=l.state().get("selection").first().toJSON();o.val(t.url),c.val(t.filename),(void 0).val(t.id)})),l.open()})),t(".js-btcpaywall-shortcode-button").on("click",(function(){var e=t(this).data("btcpaywall-shortcode"),_=t("<input>");t("body").append(_),_.val(e).select(),document.execCommand("copy"),t(this).text("Copied to clipboard"),_.remove()})),t(".btcpaywall_pay_per_container_header").on("click",(function(){var e=t(this).data("id");t(".btcpaywall_pay_per_container_body."+e+"-body").toggle(),t(this).toggleClass("inactive")})),t(".btcpaywall_container_header").on("click",(function(){var e=t(this).data("id");t(".btcpaywall_container_body."+e+"-body").toggle(),t(this).toggleClass("inactive")})),t(".btcpaywall_tipping_selected_template button").on("click",(function(){t(".btcpaywall_tipping_selected_template").css("display","none"),t(".btcpaywall_tipping_templates").css("display","flex"),t("#btcpaywall_template_appearance-wrap").toggle(),t("#btcpaywall_tipping_template_name").val("")})),t(".btcpaywall_tipping_templates button").on("click",(function(e){if(e.preventDefault(),_=t(this).data("id"),t(document).scrollTop(0),t("#btcpaywall_tipping_template_name").val(_),t(".btcpaywall_tipping_selected_template").css("display","flex"),t(".btcpaywall_tipping_templates").css("display","none"),t("#btcpaywall_template_appearance-wrap").toggle(),"btcpaywall_tipping_page"==_)t(".btcpaywall_tipping_selected_template div").text("Donation Page"),t(".btcpaywall_tipping_page").addClass("common"),t(".btcpaywall_tipping_banner_and_page").removeClass("common"),t(".btcpaywall_tipping_banner_and_page").addClass("common"),t(".btcpaywall_tipping_box").removeClass("common"),t(".btcpaywall_tipping_banner_and_box").removeClass("common"),t(".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]").css("display","block");else if("btcpaywall_tipping_banner_high"==_||"btcpaywall_tipping_banner_wide"==_){var a="btcpaywall_tipping_banner_high"==_?"Tipping Banner High":"Tipping Banner Wide";t(".btcpaywall_tipping_selected_template div").text(a),t(".btcpaywall_tipping_banner_and_page").addClass("common"),t(".btcpaywall_tipping_banner_and_box").addClass("common"),t(".btcpaywall_tipping_page").removeClass("common"),t(".btcpaywall_tipping_box").removeClass("common"),t(".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]").css("display","block")}else"btcpaywall_tipping_box"==_&&(t(".btcpaywall_tipping_selected_template div").text("Tipping Box"),t(".btcpaywall_tipping_box").addClass("common"),t(".btcpaywall_tipping_banner_and_box").addClass("common"),t(".btcpaywall_tipping_banner_and_page").removeClass("common"),t(".btcpaywall_tipping_page").removeClass("common"),t(".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]").css("display","none"))}))})),t(document).on("widget-updated widget-added ready",(function(){e(t(".widget-tipping-basic-upload_box_logo"),t(".widget-tipping-basic-logo_id")),a(t(".widget-tipping-basic-remove_box_logo")),e(t(".widget-tipping-basic-upload_box_image_high"),t(".widget-tipping-basic-background_id_high")),a(t(".widget-tipping-basic-remove_box_image_high")),e(t(".widget-tipping-basic-upload_box_logo_high"),t(".widget-tipping-basic-logo_id_high")),a(t(".widget-tipping-basic-remove_box_logo_high")),e(t(".widget-tipping-basic-upload_box_image_wide"),t(".widget-tipping-basic-background_id_wide")),a(t(".widget-tipping-basic-remove_box_image_wide")),e(t(".widget-tipping-basic-upload_box_logo_wide"),t(".widget-tipping-basic-logo_id_wide")),a(t(".widget-tipping-basic-remove_box_logo_wide"))})),t(document).on("widget-added widget-updated ready",(function(t,e){i(e)}))}(jQuery)}});