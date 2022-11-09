<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wojciech_Floriański
 */

get_header();
?>

	<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<section class="archiveList">
			<div class="archiveList__list">
				<?php while(have_posts()): the_post(); ?>
					<article class="archiveList__article article">
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
			</div>
		</section>
	<?php endif; ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
