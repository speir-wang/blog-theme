<div class="row pre-next-posts">
    <div class="col-xs-12"><hr></div>
    
    <div class="col-md-6 col-xs-12 start-xs">
        <?php 
        $next_post = get_next_post();
        if ( is_a( $next_post , 'WP_Post' ) ) : ?>
            <span class="arrow-backward">Newer Article</span>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
        <?php endif; ?>
    </div>
    
    <div class="col-md-6 col-xs-12 end-xs">
        <?php 
        $previous_post = get_previous_post();
        if ( is_a( $previous_post , 'WP_Post' ) ) : ?>
            <span class="arrow-forward">Older Article</span>
            <a href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
        <?php endif; ?>
    </div>
    
    <div class="col-xs-12"><hr></div>
    
</div>