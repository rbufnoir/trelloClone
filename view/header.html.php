<header id="header" class="header fixed-top d-flex align-items-center">
	<div class="d-flex align-items-center justify-content-between">
		<a href="<?= URL ?>" class="logo d-flex align-items-center">
			<img src="assets/img/icon.png" alt="">
			<span class="d-none d-lg-block">Treffo</span>
		</a>
		<i class="bi bi-list toggle-sidebar-btn"></i>
	</div>

	<nav class="header-nav ms-auto">
		<div class="d-flex align-items-center">


			<div class="nav-item dropdown pe-3">
				<?php
				if (!empty($_SESSION)) :
				?>

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['username'] ?></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6><?= $_SESSION['username'] ?></h6>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= URL ?>profile">
								<i class="bi bi-person"></i>
								<span>My Profile</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<!-- <li>
						<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
							<i class="bi bi-gear"></i>
							<span>Account Settings</span>
						</a>
					</li> -->
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
								<i class="bi bi-question-circle"></i>
								<span>Need Help?</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= URL ?>logout">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>
					</ul>
				<?php else : ?>
					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="assets/img/defaultUserPicture.png" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= URL ?>login">
								<i class="bi bi-person"></i>
								<span>Login</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= URL ?>register">
								<i class="bi bi-person"></i>
								<span>Register</span>
							</a>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</nav>
</header>