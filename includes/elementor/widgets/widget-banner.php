<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class gemas_Widget_banner extends Widget_Base {
 
   public function get_name() {
      return 'banner';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Banner image', 'gemas' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => get_template_directory_uri().'/images/slider_bg.jpg',
          ],
        ]
      );

      $this->add_control(
      'banner_circle',
        [
          'label' => __( 'Circle image', 'gemas' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => get_template_directory_uri().'/images/slider_img02.png',
          ],
        ]
      );

      $this->add_control(
      'banner_square',
        [
          'label' => __( 'Screenshot', 'gemas' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => get_template_directory_uri().'/images/slider_img01.png',
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('We Make Creative Market','gemas')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Find technology or people for digital projects in public sector. Find an individual specialist. eg a developer or user researcher.','gemas')
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
    // get our input from the widget settings.
    $settings = $this->get_settings_for_display(); ?>

    <!-- slider-area -->
    <section class="slider-area slider-bg" style="background-image: url(<?php echo esc_url($settings['banner_image']['url']) ?>);">
      <div class="slider-shape"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_shape01.png" alt="img"></div>
      <div class="slider-shape s-shape2"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_shape02.png" alt="img"></div>
      <div class="slider-shape s-shape3"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_shape03.png" alt="img"></div>
      <div class="container-fluid slider-container">
          <div class="slider-wrap">
              <div class="row align-items-center">
                  <div class="col-lg-6">
                      <div class="slider-content">
                          <h2 class="wow fadeInDown" data-wow-delay="0.2s"><?php echo $settings['title'] ?></h2>
                          <p class="wow fadeInUp" data-wow-delay="0.2s"><?php echo esc_html( $settings['description'] ) ?></p>
                          <a href="#" class="btn wow fadeInUp" data-wow-delay="0.4s">Browse Projects</a>
                      </div>
                  </div>
                  <div class="col-lg-6 d-none d-lg-block">
                      <div class="slider-img fix text-right wow fadeInRight" data-wow-delay="0.6s">
                          <img src="<?php echo esc_url($settings['banner_circle']['url']) ?>" class="slider-img2" alt="">
                          <img src="<?php echo esc_url($settings['banner_square']['url']) ?>" alt="">
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="slider-img-ellipse"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_img_ellipse.png" class="rotateme" alt=""></div>
        <div class="slider-bottom-shape"><img src="<?php echo get_template_directory_uri(); ?>/images/slider_bottom_shape.png" class="rotateme" alt=""></div>
    </section>
    <!-- slider-area-end -->

    <?php }
}

Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_banner );