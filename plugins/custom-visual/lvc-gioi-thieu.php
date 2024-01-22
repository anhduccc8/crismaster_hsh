<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'LVC Giới thiệu','crismaster'),
        'base' => 'lvc_gioi_thieu',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Mô tả','crismaster'),
                'param_name' => 'desc',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hình Ảnh','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('lvc_gioi_thieu','lvc_gioi_thieu_func');
function lvc_gioi_thieu_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'desc' => '',
        'image' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="section shs-section-widget shs-section-about" data-anchor="introduce">
        <div class="container-default">
            <div class="row">
                <div class="col-xs-12 col-lg-6 shs-item-about">
                    <div class="item-about-content">
                        <h4 class="item-about-title"><?= htmlspecialchars_decode($title); ?></h4>
                        <div class="item-about-description">
                            <?= esc_html__($desc,'crismaster') ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 shs-item-about">
                    <?php if ($image_link[0] != ''){ ?>
                        <img class="shs-item-about-img" alt="" src="<?= esc_url($image_link[0]) ?>" style="width:100%">
                    <?php }else{ ?>
                        <img class="shs-item-about-img" alt="" src="<?= get_template_directory_uri() ?>/assets/images/img-column-01.jpg" style="width:100%">
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
?>