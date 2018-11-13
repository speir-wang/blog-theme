<?php get_header();  ?>
<div class="row">
    <div class="col-xs-12">
        <?php 
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    

                    <?php get_template_part("templates/part", "post_tags"); ?>
                    <p class="post-date">Published on <?php the_date(); ?></p>

                    <article class="post-content"><?php the_content(); ?></article>

        <?php   
                endwhile;
            endif;
        ?>

    </div>

</div>

<?php get_template_part("templates/part", "post_navigation"); ?>

                            
<?php get_footer(); ?>