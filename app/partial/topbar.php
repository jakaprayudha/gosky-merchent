<?php

/*
|--------------------------------------------------------------------------
| CURRENT PAGE
|--------------------------------------------------------------------------
*/

$currentPage =
   basename(
      $_SERVER['PHP_SELF'],
      '.php'
   );

/*
|--------------------------------------------------------------------------
| PAGE TITLE & DESCRIPTION
|--------------------------------------------------------------------------
*/

$pageTitle =
   'Dashboard Overview 👋';

$pageDesc =
   'Welcome back to your modern merchant dashboard.';

/*
|--------------------------------------------------------------------------
| PAGE CONFIG
|--------------------------------------------------------------------------
*/

switch ($currentPage) {

   case 'dashboard':

      $pageTitle =
         'Dashboard Overview 👋';

      $pageDesc =
         'Monitor restaurant sales and customer activity.';
      break;

   case 'products':

      $pageTitle =
         'Products Management 🍔';

      $pageDesc =
         'Manage your restaurant products and stock.';
      break;

   case 'orders':

      $pageTitle =
         'Orders Management 🛒';

      $pageDesc =
         'Track incoming customer orders in realtime.';
      break;

   case 'customers':

      $pageTitle =
         'Customer Analytics 👥';

      $pageDesc =
         'Monitor customer activity and engagement.';
      break;

   case 'analytics':

      $pageTitle =
         'Sales Analytics 📈';

      $pageDesc =
         'Track revenue and restaurant performance.';
      break;

   case 'reports':

      $pageTitle =
         'Reports & Export 📑';

      $pageDesc =
         'Generate and export merchant reports.';
      break;

   case 'store-settings':

      $pageTitle =
         'Store Settings ⚙️';

      $pageDesc =
         'Manage your restaurant information.';
      break;

   case 'account-settings':

      $pageTitle =
         'Account Settings 🔐';

      $pageDesc =
         'Manage your account and security.';
      break;
}
?>

<div class="topbar">

   <!-- LEFT -->
   <div class="topbar-left">

      <div>

         <h3>

            <?= $pageTitle ?>

         </h3>

         <p>

            <?= $pageDesc ?>

         </p>

      </div>

   </div>

   <!-- RIGHT -->
   <div class="topbar-right">

      <!-- NOTIFICATION -->
      <button class="icon-btn">

         <i class="fa-regular fa-bell"></i>

         <span class="notif-dot"></span>

      </button>

      <!-- SEARCH -->
      <button class="icon-btn">

         <i class="fa-solid fa-magnifying-glass"></i>

      </button>

      <!-- PROFILE -->
      <div class="profile-box">

         <img src="https://i.pravatar.cc/100"
            alt="profile">

         <div>

            <h6>
               Zack Walker
            </h6>

            <span>
               Administrator
            </span>

         </div>

      </div>

   </div>

</div>