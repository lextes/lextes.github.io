<?php
/**
* Theme Options
* @since 1.0
* @author Titouanc
* @link http://codex.wordpress.org/Plugin_API/Action_Reference/customize_register
* @link http://codex.wordpress.org/Theme_Customization_API
*/

function coeur_customize_register( $wp_customize ) {

    /**
    * Panels
    * @author Frenchtastic
    * @since Coeur 1.7
    */
    global $wp_version;
    if ( $wp_version >= 4.0 ) {
    $wp_customize->add_panel( 'coeur_advanced_options', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Advanced Options', 'coeur'),
    'description'    => '',
    ));
    }

    /**
    * Sections
    * @author Frenchtastic
    * @since Coeur 1.0
    */

    // General
    $wp_customize->add_section( 'coeur_general' , array(
        'title'      => __( 'General', 'coeur' ),
        'priority'   => 30,
        'panel'  => 'coeur_advanced_options',
        ) );

    // Meta
    $wp_customize->add_section( 'coeur_meta' , array(
        'title'      => __( 'Metadata Options', 'coeur' ),
        'priority'   => 40,
        'panel'  => 'coeur_advanced_options',
        ));

    // Colors
    $wp_customize->add_section( 'colors' , array(
        'title'      => __( 'Colors', 'coeur' ),
        'priority'   => 50,
        'description' => 'Change your websites colors.',
        ));

    // Layout
    $wp_customize->add_section( 'coeur_layout' , array(
        'title'      => __( 'Layout', 'coeur' ),
        'priority'   => 60,
        'description' => 'Change your website layout.',
        'panel'  => 'coeur_advanced_options',
        ));

    // Sidebars
    $wp_customize->add_section( 'coeur_sidebars' , array(
        'title'      => __( 'Sidebars', 'coeur' ),
        'priority'   => 70,
        'panel'  => 'coeur_advanced_options',
        ));

    // Menu
    $wp_customize->add_section( 'coeur_menu_section' , array(
        'title'      => __( 'Menu', 'coeur' ),
        'priority'   => 80,
        'panel'  => 'coeur_advanced_options',
        ));

    // Logo
    $wp_customize->add_section( 'coeur_logo_section' , array(
        'title'      => __( 'Logo', 'coeur' ),
        'priority'   => 90,
        'description' => 'Upload a logo to replace the default site name in header',
        'panel'  => 'coeur_advanced_options',
    ));


    /**
    * Show/Hide categories on posts
    * @author Frenchtastic
    * @since Coeur 1.7
    */
    $wp_customize->add_setting( 'coeur_show_cat' );

    $wp_customize->add_control(
      'coeur_show_cat',
      array(
        'description' => 'Show categories on posts?',
        'type' => 'checkbox',
        'label' => 'Show categories',
        'section' => 'coeur_meta',
        'std' => '0'
        ));

    /**
    * Show/Hide author on posts
    * @author Frenchtastic
    * @since Coeur 1.7
    */
    $wp_customize->add_setting( 'coeur_show_author' );

    $wp_customize->add_control(
      'coeur_show_author',
      array(
        'description' => 'Show the post author on articles?',
        'type' => 'checkbox',
        'label' => 'Show post author',
        'section' => 'coeur_meta',
        'std' => '1'
        ));

    /**
    * Change text preceding date
    * @author Frenchtastic
    * @since Coeur 1.7
    */
    $wp_customize->add_setting('coeur_meta_posted', array(
        'default'        => 'Posted on',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'transport'      => 'refresh'
        ));

    $wp_customize->add_control('coeur_meta_posted', array(
        'label'      => __('Posted on', 'coeur'),
        'section'    => 'coeur_meta',
        'settings'   => 'coeur_meta_posted',
        'description' => 'Change the text preceding the post date. Set to <b>"posted on"</b> by default.'
        ));
    
    /**
    * Footer copyright text
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting('coeur_footer_copyright', array(
        'default'        => '<a href="'.esc_url('http://frenchtastic.eu').'">Design by Frenchtastic.eu</a>',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'transport'      => 'refresh'
        ));

    $wp_customize->add_control('coeur_footer_copyright', array(
        'label'      => __('Footer Copyright', 'coeur'),
        'section'    => 'title_tagline',
        'settings'   => 'coeur_footer_copyright'
        ));

    /**
    * Title color
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting( 'blog_title_color' , array(
        'default'     => '#00c9bf',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_title_color', array(
     'label'        => __( 'Blog Title Color', 'coeur' ),
     'section'    => 'colors',
     'settings'   => 'blog_title_color',
     )));

    /**
    * Primary color
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting( 'primary_color' , array(
        'default'     => '#00c9bf',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
     'label'        => __( 'Primary Color', 'coeur' ),
     'section'    => 'colors',
     'settings'   => 'primary_color',
     )));

    /**
    * Link color
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting( 'link_color' , array(
        'default'     => '#00c9bf',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'        => __( 'Link Color', 'coeur' ),
        'section'    => 'colors',
        'settings'   => 'link_color',
        )));

    /**
    * Excerpt or content
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting('show_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        ));

    $wp_customize->add_control('show_post_content', array(
        'label'      => __('Post Content', 'coeur'),
        'section'    => 'coeur_general',
        'settings'   => 'show_post_content',
        'description' => '<b>Show content</b> will show the whole post content while <b>show excerpt</b> will only show the first few lines',
        'type'       => 'radio',
        'choices'    => array(
            'content' => 'Show content',
            'excerpt' => 'Show excerpt'
            ),
        ));

    /**
    * Headings
    * @author Frenchtastic
    * @since Coeur 1.7.3
    */
    $wp_customize->add_setting('coeur_headings_bolder', array(
        'default'        => '100',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        ));

    $wp_customize->add_control('coeur_headings_bolder', array(
        'label'      => __('Headings', 'coeur'),
        'section'    => 'coeur_general',
        'settings'   => 'coeur_headings_bolder',
        'description' => 'Make headings/titles bolder.',
        'type'       => 'select',
        'choices'    => array(
            '100' => 'Thin',
            '200' => 'Bold',
            '400' => 'Bolder'
            ),
        ));

    /**
    * Sidebar on frontpage
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting('front_sidebar', array(
        'default'        => 'yes',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        ));

    $wp_customize->add_control('front_sidebar', array(
        'label'      => __('Sidebar on Frontpage', 'coeur'),
        'section'    => 'coeur_sidebars',
        'settings'   => 'front_sidebar',
        'description' => 'If you wish to display the sidebar on the front page select yes.',
        'type'       => 'select',
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No'
            ),
        ));

    /**
    * Sidebar on pages
    * @author Frenchtastic
    * @since Coeur 1.0
    */
    $wp_customize->add_setting('page_sidebar', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        ));

    $wp_customize->add_control('page_sidebar', array(
        'label'      => __('Show sidebar on pages', 'coeur'),
        'section'    => 'coeur_sidebars',
        'settings'   => 'page_sidebar',
        'description' => 'If you wish to display the sidebar on pages select yes.',
        'type'       => 'select',
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No'
            ),
        ));

    /**
    * Sidebar on single post pages
    * @author Frenchtastic
    * @since Coeur 1.6
    */
    $wp_customize->add_setting('single_sidebar', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

        ));

    $wp_customize->add_control('single_sidebar', array(
        'label'      => __('Show sidebar on single post pages', 'coeur'),
        'section'    => 'coeur_sidebars',
        'settings'   => 'single_sidebar',
        'description' => 'If you wish to display the sidebar on single post pages select yes.',
        'type'       => 'select',
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No'
            ),
        ));

    /**
    * Sidebar on mobile devices
    * @author Frenchtastic
    * @since Coeur 1.7.3
    */
    $wp_customize->add_setting('coeur_mobile_sidebar', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

        ));

    $wp_customize->add_control('coeur_mobile_sidebar', array(
        'label'      => __('Sidebar on mobile', 'coeur'),
        'section'    => 'coeur_sidebars',
        'settings'   => 'coeur_mobile_sidebar',
        'description' => 'Show the sidebar on mobile devices.',
        'type'       => 'radio',
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No'
            ),
        ));

    /**
    * Menu on single post pages
    * @author Frenchtastic
    * @since Coeur 1.6
    */
    $wp_customize->add_setting('single_menu_header', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        ));

    $wp_customize->add_control('single_menu_header', array(
        'label'      => __('Display menu on single post pages', 'coeur'),
        'section'    => 'coeur_menu_section',
        'settings'   => 'single_menu_header',
        'description' => 'Display menu on single post pages instead of post navigation and comment count.',
        'type'       => 'select',
        'choices'    => array(
            'yes'=> 'Yes',
            'no' => 'No'
            ),
        ));

    /**
    * Site-title font-weight
    * @author Frenchtastic
    * @since Coeur 1.7
    */
    if ( $wp_version >= 4.0 ) {
    $wp_customize->add_setting('coeur_logo_weight', array(
      'default'        => 100,
      'capability'     => 'edit_theme_options',
      'type'           => 'option',
      'transport'      => 'refresh'
      ));

    $wp_customize->add_control( 'coeur_logo_weight', array(
      'type'        => 'range',
      'priority'    => 10,
      'section'     => 'coeur_logo_section',
      'label'       => 'Site title thickness',
      'description' => 'Adjust site title thickness. <b>This option will only work if you are not using and image as logo</b>',
      'input_attrs' => array(
        'min'   => 100,
        'max'   => 700,
        'step'  => 100,
        'class' => 'test-class test'
        ),
      ));
    }

    /**
    * Logo
    * @author Frenchtastic
    * @since Coeur 1.6
    */
    $wp_customize->add_setting( 'coeur_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'coeur' ),
    'section'  => 'coeur_logo_section',
    'settings' => 'coeur_logo',
    )));

    /**
    * Sidebar layout
    * @author Frenchtastic
    * @since 1.7.3
    */

    $wp_customize->add_setting('coeur_sidebar_float', array(
        'default'        => 'right',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

        ));

    $wp_customize->add_control('coeur_sidebar_float', array(
        'label'      => __('Display sidebar on left/right', 'coeur'),
        'section'    => 'coeur_layout',
        'settings'   => 'coeur_sidebar_float',
        'description' => '<b>Left</b> - Sidebar will appear on the left hand side. <br> <b>Right</b> - Sidebar will appear on the right hand side.',
        'type'       => 'radio',
        'choices'    => array(
            'left' => 'Left',
            'right' => 'Right'
            ),
        ));

    /**
    * Container width
    * @author Frenchtastic
    * @since 1.7.3
    */

    $wp_customize->add_setting('coeur_container_width', array(
        'default'        => '970px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

        ));

    $wp_customize->add_control('coeur_container_width', array(
        'label'      => __('Site width', 'coeur'),
        'section'    => 'coeur_layout',
        'settings'   => 'coeur_container_width',
        'description' => 'Choose site width. <br> <b>Please note:</b> This option will not make any changes to your site as you site in customizer because the view is too small.',
        'type'       => 'select',
        'choices'    => array(
            '970px' => 'Standard site width',
            '1170px' => 'Wider site width'
            ),
        ));
}
add_action( 'customize_register', 'coeur_customize_register' );

