!function(_){var p={};function e(t){if(p[t])return p[t].exports;var a=p[t]={i:t,l:!1,exports:{}};return _[t].call(a.exports,a,a.exports,e),a.l=!0,a.exports}e.m=_,e.c=p,e.d=function(_,p,t){e.o(_,p)||Object.defineProperty(_,p,{enumerable:!0,get:t})},e.r=function(_){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(_,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(_,"__esModule",{value:!0})},e.t=function(_,p){if(1&p&&(_=e(_)),8&p)return _;if(4&p&&"object"==typeof _&&_&&_.__esModule)return _;var t=Object.create(null);if(e.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:_}),2&p&&"string"!=typeof _)for(var a in _)e.d(t,a,function(p){return _[p]}.bind(null,a));return t},e.n=function(_){var p=_&&_.__esModule?function(){return _.default}:function(){return _};return e.d(p,"a",p),p},e.o=function(_,p){return Object.prototype.hasOwnProperty.call(_,p)},e.p="",e(e.s=8)}({8:function(_,p){!function(_){"use strict";_(document).ready((function(){_("#btcpw_general_settings_duration_type").change((function(){"unlimited"===_(this).val()||"onetime"===_(this).val()?_("#btcpw_general_settings_duration").prop("disabled",!0):_("#btcpw_general_settings_duration").prop("disabled",!1)})),_(".btcpw_pay_per_post_button_color, .btcpaywall_pay_per_post_button_color").iris({defaultColor:!0,change:function(p,e){_("#btcpw_pay__button_preview").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_post_button_color_hover, .btcpaywall_pay_per_post_button_color_hover").iris({defaultColor:!0,change:function(p,e){_("#btcpw_pay__button_preview").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_post_background, .btcpaywall_pay_per_post_background").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay_preview.pay_per_post").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_post_header_color, .btcpaywall_pay_per_post_title_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__content_preview.pay_per_post h2").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_post_info_color, .btcpaywall_pay_per_post_info_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__content_preview.pay_per_post p").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_post_button_text_color, .btcpaywall_pay_per_post_button_text_color").iris({defaultColor:!0,change:function(p,e){_("#btcpw_pay__button_preview").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_("#btcpw_pay_per_post_title, #btcpaywall_pay_per_post_title").on("input",(function(){_(".btcpw_pay__content_preview.pay_per_post h2, .btcpaywall_pay__content_preview.pay_per_post h2").text(_(this).val())})),_("#btcpw_pay_per_post_width, #btcpaywall_pay_per_post_width").on("input, change",(function(){_(".btcpw_pay_preview.pay_per_post, .btcpaywall_pay_preview.pay_per_post").css("width",_(this).val()+"px")})),_("#btcpw_pay_per_post_height, #btcpaywall_pay_per_post_height").on("input, change",(function(){_(".btcpw_pay_preview.pay_per_post, .btcpaywall_pay_preview.pay_per_post").css("height",_(this).val()+"px")})),_("#btcpaywall_pay_per_post_info").on("change input",(function(){var p={"{price}":_("#btcpaywall_pay_per_post_price").val(),"{currency}":_("#btcpaywall_pay_per_post_currency").val(),"{duration}":"onetime"==_("#btcpaywall_pay_per_post_duration_type").val()||"unlimited"==_("#btcpaywall_pay_per_post_duration_type").val()?"":_("#btcpaywall_pay_per_post_duration").val(),"{dtype}":_("#btcpaywall_pay_per_post_duration_type").val()};_(".btcpw_pay__content_preview.pay_per_post p").text(_(this).val()),_(".btcpw_pay__content_preview.pay_per_post p").text(_(".btcpw_pay__content_preview.pay_per_post p").text().replaceAll(/\{price\}|\{currency\}|\{duration\}|\{dtype\}/gi,(function(_){return p[_]})))})),_("#btcpw_pay_per_post_button,#btcpaywall_pay_per_post_button").on("input",(function(){_("#btcpw_pay__button_preview").text(_(this).val())})),_("#btcpw_pay_per_post_show_help_link, #btcpaywall_pay_per_post_show_help_link").change((function(){_(".btcpw_help_preview.pay_per_post, .btcpaywall_help_preview.pay_per_post").toggle()})),_("#btcpw_pay_per_post_help_link_text, #btcpaywall_pay_per_post_help_link_text").on("input",(function(){_(".btcpw_help_preview.pay_per_post a, .btcpaywall_help__link_preview.pay_per_post a").text(_(this).val())})),_("#btcpw_pay_per_post_help_link, #btcpaywall_pay_per_post_help_link").on("input",(function(){_(".btcpw_help__link_preview.pay_per_post, .btcpaywall_help__link_preview.pay_per_post").attr("href",_(this).val())})),_("#btcpw_pay_per_post_show_additional_help_link, #btcpaywall_pay_per_post_show_additional_help_link").change((function(){_(".btcpw_additional_help_preview.pay_per_post, .btcpaywall_additional_help_preview.pay_per_post").toggle()})),_("#btcpw_pay_per_post_additional_help_link_text, #btcpaywall_pay_per_post_additional_help_link_text").on("input",(function(){_(".btcpw_additional_help_preview.pay_per_post a, .btcpaywall_additional_help_preview.pay_per_post a").text(_(this).val())})),_("#btcpw_pay_per_post_additional_help_link, #btcpaywall_pay_per_post_additional_help_link").on("input",(function(){_(".btcpw_help__additional_link_preview.pay_per_post, .btcpaywall_help__additional_link_preview.pay_per_post").attr("href",_(this).val())})),_("#btcpaywall_pay_per_post_duration_type").change((function(){"unlimited"===_(this).val()||"onetime"===_(this).val()?(_("#btcpaywall_pay_per_post_duration").prop({required:!1,disabled:!0}),_("#btcpaywall_pay_per_post_duration").val("")):_("#btcpaywall_pay_per_post_duration").prop({required:!0,disabled:!1})})),_(".btcpw_pay_per_post_price_placeholder, .btcpw_pay_per_post_currency_placeholder, .btcpw_pay_per_post_duration_placeholder, .btcpw_pay_per_post_duration_type_placeholder, .btcpaywall_pay_per_post_price_placeholder, .btcpaywall_pay_per_post_currency_placeholder, .btcpaywall_pay_per_post_duration_placeholder, .btcpaywall_pay_per_post_duration_type_placeholder").click((function(){var p=_(this).val();_("#btcpw_pay_per_post_info, #btcpaywall_pay_per_post_info").val((function(){return _(this).focus(),_(this).prop("value")+" "+p})),_("#btcpw_pay_per_post_info, #btcpaywall_pay_per_post_info").trigger("change")})),_("#btcpw_pay_per_view_show_help_link, #btcpaywall_pay_per_view_show_help_link").change((function(){_(".btcpw_help_preview.pay_per_view, .btcpaywall_help_preview.pay_per_view").toggle()})),_("#btcpw_pay_per_view_help_link_text, #btcpaywall_pay_per_view_help_link_text").on("input",(function(){_(".btcpw_help_preview.pay_per_view a,.btcpaywall_help_preview.pay_per_view a").text(_(this).val())})),_("#btcpw_pay_per_view_help_link, #btcpaywall_pay_per_view_help_link").on("input",(function(){_(".btcpw_help__link_preview.pay_per_view, .btcpaywall_help__link_preview.pay_per_view").attr("href",_(this).val())})),_("#btcpw_pay_per_view_show_additional_help_link, #btcpaywall_pay_per_view_show_additional_help_link").change((function(){_(".btcpw_additional_help_preview.pay_per_view, .btcpaywall_additional_help_preview.pay_per_view").toggle()})),_("#btcpw_pay_per_view_additional_help_link_text, #btcpaywall_pay_per_view_additional_help_link_text").on("input",(function(){_(".btcpw_additional_help_preview.pay_per_view a, .btcpaywall_additional_help_preview.pay_per_view a").text(_(this).val())})),_("#btcpw_pay_per_view_additional_help_link, #btcpaywall_pay_per_view_additional_help_link").on("input",(function(){_(".btcpw_additional_help__link_preview.pay_per_view, .btcpaywall_additional_help__link_preview.pay_per_view").attr("href",_(this).val())})),_("#btcpw_pay_per_view_title, #btcpaywall_pay_per_view_title").on("input",(function(){_(".btcpw_pay__content_preview.pay_per_view h2, .btcpaywall_pay__content_preview.pay_per_view h2").text(_(this).val())})),_("#btcpw_pay_per_view_info, #btcpaywall_pay_per_view_info").on("change input",(function(){_(".btcpw_pay__content_preview.pay_per_view p").text(_(this).val());var p={"{price}":_("#btcpaywall_pay_per_view_price").val(),"{currency}":_("#btcpaywall_pay_per_view_currency").val(),"{duration}":"onetime"==_("#btcpaywall_pay_per_view_duration_type").val()||"unlimited"==_("#btcpaywall_pay_per_view_duration_type").val()?"":_("#btcpaywall_pay_per_view_duration").val(),"{dtype}":_("#btcpaywall_pay_per_view_duration_type").val()};_(".btcpw_pay__content_preview.pay_per_view p").text(_(".btcpw_pay__content_preview.pay_per_view p").text().replaceAll(/\{price\}|\{currency\}|\{duration\}|\{dtype\}/gi,(function(_){return p[_]})))})),_("#btcpw_pay_per_view_button, #btcpaywall_pay_per_view_button").on("input",(function(){_("#btcpw_pay__button_preview_pay_per_view, #btcpaywall_pay__button_preview_pay_per_view").text(_(this).val())})),_("#btcpw_pay_per_view_width, #btcpaywall_pay_per_view_width").on("input, change",(function(){_(".btcpw_pay_preview.pay_per_view, .btcpaywall_pay_preview.pay_per_view").css("width",_(this).val()+"px")})),_("#btcpw_pay_per_view_height, #btcpaywall_pay_per_view_height").on("input, change",(function(){_(".btcpw_pay_preview.pay_per_view, .btcpaywall_pay_preview.pay_per_view").css("height",_(this).val()+"px")})),_(".btcpw_pay_per_view_price_placeholder, .btcpw_pay_per_view_currency_placeholder, .btcpw_pay_per_view_duration_placeholder, .btcpw_pay_per_view_duration_type_placeholder, .btcpaywall_pay_per_view_price_placeholder, .btcpaywall_pay_per_view_currency_placeholder, .btcpaywall_pay_per_view_duration_placeholder, .btcpaywall_pay_per_view_duration_type_placeholder").click((function(){var p=_(this).val();_("#btcpw_pay_per_view_info, #btcpaywall_pay_per_view_info").val((function(){return _(this).focus(),_(this).prop("value")+" "+p})),_("#btcpw_pay_per_view_info, #btcpaywall_pay_per_view_info").trigger("change")})),_(".btcpw_pay_per_view_button_color, #btcpaywall_pay_per_view_button_color").iris({defaultColor:!0,change:function(p,e){_("#btcpw_pay__button_preview_pay_per_view, #btcpaywall_pay__button_preview_pay_per_view").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_view_button_color_hover, #btcpaywall_pay_per_view_button_color_hover").iris({defaultColor:!0,change:function(p,e){_("#btcpw_pay__button_preview:hover").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_view_background, #btcpaywall_pay_per_view_background").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay_preview.pay_per_view, .btcpaywall_pay_preview.pay_per_view").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_("#btcpaywall_pay_per_view_preview_title").on("input",(function(){_(".btcpw_pay__preview_preview.preview_description h3").text(_(this).val())})),_("#btcpaywall_pay_per_view_preview_description").on("change input",(function(){_(".btcpw_pay__preview_preview.preview_description p").text(_(this).val())})),_(".btcpw_pay_per_view_header_color, #btcpaywall_pay_per_view_preview_title_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__content_preview.pay_per_view h2, .btcpaywall_pay__content_preview.pay_per_view h2").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_view_info_color, #btcpaywall_pay_per_view_info_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__content_preview.pay_per_view p, .btcpaywall_pay__content_preview.pay_per_view p").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_view_button_text_color, #btcpaywall_pay_per_view_button_text_color").iris({defaultColor:!0,change:function(p,e){_("#btcpw_pay__button_preview_pay_per_view, #btcpaywall_pay__button_preview_pay_per_view").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpaywall_pay_per_view_title_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__content_preview.pay_per_view h2").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_("#btcpaywall_pay_per_view_duration_type, #btcpaywall_pay_per_view_duration,#btcpaywall_pay_per_view_price,#btcpaywall_pay_per_view_currency").change((function(){_("#btcpaywall_pay_per_view_info").trigger("change")})),_("#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_post_duration,#btcpaywall_pay_per_post_price,#btcpaywall_pay_per_post_currency").change((function(){_("#btcpaywall_pay_per_post_info").trigger("change")})),_("#btcpaywall_pay_per_view_duration_type").change((function(){"unlimited"===_(this).val()||"onetime"===_(this).val()?(_("#btcpaywall_pay_per_view_duration").prop({required:!1,disabled:!0}),_("#btcpaywall_pay_per_view_duration").val("")):_("#btcpaywall_pay_per_view_duration").prop({required:!0,disabled:!1})})),_(".btcpw_pay_per_view_preview_title_color, #btcpaywall_pay_per_view_preview_title_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__preview_preview.pay_per_view h2, .btcpw_pay__preview_preview.preview_description h3").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_view_preview_description_color, #btcpaywall_pay_per_view_preview_description_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay__preview_preview.pay_per_view p, .btcpw_pay__preview_preview.preview_description p").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_("#btcpw_pay_per_file_button").on("input",(function(){_(".btcpw_pay_preview.content_store button").text(_(this).val())})),_(".btcpw_pay_per_file_button_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay_preview.content_store button").css("backgroundColor",e.color.toString())},clear:function(){},hide:!0,palettes:!0}),_(".btcpw_pay_per_file_button_text_color").iris({defaultColor:!0,change:function(p,e){_(".btcpw_pay_preview.content_store button").css("color",e.color.toString())},clear:function(){},hide:!0,palettes:!0})}))}(jQuery)}});