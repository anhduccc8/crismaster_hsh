<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'LVC Bài post có sidebar','crismaster'),
        'base' => 'lvc_post_sidebar',
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
                'type' => 'textfield',
                'heading' => esc_html__('ID các bài viết muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ",", ID đứng đầu là bài hiển thị lớn',"crismaster")
            ),
        )
    ));
}
add_shortcode('lvc_post_sidebar','lvc_post_sidebar_func');
function lvc_post_sidebar_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $lvc_ids_post = $ids;
    $lvc_ids_arr = array();
    if ($lvc_ids_post !='') {
        $lvc_ids_arr = explode(',', $lvc_ids_post);
        $lvc_ids_arr2 = $newArray = array_slice($lvc_ids_arr, count($lvc_ids_arr) - 3);
    }
    ?>
    <section class="section" data-anchor="product">
        <div class="container-default">
            <div class="row row-custom">
                <div class="col-xs-12 col-lg-9 shs-item-blog-sidebar">
                    <h4 class="item-post-title"><?= esc_attr__($title,'crismaster') ?></h4>
                    <?php
                    $post = get_post($lvc_ids_arr[0]);
                    if ($post) {
                        $title_post = get_the_title($post->ID);
                        $excep_post =  get_the_excerpt($post->ID);
                        $title_post = mb_strlen($title_post, 'UTF-8') > 50 ? mb_substr($title_post, 0, 50, 'UTF-8') . '...' : $title_post;
                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                        $categories = get_the_category($post->ID);
                        foreach ($categories as $category) {
                            if ($category->cat_ID != '37'){
                                $category_ids[] = $category->cat_ID;
                            }
                        }
                        ?>
                        <div class="hsh-blog-column">
                            <div class="item-post-content cursor-pointer" onclick="clickChangeUrls('<?= get_permalink() ?>')">
                                <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                                <h6 class="item-blog-title"><?= esc_attr($title_post) ?></h6>
                                <div class="item-post-description">
                                    <?= $excep_post ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($category_ids) && false){  ?>
                            <div class="hsh-blog-releated">
                                <h6 class="hsh-blog-releated-title"><?= esc_html__('Tin Liên Quan','crismaster') ?></h6>
                                <div class="shs-nav-blog-releated row" data-nav="true">
                                    <div class="shs-nav-blog-releated-1  owl-carousel">
                                        <?php
                                        $args2 = array(
                                            'post_type' => 'post',
                                            'status' => 'approve',
                                            'post_status' => 'publish',
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                            'category__in' => $category_ids,
                                        );
                                        $query2 = new WP_Query($args2);
                                        if ($query2->have_posts()) {
                                            while ($query2->have_posts()) {
                                                $query2->the_post();
                                                $single_image2 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>
                                                <a href="" class="item nav-image" title="<?php the_title() ?>"><img alt="<?php the_title() ?>" src="<?= esc_url($single_image2[0]) ?>"></a>
                                            <?php }
                                            wp_reset_postdata();
                                        }?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-xs-12 col-lg-3 shs-blog-sidebar mt-15px">
                    <?php
                    $query2 = new WP_Query(array(
                        'post_type'      => 'post',
                        'status'      => 'approve',
                        'post_status'         => 'publish',
                        'post__in' => $lvc_ids_arr2,
                    )  );
                    ?>
                    <h6 class="item-blog-title"><?= esc_html__('Tin mới nhất','crismaster') ?></h6>
                    <?php if($query2->have_posts()){
                        while($query2->have_posts()){
                            $query2->the_post();
                            $single_image2 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>
                            <div class="item-post item cursor-pointer" onclick="clickChangeUrls('<?= get_permalink() ?>')">
                                <img alt="img-blog-01" src="<?= esc_url($single_image2[0]) ?>" style="width:100%">
                                <div class="blog-title"><?php the_title();  ?> </div>
                            </div>
                        <?php } wp_reset_postdata(); }?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>