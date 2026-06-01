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

                  <h3 id="totalOrders">0</h3>

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

                  <h3 id="processingOrders">0</h3>

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

                  <h3 id="completedOrders">0</h3>

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

                  <h3 id="cancelledOrders">0</h3>

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
               <select
                  id="statusFilter"
                  class="filter-select">

                  <option value="">
                     All Status
                  </option>

                  <option value="Processing">
                     Processing
                  </option>

                  <option value="Completed">
                     Completed
                  </option>

                  <option value="Cancelled">
                     Cancelled
                  </option>

               </select>

               <!-- DATE -->
               <select
                  id="dateFilter"
                  class="filter-select">

                  <option value="">
                     All Date
                  </option>

                  <option value="today">
                     Today
                  </option>

                  <option value="week">
                     This Week
                  </option>

                  <option value="month">
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

                  <tbody id="ordersTableBody">
                  </tbody>

               </table>

            </div>

         </div>



      </div>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAVIGATION -->
   <?php require 'partial/sidebar-mobile.php'; ?>
   <div
      class="modal fade"
      id="orderDetailModal"
      tabindex="-1">

      <div class="modal-dialog modal-xl">

         <div class="modal-content">

            <div class="modal-header">

               <h5 class="modal-title">

                  Order Detail

               </h5>

               <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal">
               </button>

            </div>

            <div class="modal-body">

               <div id="orderDetailContent">

                  <div class="text-center py-5">

                     <div
                        class="spinner-border text-primary">
                     </div>

                  </div>

               </div>

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
   document.addEventListener('DOMContentLoaded', () => {

      loadOrderDashboard();

   });

   function loadOrderDashboard() {

      fetch('../controller/orderDashboardController.php')
         .then(response => response.json())
         .then(res => {

            if (!res.success) {

               console.error(res.message);

               return;
            }

            document
               .getElementById('totalOrders')
               .innerText =
               Number(res.total_orders)
               .toLocaleString('id-ID');

            document
               .getElementById('processingOrders')
               .innerText =
               Number(res.processing_orders)
               .toLocaleString('id-ID');

            document
               .getElementById('completedOrders')
               .innerText =
               Number(res.completed_orders)
               .toLocaleString('id-ID');

            document
               .getElementById('cancelledOrders')
               .innerText =
               Number(res.cancelled_orders)
               .toLocaleString('id-ID');

         })
         .catch(error => {

            console.error(error);

         });

   }
</script>

