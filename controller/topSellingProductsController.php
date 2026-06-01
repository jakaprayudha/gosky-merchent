<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $stmt = $pdo->query("

        SELECT

            m.id,

            m.name,

            m.image_url,

            mc.name AS category_name,

            COUNT(DISTINCT om.order_id) AS total_orders,

            SUM(
                om.quantity * om.price
            ) AS revenue,

            SUM(
                om.quantity
            ) AS total_qty

        FROM order_menus om

        INNER JOIN menus m
            ON om.menu_id = m.id

        LEFT JOIN menu_categories mc
            ON m.menu_category_id = mc.id

        GROUP BY m.id

        ORDER BY revenue DESC

        LIMIT 10

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
