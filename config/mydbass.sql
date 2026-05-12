-- Lưu dữ liệu ảnh trong server
CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    target_id INT NOT NULL,
    target_type ENUM('avatar', 'product', 'post') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Danh sách người dùng và admin
CREATE TABLE IF NOT EXISTS users ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(50) UNIQUE NOT NULL, 
	password VARCHAR(255) NOT NULL, 
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
	email VARCHAR(100),
    avatar_id INT NULL DEFAULT NULL,
    phoneNumber VARCHAR(20),
    address VARCHAR(100), 
	role ENUM('admin', 'user') DEFAULT 'user', 
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (avatar_id) REFERENCES images(id) ON DELETE SET NULL
); 
-- Danh sách người dùng và admin
CREATE TABLE IF NOT EXISTS contacts ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(20),
    question TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    hasSeen TINYINT(1) DEFAULT 0,
    hasReplied TINYINT(1) DEFAULT 0
);


-- Các category của sản phẩm / dịch vụ và bài đăng
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT DEFAULT NULL,
    type ENUM('product', 'post') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- This constraint ensures the name is unique for each specific type
    UNIQUE KEY unique_category_per_type (name, type)
);

-- Nội dung bài viết / sản phẩm (tách riêng để dễ quản lý, có thể mở rộng thêm các trường như summary, tags,...)
CREATE TABLE IF NOT EXISTS contents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content LONGTEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sản phẩm / dịch vụ
CREATE TABLE IF NOT EXISTS products ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL, 
    category_id INT DEFAULT NULL,
    description TEXT, 
    image_id INT NULL DEFAULT NULL,
    price DECIMAL(10,2) NOT NULL, 
    stock_quantity INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Bài viết các bản tin
CREATE TABLE IF NOT EXISTS posts ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	title VARCHAR(255) NOT NULL, 
    thumbnail_id INT NULL DEFAULT NULL,
    thumbnail_description TEXT DEFAULT NULL,
	category_id INT DEFAULT NULL,
	content_id INT DEFAULT NULL,
	author_id INT DEFAULT NULL, 
    status ENUM('public', 'private', 'hidden') DEFAULT 'public',
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (author_id) REFERENCES users(id), 
	FOREIGN KEY (category_id) REFERENCES categories(id),
	FOREIGN KEY (thumbnail_id) REFERENCES images(id) ON DELETE SET NULL,
	FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE SET NULL
);

-- Bình luận về sản phẩm / dịch vụ và bài viết
CREATE TABLE IF NOT EXISTS comments ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	target_id INT NOT NULL,
    target_type ENUM('product', 'post') NOT NULL,
	user_id INT NOT NULL, 
	content TEXT NOT NULL, 
    hidden TINYINT DEFAULT 0, 
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
	FOREIGN KEY (user_id) REFERENCES users(id) 
); 
 
-- FAQs (literally)
CREATE TABLE IF NOT EXISTS faqs ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	question TEXT NOT NULL, 
	answer TEXT NOT NULL 
);

-- Sản phẩm đang trong giỏ hàng
CREATE TABLE IF NOT EXISTS cart ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, 
    product_id INT NOT NULL, 
    quantity INT DEFAULT 1, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE, 
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Lịch sử mua hàng
CREATE TABLE IF NOT EXISTS order_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    address TEXT,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Chi tiết đơn hàng (1 đơn hàng có nhiều sản phẩm)
CREATE TABLE IF NOT EXISTS order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price_at_time DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES order_history(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);



-- Bảng Comments: thêm chức năng Rating cho Sản phẩm (từ 0 đến 5 sao)
ALTER TABLE comments ADD COLUMN rating TINYINT NULL;



-- Lưu các thay đổi của database
DROP TABLE IF EXISTS logs;

CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    action VARCHAR(255) NOT NULL,
    target_id INT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_logs_user 
        FOREIGN KEY (user_id) 
        REFERENCES users(id) 
        ON DELETE SET NULL 
        ON UPDATE CASCADE
);

-- Chèn admin vào với tài khoản admin / 0
INSERT INTO `users` (
        `id`, 
        `username`, 
        `password`, 
        `last_name`,
        `first_name`,
        `email`, 
        `avatar_id`, 
        `phoneNumber`, 
        `address`, 
        `role`, 
        `created_at`
    ) 
