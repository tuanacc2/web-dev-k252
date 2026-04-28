<header class="w-full sticky top-0 z-50">
    <!-- Notification -->
    <div class="flex items-center justify-center bg-[#1f1c17] text-[#fefbf4] text-sm leading-5 h-[30px]">
        <p 
            onclick="openDrawer()"
            class="relative inline-block cursor-pointer 
                after:content-[''] after:absolute after:left-1/2 after:bottom-0
                after:h-[1px] after:w-0 after:bg-[#fefbf4] after:-translate-x-1/2
                after:transition-all after:duration-300
                hover:after:w-full">
            <span class="hidden lg:inline">
                Tận hưởng giao hàng miễn phí toàn quốc với hoá đơn từ 99.000 đ +
            </span>
            <span class="lg:hidden">
                Miễn phí giao hàng với hoá đơn từ 99.000 đ +
            </span>
        </p>    
    </div>
    <!-- Navigation -->
    <div style="border-bottom: 1px solid #C5A25D ;" class="relative flex items-center justify-between px-4 py-3 text-[#1f1c17] pt-[20px] pb-[20px]" >
        <!-- LEFT (desktop menu) -->
        <div class="hidden lg:flex items-center gap-6">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Interface / Search_Magnifying_Glass">
            <path id="Vector" d="M15 15L21 21M10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 13.866 13.866 17 10 17Z" stroke="#1f1c17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
        </svg>
        <a href="#" class="nav-hover">Sản phẩm</a>
        <a href="#" class="nav-hover">Về chúng tôi</a>
        <a href="#" class="nav-hover">Cocoon</a>
        <a href="listPosts.php" class="nav-hover">Bài viết</a>
        </div>

        <!-- MOBILE MENU BUTTON -->
        <button class="lg:hidden text-2xl" onclick="openMenu()">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H20" stroke="#1f1c17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <!-- LOGO (center) -->
        <div class="absolute left-1/2 -translate-x-1/2">
            <img src="../resources/logo/logo.f502f17.svg" class="h-8" />
        </div>
        <!-- RIGHT (desktop menu) -->
        <div class="hidden lg:flex items-center gap-6">
        <a href="#" class="nav-hover">Đăng nhập</a>
        <a href="#" class="nav-hover">Liên hệ</a>
        <a href="#" class="nav-hover">Giỏ hàng</a>
        </div>
    </div>
    <!-- MOBILE SIDEBAR -->
    <div id="mobile-menu" 
        class="fixed inset-0 bg-[#fefbf4] z-50 
                transform -translate-x-full opacity-0
                transition-all duration-300 ease-in-out">

        <!-- HEADER -->
        <div class="flex items-center justify-between p-4">
            <button onclick="closeMenu()" class="text-2xl">✕</button>
            <div>👤</div>
        </div>

        <!-- MENU -->
        <div class="px-6 space-y-6 text-[#1f1c17]">
            <a href="#" >
                <p class="font-semibold">Sản phẩm</p>
            </a>
            <a href="#">
                <p class="font-semibold">Về chúng tôi</p>
            </a>
            <a href="listPosts.php">
                <p class="font-semibold">Bài viết</p>
            </a>
            <a href="#">
                <p class="font-semibold">Liên hệ →</p>
            </a>
            <a href="#">
                <p class="font-semibold">Giỏ hàng</p>
            </a>
        </div>
    </div>
</header>
