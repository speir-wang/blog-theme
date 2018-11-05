<?php get_header();  ?>
<div class="row">
    <?php 
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post(); 
                //
                get_template_part("templates/part", "post_card");
                //
            endwhile;

        endif;
    ?>

</div>

<div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>


<?php get_footer(); ?>