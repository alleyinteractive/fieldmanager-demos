<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_TextArea' ) ) :

class FM_Demo_TextArea {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_TextArea;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-textarea', array( 'singular' => 'TextArea' ) );
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_TextArea( false, array( 'name' => 'basic_textarea' ) );
		$fm->add_meta_box( 'Basic TextArea Field', 'demo-textarea' );

		$fm = new Fieldmanager_TextArea( false, array(
			'name'          => 'textarea_options',
			'default_value' => 'Some default text',
			'attributes'    => array( 'style' => 'width:100%' )
		) );
		$fm->add_meta_box( 'TextArea field with options', 'demo-textarea' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_textarea',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'textarea_field' => new Fieldmanager_TextArea( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Repeatable TextArea Fields', 'demo-textarea' );

		$fm = new Fieldmanager_TextArea( false, array( 'name' => 'sidebar_textarea' ) );
		$fm->add_meta_box( 'Sidebar TextArea Field', 'demo-textarea', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_textarea',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'textarea_field' => new Fieldmanager_TextArea( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable TextArea Fields', 'demo-textarea', 'side' );
	}
}

FM_Demo_TextArea::instance();

endif;