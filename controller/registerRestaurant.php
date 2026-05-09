<?php

require '../config/config.php';

header('Content-Type: application/json');

/*
|--------------------------------------------------------------------------
| POST
|--------------------------------------------------------------------------
*/

$name           = trim($_POST['name'] ?? '');
$email          = trim($_POST['email'] ?? '');
$phone          = trim($_POST['phone'] ?? '');
$password       = trim($_POST['password'] ?? '');

$restaurant     = trim($_POST['restaurant_name'] ?? '');
$category       = trim($_POST['category_id'] ?? '');

$address        = trim($_POST['address'] ?? '');
$latitude       = trim($_POST['latitude'] ?? '');
$longitude      = trim($_POST['longitude'] ?? '');

$openTime       = trim($_POST['open_time'] ?? '');
$closeTime      = trim($_POST['close_time'] ?? '');

/*
|--------------------------------------------------------------------------
| VALIDATION
|--------------------------------------------------------------------------
*/

if (

   empty($name) ||
   empty($email) ||
   empty($phone) ||
   empty($password) ||
   empty($restaurant)

) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Semua field wajib diisi'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| CHECK EMAIL
|--------------------------------------------------------------------------
*/

$check = $pdo->prepare("

    SELECT id
    FROM users

    WHERE
        email = :email
        OR phone_number = :phone

    LIMIT 1

");

$check->execute([

   'email' => $email,
   'phone' => $phone

]);

if ($check->fetch()) {

   echo json_encode([

      'status' => 'error',
      'message' => 'Email / phone sudah digunakan'

   ]);

   exit;
}

/*
|--------------------------------------------------------------------------
| UPLOAD BANNER
|--------------------------------------------------------------------------
*/

$banner = 'uploads/default-banner.png';

if (isset($_FILES['banner'])) {

   if ($_FILES['banner']['error'] == 0) {

      $ext =
         pathinfo(
            $_FILES['banner']['name'],
            PATHINFO_EXTENSION
         );

      $fileName =
         time() . '_' . rand(100, 999) . '.' . $ext;

      $uploadPath =
         '../uploads/' . $fileName;

      move_uploaded_file(
         $_FILES['banner']['tmp_name'],
         $uploadPath
      );

      $banner =
         'uploads/' . $fileName;
   }
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
| DB TRANSACTION
|--------------------------------------------------------------------------
*/

try {

   $pdo->beginTransaction();

   /*
    |--------------------------------------------------------------------------
    | INSERT USER
    |--------------------------------------------------------------------------
    */

   $insertUser = $pdo->prepare("

        INSERT INTO users (

            name,
            email,
            phone_number,
            password,
            role,
            created_at

        )

        VALUES (

            :name,
            :email,
            :phone,
            :password,
            'admin',
            NOW()

        )

    ");

   $insertUser->execute([

      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'password' => $hash

   ]);

   /*
    |--------------------------------------------------------------------------
    | INSERT RESTAURANT
    |--------------------------------------------------------------------------
    */

   $insertRestaurant = $pdo->prepare("

        INSERT INTO restaurants (

            name,
            category_id,
            address,
            latitude,
            longitude,
            phone,
            banner_url,
            is_active,
            open_time,
            close_time,
            created_at

        )

        VALUES (

            :name,
            :category,
            :address,
            :latitude,
            :longitude,
            :phone,
            :banner,
            1,
            :open_time,
            :close_time,
            NOW()

        )

    ");

   $insertRestaurant->execute([

      'name' => $restaurant,
      'category' => $category,
      'address' => $address,
      'latitude' => $latitude,
      'longitude' => $longitude,
      'phone' => $phone,
      'banner' => $banner,
      'open_time' => $openTime,
      'close_time' => $closeTime

   ]);

   $pdo->commit();

   echo json_encode([

      'status' => 'success',
      'message' => 'Restaurant berhasil didaftarkan'

   ]);
} catch (Exception $e) {

   $pdo->rollBack();

   echo json_encode([

      'status' => 'error',
      'message' => $e->getMessage()

   ]);
}