<script>
   $(document).ready(function() {

      loadOrders();

   });

   function loadOrders() {

      fetch('../controller/ordersCustomerController.php')
         .then(response => response.json())
         .then(res => {

            let html = '';

            if (res.success && res.data.length > 0) {

               res.data.forEach(item => {

                  let orderStatus = '';
                  let paymentStatus = '';

                  switch (item.status) {

                     case 'delivered':

                        orderStatus =
                           '<span class="badge-status badge-success">Completed</span>';

                        paymentStatus =
                           '<span class="badge-status badge-success">Paid</span>';

                        break;

                     case 'cancelled':
                     case 'rejected':

                        orderStatus =
                           '<span class="badge-status badge-danger">Cancelled</span>';

                        paymentStatus =
                           '<span class="badge-status badge-warning">Refund</span>';

                        break;

                     default:

                        orderStatus =
                           '<span class="badge-status badge-warning">Processing</span>';

                        paymentStatus =
                           '<span class="badge-status badge-success">Paid</span>';

                  }

                  const amount =
                     Number(item.total_amount || 0)
                     .toLocaleString('id-ID');

                  const date =
                     new Date(item.created_at)
                     .toLocaleDateString(
                        'id-ID', {
                           day: '2-digit',
                           month: 'short',
                           year: 'numeric'
                        }
                     );

                  html += `
                    <tr>

                        <td>
                            <strong>
                                #ORD-${item.id}
                            </strong>
                        </td>

                        <td>

                            <div class="product-table-info d-flex align-items-center gap-3">

                                <img
                                    src="../app/assets/images/profile-customer.png"
                                    style="
                                        width:55px;
                                        height:55px;
                                        border-radius:50%;
                                        object-fit:cover;
                                    ">

                                <div>

                                    <h6 class="mb-1">

                                        ${item.customer_name ?? '-'}

                                    </h6>

                                    <span class="text-muted">

                                        ${item.customer_email ?? '-'}

                                    </span>

                                </div>

                            </div>

                        </td>

                        <td>

                            ${item.total_items ?? 0} Items

                        </td>

                        <td>

                            <strong>

                                Rp ${amount}

                            </strong>

                        </td>

                        <td>

                            ${orderStatus}

                        </td>

                        <td>

                            ${paymentStatus}

                        </td>

                        <td>

                            ${date}

                        </td>

                        <td>

                            <div class="table-action d-flex gap-2">

                                <button
                                    class="action-btn"
                                    onclick="viewOrder(${item.id})">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                                <button
                                    class="action-btn"
                                    onclick="printOrder(${item.id})">

                                    <i class="fa-solid fa-print"></i>

                                </button>

                            </div>

                        </td>

                    </tr>
                    `;
               });

            } else {

               html = `
                <tr>
                    <td colspan="8" class="text-center">
                        No Orders Found
                    </td>
                </tr>
                `;
            }

            $('#ordersTableBody').html(html);

            if ($.fn.DataTable.isDataTable('#ordersTable')) {

               $('#ordersTable')
                  .DataTable()
                  .destroy();

            }

            let table = $('#ordersTable').DataTable({

               responsive: true,

               pageLength: 10,

               language: {

                  search: "",

                  searchPlaceholder: "Search Order..."

               }

            });

            // SEARCH CUSTOM
            $('.search-input')
               .off('keyup')
               .on('keyup', function() {

                  table.search(this.value).draw();

               });

            $('#statusFilter')
               .off('change')
               .on('change', function() {

                  const value = $(this).val();

                  table.column(4).search(value).draw();

               });

         })
         .catch(error => {

            console.error(error);

         });

   }

   function viewOrder(id) {

      const modal = new bootstrap.Modal(
         document.getElementById('orderDetailModal')
      );

      modal.show();

      $('#orderDetailContent').html(`
      <div class="text-center py-5">
         <div class="spinner-border text-primary"></div>
      </div>
   `);

      fetch(
            '../controller/orderDetailController.php?order_id=' + id
         )
         .then(response => response.json())
         .then(res => {

            if (!res.success) {

               $('#orderDetailContent').html(`
            <div class="alert alert-danger">
               Failed load order detail
            </div>
         `);

               return;
            }

            let rows = '';
            let grandTotal = 0;

            res.data.forEach(item => {

               const subtotal =
                  Number(item.quantity) *
                  Number(item.price);

               grandTotal += subtotal;

               rows += `
            <tr>

               <td>${item.menu_name}</td>

               <td>${item.quantity}</td>

               <td>
                  Rp ${Number(item.price)
                     .toLocaleString('id-ID')}
               </td>

               <td>
                  Rp ${subtotal
                     .toLocaleString('id-ID')}
               </td>

            </tr>
         `;
            });

            $('#orderDetailContent').html(`

         <div class="mb-3">

            <h5>
               Order #ORD-${id}
            </h5>

         </div>

         <div class="table-responsive">

            <table class="table table-bordered">

               <thead>

                  <tr>

                     <th>Menu</th>
                     <th width="100">Qty</th>
                     <th width="150">Price</th>
                     <th width="150">Subtotal</th>

                  </tr>

               </thead>

               <tbody>

                  ${rows}

               </tbody>

            </table>

         </div>

         <div class="text-end mt-3">

            <h4 class="fw-bold">

               Total :
               Rp ${grandTotal.toLocaleString('id-ID')}

            </h4>

         </div>

      `);

         })
         .catch(error => {

            console.error(error);

            $('#orderDetailContent').html(`
         <div class="alert alert-danger">
            Failed load order detail
         </div>
      `);

         });

   }

   function printOrder(id) {

      window.open(
         'order-print.php?id=' + id,
         '_blank'
      );

   }
</script>


</html>