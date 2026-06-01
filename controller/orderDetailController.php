<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $orderId = $_GET['order_id'] ?? 0;

   $stmt = $pdo->prepare("
        SELECT
            om.id,
            om.quantity,
            om.price,
            m.name AS menu_name
        FROM order_menus om
        INNER JOIN menus m
            ON om.menu_id = m.id
        WHERE om.order_id = ?
        ORDER BY om.id ASC
    ");

   $stmt->execute([$orderId]);

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
