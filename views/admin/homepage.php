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
					<!-- content controller start -->
					<div class="col-12 mt-5">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Content Controller</h4>
								<form id="contentVisibilityForm" method="post" action="<?= SITE_URL ?>/admin/homepage">
									<div class="data-tables">
										<table id="dataTableContent" class="text-center">
											<thead class="bg-light text-capitalize">
												<tr>
													<th>Id</th>
													<th>Site</th>
													<th>Element</th>
													<th>Visible</th>
												</tr>
											</thead>
											<tbody>
												<?php if (!empty($contentControllers) && is_array($contentControllers)): ?>
													<?php foreach ($contentControllers as $content): ?>
														<tr>
															<td><?= htmlspecialchars($content['id'] ?? '') ?></td>
															<td><?= htmlspecialchars($content['siteName'] ?? '') ?></td>
															<td><?= htmlspecialchars($content['elementName'] ?? '') ?></td>
															<td>
																<input
																	type="checkbox"
																	name="visibility[<?= (int) ($content['id'] ?? 0) ?>]"
																	value="1"
																	<?= !empty($content['isVisible']) ? 'checked' : '' ?>
																>
															</td>
														</tr>
													<?php endforeach; ?>
												<?php else: ?>
													<tr>
														<td colspan="4">No content controllers found.</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
									<div class="mt-3">
										<button type="submit" class="btn btn-primary">Update Visibility</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- content controller end -->

					<!-- advertisements table start -->
					<div class="col-12 mt-5">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Advertisements</h4>
								<div class="mb-4">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAdModal">Create Advertisement</button>
								</div>
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
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($advertisements) && is_array($advertisements)): ?>
												<?php foreach ($advertisements as $ad): ?>
													<tr>
														<td><?= htmlspecialchars($ad['id'] ?? '') ?></td>
														<td>
															<?php if (!empty($ad['leftImage'])): ?>
																<?php
																	$leftImage = $ad['leftImage'] ?? '';
																	if ($leftImage !== '' && $leftImage[0] !== '/') {
																		$leftImage = '/' . $leftImage;
																	}
																?>
																<img
																	src="<?= htmlspecialchars((SITE_URL ?? '') . $leftImage) ?>"
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
														<td>
															<button
																type="button"
																class="btn btn-outline-primary btn-sm btn-edit-ad"
																data-id="<?= (int) ($ad['id'] ?? 0) ?>"
																data-thumbnail="<?= htmlspecialchars($ad['thumbnail'] ?? '', ENT_QUOTES) ?>"
																data-title="<?= htmlspecialchars($ad['title'] ?? '', ENT_QUOTES) ?>"
																data-content="<?= htmlspecialchars($ad['content'] ?? '', ENT_QUOTES) ?>"
																data-link="<?= htmlspecialchars($ad['link'] ?? '', ENT_QUOTES) ?>"
																data-text-color="<?= htmlspecialchars($ad['textColor'] ?? '', ENT_QUOTES) ?>"
																data-background-color="<?= htmlspecialchars($ad['backgroundColor'] ?? '', ENT_QUOTES) ?>"
																data-bs-toggle="modal"
																data-bs-target="#editAdModal"
															>Edit</button>
															<button type="button" class="btn btn-danger btn-sm btn-delete-ad" data-id="<?= (int) ($ad['id'] ?? 0) ?>">Delete</button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="9">No advertisements found.</td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- advertisements table end -->

					<!-- main product table start -->
					<div class="col-12 mt-5">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title">Main Product</h4>
								<div class="data-tables">
									<table id="dataTableMainProduct" class="text-center">
										<thead class="bg-light text-capitalize">
											<tr>
												<th>Id</th>
												<th>Image</th>
												<th>Title</th>
												<th>Description</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($mainProducts) && is_array($mainProducts)): ?>
												<?php foreach ($mainProducts as $mainProduct): ?>
													<tr>
														<td><?= htmlspecialchars($mainProduct['id'] ?? '') ?></td>
														<td>
															<?php if (!empty($mainProduct['image'])): ?>
																<?php
																	$imagePath = $mainProduct['image'] ?? '';
																	if ($imagePath !== '' && $imagePath[0] !== '/') {
																		$imagePath = '/' . $imagePath;
																	}
																?>
																<img src="<?= htmlspecialchars((SITE_URL ?? '') . $imagePath) ?>" alt="main product" style="height: 40px;">
															<?php endif; ?>
														</td>
														<td><?= htmlspecialchars($mainProduct['title'] ?? '') ?></td>
														<td><?= htmlspecialchars($mainProduct['description'] ?? '') ?></td>
														<td>
															<button
																type="button"
																class="btn btn-outline-primary btn-sm btn-edit-mainproduct"
																data-id="<?= (int) ($mainProduct['id'] ?? 0) ?>"
																data-title="<?= htmlspecialchars($mainProduct['title'] ?? '', ENT_QUOTES) ?>"
																data-description="<?= htmlspecialchars($mainProduct['description'] ?? '', ENT_QUOTES) ?>"
																data-bs-toggle="modal"
																data-bs-target="#editMainProductModal"
															>Edit</button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="5">No main products found.</td>
												</tr>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- main product table end -->

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
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($scrollTexts) && is_array($scrollTexts)): ?>
												<?php foreach ($scrollTexts as $scroll): ?>
													<tr>
														<td><?= htmlspecialchars($scroll['id'] ?? '') ?></td>
														<td><?= htmlspecialchars($scroll['content'] ?? '') ?></td>
														<td>
															<button
																type="button"
																class="btn btn-outline-primary btn-sm btn-edit-scroll"
																data-id="<?= (int) ($scroll['id'] ?? 0) ?>"
																data-content="<?= htmlspecialchars($scroll['content'] ?? '', ENT_QUOTES) ?>"
																data-bs-toggle="modal"
																data-bs-target="#editScrollModal"
															>Edit</button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="3">No scroll text found.</td>
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
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($certifications) && is_array($certifications)): ?>
												<?php foreach ($certifications as $cert): ?>
													<tr>
														<td><?= htmlspecialchars($cert['id'] ?? '') ?></td>
														<td>
															<?php if (!empty($cert['logo'])): ?>
																<?php
																	$logoPath = $cert['logo'] ?? '';
																	if ($logoPath !== '' && $logoPath[0] !== '/') {
																		$logoPath = '/' . $logoPath;
																	}
																?>
																<img
																	src="<?= htmlspecialchars((SITE_URL ?? '') . $logoPath) ?>"
																	alt="logo"
																	style="height: 40px;"
																>
															<?php endif; ?>
														</td>
														<td><?= htmlspecialchars($cert['title'] ?? '') ?></td>
														<td><?= htmlspecialchars($cert['subtitle'] ?? '') ?></td>
														<td><?= htmlspecialchars($cert['content'] ?? '') ?></td>
														<td>
															<button
																type="button"
																class="btn btn-outline-primary btn-sm btn-edit-cert"
																data-id="<?= (int) ($cert['id'] ?? 0) ?>"
																data-title="<?= htmlspecialchars($cert['title'] ?? '', ENT_QUOTES) ?>"
																data-subtitle="<?= htmlspecialchars($cert['subtitle'] ?? '', ENT_QUOTES) ?>"
																data-content="<?= htmlspecialchars($cert['content'] ?? '', ENT_QUOTES) ?>"
																data-bs-toggle="modal"
																data-bs-target="#editCertModal"
															>Edit</button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
														<td colspan="6">No certifications found.</td>
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
		<!-- modal area start -->
		<div class="modal fade" id="createAdModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Advertisement</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="createAdForm" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="createAdLeftImage" class="form-label">Left Image</label>
									<input type="file" class="form-control" id="createAdLeftImage" name="leftImage" accept="image/*" required>
								</div>
								<div class="col-md-6">
									<label for="createAdThumbnail" class="form-label">Thumbnail</label>
									<input type="text" class="form-control" id="createAdThumbnail" name="thumbnail" placeholder="VD: MO BAN" required>
								</div>
								<div class="col-md-6">
									<label for="createAdTitle" class="form-label">Title</label>
									<input type="text" class="form-control" id="createAdTitle" name="title" required>
								</div>
								<div class="col-md-6">
									<label for="createAdLink" class="form-label">Link</label>
									<input type="url" class="form-control" id="createAdLink" name="link" placeholder="https://">
								</div>
								<div class="col-12">
									<label for="createAdContent" class="form-label">Content</label>
									<textarea class="form-control" id="createAdContent" name="content" rows="3" required></textarea>
								</div>
								<div class="col-md-6">
									<label for="createAdTextColor" class="form-label">Text Color</label>
									<input type="text" class="form-control" id="createAdTextColor" name="textColor" placeholder="#1f1c17">
								</div>
								<div class="col-md-6">
									<label for="createAdBackgroundColor" class="form-label">Background Color</label>
									<input type="text" class="form-control" id="createAdBackgroundColor" name="backgroundColor" placeholder="#fff6cd">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editAdModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Advertisement</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="editAdForm" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="editAdId" name="adId" value="">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="editAdLeftImage" class="form-label">Left Image</label>
									<input type="file" class="form-control" id="editAdLeftImage" name="leftImage" accept="image/*">
								</div>
								<div class="col-md-6">
									<label for="editAdThumbnail" class="form-label">Thumbnail</label>
									<input type="text" class="form-control" id="editAdThumbnail" name="thumbnail" required>
								</div>
								<div class="col-md-6">
									<label for="editAdTitle" class="form-label">Title</label>
									<input type="text" class="form-control" id="editAdTitle" name="title" required>
								</div>
								<div class="col-md-6">
									<label for="editAdLink" class="form-label">Link</label>
									<input type="url" class="form-control" id="editAdLink" name="link" placeholder="https://">
								</div>
								<div class="col-12">
									<label for="editAdContent" class="form-label">Content</label>
									<textarea class="form-control" id="editAdContent" name="content" rows="3" required></textarea>
								</div>
								<div class="col-md-6">
									<label for="editAdTextColor" class="form-label">Text Color</label>
									<input type="text" class="form-control" id="editAdTextColor" name="textColor" placeholder="#1f1c17">
								</div>
								<div class="col-md-6">
									<label for="editAdBackgroundColor" class="form-label">Background Color</label>
									<input type="text" class="form-control" id="editAdBackgroundColor" name="backgroundColor" placeholder="#fff6cd">
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
		<div class="modal fade" id="editScrollModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Scroll Text</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="editScrollForm">
						<div class="modal-body">
							<input type="hidden" id="editScrollId" name="scrollId" value="">
							<div class="mb-3">
								<label for="editScrollContent" class="form-label">Content</label>
								<input type="text" class="form-control" id="editScrollContent" name="content" required>
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
		<div class="modal fade" id="editCertModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Certification</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="editCertForm" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="editCertId" name="certId" value="">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="editCertLogo" class="form-label">Logo</label>
									<input type="file" class="form-control" id="editCertLogo" name="logo" accept="image/*">
								</div>
								<div class="col-md-6">
									<label for="editCertTitle" class="form-label">Title</label>
									<input type="text" class="form-control" id="editCertTitle" name="title" required>
								</div>
								<div class="col-md-6">
									<label for="editCertSubtitle" class="form-label">Subtitle</label>
									<input type="text" class="form-control" id="editCertSubtitle" name="subtitle" required>
								</div>
								<div class="col-12">
									<label for="editCertContent" class="form-label">Content</label>
									<textarea class="form-control" id="editCertContent" name="content" rows="3" required></textarea>
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
		<div class="modal fade" id="editMainProductModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Main Product</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="editMainProductForm" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="editMainProductId" name="mainProductId" value="">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="editMainProductImage" class="form-label">Image</label>
									<input type="file" class="form-control" id="editMainProductImage" name="image" accept="image/*">
								</div>
								<div class="col-md-6">
									<label for="editMainProductTitle" class="form-label">Title</label>
									<input type="text" class="form-control" id="editMainProductTitle" name="title" required>
								</div>
								<div class="col-12">
									<label for="editMainProductDescription" class="form-label">Description</label>
									<textarea class="form-control" id="editMainProductDescription" name="description" rows="3" required></textarea>
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
			var contentTable = document.getElementById('dataTableContent');
			var adsTable = document.getElementById('dataTableAds');
			var mainProductTable = document.getElementById('dataTableMainProduct');
			var scrollTable = document.getElementById('dataTableScroll');
			var certTable = document.getElementById('dataTableCert');

			if (contentTable) new simpleDatatables.DataTable(contentTable, { perPage: 10 });
			if (adsTable) new simpleDatatables.DataTable(adsTable, { perPage: 10 });
			if (mainProductTable) new simpleDatatables.DataTable(mainProductTable, { perPage: 10 });
			if (scrollTable) new simpleDatatables.DataTable(scrollTable, { perPage: 10 });
			if (certTable) new simpleDatatables.DataTable(certTable, { perPage: 10 });
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

			const postEmpty = async function(url) {
				const response = await fetch(url, { method: 'POST' });
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

			const contentForm = document.getElementById('contentVisibilityForm');
			if (contentForm) {
				contentForm.addEventListener('submit', async function(event) {
					event.preventDefault();
					try {
						await postForm(siteUrl + '/admin/homepage', contentForm);
						alert('Visibility updated successfully.');
					} catch (error) {
						alert(error.message || 'Failed to update visibility.');
					}
				});
			}

			const createAdForm = document.getElementById('createAdForm');
			if (createAdForm) {
				createAdForm.addEventListener('submit', async function(event) {
					event.preventDefault();
					try {
						await postForm(siteUrl + '/admin/advertisement', createAdForm);
						location.reload();
					} catch (error) {
						alert(error.message || 'Failed to create advertisement.');
					}
				});
			}

			const editAdForm = document.getElementById('editAdForm');
			let currentAdId = null;
			document.querySelectorAll('.btn-edit-ad').forEach(function(button) {
				button.addEventListener('click', function() {
					currentAdId = button.dataset.id || null;
					document.getElementById('editAdId').value = currentAdId || '';
					document.getElementById('editAdThumbnail').value = button.dataset.thumbnail || '';
					document.getElementById('editAdTitle').value = button.dataset.title || '';
					document.getElementById('editAdContent').value = button.dataset.content || '';
					document.getElementById('editAdLink').value = button.dataset.link || '';
					document.getElementById('editAdTextColor').value = button.dataset.textColor || '';
					document.getElementById('editAdBackgroundColor').value = button.dataset.backgroundColor || '';
				});
			});

			if (editAdForm) {
				editAdForm.addEventListener('submit', async function(event) {
					event.preventDefault();
					if (!currentAdId) {
						alert('Missing advertisement id.');
						return;
					}
					try {
						await postForm(siteUrl + '/admin/advertisement-update/' + currentAdId, editAdForm);
						location.reload();
					} catch (error) {
						alert(error.message || 'Failed to update advertisement.');
					}
				});
			}

			document.querySelectorAll('.btn-delete-ad').forEach(function(button) {
				button.addEventListener('click', async function() {
					const adId = button.dataset.id;
					if (!adId) return;
					if (!confirm('Delete this advertisement?')) return;
					try {
						await postEmpty(siteUrl + '/admin/advertisement-delete/' + adId);
						location.reload();
					} catch (error) {
						alert(error.message || 'Failed to delete advertisement.');
					}
				});
			});

			const editScrollForm = document.getElementById('editScrollForm');
			let currentScrollId = null;
			document.querySelectorAll('.btn-edit-scroll').forEach(function(button) {
				button.addEventListener('click', function() {
					currentScrollId = button.dataset.id || null;
					document.getElementById('editScrollId').value = currentScrollId || '';
					document.getElementById('editScrollContent').value = button.dataset.content || '';
				});
			});
			if (editScrollForm) {
				editScrollForm.addEventListener('submit', async function(event) {
					event.preventDefault();
					if (!currentScrollId) {
						alert('Missing scroll text id.');
						return;
					}
					try {
						await postForm(siteUrl + '/admin/scrolltext-update/' + currentScrollId, editScrollForm);
						location.reload();
					} catch (error) {
						alert(error.message || 'Failed to update scroll text.');
					}
				});
			}

			const editCertForm = document.getElementById('editCertForm');
			let currentCertId = null;
			document.querySelectorAll('.btn-edit-cert').forEach(function(button) {
				button.addEventListener('click', function() {
					currentCertId = button.dataset.id || null;
					document.getElementById('editCertId').value = currentCertId || '';
					document.getElementById('editCertTitle').value = button.dataset.title || '';
					document.getElementById('editCertSubtitle').value = button.dataset.subtitle || '';
					document.getElementById('editCertContent').value = button.dataset.content || '';
				});
			});
			if (editCertForm) {
				editCertForm.addEventListener('submit', async function(event) {
					event.preventDefault();
					if (!currentCertId) {
						alert('Missing certification id.');
						return;
					}
					try {
						await postForm(siteUrl + '/admin/certification-update/' + currentCertId, editCertForm);
						location.reload();
					} catch (error) {
						alert(error.message || 'Failed to update certification.');
					}
				});
			}


			const editMainProductForm = document.getElementById('editMainProductForm');
			let currentMainProductId = null;
			document.querySelectorAll('.btn-edit-mainproduct').forEach(function(button) {
				button.addEventListener('click', function() {
					currentMainProductId = button.dataset.id || null;
					document.getElementById('editMainProductId').value = currentMainProductId || '';
					document.getElementById('editMainProductTitle').value = button.dataset.title || '';
					document.getElementById('editMainProductDescription').value = button.dataset.description || '';
				});
			});

			if (editMainProductForm) {
				editMainProductForm.addEventListener('submit', async function(event) {
					event.preventDefault();
					if (!currentMainProductId) {
						alert('Missing main product id.');
						return;
					}
					try {
						await postForm(siteUrl + '/admin/mainproduct-update/' + currentMainProductId, editMainProductForm);
						location.reload();
					} catch (error) {
						alert(error.message || 'Failed to update main product.');
					}
				});
			}

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
