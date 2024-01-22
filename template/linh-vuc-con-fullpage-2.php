<?php
/*
*Template Name:  Page - LVC - Gỗ - fullpage scroll
*
*/
get_header('scroll');
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_5']['url'])){
    $banner_logo_5 = $theme_option['banner_logo_5']['url'];
}
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
?>

<?php if(have_posts()):
    while ( have_posts() ) : the_post(); ?>
        <main class="site-content">
            <div class="container-fluiddd">
                <div class="row-custom" id="fullpage2">
                    <section class="section" data-anchor="banner">
                        <header>
                            <div id="site-header-wrap" class="header-layout">
                                <div class="site-header-mobile">
                                    <div class="container-default">
                                        <div class="row row-header align-center space-between">
                                            <div class="site-branding">
                                                <a class="logo-hsh logo-desktop" href="#" title="Mori"><img alt="logo-desktop" src="<?= get_template_directory_uri() ?>/assets/images/logo-dark.png"></a>
                                            </div>
                                            <div class="header-right shs-menu nav">
                                                <div id="menu-reponsive" class="site-navigation">
                                                    <ul class="hsh-menu-list">
                                                        <?php
                                                        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                                        if ($current_language == 'vi'){
                                                            $menu_items = wp_get_menu_array('20');
                                                        }else{
                                                            $menu_items = wp_get_menu_array('20');
                                                        }
                                                        $object = get_queried_object();
                                                        if (!empty($menu_items)){
                                                            foreach ($menu_items as $menu) { ?>
                                                                <li>
                                                                    <a href="<?= $menu['url'] ?>" class="text-uppercase <?php if ($menu['object_id'] == $object->ID){ echo 'active'; } ?>" id="id-<?= $menu['ID'] ?>"><?php esc_attr_e( $menu['title'], 'crismaster'); ?></a>
                                                                </li>
                                                            <?php   }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="menu-mobile" class="main-menu-mobile">
                                                <span class="btn-nav-mobile open-menu" onclick="navOpen()"><span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="hsh-breadcrumb align-center space-between">
                            <div class="container-default">
                                <div class="row row-header align-center space-between">
                                    <div class="hsh-page-title-left">
                                        <div class="hsh-icon-home cursor-pointer" onclick="clickChangeUrls('<?= esc_url( home_url( '/' ) ) ?>')">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2_180)">
                                                    <path d="M6.66667 16H4L16 4L28 16H25.3333" stroke="#F2F2F2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.66666 16V25.3333C6.66666 26.0406 6.94762 26.7189 7.44771 27.219C7.94781 27.719 8.62609 28 9.33333 28H22.6667C23.3739 28 24.0522 27.719 24.5523 27.219C25.0524 26.7189 25.3333 26.0406 25.3333 25.3333V16" stroke="#F2F2F2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 28V20C12 19.2928 12.281 18.6145 12.781 18.1144C13.2811 17.6143 13.9594 17.3333 14.6667 17.3333H17.3333C18.0406 17.3333 18.7189 17.6143 19.219 18.1144C19.719 18.6145 20 19.2928 20 20V28" stroke="#F2F2F2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2_180">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="hsh-product-category">
                                            <div class="hsh-list-category">
                                                <div class="hsh-item-category-item hsh-category-item-active cursor-pointer" onclick="clickChangeUrls('<?= esc_url( home_url( '/' ) ) ?>')">
                                                    Tất cả sản phẩm
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2_187)">
                                                            <path d="M6 9L12 15L18 9L6 9Z" stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2_187">
                                                                <rect width="24" height="24" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <ul>
                                                    <li class="hsh-item-category-item">

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hsh-page-title-right hsh-icon-social">
                                        <a href="#" class="item-icon-socials icon-facebook">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2_183)">
                                                    <path d="M4 26.6667L5.73333 21.4667C4.23526 19.251 3.69332 16.6272 4.20829 14.0831C4.72326 11.5389 6.26008 9.24757 8.53302 7.63504C10.806 6.02251 13.6603 5.19853 16.5655 5.31632C19.4706 5.43411 22.2287 6.48565 24.327 8.27542C26.4254 10.0652 27.7212 12.4714 27.9734 15.0467C28.2257 17.6219 27.4173 20.191 25.6985 22.2762C23.9797 24.3614 21.4675 25.8208 18.6291 26.3831C15.7906 26.9455 12.8189 26.5724 10.2667 25.3333L4 26.6667" stroke="#F2F2F2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.6667 17.3333L14.6667 14.6667L17.3334 17.3333L21.3334 14.6667" stroke="#F2F2F2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2_183">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shs-page-title bg-img-section height-100vh-160px min-height-450-mb" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-pagetitle-02.jpg')">
                            <div class="shs-slide">
                                <div class="slider-content slide-page-new" >
                                    <div class="shs-slide content-middle">
                                        <div class="shs-heading-meta">
                                            <h3 class="shs-heading t-shadow color-white"><?= esc_html__('NHẬP KHẨU GỖ','crismaster') ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php  the_content(); ?>
                    <?php get_footer('lvc');?>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;

?>

