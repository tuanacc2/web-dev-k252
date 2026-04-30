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
    <div class="slider">
        <div>
            <div class="flex flex-col lg:flex-row h-full">
                <!-- LEFT: IMAGE -->
                <div class="w-full lg:w-1/2 h-full">
                    <img src="/assets/images/banner/Social_post_Mo_ban_Giftbox_Cocoon_da_co_mat_tai_Phap_01_d99eec03fc.jpg" class="w-full h-full object-cover" />
                </div>

                <!-- RIGHT: TEXT (chỉ hiện lg) -->
                <div class="hidden lg:flex lg:w-1/2 h-full items-center justify-center bg-[#fff6cd] p-10">
                    <div>
                        <h2 class="text-4xl font-bold mb-4">
                            Cocoon đã có mặt tại Pháp
                        </h2>
                        <p class="text-gray-600 mb-6">
                            Nội dung mô tả ở đây...
                        </p>
                        <button class="px-6 py-3 bg-black text-white">
                            Xem ngay →
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col lg:flex-row h-full">
                <!-- LEFT: IMAGE -->
                <div class="w-full lg:w-1/2 h-full">
                    <img src="/assets/images/banner/hinh1pmc_837dbe7578.jpg" class="w-full h-full object-cover" />
                </div>

                <!-- RIGHT: TEXT (chỉ hiện lg) -->
                <div class="hidden lg:flex lg:w-1/2 h-full items-center justify-center bg-[#54a14a] p-10">
                    <div>
                        <h2 class="text-4xl font-bold mb-4">
                            Cocoon đã có mặt tại Pháp
                        </h2>
                        <p class="text-gray-600 mb-6">
                            Nội dung mô tả ở đây...
                        </p>
                        <button class="px-6 py-3 bg-black text-white">
                            Xem ngay →
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scrolling text-->
    <div class="overflow-hidden bg-[#fefbf4] text-black py-2 relative
               text-[50px] md:text-[80px] lg:text-[150px]" 
    style=" border-top: 1px solid #C5A25D; border-bottom: 1px solid #C5A25D;   
    font-family: 'Anton', sans-serif;font-weight: 400;font-style: normal;">
        <div class="marquee-track">
            <span class="mx-10">MỸ PHẨM 100% THUẦN CHAY CHO NÉT ĐẸP THUẦN VIỆT</span>
            <span class="mx-10">MỸ PHẨM 100% THUẦN CHAY CHO NÉT ĐẸP THUẦN VIỆT</span>
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