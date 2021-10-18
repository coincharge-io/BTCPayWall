<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function render_payments_page()
{
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
