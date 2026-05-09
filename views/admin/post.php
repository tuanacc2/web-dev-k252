<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SRTDash Admin - Post</title>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php 
/** @var array $posts */
/** @var array $categories */
?>
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
                    <a href="index.html"><picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.png" alt="logo"></picture></a>
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
                                    <li ><a href="<?= SITE_URL ?>/admin/information">Infomation</a></li>
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
                            <li class="active">
                                <a href="javascript:void(0)">
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
                            <h1 class="page-title float-start">Post</h1>
                            <ul class="breadcrumbs float-start">
                                <li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
                                <li><span>Post</span></li>
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
                                <a class="dropdown-item user-dropdown-logout" href="#"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <!-- main content inner area start -->
            <div class="main-content-inner">
                <?php foreach ($posts as $categoryPosts):
                    if (!empty($categoryPosts)): ?>
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-xl font-bold"><?= $categoryPosts[0]['category'] ? htmlspecialchars($categoryPosts[0]['category']) : 'Uncategorized' ?></h4>
                                    <button onClick="openPostModal(<?= htmlspecialchars(json_encode($categoryPosts[0]['category_id'] ?? null), ENT_QUOTES, 'UTF-8') ?>)" class="btn btn-primary btn-sm">+ Create New Post</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Thumbnail</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Author</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($categoryPosts as $post): ?>
                                                <tr>
                                                    <td><?= $post['id'] ?></td>
                                                    <td><img src="<?= SITE_URL . $post['thumbnail_url'] ?>" width="50"></td>
                                                    <td class="text-start"><?= htmlspecialchars($post['title']) ?></td>
                                                    <td><?= htmlspecialchars($post['thumbnail_description']) ?></td>
                                                    <td><?= $post['author'] ? htmlspecialchars($post['author']) : 'Unknown' ?></td>
                                                    <td><?= $post['category'] ? htmlspecialchars($post['category']) : 'Uncategorized' ?></td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">
                                                                <a href="javascript:void(0)" 
                                                                    onclick="editPost(<?= htmlspecialchars(json_encode($post), ENT_QUOTES, 'UTF-8') ?>)" 
                                                                    class="text-secondary">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form id="delete-post" action="<?= SITE_URL ?? '' ?>/admin/post/delete" method="POST">
                                                                    <button type="submit" 
                                                                        style="border: none;"
                                                                        class="bg-transparent p-0"
                                                                        onClick='return confirm("Are you sure you want to delete this post?")' 
                                                                        form="delete-post"
                                                                        name="id"
                                                                        value="<?= $post['id'] ?>">
                                                                        <i class="ti-trash" style="color: red"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    endif; 
                endforeach; ?>  
            </div>          
            <!-- main content inner area end -->
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

    </div>

    <div class="modal fade" id="postModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold">Add New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="postForm" action="<?= SITE_URL ?>admin/post/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="post_id">
                    <input type="hidden" name="thumbnail_id" id="post_thumbnail_id">
                    <div class="modal-body font-nunito">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Post Title</label>
                                    <input type="text" name="title" id="post_title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input type="text" name="description" id="post_description" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" id="post_content" class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="post_category" class="form-select">
                                        <option value="0">Uncategorized</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Thumbnail</label>
                                    <input id="post_thumbnail" type="file" name="thumbnail" class="form-control">
                                </div>
                                <div class="mb-3 <?= !empty($post['thumbnail_id']) ? '' : 'd-none'   ?>" id="thumbnail_preview_container">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label mb-0">Current Thumbnail</label>
                                        <a class="text-danger cursor-pointer fs-4 text-decoration-none me-5" 
                                        style="cursor: pointer;"
                                        onclick="removeThumbnail()">
                                            ✕
                                        </a>
                                    </div>
                                    <img id="thumbnail_preview" 
                                        src="<?= !empty($post['thumbnail_id']) ? SITE_URL . $post['thumbnail_url'] : '' ?>" 
                                        alt="Current Thumbnail" 
                                        class="img-thumbnail" 
                                        width="200">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="savePostBtn" class="btn btn-primary">Save Post</button>
                    </div>
                </form>
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

        const image = document.getElementById('post_thumbnail');
        const preview = document.getElementById('thumbnail_preview');

        let currentId = null;
        let currentThumbnailId = null;
        let currentThumbnailUrl = null;

        image.onchange = evt => {
            const [file] = image.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.parentElement.classList.remove('d-none');
            }
        }

        function openPostModal(categoryId = null) {
            if (currentId) {
                // Clear current post data when opening the modal for adding a new post
                currentId = null;
                $('#postForm')[0].reset();

                $('#thumbnail_preview_container').addClass('d-none');
                $('#thumbnail_preview').attr('src', '');  
            }

            
            $('#postForm').attr('action', '<?= SITE_URL ?>/admin/post/add');
                                                      
            $('#post_id').val('');
            $('#post_category').val(categoryId ?? 0);
            $('#postModal .modal-title').text('Add New Post');
            $('button[id="savePostBtn"]').text('Save Post');
            $('#postModal').modal('show');
        }

        function editPost(data) {  
            if (!currentId || currentId !== data.id) {
                // Update current post data only if it's different from the existing one
                currentId = data.id;
                
                $('#post_thumbnail').val('');  
                $('#post_thumbnail_id').val(data.thumbnail_id);         
                $('#post_id').val(data.id);
                $('#post_title').val(data.title); 
                $('#post_category').val(data.category_id ?? 0);
                $('#post_description').val(data.thumbnail_description);
                $('#post_content').val(data.content);

                if (data.thumbnail_url) {
                    $('#thumbnail_preview').attr('src', '<?= SITE_URL ?>' + data.thumbnail_url);
                    $('#thumbnail_preview_container').removeClass('d-none');
                } else {
                    $('#thumbnail_preview_container').addClass('d-none');
                    $('#thumbnail_preview').attr('src', '');
                }
            }
            
            currentId = currentId ? data.id : currentId;
                          
            $('#postModal .modal-title').text('Edit Post');
            $('#postForm').attr('action', '<?= SITE_URL ?>/admin/post/update');
            
            $('#postModal').modal('show');
        }

        function removeThumbnail() {
            $('#post_thumbnail').val('');  
            $('#post_thumbnail_id').val(0);         
            $('#thumbnail_preview_container').addClass('d-none');
            $('#thumbnail_preview').attr('src', '');
        }
    </script>
</body>

</html>
