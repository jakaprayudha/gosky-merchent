<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $stmt = $pdo->query("
        SELECT
            id,
            name
        FROM menu_categories
        ORDER BY name ASC
    ");

   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

   echo json_encode([
      'success' => true,
      'data' => $data
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
