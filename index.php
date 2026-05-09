   <!DOCTYPE html>
   <html lang="id">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Modern Yellow Login</title>

      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            --bg-soft: #f7f5ef;
            --text-dark: #3d3d3d;
            --text-light: #8a8a8a;
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
                  rgba(255, 255, 255, 0.25),
                  transparent 30%),

               radial-gradient(circle at bottom right,
                  rgba(255, 255, 255, 0.18),
                  transparent 30%),

               linear-gradient(135deg,
                  #d7b20f 0%,
                  #f6e37c 100%);

            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
         }

         .login-wrapper {
            width: 100%;
            max-width: 1100px;
            border-radius: 32px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
         }

         .left-side {
            background:
               linear-gradient(160deg,
                  rgba(255, 255, 255, 0.14),
                  rgba(255, 255, 255, 0.05));

            color: white;
            padding: 70px 60px;
            position: relative;
            overflow: hidden;
         }

         .left-side::before {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            top: -100px;
            left: -100px;
         }

         .left-side::after {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
         }

         .brand-logo {
            width: 85px;
            height: 85px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin-bottom: 28px;
            backdrop-filter: blur(10px);
         }

         .left-side h1 {
            font-size: 46px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
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
            gap: 15px;
            margin-bottom: 20px;
            font-size: 14px;
         }

         .feature-item i {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
         }

         .right-side {
            background: rgba(255, 255, 255, 0.92);
            padding: 60px;
         }

         .login-header h2 {
            font-size: 38px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
         }

         .login-header p {
            color: var(--text-light);
            margin-bottom: 40px;
         }

         .form-label {
            font-size: 15px;
            font-weight: 600;
            color: #4f4f4f;
            margin-bottom: 12px;
         }

         /* INPUT WRAPPER */
         .input-group-custom {
            position: relative;
            margin-bottom: 28px;
         }

         /* ICON KIRI */
         .input-group-custom .left-icon {
            position: absolute;
            left: 20px;
            top: 64%;
            transform: translateY(-50%);
            color: #999;
            font-size: 20px;
            z-index: 2;
            pointer-events: none;
         }

         /* ICON KANAN */
         .toggle-password {
            position: absolute;
            right: 20px;
            top: 64%;
            transform: translateY(-50%);
            color: #999;
            font-size: 20px;
            cursor: pointer;
            z-index: 2;
         }

         /* INPUT */
         .form-control {
            height: 68px;
            border-radius: 24px;
            border: 1px solid #ebebeb;
            padding-left: 60px;
            padding-right: 60px;
            font-size: 16px;
            background: #f8f8f8;
            transition: 0.3s ease;
            box-shadow: none;
         }

         .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(244, 196, 0, 0.16);
            background: white;
         }

         .form-check-input {
            width: 22px;
            height: 22px;
            border-radius: 8px;
            cursor: pointer;
         }

         .form-check-label {
            margin-left: 8px;
            color: #666;
            font-size: 15px;
         }

         .forgot-link {
            text-decoration: none;
            font-size: 15px;
            color: var(--primary-dark);
            font-weight: 600;
         }

         .forgot-link:hover {
            color: #b88f00;
         }

         .btn-login {
            width: 100%;
            height: 68px;
            border: none;
            border-radius: 24px;
            background: linear-gradient(135deg,
                  #f7c600,
                  #e5b300);

            color: white;
            font-size: 18px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 12px 25px rgba(244, 196, 0, 0.35);
         }

         .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 30px rgba(244, 196, 0, 0.45);
         }

         .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 35px 0;
            color: #999;
            font-size: 13px;
         }

         .divider::before,
         .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e4e4e4;
         }

         .divider::before {
            margin-right: 12px;
         }

         .divider::after {
            margin-left: 12px;
         }

         .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
         }

         .social-btn {
            height: 56px;
            border-radius: 18px;
            border: 1px solid #ececec;
            background: white;
            font-weight: 600;
            transition: 0.3s ease;
         }

         .social-btn:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
         }

         .register-text {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
         }

         .register-text a {
            text-decoration: none;
            color: var(--primary-dark);
            font-weight: 600;
         }

         @media (max-width: 991px) {
            .left-side {
               display: none;
            }

            .right-side {
               padding: 40px 28px;
            }

            .login-header h2 {
               font-size: 30px;
            }
         }

         @media (max-width: 576px) {

            .right-side {
               padding: 35px 22px;
            }

            .social-login {
               grid-template-columns: 1fr;
            }

            .btn-login,
            .form-control {
               height: 60px;
            }

            .form-control {
               font-size: 15px;
            }

            .login-header h2 {
               font-size: 28px;
            }
         }
      </style>
   </head>

   <body>

      <div class="login-wrapper">

         <div class="row g-0">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 left-side d-flex align-items-center">

               <div>

                  <div class="brand-logo">
                     <i class="fa-solid fa-sun"></i>
                  </div>

                  <h1>
                     Welcome <br>
                     Back 👋
                  </h1>

                  <p>
                     Modern login page dengan UI clean, elegant,
                     responsive dan pengalaman pengguna yang nyaman.
                  </p>

                  <div class="feature-list">

                     <div class="feature-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Secure Authentication</span>
                     </div>

                     <div class="feature-item">
                        <i class="fa-solid fa-bolt"></i>
                        <span>Fast & Smooth Experience</span>
                     </div>

                     <div class="feature-item">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <span>Responsive All Devices</span>
                     </div>

                  </div>

               </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 right-side">


               <div class="login-header">
                  <h2>Login Account</h2>
                  <p>Silahkan login untuk melanjutkan akses sistem.</p>
               </div>

               <form id="loginForm">



                  <!-- EMAIL -->
                  <div class="input-group-custom">

                     <label class="form-label">
                        Email Address
                     </label>

                     <i class="fa-regular fa-envelope left-icon"></i>

                     <input type="text" id="login" name="login"
                        class="form-control"
                        placeholder="Masukkan email anda">

                  </div>

                  <!-- PASSWORD -->
                  <div class="input-group-custom">

                     <label class="form-label">
                        Password
                     </label>

                     <i class="fa-solid fa-lock left-icon"></i>

                     <input type="password"
                        class="form-control"
                        id="password" name="password"
                        placeholder="Masukkan password">

                     <span class="toggle-password"
                        onclick="togglePassword()">

                        <i class="fa-regular fa-eye"
                           id="eyeIcon"></i>

                     </span>

                  </div>

                  <!-- OPTION -->
                  <div class="d-flex justify-content-between align-items-center mb-4">

                     <div class="form-check">

                        <input class="form-check-input"
                           type="checkbox"
                           id="remember">

                        <label class="form-check-label"
                           for="remember">

                           Remember me

                        </label>

                     </div>

                     <a href="reset-password"
                        class="forgot-link">

                        Forgot Password?

                     </a>

                  </div>

                  <div id="alertArea"></div>
                  <!-- BUTTON -->
                  <button type="submit" id="loginBtn"
                     class="btn btn-login">

                     Login Now

                  </button>


                  <!-- DIVIDER -->
                  <div class="divider">
                     OR LOGIN WITH
                  </div>


                  <!-- SOCIAL -->
                  <div class="social-login">

                     <button type="button"
                        class="btn social-btn">

                        <i class="fa-brands fa-google me-2"></i>
                        Google

                     </button>

                     <button type="button"
                        class="btn social-btn">

                        <i class="fa-brands fa-github me-2"></i>
                        Github

                     </button>

                  </div>

                  <!-- REGISTER -->
                  <div class="register-text">

                     Belum punya akun?
                     <a href="register">Daftar Sekarang</a>

                  </div>

               </form>

            </div>

         </div>

      </div>

      <script>
         function togglePassword() {

            const password =
               document.getElementById('password');

            const eyeIcon =
               document.getElementById('eyeIcon');

            if (password.type === 'password') {

               password.type = 'text';

               eyeIcon.classList.remove('fa-eye');
               eyeIcon.classList.add('fa-eye-slash');

            } else {

               password.type = 'password';

               eyeIcon.classList.remove('fa-eye-slash');
               eyeIcon.classList.add('fa-eye');

            }
         }
      </script>

      <script>
         document
            .getElementById('loginForm')

            .addEventListener('submit', async function(e) {

               e.preventDefault();

               const login =
                  document.getElementById('login').value;

               const password =
                  document.getElementById('password').value;

               const button =
                  document.getElementById('loginBtn');

               const alertArea =
                  document.getElementById('alertArea');

               /*
               |--------------------------------------------------------------------------
               | RESET ALERT
               |--------------------------------------------------------------------------
               */

               alertArea.innerHTML = '';

               /*
               |--------------------------------------------------------------------------
               | VALIDASI
               |--------------------------------------------------------------------------
               */

               if (!login || !password) {

                  alertArea.innerHTML = `
            <div class="alert alert-danger rounded-4 border-0 mb-4">

                Email / Password wajib diisi

            </div>
        `;

                  return;
               }

               /*
               |--------------------------------------------------------------------------
               | BUTTON LOADING
               |--------------------------------------------------------------------------
               */

               button.disabled = true;

               button.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2"></span>
        Processing...
    `;

               try {

                  /*
                  |--------------------------------------------------------------------------
                  | FETCH LOGIN
                  |--------------------------------------------------------------------------
                  */

                  const response = await fetch(
                     'controller/authController.php', {
                        method: 'POST',

                        headers: {
                           'Content-Type': 'application/json'
                        },

                        body: JSON.stringify({
                           login,
                           password
                        })
                     }
                  );

                  /*
                  |--------------------------------------------------------------------------
                  | GET RAW RESPONSE
                  |--------------------------------------------------------------------------
                  */

                  const text =
                     await response.text();

                  console.log(text);

                  /*
                  |--------------------------------------------------------------------------
                  | PARSE JSON
                  |--------------------------------------------------------------------------
                  */

                  let result;

                  try {

                     result = JSON.parse(text);

                  } catch (parseError) {

                     alertArea.innerHTML = `
                <div class="alert alert-danger rounded-4 border-0 mb-4">

                    Invalid JSON Response

                    <hr>

                    <small>${text}</small>

                </div>
            `;

                     button.disabled = false;

                     button.innerHTML = 'Login Now';

                     return;
                  }

                  /*
                  |--------------------------------------------------------------------------
                  | SUCCESS
                  |--------------------------------------------------------------------------
                  */

                  if (result.status === 'success') {

                     alertArea.innerHTML = `
                <div class="alert alert-success rounded-4 border-0 mb-4">

                    ${result.message}

                </div>
            `;

                     setTimeout(() => {

                        window.location.href =
                           result.redirect;

                     }, 1000);

                  } else {

                     alertArea.innerHTML = `
                <div class="alert alert-danger rounded-4 border-0 mb-4">

                    ${result.message}

                </div>
            `;
                  }

               } catch (error) {

                  console.error(error);

                  alertArea.innerHTML = `
            <div class="alert alert-danger rounded-4 border-0 mb-4">

                ${error}

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
        Login Now
    `;

            });
      </script>

   </body>

   </html>