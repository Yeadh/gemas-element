<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class gemas_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }

   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonial_section',
         [
            'label' => esc_html__( 'Testimonials', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Feedback From our clients.','gemas')
         ]
      );

      $partner = new \Elementor\Repeater();

      $partner->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'gemas' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ],
         ]
      );

      $this->add_control(
         'partner_list',
         [
            'label' => __( 'Partner List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $partner->get_controls()

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
            'default' => __( 'Alexander Graham Bell', 'gemas' ),
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'CEO ot Google', 'gemas' ),
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'In promotion and of advertisin testimonial or show consists of a person\'s written or spoken statement that extolling the virtue of a product The term - Testimonial', 'gemas' ),
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
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'gemas' ),
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


       <div class="area-wrapper black-bg position-relative">

          <!-- brand-area -->
          <section class="brand-area pt-120">
              <div class="container">
                  <div class="brand-wrap">
                      <div class="row no-gutters justify-content-center">

                          <?php foreach (  $settings['partner_list'] as $partner_single ): ?>
                          <div class="brand-item">
                              <img src="<?php echo esc_url( $partner_single['image']['url'] ); ?>" alt="">
                          </div>
                          <?php endforeach; ?>
                      </div>
                  </div>
              </div>
          </section>
          <!-- brand-area-end -->

          <!-- testimonial-area -->
          <section class="testimonial-area pt-115 pb-140">
              <div class="container">
                  <div class="testi-wrap">
                      <div class="row">
                          <div class="col-lg-5">
                              <div class="section-title">
                                  <h2><?php echo esc_html($settings['title']); ?></h2>
                              </div>
                              <div class="testi-quote">
                                  <img src="<?php echo get_template_directory_uri(); ?>/images/testi_quote01.png" alt="">
                              </div>
                          </div>
                          <div class="col-lg-7">
                              <div class="testimonial-active">
                                  <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
                                  <div class="testimonial-item">
                                      <div class="testi-content">
                                          <p><?php echo esc_html($testimonial_single['testimonial']); ?></p>
                                      </div>
                                      <div class="testi-avatar">
                                          <div class="testi-avatar-img">
                                              <img src="<?php echo esc_url($testimonial_single['image']['url']) ?>" alt="img">
                                          </div>
                                          <div class="testi-avatar-info">
                                              <span>- <?php echo esc_html($testimonial_single['name']); ?>, <?php echo esc_html($testimonial_single['designation']); ?></span>
                                          </div>
                                      </div>
                                  </div>
                                  <?php endforeach; ?>
                              </div>
                          </div>
                      </div>
                      <div class="testimonial-small-quote"><img src="<?php echo get_template_directory_uri(); ?>/images/testi_quote02.png" alt=""></div>
                  </div>
              </div>
          </section>
          <!-- testimonial-area-end -->

          <div class="testi-bg-shape"><img src="<?php echo get_template_directory_uri(); ?>/images/testi_shape.png" class="rotateme" alt=""></div>
      </div>

   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Testimonials );