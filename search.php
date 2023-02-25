
<?php get_header(); //Header?> 


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <h1><?php the_archive_title(); ?> </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( '/template-parts/content', 'search' ); ?>

        <?php endwhile; else : ?>
        
        <?php get_template_part( '/template-parts/content', 'none' ); ?>

        <?php endif; ?>

        <?php echo paginate_links(); ?>
        <?php wp_link_pages(); ?>

    



    </main>

</div>

<?php get_sidebar(); //sidebar ?>



<?php get_footer(); //Footer ?>



