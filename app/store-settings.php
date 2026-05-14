<!DOCTYPE html>
<html lang="id">

<head>

   <meta charset="UTF-8">

   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Store Settings</title>

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
      /*
|--------------------------------------------------------------------------
| STORE SETTINGS PAGE
|--------------------------------------------------------------------------
*/

      .store-settings-grid {

         display: grid;

         grid-template-columns:
            340px 1fr;

         gap: 24px;

         margin-bottom: 24px;
      }

      /*
|--------------------------------------------------------------------------
| STORE SIDEBAR
|--------------------------------------------------------------------------
*/

      .store-sidebar {

         background: white;

         border-radius: 30px;

         padding: 30px;

         box-shadow:
            0 14px 35px rgba(0, 0, 0, 0.05);

         height: fit-content;
      }

      .store-logo-wrapper {

         display: flex;
         flex-direction: column;
         align-items: center;

         text-align: center;
      }

      .store-logo {

         width: 160px;
         height: 160px;

         border-radius: 30px;

         object-fit: cover;

         margin-bottom: 20px;

         box-shadow:
            0 12px 28px rgba(0, 0, 0, 0.12);
      }

      .upload-logo-btn {

         height: 52px;

         padding: 0 24px;

         border-radius: 18px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         color: white;

         font-weight: 600;

         display: flex;
         align-items: center;
         justify-content: center;

         cursor: pointer;

         transition: 0.3s ease;
      }

      .upload-logo-btn:hover {

         transform: translateY(-2px);
      }

      .store-info-mini {

         margin-top: 28px;

         display: flex;
         flex-direction: column;

         gap: 18px;
      }

      .store-mini-item {

         background: #fafafa;

         border-radius: 20px;

         padding: 18px;
      }

      .store-mini-item span {

         display: block;

         color: #999;

         font-size: 13px;

         margin-bottom: 6px;
      }

      .store-mini-item h6 {

         margin: 0;

         font-size: 15px;
         font-weight: 700;

         color: #333;
      }

      /*
|--------------------------------------------------------------------------
| STORE CONTENT
|--------------------------------------------------------------------------
*/

      .store-content {

         display: flex;
         flex-direction: column;

         gap: 24px;
      }

      /*
|--------------------------------------------------------------------------
| STORE CARD
|--------------------------------------------------------------------------
*/

      .store-card {

         background: white;

         border-radius: 30px;

         padding: 28px;

         box-shadow:
            0 14px 35px rgba(0, 0, 0, 0.05);
      }

      .store-card-header {

         margin-bottom: 28px;
      }

      .store-card-header h4 {

         margin: 0 0 8px;

         font-size: 24px;
         font-weight: 700;

         color: #333;
      }

      .store-card-header p {

         margin: 0;

         color: #999;

         font-size: 14px;
      }

      /*
|--------------------------------------------------------------------------
| FORM
|--------------------------------------------------------------------------
*/

      .form-label-custom {

         display: block;

         margin-bottom: 12px;

         font-size: 14px;
         font-weight: 600;

         color: #444;
      }

      .form-control-custom {

         width: 100%;

         height: 58px;

         border: none;
         outline: none;

         border-radius: 18px;

         background: #f7f7f7;

         padding: 0 20px;

         font-size: 14px;

         transition: 0.3s ease;
      }

      .form-control-custom:focus {

         background: white;

         box-shadow:
            0 0 0 4px rgba(244, 196, 0, 0.12);
      }

      .textarea-custom {

         min-height: 130px;

         padding-top: 18px;

         resize: none;
      }

      /*
|--------------------------------------------------------------------------
| SETTINGS LIST
|--------------------------------------------------------------------------
*/

      .settings-list {

         display: flex;
         flex-direction: column;

         gap: 18px;
      }

      .setting-item {

         background: #fafafa;

         border-radius: 22px;

         padding: 20px 22px;

         display: flex;
         align-items: center;
         justify-content: space-between;

         gap: 20px;
      }

      .setting-item h6 {

         margin: 0 0 6px;

         font-size: 16px;
         font-weight: 700;

         color: #333;
      }

      .setting-item span {

         font-size: 13px;

         color: #999;
      }

      /*
|--------------------------------------------------------------------------
| SWITCH
|--------------------------------------------------------------------------
*/

      .switch {

         position: relative;

         display: inline-block;

         width: 60px;
         height: 34px;
      }

      .switch input {

         opacity: 0;

         width: 0;
         height: 0;
      }

      .slider {

         position: absolute;

         cursor: pointer;

         top: 0;
         left: 0;
         right: 0;
         bottom: 0;

         background: #ddd;

         transition: .4s;

         border-radius: 34px;
      }

      .slider:before {

         position: absolute;

         content: "";

         height: 26px;
         width: 26px;

         left: 4px;
         bottom: 4px;

         background: white;

         transition: .4s;

         border-radius: 50%;
      }

      .switch input:checked+.slider {

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);
      }

      .switch input:checked+.slider:before {

         transform: translateX(26px);
      }

      /*
|--------------------------------------------------------------------------
| SAVE BUTTON
|--------------------------------------------------------------------------
*/

      .store-save-wrapper {

         display: flex;
         justify-content: flex-end;

         margin-top: 10px;
      }

      .btn-save-store {

         height: 60px;

         padding: 0 34px;

         border: none;

         border-radius: 20px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         color: white;

         font-size: 15px;
         font-weight: 700;

         box-shadow:
            0 14px 28px rgba(244, 196, 0, 0.22);

         transition: 0.3s ease;
      }

      .btn-save-store:hover {

         transform: translateY(-2px);
      }

      /*
|--------------------------------------------------------------------------
| MOBILE
|--------------------------------------------------------------------------
*/

      @media(max-width:992px) {

         .store-settings-grid {

            grid-template-columns: 1fr;
         }

         .store-sidebar {

            padding: 24px;
         }

         .store-card {

            padding: 24px;
         }
      }

      @media(max-width:768px) {

         .setting-item {

            flex-direction: column;

            align-items: flex-start;
         }

         .store-save-wrapper {

            width: 100%;
         }

         .btn-save-store {

            width: 100%;
         }

         .store-logo {

            width: 130px;
            height: 130px;
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

         <!-- STORE INFO -->
         <div class="content-card mb-4">

            <div class="card-header-custom">

               <div>

                  <h4>

                     Store Information

                  </h4>

                  <p class="text-muted mb-0">

                     Manage your restaurant profile and information

                  </p>

               </div>

            </div>

            <div class="row g-4">

               <!-- LOGO -->
               <div class="col-xl-3">

                  <div class="store-logo-wrapper">

                     <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=1200&auto=format&fit=crop"
                        class="store-logo"
                        id="logoPreview">

                     <label class="upload-logo-btn">

                        <i class="fa-solid fa-camera me-2"></i>

                        Change Logo

                        <input type="file"
                           hidden
                           id="logoInput">

                     </label>

                  </div>

               </div>

               <!-- FORM -->
               <div class="col-xl-9">

                  <div class="row g-4">

                     <!-- STORE NAME -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Store Name

                        </label>

                        <input type="text"
                           class="form-control-custom"
                           value="GoSky Restaurant">

                     </div>

                     <!-- PHONE -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Phone Number

                        </label>

                        <input type="text"
                           class="form-control-custom"
                           value="+62 812 3456 7890">

                     </div>

                     <!-- EMAIL -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Email Address

                        </label>

                        <input type="email"
                           class="form-control-custom"
                           value="merchant@gosky.com">

                     </div>

                     <!-- CATEGORY -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Category

                        </label>

                        <select class="form-control-custom">

                           <option>
                              Restaurant
                           </option>

                           <option>
                              Coffee Shop
                           </option>

                           <option>
                              Fast Food
                           </option>

                        </select>

                     </div>

                     <!-- ADDRESS -->
                     <div class="col-12">

                        <label class="form-label-custom">

                           Store Address

                        </label>

                        <textarea class="form-control-custom textarea-custom"
                           rows="4">Jl. Gatot Subroto No. 88 Medan, Indonesia</textarea>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <!-- STORE OPERATION -->
         <div class="content-card mb-4">

            <div class="card-header-custom">

               <div>

                  <h4>

                     Store Operation

                  </h4>

                  <p class="text-muted mb-0">

                     Configure operating hours and delivery

                  </p>

               </div>

            </div>

            <div class="row g-4">

               <!-- OPEN -->
               <div class="col-md-4">

                  <label class="form-label-custom">

                     Open Time

                  </label>

                  <input type="time"
                     class="form-control-custom"
                     value="08:00">

               </div>

               <!-- CLOSE -->
               <div class="col-md-4">

                  <label class="form-label-custom">

                     Close Time

                  </label>

                  <input type="time"
                     class="form-control-custom"
                     value="22:00">

               </div>

               <!-- DELIVERY -->
               <div class="col-md-4">

                  <label class="form-label-custom">

                     Delivery Radius

                  </label>

                  <input type="text"
                     class="form-control-custom"
                     value="10 KM">

               </div>

            </div>

         </div>

         <!-- STORE SETTINGS -->
         <div class="content-card mb-4">

            <div class="card-header-custom">

               <div>

                  <h4>

                     Store Settings

                  </h4>

                  <p class="text-muted mb-0">

                     Manage visibility and notifications

                  </p>

               </div>

            </div>

            <div class="settings-list">

               <!-- ITEM -->
               <div class="setting-item">

                  <div>

                     <h6>
                        Store Visibility
                     </h6>

                     <span>
                        Show your store to customers
                     </span>

                  </div>

                  <label class="switch">

                     <input type="checkbox"
                        checked>

                     <span class="slider"></span>

                  </label>

               </div>

               <!-- ITEM -->
               <div class="setting-item">

                  <div>

                     <h6>
                        Auto Accept Orders
                     </h6>

                     <span>
                        Automatically accept incoming orders
                     </span>

                  </div>

                  <label class="switch">

                     <input type="checkbox">

                     <span class="slider"></span>

                  </label>

               </div>

               <!-- ITEM -->
               <div class="setting-item">

                  <div>

                     <h6>
                        Push Notifications
                     </h6>

                     <span>
                        Receive realtime order notifications
                     </span>

                  </div>

                  <label class="switch">

                     <input type="checkbox"
                        checked>

                     <span class="slider"></span>

                  </label>

               </div>

            </div>

         </div>

         <!-- BUTTON -->
         <div class="d-flex justify-content-end">

            <button class="btn-primary-custom">

               <i class="fa-solid fa-floppy-disk me-2"></i>

               Save Settings

            </button>

         </div>

      </div>

   </div>

   <!-- FOOTER -->
   <?php require 'partial/footer.php'; ?>

   <!-- MOBILE NAV -->
   <?php require 'partial/sidebar-mobile.php'; ?>

   <!-- SCRIPT -->
   <script>
      /*
      |--------------------------------------------------------------------------
      | PREVIEW LOGO
      |--------------------------------------------------------------------------
      */

      const logoInput =
         document.getElementById('logoInput');

      const logoPreview =
         document.getElementById('logoPreview');

      logoInput.addEventListener('change', function(e) {

         const file =
            e.target.files[0];

         if (file) {

            logoPreview.src =
               URL.createObjectURL(file);

         }

      });
   </script>

</body>

</html>