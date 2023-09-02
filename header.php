<?php
include('connection.php');

?>


<!doctype html>
<html lang="en">

<body data-layout="horizontal" data-topbar="dark" data-sidebar-size="md">

    <!-- Left Sidebar End -->
    <header id="page-topbar" class="ishorizontal-topbar">
        <div class="navbar-header">
            <div class="d-flex">

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div class="topnav">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle arrow-none" href="slider.php" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <span data-key="t-dashboards">Slider</span>
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="brand_logo.php" id="topnav-pages" role="button">
                                        <span data-key="t-apps">Brand Logo</span>
                                    </a>

                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="customer_review.php" id="topnav-uielement" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span data-key="t-bootstrap">Customer Review</span>
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="services.php" id="topnav-components" role="button">
                                        <span data-key="t-components">Services</span>
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="gallery.php" id="topnav-more" role="button">
                                        <span data-key="t-pages">Gallery</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-1">
                    <a class="dropdown-item" href="forgot_password.php"><i class='bx bx-shield-quarter font-size-18 align-middle me-1'></i><span class="align-middle">Change Password</span></a>
                    <a class="dropdown-item" href="logout.php"><i class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i><span class="align-middle">Logout</span></a>
                </div>
            </div>
        </div>


    </header>