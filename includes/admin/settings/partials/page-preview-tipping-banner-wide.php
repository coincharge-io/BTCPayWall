<style>
    .preview_btcpw_skyscraper_tipping_container.wide {
        background-color: #E6E6E6;
    }

    .preview_btcpw_skyscraper_banner.wide {
        background-color: #E6E6E6;
    }

    .preview_btcpw_skyscraper_header_container.wide,
    #preview_btcpw_skyscraper_wide_button,
    #preview_btcpw_skyscraper_wide_button>div:nth-child(1)>input {
        background-color: #1d5aa3;
    }

    #preview_btcpw_skyscraper_tipping_wide_button,
    #preview_btcpw_skyscraper_wide_button>div>input.skyscraper-next-form {
        color: #FFFFFF;
        background: #FE642E;
    }

    .preview_btcpw_skyscraper_header_container.wide h6 {
        color: #ffffff;
    }

    div.preview_btcpw_skyscraper_banner.wide>div.preview_btcpw_skyscraper_header_container.wide p {
        color: #000000;
    }

    #preview_skyscraper_tipping_wide_form>fieldset h6 {
        color: #000000;
    }

    .preview_btcpw_skyscraper_amount_value_1.wide,
    .preview_btcpw_skyscraper_amount_value_2.wide,
    .preview_btcpw_skyscraper_amount_value_3.wide,
    .preview_btcpw_skyscraper_tipping_free_input.wide {
        background: #ffa500;
    }
</style>
<div id="btcpw_page">
    <div class="preview_btcpw_skyscraper_banner wide">
        <div class="preview_btcpw_skyscraper_header_container wide">
            <div id="preview_btcpw_skyscraper_logo_wrap_wide">
                <img alt="Tipping logo" src=<?php echo esc_url(BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png');?> />
            </div>
            <div>
                <h6>Support my work</h6>
            </div>
        </div>
        <div class="preview_btcpw_skyscraper_tipping_container wide">
            <form method="POST" action="" id="preview_skyscraper_tipping_wide_form">
                <fieldset>
                    <h6>
                        Enter Tipping Amount
                    </h6>
                    <div class="preview_btcpw_skyscraper_amount wide">
                        <div class="preview_btcpw_skyscraper_amount_value_1 wide">
                            <div>
                                <input type="radio" class="preview_btcpw_skyscraper_tipping_default_amount wide" id="preview_value_1_wide" name="preview_btcpw_skyscraper_tipping_default_amount_wide" required value="1000 SATS">
                                <i class="fas fa-coffee"></i>
                            </div>
                            <label for="preview_value_1_wide">1000 SATS</label>

                        </div>
                        <div class="preview_btcpw_skyscraper_amount_value_2 wide">
                            <div>
                                <input type="radio" class="preview_btcpw_skyscraper_tipping_default_amount wide" id="preview_value_2_wide" name="preview_btcpw_skyscraper_tipping_default_amount_wide" required value="2000 SATS">
                                <i class="fas fa-beer"></i>
                            </div>
                            <label for="preview_value_2_wide">2000 SATS</label>

                        </div>
                        <div class="preview_btcpw_skyscraper_amount_value_3 wide">
                            <div>
                                <input type="radio" class="preview_btcpw_skyscraper_tipping_default_amount wide" id="preview_value_3_wide" name="preview_btcpw_skyscraper_tipping_default_amount_wide" required value="3000 SATS">
                                <i class="fas fa-cocktail"></i>
                            </div>
                            <label for="preview_value_3_wide">3000 SATS</label>

                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_free_input wide">
                            <input type="number" id="preview_btcpw_skyscraper_tipping_wide_amount" name="preview_btcpw_skyscraper_tipping_amount_wide" placeholder="0.00" required />


                            <select required name="preview_btcpw_skyscraper_tipping_currency_wide" id="preview_btcpw_skyscraper_tipping_wide_currency">
                                <option disabled value="">Select currency</option>

                                <option value="SATS" selected>
                                    SATS</option>
                                <option value="BTC">
                                    BTC</option>
                                <option value="EUR">
                                    EUR</option>
                                <option value="USD">
                                    USD</option>
                            </select>
                            <i class="fas fa-arrows-alt-v"></i>

                        </div>
                    </div>
                    <div class="preview_btcpw_skyscraper_tipping_converted_values wide">
                        <input type="text" id="preview_btcpw_skyscraper_wide_converted_amount" name="preview_btcpw_skyscraper_converted_amount_wide" readonly />
                        <input type="text" id="preview_btcpw_skyscraper_wide_converted_currency" name="preview_btcpw_skyscraper_converted_currency_wide" readonly />
                    </div>


                    <div class="preview_btcpw_skyscraper_button wide" id="preview_btcpw_skyscraper_wide_button">
                        <input type="hidden" id="preview_btcpw_skyscraper_redirect_link_wide" name="preview_btcpw_skyscraper_redirect_link_wide" value="" />

                        <div>
                            <input type="button" name="next" class="skyscraper-next-form wide" value="Continue">
                        </div>
                    </div>

                </fieldset>
                <fieldset>
                    <div class="preview_btcpw_skyscraper_donor_information wide">

                        <div class="preview_btcpw_skyscraper_tipping_donor_name_wrap wide">
                            <input type="text" placeholder="Full_name" id="preview_btcpw_skyscraper_tipping_donor_name_wide" name="preview_btcpw_skyscraper_tipping_donor_name_wide" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_email_wrap wide">
                            <input type="text" placeholder="Email" id="preview_btcpw_skyscraper_tipping_donor_email_wide" name="preview_btcpw_skyscraper_tipping_donor_email_wide" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_address_wrap wide">
                            <input type="text" placeholder="Address" id="preview_btcpw_skyscraper_tipping_donor_address_wide" name="preview_btcpw_skyscraper_tipping_donor_address_wide" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_phone_wrap wide">
                            <input type="text" placeholder="Phone" id="preview_btcpw_skyscraper_tipping_donor_phone_wide" name="preview_btcpw_skyscraper_tipping_donor_phone_wide" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_message_wrap wide">
                            <input type="text" placeholder="Message" id="preview_btcpw_skyscraper_tipping_donor_message_wide" name="preview_btcpw_skyscraper_tipping_donor_message_wide" required />
                        </div>
                    </div>
                    <div class="<?php echo "preview_btcpw_skyscraper_button wide"; ?>" id="preview_btcpw_skyscraper_wide_button">
                        <div>
                            <input type="button" name="previous" class="preview_skyscraper-previous-form wide" value="< Previous" />
                        </div>
                        <div>
                            <button disabled type="submit" id="preview_btcpw_skyscraper_tipping_wide_button">Tipping now</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div id="powered_by_skyscraper">
        <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
    </div>
</div>