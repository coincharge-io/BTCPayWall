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
    add_meta_box('btcpw_product_amount', __('BTCPayWall Product  Price', 'btcpaywall'), 'render_btcpw_amount', 'digital_download');

    add_meta_box('btcpw_product_files', __('BTCPayWall Upload File', 'btcpaywall'), 'render_btcpw_file_upload', 'digital_download');

    add_meta_box('btcpw_product_stats', __('BTCPayWall Product Sales', 'btcpaywall'), 'render_btcpw_product_stats', 'digital_download', 'side', 'high');

    add_meta_box('btcpw_product_limit', __('BTCPayWall Product Download Limit', 'btcpaywall'), 'render_btcpw_product_settings', 'digital_download', 'side');

    add_meta_box('btcpw_product_image', __('BTCPayWall Product Image', 'btcpaywall'), 'render_btcpw_product_image', 'digital_download', 'side');

    add_meta_box('btcpw_product_description',  __('BTCPayWall Product Description', 'btcpaywall'), 'render_btcpw_product_description');
}

add_action('add_meta_boxes', 'add_btcpw_product_meta_boxes');

function btcpw_meta_fields()
{
    $fields =
        [
            'btcpw_price',
            'btcpw_currency',
            'btcpw_digital_product_id',
            'btcpw_digital_product_file',
            'btcpw_digital_product_filename',
            'btcpw_product_sales',
            'btcpw_product_limit',
            'btcpw_product_image_id',
            'btcpw_product_description'
        ];
    return $fields;
}
function render_btcpw_product_description($post)
{
    $btcpw_stored_meta = get_post_meta($post->ID);
    $description = $btcpw_stored_meta['btcpw_product_description'][0] ?? '';
    $args = array(
        'tinymce' => false,
        'quicktags' => true,
    );
    wp_editor($description, 'btcpw_product_description', $args);
}
function render_btcpw_product_settings($post)
{
    $btcpw_stored_meta = get_post_meta($post->ID);
    $limit = $btcpw_stored_meta['btcpw_product_limit'][0] ?? 0;

?>
    <div class='btcpw_product_limit'>
        <div>
            <label for="btcpw_product_download_limit">Download limit <span class="btcpw_digital_download_limit_help" title="Set 0 for unlimited number of downloads."></span></label>

            <input type="number" name="btcpw_product_limit" id="btcpw_product_download_limit" min="0" value="<?php echo $limit; ?>" />
        </div>

    </div>
<?php
}
function render_btcpw_product_image($post)
{
    $btcpw_stored_meta = get_post_meta($post->ID);
    $logo_id = $btcpw_stored_meta['btcpw_product_image_id'][0] ?? '';
    $logo = wp_get_attachment_image_src($logo_id);
?>
    <div class="row">

        <div class="col-50">
            <?php if ($logo_id) : ?>
                <button id="btcpw_product_image_button"><img width="100" height="100" alt="Product image" src="<?php echo $logo[0]; ?>" /></button>
                <button class="btcpw_remove_product_image"><?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                <input type="hidden" id="btcpw_product_image_id" name="btcpw_product_image_id" type="text" value="<?php echo esc_attr($logo_id); ?>" />
            <?php else : ?>
                <button id="btcpw_product_image_button"><?php echo esc_html__('Upload', 'btcpaywall'); ?></button>
                <button class="btcpw_remove_product_image" style="display:none"><?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                <input type="hidden" id="btcpw_product_image_id" name="btcpw_product_image_id" type="text" value="<?php echo esc_attr($logo_id); ?>" />
            <?php endif; ?>
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

    wp_nonce_field(basename(__FILE__), 'btcpw_nonce');
    $btcpw_stored_meta = get_post_meta($post->ID);
    $currency = get_option('btcpw_default_pay_per_file_currency', 'SATS');
    $price = $btcpw_stored_meta['btcpw_price'][0] ?? 0;

?>

    <div class='btcpw_price_meta'>
        <input type="number" name="btcpw_price" id="btcpw_price" min="1" value="<?php echo $price; ?>" />
        <input type="text" name="btcpw_currency" id="btcpw_currency" value="<?php echo $currency; ?>" disabled />


    </div>


<?php
}

function render_btcpw_file_upload($post)
{
    $btcpw_stored_meta = get_post_meta($post->ID);

    $file = $btcpw_stored_meta['btcpw_digital_product_file'][0] ?? '';
    $filename = $btcpw_stored_meta['btcpw_digital_product_filename'][0] ?? '';
    $file_id = $btcpw_stored_meta['btcpw_digital_product_id'][0] ?? 0;
?>
    <div class='btcpw_product_file_download'>

        <div id="btcpw_file" class="btcpw_repeatable_product_wrap">
            <div class="btcpw_download_product">
                <input type="hidden" name="btcpw_digital_product_id" id="btcpw_product_id" value="<?php echo $file_id; ?>" />
                <input type="text" placeholder="File name" name="btcpw_digital_product_filename" id="btcpw_product_filename" value="<?php echo $filename; ?>" />
                <input type="text" name="btcpw_digital_product_file" id="btcpw_product_file" value="<?php echo $file; ?>" placeholder="Upload file or enter file url here" />
                <button id="btcpw_digital_download_upload_button">Upload</button>
            </div>

        </div>
    </div>
<?php }




function render_btcpw_product_stats($post)
{
    $download = new BTCPayWall_Digital_Download($post->ID);
?>
    <div class="btcpw_product_stats">
        <p>Sales: <?php echo $download->get_sales(); ?></p>
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

    foreach ($fields as $field) {
        if (('btcpw_product_limit' === $field) || ('btcpw_price' === $field)  || ('btcpw_product_sales' === $field)) {
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
