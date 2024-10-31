<?php 

/**
* Register widget with WordPress.
*/

add_action('widgets_init', 'register_podamibe_twitter_feed');
function register_podamibe_twitter_feed() {
    register_widget('podamibe_twitter_feed');
}

/**
 * Starts the main widget section
 */
class podamibe_twitter_feed extends WP_Widget {
    function __construct() {
        parent::__construct(
            'podamibe_twitter_feed',
            esc_html__( 'Podamibe Twitter Feeds', 'ptf' ),
            array( 'description' => esc_html__( 'Widget to display Twitter Feed on sidebar', 'ptf' ), ) 
            );
    }

    /**
     * Back-end widget form.
     */
    public function form( $instance ) {

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_main_icon' => '') );
        $ptf_main_icon   = esc_html( $instance[ 'ptf_main_icon' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_main_title' => '') );
        $ptf_main_title  = esc_html( $instance[ 'ptf_main_title' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_user_name' => '') );
        $ptf_user_name   = esc_html( $instance[ 'ptf_user_name' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_user_id' => '') );
        $ptf_user_id     = esc_html( $instance[ 'ptf_user_id' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_link_color' => '') );
        $ptf_link_color  = esc_attr( $instance[ 'ptf_link_color' ]);

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_theme_color' => '') );
        $ptf_theme_color = esc_attr( $instance[ 'ptf_theme_color' ]);

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_feed_number' => '4') );
        $ptf_feed_number = absint( $instance[ 'ptf_feed_number' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_border' => '') );
        $ptf_border      = esc_attr( $instance[ 'ptf_border' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_header' => '') );
        $ptf_header      = esc_attr( $instance[ 'ptf_header' ]); 

        $instance        = wp_parse_args( (array) $instance, array( 'ptf_footer' => '') );
        $ptf_footer      = esc_attr( $instance[ 'ptf_footer' ]); 

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_main_icon'); ?>">
                <?php _e( 'Main Icon :', 'ptf' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('ptf_main_icon'); ?>" name="<?php echo $this->get_field_name('ptf_main_icon'); ?>" type="text" value="<?php echo $ptf_main_icon; ?>" />
            <?php _e('Insert Icon from <a href="http://fontawesome.io/icons/" target="_blank">here</a>','psl'); ?>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_main_title'); ?>">
                <?php _e( 'Main Title :', 'ptf' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('ptf_main_title'); ?>" name="<?php echo $this->get_field_name('ptf_main_title'); ?>" type="text" value="<?php echo $ptf_main_title; ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('ptf_user_name'); ?>">
                <?php _e( 'Twitter Username :', 'ptf' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('ptf_user_name'); ?>" name="<?php echo $this->get_field_name('ptf_user_name'); ?>" type="text" value="<?php echo $ptf_user_name; ?>" required/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_user_id'); ?>">
                <?php _e( 'Twitter Widget Id :', 'ptf' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('ptf_user_id'); ?>" name="<?php echo $this->get_field_name('ptf_user_id'); ?>" type="text" value="<?php echo $ptf_user_id; ?>" />
        </p>     

        <p>
            <label for="<?php echo $this->get_field_id( 'ptf_link_color' ); ?>">
                <?php _e( 'Link Color :','ptf' ); ?>
            </label><br/>
            <input class="ptf-color" id="<?php echo $this->get_field_id( 'ptf_link_color' ); ?>" name="<?php echo $this->get_field_name( 'ptf_link_color' ); ?>" type="text" value="<?php echo esc_attr( $ptf_link_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_theme_color' ); ?>">
                <?php _e( 'Theme Color :','ptf' ); ?>
            </label> 
            <select class="widefat" name="<?php echo $this->get_field_name('ptf_theme_color'); ?>">
                <option  <?php echo ($ptf_theme_color =='dark')?'selected="selected"' : '' ?> value="dark"><?php _e('Dark','ptf');?></option>
                <option <?php echo ($ptf_theme_color =='light')?'selected="selected"' : '' ?> value="light"><?php _e('Light','ptf');?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_feed_number'); ?>">
                <?php _e( 'Numbers of Feeds to Display :', 'ptf' ); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('ptf_feed_number'); ?>" name="<?php echo $this->get_field_name('ptf_feed_number'); ?>" type="number" value="<?php echo $ptf_feed_number; ?>" min="2"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_border'); ?>">
                <?php _e( 'Border Option :', 'ptf' ); ?>
            </label>
            <select class="widefat" name="<?php echo $this->get_field_name('ptf_border'); ?>">
                <option <?php echo ($ptf_border =='yes')?'selected="selected"' : '' ?> value="yes"><?php _e('Yes','ptf');?></option>
                <option <?php echo ($ptf_border =='no')?'selected="selected"' : '' ?> value="no"><?php _e('No','ptf');?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_header'); ?>">
                <?php _e( 'Header Option :', 'ptf' ); ?>
            </label>
            <select class="widefat" name="<?php echo $this->get_field_name('ptf_header'); ?>">
                <option <?php echo ($ptf_header =='yes')?'selected="selected"' : '' ?> value="yes"><?php _e('Yes','ptf');?></option>
                <option <?php echo ($ptf_header =='no')?'selected="selected"' : '' ?> value="no"><?php _e('No','ptf');?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('ptf_footer'); ?>">
                <?php _e( 'Footer Option :', 'ptf' ); ?>
            </label>
            <select class="widefat" name="<?php echo $this->get_field_name('ptf_footer'); ?>">
                <option <?php echo ($ptf_footer =='yes')?'selected="selected"' : '' ?> value="yes"><?php _e('Yes','ptf');?></option>
                <option <?php echo ($ptf_footer =='no')?'selected="selected"' : '' ?> value="no"><?php _e('No','ptf');?></option>
            </select>
        </p>
        <?php }
        
    /**
     * Sanitize widget form values as they are saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;      
        $instance[ 'ptf_main_icon' ]      =  esc_html( $new_instance[ 'ptf_main_icon' ] );

        $instance[ 'ptf_main_title' ]     =  esc_html( $new_instance[ 'ptf_main_title' ] );

        $instance[ 'ptf_user_name' ]      =  esc_html( $new_instance[ 'ptf_user_name' ] );

        $instance[ 'ptf_user_id' ]        =  esc_html( $new_instance[ 'ptf_user_id' ] );

        $instance[ 'ptf_link_color' ]     =  esc_attr( $new_instance[ 'ptf_link_color' ] );

        $instance[ 'ptf_theme_color' ]    =  esc_attr( $new_instance[ 'ptf_theme_color' ] );

        $instance[ 'ptf_feed_number' ]    =  absint( $new_instance[ 'ptf_feed_number' ] );

        $instance[ 'ptf_border' ]         =  esc_attr( $new_instance[ 'ptf_border' ] );

        $instance[ 'ptf_header' ]         =  esc_attr( $new_instance[ 'ptf_header' ] );

        $instance[ 'ptf_footer' ]         =  esc_attr( $new_instance[ 'ptf_footer' ] );

        return $instance;
    }


    /**
     * Front-end display of widget.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        global $post;
        
        $ptf_main_icon    = isset( $instance[ 'ptf_main_icon' ] ) ? $instance[ 'ptf_main_icon' ] : ''; 

        $ptf_main_title   = isset( $instance[ 'ptf_main_title' ] ) ? $instance[ 'ptf_main_title' ] : '';

        $ptf_user_name    = isset( $instance[ 'ptf_user_name' ] ) ? $instance[ 'ptf_user_name' ] : '';

        $ptf_user_id      = isset( $instance[ 'ptf_user_id' ] ) ? $instance[ 'ptf_user_id' ] : '';
        
        $ptf_link_color   = isset( $instance[ 'ptf_link_color' ] ) ? $instance[ 'ptf_link_color' ] : '';

        $ptf_theme_color  = isset( $instance[ 'ptf_theme_color' ] ) ? $instance[ 'ptf_theme_color' ] : '';

        $ptf_feed_number  = isset( $instance[ 'ptf_feed_number' ] ) ? $instance[ 'ptf_feed_number' ] : '';

        $ptf_border       = isset( $instance[ 'ptf_border' ] ) ? $instance[ 'ptf_border' ] : '';

        $ptf_header       = isset( $instance[ 'ptf_header' ] ) ? $instance[ 'ptf_header' ] : '';

        $ptf_footer       = isset( $instance[ 'ptf_footer' ] ) ? $instance[ 'ptf_footer' ] : '';
        
        echo $before_widget; 

        if($ptf_user_name || $ptf_user_id) { ?>

        <div class="widget_ptf_twitter_widget clearfix">
            <div class="ptf-block">
                <div class="ptf-footer-icon">
                    <h4 class="ptf-main-title">
                        <i class="ptf-icon fa fa-<?php echo esc_attr($ptf_main_icon); ?>"></i>
                        <?php echo esc_html($ptf_main_title); ?>
                    </h4>
                </div>

                <a class="twitter-timeline"
                href="https://twitter.com/<?php echo esc_html($ptf_user_name);?>"
                data-widget-id="<?php echo esc_html($ptf_user_id); ?>"
                data-chrome="<?php echo esc_attr($ptf_footer);?>footer <?php echo esc_attr($ptf_border);?>borders <?php echo esc_attr($ptf_header);?>header"
                data-show-replies="false"
                data-tweet-limit="<?php echo esc_attr($ptf_feed_number);?>"
                data-link-color="<?php echo esc_attr($ptf_link_color); ?>"
                data-theme="<?php echo esc_attr($ptf_theme_color); ?>"
                ></a>               
            </div>
        </div>
        <?php }

        echo $after_widget;
    }

} 
/*--------------------------------------------------------------------------------------*/