<?php

/**
 * Submenu context demo
 */

if ( !class_exists( 'FM_Demo_Context_Submenu' ) ) :

class FM_Demo_Context_Submenu {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Context_Submenu;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		fm_register_submenu_page( 'tools_meta', 'tools.php', 'Meta Fields' );
		add_action( 'fm_submenu_tools_meta', array( $this, 'tools_init' ) );
		fm_register_submenu_page( 'users_meta', 'users.php', 'Meta Boxes' );
		add_action( 'fm_submenu_users_meta', array( $this, 'users_init' ) );
		fm_register_submenu_page( 'options_meta', 'options-general.php', 'Meta Boxes' );
		add_action( 'fm_submenu_options_meta', array( $this, 'options_init' ) );
	}

	public function tools_init() {
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
		$fm->activate_submenu_page();
	}

	public function users_init() {
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
		$fm->activate_submenu_page();
	}

	public function options_init() {
		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_meta_boxes',
			'limit'          => 0,
			'add_more_label' => 'Add another Meta Box',
			'sortable'       => true,
			'label'          => 'Meta Box',
			'children'       => array(
				'repeatable_group' => new Fieldmanager_Group( array(
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
		$fm->activate_submenu_page();

	}
}

FM_Demo_Context_Submenu::instance();

endif;