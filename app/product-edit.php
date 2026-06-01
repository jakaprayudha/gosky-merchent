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

            <!-- HEADER -->

            <div class="d-flex justify-content-between align-items-center mb-4">

               <div>

                  <h3 class="fw-bold mb-1">
                     Edit Product
                  </h3>

                  <p class="text-muted mb-0">
                     Update product information
                  </p>

               </div>

               <a
                  href="products.php"
                  class="btn btn-light rounded-pill px-4">

                  <i class="fa-solid fa-arrow-left me-2"></i>

                  Back

               </a>

            </div>

            <form
               id="productEditForm"
               enctype="multipart/form-data">

               <input
                  type="hidden"
                  id="id"
                  name="id">

               <div class="row g-4">

                  <!-- IMAGE CARD -->

                  <div class="col-lg-4">

                     <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body text-center">

                           <img
                              id="previewImage"
                              src="assets/images/404.png"
                              class="img-fluid rounded-4 mb-3"
                              style="
                                width:100%;
                                height:280px;
                                object-fit:cover;
                            ">

                           <input
                              type="file"
                              id="image"
                              name="image"
                              class="form-control">

                           <small class="text-muted mt-2 d-block">

                              JPG, PNG, WEBP

                           </small>

                        </div>

                     </div>

                  </div>

                  <!-- FORM CARD -->

                  <div class="col-lg-8">

                     <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                           <div class="mb-4">

                              <label class="form-label fw-semibold">

                                 Product Name

                              </label>

                              <input
                                 type="text"
                                 id="name"
                                 name="name"
                                 class="form-control form-control-lg"
                                 required>

                           </div>

                           <div class="mb-4">

                              <label class="form-label fw-semibold">

                                 Category

                              </label>

                              <select
                                 id="menu_category_id"
                                 name="menu_category_id"
                                 class="form-select form-select-lg"
                                 required>
                              </select>

                           </div>

                           <div class="mb-4">

                              <label class="form-label fw-semibold">

                                 Price

                              </label>

                              <input
                                 type="number"
                                 id="price"
                                 name="price"
                                 class="form-control form-control-lg"
                                 required>

                           </div>

                           <div
                              class="d-flex gap-3 justify-content-end">

                              <a
                                 href="products"
                                 class="btn btn-light px-4 py-2">

                                 <i class="fa-solid fa-arrow-left me-2"></i>

                                 Back

                              </a>

                              <button
                                 type="submit"
                                 id="btnUpdate"
                                 class="btn btn-primary-custom px-4 py-2">

                                 <i class="fa-solid fa-floppy-disk me-2"></i>

                                 Update Product

                              </button>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </form>

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

   document.addEventListener('DOMContentLoaded', () => {

      loadCategories();

      document
         .getElementById('image')
         .addEventListener('change', previewImage);

      document
         .getElementById('productEditForm')
         .addEventListener('submit', updateProduct);

   });

   /*
   |--------------------------------------------------------------------------
   | LOAD CATEGORY
   |--------------------------------------------------------------------------
   */

   function loadCategories() {

      fetch('../controller/menuCategoryController.php')
         .then(response => response.json())
         .then(res => {

            let html =
               '<option value="">Select Category</option>';

            if (res.success) {

               res.data.forEach(item => {

                  html += `
                        <option value="${item.id}">
                            ${item.name}
                        </option>
                    `;

               });

            }

            document
               .getElementById('menu_category_id')
               .innerHTML = html;

            loadProductDetail();

         })
         .catch(error => {

            console.error(error);

         });

   }

   /*
   |--------------------------------------------------------------------------
   | LOAD PRODUCT DETAIL
   |--------------------------------------------------------------------------
   */

   function loadProductDetail() {

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

            document
               .getElementById('id')
               .value = item.id;

            document
               .getElementById('name')
               .value = item.name;

            document
               .getElementById('price')
               .value = item.price;

            document
               .getElementById('menu_category_id')
               .value = item.menu_category_id;

            document
               .getElementById('previewImage')
               .src =
               item.image_url &&
               item.image_url !== '' ?
               item.image_url :
               'assets/images/404.png';

         })
         .catch(error => {

            console.error(error);

         });

   }

   /*
   |--------------------------------------------------------------------------
   | PREVIEW IMAGE
   |--------------------------------------------------------------------------
   */

   function previewImage(event) {

      const file = event.target.files[0];

      if (!file) return;

      document
         .getElementById('previewImage')
         .src =
         URL.createObjectURL(file);

   }

   /*
   |--------------------------------------------------------------------------
   | UPDATE PRODUCT
   |--------------------------------------------------------------------------
   */

   function updateProduct(e) {

      e.preventDefault();

      const btn =
         document.getElementById('btnUpdate');

      btn.disabled = true;

      btn.innerHTML = `
        <i class="fa-solid fa-spinner fa-spin me-2"></i>
        Saving...
    `;

      const formData =
         new FormData(
            document.getElementById('productEditForm')
         );

      fetch(
            '../controller/productUpdateController.php', {
               method: 'POST',
               body: formData
            }
         )
         .then(response => response.json())
         .then(res => {

            btn.disabled = false;

            btn.innerHTML = `
            <i class="fa-solid fa-floppy-disk me-2"></i>
            Update Product
        `;

            if (!res.success) {

               alert(res.message);

               return;
            }

            alert(res.message);

            window.location.href =
               'products.php';

         })
         .catch(error => {

            console.error(error);

            btn.disabled = false;

            btn.innerHTML = `
            <i class="fa-solid fa-floppy-disk me-2"></i>
            Update Product
        `;

            alert(
               'Failed update product'
            );

         });

   }
</script>