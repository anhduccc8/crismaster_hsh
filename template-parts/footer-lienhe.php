<?php
$theme_option = get_option('theme_option');
$footer_style = $theme_option['footer_style'];
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
$footer_youtube = $theme_option['footer_youtube'];
$footer_zalo = $theme_option['footer_zalo'];
$footer_facebook = $theme_option['footer_facebook'];
$footer_lat_log = $theme_option['footer_lat_log'];
$footer_lat_log_arr = explode(',',$footer_lat_log);
$footer_list_contact = $theme_option['footer_list_contact'];
$lines = explode("\n", trim($footer_list_contact));
$footer_list_contact_arr = [];
foreach ($lines as $line) {
    $parts = explode(',', $line);
    $footer_list_contact_arr[] = $parts;
}
$current_language = function_exists('pll_current_language') ? pll_current_language() : '';
?>
<section class="section site-footer-main footer-lienhe" data-anchor="contact" id="footer-id contact">
        <div class="shs-footer-main-2 position-relative text-black" >
            <div class="container-fluid">
                <div class="row footer-ele-logo">
                    <div class="col-lg-12 col-xl-6 shs-column-02 ">
                        <div class="shs-meta-footer row">
                            <a class="col-3 logo_footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if (isset($footer_logo) && $footer_logo != '') { ?>
                                    <img src="<?php  echo esc_url($footer_logo) ?>" alt="">
                                <?php }else{ ?>
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/footer_logo.png">
                                <?php } ?>
                            </a>
                            <div class="col-9">
                                <?php if (isset($footer_name) && $footer_name != '') { ?>
                                    <p class="company-name text-black"><?= esc_html__($footer_name,'crismaster') ?></p>
                                <?php }else{ ?>
                                    <p class="company-name text-black"><?= esc_html__('CÔNG TY TNHH XUẤT NHẬP KHẨU HSH THĂNG LONG','crismaster') ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 shs-column-01 shs-column-02-cus">
                        <div class="logo-container">
                            <a class="logo youtube" href="<?= esc_url($footer_youtube) ?>"><iconify-icon icon="mdi:youtube"></iconify-icon></a>
                            <a class="logo zalo" href="<?= esc_url($footer_zalo) ?>"><img src="<?= get_template_directory_uri() ?>/assets/images/zalo.png" alt=""></a>
                            <a class="logo facebook" href="<?= esc_url($footer_facebook) ?>"><iconify-icon icon="mdi:facebook"></iconify-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shs-footer-main-3 shs-footer-main-4 position-relative" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/footer_br_cus.png');">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-lg-12 col-xl-12 shs-column-01 shs-column-01-cus pd-l-r-15 pt-1">
                        <ul>
                            <li><a href=""><?= esc_html__("Phòng ban phụ trách",'crismaster') ?></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-xl-12 shs-column-01 shs-column-01-cus pd-l-r-25 pt-0px">
                        <ul>
                            <?php
                            $t2 = 1;
                            $t3 = count($footer_list_contact_arr);
                            if (!empty($footer_list_contact_arr)){
                            $contact0_arr = array();
                            foreach ($footer_list_contact_arr as $contact) {
                            $contact0_arr = explode('|',$contact[0]);
                                if ($current_language == 'en'){
                                    $contact0 = $contact0_arr[1];
                                }else{
                                    $contact0 = $contact0_arr[0];
                                } ?>
                            <li><a><?php esc_attr_e( $contact0, 'crismaster'); ?></a>
                                <ul>
                                    <li><a href="">mail: <?= $contact[1] ?></a></li>
                                    <li><a href="">sđt: <?= $contact[2] ?></a></li>
                                </ul>
                            </li>
                            <?php
                            if ($t2%2==0 && $t2 < $t3){ ?>
                         </ul>
                         <ul class="<?= $t2 ?>">
                            <?php }
                            $t2++;  }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="row pt-70px-cus" >
                    <div class="col-lg-12 col-xl-6 shs-column-02">
                        <div class="">
                            <ul class="">
                                <li>
                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                    <?php
                                    $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                    if (isset($footer_address) && $footer_address != '' && $current_language == 'vi' ) { ?>
                                        <a class="shs-link" href="#"><?= htmlspecialchars_decode($footer_address) ?></a>
                                    <?php }elseif(isset($footer_address2) && $footer_address2 != '' ){ ?>
                                        <a class="shs-link" href="#"><?= htmlspecialchars_decode($footer_address2) ?></a>
                                    <?php }else{ ?>
                                        <a class="shs-link" href="#">Số nhà 19, ngách 26, ngõ 154 đường Đình Thôn, TDP số 7, <br>Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam </a>
                                    <?php } ?>
                                </li>
                                <li class="mr-t-20px ">
                                                    <span>
                                                        <i class="fa-solid fa-phone"></i>
                                                    <?php if (isset($footer_phone) && $footer_phone != '') { ?>
                                                        <a class="shs-link" href="tel:<?= $footer_phone ?>"><?= formatPhoneNumber($footer_phone) ?></a>
                                                    <?php }else{ ?>
                                                        <a class="shs-link" href="tel:0987654321">0987.654.321</a>
                                                    <?php } ?>
                                                    </span>
                                    <span class="mr-l-50px">
                                                         <i class="fa-solid fa-envelope"></i>
                                                    <?php if (isset($footer_email) && $footer_email != '') { ?>
                                                        <a class="shs-link" href="mailto:<?= $footer_email ?>">
                                                            <?= $footer_email ?>
                                                        </a>
                                                    <?php }else{ ?>
                                                        <a class="shs-link" href="mailto:info@hshgroup.com">
                                                            info@hshgroup.com
                                                        </a>
                                                    <?php } ?>
                                                   </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 shs-column-01 shs-column-01-cus">
                        <ul>
                            <?php
                            $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                            if ($current_language == 'vi'){
                                $menu_items = wp_get_menu_array('3');
                            }else{
                                $menu_items = wp_get_menu_array('26');
                            }
                            $t = 1;
                            if (!empty($menu_items)){
                            foreach ($menu_items as $menu) { ?>
                            <li><a href="<?= $menu['url'] ?>"><?php esc_attr_e( $menu['title'], 'crismaster'); ?></a></li>
                            <?php
                            if ($t==3){ ?>
                        </ul><ul>
                            <?php }
                            $t++;  }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="shs-copy-right">
            <span class="copy-right copy-right-2 text-center">Copyright © 2023 HSH. Designed by <a target="_blank" href="https://innocom.vn/">Innocom</a></span>
        </div>
</section>

