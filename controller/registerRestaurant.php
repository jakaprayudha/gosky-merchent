<?php
require '../config/config.php';

header('Content-Type: application/json');

try {

   // =========================================
   // INPUT
   // =========================================
   $restaurantName =
      trim($_POST['restaurant_name'] ?? '');

   $categoryId =
      trim($_POST['category_id'] ?? '');

   $phone =
      trim($_POST['phone'] ?? '');

   $address =
      trim($_POST['address'] ?? '');

   $latitude =
      trim($_POST['latitude'] ?? '');

   $longitude =
      trim($_POST['longitude'] ?? '');

   $openTime =
      trim($_POST['open_time'] ?? '');

   $closeTime =
      trim($_POST['close_time'] ?? '');

   // owner
   $name =
      trim($_POST['name'] ?? '');

   $email =
      trim($_POST['email'] ?? '');

   $password =
      trim($_POST['password'] ?? '');

   // =========================================
   // VALIDASI
   // =========================================
   if (
      empty($restaurantName) ||
      empty($categoryId) ||
      empty($phone) ||
      empty($address) ||
      empty($name) ||
      empty($email) ||
      empty($password)
   ) {

      echo json_encode([

         'status'  => 'error',
         'message' => 'Lengkapi semua field wajib'

      ]);

      exit;
   }

   // =========================================
   // CHECK EMAIL USER
   // =========================================
   $checkEmail = $pdo->prepare("

      SELECT id
      FROM users

      WHERE email = :email

      AND deleted_at IS NULL

      LIMIT 1

   ");

   $checkEmail->execute([
      'email' => $email
   ]);

   if ($checkEmail->fetch()) {

      echo json_encode([

         'status'  => 'error',
         'message' => 'Email sudah digunakan'

      ]);

      exit;
   }

   // =========================================
   // CHECK RESTAURANT
   // =========================================
   $checkRestaurant = $pdo->prepare("

      SELECT id, banner_url
      FROM restaurants

      WHERE phone = :phone

      LIMIT 1

   ");

   $checkRestaurant->execute([
      'phone' => $phone
   ]);

   $restaurant =
      $checkRestaurant->fetch(PDO::FETCH_ASSOC);

   // =========================================
   // BANNER
   // =========================================
   $bannerPath = null;

   if (
      isset($_FILES['banner']) &&
      $_FILES['banner']['error'] === 0
   ) {

      $dir =
         '../storage/uploads/banners/';

      if (!is_dir($dir)) {

         mkdir($dir, 0777, true);
      }

      $ext =
         strtolower(
            pathinfo(
               $_FILES['banner']['name'],
               PATHINFO_EXTENSION
            )
         );

      $fileName =
         uniqid() . '.' . $ext;

      $target =
         $dir . $fileName;

      move_uploaded_file(
         $_FILES['banner']['tmp_name'],
         $target
      );

      $bannerPath =
         '/storage/uploads/banners/' .
         $fileName;
   }

   // =========================================
   // INSERT RESTAURANT
   // =========================================
   if (!$restaurant) {

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

         ) VALUES (

            :name,
            :category_id,
            :address,
            :latitude,
            :longitude,
            :phone,
            :banner_url,
            1,
            :open_time,
            :close_time,
            NOW()

         )

      ");

      $insertRestaurant->execute([

         'name'         => $restaurantName,
         'category_id'  => $categoryId,
         'address'      => $address,
         'latitude'     => $latitude,
         'longitude'    => $longitude,
         'phone'        => $phone,
         'banner_url'   => $bannerPath,
         'open_time'    => $openTime,
         'close_time'   => $closeTime

      ]);

      $restaurantId =
         $pdo->lastInsertId();
   } else {

      // =====================================
      // RESTAURANT SUDAH ADA
      // =====================================
      $restaurantId =
         $restaurant['id'];

      // optional update data restaurant
      $updateRestaurant = $pdo->prepare("

         UPDATE restaurants
         SET

            name         = :name,
            category_id  = :category_id,
            address      = :address,
            latitude     = :latitude,
            longitude    = :longitude,
            open_time    = :open_time,
            close_time   = :close_time,
            updated_at   = NOW()

         WHERE id = :id

      ");

      $updateRestaurant->execute([

         'name'         => $restaurantName,
         'category_id'  => $categoryId,
         'address'      => $address,
         'latitude'     => $latitude,
         'longitude'    => $longitude,
         'open_time'    => $openTime,
         'close_time'   => $closeTime,
         'id'           => $restaurantId

      ]);

      // update banner jika upload baru
      if ($bannerPath) {

         $updateBanner = $pdo->prepare("

            UPDATE restaurants
            SET banner_url = :banner
            WHERE id = :id

         ");

         $updateBanner->execute([

            'banner' => $bannerPath,
            'id'     => $restaurantId

         ]);
      }
   }

   // =========================================
   // INSERT USER
   // =========================================
   $insertUser = $pdo->prepare("

      INSERT INTO users (

         name,
         email,
         phone_number,
         password,
         role,
         created_at

      ) VALUES (

         :name,
         :email,
         :phone_number,
         :password,
         'merchent',
         NOW()

      )

   ");

   $insertUser->execute([

      'name'         => $name,
      'email'        => $email,
      'phone_number' => $phone,
      'password'     => password_hash(
         $password,
         PASSWORD_DEFAULT
      )

   ]);

   // =========================================
   // SUCCESS
   // =========================================
   echo json_encode([

      'status'  => 'success',
      'message' => 'Register merchant berhasil'

   ]);
} catch (Exception $e) {

   echo json_encode([

      'status'  => 'error',
      'message' => $e->getMessage()

   ]);
}
