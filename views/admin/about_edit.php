<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Edit About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Edit About Us content">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= SITE_URL ?? "" ?>assets/admin/images/icon/logo.png">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/metismenujs.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/swiper-bundle.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/typography.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/default-css.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/styles.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/responsive.css">
    <style>
        .about-editor {
            min-height: 400px;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            background: #fff;
        }
    </style>
</head>

<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?= SITE_URL ?>/admin/dashboard"><picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.png" alt="logo"></picture></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="<?= SITE_URL ?>/admin/dashboard">
                                    <i class="ti-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa-solid fa-pen"></i> 
                                    <span>Edit page</span>
                                </a>
                                <ul class="collapse"> 
                                    <li><a href="<?= SITE_URL ?>/admin/information">Infomation</a></li>
                                    <li><a href="<?= SITE_URL ?>/admin/homepage">Homepage</a></li>
                                    <li class="active"><a href="<?= SITE_URL ?>/admin/about">About us</a></li>
                                    <li><a href="<?= SITE_URL ?>/admin/faq">FAQ</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/user">
                                    <i class="fa-solid fa-user"></i>
                                    <span>User Management</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/contact">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Contact Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/help">
                                    <i class="fa-solid fa-question"></i>
                                    <span>Help Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/category">
                                    <i class="fa-solid fa-tags"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/product">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/cart">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Cart Management</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/post">
                                    <i class="fa-solid fa-newspaper"></i>
                                    <span>Posts</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/log">
                                    <i class="fa-solid fa-file-lines"></i>
                                    <span>Logger</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn float-start">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box float-start">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->     
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h1 class="page-title float-start">Edit About Us</h1>
                            <ul class="breadcrumbs float-start">
                                <li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
                                <li><span>About Us</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile float-end">
                            <picture><img class="avatar user-thumb" src="<?= $_SESSION['admin_avatar'] ?? '/assets/admin/images/author/avatar.png'?>" alt="avatar"></picture>
                            <h4 class="user-name dropdown-toggle" data-bs-toggle="dropdown"><?= $_SESSION['admin_name'] ?? 'Admin' ?><i class="fa-solid fa-angle-down"></i></h4>
                            <div class="dropdown-menu user-dropdown">
                                <a class="dropdown-item" href="profile.html"><i class="fa-solid fa-user"></i> My Profile</a>
                                <a class="dropdown-item" href="notifications.html"><i class="fa-solid fa-envelope"></i> Inbox <span class="badge rounded-pill bg-primary ms-auto">3</span></a>
                                <a class="dropdown-item" href="settings.html"><i class="fa-solid fa-gear"></i> Account Settings</a>
                                <a class="dropdown-item" href="screenlock.html"><i class="fa-solid fa-lock"></i> Lock Screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item user-dropdown-logout" href="<?= SITE_URL ?>/auth/logout"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner" id="main-content">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="<?= SITE_URL ?>/admin/about" id="aboutForm">
                                    <!-- Main About Content -->
                                    <div class="mb-4">
                                        <h5 class="mb-3"><i class="fa-solid fa-heading"></i> Nội dung chính (ABOUT US)</h5>
                                        <label for="aboutIntro" class="form-label">Nội dung chủ yếu</label>
                                        <p class="text-muted small">HTML được hỗ trợ. Đây là phần nội dung lớn ở giữa trang.</p>
                                        <textarea id="aboutIntro" name="about_content" rows="12" class="form-control" style="min-height: 350px;"><?= htmlspecialchars($about_content ?? '') ?></textarea>
                                    </div>

                                    <hr class="my-5">

                                    <!-- Philosophy Section -->
                                    <div class="mb-4">
                                        <h5 class="mb-3"><i class="fa-solid fa-lightbulb"></i> Triết lý</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="philosophyTitle" class="form-label">Tiêu đề</label>
                                                <input type="text" class="form-control" id="philosophyTitle" name="philosophy_title" placeholder="Ví dụ: Lấy sự an toàn làm nền tảng" value="Lấy sự an toàn làm nền tảng">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="philosophyEyebrow" class="form-label">Nhãn (Eyebrow)</label>
                                                <input type="text" class="form-control" id="philosophyEyebrow" name="philosophy_eyebrow" placeholder="Ví dụ: Triết lý" value="Triết lý">
                                            </div>
                                        </div>
                                        <label for="philosophyContent" class="form-label">Nội dung</label>
                                        <textarea id="philosophyContent" name="philosophy_content" rows="3" class="form-control" placeholder="Chúng tôi ưu tiên các thành phần quen thuộc...">Chúng tôi ưu tiên các thành phần quen thuộc, chọn lọc kỹ lưỡng và phát triển theo tiêu chuẩn hiện đại.</textarea>
                                    </div>

                                    <hr class="my-5">

                                    <!-- Values Section -->
                                    <div class="mb-4">
                                        <h5 class="mb-3"><i class="fa-solid fa-gem"></i> Giá trị</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="valuesTitle" class="form-label">Tiêu đề</label>
                                                <input type="text" class="form-control" id="valuesTitle" name="values_title" placeholder="Ví dụ: Tôn trọng làn da Việt" value="Tôn trọng làn da Việt">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="valuesEyebrow" class="form-label">Nhãn (Eyebrow)</label>
                                                <input type="text" class="form-control" id="valuesEyebrow" name="values_eyebrow" placeholder="Ví dụ: Giá trị" value="Giá trị">
                                            </div>
                                        </div>
                                        <label for="valuesContent" class="form-label">Nội dung</label>
                                        <textarea id="valuesContent" name="values_content" rows="3" class="form-control" placeholder="Mỗi công thức đều hướng tới sự phù hợp...">Mỗi công thức đều hướng tới sự phù hợp, nhẹ dịu và hiệu quả sử dụng lâu dài.</textarea>
                                    </div>

                                    <hr class="my-5">

                                    <!-- Vision Section -->
                                    <div class="mb-4">
                                        <h5 class="mb-3"><i class="fa-solid fa-eye"></i> Định hướng</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="visionTitle" class="form-label">Tiêu đề</label>
                                                <input type="text" class="form-control" id="visionTitle" name="vision_title" placeholder="Ví dụ: Phát triển bền vững" value="Phát triển bền vững">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="visionEyebrow" class="form-label">Nhãn (Eyebrow)</label>
                                                <input type="text" class="form-control" id="visionEyebrow" name="vision_eyebrow" placeholder="Ví dụ: Định hướng" value="Định hướng">
                                            </div>
                                        </div>
                                        <label for="visionContent" class="form-label">Nội dung</label>
                                        <textarea id="visionContent" name="vision_content" rows="3" class="form-control" placeholder="Chúng tôi ưu tiên các lựa chọn thân thiện...">Chúng tôi ưu tiên các lựa chọn thân thiện hơn với môi trường trong từng bước phát triển sản phẩm.</textarea>
                                    </div>

                                    <hr class="my-5">

                                    <!-- Mission & Commitment Section -->
                                    <div class="mb-4">
                                        <h5 class="mb-3"><i class="fa-solid fa-handshake"></i> Sứ mệnh & Cam kết</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="missionVisionTitle" class="form-label">Tiêu đề chính</label>
                                                <input type="text" class="form-control" id="missionVisionTitle" name="mission_vision_title" placeholder="Ví dụ: Phát triển đẹp hơn..." value="Phát triển đẹp hơn từ những điều rất gần gũi">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="missionVisionEyebrow" class="form-label">Nhãn (Eyebrow)</label>
                                                <input type="text" class="form-control" id="missionVisionEyebrow" name="mission_vision_eyebrow" placeholder="Ví dụ: Sứ mệnh & cam kết" value="Sứ mệnh & cam kết">
                                            </div>
                                        </div>
                                        <label for="missionVisionIntro" class="form-label">Giới thiệu chung</label>
                                        <textarea id="missionVisionIntro" name="mission_vision_intro" rows="2" class="form-control" placeholder="Chúng tôi được sinh ra để mang lại...">Chúng tôi được sinh ra để mang lại cho bạn một làn da, một mái tóc luôn khỏe mạnh, trẻ trung và tràn đầy sức sống từ những nguyên liệu đơn giản và gần gũi mà bạn ăn hằng ngày.</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="missionContent" class="form-label">Sứ mệnh (Mission)</label>
                                        <textarea id="missionContent" name="mission_content" rows="4" class="form-control" placeholder="Chúng tôi luôn giữ một nhiệm vụ...">Chúng tôi luôn giữ một nhiệm vụ trong tâm trí: áp dụng các lợi ích của thực phẩm quanh ta kết hợp với sự hiểu biết khoa học để tạo ra các sản phẩm mỹ phẩm an toàn và hiệu quả cho tất cả mọi người.</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="commitmentContent" class="form-label">Cam kết (Commitment)</label>
                                        <p class="text-muted small">Nhập nội dung cam kết, các mục đích có thể được bao quanh bởi các thẻ &lt;strong&gt; để in đậm tiêu đề mục.</p>
                                        <textarea id="commitmentContent" name="commitment_content" rows="8" class="form-control" placeholder="100% nguyên liệu...">Chúng tôi luôn giữ một nhiệm vụ trong tâm trí: áp dụng các lợi ích của thực phẩm quanh ta kết hợp với sự hiểu biết khoa học để tạo ra các sản phẩm mỹ phẩm an toàn và hiệu quả cho tất cả mọi người.</textarea>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-save"></i> Lưu thay đổi
                                        </button>
                                        <a href="<?= SITE_URL ?>/admin/dashboard" class="btn btn-secondary">
                                            <i class="fa-solid fa-arrow-left"></i> Quay lại
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2026. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-bs-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-bs-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa-solid fa-info-circle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Chỉnh sửa nội dung About Us</h4>
                            <span class="time"><i class="ti-time"></i>Now</span>
                        </div>
                        <p>Chỉnh sửa HTML nội dung About Us trang chính của website. Nhấn "Lưu thay đổi" để cập nhật.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- bootstrap 5 js -->
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/swiper-bundle.min.js"></script>
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/metismenujs.min.js"></script>
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/scripts.js"></script>
</body>

</html>
