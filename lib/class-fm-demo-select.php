<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Select' ) ) :

class FM_Demo_Select {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Select;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-select', array( 'singular' => 'Select Field' ) );
		add_action( 'fm_post_demo-select', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Select( 'Basic Select', array(
			'name'    => 'basic_select',
			'options' => array( 'One', 'Two', 'Three' )
		) );
		$fm->add_meta_box( 'Basic Select Field', 'demo-select' );

		$fm = new Fieldmanager_Group( array(
			'name' => 'select_assorted',
			'children' => array(
				'first_empty' => new Fieldmanager_Select( array(
					'label'         => 'First Empty',
					'first_empty'   => true,
					'options'       => array( 1 => 'One', 2 => 'Two', 3 => 'Three' ),
					'attributes'    => array( 'style' => 'width:150px' )
				) ),
				'first_instruct' => new Fieldmanager_Select( array(
					'label'         => 'First Instruction',
					'options'       => array( '' => 'Choose one', 1 => 'One', 2 => 'Two', 3 => 'Three' ),
					'attributes'    => array( 'style' => 'width:150px' )
				) ),
				'default_set' => new Fieldmanager_Select( array(
					'label'         => 'Default Set',
					'default_value' => '2',
					'options'       => array( 1 => 'One', 2 => 'Two', 3 => 'Three' ),
					'attributes'    => array( 'style' => 'width:150px' )
				) ),
				'multiple' => new Fieldmanager_Select( array(
					'label'         => 'Multiple Select',
					'options'       => array( 1 => 'One', 2 => 'Two', 3 => 'Three' ),
					'attributes'    => array( 'multiple' => 'mutliple', 'style' => 'width:150px' )
				) ),
			)
		) );
		$fm->add_meta_box( 'Select Fields with Assorted Options', 'demo-select' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_select',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'select_field' => new Fieldmanager_Select( 'Repeatable Field', array( 'options' => array( 'One', 'Two', 'Three' ) ) )
			)
		) );
		$fm->add_meta_box( 'Repeatable Select Fields', 'demo-select' );

		$fm = new Fieldmanager_Select( 'Basic Select', array(
			'name'    => 'sidebar_select',
			'options' => array( 'One', 'Two', 'Three' )
		) );
		$fm->add_meta_box( 'Sidebar Select Field', 'demo-select', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_select',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'select_field' => new Fieldmanager_Select( 'Repeatable Field', array( 'options' => array( 'One', 'Two', 'Three' ) ) )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable Select Fields', 'demo-select', 'side' );
	}
}

FM_Demo_Select::instance();

endif;