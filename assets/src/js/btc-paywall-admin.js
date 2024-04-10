(function ($) {
	"use strict";
	$(document).ready(function () {
		$("#btcpw_coinsnap_check_status").on("click", function () {
			$(".btcpw_coinsnap_status").hide(500);
			let text = $("#btcpw_coinsnap_check_status").text();
			$("#btcpw_coinsnap_check_status").html(
				`<span class="loading-spinner" role="status" aria-hidden="true"></span>`,
			);
			$.ajax({
				url: "/wp-admin/admin-ajax.php",
				method: "POST",
				data: {
					action: "btcpw_coinsnap_test_connection",
					api_key: $("#btcpw_coinsnap_auth_key").val(),
					store_id: $("#btcpw_coinsnap_store_id").val(),
				},
				success: function (response) {
					$("#btcpw_coinsnap_check_status").html(text);
					if (response.success) {
						$("#btcpw_coinsnap_status_success").fadeIn(500);
					} else {
						$("#btcpw_coinsnap_status_error")
							.html(response.data.message)
							.fadeIn(500);
					}
				},
				error: function (error) {
					console.log(error.message);
				},
			});
		});
		$("#btcpw_btcpay_check_status").on("click", function () {
			$(".btcpw_btcpay_status").hide(500);
			var text = $("#btcpw_btcpay_check_status").text();
			$("#btcpw_btcpay_check_status").html(
				`<span class="loading-spinner" role="status" aria-hidden="true"></span>`,
			);
			$.ajax({
				url: "/wp-admin/admin-ajax.php",
				method: "POST",
				data: {
					action: "btcpw_check_greenfield_api_work",
					auth_key_view: $("#btcpw_btcpay_auth_key_view").val(),
					auth_key_create: $("#btcpw_btcpay_auth_key_create").val(),
					server_url: $("#btcpw_btcpay_server_url").val(),
				},
				success: function (response) {
					$("#btcpw_btcpay_check_status").html(text);
					if (response.success) {
						$("#btcpw_btcpay_store_id").val(response.data.store_id);
						$("#btcpw_btcpay_status_success").fadeIn(500);
					} else {
						$("#btcpw_btcpay_status_error")
							.html(response.data.message)
							.fadeIn(500);
					}
				},
				error: function (error) {
					console.log(error.message);
				},
			});
		});
		$(
			"#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_view_duration_type",
		).change(function () {
			var dtype = $(this).val();

			if (dtype === "unlimited" || dtype === "onetime") {
				$(
					"#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration",
				).prop({
					required: false,
					disabled: true,
				});
			} else {
				$(
					"#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration",
				).prop({
					required: true,
					disabled: false,
				});
			}
		});

		function isValidUrl(url) {
			if (
				typeof url === "string" &&
				(url.indexOf("http://") == 0 || url.indexOf("https://") == 0)
			) {
				return true;
			}

			return false;
		}

		function formatUrl(url) {
			if (typeof url === "string") {
				return url.replace(/\/+$/, "");
			}

			return null;
		}
		$("#btcpw_btcpay_server_url").change(function () {
			var url = formatUrl($(this).val());

			var redirectLink = $(".btcpw_auth_key");

			if (url.length == 0) {
				return;
			}

			if (isValidUrl(url)) {
				url = url + "/account/apikeys";
				redirectLink.attr("href", url).html(url).show();
			}
		});

		$("#design-button").on("click", function (e) {
			e.preventDefault();
		});

		$(".btcpw_fixed_amount_enable").change(function () {
			$(this).is(":checked")
				? $(this).next().prop("required", true)
				: $(this).next().prop("required", false);
		});

		$(".btcpw_tipping_enter_amount").on("click", function () {
			if (!$(this).is(":checked")) {
				$(".container_predefined_amount").show();
			} else {
				$(".container_predefined_amount").hide();
			}
		});

		$(
			"#widgets-right .widget:has( .widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-button_color_hover,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high, .widget-tipping-basic-button_color_hover_high,.widget-tipping-basic-continue_button_color_hover_high,.widget-tipping-basic-previous_button_color_hover_high,.widget-tipping-basic-continue_button_text_color_high,.widget-tipping-basic-continue_button_color_high,.widget-tipping-basic-previous_button_text_color_high,.widget-tipping-basic-previous_button_color_high,.widget-tipping-basic-continue_button_text_color_wide,.widget-tipping-basic-continue_button_color_wide,.widget-tipping-basic-previous_button_text_color_wide,.widget-tipping-basic-previous_button_color_wide,.widget-tipping-basic-previous_button_color_hover_wide,.widget-tipping-basic-continue_button_color_hover_wide,.widget-tipping-basic-button_color_hover_wide,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color,.widget-tipping-basic-selected_amount_background_wide,.widget-tipping-basic-selected_amount_background_high)",
		).each(function () {
			if ($(this).val()) {
				initColorPicker($(this));
			}
		});

		$(
			"#btcpaywall_tipping_color_background, #btcpaywall_tipping_color_header_footer_background, #btcpaywall_tipping_color_title, #btcpaywall_tipping_color_description, #btcpaywall_tipping_color_progress_bar_step1,#btcpaywall_tipping_color_progress_bar_step2,#btcpaywall_tipping_color_main,#btcpaywall_tipping_color_amounts,#btcpaywall_tipping_color_button_text,#btcpaywall_tipping_color_button, #btcpaywall_tipping_color_continue_button_text, #btcpaywall_tipping_color_continue_button, #btcpaywall_tipping_color_continue_button_hover,#btcpaywall_tipping_color_previous_button_hover,#btcpaywall_tipping_color_button_hover,#btcpaywall_tipping_color_previous_button_text,#btcpaywall_tipping_color_previous_button, #btcpaywall_tipping_color_selected_amount, #btcpw_pay_per_post_continue_button_color,#btcpaywall_pay_per_post_continue_button_color_hover,#btcpw_pay_per_post_continue_button_text_color,  #btcpw_pay_per_post_previous_button_color,#btcpw_pay_per_post_previous_button_text_color, #btcpw_pay_per_view_continue_button_color,#btcpw_pay_per_view_continue_button_text_color,  #btcpw_pay_per_view_previous_button_color,#btcpw_pay_per_view_previous_button_text_color,#btcpaywall_pay_per_post_continue_button_color,#btcpaywall_pay_per_post_continue_button_text_color,  #btcpaywall_pay_per_post_previous_button_color,#btcpaywall_pay_per_post_previous_button_color_hover,#btcpaywall_pay_per_post_previous_button_text_color, #btcpaywall_pay_per_view_continue_button_color, #btcpaywall_pay_per_view_continue_button_color_hover,#btcpaywall_pay_per_view_continue_button_text_color,  #btcpaywall_pay_per_view_previous_button_color,#btcpaywall_pay_per_view_previous_button_color_hover,#btcpaywall_pay_per_view_previous_button_text_color",
		).iris({
			defaultColor: true,

			change: function (event, ui) {},

			clear: function () {},

			hide: true,

			palettes: true,
		});

		imagePreview(
			$("#btcpw_product_image_button"),
			$("#btcpw_product_image_id"),
		);
		imageRemove($(".btcpw_remove_product_image"));

		imagePreview(
			$("#btcpaywall_tipping_text_button_background"),
			$("#btcpaywall_tipping_background"),
		);
		imageRemove($(".btcpaywall_tipping_button_remove_background"));

		imagePreview(
			$("#btcpaywall_tipping_text_button_logo"),
			$("#btcpaywall_tipping_logo"),
		);
		imageRemove($(".btcpaywall_tipping_button_remove_logo"));

		imagePreview(
			$("#btcpaywall_pay_per_view_preview_image"),
			$("#btcpaywall_pay_per_view_preview_image_id"),
		);
		imageRemove($(".btcpaywall_pay_per_view_remove_preview_image"));

		$(
			"#pay-per-post-shortcode-generator-form, #pay-per-view-shortcode-generator-form",
		).on("submit", function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "/wp-admin/admin-ajax.php",
				dataType: "json",
				url: shortcode_ajax_object.ajax_url,
				data: {
					action: "btcpw_create_shortcode",
					nonce_ajax: shortcode_ajax_object.security,
					id: $(
						"#btcpaywall_pay_per_post_id, #btcpaywall_pay_per_view_id",
					).val(),
					type: $(
						"#btcpaywall_pay_per_post_type, #btcpaywall_pay_per_view_type",
					).val(),
					name: $(
						"#btcpaywall_pay_per_post_shortcode_name, #btcpaywall_pay_per_view_shortcode_name",
					).val(),
					width: $(
						"#btcpaywall_pay_per_post_width, #btcpaywall_pay_per_view_width",
					).val(),
					height: $(
						"#btcpaywall_pay_per_post_height, #btcpaywall_pay_per_view_height",
					).val(),
					pay_block: $(
						"input[name='btcpaywall_pay_per_post_paywall']:checked, input[name='btcpaywall_pay_per_view_paywall']:checked",
					).val(),
					btc_format: $(
						"input[name='btcpaywall_pay_per_post_btc_format']:checked, input[name='btcpaywall_pay_per_view_btc_format']:checked",
					).val(),
					preview_title: $("#btcpaywall_pay_per_view_preview_title").val(),
					preview_title_color: $(
						"#btcpaywall_pay_per_view_preview_title_color",
					).val(),
					preview_description: $(
						"#btcpaywall_pay_per_view_preview_description",
					).val(),
					preview_description_color: $(
						"#btcpaywall_pay_per_view_preview_description_color",
					).val(),
					preview_image: $("#btcpaywall_pay_per_view_preview_image_id").val(),
					currency: $(
						"#btcpaywall_pay_per_post_currency, #btcpaywall_pay_per_view_currency",
					).val(),
					price: $(
						"#btcpaywall_pay_per_post_price, #btcpaywall_pay_per_view_price",
					).val(),
					duration: $(
						"#btcpaywall_pay_per_post_duration, #btcpaywall_pay_per_view_duration",
					).val(),
					duration_type: $(
						"#btcpaywall_pay_per_post_duration_type, #btcpaywall_pay_per_view_duration_type",
					).val(),
					background_color: $(
						"#btcpaywall_pay_per_post_background, #btcpaywall_pay_per_view_background",
					).val(),
					header_text: $(
						"#btcpaywall_pay_per_post_title, #btcpaywall_pay_per_view_title",
					).val(),
					info_text: $(
						"#btcpaywall_pay_per_post_info, #btcpaywall_pay_per_view_info",
					).val(),
					header_color: $(
						"#btcpaywall_pay_per_post_title_color, #btcpaywall_pay_per_view_title_color",
					).val(),
					info_color: $(
						"#btcpaywall_pay_per_post_info_color, #btcpaywall_pay_per_view_info_color",
					).val(),
					button_text: $(
						"#btcpaywall_pay_per_post_button, #btcpaywall_pay_per_view_button",
					).val(),
					button_color: $(
						"#btcpaywall_pay_per_post_button_color, #btcpaywall_pay_per_view_button_color",
					).val(),
					button_color_hover: $(
						"#btcpaywall_pay_per_post_button_color_hover, #btcpaywall_pay_per_view_button_color_hover",
					).val(),
					button_text_color: $(
						"#btcpaywall_pay_per_post_button_text_color, #btcpaywall_pay_per_view_button_text_color",
					).val(),
					continue_button_text: $(
						"#btcpaywall_pay_per_post_continue_button, #btcpaywall_pay_per_view_continue_button",
					).val(),
					continue_button_text_color: $(
						"#btcpaywall_pay_per_post_continue_button_text_color,#btcpaywall_pay_per_view_continue_button_text_color",
					).val(),
					continue_button_color: $(
						"#btcpaywall_pay_per_post_continue_button_color,#btcpaywall_pay_per_view_continue_button_color",
					).val(),
					continue_button_color_hover: $(
						"#btcpaywall_pay_per_post_continue_button_color_hover,#btcpaywall_pay_per_view_continue_button_color_hover",
					).val(),
					previous_button_text: $(
						"#btcpaywall_pay_per_post_previous_button, #btcpaywall_pay_per_view_previous_button",
					).val(),
					previous_button_text_color: $(
						"#btcpaywall_pay_per_post_previous_button_text_color,#btcpaywall_pay_per_view_previous_button_text_color",
					).val(),
					previous_button_color: $(
						"#btcpaywall_pay_per_post_previous_button_color,#btcpaywall_pay_per_view_previous_button_color",
					).val(),
					previous_button_color_hover: $(
						"#btcpaywall_pay_per_post_previous_button_color_hover,#btcpaywall_pay_per_view_previous_button_color_hover",
					).val(),
					link: $(
						"input[name='btcpaywall_pay_per_post_show_help_link']:checked, input[name='btcpaywall_pay_per_view_show_help_link']:checked",
					).val(),
					help_link: $(
						"#btcpaywall_pay_per_post_help_link, #btcpaywall_pay_per_view_help_link",
					).val(),
					help_text: $(
						"#btcpaywall_pay_per_post_help_link_text, #btcpaywall_pay_per_view_help_link_text",
					).val(),
					additional_link: $(
						"input[name='btcpaywall_pay_per_post_show_additional_help_link']:checked, input[name='btcpaywall_pay_per_view_show_additional_help_link']:checked",
					).val(),
					additional_help_link: $(
						"#btcpaywall_pay_per_post_additional_help_link, #btcpaywall_pay_per_view_additional_help_link",
					).val(),
					additional_help_text: $(
						"#btcpaywall_pay_per_post_additional_help_link_text, #btcpaywall_pay_per_view_additional_help_link_text",
					).val(),
					display_name: $(
						"input[name='btcpaywall_pay_per_post_display_name']:checked, input[name='btcpaywall_pay_per_view_display_name']:checked",
					).val(),
					mandatory_name: $(
						"input[name='btcpaywall_pay_per_post_mandatory_name']:checked,input[name='btcpaywall_pay_per_view_mandatory_name']:checked",
					).val(),
					display_email: $(
						"input[name='btcpaywall_pay_per_post_display_email']:checked, input[name='btcpaywall_pay_per_view_display_email']:checked",
					).val(),
					mandatory_email: $(
						"input[name='btcpaywall_pay_per_post_mandatory_email']:checked,input[name='btcpaywall_pay_per_view_mandatory_email']:checked",
					).val(),
					display_phone: $(
						"input[name='btcpaywall_pay_per_post_display_phone']:checked, input[name='btcpaywall_pay_per_view_display_phone']:checked",
					).val(),
					mandatory_phone: $(
						"input[name='btcpaywall_pay_per_post_mandatory_phone']:checked,input[name='btcpaywall_pay_per_view_mandatory_phone']:checked",
					).val(),
					display_address: $(
						"input[name='btcpaywall_pay_per_post_display_address']:checked, input[name='btcpaywall_pay_per_view_display_address']:checked",
					).val(),
					mandatory_address: $(
						"input[name='btcpaywall_pay_per_post_mandatory_address']:checked,input[name='btcpaywall_pay_per_view_mandatory_address']:checked",
					).val(),
					display_message: $(
						"input[name='btcpaywall_pay_per_post_display_message']:checked, input[name='btcpaywall_pay_per_view_display_message']:checked",
					).val(),
					mandatory_message: $(
						"input[name='btcpaywall_pay_per_post_mandatory_message']:checked,input[name='btcpaywall_pay_per_view_mandatory_message']:checked",
					).val(),
				},
				success: function (data) {
					if (
						$(
							"#btcpaywall_pay_per_post_id, #btcpaywall_pay_per_view_id",
						).val() < 1
					) {
						location.replace(
							shortcode_ajax_object.redirectUrl +
								data.data.data.id +
								"#btcpaywall_pay_per_shortcode",
						);
					} else {
						location.reload();
					}
				},
				error: function (e) {
					console.log(e.message);
				},
			});
		});

		$("#btcpw_shortcodes").on("click", function () {
			$("#sc_menu").toggle();
			$("#btcpw_shortcodes span i").toggleClass(
				"fas fa-arrow-down fas fa-arrow-up",
			);
		});
		$(".sc_menu_item.btcpw_shortcode").on("click", function () {
			send_to_editor($(this).attr("data"));
			$("#sc_menu").toggle();
			$("#btcpw_shortcodes span i").toggleClass(
				"fas fa-arrow-down fas fa-arrow-up",
			);
			return false;
		});

		function uploadFile(click_elem, fileUrl, fileName, fileId) {
			var custom_uploader, click_elem, fileUrl, fileName, fileId;

			click_elem.on("click", function (e) {
				e.preventDefault();
				if (custom_uploader) {
					custom_uploader.open();
					return;
				}

				custom_uploader = wp.media.frames.file_frame = wp.media({
					title: "Choose File",
					button: {
						text: "Choose File",
					},
					multiple: false,
				});

				custom_uploader.on("select", function () {
					var attachment = custom_uploader
						.state()
						.get("selection")
						.first()
						.toJSON();
					fileUrl.val(attachment.url);
					fileName.val(attachment.filename);
					fileId.val(attachment.id);
				});

				custom_uploader.open();
			});
		}
		if (
			localStorage.getItem("BTCPayUrl") !== null &&
			localStorage.getItem("BTCPayViewKey") !== null &&
			localStorage.getItem("BTCPayCreateKey") !== null
		) {
			if (
				location.href.indexOf(
					"?page=btcpw_general_settings&section=btcpayserver",
				) > -1
			) {
				$("#btcpw_btcpay_server_url").val(localStorage.getItem("BTCPayUrl"));
				$("#btcpw_btcpay_auth_key_view").val(
					localStorage.getItem("BTCPayViewKey"),
				);
				$("#btcpw_btcpay_auth_key_create").val(
					localStorage.getItem("BTCPayCreateKey"),
				);
				localStorage.removeItem("BTCPayUrl");
				localStorage.removeItem("BTCPayViewKey");
				localStorage.removeItem("BTCPayCreateKey");
				$(".button.button-secondary.btcpw_button").trigger("click");
				setTimeout(function () {
					$(".button.button-primary.btcpw_button").trigger("click");
				}, 6000);
			}
		}
		$(".btcpaywall-demo-shortcode-attributes").on("click", function () {
			$(".btcpaywall-demo-shortcode-attributes").toggleClass("inactive");
			$(".btcpaywall-demo-shortcode-usage").toggle();
		});
		var template_id;
		uploadFile(
			$("#btcpw_digital_download_upload_button"),
			$("#btcpw_product_file"),
			$("#btcpw_product_filename", $("#btcpw_product_file_id")),
		);
		//Tipping Metabox
		$(".js-btcpaywall-shortcode-button").on("click", function () {
			var shortcode = $(this).data("btcpaywall-shortcode");
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(shortcode).select();
			document.execCommand("copy");
			$(this).text("Copied to clipboard");
			$temp.remove();
		});
		$(".btcpaywall_pay_per_container_header").on("click", function () {
			var header_id = $(this).data("id");
			$(".btcpaywall_pay_per_container_body." + header_id + "-body").toggle();
			$(this).toggleClass("inactive");
		});
		$(".btcpaywall_container_header").on("click", function () {
			var header_id = $(this).data("id");
			$(".btcpaywall_container_body." + header_id + "-body").toggle();
			$(this).toggleClass("inactive");
		});
		$(".btcpaywall_tipping_selected_template button").on("click", function () {
			$(".btcpaywall_tipping_selected_template").css("display", "none");
			$(".btcpaywall_tipping_templates").css("display", "flex");
			$("#btcpaywall_template_appearance-wrap").toggle();
			//$('.btcpaywall_tipping_templates button').removeClass('activated')
			$("#btcpaywall_tipping_template_name").val("");
		});
		$(".btcpaywall_tipping_templates button").on("click", function (e) {
			e.preventDefault();
			template_id = $(this).data("id");
			$(document).scrollTop(0);
			$("#btcpaywall_tipping_template_name").val(template_id);
			$(".btcpaywall_tipping_selected_template").css("display", "flex");
			$(".btcpaywall_tipping_templates").css("display", "none");
			$("#btcpaywall_template_appearance-wrap").toggle();

			if (template_id == "btcpaywall_tipping_page") {
				$(".btcpaywall_tipping_selected_template div").text("Donation Page");
				$(".btcpaywall_tipping_page").addClass("common");
				$(".btcpaywall_tipping_banner_and_page").removeClass("common");
				$(".btcpaywall_tipping_banner_and_page").addClass("common");
				$(".btcpaywall_tipping_box").removeClass("common");
				$(".btcpaywall_tipping_banner_and_box").removeClass("common");
				$(
					".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]",
				).css("display", "block");
			} else if (
				template_id == "btcpaywall_tipping_banner_high" ||
				template_id == "btcpaywall_tipping_banner_wide"
			) {
				var text =
					template_id == "btcpaywall_tipping_banner_high"
						? "Tipping Banner High"
						: "Tipping Banner Wide";
				$(".btcpaywall_tipping_selected_template div").text(text);

				$(".btcpaywall_tipping_banner_and_page").addClass("common");
				$(".btcpaywall_tipping_banner_and_box").addClass("common");
				$(".btcpaywall_tipping_page").removeClass("common");
				$(".btcpaywall_tipping_box").removeClass("common");
				$(
					".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]",
				).css("display", "block");
			} else if (template_id == "btcpaywall_tipping_box") {
				$(".btcpaywall_tipping_selected_template div").text("Tipping Box");

				$(".btcpaywall_tipping_box").addClass("common");
				$(".btcpaywall_tipping_banner_and_box").addClass("common");
				$(".btcpaywall_tipping_banner_and_page").removeClass("common");
				$(".btcpaywall_tipping_page").removeClass("common");
				$(
					".btcpaywall_container_header[data-id=fixed-amount],.btcpaywall_container_header[data-id=donor]",
				).css("display", "none");
			}
		});
	});
	$(document).on("widget-updated widget-added ready", function () {
		imagePreview(
			$(".widget-tipping-basic-upload_box_logo"),
			$(".widget-tipping-basic-logo_id"),
		);
		imageRemove($(".widget-tipping-basic-remove_box_logo"));

		imagePreview(
			$(".widget-tipping-basic-upload_box_image_high"),
			$(".widget-tipping-basic-background_id_high"),
		);
		imageRemove($(".widget-tipping-basic-remove_box_image_high"));

		imagePreview(
			$(".widget-tipping-basic-upload_box_logo_high"),
			$(".widget-tipping-basic-logo_id_high"),
		);
		imageRemove($(".widget-tipping-basic-remove_box_logo_high"));

		imagePreview(
			$(".widget-tipping-basic-upload_box_image_wide"),
			$(".widget-tipping-basic-background_id_wide"),
		);

		imageRemove($(".widget-tipping-basic-remove_box_image_wide"));

		imagePreview(
			$(".widget-tipping-basic-upload_box_logo_wide"),
			$(".widget-tipping-basic-logo_id_wide"),
		);
		imageRemove($(".widget-tipping-basic-remove_box_logo_wide"));
	});
	function onFormUpdate(event, widget) {
		initColorPicker(widget);
	}
	function imagePreview(click_elem, target) {
		var custom_uploader, click_elem, target;
		click_elem.on("click", function (e) {
			e.preventDefault();
			if (custom_uploader) {
				custom_uploader.open();
				return;
			}

			custom_uploader = wp.media.frames.file_frame = wp.media({
				title: "Choose Image",
				button: {
					text: "Choose Image",
				},
				multiple: false,
			});

			custom_uploader.on("select", function () {
				var attachment = custom_uploader
					.state()
					.get("selection")
					.first()
					.toJSON();
				target.val(attachment.id).trigger("change");
				click_elem
					.html('<img height=100px width=100px src="' + attachment.url + '">')
					.next()
					.show();
			});

			custom_uploader.open();
		});
	}

	function imageRemove(remove) {
		$(remove).on("click", function (e) {
			e.preventDefault();
			var button = $(this);
			button.next().val("").trigger("change");
			button.hide().prev().html("Upload");
		});
	}

	function showMore(click_elem, target) {
		$(click_elem).on("click", function () {
			if (!$(this).is(":checked")) {
				$(target).prop("checked", false).css("visibility", "hidden");
			} else {
				$(target).css("visibility", "visible");
			}
		});
	}
	function initColorPicker(widget) {
		if (typeof widget == "undefined") {
			return false;
		}
		widget
			.find(
				".widget-tipping-basic-background_color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-button_text_color,.widget-tipping-basic-button-color,.widget-tipping-basic-button_color_hover,.widget-tipping-basic-description-color,.widget-tipping-basic-title_text_color,.widget-tipping-basic-tipping-color,.widget-tipping-basic-input_background,.widget-tipping-basic-fixed_background,.widget-tipping-basic-background_color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-button_text_color_high,.widget-tipping-basic-button_color_high,.widget-tipping-basic-continue_button_text_color_high,.widget-tipping-basic-continue_button_color_high,.widget-tipping-basic-previous_button_text_color_high,.widget-tipping-basic-previous_button_color_high,.widget-tipping-basic-button_color_hover_wide,.widget-tipping-basic-continue_button_color_hover_wide,.widget-tipping-basic-previous_button_color_hover_wide,.widget-tipping-basic-continue_button_text_color_wide,.widget-tipping-basic-continue_button_color_wide,.widget-tipping-basic-previous_button_text_color_wide,.widget-tipping-basic-previous_button_color_wide,.widget-tipping-basic-description-color_high,.widget-tipping-basic-title_text_color_high,.widget-tipping-basic-tipping-color_high,.widget-tipping-basic-fixed_background_high,.widget-tipping-basic-background_color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-button_text_color_wide,.widget-tipping-basic-button_color_wide,.widget-tipping-basic-description-color_wide,.widget-tipping-basic-title_text_color_wide,.widget-tipping-basic-tipping-color_wide,.widget-tipping-basic-fixed_background_wide,.widget-tipping-basic-hf_color,.widget-tipping-basic-hf_color_high,.widget-tipping-basic-hf_color_wide,.widget-tipping-basic-box-hf_color,.widget-tipping-basic-button_color,.widget-tipping-basic-selected_amount_background_wide,.widget-tipping-basic-selected_amount_background_high,.widget-tipping-basic-button_color_hover_high,.widget-tipping-basic-continue_button_color_hover_high,.widget-tipping-basic-previous_button_color_hover_high",
			)
			.iris({
				defaultColor: true,

				change: _.throttle(function () {
					if ($(this).val()) {
						$(this).trigger("change");
					}
				}, 3000),

				clear: function () {},

				hide: true,

				palettes: true,
			});
	}
	$(document).on("widget-added widget-updated ready", onFormUpdate);
})(jQuery);
