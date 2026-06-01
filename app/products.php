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

         <!-- SUMMARY -->
         <!-- STATS -->
         <div class="row g-4 mb-4">

            <!-- TOTAL PRODUCT -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-box"></i>

                  </div>

                  <h3 id="totalProducts">0</h3>

                  <p>
                     Total Products
                  </p>

               </div>

            </div>

            <!-- ACTIVE PRODUCT -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-circle-check"></i>

                  </div>

                  <h3 id="activeProducts">0</h3>

                  <p>
                     Active Product
                  </p>

               </div>

            </div>

            <!-- LOW STOCK -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-triangle-exclamation"></i>

                  </div>

                  <h3 id="lowStock">0</h3>


                  <p>
                     Low Stock
                  </p>

               </div>

            </div>

            <!-- HIDDEN -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-eye-slash"></i>

                  </div>

                  <h3 id="hiddenProducts">0</h3>

                  <p>
                     Hidden Product
                  </p>

               </div>

            </div>

         </div>

         <!-- PAGE HEADER -->
         <div class="page-header">

            <div class="filter-wrapper">

               <!-- SEARCH -->
               <div class="search-box">

                  <i class="fa-solid fa-magnifying-glass"></i>

                  <input type="text"
                     class="search-input"
                     placeholder="Search products...">

               </div>

               <!-- CATEGORY -->
               <select
                  id="categoryFilter"
                  class="filter-select">

                  <option value="">
                     All Category
                  </option>

               </select>

               <!-- VIEW -->
               <div class="view-switch">

                  <button class="view-btn active"
                     id="gridViewBtn">

                     <i class="fa-solid fa-grip"></i>

                  </button>

                  <button class="view-btn"
                     id="tableViewBtn">

                     <i class="fa-solid fa-table-list"></i>

                  </button>

               </div>

               <!-- ADD -->
               <button class="btn btn-primary-custom" id="btnAddProduct">

                  <i class="fa-solid fa-plus me-2"></i>

                  Add Product

               </button>

            </div>

         </div>

         <!-- PRODUCT GRID -->
         <div class="row g-4" id="productGrid">
         </div>
         <!-- DATATABLE CSS -->


         <!-- PRODUCT TABLE -->
         <div class="content-card mt-4 d-none"
            id="productTable">

            <div class="table-responsive">

               <table
                  id="productDataTable"
                  class="table align-middle table-hover mb-0">

                  <thead>

                     <tr>

                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Sales</th>
                        <th width="100">Action</th>

                     </tr>

                  </thead>

                  <tbody id="productTableBody">
                  </tbody>

               </table>

            </div>

         </div>

         <!-- JQUERY -->
         <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

         <!-- DATATABLE -->
         <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

         <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>



      </div>

      <script>
         const gridBtn =
            document.getElementById('gridViewBtn');

         const tableBtn =
            document.getElementById('tableViewBtn');

         const productGrid =
            document.getElementById('productGrid');

         const productTable =
            document.getElementById('productTable');

         /*
         |--------------------------------------------------------------------------
         | GRID
         |--------------------------------------------------------------------------
         */

         gridBtn.addEventListener('click', () => {

            gridBtn.classList.add('active');

            tableBtn.classList.remove('active');

            productGrid.classList.remove('d-none');

            productTable.classList.add('d-none');

         });

         /*
         |--------------------------------------------------------------------------
         | TABLE
         |--------------------------------------------------------------------------
         */

         tableBtn.addEventListener('click', () => {

            tableBtn.classList.add('active');

            gridBtn.classList.remove('active');

            productTable.classList.remove('d-none');

            productGrid.classList.add('d-none');

         });
      </script>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAVIGATION -->
   <?php require 'partial/sidebar-mobile.php'; ?>
   <!-- =========================================
