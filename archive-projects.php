<?php get_header(); ?>



<div class="row">

    <div class="blog-main">

        <section class="projects-wrapper">

        <?php

            if (have_posts()) {

                while (have_posts()) {

                    the_post();

                    echo "<section class='cover animatedParent animateOnce'>";

                    echo "<img src='".content_url()."/uploads/2018/03/20180226_163744.jpg' class='cover-image animated fadeIn'/>";

                    echo '<section class="cover-title animatedParent animateOnce"><h1 class="cover-title animated fadeInDownShort">'; echo the_title(); echo "</h1> </a></section>";

                    echo "</section>";

                    echo "<section class='content-wrapper'>";

                    echo "<section class='services-about'>";

                    the_content();

                    echo "</section>";

                }

            }

        ?>



        <?php

            // the query

            $wpb_all_query = new WP_Query(array('post_type'=>'projects', 'post_status'=>'publish', 'posts_per_page'=>-1));



            $i = 0;

            $right = true;

        ?>

        <?php if ( $wpb_all_query->have_posts() ) : ?>



            <section class="projects">

                <section class="projects-header"><h1><?php echo wp_title($sep = ' '); ?></h1></section>

                <!-- the loop -->

                <?php

                    while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();

                        $i++;

						if($i % 3 == 0 || $i % 2 == 0){

							$thumbnail = (has_post_thumbnail(get_the_ID())) ? get_the_post_thumbnail_url( get_the_ID(), 'medium') : get_background_image();

						}else{

							$thumbnail = (has_post_thumbnail(get_the_ID())) ? get_the_post_thumbnail_url( get_the_ID(), 'large') : get_background_image();

						}



                        ?>

                        <a href="<?php the_permalink(); ?>">

                            <section class="project <?php if($i % 3 == 0 || $i % 2 == 0){ echo "small-project"; }else{ echo "large-project"; }?> <?php if($i % 5 == 0){ echo "right-project"; }?>">

                                <section class="project-background" style="background-image: url( <?php echo $thumbnail ?> );">



                                </section>

                                <section class="project-hover">

                                    <section class="project-text">

                                        <h2>

                                            <?php

                                                the_title();

                                                //echo $i;

                                            ?>

                                        </h2>

                                    </section>

                                </section>

                            </section>

                        </a>

                    <?php endwhile; ?>

                <!-- end of the loop -->



            </section>



            <?php wp_reset_postdata(); ?>



        <?php else : ?>

            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

        <?php endif; ?>



        </section>

    </div>

</div>



<?php get_footer(); ?>



