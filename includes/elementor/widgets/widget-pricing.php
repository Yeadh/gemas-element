<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class gemas_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'icon', 'gemas' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'gemas' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'gemas' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'gemas' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'gemas' )
               ],
               [
                  'feature' => __( '100 Email Account', 'gemas' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'gemas' )
               ]
            ],
            'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Buy Now',
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'gemas' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'gemas' ),
            'label_off' => __( 'Off', 'gemas' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>


      <div class="single-pricing text-center <?php if ( 'on' == $settings['recommended'] ){ echo"active"; }?>">
         <div class="pricing-head mb-25">
             <div class="pricing-icon mb-40">
                 <img src="<?php echo esc_url( $settings['icon']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
             </div>
             <h3><?php echo esc_html( $settings['title'] ); ?></h3>
             <div class="price-count">
                 <h4><?php echo $settings['price']; ?></h4>
             </div>
         </div>
         <div class="pricing-list mb-30">
             <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="pricing-btn">
             <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Pricing );