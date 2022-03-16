<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
?>
<div>
    <div class="btcpaywall-demo-container">
        <div class="btcpaywall-demo-pay-per-post-enabled">
            <p>[btcpw_start_content pay_block=true]</p>
            <p>This is a demo.</p>
            <p>[btcpw_end_content]</p>
            <div>
                <?php echo do_shortcode("[btcpw_start_content pay_block='true']"); ?>
            </div>
        </div>
        <div class="btcpaywall-demo-pay-per-post-disabled">
            <p>[btcpw_start_content pay_block=false]</p>
            <p>This is a demo.</p>
            <p>[btcpw_end_content]</p>
            <div>
                This is a demo.
            </div>
        </div>
    </div>
</div>