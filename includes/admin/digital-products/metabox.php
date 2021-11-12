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
    add_meta_box('btcpw_product_amount', __('Product price', 'btcpaywall'), 'render_btcpw_amount', 'digital_download');

    //add_meta_box('btcpw_product_files', __('Product files', 'btcpaywall'), 'render_btcpw_file_upload', 'digital_download');

    //add_meta_box('btcpw_product_stats', __('Product stats', 'btcpaywall'), 'render_btcpw_product_stats', 'digital_download', 'side', 'high');
    //add_meta_box('btcpw_product_limit', __('Product settings', 'btcpaywall'), 'render_btcpw_product_settings', 'digital_download');
    add_meta_box('btcpw_product_customer', __('Collect customer information', 'btcpaywall'), 'render_btcpw_product_collect_info', 'digital_download');
}

add_action('add_meta_boxes', 'add_btcpw_product_meta_boxes');

function btcpw_meta_fields()
{
    $fields =
        [
            'btcpw_product_price',
            'btcpw_product_currency',
            'btcpw_digital_product_id',
            'btcpw_digital_product_file',
            'btcpw_digital_product_filename',
            'btcpw_product_sales',
            'btcpw_product_limit',
            'btcpw_collect_customer_name',
            'btcpw_mandatory_customer_name',
            'btcpw_collect_customer_email',
            'btcpw_mandatory_customer_email',
            'btcpw_collect_customer_address',
            'btcpw_mandatory_customer_address',
            'btcpw_collect_customer_phone',
            'btcpw_mandatory_customer_phone',
            'btcpw_collect_customer_message',
            'btcpw_mandatory_customer_message',
        ];
    return $fields;
}

