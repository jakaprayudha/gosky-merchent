<?php

require '../config/config.php';

header('Content-Type: application/json');

$data = json_decode(
   file_get_contents("php://input"),
   true
);

$email =
   trim($data['email'] ?? '');

$password =
   trim($data['password'] ?? '');

if (empty($email) || empty($password)) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Data tidak lengkap'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| HASH PASSWORD
|--------------------------------------------------------------------------
*/

$hash = password_hash(

   $password,

   PASSWORD_BCRYPT,

   [
      'cost' => 12
   ]

);

/*
|--------------------------------------------------------------------------
| UPDATE PASSWORD
|--------------------------------------------------------------------------
*/

$query = $pdo->prepare("

    UPDATE users

    SET
        password = :password,
        updated_at = NOW()

    WHERE
        email = :email

");

$update = $query->execute([

   'password' => $hash,
   'email' => $email

]);

if (!$update) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Gagal update password'

   ]);

   exit;
}

echo json_encode([

   'status' => 'success'

]);
