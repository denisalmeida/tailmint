// Navigation toggle
window.addEventListener('load', function () {
    let main_navigation = document.querySelector('#primary-menu');
    document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
        e.preventDefault();
        main_navigation.classList.add('mobile-nav');
        main_navigation.classList.toggle('sm:hidden');
    });
    window.addEventListener('resize', function () {
        let currentWidth = window.innerWidth;
        if (currentWidth >= 768) {
            main_navigation.classList.remove('w-full', 'mobile-nav');
        } else {
            main_navigation.classList.add('w-full', 'mobile-nav');
        }
    });
});