function coeur_customize_css()
{   
    if(get_option('coeur_mobile_sidebar') != 'yes'): ?>
    <style type="text/css">
        @media (max-width: 769px) {
            .blog-sidebar{
                display: none;
            }
        }
    </style>
    <?php endif; 

    $primary = get_theme_mod('primary_color');
    $title_color = get_theme_mod('blog_title_color');
    $link_color = get_theme_mod('link_color');
    $coeur_title_range = get_option('coeur_logo_weight');
    ?>
    <style type="text/css">
    
    @media (min-width: 1200px) {
      .container {
        width: <?php echo get_option('coeur_container_width'); ?>;
      }
    }

    h1, .h1, h2, .h2, h3, .h3, 
    h4, .h4, h5, .h5, h6, .h6 {
      font-weight: <?php echo get_option('coeur_headings_bolder'); ?>;
    }
    h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a,
    h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a {
      font-weight: <?php echo get_option('coeur_headings_bolder'); ?>;
    }

    .blog-title a {
        color: <?php echo $title_color; ?>;
        font-weight: <?php echo $coeur_title_range; ?>;
    }
    .bypostauthor .media-heading{
        background-color: <?php echo $primary; ?>;
    }
    .form-control:focus {
        border-color: <?php echo $primary; ?>;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
        background-color: <?php echo $primary; ?>;
        border-color: <?php echo $primary; ?>;
    }
    .btn-primary{
      background-color: <?php echo $primary; ?>;
      border-color: <?php echo $primary; ?>;
    }
    .search-field:focus {
        border-color: <?php echo $primary; ?>;
    }
    blockquote{
        border-left: 3px solid <?php echo $primary; ?>;
    }
    .sticky {
        border: 2px solid <?php echo $primary; ?>;
    }
    a:hover {
        color: <?php echo $link_color; ?>;
    }
    a {
        color: <?php echo $link_color; ?>;
    }
</style>
<?php
}
add_action( 'wp_head', 'coeur_customize_css');