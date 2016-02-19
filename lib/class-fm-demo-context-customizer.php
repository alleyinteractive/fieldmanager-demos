<?php
/**
 * Class file for FM_Demo_Context_Customizer.
 */

if ( ! class_exists( 'FM_Demo_Context_Customizer' ) ) :

	/**
	 * Customizer context demo.
	 */
	class FM_Demo_Context_Customizer {
		public $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

		private static $instance;

		private function __construct() {
			/* Don't do anything, needs to be initialized via instance() method */
		}

		public static function instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new FM_Demo_Context_Customizer;
				self::$instance->setup();
			}
			return self::$instance;
		}

		public function setup() {
			add_action( 'fm_customizer', array( $this, 'customizer_init' ) );
		}

		public function customizer_init() {
			$fm = new Fieldmanager_Textfield( array( 'name' => 'basic_text' ) );
			$fm->add_customizer_section( 'Fieldmanager Text Field' );

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
						'label_macro'    => array( 'Macro: %s', 'text' ),
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
			$fm->add_customizer_section( array(
				'section_args' => array(
					'capability'     => 'edit_posts',
					'description'    => 'A Fieldmanager demo section',
					'priority'       => 10,
					'title'          => 'Fieldmanager Repeatable Meta Fields',
				),
				'setting_args' => array(
					'type' => 'theme_mod',
				),
			) );

			$fm = new Fieldmanager_Group( array(
				'name'           => 'repeatable_text',
				'description'    => 'Psst... There is also a hidden field in this meta box with a set value.',
				'children'       => array(
					'password_field'        => new Fieldmanager_Password( 'Password Field' ),
					'hidden_field'          => new Fieldmanager_Hidden( 'Hidden Field', array( 'default_value' => 'Fieldmanager was here' ) ),
					'link_field'            => new Fieldmanager_Link( 'Link Field', array( 'description' => 'This is a text field that sanitizes the value as a URL' ) ),
					'date_field'            => new Fieldmanager_Datepicker( 'Datepicker Field' ),
					'color_field'           => new Fieldmanager_Colorpicker( 'Colorpicker Field' ),
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
			$fm->add_customizer_section( 'Fieldmanager Miscellaneous Fields' );
		}
	}

	FM_Demo_Context_Customizer::instance();

endif;
