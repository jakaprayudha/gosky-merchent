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
   <style>
      .table-scroll {

         max-height: 500px;

         overflow-y: auto;

         overflow-x: auto;

         border-radius: 16px;

      }

      .table-scroll thead th {

         position: sticky;

         top: 0;

         z-index: 10;

         background: #fff;

         box-shadow: 0 1px 0 rgba(0, 0, 0, .05);

      }

      .skeleton {

         position: relative;

         overflow: hidden;

         background: #e9ecef !important;

         color: transparent !important;

         border-radius: 8px;

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

      .chart-skeleton {

         height: 350px;

         border-radius: 16px;

         background: #f3f4f6;

         position: relative;

         overflow: hidden;

      }

      .chart-skeleton::after {

         content: '';

         position: absolute;

         top: 0;
         left: -200px;

         width: 200px;
         height: 100%;

         background: linear-gradient(90deg,
               transparent,
               rgba(255, 255, 255, .8),
               transparent);

         animation: shimmer 1.3s infinite;

      }

      .table-skeleton td {

         height: 70px;

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

         <!-- STATS -->
         <div class="row g-4 mb-4">

            <!-- REVENUE -->
            <div class="col-xl-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">

                     <i class="fa-solid fa-wallet"></i>

                  </div>

                  <h3 class="skeleton" id="totalRevenue">Rp 0</h3>

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

                  <h3 class="skeleton" id="totalOrders">0</h3>

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

                  <h3 class="skeleton" id="totalCustomers">0</h3>

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
                  <h3 class="skeleton" id="monthlyGrowth">0%</h3>

                  <p>
                     Monthly Growth
                  </p>

               </div>

            </div>

         </div>

         <!-- FILTER -->
         <div class="row g-2">

            <div class="filter-wrapper">


               <select
                  id="periodFilter"
                  class="filter-select">

                  <option value="7">
                     Last 7 Days
                  </option>

                  <option value="30">
                     Last 30 Days
                  </option>

                  <option value="180">
                     Last 6 Months
                  </option>

                  <option value="365">
                     This Year
                  </option>

               </select>

               <!-- EXPORT -->
               <button class="btn-primary-custom" id="btnExport">

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

                  <div
                     id="salesChartSkeleton"
                     class="chart-skeleton">
                  </div>

                  <div
                     id="salesChart"
                     style="display:none;">
                  </div>

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

                  <div
                     id="orderChartSkeleton"
                     class="chart-skeleton">
                  </div>

                  <div
                     id="orderChart"
                     style="display:none;">
                  </div>

               </div>

            </div>

         </div>

         <!-- TABLE -->
         <div class="content-card mt-6">

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

            <div class="table-responsive table-scroll">

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

                  <tbody id="topSellingBody">

                     <tr class="table-skeleton">

                        <td>
                           <div class="skeleton" style="height:50px"></div>
                        </td>

                        <td>
                           <div class="skeleton" style="height:20px"></div>
                        </td>

                        <td>
                           <div class="skeleton" style="height:20px"></div>
                        </td>

                        <td>
                           <div class="skeleton" style="height:20px"></div>
                        </td>

                        <td>
                           <div class="skeleton" style="height:20px"></div>
                        </td>

                        <td>
                           <div class="skeleton" style="height:20px"></div>
                        </td>

                     </tr>

                     <tr class="table-skeleton">

                        <td colspan="6">

                           <div
                              class="skeleton"
                              style="height:60px">

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


   <script>
      document.addEventListener(
         'DOMContentLoaded',
         loadAnalyticsDashboard
      );

      function loadAnalyticsDashboard() {

         fetch(
               '../controller/analyticsDashboardController.php'
            )
            .then(response => response.json())
            .then(res => {

               document
                  .getElementById('totalRevenue')
                  .classList.remove('skeleton');

               document
                  .getElementById('totalOrders')
                  .classList.remove('skeleton');

               document
                  .getElementById('totalCustomers')
                  .classList.remove('skeleton');

               document
                  .getElementById('monthlyGrowth')
                  .classList.remove('skeleton');

               if (!res.success) return;

               // STATS

               document
                  .getElementById('totalRevenue')
                  .innerText =
                  'Rp ' +
                  Number(res.total_revenue)
                  .toLocaleString('id-ID');

               document
                  .getElementById('totalOrders')
                  .innerText =
                  Number(res.total_orders)
                  .toLocaleString('id-ID');

               document
                  .getElementById('totalCustomers')
                  .innerText =
                  Number(res.total_customers)
                  .toLocaleString('id-ID');

               document
                  .getElementById('monthlyGrowth')
                  .innerText =
                  (res.monthly_growth > 0 ? '+' : '') +
                  res.monthly_growth +
                  '%';

               renderSalesChart(res);

               renderOrderChart(res);

            });

      }

      function renderSalesChart(res) {
         document
            .getElementById(
               'salesChartSkeleton'
            )
            .style.display = 'none';

         document
            .getElementById(
               'salesChart'
            )
            .style.display = 'block';
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

               data: res.sales_data

            }],

            xaxis: {

               categories: res.sales_labels

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

         new ApexCharts(
            document.querySelector("#salesChart"),
            salesOptions
         ).render();

      }

      function renderOrderChart(res) {
         document
            .getElementById(
               'orderChartSkeleton'
            )
            .style.display = 'none';

         document
            .getElementById(
               'orderChart'
            )
            .style.display = 'block';

         const orderOptions = {

            chart: {

               type: 'donut',

               height: 350

            },

            series: res.order_status,

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

         new ApexCharts(
            document.querySelector("#orderChart"),
            orderOptions
         ).render();

      }
   </script>
   <script>
      document.addEventListener(
         'DOMContentLoaded',
         loadTopSellingProducts
      );

      function loadTopSellingProducts() {

         fetch(
               '../controller/topSellingProductsController.php'
            )
            .then(response => response.json())
            .then(res => {

               let html = '';

               if (
                  res.success &&
                  res.data.length > 0
               ) {

                  res.data.forEach(
                     (item, index) => {

                        let imageUrl =
                           item.image_url &&
                           item.image_url !== '' ?
                           item.image_url :
                           'assets/images/404.png';

                        let status =
                           'Normal';

                        let badge =
                           'badge-success';

                        if (index === 0) {

                           status =
                              'Best Seller';

                        } else if (index <= 2) {

                           status =
                              'Trending';

                           badge =
                              'badge-warning';

                        }

                        html += `

                <tr>

                    <td>

                        <div class="product-table-info">

                            <img
                                src="${imageUrl}"
                                onerror="
                                this.src='assets/images/404.png'
                                ">

                            <div>

                                <h6>

                                    ${item.name}

                                </h6>

                                <span>

                                    ID-${item.id}

                                </span>

                            </div>

                        </div>

                    </td>

                    <td>

                        ${item.category_name ?? '-'}

                    </td>

                    <td>

                        <strong>

                            ${Number(
                                item.total_orders
                            ).toLocaleString('id-ID')}

                        </strong>

                    </td>

                    <td>

                        <strong>

                            Rp ${Number(
                                item.revenue
                            ).toLocaleString('id-ID')}

                        </strong>

                    </td>

                    <td>

                        <span
                            class="badge-status badge-success">

                            +${(
                                (item.total_orders / 10)
                            ).toFixed(1)}%

                        </span>

                    </td>

                    <td>

                        <span
                            class="badge-status ${badge}">

                            ${status}

                        </span>

                    </td>

                </tr>

                `;
                     });

               } else {

                  html = `
            <tr>
                <td colspan="6"
                    class="text-center">
                    No Data Found
                </td>
            </tr>
            `;
               }

               document
                  .getElementById(
                     'topSellingBody'
                  )
                  .innerHTML = html;

            })
            .catch(error => {

               console.error(error);

            });

      }
   </script>
</body>

</html>