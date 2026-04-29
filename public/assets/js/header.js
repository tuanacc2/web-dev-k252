// =====================
// HAMBURGER MENU
// =====================
function openMenu() {
    const menu = document.getElementById('mobile-menu');

    menu.classList.remove('-translate-x-full', 'opacity-0');
    menu.classList.add('translate-x-0', 'opacity-100');
}

function closeMenu() {
    const menu = document.getElementById('mobile-menu');

    menu.classList.add('-translate-x-full', 'opacity-0');
    menu.classList.remove('translate-x-0', 'opacity-100');
}

// =====================
// CONTACT FORM AJAX
// =====================
