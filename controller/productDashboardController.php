<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $totalProducts = $pdo->query("
        SELECT COUNT(*) total
        FROM menus
    ")->fetch(PDO::FETCH_ASSOC);

   $activeProducts = $pdo->query("
        SELECT COUNT(*) total
        FROM menus
    ")->fetch(PDO::FETCH_ASSOC);

   $lowStock = 0;

   $hiddenProducts = $pdo->query("
        SELECT COUNT(*) total
        FROM menus
        WHERE image_url IS NULL
        OR image_url = ''
    ")->fetch(PDO::FETCH_ASSOC);

   echo json_encode([
      'success' => true,
      'total_products' => (int)$totalProducts['total'],
      'active_products' => (int)$activeProducts['total'],
      'low_stock' => (int)$lowStock,
      'hidden_products' => (int)$hiddenProducts['total']
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
