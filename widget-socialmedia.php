<?php
  
/*
  Plugin Name: ichderfisch - Widget - Social Media Links
  Plugin URI: http://www.ichderfisch.de
  Description: Provide links to my social media profiles as widget
  Version: 0.1
  Author: Dennis Fischer
  Author URI: http://www.ichderfisch.de
*/


class ichderfisch_widget_social extends WP_Widget { 


  /* Widget Constructor */
  function __construct() {
	    parent::__construct(
	            'ichderfisch_widget_social',
	            __('Social Media', 'translation_domain'), // Name
	            array('description' => __('Links zu meinen Social-Media Profilen', 'translation_domain'),) // Description
	    );
	}
  
  /* Backend Input Form */
  public function form($instance) {
        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'Socialize' : null;
 
        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['github']) ? $github = $instance['github'] : null;
        isset($instance['pinterest']) ? $pinterest = $instance['pinterest'] : null;
        isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
        </p>
        <?php
          
    }
    
    /* Update Inputs */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['github'] = (!empty($new_instance['github']) ) ? strip_tags($new_instance['github']) : '';
        $instance['pinterest'] = (!empty($new_instance['pinterest']) ) ? strip_tags($new_instance['pinterest']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram']) ) ? strip_tags($new_instance['instagram']) : '';
        
        return $instance;
    }
    
    /* Display Widget in Frontend */
    public function widget($args, $instance) {
 
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $github = $instance['github'];
        $pinterest = $instance['pinterest'];
        $instagram = $instance['instagram'];
 
        // social profile link
        $facebook_profile = '<li><a href="' . $facebook . '">Follow me on Facebook</a></li>';
        $twitter_profile = '<li><a href="' . $twitter . '">Follow me on Twitter</a></li>';
        $github_profile = '<li><a href="' . $github . '">Fork me on Github</a></li>';
        $pinterest_profile = '<li><a href="' . $pinterest . '">Pin me on Pinterest</a></li>';
        $instagram_profile = '<li><a href="' . $instagram .'">Like me on Instagram</a></li>';
         
        echo $args['before_widget'];
        if (!empty($title)) {
        echo $args['before_title'] . $title . $args['after_title'];
        }
         
                echo '<ul class="social-icons">';
                echo (!empty($facebook) ) ? $facebook_profile : null;
                echo (!empty($twitter) ) ? $twitter_profile : null;
                echo (!empty($github) ) ? $github_profile : null;
                echo (!empty($pinterest) ) ? $pinterest_profile : null;
                echo (!empty($instagram) ) ? $instagram_profile : null;
                echo '</ul>';
                echo $args['after_widget'];
    }

}


// register widget
function register_ichderfisch_widget_social() {
  register_widget('ichderfisch_widget_social');
}
 
add_action('widgets_init', 'register_ichderfisch_widget_social');