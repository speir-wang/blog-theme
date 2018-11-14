<?php
/**
 * The header for our theme 
 */
?><!DOCTYPE html>
<html>
<head>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="xwxO355DgNIGHoX1Fwz3lnNPXqqPEoCa_eig5JYes_k" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

    <header id="masthead" class="site-header container-fluid" role="banner">
        <div class="container">
            <div class="row end-xs">
                <div class="col-xs-12">
                <?php 
                    wp_nav_menu( 
                        array(
                            'menu' 		=> 'Primary Menu',
                            'menu_id'	=> 'primary-menu',
                            'theme_location' => 'primary',
                        ) 
                    );  
                ?>    
                </div>
            </div>
        </div>
        
        <div class="wrap mobile-menu">
           
        </div>

	</header><!-- #masthead -->
	<div id="content" class="site-content">
        <div class="container">
