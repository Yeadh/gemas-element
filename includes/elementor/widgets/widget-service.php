<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class gemas_Widget_Service extends Widget_Base {
 
   public function get_name() {
      return 'service item';
   }
 
   public function get_title() {
      return esc_html__( 'Service Item', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {
    
      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Service section', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('exclusive service','gemas')
         ]
      );


      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Why Chose Us','gemas')
         ]
      );


      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Business plan template presented here will get you started. A standard business plan consists of a single document divided into several sections','gemas')
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
            'default' => __( 'Secure Transaction Custo Traffic generation', 'gemas' ),
         ]
      );

      $repeater->add_control(
         'desc',
         [
            'label' => __( 'Description', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Annual Performance Statistics that Report provides detailed statistical information our performance stakeh.', 'gemas' ),
         ]
      );


      $this->add_control(
         'service_list',
         [
            'label' => __( 'service List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{title}}',

         ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();?>

      <!-- services-area -->
      <section class="services-area gray-bg pt-120 pb-90">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-9">
                      <div class="section-title text-center mb-65">
                          <span><?php echo esc_html($settings['sub-title']); ?></span>
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                          <p><?php echo esc_html($settings['text']); ?></p>
                      </div>
                  </div>
              </div>
              <div class="services-wrap">
                  <div class="row">
                     <?php foreach (  $settings['service_list'] as $service_single ): ?>
                      <div class="col-lg-4 col-md-6">
                          <div class="services-box mb-30">
                              <div class="services-box-head">
                                  <img src="<?php echo esc_html($service_single['image']['url']); ?>" alt="<?php echo esc_attr($service_single['title']); ?>">
                                  <h4><?php echo esc_html($service_single['title']); ?></h4>
                              </div>
                              <div class="services-box-content">
                                  <p><?php echo esc_html($service_single['desc']); ?></p>
                              </div>
                              <div class="services-overlay-icon"><img src="<?php echo esc_html($service_single['image']['url']); ?>" alt="<?php echo esc_attr($service_single['title']); ?>"></div>
                          </div>
                      </div>
                     <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </section>
      <!-- services-area-end --> 

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Service );