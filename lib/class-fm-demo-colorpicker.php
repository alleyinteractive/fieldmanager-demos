<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Colorpicker' ) ) :

class FM_Demo_Colorpicker {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Colorpicker;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-colorpicker', array( 'singular' => 'Colorpicker' ) );
		add_action( 'fm_post_demo-colorpicker', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Colorpicker( array( 'name' => 'basic_colorpicker' ) );
		$fm->add_meta_box( 'Basic Colorpicker', 'demo-colorpicker' );

		$fm = new Fieldmanager_Colorpicker( array(
			'name'           => 'repeating_colorpicker',
			'label'          => 'Select a color',
			'limit'          => 0,
			'add_more_label' => 'Add another colorpicker',
			'sortable'       => true,
		) );
		$fm->add_meta_box( 'Repeating Standalone Colorpicker', 'demo-colorpicker' );

		$fm = new Fieldmanager_Colorpicker( array(
			'name'          => 'text_options',
			'default_value' => '#f00',
		) );
		$fm->add_meta_box( 'Colorpicker with default color (red)', 'demo-colorpicker' );

		$fm = new Fieldmanager_Colorpicker( array(
			'name'              => 'repeatable_colorpicker',
			'limit'             => 0,
			'add_more_label'    => 'Add another colorpicker',
			'add_more_position' => 'top',
			'sortable'          => true,
			'label'             => 'Select a color'
		) );
		$fm->add_meta_box( 'Repeatable Colorpickers with new items at the top', 'demo-colorpicker' );

		$fm = new Fieldmanager_Colorpicker( array( 'name' => 'sidebar_colorpicker' ) );
		$fm->add_meta_box( 'Sidebar Colorpicker', 'demo-colorpicker', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_colorpicker',
			'limit'          => 0,
			'add_more_label' => 'Add another colorpicker',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'colorpicker' => new Fieldmanager_Colorpicker( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable Colorpickers', 'demo-colorpicker', 'side' );
	}
}

FM_Demo_Colorpicker::instance();

endif;
