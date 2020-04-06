<?php
    function register_my_menu() {
        register_nav_menu('header-menu',__( 'Header Menu' ));
    }
    add_action( 'init', 'register_my_menu' );

    function create_post_type() {
        register_post_type( 'projects',
            array(
                'labels' => array(
                    'name' => __( 'Projekt' ),
                    'singular_name' => __( 'Projekt' )
                ),
                'supports' => array(
                    'title',
                    'editor',
                    'author',

                    'thumbnail',
                    'custom-fields',
                    'revisions',

                ),
                'public' => true,
                'has_archive' => true
            )
        );
    }
    add_action( 'init', 'create_post_type' );

    if (!function_exists('custom_post_navigation')):
    function custom_post_navigation($includeRandom = false){

        $leftimg = null;
        $rightimg = null;
        $leftlink = null;
        $lefttext = null;
        $rightlink = null;
        $lefttitle = null;
        $righttitle = null;
        $righttext = null;

        $singlePost = "";

        $prevPost = get_previous_post();
        if($prevPost) {
            $leftimg = (has_post_thumbnail($prevPost->ID)) ? get_the_post_thumbnail_url( $prevPost->ID, 'large') : get_background_image();
            $leftlink = get_permalink($prevPost->ID);
            $lefttitle = get_the_title($prevPost->ID);
            $lefttext = "Äldre";
        }else{
            // IF no nextpost or no prevpost do random posts.
            if ($includeRandom){
                //Create WordPress Query with 'orderby' set to 'rand' (Random)
                $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
                // output the random post
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $leftimg = (has_post_thumbnail(get_the_ID())) ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_background_image();
                    $leftlink = get_permalink(get_the_ID());
                    $lefttitle = get_the_title(get_the_ID());
                    $lefttext = "Utvald";
                endwhile;

                // Reset Post Data
                wp_reset_postdata();
            }else{
            }


        }
        $nextPost = get_next_post();
        if($nextPost) {
            $rightimg = (has_post_thumbnail($nextPost->ID)) ? get_the_post_thumbnail_url( $nextPost->ID, 'large') : get_background_image();
            $rightlink = get_permalink($nextPost->ID);
            $righttitle = get_the_title($nextPost->ID);
            $righttext = "Nyare";
        }else{
            if ($includeRandom) {
                // IF no nextpost or no prevpost do random posts.
                //Create WordPress Query with 'orderby' set to 'rand' (Random)
                $the_query = new WP_Query(array('orderby' => 'rand', 'posts_per_page' => '1'));
                // output the random post
                while ($the_query->have_posts()) : $the_query->the_post();
                    $rightimg = (has_post_thumbnail(get_the_ID())) ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_background_image();
                    $rightlink = get_permalink(get_the_ID());
                    $righttitle = get_the_title(get_the_ID());
                    $righttext = "Utvald";
                endwhile;

                // Reset Post Data
                wp_reset_postdata();
            }else{
            }
        }

        // If there arent any next or previous we shouldnt show anything (there is nothing to go to.
        if($nextPost || $prevPost){

            // If includerandom isnt true we only want
            $singlePost = (!$includeRandom && (!$nextPost || !$prevPost)) ? "single" : $singlePost;

            // Lägg till en grej som skriver om det är random eller inte (kategori?)
            echo "<section class='fancy-nav'>";
                if($leftlink){
                    echo "<a href='$leftlink'>";
                        echo "<section class='left-fancy $singlePost'>";
                            echo "<section class='background' style='background-image: url(\"$leftimg\");'></section>";
                            echo "<section class='hover'></section>";
                            echo "<section class='text'>";
                                echo "<h2>$lefttitle</h2>";
                                echo "<p>$lefttext</p>";
                            echo "</section>";
                        echo "</section>";
                    echo "</a>";
                }
                if($rightlink){
                    echo "<a href='$rightlink'>";
                        echo "<section class='right-fancy $singlePost'>";
                            echo "<section class='background' style='background-image: url(\"$rightimg\");'></section>";
                            echo "<section class='hover'></section>";
                            echo "<section class='text'>";
                                echo "<h2>$righttitle</h2>";
                                echo "<p>$righttext</p>";
                            echo "</section>";
                        echo "</section>";
                    echo "</a>";
                }
            echo "</section>";
        }
    }
    endif; // custom_post_navigation
    //add_action( 'after_setup_theme', 'custom_post_navigation' );

    // Replaces the excerpt "Read More" text by a link
    function new_excerpt_more($more) {
        global $post;
        return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> Click to read the full post!</a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

    function misterandersson_customize_register( $wp_customize ) {
        $wp_customize->add_setting( 'contact_footer' , array(
            'default'   => 'false',
        ) );
    }
    add_action( 'customize_register', 'misterandersson_customize_register' );


    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background' );
    set_post_thumbnail_size( 150, 150 );
    add_image_size( 'portfolio', 275, 152 );
