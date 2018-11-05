<?php get_header();  ?>
<div class="row">
    <div class="col-xs-12">
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
   


</div>


<div class="row pagination">
    <div class="col-xs-6 start-xs">
        <!-- has class prev-posts -->
        <?php previous_posts_link( 'Next' ); ?>
    </div>

    <div class="col-xs-6 end-xs">
        <!-- has class next-posts -->    
        <?php next_posts_link( 'Previous' ); ?>
        
    </div>
</div>

<?php get_footer(); ?>