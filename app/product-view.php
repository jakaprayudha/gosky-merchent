<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Products Management</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

   <!-- Font Awesome -->
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">
   <link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
   <!-- Custom CSS -->
   <link rel="stylesheet"
      href="assets/css/style.css">
   <style>
      .dataTables_filter {
         display: none !important;
      }

      .dataTables_length select {

         border-radius: 12px !important;

         padding: 6px 12px !important;

      }

      .dataTables_paginate .paginate_button {

         border-radius: 10px !important;

      }

      .btn-primary-custom,
      .btn-outline-secondary {

         min-width: 150px;

         height: 48px;

         display: inline-flex;

         align-items: center;

         justify-content: center;

         border-radius: 12px;

         font-weight: 600;

      }

      .btn-outline-secondary {

         border: 1px solid #dee2e6;

      }

      .skeleton {
         position: relative;
         overflow: hidden;
         background: #e9ecef;
         border-radius: 12px;
      }

      .skeleton::after {
         content: '';
         position: absolute;
         top: 0;
         left: -150px;
         width: 150px;
         height: 100%;
         background: linear-gradient(90deg,
               transparent,
               rgba(255, 255, 255, .7),
               transparent);
         animation: shimmer 1.2s infinite;
      }

      @keyframes shimmer {
         100% {
            left: 100%;
         }
      }
   </style>
</head>

<body>

   <!-- SIDEBAR -->
   <?php require 'partial/sidebar.php'; ?>

   <!-- MAIN -->
   <div class="main-content">

      <!-- TOPBAR -->
      <?php require 'partial/topbar.php'; ?>

      <!-- CONTENT -->
      <div class="content-wrapper">
         <div class="content-card">

            <div class="d-flex justify-content-between align-items-center mb-4">

               <div>

                  <h3 class="fw-bold mb-1">
                     Product Detail
                  </h3>

                  <p class="text-muted mb-0">
                     View product information
                  </p>

               </div>

               <div class="d-flex gap-2">

                  <a
                     href="products"
                     class="btn btn-outline-secondary">

                     <i class="fa-solid fa-arrow-left me-2"></i>

                     Back

                  </a>

                  <a
                     id="btnEdit"
                     href="#"
                     class="btn btn-primary-custom">

                     <i class="fa-solid fa-pen me-2"></i>

                     Edit Product

                  </a>

               </div>

            </div>

            <div class="row g-4">

               <!-- IMAGE -->

               <div class="col-lg-4">

                  <div class="card border-0 shadow-sm rounded-4">

                     <div class="card-body">

                        <img
                           id="productImage"
                           src="assets/images/404.png"
                           class="img-fluid rounded-4">

                     </div>

                  </div>

               </div>

               <!-- INFO -->

               <div class="col-lg-8">

                  <div class="card border-0 shadow-sm rounded-4">

                     <div class="card-body p-4">

                        <div class="mb-4">

                           <small class="text-muted">
                              Product ID
                           </small>

                           <h5 id="productId">
                              -
                           </h5>

                        </div>

                        <div class="mb-4">

                           <small class="text-muted">
                              Product Name
                           </small>

                           <h4
                              id="productName"
                              class="fw-bold">
                              -
                           </h4>

                        </div>

                        <div class="mb-4">

                           <small class="text-muted">
                              Category
                           </small>

                           <h5 id="productCategory">
                              -
                           </h5>

                        </div>

                        <div class="mb-4">

                           <small class="text-muted">
                              Price
                           </small>

                           <h3
                              id="productPrice"
                              class="text-primary fw-bold">
                              Rp 0
                           </h3>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

            <!-- EXTRA INFO -->

            <div class="row g-4 mt-2">

               <div class="col-md-4">

                  <div class="stats-card">

                     <div class="stats-icon">

                        <i class="fa-solid fa-box"></i>

                     </div>

                     <h3 id="productStatus">
                        Active
                     </h3>

                     <p>Status</p>

                  </div>

               </div>

               <div class="col-md-4">

                  <div class="stats-card">

                     <div class="stats-icon">

                        <i class="fa-solid fa-tag"></i>

                     </div>

                     <h3 id="productCategoryCard">
                        -
                     </h3>

                     <p>Category</p>

                  </div>

               </div>

               <div class="col-md-4">

                  <div class="stats-card">

                     <div class="stats-icon">

                        <i class="fa-solid fa-money-bill"></i>

                     </div>

                     <h3 id="productPriceCard">
                        Rp 0
                     </h3>

                     <p>Price</p>

                  </div>

               </div>

            </div>

         </div>
      </div>


   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAVIGATION -->
   <?php require 'partial/sidebar-mobile.php'; ?>

</body>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>
<script>
   const productId =
      new URLSearchParams(
         window.location.search
      ).get('id');

   loadProduct();

   function loadProduct() {

      fetch(
            '../controller/productDetailController.php?id=' +
            productId
         )
         .then(response => response.json())
         .then(res => {

            if (!res.success) {

               alert('Product not found');

               return;
            }

            const item = res.data;

            document.getElementById('btnEdit')
               .href =
               'product-edit?id=' +
               item.id;

            document.getElementById('productId')
               .innerText =
               '#' + item.id;

            document.getElementById('productName')
               .innerText =
               item.name;

            document.getElementById('productCategory')
               .innerText =
               item.category_name;

            document.getElementById('productCategoryCard')
               .innerText =
               item.category_name;

            document.getElementById('productPrice')
               .innerText =
               'Rp ' +
               Number(item.price)
               .toLocaleString('id-ID');

            document.getElementById('productPriceCard')
               .innerText =
               'Rp ' +
               Number(item.price)
               .toLocaleString('id-ID');

            document.getElementById('productImage')
               .src =
               item.image_url &&
               item.image_url !== '' ?
               item.image_url :
               'assets/images/404.png';

         });

   }
</script>