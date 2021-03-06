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
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>

	<!-- Custom Gusto Hero -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Payroll made easy - POC</h1>
			<p>See why Gusto is simply the best online payroll.</p>
				<button type="button" class="btn btn-primary">Try 1 month free</button>
		</div>
	</div>	

	<!-- Custom Gusto News -->
	<div class="home-top-news">
		<div class="container">
			<div class="row">
				<div class="col-sm">
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
				</div>
				<div class="col-sm">
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
				</div>
				<div class="col-sm">
					<img src="https://www.tsheets.com/us_tsheets/uploads/2018/10/gusto-case-study.png"/>
				</div>
			</div>	
		</div>	
	</div>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<!-- <h1>From Our Blogs (Posts Post-Type)</h1> -->

				<?php if ( have_posts() ) : ?>

					<h1>Articles</h1>

					<?php 
						// Get custom post-type
						$articles = new WP_Query(array(
							'posts_per_page' => 10,
							'post_type' => 'article'
						));

						while($articles->have_posts()){
							$articles->the_post(); ?>
							<a href="<?php the_permalink(); ?>">
								<?php
									get_template_part( 'loop-templates/content', get_post_format() );
								?>
							</a>
						<?php }
					?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
<?php wp_reset_postdata(); ?>
