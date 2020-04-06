<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- SEO -->
    <title><?php echo (wp_title($sep = ' ') != NULL) ? wp_title($sep = ' ') : "Mister Andersson - Arkitektur" ?></title>
    <meta name="description" content="Det lilla breda företaget. Arkitektur för både företag och privatpersoner.">
    <meta name="author" content="Mister Andersson">
    <meta name="keywords" content="">
	
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link href="<?php echo get_bloginfo('template_directory'); ?>/animations.css" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	
	<script defer src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script defer>
		WebFont.load({
			google: {
				families: ['Exo']
			}
		});
	</script>
	
    <?php wp_head(); ?>
</head>
<body class="type-<?php echo explode("/", get_permalink())[3]?>">
<header>

    <section id="menu-button" class="menu-wrapper" <?php if(is_user_logged_in()){ echo "style='margin-top: 32px !important'"; } ?>>
        <section class="menu-button" style="background-image: url(<?php echo get_bloginfo('template_directory'); ?>/images/hamicon.png)">

        </section>
    </section>
    <div class="blog-masthead">

        <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$pagename = get_query_var('pagename');  
			if ( !$pagename && $id > 0 ) {  
				// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
				$post = $wp_query->get_queried_object();  
				$pagename = $post->post_name;  
			}
        ?>
        <a href="<?php echo get_home_url(); ?>" class="logo-link"><section class="logo-wrapper"><img src="<?php echo $image[0]; ?>" class="logo"/></section></a>

        <!--section class="callback-header"><a onclick="toggleCallbackPop()" href="javascript:void(0);"><p>Vill du att vi ringer upp dig? Klicka här</p></a></section-->
        <?php //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</header>

<div class="container">

    <!--div class="blog-header">
        <a href="<?php //echo get_bloginfo('wpurl'); ?>"
        <h1 class="blog-title"><?php //echo get_bloginfo('name'); ?></h1> </a>
        <p class="lead blog-description"><?php //echo get_bloginfo('description'); ?></p>
    </div-->

    <!-- POP FÖR MENYN -->
    <section id="menupop" class="menu-pop pop" <?php if(is_user_logged_in()){ echo "style='margin-top: 32px !important'"; } ?>>
        <section class="menu-pop-wrapper" <?php if(is_user_logged_in()){ echo "style='margin-top: -32px !important'"; } ?>>
            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </section>
    </section>

    <section id="callback" class="callback pop" <?php if(is_user_logged_in()){ echo "style='margin-top: 32px !important'"; } ?>>
        <section class="closebutton"><a onclick="toggleCallbackPop()" href="javascript:void(0);"><h1>X</h1></a></section>

        <section class="pop-contact" id="callback-contact">
            <h2>Be oss att ringa upp dig!</h2>

            <form>
                <input id="name" type="text" placeholder="Namnet här snälla">
                <input id="number" type="tel" placeholder="Ditt nummer">
                <input id="submit" type="submit">
            </form>
        </section>

    </section>



    <section id="lightbox" class="lightboxoverlay pop" <?php if(is_user_logged_in()){ echo "style='margin-top: 32px !important'"; } ?>>
        <section class="closebutton"><a onclick="closeLightBoxPop()" href="javascript:void(0);"  <?php if(is_user_logged_in()){ echo "style='margin-top: 32px !important'"; } ?>><h1>X</h1></a></section>

        <section id="lightbox-image" class="lightbox-image"><img src=""/></section>

    </section>

