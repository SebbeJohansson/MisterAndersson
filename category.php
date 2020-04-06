<?php get_header(); ?>
<section>

    <?php


        $image = get_background_image();
        echo "<section class='cover animatedParent animateOnce' style='background-image: url($image);'>";
            echo '<section class="cover-title animatedParent animateOnce"><h1 class="animated fadeInDownShort">'; echo single_cat_title(); echo "</h1> </a></section>";
        echo "</section>";
        echo "<section class='content-wrapper'>";

        if (have_posts()) {
            while (have_posts()) {
                the_post();
                echo "<section class='post_excerpt'>";
                    echo "<a href='".get_permalink($post->ID)."'><h2>".get_the_title()."</h2></a>";
                    echo "<h3>av ".get_the_author()." | ".get_the_date()."</h3>";
                    the_excerpt();
                echo "</section>";
                //the_content();
                //get_template_part('content', get_post_format());
            }
        }

        echo "</section>";
        //custom_post_navigation();
    ?>

    <?php //get_sidebar(); ?>
</section>

<?php get_footer(); ?>

