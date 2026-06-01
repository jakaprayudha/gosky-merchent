<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   // Total Orders
   $totalOrders = $pdo->query("
        SELECT COUNT(*) AS total
        FROM orders
    ")->fetch();

   // Total Revenue
   $totalRevenue = $pdo->query("
        SELECT COALESCE(SUM(total_amount), 0) AS total
        FROM orders
        WHERE status = 'delivered'
    ")->fetch();

   // Growth Rate
   $currentMonth = $pdo->query("
        SELECT COUNT(*) AS total
        FROM orders
        WHERE YEAR(created_at) = YEAR(CURRENT_DATE())
        AND MONTH(created_at) = MONTH(CURRENT_DATE())
    ")->fetch();

   $lastMonth = $pdo->query("
        SELECT COUNT(*) AS total
        FROM orders
        WHERE YEAR(created_at) = YEAR(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))
        AND MONTH(created_at) = MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))
    ")->fetch();

   $growthRate = 0;

   if ($lastMonth['total'] > 0) {
      $growthRate = round(
         (($currentMonth['total'] - $lastMonth['total']) / $lastMonth['total']) * 100,
         2
      );
   }

   echo json_encode([
      'success' => true,
      'total_orders' => (int) $totalOrders['total'],
      'total_revenue' => (int) $totalRevenue['total'],
      'growth_rate' => $growthRate
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
