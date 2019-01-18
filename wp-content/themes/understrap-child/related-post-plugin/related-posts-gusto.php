<?php 

if($related_posts): ?>
    <ul class="related-posts-list list-unstyled row">
        <?php
        foreach( $related_posts as $post ){
            $type = get_post_type($post);

            /// Article Custom Post Type
            if('article' == $type): ?>
                <li class="related-posts-article col-sm">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </li>
        <?php endif; ?>

        <?php
            /// Article Custom Post Type
            if('askgusto' == $type): ?>
                <li class="related-posts-askgusto col-sm">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </li>
        <?php endif; ?>      
        
        <?php
            /// CTA Custom Post Type
            if('cta' == $type): ?>
                <li class="related-posts-cta col-sm">
                    <h1><?php the_title(); ?></h1>
                    <img src="data:image/png;base64,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" />
                </li>
        <?php endif;  ?>     
        
        <?php } ?>
    
    <?php
        // $related_ctas = get_field('related_ctas');
        // if($related_ctas){
        //     foreach($related_ctas as $cta){
        //         $title = get_the_title($cta);
        //         $content = get_the_content($cta); 
                ?>

                <!-- <li class="related-posts-cta col-sm">
                    <h1><?php //echo $title; ?></h1>
                    <img src="data:image/png;base64,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" />
                </li> -->
            <?php
        //     }
        // }        
    ?>

    </ul>
<?php else: ?>
<p><?php _e( 'No related posts found', 'related-posts-by-taxonomy' ); ?></p>
<?php endif ?>