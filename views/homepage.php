<?php $title = "Homepage"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/public/css/header.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/themify-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!--Robo mono-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <!-- Sick slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <style>
        @keyframes marquee {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
        }
        @keyframes floatY {
            0%   { transform: translate3d(0, 0px, 0); }
            50%  { transform: translate3d(0, -10px, 0); }
            100% { transform: translate3d(0, 0px, 0); }
        }
        .animate-float {
            animation: floatY 4s ease-in-out infinite;
        }

        .marquee-track {
        display: flex;
        width: max-content;
        animation: marquee 15s linear infinite;
        white-space: nowrap;
        }

        .slick-prev:before,
        .slick-next:before {
            color: rgba(197, 162, 93,0.5) !important;
            font-size: 30px;
            opacity: 1 !important;
        }
        .slick-prev,
        .slick-next {
            z-index: 10;
        }
        .slick-prev {
            left: 10px !important;
        }

        .slick-next {
            right: 10px !important;
        }

        .slider {
            height: 450px;
            position: relative;
            overflow: hidden;
        }

        .slider .slick-slide {
            height: 450px;
            overflow: hidden;
        }

        .slider .slick-slide img {
            height: 100%;
            width: 100%;
        }

        @media (min-width: 768px) {
            .slider {
                height: 600px;
            }

            .slider .slick-slide {
                height: 600px;
            }
        }

        @media (min-width: 1024px) {
            .slider {
                height: 786px;
            }

            .slider .slick-slide {
                height: 786px;
            }
        }
    </style>
