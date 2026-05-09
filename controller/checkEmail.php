<?php

require '../config/config.php';

header('Content-Type: application/json');

$data = json_decode(
   file_get_contents("php://input"),
   true
);

$email =
   trim($data['email'] ?? '');

if (empty($email)) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Email wajib diisi'

   ]);

   exit;
}

$query = $pdo->prepare("

    SELECT id
    FROM users

    WHERE
        email = :email

    AND deleted_at IS NULL

    LIMIT 1

");

$query->execute([
   'email' => $email
]);

$user = $query->fetch();

if (!$user) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Email tidak ditemukan'

   ]);

   exit;
}

echo json_encode([

   'status' => 'success'

]);
