/**
 * GSAP Scroll Animations
 */
document.addEventListener('DOMContentLoaded', () => {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    gsap.registerPlugin(ScrollTrigger);

    // Fade up on scroll
    gsap.utils.toArray('[data-animate="fade-up"]').forEach((el) => {
        gsap.from(el, {
            y: 40,
            opacity: 0,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Fade in from left
    gsap.utils.toArray('[data-animate="fade-left"]').forEach((el) => {
        gsap.from(el, {
            x: -40,
            opacity: 0,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Fade in from right
    gsap.utils.toArray('[data-animate="fade-right"]').forEach((el) => {
        gsap.from(el, {
            x: 40,
            opacity: 0,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Stagger children
    gsap.utils.toArray('[data-animate="stagger"]').forEach((container) => {
        const children = container.children;
        gsap.from(children, {
            y: 30,
            opacity: 0,
            duration: 0.6,
            stagger: 0.12,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: container,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Scale in
    gsap.utils.toArray('[data-animate="scale-in"]').forEach((el) => {
        gsap.from(el, {
            scale: 0.9,
            opacity: 0,
            duration: 0.7,
            ease: 'back.out(1.4)',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Counter animation for numbers
    gsap.utils.toArray('[data-animate="counter"]').forEach((el) => {
        const target = parseInt(el.textContent.replace(/\D/g, ''), 10);
        const prefix = el.textContent.match(/^[^\d]*/)[0];
        const suffix = el.textContent.match(/[^\d]*$/)[0];

        gsap.from(el, {
            textContent: 0,
            duration: 2,
            ease: 'power1.out',
            snap: { textContent: 1 },
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
            onUpdate: function () {
                el.textContent = prefix + Math.round(parseFloat(el.textContent)) + suffix;
            },
        });
    });
});
