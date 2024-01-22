<?php
/*
*Template Name: Home Page - HSH Thăng Long
*
*/ 
get_header();

$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_1']['url'])){
    $banner_logo_1 = $theme_option['banner_logo_1']['url'];
}
$header_language = $theme_option['header_language'];
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
                <div class="row-custom" id="fullpage">
                    <section class="section fp-section fp-table shs-header-custom bg-img-section" data-anchor="hsh-thang-long" id="bannerHome hsh-thang-long">
                        <div class="shs-slide container-fluidd scale-m1345 scale-m1201">
                            <div class="slider-content">
                                <video id="myVideo" class="video-display" autoplay muted loop playsinline src="https://player.vimeo.com/progressive_redirect/playback/905042642/rendition/1080p/file.mp4?loc=external&signature=e1d052bd5f93a4b0ad3cff13d9c01cc7a9c92761c27a85e528170552f5193240"></video>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var video = document.getElementById('myVideo');
                                        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                                        if (isMobile) {
                                            video.autoplay = true;
                                            video.play();
                                        }
                                    });
                                </script>
                                <div class="shs-nav-number hide">
                                    <div class="nav-number active"><a href="#">01</a></div>
                                    <div class="nav-number"><a href="#ve-chung-toi-ele">02</a></div>
                                    <div class="nav-number"><a href="#">03</a></div>
                                    <div class="nav-number"><a href="#tin-tuc-ele">04</a></div>
                                    <div class="nav-number"><a href="#">05</a></div>
                                </div>
                            </div>
                        </div>
                        <a class="scrolldown js-scrollCt" href="#">
                            <img class="ar" src="<?= get_template_directory_uri() ?>/assets/images/vector-1.png">
                        </a>
                    </section>
                    <?php the_content(); ?>
                    <?php
                    get_template_part('template-parts/footer','cus');
                    ?>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif; ?>
<?php
get_footer();
?>
