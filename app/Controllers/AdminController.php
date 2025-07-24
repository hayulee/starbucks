<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\Product;

class AdminController extends BaseController {
    public function list() {
        $productModel = new Product();
        $products = $productModel->getAll();
        $this->view('admin/product_list', ['products' => $products]);
    }

    public function createForm() {
        $this->view('admin/product_form');
    }

    public function create() {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $productModel = new Product();
        $productModel->create($name, $price, $description, $image);
        header("Location: /index.php?route=admin/product");
    }

    public function editForm() {
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->find($id);
        $this->view('admin/product_form', ['product' => $product]);
    }

    public function edit() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $productModel = new Product();
        $productModel->update($id, $name, $price, $description, $image);
        header("Location: /index.php?route=admin/product");
    }

    public function delete() {
        $id = $_GET['id'];
        $productModel = new Product();
        $productModel->delete($id);
        header("Location: /index.php?route=admin/product");
    }
}