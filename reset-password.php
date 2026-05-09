<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reset Password</title>

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
         --bg-soft: #f8f6ef;
         --text-dark: #3d3d3d;
         --text-light: #8b8b8b;
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
         padding: 20px;
         overflow: hidden;
      }

      .reset-wrapper {
         width: 100%;
         max-width: 520px;
      }

      .reset-card {
         background: rgba(255, 255, 255, 0.93);
         backdrop-filter: blur(15px);
         border-radius: 34px;
         padding: 55px 45px;
         box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
         position: relative;
         overflow: hidden;
      }

      .reset-card::before {
         content: '';
         position: absolute;
         width: 220px;
         height: 220px;
         background: rgba(244, 196, 0, 0.08);
         border-radius: 50%;
         top: -120px;
         right: -100px;
      }

      .reset-card::after {
         content: '';
         position: absolute;
         width: 180px;
         height: 180px;
         background: rgba(244, 196, 0, 0.06);
         border-radius: 50%;
         bottom: -90px;
         left: -90px;
      }

      .reset-content {
         position: relative;
         z-index: 2;
      }

      .icon-box {
         width: 95px;
         height: 95px;
         margin: auto;
         margin-bottom: 28px;
         border-radius: 30px;
         background: linear-gradient(135deg,
               #f7c600,
               #e4b200);

         display: flex;
         align-items: center;
         justify-content: center;

         box-shadow: 0 15px 35px rgba(244, 196, 0, 0.35);
      }

      .icon-box i {
         color: white;
         font-size: 38px;
      }

      .title {
         text-align: center;
         margin-bottom: 10px;
      }

      .title h2 {
         font-size: 34px;
         font-weight: 700;
         color: var(--text-dark);
         margin-bottom: 12px;
      }

      .title p {
         color: var(--text-light);
         font-size: 15px;
         line-height: 1.8;
         margin-bottom: 38px;
      }

      .input-group-custom {
         position: relative;
         margin-bottom: 28px;
      }

      .form-label {
         font-size: 15px;
         font-weight: 600;
         color: #4e4e4e;
         margin-bottom: 12px;
      }

      .left-icon {
         position: absolute;
         left: 20px;
         top: 64%;
         transform: translateY(-50%);
         color: #9a9a9a;
         font-size: 20px;
         z-index: 2;
      }

      .form-control {
         height: 68px;
         border-radius: 24px;
         border: 1px solid #ececec;
         background: #f9f9f9;
         padding-left: 60px;
         font-size: 16px;
         transition: 0.3s ease;
      }

      .form-control:focus {
         border-color: var(--primary);
         background: white;
         box-shadow: 0 0 0 4px rgba(244, 196, 0, 0.15);
      }

      .btn-reset {
         width: 100%;
         height: 68px;
         border: none;
         border-radius: 24px;
         background: linear-gradient(135deg,
               #f7c600,
               #e2b000);

         color: white;
         font-size: 18px;
         font-weight: 700;
         transition: all 0.3s ease;

         box-shadow: 0 15px 30px rgba(244, 196, 0, 0.35);
      }

      .btn-reset:hover {
         transform: translateY(-3px);
         box-shadow: 0 18px 35px rgba(244, 196, 0, 0.45);
      }

      .back-login {
         text-align: center;
         margin-top: 28px;
      }

      .back-login a {
         text-decoration: none;
         color: var(--primary-dark);
         font-weight: 600;
         font-size: 15px;
         transition: 0.3s;
      }

      .back-login a:hover {
         color: #b88f00;
      }

      @media (max-width: 576px) {

         .reset-card {
            padding: 40px 24px;
            border-radius: 28px;
         }

         .title h2 {
            font-size: 28px;
         }

         .form-control,
         .btn-reset {
            height: 60px;
         }

         .icon-box {
            width: 85px;
            height: 85px;
         }

         .icon-box i {
            font-size: 32px;
         }
      }
   </style>
</head>

<body>

   <div class="reset-wrapper">

      <div class="reset-card">

         <div class="reset-content">

            <!-- ICON -->
            <div class="icon-box">
               <i class="fa-solid fa-key"></i>
            </div>

            <!-- TITLE -->
            <div class="title">

               <h2>Reset Password</h2>

               <p>
                  Masukkan email akun anda untuk menerima
                  link reset password.
               </p>

            </div>

            <!-- FORM -->
            <form id="resetForm">

               <div class="input-group-custom">

                  <label class="form-label">
                     Email Address
                  </label>

                  <i class="fa-regular fa-envelope left-icon"></i>

                  <input type="email" name="email" id="email"
                     class="form-control"
                     placeholder="Masukkan email anda">

               </div>

               <div id="alertArea"></div>

               <!-- BUTTON -->
               <button type="submit"
                  class="btn btn-reset">

                  Send Reset Link

               </button>

            </form>

            <!-- BACK -->
            <div class="back-login">

               <a href="index">
                  <i class="fa-solid fa-arrow-left me-2"></i>
                  Back to Login
               </a>

            </div>

         </div>

      </div>

   </div>
   <!-- RESET MODAL -->
   <div class="modal fade"
      id="passwordModal"
      tabindex="-1">

      <div class="modal-dialog modal-dialog-centered">

         <div class="modal-content border-0 rounded-5">

            <div class="modal-body p-5">

               <div class="text-center mb-4">

                  <div class="icon-box mx-auto mb-4">
                     <i class="fa-solid fa-lock"></i>
                  </div>

                  <h3 class="fw-bold">
                     Password Baru
                  </h3>

                  <p class="text-muted">
                     Masukkan password baru anda
                  </p>

               </div>

               <!-- NEW PASSWORD -->
               <div class="mb-4">

                  <label class="form-label">
                     Password Baru
                  </label>

                  <input type="password"
                     id="newPassword"
                     class="form-control"
                     placeholder="Masukkan password baru">

               </div>

               <!-- CONFIRM -->
               <div class="mb-4">

                  <label class="form-label">
                     Konfirmasi Password
                  </label>

                  <input type="password"
                     id="confirmPassword"
                     class="form-control"
                     placeholder="Konfirmasi password">

               </div>

               <!-- BUTTON -->
               <button class="btn btn-reset" type="button"
                  id="savePasswordBtn">

                  Save Password

               </button>

            </div>

         </div>

      </div>

   </div>
</body>
<script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<script>
   const resetModal =
      new bootstrap.Modal(
         document.getElementById('passwordModal')
      );

   /*
   |--------------------------------------------------------------------------
   | CHECK EMAIL
   |--------------------------------------------------------------------------
   */

   document
      .getElementById('resetForm')

      .addEventListener('submit', async function(e) {

         e.preventDefault();

         const email =
            document.getElementById('email').value;

         const alertArea =
            document.getElementById('alertArea');

         alertArea.innerHTML = '';

         try {

            const response = await fetch(
               'controller/checkEmail.php', {
                  method: 'POST',

                  headers: {
                     'Content-Type': 'application/json'
                  },

                  body: JSON.stringify({
                     email
                  })
               }
            );

            const result =
               await response.json();

            if (result.status === 'success') {

               window.resetEmail = email;

               resetModal.show();

            } else {

               alertArea.innerHTML = `
<div class="alert alert-danger border-0 rounded-4 mb-4">

   ${result.message}

</div>
`;
            }

         } catch (error) {

            alertArea.innerHTML = `
<div class="alert alert-danger border-0 rounded-4 mb-4">

   Server error

</div>
`;
         }

      });

   /*
   |--------------------------------------------------------------------------
   | SAVE PASSWORD
   |--------------------------------------------------------------------------
   */

   document
      .getElementById('savePasswordBtn')

      .addEventListener('click', async function() {

         const password =
            document.getElementById('newPassword').value;

         const confirm =
            document.getElementById('confirmPassword').value;

         if (!password || !confirm) {

            alert('Password wajib diisi');
            return;
         }

         if (password !== confirm) {

            alert('Konfirmasi password tidak cocok');
            return;
         }

         try {

            const response = await fetch(
               'controller/updatePassword.php', {
                  method: 'POST',

                  headers: {
                     'Content-Type': 'application/json'
                  },

                  body: JSON.stringify({

                     email: window.resetEmail,
                     password

                  })
               }
            );

            const result =
               await response.json();

            if (result.status === 'success') {

               resetModal.hide();

               document
                  .getElementById('alertArea')

                  .innerHTML = `
<div class="alert alert-success border-0 rounded-4 mb-4">

   Password berhasil direset

</div>
`;

               setTimeout(() => {

                  window.location.href = 'index';

               }, 1500);

            } else {

               alert(result.message);
            }

         } catch (error) {

            alert(error);
         }

      });
</script>

</html>