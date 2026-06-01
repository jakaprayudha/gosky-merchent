<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   // ======================
   // TOTAL REVENUE
   // ======================

   $revenue = $pdo->query("
        SELECT
            COALESCE(SUM(total_amount),0) AS total
        FROM orders
        WHERE status = 'delivered'
    ")->fetch(PDO::FETCH_ASSOC);

   // ======================
   // TOTAL ORDERS
   // ======================

   $orders = $pdo->query("
        SELECT COUNT(*) AS total
        FROM orders
    ")->fetch(PDO::FETCH_ASSOC);

   // ======================
   // TOTAL CUSTOMERS
   // ======================

   $customers = $pdo->query("
        SELECT COUNT(*) AS total
        FROM users
    ")->fetch(PDO::FETCH_ASSOC);

   // ======================
   // MONTHLY GROWTH
   // ======================

   $currentMonth = $pdo->query("
        SELECT
            COALESCE(SUM(total_amount),0) AS total
        FROM orders
        WHERE status='delivered'
        AND MONTH(created_at)=MONTH(CURRENT_DATE())
        AND YEAR(created_at)=YEAR(CURRENT_DATE())
    ")->fetch(PDO::FETCH_ASSOC);

   $lastMonth = $pdo->query("
        SELECT
            COALESCE(SUM(total_amount),0) AS total
        FROM orders
        WHERE status='delivered'
        AND MONTH(created_at)=MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))
        AND YEAR(created_at)=YEAR(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))
    ")->fetch(PDO::FETCH_ASSOC);

   $growth = 0;

   if ($lastMonth['total'] > 0) {

      $growth =
         (
            ($currentMonth['total'] - $lastMonth['total'])
            /
            $lastMonth['total']
         ) * 100;
   }

   // ======================
   // SALES 7 DAYS
   // ======================

   $salesLabels = [];
   $salesData = [];

   for ($i = 6; $i >= 0; $i--) {

      $date = date(
         'Y-m-d',
         strtotime("-$i days")
      );

      $salesLabels[] = date(
         'D',
         strtotime($date)
      );

      $stmt = $pdo->prepare("
            SELECT
                COALESCE(SUM(total_amount),0) total
            FROM orders
            WHERE status='delivered'
            AND DATE(created_at)=?
        ");

      $stmt->execute([$date]);

      $salesData[] =
         (float)$stmt
            ->fetch(PDO::FETCH_ASSOC)['total'];
   }

   // ======================
   // ORDER STATUS
   // ======================

   $completed = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
        WHERE status='delivered'
    ")->fetch(PDO::FETCH_ASSOC)['total'];

   $processing = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
        WHERE status IN (
            'waiting',
            'searching',
            'accepted',
            'on_the_way'
        )
    ")->fetch(PDO::FETCH_ASSOC)['total'];

   $cancelled = $pdo->query("
        SELECT COUNT(*) total
        FROM orders
        WHERE status IN (
            'cancelled',
            'rejected'
        )
    ")->fetch(PDO::FETCH_ASSOC)['total'];

   echo json_encode([

      'success' => true,

      'total_revenue' =>
      (float)$revenue['total'],

      'total_orders' =>
      (int)$orders['total'],

      'total_customers' =>
      (int)$customers['total'],

      'monthly_growth' =>
      round($growth, 1),

      'sales_labels' =>
      $salesLabels,

      'sales_data' =>
      $salesData,

      'order_status' => [

         (int)$completed,

         (int)$processing,

         (int)$cancelled

      ]

   ]);
} catch (Exception $e) {

   echo json_encode([

      'success' => false,

      'message' => $e->getMessage()

   ]);
}
