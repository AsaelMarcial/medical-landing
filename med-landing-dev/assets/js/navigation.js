/**
 * Lightweight navigation interactions without external dependencies.
 */
document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('[data-mobile-navigation]');
    const header = document.querySelector('[data-site-header]');
    const toggle = document.querySelector('[data-menu-toggle]');
    const panel = document.querySelector('[data-mobile-panel]');
    const backdrop = document.querySelector('[data-mobile-backdrop]');
    const closeButtons = document.querySelectorAll('[data-menu-close]');
    const menuLinks = document.querySelector('[data-mobile-menu-links]');
    const openIcon = document.querySelector('[data-menu-open-icon]');
    const closeIcon = document.querySelector('[data-menu-close-icon]');
    const floatingCta = document.querySelector('[data-floating-cta]');
    let previousFocus = null;
    let ticking = false;

    const focusableSelector = [
        'a[href]',
        'button:not([disabled])',
        'input:not([disabled])',
        'select:not([disabled])',
        'textarea:not([disabled])',
        '[tabindex]:not([tabindex="-1"])',
    ].join(',');

    const setHeaderState = () => {
        if (!header) return;

        const scrolled = window.scrollY > 50;
        header.classList.toggle('shadow-lg', scrolled);
        header.classList.toggle('bg-white/95', scrolled);
        header.classList.toggle('backdrop-blur-sm', scrolled);
        header.classList.toggle('bg-white', !scrolled);
    };

    const setFloatingCtaState = () => {
        if (!floatingCta) return;
        floatingCta.hidden = window.scrollY <= 300;
    };

    const setMenuState = (isOpen) => {
        if (!root || !panel || !backdrop || !toggle) return;

        document.documentElement.classList.toggle('menu-open', isOpen);
        document.body.classList.toggle('menu-open', isOpen);
        toggle.setAttribute('aria-expanded', String(isOpen));
        panel.hidden = !isOpen;
        backdrop.hidden = !isOpen;

        if (openIcon && closeIcon) {
            openIcon.hidden = isOpen;
            closeIcon.hidden = !isOpen;
        }

        if (isOpen) {
            previousFocus = document.activeElement;
            window.requestAnimationFrame(() => {
                const closeButton = panel.querySelector('[data-menu-close-button]');
                (closeButton || panel).focus();
            });
        } else if (previousFocus && document.contains(previousFocus)) {
            const focusTarget = previousFocus;
            previousFocus = null;
            focusTarget.focus();
        }
    };

    const closeMenu = () => setMenuState(false);
    const openMenu = () => setMenuState(true);

    const trapFocus = (event) => {
        if (!panel || panel.hidden || event.key !== 'Tab') return;

        const focusable = Array.from(panel.querySelectorAll(focusableSelector))
            .filter((element) => element.offsetParent !== null);

        if (!focusable.length) {
            event.preventDefault();
            panel.focus();
            return;
        }

        const first = focusable[0];
        const last = focusable[focusable.length - 1];

        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    };

    const updateScrollState = () => {
        setHeaderState();
        setFloatingCtaState();
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(updateScrollState);
    }, { passive: true });

    if (toggle) {
        toggle.addEventListener('click', () => {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            isExpanded ? closeMenu() : openMenu();
        });
    }

    if (backdrop) {
        backdrop.addEventListener('click', closeMenu);
    }

    closeButtons.forEach((button) => {
        button.addEventListener('click', closeMenu);
    });

    if (menuLinks) {
        menuLinks.addEventListener('click', (event) => {
            if (event.target.closest('a')) closeMenu();
        });
    }

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMenu();
        trapFocus(event);
    });
});
