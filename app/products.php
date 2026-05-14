<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Products Management</title>

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

   <!-- Font Awesome -->
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

   <!-- Custom CSS -->
   <link rel="stylesheet"
      href="assets/css/style.css">

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

                  <h3>
                     248
                  </h3>

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

                  <h3>
                     220
                  </h3>

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

                  <h3>
                     18
                  </h3>

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

                  <h3>
                     10
                  </h3>

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
               <select class="filter-select">

                  <option>
                     All Category
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
               <button class="btn btn-primary-custom">

                  <i class="fa-solid fa-plus me-2"></i>

                  Add Product

               </button>

            </div>

         </div>

         <!-- PRODUCT GRID -->
         <div class="row g-4"
            id="productGrid">

            <!-- PRODUCT -->
            <div class="col-lg-4 col-md-6">

               <div class="product-card">

                  <div class="product-image">

                     <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=1200&auto=format&fit=crop">

                     <div class="product-badge">

                        Best Seller

                     </div>

                  </div>

                  <div class="product-body">

                     <div class="product-category">

                        Electronics

                     </div>

                     <div class="product-name">

                        iPhone 15 Pro Max

                     </div>

                     <div class="product-desc">

                        Premium flagship smartphone with titanium design.

                     </div>

                     <div class="product-meta">

                        <div class="product-price">

                           <h4>
                              $1,299
                           </h4>

                           <span>
                              Per Unit
                           </span>

                        </div>

                        <div class="stock-box">

                           In Stock

                        </div>

                     </div>

                     <div class="product-footer">

                        <button class="btn-product btn-edit">

                           <i class="fa-solid fa-pen me-2"></i>

                           Edit

                        </button>

                        <button class="btn-product btn-view">

                           <i class="fa-solid fa-eye me-2"></i>

                           View

                        </button>

                     </div>

                  </div>

               </div>

            </div>

            <!-- PRODUCT -->
            <div class="col-lg-4 col-md-6">

               <div class="product-card">

                  <div class="product-image">

                     <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1200&auto=format&fit=crop">

                     <div class="product-badge">

                        Trending

                     </div>

                  </div>

                  <div class="product-body">

                     <div class="product-category">

                        Fashion

                     </div>

                     <div class="product-name">

                        Nike Air Jordan

                     </div>

                     <div class="product-desc">

                        Modern sneakers with premium comfort.

                     </div>

                     <div class="product-meta">

                        <div class="product-price">

                           <h4>
                              $420
                           </h4>

                           <span>
                              Per Pair
                           </span>

                        </div>

                        <div class="stock-box stock-low">

                           Low Stock

                        </div>

                     </div>

                     <div class="product-footer">

                        <button class="btn-product btn-edit">

                           <i class="fa-solid fa-pen me-2"></i>

                           Edit

                        </button>

                        <button class="btn-product btn-view">

                           <i class="fa-solid fa-eye me-2"></i>

                           View

                        </button>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <!-- PRODUCT TABLE -->
         <div class="content-card mt-4 d-none"
            id="productTable">

            <div class="table-responsive">

               <table class="table-custom">

                  <thead>

                     <tr>

                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Sales</th>
                        <th>Action</th>

                     </tr>

                  </thead>

                  <tbody>

                     <tr>

                        <td>

                           <div class="product-table-info">

                              <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=300">

                              <div>

                                 <h6>
                                    iPhone 15 Pro Max
                                 </h6>

                                 <span>
                                    SKU-1024
                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           Electronics
                        </td>

                        <td>
                           $1,299
                        </td>

                        <td>
                           120
                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              Active

                           </span>

                        </td>

                        <td>
                           1.2K
                        </td>

                        <td>

                           <div class="table-action">

                              <button class="action-btn">

                                 <i class="fa-solid fa-pen"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-trash"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                  </tbody>

               </table>

            </div>

         </div>

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

</body>

</html>