VALUES (
    NULL, 
    'admin', 
    '0', 
    'Nguyen',
    'Van A',
    'admin123@gmail.com', 
    NULL, 
    '0123456789', 
    'lmao', 
    'admin', 
    current_timestamp()
);
-- Thong tin cong ty----
CREATE TABLE IF NOT EXISTS informations ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(255) NOT NULL,
    type TEXT NOT NULL, 
    value TEXT
);
INSERT INTO informations (id, name, type, value) 
VALUES 
(NULL, 'Logo', 'image', '/assets/public/resources/logo/logo.f502f17.svg'),
(NULL, 'Company Name', 'text', 'CapooCompany'),
(NULL, 'Phone', 'text', '0123456789'),
(NULL, 'Email', 'text', 'tuavip069@gmail.com'),
(NULL, 'Address', 'text', 'Da Nang, Viet Nam'),
(NULL, 'Messenger', 'link', 'https://m.me/100094046926830'),
(NULL, 'Zalo', 'link', 'https://zalo.me/0962294335'),
(NULL, 'Facebook', 'link', 'https://www.facebook.com/profile.php?id=100094046926830'),
(NULL, 'Instagram', 'link', 'https://www.instagram.com/_tuncapo_/'),
(NULL, 'Twitter', 'link', '#');
-- Advertisement ----
CREATE TABLE IF NOT EXISTS advertisements ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
    leftImage TEXT,
    thumbnail TEXT,
    title TEXT,
    content TEXT,
    link TEXT,
    textColor VARCHAR(20),
    backgroundColor VARCHAR(20)
);
INSERT INTO advertisements (id, leftImage, thumbnail, title, content, link, textColor, backgroundColor)
VALUES
(NULL, '/assets/images/banner/hinh1pmc_837dbe7578.jpg', 'RA MẮT SẢN PHẨM MỚI', 'Nước tẩy trang sen Hậu Giang', 'Cocoon x Phương Mỹ Chi ra mắt nước tẩy trang thế hệ mới: Nước Tẩy Trang Sen Hậu Giang - làm sạch sâu lớp trang điểm và bụi siêu mịn PM1.0 nhờ công nghệ độc quyền NatraGem™ S150, hỗ trợ cân bằng hệ vi sinh trên da với phức hợp prebiotics, phù hợp cho mọi loại da, kể cả da rất nhạy cảm.', '#', '#fefbf4', '#54a14a');

-- Scroll text ----
CREATE TABLE IF NOT EXISTS scrolltext (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL
);

INSERT INTO scrolltext (id, content)
VALUES
(NULL, 'MỸ PHẨM 100% THUẦN CHAY CHO NÉT ĐẸP THUẦN VIỆT');

-- Certifications ----
CREATE TABLE IF NOT EXISTS certifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logo TEXT NOT NULL,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO certifications (id, logo, title, subtitle, content)
VALUES
(NULL, '/assets/images/cef/e3084968637945bfc13699f3682f28a6_24f04f4362.svg', 'PETA', 'ANIMAL TEST-FREE & VEGAN', 'Chương trình Beauty Without Bunnies của tổ chức bảo vệ quyền lợi động vật toàn cầu PETA là chương trình bảo vệ và cam kết không có sự tàn ác đối với động vật uy tín trên thế giới.'),
(NULL, '/assets/images/cef/leaping_bunny_bdcbdfe9f1.svg', 'LEAPING BUNNY', 'CHƯƠNG TRÌNH LEAPING BUNNY', 'Chương trình Leaping Bunny của tổ chức Cruelty Free International được xem là "tiêu chuẩn vàng" toàn cầu cho các sản phẩm không thử nghiệm trên động vật.'),
(NULL, '/assets/images/cef/vegan_society_41cc2b390a.svg', 'VEGAN SOCIETY', 'HIỆP HỘI THUẦN CHAY QUỐC TẾ', 'The Vegan Society (Hiệp hội thuần chay quốc tế) là một trong những chứng nhận uy tín xác thực cho các sản phẩm không có thành phần từ động vật và không thử nghiệm trên động vật.');

