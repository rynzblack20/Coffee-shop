<?php
require_once 'config/database.php';

try {
    $pdo = new PDO(
        "mysql:host=" . 'localhost' . ";dbname=" . 'coffee-shop',
        'admin',
        'AatauD123',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to get menu items
function getMenuItems($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM menu_items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Log the error message for debugging (optional)
        error_log($e->getMessage());

        // Return default items if an error occurs
        return getDefaultMenuItems();
    }
}

// Function to return default menu items
function getDefaultMenuItems() {
    return [
        [
            'id' => 1,
            'name' => 'Espresso',
            'price' => 25000,
            'description' => 'Kopi hitam murni dengan cita rasa kuat',
            'image' => '/assets/images/placeholder.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Cappuccino',
            'price' => 35000,
            'description' => 'Espresso dengan foam susu yang lembut',
            'image' => '/assets/images/placeholder.jpg'
        ],
        // Tambahkan lebih banyak item default jika diperlukan...
    ];
}

// Mengambil menu items
$menuItems = getMenuItems($pdo);

// Anda bisa melakukan sesuatu dengan $menuItems di sini