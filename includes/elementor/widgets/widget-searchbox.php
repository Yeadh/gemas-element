<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Searchbox item
class gemas_Widget_Searchbox extends Widget_Base {
 
   public function get_name() {
      return 'Searchbox';
   }
 
   public function get_title() {
      return esc_html__( 'Searchbox', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {
    
      $this->start_controls_section(
         'Searchbox_section',
         [
            'label' => esc_html__( 'Searchbox', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();?>

      <!-- search-area -->
      <div class="gemas-search">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="gemas-search-box">
                          <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                              <?php
                              $makplus_cat_dropdown_args = array(
                               'show_option_all' => __( 'Any Category' ),
                               'taxonomy' => 'product_cat',
                               'class' => 'custom-select',
                              );
                              wp_dropdown_categories( $makplus_cat_dropdown_args );
                              ?>
                              <input type="text" placeholder="Type and Hit Enter...">
                              <button type="submit" ><i class="fas fa-search"></i></button>
                              <input type="hidden" name="post_type" value="product" />
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- search-area-end -->


      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Searchbox );