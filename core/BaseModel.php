<?php
namespace Core;

use PDO;

abstract class BaseModel {
    protected PDO $pdo;
    protected string $table;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;

        // 각 자식 클래스에서 $table 속성을 지정해야 함
        // if (!isset($this->table)) {
        //     throw new \Exception('Table name must be set in child model.');
        // }
    }

    // public function findById($id) {
    //     $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
    //     $stmt->execute([$id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function getAll() {
    //     $stmt = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id DESC");
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function deleteById($id) {
    //     $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
    //     return $stmt->execute([$id]);
    // }

    //  public function create(array $data): bool {
    //     $columns = array_keys($data);
    //     $placeholders = array_map(fn($col) => ':' . $col, $columns);

    //     $sql = "INSERT INTO {$this->table} (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ")";
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt->execute($data);
    // }

    // public function update(int $id, array $data): bool {
    //     $columns = array_keys($data);
    //     $setString = implode(', ', array_map(fn($col) => "$col = :$col", $columns));

    //     $sql = "UPDATE {$this->table} SET $setString WHERE id = :id";
    //     $data['id'] = $id; // WHERE절에 사용할 id도 함께 바인딩
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt->execute($data);
    // }
}