<?php 
/**
 * Post Card that displays on home page
 */
$tags = get_the_tags();

?>
<div class="row">

    <div class="col-xs-12 ">
        <div class="card">
            <div class="card-title">
                <?php the_title();?>
            </div>
        
            <?php if ($tags) : ?>
            <span>Tags: </span>
            <ul class="tags">
                <?php foreach($tags as $tag) :  ?>
                    <li>
                        <a class="tag"
                            href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>">
                                <?php print_r($tag->name); ?>
                        </a>   
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <article class="card-excerpt">
                <?php the_excerpt();?>
            </article>

            <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
        </div>

    </div>
</div>