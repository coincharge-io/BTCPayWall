<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function render_tipping_list()
{
	require_once __DIR__ . '/class-donation-list.php';

	$table = new Donation_Forms_Table();

?>
	<div class="wrap">
		<h2>All forms</h2>

		<div>
			<div>
				<div>
					<div>
						<form method="post">
							<?php
							$table->prepare_items();
							$table->display(); ?>
						</form>
					</div>
				</div>
			</div>
			<br class="clear">
		</div>
	</div>
<?php

}
