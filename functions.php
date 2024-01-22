<?php
//require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/plugins/redux/ReduxCore/framework.php';
require_once get_template_directory() . '/plugins/redux/sample/sample-config.php';
//require_once get_template_directory() . '/plugins/custom-post-type/crismaster_post_type.php';
//require_once get_template_directory() . '/plugins/cmb2/init.php';
//require_once get_template_directory() . '/plugins/cmb2/example-functions.php';
require_once get_template_directory() . '/plugins/widget/widgets.php';
require_once get_template_directory() . '/plugins/custom-visual/ve-chung-toi.php';
require_once get_template_directory() . '/plugins/custom-visual/linh-vuc-hoat-dong.php';
require_once get_template_directory() . '/plugins/custom-visual/thanh-tuu.php';
require_once get_template_directory() . '/plugins/custom-visual/hsh-tin-tuc.php';
require_once get_template_directory() . '/plugins/custom-visual/p2-thong-diep-chu-tich.php';
require_once get_template_directory() . '/plugins/custom-visual/p2-lich-su-thanh-lap.php';
require_once get_template_directory() . '/plugins/custom-visual/p2-tam-nhin-su-menh.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-linh-vuc-hoat-dong.php';
require_once get_template_directory() . '/plugins/custom-visual/p4-list-tin-tuc.php';
require_once get_template_directory() . '/plugins/custom-visual/p5-tuyen-dung.php';
require_once get_template_directory() . '/plugins/custom-visual/p5-tuyen-dung-2.php';
require_once get_template_directory() . '/plugins/custom-visual/lvc-banner.php';
require_once get_template_directory() . '/plugins/custom-visual/lvc-list-san-pham.php';
require_once get_template_directory() . '/plugins/custom-visual/lvc-gioi-thieu.php';
require_once get_template_directory() . '/plugins/custom-visual/lvc-post-sidebar.php';

