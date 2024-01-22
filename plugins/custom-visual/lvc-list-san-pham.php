<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'LVC Sản phẩm theo danh mục','crismaster'),
        'base' => 'lvc_sp_danh_muc',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập ID danh mục','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập số sản phẩm muốn hiện trên 1 trang','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Bật form search', 'crismaster'),
                'param_name' => 'is_search',
                'value' => array('Có' => '1'),
                'description' => esc_html__('', 'crismaster'),
            ),
        )
    ));
}
add_shortcode('lvc_sp_danh_muc','lvc_sp_danh_muc_func');
function lvc_sp_danh_muc_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
        'ids' => '',
        'is_search' => '',
    ),$atts));
    ob_start();
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $search_query = isset($_GET['s_cus']) ? sanitize_text_field($_GET['s_cus']) : '';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'id',
                'terms'    => array($ids),
            ),
        ),
        'paged' => $paged,
        'status' => 'approve',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date'
    );
    if (!empty($search_query)) {
        $args['s'] = $search_query;
    }

    ?>
    <section class="section shs-section-widget shs-section-blog overflow-hidden mt-40 <?php if (!$is_search || $is_search == '0'){ echo 'pt-40px'; }?>" data-anchor="product">
        <div class="container-default container-default-cus  height-100vh-80px  <?php if ($is_search && $is_search == '1'){ echo 'height-100vh-25px'; }else{ echo 'height-100vh-130px'; }?>">
            <?php if ($is_search && $is_search == '1'){ ?>
                <div class="row">
                    <div class="col-12">
                        <div class="hsh-search">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                                <input type="search" class="input" placeholder="<?php if (!empty($search_query) && $search_query !='') { echo $search_query; }else { esc_attr_e('Tìm kiếm sản phẩm', 'crismaster'); }   ?>" value="<?php echo get_search_query(); ?>" name="s_cus" />
                                <button type="submit" class="btn"><?php esc_html_e('Tìm kiếm', 'crismaster'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row shs-item-blog-inner">
            <?php
            $query  = new WP_Query($args);
            $t = 1;
            if ($query->have_posts()) {
            while ($query->have_posts()) {
            $query->the_post();
            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');?>
                <div class="col-xs-12 col-md-6 col-xl-3 shs-item-blog">
                    <div class="item-blog item">
                        <div class="item-image-blog">
                            <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>">
                        </div>
                        <div class="item-blog-content">
                            <h6 class="item-blog-title"><?php the_title() ?></h6>
                            <div class="item-blog-btn">
                                <a class="btn-text" href=""><?= esc_html__('Liên Hệ','crismaster') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($t%4 == 0 && $t <8){ ?>
                </div><div class="row shs-item-blog-inner">
                <?php } ?>
            <?php
                $t += 1;}
            wp_reset_postdata();
            }
            ?>
            </div>
        </div>
        <?php
         $paged_links = paginate_links(array(
             'total' => $query->max_num_pages,
             'current' => max(1, get_query_var('paged')),
             'mid_size' => 3,
             'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
             'next_text' => '<i class="fa-solid fa-angle-right"></i>',
         ));
         if (strlen($paged_links) > 0){ ?>
             <div class="shs-nav-number-bottom">
                 <div class="shs-nav-number">
                     <?php echo $paged_links; ?>
                 </div>
             </div>
         <?php } ?>
    </section>

    <?php
    return ob_get_clean();
}
?>