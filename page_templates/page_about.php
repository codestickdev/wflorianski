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
            <a href="#" class="instagram">
                <img src="<?php echo get_template_directory_uri() . '/images/icons/ig_ico.svg'; ?>"/>
                <span>@Wojciech.Florianski</span>
            </a>
            <div class="logos">
                <img src="<?php echo get_template_directory_uri() . '/images/icons/about_01.jpg'; ?>" />
                <img src="<?php echo get_template_directory_uri() . '/images/icons/about_02.jpg'; ?>" />
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>