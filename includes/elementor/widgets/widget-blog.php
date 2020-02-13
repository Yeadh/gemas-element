<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class gemas_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'gemas' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'gemas-elements' ];
   }
   protected function _register_controls() {

      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'gemas' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'gemas' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'gemas' ),
               'DESC' => __( 'Descending', 'gemas' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>


      <!-- blog-area -->
      <section class="blog-area gray-bg pt-120 pb-90">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="section-title mb-50">
                          <span>latest news & blog</span>
                          <h2>Recent News.</h2>
                      </div>
                  </div>
              </div>
              <div class="row">

              <?php
              $blog = new \WP_Query( array( 
                'post_type' => 'post',
                'posts_per_page' => 3,
                'ignore_sticky_posts' => true,
                'order' => $settings['order'],
              ));
              /* Start the Loop */
              while ( $blog->have_posts() ) : $blog->the_post();
              ?>

                  <div class="col-lg-4 col-md-6">
                      <div class="blog-post">
                          <div class="blog-thumb">
                              <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'gemas-404x297'); ?>" alt="<?php the_title_attribute() ?>"></a>
                          </div>
                          <div class="blog-content">
                              <div class="blog-meta">
                                  <ul>
                                      <li><i class="far fa-clock"></i><?php the_date() ?> <?php echo esc_html__( 'in','digimarket' ) ?>  <?php the_category() ?></li>
                                      <li><i class="fas fa-comment"></i>03</li>
                                      <li><i class="fas fa-heart"></i>26</li>
                                  </ul>
                              </div>
                              <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                              <p><?php echo wp_trim_words( get_the_content(), 16, '.' ); ?></p>
                              <div class="blog-post-avatar">
                                  <div class="blog-avatar-img">
                                      <img src="img/blog/blog_avatar_img.png" alt="">
                                  </div>
                                  <div class="blog-avatar-info">
                                      <a href="#">- <?php the_author() ?></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                <?php endwhile; wp_reset_postdata(); ?>

              </div>
          </div>
      </section>
      <!-- blog-area-end -->

      
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>

              <div class="col-lg-4 col-md-6">
                <div class="single-blog-post mb-30">
                    <div class="blog-thumb">
                        <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'gemas-404x297'); ?>" alt="<?php the_title() ?>"></a>
                    </div>
                    <div class="blog-content"> 
                        <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                        <p><?php echo wp_trim_words( get_the_content(), 16, '.' ); ?></p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="blog-read-more">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'gemas' ); ?></a>
                            </div>
                          </div>
                          <div class="col-md-6 text-right">
                            <div class="inner-blog-share mt-10">
                                <a href="#"><i class="fas fa-share-alt"></i></a>
                                <?php echo gemas_social_sharing(); ?>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>

              <?php endwhile; wp_reset_postdata(); ?>
         </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new gemas_Widget_Blog );