PRODUCT MODAL
========================================= -->
   <div class="modal fade"
      id="productModal"
      tabindex="-1">

      <div class="modal-dialog modal-lg modal-dialog-centered">

         <div class="modal-content border-0 shadow-lg rounded-4">

            <!-- HEADER -->
            <div class="modal-header border-0 pb-0">

               <div>

                  <h4 class="fw-bold mb-1">

                     Add New Product

                  </h4>

                  <p class="text-muted mb-0">

                     Create your new product item

                  </p>

               </div>

               <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal">
               </button>

            </div>

            <!-- BODY -->
            <div class="modal-body p-4">

               <form id="productForm">

                  <div class="row g-4">

                     <!-- PRODUCT IMAGE -->
                     <div class="col-12">

                        <label class="form-label fw-semibold">

                           Product Image

                        </label>

                        <input
                           type="file"
                           class="form-control"
                           accept="image/*">

                     </div>

                     <!-- PRODUCT NAME -->
                     <div class="col-md-6">

                        <label class="form-label fw-semibold">

                           Product Name

                        </label>

                        <input
                           type="text"
                           class="form-control"
                           placeholder="Enter product name">

                     </div>

                     <!-- CATEGORY -->
                     <div class="col-md-6">

                        <label class="form-label fw-semibold">

                           Category

                        </label>

                        <select class="form-select">

                           <option>
                              Select Category
                           </option>

                           <option>
                              Electronics
                           </option>

                           <option>
                              Fashion
                           </option>

                           <option>
                              Furniture
                           </option>

                        </select>

                     </div>

                     <!-- PRICE -->
                     <div class="col-md-6">

                        <label class="form-label fw-semibold">

                           Price

                        </label>

                        <input
                           type="number"
                           class="form-control"
                           placeholder="0">

                     </div>

                     <!-- STOCK -->
                     <div class="col-md-6">

                        <label class="form-label fw-semibold">

                           Stock

                        </label>

                        <input
                           type="number"
                           class="form-control"
                           placeholder="0">

                     </div>

                     <!-- DESCRIPTION -->
                     <div class="col-12">

                        <label class="form-label fw-semibold">

                           Description

                        </label>

                        <textarea
                           class="form-control"
                           rows="4"
                           placeholder="Write product description..."></textarea>

                     </div>

                     <!-- STATUS -->
                     <div class="col-md-6">

                        <label class="form-label fw-semibold">

                           Product Status

                        </label>

                        <select class="form-select">

                           <option>
                              Active
                           </option>

                           <option>
                              Draft
                           </option>

                           <option>
                              Hidden
                           </option>

                        </select>

                     </div>

                     <!-- SKU -->
                     <div class="col-md-6">

                        <label class="form-label fw-semibold">

                           SKU

                        </label>

                        <input
                           type="text"
                           class="form-control"
                           placeholder="SKU-1024">

                     </div>

                  </div>

               </form>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 pt-0 px-4 pb-4">

               <button
                  type="button"
                  class="btn btn-light rounded-pill px-4"
                  data-bs-dismiss="modal">

                  Cancel

               </button>

               <button
                  type="submit"
                  form="productForm"
                  class="btn btn-primary-custom rounded-pill px-4">

                  <i class="fa-solid fa-floppy-disk me-2"></i>

                  Save Product

               </button>

            </div>

         </div>

      </div>

   </div>
</body>
<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
   fetch('../controller/productDashboardController.php')
      .then(response => response.json())
      .then(res => {

         if (!res.success) return;

         document.getElementById('totalProducts').innerText =
            res.total_products.toLocaleString('id-ID');

         document.getElementById('activeProducts').innerText =
            res.active_products.toLocaleString('id-ID');

         document.getElementById('lowStock').innerText =
            res.low_stock.toLocaleString('id-ID');

         document.getElementById('hiddenProducts').innerText =
            res.hidden_products.toLocaleString('id-ID');
      });
</script>

<script>
   document.addEventListener('DOMContentLoaded', () => {

      loadCategories();

   });

   function loadCategories() {

      fetch('../controller/menuCategoryController.php')
         .then(response => response.json())
         .then(res => {

            if (!res.success) return;

            let html = `
                <option value="">
                    All Category
                </option>
            `;

            res.data.forEach(category => {

               html += `
                    <option value="${category.id}">
                        ${category.name}
                    </option>
                `;

            });

            document.getElementById('categoryFilter').innerHTML = html;

         })
         .catch(error => {

            console.error(error);

         });
   }
