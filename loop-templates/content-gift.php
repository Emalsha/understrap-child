<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="card-columns">
        <div class="card" >
            
            <?php echo get_the_post_thumbnail( $post->ID, 'large', array('class'=>'card-img-top') ); ?>

            <div class=" card-body">
                <div class=" ">

                    <?php the_title( '<h1 class="card-title">', '</h1>' ); ?>

                </div><!-- .entry-header -->

                <?php the_excerpt(); ?>

                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
                    'after'  => '</div>',
                ) );
                ?>

            </div><!-- .entry-content -->
        </div>
    </div>
	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->