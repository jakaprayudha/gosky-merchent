<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Register Merchant</title>

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

   <!-- Font Awesome -->
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

   <style>
      :root {
         --primary: #f4c400;
         --primary-dark: #d8ab00;
         --text-dark: #3d3d3d;
         --text-light: #8b8b8b;
         --bg-input: #f8f8f8;
      }

      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      body {

         min-height: 100vh;

         font-family: 'Poppins', sans-serif;

         background:
            radial-gradient(circle at top left,
               rgba(255, 255, 255, 0.22),
               transparent 30%),

            radial-gradient(circle at bottom right,
               rgba(255, 255, 255, 0.18),
               transparent 30%),

            linear-gradient(135deg,
               #d8b311 0%,
               #f6e37b 100%);

         display: flex;
         align-items: center;
         justify-content: center;

         padding: 24px;
      }

      .register-wrapper {

         width: 100%;
         max-width: 1280px;

         border-radius: 38px;

         overflow: hidden;

         background:
            rgba(255, 255, 255, 0.15);

         backdrop-filter: blur(16px);

         box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.12);
      }

      /* LEFT */
      .left-side {

         padding: 70px 60px;

         color: white;

         position: relative;

         overflow: hidden;

         background:
            linear-gradient(160deg,
               rgba(255, 255, 255, 0.12),
               rgba(255, 255, 255, 0.05));
      }

      .left-side::before {

         content: '';

         position: absolute;

         width: 260px;
         height: 260px;

         border-radius: 50%;

         background:
            rgba(255, 255, 255, 0.08);

         top: -100px;
         left: -100px;
      }

      .left-side::after {

         content: '';

         position: absolute;

         width: 220px;
         height: 220px;

         border-radius: 50%;

         background:
            rgba(255, 255, 255, 0.08);

         bottom: -100px;
         right: -100px;
      }

      .content-left {
         position: relative;
         z-index: 2;
      }

      .logo-box {

         width: 92px;
         height: 92px;

         border-radius: 30px;

         background:
            rgba(255, 255, 255, 0.18);

         display: flex;
         align-items: center;
         justify-content: center;

         font-size: 40px;

         margin-bottom: 28px;

         backdrop-filter: blur(10px);
      }

      .left-side h1 {

         font-size: 52px;
         font-weight: 700;

         line-height: 1.2;

         margin-bottom: 22px;
      }

      .left-side p {

         font-size: 15px;

         line-height: 1.9;

         opacity: 0.92;
      }

      .feature-list {
         margin-top: 40px;
      }

      .feature-item {

         display: flex;
         align-items: center;
         gap: 16px;

         margin-bottom: 22px;
      }

      .feature-item i {

         width: 44px;
         height: 44px;

         border-radius: 14px;

         background:
            rgba(255, 255, 255, 0.15);

         display: flex;
         align-items: center;
         justify-content: center;
      }

      /* RIGHT */
      .right-side {

         background:
            rgba(255, 255, 255, 0.95);

         padding: 50px;

         max-height: 100vh;

         overflow-y: auto;
      }

      .right-side::-webkit-scrollbar {
         width: 8px;
      }

      .right-side::-webkit-scrollbar-thumb {

         background:
            linear-gradient(180deg,
               #f7c600,
               #d9a700);

         border-radius: 20px;
      }

      .header-register {
         margin-bottom: 35px;
      }

      .header-register h2 {

         font-size: 38px;
         font-weight: 700;

         color: var(--text-dark);

         margin-bottom: 10px;
      }

      .header-register p {

         color: var(--text-light);

         margin: 0;
      }

      .section-title {

         display: flex;
         align-items: center;
         gap: 14px;

         margin-bottom: 28px;
         margin-top: 10px;
      }

      .section-icon {

         width: 48px;
         height: 48px;

         border-radius: 16px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         display: flex;
         align-items: center;
         justify-content: center;

         color: white;

         box-shadow:
            0 10px 24px rgba(244, 196, 0, 0.3);
      }

      .section-title h5 {

         margin: 0;

         font-size: 20px;
         font-weight: 700;

         color: var(--text-dark);
      }

      .form-label {

         font-size: 14px;
         font-weight: 600;

         color: #4b4b4b;

         margin-bottom: 10px;
      }

      .input-group-custom {

         position: relative;

         margin-bottom: 24px;
      }

      .left-icon {

         position: absolute;

         left: 20px;
         top: 64%;

         transform: translateY(-50%);

         color: #9a9a9a;

         font-size: 18px;

         z-index: 2;
      }

      .toggle-password {

         position: absolute;

         right: 20px;
         top: 64%;

         transform: translateY(-50%);

         color: #9a9a9a;

         cursor: pointer;

         z-index: 2;
      }

      .form-control,
      .form-select {

         height: 66px;

         border-radius: 22px;

         border: 1px solid #ececec;

         background: var(--bg-input);

         padding-left: 58px;

         font-size: 15px;

         transition: 0.3s ease;
      }

      .form-select {
         padding-left: 58px;
      }

      .form-control:focus,
      .form-select:focus {

         border-color: var(--primary);

         box-shadow:
            0 0 0 4px rgba(244, 196, 0, 0.15);

         background: white;
      }

      /* BANNER */
      .banner-upload {
         margin-bottom: 24px;
      }

      .banner-label {

         width: 100%;
         height: 220px;

         border-radius: 24px;

         overflow: hidden;

         cursor: pointer;

         position: relative;

         display: block;

         border: 2px dashed #e5e5e5;
      }

      .banner-label img {

         width: 100%;
         height: 100%;

         object-fit: cover;
      }

      .banner-overlay {

         position: absolute;
         inset: 0;

         background:
            rgba(0, 0, 0, 0.35);

         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;

         gap: 10px;

         color: white;

         opacity: 0;

         transition: 0.3s ease;
      }

      .banner-label:hover .banner-overlay {
         opacity: 1;
      }

      .banner-overlay i {
         font-size: 34px;
      }

      .btn-location {

         width: 100%;
         height: 60px;

         border: none;

         border-radius: 18px;

         background:
            rgba(244, 196, 0, 0.12);

         color: var(--primary-dark);

         font-weight: 600;

         margin-bottom: 24px;

         transition: 0.3s ease;
      }

      .btn-location:hover {
         background:
            rgba(244, 196, 0, 0.2);
      }

      .btn-register {

         width: 100%;
         height: 68px;

         border: none;

         border-radius: 22px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #e1af00);

         color: white;

         font-size: 17px;
         font-weight: 700;

         transition: 0.3s ease;

         box-shadow:
            0 16px 34px rgba(244, 196, 0, 0.3);
      }

      .btn-register:hover {

         transform: translateY(-3px);

         box-shadow:
            0 18px 38px rgba(244, 196, 0, 0.42);
      }

      .form-check {
         margin-bottom: 26px;
      }

      .form-check-input {

         width: 22px;
         height: 22px;

         border-radius: 8px;
      }

      .form-check-label {

         margin-left: 8px;

         color: #666;

         font-size: 14px;
      }

      .form-check-label a {

         color: var(--primary-dark);

         text-decoration: none;

         font-weight: 600;
      }

      .login-text {

         text-align: center;

         margin-top: 28px;

         color: #666;

         font-size: 14px;
      }

      .login-text a {

         color: var(--primary-dark);

         text-decoration: none;

         font-weight: 700;
      }

      @media(max-width:991px) {

         .left-side {
            display: none;
         }

         .right-side {
            padding: 40px 26px;
         }

         .header-register h2 {
            font-size: 32px;
         }
      }

      @media(max-width:576px) {

         .right-side {
            padding: 34px 20px;
         }

         .header-register h2 {
            font-size: 28px;
         }

         .form-control,
         .form-select,
         .btn-register {
            height: 60px;
         }

         .banner-label {
            height: 180px;
         }
      }
   </style>
</head>

<body>

   <div class="register-wrapper">

      <div class="row g-0">

         <!-- LEFT -->
         <div class="col-lg-5 left-side d-flex align-items-center">

            <div class="content-left">

               <div class="logo-box">

                  <i class="fa-solid fa-store"></i>

               </div>

               <h1>
                  Bergabung bersama <br>
                  Gosky 🚀
               </h1>

               <p>
                  Daftarkan toko anda
                  untuk menjangkau lebih banyak customer
                  dengan sistem modern dan cepat.
               </p>

               <div class="feature-list">

                  <div class="feature-item">

                     <i class="fa-solid fa-chart-line"></i>

                     <span>
                        Menambah pendapatan toko anda
                     </span>

                  </div>

                  <div class="feature-item">

                     <i class="fa-solid fa-bolt"></i>

                     <span>
                        Anda dapat analisa laporan
                     </span>

                  </div>

                  <div class="feature-item">

                     <i class="fa-solid fa-mobile-screen"></i>

                     <span>
                        Mudah mengelola toko anda
                     </span>

                  </div>

               </div>

            </div>

         </div>

         <!-- RIGHT -->
         <div class="col-lg-7 right-side">

            <div class="header-register">

               <h2>
                  Register Toko
               </h2>

               <p>
                  Lengkapi informasi toko dan akun owner.
               </p>

            </div>

            <!-- ALERT -->
            <div id="alertArea"></div>

            <!-- FORM -->
            <form id="registerForm">

               <!-- RESTAURANT -->
               <div class="section-title">

                  <div class="section-icon">

                     <i class="fa-solid fa-store"></i>

                  </div>

                  <h5>
                     Informasi Toko
                  </h5>

               </div>

               <div class="row">

                  <!-- PHONE FIRST -->
                  <div class="col-12">

                     <div class="input-group-custom">

                        <label class="form-label">
                           No.Telepon Toko
                        </label>

                        <i class="fa-solid fa-phone left-icon"></i>

                        <input type="text"
                           name="phone"
                           id="phone"
                           class="form-control"
                           placeholder="+62xxx"
                           onblur="checkRestaurantPhone()">

                     </div>

                  </div>

                  <!-- RESTAURANT FOUND -->
                  <div class="col-12">

                     <div id="restaurantInfo"
                        class="alert border-0 rounded-4 d-none"
                        style="background:#fff9e2;">

                     </div>

                  </div>

                  <!-- RESTAURANT -->
                  <div class="col-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Nama Toko
                        </label>

                        <i class="fa-solid fa-store left-icon"></i>

                        <input type="text"
                           name="restaurant_name"
                           id="restaurant_name"
                           class="form-control"
                           placeholder="Nama restaurant">

                     </div>

                  </div>

                  <!-- CATEGORY -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Kategori
                        </label>

                        <i class="fa-solid fa-layer-group left-icon"></i>

                        <select
                           name="category_id"
                           id="category_id"
                           class="form-select">

                           <option value="">
                              Loading...
                           </option>

                        </select>

                     </div>

                  </div>



                  <!-- BANNER -->
                  <div class="col-12">

                     <label class="form-label">
                        Restaurant Banner
                     </label>

                     <div class="banner-upload">

                        <input type="file"
                           name="banner"
                           id="banner"
                           hidden>

                        <label for="banner"
                           class="banner-label">

                           <img id="bannerPreview"
                              src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1200' height='400' viewBox='0 0 1200 400'%3E%3Crect width='1200' height='400' fill='%23f5f5f5'/%3E%3Cg fill='%23c4c4c4'%3E%3Cpath d='M555 145h90v90h-90z'/%3E%3Cpath d='M580 120h40v40h-40z'/%3E%3C/g%3E%3Ctext x='50%25' y='58%25' dominant-baseline='middle' text-anchor='middle' font-family='Poppins,sans-serif' font-size='34' fill='%23999999'%3EUpload Toko Banner%3C/text%3E%3C/svg%3E">

                           <div class="banner-overlay">

                              <i class="fa-solid fa-camera"></i>

                              <span>
                                 Upload Banner
                              </span>

                           </div>

                        </label>

                     </div>

                  </div>

                  <!-- ADDRESS -->
                  <div class="col-12">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Alamat
                        </label>

                        <i class="fa-solid fa-location-dot left-icon"></i>

                        <input type="text"
                           name="address"
                           id="address"
                           class="form-control"
                           placeholder="Alamat restaurant">

                     </div>

                  </div>

                  <!-- GPS -->
                  <div class="col-12">

                     <button type="button"
                        class="btn-location"
                        onclick="getLocation()">

                        <i class="fa-solid fa-location-crosshairs me-2"></i>

                        Klik Untuk Deteksi Toko Anda

                     </button>

                  </div>

                  <!-- LAT -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Latitude
                        </label>

                        <i class="fa-solid fa-map-pin left-icon"></i>

                        <input type="text"
                           name="latitude"
                           id="latitude"
                           class="form-control"
                           placeholder="-6.200000">

                     </div>

                  </div>

                  <!-- LNG -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Longitude
                        </label>

                        <i class="fa-solid fa-map-location-dot left-icon"></i>

                        <input type="text"
                           name="longitude"
                           id="longitude"
                           class="form-control"
                           placeholder="106.816666">

                     </div>

                  </div>

                  <!-- OPEN -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Jam Buka
                        </label>

                        <input type="time"
                           name="open_time"
                           id="open_time"
                           class="form-control">

                     </div>

                  </div>

                  <!-- CLOSE -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Jam Tutup
                        </label>

                        <input type="time"
                           name="close_time"
                           id="close_time"
                           class="form-control">

                     </div>

                  </div>

               </div>

               <!-- OWNER -->
               <div class="section-title mt-4">

                  <div class="section-icon">

                     <i class="fa-solid fa-user"></i>

                  </div>

                  <h5>
                     Informasi Pemilik
                  </h5>

               </div>

               <div class="row">

                  <!-- NAME -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Nama Lengkap
                        </label>

                        <i class="fa-regular fa-user left-icon"></i>

                        <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           placeholder="Nama lengkap">

                     </div>

                  </div>

                  <!-- EMAIL -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Alamat Email
                        </label>

                        <i class="fa-regular fa-envelope left-icon"></i>

                        <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           placeholder="Alamat email">

                     </div>

                  </div>

                  <!-- PASSWORD -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Password
                        </label>

                        <i class="fa-solid fa-lock left-icon"></i>

                        <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="Password">

                        <span class="toggle-password"
                           onclick="togglePassword('password','eye1')">

                           <i class="fa-regular fa-eye"
                              id="eye1"></i>

                        </span>

                     </div>

                  </div>

                  <!-- CONFIRM -->
                  <div class="col-md-6">

                     <div class="input-group-custom">

                        <label class="form-label">
                           Ulangi Password
                        </label>

                        <i class="fa-solid fa-lock left-icon"></i>

                        <input type="password"
                           id="confirmPassword"
                           class="form-control"
                           placeholder="Konfirmasi password">

                        <span class="toggle-password"
                           onclick="togglePassword('confirmPassword','eye2')">

                           <i class="fa-regular fa-eye"
                              id="eye2"></i>

                        </span>

                     </div>

                  </div>

               </div>

               <!-- TERMS -->
               <div class="form-check">

                  <input class="form-check-input"
                     type="checkbox"
                     id="agree">

                  <label class="form-check-label"
                     for="agree">

                     Saya setuju dengan
                     <a href="terms">
                        Terms & Conditions
                     </a>

                  </label>

               </div>

               <!-- BUTTON -->
               <button type="submit"
                  class="btn btn-register"
                  id="registerBtn">

                  Buat Akun Toko

               </button>

               <!-- LOGIN -->
               <div class="login-text">

                  Sudah punya akun?
                  <a href="index">
                     Login Sekarang
                  </a>

               </div>

            </form>

         </div>

      </div>

   </div>

   <!-- BOOTSTRAP -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <script>
      /*
        |--------------------------------------------------------------------------
        | TOGGLE PASSWORD
        |--------------------------------------------------------------------------
        */

      function togglePassword(inputId, iconId) {

         const input =
            document.getElementById(inputId);

         const icon =
            document.getElementById(iconId);

         if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');

         } else {

            input.type = 'password';

            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');

         }
      }

      /*
      |--------------------------------------------------------------------------
      | BANNER PREVIEW
      |--------------------------------------------------------------------------
      */

      document
         .getElementById('banner')

         .addEventListener('change', function(e) {

            const file =
               e.target.files[0];

            if (file) {

               document
                  .getElementById('bannerPreview')

                  .src =
                  URL.createObjectURL(file);
            }

         });

      /*
      |--------------------------------------------------------------------------
      | LOAD CATEGORY
      |--------------------------------------------------------------------------
      */

      async function loadCategory() {

         try {

            const response =
               await fetch(
                  'controller/getRestaurantCategory.php'
               );

            const data =
               await response.json();

            let html =
               '<option value="">Pilih Category</option>';

            data.forEach(item => {

               html += `
                        <option value="${item.id}">
                            ${item.name}
                        </option>
                    `;
            });

            document
               .getElementById('category_id')
               .innerHTML = html;

         } catch (error) {

            console.error(error);
         }
      }

      loadCategory();

      /*
      |--------------------------------------------------------------------------
      | GET LOCATION
      |--------------------------------------------------------------------------
      */

      function getLocation() {

         navigator.geolocation.getCurrentPosition(

            function(position) {

               document
                  .getElementById('latitude')
                  .value =
                  position.coords.latitude;

               document
                  .getElementById('longitude')
                  .value =
                  position.coords.longitude;

            }

         );
      }

      /*
      |--------------------------------------------------------------------------
      | REGISTER
      |--------------------------------------------------------------------------
      */

      document
         .getElementById('registerForm')

         .addEventListener('submit', async function(e) {

            e.preventDefault();

            const alertArea =
               document.getElementById('alertArea');

            const button =
               document.getElementById('registerBtn');

            const password =
               document.getElementById('password').value;

            const confirm =
               document.getElementById('confirmPassword').value;

            const agree =
               document.getElementById('agree');

            /*
            |--------------------------------------------------------------------------
            | VALIDATION
            |--------------------------------------------------------------------------
            */

            if (password !== confirm) {

               alertArea.innerHTML = `
                        <div class="alert alert-danger border-0 rounded-4 mb-4">

                            Konfirmasi password tidak cocok

                        </div>
                    `;

               return;
            }

            if (!agree.checked) {

               alertArea.innerHTML = `
                        <div class="alert alert-danger border-0 rounded-4 mb-4">

                            Anda harus menyetujui Terms & Conditions

                        </div>
                    `;

               return;
            }

            /*
            |--------------------------------------------------------------------------
            | LOADING
            |--------------------------------------------------------------------------
            */

            button.disabled = true;

            button.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Processing...
                `;

            alertArea.innerHTML = '';

            try {

               const formData =
                  new FormData(this);

               const response =
                  await fetch(

                     'controller/registerRestaurant.php',

                     {
                        method: 'POST',
                        body: formData
                     }

                  );

               const result =
                  await response.json();

               /*
               |--------------------------------------------------------------------------
               | SUCCESS
               |--------------------------------------------------------------------------
               */

               if (result.status === 'success') {

                  // =====================================
                  // SUCCESS
                  // =====================================
                  Swal.fire({

                     icon: 'success',

                     title: 'Register Berhasil 🎉',

                     html: `
         Akun merchant berhasil dibuat
         <br><br>
         Redirect ke halaman login...
      `,

                     timer: 2500,

                     timerProgressBar: true,

                     showConfirmButton: false,

                     confirmButtonColor: '#f4c400'

                  });

                  setTimeout(() => {

                     window.location.href = 'index';

                  }, 2500);

               } else {

                  // =====================================
                  // ERROR
                  // =====================================
                  Swal.fire({

                     icon: 'error',

                     title: 'Register Gagal',

                     text: result.message ??

                        'Terjadi kesalahan saat register merchant',

                     confirmButtonColor: '#dc3545'

                  });

               }

            } catch (error) {

               console.error(error);

               alertArea.innerHTML = `
                        <div class="alert alert-danger border-0 rounded-4 mb-4">

                            Server error occurred

                        </div>
                    `;
            }

            /*
            |--------------------------------------------------------------------------
            | RESET BUTTON
            |--------------------------------------------------------------------------
            */

            button.disabled = false;

            button.innerHTML = `
                    Create Merchant Account
                `;

         });
      /*
      |--------------------------------------------------------------------------
      | CHECK PHONE RESTAURANT
      |--------------------------------------------------------------------------
      */

      async function checkRestaurantPhone() {

         const phoneInput =
            document.getElementById('phone');

         const restaurantInfo =
            document.getElementById('restaurantInfo');

         let phone =
            phoneInput.value.trim();

         if (!phone) {

            restaurantInfo.classList.add('d-none');
            return;
         }

         /*
         |--------------------------------------------------------------------------
         | FORMAT +62
         |--------------------------------------------------------------------------
         */

         phone =
            phone.replace(/\D/g, '');

         if (phone.startsWith('0')) {

            phone =
               '+62' + phone.substring(1);

         } else if (phone.startsWith('62')) {

            phone =
               '+' + phone;

         } else if (!phone.startsWith('62')) {

            phone =
               '+62' + phone;
         }

         phoneInput.value = phone;

         try {

            const formData =
               new FormData();

            formData.append(
               'phone',
               phone
            );

            const response =
               await fetch(
                  'controller/checkRestaurantPhone.php', {
                     method: 'POST',
                     body: formData
                  }
               );

            const result =
               await response.json();

            /*
            |--------------------------------------------------------------------------
            | FOUND
            |--------------------------------------------------------------------------
            */

            if (result.status === 'found') {

               const data = result.data;

               // =====================================
               // ALERT INFO
               // =====================================
               restaurantInfo.classList.remove('d-none');

               restaurantInfo.innerHTML = `
      <div class="d-flex align-items-center">

         <div class="me-3">

            <i class="fa-solid fa-circle-check
               text-success fs-2"></i>

         </div>

         <div>

            <div class="fw-bold text-success mb-1">

               Restaurant Anda Telah Terdaftar 🎉

            </div>

            <small class="text-muted">

               Silahkan lengkapi data toko anda
               untuk melanjutkan registrasi merchant.

            </small>

         </div>

      </div>
   `;

               // =====================================
               // AUTO FILL FORM
               // =====================================

               // restaurant
               document.getElementById(
                  'restaurant_name'
               ).value = data.name ?? '';

               // category
               document.getElementById(
                  'category_id'
               ).value = data.category_id ?? '';

               // address
               document.getElementById(
                  'address'
               ).value = data.address ?? '';

               // latitude
               document.getElementById(
                  'latitude'
               ).value = data.latitude ?? '';

               // longitude
               document.getElementById(
                  'longitude'
               ).value = data.longitude ?? '';

               // open time
               document.getElementById(
                  'open_time'
               ).value = data.open_time ?? '';

               // close time
               document.getElementById(
                  'close_time'
               ).value = data.close_time ?? '';

               // =====================================
               // BANNER PREVIEW
               // =====================================

               if (data.banner_url) {

                  document.getElementById(
                     'bannerPreview'
                  ).src = data.banner_url;
               }

            } else {

               /*
               |--------------------------------------------------------------------------
               | NOT FOUND
               |--------------------------------------------------------------------------
               */

               restaurantInfo.classList.remove(
                  'd-none'
               );

               restaurantInfo.innerHTML = `
            <div class="text-danger fw-semibold">

               <i class="fa-solid fa-circle-xmark me-2"></i>

               Nomor HP belum terdaftar
               pada master toko kami

            </div>

            <small class="text-muted">
               Silahkan melakukan registrasi toko untuk bergabung bersama kami
            </small>
         `;
            }

         } catch (error) {

            console.error(error);

            restaurantInfo.classList.remove(
               'd-none'
            );

            restaurantInfo.innerHTML = `
         <div class="text-danger">

            Gagal validasi nomor HP

         </div>
      `;
         }
      }
   </script>


</body>

</html>