<?php if ($id) : ?>
    <div class='btcpw_form_notice'>
        <p>Add the following shortcode where you want to display it: <?php echo $shortcode; ?></p>
    </div>
<?php else : ?>
    <div class='btcpw_form_notice'>
        <p>On this page you can generate shortcode for the form type you've selected. Shortcode will be displayed after you submit data. Click on the arrow bellow if you aren't sure what some fields represent.</p>
        <h4>Find out what fields represent <span><i class="fas fa-arrow-down"></i></span></h4>
    </div>
<?php endif;
