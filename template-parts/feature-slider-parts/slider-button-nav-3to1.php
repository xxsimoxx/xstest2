<?php
/**
 * Canuck Home Page template part - full slider - carousel navigation 3:1 aspect
 *
 * This template part is called by canuckcp_home_feature_options()
 * located in canuck-custom-functions.php
 *
 * @package     Canuck CP ClassicPress Theme
 * @copyright   Copyright (C) 2020 or later Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <https://kevinsspace.ca/contact/>
 */

global $post, $canuckcp_feature_option, $canuckcp_feature_category;
$canuckcp_effect = sanitize_text_field( get_theme_mod( 'canuckcp_flex_slider_effect', 'fade' ) );
$canuckcp_pause  = sanitize_text_field( get_theme_mod( 'canuckcp_flex_slider_pause', '5000' ) );
$canuckcp_trans  = sanitize_text_field( get_theme_mod( 'canuckcp_flex_slider_trans', '600' ) );
$canuckcp_auto   = intval( get_theme_mod( 'canuckcp_flex_slider_auto', 1 ) );
$category_id     = get_cat_ID( $canuckcp_feature_category );
$args            = array(
	'category'    => $category_id,
	'numberposts' => 20,
);
$custom_posts    = get_posts( $args );
if ( 0 !== $category_id && $custom_posts ) {
	?>
	<div id="canuck-cp-feature-3to1-id" class="splide canuck-cp-feature-3to1" data-splide=<?php echo '{"type":"' . esc_attr( $canuckcp_effect ) . '","arrows":1,"rewind":1,"interval":' . intval( $canuckcp_pause ) . ',"speed":' . intval( $canuckcp_trans ) . ',"autoplay":' . esc_attr( $canuckcp_auto ) . '}'; ?>>
		<div class="splide__track feature bottom">
			<ul class="splide__list">
				<?php
				$canuckcp_feature_pic_count = 0;
				foreach ( $custom_posts as $post ) { // phpcs:ignore
					setup_postdata( $post );
					$link_to_post          = ( '' === get_post_meta( $post->ID, 'canuckcp_metabox_link_to_post', true ) ? false : true );
					$custom_feature_link   = ( '' === get_post_meta( $post->ID, 'canuckcp_custom_feature_link', true ) ? false : get_post_meta( $post->ID, 'canuckcp_custom_feature_link', true ) );
					$include_feature_title = ( '' === get_post_meta( $post->ID, 'canuckcp_metabox_include_feature_title', true ) ? false : true );
					if ( has_post_thumbnail() ) {
						$canuckcp_feature_pic_count ++;
						?>
						<li class="splide__slide">
							<?php
							$image_url              = get_the_post_thumbnail_url( $post->ID, 'canuckcp_feature' );
							$canuckcp_feature_title = ( false === $include_feature_title ? get_post( get_post_thumbnail_id() )->post_excerpt : the_title_attribute( 'echo=0' ) );
							if ( '' === $canuckcp_feature_title ) {
								$imagetitle = '';
								$imagealt   = esc_html__( 'flexslider image', 'canuck-cp' );
							} else {
								$imagetitle = $canuckcp_feature_title;
								$imagealt   = $canuckcp_feature_title;
							}
							if ( true === $include_feature_title ) {
								if ( '' !== $canuckcp_feature_title ) {
									echo '<p class="splide-caption">' . wp_kses_post( $canuckcp_feature_title ) . '</p>';
								}
							}
							// Set up the link and image.
							if ( true === $link_to_post ) {
								?>
								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
									<img src="<?php echo esc_url( $image_url ); ?>"
										title="<?php echo esc_attr( $imagetitle ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" />
								</a>
								<?php
							} elseif ( false !== $custom_feature_link ) {
								?>
								<a href="<?php echo esc_url( $custom_feature_link ); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
									<img src="<?php echo esc_url( $image_url ); ?>"
										title="<?php echo esc_attr( $imagetitle ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" />
								</a>
								<?php
							} else {
								?>
								<img src="<?php echo esc_url( $image_url ); ?>"
									title="<?php echo esc_attr( $imagetitle ); ?>" alt="<?php echo esc_attr( $canuckcp_feature_title ); ?>" />
								<?php
							}
							?>
						</li>
						<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
	<?php
} else {
	?>
	<div class="error"><?php esc_html_e( 'You have not set up your Feature posts so I can not find any images - see user documentation.', 'canuck-cp' ); ?></div>
	<?php
}
if ( isset( $canuckcp_feature_pic_count ) && 0 === $canuckcp_feature_pic_count ) {
	?>
	<div class="error">
		<h3><?php esc_html_e( 'Error: There were no feature images found for your slider. Did you select the correct category?', 'canuck-cp' ); ?></h3>
	</div>
	<?php
}
wp_reset_postdata();

