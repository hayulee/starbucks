<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\Product;

class ProductController extends BaseController {

    public function register() {
        $pro_name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $response = [];

        if (!isset($_FILES['image'])) {
            $response['status'] = 'fail';
            $response['message'] = '파일이 전송되지 않았습니다.';
            echo json_encode($response);
            exit;
        }

        // 이미지 저장
        $file = $_FILES['image'];

        if ($file['error'] === UPLOAD_ERR_OK) {

            // 임시 저장된 파일 경로
            $tmp_name = $file['tmp_name'];

            // 원래 파일명
            $file_name = basename($file['name']);

            // 확장자 추출
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // 저장할 파일명 (중복방지)
            // $save_name = time() . '_' . $file_name;
            $save_name = time() . '_' . uniqid() . '.' . $ext;

            // 저장할 경로
            switch ($category) {
                case 'B':
                    $folder_name = 'beverage';
                    break;
                case 'F':
                    $folder_name = 'food';
                    break;
                case 'M':
                    $folder_name = 'merchandise';
                    break;
            }
            $upload_path = __DIR__ . "/../../public/uploads/{$folder_name}/";
            $final_path = $upload_path . $save_name;

            if (move_uploaded_file($tmp_name, $final_path)) {
                $response['file_upload'] = 'success';
            } else {
                $response['file_upload'] = 'fail';
                $response['message'] = '파일 이동 실패';
            }

        } else {
            $response['file_upload'] = 'fail';
            $response['message'] = "파일 업로드 에러: " . $file['error'];
        }

        $pro_info = [
            'pro_name' => $pro_name,
            'category' => $category,
            'price' => $price,
            'description' => $description,
            'file_name' => $file_name,
            'save_name' => $save_name,
        ];

        if($response['file_upload'] === 'success') {
            $productModel = new Product($this->pdo);
            $register = $productModel->registerProduct($pro_info);
        }

        if ($register) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'fail';
            $response['message'] = '상품 등록 실패';
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        exit;
    }

    public function list() {
        $category = $_GET['category'] ?? '';
        $categoryList = ['B' => '음료', 'F' => '푸드', 'M' => '상품'];
        $categoryName = $categoryList[$category] ?? '전체';

        $imgFolder = ['B' => 'beverage', 'F' => 'food', 'M' => 'merchandise'];
        $imgFolderName = $imgFolder[$category] ?? '전체';

        $productModel = new Product($this->pdo);

        if ($category) {
            $products = $productModel->getByCategory($category);
        } else {
            $products = $productModel->getAll();
        }

        // 뷰 호출
        $this->view('product/list', [
            'products' => $products,
            'imgFolderName' => $imgFolderName,
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