<?php
$designs = array('Box', 'High Banner', 'Wide Banner', 'Page');
?>
<div>
    <div>
        <h1>Add new form</h1>
        <label>Designs</label>
        <select id="tipping-form-design" required>
            <option disabled selected value="">Select design</option>
            <?php foreach ($designs as $design) : ?>
                <option value="<?php echo $design; ?>">
                    <?php echo $design; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div id="tipping-form-preview">

    </div>
</div>