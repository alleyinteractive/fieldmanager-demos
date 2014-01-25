<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Datasource' ) ) :

class FM_Demo_Datasource {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Datasource;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-datasource', array( 'singular' => 'Datasource', 'plural' => 'Datasource' ) );
		add_action( 'fm_post_demo-datasource', array( $this, 'init' ) );
	}

	public function init() {
		$datasource_post = new Fieldmanager_Datasource_Post( array(
			'query_args' => array( 'post_type' => 'post' ),
			'use_ajax' => false
		) );
		$fm = new Fieldmanager_Group( array(
			'name'        => 'datasource_post',
			'children'    => array(
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => $datasource_post ) ),
				'ajax'         => new Fieldmanager_Autocomplete( array(
					'label' => 'Autocomplete with ajax',
					'datasource' => new Fieldmanager_Datasource_Post( array(
						'query_args' => array( 'post_type' => 'post' )
					) )
				) ),
				'select'       => new Fieldmanager_Select( 'Select', array( 'datasource' => $datasource_post ) ),
				'radio'        => new Fieldmanager_Radios( 'Radio', array( 'datasource' => $datasource_post ) ),
				'checkboxes'   => new Fieldmanager_Checkboxes( 'Checkboxes', array( 'datasource' => $datasource_post ) ),
			)
		) );
		$fm->add_meta_box( 'Post Datasource', 'demo-datasource' );

		$datasource_term = new Fieldmanager_Datasource_Term( array(
			'taxonomy' => 'category',
			'taxonomy_save_to_terms' => false,
			'use_ajax' => false
		) );
		$fm = new Fieldmanager_Group( array(
			'name'        => 'datasource_term',
			'children'    => array(
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => $datasource_term ) ),
				'ajax'         => new Fieldmanager_Autocomplete( array(
					'label' => 'Autocomplete with ajax',
					'datasource' => new Fieldmanager_Datasource_Term( array(
						'taxonomy' => 'category',
						'taxonomy_save_to_terms' => false
					) )
				) ),
				'select'       => new Fieldmanager_Select( 'Select', array( 'datasource' => $datasource_term ) ),
				'radio'        => new Fieldmanager_Radios( 'Radio', array( 'datasource' => $datasource_term ) ),
				'checkboxes'   => new Fieldmanager_Checkboxes( 'Checkboxes', array( 'datasource' => $datasource_term ) ),
			)
		) );
		$fm->add_meta_box( 'Term Datasource', 'demo-datasource' );

		$datasource_user = new Fieldmanager_Datasource_User( array( 'use_ajax' => false ) );
		$fm = new Fieldmanager_Group( array(
			'name'        => 'datasource_user',
			'children'    => array(
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => $datasource_user, 'description' => 'Search users by email address, URL, ID or username (this does not currently include display name)' ) ),
				'ajax'         => new Fieldmanager_Autocomplete( array(
					'label' => 'Autocomplete with ajax',
					'datasource' => new Fieldmanager_Datasource_User()
				) ),
				'select'       => new Fieldmanager_Select( 'Select', array( 'datasource' => $datasource_user ) ),
				'radio'        => new Fieldmanager_Radios( 'Radio', array( 'datasource' => $datasource_user ) ),
				'checkboxes'   => new Fieldmanager_Checkboxes( 'Checkboxes', array( 'datasource' => $datasource_user ) ),
			)
		) );
		$fm->add_meta_box( 'User Datasource', 'demo-datasource' );

		$datasource_custom = new Fieldmanager_Datasource( array(
			'options' => array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' )
		) );
		$fm = new Fieldmanager_Group( array(
			'name'        => 'datasource_custom',
			'children'    => array(
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => $datasource_custom ) ),
				'ajax'         => new Fieldmanager_Autocomplete( array(
					'label' => 'Autocomplete with ajax',
					'datasource' => new Fieldmanager_Datasource( array(
						'options' => array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ),
						'use_ajax' => true
					) )
				) ),
				'select'       => new Fieldmanager_Select( 'Select', array( 'datasource' => $datasource_custom ) ),
				'radio'        => new Fieldmanager_Radios( 'Radio', array( 'datasource' => $datasource_custom ) ),
				'checkboxes'   => new Fieldmanager_Checkboxes( 'Checkboxes', array( 'datasource' => $datasource_custom ) ),
			)
		) );
		$fm->add_meta_box( 'Custom Datasource', 'demo-datasource' );
	}
}

FM_Demo_Datasource::instance();

endif;