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

      <!-- pricing-area -->
      <section class="pricing-area pt-120 pb-120">
          <div class="container">
              <div class="row justify-content-between ct-pricing">
                  <div class="col-xl-5 col-lg-6">
                      <div class="section-title mb-50">
                          <span><?php echo esc_html($settings['sub-title']); ?></span>
                          <h2><?php echo $settings['title']; ?></h2>
                      </div>
                      <div class="pricing-content">
                          <p>Business plan template presented here will get you started. A standard business plan consists of a single.</p>
                          <p>The price can be set to maximize profitability for each unit sold or from the market overall. It can be used to defend
                          an existing market from new entrants, to increase</p>
                          <div class="item--pricing-nav"> <span class="item--nav-monthly">Monthly</span>
                              <div class="item--nav"><div class="nav-bg"></div></div> <span class="item--nav-year">Yearly</span>
                          </div>
                          <form action="#" class="pricing-form">
                              <input type="radio" id="trial">
                              <label for="trial">or <span>Take 1 month free trial</span></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-lg-6 position-relative">
                      <div class="ct-pricing-body ct-pricing-monthly">
                          <div class="ct-pricing-item item--first">
                              <div class="item-popular">limited offer</div>
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title">Standard</h3>
                                      <div class="ct-pricing-price">$17</div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <li><i class="fas fa-check"></i>Up to 5 Web Pages</li>
                                  <li><i class="fas fa-check"></i>Single two theme optimization</li>
                                  <li><i class="fas fa-check"></i>1 year support & updates</li>
                                  <li><i class="fas fa-check"></i>20% Future Purchases</li>
                                  <li><i class="fas fa-check"></i>5 WordPress Theme</li>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="#">Purchase Now</a></div>
                          </div>
                          <div class="ct-pricing-item item--last">
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title">Standard</h3>
                                      <div class="ct-pricing-price">$59</div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <li><i class="fas fa-check"></i>Up to 5 Web Pages</li>
                                  <li><i class="fas fa-check"></i>Single two theme optimization</li>
                                  <li><i class="fas fa-check"></i>1 year support & updates</li>
                                  <li><i class="fas fa-check"></i>20% Future Purchases</li>
                                  <li><i class="fas fa-check"></i>5 WordPress Theme</li>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="#">Purchase Now</a></div>
                          </div>
                      </div>
                      <div class="ct-pricing-body ct-pricing-year">
                          <div class="ct-pricing-item item--first">
                              <div class="item-popular">limited offer</div>
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title">Standard</h3>
                                      <div class="ct-pricing-price">$99</div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <li><i class="fas fa-check"></i>Up to 5 Web Pages</li>
                                  <li><i class="fas fa-check"></i>Single two theme optimization</li>
                                  <li><i class="fas fa-check"></i>1 year support & updates</li>
                                  <li><i class="fas fa-check"></i>20% Future Purchases</li>
                                  <li><i class="fas fa-check"></i>5 WordPress Theme</li>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="#">Purchase Now</a></div>
                          </div>
                          <div class="ct-pricing-item item--last">
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title">Standard</h3>
                                      <div class="ct-pricing-price">$199</div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <li><i class="fas fa-check"></i>Up to 5 Web Pages</li>
                                  <li><i class="fas fa-check"></i>Single two theme optimization</li>
                                  <li><i class="fas fa-check"></i>1 year support & updates</li>
                                  <li><i class="fas fa-check"></i>20% Future Purchases</li>
                                  <li><i class="fas fa-check"></i>5 WordPress Theme</li>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="#">Purchase Now</a></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- pricing-area-end -->


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