/**
 * Provides notification messages.
 */
class Notification {
    constructor() {
        this.notificationContainer = document.getElementById('notification');
        this.notificationDelay = 0;
        this.notificationCount = 0;
        this.notificationLimit = 3;
        this.notificationTypes = {
            success: {
                iconClass: 'ti-check-circle text-green-500',
                progressColor: 'bg-green-500',
                bgColor: 'bg-green-100',
            },
            warning: {
                iconClass: 'ti-alert-triangle text-yellow-500',
                progressColor: 'bg-yellow-500',
                bgColor: 'bg-yellow-100',
            },
            error: {
                iconClass: 'ti-alert-circle text-red-500',
                progressColor: 'bg-red-500',
                bgColor: 'bg-red-100',
            },
        };
    }

    /**
     * Displays a notification message with type.
     * @param {string} message - Message to display.
     * @param {string} type - Type of notification ('success', 'warning', 'error').
     */
    showNotification(message, type) {
        this.notificationCount++;
        this.notificationCount > this.notificationLimit && this.resetNotificationDelay();

        setTimeout(() => {
            const notificationHTML = this.createNotificationHTML(message, type);
            this.displayNotification(notificationHTML);
        }, this.notificationDelay);

        this.notificationDelay += 250;
    }

    /**
     * Resets the notification delay and count.
     */
    resetNotificationDelay() {
        this.notificationDelay = 0;
        this.notificationCount = 1;
    }

    /**
     * Creates the HTML structure for a notification.
     * @param {string} message - Message to display.
     * @param {string} type - Type of notification ('success', 'warning', 'error').
     * @returns {string} - HTML string for the notification.
     * @private
     */
    createNotificationHTML(message, type) {
        const { iconClass, progressColor, bgColor } = this.notificationTypes[type] || this.notificationTypes.error;
        return `
            <div class="z-[9999] top-5 right-5 items-center w-full max-w-md p-6 mb-4
                text-black rounded-lg shadow-lg fixed transition-opacity duration-300
                shadow-black/60 ease-in-out animate-once animate-ease-in-out
                animate-duration-700 overflow-hidden opacity-0 hidden animate-fade-up ${bgColor}" role="alert">
                <div class="inline-flex items-center justify-center">
                    <i class="ti ${iconClass} text-xl"></i>
                </div>
                <div class="ms-3 text-sm">${message}</div>
                <button type="button" class="ms-auto" aria-label="Close">
                    <i class="ti ti-x text-2xl"></i>
                </button>
                <div class="w-full absolute top-0 left-0 h-1.5">
                    <div class="${progressColor} h-full w-0 animate-progress"></div>
                </div>
            </div>`;
    }

    /**
     * Displays the notification in the container.
     * @param {string} notificationHTML - HTML string for the notification.
     * @private
     */
    displayNotification(notificationHTML) {
        this.notificationContainer.insertAdjacentHTML('beforeend', notificationHTML);
        const newNotification = this.notificationContainer.lastElementChild;
        newNotification.style.marginTop = `${this.notificationContainer.children.length * 95}px`;
        newNotification.classList.remove('hidden', 'opacity-0');
        newNotification.classList.add('flex');

        setTimeout(() => this.closeNotification(newNotification), 5000);
        newNotification.querySelector('button').addEventListener('click', () => this.closeNotification(newNotification));
    }

    /**
     * Closes the notification element.
     * @param {Element} notificationElement - The notification element to close.
     * @private
     */
    closeNotification(notificationElement) {
        notificationElement.classList.add('opacity-0', 'hidden');
        setTimeout(() => notificationElement.remove(), 500);
    }
}

export default Notification;