// @ini_set( 'upload_max_size' , '64M' );
// @ini_set( 'post_max_size', '64M');
// @ini_set( 'max_execution_time', '300' );
//Theme Set up:
function crismaster_theme_setup() {
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
//	add_theme_support ('title-tag');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list','gallery', ) );

//	register_nav_menus( array(
//		'primary' => esc_html__('Menu sử dụng cho tất cả các page','crismaster'),
//		'second' => esc_html__('Second Navigation Menu (Menu For Home Page With Scroll menu)','crismaster'),
//    ) );
//    add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'crismaster_theme_setup' );

function crismaster_theme_scripts_styles(){
    $mobile = wp_is_mobile();
    /**** Theme Specific CSS ****/
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/css/bootstrap.css',array());
    wp_enqueue_style( 'font-css', get_template_directory_uri() .'/assets/font/fontawesome-free-6.0.0-web/css/all.min.css',array());
    wp_enqueue_style( 'font-css-2', get_template_directory_uri() .'/assets/css/font-family.css',array(),'1.0.2');
    wp_enqueue_style( '2-css', get_template_directory_uri() .'/assets/css/owl.carousel.css',array());
    wp_enqueue_style( '3-css', get_template_directory_uri() .'/assets/css/owl.theme.css',array());
    wp_enqueue_style( '4-css', get_template_directory_uri() .'/assets/css/owl.transitions.css',array());

    if (is_page_template('template/linh-vuc-con-fullpage.php')
        || is_page_template('template/linh-vuc-con-fullpage-2.php')
        || is_page_template('template/linh-vuc-con-fullpage-3.php')
        ) {
        wp_enqueue_style( 'fullpage-css', get_template_directory_uri() .'/assets/css/fullpage.min.css',array());
        wp_enqueue_style('lvc-main-css', get_template_directory_uri() . '/assets-lvc/css/main.css', array());
        wp_enqueue_style('lvc-header-css', get_template_directory_uri() . '/assets-lvc/css/header.css', array());
        wp_enqueue_style('lvc-footer-css', get_template_directory_uri() . '/assets-lvc/css/footer.css', array());
        wp_enqueue_style('lvc-custom-css', get_template_directory_uri() . '/assets-lvc/css/customcss.css', array(),'1.0.0');

        wp_enqueue_script("jquery-min", get_template_directory_uri()."/assets/js/libraries/jquery.min.js",array(),true,false);
        wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js",array(),true,false);
        wp_enqueue_script("map-js", "https://maps.googleapis.com/maps/api/js?key=AIzaSyAlZDuxldYtZzVxBMRnGJrwAcLBEGB2v8s",array(),true,false);
        wp_enqueue_script("owl-carousel-js", get_template_directory_uri()."/assets/js/owl.carousel.js",array(),true,false);
        wp_enqueue_script("5-js", get_template_directory_uri()."/assets/js/fullpage.js",array(),true,false);
        wp_enqueue_script("lvc-custom-js", get_template_directory_uri()."/assets-lvc/js/custom.js",array(),'1.0.3',false);
    }else{
        //    wp_enqueue_style( 'font-css-3', 'https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap',array());
        wp_enqueue_style( 'main-css', get_template_directory_uri() .'/assets/css/main.css',array(),'1.0.4');
        wp_enqueue_style( 'slide-css', get_template_directory_uri() .'/assets/css/slide.css',array());
//    wp_enqueue_style( 'header-css', get_template_directory_uri() .'/assets/css/header.css',array());
        wp_enqueue_style( 'footer-css', get_template_directory_uri() .'/assets/css/footer.css',array(),'1.0.1');
        wp_enqueue_style( 'response-css', get_template_directory_uri() .'/assets/css/responsive.css',array(),'1.0.1');
        wp_enqueue_style( 'fullpage-css', get_template_directory_uri() .'/assets/css/fullpage.min.css',array());
        wp_enqueue_style( 'mystyle', get_template_directory_uri() .'/style.css',array(),'1.1.9');
        /**** Start Jquery ****/
        wp_enqueue_script("jquery-min", get_template_directory_uri()."/assets/js/libraries/jquery.min.js",array(),true,false);
        wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js",array(),true,false);
        wp_enqueue_script("map-js", "https://maps.googleapis.com/maps/api/js?key=AIzaSyAlZDuxldYtZzVxBMRnGJrwAcLBEGB2v8s",array(),true,false);
        wp_script_add_data("map-js", "async", true);
        wp_script_add_data("map-js", "defer", true);
        wp_enqueue_script("2-js", get_template_directory_uri()."/assets/js/plugins/sweetalert2/sweetalert2.min.js",array(),true,false);
        wp_enqueue_script("3-js", get_template_directory_uri()."/assets/js/main.js",array(),true,false);
        wp_enqueue_script("4-js", get_template_directory_uri()."/assets/js/app.js",array(),true,false);
        wp_enqueue_script("5-js", get_template_directory_uri()."/assets/js/fullpage.js",array(),true,false);
        wp_enqueue_script("owl-carousel-js", get_template_directory_uri()."/assets/js/owl.carousel.js",array(),true,false);
        wp_enqueue_script("iconify-js", "https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js",array(),true,false);
        wp_enqueue_script("custom-js", get_template_directory_uri()."/assets/js/custom.js",array(),'1.0.2',false);
        wp_localize_script('3-js', 'themeData', array(
            'direc_url' => get_template_directory_uri().'/assets/'
        ));
        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
        wp_localize_script('custom-js', 'themeData', array(
            'current_lang' => $current_language
        ));
    }

}
add_action( 'wp_enqueue_scripts', 'crismaster_theme_scripts_styles' );

function crismaster_breadcrumbs() {
    // / === OPTIONS === /
    $text['home']     = esc_html__('Trang chủ','crismaster'); // text for the 'Home' link
    $text['category'] = esc_html__('%s','crismaster'); // text for a category page
    $text['tax']      = esc_html__('%s','crismaster'); // text for a taxonomy page
    $text['search']   = esc_html__('Tìm kiếm "%s"','crismaster'); // text for a search results page
    $text['tag']      = esc_html__('Tags "%s"','crismaster'); // text for a tag page
    $text['author']   = esc_html__('Articles Posted by %s','crismaster'); // text for an author page
    $text['404']      = esc_html__('Error 404','crismaster'); // text for the 404 page

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = ''; // tag before the current crumb
    $after       = ''; // tag after the current crumb
    // / === END OF OPTIONS === /
    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '';
    $linkAfter = '';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a><span>/</span>' . $linkAfter;
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<span class=""><a href="' . $homeLink . '" class="pathway"><i class=""></i>' . $text['home'] . '</a></span>';
    } else {
        echo '' . sprintf($link, $homeLink, '<i class="fa fa-home"></i> '.$text['home']) . $delimiter;
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<span><a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a></span>' . $linkAfter, $cats);
                echo wp_specialchars_decode($cats);
            }
            echo wp_specialchars_decode($before .'<h1>'. sprintf($text['category'].'</h1>', single_cat_title('', false)) . $after);
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo wp_specialchars_decode($cats);
            }
            echo wp_specialchars_decode($before . sprintf($text['tax'], single_cat_title('', false)) . $after);
        }elseif ( is_search() ) {
            echo wp_specialchars_decode($before . sprintf($text['search'], get_search_query()) . $after);
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo wp_specialchars_decode($before . get_the_time('d') . $after);
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo wp_specialchars_decode($before . get_the_time('F') . $after);
        } elseif ( is_year() ) {
            echo wp_specialchars_decode($before . get_the_time('Y') . $after);
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before .'' . $after);
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, FALSE, '');
                // $cats2 = explode(',',$cats);
                // $cats = $cats2[0];
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<span><a', $linkBefore . '<span><a' . $linkAttr, $cats);
                $cats = str_replace('</a></span>', '</a></span>' . $linkAfter, $cats);
                echo '<span class="cus-span">'.$cats.'</span>';
                if ($showCurrent == 1) echo wp_specialchars_decode($before . $after);
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo wp_specialchars_decode($before . $post_type->labels->singular_name . $after);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo wp_specialchars_decode($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before . get_the_title() . $after);
        } elseif ( is_page() && !$post->post_parent ) {

            if ($showCurrent == 1) echo wp_specialchars_decode($before . get_the_title() . $after);
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo wp_specialchars_decode($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1) echo wp_specialchars_decode($delimiter);
            }
            if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before . get_the_title() . $after);
        } elseif ( is_tag() ) {
            echo wp_specialchars_decode($before . sprintf($text['tag'], single_tag_title('', false)) . $after);
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo wp_specialchars_decode($before . sprintf($text['author'], $userdata->display_name) . $after);
        } elseif ( is_404() ) {
            echo wp_specialchars_decode($before .'<span>'. $text['404'].'</span>' . $after);
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
    }
}