-- Main product showcase ----
CREATE TABLE IF NOT EXISTS main_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image TEXT NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO main_products (id, title, image, description)
VALUES
(NULL, 'Nước tẩy trang sen Hậu Giang', '/assets/images/product/Chai_Sen_924c4d6134.png', 'Từ những nguyên liệu tinh túy của đất Việt, chúng tôi gieo mầm ở những vùng đất mới, và những hạt giống ấy đang dần nảy nở, được đón nhận, mang theo một màu sắc rất riêng của Việt Nam đến với bạn bè quốc tế.');
-- Bài viết các bản tin
CREATE TABLE IF NOT EXISTS contentController ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
    siteName VARCHAR(255) NOT NULL,
    elementName VARCHAR(255) NOT NULL,
    isVisible TINYINT(1) DEFAULT 1
); 
INSERT INTO contentController (id, siteName, elementName, isVisible)
VALUES
(NULL, 'homepage', 'advertisement', 1),
(NULL, 'homepage', 'scrollText', 1),
(NULL, 'homepage', 'certification', 1),
(NULL, 'homepage', 'main-product', 1),
(NULL, 'homepage', 'latestNew', 1),
(NULL, 'homepage', 'product', 1);

INSERT INTO images (id, file_name, target_id, target_type)
VALUES
    (1, '/assets/images/post/DSC_02381_1_b0fdd5538a.jpg', 1, 'post'),
    (2, '/assets/images/post/Hinh_chinh_Website_f198b59b8b.jpg', 2, 'post'),
    (3, '/assets/images/post/z7287578147555_0996a52163d907ff128570862cc441cb_5a19daf561.jpg', 3, 'post'),
    (4, '/assets/images/post/DSC_02381_1_b0fdd5538a.jpg', 1, 'product'),
    (5, '/assets/images/post/Hinh_chinh_Website_f198b59b8b.jpg', 2, 'product'),
    (6, '/assets/images/post/z7287578147555_0996a52163d907ff128570862cc441cb_5a19daf561.jpg', 3, 'product')
;

INSERT INTO categories (id, name, description, type)
VALUES 
    (1, 'Hoạt động công ty', 'Các hoạt động nổi bật của công ty', 'post'),
    (2, 'Làm đẹp', 'Các sản phẩm của công ty', 'post')
;

