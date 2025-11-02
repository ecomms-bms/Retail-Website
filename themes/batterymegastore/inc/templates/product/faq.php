<?php
$meta_value = false;

if ( is_product_category() ) {
  $meta_value = 'products';
  $categories = array( get_queried_object_id() );
} else if ( is_product() ) {
  global $product;
  $product_id = $product->get_id();
  $meta_value = 'categories';
  $categories = wp_get_post_terms( $product_id, 'product_cat', array('fields' => 'ids'));
}
?>

<?php if ( $meta_value && $categories ) : ?>
  <?php
  $faqs = array();

  $faq = new \WP_Query( array(
    'fields'          => 'ids',
    'post_type'       => 'faq',
    'posts_per_page'  => 1,
    'post_status'     => 'publish',
    'no_found_rows'   => true,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'id',
        'terms' => $categories,
        'operator' => 'IN'
      )
    ),
    'meta_query' => array(
      'relation' => 'OR',
      array(
        'key' => 'faq_display_on',
        'compare' => 'NOT EXISTS'
      ),
      array(
        'key' => 'faq_display_on',
        'value' => $meta_value,
        'compare' => '!='
      )
    )
  ) );

  if ( $faq->have_posts() ) {
    $faq_post_id = $faq->posts[0];
    $faqs = get_field('faq', $faq_post_id);
  }; wp_reset_postdata();
  ?>

  <?php if ( $faqs) : ?>
    <?php $heading = get_field('product_faq_heading', 'option'); ?>
    <div class="product-faq js-product-faq">
      <div class="accordion js-accordion">
        <?php if ( $heading ) : ?><h2><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
        <?php foreach ( $faqs as $faq ) : ?>
          <?php
          $question = $faq['faq_question'];
          $answer = $faq['faq_answer'];
          $faq_slug = sanitize_title( $question );
          ?>
          <div id="faq" class="accordion-item js-accordion-item">
            <button id="faq-<?php echo $faq_slug; ?>" class="accordion-button js-accordion-button" type="button" data-target="#faq-<?php echo $faq_slug; ?>-answer" aria-expanded="false" aria-controls="faq-<?php echo $faq_slug; ?>-answer"><?php echo esc_html( $question ); ?></button>

            <div id="faq-<?php echo $faq_slug; ?>-answer" class="accordion-content js-accordion-content" aria-labelledby="faq-<?php echo $faq_slug; ?>">
              <div class="accordion-content-inner">
                <?php echo $answer; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
