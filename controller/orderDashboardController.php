<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $totalOrders = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
    ")->fetch(PDO::FETCH_ASSOC);

   $processingOrders = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
        WHERE status IN (
            'waiting',
            'searching',
            'accepted',
            'on_the_way'
        )
    ")->fetch(PDO::FETCH_ASSOC);

   $completedOrders = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
        WHERE status = 'delivered'
    ")->fetch(PDO::FETCH_ASSOC);

   $cancelledOrders = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
        WHERE status IN (
            'cancelled',
            'rejected'
        )
    ")->fetch(PDO::FETCH_ASSOC);

   echo json_encode([
      'success' => true,
      'total_orders' => (int)$totalOrders['total'],
      'processing_orders' => (int)$processingOrders['total'],
      'completed_orders' => (int)$completedOrders['total'],
      'cancelled_orders' => (int)$cancelledOrders['total']
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
