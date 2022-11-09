<?php
    /**
     * Template Name: Posts
     */
get_header(); ?>

<main class="wf wf--posts">
    <section class="pagePosts">
        <div class="pagePosts__list">
            <?php 
            $args = array(
                'posts_per_page'    => -1,
                'post_type'         => 'post',
                'post_status'       => 'publish',
            );
            $posts = new WP_Query( $args ); ?>
            <?php if( $posts->have_posts() ): ?>
                <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
                    <article class="pagePosts__article article">
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

            <?php wp_reset_query(); ?>  
        </div>
    </section>
</main>

<?php get_footer(); ?>