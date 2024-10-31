<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directl

	if (!defined('WP_UNINSTALL_PLUGIN')) {
    	die;
	}

	if ( current_user_can( 'delete_plugins' ) ) {
		
		$gpdb_option_name = 'gpdb-number';
		delete_option( $gpdb_option_name );
		
	}