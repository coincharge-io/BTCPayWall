<?php
global $wpdb;
$id = $_GET['id'];

//$result = $wpdb->get_results('SELECT * FROM wp_btc_forms WHERE id=$id');
$result = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM wp_btc_forms WHERE id=%d", $id),
    ARRAY_A
);
?>
<div class="btcpw_edit_shortcode">
    <?php switch ($result[0]['name']):
        case 'Tipping Banner Wide':
            require_once __DIR__ . '/page-tipping-banner-wide.php';
            break;
        case 'Tipping Banner High':
            require_once __DIR__ . '/page-tipping-banner-high.php';
            break;
        case 'Tipping Box':
            require_once __DIR__ . '/page-tipping-box.php';
            break;
        case 'Tipping Page':
            require_once __DIR__ . '/page-tipping-page.php';
            break;
        default:
            require_once __DIR__ . '/page-tipping-box.php';
            break;
    endswitch; ?>
</div>
</div>