</head>
<body>
<div class="w-full min-h-screen bg-[#fefbf4]">

    <!-- Header section -->
    <?php include __DIR__ . '/layout/header.php'; ?>
    <!-- Main content -->
    <!-- Advertisement -->
    <div class="slider" style=" font-family: 'Roboto Mono', monospace;">
        <div class="text-[#1f1c17]">
            <div class="flex flex-col lg:flex-row h-full">
                <!-- LEFT: IMAGE -->
                <div class="w-full lg:w-1/2 h-full">
                    <img src="/assets/images/banner/Social_post_Mo_ban_Giftbox_Cocoon_da_co_mat_tai_Phap_01_d99eec03fc.jpg" class="w-full h-full object-cover" />
                </div>

                <!-- RIGHT: TEXT (chỉ hiện lg) -->
                <div class="hidden lg:flex lg:w-1/2 h-full items-center justify-center bg-[#fff6cd] p-10">
                    <div class="flex flex-col gap-8 w-[80%]">
                        <!---- Thumbnail -->
                        <p class="text-4xl font-light">
                            MỞ BÁN
                        </p>
                        <!--Title-->
                        <p class="text-6xl font-semibold" >
                            Giftbox "Cocoon đã có mặt tại Pháp"
                        </p>
                        <!--Content-->
                        <p>
                            Nếu được gọi tên hành trình vươn ra thế giới của Cocoon, chúng tôi sẽ gọi đó là hành trình “nảy mầm”. Từ những nguyên liệu tinh túy của đất Việt, chúng tôi gieo mầm ở những vùng đất mới, và những hạt giống ấy đang dần nảy nở, được đón nhận, mang theo một màu sắc rất riêng của Việt Nam đến với bạn bè quốc tế.
                        </p>
                        <!--Link-->
                        <a href="#" 
                            class="px-6 py-3 bg-black !text-white w-max font-normal rounded-md
                                    transition-all duration-300
                                    hover:bg-[#271f1d] hover:text-black hover:scale-105">
                                Xem ngay →
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-[#fefbf4]">
            <div class="flex flex-col lg:flex-row h-full">
                <!-- LEFT: IMAGE -->
                <div class="w-full lg:w-1/2 h-full">
                    <img src="/assets/images/banner/hinh1pmc_837dbe7578.jpg" class="w-full h-full object-cover" />
                </div>

                <!-- RIGHT: TEXT (chỉ hiện lg) -->
                <div class="hidden lg:flex lg:w-1/2 h-full items-center justify-center bg-[#54a14a] p-10">
                    <div class="flex flex-col gap-8 w-[80%]">
                        <!---- Thumbnail -->
                        <p class="text-4xl font-light">
                            RA MẮT SẢN PHẨM MỚI
                        </p>
                        <!--Title-->
                        <p class="text-6xl font-semibold" >
                            Nước tẩy trang sen Hậu Giang
                        </p>
                        <!--Content-->
                        <p>
                            Cocoon x Phương Mỹ Chi ra mắt nước tẩy trang thế hệ mới: Nước Tẩy Trang Sen Hậu Giang - làm sạch sâu lớp trang điểm và bụi siêu mịn PM1.0 nhờ công nghệ độc quyền NatraGem™ S150, hỗ trợ cân bằng hệ vi sinh trên da với phức hợp prebiotics, phù hợp cho mọi loại da, kể cả da rất nhạy cảm.                        </p>
                        <!--Link-->
                        <a href="#" 
                            class="px-6 py-3 bg-black !text-white w-max font-normal rounded-md
                                    transition-all duration-300
                                    hover:bg-[#271f1d] hover:text-black hover:scale-105">
                            Xem ngay →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main products -->
    <div class="relative w-full flex flex-col lg:flex-row items-center justify-center gap-6 px-6 lg:px-20 my-5"
        style="font-family: 'Roboto Mono', monospace;"> 
        <div class="hidden lg:flex lg:w-1/3 h-[500px]">
            <p class="text-3xl font-normal text-[#1f1c17] text-center pt-20">
                Nước tẩy trang sen Hậu Giang
            </p>
        </div>
        <div class="w-full lg:w-1/3 h-[500px] flex items-center justify-center relative overflow-hidden">

            <img src="/assets/images/product/Layout_9c389236be.png"
                class="w-full h-full max-w-full max-h-full object-contain" />

            <img src="/assets/images/product/Chai_Sen_924c4d6134.png"
                class="absolute inset-0 w-full h-full max-w-full max-h-full object-contain animate-float" />

            <img src="/assets/images/product/Canh_Sen_4fbdabf024.png"
                class="absolute inset-0 w-full h-full max-w-full max-h-full object-contain" />
        </div>
        <div class="w-full flex lg:hidden items-center justify-center">
            <p class="text-3xl font-normal text-[#1f1c17] text-center pt-5">
                Nước tẩy trang sen Hậu Giang
            </p>
        </div>
        <!-- Description -->
        <div class="w-full lg:w-1/3 lg:h-[500px] flex flex-col items-center justify-center">
            <p class="text-xl font-normal text-[#9a978f]">
                Từ những nguyên liệu tinh túy của đất Việt, chúng tôi gieo mầm ở những vùng đất mới, và những hạt giống ấy đang dần nảy nở, được đón nhận, mang theo một màu sắc rất riêng của Việt Nam đến với bạn bè quốc tế. 
            </p>
            <a href="#" 
                class="px-6 py-3 !text-[#1f1c17] w-max font-normal">
                Mua ngay →
            </a>
        </div>

    </div>

    <!-- Scrolling text-->
    <div class="overflow-hidden bg-[#fefbf4] text-black py-2 relative
                flex items-center
               text-[50px] md:text-[80px] lg:text-[150px]
               h-[100px] md:h-[160px] lg:h-[300px]
               " 
    style=" border-top: 1px solid #C5A25D; border-bottom: 1px solid #C5A25D;   
    font-family: 'Anton', sans-serif;font-weight: 400;font-style: normal;">
        <div class="marquee-track">
            <span class="mx-10">MỸ PHẨM 100% THUẦN CHAY CHO NÉT ĐẸP THUẦN VIỆT</span>
            <span class="mx-10">MỸ PHẨM 100% THUẦN CHAY CHO NÉT ĐẸP THUẦN VIỆT</span>
        </div>
    </div>
    <!-- Cefitication -->
    <div style="font-family: 'Roboto Mono', monospace;" class="text-[#1f1c17] mt-10">
        <!-- thumbnail -->
        <div class="w-full flex items-center justify-center py-6">
            <p class=" text-2xl font-black text-center"> CHỨNG NHẬN BỞI CÁC TỔ CHỨC QUỐC TẾ </p>
        </div>
        <div class="relative w-full flex flex-col lg:flex-row items-center justify-center gap-6 px-6 lg:px-20 my-5">
            <div class="w-full lg:w-1/3 flex flex-col items-center justify-center gap-2">
                <img src="/assets/images/cef/e3084968637945bfc13699f3682f28a6_24f04f4362.svg" class="w-40 h-40 object-contain" />
                <div class="flex flex-col gap-3 w-[80%]">
                    <p class="text-xl font-bold text-center">PETA</p>
                    <p class="text-base font-semibold text-center">ANIMAL TEST-FREE & VEGAN</p>
                    <p class="text-base font-normal text-center  text-[#9a978f]">Chương trình Beauty Without Bunnies của tổ chức bảo vệ quyền lợi động vật toàn cầu PETA là chương trình bảo vệ và cam kết không có sự tàn ác đối với động vật uy tín trên thế giới.</p>
                </div>
            </div>
            <div class="w-full lg:w-1/3 flex flex-col items-center justify-center gap-2">
                <img src="/assets/images/cef/leaping_bunny_bdcbdfe9f1.svg" class="w-40 h-40 object-contain" />
                <div class="flex flex-col gap-3 w-[80%]">
                    <p class="text-xl font-bold text-center">LEAPING BUNNY</p>
                    <p class="text-base font-semibold text-center">CHƯƠNG TRÌNH LEAPING BUNNY</p>
                    <p class="text-base font-normal text-center  text-[#9a978f]">Chương trình Leaping Bunny của tổ chức Cruelty Free International được xem là "tiêu chuẩn vàng" toàn cầu cho các sản phẩm không thử nghiệm trên động vật.</p>
                </div>
            </div>
            <div class="w-full lg:w-1/3 flex flex-col items-center justify-center gap-2">
                <img src="/assets/images/cef/vegan_society_41cc2b390a.svg" class="w-40 h-40 object-contain" />
                <div class="flex flex-col gap-3 w-[80%]">
                    <p class="text-xl font-bold text-center">VEGAN SOCIETY</p>
                    <p class="text-base font-semibold text-center">HIỆP HỘI THUẦN CHAY QUỐC TẾ</p>
                    <p class="text-base font-normal text-center  text-[#9a978f]">The Vegan Society (Hiệp hội thuần chay quốc tế) là một trong những chứng nhận uy tín xác thực cho các sản phẩm không có thành phần từ động vật và không thử nghiệm trên động vật.</p>
                </div>

            </div> 

        </div>
    </div>

    <!--  Footer section -->
    <?php include __DIR__ . '/layout/footer.php'; ?>
    <!-- Slick slider JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            fade: true,
            adaptiveHeight: false
        });
    </script>
</div>
</body>
</html>