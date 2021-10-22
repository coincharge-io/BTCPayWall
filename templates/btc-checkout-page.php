<?php


?>
<?php if ($collect_customer_info) : ?>
    <div id="btc__collect_customer_info">
        <p class="btc__collect_customer_name">
            <label for="btc__collect_customer_name">Full name</label>
            <input type="text" id="btc__collect_customer_name" />
        </p>

        <p>
            <label for="btc__collect_customer_address">Address</label>
            <input type="text" id="btc__collect_customer_address" />
        </p>
        <p>
            <label for="btc__collect_customer_phone">Phone</label>
            <input type="tel" id="btc__collect_customer_phone" />
        </p>
        <p>
            <label for="btc__collect_customer_email">Email</label>
            <input type="email" id="btc__collect_customer_email" />
        </p>
        <p>
            <label for="btc__collect_customer_message">Message</label>
            <input type="text" id="btc__collect_customer_message" />
        </p>
    </div>
<?php endif; ?>