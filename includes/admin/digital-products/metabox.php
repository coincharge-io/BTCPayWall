<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


/**
 * Register all meta boxes for custom post type
 * 
 * @since 1.0
 * 
 * @return void
 */

function add_btcpw_product_meta_boxes()
{
    add_meta_box('btcpw_product_price', __('Product price', 'btcpaywall'), 'btcpw_meta_callback', 'btcpw_product');

    add_meta_box('btcpw_product_files', __('Product files', 'btcpaywall'), 'btcpw_file_upload', 'btcpw_product');

    add_meta_box('btcpw_product_stats', __('Product stats', 'btcpaywall'), 'btcpw_product_stats', 'btcpw_product', 'side', 'high');

    add_meta_box('btcpw_product_customer', __('Collect customer information', 'btcpaywall'), 'btcpw_product_collect_info', 'btcpw_product');
}

add_action('add_meta_boxes', 'add_btcpw_product_meta_boxes');
function btcpw_meta_callback($post)
{
    $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;

    wp_nonce_field(basename(__FILE__), 'btcpw_nonce');
    $btcpw_stored_meta = get_post_meta($post->ID);
    $currency = get_post_meta($post->ID)['btcpw_product_currency'] ?? 'SATS';
?>
    <div class='btcpw_price_meta'>
        <input type="number" name="btcpw_product_amount" id="btcpw_product_amount" value="<?php if (isset($btcpw_stored_meta['btcpw_product_amount'])) echo $btcpw_stored_meta['btcpw_product_amount'][0]; ?>" />

        <select required name="btcpw_product_currency">
            <option disabled value="">Select currency</option>
            <?php foreach ($supported_currencies as $curr) : ?>
                <option <?php echo $currency === $curr ? 'selected' : ''; ?> value="<?php echo $curr; ?>">
                    <?php echo $curr; ?>
                <?php endforeach; ?>
        </select>

    </div>
<?php
}

function btcpw_file_upload($post_id = 0)
{
    $files            = ['booo'];
?>
    <div class='widefat'>
        <div>
            <?php do_action('render_file_row'); ?>
        </div>
        <div>
            <button>Add File</button>
        </div>
    </div>
<?php }
function render_file_row()
{ ?>
    <div id="btcpw_file" class="btcpw_repeat_wrap">
        <div class="btcpw_repeat_file_header">
            <span>Product</span>
            <a>Delete</a>
        </div>
        <div>
            <input type="text" />
            <input type="text" />
            <a href="#">Upload</a>
        </div>
    </div>
<?php
}
add_action('render_file_row', 'render_file_row');

function btcpw_product_stats()
{
?>
    <div class="btcpw_product_stats">
        <p>Sales:</p>
        <p>Earnings:</p>
    </div>
<?php
}

function btcpw_product_collect_info($post)
{
    $collect = get_post_meta($post->ID);
?>
    <div class="row">
        <div class="col-50">
            <p>Full name</p>
        </div>
        <div class="col-50">
            <label for="btcpw_product_customer_collect[name][collect]">Display</label>

            <input type="checkbox" class="btcpw_product_customer_collect_name" name="btcpw_product_customer_collect[name][collect]" <?php checked($collect['name']['collect']); ?> value="true" />

            <label for="btcpw_product_customer_collect[name][mandatory]">Mandatory</label>
            <input type="checkbox" class="btcpw_product_customer_collect_name_mandatory" name="btcpw_product_customer_collect[name][mandatory]" <?php checked($collect['name']['mandatory']); ?> value="true" />

        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Email</p>
        </div>
        <div class="col-50">
            <label for="btcpw_product_customer_collect[email][collect]">Display</label>

            <input type="checkbox" class="btcpw_product_customer_collect_email" name="btcpw_product_customer_collect[email][collect]" <?php checked($collect['email']['collect']); ?> value="true" />

            <label for="btcpw_product_customer_collect[email][mandatory]">Mandatory</label>
            <input type="checkbox" class="btcpw_product_customer_collect_email_mandatory" name="btcpw_product_customer_collect[email][mandatory]" <?php checked($collect['email']['mandatory']); ?> value="true" />

        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Address</p>
        </div>
        <div class="col-50">
            <label for="btcpw_product_customer_collect[address][collect]">Display</label>

            <input type="checkbox" class="btcpw_product_customer_collect_address" name="btcpw_product_customer_collect[address][collect]" <?php checked($collect['address']['collect']); ?> value="true" />

            <label for="btcpw_product_customer_collect[address][mandatory]">Mandatory</label>
            <input type="checkbox" class="btcpw_product_customer_collect_address_mandatory" name="btcpw_product_customer_collect[address][mandatory]" <?php checked($collect['address']['mandatory']); ?> value="true" />
        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Phone number</p>
        </div>
        <div class="col-50">
            <label for="btcpw_product_customer_collect[phone][collect]">Display</label>

            <input type="checkbox" class="btcpw_product_customer_collect_phone" name="btcpw_product_customer_collect[phone][collect]" <?php checked($collect['phone']['collect']); ?> value="true" />

            <label for="btcpw_product_customer_collect[phone][mandatory]">Mandatory</label>
            <input type="checkbox" class="btcpw_product_customer_collect_phone_mandatory" name="btcpw_product_customer_collect[phone][mandatory]" <?php checked($collect['phone']['mandatory']); ?> value="true" />

        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Message</p>
        </div>
        <div class="col-50">
            <label for="btcpw_product_customer_collect[message][collect]">Display</label>
            <input type="checkbox" class="btcpw_product_customer_collect_message" name="btcpw_product_customer_collect[message][collect]" <?php checked($collect['message']['collect']); ?> value="true" />

            <label for="btcpw_product_customer_collect[message][mandatory]">Mandatory</label>
            <input type="checkbox" class="btcpw_product_customer_collect_message_mandatory" name="btcpw_product_customer_collect[message][mandatory]" <?php checked($collect['message']['mandatory']); ?> value="true" />

        </div>
    </div>
<?php
}
/**
 * Product price
 * 
 * @since 1.0
 * 
 * @return void
 */
function btcpw_meta_save($post_id)
{
    global $post;

    if (!isset($_POST['btcpw_nonce']) || !wp_verify_nonce($_POST['btcpw_nonce'], basename(__FILE__))) {
        return;
    }

    if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)) {
        return;
    }

    if (isset($post->post_type) && 'revision' == $post->post_type) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if (isset($_POST['btcpw_product_currency'])) {
        update_post_meta($post_id, 'btcpw_product_currency', sanitize_text_field($_POST['btcpw_product_currency']));
    }
    if (isset($_POST['btcpw_product_amount'])) {
        update_post_meta($post_id, 'btcpw_product_amount', sanitize_text_field($_POST['btcpw_product_amount']));
    }
}
add_action('save_post', 'btcpw_meta_save');
