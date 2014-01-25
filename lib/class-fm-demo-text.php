<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Text' ) ) :

class FM_Demo_Text {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Text;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-text', array( 'singular' => 'Text Field' ) );
		add_action( 'fm_post_demo-text', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Textfield( false, array( 'name' => 'basic_text' ) );
		$fm->add_meta_box( 'Basic Text Field', 'demo-text' );

		$fm = new Fieldmanager_Textfield( false, array(
			'name'          => 'text_options',
			'default_value' => 'Some default text',
			'attributes'    => array( 'style' => 'width:100%' )
		) );
		$fm->add_meta_box( 'Text field with options', 'demo-text' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_text',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'text_field' => new Fieldmanager_Textfield( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Repeatable Text Fields', 'demo-text' );

		$fm = new Fieldmanager_Textfield( false, array( 'name' => 'sidebar_text' ) );
		$fm->add_meta_box( 'Sidebar Text Field', 'demo-text', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_text',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'text_field' => new Fieldmanager_Textfield( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable Text Fields', 'demo-text', 'side' );
	}
}

FM_Demo_Text::instance();

endif;