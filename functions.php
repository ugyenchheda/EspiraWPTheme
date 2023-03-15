<?php
/**
 * Espira functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Espira
 */

if (!function_exists('espira_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function espira_setup()
{
        load_theme_textdomain('espira', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'espira'),
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        add_theme_support('custom-background', apply_filters('espira_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'espira_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function espira_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('espira_content_width', 640);
}
add_action('after_setup_theme', 'espira_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_image_size('item_image', 300, 300, true);
add_image_size('post_image_xs', 100, 90, true);
add_image_size('post_image_s', 240, 186, true);
add_image_size('widget_right_thumbnail', 232, 123, true);
add_image_size('post_image_m', 263, 175, true);
add_image_size('post_image_l', 387, 242, true);
add_image_size('post_image_xl', 774, 484, true);
add_image_size('post_feat_xl', 1090, 521, true);
add_image_size('feature_galleries', 1090, 521, true);



// Register Sidebars
function custom_sidebarsOne() {

	$args = array(
		'id'            => 'submenu_one',
        'class'         => 'submenu_one',
		'before_title'  => '<h4>',
		'after_title'   => '<h4>',
		'name'          => __( 'Sub Menu 1', 'espira' ),
		'description'   => __( 'Add contents for submenu one here...', 'espira' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebarsOne' );

function custom_sidebarsTwo() {

	$args = array(
		'id'            => 'submenu_two',
		'class'         => 'submenu_two',
		'name'          => __( 'Sub Menu 2', 'espira' ),
		'description'   => __( 'Add contents for submenu two here...', 'espira' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebarsTwo' );
function espira_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Nyheter Right Sidebar', 'espira'),
        'id' => 'nyheter-right',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Nyheter Left Sidebar', 'espira'),
        'id' => 'nyheter-left',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'espira'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Section 1', 'espira'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s" class="">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Section 2', 'espira'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s" class="">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Section 3', 'espira'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s" class="">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Section 4', 'espira'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s" class="">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Category SideBar', 'espira'),
        'id' => 'category',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Bottom Footer', 'espira'),
        'id' => 'social',
        'description' => esc_html__('Add widgets here.', 'espira'),
        'before_widget' => '<div id="%1$s" class="col-md-2">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'espira_widgets_init');
/**
 * Enqueue scripts and styles.
 */

function espira_scripts()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '20151215');
    wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.css', array(), '20151215');
    wp_enqueue_style('jquery.fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '20151215');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '20151215');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '20151215');
    wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css', array(), '20151215');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '20151217');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '20151217');
    wp_enqueue_style('espira', get_stylesheet_uri());

    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/5.4.0/css/font-awesome.min.css');
    wp_enqueue_script('google-map', 'http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU&key=AIzaSyBr2q08BHCBK-HWA3y0InCwKsCcxPwHDcU');
    wp_script_add_data('google-map', 'defer', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.js', array(), '20151215', true);
    wp_enqueue_script('espira-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '20151215', true);
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.js', array(), '20151215', true);
    wp_enqueue_script('jquery.fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array(), '20151215', true);
    wp_enqueue_script('circle-progress', get_template_directory_uri() . '/js/circle-progress.js', array(), '20151215', true);
    wp_enqueue_script('infinite-scroll.min', get_template_directory_uri() . '/js/infinite-scroll.min', array(), '20151215', true);
    wp_enqueue_script('parallax-min-js', get_template_directory_uri() . '/js/parallax.min.js', array(), '20151215', true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20151215', true);
    wp_enqueue_script('espira-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '20151218', true);

    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), '3.2.1', false);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_register_script('espira_custom_js', get_template_directory_uri() . '/js/search.js', array(), '2019020159', true);
    wp_enqueue_script('espira_custom_js');
    $espira_params = array(
        'admin_ajax_url' => admin_url('admin-ajax.php'),
        'site_name' => get_bloginfo('name'),
        'no_more_content_text' => __('Ingen flere innhold funnet.', 'espira'),
        'mandatory_msg' => __('Fyll ut alle nødvendige felt.', 'espira'),
        'email_valid_msg' => __('Riktig e-post må oppgis.', 'espira'),
    );
    wp_localize_script('espira_custom_js', 'espira_params', $espira_params);
}
add_action('wp_enqueue_scripts', 'espira_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the import kindergarden using api.
 */
require get_template_directory() . '/inc/import-kindergardens-corn.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/vendor/autoload.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

//require get_template_directory() . '/library/admin/widgets/widget_about.php';
require get_template_directory() . '/library/admin/widgets/latest_post.php';
require get_template_directory() . '/library/admin/widgets/post_casts.php';
require get_template_directory() . '/library/config_manager.php';

add_action('cmb2_admin_init', 'artilces');

function artilces()
{

    $prefix = 'category_';

    function wpdocs_custom_excerpt_length($length)
    {
        return 20;
    }
    add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);
    function wpdocs_excerpt_more($more)
    {
        if (!is_single()) {
            $more = sprintf('<a class="read-more" href="%1$s">%2$s</a>',
                get_permalink(get_the_ID()),
                __('Read More', 'espira')
            );
        }

        return $more;
    }
    add_filter('excerpt_more', 'wpdocs_excerpt_more');

    $cmb_term = new_cmb2_box(array(
        'id' => $prefix . 'edit',
        'title' => esc_html__('Category Metabox', 'cmb2'),
        'object_types' => array('term'),
        'taxonomies' => array('category', 'post_tag'),
    ));
    $cmb_term->add_field(array(
        'name' => esc_html__('Feature Image', 'cmb2'),
        'desc' => esc_html__('Add feature image for category.', 'cmb2'),
        'id' => $prefix . 'images',
        'type' => 'file',
    ));
}

if (!function_exists('post_pagination')):
    function post_pagination()
{
        global $wp_query;
        $pager = 999999999; // need an unlikely integer

        echo paginate_links(array(
            'base' => str_replace($pager, '%#%', esc_url(get_pagenum_link($pager))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
        ));
    }
endif;

//function custom_posts_per_page($query)
//{

 //   if ($query->is_archive('project')) {
        //set_query_var('posts_per_page', 1);
    //}
//}
//add_action('pre_get_posts', 'custom_posts_per_page');

add_action('cmb2_admin_init', 'kindergarden_category_thumbnail');

function kindergarden_category_thumbnail()
{
    $prefix = 'kindergarden_taxonomy_';
    $cmb_term = new_cmb2_box(array(
        'id' => $prefix . 'edit',
        'title' => esc_html__('Category Metabox', 'cmb2'),
        'object_types' => array('term'),
        'taxonomies' => array('kindergarden_category'),
    ));

    $cmb_term->add_field(array(
        'name' => esc_html__('Feature Image', 'cmb2'),
        'desc' => esc_html__('Add feature image for certificates.', 'cmb2'),
        'id' => $prefix . 'avatar',
        'type' => 'file',
    ));

    $cmb_term->add_field(array(
        'name' => esc_html__('Add Link', 'cmb2'),
        'desc' => esc_html__('Add link to show for certificate on kindergarden..', 'cmb2'),
        'id' => 'certificate_link',
        'type' => 'text',
    ));

    $cmb_term->add_field(array(
        'name' => 'Pick Color for certificates',
        'id' => 'kindergarden_category_color',
        'type' => 'text',
    ));

}

add_action('cmb2_admin_init', 'kindergarden_nutrition_term_meta');

function kindergarden_nutrition_term_meta()
{
    $prefix = 'nutrition_';
    $nutrition_term = new_cmb2_box(array(
        'id' => $prefix . 'edit',
        'title' => esc_html__('nutrition Metabox', 'cmb2'),
        'object_types' => array('term'),
        'taxonomies' => array('kindergarden_nutrition'),
    ));
   

    $nutrition_term->add_field(array(
        'name' => esc_html__('Background Image', 'cmb2'),
        'desc' => esc_html__('Add background image for nutrition.', 'cmb2'),
        'id' => $prefix . 'bg_img',
        'type' => 'file',
    ));

    $nutrition_term->add_field(array(
        'name' => esc_html__('Image', 'cmb2'),
        'desc' => esc_html__('Add image for nutrition.', 'cmb2'),
        'id' => $prefix . 'img',
        'type' => 'file',
    ));

}



add_action('cmb2_admin_init', 'kindergarden_department_thumbnail');

function kindergarden_department_thumbnail()
{
    $prefix = 'kindergarden_department';
    $cmb_term = new_cmb2_box(array(
        'id' => $prefix . 'edit',
        'title' => esc_html__('Department Metabox', 'cmb2'),
        'object_types' => array('term'),
        'taxonomies' => array('kindergarden_department'),
    ));

    $cmb_term->add_field(array(
        'name' => esc_html__('Feature Image', 'cmb2'),
        'desc' => esc_html__('Add feature image for bransje.', 'cmb2'),
        'id' => $prefix . 'avatar',
        'type' => 'file',
    ));
    $cmb_term->add_field(array(
        'name' => esc_html__('Add Link', 'cmb2'),
        'desc' => esc_html__('Add link for department to show on kindergarden.', 'cmb2'),
        'id' => 'department_link',
        'type' => 'text',
    ));

    $cmb_term->add_field(array(
        'name' => 'Pick Color for department',
        'id' => 'kindergarden_department_color',
        'type' => 'colorpicker',
        'default' => '#ffffff',
        'attributes' => array(
            'data-colorpicker' => json_encode(array(
                'palettes' => array('#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991'),
            )),
        ),
    ));
}
/*
if (!function_exists('espira_kindergarden_filter')) {
    function espira_kindergarden_filter()
    {
        $return_data = [];
        $return_html = '';
        $record_count = '';
        $return_full_map_html=$return_html='';
        $markers=[];

        $args = array(
            'post_type' => 'kindergarden',
            'post_status' => 'publish',
            'orderby' => 'name',
            'order' => 'ASC',
        );

        if ($_POST['posts_per_page']) {
            $args['posts_per_page'] = $_POST['posts_per_page'];
        }

        if ($_POST['paged']) {
            $args['paged'] = $_POST['paged'];
        }

        $query = new WP_Query($args);
        $total_record = $query->found_posts;
        $load_more_record = $total_record - $_POST['posts_per_page'] * $_POST['paged'];
        if ($load_more_record <= 0) {
            $load_more_record = 0;
        }

        if ($query->have_posts()) {
            // The Loop
            $return_full_map_html .="<div class='row'>\n";
            $return_full_map_html .="<div class='col-sm-4 col-md-4'>\n";
            while ($query->have_posts()) {
                $query->the_post();

                $return_html .= '<div class="rslt-col">
					<div class="rslt-listsec">
						<figure class="thumbnail-img search">';
                $kindergarden_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'post_image_l');
                if (!empty($kindergarden_thumbnail)) {
                    $return_html .= '<img src="' . $kindergarden_thumbnail . '" alt="Image">';
                } else {
                    $return_html .= '<img src="http://espira.indexportal.no/wp-content/themes/espira/images/espira-logo.png" alt="Image">';
                }
                $return_html .= '</figure>';
                $mapGPS = get_post_meta(get_the_ID(), 'visit_area', true);
                $post_id = get_the_ID();
                if ($mapGPS['latitude']) {
                    $return_html .= '<div class="map" id="map-' . $post_id . '" style="height: 350px;">' . $mapGPS['latitude'] . ',' . $mapGPS['longitude'] . ',15</div>';

                }
                $kindergarden_email = get_post_meta(get_the_ID(), 'email', true);
                $kindergarden_phone = get_post_meta(get_the_ID(), 'phone', true);

                $return_html .= '<div class="rslt-block nopad aligncenter">';
                $return_html .= '<div class="inner"><h4>' . get_the_title($post_id). '</h4>';
                $return_html .= '<ul><li>';
                $address=get_post_meta(get_the_ID(), 'visit_address', true) . ',' . get_post_meta(get_the_ID(), 'zip_code', true) . ' ' . get_post_meta(get_the_ID(), 'postal_place', true);
                $return_html .= '</li>';
                if (!empty($kindergarden_phone)) {
                    $return_html .= 'Tlf.: ' . $kindergarden_phone . '</li>';
                }
                if (!empty($kindergarden_email)) {
                    $return_html .= '<li> ' . $kindergarden_email . '</li>';
                }
                $return_html .= '</ul></div></div><div class="btn-center">
                                    <a href="' . get_the_permalink() . '" class="rsltbtn"> ' . __("BESØK BARNEHAGE", "espira") . '</a></div>';
                $return_html .= '</div></div>';

                $title=get_the_title($post_id);
                    $return_full_map_html .="<div class=\"rslt-listsec\">\n<div class=\"rslt-block\">\n";
                    $return_full_map_html .="<h4 style=\"text-transform: uppercase; \">".$title."</h4>\n";
                    $return_full_map_html .= "<ul>\n<li>\n";
                    // $address=get_post_meta($post_id, 'visit_address', true) . ',' . get_post_meta($post_id, 'zip_code', true) . ' ' . get_post_meta($post_id, 'postal_place', true);
                    $return_full_map_html .=$address;
                    $return_full_map_html .= "</li>\n";
                    if (!empty($kindergarden_phone)) {
                        $return_full_map_html .= '<li> Tlf.: ' . $kindergarden_phone . '</li>';
                    }
                    if (!empty($kindergarden_email)) {
                        $return_full_map_html .= '<li> ' . $kindergarden_email . '</li>';
                    }
                    $link='<a href="' . get_post_permalink($post_id) . '" class="rsltbtn"> ' . __("BESØK BARNEHAGE", "espira") . '</a>';

                    $return_full_map_html .= '</ul>
                                        <a href="' . get_post_permalink($post_id) . '" class="rsltbtn"> ' . __("BESØK BARNEHAGE", "espira") . '</a>';
                    $return_full_map_html .= '</div></div>';
                    $markers []=[$title,(double)$mapGPS['latitude'],(double)$mapGPS['longitude'],$post_id];
                    // $marker_contents[]=["<h4>".$title."</h4>"];
                    $marker_contents[]=["<h4>".$title."</h4><p>".$address."</p><p>".$link."</p>"];

            }
            $return_full_map_html .="</div><!--col-md-4 ends-->\n";
            
            $return_full_map_html .="<div class=\"col-sm-8 col-md-8\">\n";
            $return_full_map_html .="<div class=\"rslt-map\" id='map-multiple-kindergardens' style=\"height:100%; min-height: 682px;\">\n";
            //$return_full_map_html .=   '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61291610.229767844!2d17.880163669532557!3d20.343972991065442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da22a754b0b5d9%3A0x4b0340a3e4c71f25!2sThe%20Espira!5e0!3m2!1sen!2snp!4v1569949567238!5m2!1sen!2snp" width="100%" height="675" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';

            $return_full_map_html .= "</div>\n";
            $return_full_map_html .="</div><!--col-md-8 ends-->\n";
            $return_full_map_html .="</div><!--row ends-->\n";

            $return_data['status'] = 'success';
            $return_data['html'] = $return_html;
            $record_message = sprintf(esc_html(_n('%d COMPANY MATCHES YOUR SEARCH CRITERIA', '%d COMPANIES MATCH YOUR SEARCH CRITERIA', $record_count, 'espira')), $record_count);
            $return_data['record_count'] = $record_message;
            $return_data['total_record'] = $total_record;
            $return_data['full_map_html']=$return_full_map_html;
            $return_data['markers']=$markers;
            $return_data['marker_contents']=$marker_contents;
            $return_data['center']=[$markers[0][1],$markers[0][2]];
            $return_data['load_more_text'] = __('Vis flere aktører', 'espira') . '(' . $load_more_record . ')';

            echo json_encode($return_data);
            exit();
            wp_reset_postdata();
        }
        $return_data['status'] = 'success';
        $return_data['noresult'] = true;
        $return_data['html'] = '<p class="no_result">No result Found</p>';
        $return_data['total_record'] = $total_record;

        echo json_encode($return_data);
        exit();
    }

}
add_action('wp_ajax_espira_kindergarden_filter', 'espira_kindergarden_filter');
add_action('wp_ajax_nopriv_espira_kindergarden_filter', 'espira_kindergarden_filter');
*/
// collecting meta data for search location from database

function get_meta_location($key = '', $type = 'post', $status = 'publish')
{

    global $wpdb;

    if (empty($key)) {
        return;
    }

    $r = $wpdb->get_col($wpdb->prepare("
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s
        AND p.post_status = %s
        AND p.post_type = %s
    ", $key, $status, $type));

    return $r;
}


if (!function_exists('espira_kindergarden_map_search')) {
    function espira_kindergarden_map_search()
    {
        global $wpdb;
       
        $latitude=$_POST['lat'];
        $longitude=$_POST['lng'];
        $municipality=$_POST['municipality'];
        $zipcode=$_POST['zipcode'];
        $distance=$_POST['distance']??20;//in km
        // Radius of the earth 3959 miles or 6371 kilometers.
        $earth_radius = 6371;
        $return_full_map_html=$return_html='';
        $markers=[];

        if (isset($_POST['posts_per_page'])) {
            $items_per_page = $_POST['posts_per_page'];
        }else{
            $items_per_page =6;
        }
        $qry='';
        if($municipality!=''){
            $qry .=" AND mun.meta_value='".$municipality."' ";

        }
        if($zipcode!=''){
            $qry .=" AND zip.meta_value='".$zipcode."' ";
        }


    
       
        $page = isset( $_POST['paged'] ) ? abs( (int) $_POST['paged'] ) : 2; //some how  set the initial paged varialbe to 2 so decreased in here
        $offset = ( $page * $items_per_page ) - $items_per_page;

        if($latitude=='' && $longitude==''){
            $sql=$wpdb->prepare(  "SELECT DISTINCT
            p.ID,
            p.post_title
            FROM $wpdb->posts p
            LEFT JOIN $wpdb->postmeta mun ON p.ID=mun.post_id AND mun.meta_key='fylke'
            LEFT JOIN $wpdb->postmeta zip ON p.ID=zip.post_id AND zip.meta_key='postal_place'
            WHERE 1 = 1
            ".($qry??'')."
            AND p.post_type = 'kindergarden'
            AND p.post_status = 'publish'
            ORDER BY p.ID ASC ",
            $offset,
            $items_per_page
            );
            $total_record_sql=$wpdb->prepare(  "SELECT DISTINCT
            p.ID,
            p.post_title
            FROM $wpdb->posts p
            LEFT JOIN $wpdb->postmeta mun ON p.ID=mun.post_id AND mun.meta_key='fylke'
            LEFT JOIN $wpdb->postmeta zip ON p.ID=zip.post_id AND zip.meta_key='postal_place'
            WHERE 1 = 1
            ".($qry??'')."
            AND p.post_type = 'kindergarden'
            AND p.post_status = 'publish'
            ORDER BY p.ID ASC",
            $offset,
            $items_per_page
            );

        }else{
            $sql = $wpdb->prepare( "
            SELECT DISTINCT
                p.ID,
                p.post_title,
                TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 2),\":\",-1)) as locLat,
                TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 4),\":\",-1)) as locLong,
                ( %d * acos(
                cos( radians( %s ) )
                * cos( radians( TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 2),\":\",-1))  ) )
                * cos( radians( TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 4),\":\",-1))  ) - radians( %s ) )
                + sin( radians( %s ) )
                * sin( radians(TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 2),\":\",-1))  ) )
                ) )
                AS distance
            FROM $wpdb->posts p
            INNER JOIN $wpdb->postmeta pm ON p.ID = pm.post_id AND pm.meta_key = 'visit_area'
            LEFT JOIN $wpdb->postmeta mun ON p.ID=mun.post_id AND mun.meta_key='fylke'
            LEFT JOIN $wpdb->postmeta zip ON p.ID=zip.post_id AND zip.meta_key='postal_place'
            WHERE 1 = 1
            ".($qry??'')."
            AND p.post_type = 'kindergarden'
            AND p.post_status = 'publish'
            HAVING distance < %s
            ORDER BY distance ASC ",
            $earth_radius,
            $latitude,
            $longitude,
            $latitude,
            $distance

        );
        $total_record_sql = $wpdb->prepare( "
            SELECT DISTINCT
                p.ID,
                p.post_title,
                TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 2),\":\",-1)) as locLat,
                TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 4),\":\",-1)) as locLong,
                ( %d * acos(
                cos( radians( %s ) )
                * cos( radians( TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 2),\":\",-1))  ) )
                * cos( radians( TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 4),\":\",-1))  ) - radians( %s ) )
                + sin( radians( %s ) )
                * sin( radians(TRIM(BOTH '\"' FROM SUBSTRING_INDEX(SUBSTRING_INDEX(pm.meta_value, \";\", 2),\":\",-1))  ) )
                ) )
                AS distance
            FROM $wpdb->posts p
            INNER JOIN $wpdb->postmeta pm ON p.ID = pm.post_id AND pm.meta_key = 'visit_area'
            LEFT JOIN $wpdb->postmeta mun ON p.ID=mun.post_id AND mun.meta_key='fylke'
            LEFT JOIN $wpdb->postmeta zip ON p.ID=zip.post_id AND zip.meta_key='postal_place'
            WHERE 1 = 1
            ".($qry??'')."
            AND p.post_type = 'kindergarden'
            AND p.post_status = 'publish'
            HAVING distance < %s
            ORDER BY distance ASC",
            $earth_radius,
            $latitude,
            $longitude,
            $latitude,
            $distance

        );

        }

        // echo $sql;exit;
        $list = $wpdb->get_results( $sql );

        $total_record_query = $wpdb->get_results( $total_record_sql );
        $total_record=count($total_record_query);
        // echo $total_record;exit;
        $load_more_record = $total_record - $page * $items_per_page;
        // echo $load_more_record;exit;
        if ($load_more_record <= 0) {
            $load_more_record = 0;
        }
        $fylke=[];
        $fylke_options = "<option value=''>Fylke</option>";
        if($total_record_query){
            foreach($total_record_query as $kindergarden){
                $current=get_post_meta($kindergarden->ID, 'fylke', true);
                if($current!=''){
                    if (!in_array($current, $fylke)){
                        $fylke_options .= "<option value='".$current."'>".$current."</option>";
                        $fylke[]=$current;
                    }
                    
                }
                

            }

        }
        

        if(count($list)){
            $return_full_map_html .="<div class='row'>\n";
            $return_full_map_html .="<div class='col-sm-4 col-md-4' style='overflow-y: auto;height: 682px;'>\n";
            // $markers .="";
            // echo "here";exit;
            foreach($list as $li){
                $title=get_the_title($li->ID);
                $return_html .= '<div class="rslt-col">
                        <div class="rslt-listsec">
                            <figure class="thumbnail-img search check">';
                            $kindergarden_thumbnail = get_the_post_thumbnail_url($li->ID, 'post_image_l');
                            // $return_html .=$kindergarden_thumbnail;
                            if (!empty($kindergarden_thumbnail))  { 
                                $return_html .= ' <img src="' . $kindergarden_thumbnail . '" alt="Image">';
                             } 
                             else  {
                                $feature_galleries = get_post_meta($post_id, 'feature_galleries', true);
                                if(!empty($feature_galleries)){
                                    $i=0;
                                        foreach ($feature_galleries as $feature_gallery) {
                                            if ($i < 1) {
                                                $return_html .= '<img src="' . $feature_gallery . '" class="img-fluid">';
                                             } 
                                         }
                                    $i++; 
                                }
                                else{
                                    $return_html .= '<img src="http://espira.indexportal.no/wp-content/themes/espira/images/espira-logo.png" class="default_search_image ajax_load" alt="Image">';

                                }


                            } 
                        $return_html .= '</figure>';
                    // $return_html .= ' <figure class="thumbnail-img search">';
                    // $kindergarden_thumbnail = get_the_post_thumbnail_url($li->ID, 'post_image_l');
                    // if (!empty($kindergarden_thumbnail)) {
                    //     $return_html .= '<img src="' . $kindergarden_thumbnail . '" alt="Image">';
                    // } else {
                    //     $return_html .= '<img src="http://espira.indexportal.no/wp-content/themes/espira/images/espira-logo.png" alt="Image">';
                    // }
                    // $return_html .= '</figure>';
                    $mapGPS = get_post_meta($li->ID, 'visit_area', true);
                    $post_id = $li->ID;
                    // if ($mapGPS['latitude']) {
                    //     $return_html .= '<div class="map" id="map-' . $post_id . '" style="height: 350px;">' . $mapGPS['latitude'] . ',' . $mapGPS['longitude'] . ',15</div>';
    
                    // }
                    $kindergarden_email = get_post_meta($post_id, 'email', true);
                    $kindergarden_phone = get_post_meta($post_id, 'phone', true);
    
                    $return_html .= '<div class="rslt-block nopad aligncenter">';
                    $return_html .= '<div class="inner"><h4>' . $title. '</h4>';
                    $return_html .= '<ul><li>';
                    $address=get_post_meta($post_id, 'visit_address', true) . ',' . get_post_meta($post_id, 'zip_code', true) . ' ' . get_post_meta($post_id, 'postal_place', true);
                    $return_html .=$address;
                    $return_html .= '</li>';
                    if (!empty($kindergarden_phone)) {
                        $return_html .= '<li>Tlf.: ' . $kindergarden_phone . '</li>';
                    }
                    if (!empty($kindergarden_email)) {
                        $return_html .= '<li> ' . $kindergarden_email . '</li>';
                    }
                    $return_html .= '</ul></div></div><div class="btn-center">
                                        <a href="' . get_post_permalink($post_id) . '" class="rsltbtn"> ' . __("BESØK BARNEHAGE", "espira") . '</a></div>';
                    $return_html .= '</div></div>';

                   
                    $return_full_map_html .="<div class=\"rslt-listsec\">\n<div class=\"rslt-block\" id=\"".$post_id."\">\n";
                    $return_full_map_html .="<h4 style=\"text-transform: uppercase; \">".$title."</h4>\n";
                    $return_full_map_html .= "<ul>\n<li>\n";
                    // $address=get_post_meta($post_id, 'visit_address', true) . ',' . get_post_meta($post_id, 'zip_code', true) . ' ' . get_post_meta($post_id, 'postal_place', true);
                    $return_full_map_html .=$address;
                    $return_full_map_html .= "</li>\n";
                    if (!empty($kindergarden_phone)) {
                        $return_full_map_html .= '<li> Tlf.: ' . $kindergarden_phone . '</li>';
                    }
                    if (!empty($kindergarden_email)) {
                        $return_full_map_html .= '<li> ' . $kindergarden_email . '</li>';
                    }
                    $link='<a href="' . get_post_permalink($post_id) . '" class="rsltbtn"> ' . __("BESØK BARNEHAGE", "espira") . '</a>';
                    $return_full_map_html .= '</ul>';
                    $return_full_map_html .=$link;
                                        // '<a href="' . get_post_permalink($post_id) . '" class="rsltbtn"> ' . __("BESØK BARNEHAGE", "espira") . '</a>'';
                    $return_full_map_html .= '</div></div>';
                    $markers []=[$title,(double)$mapGPS['latitude'],(double)$mapGPS['longitude'],$post_id];
                    $marker_contents[]=["<h4>".$title."</h4><p>".$address."</p><p>".$link."</p>"];
            }
            
            $return_full_map_html .="</div><!--col-md-4 ends-->\n";
            
            $return_full_map_html .="<div class=\"col-sm-8 col-md-8\">\n";
            $return_full_map_html .="<div class=\"rslt-map\" id='map-multiple-kindergardens' style=\"height: 682px;\">\n";
            //$return_full_map_html .=   '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61291610.229767844!2d17.880163669532557!3d20.343972991065442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da22a754b0b5d9%3A0x4b0340a3e4c71f25!2sThe%20Espira!5e0!3m2!1sen!2snp!4v1569949567238!5m2!1sen!2snp" width="100%" height="675" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';

            $return_full_map_html .= "</div>\n";
            $return_full_map_html .="</div><!--col-md-8 ends-->\n";
            $return_full_map_html .="</div><!--row ends-->\n";
            $return_data['status'] = 'success';
            $return_data['html'] = $return_html;
            $return_data['full_map_html']=$return_full_map_html;
            $return_data['markers']=$markers;
            $return_data['marker_contents']=$marker_contents;
            $record_message = sprintf(esc_html(_n('%d COMPANY MATCHES YOUR SEARCH CRITERIA', '%d COMPANIES MATCH YOUR SEARCH CRITERIA', $total_record, 'espira')), $record_count);
            // $return_data['record_count'] = $record_message;
            $return_data['total_record'] = $total_record;
            $return_data['load_more_record']=$load_more_record;
            sort($fylke);
            $return_data['fylke']=$fylke_options;
            if($latitude && $longitude)
                $return_data['center']=[$latitude,$longitude];
            $return_data['load_more_text'] = __('Vis flere aktører', 'espira') . '(' . $load_more_record . ')';
            echo json_encode($return_data);
            exit();

        }
    //    echo "there";exit;
        
        $return_data['status'] = 'success';
        $return_data['noresult'] = true;
        $return_data['html'] = '<p class="no_result">Inget resultat</p>';
        $return_data['total_record'] = $total_record;
         echo json_encode($return_data); 
        exit();
        
    }

}
add_action('wp_ajax_espira_kindergarden_map_search', 'espira_kindergarden_map_search');
add_action('wp_ajax_nopriv_espira_kindergarden_map_search', 'espira_kindergarden_map_search');


if (!function_exists('espira_kindergarden_sted_of_fylke')) {
    function espira_kindergarden_sted_of_fylke()
    {
        global $wpdb;
       
        $fylke=$_POST['fylke'];
       
        
            $sql=$wpdb->prepare(  "SELECT DISTINCT
            zip.meta_value as sted
            FROM $wpdb->posts p
            LEFT JOIN $wpdb->postmeta mun ON p.ID=mun.post_id AND mun.meta_key='fylke'
            LEFT JOIN $wpdb->postmeta zip ON p.ID=zip.post_id AND zip.meta_key='postal_place'
            WHERE 1 = 1
            AND mun.meta_value=%s
            AND p.post_status = 'publish'
            AND p.post_type = 'kindergarden'
	AND zip.meta_value <> ''
            ORDER BY p.ID ASC",
            $fylke
            );
        // echo $sql;exit;
        $list = $wpdb->get_results( $sql );
	sort($list);
        $return_html='';
        if($list){
            $return_html .="<option value=''>Sted</option>\n";
            foreach($list as $li){
                $return_html .="<option value='".$li->sted."'>".$li->sted."</option>\n";
            }
        }
        $return_data['status'] = 'success';
        $return_data['html']=$return_html;
        $return_data['data'] = $list;
       
         echo json_encode($return_data); 
        exit();
        
    }

}
add_action('wp_ajax_espira_kindergarden_sted_of_fylke', 'espira_kindergarden_sted_of_fylke');
add_action('wp_ajax_nopriv_espira_kindergarden_sted_of_fylke', 'espira_kindergarden_sted_of_fylke');

function load_category_post() {
	$return_data = [];
    $return_html = '';
	$args = array(
        'post_type' => 'post', 
		'post_status'=>'publish',	
		'orderby'   => 'name',
        'order'     => 'ASC',
	);
	if($_POST['posts_per_page']){
		$args['posts_per_page'] = $_POST['posts_per_page'];
	}
	if($_POST['paged']){
		$args['paged'] = $_POST['paged'];
	}
	if($_POST['cat_name']){
		$args['category_name'] = $_POST['cat_name'];
	}
	$espira_post = new WP_Query( $args );
	$total_record = $espira_post->found_posts;
	$load_more_record = $total_record - $_POST['posts_per_page'] * $_POST['paged'];	
	if($load_more_record <= 0){
		$load_more_record = 0;
	}
	if ( $espira_post->have_posts() ) {
	  // The Loop
	  while ( $espira_post->have_posts() ) {
		$espira_post->the_post();
        $return_html .='<div class="col-md-4 col-sm-4">
                <div class="artitab-withimg">
                    <a href="'.get_the_permalink().'">';
                    
                    if(has_post_thumbnail()) { 
                        $return_html .= '<figure class="thumbnail-img">
                        <img src="'.get_the_post_thumbnail_url().'">
                    </figure>';
                     } else {
                        $return_html .= '<figure class="thumbnail-img cat-feature">
                        <img src="http://espira.indexportal.no/wp-content/themes/espira/images/espira-logo.png">
                    </figure>';
                   }
                   $return_html .= '</a>
                    <div class="artitab-withimg-container">
                        <div class="artitab-artipublish">'. get_the_date( 'j. F Y' );  
                        $return_html .= '</div>
                        <h4>"'.get_the_title().'"</h4>
                        <a href="'.get_the_permalink().'" class="konsern-nyheter-single-btn"><span>LES ARTIKKELEN</span> &gt;&gt;</a>
                    </div>
                </div>                
            </div>';            
         
        }
				$return_data['status'] = 'success';
			     $return_data['html'] = $return_html;
				$return_data['load_more_text'] = __('Vis flere aktører', 'espira');

				echo json_encode($return_data);
				exit();  
   
	  wp_reset_postdata();
	
	}

	$return_data['status'] = 'success';
	$return_data['noresult'] = true;
	$return_data['html'] = '<p class="no_result">No result Found</p>';	


	echo json_encode($return_data);
	exit();
}

add_action( 'wp_ajax_load_category_post', 'load_category_post' );
add_action( 'wp_ajax_nopriv_load_category_post', 'load_category_post' );

function load_tag_post() {
	$return_data = [];
    $return_html = '';
	$args = array(
        'post_type' => 'post', 
		'post_status'=>'publish',	
		'orderby'   => 'name',
        'order'     => 'ASC',
	);
	if($_POST['posts_per_page']){
		$args['posts_per_page'] = $_POST['posts_per_page'];
	}
	if($_POST['paged']){
		$args['paged'] = $_POST['paged'];
	}
	if($_POST['tag_id']){
		$args['tag_id'] = $_POST['tag_id'];
	}
	$espira_post = new WP_Query( $args );
	$total_record = $espira_post->found_posts;
	$load_more_record = $total_record - $_POST['posts_per_page'] * $_POST['paged'];	
	if($load_more_record <= 0){
		$load_more_record = 0;
	}
	if ( $espira_post->have_posts() ) {
	  // The Loop
	  while ( $espira_post->have_posts() ) {
		$espira_post->the_post();
        $return_html .='<div class="col-md-4 col-sm-4">
                <div class="artitab-withimg">
                    <a href="'.get_the_permalink().'">';
                    
                    if(has_post_thumbnail()) { 
                        $return_html .= '<figure class="thumbnail-img">
                        <img src="'.get_the_post_thumbnail_url().'">
                    </figure>';
                     } else {
                        $return_html .= '<figure class="thumbnail-img cat-feature">
                        <img src="http://espira.indexportal.no/wp-content/themes/espira/images/espira-logo.png">
                    </figure>';
                   }
                   $return_html .= '</a>
                    <div class="artitab-withimg-container">
                        <div class="artitab-artipublish">'. get_the_date( 'j. F Y' );  
                        $return_html .= '</div>
                        <h4>"'.get_the_title().'"</h4>
                        <a href="'.get_the_permalink().'" class="konsern-nyheter-single-btn"><span>LES ARTIKKELEN</span> &gt;&gt;</a>
                    </div>
                </div>                
            </div>';            
         
        }
				$return_data['status'] = 'success';
			     $return_data['html'] = $return_html;
				$return_data['load_more_text'] = __('Vis flere aktører', 'espira');

				echo json_encode($return_data);
				exit();  
   
	  wp_reset_postdata();
	
	}

	$return_data['status'] = 'success';
	$return_data['noresult'] = true;
	$return_data['html'] = '<p class="no_result">No result Found</p>';	


	echo json_encode($return_data);
	exit();
}

add_action( 'wp_ajax_load_tag_post', 'load_tag_post' );
add_action( 'wp_ajax_nopriv_load_tag_post', 'load_tag_post' );


//Set a default taxonomy term for Custom Post Type
function mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status && $post->post_type ===  'kindergarden' ) {
        $defaults = array(
            'kindergarden_nutrition' => array( 'sunn-riktig-og-variert-ernaering' ),
            'kindergarden_category' => array( 'skolespira-for-de-eldste-barna-i-barnehagen' )
        );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
        $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
            wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'mfields_set_default_object_terms', 100, 2 );

add_filter( 'register_post_type_args', 'wpse247328_register_post_type_args', 10, 2 );
function wpse247328_register_post_type_args( $args, $post_type ) {

    if ( 'kindergarden' === $post_type ) {
        $args['rewrite']['slug'] = 'barnehage';
    }

    return $args;
}