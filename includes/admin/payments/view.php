<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

function render_payments_page()
{
    if (isset($_GET['view']) && 'view-payment' == $_GET['view']) {
        require_once __DIR__ . '/view-payment.php';
    } else {
        require_once __DIR__ . '/class-payments.php';
        $table = new Payments_Table();


?>
        <div class="wrap">
            <h2>Payments</h2>

            <div>
                <div>
                    <div>
                        <div>
                            <form method="post">
                                <?php
                                $table->prepare_items();
                                $table->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
<?php

    }
}
