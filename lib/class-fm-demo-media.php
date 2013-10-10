<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Media' ) ) :

class FM_Demo_Media {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Media;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-media', array( 'singular' => 'Media Field' ) );
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Media( false, array( 'name' => 'basic_media' ) );
		$fm->add_meta_box( 'Basic Media Field', 'demo-media' );

		$fm = new Fieldmanager_Media( false, array(
			'name'               => 'media_options',
			'description'        => 'This field has four customizations: the button text above, the modal title, modal button label, and the preview image size',
			'preview_size'       => 'medium',
			'label'              => 'Modified Media Popup',
			'button_label'       => 'Modified Button Label',
			'modal_button_label' => 'Modified Modal Button',
			'modal_title'        => 'Modified Modal Title'
		) );
		$fm->add_meta_box( 'Media field with options', 'demo-media' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_media',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'media_field' => new Fieldmanager_Media( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Repeatable Media Fields', 'demo-media' );

		$fm = new Fieldmanager_Media( false, array( 'name' => 'sidebar_media' ) );
		$fm->add_meta_box( 'Sidebar Media Field', 'demo-media', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_media',
			'limit'          => 0,
			'add_more_label' => 'Add another field',
			'sortable'       => true,
			'label'          => 'Field',
			'children'       => array(
				'media_field' => new Fieldmanager_Media( 'Repeatable Field' )
			)
		) );
		$fm->add_meta_box( 'Sidebar Repeatable Media Fields', 'demo-media', 'side' );
	}
}

FM_Demo_Media::instance();

endif;