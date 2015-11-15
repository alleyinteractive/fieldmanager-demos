<?php

/*
	Plugin Name: Fieldmanager Demo
	Plugin URI: http://www.alleyinteractive.com/
	Description: This plugin exists to demonstrate the capabilities of Fieldmanager (fieldmanager.org)
	Version: 0.1
	Author: Matthew Boynes
	Author URI: http://www.alleyinteractive.com/
*/
/*  This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function setup_fm_demo() {
	if ( defined( 'FM_VERSION' ) ) {
		$dir = dirname( __FILE__ ) . '/lib/';

		# Supporting code
		require_once( $dir . 'class-fm-demo-data-structures.php' );

		# Field demos
		require_once( $dir . 'class-fm-demo-text.php' );
		require_once( $dir . 'class-fm-demo-textarea.php' );
		require_once( $dir . 'class-fm-demo-richtextarea.php' );
		require_once( $dir . 'class-fm-demo-checkbox.php' );
		require_once( $dir . 'class-fm-demo-radios.php' );
		require_once( $dir . 'class-fm-demo-select.php' );
		require_once( $dir . 'class-fm-demo-media.php' );
		require_once( $dir . 'class-fm-demo-datasource.php' );
		require_once( $dir . 'class-fm-demo-autocomplete.php' );
		require_once( $dir . 'class-fm-demo-grid.php' );
		require_once( $dir . 'class-fm-demo-group.php' );
		require_once( $dir . 'class-fm-demo-misc.php' );

		# Context Demos
		require_once( $dir . 'class-fm-demo-context-term.php' );
		require_once( $dir . 'class-fm-demo-context-quickedit.php' );
		require_once( $dir . 'class-fm-demo-context-user.php' );
		require_once( $dir . 'class-fm-demo-context-submenu.php' );
		require_once( $dir . 'class-fm-demo-context-customizer.php' );
	} else {
		# Add an error message saying, "hey, WTF dude, install FM"
	}
}
add_action( 'after_setup_theme', 'setup_fm_demo' );