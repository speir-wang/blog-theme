<?php get_header();  ?>
<div class="row">
    <div class="col-xs-12">
        <?php 
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    
                    <article><?php the_content(); ?></article>

        <?php   endwhile;

            endif;
        ?>
    </div>
   


</div>

<?php get_footer(); ?>