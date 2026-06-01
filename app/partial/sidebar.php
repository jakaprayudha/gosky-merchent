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
| ACTIVE MENU FUNCTION
|--------------------------------------------------------------------------
*/

function activeMenu($page)
{
   global $currentPage;

   return $currentPage === $page
      ? 'active'
      : '';
}
?>

<div class="sidebar">

   <!-- BRAND -->
   <div class="brand">

      <div class="brand-logo">

         <i class="fa-solid fa-store"></i>

      </div>

      <div>

         <h4>
            GoSky
         </h4>

         <p>
            Merchant Dashboard
         </p>

      </div>

   </div>

   <!-- MENU -->
   <div class="menu-title">

      Main Menu

   </div>

   <!-- DASHBOARD -->
   <a href="dashboard"
      class="menu-item <?= activeMenu('dashboard') ?>">

      <i class="fa-solid fa-house"></i>

      <span>
         Dashboard
      </span>

   </a>

   <!-- PRODUCTS -->
   <a href="products"
      class="menu-item <?= activeMenu('products') ?>">

      <i class="fa-solid fa-box"></i>

      <span>
         Products
      </span>

   </a>

   <!-- ORDERS -->
   <a href="orders"
      class="menu-item <?= activeMenu('orders') ?>">

      <i class="fa-solid fa-cart-shopping"></i>

      <span>
         Orders
      </span>

   </a>

   <!-- CUSTOMERS -->
   <!-- <a href="customers"
      class="menu-item <?= activeMenu('customers') ?>">

      <i class="fa-solid fa-users"></i>

      <span>
         Customers
      </span>

   </a> -->

   <!-- ANALYTICS -->
   <a href="analytics"
      class="menu-item <?= activeMenu('analytics') ?>">

      <i class="fa-solid fa-chart-line"></i>

      <span>
         Analytics
      </span>

   </a>

   <!-- REPORT -->
   <a href="reports"
      class="menu-item <?= activeMenu('reports') ?>">

      <i class="fa-solid fa-file-lines"></i>

      <span>
         Reports
      </span>

   </a>

   <!-- MENU TITLE -->
   <div class="menu-title">

      Settings

   </div>

   <!-- STORE -->
   <a href="store-settings"
      class="menu-item <?= activeMenu('store-settings') ?>">

      <i class="fa-solid fa-store"></i>

      <span>
         Store Settings
      </span>

   </a>

   <!-- ACCOUNT -->
   <a href="account-settings"
      class="menu-item <?= activeMenu('account-settings') ?>">

      <i class="fa-solid fa-user-gear"></i>

      <span>
         Account Settings
      </span>

   </a>

   <!-- LOGOUT -->
   <a href="logout"
      class="menu-item">

      <i class="fa-solid fa-right-from-bracket"></i>

      <span>
         Logout
      </span>

   </a>

</div>