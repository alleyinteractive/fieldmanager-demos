<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Misc' ) ) :

class FM_Demo_Misc {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Misc;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-misc', array( 'singular' => 'Miscellany', 'plural' => 'Miscellanies' ) );
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_text',
			'description'    => '<hr />Psst... There is also a hidden field in this meta box with a set value.',
			'children'       => array(
				'password_field'        => new Fieldmanager_Password( 'Password Field' ),
				'hidden_field'          => new Fieldmanager_Hidden( 'Hidden Field', array( 'default_value' => 'Fieldmanager was here' ) ),
				'link_field'            => new Fieldmanager_Link( 'Link Field', array( 'description' => 'This is a text field that sanitizes the value as a URL' ) ),
				'date_field'            => new Fieldmanager_Datepicker( 'Datepicker Field' ),
				'date_customized_field' => new Fieldmanager_Datepicker( array(
					'label'       => 'Datepicker Field with Options',
					'date_format' => 'Y-m-d',
					'use_time'    => true,
					'js_opts'     => array(
						'dateFormat'  => 'yy-mm-dd',
						'changeMonth' => true,
						'changeYear'  => true,
						'minDate'     => '2010-01-01',
						'maxDate'     => '2015-12-31'
					)
				) ),
			)
		) );
		$fm->add_meta_box( 'Miscellaneous Fields', 'demo-misc' );
	}
}

FM_Demo_Misc::instance();

endif;