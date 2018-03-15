<?php
/**
 * onepage-lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package onepage-lite
 */

if ( ! function_exists( 'onepage_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function onepage_lite_setup() {
	define( 'MTS_THEME_VERSION', '1.0.3' );
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on onepage-lite, use a find and replace
	 * to change 'onepage-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'onepage-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 538, 294, true );
	add_image_size( 'onepage-lite-featured', 538, 294, true ); //featured
	add_image_size( 'onepage-lite-widgetthumb', 65, 65, true ); //widgetthumb
	add_image_size( 'onepage-lite-widgetfull', 302, 200, true ); //widgetfull
	add_image_size( 'onepage-lite-related', 166, 102, true ); //related


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'onepage-lite' ),
		'footer' => esc_html__( 'Footer', 'onepage-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'onepage_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * About page class
	 */
	require_once get_template_directory() . '/mts-welcome-page/class-mts-welcome-page.php';

	/*
	* About page instance
	*/
	$config = array(
		// Menu name under Appearance.
		'menu_name'               => __( 'About OnePage', 'onepage-lite' ),
		// Page title.
		'page_name'               => __( 'About OnePage', 'onepage-lite' ),
		// Main welcome title
		'welcome_title'         => sprintf( __( 'Welcome to %s - Version ', 'onepage-lite' ), 'OnePage Lite' ),
		// Main welcome content
		'welcome_content'       => esc_html__( 'OnePage lite is a beautiful 100% FREE single page WordPress theme that has an elegantly designed homepage layout with multiple sections like; portfolio, services, clients, testimonials, widgets, and contact. It’s fully responsive and highly optimized for SEO.', 'onepage-lite' ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'tabs'                    => array(
			'getting_started'  => __( 'Getting Started', 'onepage-lite' ),
			'recommended_actions' => __( 'Recommended Actions', 'onepage-lite' ),
			'recommended_plugins' => __( 'Useful Plugins','onepage-lite' ),
		),
		
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title' => esc_html__( 'Recommended Actions','onepage-lite' ),
				'text' => esc_html__( 'This theme needs some Recommended actions, so we have already compiled all the steps for you.','onepage-lite' ),
				'button_label' => esc_html__( 'Recommended Actions','onepage-lite' ),
				'button_link' => esc_url( admin_url( 'themes.php?page=onepage-lite-welcome&tab=recommended_actions' ) ),
				'is_button' => true,
				'recommended_actions' => true,
                'is_new_tab' => false
			),
			'second' => array(
				'title' => esc_html__( 'Check Video Tutorial','onepage-lite' ),
				'text' => esc_html__( 'Need more details? Please check our video tutorial for detailed information on how to use OnePage Lite Theme.','onepage-lite' ),
				'button_label' => esc_html__( 'Video Tutorial','onepage-lite' ),
				'button_link' => esc_url( 'https://www.youtube.com/watch?v=6fNqDL8Zfmk' ),
				'is_button' => true,
				'recommended_actions' => false,
                'is_new_tab' => true
			),
			'third' => array(
				'title' => esc_html__( 'Go to Customizer','onepage-lite' ),
				'text' => esc_html__( 'Using the WordPress Customizer you can easily customize almost every corner of the theme.','onepage-lite' ),
				'button_label' => esc_html__( 'Go to Customizer','onepage-lite' ),
				'button_link' => esc_url( admin_url( 'customize.php' ) ),
				'is_button' => true,
				'recommended_actions' => false,
                'is_new_tab' => true
			)
		),
		
		// Plugins array.
		'recommended_plugins' => array(
			'already_activated_message' => esc_html__( 'Already activated', 'onepage-lite' ),
			'version_label' => esc_html__( 'Version: ', 'onepage-lite' ),
			'install_label' => esc_html__( 'Install and Activate', 'onepage-lite' ),
			'activate_label' => esc_html__( 'Activate', 'onepage-lite' ),
			'deactivate_label' => esc_html__( 'Deactivate', 'onepage-lite' ),
			'content' => array(
				array(
                    'slug' => 'launcher'
                ),
				array(
					'slug' => 'wp-shortcode'
				),
				array(
					'slug' => 'wp-review'
				),
				array(
					'slug' => 'wp-tab-widget'
				),
				array(
					'slug' => 'wp-subscribe'
				),
				array(
                    'slug' => 'wp-quiz'
                ),
				array(
					'slug' => 'my-wp-translate'
				),
                array(
                    'slug' => 'mts-url-shortener'
                ),
                array(
                    'slug' => 'wp-notification-bars'
                )
			),
		),
		// Required actions array.
		'recommended_actions' => array(
			'install_label' => esc_html__( 'Install and Activate', 'onepage-lite' ),
			'activate_label' => esc_html__( 'Activate', 'onepage-lite' ),
			'deactivate_label' => esc_html__( 'Deactivate', 'onepage-lite' ),
			'content' => array(
				'mythemeshop-theme-customizer' => array(
					'title' => __('MyThemeShop Theme Customizer','onepage-lite'),
					'description' => __( 'It is highly recommended that you install this plugin to have access to the frontpage sections widgets.', 'onepage-lite' ),
					'plugin_slug' => 'mythemeshop-theme-customizer',
					'id' => 'mythemeshop-theme-customizer'
				),
			),
		),
	);
	MTS_welcome_page::init( $config );

	/*
	 * Notifications in customize
	 */
	require get_template_directory() . '/mts-customizer-notify/class-mts-customizer-notify.php';

	$config_customizer = array(
		'recommended_plugins' => array(
			'mythemeshop-theme-customizer' => array( 'recommended' => true, 'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s','onepage-lite' ), sprintf( '<strong>%s</strong>', 'MyThemeShop Theme Customizer' ) ) )
		),
		'recommended_actions' => array(),
		'recommended_actions_title' => esc_html__( 'Recommended Actions', 'onepage-lite' ),
		'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'onepage-lite' ),
		'install_button_label' => esc_html__( 'Install and Activate', 'onepage-lite' ),
		'activate_button_label' => esc_html__( 'Activate', 'onepage-lite' ),
		'deactivate_button_label' => esc_html__( 'Deactivate', 'onepage-lite' )
	);
	mts_Customizer_Notify::init( $config_customizer );

}
endif;
add_action( 'after_setup_theme', 'onepage_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onepage_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'onepage_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'onepage_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onepage_lite_widgets_init() {
	register_sidebar(array(
		'name' 			=> esc_html__( 'Sidebar', 'onepage-lite' ),
		'id' 			=> 'sidebar',
		'description'   => esc_html__( 'Default sidebar.', 'mythemeshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget' 	=> '</div></div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));

	register_sidebar(
        array (
            'name'          => esc_html__('HomePage widgets', 'onepage-lite'),
            'id'            => 'sidebar-homepage',
            'description'   => esc_html__( 'Add homepage sections here.(Widgets starting with OnePage Lite)', 'onepage-lite' ),
            'before_widget' => '<div id="%1$s" class="homepage-widget">',
            'after_widget' => '</div>',
        )
    );
}
add_action( 'widgets_init', 'onepage_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function onepage_lite_scripts() {
	wp_enqueue_style( 'onepage-lite-style', get_stylesheet_uri() );

	$handle = 'onepage-lite-style';

	wp_enqueue_script( 'onepage-lite-customscript', get_template_directory_uri() . '/js/customscript.js', array( 'jquery' ), MTS_THEME_VERSION, true );

	// Font Awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$mts_home_section = '';
	$mts_layout = '';

	$layout = get_theme_mod('onepage_lite_layout', 'right');
	if( isset($layout) && $layout == 'left' ) {
		$mts_layout = '.article { float: right; }
			.sidebar.c-4-12 { float: left; }';
	}

	$onepage_lite_color_scheme = get_theme_mod('onepage_lite_color_scheme', '#e16e7b');
	$header_bgcolor = get_theme_mod('onepage_lite_header_color_scheme', '#282828');
	$buttons_bgcolor = get_theme_mod('onepage_lite_buttons_color_scheme', '#ffffff');
	$counter_bg = get_theme_mod('onepage_lite_counter_bg_image', get_template_directory_uri() . '/images/counter-bg.jpg');
	$services_bgcolor = get_theme_mod('onepage_lite_services_color_scheme', '#ffffff');
	$twitter_bg = get_theme_mod('onepage_lite_twitter_bg_image', get_template_directory_uri() . '/images/twitter-bg.jpg');
	$testimonials_bgcolor = get_theme_mod('onepage_lite_testimonials_color_scheme', '#eeeeee');
	$client_bgcolor = get_theme_mod('onepage_lite_client_color_scheme', '#ffffff');
	$blog_bgcolor = get_theme_mod('onepage_lite_blog_color_scheme', '#eeeeee');
	$footer_bgcolor = get_theme_mod('onepage_lite_footer_color_scheme', '#282828');

	$custom_css = "
		#site-header { background-color: $header_bgcolor; box-shadow: 0 4px $header_bgcolor; }
		#navigation .mobile-menu-wrapper { background-color: $header_bgcolor; }
		.homepage-buttons { background-color: $buttons_bgcolor; }
		.counter { background: url($counter_bg) center no-repeat fixed; }
		.service-section { background-color: $services_bgcolor; }
		.twitter-section { background: url($twitter_bg) center repeat-y fixed; }
		.testimonials { background-color: $testimonials_bgcolor; }
		.clients-section { background-color: $client_bgcolor; }
		.blog-section { background-color: $blog_bgcolor; }
		#site-footer { background-color: $footer_bgcolor; box-shadow: 0 -4px 0 $footer_bgcolor; }

        a, a:hover, #navigation ul li a:hover, #navigation ul li.current-menu-item a, .feature-icon .fa, #logo a, .post-title a:hover, .readMore a, .post-info a:hover, .copyrights a, .footer-nav li a, .related-posts .title a:hover, .fn a, .reply a, .copyrights .top a:hover, a.rsswidget:hover, .widget li a:hover, .wpt-pagination a.next:hover, .toggle-menu .toggle-caret:hover .fa { color: $onepage_lite_color_scheme; }

        .social-icons a:hover, .featured-overlay, .homepage-button, .service-icon .fa, #commentform input#submit, .contact-form input[type=\"submit\"], .nav-links a, #search-image.sbutton, #searchsubmit, a#pull, .blog-title, #move-to-top:hover, .tagcloud a:hover, .widget .wpt_widget_content .tab_title.selected a, .latestPost-review-wrapper, .widget .wp-subscribe-wrap { background-color: $onepage_lite_color_scheme; }

        #navigation ul li a:hover, #navigation ul li.current-menu-item a, .social-icons a:hover, #site-header, #site-footer, .widget .wpt_widget_content .tab_title.selected a { border-color: $onepage_lite_color_scheme; }

        .service-icon:after { border-top-color: $onepage_lite_color_scheme; }
        .tagcloud a:hover:after { border-right-color: $onepage_lite_color_scheme; }
        .wpmm-megamenu-showing.wpmm-light-scheme a { color: $onepage_lite_color_scheme!important; }

        {$mts_home_section}
        {$mts_layout}
			";
	wp_add_inline_style( $handle, $custom_css );
}
add_action( 'wp_enqueue_scripts', 'onepage_lite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* tgm-plugin-activation */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* selective widget refresh */
	add_theme_support( 'customize-selective-refresh-widgets' );

// Add Recent Posts Widget.
include_once( get_theme_file_path( "functions/widget-recentposts.php" ) );

// Add Social Profile Widget.
include_once( get_theme_file_path( "functions/widget-social.php" ) );

add_action('tgmpa_register', 'onepage_register_required_plugins');
function onepage_register_required_plugins() {	
	
	$plugins = array(
		array(
			'name'               => 'MyThemeShop Theme Customizer', // The plugin name.
			'slug'               => 'mythemeshop-theme-customizer', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/plugins/mythemeshop-theme-customizer.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
	);

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'onepage-lite'),
            'menu_title' => __('Install Plugins', 'onepage-lite'),
            'installing' => __('Installing Plugin: %s', 'onepage-lite'),
            'oops' => __('Something went wrong with the plugin API.', 'onepage-lite'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','onepage-lite'),
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','onepage-lite'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','onepage-lite'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','onepage-lite'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','onepage-lite'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','onepage-lite'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','onepage-lite'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','onepage-lite'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','onepage-lite'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','onepage-lite'),
            'return' => __('Return to Required Plugins Installer', 'onepage-lite'),
            'plugin_activated' => __('Plugin activated successfully.', 'onepage-lite'),
            'complete' => __('All plugins installed and activated successfully. %s', 'onepage-lite'),
            'nag_type' => 'updated'
        )
    );
    tgmpa($plugins, $config);
}

/**
 * MTS icons for use in nav menus and icon select option.
 *
 * @return array
 */
function mts_get_icons() {
	$icons = array(
		__( 'Web Application Icons', 'onepage-lite' ) => array(
			'adjust', 'american-sign-language-interpreting', 'anchor', 'archive', 'area-chart', 'arrows', 'arrows-h', 'arrows-v', 'assistive-listening-systems', 'asterisk', 'at', 'audio-description', 'balance-scale', 'ban', 'bar-chart', 'barcode', 'bars', 'battery-empty', 'battery-full', 'battery-half', 'battery-quarter', 'battery-three-quarters', 'bed', 'beer', 'bell', 'bell-o', 'bell-slash', 'bell-slash-o', 'bicycle', 'binoculars', 'birthday-cake', 'blind', 'bluetooth', 'bluetooth-b', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'braille', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'bus', 'calculator', 'calendar', 'calendar-check-o', 'calendar-minus-o', 'calendar-o', 'calendar-plus-o', 'calendar-times-o', 'camera', 'camera-retro', 'car', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'cart-arrow-down', 'cart-plus', 'cc', 'certificate', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clock-o', 'clone', 'cloud', 'cloud-download', 'cloud-upload', 'code', 'code-fork', 'coffee', 'cog', 'cogs', 'comment', 'comment-o', 'commenting', 'commenting-o', 'comments', 'comments-o', 'compass', 'copyright', 'creative-commons', 'credit-card', 'credit-card-alt', 'crop', 'crosshairs', 'cube', 'cubes', 'cutlery', 'database', 'deaf', 'desktop', 'diamond', 'dot-circle-o', 'download', 'ellipsis-h', 'ellipsis-v', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'eyedropper', 'fax', 'female', 'fighter-jet', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-pdf-o', 'file-powerpoint-o', 'file-video-o', 'file-word-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flask', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'frown-o', 'futbol-o', 'gamepad', 'gavel', 'gift', 'glass', 'globe', 'graduation-cap', 'hand-lizard-o', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'hashtag', 'hdd-o', 'headphones', 'heart', 'heart-o', 'heartbeat', 'history', 'home', 'hourglass', 'hourglass-end', 'hourglass-half', 'hourglass-o', 'hourglass-start', 'i-cursor', 'inbox', 'industry', 'info', 'info-circle', 'key', 'keyboard-o', 'language', 'laptop', 'leaf', 'lemon-o', 'level-down', 'level-up', 'life-ring', 'lightbulb-o', 'line-chart', 'location-arrow', 'lock', 'low-vision', 'magic', 'magnet', 'male', 'map', 'map-marker', 'map-o', 'map-pin', 'map-signs', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'money', 'moon-o', 'motorcycle', 'mouse-pointer', 'music', 'newspaper-o', 'object-group', 'object-ungroup', 'paint-brush', 'paper-plane', 'paper-plane-o', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'percent', 'phone', 'phone-square', 'picture-o', 'pie-chart', 'plane', 'plug', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qrcode', 'question', 'question-circle', 'question-circle-o', 'quote-left', 'quote-right', 'random', 'recycle', 'refresh', 'registered', 'reply', 'reply-all', 'retweet', 'road', 'rocket', 'rss', 'rss-square', 'search', 'search-minus', 'search-plus', 'server', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'ship', 'shopping-bag', 'shopping-basket', 'shopping-cart', 'sign-in', 'sign-language', 'sign-out', 'signal', 'sitemap', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'space-shuttle', 'spinner', 'spoon', 'square', 'square-o', 'star', 'star-half', 'star-half-o', 'star-o', 'sticky-note', 'sticky-note-o', 'street-view', 'suitcase', 'sun-o', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'television', 'terminal', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-off', 'toggle-on', 'trademark', 'trash', 'trash-o', 'tree', 'trophy', 'truck', 'tty', 'umbrella', 'universal-access', 'university', 'unlock', 'unlock-alt', 'upload', 'user', 'user-plus', 'user-secret', 'user-times', 'users', 'video-camera', 'volume-control-phone', 'volume-down', 'volume-off', 'volume-up', 'wheelchair', 'wheelchair-alt', 'wifi', 'wrench'
		),
		__( 'Accessibility Icons', 'onepage-lite' ) => array(
			'american-sign-language-interpreting', 'assistive-listening-systems', 'audio-description', 'blind', 'braille', 'cc', 'deaf', 'low-vision', 'question-circle-o', 'sign-language', 'tty', 'universal-access', 'volume-control-phone', 'wheelchair', 'wheelchair-alt'
		),
		__( 'Hand Icons', 'onepage-lite' ) => array(
			'hand-lizard-o', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up'
		),
		__( 'Transportation Icons', 'onepage-lite' ) => array(
			'ambulance', 'bicycle', 'bus', 'car', 'fighter-jet', 'motorcycle', 'plane', 'rocket', 'ship', 'space-shuttle', 'subway', 'taxi', 'train', 'truck', 'wheelchair'
		),
		__( 'Gender Icons', 'onepage-lite' ) => array(
			'genderless', 'mars', 'mars-double', 'mars-stroke', 'mars-stroke-h', 'mars-stroke-v', 'mercury', 'neuter', 'transgender', 'transgender-alt', 'venus', 'venus-double', 'venus-mars'
		),
		__( 'File Type Icons', 'onepage-lite' ) => array(
			'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-o', 'file-pdf-o', 'file-powerpoint-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o'
		),
		__( 'Spinner Icons', 'onepage-lite' ) => array(
			'circle-o-notch', 'cog', 'refresh', 'spinner'
		),
		__( 'Form Control Icons', 'onepage-lite' ) => array(
			'check-square', 'check-square-o', 'circle', 'circle-o', 'dot-circle-o', 'minus-square', 'minus-square-o', 'plus-square', 'plus-square-o', 'square', 'square-o'
		),
		__( 'Payment Icons', 'onepage-lite' ) => array(
			'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'credit-card', 'credit-card-alt', 'google-wallet', 'paypal'
		),
		__( 'Chart Icons', 'onepage-lite' ) => array(
			'area-chart', 'bar-chart', 'line-chart', 'pie-chart'
		),
		__( 'Currency Icons', 'onepage-lite' ) => array(
			'btc', 'eur', 'gbp', 'gg', 'gg-circle', 'ils', 'inr', 'jpy', 'krw', 'money', 'rub', 'try', 'usd'
		),
		__( 'Text Editor Icons', 'onepage-lite' ) => array(
			'align-center', 'align-justify', 'align-left', 'align-right', 'bold', 'chain-broken', 'clipboard', 'columns', 'eraser', 'file', 'file-o', 'file-text', 'file-text-o', 'files-o', 'floppy-o', 'font', 'header', 'indent', 'italic', 'link', 'list', 'list-alt', 'list-ol', 'list-ul', 'outdent', 'paperclip', 'paragraph', 'repeat', 'scissors', 'strikethrough', 'subscript', 'superscript', 'table', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'underline', 'undo'
		),
		__( 'Directional Icons', 'onepage-lite' ) => array(
			'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'exchange', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up'
		),
		__( 'Video Player Icons', 'onepage-lite' ) => array(
			'arrows-alt', 'backward', 'compress', 'eject', 'expand', 'fast-backward', 'fast-forward', 'forward', 'pause', 'pause-circle', 'pause-circle-o', 'play', 'play-circle', 'play-circle-o', 'random', 'step-backward', 'step-forward', 'stop', 'stop-circle', 'stop-circle-o', 'youtube-play'
		),
		__( 'Brand Icons', 'onepage-lite' ) => array(
			'500px', 'adn', 'amazon', 'android', 'angellist', 'apple', 'behance', 'behance-square', 'bitbucket', 'bitbucket-square', 'black-tie', 'bluetooth', 'bluetooth-b', 'btc', 'buysellads', 'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'chrome', 'codepen', 'codiepie', 'connectdevelop', 'contao', 'css3', 'dashcube', 'delicious', 'deviantart', 'digg', 'dribbble', 'dropbox', 'drupal', 'edge', 'empire', 'envira', 'expeditedssl', 'facebook', 'facebook-official', 'facebook-square', 'firefox', 'first-order', 'flickr', 'font-awesome', 'fonticons', 'fort-awesome', 'forumbee', 'foursquare', 'get-pocket', 'gg', 'gg-circle', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gitlab', 'glide', 'glide-g', 'google', 'google-plus', 'google-plus-official', 'google-plus-square', 'google-wallet', 'gratipay', 'hacker-news', 'houzz', 'html5', 'instagram', 'internet-explorer', 'ioxhost', 'joomla', 'jsfiddle', 'lastfm', 'lastfm-square', 'leanpub', 'linkedin', 'linkedin-square', 'linux', 'maxcdn', 'meanpath', 'medium', 'mixcloud', 'modx', 'odnoklassniki', 'odnoklassniki-square', 'opencart', 'openid', 'opera', 'optin-monster', 'pagelines', 'paypal', 'pied-piper', 'pied-piper-alt', 'pied-piper-pp', 'pinterest', 'pinterest-p', 'pinterest-square', 'product-hunt', 'qq', 'rebel', 'reddit', 'reddit-alien', 'reddit-square', 'renren', 'safari', 'scribd', 'sellsy', 'share-alt', 'share-alt-square', 'shirtsinbulk', 'simplybuilt', 'skyatlas', 'skype', 'slack', 'slideshare', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'soundcloud', 'spotify', 'stack-exchange', 'stack-overflow', 'steam', 'steam-square', 'stumbleupon', 'stumbleupon-circle', 'tencent-weibo', 'themeisle', 'trello', 'tripadvisor', 'tumblr', 'tumblr-square', 'twitch', 'twitter', 'twitter-square', 'usb', 'viacoin', 'viadeo', 'viadeo-square', 'vimeo', 'vimeo-square', 'vine', 'vk', 'weibo', 'weixin', 'whatsapp', 'wikipedia-w', 'windows', 'wordpress', 'wpbeginner', 'wpforms', 'xing', 'xing-square', 'y-combinator', 'yahoo', 'yelp', 'yoast', 'youtube', 'youtube-play', 'youtube-square'
		),
		__( 'Medical Icons', 'onepage-lite' ) => array(
			'ambulance', 'h-square', 'heart', 'heart-o', 'heartbeat', 'hospital-o', 'medkit', 'plus-square', 'stethoscope', 'user-md', 'wheelchair'
		)
	);

	return $icons;
}

/**
 * Display schema-compliant the_category()
 *
 * @param string $separator
 */
function mts_the_category( $separator = ', ' ) {
	$categories = get_the_category();
	$count = count($categories);
	foreach ( $categories as $i => $category ) {
		echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . sprintf( __( "View all posts in %s", 'onepage-lite' ), esc_attr( $category->name ) ) . '">' . esc_html( $category->name ).'</a>';
		if ( $i < $count - 1 )
			echo $separator;
	}
}

/**
 * Truncate string to x letters/words.
 *
 * @param $str
 * @param int $length
 * @param string $units
 * @param string $ellipsis
 *
 * @return string
 */
function mts_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '' ) {
	if ( $units == 'letters' ) {
		if ( mb_strlen( $str ) > $length ) {
			return mb_substr( $str, 0, $length ) . $ellipsis;
		} else {
			return $str;
		}
	} else {
		return wp_trim_words( $str, $length, $ellipsis );
	}
}

if ( ! function_exists( 'mts_excerpt' ) ) {
	/**
	 * Get HTML-escaped excerpt up to the specified length.
	 *
	 * @param int $limit
	 *
	 * @return string
	 */
	function mts_excerpt( $limit = 40 ) {
	  return esc_html( mts_truncate( get_the_excerpt(), $limit, 'words' ) );
	}
}

if ( ! function_exists( 'mts_readmore' ) ) {
	/**
	 * Display a "read more" link.
	 */
	function mts_readmore() {
		?>
		<div class="readMore">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
				<?php _e( 'Continue Reading', 'onepage-lite' ); ?>
			</a>
		</div>
		<?php 
	}
}

/**
 * Display schema-compliant the_tags()
 *
 * @param string $before
 * @param string $sep
 * @param string $after
 */
function mts_the_tags($before = '', $sep = ', ', $after = '</div>') {
	if ( empty( $before ) ) {
		$before = '<div class="tags border-bottom">'.__('Tags: ', 'onepage-lite' );
	}

	$tags = get_the_tags();
	if (empty( $tags ) || is_wp_error( $tags ) ) {
		return;
	}
	$tag_links = array();
	foreach ($tags as $tag) {
		$link = get_tag_link($tag->term_id);
		$tag_links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . $tag->name . '</a>';
	}
	echo $before.join($sep, $tag_links).$after;
}

// Related Posts
if (!function_exists('mts_related_posts')) {
	/**
	 * Display the related posts.
	 */
	function mts_related_posts() {
		$post_id = get_the_ID();
			$empty_taxonomy = false;
			// related posts based on categories
			$categories = get_the_category($post_id);
			if (empty($categories)) {
				$empty_taxonomy = true;
			} else {
				$category_ids = array();
				foreach($categories as $individual_category)
					$category_ids[] = $individual_category->term_id;
				$args = array( 'category__in' => $category_ids,
					'post__not_in' => array($post_id),
					'posts_per_page' => 8,
					'ignore_sticky_posts' => 1,
					'orderby' => 'rand'
				);
			}

			if (!$empty_taxonomy) {
			$my_query = new WP_Query( $args ); if( $my_query->have_posts() ) {
				echo '<div class="related-posts">';
				echo '<h4>'.__('Related Posts', 'onepage-lite' ).'</h4>';
				echo '<div class="clear">';
				$posts_per_row = 4;
				$j = 0;
				while( $my_query->have_posts() ) { $my_query->the_post(); ?>
				<article class="latestPost excerpt  <?php echo (++$j % $posts_per_row == 0) ? 'last' : ''; ?>">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" id="featured-thumbnail">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail( 'onepage-lite-related', array( 'title' => '' ) ); echo '</div>'; ?>
						<?php } else { ?>
							<?php echo '<div class="featured-thumbnail">'; ?><img class="wp-post-image" src="<?php echo get_template_directory_uri() . '/images/nothumb-onepage-lite-related.png'; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/><?php  echo '</div>'; ?>
						<?php } ?>
					</a>
					<header>
						<h2 class="title front-view-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h2>
					</header>
				</article><!--.post.excerpt-->
				<?php } echo '</div></div>'; }} wp_reset_postdata(); ?>
			<!-- .related-posts -->
		<?php //}
	}
}

if ( ! function_exists( 'mts_comments' ) ) {
	/**
	 * Custom comments template.
	 * @param $comment
	 * @param $args
	 * @param $depth
	 */
	function mts_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<?php
			switch( $comment->comment_type ) :
				case 'pingback':
				case 'trackback': ?>
					<div id="comment-<?php comment_ID(); ?>">
						<div class="comment-author vcard">
							Pingback: <?php comment_author_link(); ?>
							<div class="comment-info">
								<span class="ago"><?php comment_date( get_option( 'date_format' ) ); ?></span>
								<span class="comment-meta">
									<?php edit_comment_link( __( '( Edit )', 'onepage-lite' ), '  ', '' ) ?>
								</span>
							</div>
						</div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php _e( 'Your comment is awaiting moderation.', 'onepage-lite' ) ?></em>
							<br />
						<?php endif; ?>
					</div>
				<?php
					break;

				default: ?>
					<div id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/UserComments">
						<div class="comment-author vcard">
							<?php echo get_avatar( $comment->comment_author_email, 76 ); ?>
							<div class="comment-info">
								<?php printf( '<span class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person"><span itemprop="name">By %s</span></span>', get_comment_author_link() ) ?>
								<span class="ago"><?php comment_date( get_option( 'date_format' ) ); ?></span>
								<span class="comment-meta">
									<?php edit_comment_link( __( '( Edit )', 'onepage-lite' ), '  ', '' ) ?>
								</span>
							</div>
						</div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php _e( 'Your comment is awaiting moderation.', 'onepage-lite' ) ?></em>
							<br />
						<?php endif; ?>
						<div class="commentmetadata">
							<div class="commenttext" itemprop="commentText">
								<?php comment_text() ?>
							</div>
							<div class="reply">
								<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ) ?>
							</div>
						</div>
					</div>
				<?php
				   break;
			 endswitch; ?>
		<!-- WP adds </li> -->
	<?php }
}

function mts_arr_to_html_attr( $attributes ) {
    $output = '';

    foreach ( $attributes as $name => $value ) {
        if ( is_bool( $value ) ) {
            if ($value) $output .= $name . ' ';
        } else {
            $output .= sprintf( '%s="%s"', $name, esc_attr( $value ) ) . ' ';
        }
    }

    return $output;
}
/**
 * Add `.container` the WP Mega Menu's
 * @param $selector
 *
 * @return string
 */
function mts_megamenu_parent_element( $selector ) {
	return '.container';
}
add_filter( 'wpmm_container_selector', 'mts_megamenu_parent_element' );

/**
 *  Filters that allow shortcodes in Text Widgets
 */
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_content_rss', 'do_shortcode' );
