<?php
    /**
     * Template Name: Home
     */
get_header(); ?>

<main class="wf wf--home">
    <section class="homePosts">
        <?php 
        $count = 3;
        $args = array(
            'posts_per_page'    => 16,
            'post_type'         => 'post',
            'post_status'       => 'publish',
        );
        $homeposts = new WP_Query( $args );
        $all = intval($homeposts->post_count);
        ?>
        <div class="homePosts__list<?php if($all % 4 == 0): ?> homePosts__list--extra<?php else: ?> homePosts__list--list<?php endif; ?>">
            <?php if( $homeposts->have_posts() ): ?>
                <?php while( $homeposts->have_posts() ) : $homeposts->the_post(); $count++; ?>
                    <article class="homePosts__article article<?php if($count % 4 == 0): ?> article--big<?php endif; ?>">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                            <div class="article__content">
                                <h2><?php echo get_the_title(); ?></h2>
                                <p class="lead"><?php echo get_field('article_lead'); ?></p>
                                <p class="date"><?php echo get_the_date('j F, Y') ?></p>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php wp_reset_query(); ?>  
    </section>
</main>

<?php get_footer(); ?>