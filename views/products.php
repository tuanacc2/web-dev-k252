
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
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
     <?php 
    require_once 'views/layout/header.php';
    $contentVisibilityMap = [];
    foreach ($content ?? [] as $item) {
        if (isset($item['elementName'])) {
            $contentVisibilityMap[$item['elementName']] = (int) ($item['isVisible'] ?? 1);
        }
    }

    $isSectionVisible = function (string $elementName) use ($contentVisibilityMap): bool {
        return !isset($contentVisibilityMap[$elementName]) || (int) $contentVisibilityMap[$elementName] !== 0;
    };
    ?>
    <!-- Main content -->
    <!-- Product -->
    <div id="product" class="w-full flex justify-center pt-10" style="display: <?= $isSectionVisible('product') ? 'flex' : 'none' ?>; font-family: 'Roboto Mono', monospace;">
        <div class="w-[90%] lg:w-[90%]">
            <!-- heading --> 
            <div class="w-full flex items-center justify-between py-6">
                <p class=" text-xl md:text-5xl text-[#1f1c17] italic font-bold"> Sản phẩm nổi bật </p>
                <a href="#" 
                    class="text-sm md:text-base px-6 py-3 bg-black !text-white w-max font-normal rounded-md 
                            transition-all duration-300
                            hover:bg-[#271f1d] hover:text-black hover:scale-105">
                    TẤT CẢ SẢN PHẨM
                </a>
            </div>
            <!-- content -->
            <div class="relative w-full flex flex-col lg:flex-row items-start lg:items-start justify-center gap-6 px-6 lg:px-20 my-5">
                <div class="w-full lg:w-1/3 flex flex-col items-stretch justify-start gap-2">
                    <a href="#" class="hover:shadow hover:scale-105 transition-transform duration-200">
                        <div class="w-full overflow-hidden" style="height: 350px;">
                            <img src="<?= SITE_URL ?? '' ?>/assets/images/post/DSC_02381_1_b0fdd5538a.jpg" class="block w-full" style="height: 350px; object-fit: cover;" />
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <p class="text-sm font-semibold text-[#C5A25D]">01.01.05</p>
                            <p class="text-[#1f1c17] font-medium">Cocoon đã có mặt tại Pháp!</p>
                            <p class="overflow-hidden" style="max-height: 120px; display: -webkit-box; line-clamp: 5; -webkit-line-clamp: 5; -webkit-box-orient: vertical; text-overflow: ellipsis;">
                                Điều này đã mở ra cơ hội cho mỹ phẩm thuần chay từ Việt Nam bước vào một trong những trung tâm làm đẹp hàng đầu thế giới.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="w-full lg:w-1/3 flex flex-col items-stretch justify-start gap-2">
                    <a href="#" class="hover:shadow hover:scale-105 transition-transform duration-200">
                        <div class="w-full overflow-hidden" style="height: 350px;">
                            <img src="<?= SITE_URL ?? '' ?>/assets/images/post/Hinh_chinh_Website_f198b59b8b.jpg" class="block w-full" style="height: 350px; object-fit: cover;" />
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <p class="text-sm font-semibold text-[#C5A25D]">01.01.05</p>
                            <p class="text-[#1f1c17] font-medium">Chương trình "Thu hồi pin cũ - Bảo vệ trái đất xanh" năm 2026</p>
                            <p class="overflow-hidden" style="max-height: 120px; display: -webkit-box; line-clamp: 5; -webkit-line-clamp: 5; -webkit-box-orient: vertical; text-overflow: ellipsis;">
                                Tiếp nối những hành trình bền bỉ vì môi trường, Cocoon và Trường ĐH Sư phạm TP.HCM tiếp tục phát động chương trình “Thu Hồi Pin Cũ – Bảo Vệ Trái Đất Xanh” lần thứ 5
                            </p>
                        </div>
                    </a>
                </div>
                <div class="w-full lg:w-1/3 flex flex-col items-stretch justify-start gap-2">
                    <a href="#" class="hover:shadow hover:scale-105 transition-transform duration-200">
                        <div class="w-full overflow-hidden" style="height: 350px;">
                            <img src="<?= SITE_URL ?? '' ?>/assets/images/post/z7287578147555_0996a52163d907ff128570862cc441cb_5a19daf561.jpg" class="block w-full" style="height: 350px; object-fit: cover;" />
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <p class="text-sm font-semibold text-[#C5A25D]">01.01.05</p>
                            <p class="text-[#1f1c17] font-medium">Cocoon x AAF: Ký kết hợp tác "Chung tay cứu trợ chó mèo lang thang" lần II</p>
                            <p class="overflow-hidden" style="max-height: 120px; display: -webkit-box; line-clamp: 5; -webkit-line-clamp: 5; -webkit-box-orient: vertical; text-overflow: ellipsis;">
                                Thông qua việc duy trì chương trình “Chung tay cứu trợ chó mèo lang thang” cùng AAF, Cocoon mong muốn được góp thêm một phần nhỏ bé trong việc cung cấp nguồn lực cho các trạm cứu hộ, giúp duy trì và nâng cao phúc lợi của chó mèo lang thang, đồng thời, lan tỏa sự khích lệ và sẻ chia từ cộng đồng đến với những cá nhân, tập thể đang điều hành trạm và thực hiện công tác cứu hộ chó mèo.
                            </p>
                        </div>
                    </a>
                </div> 
            </div>
        </div>
    </div>

    <!--  Footer section -->
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
<?php require_once 'views/layout/footer.php'; ?>
</body>
</html>