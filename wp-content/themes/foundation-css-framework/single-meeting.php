<?php

get_header(); ?>

<div id="primary" class="content-area large-8 medium-8 small-12 cell">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();?> 
            
            <h1><?php the_title(); ?></h1>
            
            <div>
                <?php the_post_thumbnail(); ?>
            </div>
            
        <?php
		endwhile;
		?>

		</main>
	</div>

<?php
get_sidebar();
get_footer();