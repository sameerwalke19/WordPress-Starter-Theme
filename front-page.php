
<?php get_header(); //Header?> 


<div id="primary" class="content-area extended">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( '/template-parts/content' ,'front'); ?>

        <?php endwhile; else : ?>
        
        <?php get_template_part( '/template-parts/content', 'none' ); ?>

        <?php endif; ?>

        <?php echo paginate_links(); ?>
        <?php wp_link_pages(); ?>



    </main>


  

</div>


<?php get_footer(); //Footer ?>

