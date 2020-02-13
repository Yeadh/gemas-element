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


      $this->add_control(
      'bg_image',
        [
          'label' => __( 'Background image', 'gemas' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => get_template_directory_uri().'/images/features_bg.jpg',
          ],
        ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('What We do','gemas')
         ]
      );


      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Lowest Pricing Available Online or Brand Themes Products Time','gemas')
         ]
      );

      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Find technology or people for digital projects in public sector. Find an individual specialist developer.','gemas')
         ]
      );
      

      $this->add_control(
         'button_text', [
            'label' => __( 'Button Text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('More Features','gemas')
         ]
      );

      $this->add_control(
         'button_url', [
            'label' => __( 'Button URL', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );
      


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose icon', 'gemas' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );

      $repeater->add_control(
         'title',
         [
            'label' => __( 'Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Experienced 10 Years!', 'gemas' ),
         ]
      );

      $repeater->add_control(
         'desc',
         [
            'label' => __( 'Description', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Find technology or people for digital projects in public sector.', 'gemas' ),
         ]
      );


      $this->add_control(
         'feature_list',
         [
            'label' => __( 'feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{title}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- features-area -->
      <section class="features-area features-bg pt-120 pb-65" style="background-image: url(<?php echo esc_url($settings['bg_image']['url']) ?>);">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="section-title white-title mb-40">
                          <span><?php echo esc_html($settings['sub-title']); ?></span>
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                      </div>
                      <div class="features-btn">
                          <a href="<?php echo esc_url($settings['button_url']); ?>" class="btn"><?php echo esc_html($settings['button_text']); ?></a>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="features-top-content">
                          <p><?php echo esc_html($settings['text']); ?></p>
                          <div class="row">
                            <?php foreach (  $settings['feature_list'] as $feature_single ): ?>
                              <div class="col-md-6">
                                  <div class="features-box mb-50">
                                      <div class="features-icon mb-20">
                                          <img src="<?php echo esc_html($feature_single['image']['url']); ?>" alt="<?php echo esc_attr($feature_single['title']); ?>">
                                      </div>
                                      <div class="features-box-content">
                                          <h5><?php echo esc_html($feature_single['title']); ?></h5>
                                          <p><?php echo esc_html($feature_single['desc']); ?></p>
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