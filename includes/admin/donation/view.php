<?php

public function render_tipping_list()
	{
		require_once __DIR__ . '/classes/class-donation-list.php';
		$table = new Donation_List_Table();


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