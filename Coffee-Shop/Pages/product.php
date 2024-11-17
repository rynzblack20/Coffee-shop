<?php
// models/Product.php
class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $category_id;
    public $name;
    public $price;
    public $description;
    public $image;
    public $stock;
    public $is_available;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all products
    public function getAll() {
        $query = "SELECT c.name as category_name, p.* 
                 FROM " . $this->table_name . " p
                 LEFT JOIN categories c ON p.category_id = c.id
                 WHERE p.is_available = 1
                 ORDER BY p.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Get product by ID
    public function getById() {
        $query = "SELECT c.name as category_name, p.*
                 FROM " . $this->table_name . " p
                 LEFT JOIN categories c ON p.category_id = c.id
                 WHERE p.id = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->image = $row['image'];
        $this->stock = $row['stock'];
        $this->is_available = $row['is_available'];

        return $row;
    }

    // Create product
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    name=:name,
                    price=:price,
                    description=:description,
                    category_id=:category_id,
                    image=:image,
                    stock=:stock,
                    is_available=:is_available";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->stock = htmlspecialchars(strip_tags($this->stock));
        $this->is_available = htmlspecialchars(strip_tags($this->is_available));

        // Bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":is_available", $this->is_available);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}