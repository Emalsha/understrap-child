<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper bg-dark" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12 ">

				<footer class="site-footer " id="colophon">

					<div class="site-info">

							<?php printf(esc_html__( 'All products and services featured are selected by our editors. Goodswave may receive compensation for some links to products in this website. Offers may be subject to change without notice.%3$s Copyright © 2018 %1$s Goodswave %2$s. All rights reserved.%3$s Reproduction in whole or in part without permission is prohibited.', 'Goodswave'),'<a href="'.esc_url( __( "https://www.goodswave.com/","goodswave" ) ).'">','</a>','<br/>'); ?>
					
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
