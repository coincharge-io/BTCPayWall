<?php
$default_tab = null;
$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

?>
<div class="wrap">

    <nav class="nav-tab-wrapper">
        <a href="?page=btcpw_tipping-settings&tab=tipping-page"
            class="nav-tab <?php if ($tab === null) : ?>nav-tab-active<?php endif; ?>">Tipping Page</a>
        <a href="?page=btcpw_tipping-settings&tab=tipping-box"
            class="nav-tab <?php if ($tab === 'tipping-box') : ?>nav-tab-active<?php endif; ?>">Tipping Box</a>
        <a href="?page=btcpw_tipping-settings&tab=tipping-banner"
            class="nav-tab <?php if ($tab === 'tipping-banner') : ?>nav-tab-active<?php endif; ?>">Tipping Banner</a>
    </nav>

    <div class="tab-content">
        <?php switch ($tab):
            case 'tipping-banner':
                require_once __DIR__ . '/page-tipping-banner.php';
                break;
            case 'tipping-box':
                require_once __DIR__ . '/page-tipping-box.php';
                break;
            default:
                require_once __DIR__ . '/page-tipping-page.php';
                break;
        endswitch; ?>
    </div>
</div>