</script>
<script>
   document.addEventListener('DOMContentLoaded', () => {

      loadProducts();
      loadProductTable();

      document
         .getElementById('categoryFilter')
         .addEventListener('change', function() {

            loadProducts(this.value);
            loadProductTable(this.value);

         });

   });

   function loadProducts(categoryId = '') {
      showGridSkeleton();
      let url = '../controller/productController.php';

      if (categoryId) {
         url += '?category_id=' + categoryId;
      }

      fetch(url)
         .then(response => response.json())
         .then(res => {

            setTimeout(() => {

               // render data

            }, 500);


            let html = '';

            if (res.success && res.data.length > 0) {

               res.data.forEach(item => {

                  let imageUrl =
                     item.image_url && item.image_url !== '' ?
                     item.image_url :
                     '../app/assets/images/404.png';

                  html += `
                        <div class="col-lg-4 col-md-6">

                            <div class="product-card">

                                <div class="product-image">

                                    <img src="${imageUrl}">

                                    <div class="product-badge">
                                        Product
                                    </div>

                                </div>

                                <div class="product-body">

                                    <div class="product-category">
                                        ${item.category_name ?? '-'}
                                    </div>

                                    <div class="product-name">
                                        ${item.name}
                                    </div>

                                    <div class="product-desc">
                                        Menu Restaurant
                                    </div>

                                    <div class="product-meta">

                                        <div class="product-price">

                                            <h4>
                                                Rp ${Number(item.price).toLocaleString('id-ID')}
                                            </h4>

                                            <span>
                                                Per Item
                                            </span>

                                        </div>

                                        <div class="stock-box">
                                            Active
                                        </div>

                                    </div>

                                    <div class="product-footer">

                                        <button
                                            class="btn-product btn-edit"
                                            onclick="editProduct(${item.id})">

                                            <i class="fa-solid fa-pen me-2"></i>

                                            Edit

                                        </button>

                                        <button
                                            class="btn-product btn-view"
                                            onclick="viewProduct(${item.id})">

                                            <i class="fa-solid fa-eye me-2"></i>

                                            View

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    `;
               });

            } else {

               html = `
                    <div class="col-12">

                        <div class="alert alert-warning text-center">

                            No Product Found

                        </div>

                    </div>
                `;
            }

            document.getElementById('productGrid').innerHTML = html;

         })
         .catch(error => {

            console.error(error);

            document.getElementById('productGrid').innerHTML = `
                     <div class="col-12">

                        <div class="alert alert-danger text-center">

                              Failed Load Product

                        </div>

                     </div>
                  `;

         });

   }

   function editProduct(id) {

      window.location.href =
         'product-edit.php?id=' + id;

   }

   function viewProduct(id) {

      window.location.href =
         'product-view.php?id=' + id;

   }
