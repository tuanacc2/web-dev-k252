function openMenu() {
    const menu = document.getElementById('mobile-menu');

    // hiện ra
    menu.classList.remove('-translate-x-full');
    menu.classList.remove('opacity-0');

    menu.classList.add('translate-x-0');
    menu.classList.add('opacity-100');
}

function closeMenu() {
    const menu = document.getElementById('mobile-menu');

    // trượt ra
    menu.classList.add('-translate-x-full');
    menu.classList.remove('translate-x-0');

    // fade out
    menu.classList.remove('opacity-100');
    menu.classList.add('opacity-0');
}
