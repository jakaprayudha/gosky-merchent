<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $id = $_GET['id'] ?? 0;

   $stmt = $pdo->prepare("
        SELECT
            o.*,
            u.name AS customer_name,
            r.name AS restaurant_name
        FROM orders o
        LEFT JOIN users u
            ON o.user_id = u.id
        LEFT JOIN restaurants r
            ON o.restaurant_id = r.id
        WHERE o.id = ?
    ");

   $stmt->execute([$id]);

   $order = $stmt->fetch(PDO::FETCH_ASSOC);

   $stmt = $pdo->prepare("
        SELECT
            om.quantity,
            om.price,
            m.name AS menu_name
        FROM order_menus om
        INNER JOIN menus m
            ON om.menu_id = m.id
        WHERE om.order_id = ?
    ");

   $stmt->execute([$id]);

   $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

   echo json_encode([
      'success' => true,
      'order' => $order,
      'items' => $items
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
