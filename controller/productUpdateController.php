<?php

require '../config/config.php';

header('Content-Type: application/json');

try {

   $id = $_POST['id'];
   $menu_category_id = $_POST['menu_category_id'];
   $name = trim($_POST['name']);
   $price = $_POST['price'];

   $stmt = $pdo->prepare("
        SELECT image_url
        FROM menus
        WHERE id = ?
    ");

   $stmt->execute([$id]);

   $product = $stmt->fetch(PDO::FETCH_ASSOC);

   $imageUrl = $product['image_url'];

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

      $filename =
         time() .
         '_' .
         uniqid() .
         '.' .
         $extension;

      move_uploaded_file(
         $_FILES['image']['tmp_name'],
         $uploadDir . $filename
      );

      $imageUrl =
         'uploads/menu/' . $filename;
   }

   $stmt = $pdo->prepare("
        UPDATE menus
        SET
            menu_category_id = ?,
            name = ?,
            price = ?,
            image_url = ?
        WHERE id = ?
    ");

   $stmt->execute([
      $menu_category_id,
      $name,
      $price,
      $imageUrl,
      $id
   ]);

   echo json_encode([
      'success' => true,
      'message' => 'Product updated successfully'
   ]);
} catch (Exception $e) {

   echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
   ]);
}
