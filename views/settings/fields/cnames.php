<?php
/**
 * CNAMES template.
 *
 * @since 3.0
 *
 * @param array $data {
 *     Checkbox Field arguments.
 *
 *     @type string $id          Field identifier.
 *     @type string $parent      Parent field identifier.
 *     @type string $label       Field label.
 *     @type string $description Field description.
 * }
 */

defined( 'ABSPATH' ) || die( 'Cheatin&#8217; uh?' );

$cnames      = get_rocket_option( 'cdn_cnames' );
$cnames_zone = get_rocket_option( 'cdn_zone' );

if ( $cnames ) {
	foreach ( $cnames as $key => $url ) {
		?>
		<input type="text" name="wp_rocket_settings[cdn_cnames][<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $url ); ?>" />
		<?php _e( 'reserved for', 'rocket' ); ?>
		<select name="wp_rocket_settings[cdn_zone][<?php echo esc_attr( $key ); ?>]">
			<option value="all" <?php selected( $cnames_zone[ $key ], 'all' ); ?>><?php esc_html_e( 'All files', 'rocket' ); ?></option>
			<?php
			/**
			 * Controls the inclusion of images option for the CDN dropdown
			 *
			 * @since 2.10.7
			 * @author Remy Perona
			 *
			 * @param bool $allow true to add the option, false otherwise.
			 */
			if ( apply_filters( 'rocket_allow_cdn_images', true ) ) :
			?>
			<option value="images" <?php selected( $cnames_zone[ $key ], 'images' ); ?>><?php esc_html_e( 'Images', 'rocket' ); ?></option>
			<?php endif; ?>
			<option value="css_and_js" <?php selected( $cnames_zone[ $key ], 'css_and_js' ); ?>><?php esc_html_e( 'CSS & JavaScript', 'rocket' ); ?></option>
			<option value="js" <?php selected( $cnames_zone[ $key ], 'js' ); ?>><?php esc_html_e( 'JavaScript', 'rocket' ); ?></option>
			<option value="css" <?php selected( $cnames_zone[ $key ], 'css' ); ?>><?php esc_html_e( 'CSS', 'rocket' ); ?></option>
		</select>
	<?php
	}
} else {
	?>
	<input type="text" name="wp_rocket_settings[cdn_cnames][]" />
		<?php _e( 'reserved for', 'rocket' ); ?>
		<select name="wp_rocket_settings[cdn_zone][]">
			<option value="all"><?php esc_html_e( 'All files', 'rocket' ); ?></option>
			<?php
			/**
			 * Controls the inclusion of images option for the CDN dropdown
			 *
			 * @since 2.10.7
			 * @author Remy Perona
			 *
			 * @param bool $allow true to add the option, false otherwise.
			 */
			if ( apply_filters( 'rocket_allow_cdn_images', true ) ) :
			?>
			<option value="images"><?php esc_html_e( 'Images', 'rocket' ); ?></option>
			<?php endif; ?>
			<option value="css_and_js"><?php esc_html_e( 'CSS & JavaScript', 'rocket' ); ?></option>
			<option value="js"><?php esc_html_e( 'JavaScript', 'rocket' ); ?></option>
			<option value="css"><?php esc_html_e( 'CSS', 'rocket' ); ?></option>
		</select>
	<?php
}
