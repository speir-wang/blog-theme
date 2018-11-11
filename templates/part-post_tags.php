<?php 
/**
 * Tag component
 */

 $tags = get_the_tags();
?>

 <?php if ($tags) : ?>
 <div class="tags">
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
</div>
<?php endif; ?>