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
class Espira_latest_post extends WP_Widget
{
    /**
     * Sets up a new Custom Menu widget instance.
     *
     * @since 3.0.0
     * @access public
     */
    public function __construct()
    {
        parent::__construct(
            'Espira_footer_latest_post',
            __('Espira Latest Post', 'Espira'),
            array(
                'classname' => 'Espira_footer_latest_post',
                'description' => __('Add Latest Post Section to footer widget area.', 'espira'),
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
    public function widget($args, $instance)
    {

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $instance['title'] = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        echo $args['before_widget'];

        $related_desc    = isset($instance['related_desc']) ?  $instance['related_desc']  : '';
        $related_title    = isset($instance['related_title']) ?  $instance['related_title']  : '';
        $post_number    = isset($instance['post_number']) ?  $instance['post_number']  : '';
        $orderby    = isset($instance['orderby']) ?  $instance['orderby']  : '';
        $order    = isset($instance['order']) ?  $instance['order']  : '';
        $categories = $instance['categories'];
        
    if(isset($related_title) && !empty($related_title)){
        echo '<p class="related-title"> '. $related_title .'</p>';
      }
  
      if(isset($related_desc) && !empty($related_desc)){
        echo '<p class="related-description"> '. $related_desc .'</p>';
      }   
      
      $args_latest_query = [
        'post_type' => 'post',
        'post__not_in'=> array(get_the_ID()),
        'post_status' => 'publish',
        'orderby' => $orderby,
        'order' => $order,
        'posts_per_page' => $post_number,
      ];
      if($categories != 'all'){
        $args_latest_query['cat']  = $categories;
      }
   
        $result = new WP_Query($args_latest_query);
        echo '<div class="news-rightbar footer-widget"><div class="footer-widget event"><ul>';
        if ($result->have_posts()): ?>
          <?php while ($result->have_posts()): $result->the_post();?>
		            <li><?php if ( has_post_thumbnail() ) {?>
		              <figure class="thumbnail-img rightboxwidget">
                      <?php the_post_thumbnail('widget_right_thumbnail'); ?>
		              </figure>
                     <?php }
                      else { ?>
		              <figure class="thumbnail-img default-image rightboxwidget">
		                <img src="<?php echo get_template_directory_uri(); ?>/images/espira-logo.png" alt="Event 1">
		              </figure>
                      <?php } ?>
                      <h5><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title();?></a></h5>
                      
                      <p><a href="<?php echo get_permalink($post->ID); ?>" class="button-rightbar"><span>LES ARTIKKEL</span> >></a></p>
		          </li>

		          <?php endwhile;?>
          <?php endif;
        wp_reset_postdata();

        echo "</ul></div></div>";
    
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
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['related_title'] = strip_tags($new_instance['related_title']);
        $instance['related_desc'] = strip_tags($new_instance['related_desc']);
        $instance['post_number'] = strip_tags($new_instance['post_number']);
        $instance['orderby'] = strip_tags($new_instance['orderby']);
        $instance['order'] = strip_tags($new_instance['order']);   
        $instance[ 'categories' ] = $new_instance['categories'];

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
    public function form($instance)
    {
        $related_title = isset($instance['related_title']) ? esc_attr($instance['related_title']) : '';
        $related_desc = isset($instance['related_desc']) ? esc_attr($instance['related_desc']) : '';
        $post_number = isset($instance['post_number']) ? esc_attr($instance['post_number']) : '';
        $orderby = isset($instance['orderby']) ? esc_attr($instance['orderby']) : '';
        $order = isset($instance['order']) ? esc_attr($instance['order']) : '';
        $checked = isset( $instance['checked'] ) ? (bool) $instance['checked'] : false;
       
        $savedcategories =  isset($instance['categories']) ? esc_attr($instance['categories']) : '';

        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0,
            "hide_empty" => 0,
        ) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('related_title'); ?>"><?php _e('Title *', 'Espira');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('related_title'); ?>" name="<?php echo $this->get_field_name('related_title'); ?>" type="text" value="<?php echo $related_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('related_desc'); ?>"><?php _e('Short Description', 'Espira');?></label>
            <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('related_desc'); ?>" name="<?php echo $this->get_field_name('related_desc'); ?>"><?php echo $related_desc; ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Choose Post Category', 'Espira');?></label><br>
        <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat" style="width:100%;"> 
        <?php
        
        foreach ( $categories as $category ) {
              $checked  = ($category->term_id == $savedcategories)?'selected':'';
              $all  = ($savedcategories == 'all' )?'selected':'';
             
            ?>

            <option <?php echo $checked; ?> value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
           
            <?php
        }
        echo '<option '. $all .' value="all">Alle</option>';
        ?>
        </select>
        <p>
            <label for="<?php echo $this->get_field_id('post_number'); ?>"><?php _e('No. of Post to show *', 'Espira');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="number" value="<?php echo $post_number; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Orderby', 'Espira');?></label>
            <select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" style="width:100%;"> 
                <option <?php selected( $instance['orderby'], 'date'); ?> value="date">Date</option> 
                <option <?php selected( $instance['orderby'], 'name'); ?> value="name">Name</option> 
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'Espira');?></label>
            <select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" class="widefat" style="width:100%;"> 
                <option <?php selected( $instance['order'], 'ASC'); ?> value="ASC">Ascending</option> 
                <option <?php selected( $instance['order'], 'DESC'); ?> value="DESC">Descending</option> 
            </select>
        </p>

		<?php
}
}

add_action('widgets_init', function () {
    register_widget('Espira_latest_post');
});

?>
