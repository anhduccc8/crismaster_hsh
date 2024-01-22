<?php $theme_option = get_option('theme_option');
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
$mobile = wp_is_mobile();
$footer_lat_log = $theme_option['footer_lat_log'];
$footer_lat_log_arr = explode(',',$footer_lat_log);
?>
<section class="section position-relative <?php if (!empty($footer_lat_log_arr)){ echo 'pt-0px'; }?> " data-anchor="footer">
    <?php if (!empty($footer_lat_log_arr)){ ?>
        <div id="footer-map" class="lvc-map-cus"></div>
        <footer id="colophon" class="site-footer-main">
            <div class="shs-footer-main">
                <div class="container-fluiddd">
                    <div class="container-default">
                        <div class="shs-logo-footer">
                            <img alt="img-logo-footer" src="<?= get_template_directory_uri() ?>/assets/images/logo-footer.png">
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="shs-content-footer">

                                    <?php if (isset($footer_name) && $footer_name != '') { ?>
                                        <h4 class="shs-heading-footer"><?= esc_html__($footer_name,'crismaster') ?></h4>
                                    <?php }else{ ?>
                                        <h4 class="shs-heading-footer"<?= esc_html__('CÔNG TY TNHH XUẤT NHẬP KHẨU HSH THĂNG LONG','crismaster') ?></h4>
                                    <?php } ?>
                                    <ul>
                                        <li>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_18_237)">
                                                    <path d="M24 8V8.01458" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M24 17.3332L19.3334 10.6665C18.8841 9.85459 18.6545 8.93947 18.6672 8.0116C18.6799 7.08374 18.9344 6.17524 19.4057 5.37588C19.877 4.57652 20.5487 3.91395 21.3544 3.45364C22.1602 2.99334 23.0721 2.75122 24 2.75122C24.928 2.75122 25.8399 2.99334 26.6456 3.45364C27.4513 3.91395 28.123 4.57652 28.5943 5.37588C29.0656 6.17524 29.3202 7.08374 29.3329 8.0116C29.3455 8.93947 29.1159 9.85459 28.6667 10.6665L24 17.3332Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M14 6.33325L12 5.33325L4 9.33325V26.6666L12 22.6666L20 26.6666L28 22.6666V19.9999" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 5.33325V22.6666" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M20 20V26.6667" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_18_237">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <?php
                                            $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                            if (isset($footer_address) && $footer_address != '' && $current_language == 'vi' ) { ?>
                                                <a class="shs-link hsh-map" href="#"><?= htmlspecialchars_decode($footer_address) ?></a>
                                            <?php }elseif(isset($footer_address2) && $footer_address2 != '' ){ ?>
                                                <a class="shs-link hsh-map" href="#"><?= htmlspecialchars_decode($footer_address2) ?></a>
                                            <?php }else{ ?>
                                                <a class="shs-link hsh-map" href="#">Số nhà 19, ngách 26, ngõ 154 đường Đình Thôn, TDP số 7, <span>Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam <span></a>
                                            <?php } ?>
                                        </li>
                                        <li>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_18_233)">
                                                    <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M20 9.3335C20.7072 9.3335 21.3855 9.61445 21.8856 10.1145C22.3857 10.6146 22.6667 11.2929 22.6667 12.0002" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M20 4C22.1217 4 24.1566 4.84286 25.6569 6.34315C27.1571 7.84344 28 9.87827 28 12" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_18_233">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <?php if (isset($footer_phone) && $footer_phone != '') { ?>
                                                <a class="shs-link" href="tel:<?= $footer_phone ?>"><?= formatPhoneNumber($footer_phone) ?></a>
                                            <?php }else{ ?>
                                                <a class="shs-link" href="tel:0987654321">0987.654.321</a>
                                            <?php } ?>
                                        </li>
                                        <li>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_18_246)">
                                                    <path d="M25.3333 6.6665H6.66667C5.19391 6.6665 4 7.86041 4 9.33317V22.6665C4 24.1393 5.19391 25.3332 6.66667 25.3332H25.3333C26.8061 25.3332 28 24.1393 28 22.6665V9.33317C28 7.86041 26.8061 6.6665 25.3333 6.6665Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_18_246">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <?php if (isset($footer_email) && $footer_email != '') { ?>
                                                <a class="shs-link" href="mailto:<?= $footer_email ?>">
                                                    <?= $footer_email ?>
                                                </a>
                                            <?php }else{ ?>
                                                <a class="shs-link" href="mailto:info@hshgroup.com">
                                                    info@hshgroup.com
                                                </a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="hsh-footer-right">
                                    <h4 class="heading-follow-us">Follow us</h4>
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FHSHFOOD&tabs=timeline&width=320&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1891632591153770" width="320" height="117" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shs-footer-bottom container-default">
                <div class="row">
                    <div class="col-12 footer-bottom-content">
                        @2023 - All rights reserved. Designed by <a target="_blank" class="footer-by" href="https://innocom.vn/">Innocom</a>
                    </div>
                </div>
            </div>

        </footer>
    <?php } ?>
</section>

<script>
    function clickChangeUrls(url) {
        document.location.href = url;
    }
    function navOpen() {
        var x = document.getElementById("menu-reponsive");
        if (x.className === "site-navigation") {
            x.className += " navigation-open";
        } else {
            x.className = "site-navigation";
        }
    }
    function initializeMap() {
        var myLatLng = { lat: <?= $footer_lat_log_arr[0] ?>, lng: <?= $footer_lat_log_arr[1] ?> };
        var map = new google.maps.Map(document.getElementById('footer-map'), {
            center: myLatLng,
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
        marker.addListener('click', function() {
            alert('Marker clicked!');
        });
    }
    document.addEventListener('DOMContentLoaded', initializeMap);
</script>
</body>
</html>