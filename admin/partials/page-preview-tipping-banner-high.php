<style>
    .preview_btcpw_skyscraper_tipping_container.high {
        background-color: #E6E6E6;
    }

    .preview_btcpw_skyscraper_banner.high {
        background-color: #E6E6E6;
    }

    .preview_btcpw_skyscraper_header_container.high,
    #preview_btcpw_skyscraper_high_button,
    #preview_btcpw_skyscraper_high_button>div:nth-child(1)>input {
        background-color: #1d5aa3;
    }

    #preview_btcpw_skyscraper_tipping_high_button,
    #preview_btcpw_skyscraper_high_button>div>input.skyscraper-next-form {
        color: #FFFFFF;
        background: #FE642E;
    }

    .preview_btcpw_skyscraper_header_container.high h6 {
        color: #ffffff;
    }

    div.preview_btcpw_skyscraper_banner.high>div.preview_btcpw_skyscraper_header_container.high p {
        color: #000000;
    }

    #preview_skyscraper_tipping_high_form>fieldset h6 {
        color: #000000;
    }

    .preview_btcpw_skyscraper_amount_value_1.high,
    .preview_btcpw_skyscraper_amount_value_2.high,
    .preview_btcpw_skyscraper_amount_value_3.high,
    .preview_btcpw_skyscraper_tipping_free_input.high {
        background: #ffa500;
    }
</style>
<div id="btcpw_page">
    <div class="preview_btcpw_skyscraper_banner high">
        <div class="preview_btcpw_skyscraper_header_container high">
            <div id="preview_btcpw_skyscraper_logo_wrap_high">
                <img alt="Tipping logo" src="https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg" />
            </div>
            <div>
                <h6>Support my work</h6>
                <p>Description</p>
            </div>
        </div>
        <div class="preview_btcpw_skyscraper_tipping_container high">
            <form method="POST" action="" id="preview_skyscraper_tipping_high_form">
                <fieldset>
                    <h6>
                        Enter Tipping Amount
                    </h6>
                    <div class="preview_btcpw_skyscraper_amount high">
                        <div class="preview_btcpw_skyscraper_amount_value_1 high">
                            <div>
                                <input type="radio" class="preview_btcpw_skyscraper_tipping_default_amount high" id="preview_value_1_high" name="preview_btcpw_skyscraper_tipping_default_amount_high" required value="1000 SATS">
                                <i class="fas fa-coffee"></i>
                            </div>
                            <label for="preview_value_1_high">1000 SATS</label>

                        </div>
                        <div class="preview_btcpw_skyscraper_amount_value_2 high">
                            <div>
                                <input type="radio" class="preview_btcpw_skyscraper_tipping_default_amount high" id="preview_value_2_high" name="preview_btcpw_skyscraper_tipping_default_amount_high" required value="2000 SATS">
                                <i class="fas fa-beer"></i>
                            </div>
                            <label for="preview_value_2_high">2000 SATS</label>

                        </div>
                        <div class="preview_btcpw_skyscraper_amount_value_3 high">
                            <div>
                                <input type="radio" class="preview_btcpw_skyscraper_tipping_default_amount high" id="preview_value_3_high" name="preview_btcpw_skyscraper_tipping_default_amount_high" required value="3000 SATS">
                                <i class="fas fa-cocktail"></i>
                            </div>
                            <label for="preview_value_3_high">3000 SATS</label>

                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_free_input high">
                            <input type="number" id="preview_btcpw_skyscraper_tipping_high_amount" name="<preview_btcpw_skyscraper_tipping_amount_high" placeholder="0.00" required />


                            <select required name="preview_btcpw_skyscraper_tipping_currency_high" id="preview_btcpw_skyscraper_tipping_high_currency">
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
                    <div class="preview_btcpw_skyscraper_tipping_converted_values high">
                        <input type="text" id="preview_btcpw_skyscraper_high_converted_amount" name="preview_btcpw_skyscraper_converted_amount_high" readonly />
                        <input type="text" id="preview_btcpw_skyscraper_high_converted_currency" name="preview_btcpw_skyscraper_converted_currency_high" readonly />
                    </div>


                    <div class="preview_btcpw_skyscraper_button high" id="preview_btcpw_skyscraper_high_button">
                        <input type="hidden" id="preview_btcpw_skyscraper_redirect_link_high" name="preview_btcpw_skyscraper_redirect_link_high" value="" />

                        <div>
                            <input type="button" name="next" class="<?php echo "skyscraper-next-form high"; ?>" value="Continue">
                        </div>
                    </div>

                </fieldset>
                <fieldset>
                    <div class="preview_btcpw_skyscraper_donor_information high">

                        <div class="preview_btcpw_skyscraper_tipping_donor_name_wrap high">
                            <input type="text" placeholder="Full name" id="preview_btcpw_skyscraper_tipping_donor_name_high" name="preview_btcpw_skyscraper_tipping_donor_name_high" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_email_wrap high">
                            <input type="text" placeholder="Email" id="preview_btcpw_skyscraper_tipping_donor_email_high" name="preview_btcpw_skyscraper_tipping_donor_email_high" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_address_wrap high">
                            <input type="text" placeholder="Address" id="preview_btcpw_skyscraper_tipping_donor_address_high" name="preview_btcpw_skyscraper_tipping_donor_address_high" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_phone_wrap high">
                            <input type="text" placeholder="Phone" id="preview_btcpw_skyscraper_tipping_donor_phone_high" name="preview_btcpw_skyscraper_tipping_donor_phone_high" required />
                        </div>
                        <div class="preview_btcpw_skyscraper_tipping_donor_message_wrap high">
                            <input type="text" placeholder="Message" id="preview_btcpw_skyscraper_tipping_donor_message_high" name="preview_btcpw_skyscraper_tipping_donor_message_high" required />
                        </div>
                    </div>
                    <div class="<?php echo "preview_btcpw_skyscraper_button high"; ?>" id="preview_btcpw_skyscraper_high_button">
                        <div>
                            <input type="button" name="previous" class="preview_skyscraper-previous-form high" value="< Previous" />
                        </div>
                        <div>
                            <button disabled type="submit" id="preview_btcpw_skyscraper_tipping_high_button">Tipping now</button>
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