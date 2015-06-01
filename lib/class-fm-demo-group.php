<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Group' ) ) :

class FM_Demo_Group {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Group;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-group', array( 'singular' => 'Group' ) );
		add_action( 'fm_post_demo-group', array( $this, 'init' ) );
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
		$fm->add_meta_box( 'Single-Level Group', 'demo-group' );

		$fm = new Fieldmanager_Group( array(
			'name'     => 'tabbed_meta_fields',
			'tabbed'   => true,
			'children' => array(
				'tab-1' => new Fieldmanager_Group( array(
					'label' => 'Tab One',
					'children' => array(
						'text'         => new Fieldmanager_Textfield( 'Text Field' ),
						'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
						'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $months ) ) ) ),
					)
				) ),
				'tab-2' => new Fieldmanager_Group( array(
					'label' => 'Tab Two',
					'children' => array(
						'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
						'media'        => new Fieldmanager_Media( 'Media File' ),
					)
				) ),
				'tab-3' => new Fieldmanager_Group( array(
					'label' => 'Tab Three',
					'children' => array(
						'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
						'radios'       => new Fieldmanager_Radios( 'Radio Buttons', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
						'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
					)
				) ),
				'tab-4' => new Fieldmanager_Group( array(
					'label' => 'Tab Four',
					'children' => array(
						'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' ),
					)
				) )
			)
		) );
		$fm->add_meta_box( 'Tabbed Group', 'demo-group' );

		$fm = new Fieldmanager_Group( array(
			'name'     => 'vertical_tabbed_meta_fields',
			'tabbed'   => 'vertical',
			'children' => array(
				'tab-1' => new Fieldmanager_Group( array(
					'label' => 'Tab One',
					'children' => array(
						'text'         => new Fieldmanager_Textfield( 'Text Field' ),
						'autocomplete' => new Fieldmanager_Autocomplete( 'Autocomplete', array( 'datasource' => new Fieldmanager_Datasource_Post() ) ),
						'local_data'   => new Fieldmanager_Autocomplete( 'Autocomplete without ajax', array( 'datasource' => new Fieldmanager_Datasource( array( 'options' => $months ) ) ) ),
					)
				) ),
				'tab-2' => new Fieldmanager_Group( array(
					'label' => 'Tab Two',
					'children' => array(
						'textarea'     => new Fieldmanager_TextArea( 'TextArea' ),
						'media'        => new Fieldmanager_Media( 'Media File' ),
					)
				) ),
				'tab-3' => new Fieldmanager_Group( array(
					'label' => 'Tab Three',
					'children' => array(
						'checkbox'     => new Fieldmanager_Checkbox( 'Checkbox' ),
						'radios'       => new Fieldmanager_Radios( 'Radio Buttons', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
						'select'       => new Fieldmanager_Select( 'Select Dropdown', array( 'options' => array( 'One', 'Two', 'Three' ) ) ),
					)
				) ),
				'tab-4' => new Fieldmanager_Group( array(
					'label' => 'Tab Four',
					'children' => array(
						'richtextarea' => new Fieldmanager_RichTextArea( 'Rich Text Area' ),
					)
				) )
			)
		) );
		$fm->add_meta_box( 'Vertical Tabbed Group', 'demo-group' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_meta_fields',
			'limit'          => 0,
			'add_more_label' => 'Add another set of fields',
			'sortable'       => true,
			'collapsible'    => true,
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
		$fm->add_meta_box( 'Two-Level Group', 'demo-group' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_meta_boxes',
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
					'collapsible'    => true,
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
		$fm->add_meta_box( 'Three-Level Group', 'demo-group' );

		$fm = new Fieldmanager_Group( array(
			'name'     => 'sidebar_meta_fields',
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
		$fm->add_meta_box( 'Sidebar Single-Level Group', 'demo-group', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_meta_fields',
			'limit'          => 0,
			'add_more_label' => 'Add another set of fields',
			'sortable'       => true,
			'collapsible'    => true,
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
		$fm->add_meta_box( 'Sidebar Two-Level Group', 'demo-group', 'side' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'sidebar_repeatable_meta_boxes',
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
					'collapsible'    => true,
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
		$fm->add_meta_box( 'Sidebar Three-Level Group', 'demo-group', 'side' );
	}
}

FM_Demo_Group::instance();

endif;