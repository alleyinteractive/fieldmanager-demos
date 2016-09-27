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
		add_action( 'fm_post_demo-misc', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_text',
			'description'    => '<hr />Psst... There is also a hidden field in this meta box with a set value. Also, this description has HTML in it.',
			'escape'         => array( // Define custom output escaping. Works on "label" and "description".
				'description' => 'wp_kses_post', // Set that the description should be escaped as HTML.
			),
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
				'display_if_trigger'    => new Fieldmanager_Select( array(
					'label'   => 'Display if',
					'options' => array(
						'hide' => 'Hide next field',
						'show' => 'Display next field',
					),
				) ),
				'display_if_selector'   => new Fieldmanager_TextField( array(
					'label'      => 'This field is displayed if the value of the previous field `display_if_trigger` is "Display next field" ("show")',
					'display_if' => array( // This works on most, but not all field types
						'src'   => 'display_if_trigger', // The name of the field which triggers the hide/show. Must be in the same set of children.
						'value' => 'show', // The value which determines if this field should be shown
					),
				) ),
			),
		) );
		$fm->add_meta_box( 'Miscellaneous Fields', 'demo-misc' );
	}
}

FM_Demo_Misc::instance();

endif;