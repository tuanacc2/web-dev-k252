<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SRTDash Admin - Dashboard</title>
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
    <!-- Simple-DataTables css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/simple-datatables@10/dist/style.min.css">
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
                    <a href="index.html"><picture><source srcset="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.avif" type="image/avif"><img src="<?= SITE_URL ?? '' ?>/assets/admin/images/icon/logo.png" alt="logo"></picture></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="javascript:void(0)">
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
                                    <li  class="active"><a href="<?= SITE_URL ?>/admin/information">Infomation</a></li>
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
                            <h1 class="page-title float-start">Company Information</h1>
                            <ul class="breadcrumbs float-start">
                                <li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
                                <li><span>Company Information</span></li>
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
                                                <th>Type</th>
                                                <th>Value</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($items) && is_array($items)): ?>
                                                <?php foreach ($items as $item): ?>
                                                    <?php
                                                        $type = $item['type'] ?? '';
                                                        $value = $item['value'] ?? '';
                                                    ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($item['id'] ?? '') ?></td>
                                                        <td><?= htmlspecialchars($item['name'] ?? '') ?></td>
                                                        <td><?= htmlspecialchars($type) ?></td>
                                                        <td>
                                                            <?php if ($type === 'image' && $value): ?>
                                                                <img
                                                                    src="<?= htmlspecialchars((SITE_URL ?? '') . $value) ?>"
                                                                    alt="<?= htmlspecialchars($item['name'] ?? 'image') ?>"
                                                                    style="max-height: 40px; max-width: 120px; width: auto; height: auto; object-fit: contain;"
                                                                >
                                                            <?php elseif ($type === 'link' && $value): ?>
                                                                <a href="<?= htmlspecialchars($value) ?>" target="_blank" rel="noopener noreferrer">
                                                                    <?= htmlspecialchars($value) ?>
                                                                </a>
                                                            <?php else: ?>
                                                                <?= htmlspecialchars($value) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <button
                                                                type="button"
                                                                class="btn btn-outline-primary btn-sm btn-edit-info"
                                                                data-id="<?= (int) ($item['id'] ?? 0) ?>"
                                                                data-name="<?= htmlspecialchars($item['name'] ?? '', ENT_QUOTES) ?>"
                                                                data-type="<?= htmlspecialchars($type, ENT_QUOTES) ?>"
                                                                data-value="<?= htmlspecialchars($value, ENT_QUOTES) ?>"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editInfoModal"
                                                            >Edit</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No information found.</td>
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
        <!-- modal area start -->
        <div class="modal fade" id="editInfoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editInfoForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" id="editInfoId" name="infoId" value="">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="editInfoName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editInfoName" name="name" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="editInfoType" class="form-label">Type</label>
                                    <input type="text" class="form-control" id="editInfoType" name="type" readonly>
                                </div>
                                <div class="col-12" id="editInfoValueGroup">
                                    <label for="editInfoValue" class="form-label">Value</label>
                                    <input type="text" class="form-control" id="editInfoValue" name="value">
                                </div>
                                <div class="col-12 d-none" id="editInfoImageGroup">
                                    <label for="editInfoImage" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="editInfoImage" name="image" accept="image/*">
                                    <input type="hidden" id="editInfoImageValue" name="value" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal area end -->
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

    <!-- Simple-DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@10/dist/umd/simple-datatables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var el = document.getElementById('dataTable');
            if (el) new simpleDatatables.DataTable(el, { perPage: 10 });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const siteUrl = "<?= SITE_URL ?>";

            const postForm = async function(url, form) {
                const response = await fetch(url, {
                    method: 'POST',
                    body: new FormData(form)
                });
                let data = null;
                try {
                    data = await response.json();
                } catch (error) {
                    data = null;
                }
                if (!response.ok) {
                    throw new Error((data && data.error) ? data.error : 'Request failed');
                }
                return data;
            };

            const valueGroup = document.getElementById('editInfoValueGroup');
            const imageGroup = document.getElementById('editInfoImageGroup');
            const valueInput = document.getElementById('editInfoValue');
            const imageValueInput = document.getElementById('editInfoImageValue');
            const typeInput = document.getElementById('editInfoType');
            if (valueInput) valueInput.disabled = false;
            if (imageValueInput) imageValueInput.disabled = true;

            document.querySelectorAll('.btn-edit-info').forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = button.dataset.id || '';
                    const name = button.dataset.name || '';
                    const type = button.dataset.type || '';
                    const value = button.dataset.value || '';

                    document.getElementById('editInfoId').value = id;
                    document.getElementById('editInfoName').value = name;
                    typeInput.value = type;

                    if (type === 'image') {
                        valueGroup.classList.add('d-none');
                        imageGroup.classList.remove('d-none');
                        valueInput.disabled = true;
                        imageValueInput.disabled = false;
                        imageValueInput.value = value;
                    } else {
                        imageGroup.classList.add('d-none');
                        valueGroup.classList.remove('d-none');
                        valueInput.disabled = false;
                        imageValueInput.disabled = true;
                        valueInput.type = type === 'link' ? 'url' : 'text';
                        valueInput.value = value;
                    }
                });
            });

            const editInfoForm = document.getElementById('editInfoForm');
            if (editInfoForm) {
                editInfoForm.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    const infoId = document.getElementById('editInfoId').value;
                    if (!infoId) {
                        alert('Missing information id.');
                        return;
                    }
                    try {
                        await postForm(siteUrl + '/admin/information-update/' + infoId, editInfoForm);
                        location.reload();
                    } catch (error) {
                        alert(error.message || 'Failed to update information.');
                    }
                });
            }
        });
    </script>

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
