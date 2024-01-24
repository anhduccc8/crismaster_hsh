<?php
/*
*Template Name:  Page - LVC - Xúc tiến - fullpage scroll
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
        <main class="site-content news-single xuc-tien-tm">
            <div class="container-fluiddd">
                <div class="row-custom js-window-trigger is-active" id="fullpage5">
                    <section class="section shs-header-custom" data-anchor="banner">
                        <div class="shs-slide container-fluidd">
                            <div class="slider-content slide-page-new slide-single-blog">
                                <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/bgr-pagetitle-03.jpg" style="width:100%;">
                                <div class="shs-slide content-middle">
                                    <div class="shs-heading-meta style-02">
                                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('XÚC TIẾN THƯƠNG MẠI','crismaster') ?></h3>
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