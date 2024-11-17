<?php
// includes/footer.php
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Coffee House</h5>
                    <p>Jalan Kopi No. 123<br>
                    Jakarta, Indonesia</p>
                </div>
                <div class="col-md-4">
                    <h5>Jam Operasional</h5>
                    <p>Senin - Jumat: 08:00 - 22:00<br>
                    Sabtu - Minggu: 10:00 - 23:00</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p>Phone: (021) 123-4567<br>
                    Email: info@coffeehouse.com</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <?php if(strpos($_SERVER['REQUEST_URI'], 'cart.php') !== false): ?>
    <script src="/assets/js/cart.js"></script>
    <?php endif; ?>
</body>
</html>