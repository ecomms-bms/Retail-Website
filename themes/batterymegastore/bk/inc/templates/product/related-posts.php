<?php if ( is_product() ) : ?>
  <?php
  global $product;
  $product_id = $product->get_id();
  $categories = wp_get_post_terms( $product_id, 'product_cat', array('fields' => 'ids'));
  $posts_per_page = absint( get_field('product_rp_limit', 'option') ) ?: 4;
  $layout = $args['layout'] ?: '2col';
  $posts_per_page = 3;

  $posts_query = new \WP_Query( array(
    'fields'          => 'ids',
    'post_type'       => 'post',
    'posts_per_page'  => $posts_per_page,
    'post_status'     => 'publish',
    'no_found_rows'   => true,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'id',
        'terms' => $categories,
        'operator' => 'IN'
      )
    )
  ) );
  ?>

  <?php if ( $posts_query->have_posts() ) : ?>
    <?php $heading = get_field('product_rp_heading', 'option'); ?>
    <div class="product-related-posts js-product-related-posts">
      <?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>

        <div class="product-related-posts-carousel js-product-related-posts-carousel" data-items="<?php echo $layout == '1col' ? 4 : 2; ?>">
        <?php foreach( $posts_query->posts as $pid ) : ?>
          <?php
          $title = get_the_title( $pid );
          $thumbnail = get_the_post_thumbnail( $pid, 'medium' );
          $excerpt = get_the_excerpt( $pid );
          $link = get_permalink( $pid );
          ?>
          <div class="product-related-post js-product-related-post">
            <a href="<?php echo esc_url( $link ); ?>" class="product-related-post-inner">
              <div class="product-related-post-content">
                <h3 class="product-related-post-title"><?php echo esc_html( $title ); ?></h3>

                <?php if ( $excerpt ) : ?>
                  <p class="product-related-post-excerpt"><?php echo bms_word_limiter( $excerpt, 10 ); ?></p>
                <?php endif; ?>
              </div>

              <?php if ( $thumbnail ) : ?>
                <div class="product-related-post-image">
                  <div class="product-related-post-image-inner"><?php echo $thumbnail; ?></div>
                </div>
              <?php endif; ?>
            </a>
          </div>
        <?php endforeach; ?>
        </div>
    </div>
  <?php endif; wp_reset_postdata(); ?>
<?php endif; ?>
