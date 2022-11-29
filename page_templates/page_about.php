<?php
    /**
     * Template Name: About
     */
get_header(); ?>

<main class="wf wf--about">
    <section class="pageAbout">
        <div class="pageAbout__content">
            <?php the_content(); ?>  
        </div>
        <div class="aboutSidebar">
            <h3><?php pll_e('Czujesz to samo?') ?></h3>
            <p><?php pll_e('Skontaktuj się ze mną i obserwuj') ?></p>
            <a href="https://www.instagram.com/wojciech.florianski/" target="_blank" class="instagram">
                <img src="<?php echo get_template_directory_uri() . '/images/icons/ig_ico.svg'; ?>"/>
                <span>@Wojciech.Florianski</span>
            </a>
            <?php if(get_field('awards')): ?>
            <div class="logos">
                <?php while(have_rows('awards')): the_row(); ?>
                <img src="<?php echo get_sub_field('awards_image')['url']; ?>" alt="<?php echo get_sub_field('awards_image')['alt']; ?>"/>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>