<!DOCTYPE html>
<html lang="id">

<head>

   <meta charset="UTF-8">

   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Orders Management</title>

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

         <!-- STATS -->
         <div class="row g-4 mb-4">

            <!-- TOTAL ORDER -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-bag-shopping"></i>

                  </div>

                  <h3>
                     1,248
                  </h3>

                  <p>
                     Total Orders
                  </p>

               </div>

            </div>

            <!-- PROCESS -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-clock"></i>

                  </div>

                  <h3>
                     84
                  </h3>

                  <p>
                     Processing
                  </p>

               </div>

            </div>

            <!-- COMPLETED -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-circle-check"></i>

                  </div>

                  <h3>
                     1,002
                  </h3>

                  <p>
                     Completed
                  </p>

               </div>

            </div>

            <!-- CANCEL -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-circle-xmark"></i>

                  </div>

                  <h3>
                     52
                  </h3>

                  <p>
                     Cancelled
                  </p>

               </div>

            </div>

         </div>

         <!-- FILTER -->
         <div class="page-header">

            <div class="filter-wrapper">

               <!-- SEARCH -->
               <div class="search-box">

                  <i class="fa-solid fa-magnifying-glass"></i>

                  <input type="text"
                     class="search-input"
                     placeholder="Search order, customer...">

               </div>

               <!-- STATUS -->
               <select class="filter-select">

                  <option>
                     All Status
                  </option>

                  <option>
                     Pending
                  </option>

                  <option>
                     Processing
                  </option>

                  <option>
                     Completed
                  </option>

                  <option>
                     Cancelled
                  </option>

               </select>

               <!-- DATE -->
               <select class="filter-select">

                  <option>
                     Today
                  </option>

                  <option>
                     This Week
                  </option>

                  <option>
                     This Month
                  </option>

               </select>

            </div>

         </div>

         <!-- DATATABLE CSS -->
         <link rel="stylesheet"
            href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

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
         </style>

         <!-- ORDERS TABLE -->
         <div class="content-card">

            <div class="card-header-custom">

               <h4>

                  Recent Orders

               </h4>

            </div>

            <div class="table-responsive">

               <table
                  id="ordersTable"
                  class="table align-middle table-hover mb-0">

                  <thead>

                     <tr>

                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th width="100">Action</th>

                     </tr>

                  </thead>

                  <tbody>

                     <!-- ORDER -->
                     <tr>

                        <td>

                           <strong>
                              #ORD-1024
                           </strong>

                        </td>

                        <td>

                           <div class="product-table-info d-flex align-items-center gap-3">

                              <img
                                 src="https://i.pravatar.cc/120?img=12"
                                 style="
                           width:55px;
                           height:55px;
                           border-radius:50%;
                           object-fit:cover;
                        ">

                              <div>

                                 <h6 class="mb-1">

                                    Michael Jordan

                                 </h6>

                                 <span class="text-muted">

                                    michael@mail.com

                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           4 Items
                        </td>

                        <td>

                           <strong>
                              $420
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-warning">

                              Processing

                           </span>

                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              Paid

                           </span>

                        </td>

                        <td>
                           09 May 2026
                        </td>

                        <td>

                           <div class="table-action d-flex gap-2">

                              <button class="action-btn">

                                 <i class="fa-solid fa-eye"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-print"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                     <!-- ORDER -->
                     <tr>

                        <td>

                           <strong>
                              #ORD-1025
                           </strong>

                        </td>

                        <td>

                           <div class="product-table-info d-flex align-items-center gap-3">

                              <img
                                 src="https://i.pravatar.cc/120?img=22"
                                 style="
                           width:55px;
                           height:55px;
                           border-radius:50%;
                           object-fit:cover;
                        ">

                              <div>

                                 <h6 class="mb-1">

                                    Sarah Smith

                                 </h6>

                                 <span class="text-muted">

                                    sarah@mail.com

                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           2 Items
                        </td>

                        <td>

                           <strong>
                              $189
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              Completed

                           </span>

                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              Paid

                           </span>

                        </td>

                        <td>
                           09 May 2026
                        </td>

                        <td>

                           <div class="table-action d-flex gap-2">

                              <button class="action-btn">

                                 <i class="fa-solid fa-eye"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-print"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                     <!-- ORDER -->
                     <tr>

                        <td>

                           <strong>
                              #ORD-1026
                           </strong>

                        </td>

                        <td>

                           <div class="product-table-info d-flex align-items-center gap-3">

                              <img
                                 src="https://i.pravatar.cc/120?img=32"
                                 style="
                           width:55px;
                           height:55px;
                           border-radius:50%;
                           object-fit:cover;
                        ">

                              <div>

                                 <h6 class="mb-1">

                                    Daniel Walker

                                 </h6>

                                 <span class="text-muted">

                                    daniel@mail.com

                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           1 Item
                        </td>

                        <td>

                           <strong>
                              $89
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-danger">

                              Cancelled

                           </span>

                        </td>

                        <td>

                           <span class="badge-status badge-warning">

                              Refund

                           </span>

                        </td>

                        <td>
                           08 May 2026
                        </td>

                        <td>

                           <div class="table-action d-flex gap-2">

                              <button class="action-btn">

                                 <i class="fa-solid fa-eye"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-print"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                  </tbody>

               </table>

            </div>

         </div>

         <!-- JQUERY -->
         <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

         <!-- DATATABLE -->
         <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

         <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

         <script>
            $(document).ready(function() {

               // =====================================
               // DATATABLE
               // =====================================
               const table = $('#ordersTable').DataTable({

                  responsive: true,

                  pageLength: 5,

                  lengthMenu: [
                     [5, 10, 25, 50],
                     [5, 10, 25, 50]
                  ],

                  // 🔥 HIDE DEFAULT SEARCH
                  dom: '<"d-flex justify-content-between align-items-center mb-3"l>rt<"d-flex justify-content-between align-items-center mt-3"ip>',

                  language: {

                     lengthMenu: "Show _MENU_ entries",

                     info: "Showing _START_ to _END_ of _TOTAL_ orders",

                     paginate: {

                        previous: '<i class="fa-solid fa-angle-left"></i>',

                        next: '<i class="fa-solid fa-angle-right"></i>'

                     },

                     emptyTable: "No orders available"

                  }

               });

               // =====================================
               // CUSTOM SEARCH
               // =====================================
               $('.search-input').on('keyup', function() {

                  table.search(this.value).draw();

               });

            });
         </script>

      </div>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAVIGATION -->
   <?php require 'partial/sidebar-mobile.php'; ?>

</body>

</html>