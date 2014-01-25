<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Context_Quickedit' ) ) :

class FM_Demo_Context_Quickedit {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Context_Quickedit;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		add_action( 'fm_quickedit_post', array( $this, 'init' ) );
	}

	public function init() {

		$fm = new Fieldmanager_Group( array(
			'name'     => 'meta_fields',
			'children' => array(
				'text'     => new Fieldmanager_Textfield( 'Text Field' ),
				'text2'     => new Fieldmanager_Select( 'Dropdown', array( 'options' => array( 'first', 'second', 'third', 'fourth', ) ) ),
			)
		) );
		$fm->add_quickedit_box( 'Custom Text Field', 'post', function( $post_id, $data ) {
			return $data['text'] ?: 'not set';
		}, 'Custom Column Column' );

	}
}

FM_Demo_Context_Quickedit::instance();

endif;