<?php 
/**
 * Post Card that displays on home page
 * 
 * Components used:
 *     - Post Tags
 */

?>
<div class="row">

    <div class="col-xs-12 ">
        <div class="card">
            <div class="card-title">
                <?php the_title();?>
            </div>

            <?php get_template_part("templates/part", "post_tags"); ?>        
            
            <article class="card-excerpt">
                <?php the_excerpt();?>
            </article>

            <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
        </div>

    </div>
</div>