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
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </div>

            <?php get_template_part("templates/part", "post_tags"); ?>        
            
            <article class="card-excerpt">
                <?php the_excerpt();?>
            </article>

            <a class="read-more" href="<?php the_permalink(); ?>">Read Article</a>
        </div>

    </div>
</div>