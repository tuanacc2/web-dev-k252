<?php
/** @var array $logs */
/** @var string $search */
/** @var int $page */
/** @var int $totalPage */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SRTDash Admin - Logger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ICO cryptocurrency dashboard with real-time market data, sales reports, and trading analytics.">
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
                    <a href="<?= SITE_URL ?>/admin/dashboard">
                        <picture>
                            <source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.avif" type="image/avif">
                            <img src="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.png" alt="logo">
                        </picture>
                    </a>
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
                                    <li><a href="<?= SITE_URL ?>/admin/homepage">Homepage</a></li>
                                    <li><a href="<?= SITE_URL ?>/admin/about">About us</a></li>
                                </ul>
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
                            <li class="active">
                                <a href="javascript:void(0)">
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
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area float-end">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-bs-toggle="dropdown">
                                    <span>2</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="notify-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key bg-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley bg-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Comments On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key bg-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley bg-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Comments On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key bg-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key bg-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key bg-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <i class="fa-regular fa-envelope dropdown-toggle" data-bs-toggle="dropdown"><span>3</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="notify-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img1.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img1.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img2.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img2.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">When you can connect with me...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img3.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img3.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">I missed you so much...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img4.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img4.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Your product is completely Ready...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img2.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img2.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img1.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img1.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img3.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/author/author-img3.jpg" alt="image"></picture>
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
             
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h1 class="page-title float-start">Logger</h1>
                            <ul class="breadcrumbs float-start">
                                <li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
                                <li><span>Logger</span></li>
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
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0"></h4>
                                    <select class="custome-select border-   0 pe-3">
                                        <option value="0" selected>Last 24 Hours</option>
                                        <option value="1">Last Week</option>
                                        <option value="2">Last Month</option>
                                        <option value="3">Last Year</option>
                                        <option value="4">All time</option>
                                    </select>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                        <table class="dbkit-table">
                                            <tr class="heading-td">
                                                <td class="mv-icon">Username</td>
                                                <td class="coin-name">Action</td>
                                                <td class="buy">Target</td>
                                                <td class="sell">Description</td>
                                                <td class="trends">Created time</td>
                                            </tr>
                                            <?php foreach ($logs as $log): ?>
                                            <tr>
                                                <td class=""><?= $log['username'] ?></td>
                                                <td class=""><?= $log['action'] ?></td>
                                                <td class=""><?= $log['target_id'] ?? "none" ?></td>
                                                <td class=""><?= $log['description'] ?></td>
                                                <td class=""><?= $log['created_at'] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="ms-auto form-check-inline">
                                    <div class="btn-group me-2" role="group" aria-label="First group">
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
                                                <a href="?search=<?= urlencode($search) ?>&page=<?= $i ?>" 
                                                    class="btn mb-xl-3 <?= ($i == $page) ? 'btn-primary' : 'btn-secondary' ?>"
                                                > <?= $i ?> </a>
                                            <?php } ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- market value area end -->
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
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa-solid fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa-solid fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa-solid fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa-solid fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa-solid fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
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

    <!-- Chart.js 4 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <!-- all line chart activation -->
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/pie-chart.js"></script>
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/scripts.js"></script>
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());
        gtag("config", "G-XXXXXXXXXX");
    </script>
</body>

</html>
