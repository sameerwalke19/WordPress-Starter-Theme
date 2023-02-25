

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
    
        <?php the_title( '<h2><a href="' . esc_url(get_permalink() ) . '">', '</a></h2>'); ?>
    

        <div class="byline">
            <?php esc_html_e( 'Author:', 'walkestarter' ); ?> <?php the_author_posts_link(); ?>
        </div>


    </header>

    <div class="entry-content">

    <?php the_post_thumbnail(); ?>
    <?php the_excerpt(); ?>
    <?php the_tags(); ?>       

    </div>


</article>
