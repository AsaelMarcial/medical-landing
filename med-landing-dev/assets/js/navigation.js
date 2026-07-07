/**
 * Navigation & Alpine.js Components
 */
window.mobileNavigation = () => ({
        open: false,
        previousFocus: null,

        init() {
            this.$watch('open', (isOpen) => {
                document.documentElement.classList.toggle('menu-open', isOpen);
                document.body.classList.toggle('menu-open', isOpen);

                if (isOpen) {
                    this.$nextTick(() => {
                        const focusTarget = this.$refs.closeButton || this.$refs.panel;
                        focusTarget?.focus();
                    });
                } else if (this.previousFocus && document.contains(this.previousFocus)) {
                    this.previousFocus.focus();
                }
            });
        },

        toggleMenu() {
            this.open ? this.closeMenu() : this.openMenu();
        },

        openMenu() {
            this.previousFocus = document.activeElement;
            this.open = true;
        },

        closeMenu() {
            this.open = false;
        },

        trapFocus(event) {
            if (!this.open || !this.$refs.panel) return;

            const focusable = Array.from(
                this.$refs.panel.querySelectorAll(
                    'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
                )
            ).filter((element) => element.offsetParent !== null);

            if (!focusable.length) {
                event.preventDefault();
                this.$refs.panel.focus();
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
        },
    });

window.accordion = () => ({
        active: null,
        toggle(id) {
            this.active = this.active === id ? null : id;
        },
        isOpen(id) {
            return this.active === id;
        },
    });
