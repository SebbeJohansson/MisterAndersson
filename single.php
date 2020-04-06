
<?php get_header(); ?>

        <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $image = (has_post_thumbnail(get_the_ID())) ? get_the_post_thumbnail_url( get_the_ID(), 'large') : get_background_image();
                    echo "<section class='cover animatedParent animateOnce' style='background-image: url($image);'>";
                    //echo "<img src='http://topborn.sebbejohansson.com/wp-content/uploads/2018/03/IMG_20170407_190117.jpg' class='cover-image animated fadeIn'/>";
                    echo '<section class="cover-title animatedParent animateOnce"><h1 class="animated fadeInDownShort">'; echo the_title(); echo "</h1> </a></section>";
                    echo "</section>";
                    echo "<section class='content-wrapper'>";
                    the_content();
                    echo "</section>";
                    //get_template_part('content', get_post_format());
                }
            }

            custom_post_navigation();

        ?>

<?php get_footer(); ?>

