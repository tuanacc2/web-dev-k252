<footer class="bg-[#170801] text-gray-300">
    <div class="w-full max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 mb-8">
            <!-- Company Info -->
            <div class="col-span-2 md:col-span-1 mb-4 md:mb-0">
                <h3 class="text-white font-bold mb-3 text-sm md:text-base">Về <?= $companyName?></h3>
                <p class="text-xs md:text-sm leading-relaxed"><?= $companyName?> là thương hiệu hàng đầu cung cấp các sản phẩm chất lượng cao.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-bold mb-3 text-sm md:text-base">Liên kết nhanh</h3>
                <ul class="text-xs md:text-sm space-y-2">
                    <li><a href="/" class="hover:text-white transition">Trang chủ</a></li>
                    <li><a href="/products" class="hover:text-white transition">Sản phẩm</a></li>
                    <li><a href="/posts" class="hover:text-white transition">Blog</a></li>
                    <li><a href="/contact" class="hover:text-white transition">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white font-bold mb-3 text-sm md:text-base">Hỗ trợ</h3>
                <ul class="text-xs md:text-sm space-y-2">
                    <li><a href="/help" class="hover:text-white transition">Trợ giúp</a></li>
                    <li><a href="#" class="hover:text-white transition">Chính sách</a></li>
                    <li><a href="#" class="hover:text-white transition">Điều khoản</a></li>
                    <li><a href="#" class="hover:text-white transition">Bảo mật</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-white font-bold mb-3 text-sm md:text-base">Liên hệ</h3>
                <ul class="text-xs md:text-sm space-y-2">
                    <li>Email: <?= $email ?></li>
                    <li>Điện thoại: <?= $phone ?></li>
                    <li>Địa chỉ: <?= $address ?></li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700 pt-6 md:pt-8">
            <!-- Copyright -->
            <div class="flex flex-col justify-center items-center text-center space-y-4">
                <div class="text-xs md:text-sm text-gray-400">
                    &copy; <?php echo date('Y'); ?> <?= $companyName ?>. All rights reserved.
                </div>
                <div class="flex gap-4 md:gap-6 text-xs md:text-sm justify-center">
                    <a href="<?= $facebook ?>" class="text-gray-400 hover:text-white transition">Facebook</a>
                    <a href="<?= $instagram ?>" class="text-gray-400 hover:text-white transition">Instagram</a>
                    <a href="<?= $twitter ?>" class="text-gray-400 hover:text-white transition">Twitter</a>
                </div>
            </div>
        </div>
    </div>
</footer>
