<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/public/css/header.css">
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

    <style>
        body {
            background: #fefbf4;
        }

        .about-eyebrow {
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #c5a25d;
            font-size: 0.75rem;
        }

        .about-prose p {
            margin-bottom: 1rem;
        }

        .about-prose h2 {
            margin-top: 2rem;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            font-weight: 700;
            color: #1f1c17;
        }

        .font-nunito {
            font-family: 'Nunito', sans-serif;
        }

        .font-vollkorn {
            font-family: 'Vollkorn', serif;
        }
        
    </style>
</head>
<body>
<div class="w-full min-h-screen bg-[#fefbf4] text-[#1f1c17]">
    <?php require_once 'views/layout/header.php'; ?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20 py-10 lg:py-16 font-[Roboto_Mono]">
        <section class="grid lg:grid-cols-[260px_minmax(0,1fr)] gap-8 lg:gap-12 items-start">
            <div class="lg:sticky lg:top-28">
                <p class="about-eyebrow mb-4">About us</p>
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight text-[#1f1c17]">Câu chuyện thương hiệu</h1>
                <p class="mt-6 text-base text-[#4a463f] leading-8 max-w-sm">
                    <?= htmlspecialchars($companyName ?? 'Cocoon') ?> là thương hiệu mỹ phẩm thuần chay phát triển với mục tiêu tạo ra những sản phẩm an toàn, hiệu quả và phù hợp với làn da người Việt.
                </p>

                <div class="mt-8 space-y-3">
                    <div class="h-px bg-[#e8dcc2]"></div>
                    <p class="text-sm text-[#9a8f7c]">Cocoon - Mỹ phẩm thuần chay - cho nét đẹp thuần Việt</p>
                </div>
            </div>

            <div class="space-y-8 lg:space-y-10">
                <?php if (!empty($aboutSections['about_content'])): ?>
                <section class="rounded-[2rem] border border-[#e8dcc2] bg-[#fff7e8] p-7 lg:p-10 shadow-[0_16px_40px_rgba(31,28,23,0.04)]">
                    <div class="about-prose text-[#4a463f] leading-8 text-[15px] lg:text-[16px] max-w-4xl">
                        <?= $aboutSections['about_content'] ?>
                    </div>
                </section>
                <?php endif; ?>

                <section class="grid md:grid-cols-3 gap-5 lg:gap-6">
                    <div class="rounded-[1.5rem] bg-[#fff8ef] border border-[#eadfc9] p-6 lg:p-7">
                        <p class="about-eyebrow mb-3"><?= htmlspecialchars($aboutSections['philosophy_eyebrow'] ?? '') ?></p>
                        <h3 class="text-2xl font-bold mb-3"><?= htmlspecialchars($aboutSections['philosophy_title'] ?? '') ?></h3>
                        <p class="text-[#4a463f] leading-8 text-[15px]">
                            <?= htmlspecialchars($aboutSections['philosophy_content'] ?? '') ?>
                        </p>
                    </div>
                    <div class="rounded-[1.5rem] bg-[#fff8ef] border border-[#eadfc9] p-6 lg:p-7">
                        <p class="about-eyebrow mb-3"><?= htmlspecialchars($aboutSections['values_eyebrow'] ?? '') ?></p>
                        <h3 class="text-2xl font-bold mb-3"><?= htmlspecialchars($aboutSections['values_title'] ?? '') ?></h3>
                        <p class="text-[#4a463f] leading-8 text-[15px]">
                            <?= htmlspecialchars($aboutSections['values_content'] ?? '') ?>
                        </p>
                    </div>
                    <div class="rounded-[1.5rem] bg-[#fff8ef] border border-[#eadfc9] p-6 lg:p-7">
                        <p class="about-eyebrow mb-3"><?= htmlspecialchars($aboutSections['vision_eyebrow'] ?? '') ?></p>
                        <h3 class="text-2xl font-bold mb-3"><?= htmlspecialchars($aboutSections['vision_title'] ?? '') ?></h3>
                        <p class="text-[#4a463f] leading-8 text-[15px]">
                            <?= htmlspecialchars($aboutSections['vision_content'] ?? '') ?>
                        </p>
                    </div>
                </section>

                <section class="rounded-[2rem] border border-[#e8dcc2] bg-[#fffaf0] p-7 lg:p-10">
                    <div class="grid lg:grid-cols-[1fr_1.15fr] gap-8 lg:gap-12 items-start">
                        <div>
                            <p class="about-eyebrow mb-4"><?= htmlspecialchars($aboutSections['mission_vision_eyebrow'] ?? '') ?></p>
                            <h2 class="text-3xl lg:text-4xl font-semibold leading-tight mb-4 text-[#1f1c17]"><?= htmlspecialchars($aboutSections['mission_vision_title'] ?? '') ?></h2>
                            <p class="text-[#4a463f] leading-8">
                                <?= htmlspecialchars($aboutSections['mission_vision_intro'] ?? '') ?>
                            </p>
                        </div>

                        <div class="about-prose text-[#4a463f] leading-8 text-[15px] lg:text-[16px]">
                            <?php if (!empty($aboutSections['mission_content'])): ?>
                                <h2>Sứ mệnh</h2>
                                <p><?= $aboutSections['mission_content'] ?></p>
                            <?php endif; ?>

                            <?php if (!empty($aboutSections['commitment_content'])): ?>
                                <h2>Cam kết</h2>
                                <p><?= $aboutSections['commitment_content'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>

    <?php require_once 'views/layout/footer.php'; ?>
</div>
</body>
</html>