function crismaster_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar - Trang xúc tiến thương mại', 'crismaster' ),
        'id'            => 'sidebar-1',
        'class'         => '',
        'description'   => esc_html__( 'Sidebar sẽ xuất hiện ở trang xúc tiến thương mại.', 'crismaster' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'crismaster_widgets_init' );

function crismaster_search_form( $form ) {
    $form = '
    <form action="' . esc_attr(home_url( '/' )) .'" method="GET">
	<input type="text" name="s" placeholder="Quý khách tìm gì?" autocomplete="off" value= "' . get_search_query() . '">
	<button type="submit"><i class="fa fa-search"></i></button>
	<input type="hidden" name="post_type" value="productt">
    </form>
    ';
    return $form;
}
add_filter( 'get_search_form', 'crismaster_search_form' );

function crismaster_pagination() {
    if( is_singular() )
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged == 1 && $max > 2 )
        $links[] = $paged + 2 ;
    /** Add the pages around the current page to the array */
    if ( $paged >= 2 ) {
        $links[] = $paged - 1;
    }
    if ( ( $paged + 1 ) <= $max ) {
        $links[] = $paged + 1;
    }
    if ( $paged == $max && $max > 2 )
        $links[] = $paged - 2 ;
    /** Previous Post Link */
    $next_page_exists = get_next_posts_link(null, $wp_query->max_num_pages) !== null;
    $prev_page_exists = get_previous_posts_link(null) !== null;
    if ( $prev_page_exists )
        printf( get_previous_posts_link('&laquo;') );
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? 'active' : '';
        printf( '<a class="nav-number %s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Next Post Link */
    if ( $next_page_exists )
//        printf( '<a class="nav-number">%s</a>' . "\n", get_next_posts_link('&raquo;') );
        printf( get_next_posts_link('&raquo;'));
}