function render_btcpw_product_settings($post)
{
    $limit = $btcpw_stored_meta['btcpw_product_download_limit'][0] ?? 0;

?>
    <div class='btcpw_settings_meta'>
        <div>
            <label for="btcpw_product_download_limit">Download limit</label>

            <input type="number" name="btcpw_product_download_limit" id="btcpw_product_download_limit" min="0" value="<?php echo $limit; ?>" />
        </div>


        <div>
            <label for="btcpw_product_download_shortcode">Shortcode</label>
            <input type="text" name="btcpw_product_download_shortcode" id="btcpw_product_download_shortcode" readonly value="<?php echo "[btcpw_digital_download post_id=$post->ID]"; ?>" />
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
function render_btcpw_amount($post)
{

    $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
    wp_nonce_field(basename(__FILE__), 'btcpw_nonce');
    $btcpw_stored_meta = get_post_meta($post->ID);
    $currency = $btcpw_stored_meta['btcpw_product_currency'][0] ?? 'SATS';
    $price = $btcpw_stored_meta['btcpw_product_price'][0] ?? 0;
    $limit = $btcpw_stored_meta['btcpw_product_limit'][0] ?? 0;
    $file = $btcpw_stored_meta['btcpw_digital_product_file'][0] ?? '';
    $filename = $btcpw_stored_meta['btcpw_digital_product_filename'][0] ?? '';
    $file_id = $btcpw_stored_meta['btcpw_digital_product_id'][0] ?? 0;


?>
    <div class='btcpw_product_limit'>
        <div>
            <label for="btcpw_product_download_limit">Download limit</label>

            <input type="number" name="btcpw_product_limit" id="btcpw_product_download_limit" min="0" value="<?php echo $limit; ?>" />
        </div>


        <div>
            <label for="btcpw_product_download_shortcode">Shortcode</label>
            <input type="text" name="btcpw_product_download_shortcode" id="btcpw_product_download_shortcode" readonly value="<?php echo "[btcpw_digital_download post_id=$post->ID]"; ?>" />
        </div>

    </div>
    <div class='btcpw_price_meta'>
        <input type="number" name="btcpw_product_price" id="btcpw_product_price" min="0" value="<?php echo $price; ?>" />

        <select required name="btcpw_product_currency">
            <option disabled value="">Select currency</option>
            <?php foreach ($supported_currencies as $curr) : ?>
                <option <?php echo $currency === $curr ? 'selected' : ''; ?> value="<?php echo $curr; ?>">
                    <?php echo $curr; ?>
                <?php endforeach; ?>
        </select>

    </div>
    <div id="btcpw_file" class="btcpw_repeatable_product_wrap">
        <div class="btcpw_repeat_file_header">
            <span>Product</span>
            <a>Delete</a>
        </div>
        <div class="btcpw_download_product">
            <input type="hidden" name="btcpw_digital_product_id" id="btcpw_product_id" value="<?php echo $file_id; ?>" />
            <input type="text" placeholder="File name" name="btcpw_digital_product_filename" id="btcpw_product_filename" value="<?php echo $filename; ?>" />
            <input type="text" name="btcpw_digital_product_file" id="btcpw_product_file" value="<?php echo $file; ?>" placeholder="Upload file or enter file url here" />
            <button id="btcpw_digital_download_upload_button">Upload</button>
        </div>
    </div>

<?php
}

function render_btcpw_file_upload($post)
{
?>
    <div class='btcpw_product_file_download'>

        <?php do_action('render_file_row'); ?>
    </div>
<?php }

/*Planned for next release*/
function render_add_new_product()
{
?>
    <div>
        <button>Add File</button>
    </div>
<?php
}
add_action('render_file_add_new', 'render_add_new_product');


function render_file_row($post_id)
{
    $btcpw_stored_meta = get_post_meta($post_id);

    $file = $btcpw_stored_meta['btcpw_digital_product_file'][0] ?? '';
    $filename = $btcpw_stored_meta['btcpw_digital_product_filename'][0] ?? '';
?>
    <div id="btcpw_file" class="btcpw_repeatable_product_wrap">
        <div class="btcpw_repeat_file_header">
            <span>Product</span>
            <a>Delete</a>
        </div>
        <div class="btcpw_download_product">
            <input type="text" placeholder="File name" name="btcpw_digital_product_filename" id="btcpw_product_filename" value="<?php echo $filename; ?>" />
            <input type="text" name="btcpw_digital_product_file" id="btcpw_product_file" value="<?php echo $file; ?>" placeholder="Upload file or enter file url here" />
            <button id="btcpw_digital_download_upload_button">Upload</button>
        </div>
    </div>
<?php
}
add_action('render_file_row', 'render_file_row');

/* function render_btcpw_product_stats()
{
?>
    <div class="btcpw_product_stats">
        <p>Sales:</p>
        <p>Earnings:</p>
    </div>
<?php
}
 */
function render_btcpw_product_collect_info($post)
{
    $collect_data = get_post_meta($post->ID);
    $collect = [
        "btcpw_collect_customer_name" => $collect_data["btcpw_collect_customer_name"][0] ?? false,
        "btcpw_mandatory_customer_name" => $collect_data["btcpw_mandatory_customer_name"][0] ?? false,
        "btcpw_collect_customer_email" => $collect_data["btcpw_collect_customer_email"][0] ?? false,
        "btcpw_mandatory_customer_email" => $collect_data["btcpw_mandatory_customer_email"][0] ?? false,
        "btcpw_collect_customer_address" => $collect_data["btcpw_collect_customer_address"][0] ?? false,
        "btcpw_mandatory_customer_address" => $collect_data["btcpw_mandatory_customer_address"][0] ?? false,
        "btcpw_collect_customer_phone" => $collect_data["btcpw_collect_customer_phone"][0] ?? false,
        "btcpw_mandatory_customer_phone" => $collect_data["btcpw_mandatory_customer_phone"][0] ?? false,
        "btcpw_collect_customer_message" => $collect_data["btcpw_collect_customer_message"][0] ?? false,
        "btcpw_mandatory_customer_message" => $collect_data["btcpw_mandatory_customer_message"][0] ?? false
    ];
?>
    <div class="row">
        <div class="col-50">
            <p>Full name</p>
        </div>
        <div class="col-50">
            <label for="btcpw_collect_customer_name">Display</label>

            <input type="checkbox" id="btcpw_collect_customer_name" class="btcpw_product_customer_collect_name" name="btcpw_collect_customer_name" <?php checked($collect["btcpw_collect_customer_name"]); ?> value="true" />

            <label for="btcpw_mandatory_customer_name">Mandatory</label>
            <input type="checkbox" class="btcpw_product_customer_collect_name_mandatory" name="btcpw_mandatory_customer_name" id="btcpw_mandatory_customer_name" <?php checked($collect["btcpw_mandatory_customer_name"]); ?> value="true" />

        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Email</p>
        </div>
        <div class="col-50">
            <label for="btcpw_collect_customer_email">Display</label>

            <input type="checkbox" id="btcpw_collect_customer_email" class="btcpw_product_customer_collect_email" name="btcpw_collect_customer_email" <?php checked($collect["btcpw_collect_customer_email"]); ?> value="true" />

            <label for="btcpw_mandatory_customer_email">Mandatory</label>
            <input type="checkbox" id="btcpw_mandatory_customer_email" class="btcpw_product_customer_collect_email_mandatory" name="btcpw_mandatory_customer_email" <?php checked($collect["btcpw_mandatory_customer_email"]); ?> value="true" />

        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Address</p>
        </div>
        <div class="col-50">
            <label for="btcpw_collect_customer_address">Display</label>

            <input type="checkbox" id="btcpw_collect_customer_address" class="btcpw_product_customer_collect_address" name="btcpw_collect_customer_address" <?php checked($collect["btcpw_collect_customer_address"]); ?> value="true" />

            <label for="btcpw_mandatory_customer_address">Mandatory</label>
            <input type="checkbox" id="btcpw_mandatory_customer_address" class="btcpw_product_customer_collect_address_mandatory" name="btcpw_mandatory_customer_address" <?php checked($collect["btcpw_mandatory_customer_address"]); ?> value="true" />
        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Phone number</p>
        </div>
        <div class="col-50">
            <label for="btcpw_collect_customer_phone">Display</label>

            <input type="checkbox" id="btcpw_collect_customer_phone" class="btcpw_product_customer_collect_phone" name="btcpw_collect_customer_phone" <?php checked($collect["btcpw_collect_customer_phone"]); ?> value="true" />

            <label for="btcpw_mandatory_customer_phone">Mandatory</label>
            <input type="checkbox" id="btcpw_mandatory_customer_phone" class="btcpw_product_customer_collect_phone_mandatory" name="btcpw_mandatory_customer_phone" <?php checked($collect["btcpw_mandatory_customer_phone"]); ?> value="true" />

        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <p>Message</p>
        </div>
        <div class="col-50">
            <label for="btcpw_collect_customer_message">Display</label>
            <input type="checkbox" id="btcpw_collect_customer_message" class="btcpw_product_customer_collect_message" name="btcpw_collect_customer_message" <?php checked($collect["btcpw_collect_customer_message"]); ?> value="true" />

            <label for="btcpw_mandatory_customer_message">Mandatory</label>
            <input type="checkbox" id="btcpw_mandatory_customer_message" class="btcpw_product_customer_collect_message_mandatory" name="btcpw_mandatory_customer_message" <?php checked($collect["btcpw_mandatory_customer_message"]); ?> value="true" />

        </div>
    </div>
<?php
}

function btcpw_meta_save($post_id)
{

    if (empty($post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post_id)) || is_int(wp_is_post_autosave($post_id))) {
        return;
    }
    if (!isset($_POST['btcpw_nonce']) || !wp_verify_nonce($_POST['btcpw_nonce'], basename(__FILE__))) {
        return;
    }

    $fields = btcpw_meta_fields();

    $booleans = [
        'btcpw_collect_customer_name',
        'btcpw_mandatory_customer_name',
        'btcpw_collect_customer_email',
        'btcpw_mandatory_customer_email',
        'btcpw_collect_customer_address',
        'btcpw_mandatory_customer_address',
        'btcpw_collect_customer_phone',
        'btcpw_mandatory_customer_phone',
        'btcpw_collect_customer_message',
        'btcpw_mandatory_customer_message'
    ];

    foreach ($fields as $field) {
        if (in_array($field, $booleans)) {
            $bool = filter_var($_POST[$field], FILTER_VALIDATE_BOOLEAN);
            if (!empty($_POST[$field])) {
                update_post_meta($post_id, $field, $bool);
            } else {
                delete_post_meta($post_id, $field);
            }
        } elseif (('btcpw_product_limit' === $field) || ('btcpw_product_price' === $field)  || ('btcpw_product_sales' === $field)) {
            if (!empty($_POST[$field])) {
                update_post_meta($post_id, $field, intval($_POST[$field]));
            } else {
                delete_post_meta($post_id, $field);
            }
        } else {
            if (!empty($_POST[$field])) {
                $new_value = filter_var($_POST[$field], FILTER_SANITIZE_STRING);;
                update_post_meta($post_id, $field, $new_value);
            } else {
                delete_post_meta($post_id, $field);
            }
        }
    }
}
add_action('save_post', 'btcpw_meta_save');
