<?php

/**
 *
 */

if ( !class_exists( 'FM_Demo_Grid' ) ) :

class FM_Demo_Grid {

	private static $instance;

	private function __construct() {
		/* Don't do anything, needs to be initialized via instance() method */
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new FM_Demo_Grid;
			self::$instance->setup();
		}
		return self::$instance;
	}

	public function setup() {
		FM_Demo_Data_Structures()->add_post_type( 'demo-grid', array( 'singular' => 'Grid' ) );
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$fm = new Fieldmanager_Grid( array( 'name' => 'grid' ) );
		$fm->add_meta_box( 'Basic Grid', 'demo-grid' );

		$fm = new Fieldmanager_Grid( array( 'name' => 'sidebar_grid' ) );
		$fm->add_meta_box( 'Basic Sidebar Grid', 'demo-grid', 'side' );

		$fm = new Fieldmanager_Grid( array(
			'name' => 'grid_options',
			'js_options' => array(
				'startRows'    => 20,
				'startCols'    => 20,
				'colHeaders'   => true,
				'rowHeaders'   => true,
				'minSpareCols' => 1,
				'minSpareRows' => 1,
				'contextMenu'  => true,
			),
		) );
		$fm->add_meta_box( 'Grid with Options', 'demo-grid' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_grid',
			'limit'          => 0,
			'add_more_label' => 'Add another grid',
			'sortable'       => true,
			'label'          => 'Grid',
			'children'       => array(
				'grid' => new Fieldmanager_Grid( array(
					'js_options' => array(
						'startRows'    => 20,
						'startCols'    => 20,
						'colHeaders'   => true,
						'rowHeaders'   => true,
						'minSpareCols' => 1,
						'minSpareRows' => 1,
						'contextMenu'  => true,
					)
				) )
			)
		) );
		$fm->add_meta_box( 'Repeatable Grids', 'demo-grid' );

		$fm = new Fieldmanager_Group( array(
			'name'           => 'repeatable_sidebar_grid',
			'limit'          => 0,
			'add_more_label' => 'Add another grid',
			'sortable'       => true,
			'collapsible'    => true,
			'label'          => 'Grid',
			'children'       => array(
				'grid' => new Fieldmanager_Grid()
			)
		) );
		$fm->add_meta_box( 'Repeatable Sidebar Grids', 'demo-grid' );

		// $fm = new Fieldmanager_Textfield( false, array( 'name' => 'sidebar_text' ) );
		// $fm->add_meta_box( 'Sidebar Text Field', 'demo-grid', 'side' );

		// $fm = new Fieldmanager_Group( array(
		// 	'name'           => 'sidebar_repeatable_text',
		// 	'limit'          => 0,
		// 	'add_more_label' => 'Add another field',
		// 	'sortable'       => true,
		// 	'label'          => 'Field',
		// 	'children'       => array(
		// 		'text_field' => new Fieldmanager_Textfield( 'Repeatable Field' )
		// 	)
		// ) );
		// $fm->add_meta_box( 'Sidebar Repeatable Text Fields', 'demo-grid', 'side' );
	}
}

FM_Demo_Grid::instance();

endif;