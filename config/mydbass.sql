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
	type ENUM('product', 'post') NOT NULL 
);

-- Sản phẩm / dịch vụ
CREATE TABLE IF NOT EXISTS products ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL, 
    category_id INT NOT NULL,
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
	category_id INT NOT NULL,
	content TEXT,
	author_id INT, 
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
	FOREIGN KEY (author_id) REFERENCES users(id), 
	FOREIGN KEY (category_id) REFERENCES categories(id) 
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
        `first_name`,
        `last_name`,
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
(NULL, '/assets/images/banner/Social_post_Mo_ban_Giftbox_Cocoon_da_co_mat_tai_Phap_01_d99eec03fc.jpg', 'MỞ BÁN', 'Giftbox "Cocoon đã có mặt tại Pháp"', 'Nếu được gọi tên hành trình vươn ra thế giới của Cocoon, chúng tôi sẽ gọi đó là hành trình “nảy mầm”. Từ những nguyên liệu tinh túy của đất Việt, chúng tôi gieo mầm ở những vùng đất mới, và những hạt giống ấy đang dần nảy nở, được đón nhận, mang theo một màu sắc rất riêng của Việt Nam đến với bạn bè quốc tế.', '#', '#1f1c17', '#fff6cd'),
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
