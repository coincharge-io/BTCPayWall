<?php
$btcpw_opennode_url = get_option('btcpw_opennode_url');
$btcpw_opennode_auth_key = get_option('btcpw_opennode_auth_key');
?>
<div class="btcpw_general_settings">
    <div style="margin-top: 25px;">

        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_opennode_settings'); ?>
            <div>
                <h2>OpenNode</h2>

                <div class="row">
                    <div class="col-20">
                        <label>OpenNode Url</label>
                    </div>
                    <div class="col-80">
                        <input type="url" placeholder="OpenNode Url" name="btcpw_opennode_url" id="btcpw_opennode_url" value="<?php echo $btcpw_opennode_url ?>" style="min-width: 335px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_auth_key_view">OpenNode API Key</label>
                    </div>
                    <div class="col-80">
                        <input required type="text" placeholder="OpenNode Auth Key" name="btcpw_opennode_auth_key" id="btcpw_opennode_auth_key" value="<?php echo $btcpw_opennode_auth_key ?>" style="min-width: 500px;">
                    </div>
                </div>
                <div class="btcpw_general_settings_buttons" style="display: inline-block;">
                    <button class="button button-primary btcpw_button" type="submit">Save</button>
                </div>
        </form>

    </div>
</div>