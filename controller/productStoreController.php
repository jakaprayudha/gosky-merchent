<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $restaurant_id = $_POST['restaurant_id'] ?? 0;
   $menu_category_id = $_POST['menu_category_id'] ?? 0;
   $name = trim($_POST['name'] ?? '');
   $price = $_POST['price'] ?? 0;

   if (
      empty($restaurant_id) ||
      empty($menu_category_id) ||
      empty($name) ||
      empty($price)
   ) {

      echo json_encode([
         'success' => false,
         'message' => 'Please complete all required fields'
      ]);
      exit;
   }

   $imageUrl = null;

   if (
      isset($_FILES['image']) &&
      $_FILES['image']['error'] == 0
   ) {

      $uploadDir = '../uploads/menu/';

      if (!is_dir($uploadDir)) {
         mkdir($uploadDir, 0777, true);
      }

      $extension = pathinfo(
         $_FILES['image']['name'],
         PATHINFO_EXTENSION
      );

      $fileName =
         time() .
         '_' .
         uniqid() .
         '.' .
         $extension;

      move_uploaded_file(
         $_FILES['image']['tmp_name'],
         $uploadDir . $fileName
      );

      $imageUrl = 'uploads/menu/' . $fileName;
   }

   $stmt = $pdo->prepare("
        INSERT INTO menus (
            restaurant_id,
            menu_category_id,
            name,
            price,
            image_url
        )
        VALUES (
            ?, ?, ?, ?, ?
        )
    ");

   $stmt->execute([
      $restaurant_id,
      $menu_category_id,
      $name,
      $price,
      $imageUrl
   ]);

   echo json_encode([
      'success' => true,
      'message' => 'Product saved successfully'
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
