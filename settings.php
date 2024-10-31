<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directl

	include_once ("functions.php");

	if ( ! empty( $_POST ) ) {
		
		if ( current_user_can( 'manage_options' ) && check_admin_referer( 'gpdb_add_number', '_wpnonce' ) ) {
			
			$save_data = sanitize_text_field( $_POST['gpdb-number'] );
			$result = gpdbSaveNumber( $save_data );	

		}

	}
	
	settings_errors();
?>

<h1><?php echo GPDB_PLUGIN_NAME; ?></h1>
<div class="gpdb-settings-page">
	
	<p>Hi, In order to add your Google Partner dynamic badge, you should enter your Google Partner ID. This ID can be found in <a href="https://www.google.co.il/partners/" target="_blank">Google Partners site</a>. Once logged-in, Click the "Partner Status" menu on the left, and then click the "Get The Badge" link. Then, you'll see an 8-10 digits code. That's the code you should insert below.</p>

	<form method="post" action="">
		
		<label for="gpdb-number">Please insert your Google Partner ID</label>	
		<input id="gpdb-number" type="text" value="<?php echo get_option( 'gpdb-number' ); ?>" name="gpdb-number" />

		<?php wp_nonce_field( 'gpdb_add_number', '_wpnonce' ); ?>
		
		<p class="gpdb-submit-btn"><input type="submit" value="Save" class="button-primary"></p>
		
		<?php echo $result ?>

	</form>

	<hr />
	<p>Another awesome community service by <a target="_blank" href="http://www.quickwin.co.il">Quickwin Ltd.</a></p>

</div>