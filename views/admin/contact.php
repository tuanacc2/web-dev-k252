<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SRTDash Admin - Contact</title>
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
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Simple-DataTables css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/simple-datatables@10/dist/style.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/typography.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/default-css.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/styles.css">
    <link rel="stylesheet" href="<?= SITE_URL ?? '' ?>/assets/admin/css/responsive.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


    
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
                                <ul>
                                    <li><a href="<?= SITE_URL ?>/admin/information">Infomation</a></li>
                                    <li><a href="<?= SITE_URL ?>/admin/homepage">Homepage</a></li>
                                    <li><a href="<?= SITE_URL ?>/admin/about">About us</a></li>
                                    <li><a href="<?= SITE_URL ?>/admin/faq">FAQ</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= SITE_URL ?>/admin/user">
                                    <i class="fa-solid fa-user"></i>
                                    <span>User Management</span>
                                </a>
                            </li>
                            <li  class="active">
                                <a href="javascript:void(0)">
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
                            <h1 class="page-title float-start">Contact Requests</h1>
                            <ul class="breadcrumbs float-start">
                                <li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
                                <li><span>Contact Requests</span></li>
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
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Created Date</th>
                                                <th>Answered</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($contacts) && is_array($contacts)): ?>
                                                <?php foreach ($contacts as $c): ?>
                                                    <tr 
                                                    id="element"
                                                    class="<?= ((isset($c['hasReplied']) && $c['hasReplied'] == 1) || (isset($c['hasSeen']) && $c['hasSeen'] == 1)) ? 'text-muted' : 'fw-bold' ?> hover:bg-gray-100 cursor-pointer transition"
                                                    data-id="<?= htmlspecialchars($c['id'] ?? '') ?>"
            
                                                    >
                                                        <td><?= htmlspecialchars($c['id'] ?? '') ?></td>
                                                        <td><?= htmlspecialchars($c['name'] ?? '') ?></td>
                                                        <td><?= htmlspecialchars($c['email'] ?? '') ?></td>
                                                        <td><?= htmlspecialchars($c['phoneNumber'] ?? $c['phone'] ?? '') ?></td>
                                                        <td><?= htmlspecialchars($c['created_at'] ?? '') ?></td>
                                                        <td>
                                                            <?php 
                                                                if ($c['hasReplied'] == 1) {
                                                                    echo '<span class="badge bg-success">Yes</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-warning">No</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No contact requests found.</td>
                                                </tr>
                                            <?php endif; ?>
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
    <!-- Large modal start -->
    <div class="col-lg-6 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Large modal</h4>
                <p>Modals have two optional sizes, available via modifier classes to be placed on a <code>.modal-dialog</code> These sizes kick in at certain breakpoints to avoid horizontal scrollbars on narrower viewports.</p>
                <!-- Large modal -->
                <button type="button" class="btn btn-primary btn-flat btn-lg" data-bs-toggle="modal" data-bs-target="#contactModal">Large modal
                </button>
                <div class="modal fade" id="contactModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  fs-3">Contact Details</h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <!-- Left info -->
                                        <div class="col-md-6">
                                            <div class="p-3 border rounded bg-light">
                                                <h6 class="mb-3 text-primary">User Info</h6>
                                                <p class="mb-2">
                                                    <strong>Name:</strong><br>
                                                    <span id="m-name" class="text-dark"></span>
                                                </p>
                                                <p class="mb-2">
                                                    <strong>Email:</strong><br>
                                                    <span id="m-email" class="text-dark"></span>
                                                </p>
                                                <p class="mb-0">
                                                    <strong>Phone:</strong><br>
                                                    <span id="m-phone" class="text-dark"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Right info -->
                                        <div class="col-md-6">
                                            <div class="p-3 border rounded bg-light">
                                                <h6 class="mb-3 text-primary">Meta Info</h6>
                                                <p class="mb-2">
                                                    <strong>Created At:</strong><br>
                                                    <span id="m-created" class="text-muted"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Full width question -->
                                        <div class="col-12">
                                            <div class="p-3 border rounded">
                                                <h6 class="mb-2 text-primary">Question</h6>
                                                <p id="m-question" class="mb-0 text-dark"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="markAnsweredBtn">Mark as Answered</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal modal end -->




    <!-- bootstrap 5 js -->
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/swiper-bundle.min.js"></script>
    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/metismenujs.min.js"></script>

   
  
    <!-- Start datatable js -->
    <!-- Simple-DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@10/dist/umd/simple-datatables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ['dataTable', 'dataTable2', 'dataTable3'].forEach(function(id) {
                var el = document.getElementById(id);
                if (el) new simpleDatatables.DataTable(el, { perPage: 10 });
            });
        });
    </script>

    <script src="<?= SITE_URL ?? '' ?>/assets/admin/js/scripts.js"></script>
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());
        gtag("config", "G-XXXXXXXXXX");
    </script>
    <!--Contact Details Script-->
    <script>
        let currentContactId = null;

        document.addEventListener("click", function(e) {
            const row = e.target.closest("tr[data-id]");
            if (!row) return;
            const id = row.dataset.id;
            currentContactId = id;

            fetch(`<?= SITE_URL ?>/admin/contact-detail?id=${id}`)
                .then(response => {
                    if (!response.ok) throw new Error("Network response was not ok");
                    return response.json();
                })
                .then(data => {
                     // set data vào modal
                    document.getElementById("m-name").textContent = data.name || "";
                    document.getElementById("m-email").textContent = data.email || "";
                    document.getElementById("m-phone").textContent = data.phoneNumber || data.phone || "";
                    document.getElementById("m-question").textContent = data.question || "";
                    document.getElementById("m-created").textContent = data.created_at || "";

                    const markAnsweredBtn = document.getElementById("markAnsweredBtn");
                    const isAnswered = Number(data.hasAnswer || data.hasReplied || 0) === 1;
                    markAnsweredBtn.disabled = isAnswered;
                    markAnsweredBtn.textContent = isAnswered ? "Answered" : "Mark as Answered";

                    // mở modal
                    const modal = new bootstrap.Modal(document.getElementById("contactModal"));
                    modal.show();

                    // mark đã đọc
                    row.classList.remove("fw-bold");
                    row.classList.add("text-muted","fw-normal");
                })
                .catch(error => {
                    console.error("Error fetching contact details:", error);
                    alert("Failed to load contact details.");
                });
                                
        });

        document.getElementById("markAnsweredBtn")?.addEventListener("click", async function () {
            if (!currentContactId) return;

            try {
                const response = await fetch(
                    `<?= SITE_URL ?>/admin/contact-answer`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        body: new URLSearchParams({
                            id: currentContactId,
                        }),
                    }
                );

                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }

                const data = await response.json();

                alert(data.message || "Contact marked as answered successfully!");

                const markAnsweredBtn =
                    document.getElementById("markAnsweredBtn");

                markAnsweredBtn.disabled = true;
                markAnsweredBtn.textContent = "Answered";

                const row = document.querySelector(
                    `tr[data-id="${currentContactId}"]`
                );

                if (row) {
                    row.classList.remove("font-bold", "fw-bold");
                    row.classList.add("text-muted");

                    const statusCell = row.querySelector("td:last-child");

                    if (statusCell) {
                        statusCell.innerHTML =
                            '<span class="badge bg-success">Yes</span>';

                        statusCell.setAttribute("data-order", "1");
                    }
                }
            } catch (error) {
                console.error("Error marking contact as answered:", error);
                alert("Failed to mark contact as answered.");
            }
        });
    </script>
</body>

</html>
