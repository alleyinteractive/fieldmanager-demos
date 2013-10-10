<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Checkbox' ) ) :

class FM_Demo_Checkbox {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Checkbox;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-checkbox', array( 'singular' => 'Checkbox', 'plural' => 'Checkboxes' ) );
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Checkbox( 'Basic Checkbox', array( 'name' => 'basic_checkbox' ) );
		$fm->add_meta_box( 'Basic Checkbox Field', 'demo-checkbox' );

		$fm = new Fieldmanager_Checkbox( 'Checked Checkbox', array(
			'name'          => 'checkbox_options',
			'default_value' => 'checked'
		) );
		$fm->add_meta_box( 'Checkbox field with options', 'demo-checkbox' );

		$fm = new Fieldmanager_Checkboxes( 'Checkboxes', array(
			'name'          => 'checkbox_group',
			'options' => array( 'One', 'Two', 'Three' )
		) );
		$fm->add_meta_box( 'Group of Checkboxes', 'demo-checkbox' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_checkbox',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'checkbox_field' => new Fieldmanager_Checkbox( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Repeatable Checkbox Fields', 'demo-checkbox' );

		$fm = new Fieldmanager_Checkbox( 'Basic Checkbox', array( 'name' => 'sidebar_checkbox' ) );
		$fm->add_meta_box( 'Sidebar Checkbox Field', 'demo-checkbox', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_checkbox',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'checkbox_field' => new Fieldmanager_Checkbox( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable Checkbox Fields', 'demo-checkbox', 'side' );
	}
}

FM_Demo_Checkbox::instance();

endif;