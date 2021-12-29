<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
$remove_data = get_option('btcpw_remove_data_on_uninstall');

?>
<div id="btcpw_misc_options">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_misc_options'); ?>
            <div class="row">
                <div class="col-50">
                    <p>Clear data on uninstall</p>
                </div>
                <div class="col-50">

                    <input type="checkbox" name="btcpw_remove_data_on_uninstall" id="btcpw_remove_data_on_uninstall" <?php checked($remove_data); ?> value="true" />

                </div>
            </div>
    </div>

    <div class="btcpw__paywall_submit_button" style="display: inline-block;">
        <button class="button button-primary btcpw_button" type="submit">Save</button>
    </div>
    </form>
</div>
</div>