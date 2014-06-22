<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_RichTextArea' ) ) :

class FM_Demo_RichTextArea {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_RichTextArea;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-richtextarea', array( 'singular' => 'RichTextArea' ) );
		add_action( 'fm_post_demo-richtextarea', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_RichTextArea( false, array( 'name' => 'basic_richtextarea' ) );
		$fm->add_meta_box( 'Basic RichTextArea', 'demo-richtextarea' );

		$fm = new Fieldmanager_RichTextArea( false, array(
			'name'          => 'richtextarea_options',
			'default_value' => '<h1>Some default text</h1>'
		) );
		$fm->add_meta_box( 'RichTextArea with options', 'demo-richtextarea' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_richtextarea',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'collapsible'    => true,
			'label'          => 'Field',
			'children'       => array(
				'richtextarea_field' => new Fieldmanager_RichTextArea( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Repeatable RichTextAreas', 'demo-richtextarea' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'collapsed_repeatable_richtextarea',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'collapsible'    => true,
			'collapsed'      => true,
			'label'          => 'Field',
			'children'       => array(
				'richtextarea_field' => new Fieldmanager_RichTextArea( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Collapsed Repeatable RichTextAreas', 'demo-richtextarea' );

		$fm = new Fieldmanager_RichTextArea( false, array( 'name' => 'sidebar_richtextarea' ) );
		$fm->add_meta_box( 'Sidebar RichTextArea', 'demo-richtextarea', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_richtextarea',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'collapsible'    => true,
			'label'          => 'Field',
			'children'       => array(
				'richtextarea_field' => new Fieldmanager_RichTextArea( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable RichTextAreas', 'demo-richtextarea', 'side' );
	}
}

FM_Demo_RichTextArea::instance();

endif;