<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\Product;

class ProductController extends BaseController {

    public function list() {
        $category = $_GET['category'] ?? '';
        $categoryList = ['B' => '음료', 'F' => '푸드', 'M' => '상품'];
        $categoryName = $categoryList[$category] ?? '전체';

        $productModel = new Product($this->pdo);

        if ($category) {
            $products = $productModel->getByCategory($category);
        } else {
            $products = $productModel->getAll();
        }

        // 뷰 호출
        $this->view('product/list', [
            'products' => $products,
            'category' => $category,
            'categoryName' => $categoryName
        ]);
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        $category = $_GET['category'];

        if (!$id) {
            header("Location: /product/list?category=$category");
            exit;
        }

        $productModel = new Product($this->pdo);
        $product = $productModel->findByID($id);

        if (!$product) {
            // 상품이 없으면 목록으로 리다이렉트
            header("Location: /product/list");
            exit;
        }

        $this->view('product/detail', ['product' => $product]);
    }

}