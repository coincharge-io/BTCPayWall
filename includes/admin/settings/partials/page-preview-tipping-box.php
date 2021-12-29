<style>
    .preview_btcpw_tipping_box_container {
        background-color: #E6E6E6;
        width: 250px !important;
        height: 300px !important;
    }


    #preview_btcpw_tipping__button {
        color: #FFFFFF;
        background: #FE642E;
    }

    #preview_tipping_form_box fieldset div.preview_btcpw_tipping_box_header_container div h6 {
        color: #ffffff;
    }



    .preview_btcpw_tipping_box_header_container,
    #preview_button {
        background-color: #1d5aa3;
    }

    #preview_tipping_form_box fieldset div p {
        color: #000000;
    }

    #preview_tipping_form_box fieldset h6 {
        color: #000000;
    }

    .preview_btcpw_tipping_free_input {
        background-color: #ffa500;
    }
</style>

<div id="btcpw_page">
    <div class="preview_btcpw_tipping_box_container">
        <form method="POST" action="" id="preview_tipping_form_box">
            <fieldset>
                <div class="preview_btcpw_tipping_box_header_container">
                    <div id="preview_btcpw_box_logo_wrap">
                        <img alt="Tipping logo" src=<?php echo esc_url(BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png'); ?> />
                    </div>

                    <div>
                        <h6>Support my work</h6>
                    </div>

                </div>
                <h6>Enter Tipping Amount</h6>
                <div class="preview_btcpw_tipping_box_amount">

                    <div class="preview_btcpw_tipping_free_input">
                        <input type="number" id="preview_btcpw_tipping_amount" name="preview_btcpw_tipping_amount" placeholder="0.00" required />
                        <select required name="preview_btcpw_tipping_currency" id="preview_btcpw_tipping_currency">
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
                    <div class="preview_btcpw_tipping_converted_values">
                        <input type="text" id="preview_btcpw_converted_amount" name="preview_btcpw_converted_amount" readonly />
                        <input type="text" id="preview_btcpw_converted_currency" name="preview_btcpw_converted_currency" readonly />
                    </div>
                </div>
                <input type="hidden" id="preview_btcpw_redirect_link" name="preview_btcpw_redirect_link" value='' />
                <div id="preview_button">
                    <button type="submit" disabled id="preview_btcpw_tipping__button">Tipping now</button>
                </div>
            </fieldset>

        </form>
    </div>
    <div id="powered_by_box">
        <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
    </div>
</div>