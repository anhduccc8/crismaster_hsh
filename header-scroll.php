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

