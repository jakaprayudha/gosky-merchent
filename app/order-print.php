<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="UTF-8">

   <title>
      Order Receipt
   </title>

   <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

   <style>
      body {

         background: #f5f7fb;

         padding: 30px;

         font-family: Poppins, sans-serif;

      }

      .print-card {

         max-width: 900px;

         margin: auto;

         background: #fff;

         border-radius: 24px;

         overflow: hidden;

         box-shadow:
            0 10px 40px rgba(0, 0, 0, .08);

      }

      .print-header {

         background: linear-gradient(135deg,
               #4f46e5,
               #7c3aed);

         color: #fff;

         padding: 40px;

      }

      .print-body {

         padding: 40px;

      }

      .order-id {

         font-size: 28px;

         font-weight: 700;

      }

      .info-label {

         color: #6c757d;

         font-size: 13px;

      }

      .info-value {

         font-weight: 600;

      }

      .total-box {

         background: #f8f9fa;

         border-radius: 16px;

         padding: 20px;

      }

      .total-amount {

         font-size: 32px;

         font-weight: 700;

      }

      @media print {

         .no-print {

            display: none !important;

         }

         body {

            background: #fff;

            padding: 0;

         }

         .print-card {

            box-shadow: none;

         }

      }
   </style>

</head>

<body>

   <div class="print-card">

      <div class="print-header">

         <div class="d-flex justify-content-between">

            <div>

               <h2>
                  Order Receipt
               </h2>

               <p class="mb-0">
                  Merchant Dashboard
               </p>

            </div>

            <div class="text-end">

               <div
                  id="orderNumber"
                  class="order-id">

                  #ORD-000

               </div>

            </div>

         </div>

      </div>

      <div class="print-body">

         <div class="row mb-4">

            <div class="col-md-6">

               <div class="info-label">
                  Customer
               </div>

               <div
                  id="customerName"
                  class="info-value">

                  -

               </div>

            </div>

            <div class="col-md-6 text-md-end">

               <div class="info-label">
                  Restaurant
               </div>

               <div
                  id="restaurantName"
                  class="info-value">

                  -

               </div>

            </div>

         </div>

         <hr>

         <table class="table align-middle">

            <thead>

               <tr>

                  <th>Menu</th>
                  <th width="100">Qty</th>
                  <th width="150">Price</th>
                  <th width="150">Subtotal</th>

               </tr>

            </thead>

            <tbody id="orderItems">

            </tbody>

         </table>

         <div class="row mt-4">

            <div class="col-md-5 ms-auto">

               <div class="total-box">

                  <div class="info-label">

                     Total Amount

                  </div>

                  <div
                     id="totalAmount"
                     class="total-amount">

                     Rp 0

                  </div>

               </div>

            </div>

         </div>

         <div class="text-center mt-5 text-muted">

            Thank you for using our platform ❤️

         </div>

      </div>

   </div>

   <div
      class="text-center mt-4 no-print">

      <button
         onclick="window.print()"
         class="btn btn-primary px-5">

         <i class="fa-solid fa-print me-2"></i>

         Print Receipt

      </button>

   </div>

   <script>
      const id =
         new URLSearchParams(
            window.location.search
         ).get('id');

      fetch(
            '../controller/orderPrintController.php?id=' + id
         )
         .then(response => response.json())
         .then(res => {

            const order = res.order;

            document
               .getElementById('orderNumber')
               .innerText =
               '#ORD-' + order.id;

            document
               .getElementById('customerName')
               .innerText =
               order.customer_name;

            document
               .getElementById('restaurantName')
               .innerText =
               order.restaurant_name;

            let rows = '';

            res.items.forEach(item => {

               const subtotal =
                  Number(item.quantity) *
                  Number(item.price);

               rows += `
        <tr>

            <td>
                ${item.menu_name}
            </td>

            <td>
                ${item.quantity}
            </td>

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

            document
               .getElementById('orderItems')
               .innerHTML = rows;

            document
               .getElementById('totalAmount')
               .innerText =
               'Rp ' +
               Number(order.total_amount)
               .toLocaleString('id-ID');

         });
   </script>

</body>

</html>