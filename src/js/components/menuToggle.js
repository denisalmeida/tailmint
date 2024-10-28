/**
 * Manages the toggle functionality for the main menu.
 */
class MenuToggle {
    constructor() {
        this.menuElement = document.querySelector('#main-menu');
        this.buttonElement = document.querySelector('#menu-toggle');
        this.bindHandlers();
    }

    /**
     * Sets up click and resize event listeners.
     * @private
     */
    bindHandlers() {
        this.buttonElement.addEventListener('click', () => this.toggleMenu());
        window.addEventListener('resize', () => this.adjustMenuOnResize());
    }

    /**
     * Toggles classes for the mobile menu.
     * @private
     */
    toggleMenu() {
        if(this.menuElement){
            this.menuElement.classList.toggle('mobile-active');
            this.menuElement.classList.toggle('sm:hidden');
        }
    }

    /**
     * Adjusts the menu layout based on window size.
     * @private
     */
    adjustMenuOnResize() {
        if (window.innerWidth >= 768) {
            this.menuElement.classList.remove('full-width', 'mobile-active');
        } else {
            this.menuElement.classList.add('full-width', 'mobile-active');
        }
    }
}

export default MenuToggle;