<?php
/*
*Template Name:  Page - LVC - Thực Phẩm - fullpage scroll
*
*/
get_header();
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
        <main class="site-content news-single">
            <div class="container-fluiddd">
                <div class="row-custom js-window-trigger is-active" id="fullpage5">
                    <section class="section shs-header-custom" data-anchor="banner">
                        <div class="shs-slide container-fluidd">
                            <div class="slider-content slide-page-new slide-single-blog">
                                    <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/bgr-pagetitle-01.jpg" style="width:100%;">
                                <div class="shs-slide content-middle">
                                    <div class="shs-heading-meta style-02">
                                        <img class="img-slide-new none-lg" alt="img-blog-02" src="<?= get_template_directory_uri() ?>/assets/images/img-slide-news.png">
                                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('MỸ PHẨM','crismaster') ?><br><?= esc_html__('THỰC PHẨM CHỨC NĂNG','crismaster') ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php  the_content(); ?>
                    <?php
                    echo get_template_part('template-parts/footer-cus');
                    ?>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;
get_footer();
?>

