<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class gemas_Widget_Counter extends Widget_Base {
 
   public function get_name() {
      return 'counter';
   }
 
   public function get_title() {
      return esc_html__( 'Counter', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'counter_section',
         [
            'label' => esc_html__( 'Counter', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      

      $this->add_control(
      'bg_image',
        [
          'label' => __( 'Background image', 'gemas' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => get_template_directory_uri().'/images/fact_bg.jpg',
          ],
        ]
      );

      $counter = new \Elementor\Repeater();

      $counter->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'gemas' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $counter->add_control(
         'count',
         [
            'label' => __( 'Count', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $counter->add_control(
         'title',
         [
            'label' => __( 'Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $counter->get_controls(),
            'title_field' => '{{title}}',

         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- fact-area -->
        <section class="fact-area fact-bg pt-120 pb-90" style="background-image: url(<?php echo esc_url($settings['bg_image']['url']) ?>);">
            <div class="container">
                <div class="row">
                  <?php foreach (  $settings['counter'] as $counter_single ): ?>
                    <div class="col-lg-3 col-ms-4 col-sm-6">
                        <div class="fact-box mb-30">
                            <div class="fact-icon mb-25">
                                <img src="img/icon/fact_icon01.png" alt="">
                            </div>
                            <div class="fact-box-content">
                                <h4 class="count"><?php echo $counter_single['count'] ?></h4>
                                <span><?php echo $counter_single['title'] ?></span>
                            </div>
                        </div>
                    </div>
                  <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Counter );