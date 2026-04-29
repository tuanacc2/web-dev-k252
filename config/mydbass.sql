-- Lưu dữ liệu ảnh trong server
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    target_id INT NOT NULL,
    target_type ENUM('avatar', 'product', 'post') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Danh sách người dùng và admin
CREATE TABLE users ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(50) UNIQUE NOT NULL, 
	password VARCHAR(255) NOT NULL, 
	email VARCHAR(100),
    avatar_id INT NULL DEFAULT NULL,
    phoneNumber VARCHAR(20),
    address VARCHAR(100), 
	role ENUM('admin', 'user') DEFAULT 'user', 
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (avatar_id) REFERENCES images(id) ON DELETE SET NULL
); 

-- Thông tin liên hệ
CREATE TABLE contacts ( 
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
CREATE TABLE categories ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(255) NOT NULL, 
	type ENUM('product', 'post') NOT NULL 
);

-- Sản phẩm / dịch vụ
CREATE TABLE products ( 
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
CREATE TABLE posts ( 
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
CREATE TABLE comments ( 
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
CREATE TABLE faqs ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	question TEXT NOT NULL, 
	answer TEXT NOT NULL 
);

-- Sản phẩm đang trong giỏ hàng
CREATE TABLE cart ( 
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
CREATE TABLE order_history (
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
CREATE TABLE order_details (
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

CREATE TABLE logs (
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
    'admin123@gmail.com', 
    NULL, 
    '0123456789', 
    'lmao', 
    'admin', 
    current_timestamp()
);



