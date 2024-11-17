<?php
// index.php
require_once 'config/database.php';
$pageTitle = 'Coffee House - Home';
include 'includes/header.php';

// Load different pages based on request
$page = $_GET['page'] ?? 'home';
$allowedPages = ['home', 'menu', 'about', 'contact'];
$page = in_array($page, $allowedPages) ? $page : 'home';

include "pages/$page.php";

include 'includes/footer.php';
