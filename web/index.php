<?php
require_once('page_setup.php');
$title = 'Vehicle Search';
$javascripts = array('jquery.form', 'other_searches');
include('page_header.php');
include('car_search.php');
?>



			<div id="middle_pane_container">
				<div id="place_holder" style="text-align:center">
					<h1>Welcome to Billy Joe's <br>Car Dealership</h1>
					<i>Start Your Next Car Search here</i>
				</div><!--end palce holder-->
			</div><!--end middle_pane_container-->

			<? if (check_login()): ?>
			<div class="right_pane_container">
				<? include('other_searches.php') ?>
			</div> <!--end_right_pane_container-->
			<? endif ?>

		</div><!--main_body_container-->
		<?php include('page_footer.php'); ?>

    </div><!--end page_container-->

</body>

</html>
