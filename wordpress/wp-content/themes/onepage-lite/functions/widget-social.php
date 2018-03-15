<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Social Profile Icons
	Description: Show social profile icons in sidebar or footer.
	Version: 1.0

-----------------------------------------------------------------------------------*/

//Widget Registration.
 
function mts_load_widget() {

	register_widget( 'Social_Profile_Icons_Widget' );

}
class Social_Profile_Icons_Widget extends WP_Widget {

	protected $defaults;
	protected $sizes;
	protected $profiles;

	function __construct() {

		$this->defaults = array(
			'title'			=> '',
			'new_window'	=> 0,
			'size'			=> 32,
			'facebook'		=> '',
			'behance'		=> '',
			'flickr'		=> '',
			'gplus'			=> '',
			'pinterest'		=> '',
			'instagram'		=> '',
			'dribbble'		=> '',
			'linkedin'		=> '',
			'skype'			=> '',
			'soundcloud'	=> '',
			'email'			=> '',
			'rss'			=> '',
			'stumbleupon'	=> '',
			'twitter'		=> '',
			'youtube'		=> '',
			'vimeo'			=> '',
			'foursquare'	=> '',
			'reddit'		=> '',
			'github'		=> '',
			'dropbox'		=> '',
			'tumblr'		=> '',
		);


		$this->sizes = array( '32' );

		$this->profiles = array(
			'facebook' => array(
				'label'	  => __( 'Facebook URI', 'onepage-lite' ),
				'pattern' => '<li class="social-facebook"><a title="'.__('Facebook','onepage-lite').'" href="%s" %s><i class="fa fa-facebook"></i></a></li>',
			),
			'behance' => array(
				'label'	  => __( 'Behance URI', 'onepage-lite' ),
				'pattern' => '<li class="social-behance"><a title="'.__('Behance','onepage-lite').'" href="%s" %s><i class="fa fa-behance"></i></a></li>',
			),
			'flickr' => array(
				'label'	  => __( 'Flickr URI', 'onepage-lite' ),
				'pattern' => '<li class="social-flickr"><a title="'.__('Flickr','onepage-lite').'" href="%s" %s><i class="fa fa-flickr"></i></a></li>',
			),
			'gplus' => array(
				'label'	  => __( 'Google+ URI', 'onepage-lite' ),
				'pattern' => '<li class="social-gplus"><a title="'.__('Google+','onepage-lite').'" href="%s" %s><i class="fa fa-google-plus"></i></a></li>',
			),
			'pinterest' => array(
				'label'	  => __( 'Pinterest URI', 'onepage-lite' ),
				'pattern' => '<li class="social-pinterest"><a title="'.__('Pinterest','onepage-lite').'" href="%s" %s><i class="fa fa-pinterest"></i></a></li>',
			),
			'instagram' => array(
				'label'	  => __( 'Instagram URI', 'onepage-lite' ),
				'pattern' => '<li class="social-instagram"><a title="'.__('Instagram','onepage-lite').'" href="%s" %s><i class="fa fa-instagram"></i></a></li>',
			),
			'dribbble' => array(
				'label'	  => __( 'Dribbble URI', 'onepage-lite' ),
				'pattern' => '<li class="social-dribbble"><a title="'.__('Dribbble','onepage-lite').'" href="%s" %s><i class="fa fa-dribbble"></i></a></li>',
			),
			'linkedin' => array(
				'label'	  => __( 'Linkedin URI', 'onepage-lite' ),
				'pattern' => '<li class="social-linkedin"><a title="'.__('LinkedIn','onepage-lite').'" href="%s" %s><i class="fa fa-linkedin"></i></a></li>',
			),
			'soundcloud' => array(
				'label'	  => __( 'SoundCloud URI', 'onepage-lite' ),
				'pattern' => '<li class="social-soundcloud"><a title="'.__('SoundCloud','onepage-lite').'" href="%s" %s><i class="fa fa-soundcloud"></i></a></li>',
			),
			'twitter' => array(
				'label'	  => __( 'Twitter URI', 'onepage-lite' ),
				'pattern' => '<li class="social-twitter"><a title="'.__('Twitter','onepage-lite').'" href="%s" %s><i class="fa fa-twitter"></i></a></li>',
			),
			'vimeo' => array(
				'label'	  => __( 'Vimeo URI', 'onepage-lite' ),
				'pattern' => '<li class="social-vimeo"><a title="'.__('Vimeo','onepage-lite').'" href="%s" %s><i class="fa fa-vimeo-square"></i></a></li>',
			),
			'stumbleupon' => array(
				'label'	  => __( 'StumbleUpon URI', 'onepage-lite' ),
				'pattern' => '<li class="social-stumbleupon"><a title="'.__('StumbleUpon','onepage-lite').'" href="%s" %s><i class="fa fa-stumbleupon"></i></a></li>',
			),
			'tumblr' => array(
				'label'	  => __( 'Tumblr URI', 'onepage-lite' ),
				'pattern' => '<li class="social-tumblr"><a title="'.__('Tumblr','onepage-lite').'" href="%s" %s><i class="fa fa-tumblr"></i></a></li>',
			),
			'github' => array(
				'label'	  => __( 'GitHub URI', 'onepage-lite' ),
				'pattern' => '<li class="social-github"><a title="'.__('GitHub','onepage-lite').'" href="%s" %s><i class="fa fa-github-alt"></i></a></li>',
			),
			'youtube' => array(
				'label'	  => __( 'YouTube URI', 'onepage-lite' ),
				'pattern' => '<li class="social-youtube"><a title="'.__('YouTube','onepage-lite').'" href="%s" %s><i class="fa fa-youtube"></i></a></li>',
			),
			'foursquare' => array(
				'label'	  => __( 'FourSquare URI', 'onepage-lite' ),
				'pattern' => '<li class="social-foursquare"><a title="'.__('FourSquare','onepage-lite').'" href="%s" %s><i class="fa fa-foursquare"></i></a></li>',
			),
			'reddit' => array(
				'label'	  => __( 'Reddit URI', 'onepage-lite' ),
				'pattern' => '<li class="social-reddit"><a title="'.__('Reddit','onepage-lite').'" href="%s" %s><i class="fa fa-reddit"></i></a></li>',
			),
			'dropbox' => array(
				'label'	  => __( 'Dropbox URI', 'onepage-lite' ),
				'pattern' => '<li class="social-dropbox"><a title="'.__('GitHub','onepage-lite').'" href="%s" %s><i class="fa fa-dropbox"></i></a></li>',
			),
			'skype' => array(
				'label'	  => __( 'Skype URI', 'onepage-lite' ),
				'pattern' => '<li class="social-skype"><a title="'.__('Skype','onepage-lite').'" href="%s" %s><i class="fa fa-skype"></i></a></li>',
			),
			'email' => array(
				'label'	  => __( 'Email URI', 'onepage-lite' ),
				'pattern' => '<li class="social-email"><a title="'.__('Email','onepage-lite').'" href="%s" %s><i class="fa fa-envelope-o"></i></a></li>',
			),
			'rss' => array(
				'label'	  => __( 'RSS URI', 'onepage-lite' ),
				'pattern' => '<li class="social-rss"><a title="'.__('RSS','onepage-lite').'" href="%s" %s><i class="fa fa-rss"></i></a></li>',
			),
		);

		$widget_ops = array(
			'classname'	 => 'social-profile-icons',
			'description' => __( 'Show profile icons.', 'onepage-lite' ),
		);

		$control_ops = array(
			'id_base' => 'social-profile-icons',
			#'width'   => 505,
			#'height'  => 350,
		);

		parent::__construct( 'social-profile-icons', __( 'MTS Social Profile Icons', 'onepage-lite' ), $widget_ops, $control_ops );

	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'onepage-lite' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

		<p><label><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'onepage-lite' ); ?></label></p>

		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />

		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {

			printf( '<p><label for="%s">%s:</label>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			printf( '<input type="text" id="%s" class="widefat" name="%s" value="%s" /></p>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $this->get_field_name( $profile ) ), esc_url( $instance[$profile] ) );

		}

	}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $newinstance, $oldinstance ) {

		foreach ( $newinstance as $key => $value ) {

			/** Sanitize Profile URIs */
			if ( array_key_exists( $key, (array) $this->profiles ) ) {
				$newinstance[$key] = esc_url( $newinstance[$key] );
			}

		}

		return $newinstance;

	}

	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			$output = '';

			$new_window = $instance['new_window'] ? 'target="_blank"' : '';

			foreach ( (array) $this->profiles as $profile => $data ) {
				if ( ! empty( $instance[$profile] ) )
					$output .= sprintf( $data['pattern'], esc_url( $instance[$profile] ), $new_window );
			}

			if ( $output )
				printf( '<div class="social-profile-icons clearfix"><ul class="%s">%s</ul></div>', '',$output );

		echo $after_widget;

	}

}

add_action( 'widgets_init', 'mts_load_widget' );
