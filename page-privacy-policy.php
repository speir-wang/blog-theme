<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div id="privacy-policy">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?= get_home_url(); ?>" class="logo">
                            <img src="<?= get_template_directory_uri()?>/inc/logo/the-manse-estate-logo.png" alt="The Manse Estate">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        </div>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>