<?php /* Template Name: StartPage */ ?><?php get_header(); ?><div class="row">    <div class="blog-main">        <section class="heading-wrapper animatedParent animateOnce" data-sequence='500'>            <section class="heading">                <h2 class='animated fadeInLeft' data-id='1'>                    det lilla <br> breda företaget                </h2>                <p class='animated fadeInLeft' data-id='2'>                    Välkommen till MrAndersson.<br>                </p>                <a href="<?php echo get_home_url(); ?>/projects/" class='animated bounceInLeft' data-id='3'>Tidigare Projekt</a>            </section>        </section>        <section class='about'>            <section class='about-container animatedParent animateOnce'>                <section class='container-background right animated fadeInLeftShort box' style="background-image: url(<?php echo wp_get_attachment_image_src(1365, 'large')[0] ?>)"></section>                <section class='container-text left animated fadeInRightShort box'><section><?php /*<h2>Om Oss</h2><p>Vi är en mångsidig arkitektbyrå som arbetar med allt från funktionella till kreativa lösningar. Kontakta oss om hjälp med både kommersiella och privata arkitektbehov.</p>*/?></section></section>                </section>            <section class='about-container animatedParent animateOnce'>                <section class='container-background left animated fadeInRightShort box' style="background-image: url(<?php echo wp_get_attachment_image_src(1400, 'large')[0] ?>)"></section>                <section class='container-text right animated fadeInLeftShort box'><section><?php /*<h2>Mångsidighet</h2><p>I och med att vi jobbar med alla tänkbara ariktektprojekt så kan vi helhetstänk och mångsidighet. Vi förstår att alla projekt inte är sig lika och därför behövs det kreativitet och flexibilitet, <br> vilket vi råkar vara experter på.</p>*/?></section></section>            </section>        </section>    </div></div><?php get_footer(); ?>