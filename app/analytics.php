<!DOCTYPE html>
<html lang="id">

<head>

   <meta charset="UTF-8">

   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Analytics Dashboard</title>

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

   <!-- Font Awesome -->
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

   <!-- ApexCharts -->
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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

            <!-- REVENUE -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-wallet"></i>

                  </div>

                  <h3>
                     $48.2K
                  </h3>

                  <p>
                     Total Revenue
                  </p>

               </div>

            </div>

            <!-- ORDERS -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-cart-shopping"></i>

                  </div>

                  <h3>
                     8,420
                  </h3>

                  <p>
                     Total Orders
                  </p>

               </div>

            </div>

            <!-- CUSTOMERS -->
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

            <!-- GROWTH -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-chart-line"></i>

                  </div>

                  <h3>
                     +18%
                  </h3>

                  <p>
                     Monthly Growth
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
                     placeholder="Search analytics...">

               </div>

               <!-- DATE -->
               <select class="filter-select">

                  <option>
                     Last 7 Days
                  </option>

                  <option>
                     Last 30 Days
                  </option>

                  <option>
                     Last 6 Months
                  </option>

                  <option>
                     This Year
                  </option>

               </select>

               <!-- EXPORT -->
               <button class="btn-primary-custom">

                  <i class="fa-solid fa-file-export me-2"></i>

                  Export Report

               </button>

            </div>

         </div>

         <!-- CHARTS -->
         <div class="row g-4">

            <!-- SALES CHART -->
            <div class="col-xl-8">

               <div class="content-card">

                  <div class="card-header-custom">

                     <div>

                        <h4>

                           Sales Overview

                        </h4>

                        <p class="text-muted mb-0">

                           Monthly sales performance

                        </p>

                     </div>

                  </div>

                  <div id="salesChart"></div>

               </div>

            </div>

            <!-- DONUT -->
            <div class="col-xl-4">

               <div class="content-card">

                  <div class="card-header-custom">

                     <div>

                        <h4>

                           Orders Status

                        </h4>

                        <p class="text-muted mb-0">

                           Current order statistics

                        </p>

                     </div>

                  </div>

                  <div id="orderChart"></div>

               </div>

            </div>

         </div>

         <!-- TABLE -->
         <div class="content-card mt-4">

            <div class="card-header-custom">

               <div>

                  <h4>

                     Top Selling Products

                  </h4>

                  <p class="text-muted mb-0">

                     Best performance products this month

                  </p>

               </div>

            </div>

            <div class="table-responsive">

               <table class="table-custom">

                  <thead>

                     <tr>

                        <th>Product</th>
                        <th>Category</th>
                        <th>Orders</th>
                        <th>Revenue</th>
                        <th>Growth</th>
                        <th>Status</th>

                     </tr>

                  </thead>

                  <tbody>

                     <!-- ITEM -->
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

                           <strong>
                              1,240
                           </strong>

                        </td>

                        <td>

                           <strong>
                              $84,200
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              +18%

                           </span>

                        </td>

                        <td>

                           <span class="badge-status badge-success">

                              Best Seller

                           </span>

                        </td>

                     </tr>

                     <!-- ITEM -->
                     <tr>

                        <td>

                           <div class="product-table-info">

                              <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=300">

                              <div>

                                 <h6>
                                    Nike Air Jordan
                                 </h6>

                                 <span>
                                    SKU-2048
                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           Fashion
                        </td>

                        <td>

                           <strong>
                              842
                           </strong>

                        </td>

                        <td>

                           <strong>
                              $41,320
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-warning">

                              +9%

                           </span>

                        </td>

                        <td>

                           <span class="badge-status badge-warning">

                              Trending

                           </span>

                        </td>

                     </tr>

                     <!-- ITEM -->
                     <tr>

                        <td>

                           <div class="product-table-info">

                              <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=300">

                              <div>

                                 <h6>
                                    Sony Headphone
                                 </h6>

                                 <span>
                                    SKU-3091
                                 </span>

                              </div>

                           </div>

                        </td>

                        <td>
                           Audio
                        </td>

                        <td>

                           <strong>
                              420
                           </strong>

                        </td>

                        <td>

                           <strong>
                              $18,920
                           </strong>

                        </td>

                        <td>

                           <span class="badge-status badge-danger">

                              -2%

                           </span>

                        </td>

                        <td>

                           <span class="badge-status badge-danger">

                              Decrease

                           </span>

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

   <!-- CHART SCRIPT -->
   <script>
      /*
      |--------------------------------------------------------------------------
      | SALES CHART
      |--------------------------------------------------------------------------
      */

      const salesOptions = {

         chart: {

            type: 'area',
            height: 350,
            toolbar: {
               show: false
            }

         },

         series: [{

            name: 'Revenue',

            data: [1200, 1800, 1400, 2200, 2800, 2600, 3400]

         }],

         xaxis: {

            categories: [
               'Mon',
               'Tue',
               'Wed',
               'Thu',
               'Fri',
               'Sat',
               'Sun'
            ]

         },

         stroke: {

            curve: 'smooth',
            width: 4

         },

         colors: ['#f4c400'],

         fill: {

            type: 'gradient',

            gradient: {

               shadeIntensity: 1,
               opacityFrom: 0.45,
               opacityTo: 0.05

            }

         },

         dataLabels: {
            enabled: false
         },

         grid: {

            borderColor: '#f1f1f1'

         }

      };

      const salesChart =
         new ApexCharts(
            document.querySelector("#salesChart"),
            salesOptions
         );

      salesChart.render();

      /*
      |--------------------------------------------------------------------------
      | ORDER CHART
      |--------------------------------------------------------------------------
      */

      const orderOptions = {

         chart: {

            type: 'donut',
            height: 350

         },

         series: [64, 24, 12],

         labels: [
            'Completed',
            'Processing',
            'Cancelled'
         ],

         colors: [
            '#19be6b',
            '#f4c400',
            '#ff4d4f'
         ],

         legend: {

            position: 'bottom'

         },

         dataLabels: {
            enabled: false
         }

      };

      const orderChart =
         new ApexCharts(
            document.querySelector("#orderChart"),
            orderOptions
         );

      orderChart.render();
   </script>

</body>

</html>