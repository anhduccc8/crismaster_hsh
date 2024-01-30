<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Lĩnh vực hoạt động','crismaster'),
        'base' => 'linh_vuc_hoat_dong',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('Lĩnh vực hoạt động',"crismaster")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner giới thiệu','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên chọn 10 banner để tối ưu hiển thị','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề','crismaster'),
                        'param_name' => 'stitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh Desktop','crismaster'),
                        'param_name' => 'simage',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước dọc',"crismaster")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh Hover Desktop','crismaster'),
                        'param_name' => 'simage3',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước dọc',"crismaster")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh Mobile','crismaster'),
                        'param_name' => 'simage2',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước vuông',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'slink',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),

                ),
            ),
        )
    ));
}
add_shortcode('linh_vuc_hoat_dong','linh_vuc_hoat_dong_func');
function linh_vuc_hoat_dong_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'details' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="section shs-section-widget bg-img-section shs-section-activities" data-anchor="field-activity" id="linh-vuc-hoat-dong-ele field-activity" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-about.png');">
        <div class="container-fluid container-heading">
            <div class="shs-heading-widget text-center text-uppercase">
                <div class="shs-heading-meta">
                    <h3 class="shs-heading"><?= esc_html__($title, 'crismaster') ?></h3>
                </div>
            </div>
        </div>
<!--        linh-vuc-hoat-dong-->
        <div id="horizontal-image" class="container-fluid container-content">
        <?php if(isset($details) && $details != ''){
            $t = 1;
        $detailss = vc_param_group_parse_atts($details,'');
        foreach ($detailss as $dca ) {
            if(isset($dca['simage']) && $dca['simage']!='') {
                $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
            }
            if(isset($dca['simage2']) && $dca['simage2']!='') {
                $dca['simage2'] = wp_get_attachment_image_src($dca['simage2'], '');
            }
            if(isset($dca['simage3']) && $dca['simage3']!='') {
                $dca['simage3'] = wp_get_attachment_image_src($dca['simage3'], '');
            }
            ?>
            <div class="shs-item-activiti-column">
                <div class="shs-item-activiti">
                    <a class="box-link" target="_blank" href="<?= esc_url($dca['slink']) ?>"></a>
                    <div class="item-activiti-image">
                        <img class="none-sm" src="<?= esc_url($dca['simage'][0]) ?>">
                        <img class="none-min-sm" src="<?= esc_url($dca['simage2'][0]) ?>">
                    </div>
                    <h4 class="item-activiti-title"><?= htmlspecialchars_decode($dca['stitle']) ?></h4>
                </div>
                <div class="item-activiti-hover none-sm none-lg" style="background-image: url('<?= esc_url($dca['simage3'][0]) ?>'); background-position: center;">
                    <h4 class="item-activiti-title-hover text-uppercase"><?= htmlspecialchars_decode($dca['stitle']) ?></h4>
                </div>
            </div>
            <?php $t++; } } ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>