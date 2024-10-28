/**
 *
 * Main JavaScript theme file.
 * This file initializes all components when the DOM is fully loaded.
 *
 * @package   Tailmint
 * @author    Denis Almeida
 * @link      https://github.com/denisalmeida
 *
 * */

"use strict";

import Notification from './components/notification.js';
import menuToggle from './components/menuToggle.js';

document.addEventListener('DOMContentLoaded', () => {
    new Notification();
    new menuToggle();
});