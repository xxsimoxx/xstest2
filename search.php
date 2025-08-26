<?php
/**
 * Search Page template file.
 *
 * This file is the Search Page template file, which is used
 * to display search results.
 *
 * @package     Canuck CP ClassicPress Theme
 * @copyright   Copyright (C) 2020 or later Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <https://kevinsspace.ca/contact/>
 */

global $canuckcp_include_breadcrumbs,$canuckcp_exclude_page_title,$canuckcp_page_title;
$canuckcp_layout_option       = get_theme_mod( 'canuckcp_search_layout', 'right_sidebar' );
$canuckcp_include_breadcrumbs = get_theme_mod( 'canuckcp_breadcrumbs' ) ? true : false;
$canuckcp_use_feature         = get_theme_mod( 'canuckcp_use_feature' ) ? true : false;
$canuckcp_exclude_page_title  = get_theme_mod( 'canuckcp_search_title' ) ? true : false;
$canuckcp_page_title          = __( 'Search Results : ', 'canuck-cp' ) . get_search_query();
get_header();
get_template_part( '/template-parts/partials', 'page-title-no-post' );
?>
<div id="main-section">
	<div id="content-wrap">
		<?php
		if ( 'left_sidebar' === $canuckcp_layout_option ) {
			?>
			<aside id="two-column-sidebar-left" class="toggle-sb-a">
				<?php get_template_part( '/template-parts/sidebars/sidebar', 'default-a' ); ?>
			</aside>
			<div id="two-column-content" class="search">
				<?php
				if ( true === $canuckcp_use_feature ) {
					get_template_part( '/template-parts/partials', 'general-posts-side-feature' );
				} else {
					get_template_part( '/template-parts/partials', 'general-posts' );
				}
				get_template_part( '/template-parts/partials', 'page-navi' );
				?>
			</div>
			<?php
		} elseif ( 'both_sidebars' === $canuckcp_layout_option ) {
			?>
			<aside id="three-column-sidebar-left" class="toggle-sb-a">
				<?php get_template_part( '/template-parts/sidebars/sidebar', 'default-a' ); ?>
			</aside>
			<div id="three-column-content" class="search">
				<?php
				if ( true === $canuckcp_use_feature ) {
					get_template_part( '/template-parts/partials', 'general-posts-top-feature' );
				} else {
					get_template_part( '/template-parts/partials', 'general-posts' );
				}
				get_template_part( '/template-parts/partials', 'page-navi' );
				?>
			</div>
			<aside id="three-column-sidebar-right" class="toggle-sb-b">
				<?php get_template_part( '/template-parts/sidebars/sidebar', 'default-b' ); ?>
			</aside>
			<?php
		} elseif ( 'fullwidth' === $canuckcp_layout_option ) {
			?>
			<div id="fullwidth" class="search">
				<?php
				if ( true === $canuckcp_use_feature ) {
					get_template_part( '/template-parts/partials', 'general-posts-side-feature' );
				} else {
					get_template_part( '/template-parts/partials', 'general-posts' );
				}
				get_template_part( '/template-parts/partials', 'page-navi' );
				?>
			</div>
			<?php
		} else {
			?>
			<div id="two-column-content" class="search">
				<?php
				if ( true === $canuckcp_use_feature ) {
					get_template_part( '/template-parts/partials', 'general-posts-side-feature' );
				} else {
					get_template_part( '/template-parts/partials', 'general-posts' );
				}
				get_template_part( '/template-parts/partials', 'page-navi' );
				?>
			</div>
			<aside id="two-column-sidebar-right" class="toggle-sb-b">
				<?php get_template_part( '/template-parts/sidebars/sidebar', 'default-a' ); ?>
			</aside>
			<?php
		}
		?>
	</div>
</div>
<div class="clearfix"></div>
<?php
get_footer();

