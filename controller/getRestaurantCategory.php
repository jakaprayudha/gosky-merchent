<?php

require '../config/config.php';

header('Content-Type: application/json');

$query = $pdo->query("

    SELECT
        id,
        name

    FROM restaurant_categories

    ORDER BY name ASC

");

$data = $query->fetchAll();

echo json_encode($data);
