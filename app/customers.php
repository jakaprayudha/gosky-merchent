<!DOCTYPE html>
<html lang="id">

<head>

   <meta charset="UTF-8">

   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Customers Management</title>

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

            <!-- TOTAL -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-users"></i>

                  </div>

                  <h3>
                     12.4K
                  </h3>

                  <p>
                     Total Customers
                  </p>

               </div>

            </div>

            <!-- ACTIVE -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-user-check"></i>

                  </div>

                  <h3>
                     9.2K
                  </h3>

                  <p>
                     Active Customers
                  </p>

               </div>

            </div>

            <!-- NEW -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-user-plus"></i>

                  </div>

                  <h3>
                     248
                  </h3>

                  <p>
                     New This Month
                  </p>

               </div>

            </div>

            <!-- VIP -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-crown"></i>

                  </div>

                  <h3>
                     180
                  </h3>

                  <p>
                     VIP Customers
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
                     placeholder="Search customer...">

               </div>

               <!-- STATUS -->
               <select class="filter-select">

                  <option>
                     All Customers
                  </option>

                  <option>
                     Active
                  </option>

                  <option>
                     Inactive
                  </option>

                  <option>
                     VIP
                  </option>

               </select>

               <!-- SORT -->
               <select class="filter-select">

                  <option>
                     Latest Activity
                  </option>

                  <option>
                     Most Orders
                  </option>

                  <option>
                     Highest Spending
                  </option>

               </select>

            </div>

         </div>

         <!-- CUSTOMER TABLE -->
         <div class="content-card">

            <div class="card-header-custom">

               <h4>

                  Customer List

               </h4>

            </div>

            <div class="table-responsive">

               <table class="table-custom">

                  <thead>

                     <tr>

                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Total Orders</th>
                        <th>Total Spending</th>
                        <th>Status</th>
                        <th>Last Order</th>
                        <th>Action</th>

                     </tr>

                  </thead>

                  <tbody>

                     <!-- ITEM -->
                     <tr>

                        <td>

                           <div class="product-table-info">

                              <img src="https://i.pravatar.cc/120?img=11">

                              <div>

                                 <h6>
                                    Michael Jordan
                                 </h6>

                                 <span>
                                    Customer ID : #CUS-1024
                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           +62 812 3456 7890
                        </td>

                        <td>
                           michael@mail.com
                        </td>

                        <td>

                           <strong>
                              48 Orders
                           </strong>

                        </td>

                        <td>

                           <strong>
                              $4,820
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              Active

                           </span>

                        </td>

                        <td>
                           09 May 2026
                        </td>

                        <td>

                           <div class="table-action">

                              <button class="action-btn">

                                 <i class="fa-solid fa-eye"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-message"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                     <!-- ITEM -->
                     <tr>

                        <td>

                           <div class="product-table-info">

                              <img src="https://i.pravatar.cc/120?img=21">

                              <div>

                                 <h6>
                                    Sarah Smith
                                 </h6>

                                 <span>
                                    Customer ID : #CUS-1025
                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           +62 822 4455 9988
                        </td>

                        <td>
                           sarah@mail.com
                        </td>

                        <td>

                           <strong>
                              20 Orders
                           </strong>

                        </td>

                        <td>

                           <strong>
                              $1,240
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-warning">

                              VIP

                           </span>

                        </td>

                        <td>
                           08 May 2026
                        </td>

                        <td>

                           <div class="table-action">

                              <button class="action-btn">

                                 <i class="fa-solid fa-eye"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-message"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                     <!-- ITEM -->
                     <tr>

                        <td>

                           <div class="product-table-info">

                              <img src="https://i.pravatar.cc/120?img=31">

                              <div>

                                 <h6>
                                    Daniel Walker
                                 </h6>

                                 <span>
                                    Customer ID : #CUS-1026
                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           +62 877 8899 6655
                        </td>

                        <td>
                           daniel@mail.com
                        </td>

                        <td>

                           <strong>
                              6 Orders
                           </strong>

                        </td>

                        <td>

                           <strong>
                              $320
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-danger">

                              Inactive

                           </span>

                        </td>

                        <td>
                           01 May 2026
                        </td>

                        <td>

                           <div class="table-action">

                              <button class="action-btn">

                                 <i class="fa-solid fa-eye"></i>

                              </button>

                              <button class="action-btn">

                                 <i class="fa-solid fa-message"></i>

                              </button>

                           </div>

                        </td>

                     </tr>

                  </tbody>

               </table>

            </div>

         </div>

      </div>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAV -->
   <?php require 'partial/sidebar-mobile.php'; ?>

</body>

</html>