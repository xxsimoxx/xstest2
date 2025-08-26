<?php
/**
 * Canuck Post Format Standard
 *
 * @package     Canuck CP ClassicPress Theme
 * @copyright   Copyright (C) 2020 or later Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <https://kevinsspace.ca/contact/>
 */

$use_lazyload = get_theme_mod( 'canuckcp_use_lazyload' ) ? true : false;
?>
<div class="post-wrap-stamp">
	<div class="stamp-feature">
		<?php
		if ( ! post_password_required() ) {
			get_template_part( '/template-parts/blog-parts/blog', 'feature-image' );
		} else {
			$background_image_url = get_template_directory_uri() . '/images/password800.jpg';// phpcs:ignore
			if ( true === $use_lazyload ) {
				?>
				<img class="lazyload"
					src="<?php echo esc_url( get_template_directory_uri() ) . '/images/placeholder15.png';// phpcs:ignore ?>"
					data-src="<?php echo esc_url( $background_image_url ); ?>"
					alt="<?php esc_attr_e( 'password required', 'canuck-cp' ); ?>">
				<?php
			} else {
				?>
				<img src="<?php echo esc_url( $background_image_url ); ?>" alt="<?php esc_attr_e( 'password required', 'canuck-cp' ); ?>">
				<?php
			}
		}
		?>
	</div>
	<div class="post-overlay-stamp">
		<div class="post-overlay-stamp-wrap">
			<h2 class="stamp-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="stamp-meta">
				<?php
				canuckcp_post_meta_timestamp();
				canuckcp_comments_link();
				canuckcp_post_meta_no_title();
				?>
			</div>
		</div>
	</div>
</div>

