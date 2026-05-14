<?php

session_start();

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

      'status'  => 'error',
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

$user =
   $query->fetch(PDO::FETCH_ASSOC);

/*
|--------------------------------------------------------------------------
| USER NOT FOUND
|--------------------------------------------------------------------------
*/

if (!$user) {

   echo json_encode([

      'status'  => 'error',
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
   !password_verify(
      $password,
      $user['password']
   )
) {

   echo json_encode([

      'status'  => 'error',
      'message' => 'Password salah'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| SESSION SECURITY
|--------------------------------------------------------------------------
*/

session_regenerate_id(true);

/*
|--------------------------------------------------------------------------
| SAVE SESSION
|--------------------------------------------------------------------------
*/

$_SESSION['login'] = true;

/*
|--------------------------------------------------------------------------
| USER SESSION ARRAY
|--------------------------------------------------------------------------
*/

$_SESSION['user'] = [

   // =====================================
   // BASIC
   // =====================================
   'id'            => $user['id'],
   'name'          => $user['name'],
   'email'         => $user['email'],
   'phone_number'  => $user['phone_number'],
   'role'          => $user['role'],

   // =====================================
   // OPTIONAL
   // =====================================
   'otp_code'      => $user['otp_code'],
   'otp_expired'   => $user['otp_expired'],
   'fcm_token'     => $user['fcm_token'],

   // =====================================
   // TIMESTAMP
   // =====================================
   'created_at'    => $user['created_at'],
   'updated_at'    => $user['updated_at']

];

/*
|--------------------------------------------------------------------------
| SHORT SESSION
|--------------------------------------------------------------------------
*/

$_SESSION['user_id'] =
   $user['id'];

$_SESSION['name'] =
   $user['name'];

$_SESSION['email'] =
   $user['email'];

$_SESSION['role'] =
   $user['role'];

$_SESSION['phone'] =
   $user['phone_number'];

/*
|--------------------------------------------------------------------------
| REDIRECT ROLE
|--------------------------------------------------------------------------
*/

$redirect = 'app/dashboard';

switch ($user['role']) {

   case 'admin':

      $redirect = 'app/dashboard';
      break;

   case 'merchent':

      $redirect = 'app/dashboard';
      break;

   case 'driver':

      $redirect = 'driver/dashboard';
      break;

   case 'customer':

      $redirect = 'customer/dashboard';
      break;

   default:

      $redirect = 'app/dashboard';
      break;
}

/*
|--------------------------------------------------------------------------
| SUCCESS RESPONSE
|--------------------------------------------------------------------------
*/

echo json_encode([

   'status'   => 'success',

   'message'  =>
   'Login berhasil, redirecting...',

   'redirect' => $redirect,

   'user' => [

      'id'           => $user['id'],
      'name'         => $user['name'],
      'email'        => $user['email'],
      'phone_number' => $user['phone_number'],
      'role'         => $user['role']

   ]

]);
