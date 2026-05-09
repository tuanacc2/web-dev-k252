
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
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <!-- Vollkorn -->
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- Embed Code -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
        .font-nunito {
            font-family: 'Nunito', sans-serif;
        }

        .font-vollkorn {
            font-family: 'Vollkorn', serif;
        }

        .font-embed {
            font-family: 'Barlow Condensed', sans-serif;
        }
    </style>
</head>
<?php
/** @var array $posts */
/** @var string $search */
/** @var string $category */
/** @var array $category_list */
/** @var int $limit */
/** @var int $page */
/** @var int $total */
/** @var int $totalPage */
?>
<body>
<div class="w-full min-h-screen bg-[#fefbf4]">

    <!-- Header section -->
    <?php require_once 'views/layout/header.php'; ?>

    <!-- Main content -->
    <!-- Newest news --> 
    <div id="latestNew" class="w-full flex justify-center pt-10">
        <div class="w-[90%] lg:w-[90%]">
            <!-- heading --> 
            <div class="w-full flex items-center justify-between py-6">
                <p 
                    class="block text-xl md:text-5xl text-[#1f1c17] italic font-vollkorn" 
                    style="white-space: nowrap;">
                    Bài viết
                </p>
                <form id="content-search-form" method='GET'
                    class="w-full flex items-center gap-4 ml-32"
                    action="<?= (SITE_URL ?? '') .'/post?search='.htmlspecialchars($search) ?>">
                    <input form="content-search-form" type="text" name="search" 
                        placeholder="Tìm kiếm bài viết..." 
                        class="inline-block w-full bg-transparent focus:outline-none font-nunito" 
                        style="border-bottom: 1px solid #C5A25D; color: #C5A25D;"
                        value="<?= htmlspecialchars($search) ?>">
                    <a class="text-sm md:text-base px-6 py-3 bg-black !text-white font-normal rounded-md 
                            inline-block transition-all duration-300 font-nunito
                            hover:bg-[#271f1d] hover:text-black hover:scale-105"
                        >
                        <button type="submit" form="content-search-form" style="white-space: nowrap;">             
                            <i class="ti-search mr-2" style="color: white"></i>
                            Tìm kiếm
                        </button>
                    </a>
                </form>               
            </div>
            <!-- content -->
            <?php foreach ($posts as $postsByCategory): ?>
            <?php if (!empty($postsByCategory)): ?>
            <div class="w-full flex items-center justify-between py-6">
                <p 
                    class="block text-xl md:text-5xl text-[#1f1c17] italic font-vollkorn" 
                    style="white-space: nowrap;">
                    <?= $postsByCategory[0]['category'] ? htmlspecialchars($postsByCategory[0]['category']) : 'Bài viết' ?>
                </p>        
                <a href="?category=<?= $postsByCategory[0]['category'] ? htmlspecialchars($postsByCategory[0]['category']) : '' ?><?= $search ? '&search='.htmlspecialchars($search) : '' ?>"
                    class="text-xl md:text-2xl px-6 py-3 bg-transparent !text-black font-normal rounded-md
                        flex flex-row items-center
                        transition-all duration-300 font-embed <?= $category ? 'hidden' : '' ?>
                        hover:bg-[#271f1d] hover:text-black hover:scale-105"
                    style="white-space: nowrap; border: 1px solid #C5A25D";>        
                    <p class="p-2">TẤT CẢ BÀI VIẾT</p>
                    <i class="ti-arrow-right mr-2 ml-32 p-2" style="color: black"></i>
                </a>             
            </div>
        
            <div class="slider-container">
                <div class="
                    slider
                    relative w-full flex flex-col lg:flex-row items-start lg:items-start justify-center 
                    gap-6 px-6 lg:px-20 my-5">
                    <?php foreach ($postsByCategory as $post): ?>
                    <div class="w-full lg:w-1/3 flex flex-col items-stretch justify-start gap-2 px-2">
                        <a href="<?= SITE_URL .'/post/view/'. $post['id'] ?>" class="hover:shadow hover:scale-105 transition-transform duration-200">
                            <div class="w-full overflow-hidden" style="height: 350px;">
                                <img src="<?= (SITE_URL ?? '') . $post['thumbnail_url'] ?>" class="block w-full" style="height: 350px; object-fit: cover;" />
                            </div>
                            <div class="flex flex-col gap-3 w-full">
                                <p class="text-sm font-semibold text-[#C5A25D] font-nunito">
                                    <span class="font-semibold text-black"><?= htmlspecialchars($companyName) ?></span>&nbsp;|
                                    <span class="font-embed"><?= htmlspecialchars($post['updated_at']) ?></span>
                                </p>
                                <p class="text-[#1f1c17] font-vollkorn"><?= $post['title'] ?? '' ?></p>
                                <p class="overflow-hidden font-nunito" style="max-height: 120px; display: -webkit-box; line-clamp: 5; -webkit-line-clamp: 5; -webkit-box-orient: vertical; text-overflow: ellipsis;">
                                    <?= $post['thumbnail_description'] ?? '' ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <div class='row w-full flex <?= $category ? '' : 'hidden ' ?></div>'>
                <div class="ml-auto ">
                    <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <?php 
                    if ($i > 1 && $i < $totalPage && $totalPage > 14 &&
                        (   ($page < 8 && $i > 8) || 
                            ($page > $totalPage - 7 && $i < $totalPage - 7) || 
                            ($page >= 8 && $page <= $totalPage - 7 && abs($i - $page) > 2)
                        )
                    ) { 
                        if ($page < 8) {  
                            if ($i == 9) {
                                echo '<span class="btn btn-secondary mb-xl-3">...</span>';
                            }
                        } else if ($page > $totalPage - 7) {
                            if ($i == $totalPage - 8) {
                                echo '<span class="btn btn-secondary mb-xl-3">...</span>';
                            }
                        } else if (abs($i - $page) > 2) {
                            if ($i == $page - 3 || $i == $page + 3) {
                                echo '<span class="btn btn-secondary mb-xl-3">...</span>';
                            }
                        }
                    } else { ?>
                    <a href="?<?= $search ? 'search='.urlencode($search).'&' : '' ?>page=<?= $i ?>" 
                        class="btn mb-xl-3 <?= ($i == $page) ? 'btn-primary' : 'btn-secondary' ?>"
                    > <?= $i ?> </a>
                    <?php } ?>
                    <?php endfor; ?>
                </div>
            </div>            
        </div>
    </div>

    <!--  Footer section -->
    <!-- Slick slider JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            adaptiveHeight: true
        });
    </script>
</div>
<?php require_once 'views/layout/footer.php'; ?>
</body>
</html>