INSERT INTO contents (id, content)
VALUE 
    (
        1,
        '<div data-v-3cc699ee="" class="article-content"><br data-v-3cc699ee="" style="display: none;"> <div data-v-3cc699ee=""><p><span style="color: rgb(8, 8, 9);">Pháp từ lâu đã được xem là một trong những trung tâm lâu đời và có ảnh hưởng lớn của ngành mỹ phẩm toàn cầu. Đất nước này sở hữu nhiều tập đoàn làm đẹp lớn cùng hệ sinh thái nghiên cứu – sản xuất phát triển, đóng vai trò quan trọng trong việc định hình tiêu chuẩn chất lượng, an toàn và xu hướng tiêu dùng tại châu Âu. Và giờ đây, thị trường này đã chính thức đón chào chúng tôi – mỹ phẩm thuần chay Cocoon.</span></p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Lễ ký kết và ra mắt Cocoon tại Pháp" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/DSC_02381_1_b0fdd5538a.jpg"> <p data-v-10a0dbf2="" class="caption text-xs lg:text-sm italic opacity-50 text-typo-body">
    Lễ ký kết và ra mắt Cocoon tại Pháp
  </p></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><span style="color: rgb(8, 8, 9);">Đồng hành trong hành trình này, chúng tôi vinh dự nhận được sự hợp tác của Orien Trade – nhà phân phối mỹ phẩm châu Á uy tín tại châu Âu. Với sự đồng hành này, các sản phẩm của Cocoon sẽ dần hiện diện tại nhiều thành phố xinh đẹp tại Pháp, cùng viết nên một chương mới cho hành trình của mỹ phẩm Việt tại châu Âu.</span></p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Ông Phạm Minh Dũng - đại diện thương hiệu Cocoon thực hiện ký kết hợp tác cùng ông Madis-Marius Vahtre – Giám đốc Điều hành Orien Trade" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/DSC_01284_1_d0f12d9236.jpg"> <p data-v-10a0dbf2="" class="caption text-xs lg:text-sm italic opacity-50 text-typo-body">
    Ông Phạm Minh Dũng - đại diện thương hiệu Cocoon thực hiện ký kết hợp tác cùng ông Madis-Marius Vahtre – Giám đốc Điều hành Orien Trade
  </p></div><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Ông Phạm Minh Dũng - đại diện thương hiệu Cocoon thực hiện ký kết hợp tác cùng ông Madis-Marius Vahtre – Giám đốc Điều hành Orien Trade" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/DSC_01294_1a8e52fffb.jpg"> <p data-v-10a0dbf2="" class="caption text-xs lg:text-sm italic opacity-50 text-typo-body">
    Ông Phạm Minh Dũng - đại diện thương hiệu Cocoon thực hiện ký kết hợp tác cùng ông Madis-Marius Vahtre – Giám đốc Điều hành Orien Trade
  </p></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><span style="color: rgb(8, 8, 9);">Trong hành trang đến với nước Pháp lần này, chúng tôi không chỉ mang theo những sản phẩm làm đẹp từ nguyên liệu bản địa, 100% thuần chay mà còn mang theo câu chuyện về thiên nhiên Việt Nam phong phú và sự sáng tạo của con người Việt Nam.</span></p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_02165_bf4a53abce.jpg" alt="Để được lưu hành tại Pháp và các quốc gia thuộc Liên minh châu Âu (EU), sản phẩm của thương hiệu cần đáp ứng nhiều quy định chung, bao gồm: tiêu chuẩn Thực hành sản xuất tốt (GMP) tại nhà máy; đăng ký trên Cổng thông báo mỹ phẩm châu Âu (CPNP); tuân thủ các quy định về hương liệu theo tiêu chuẩn của Hiệp hội Hương liệu Quốc tế (IFRA); đồng thời bảo đảm việc công bố thành phần và ghi nhãn theo danh pháp quốc tế (INCI) cùng các yêu cầu pháp lý tại châu Âu. Quá trình hoàn thiện hồ sơ và đáp ứng các quy định này đã được Cocoon triển khai trong hơn hai năm." class="block rounded-md lazyLoad" style="margin: auto;"> <p data-v-10a0dbf2="" class="caption text-xs lg:text-sm italic opacity-50 text-typo-body">
    Để được lưu hành tại Pháp và các quốc gia thuộc Liên minh châu Âu (EU), sản phẩm của thương hiệu cần đáp ứng nhiều quy định chung, bao gồm: tiêu chuẩn Thực hành sản xuất tốt (GMP) tại nhà máy; đăng ký trên Cổng thông báo mỹ phẩm châu Âu (CPNP); tuân thủ các quy định về hương liệu theo tiêu chuẩn của Hiệp hội Hương liệu Quốc tế (IFRA); đồng thời bảo đảm việc công bố thành phần và ghi nhãn theo danh pháp quốc tế (INCI) cùng các yêu cầu pháp lý tại châu Âu. Quá trình hoàn thiện hồ sơ và đáp ứng các quy định này đã được Cocoon triển khai trong hơn hai năm.
  </p></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><span style="color: rgb(8, 8, 9);">Đối với chúng tôi, đây không chỉ là một cột mốc đặc biệt của thương hiệu mà còn là niềm tự hào khi chất lượng mỹ phẩm Việt thật sự được ghi nhận tại một thị trường khắt khe. Đồng thời, đây cũng là cơ hội và là động lực để Cocoon tiếp tục cải tiến, nâng cao chất lượng sản phẩm trong chặng đường phía trước.</span></p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_01339_7a69b05e66.jpg" alt="Lễ ký kết và ra mắt Cocoon tại Pháp" class="block rounded-md lazyLoad" style="margin: auto;"> <p data-v-10a0dbf2="" class="caption text-xs lg:text-sm italic opacity-50 text-typo-body">
    Lễ ký kết và ra mắt Cocoon tại Pháp
  </p></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><span style="color: rgb(8, 8, 9);">Cocoon trân trọng cảm ơn ông Đỗ Văn Mười – Tổng Lãnh sự Danh dự Cộng hòa Estonia tại TP.HCM, cùng các đối tác và các khách mời đã cùng chúng tôi chứng kiến thời khắc đặc biệt này.</span></p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_01206_8b03204f4f.jpg" alt="Ông Đỗ Văn Mười – Tổng Lãnh sự Danh dự Cộng hòa Estonia tại TP.HCM phát biểu tại lễ ký kết và ra mắt Cocoon tại Pháp" class="block rounded-md lazyLoad" style="margin: auto;"> <p data-v-10a0dbf2="" class="caption text-xs lg:text-sm italic opacity-50 text-typo-body">
    Ông Đỗ Văn Mười – Tổng Lãnh sự Danh dự Cộng hòa Estonia tại TP.HCM phát biểu tại lễ ký kết và ra mắt Cocoon tại Pháp
  </p></div><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_00946_1_040f171bc2.jpg" alt="Cocoon đã có mặt tại Pháp!" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_02773_79539ef140.jpg" alt="Cocoon đã có mặt tại Pháp!" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_02321_ebfddbc67b.jpg" alt="Cocoon đã có mặt tại Pháp!" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/DSC_02362_260960097e.jpg" alt="Cocoon đã có mặt tại Pháp!" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div></div>
  '
    ),
    (
        2,
        '<div data-v-3cc699ee="" class="article-content"><br data-v-3cc699ee="" style="display: none;"> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Chương trình &quot;Thu hồi pin cũ - Bảo vệ trái đất xanh&quot; năm 2026" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/Hinh_chinh_Website_f198b59b8b.jpg"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p>Tiếp nối hành trình 4 năm bền bỉ vì môi trường, Cocoon và Trường ĐH Sư phạm TP.HCM tiếp tục phát động chương trình “Thu Hồi Pin Cũ – Bảo Vệ Trái Đất Xanh” lần thứ 5, bắt đầu từ ngày 29.04.</p><p><br></p><p>Năm nay, hành trình của Cocoon mở rộng quy mô hơn bao giờ hết với 116 điểm thu hồi tại 5 tỉnh thành: Hà Nội, Đà Nẵng, Huế, TP.HCM và Cần Thơ.</p><p><br></p><p><strong>Mời bạn xem thêm danh sách các điểm đổi tại</strong>: https://tinyurl.com/CocoonTHPC2026</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Chương trình &quot;Thu hồi pin cũ - Bảo vệ trái đất xanh&quot; năm 2026" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/Chuong_trinh_thu_hoi_pin_cu_chinh_thuc_quay_tro_lai_03_da99afd695.jpg"> <!----></div><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Chương trình &quot;Thu hồi pin cũ - Bảo vệ trái đất xanh&quot; năm 2026" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/682094283_975708784816557_874874142861295495_n_d2b49677db.jpg"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><strong>Bạn có biết!</strong></p><p>Pin đã qua sử dụng nếu vứt chung với rác thải sinh hoạt sẽ rò rỉ kim loại nặng, âm thầm gây ô nhiễm nguồn đất, nước và ảnh hưởng trực tiếp đến sức khỏe. Hãy cùng Cocoon gom pin cũ lại để xử lý đúng cách thay vì bỏ vào thùng rác thông thường bạn nhé!</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/Chuong_trinh_thu_hoi_pin_cu_chinh_thuc_quay_tro_lai_02_0722f6ce6e.jpg" alt="Chương trình &quot;Thu hồi pin cũ - Bảo vệ trái đất xanh&quot; năm 2026" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p>Thời gian: Từ 29/04/2026 đến ngày 29/05/2026 (Quà tặng có thể hết sớm hơn dự kiến).</p><p><br></p><p>Khi mang TỐI THIỂU 20 VIÊN PIN CŨ đến điểm thu hồi, bạn sẽ nhận ngay 01 Dầu gội bưởi 50ml (Phiên bản giới hạn), thay lời cảm ơn bạn đã cùng chúng mình bảo vệ Trái Đất xanh.</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/Chuong_trinh_thu_hoi_pin_cu_chinh_thuc_quay_tro_lai_01_4c587d5654.jpg" alt="Chương trình &quot;Thu hồi pin cũ - Bảo vệ trái đất xanh&quot; năm 2026" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><strong>Cách thức tham gia và nhận quà:</strong></p><p><br></p><p>- Bước 1: Chuẩn bị tối thiểu 20 viên pin đã qua sử dụng (pin AA, AAA, pin C, pin D...), mang đến điểm thu hồi gần bạn nhất.</p><p><br></p><p>- Bước 2: Quét mã trên nắp thùng, nhập thông tin hoặc làm theo hướng dẫn của người phụ trách tại điểm để nhận quà.</p></div> <!----> <!----><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p><strong>Một vài lưu ý nhỏ: </strong></p><p><br></p><p>- Chương trình áp dụng 1 khách hàng / 1 quà tặng. Để đảm bảo nhiều bạn có thể cùng tham gia, nếu bạn mang nhiều hơn 20 viên pin thì vẫn sẽ nhận 1 phần quà khích lệ.</p><p>- Quà tặng áp dụng với dòng pin tiểu trở lên.</p><p>- Quà tặng không quy đổi thành tiền mặt và có số lượng giới hạn tại mỗi điểm.</p></div> <!----> <!----></div>
        '
    ),
    (
        3,
        '<div data-v-3cc699ee="" class="article-content"><br data-v-3cc699ee="" style="display: none;"> <div data-v-3cc699ee=""><p>Chúng tôi gặp lại nhau trong những ngày tiết trời rất đẹp ở Miền Bắc, không khí ngập nắng vàng nhưng lại rất mát mẻ, tất cả như đều ủng hộ cho hành trình “Chung tay cứu trợ chó mèo lang thang” của chúng tôi lần này.&nbsp;</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Cocoon x AAF: Ký kết hợp tác &quot;Chung tay cứu trợ chó mèo lang thang&quot; lần II" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/z7287577949277_f3677cfbba9517a23d9f7ad9e7a8fff0_0e8559237d.jpg"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p>Cocoon đóng góp 500 triệu đồng cùng Tổ chức Động vật châu Á nâng cao phúc lợi cho chó mèo tại Việt Nam trong khuôn khổ của chương trình năm nay.</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" alt="Cocoon x AAF: Ký kết hợp tác &quot;Chung tay cứu trợ chó mèo lang thang&quot; lần II" class="block rounded-md lazyLoad isLoaded" style="margin: auto;" src="https://image.cocoonvietnam.com/uploads/z7287578053205_13d3996f24f6a14d47d2d292888cdf2c_18a5f4fbc8.jpg"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p>Theo đó, chúng tôi sẽ tiếp tục bám sát mục tiêu động vì động vật Việt Nam, lan tỏa tình yêu thương trong cộng đồng và đề cao tinh thần nhân đạo đối với chó mèo. Cụ thể, chương trình “Chung tay cứu trợ chó mèo lang thang” hướng tới thực hiện các hoạt động thiết thực như:&nbsp;</p><p>•	Trao tặng 5 + tấn lương thực, vật dụng và hỗ trợ y tế cho các trạm cứu hộ chó mèo tại Việt Nam&nbsp;</p><p>•	Trao tặng 20.000 liều vắc xin và triển khai tiêm chủng vắc xin phòng bệnh dại trên chó mèo tại các địa phương có tỉ lệ bệnh dại cao&nbsp;</p><p>•	Tổ chức chuỗi hoạt động tuyên truyền tại các trường học nhằm nâng cao nhận thức về bệnh dại và hướng dẫn các phòng tránh/xử lý khi bị chó mèo tấn công&nbsp;</p><p>•	Tổ chức “Ngày hội chó mèo” cung cấp các kiến thức chăm sóc chó mèo và thực hiện thăm khám miễn phí ngay tại chỗ bởi các bác sĩ thú y có chuyên môn cao đến từ AAF.&nbsp;</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/z7287577847761_8a809794d799af5cc7858aaa80378e7e_5f03d541f1.jpg" alt="Cocoon x AAF: Ký kết hợp tác &quot;Chung tay cứu trợ chó mèo lang thang&quot; lần II" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p>Lấy cảm hứng từ nguồn năng lượng đáng yêu của những “người bạn bốn chân” xung quanh chúng ta, Cocoon và Tổ chức Động vật Châu Á AAF kết hợp ra mắt những sản phẩm giới hạn của chương trình “Chung tay cứu trợ chó mèo lang thang”, bao gồm:</p><p>•	Gel tắm Đường Thốt nốt An Giang 500ml&nbsp;- sạch thơm &amp; không gây nhờn rít</p><p>Giá: 212.000đ&nbsp;</p><p>•	Đường Thốt Nốt An Giang Làm Sạch Da chết cơ thể 200ml – da mượt mà &amp; khỏe khoắn</p><p>Giá: 162.000đ</p><p><br></p><p>Mỗi sản phẩm được chúng tôi khoác lên những chiếc áo mới với thông điệp “Chung tay cứu trợ chó mèo lang thang” ép kim nổi bật cùng 10 hình vẽ rất đáng yêu của các em chó mèo như: chó Corgi, chó Cỏ, chó Poodle, chó Husky, chó Shiba, mèo Cam, mèo Tam Thể, mèo Đen, mèo Mướp và mèo Xiêm.&nbsp;</p><p><br></p><p>Với chúng tôi, gel tắm và tẩy tế bào chết dành cho cơ thể đều là những sản phẩm chăm sóc cơ thể mà tất cả chúng ta đều dễ dàng sử dụng và đó cũng là một cách để Cocoon và AAF lan tỏa thông điệp của chương trình này đến với đông đảo mọi người. Chúng ta sẽ cùng nhau chăm sóc bản thân và nhắc nhớ mỗi ngày về tình yêu dành cho các em chó mèo.&nbsp;</p></div> <!----> <!----><br data-v-3cc699ee=""> <!----> <!----> <div data-v-10a0dbf2="" data-v-3cc699ee=""><img data-v-10a0dbf2="" data-src="https://image.cocoonvietnam.com/uploads/z7287577791190_639489850a1d1f8b87ec444046937ca0_548b5b1366.jpg" alt="Cocoon x AAF: Ký kết hợp tác &quot;Chung tay cứu trợ chó mèo lang thang&quot; lần II" class="block rounded-md lazyLoad" style="margin: auto;"> <!----></div><br data-v-3cc699ee=""> <div data-v-3cc699ee=""><p>Thông qua việc duy trì chương trình “Chung tay cứu trợ chó mèo lang thang” cùng AAF, Cocoon mong muốn được góp thêm một phần nhỏ bé trong việc cung cấp nguồn lực cho các trạm cứu hộ, giúp duy trì và nâng cao phúc lợi của chó mèo lang thang, đồng thời, lan tỏa sự khích lệ và sẻ chia từ cộng đồng đến với những cá nhân, tập thể đang điều hành trạm và thực hiện công tác cứu hộ chó mèo.</p></div> <!----> <!----></div>
        '
    )
