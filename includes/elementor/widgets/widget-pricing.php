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
         'subtitle',
         [
            'label' => __( 'Sub title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'pricing strategy'
         ]
      );
      
      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Gemas Will Offer Price for Your Business!',
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'gemas' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __( 'Business plan template presented here will get you started. A standard business plan consists of a single.

            The price can be set to maximize profitability for each unit sold or from the market overall. It can be used to defend an existing market from new entrants, to increase', 'gemas' ),
         ]
      );

      $this->add_control(
        'hr',
        [
          'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
      );

      $feature_1 = new \Elementor\Repeater();

      $feature_1->add_control(
         'feature_1',
         [
            'label' => __( 'Feature', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'gemas' )
         ]
      );

      $this->add_control(
         'feature_list_1',
         [
            'label' => __( 'Feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature_1->get_controls(),
            'default' => [
               [
                  'feature_1' => __( 'Up to 5 Web Pages', 'gemas' )
               ],
               [
                  'feature_1' => __( 'Single two theme optimization', 'gemas' )
               ],
               [
                  'feature_1' => __( '1 year support & updates', 'gemas' )
               ],
               [
                  'feature_1' => __( '20% Future Purchases', 'gemas' )
               ],
               [
                  'feature_1' => __( '5 WordPress Theme', 'gemas' )
               ]
            ],
            'title_field_1' => '{{{ feature_1 }}}',
         ]
      );

      $this->add_control(
         'btn_text_1',
         [
            'label' => __( 'button text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Purchase Now',
         ]
      );

      $this->add_control(
         'btn_url_1',
         [
            'label' => __( 'button URL', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended_1',
         [
            'label' => __( 'Recommended', 'gemas' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'gemas' ),
            'label_off' => __( 'Off', 'gemas' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->add_control(
         'package_1',
         [
            'label' => __( 'Package', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard',
         ]
      );

      $this->add_control(
         'price_1',
         [
            'label' => __( 'Price', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '$17'
         ]
      );

      $this->add_control(
        'hr2',
        [
          'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
      );

      $feature_2 = new \Elementor\Repeater();

      $feature_2->add_control(
         'feature_2',
         [
            'label' => __( 'Feature', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'gemas' )
         ]
      );

      $this->add_control(
         'feature_list_2',
         [
            'label' => __( 'Feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature_2->get_controls(),
            'default' => [
               [
                  'feature_2' => __( 'Up to 5 Web Pages', 'gemas' )
               ],
               [
                  'feature_2' => __( 'Single two theme optimization', 'gemas' )
               ],
               [
                  'feature_2' => __( '1 year support & updates', 'gemas' )
               ],
               [
                  'feature_2' => __( '20% Future Purchases', 'gemas' )
               ],
               [
                  'feature_2' => __( '5 WordPress Theme', 'gemas' )
               ]
            ],
            'title_field_2' => '{{{ feature_2 }}}',
         ]
      );

      $this->add_control(
         'btn_text_2',
         [
            'label' => __( 'button text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Purchase Now',
         ]
      );

      $this->add_control(
         'btn_url_2',
         [
            'label' => __( 'button URL', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'package_2',
         [
            'label' => __( 'Package', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard',
         ]
      );

      $this->add_control(
         'price_2',
         [
            'label' => __( 'Price', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '$17'
         ]
      );

      $this->add_control(
        'hr3',
        [
          'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
      );
      

      $feature_3 = new \Elementor\Repeater();

      $feature_3->add_control(
         'feature_3',
         [
            'label' => __( 'Feature', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'gemas' )
         ]
      );

      $this->add_control(
         'feature_list_3',
         [
            'label' => __( 'Feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature_2->get_controls(),
            'default' => [
               [
                  'feature_3' => __( 'Up to 5 Web Pages', 'gemas' )
               ],
               [
                  'feature_3' => __( 'Single two theme optimization', 'gemas' )
               ],
               [
                  'feature_3' => __( '1 year support & updates', 'gemas' )
               ],
               [
                  'feature_3' => __( '20% Future Purchases', 'gemas' )
               ],
               [
                  'feature_3' => __( '5 WordPress Theme', 'gemas' )
               ]
            ],
            'title_field_3' => '{{{ feature_3 }}}',
         ]
      );

      $this->add_control(
         'btn_text_3',
         [
            'label' => __( 'button text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Purchase Now',
         ]
      );

      $this->add_control(
         'btn_url_3',
         [
            'label' => __( 'button URL', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended_3',
         [
            'label' => __( 'Recommended', 'gemas' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'gemas' ),
            'label_off' => __( 'Off', 'gemas' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->add_control(
         'package_3',
         [
            'label' => __( 'Package', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard',
         ]
      );

      $this->add_control(
         'price_3',
         [
            'label' => __( 'Price', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '$17'
         ]
      );

      $this->add_control(
        'hr4',
        [
          'type' => \Elementor\Controls_Manager::DIVIDER,
        ]
      );
      

      $feature_4 = new \Elementor\Repeater();

      $feature_4->add_control(
         'feature_3',
         [
            'label' => __( 'Feature', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'gemas' )
         ]
      );

      $this->add_control(
         'feature_list_4',
         [
            'label' => __( 'Feature List', 'gemas' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature_2->get_controls(),
            'default' => [
               [
                  'feature_4' => __( 'Up to 5 Web Pages', 'gemas' )
               ],
               [
                  'feature_4' => __( 'Single two theme optimization', 'gemas' )
               ],
               [
                  'feature_4' => __( '1 year support & updates', 'gemas' )
               ],
               [
                  'feature_4' => __( '20% Future Purchases', 'gemas' )
               ],
               [
                  'feature_4' => __( '5 WordPress Theme', 'gemas' )
               ]
            ],
            'title_field_4' => '{{{ feature_3 }}}',
         ]
      );

      $this->add_control(
         'btn_text_4',
         [
            'label' => __( 'button text', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Purchase Now',
         ]
      );

      $this->add_control(
         'btn_url_4',
         [
            'label' => __( 'button URL', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'package_4',
         [
            'label' => __( 'Package', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard',
         ]
      );

      $this->add_control(
         'price_4',
         [
            'label' => __( 'Price', 'gemas' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '$17'
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
                          <span><?php echo esc_html($settings['subtitle']); ?></span>
                          <h2><?php echo $settings['title']; ?></h2>
                      </div>
                      <div class="pricing-content">
                          <p><?php echo $settings['desc']; ?></p>
                          <div class="item--pricing-nav"> <span class="item--nav-monthly"><?php echo esc_html__( 'Monthly', 'digimarket' ) ?></span>
                              <div class="item--nav"><div class="nav-bg"></div></div> <span class="item--nav-year"><?php echo esc_html__( 'Yearly', 'digimarket' ) ?></span>
                          </div>
                          <form action="#" class="pricing-form">
                              <input type="radio" id="trial">
                              <label for="trial"><?php echo esc_html__( 'or', 'digimarket' ) ?> <span><?php echo esc_html__( 'Take 1 month free trial', 'digimarket' ) ?></span></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-lg-6 position-relative">

                      <div class="ct-pricing-body ct-pricing-monthly">
                          <div class="ct-pricing-item item--first">
                            <?php if (true == $settings['recommended_1']): ?>
                              <div class="item-popular"><?php echo esc_html__( 'limited offer','gemas' ) ?></div>
                            <?php endif ?>                              
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title"><?php echo esc_html($settings['package_1']); ?></h3>
                                      <div class="ct-pricing-price"><?php echo esc_html($settings['price_1']); ?></div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <?php foreach( $settings['feature_list_1'] as $index => $feature ) { ?>
                                    <li><i class="fas fa-check"></i><?php echo $feature['feature_1'] ?></li>
                                 <?php } ?>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="<?php echo esc_url( $settings['btn_url_1'] ) ?>"><?php echo esc_html( $settings['btn_text_1'] ) ?></a></div>
                          </div>
                          <div class="ct-pricing-item item--last">
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title"><?php echo esc_html($settings['package_2']); ?></h3>
                                      <div class="ct-pricing-price"><?php echo esc_html($settings['price_2']); ?></div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <?php foreach( $settings['feature_list_2'] as $index => $feature ) { ?>
                                    <li><i class="fas fa-check"></i><?php echo $feature['feature_2'] ?></li>
                                 <?php } ?>
                              </ul>
                              <div class="ct-pricing-button">
                                 <a class="btn btn-default" href="<?php echo esc_url( $settings['btn_url_2'] ) ?>"><?php echo esc_html( $settings['btn_text_2'] ) ?></a>
                              </div>
                          </div>
                      </div>

                      <div class="ct-pricing-body ct-pricing-year">
                          <div class="ct-pricing-item item--first">
                              <?php if (true == $settings['recommended_3']): ?>
                              <div class="item-popular"><?php echo esc_html__( 'limited offer','gemas' ) ?></div>
                            <?php endif ?>  
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title"><?php echo esc_html($settings['package_3']); ?></h3>
                                      <div class="ct-pricing-price"><?php echo esc_html($settings['price_3']); ?></div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                  <?php foreach( $settings['feature_list_3'] as $index => $feature ) { ?>
                                    <li><i class="fas fa-check"></i><?php echo $feature['feature_3'] ?></li>
                                 <?php } ?>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="<?php echo esc_url( $settings['btn_url_3'] ) ?>"><?php echo esc_html( $settings['btn_text_3'] ) ?></a></div>
                          </div>
                          <div class="ct-pricing-item item--last">
                              <div class="ct-pricing-meta">
                                  <div class="ct-pricing-meta-inner">
                                      <h3 class="ct-pricing-title"><?php echo esc_html($settings['package_4']); ?></h3>
                                      <div class="ct-pricing-price"><?php echo esc_html($settings['price_4']); ?></div>
                                  </div>
                              </div>
                              <ul class="item--feature">
                                 <?php foreach( $settings['feature_list_4'] as $index => $feature ) { ?>
                                    <li><i class="fas fa-check"></i><?php echo $feature['feature_4'] ?></li>
                                 <?php } ?>
                              </ul>
                              <div class="ct-pricing-button"> <a class="btn btn-default" href="<?php echo esc_url( $settings['btn_url_4'] ) ?>"><?php echo esc_html( $settings['btn_text_4'] ) ?></a></div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </section>
      <!-- pricing-area-end -->

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Pricing );