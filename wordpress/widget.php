<?php
/**
 * @package Savvy IDX
 */
class advanced_search_widget extends WP_Widget {
	/**
	 * Register IDX widget
	 */
	function __construct() {
		parent::__construct(
			'advanced_search_widget',
			__( 'Savvy IDX Slider/Q search' ),
			array( 'description' => __( 'Slider or q-search' ) )
		);
		if ( is_active_widget( false, false, $this->id_base ) ) {
			//add_action( 'wp_head', array( $this, 'css' ) );
		}
	}

	/**
	 * Back-end widget form
	 *
	 */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance['title'] );
			$search_id = esc_attr( $instance['search_id'] );
		}
		else {
			$title = __( 'My Slider / Quick Search' );
			$search_id =__( 'Select slider or q-search' );
		}
?>
		<p>
			<label for="<?php $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo  $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'search_id' ); ?>"><?php _e( 'Search ID:' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'search_id' ); ?>" name="<?php echo $this->get_field_name( 'search_id' ); ?>" >
			<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "Xxxxxxxx_data";
				$searchs=$wpdb->get_results( "SELECT * FROM {$table_name}' ");
				foreach ($searchs as $search){	?>
					<option <?php if ($search_id ==  $search->id) { echo "selected='selected'";} ?> value="<?php echo $search->id; ?>"><?php echo $search->id.$search->name; ?></option>
				<?php
				} ?>
			</select>
		</p>

<?php 
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['search_id'] = strip_tags( $new_instance['search_id'] );
		return $instance;
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget( $args, $instance ) {
		$count = get_option( 'advanced_search_spam_count' );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}

	gallery_frontend($instance['search_id']);
		echo $args['after_widget'];
	}
}

class custom_search_widget extends WP_Widget {
	/**
	 * Register widget for Xxxxxxxx Custom Search.
	 */
	function __construct() {
		parent::__construct(
			'custom_search_widget',
			__( 'Custom Search Widget' ),
			array( 'description' => __( 'Display the custom_search' ) )
		);

		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'css' ) );
		}
	}
	/**
	 * Back-end widget form.
	 *
	 */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance['title'] );
			$search_id = esc_attr( $instance['search_id'] );
		}
		else {
			$title = __( 'My Custom Search' );
			$search_id =__( 'Select the Search you want to show' );
		}
		?>
		<p>
			<label for="<?php $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'search_id' ); ?>"><?php _e( 'Search ID:' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'search_id' ); ?>" name="<?php echo $this->get_field_name( 'search_id' ); ?>" >
			<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "Xxxxxxxx_data";
				$searchs=$wpdb->get_results("SELECT * FROM {$table_name} WHERE type ='Custom Search' ");
				foreach ($searchs as $search){	?>
					<option value="<?php echo $search->id; ?>" <?php if ($search_id ==  $search->id) { echo "selected='selected'";} ?> ><?php echo $search->id.$search->name; ?></option>
				<?php
				}
				?>
			</select>
		</p>
	<?php
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['search_id'] = strip_tags( $new_instance['search_id'] );
		return $instance;
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget( $args, $instance ) {
		$count = get_option( 'custom_search_spam_count' );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
        echo '<div class="Xxxxxxxx_div" style="display:none;">';
		gallery_frontend($instance['search_id']);
        echo '</div>';
		echo $args['after_widget'];
	}
}



class Xxxxxxxx_agent_widget extends WP_Widget {

	/**
	 * Register widget for Xxxxxxxx Agent.
	 */
	function __construct() {
		parent::__construct(
			'Xxxxxxxx_agent_widget', // Base ID
			__('Xxxxxxxx agent Widget', 'Xxxxxxxx_agent_Widget'), // Name
			array( 'description' => __( 'Display the Xxxxxxxx agent info', 'agent_info' ), ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = esc_attr( $instance['title'] );
		$colorscheme = esc_attr( $instance['colorscheme'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) && !empty($colorscheme) )
			echo $args['before_title'] . $title . $args['after_title'];
		Xxxxxxxx_agent($colorscheme);
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	*/
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) && isset( $instance[ 'colorscheme' ] ) ) {
			$title = $instance[ 'title' ];
			$colorscheme=$instance[ 'colorscheme' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
			$colorscheme=__( 'Select the Colorscheme you want ' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

	<p>
			<label for="<?php $this->get_field_id( 'colorscheme' ); ?>"><?php _e( 'Colorscheme:' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'colorscheme' ); ?>" name="<?php echo $this->get_field_name( 'colorscheme' ); ?>" >

				<option value="red" <?php if (esc_attr( $colorscheme)  == 'red') { echo "selected='selected'";} ?> >Red</option>
				<option value="blue" <?php if (esc_attr( $colorscheme) == 'blue') { echo "selected='selected'";} ?> >Blue</option>
				<option value="green" <?php if (esc_attr( $colorscheme) == 'green') { echo "selected='selected'";}?> >Green</option>
				<option value="gray" <?php if ( esc_attr( $colorscheme) == 'gray') { echo "selected='selected'";} ?> >Gray</option>

			</select>
		</p>
	<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['colorscheme'] = ( ! empty( $new_instance['colorscheme'] ) ) ? strip_tags( $new_instance['colorscheme'] ) : '';
		return $instance;
	}


}

add_action('widgets_init','Xxxxxxxx_register_widgets');
function Xxxxxxxx_register_widgets() {
	register_widget( 'advanced_search_widget' );
	register_widget( 'custom_search_widget' );
	register_widget( 'Xxxxxxxx_agent_widget' );
}

