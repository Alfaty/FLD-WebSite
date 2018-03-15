<?php
/**
 * onepage-lite Theme Customizer
 *
 * @package onepage-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function onepage_lite_customize_register( $wp_customize ) {

	/*---------------------
	* Theme Options
	----------------------*/
    $wp_customize->add_panel( 'panel_id', array(
        'priority'       => 121,
        'capability'     => 'edit_theme_options',
        'title'          => __('Theme Options', 'onepage-lite'),
        'description'    => __('MyThemeShop Mission Control Center', 'onepage-lite'),
    ) );

    /***************************************************/
    /*****                 General                 ****/
    /**************************************************/
    $wp_customize->add_section( 'onepage_lite_general_settings', array(
        'title'      => __('General Settings','onepage-lite'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    //Header Social Icons
    $wp_customize->add_setting( 'onepage_lite_header_social_icons', array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'onepage_lite_header_social_icons',
            array(
                'label'     => __('Header Social Icons', 'onepage-lite'),
                'description' => __('If icons are not appearing, please hide the customizer.','onepage-lite'),
                'section'   => 'onepage_lite_general_settings',
                'settings'  => 'onepage_lite_header_social_icons',
                'type'      => 'radio',
                'choices'  => array(
                    '0'   => __('Hide', 'onepage-lite'),
                    '1'  => __('Show', 'onepage-lite'),
                ),
                'transport' => 'refresh',
            )
        )
    );

    //Twitter URL
    $wp_customize->add_setting('onepage_lite_twitter_url', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('onepage_lite_twitter_url', array(
        'label'    => __('Twitter URL', 'onepage-lite'),
        'description' => __('Enter the Twitter URL.','onepage-lite'),
        'section'  => 'onepage_lite_general_settings',
        'settings' => 'onepage_lite_twitter_url',
        'type'     => 'text',
    ));

    //Facebook URL
    $wp_customize->add_setting('onepage_lite_facebook_url', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('onepage_lite_facebook_url', array(
        'label'    => __('Facebook URL', 'onepage-lite'),
        'description' => __('Enter the Facebook URL.','onepage-lite'),
        'section'  => 'onepage_lite_general_settings',
        'settings' => 'onepage_lite_facebook_url',
        'type'     => 'text',
    ));

    //Google+ URL
    $wp_customize->add_setting('onepage_lite_google_plus_url', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('onepage_lite_google_plus_url', array(
        'label'    => __('Google+ URL', 'onepage-lite'),
        'description' => __('Enter the Google URL.','onepage-lite'),
        'section'  => 'onepage_lite_general_settings',
        'settings' => 'onepage_lite_google_plus_url',
        'type'     => 'text',
    ));

    /***************************************************/
    /*****                 Styling                 ****/
    /**************************************************/
    $wp_customize->add_section( 'onepage_lite_styling_settings', array(
        'title'      => __('Styling Settings','onepage-lite'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    //Theme Color Scheme
    $wp_customize->add_setting( 'onepage_lite_color_scheme', array(
        'default'           => '#e16e7b',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_color_scheme', array(
        'label'    => __('Theme Color Scheme','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_color_scheme',
    )) );

    //Header Background Color
    $wp_customize->add_setting( 'onepage_lite_header_color_scheme', array(
        'default'           => '#282828',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_header_color_scheme', array(
        'label'    => __('Header Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_header_color_scheme',
    )) );

    //Buttons Section Background Color
    $wp_customize->add_setting( 'onepage_lite_buttons_color_scheme', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_buttons_color_scheme', array(
        'label'    => __('Buttons Section Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_buttons_color_scheme',
    )) );

    //Counter Section Background image
    $wp_customize->add_setting( 'onepage_lite_counter_bg_image', array(
        'default'           => get_template_directory_uri() . '/images/counter-bg.jpg',
        'capability'        => 'edit_theme_options'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'onepage_lite_counter_bg_image', array(
        'label'    => __('Counter Section Background Image','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_counter_bg_image',
    )) );

    //Services Section Background Color
    $wp_customize->add_setting( 'onepage_lite_services_color_scheme', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_services_color_scheme', array(
        'label'    => __('Services Section Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_services_color_scheme',
    )) );

    //Twitter Section Background image
    $wp_customize->add_setting( 'onepage_lite_twitter_bg_image', array(
        'default'           => get_template_directory_uri() . '/images/twitter-bg.jpg',
        'capability'        => 'edit_theme_options'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'onepage_lite_twitter_bg_image', array(
        'label'    => __('Twitter Section Background Image','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_twitter_bg_image',
    )) );

    //Testimonials Section Background color
    $wp_customize->add_setting( 'onepage_lite_testimonials_color_scheme', array(
        'default'           =>  '#eeeeee',
        'capability'        => 'edit_theme_options'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_testimonials_color_scheme', array(
        'label'    => __('Testimonials Section Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_testimonials_color_scheme',
    )) );

    //Client Section Background Color
    $wp_customize->add_setting( 'onepage_lite_client_color_scheme', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_client_color_scheme', array(
        'label'    => __('Client Section Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_client_color_scheme',
    )) );

    //Blog Section Background color
    $wp_customize->add_setting( 'onepage_lite_blog_color_scheme', array(
        'default'           =>  '#eeeeee',
        'capability'        => 'edit_theme_options'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_blog_color_scheme', array(
        'label'    => __('Blog Section Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_blog_color_scheme',
    )) );

    //Footer Background Color
    $wp_customize->add_setting( 'onepage_lite_footer_color_scheme', array(
        'default'           => '#282828',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onepage_lite_footer_color_scheme', array(
        'label'    => __('Footer Background Color','onepage-lite'),
        'section'  => 'onepage_lite_styling_settings',
        'settings' => 'onepage_lite_footer_color_scheme',
    )) );


    /***************************************************/
    /*****                 HomePage                ****/
    /**************************************************/

    $homepage_sections = $wp_customize->get_section( 'sidebar-widgets-sidebar-homepage' );
    if ( ! empty( $homepage_sections ) ) {
        $homepage_sections->panel = 'panel_id';
        // $wp_customize->get_control( 'onepage_lite_features_title' )->section = 'sidebar-widgets-sidebar-homepage';
        // $wp_customize->get_control( 'onepage_lite_features_description' )->section = 'sidebar-widgets-sidebar-homepage';
        $homepage_sections->title = __( 'HomePage Sections', 'onepage-lite' );
        $homepage_sections->priority = 123;
    }

    /***************************************************/
    /*****                   Blog                  ****/
    /**************************************************/
    $wp_customize->add_section( 'onepage_lite_blog_settings', array(
        'title'      => __('Blog Settings','onepage-lite'),
        'priority'   => 123,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    //Blog Title
    $wp_customize->add_setting('onepage_lite_blog_title', array(
        'default'           => __('Blog', 'onepage-lite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('onepage_lite_blog_title', array(
        'label'    => __('Blog Title', 'onepage-lite'),
        'description' => __('You can change the Title in blog Section from here.','onepage-lite'),
        'section'  => 'onepage_lite_blog_settings',
        'settings' => 'onepage_lite_blog_title',
        'type'     => 'text',
    ));

    //Blog Description
    $wp_customize->add_setting('onepage_lite_blog_description', array(
        'default'           => __('Lorem ipsum dolor sit amet consectetur', 'onepage-lite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('onepage_lite_blog_description', array(
        'label'    => __('Blog Description', 'onepage-lite'),
        'description' => __('You can change the description in blog Section from here.','onepage-lite'),
        'section'  => 'onepage_lite_blog_settings',
        'settings' => 'onepage_lite_blog_description',
        'type'     => 'textarea',
    ));

    //Pagination
    $wp_customize->add_setting( 'onepage_lite_blog_pagination_type', array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'onepage_lite_blog_pagination_type',
            array(
                'label'     => __('Pagination Type', 'onepage-lite'),
                'section'   => 'onepage_lite_blog_settings',
                'settings'  => 'onepage_lite_blog_pagination_type',
                'type'      => 'radio',
                'choices'  => array(
                    '0'   => __('Next/Previous', 'onepage-lite'),
                    '1'  => __('Numbered', 'onepage-lite'),
                ),
                'transport' => 'refresh',
            )
        )
    );

    //Layout
    $wp_customize->add_setting('onepage_lite_layout', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'default'           => 'right',
    ));
    $wp_customize->add_control('onepage_lite_layout', array(
        'settings' => 'onepage_lite_layout',
        'label'    => __('Sidebar Position', 'onepage-lite'),
        'section'  => 'onepage_lite_blog_settings',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __('Right Sidebar','onepage-lite'),
            'left' => __('Left Sidebar','onepage-lite'),
        ),
    ));

    //Single Related Posts
    $wp_customize->add_setting( 'onepage_lite_single_related_posts', array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'onepage_lite_single_related_posts',
            array(
                'label'     => __('Single Related Posts', 'onepage-lite'),
                'section'   => 'onepage_lite_blog_settings',
                'settings'  => 'onepage_lite_single_related_posts',
                'type'      => 'radio',
                'choices'  => array(
                    '0'   => __('Hide', 'onepage-lite'),
                    '1'  => __('Show', 'onepage-lite'),
                ),
                'transport' => 'refresh',
            )
        )
    );

    /***************************************************/
    /*****                 Footer                  ****/
    /**************************************************/
    $wp_customize->add_section( 'onepage_lite_footer_settings', array(
        'title'      => __('Footer Settings','onepage-lite'),
        'priority'   => 123,
        'capability' => 'edit_theme_options',
        'panel'      => 'panel_id',
    ) );

    //Footer Copyrights
    $wp_customize->add_setting('onepage_lite_footer_copyrights', array(
        'default'           => __('Theme by <a href="http://mythemeshop.com/">MyThemeShop</a>', 'onepage-lite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses',
    )); 
    $wp_customize->add_control('onepage_lite_footer_copyrights', array(
        'label'    => __('Footer Copyrights', 'onepage-lite'),
        'description' => __('You can change the copyrights text in footer Section from here.','onepage-lite'),
        'section'  => 'onepage_lite_footer_settings',
        'settings' => 'onepage_lite_footer_copyrights',
        'type'     => 'textarea',
    ));

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->get_setting( 'onepage_lite_header_social_icons' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_twitter_url' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_facebook_url' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_google_plus_url' )->transport  = 'refresh';

    $wp_customize->get_setting( 'onepage_lite_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_header_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_buttons_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_counter_bg_image' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_services_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_twitter_bg_image' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_testimonials_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_client_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_blog_color_scheme' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_footer_color_scheme' )->transport  = 'refresh';

    $wp_customize->get_setting( 'onepage_lite_blog_title' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_blog_description' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_blog_pagination_type' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_layout' )->transport  = 'refresh';
    $wp_customize->get_setting( 'onepage_lite_single_related_posts' )->transport  = 'refresh';
    
    $wp_customize->get_setting( 'onepage_lite_footer_copyrights' )->transport  = 'refresh';

}
add_action( 'customize_register', 'onepage_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function onepage_lite_customize_preview_js() {
	wp_enqueue_script( 'onepage_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'onepage_lite_customize_preview_js' );

// add admin scripts
add_action('admin_enqueue_scripts', 'mts_onepage_customizer_select2_script');
function mts_onepage_customizer_select2_script() {
    $screen = get_current_screen();
    $screen_id = $screen->id;

    if ( 'customize' == $screen_id ) {
        if ( is_plugin_active( 'mythemeshop-theme-customizer/mythemeshop-theme-customizer.php' ) ) {
        	wp_enqueue_script( 'select2', MTS_CUSTOMIZER_URL . 'assets/js/select2.min.js', false, '4.0.3', true );
            wp_enqueue_script( 'icons_dropdown', MTS_CUSTOMIZER_URL . 'assets/js/icons_dropdown.js', false, '1.0', true );
            wp_enqueue_style( 'select2', MTS_CUSTOMIZER_URL . 'assets/css/select2.min.css' );
        }
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
    }
}