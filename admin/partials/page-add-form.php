<?php
$designs = array('Box', 'High Banner', 'Wide Banner', 'Page');
?>

<h1>Add new form</h1>
<select required>
    <option disabled value="">Select design</option>
    <?php foreach ($designs as $design) : ?>
        <option value="<?php echo $design; ?>">
            <?php echo $design; ?>
        </option>
    <?php endforeach; ?>
</select>