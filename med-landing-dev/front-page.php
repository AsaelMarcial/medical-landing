<?php
/**
 * Template Name: Front Page
 * Home page template.
 */

get_header(); ?>

<main id="main-content">

    <?php get_template_part('template-parts/sections/hero'); ?>

    <?php get_template_part('template-parts/sections/services-grid'); ?>

    <?php get_template_part('template-parts/sections/about-preview'); ?>

    <?php get_template_part('template-parts/sections/trust-section'); ?>

    <?php get_template_part('template-parts/sections/locations'); ?>

    <?php get_template_part('template-parts/components/cta-section'); ?>

</main>

<?php get_footer(); ?>
