<?php
$designs = array('Box', 'High-Banner', 'Wide-Banner', 'Page');
$selected = $_POST['design'] ?? null;

?>
<div>
    <h1>Add new form</h1>
    <?php if (empty($selected)) : ?>
        <?php include(__DIR__ . '/notices/add-form-notice.php'); ?>
    <?php endif; ?>
    <div class="btcpw_add_form_preview">
        <div>

            <?php if (empty($selected)) : ?>
                <form action="" method="post">
                    <select name="design" id="tipping-form-design" required>
                        <option disabled selected value="">Select design</option>
                        <?php foreach ($designs as $design) : ?>
                            <option value="<?php echo $design; ?>">
                                <?php echo $design; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" id="design-button">Select</button>

                </form>
            <?php endif; ?>
        </div>
        <div id="tipping-form-preview">

            <div id="tipping-box-preview" class="toggle-preview" style="display:none;">
                <?php include_once(__DIR__ . '/page-preview-tipping-box.php'); ?>
            </div>
            <div id="tipping-banner-high-preview" class="toggle-preview" style="display:none;">
                <?php include_once(__DIR__ . '/page-preview-tipping-banner-high.php'); ?>
            </div>
            <div id="tipping-banner-wide-preview" class="toggle-preview" style="display:none;">
                <?php include_once(__DIR__ . '/page-preview-tipping-banner-wide.php'); ?>
            </div>
            <div id="tipping-page-preview" class="toggle-preview" style="display:none;">
                <?php include_once(__DIR__ . '/page-preview-tipping-page.php'); ?>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <?php switch ($selected):
            case 'High-Banner':
                require_once __DIR__ . '/page-tipping-banner-high.php';
                break;
            case 'Wide-Banner':
                require_once __DIR__ . '/page-tipping-banner-wide.php';
                break;
            case 'Box':
                require_once __DIR__ . '/page-tipping-box.php';
                break;
            case 'Page':
                require_once __DIR__ . '/page-tipping-page.php';
                break;
            default:
                break;
        endswitch; ?>
    </div>
</div>