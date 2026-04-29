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
        <a href="?action=posts" class="nav-hover">Bài viết</a>
        </div>

        <!-- MOBILE MENU BUTTON -->
        <button class="lg:hidden text-2xl" onclick="openMenu()">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H20" stroke="#1f1c17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <!-- LOGO (center) -->
        <div class="absolute left-1/2 -translate-x-1/2">
            <a href="?action=homepage">
            <img src="/public/assets/resources/logo/logo.f502f17.svg" alt="Logo" class="h-8">      
            </a>  
        </div>
        <!-- RIGHT (desktop menu) -->
        <div class="hidden lg:flex items-center gap-6">
        <a href="#" class="nav-hover">Đăng nhập</a>
        <a href="#"
            class="open-contact nav-hover"
            onclick="document.getElementById('contact-modal').classList.remove('hidden')">
            Liên hệ
        </a>        
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
            <a href="?action=posts">
                <p class="font-semibold">Bài viết</p>
            </a>
            <a href="#"
                onclick="document.getElementById('contact-modal').classList.remove('hidden')">
                <p class="font-semibold">Liên hệ</p>
            </a>

            <a href="#">
                <p class="font-semibold">Giỏ hàng</p>
            </a>
        </div>
    </div>
</header>

<!--Contact Modal-->

<style>
    #contact-form input::placeholder,
    #contact-form textarea::placeholder {
        color: #C5A25D;
        opacity: 1;
    }
</style>

<div id="contact-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
     onclick="if(event.target.id === 'contact-modal') this.classList.add('hidden')">

    <div class=" bg-[#fefbf4] w-[90%] max-w-[500px] p-6 rounded-lg relative">
        
        <button class="absolute top-2 right-3 text-2xl"
                onclick="document.getElementById('contact-modal').classList.add('hidden')">
            ✕
        </button>

        <p class="text-[#1f1c17] font-semibold mb-4 text-xl"><span>Liên hệ</span><span> Cocoon</span></p>

        <form id="contact-form" class="mt-7">
            <div>
                <input name="name" placeholder="Nhập tên của bạn*" class="w-full h-10 " style="border-bottom: 1px solid #C5A25D ;">
                <div id="err-name" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <input name="email" placeholder="Nhập email của bạn*" class="w-full h-10 p-2 " style="border-bottom: 1px solid #C5A25D ;">
                <div id="err-email" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <input name="phoneNumber" placeholder="Nhập số điện thoại*" class="w-full h-10 p-2" style="border-bottom: 1px solid #C5A25D ;">
                <div id="err-phone" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-4">
                <textarea name="question" placeholder="Nhập câu hỏi của bạn ở đây*" class="w-full  h-32" style="border-bottom: 1px solid #C5A25D ;"></textarea>
                <div id="err-question" class="text-red-500 text-sm"></div>
            </div>
            <div class="mt-6 flex justify-center">
                <button
                class=" w-full !bg-[#1f1c17] !text-white !px-6 !py-3 !rounded-md
                        hover:!bg-[#2d140d] !transition !duration-300">
                Gửi
                </button>
            </div>
        </form>
        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-[#C5A25D]"></div>
            <span class="px-4 text-sm text-[#1f1c17]">OR</span>
            <div class="flex-1 h-px bg-[#C5A25D]"></div>
        </div>
        <div class="grid grid-cols-2 gap-4 text-sm">

            <!-- MESSENGER -->
            <a href="https://m.me/100094046926830" target="_blank"
            class="flex flex-col items-center justify-center border border-[#C5A25D]
                    py-3 rounded-md transition
                    hover:bg-[#fee5b4] hover:text-white group">

                <!-- SVG Messenger -->
                <svg class="w-7 h-7 mb-1 group-hover:scale-110 transition"
                    viewBox="0 0 48 48">
                    <path fill="#007FFF"
                        d="M325,860 C311.745143,860 301,869.949185 301,882.222222 
                            C301,889.215556 304.489988,895.453481 309.944099,899.526963 
                            L309.944099,908 L318.115876,903.515111 
                            C320.296745,904.118667 322.607155,904.444444 325,904.444444 
                            C338.254857,904.444444 349,894.495259 349,882.222222 
                            C349,869.949185 338.254857,860 325,860 Z 
                            M327.385093,889.925926 L321.273292,883.407407 
                            L309.347826,889.925926 L322.465839,876 
                            L328.726708,882.518519 L340.503106,876 
                            L327.385093,889.925926 Z"
                        transform="translate(-301 -860)"/>
                </svg>

                <span>Messenger</span>
            </a>

            <!-- ZALO -->
            <a href="https://zalo.me/0962294335" target="_blank"
            class="flex flex-col items-center justify-center border border-[#C5A25D]
                    py-3 rounded-md transition
                    hover:bg-[#fee5b4] hover:text-white group">

                <!-- SVG Zalo -->
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#2962ff" d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z"/><path fill="#eee" d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z"/><path fill="#2962ff" d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z"/><path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"/><path fill="#2962ff" d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z"/><path fill="#2962ff" d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z"/></svg>

                <span>Zalo</span>
            </a>

        </div>
    </div>
</div>


<script src="/public/assets/js/header.js"></script>
<script src="/public/assets/js/contactForm.js"></script>
