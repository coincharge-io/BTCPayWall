<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$id = sanitize_text_field($_GET['id']);
$form = new BTCPayWall_Tipping_Form($id);
$result = json_decode(json_encode($form), true);
?>
<div class="btcpw_edit_shortcode">
    <?php switch ($result['name']):
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