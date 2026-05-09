<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Modern Admin Dashboard</title>

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
   <link rel="stylesheet" href="assets/css/style.css">

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

         <!-- STATS -->
         <div class="row g-4">

            <div class="col-lg-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">
                     <i class="fa-solid fa-users"></i>
                  </div>

                  <h3>12.4K</h3>

                  <p>Total Users</p>

               </div>

            </div>

            <div class="col-lg-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">
                     <i class="fa-solid fa-cart-shopping"></i>
                  </div>

                  <h3>8.2K</h3>

                  <p>Total Orders</p>

               </div>

            </div>

            <div class="col-lg-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">
                     <i class="fa-solid fa-wallet"></i>
                  </div>

                  <h3>$48K</h3>

                  <p>Total Revenue</p>

               </div>

            </div>

            <div class="col-lg-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">
                     <i class="fa-solid fa-chart-line"></i>
                  </div>

                  <h3>89%</h3>

                  <p>Growth Rate</p>

               </div>

            </div>

         </div>

         <!-- TABLE -->
         <div class="content-card">

            <div class="card-header-custom">

               <h4>
                  Recent Transactions
               </h4>

               <button class="btn btn-primary-custom">

                  <i class="fa-solid fa-plus me-2"></i>

                  Add New

               </button>

            </div>

            <div class="table-responsive">

               <table class="table-custom">

                  <thead>

                     <tr>

                        <th>ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action</th>

                     </tr>

                  </thead>

                  <tbody>

                     <tr>

                        <td>#INV-1024</td>
                        <td>Michael Jordan</td>
                        <td>Premium Package</td>

                        <td>

                           <span class="badge-status badge-success">
                              Completed
                           </span>

                        </td>

                        <td>09 May 2026</td>

                        <td>$420</td>

                        <td>

                           <button class="action-btn">

                              <i class="fa-solid fa-pen"></i>

                           </button>

                        </td>

                     </tr>

                     <tr>

                        <td>#INV-1025</td>
                        <td>Sarah Smith</td>
                        <td>Enterprise Plan</td>

                        <td>

                           <span class="badge-status badge-warning">
                              Pending
                           </span>

                        </td>

                        <td>09 May 2026</td>

                        <td>$850</td>

                        <td>

                           <button class="action-btn">

                              <i class="fa-solid fa-pen"></i>

                           </button>

                        </td>

                     </tr>

                     <tr>

                        <td>#INV-1026</td>
                        <td>Daniel Walker</td>
                        <td>Starter Plan</td>

                        <td>

                           <span class="badge-status badge-danger">
                              Cancelled
                           </span>

                        </td>

                        <td>08 May 2026</td>

                        <td>$120</td>

                        <td>

                           <button class="action-btn">

                              <i class="fa-solid fa-pen"></i>

                           </button>

                        </td>

                     </tr>

                  </tbody>

               </table>

            </div>

         </div>

      </div>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php' ?>

   <!-- MOBILE NAVIGATION -->

   <?php require 'partial/sidebar-mobile.php' ?>
</body>

</html>