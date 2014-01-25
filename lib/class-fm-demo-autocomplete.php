<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Autocomplete' ) ) :

class FM_Demo_Autocomplete {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Autocomplete;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-autocomplete', array( 'singular' => 'Autocomplete', 'plural' => 'Autocomplete' ) );
		add_action( 'fm_post_demo-autocomplete', array( $this, 'init' ) );
	}

	public function init() {
		$months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

		$fm = new Fieldmanager_Group( array(
			'name'        => 'autocomplete',
			'children'    => array(
				'datasource_post' => new Fieldmanager_Autocomplete( array(
					'label'      => 'Datasource Post',
					'datasource' => new Fieldmanager_Datasource_Post( array(
						'query_args' => array( 'post_type' => 'post' )
					) ),
				) ),
				'datasource_post_edit' => new Fieldmanager_Autocomplete( array(
					'label'          => 'Datasource Post with Edit Link',
					'show_edit_link' => true,
					'description'    => 'You must save the post to see this',
					'datasource'     => new Fieldmanager_Datasource_Post( array(
						'query_args' => array( 'post_type' => 'post' )
					) ),
				) ),
				'datasource_custom' => new Fieldmanager_Autocomplete( array(
					'label'       => 'Custom Datasource, non-ajax',
					'description' => 'Start typing a month of the year',
					'datasource'  => new Fieldmanager_Datasource( array(
						'options' => $months
					) )
				) )
			)
		) );
		$fm->add_meta_box( 'Autocomplete Fields', 'demo-autocomplete' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_autocomplete',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'datasource_post' => new Fieldmanager_Autocomplete( array(
					'label'      => 'Datasource Post',
					'datasource' => new Fieldmanager_Datasource_Post( array(
						'query_args' => array( 'post_type' => 'post' )
					) ),
				) ),
				'datasource_custom' => new Fieldmanager_Autocomplete( array(
					'label'      => 'Enter a month',
					'datasource' => new Fieldmanager_Datasource( array(
						'options' => $months
					) )
				) )
			)
		) );
		$fm->add_meta_box( 'Repeatable Text Fields', 'demo-autocomplete' );

	}
}

FM_Demo_Autocomplete::instance();

endif;