</script>
<script>
   function loadProductTable(categoryId = '') {
      showTableSkeleton();
      let url = '../controller/productController.php';

      if (categoryId) {
         url += '?category_id=' + categoryId;
      }

      fetch(url)
         .then(response => response.json())
         .then(res => {

            setTimeout(() => {

               // render data

            }, 500);


            let html = '';

            if (res.success && res.data.length > 0) {

               res.data.forEach(item => {

                  let imageUrl =
                     item.image_url?.trim() ?
                     item.image_url :
                     'assets/images/no-image.png';

                  let badgeClass = 'badge-success';
                  let statusText = 'Active';

                  html += `
                    <tr>

                        <td>

                            <div class="product-table-info d-flex align-items-center gap-3">

                                <img
                                    src="${imageUrl}"
                                    onerror="this.src='assets/images/404.png'"
                                    style="
                                        width:60px;
                                        height:60px;
                                        object-fit:cover;
                                        border-radius:12px;
                                    ">

                                <div>

                                    <h6 class="mb-1">
                                        ${item.name}
                                    </h6>

                                    <span class="text-muted">
                                        ID-${item.id}
                                    </span>

                                </div>

                            </div>

                        </td>

                        <td>
                            ${item.category_name ?? '-'}
                        </td>

                        <td>
                            Rp ${Number(item.price).toLocaleString('id-ID')}
                        </td>

                        <td>
                            -
                        </td>

                        <td>

                            <span class="badge-status ${badgeClass}">
                                ${statusText}
                            </span>

                        </td>

                        <td>
                            -
                        </td>

                        <td>

                            <div class="table-action d-flex gap-2">

                                <button
                                    class="action-btn"
                                    onclick="editProduct(${item.id})">

                                    <i class="fa-solid fa-pen"></i>

                                </button>

                                <button
                                    class="action-btn"
                                    onclick="deleteProduct(${item.id})">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </div>

                        </td>

                    </tr>
                    `;
               });

            } else {

               html = `
                    <tr>
                        <td colspan="7" class="text-center">
                            No Product Found
                        </td>
                    </tr>
                `;
            }

            $('#productTableBody').html(html);

            if ($.fn.DataTable.isDataTable('#productDataTable')) {
               $('#productDataTable').DataTable().destroy();
            }
            let table = $('#productDataTable').DataTable({
               responsive: true,
               pageLength: 10
            });

            $('.search-input')
               .off('keyup')
               .on('keyup', function() {

                  table.search(this.value).draw();

               });

         })
         .catch(error => {

            console.error(error);

            $('#productTableBody').html(`
                <tr>
                    <td colspan="7" class="text-center text-danger">
                        Failed Load Product
                    </td>
                </tr>
            `);

         });

   }

   document.querySelector('.search-input')
      .addEventListener('keyup', function() {

         const keyword = this.value.toLowerCase();

         document
            .querySelectorAll('#productGrid .product-card')
            .forEach(card => {

               const text =
                  card.innerText.toLowerCase();

               card.parentElement.style.display =
                  text.includes(keyword) ?
                  '' :
                  'none';

            });

      });

   function editProduct(id) {

      window.location.href =
         'product-edit.php?id=' + id;

   }

   function deleteProduct(id) {

      if (!confirm('Delete this product?')) {
         return;
      }

      console.log('Delete Product', id);

   }
</script>

<script>
   document.addEventListener('DOMContentLoaded', () => {

      // =====================================
      // MODAL INSTANCE
      // =====================================
      const productModal = new bootstrap.Modal(

         document.getElementById('productModal')

      );

      // =====================================
      // OPEN MODAL
      // =====================================
      document
         .getElementById('btnAddProduct')

         .addEventListener('click', () => {

            productModal.show();

         });

      // =====================================
      // SUBMIT FORM
      // =====================================
      document
         .getElementById('productForm')

         .addEventListener('submit', function(e) {

            e.preventDefault();

            // DEMO ALERT
            alert('Product saved successfully 🚀');

            productModal.hide();

            this.reset();

         });

   });

   function showGridSkeleton() {

      let html = '';

      for (let i = 0; i < 6; i++) {

         html += `
        <div class="col-lg-4 col-md-6">

            <div class="product-card">

                <div
                    class="skeleton"
                    style="height:220px;">
                </div>

                <div class="p-3">

                    <div
                        class="skeleton mb-2"
                        style="height:15px;width:100px;">
                    </div>

                    <div
                        class="skeleton mb-2"
                        style="height:20px;">
                    </div>

                    <div
                        class="skeleton"
                        style="height:15px;width:80%;">
                    </div>

                </div>

            </div>

        </div>
        `;
      }

      document.getElementById('productGrid').innerHTML = html;
   }

   function showTableSkeleton() {

      let html = '';

      for (let i = 0; i < 8; i++) {

         html += `
        <tr>

            <td>
                <div class="d-flex gap-3 align-items-center">

                    <div
                        class="skeleton"
                        style="
                            width:60px;
                            height:60px;
                            border-radius:12px;">
                    </div>

                    <div style="width:150px">

                        <div
                            class="skeleton mb-2"
                            style="height:16px;">
                        </div>

                        <div
                            class="skeleton"
                            style="
                                height:12px;
                                width:70%;">
                        </div>

                    </div>

                </div>
            </td>

            <td><div class="skeleton" style="height:15px"></div></td>
            <td><div class="skeleton" style="height:15px"></div></td>
            <td><div class="skeleton" style="height:15px"></div></td>
            <td><div class="skeleton" style="height:15px"></div></td>
            <td><div class="skeleton" style="height:15px"></div></td>
            <td><div class="skeleton" style="height:35px"></div></td>

        </tr>
        `;
      }

      $('#productTableBody').html(html);
   }
</script>

</html>