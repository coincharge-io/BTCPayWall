<style>
    .preview_btcpw_page_tipping_container {
        background-color: #E6E6E6;
        width: 520px !important;
        height: 600px !important;
    }




    .preview_btcpw_page_header_container h6 {
        color: #ffffff;
    }


    .preview_btcpw_page_tipping_info fieldset h6,
    .preview_btcpw_page_tipping_info h6 {
        color: #000000;
    }

    .preview_btcpw_page_amount_value_1,
    .preview_btcpw_page_amount_value_2,
    .preview_btcpw_page_amount_value_3,
    .preview_btcpw_page_tipping_free_input {
        background-color: #ffa500;

    }

    .preview_btcpw_page_header_container,
    #preview_btcpw_page_button,
    #preview_btcpw_page_button>div:nth-child(1)>input {
        background-color: #1d5aa3;
    }

    .preview_btcpw_page_bar_container.active {
        background-color: #808080;
    }


    #preview_btcpw_page_tipping__button,
    #preview_btcpw_page_button>input.page-next-form {
        background-color: #FE642E;
    }

    .preview_btcpw_page_bar_container div {
        background-color: #D3D3D3;
    }
</style>

<div id="btcpw_page">
    <div class="preview_btcpw_page_tipping_container">
        <form method="POST" action="" id="preview_page_tipping_form">
            <div class="preview_btcpw_page_header_container">

                <div id="preview_btcpw_page_logo_wrap">
                    <img alt="Tipping page logo" src=<?php echo esc_url(BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png'); ?> />
                </div>
                <div>
                    <h6>Support my work</h6>
                </div>
            </div>
            <div class='preview_btcpw_page_bar_container'>
                <div class='preview_btcpw_page_bar_container bar-1 active'>Pledge</div>
                <div class='preview_btcpw_page_bar_container bar-2'>Info</div>
            </div>
            <fieldset>
                <h6>Enter Tipping Amount
                </h6>
                <div class="preview_btcpw_page_amount">
                    <div class="preview_btcpw_page_amount_value_1">
                        <div>
                            <input type="radio" class="preview_btcpw_page_tipping_default_amount" id="preview_value_1_page" name="preview_btcpw_page_tipping_default_amount" required value="1000 SATS">

                            <i class="fas fa-coffee"></i>
                        </div>
                        <label for="value_1_page">1000 SATS</label>

                    </div>
                    <div class="preview_btcpw_page_amount_value_2">
                        <div>
                            <input type="radio" class="preview_btcpw_page_tipping_default_amount" id="preview_value_2_page" name="preview_btcpw_page_tipping_default_amount" required value="2000 SATS">

                            <i class="fas fa-beer"></i>
                        </div>
                        <label for="value_2_page">2000 SATS</label>

                    </div>
                    <div class="preview_btcpw_page_amount_value_3">
                        <div>
                            <input type="radio" class="preview_btcpw_page_tipping_default_amount" id="preview_value_3_page" name="preview_btcpw_page_tipping_default_amount" required value="3000 SATS">

                            <i class="fas fa-cocktail"></i>
                        </div>
                        <label for="value_3_page">3000 SATS</label>

                    </div>
                    <div class="preview_btcpw_page_tipping_free_input">
                        <input type="number" id="preview_btcpw_page_tipping_amount" name="preview_btcpw_page_tipping_amount" placeholder="0.00" required />


                        <select required name="preview_btcpw_page_tipping_currency" id="preview_btcpw_page_tipping_currency">
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

                <div class="preview_btcpw_page_tipping_converted_values">
                    <input type="text" id="preview_btcpw_page_converted_amount" name="preview_btcpw_page_converted_amount" readonly />
                    <input type="text" id="preview_btcpw_page_converted_currency" name="preview_btcpw_page_converted_currency" readonly />
                </div>


                <div id="preview_btcpw_page_button">
                    <input type="hidden" id="preview_btcpw_page_redirect_link" name="preview_btcpw_page_redirect_link" />
                    <input type="button" name="next" class="page-next-form" value="Continue" />

                </div>

            </fieldset>
            <fieldset>
                <div class="preview_btcpw_page_donor_information">

                    <div class="preview_btcpw_page_tipping_donor_name_wrap high">
                        <input type="text" placeholder="Full name" id="preview_btcpw_page_tipping_donor_name_high" name="preview_btcpw_page_tipping_donor_name_high" required />
                    </div>
                    <div class="preview_btcpw_page_tipping_donor_email_wrap high">
                        <input type="text" placeholder="Email" id="preview_btcpw_page_tipping_donor_email_high" name="preview_btcpw_page_tipping_donor_email_high" required />
                    </div>
                    <div class="preview_btcpw_page_tipping_donor_address_wrap high">
                        <input type="text" placeholder="Address" id="preview_btcpw_page_tipping_donor_address_high" name="preview_btcpw_page_tipping_donor_address_high" required />
                    </div>
                    <div class="preview_btcpw_page_tipping_donor_phone_wrap high">
                        <input type="text" placeholder="Phone" id="preview_btcpw_page_tipping_donor_phone_high" name="preview_btcpw_page_tipping_donor_phone_high" required />
                    </div>
                    <div class="preview_btcpw_page_tipping_donor_message_wrap high">
                        <input type="text" placeholder="Message" id="preview_btcpw_page_tipping_donor_message_high" name="preview_btcpw_page_tipping_donor_message_high" required />
                    </div>
                </div>
                <div id="preview_btcpw_page_button">
                    <div>
                        <input type="button" name="previous" class="preview_page-previous-form" value="< previous" />
                    </div>
                    <div>
                        <button disabled type="submit" id="preview_btcpw_page_tipping__button">Tipping now</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div id="powered_by">
        <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
    </div>
</div>