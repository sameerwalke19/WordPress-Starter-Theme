
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
    
        <?php the_title( '<h1>', '</h1>'); ?>


        <div class="byline">
            <?php esc_html_e( 'Author:', 'walkestarter'); ?> <?php the_author_posts_link(); ?>
        </div>
    
    </header>

    <div class="entry-content">
    <?php the_post_thumbnail(); ?>
        <?php the_content(); ?>
        <?php the_tags(); ?>    

    </div>

    <?php if( comments_open ) : ?>
        <?php comments_template(); ?>
    <?php endif; ?>


</article>
