<?php
$designs = array('Box', 'High-Banner', 'Wide-Banner', 'Page');
$selected = $_POST['design'] ?? null;
?>
<div>
    <div>
        <h1>Add new form</h1>
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
            <?php endif; ?>
            </form>
    </div>
    <div id="tipping-form-preview">

    </div>
    <div class="tab-content">
        <?php switch ($selected):
            case 'High-Banner':
            case 'Wide-Banner':
                require_once __DIR__ . '/page-tipping-banner.php';
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