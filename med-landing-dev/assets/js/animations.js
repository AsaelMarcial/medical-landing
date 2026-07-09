/**
 * Optional lightweight reveal animations.
 *
 * This file is intentionally not enqueued in production because the current
 * performance target prioritizes zero third-party animation cost.
 */
document.addEventListener('DOMContentLoaded', () => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const animated = document.querySelectorAll('[data-animate]');
    if (!animated.length || !('IntersectionObserver' in window)) return;

    animated.forEach((element) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(1rem)';
        element.style.transition = 'opacity 400ms ease, transform 400ms ease';
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            entry.target.style.opacity = '1';
            entry.target.style.transform = 'none';
            observer.unobserve(entry.target);
        });
    }, { rootMargin: '0px 0px -10% 0px' });

    animated.forEach((element) => observer.observe(element));
});
