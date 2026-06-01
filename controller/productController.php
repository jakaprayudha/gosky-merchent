<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $categoryId = $_GET['category_id'] ?? '';

   $sql = "
        SELECT
            m.id,
            m.name,
            m.price,
            m.image_url,
            mc.name AS category_name
        FROM menus m
        LEFT JOIN menu_categories mc
            ON m.menu_category_id = mc.id
    ";

   if (!empty($categoryId)) {

      $sql .= " WHERE m.menu_category_id = :category_id ";
   }

   $sql .= " ORDER BY m.id DESC ";

   $stmt = $pdo->prepare($sql);

   if (!empty($categoryId)) {

      $stmt->bindValue(':category_id', $categoryId);
   }

   $stmt->execute();

   echo json_encode([
      'success' => true,
      'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
