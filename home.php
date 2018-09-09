<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap-child
 * @author Emalsha Rasad
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
<div class="clearfix" id="index-wrapper">

    <div class="section-intro" id="section-intro">

        <div class="row h-100 p-3 justify-content-center align-items-center m-0 welcome-intro">
            <h3 class="col-12 text-center position-absolute welcome-line-1 d-none-edited" id="welcome-line-1">WELCOME</h3>
            <h3 class="col-12 text-center position-absolute welcome-line-2 d-none-edited" id="welcome-line-2">Looking for <span>GIFT</span> ?</h3>
            <h3 class="col-12 text-center position-absolute welcome-line-3 d-none-edited" id="welcome-line-3"><span>HOME / OFFICE</span> decoration ?</h3>
            <h3 class="col-12 text-center position-absolute welcome-line-4 d-none-edited" id="welcome-line-4">You in the best place !!</h3>
            <div class="row w-100 text-center position-absolute welcome-line-5 d-none-edited" id="welcome-line-5">
                <div class="col-md-3 col-sm-12 d-inline-block">
                    <div class="bg-brush" >
                        <a href="<?php echo get_home_url(null,'index.php/home-appliance'); ?>">
                            <h2 id="intro_item_1"><span>HOME</span></h2>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 d-inline-block">
                    <div class="bg-brush">
                        <a href="<?php echo get_home_url(null,'index.php/gift'); ?>">
                            <h2 id="intro_item_2"><span>GIFT</span></h2>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 d-inline-block">
                    <div class="bg-brush">
                        <a href="<?php echo get_home_url(null,'index.php/office-decoration'); ?>">
                            <h2 id="intro_item_3"><span>OFFICE</span></h2>
                        </a>
                    </div>
                </div>    
            </div>

            <div class="col-md-12 text-center align-self-end d-none-edited" id="welcome-line-6">
                <div class="w-100 align-text-bottom position-relative">
                    <p class="small text-white d-block">SELECT OR GO-DOWN</p>
                    <div id="scroll-down" class="d-block mx-auto"></div>
                </div>
            </div>
        </div>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" id="intro-svg" viewBox="0 0 1920 1080">
            <path id="triangle-2" width="100%" height="100%" d="M 0,0 H 1474.2857 L 0,1077.1429 Z" style="fill:#008080;" />
        </svg>
        <div class="intro">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1080" style="position:absolute;">
                    <path width="100%" height="100%" d="M 0,222.85714 1165.7143,1077.1429 H -2.8571429 Z" />      
                </svg>
        </div> -->

        <!-- <div class="intro-navbar row">
            <div class="col-md-2 col-sm-12 flex-right">
                <div class="intro-shape">
                    <h1>GIFT</h1>
                </div>
            </div>
            <div class="col-md-2 col-sm-12 flex-right">
                <div class="intro-shape">
                    <h1>HOME</h1>
                </div>
            </div>
            <div class="col-md-2 col-sm-12 flex-right">
                <div class="intro-shape">    
                    <h1>OFFICE</h1>
                </div>
            </div>
        </div> -->

    </div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
            <h1>This is sample home page</h1>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>