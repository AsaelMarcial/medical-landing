<?php get_header(); ?>

<main id="main-content" class="min-h-screen">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="container-custom section-padding">
            <h1 class="text-3xl md:text-4xl font-bold mb-6"><?php the_title(); ?></h1>
            <div class="prose max-w-none">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
