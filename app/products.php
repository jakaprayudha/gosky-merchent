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

   <style>
      /* PAGE HEADER */
      .page-header {
         display: flex;
         justify-content: space-between;
         align-items: center;

         margin-bottom: 28px;

         gap: 20px;
         flex-wrap: wrap;
      }

      .page-title h2 {
         font-size: 32px;
         font-weight: 700;
         color: var(--text);

         margin-bottom: 8px;
      }

      .page-title p {
         margin: 0;
         color: var(--text-light);
         font-size: 14px;
      }

      /* FILTER */
      .filter-wrapper {
         display: flex;
         gap: 16px;
         flex-wrap: wrap;
      }

      .search-box {
         position: relative;
      }

      .search-box i {
         position: absolute;
         left: 18px;
         top: 50%;
         transform: translateY(-50%);
         color: #999;
      }

      .search-input {
         width: 280px;
         height: 56px;

         border: none;
         outline: none;

         border-radius: 18px;

         background: white;

         padding:
            0 20px 0 50px;

         box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.05);

         font-size: 14px;
      }

      .filter-select {
         height: 56px;

         border: none;
         outline: none;

         border-radius: 18px;

         background: white;

         padding:
            0 18px;

         min-width: 170px;

         box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.05);

         font-size: 14px;
      }

      /* PRODUCT GRID */
      .product-card {
         background: white;

         border-radius: 30px;

         overflow: hidden;

         box-shadow:
            0 12px 35px rgba(0, 0, 0, 0.05);

         transition: 0.3s ease;

         height: 100%;
      }

      .product-card:hover {
         transform: translateY(-6px);
      }

      .product-image {
         position: relative;
         height: 240px;
         overflow: hidden;
      }

      .product-image img {
         width: 100%;
         height: 100%;
         object-fit: cover;

         transition: 0.4s ease;
      }

      .product-card:hover .product-image img {
         transform: scale(1.06);
      }

      .product-badge {
         position: absolute;

         top: 18px;
         left: 18px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #deab00);

         color: white;

         padding:
            8px 14px;

         border-radius: 14px;

         font-size: 12px;
         font-weight: 600;

         box-shadow:
            0 10px 20px rgba(244, 196, 0, 0.28);
      }

      .product-action {
         position: absolute;

         top: 18px;
         right: 18px;

         display: flex;
         flex-direction: column;
         gap: 10px;
      }

      .product-action button {
         width: 42px;
         height: 42px;

         border: none;

         border-radius: 14px;

         background:
            rgba(255, 255, 255, 0.92);

         backdrop-filter: blur(10px);

         color: #555;

         transition: 0.3s ease;
      }

      .product-action button:hover {
         background: var(--primary);
         color: white;
      }

      .product-body {
         padding: 24px;
      }

      .product-category {
         color: var(--primary-dark);

         font-size: 12px;
         font-weight: 600;

         margin-bottom: 10px;
      }

      .product-name {
         font-size: 22px;
         font-weight: 700;

         color: var(--text);

         margin-bottom: 10px;
      }

      .product-desc {
         color: var(--text-light);

         font-size: 14px;

         line-height: 1.8;

         margin-bottom: 22px;
      }

      .product-meta {
         display: flex;
         justify-content: space-between;
         align-items: center;

         margin-bottom: 22px;
      }

      .product-price h4 {
         margin: 0;

         font-size: 28px;
         font-weight: 700;

         color: var(--text);
      }

      .product-price span {
         color: var(--text-light);
         font-size: 13px;
      }

      .stock-box {
         background:
            rgba(25, 190, 107, 0.12);

         color: #19be6b;

         padding:
            10px 16px;

         border-radius: 14px;

         font-size: 12px;
         font-weight: 600;
      }

      .stock-low {
         background:
            rgba(255, 170, 0, 0.12);

         color: #ffae00;
      }

      .product-footer {
         display: flex;
         gap: 14px;
      }

      .btn-product {
         flex: 1;

         height: 54px;

         border: none;
         border-radius: 18px;

         font-weight: 600;
         font-size: 14px;

         transition: 0.3s ease;
      }

      .btn-edit {
         background: #f5f5f5;
         color: #555;
      }

      .btn-edit:hover {
         background: #ececec;
      }

      .btn-view {
         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         color: white;

         box-shadow:
            0 12px 24px rgba(244, 196, 0, 0.22);
      }

      .btn-view:hover {
         transform: translateY(-2px);
      }

      /* MOBILE */
      @media (max-width: 768px) {

         .page-header {
            flex-direction: column;
            align-items: flex-start;
         }

         .filter-wrapper {
            width: 100%;
         }

         .search-box,
         .search-input,
         .filter-select {
            width: 100%;
         }

         .product-image {
            height: 220px;
         }

         .product-name {
            font-size: 20px;
         }

         .product-price h4 {
            font-size: 24px;
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

         <!-- PAGE HEADER -->
         <div class="page-header">

            <div class="page-title">

               <h2>
                  Products Management 📦
               </h2>

               <p>
                  Manage all products, stock and pricing.
               </p>

            </div>

            <div class="filter-wrapper">

               <div class="search-box">

                  <i class="fa-solid fa-magnifying-glass"></i>

                  <input type="text"
                     class="search-input"
                     placeholder="Search products...">

               </div>

               <select class="filter-select">

                  <option>All Category</option>
                  <option>Electronics</option>
                  <option>Fashion</option>
                  <option>Furniture</option>

               </select>

               <button class="btn btn-primary-custom">

                  <i class="fa-solid fa-plus me-2"></i>

                  Add Product

               </button>

            </div>

         </div>

         <!-- PRODUCTS -->
         <div class="row g-4">

            <!-- PRODUCT -->
            <div class="col-lg-4 col-md-6">

               <div class="product-card">

                  <div class="product-image">

                     <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=1200&auto=format&fit=crop"
                        alt="product">

                     <div class="product-badge">
                        Best Seller
                     </div>

                     <div class="product-action">

                        <button>
                           <i class="fa-regular fa-heart"></i>
                        </button>

                        <button>
                           <i class="fa-solid fa-ellipsis"></i>
                        </button>

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
                        Premium flagship smartphone with
                        titanium design and modern features.
                     </div>

                     <div class="product-meta">

                        <div class="product-price">

                           <h4>$1,299</h4>

                           <span>Per Unit</span>

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

                     <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1200&auto=format&fit=crop"
                        alt="product">

                     <div class="product-badge">
                        New
                     </div>

                     <div class="product-action">

                        <button>
                           <i class="fa-regular fa-heart"></i>
                        </button>

                        <button>
                           <i class="fa-solid fa-ellipsis"></i>
                        </button>

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
                        Modern lifestyle sneakers with
                        premium comfort and design.
                     </div>

                     <div class="product-meta">

                        <div class="product-price">

                           <h4>$420</h4>

                           <span>Per Pair</span>

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

            <!-- PRODUCT -->
            <div class="col-lg-4 col-md-6">

               <div class="product-card">

                  <div class="product-image">

                     <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200&auto=format&fit=crop"
                        alt="product">

                     <div class="product-badge">
                        Trending
                     </div>

                     <div class="product-action">

                        <button>
                           <i class="fa-regular fa-heart"></i>
                        </button>

                        <button>
                           <i class="fa-solid fa-ellipsis"></i>
                        </button>

                     </div>

                  </div>

                  <div class="product-body">

                     <div class="product-category">
                        Furniture
                     </div>

                     <div class="product-name">
                        Modern Chair
                     </div>

                     <div class="product-desc">
                        Elegant minimalist chair for
                        workspace and home interior.
                     </div>

                     <div class="product-meta">

                        <div class="product-price">

                           <h4>$210</h4>

                           <span>Per Unit</span>

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

         </div>

      </div>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAVIGATION -->
   <?php require 'partial/sidebar-mobile.php'; ?>

</body>

</html>