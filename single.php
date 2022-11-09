<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wojciech_Floriański
 */

get_header(); 
$currentPost = get_the_ID();
?>

	<main id="primary" class="site-main">
		<section class="postHeading">
			<div class="postHeading__wrap">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
				<div class="postHeading__content">
					<h1><?php echo get_the_title(); ?></h1>
					<p class="lead"><?php echo get_field('article_lead'); ?></p>
					<p class="date"><?php echo get_the_date('j F, Y') ?></p>
				</div>
			</div>
		</section>
		<section class="postContent">
			<?php the_content(); ?>
		</section>
		<section class="postOther">
			<div class="postOther__heading">
				<h2><?php pll_e('Inne posty, które mogą Ci się spodobać'); ?></h2>
			</div>
			<div class="postOther__list">
				<?php 
				$args = array(
					'posts_per_page'    => 3,
					'post_type'         => 'post',
					'post_status'       => 'publish',
					'orderby'			=> 'rand',
					'post__not_in' 		=> array($currentPost),
				);
				$other = new WP_Query( $args ); ?>
				<?php if( $other->have_posts() ): ?>
					<?php while( $other->have_posts() ) : $other->the_post(); ?>
						<article class="postOther__article article">
							<a href="<?php the_permalink(); ?>">
								<div class="article__thumb">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
								</div>
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
	</main><!-- #main -->

<?php
get_footer();