;


INSERT INTO `posts` (
        `id`, 
        `title`, 
        `thumbnail_id`, 
        `thumbnail_description`,
        `category_id`, 
        `content_id`, 
        `author_id`
    ) 
VALUES (
    1, 
    'Cocoon đã có mặt tại Pháp!', 
    1, 
    'Điều này đã mở ra cơ hội cho mỹ phẩm thuần chay từ Việt Nam bước vào một trong những trung tâm làm đẹp hàng đầu thế giới.', 
    NULL, 
    NULL,
    1
),
(
    2, 
    'Chương trình "Thu hồi pin cũ - Bảo vệ trái đất xanh" năm 2026', 
    2, 
    'Tiếp nối những hành trình bền bỉ vì môi trường, Cocoon và Trường ĐH Sư phạm TP.HCM tiếp tục phát động chương trình “Thu Hồi Pin Cũ – Bảo Vệ Trái Đất Xanh” lần thứ 5', 
    NULL,  
    NULL,
    1
),
(
    3, 
    'Cocoon x AAF: Ký kết hợp tác "Chung tay cứu trợ chó mèo lang thang" lần II', 
    3, 
    'Thông qua việc duy trì chương trình “Chung tay cứu trợ chó mèo lang thang” cùng AAF, Cocoon mong muốn được góp thêm một phần nhỏ bé trong việc cung cấp nguồn lực cho các trạm cứu hộ, giúp duy trì và nâng cao phúc lợi của chó mèo lang thang, đồng thời, lan tỏa sự khích lệ và sẻ chia từ cộng đồng đến với những cá nhân, tập thể đang điều hành trạm và thực hiện công tác cứu hộ chó mèo.', 
    NULL,  
    NULL,
    1
);