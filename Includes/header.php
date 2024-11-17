<?php
// Get current page name
$current_page = basename($_SERVER['PHP_SELF']);
$page_title = "Coffee House";

// Set specific page titles based on the current page or GET parameter
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'menu':
            $page_title .= " - Our Menu";
            break;
        case 'about':
            $page_title .= " - About Us";
            break;
        case 'contact':
            $page_title .= " - Contact Us";
            break;
        default:
            $page_title .= " - Welcome";
    }
}

// Check if user is logged in (if you have authentication)
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Coffee House - Your perfect coffee destination">
    <meta name="keywords" content="coffee, cafe, coffee shop, drinks, food">
    <title><?php echo $page_title; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Optional: Add any page-specific CSS here -->
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link href="<?php echo $css; ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Announcement Bar (if any) -->
    <?php if (isset($show_announcement) && $show_announcement): ?>
    <div class="announcement-bar bg-primary text-white py-2 text-center">
        <div class="container">
            <p class="mb-0">
                Special Offer: Get 10% off on your first order! Use code: WELCOME10
                <button type="button" class="btn-close btn-close-white float-end" aria-label="Close"></button>
            </p>
        </div>
    </div>
    <?php endif; ?>

    <!-- Top Navigation Bar -->
    <div class="top-nav bg-light py-2">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side - Contact Info -->
                <div class="col-md-4 d-none d-md-block">
                    <div class="contact-info">
                        <span class="me-3">
                            <i class="fas fa-phone-alt text-primary"></i> 
                            <a href="tel:+1234567890" class="text-dark text-decoration-none">123-456-7890</a>
                        </span>
                        <span>
                            <i class="fas fa-envelope text-primary"></i>
                            <a href="mailto:info@coffeehouse.com" class="text-dark text-decoration-none">info@coffeehouse.com</a>
                        </span>
                    </div>
                </div>

                <!-- Center - Social Media Links -->
                <div class="col-md-4 text-center">
                    <div class="social-links">
                        <a href="#" class="text-dark me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-dark me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Right Side - User Account/Login -->
                <div class="col-md-4 text-end">
                    <?php if ($is_logged_in): ?>
                        <div class="dropdown">
                            <button class="btn btn-link text-dark text-decoration-none dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> My Account
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="orders.php">My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="text-dark text-decoration-none me-3">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        <a href="register.php" class="text-dark text-decoration-none">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.png" alt="Coffee House Logo" height="40">
                Coffee House
            </a>

            <!-- Mobile toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main navigation items -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'menu' ? 'active' : ''; ?>" href="index.php?page=menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'about' ? 'active' : ''; ?>" href="index.php?page=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'contact' ? 'active' : ''; ?>" href="index.php?page=contact">Contact</a>
                    </li>
                </ul>

                <!-- Shopping cart -->
                <div class="d-flex align-items-center">
                    <a href="cart.php" class="btn btn-outline-light position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb (optional) -->
    <?php if (isset($_GET['page']) && $_GET['page'] != 'home'): ?>
    <div class="bg-light py-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php 
                        echo ucfirst($_GET['page']); 
                        ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <?php endif; ?>

    <!-- Flash Messages -->
    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="container mt-3">
            <div class="alert alert-<?php echo $_SESSION['flash_type'] ?? 'info'; ?> alert-dismissible fade show" role="alert">
                <?php 
                echo $_SESSION['flash_message'];
                unset($_SESSION['flash_message']);
                unset($_SESSION['flash_type']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
</head>
<body>
<!-- Main content begins here -->
<main>