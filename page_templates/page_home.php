<?php
    /**
     * Template Name: Home
     */
get_header(); ?>

<main class="wf wf--home">
    <section class="homePosts">
        <div class="homePosts__main">
            <?php 
            $args = array(
                'posts_per_page'    => 1,
                'post_type'         => 'post',
                'post_status'       => 'publish',
            );
            $mainpost = new WP_Query( $args ); ?>
            <?php if( $mainpost->have_posts() ): ?>
                <?php while( $mainpost->have_posts() ) : $mainpost->the_post(); ?>
                    <article class="homePosts__article article">
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
        <div class="homePosts__list">
            <?php 
            $count = 0;
            $args = array(
                'posts_per_page'    => 999,
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'offset'            => 1,
            );
            $homeposts = new WP_Query( $args ); ?>
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

            <?php wp_reset_query(); ?>  
        </div>
    </section>
</main>

<?php get_footer(); ?>