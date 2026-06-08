<article class="group bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-secondary/20 transition-all duration-300">
    <a href="<?php the_permalink(); ?>" class="block">
        <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center mb-4 group-hover:bg-secondary/20 transition-colors">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail', ['class' => 'w-6 h-6 object-contain']); ?>
            <?php else : ?>
                <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            <?php endif; ?>
        </div>
        <h3 class="text-lg font-semibold text-primary mb-2 group-hover:text-secondary transition-colors">
            <?php the_title(); ?>
        </h3>
        <p class="text-text-muted text-sm leading-relaxed">
            <?php echo esc_html(get_the_excerpt()); ?>
        </p>
    </a>
</article>
