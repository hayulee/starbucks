<?php
namespace App\Models;

class Product {
    // protected string $table = 'products';

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM products ORDER BY created_at DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getByCategory($category) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE category = ? ORDER BY id DESC");
        $stmt->execute([$category]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // public function create($name, $price, $description, $image) {
    //     $stmt = $this->pdo->prepare("INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)");
    //     return $stmt->execute([$name, $price, $description, $image]);
    // }

    // public function update($id, $name, $price, $description, $image) {
    //     $stmt = $this->pdo->prepare("UPDATE products SET name=?, price=?, description=?, image=? WHERE id=?");
    //     return $stmt->execute([$name, $price, $description, $image, $id]);
    // }

    // public function delete($id) {
    //     $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=?");
    //     return $stmt->execute([$id]);
    // }
}