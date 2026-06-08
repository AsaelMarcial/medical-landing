/**
 * Navigation & Alpine.js Components
 */
document.addEventListener('alpine:init', () => {
    Alpine.data('accordion', () => ({
        active: null,
        toggle(id) {
            this.active = this.active === id ? null : id;
        },
        isOpen(id) {
            return this.active === id;
        },
    }));
});
