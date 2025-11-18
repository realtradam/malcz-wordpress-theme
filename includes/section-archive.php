<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <a href="<?php the_permalink();?>" class="pico-delinkify secondary">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h3 class="entry-title"><?php the_title(); ?></h3>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </article>
    </a>
<?php endwhile; else: ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>