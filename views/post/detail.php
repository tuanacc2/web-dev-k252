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
            0% {
                transform: translate3d(0, 0px, 0);
            }

            50% {
                transform: translate3d(0, -10px, 0);
            }

            100% {
                transform: translate3d(0, 0px, 0);
            }
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
            color: rgba(197, 162, 93, 0.5) !important;
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

        .font-nunito {
            font-family: 'Nunito', sans-serif;
        }

        .font-vollkorn {
            font-family: 'Vollkorn', serif;
        }

        .font-embed {
            font-family: 'Barlow Condensed', sans-serif;
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
        <?php require_once 'views/layout/header.php';?>
        <!-- Main content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start lg:items-start justify-center gap-6 lg:px-20 my-5 mx-auto">
            <!-- heading -->

            <div class="heading lg:col-span-3">
                <p class="text-sm uppercase lg:text-lg font-barlow-condensed text-typo-heading font-embed">
                    <span class="font-semibold"><?= htmlspecialchars($companyName) ?></span>&nbsp;|
                    <span class=""><?= htmlspecialchars($createdAt) ?></span>&nbsp;|
                    <span class=""><?= htmlspecialchars($updatedAt) ?></span>
                </p>
                <p class="italic title font-vollkorn text-typo-heading text-xl md:text-5xl text-[#1f1c17]">
                    <?= htmlspecialchars($title) ?>
                </p>
                <p class="text-sm author font-nunito"><em>By</em> <strong><?= htmlspecialchars($author) ?></strong></p>
            </div>

            <!-- content -->
            <div class="lg:col-span-6">
                <article class="content-body font-nunito">
                    <?= $siteContent ?>
                </article>
            </div>

            <!-- popular posts -->
            <div class="popular-articles lg:col-span-3">
                <p class="italic title font-vollkorn text-typo-heading text-xl md:text-2xl text-[#1f1c17] mb-6">
                    Bài viết khác
                </p>
                <aside class="w-full lg:w-80">
                    <?php foreach ($popularPosts as $item): ?>
                        <a href="<?= SITE_URL ?>/post/view/<?= $item['id'] ?>" class="inline-block articles__item mb-6 w-full">
                            <div class="flex justify-between items-start group gap-4">
                                <div class="article-image w-24 h-24 overflow-hidden rounded-md flex-shrink-0">
                                    <img alt="<?= htmlspecialchars($item['title']) ?>" 
                                        class="w-full h-full object-cover origin-center transform group-hover:scale-110 transition-transform duration-300" 
                                        src="<?= SITE_URL . $item['thumbnail_url'] ?>">
                                </div>

                                <div class="article-content flex-1">
                                    <p class="article-content__title font-vollkorn text-sm lg:text-base leading-5 text-primary-dark line-clamp-2">
                                        <?= htmlspecialchars($item['title']) ?>
                                    </p>
                                    <p class="article-content__description font-nunito text-xs text-gray-500 line-clamp-2 mt-1">
                                        <?= htmlspecialchars($item['thumbnail_description']) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </aside>
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