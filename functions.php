<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directl

	function gpdbSaveNumber( $number ) {
	    $message = null;
	    $type = null;
	 
	    if ( null != $number && '' != $number ) {
	 
	        if ( false === get_option( 'gpdb-number' ) ) {
	 
	            add_option( 'gpdb-number', $number );
	            $type = 'updated';
	            $message = __( 'Updated', 'gpdb' );
	            $custom_message = __( '<p class="gpdb-success"><b>Great!</b> Please use the shortcode <b>[gpbadge]</b> in your posts, pages and widgets to show the badge.</p>', 'gpdb' );
	 
	        } else {

	            update_option( 'gpdb-number', $number );
	            $type = 'updated';
	            $message = __( 'Updated', 'gpdb' );
	            $custom_message = __( '<p class="gpdb-success"><b>Great!</b> Please use the shortcode <b>[gpbadge]</b> in your posts, pages and widgets to show the badge.</p>', 'gpdb' );

	        }
	 
	    } else {

	        $type = 'error';
	        $message = __( 'Error!', 'gpdb' );
	        $custom_message = __( '<p class="gpdb-error">Missing Value!</p>', 'gpdb' );

	    }
	 
	    add_settings_error(
	        'gpdb_addingNumber',
	        esc_attr( 'gpdb_adding-number' ),
	        $message,
	        $type
	    );
	    return $custom_message;
	}