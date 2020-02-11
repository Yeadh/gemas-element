<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Product
class gemas_Widget_New extends Widget_Base {
 
   public function get_name() {
      return 'newproduct';
   }
 
   public function get_title() {
      return esc_html__( 'New products', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }
   protected function _register_controls() {

      $this->start_controls_section(
         'product_section',
         [
            'label' => esc_html__( 'Products', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
	   
	  $this->add_control(
         'ppp',
         [
            'label' => __( 'Post per page', 'gemas' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 10,
            'min' => 5,
            'max' => 100,
            'step' => 1
         ]
      );
	   
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();

        $products = new \WP_Query( array( 
        'post_type' => 'product',
  		  'posts_per_page' => $settings['ppp'],
        ));
	   
        global $product;?>
		<div class="product-thumb-wrap">
      <ul>
  		<?php
          while ( $products->have_posts() ) : $products->the_post();
           $categories = get_the_category();  ?>
          <li>
              <a class="site-preview" href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'gemas-75x75') ?>" data-preview-url="<?php echo esc_url( get_post_meta( get_the_ID(), 'gemas_thumb', 1 ), 'makplus-120x120' ); ?>"
                  data-item-cost="<?php echo get_post_meta( get_the_ID(), '_regular_price', true ); ?>" data-item-category="<?php echo esc_html( $categories[0]->name );  print_r($categories)?>" data-item-author="Gemas" alt="<?php the_title() ?> - <?php echo esc_html( get_post_meta( get_the_ID(), 'gemas_sub_title', 1 ) ) ?>">
              </a>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
  		</ul>
    </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_New );