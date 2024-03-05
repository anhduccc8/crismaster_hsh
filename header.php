<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $theme_option = get_option('theme_option');
if (isset($theme_option['header_logo']['url'])){
    $header_logo = $theme_option['header_logo']['url'];
}
$header_language = $theme_option['header_language'];
$mobile = wp_is_mobile();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?= get_template_directory_uri() ?>/assets/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/images/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class('body-main'); ?> >
<header>
    <div class="hdContainer">
        <a class="logo logo-cus-1" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php if (isset($header_logo) && $header_logo != '') { ?>
                <img src="<?php  echo esc_url($header_logo) ?>" alt="">
            <?php }else{ ?>
                <img src="<?= get_template_directory_uri() ?>/assets/images/logo_trans.png">
            <?php } ?>
            <span>HSH GROUP</span>
        </a>
        <div class="hamburger-menu hamburger-menu-cus">
            <div class="bar"></div>
        </div>
        <?php if ($header_language){
            ?>
            <div class="botHd">
                <p>
                    <?= do_shortcode('[polylang_langswitcher]') ?>
                </p>
            </div>
        <?php } ?>
    </div>
    <div class="ctMenu">
        <nav>
            <ul id="nav">
                <?php
                $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                if ($current_language == 'vi'){
                    $menu_items = wp_get_menu_array('3');
                }else{
                    $menu_items = wp_get_menu_array('26');
                }
                $object = get_queried_object();
                if (!empty($menu_items)){
                    foreach ($menu_items as $menu) { ?>
                        <li class="<?php if (!empty($menu['children'])){ echo 'hasSub'; } ?> ">
                            <a href="<?= $menu['url'] ?>" class="text-uppercase <?php if ($menu['object_id'] == $object->ID){ echo 'active'; } ?>" id="id-<?= $menu['ID'] ?>"><?php esc_attr_e( $menu['title'], 'crismaster'); ?></a>
                        <?php if (!empty($menu['children'])){ ?>
                            <div class="submenu">
                            <?php foreach ($menu['children'] as $child1){ ?>
                                <a href="<?= $child1['url'] ?>" class="child-menu-a text-uppercase" id="id-<?= $child1['ID'] ?>"><?php esc_attr_e( $child1['title'], 'crismaster'); ?></a>
                            <?php } ?>
                            </div>
                        <?php } ?>
                        </li>
                 <?php   }
                }
                ?>
            </ul>
        </nav>
    </div>
</header>