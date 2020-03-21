<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {
		public function __construct() {
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'airiamit' ),
				esc_html__( 'Theme Settings', 'airiamit' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		public static function sanitize( $options ) {
            
			if ( $options || $_POST ) {
                $options = $_POST;
                
                if ( ! empty( $options['header_right_html'] ) ) {
					$options['header_right_html'] = $options['header_right_html'];
				} else {
					unset( $options['header_right_html'] );
                }
                

				/* if ( ! empty( $options['checkbox_example'] ) ) {
					$options['checkbox_example'] = 'on';
				} else {
					unset( $options['checkbox_example'] );
				}

				if ( ! empty( $options['input_example'] ) ) {
					$options['input_example'] = sanitize_text_field( $options['input_example'] );
				} else {
					unset( $options['input_example'] );
				}
				if ( ! empty( $options['select_example'] ) ) {
					$options['select_example'] = sanitize_text_field( $options['select_example'] );
				} */

			}
			return $options;
        }
        
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'airiamit' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Header Right HTML', 'airiamit' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'header_right_html' ); ?>
                                <?php wp_editor( stripslashes($value), "header_right_html" ); ?>
							</td>
						</tr>


						<?php // Checkbox example ?>
						<!-- <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Checkbox Example', 'airiamit' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'checkbox_example' ); ?>
								<input type="checkbox" name="theme_options[checkbox_example]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Checkbox example description.', 'airiamit' ); ?>
							</td>
						</tr> -->

						<?php // Text input example ?>
						<!-- <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Input Example', 'airiamit' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_example' ); ?>
								<input type="text" name="theme_options[input_example]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr> -->

						<?php // Select example ?>
						<!-- <tr valign="top" class="wpex-custom-admin-screen-background-section">
							<th scope="row"><?php esc_html_e( 'Select Example', 'airiamit' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'select_example' ); ?>
								<select name="theme_options[select_example]">
									<?php
									$options = array(
										'1' => esc_html__( 'Option 1', 'airiamit' ),
										'2' => esc_html__( 'Option 2', 'airiamit' ),
										'3' => esc_html__( 'Option 3', 'airiamit' ),
									);
									foreach ( $options as $id => $label ) { ?>
										<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $value, $id, true ); ?>>
											<?php echo strip_tags( $label ); ?>
										</option>
									<?php } ?>
								</select>
							</td>
						</tr> -->
					</table>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php }

	}
}
new WPEX_Theme_Options();

function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}