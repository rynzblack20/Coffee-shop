<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Coffee House</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'home' ? 'active' : ''; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'menu' ? 'active' : ''; ?>" href="index.php?page=menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'about' ? 'active' : ''; ?>" href="index.php?page=about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'contact' ? 'active' : ''; ?>" href="index.php?page=contact">Contact</a>
                </li>
            </ul>
            <div class="cart-icon">
                <a href="cart.php" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>