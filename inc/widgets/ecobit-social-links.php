<?php
/**
 * @version  1.0
 * @package  Ecobit
 *
 */
 
 
/**************************************
*Creating Social Links Widget
***************************************/
 
class Ecobit_social_links extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'ecobit_social_links',


        // Widget name will appear in UI
        esc_html__( '[ Ecobit ] Social Links', 'ecobit' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer social links.', 'ecobit' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $desc 		= apply_filters( 'widget_text', $instance['desc'] );
    $facebook	= apply_filters( 'widget_text', $instance['facebook'] );
    $twitter	= apply_filters( 'widget_text', $instance['twitter'] );
    $linkedin	= apply_filters( 'widget_text', $instance['linkedin'] );
    $behance	= apply_filters( 'widget_text', $instance['behance'] );
    $dribbble	= apply_filters( 'widget_text', $instance['dribbble'] );

    // mc validation
    wp_enqueue_script( 'mc-validate');

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );
    if ( ! empty( $title ) )
    echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );


	    if( $desc ){
		    echo '<p>'.esc_html( $desc ).'</p>';
	    } ?>

        <div class="social_icon">
            <?php
            if( $facebook ){
                echo '<a href="'. esc_url( $facebook ) .'"><i class="fa fa-facebook"></i></a>';
            }
            if( $twitter ){
                echo '<a href="'. esc_url( $twitter ) .'"><i class="fa fa-twitter"></i></a>';
            }
            if( $dribbble ){
                echo '<a href="'. esc_url( $dribbble ) .'"><i class="fa fa-dribbble"></i></a>';
            }
            if( $linkedin ){
                echo '<a href="'. esc_url( $linkedin ) .'"><i class="fa fa-linkedin"></i></a>';
            }
            if( $behance ){
                echo '<a href="'. esc_url( $behance ) .'"><i class="fa fa-behance"></i></a>';
            }
            ?>
        </div>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {

        $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'Follow Us', 'ecobit' );
	    $desc  = isset( $instance[ 'desc' ] ) ? $instance[ 'desc' ] : '';
	    $facebook   = isset( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
	    $twitter    = isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
	    $linkedin   = isset( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '';
	    $behance    = isset( $instance[ 'behance' ] ) ? $instance[ 'behance' ] : '';
	    $dribbble   = isset( $instance[ 'dribbble' ] ) ? $instance[ 'dribbble' ] : '';


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'ecobit'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'ecobit'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook URL:' ,'ecobit'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>"><?php echo esc_textarea( $facebook ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter URL:' ,'ecobit'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>"><?php echo esc_textarea( $twitter ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'Linkedin URL:' ,'ecobit'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>"><?php echo esc_textarea( $linkedin ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php esc_html_e( 'Behance URL:' ,'ecobit'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>"><?php echo esc_textarea( $behance ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_html_e( 'Dribbble URL:' ,'ecobit'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>"><?php echo esc_textarea( $dribbble ); ?></textarea>
        </p>

    <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['desc']       = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
        $instance['facebook']   = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['twitter']    = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['linkedin']   = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
        $instance['behance']    = ( ! empty( $new_instance['behance'] ) ) ? strip_tags( $new_instance['behance'] ) : '';
        $instance['dribbble']   = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';

        return $instance;

    }

} // Class ecobit_social_links ends here


// Register and load the widget
function ecobit_social_links_widget_load() {
	register_widget( 'Ecobit_social_links' );
}
add_action( 'widgets_init', 'ecobit_social_links_widget_load' );