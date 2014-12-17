<?php

/**
 * Submenu context demo
 */

if ( !class_exists( 'FM_Demo_Context_Submenu' ) ) :

class FM_Demo_Context_Submenu {
	public $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

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
		// When registering a submenu page, the field name is the cable that
		// connects everything. In this case, 'meta_fields' needs to appear as
		// the first arg passed to `fm_register_submenu_page()`, it needs to be
		// in the action (prefixed with `fm_submenu_`), and then it needs to be
		// the field's name.
		fm_register_submenu_page( 'meta_fields', 'tools.php', 'Meta Fields' );
		add_action( 'fm_submenu_meta_fields', array( $this, 'tools_init' ) );

		fm_register_submenu_page( 'user_fields', 'users.php', 'Meta Boxes' );
		add_action( 'fm_submenu_user_fields', array( $this, 'users_init' ) );

		fm_register_submenu_page( 'option_fields', 'options-general.php', 'Meta Boxes' );
		add_action( 'fm_submenu_option_fields', array( $this, 'options_init' ) );

		add_action( 'init', array( $this, 'init' ) );
	}

	public function tools_init() {

		$fm = new Fieldmanager_Group( array(
			'name'     => 'meta_fields', // This name must match what we registered in `fm_register_submenu_page()`
			'children' => array(
				'text'         => new Fieldmanager_Textfield( 'Text Field' ),
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
				'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $this->months ) ) ) ),
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
			'name'           => 'user_fields',
			'limit'          => 0,
			'add_more_label' => 'Add another set of fields',
			'sortable'       => true,
			'label'          => 'Fields',
			'children'       => array(
				'text'         => new Fieldmanager_Textfield( 'Text Field' ),
				'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
				'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $this->months ) ) ) ),
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
			'name'           => 'option_fields',
			'limit'          => 0,
			'add_more_label' => 'Add another Meta Box',
			'sortable'       => true,
			'collapsible'    => true,
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
						'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $this->months ) ) ) ),
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