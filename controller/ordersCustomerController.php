<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $query = $pdo->query("
        SELECT
            o.id,
            o.type,
            o.status,
            o.total_amount,
            o.created_at,
            u.name AS customer_name,
            r.name AS restaurant_name
        FROM orders o
        LEFT JOIN users u
            ON o.user_id = u.id
        LEFT JOIN restaurants r
            ON o.restaurant_id = r.id
        ORDER BY o.created_at DESC
        LIMIT 10
    ");

   $data = $query->fetchAll(PDO::FETCH_ASSOC);

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
