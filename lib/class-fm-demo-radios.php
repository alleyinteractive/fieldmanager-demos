<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Radios' ) ) :

class FM_Demo_Radios {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Radios;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-radio', array( 'singular' => 'Radio' ) );
		add_action( 'fm_post_demo-radio', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Radios( false, array(
			'name'    => 'basic_radios',
			'options' => array( 'One', 'Two', 'Three' )
		) );
		$fm->add_meta_box( 'Basic Radio Field', 'demo-radio' );

		$fm = new Fieldmanager_Radios( false, array(
			'name'          => 'radio_options',
			'default_value' => '2',
			'options' => array( 1 => 'One', 2 => 'Two', 3 => 'Three' )
		) );
		$fm->add_meta_box( 'Radio field with options', 'demo-radio' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_radios',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'radio_field' => new Fieldmanager_Radios( 'Repeatable Field', array(
					'options' => array( 'One', 'Two', 'Three' )
				) )
			)
		) );
		$fm->add_meta_box( 'Repeatable Radio Fields', 'demo-radio' );

		$fm = new Fieldmanager_Radios( false, array(
			'name' => 'sidebar_radios',
			'options' => array( 'One', 'Two', 'Three' )
		) );
		$fm->add_meta_box( 'Sidebar Radio Field', 'demo-radio', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_radios',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'radio_field' => new Fieldmanager_Radios( 'Repeatable Field', array(
					'options' => array( 'One', 'Two', 'Three' )
				) )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable Radio Fields', 'demo-radio', 'side' );
	}
}

FM_Demo_Radios::instance();

endif;