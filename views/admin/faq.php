<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - FAQ Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Manage FAQ items">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= SITE_URL ?? "" ?>assets/admin/images/icon/logo.png">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/metismenujs.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/swiper-bundle.min.css">
    <!-- Simple-DataTables css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/simple-datatables@10/dist/style.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/typography.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/default-css.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/styles.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/responsive.css">
    <style>
        /* FAQ Manager Styles */
        #faq-table {
            width: 100%;
            table-layout: auto;
        }
        
        #faq-table thead th {
            padding: 12px 8px;
            font-weight: 600;
            white-space: nowrap;
        }
        
        #faq-table tbody td {
            padding: 10px 6px;
            vertical-align: middle;
        }
        
        #faq-table .col-id {
            width: 50px;
            text-align: center;
        }
        
        #faq-table .col-category {
            width: 150px;
            min-width: 150px;
        }
        
        #faq-table .col-question {
            width: 250px;
            min-width: 250px;
        }
        
        #faq-table .col-answer {
            min-width: 300px;
            width: 300px;
        }
        
        #faq-table input.form-control,
        #faq-table textarea.form-control {
            padding: 8px 10px;
            font-size: 13px;
            border-radius: 4px;
        }
        
        #faq-table textarea.form-control {
            min-height: 60px;
            resize: vertical;
        }
        
        #faq-table .btn-delete {
            white-space: nowrap;
        }
        
        .data-tables {
            overflow-x: auto;
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
                                    <li><a href="<?= SITE_URL ?>/admin/about">About us</a></li>
                                    <li class="active"><a href="<?= SITE_URL ?>/admin/faq">FAQ</a></li>
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
                            <h1 class="page-title float-start">FAQ Manager</h1>
                            <ul class="breadcrumbs float-start">
                                <li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
                                <li><span>FAQ</span></li>
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
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <button id="btn-add" class="btn btn-success">
                                        <i class="fa-solid fa-plus"></i> Add new FAQ
                                    </button>
                                    <button id="btn-save" class="btn btn-primary">
                                        <i class="fa-solid fa-save"></i> Save changes
                                    </button>
                                </div>
                                <div class="data-tables">
                                    <table id="faq-table" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Id</th>
                                                <th>Category</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($items as $it): ?>
                                                <tr data-id="<?= (int)($it['id'] ?? 0) ?>">
                                                    <td class="col-id"><?= (int)($it['id'] ?? 0) ?></td>
                                                    <td><input class="form-control form-control-sm col-category" value="<?= htmlspecialchars($it['category'] ?? '') ?>"></td>
                                                    <td><input class="form-control form-control-sm col-question" value="<?= htmlspecialchars($it['question'] ?? '') ?>"></td>
                                                    <td><textarea class="form-control form-control-sm col-answer" rows="2"><?= htmlspecialchars($it['answer'] ?? '') ?></textarea></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
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
                            <h4>Edit FAQ items</h4>
                            <span class="time"><i class="ti-time"></i>Now</span>
                        </div>
                        <p>Click "Add new FAQ" to add new items, edit existing items in the table, and click "Save changes" to persist all changes.</p>
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

    <!-- FAQ Manager Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('faq-table');
            const tbody = table.querySelector('tbody');
            const btnAdd = document.getElementById('btn-add');
            const btnSave = document.getElementById('btn-save');

            function setupDeleteButtons() {
                document.querySelectorAll('.btn-delete').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const tr = this.closest('tr');
                        if (tr) {
                            tr.remove();
                            // renumber ids
                            Array.from(tbody.querySelectorAll('tr')).forEach((r,i)=> {
                                const idCell = r.querySelector('.col-id');
                                if (idCell) idCell.innerText = i+1;
                            });
                        }
                    });
                });
            }

            btnAdd.addEventListener('click', function(e) {
                e.preventDefault();
                const nextId = tbody.querySelectorAll('tr').length + 1;
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="col-id">${nextId}</td>
                    <td><input class="form-control form-control-sm col-category" value=""></td>
                    <td><input class="form-control form-control-sm col-question" value=""></td>
                    <td><textarea class="form-control form-control-sm col-answer" rows="2"></textarea></td>
                    <td><button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button></td>
                `;
                tbody.appendChild(tr);
                setupDeleteButtons();
            });

            btnSave.addEventListener('click', async function(e) {
                e.preventDefault();
                const items = Array.from(tbody.querySelectorAll('tr')).map((tr, idx) => ({
                    id: Number(tr.querySelector('.col-id').innerText) || (idx+1),
                    category: tr.querySelector('.col-category').value.trim(),
                    question: tr.querySelector('.col-question').value.trim(),
                    answer: tr.querySelector('.col-answer').value.trim(),
                }));

                try {
                    const url = '<?= rtrim(SITE_URL, '/') ?>' + '/admin/faq';
                    const res = await fetch(url, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ faqs: items })
                    });
                    const data = await res.json();
                    if (data.status === 'success') {
                        alert('FAQ saved successfully!');
                        location.reload();
                    } else {
                        alert('Save failed: ' + (data.message || 'Unknown error'));
                    }
                } catch (err) {
                    alert('Error saving FAQ: ' + err.message);
                    console.error(err);
                }
            });

            // Initialize delete buttons on page load
            setupDeleteButtons();
        });
    </script>
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
