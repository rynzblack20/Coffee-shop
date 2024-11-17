<?php
// pages/home.php
?>
<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="container text-center">
        <h1 class="display-4">Selamat Datang di Coffee House</h1>
        <p class="lead">Nikmati secangkir kopi terbaik dari biji pilihan</p>
        <a href="?page=menu" class="btn btn-primary btn-lg">Lihat Menu</a>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Menu Favorit</h2>
        <div class="row">
            <?php
            $featuredItems = array_slice(getMenuItems($pdo), 0, 4);
            foreach ($featuredItems as $item): 
            ?>
            <div class="col-md-3 mb-4">
                <div class="card menu-item">
                    <img src="<?php echo $item['image']; ?>" class="card-img-top product-img" alt="<?php echo $item['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                        <p class="card-text"><?php echo $item['description']; ?></p>
                        <p class="price">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></p>
                        <button class="btn btn-primary add-to-cart" 
                                data-id="<?php echo $item['id']; ?>"
                                data-name="<?php echo $item['name']; ?>"
                                data-price="<?php echo $item['price']; ?>">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>