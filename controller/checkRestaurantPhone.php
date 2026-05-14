<?php

require '../config/config.php';

header('Content-Type: application/json');

// =========================
// GET INPUT
// =========================
$phone = trim(
   $_POST['phone'] ?? ''
);

// =========================
// VALIDASI
// =========================
if (empty($phone)) {

   echo json_encode([

      'status'  => 'error',
      'message' => 'Phone wajib diisi'

   ]);

   exit;
}

// =========================
// QUERY
// =========================
$query = $pdo->prepare("

   SELECT
      id,
      name,
      category_id,
      address,
      latitude,
      longitude,
      phone,
      banner_url,
      is_active,
      open_time,
      close_time
   FROM restaurants

   WHERE phone = :phone

   LIMIT 1

");

$query->execute([
   'phone' => $phone
]);

$restaurant = $query->fetch(
   PDO::FETCH_ASSOC
);

// =========================
// RESPONSE
// =========================
if (!$restaurant) {

   echo json_encode([

      'status'  => 'not_found',
      'message' => 'Restaurant tidak ditemukan'

   ]);

   exit;
}

echo json_encode([

   'status' => 'found',
   'data'   => $restaurant

]);
