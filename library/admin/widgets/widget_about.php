<?php
/**
 * Widget API: WP_Nav_Menu_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement the Custom Menu widget.
 *
 * @since 3.0.0
 *
 * @see WP_Widget
 */
 class Espira_About_Widget extends WP_Widget {
	/**
	 * Sets up a new Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 */
   public function __construct() {
       parent::__construct(
           'Espira_footer_about_widget',
           __( 'Espira About Section', 'Espira' ),
           array(
               'classname'   => 'Espira_footer_about_widget',
               'description' => __( 'Add about section for footer widget area.', 'espira' )
               )
       );
   }
	/**
	 * Outputs the content for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Custom Menu widget instance.
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
    echo $args['before_widget'];
    echo '<div class="footer-widget">';

    $social_links = '';
    $espira_logo    = isset($instance['espira_logo']) ?  $instance['espira_logo']  : '';
    $espira_desc    = isset($instance['espira_desc']) ?  $instance['espira_desc']  : '';
    $espira_title    = isset($instance['title']) ?  $instance['title']  : '';
    $espirag_facebook_link    = isset($instance['espirag_facebook_link']) ?  $instance['espirag_facebook_link']  : '';
    $espira_twitter_link      = isset($instance['espira_twitter_link']) ?  $instance['espira_twitter_link']  : '';
    $espira_pinterest_link    = isset($instance['espira_pinterest_link']) ?  $instance['espira_pinterest_link']  : '';
    $espira_instagram_link    = isset($instance['espira_instagram_link']) ?  $instance['espira_instagram_link']  : '';


    if(isset($espira_logo) && !empty($espira_logo)){
      echo '<div class="footlogo"><img src="'. $espira_logo.'" alt=""></div>';
    } else if ( !empty($instance['title']) ) {
      echo $args['before_title'] . $instance['title'] . $args['after_title'];
    }
    // if(isset($espira_title) && !empty($espira_title)){
    //   echo '<p> '. $espira_title .'</p>';
    // }

    if(isset($espira_desc) && !empty($espira_desc)){
      echo '<p> '. $espira_desc .'</p>';
    }
    echo '<ul class="social-icons">';
    if(isset($espirag_facebook_link) && !empty($espirag_facebook_link)){
      $social_links .= '<li><a href="'. $espirag_facebook_link .'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
    }

    if(isset($espira_twitter_link) && !empty($espira_twitter_link)){
      $social_links .= '<li><a href="'. $espira_twitter_link .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
    }

    if(isset($espira_pinterest_link) && !empty($espira_pinterest_link)){
      $social_links .= '<li><a href="'. $espira_pinterest_link .'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
    }

    if(isset($espira_instagram_link) && !empty($espira_instagram_link)){
      $social_links .= '<li><a href="'. $espira_instagram_link .'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
    }

    if( isset($social_links) && !empty($social_links)){
        echo '<ul class="footsocial">'. $social_links . '</ul>';
      }
      echo '</ul>';
      echo '</div>';
		  echo $args['after_widget'];
	}
	/**
	 * Handles updating settings for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
      $instance                     = $old_instance;
      $instance['title']            = strip_tags( $new_instance['title'] );
      $instance['espira_desc']  = strip_tags( $new_instance['espira_desc'] );
      $instance['espira_logo']    = strip_tags( $new_instance['espira_logo'] );
      $instance['espirag_facebook_link']    = strip_tags( $new_instance['espirag_facebook_link'] );
      $instance['espira_twitter_link']    = strip_tags( $new_instance['espira_twitter_link'] );
      $instance['espira_pinterest_link']    = strip_tags( $new_instance['espira_pinterest_link'] );
      $instance['espira_instagram_link']    = strip_tags( $new_instance['espira_instagram_link'] );

      return $instance;
	}
	/**
	 * Outputs the settings form for the Custom Menu widget.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
    $title       = isset($instance['title']) ? esc_attr( $instance['title'] ) : '';
    $espira_desc  = isset($instance['espira_desc']) ? esc_attr( $instance['espira_desc'] ) : '';
    $espira_logo    = isset($instance['espira_logo']) ? esc_attr( $instance['espira_logo'] ) : '';
    $espirag_facebook_link    = isset($instance['espirag_facebook_link']) ? esc_attr( $instance['espirag_facebook_link'] ) : '';
    $espira_twitter_link    = isset($instance['espira_twitter_link']) ? esc_attr( $instance['espira_twitter_link'] ) : '';
    $espira_pinterest_link    = isset($instance['espira_pinterest_link']) ? esc_attr( $instance['espira_pinterest_link'] ) : '';
    $espira_instagram_link    = isset($instance['espira_instagram_link']) ? esc_attr( $instance['espira_instagram_link'] ) : '';

     ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title *', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('espira_logo'); ?>"><?php _e( 'Logo Image Path', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espira_logo'); ?>" name="<?php echo $this->get_field_name('espira_logo'); ?>" type="text" value="<?php echo $espira_logo; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('espira_desc'); ?>"><?php _e( 'Short Description', 'Espira' ); ?></label>
            <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('espira_desc'); ?>" name="<?php echo $this->get_field_name('espira_desc'); ?>"><?php echo $espira_desc; ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('espirag_facebook_link'); ?>"><?php _e( 'Facebook Link', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espirag_facebook_link'); ?>" name="<?php echo $this->get_field_name('espirag_facebook_link'); ?>" type="text" value="<?php echo $espirag_facebook_link; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('espira_twitter_link'); ?>"><?php _e( 'Twitter Link', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espira_twitter_link'); ?>" name="<?php echo $this->get_field_name('espira_twitter_link'); ?>" type="text" value="<?php echo $espira_twitter_link; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('espira_pinterest_link'); ?>"><?php _e( 'Pinterest Link', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espira_pinterest_link'); ?>" name="<?php echo $this->get_field_name('espira_pinterest_link'); ?>" type="text" value="<?php echo $espira_pinterest_link; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('espira_instagram_link'); ?>"><?php _e( 'Instagram Link', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espira_instagram_link'); ?>" name="<?php echo $this->get_field_name('espira_instagram_link'); ?>" type="text" value="<?php echo $espira_instagram_link; ?>" />
        </p>

		<?php
	}
}

add_action( 'widgets_init', function(){
    register_widget( 'Espira_About_Widget' );
});

?>
