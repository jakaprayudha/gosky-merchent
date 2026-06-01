<?php

require '../config/config.php';

header('Content-Type: application/json');

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("
    SELECT
        m.*,
        mc.name AS category_name
    FROM menus m
    LEFT JOIN menu_categories mc
        ON mc.id = m.menu_category_id
    WHERE m.id = ?
");

$stmt->execute([$id]);

echo json_encode([
   'success' => true,
   'data' => $stmt->fetch(PDO::FETCH_ASSOC)
]);