function wp_get_menu_array($current_menu='Main Menu') {

    $menu_array = wp_get_nav_menu_items($current_menu);
    $menu = array();



    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['object_id'] = $m->object_id;
            $menu[$m->ID]['children'] = populate_children($menu_array, $m);
        }
    }

    return $menu;

}
function populate_children($menu_array, $menu_item)
{
    $children = array();
    if (!empty($menu_array)){
        foreach ($menu_array as $k=>$m) {
            if ($m->menu_item_parent == $menu_item->ID) {
                $children[$m->ID] = array();
                $children[$m->ID]['ID'] = $m->ID;
                $children[$m->ID]['title'] = $m->title;
                $children[$m->ID]['url'] = $m->url;
                $children[$m->ID]['object_id'] = $m->object_id;
                unset($menu_array[$k]);
                $children[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    };
    return $children;
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

//function cris_theme_setup(){
//    load_theme_textdomain( 'crismaster',  get_template_directory() . '/languages' );
//}
//add_action( 'after_setup_theme', 'cris_theme_setup' );
function custom_next_posts_link_attributes($attr) {
    $attr .= ' class="nav-number"';
    return $attr;
}
add_filter('next_posts_link_attributes', 'custom_next_posts_link_attributes');
function custom_prev_posts_link_attributes($attr) {
    $attr .= ' class="nav-number"';
    return $attr;
}
add_filter('previous_posts_link_attributes', 'custom_prev_posts_link_attributes');

function custom_polylang_langswitcher() {
    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 0, 'raw' => 1 ) );
    $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
    if ($langs_array) : ?>
        <a class="text-uppercase <?php if ($current_language == $langs_array['vi']['slug']) echo 'active'; ?>" href="<?= $langs_array['vi']['url'] ?>"><?= $langs_array['vi']['slug'] ?></a><em>|</em><a class="text-uppercase <?php if ($current_language == $langs_array['en']['slug']) echo 'active'; ?>" href="<?= $langs_array['en']['url'] ?>"><?= $langs_array['en']['slug'] ?></a>
    <?php endif;
}
add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

// Hook the custom_pll_the_languages function into the pll_the_languages filter
add_filter('pll_the_languages', 'custom_pll_the_languages', 10, 2);

add_action('wpcf7_mail_sent', 'custom_cf7_redirect');


add_action('wpcf7_mail_sent', 'custom_cf7_redirect');
function custom_cf7_redirect($contact_form) {
    $form_id = $contact_form->id();
    if ($form_id) {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
        if ($current_language == 'vi'){
            $redirect_url = get_permalink('217');
        }else{
            $redirect_url = get_permalink('220');
        }
        wp_redirect($redirect_url);
        exit();
    }
}

function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
    if (strlen($phoneNumber) === 10) {
        $formattedNumber = substr($phoneNumber, 0, 4) . '.' . substr($phoneNumber, 4, 3) . '.' . substr($phoneNumber, 7);
        return $formattedNumber;
    } else {
        return "";
    }
}
?>