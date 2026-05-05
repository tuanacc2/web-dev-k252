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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

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
                <section class="rounded-[2rem] border border-[#e8dcc2] bg-[#fff7e8] p-7 lg:p-10 shadow-[0_16px_40px_rgba(31,28,23,0.04)]">
                    <div class="about-prose text-[#4a463f] leading-8 text-[15px] lg:text-[16px] max-w-4xl">
                        <h2>Ý nghĩa thương hiệu</h2>
                        <p>
                            Cocoon nghĩa là cái kén, cái kén như là “ngôi nhà” để ủ ấp, nuôi dưỡng con sâu nhỏ để đến một ngày sẽ hoá thành nàng bướm xinh đẹp và lộng lẫy. Từ ý nghĩa như thế, Cocoon chính là “ngôi nhà” để chăm sóc làn da, mái tóc của người Việt Nam, giúp cho họ trở nên xinh đẹp, hoàn thiện hơn và toả sáng theo cách của chính họ.
                        </p>
                        <p>
                            Cocoon ra đời với một lý do đơn giản là làm đẹp cho người Việt từ chính những nguồn nguyên liệu gần gũi, quen thuộc. Tạo hoá cũng rất ưu ái cho thiên nhiên Việt Nam chúng ta một thế giới thực vật vô cùng phong phú đủ cả trái đến thảo dược. Bên trong chúng ẩn chứa những dược chất quý giá không chỉ ăn rất ngon mà còn rất tốt khi đưa lên làn da và mái tóc.
                        </p>
                        <p>
                            Mỹ phẩm cũng giống như thực phẩm đều là những “món ăn bổ dưỡng” mang đến vẻ đẹp cho con người. Đó chính là lý do thôi thúc Cocoon nghiên cứu và không ngừng cho ra đời những sản phẩm mỹ phẩm 100% thuần chay giữ trọn dưỡng chất của thực vật Việt Nam, an toàn, lành tính, không sử dụng thành phần từ động vật và nói không với thử nghiệm trên động vật.
                        </p>
                    </div>
                </section>

                <section class="grid md:grid-cols-3 gap-5 lg:gap-6">
                    <div class="rounded-[1.5rem] bg-[#fff8ef] border border-[#eadfc9] p-6 lg:p-7">
                        <p class="about-eyebrow mb-3">Triết lý</p>
                            <h3 class="text-2xl font-bold mb-3">Lấy sự an toàn làm nền tảng</h3>
                        <p class="text-[#4a463f] leading-8 text-[15px]">
                            Chúng tôi ưu tiên các thành phần quen thuộc, chọn lọc kỹ lưỡng và phát triển theo tiêu chuẩn hiện đại.
                        </p>
                    </div>
                    <div class="rounded-[1.5rem] bg-[#fff8ef] border border-[#eadfc9] p-6 lg:p-7">
                        <p class="about-eyebrow mb-3">Giá trị</p>
                            <h3 class="text-2xl font-bold mb-3">Tôn trọng làn da Việt</h3>
                        <p class="text-[#4a463f] leading-8 text-[15px]">
                            Mỗi công thức đều hướng tới sự phù hợp, nhẹ dịu và hiệu quả sử dụng lâu dài.
                        </p>
                    </div>
                    <div class="rounded-[1.5rem] bg-[#fff8ef] border border-[#eadfc9] p-6 lg:p-7">
                        <p class="about-eyebrow mb-3">Định hướng</p>
                            <h3 class="text-2xl font-bold mb-3">Phát triển bền vững</h3>
                        <p class="text-[#4a463f] leading-8 text-[15px]">
                            Chúng tôi ưu tiên các lựa chọn thân thiện hơn với môi trường trong từng bước phát triển sản phẩm.
                        </p>
                    </div>
                </section>

                <section class="rounded-[2rem] border border-[#e8dcc2] bg-[#fffaf0] p-7 lg:p-10">
                    <div class="grid lg:grid-cols-[1fr_1.15fr] gap-8 lg:gap-12 items-start">
                        <div>
                            <p class="about-eyebrow mb-4">Sứ mệnh & cam kết</p>
                            <h2 class="text-3xl lg:text-4xl font-semibold leading-tight mb-4 text-[#1f1c17]">Phát triển đẹp hơn từ những điều rất gần gũi</h2>
                            <p class="text-[#4a463f] leading-8">
                                Chúng tôi được sinh ra để mang lại cho bạn một làn da, một mái tóc luôn khỏe mạnh, trẻ trung và tràn đầy sức sống từ những nguyên liệu đơn giản và gần gũi mà bạn ăn hằng ngày.
                            </p>
                        </div>

                        <div class="about-prose text-[#4a463f] leading-8 text-[15px] lg:text-[16px]">
                            <h2>Sứ mệnh</h2>
                            <p>
                                Chúng tôi luôn giữ một nhiệm vụ trong tâm trí: áp dụng các lợi ích của thực phẩm quanh ta kết hợp với sự hiểu biết khoa học để tạo ra các sản phẩm mỹ phẩm an toàn và hiệu quả cho tất cả mọi người.
                            </p>

                            <h2>Cam kết</h2>
                            <p>
                                <strong>100% nguyên liệu có nguồn gốc rõ ràng và an toàn cho làn da:</strong> tất cả thành phần nguyên liệu đều có chứng từ chứng minh nguồn gốc xuất xứ và được nghiên cứu, kiểm tra kỹ lưỡng trước khi đưa ra thị trường.
                            </p>
                            <p>
                                <strong>100% thuần chay:</strong> chúng tôi không sử dụng các nguyên liệu có nguồn gốc từ động vật như mật ong, sáp ong, mỡ lông cừu, nhau thai cừu, dịch ốc sên, dầu gan cá mập hay tơ tằm.
                            </p>
                            <p>
                                <strong>100% không bao giờ thử nghiệm trên động vật:</strong> các công thức mỹ phẩm của Cocoon được nghiên cứu và thử nghiệm bằng các bài kiểm tra trong phòng thí nghiệm hoặc trên các tình nguyện viên.
                            </p>
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