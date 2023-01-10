<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wojciech_Floriański
 */

?>

	<footer id="colophon" class="siteFooter">
		<div class="siteFooter__wrap">
			<div class="copy">
				<p>© <?php echo current_time('Y'); ?> Wojciech Florianski. <?php pll_e('Wszystkie prawa zastrzeżone.'); ?> <a href="<?php echo get_permalink(pll_get_post(69)); ?>" target="_blank"><?php pll_e('Polityka Cookies'); ?></a></p>
			</div>
			<div class="author">
				<p>Designed by <a target="_blank">flodesign.studio</a></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
