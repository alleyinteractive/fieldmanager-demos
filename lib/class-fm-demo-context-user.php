<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Context_User' ) ) :

class FM_Demo_Context_User {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Context_User;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

		$fm = new Fieldmanager_Group( array(
			'name'     => 'meta_fields',
			'children' => array(
				'text'         => new Fieldmanager_Textfield( 'Text Field' ),
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
				'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $months ) ) ) ),
				'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
				'media'        => new Fieldmanager_Media( 'Media File' ),
				'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
				'radios'       => new Fieldmanager_Radios( 'Radio Buttons', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
				'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
				'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' ),
			)
		) );
		$fm->add_user_form( 'Meta Fields' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_meta_fields',
			'limit'          => 0,
			'add_more_label' => 'Add another set of fields',
			'sortable'       => true,
			'label'          => 'Fields',
			'children'       => array(
				'text'         => new Fieldmanager_Textfield( 'Text Field' ),
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
				'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $months ) ) ) ),
				'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
				'media'        => new Fieldmanager_Media( 'Media File' ),
				'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
				'radios'       => new Fieldmanager_Radios( 'Radio Buttons', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
				'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
				'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' ),
			)
		) );
		$fm->add_user_form( 'Meta Boxes' );


		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_meta_boxes',
			'limit'          => 0,
			'add_more_label' => 'Add another Meta Box',
			'sortable'       => true,
			'label'          => 'Meta Box',
			'children'       => array(
				'repeatable_group' => new Fieldmanager_Group( array(
					'name'           => 'repeatable_meta_fields',
					'limit'          => 0,
					'add_more_label' => 'Add another set of fields',
					'sortable'       => true,
					'label'          => 'Fields',
					'children'       => array(
						'text'         => new Fieldmanager_Textfield( 'Text Field' ),
						'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
						'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $months ) ) ) ),
						'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
						'media'        => new Fieldmanager_Media( 'Media File' ),
						'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
						'radios'       => new Fieldmanager_Radios( 'Radio Buttons', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
						'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
						'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' )
					)
				) )
			)
		) );
		$fm->add_user_form( 'Meta Boxes of Met aBoxes' );

	}
}

FM_Demo_Context_User::instance();

endif;