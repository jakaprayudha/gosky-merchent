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
                     <i class="fa-solid fa-cart-shopping"></i>
                  </div>

                  <h3 id="totalOrders">0</h3>

                  <p>Total Orders</p>

               </div>

            </div>

            <div class="col-lg-3 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">
                     <i class="fa-solid fa-wallet"></i>
                  </div>

                  <h3 id="totalRevenue">Rp 0</h3>

                  <p>Total Revenue</p>

               </div>

            </div>

            <div class="col-lg-6 col-md-6">

               <div class="stats-card">

                  <div class="stats-icon">
                     <i class="fa-solid fa-chart-line"></i>
                  </div>

                  <h3 id="growthRate">0%</h3>

                  <p>Growth Rate</p>

               </div>

            </div>

         </div>

         <!-- DATATABLE CSS -->
         <link rel="stylesheet"
            href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

         <!-- TABLE -->
         <div class="content-card">

            <div class="card-header-custom d-flex
                        justify-content-between
                        align-items-center
                        flex-wrap gap-3">

               <h4 class="mb-0">
                  Recent Transactions
               </h4>

            </div>

            <div class="table-responsive">

               <table
                  id="transactionTable"
                  class="table table-hover align-middle mb-0">

                  <thead>

                     <tr>

                        <th>ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th width="80">Action</th>

                     </tr>

                  </thead>

                  <tbody id="transactionTableBody">
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
   <div class="modal fade" id="orderDetailModal" tabindex="-1">

      <div class="modal-dialog modal-lg">

         <div class="modal-content">

            <div class="modal-header">

               <h5 class="modal-title">
                  Detail Order
               </h5>

               <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal">
               </button>

            </div>

            <div class="modal-body">

               <table class="table table-bordered">

                  <thead>

                     <tr>
                        <th>Menu</th>
                        <th width="120">Qty</th>
                        <th width="150">Price</th>
                        <th width="150">Subtotal</th>
                     </tr>

                  </thead>

                  <tbody id="orderDetailBody">

                  </tbody>

                  <tfoot>

                     <tr>
                        <th colspan="3" class="text-end">
                           Total
                        </th>
                        <th id="orderGrandTotal">
                           Rp 0
                        </th>
                     </tr>

                  </tfoot>

               </table>

            </div>

         </div>

      </div>

   </div>
</body>
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
   fetch('../controller/dashboardController.php')
      .then(response => response.json())
      .then(res => {

         document.getElementById('totalOrders').innerText =
            res.total_orders.toLocaleString();

         document.getElementById('totalRevenue').innerText =
            'Rp ' + res.total_revenue.toLocaleString('id-ID');

         document.getElementById('growthRate').innerText =
            res.growth_rate + '%';

      });
</script>

<script>
   $(document).ready(function() {

      loadLatestOrders();

      function loadLatestOrders() {

         fetch('../controller/ordersCustomerController.php')
            .then(response => response.json())
            .then(res => {

               let html = '';

               if (res.success && res.data.length > 0) {

                  res.data.forEach(item => {

                     let badgeClass = '';

                     switch (item.status) {

                        case 'delivered':
                           badgeClass = 'badge-success';
                           break;

                        case 'waiting':
                        case 'searching':
                        case 'accepted':
                        case 'on_the_way':
                           badgeClass = 'badge-warning';
                           break;

                        case 'cancelled':
                        case 'rejected':
                           badgeClass = 'badge-danger';
                           break;

                        default:
                           badgeClass = 'badge-secondary';
                     }

                     const amount = Number(item.total_amount || 0)
                        .toLocaleString('id-ID');

                     const date = new Date(item.created_at)
                        .toLocaleDateString('id-ID', {
                           day: '2-digit',
                           month: 'short',
                           year: 'numeric'
                        });

                     html += `
                            <tr>
                                <td>#ORD-${item.id}</td>

                                <td>${item.customer_name ?? '-'}</td>

                                <td>${item.restaurant_name ?? item.type}</td>

                                <td>
                                    <span class="badge-status ${badgeClass}">
                                        ${item.status}
                                    </span>
                                </td>

                                <td>${date}</td>

                                <td>Rp ${amount}</td>

                               <td>
                                    <button
                                       class="action-btn"
                                       onclick="viewOrder(${item.id})">

                                       <i class="fa-solid fa-eye"></i>

                                    </button>
                                 </td>
                            </tr>
                        `;
                  });

               } else {

                  html = `
                        <tr>
                            <td colspan="7" class="text-center">
                                No data found
                            </td>
                        </tr>
                    `;
               }

               $('#transactionTableBody').html(html);

               // Destroy jika sudah pernah dibuat
               if ($.fn.DataTable.isDataTable('#transactionTable')) {
                  $('#transactionTable').DataTable().destroy();
               }

               $('#transactionTable').DataTable({
                  responsive: true,
                  pageLength: 5,
                  lengthMenu: [
                     [5, 10, 25, 50],
                     [5, 10, 25, 50]
                  ],
                  language: {
                     search: "",
                     searchPlaceholder: "Search transaction...",
                     lengthMenu: "Show _MENU_ entries",
                     info: "Showing _START_ to _END_ of _TOTAL_ entries",
                     paginate: {
                        previous: '<i class="fa-solid fa-angle-left"></i>',
                        next: '<i class="fa-solid fa-angle-right"></i>'
                     }
                  }
               });

            })
            .catch(error => {

               console.error(error);

               $('#transactionTableBody').html(`
                    <tr>
                        <td colspan="7" class="text-center text-danger">
                            Failed to load data
                        </td>
                    </tr>
                `);
            });
      }

   });

   function viewOrder(orderId) {

      fetch(
            `../controller/orderDetailController.php?order_id=${orderId}`
         )
         .then(response => response.json())
         .then(res => {

            let html = '';
            let grandTotal = 0;

            if (res.success) {

               res.data.forEach(item => {

                  const subtotal =
                     parseInt(item.quantity) *
                     parseInt(item.price);

                  grandTotal += subtotal;

                  html += `
                    <tr>
                        <td>${item.menu_name}</td>
                        <td>${item.quantity}</td>
                        <td>
                            Rp ${Number(item.price)
                                .toLocaleString('id-ID')}
                        </td>
                        <td>
                            Rp ${Number(subtotal)
                                .toLocaleString('id-ID')}
                        </td>
                    </tr>
                `;
               });

            } else {

               html = `
                <tr>
                    <td colspan="4" class="text-center">
                        No data found
                    </td>
                </tr>
            `;
            }

            document.getElementById(
               'orderDetailBody'
            ).innerHTML = html;

            document.getElementById(
                  'orderGrandTotal'
               ).innerHTML =
               'Rp ' +
               grandTotal.toLocaleString('id-ID');

            new bootstrap.Modal(
               document.getElementById('orderDetailModal')
            ).show();

         })
         .catch(error => {

            console.error(error);

            alert('Failed load detail order');

         });

   }
</script>

</html>