<?php if ($id) : ?>
    <div class='btcpw_form_notice'>
        <p>Add the following shortcode where you want to display it: <?php echo $shortcode; ?></p>
    </div>
<?php else : ?>
    <div class='btcpw_form_notice'>
        <p>On this page you can generate shortcode for the form type you've selected. Shortcode will be displayed after you submit data. Click on the arrow below if you aren't sure what some fields represent.</p>
        <div class="btcpw_expand_notice">
            <h3>Find out what fields represent <span><i class="fas fa-arrow-down"></i></span></h3>
        </div>
        <div class="btcpw_expanded_notice" style="display: none;">
            <h4>Most field names should be self-explanatory. Below you can see the meaning of fields which may cause confusion. </h4>
            <h5>Bear in mind that this list contains attributes for all forms. Don't be confused if any of these fields aren't present within form you've choosen.</h5>
            <div id="btcpw_expanded_notice_split">
                <div>
                    <p>Currency -> Default currency for input field where donor enter amount.
                    </p>
                    <p>Tipping text -> Text which goes above input fields.</p>
                    <p>Link to Thank you page -> Url where donors will be redirected after donation.</p>
                    <p>Free input ->Display free input field which allows donors to enter amount freely. </p>
                    <p>Show icons -> Display icons in front of values you have defined. It\'s necessary to have icons set in first place.</p>
                    <p>Input background -> Background color for input fields related to donation amount. That fields are value1, value2, value3 and free input.</p>
                </div>
                <div>
                    <p>Step1 -> Text for first step in progress bar. Progress bar is only visible if you collect information about donor.</p>
                    <p>Step2 -> Text for second step in progress bar.</p>
                    <p>Active color -> Background color for active step in progress bar. </p>
                    <p>Inactive color -> Background color for inactive step in progress bar.</p>
                    <p>Value*_enabled -> Display corresponding value within Tipping form.</p>
                    <p>Value*_icon -> Set Font Awesome icon next to defined amount. You need to add Font Awesome icon class. For example, you want to add beer icon. On FA website you can see <?php echo esc_html('<i class="fa fa-beer" aria-hidden="true"></i>'); ?>. In order to use this icon you need to copy-paste class values, which is, in this case, fa fa-beer.</p>
                    <p>Display_* -> This field is used for choosing which information you want to collect.</p>
                    <p>Mandatory_* -> This field is used for mandating specific information from donor. Display field needs to be enabled also in order to work.</p>
                </div>
            </div>
        </div>
    </div>
<?php endif;
