<?php

require '../config/config.php';

header('Content-Type: application/json');

/*
|--------------------------------------------------------------------------
| GET JSON INPUT
|--------------------------------------------------------------------------
*/

$data = json_decode(
   file_get_contents("php://input"),
   true
);

$login =
   trim($data['login'] ?? '');

$password =
   trim($data['password'] ?? '');

/*
|--------------------------------------------------------------------------
| VALIDATION
|--------------------------------------------------------------------------
*/

if (empty($login) || empty($password)) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Email / Phone dan password wajib diisi'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| QUERY USER
|--------------------------------------------------------------------------
*/

$query = $pdo->prepare("

    SELECT *
    FROM users

    WHERE
    (
        email = :email
        OR
        phone_number = :phone
    )

    AND deleted_at IS NULL

    LIMIT 1

");

$query->execute([

   'email' => $login,
   'phone' => $login

]);
$user = $query->fetch(PDO::FETCH_ASSOC);

/*
|--------------------------------------------------------------------------
| USER NOT FOUND
|--------------------------------------------------------------------------
*/

if (!$user) {

   echo json_encode([

      'status' => 'error',
      'message' => 'User tidak ditemukan'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| VERIFY PASSWORD
|--------------------------------------------------------------------------
*/

if (
   empty($user['password']) ||
   !password_verify($password, $user['password'])
) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Password salah'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| SAVE SESSION
|--------------------------------------------------------------------------
*/

$_SESSION['login'] = true;

$_SESSION['user'] = [

   'id' => $user['id'],
   'name' => $user['name'],
   'email' => $user['email'],
   'phone_number' => $user['phone_number'],
   'role' => $user['role']

];

/*
|--------------------------------------------------------------------------
| REDIRECT ROLE
|--------------------------------------------------------------------------
*/

$redirect = 'app/dashboard';

if ($user['role'] === 'admin') {

   $redirect = 'dashboard';
} elseif ($user['role'] === 'driver') {

   $redirect = 'driver';
}

/*
|--------------------------------------------------------------------------
| SUCCESS RESPONSE
|--------------------------------------------------------------------------
*/

echo json_encode([

   'status' => 'success',

   'message' =>
   'Login berhasil, redirecting...',

   'redirect' => $redirect

]);
