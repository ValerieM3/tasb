<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'lifestyle', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'lifestyle' ) );


//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Lifestyle Pro Theme', 'lifestyle' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/lifestyle/' );
define( 'CHILD_THEME_VERSION', '3.1' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'lifestyle_load_scripts' );
function lifestyle_load_scripts() {

	wp_enqueue_script( 'lifestyle-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700', array(), CHILD_THEME_VERSION );

	/**
	 * Select-or-Die
	 * Dropdown menu replacement (for <select> / <option> menus)
	 * http://vst.mn/selectordie/
	 *
	 */
	wp_enqueue_script( 'select-or-die-script', get_bloginfo( 'stylesheet_directory' ) . '/vendor/selectordie/selectordie.min.js', array( 'jquery' ), '0.1.8' );
	wp_enqueue_style( 'select-or-die-styles', get_bloginfo( 'stylesheet_directory' ) . '/vendor/selectordie/selectordie.css', array(), '0.1.8' );
	wp_enqueue_script( 'mammouth-scripts', get_bloginfo( 'stylesheet_directory' ) . '/js/mammouth-scripts.js', array(
		'jquery',
		'select-or-die-script'
	), '0.1.8' );

}

//* Add new image sizes
add_image_size( 'home-large', 634, 360, true );
add_image_size( 'home-small', 266, 160, true );

//* Add support for custom background
add_theme_support( 'custom-background', array(
	'default-image' => get_stylesheet_directory_uri() . '/images/bg.png',
	'default-color' => 'efefe9',
) );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'header_image'    => '',
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'height'          => 210,
	'width'           => 1033,
) );

//* Add support for additional color style options
add_theme_support( 'genesis-style-selector', array(
	'lifestyle-pro-blue'    => __( 'Lifestyle Pro Blue', 'lifestyle' ),
	'lifestyle-pro-green'   => __( 'Lifestyle Pro Green', 'lifestyle' ),
	'lifestyle-pro-mustard' => __( 'Lifestyle Pro Mustard', 'lifestyle' ),
	'lifestyle-pro-purple'  => __( 'Lifestyle Pro Purple', 'lifestyle' ),
	'lifestyle-pro-red'     => __( 'Lifestyle Pro Red', 'lifestyle' ),
) );

