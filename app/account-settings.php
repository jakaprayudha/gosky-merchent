<!DOCTYPE html>
<html lang="id">

<head>

   <meta charset="UTF-8">

   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Account Settings</title>

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
| ACCOUNT SETTINGS PAGE
|--------------------------------------------------------------------------
*/

      .account-grid {

         display: grid;

         grid-template-columns:
            320px 1fr;

         gap: 24px;

         margin-top: 24px;
      }

      /*
|--------------------------------------------------------------------------
| PROFILE COVER
|--------------------------------------------------------------------------
*/

      .profile-cover-card {

         position: relative;

         background: white;

         border-radius: 34px;

         overflow: hidden;

         box-shadow:
            0 14px 40px rgba(0, 0, 0, 0.05);
      }

      .profile-cover {

         height: 220px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);
      }

      .profile-info-wrapper {

         position: relative;

         padding: 0 34px 34px;

         display: flex;
         align-items: flex-end;

         gap: 28px;

         margin-top: -70px;
      }

      /*
|--------------------------------------------------------------------------
| AVATAR
|--------------------------------------------------------------------------
*/

      .profile-avatar-wrapper {

         position: relative;

         flex-shrink: 0;
      }

      .profile-avatar {

         width: 150px;
         height: 150px;

         border-radius: 36px;

         object-fit: cover;

         border: 6px solid white;

         box-shadow:
            0 14px 35px rgba(0, 0, 0, 0.15);
      }

      .change-avatar-btn {

         position: absolute;

         bottom: 10px;
         right: 10px;

         width: 44px;
         height: 44px;

         border-radius: 16px;

         background: white;

         display: flex;
         align-items: center;
         justify-content: center;

         color: #333;

         cursor: pointer;

         box-shadow:
            0 10px 24px rgba(0, 0, 0, 0.12);

         transition: 0.3s ease;
      }

      .change-avatar-btn:hover {

         background: #f7c600;

         color: white;
      }

      /*
|--------------------------------------------------------------------------
| PROFILE INFO
|--------------------------------------------------------------------------
*/

      .profile-main-info {

         padding-bottom: 10px;
      }

      .profile-main-info h2 {

         margin: 0 0 10px;

         font-size: 34px;
         font-weight: 700;

         color: #333;
      }

      .profile-main-info p {

         margin: 0 0 18px;

         color: #888;

         font-size: 15px;
      }

      .profile-badge-list {

         display: flex;

         flex-wrap: wrap;

         gap: 12px;
      }

      .profile-badge {

         height: 42px;

         padding: 0 18px;

         border-radius: 16px;

         background: #f7f7f7;

         display: flex;
         align-items: center;

         gap: 10px;

         font-size: 13px;
         font-weight: 600;

         color: #555;
      }

      /*
|--------------------------------------------------------------------------
| SIDEBAR
|--------------------------------------------------------------------------
*/

      .account-sidebar {

         display: flex;
         flex-direction: column;

         gap: 24px;
      }

      .account-menu-card,
      .account-info-card {

         background: white;

         border-radius: 30px;

         padding: 24px;

         box-shadow:
            0 14px 35px rgba(0, 0, 0, 0.05);
      }

      /*
|--------------------------------------------------------------------------
| ACCOUNT MENU
|--------------------------------------------------------------------------
*/

      .account-menu {

         width: 100%;

         height: 58px;

         border-radius: 18px;

         display: flex;
         align-items: center;

         gap: 14px;

         padding: 0 18px;

         text-decoration: none;

         color: #666;

         font-size: 14px;
         font-weight: 600;

         transition: 0.3s ease;

         margin-bottom: 10px;
      }

      .account-menu i {

         width: 20px;

         font-size: 16px;
      }

      .account-menu:hover {

         background: #f7f7f7;

         color: #333;
      }

      .account-menu.active {

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         color: white;

         box-shadow:
            0 12px 28px rgba(244, 196, 0, 0.22);
      }

      /*
|--------------------------------------------------------------------------
| INFO CARD
|--------------------------------------------------------------------------
*/

      .account-info-item {

         background: #fafafa;

         border-radius: 20px;

         padding: 18px;

         margin-bottom: 16px;
      }

      .account-info-item:last-child {

         margin-bottom: 0;
      }

      .account-info-item span {

         display: block;

         color: #999;

         font-size: 13px;

         margin-bottom: 8px;
      }

      .account-info-item h6 {

         margin: 0;

         font-size: 15px;
         font-weight: 700;

         color: #333;
      }

      /*
|--------------------------------------------------------------------------
| CONTENT
|--------------------------------------------------------------------------
*/

      .account-content {

         display: flex;
         flex-direction: column;

         gap: 24px;
      }

      /*
|--------------------------------------------------------------------------
| ACCOUNT CARD
|--------------------------------------------------------------------------
*/

      .account-card {

         background: white;

         border-radius: 30px;

         padding: 30px;

         box-shadow:
            0 14px 35px rgba(0, 0, 0, 0.05);
      }

      .account-card-header {

         margin-bottom: 28px;
      }

      .account-card-header h4 {

         margin: 0 0 8px;

         font-size: 24px;
         font-weight: 700;

         color: #333;
      }

      .account-card-header p {

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

         top: 0;
         left: 0;
         right: 0;
         bottom: 0;

         background: #ddd;

         border-radius: 34px;

         transition: .4s;

         cursor: pointer;
      }

      .slider:before {

         position: absolute;

         content: "";

         width: 26px;
         height: 26px;

         left: 4px;
         bottom: 4px;

         background: white;

         border-radius: 50%;

         transition: .4s;
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

      .account-save-wrapper {

         display: flex;
         justify-content: flex-end;
      }

      .btn-save-account {

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

      .btn-save-account:hover {

         transform: translateY(-2px);
      }

      /*
|--------------------------------------------------------------------------
| MOBILE
|--------------------------------------------------------------------------
*/

      @media(max-width:992px) {

         .account-grid {

            grid-template-columns: 1fr;
         }

         .profile-info-wrapper {

            flex-direction: column;

            align-items: flex-start;

            gap: 20px;

            margin-top: -60px;
         }

         .profile-main-info {

            padding-bottom: 0;
         }
      }

      @media(max-width:768px) {

         .profile-cover {

            height: 180px;
         }

         .profile-info-wrapper {

            padding: 0 24px 24px;
         }

         .profile-avatar {

            width: 120px;
            height: 120px;

            border-radius: 28px;
         }

         .profile-main-info h2 {

            font-size: 28px;
         }

         .account-card {

            padding: 24px;
         }

         .setting-item {

            flex-direction: column;

            align-items: flex-start;
         }

         .account-save-wrapper {

            width: 100%;
         }

         .btn-save-account {

            width: 100%;
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

         <!-- PROFILE HEADER -->
         <div class="profile-cover-card">

            <div class="profile-cover"></div>

            <div class="profile-info-wrapper">

               <!-- AVATAR -->
               <div class="profile-avatar-wrapper">

                  <img src="https://i.pravatar.cc/300?img=12"
                     class="profile-avatar"
                     id="avatarPreview">

                  <label class="change-avatar-btn">

                     <i class="fa-solid fa-camera"></i>

                     <input type="file"
                        hidden
                        id="avatarInput">

                  </label>

               </div>

               <!-- INFO -->
               <div class="profile-main-info">

                  <h2>
                     Zack Walker
                  </h2>

                  <p>
                     Administrator • GoSky Merchant
                  </p>

                  <div class="profile-badge-list">

                     <div class="profile-badge">

                        <i class="fa-solid fa-shield-halved"></i>

                        Verified

                     </div>

                     <div class="profile-badge">

                        <i class="fa-solid fa-star"></i>

                        Premium Account

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <!-- GRID -->
         <div class="account-grid">

            <!-- LEFT -->
            <div class="account-sidebar">

               <!-- MENU -->
               <div class="account-menu-card">

                  <a href="#profileSection"
                     class="account-menu active">

                     <i class="fa-solid fa-user"></i>

                     Profile Information

                  </a>

                  <a href="#securitySection"
                     class="account-menu">

                     <i class="fa-solid fa-lock"></i>

                     Security Settings

                  </a>

                  <a href="#notificationSection"
                     class="account-menu">

                     <i class="fa-solid fa-bell"></i>

                     Notifications

                  </a>

                  <a href="#preferencesSection"
                     class="account-menu">

                     <i class="fa-solid fa-sliders"></i>

                     Preferences

                  </a>

               </div>

               <!-- QUICK INFO -->
               <div class="account-info-card">

                  <div class="account-info-item">

                     <span>
                        Last Login
                     </span>

                     <h6>
                        Today, 08:42 AM
                     </h6>

                  </div>

                  <div class="account-info-item">

                     <span>
                        Account Created
                     </span>

                     <h6>
                        09 May 2026
                     </h6>

                  </div>

                  <div class="account-info-item">

                     <span>
                        Device
                     </span>

                     <h6>
                        MacBook Pro
                     </h6>

                  </div>

               </div>

            </div>

            <!-- RIGHT -->
            <div class="account-content">

               <!-- PROFILE -->
               <div class="account-card"
                  id="profileSection">

                  <div class="account-card-header">

                     <h4>

                        Profile Information

                     </h4>

                     <p>

                        Manage your personal account information

                     </p>

                  </div>

                  <div class="row g-4">

                     <!-- FULL NAME -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Full Name

                        </label>

                        <input type="text"
                           class="form-control-custom"
                           value="Zack Walker">

                     </div>

                     <!-- EMAIL -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Email Address

                        </label>

                        <input type="email"
                           class="form-control-custom"
                           value="zack@gosky.com">

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

                     <!-- ROLE -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Role

                        </label>

                        <input type="text"
                           class="form-control-custom"
                           value="Administrator">

                     </div>

                     <!-- BIO -->
                     <div class="col-12">

                        <label class="form-label-custom">

                           Bio

                        </label>

                        <textarea class="form-control-custom textarea-custom">Modern merchant dashboard administrator and business manager.</textarea>

                     </div>

                  </div>

               </div>

               <!-- SECURITY -->
               <div class="account-card"
                  id="securitySection">

                  <div class="account-card-header">

                     <h4>

                        Security Settings

                     </h4>

                     <p>

                        Update password and account security

                     </p>

                  </div>

                  <div class="row g-4">

                     <!-- CURRENT -->
                     <div class="col-md-12">

                        <label class="form-label-custom">

                           Current Password

                        </label>

                        <input type="password"
                           class="form-control-custom"
                           placeholder="••••••••">

                     </div>

                     <!-- NEW -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           New Password

                        </label>

                        <input type="password"
                           class="form-control-custom"
                           placeholder="••••••••">

                     </div>

                     <!-- CONFIRM -->
                     <div class="col-md-6">

                        <label class="form-label-custom">

                           Confirm Password

                        </label>

                        <input type="password"
                           class="form-control-custom"
                           placeholder="••••••••">

                     </div>

                  </div>

               </div>

               <!-- NOTIFICATION -->
               <div class="account-card"
                  id="notificationSection">

                  <div class="account-card-header">

                     <h4>

                        Notification Settings

                     </h4>

                     <p>

                        Manage notification preferences

                     </p>

                  </div>

                  <div class="settings-list">

                     <!-- ITEM -->
                     <div class="setting-item">

                        <div>

                           <h6>
                              Email Notification
                           </h6>

                           <span>
                              Receive order and account updates
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
                              Push Notification
                           </h6>

                           <span>
                              Receive realtime notifications
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
                              Security Alert
                           </h6>

                           <span>
                              Get alert for suspicious login
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
               <div class="account-save-wrapper">

                  <button class="btn-save-account">

                     <i class="fa-solid fa-floppy-disk me-2"></i>

                     Save Changes

                  </button>

               </div>

            </div>

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
      | AVATAR PREVIEW
      |--------------------------------------------------------------------------
      */

      const avatarInput =
         document.getElementById('avatarInput');

      const avatarPreview =
         document.getElementById('avatarPreview');

      avatarInput.addEventListener('change', function(e) {

         const file =
            e.target.files[0];

         if (file) {

            avatarPreview.src =
               URL.createObjectURL(file);

         }

      });
   </script>

</body>

</html>