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
 class Espira_Post_cst extends WP_Widget {
	/**
	 * Sets up a new Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 */
   public function __construct() {
       parent::__construct(
           'Espira_footer_about_widget',
           __( 'Espira Postcast', 'Espira' ),
           array(
               'classname'   => 'Espira_Post_cst',
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
    echo '<div class="footer-widget nyheter-left">';

    $social_links = '';
    $espira_logo    = isset($instance['espira_logo']) ?  $instance['espira_logo']  : '';
    $espira_desc    = isset($instance['espira_desc']) ?  $instance['espira_desc']  : '';
    $espira_title    = isset($instance['title']) ?  $instance['title']  : '';
    $font_color    = isset($instance['font_color']) ?  $instance['font_color']  : '';
    $espirag_facebook_link    = isset($instance['espirag_facebook_link']) ?  $instance['espirag_facebook_link']  : '';
    $espira_bg_color    = isset($instance['espira_bg_color']) ?  $instance['espira_bg_color']  : '';
    $espira_btn_link    = isset($instance['espira_btn_link']) ?  $instance['espira_btn_link']  : '';


 echo '<div class="nyheter-block" style="background:'.$espira_bg_color.'">';
    if(isset($espira_logo) && !empty($espira_logo)){
      echo '<div class="image-block"><img src="'. $espira_logo.'" alt=""></div>';
    } else if ( !empty($instance['title']) ) {
      echo $args['before_title'] . $instance['title'] . $args['after_title'];
    }
    if(isset($espira_title) && !empty($espira_title)){
      echo '<p> '. $espira_title .'</p>';
    }

    if(isset($espira_desc) && !empty($espira_desc)){
      echo '<p class="nyheter-description"> '. $espira_desc .'</p>';
    }
        echo '<a href="'. $espira_btn_link .'" class="nyheter-button" target="_blank"> '. $espirag_facebook_link .'</a>';
      echo '</div></div>';
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
	public function update( $new_instance, $instance ) {
      $instance                     = $old_instance;
      $instance['title']            = strip_tags( $new_instance['title'] );
      $instance['espira_desc']  = strip_tags( $new_instance['espira_desc'] );
      $instance['espira_logo']    = strip_tags( $new_instance['espira_logo'] );
      $instance['espira_bg_color']    = strip_tags( $new_instance['espira_bg_color'] );
      $instance['espirag_facebook_link']    = strip_tags( $new_instance['espirag_facebook_link'] );
      $instance['espira_btn_link']    = strip_tags( $new_instance['espira_btn_link'] );

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
    $espira_bg_color    = isset($instance['espira_bg_color']) ? esc_attr( $instance['espira_bg_color'] ) : '';
    $espira_btn_link    = isset($instance['espira_btn_link']) ? esc_attr( $instance['espira_btn_link'] ) : '';
    $espira_logo    = isset($instance['espira_logo']) ? esc_attr( $instance['espira_logo'] ) : '';
    $espirag_facebook_link    = isset($instance['espirag_facebook_link']) ? esc_attr( $instance['espirag_facebook_link'] ) : '';

     ?>
     <script type="text/javascript">
    jQuery(document).ready(function($) { 
            jQuery('.color-picker').on('focus', function(){
                var parent = jQuery(this).parent();
                jQuery('#widget-espira_footer_about_widget-4-savewidget').removeAttr("disabled");
                jQuery('#widget-espira_footer_about_widget-4-savewidget').val("Save");
                jQuery(this).wpColorPicker()
                parent.find('.wp-color-result').click();
            }); 
    }); 
</script>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title *', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('espira_logo'); ?>"><?php _e( 'Feature Image Path', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espira_logo'); ?>" name="<?php echo $this->get_field_name('espira_logo'); ?>" type="text" value="<?php echo $espira_logo; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('espira_desc'); ?>"><?php _e( 'Short Description', 'Espira' ); ?></label>
            <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('espira_desc'); ?>" name="<?php echo $this->get_field_name('espira_desc'); ?>"><?php echo $espira_desc; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('espirag_facebook_link'); ?>"><?php _e( 'Button Text*', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espirag_facebook_link'); ?>" name="<?php echo $this->get_field_name('espirag_facebook_link'); ?>" type="text" value="<?php echo $espirag_facebook_link; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('espira_btn_link'); ?>"><?php _e( 'Add Button Link*', 'Espira' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('espira_btn_link'); ?>" name="<?php echo $this->get_field_name('espira_btn_link'); ?>" type="text" value="<?php echo $espira_btn_link; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('espira_bg_color'); ?>"><?php _e( 'Choose Background Color', 'Espira' ); ?></label>
            <input class="widefat color-picker" id="<?php echo $this->get_field_id('espira_bg_color'); ?>" name="<?php echo $this->get_field_name('espira_bg_color'); ?>" type="text" value="<?php echo $espira_bg_color; ?>" />
        </p>
		<?php
	}
}

add_action( 'widgets_init', function(){
    register_widget( 'Espira_Post_cst' );
});

?>
