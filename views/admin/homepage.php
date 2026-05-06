<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SRTDash Admin - Homepage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Admin homepage content management">
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
									<li><a href="<?= SITE_URL ?>/admin/information">Infomation</a></li>
									<li class="active"><a href="<?= SITE_URL ?>/admin/homepage">Homepage</a></li>
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
							<h1 class="page-title float-start">Homepage Content</h1>
							<ul class="breadcrumbs float-start">
								<li><a href="<?= SITE_URL ?>/admin/dashboard">Home</a></li>
								<li><span>Homepage</span></li>
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
					<!-- advertisements table start -->
					<div class="col-12 mt-5">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Advertisements</h4>
								<div class="data-tables">
									<table id="dataTableAds" class="text-center">
										<thead class="bg-light text-capitalize">
											<tr>
												<th>Id</th>
												<th>Left Image</th>
												<th>Thumbnail</th>
												<th>Title</th>
												<th>Content</th>
												<th>Link</th>
												<th>Text Color</th>
												<th>Background Color</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($advertisements) && is_array($advertisements)): ?>
												<?php foreach ($advertisements as $ad): ?>
													<tr>
														<td><?= htmlspecialchars($ad['id'] ?? '') ?></td>
														<td>
															<?php if (!empty($ad['leftImage'])): ?>
																<img
																	src="<?= htmlspecialchars((SITE_URL ?? '') . $ad['leftImage']) ?>"
																	alt="left image"
																	style="height: 40px;"
																>
															<?php endif; ?>
														</td>
														<td><?= htmlspecialchars($ad['thumbnail'] ?? '') ?></td>
														<td><?= htmlspecialchars($ad['title'] ?? '') ?></td>
														<td><?= htmlspecialchars($ad['content'] ?? '') ?></td>
														<td>
															<?php if (!empty($ad['link'])): ?>
																<a href="<?= htmlspecialchars($ad['link']) ?>" target="_blank" rel="noopener noreferrer">
																	<?= htmlspecialchars($ad['link']) ?>
																</a>
															<?php endif; ?>
														</td>
														<td><?= htmlspecialchars($ad['textColor'] ?? '') ?></td>
														<td><?= htmlspecialchars($ad['backgroundColor'] ?? '') ?></td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="8">No advertisements found.</td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- advertisements table end -->

					<!-- scroll text table start -->
					<div class="col-12 mt-5">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Scroll Text</h4>
								<div class="data-tables">
									<table id="dataTableScroll" class="text-center">
										<thead class="bg-light text-capitalize">
											<tr>
												<th>Id</th>
												<th>Content</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($scrollTexts) && is_array($scrollTexts)): ?>
												<?php foreach ($scrollTexts as $scroll): ?>
													<tr>
														<td><?= htmlspecialchars($scroll['id'] ?? '') ?></td>
														<td><?= htmlspecialchars($scroll['content'] ?? '') ?></td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="2">No scroll text found.</td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- scroll text table end -->

					<!-- certifications table start -->
					<div class="col-12 mt-5">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Certifications</h4>
								<div class="data-tables">
									<table id="dataTableCert" class="text-center">
										<thead class="bg-light text-capitalize">
											<tr>
												<th>Id</th>
												<th>Logo</th>
												<th>Title</th>
												<th>Subtitle</th>
												<th>Content</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($certifications) && is_array($certifications)): ?>
												<?php foreach ($certifications as $cert): ?>
													<tr>
														<td><?= htmlspecialchars($cert['id'] ?? '') ?></td>
														<td>
															<?php if (!empty($cert['logo'])): ?>
																<img
																	src="<?= htmlspecialchars((SITE_URL ?? '') . $cert['logo']) ?>"
																	alt="logo"
																	style="height: 40px;"
																>
															<?php endif; ?>
														</td>
														<td><?= htmlspecialchars($cert['title'] ?? '') ?></td>
														<td><?= htmlspecialchars($cert['subtitle'] ?? '') ?></td>
														<td><?= htmlspecialchars($cert['content'] ?? '') ?></td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="5">No certifications found.</td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- certifications table end -->
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
			var adsTable = document.getElementById('dataTableAds');
			var scrollTable = document.getElementById('dataTableScroll');
			var certTable = document.getElementById('dataTableCert');

			if (adsTable) new simpleDatatables.DataTable(adsTable, { perPage: 10 });
			if (scrollTable) new simpleDatatables.DataTable(scrollTable, { perPage: 10 });
			if (certTable) new simpleDatatables.DataTable(certTable, { perPage: 10 });
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
</body>

</html>
