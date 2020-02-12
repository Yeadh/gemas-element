<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class gemas_Widget_Feature extends Widget_Base {
 
   public function get_name() {
      return 'feature';
   }
 
   public function get_title() {
      return esc_html__( 'Feature Section', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-feature';
   }

   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'feature_section',
         [
            'label' => esc_html__( 'Feature', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'gemas' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Emaley Mcculloch', 'gemas' ),
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Founder ceo', 'gemas' ),
         ]
      );

      $repeater->add_control(
         'feature',
         [
            'label' => __( 'feature', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'In promotion and of advertising feature show consiss of a person\'s written orsoken statement extollig the virtue', 'gemas' ),
         ]
      );

      $repeater->add_control(
        'rating',
        [
          'label' => __( 'Rating', 'gemas' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 1,
          'options' => [
            1 => __( 'Star 1', 'gemas' ),
            2 => __( 'Star 2', 'gemas' ),
            3 => __( 'Star 3', 'gemas' ),
            4 => __( 'Star 4', 'gemas' ),
            5 => __( 'Star 5', 'gemas' ),
            'none' => __( 'None', 'gemas' ),
          ]
        ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- features-area -->
      <section class="features-area features-bg pt-120 pb-65">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="section-title white-title mb-40">
                          <span>What We do</span>
                          <h2>Lowest Pricing Available Online or Brand Themes Products Time</h2>
                      </div>
                      <div class="features-btn">
                          <a href="#" class="btn">More Features</a>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="features-top-content">
                          <p>Find technology or people for digital projects in public sector. Find an individual specialist developer.</p>
                          <div class="row">
                            <?php foreach (  $settings['feature_list'] as $feature_single ): ?>
                              <div class="col-md-6">
                                  <div class="features-box mb-50">
                                      <div class="features-icon mb-20">
                                          <img src="img/icon/features_icon01.png" alt="">
                                      </div>
                                      <div class="features-box-content">
                                          <h5><?php echo esc_html($feature_single['name']); ?></h5>
                                          <p><?php echo esc_html($feature_single['name']); ?></p>
                                      </div>
                                  </div>
                              </div>
                              <?php endforeach; ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="features-shape fs-one"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_shape01.png" alt=""></div>
          <div class="features-shape fs-two"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_shape02.png" alt=""></div>
          <div class="features-shape fs-three"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_shape03.png" alt=""></div>
          <div class="features-shape fs-four"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_bottom_shape.png" class="rotateme" alt=""></div>
          <div class="features-polygon"><img src="<?php echo get_template_directory_uri(); ?>/images/features_polygon.png" alt="" data-parallax='{"y": -100}'></div>
      </section>
      <!-- features-area-end -->
   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Feature );