//* Reposition the primary navigation
//remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_before_header', 'genesis_do_nav' );

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'lifestyle_author_box_gravatar' );
function lifestyle_author_box_gravatar( $size ) {

	return 96;

}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'lifestyle_comments_gravatar' );
function lifestyle_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'lifestyle_remove_comment_form_allowed_tags' );
function lifestyle_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';

	return $defaults;

}

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Relocate after entry widget
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
add_action( 'genesis_after_entry', 'genesis_after_entry_widget_area', 5 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-top',
	'name'        => __( 'Home - Top', 'lifestyle' ),
	'description' => __( 'This is the top section of the homepage.', 'lifestyle' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-middle',
	'name'        => __( 'Home - Middle', 'lifestyle' ),
	'description' => __( 'This is the middle section of the homepage.', 'lifestyle' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom-left',
	'name'        => __( 'Home - Bottom Left', 'lifestyle' ),
	'description' => __( 'This is the bottom left section of the homepage.', 'lifestyle' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom-right',
	'name'        => __( 'Home - Bottom Right', 'lifestyle' ),
	'description' => __( 'This is the bottom right section of the homepage.', 'lifestyle' ),
) );


/**
 *
 *
 *                              ```................``````
 *                         ``...```               ``....`````
 *                     ``..``                           ``.....``
 *                   `..`                                   `..`...
 *                `..`           `.:/+ossyyysso+:-`           ``..`..`
 *              `..`         ./ohmNNMMMMMMMMMMMMMNNdy+-`         `..`..`
 *            `..`        .+hNNMMMNmdhyyyyhhdmNMMMMMMMNmy:`        `.`.-`
 *           `.`       `:hNMNdy+:-.```     ```.-/sdNMMMMMNmo.       `..`-.`
 *          ..`       :dNds:.`                    `-sNMMMMMMmo`       `.`.-`
 *        `..       .hdo-`                           -dMMMMMMMd.       `.`.-.
 *       `..        //`                               :MMMMMMMMh`       `.`.-`
 *      ``.                      ``             `    `oMMMMMMMMM-        `.`--`
 *     ``.`                     ./-.`      ```-////ohmMMMMMMMMMd`         ..`--
 *     `..                     `:-``` -`  `:/+ooosdNMMMMMMMMMNy-          `-`--.
 *    ``-`              ```   `:+:`   +/` ``-:oooyNMMMMMMNmdo-             ...--`
 *    ``.             ./:.   `:o+:-` `-://////ooooossso+:-.`               .-`--`
 *    ...             /o/`   ./oo++//++ooooooooo+/:://::---::::::---::::::::-`--.
 *    ...             +o/`   ./oooooooooooooooooooooooooooooooooooooooo+ooo+-`---
 *    ...             /o/`   .+oooo++ooooooooooo++/////:-::-://::://:::--::--`---
 *    .`.             -+:`   `/oo/-.`-:/++++++oo+osysso/:-.`               .-`---
 *    .`-`             .--`   -oo/-   ::``...-+oshNMMMMMMNmho-             ...--.
 *    .`..               ```   -+:`   +:  `-:+ooosmNMMMMMMMMMNy.          `-`---`
 *    `.`.`                     :-.````   `:::+ooo+odmMMMMMMMMMd`         ..`--.
 *     ....                     -/-.`          .--`  .oMMMMMMMMM-        `.`---.
 *     `-`..        /:`          `                    :MMMMMMMMh`       `.`.--.
 *      `-`..       -hh+.`                           .dMMMMMMMd-       `.`.---`
 *       .-`..        /dNdo:.`                    `.omMMMMMMNs`       `.`.---`
 *        .-...`       `/hNMNhs+-.```       ```.:ohNMMMMMMms-        ..`.---`
 *         `-.`..         -odNMMMNmdhyyyyyyyhmmMMMMMMMNmy/.        `...---.`
 *          `.-.`..`         ./sdmNMMMMMMMMMMMMMMNNmho:`         `....---.
 *            .--.`..`           `.:/ossyhhyysso/:.`           `..`.----`
 *              .--....``                                   `.....----`
 *                ..-..`...``                           `......----.`
 *                  `.---.......``                ``........-----.`
 *                     `.----...........................-----.``
 *........................-----------...........------------......................
 */
/** Reposition header outside main wrap */
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

add_action( 'genesis_before', 'genesis_header_markup_open', 5 );
add_action( 'genesis_before', 'genesis_do_header', 15 );
add_action( 'genesis_before', 'genesis_header_markup_close', 20 );

/** Reposition Main menu outside main wrap **/
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before', 'genesis_do_nav', 20 );


/**
 * Add the logo to the header and still keep the site-title
 */
add_action( 'genesis_before', 'm3_inject_header_logo', 10 );
function m3_inject_header_logo() {
	echo '<a class="header-logo-container" href="' . trailingslashit( site_url() ) . '"><img src="' . get_stylesheet_directory_uri() . '/images/header-logo-tasbi.png" alt="' . __( 'Logo de TASBI', 'lifestyle' ) . '" /></a>';
}

//* Customize the credits
add_filter( 'genesis_footer_creds_text', 'm3_footer_creds_text' );
function m3_footer_creds_text( $creds_text ) {

	$creds_text = '<div class="site-credits"><a href="' . trailingslashit( site_url() ) . '">' . __( 'Site réalisé par Mammouth3', 'lifestyle' ) . '</a></div>';
	$creds_text .= '<div class="copyright"><p>Tous droits réservées TASBI &copy; ' . date( 'Y' ) . '</p></div>';
	$creds_text .= '<div class="gototop">[footer_backtotop text="' . __( 'Retourner vers le haut', 'lifestyle' ) . '"]</div>';

	//$creds_text .= '<div class="loginout">[footer_loginout]</div>';

	return $creds_text;
}
