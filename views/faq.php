<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu hỏi Thường gặp</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/public/css/header.css">

    <style>
        body { background: #fefbf4; }
        .faq-container { max-width: 980px; margin: 0 auto; padding: 48px 20px; }
        .faq-title { font-family: 'Anton', sans-serif; font-size: 68px; color: #C5A25D; margin-bottom: 24px; }
        .faq-list { background: transparent; }
        .faq-item { border-bottom: 1px solid #C5A25D; padding: 14px 0; display: flex; align-items: center; justify-content: space-between; }
        .faq-question { font-style: italic; color: #C5A25D; font-size: 18px; text-align: left; flex: 1; }
        .faq-answer { display: none; color: #1f1c17; margin-top: 12px; line-height: 1.8; }
        .faq-item.open .faq-answer { display: block; }
        .arrow { width: 22px; height: 22px; transform: rotate(0deg); transition: transform 200ms ease; margin-left: 12px; }
        .faq-item.open .arrow { transform: rotate(-180deg); }
    </style>
</head>
<body>
<div class="w-full min-h-screen bg-[#fefbf4] text-[#1f1c17]">
    <?php require_once 'views/layout/header.php'; ?>

    <main class="faq-container">
        <h1 class="faq-title">Câu hỏi Thường gặp</h1>

        <div class="faq-list">
            <?php if (!empty($faqs) && is_array($faqs)): ?>
                <?php foreach ($faqs as $faq): ?>
                    <div class="faq-item" data-id="<?= htmlspecialchars($faq['id']) ?>">
                        <div style="flex:1">
                            <button class="faq-toggle" style="background:none;border:0;padding:0;width:100%;text-align:left;display:flex;align-items:center;gap:16px">
                                <span class="faq-question"><?= htmlspecialchars($faq['question']) ?></span>
                                <svg class="arrow" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9l6 6 6-6" stroke="#C5A25D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <div class="faq-answer"><?= nl2br(htmlspecialchars($faq['answer'])) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Chưa có câu hỏi nào.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once 'views/layout/footer.php'; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.faq-toggle').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            const item = btn.closest('.faq-item');
            if (!item) return;
            const open = item.classList.toggle('open');
            // smooth scroll into view when opening
            if (open) {
                item.scrollIntoView({behavior:'smooth', block: 'center'});
            }
        });
    });
});
</script>
</body>
</html>
