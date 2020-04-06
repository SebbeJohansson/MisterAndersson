<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

<div class="row">
    <div class="blog-main">
        <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $image = (has_post_thumbnail(get_the_ID())) ? get_the_post_thumbnail_url( get_the_ID(), 'large') : get_background_image();
                    echo "<section class='cover animatedParent animateOnce' style='background-image: url($image);'>";
                    echo '<section class="cover-title animatedParent animateOnce"><h1 class="animated fadeInDownShort">'; echo the_title(); echo "</h1> </a></section>";
                    echo "</section>";
                    echo "<section class='content-wrapper'>";
                    echo "<section class='services-about'>";
                    the_content();
                    echo "</section>";
                    //get_template_part('content', get_post_format());
                }
            }
        ?>


        <?php
            // the query
            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1, 'category_name'=>'uncategorized')); ?>

        <?php if ( $wpb_all_query->have_posts() ) : ?>
            <section class="services-list">
                <h2>Se mer om:</h2>
                <ul>

                    <!-- the loop -->
                    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
                    <?php endwhile; ?>
                    <!-- end of the loop -->

                </ul>
            </section>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

        <!-- end of content wrapper -->
        <?php echo "</section>"; ?>

    </div>
</div>

<?php get_footer(); ?>

