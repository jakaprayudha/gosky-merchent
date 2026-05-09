<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>500 - Server Error</title>

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
         --text-dark: #393939;
         --text-light: #8d8d8d;
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

      .error-card {
         width: 100%;
         max-width: 620px;

         background:
            rgba(255, 255, 255, 0.93);

         backdrop-filter: blur(16px);

         border-radius: 38px;

         padding: 60px 45px;

         text-align: center;

         position: relative;
         overflow: hidden;

         box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.12);
      }

      .error-card::before {
         content: '';

         position: absolute;

         width: 240px;
         height: 240px;

         border-radius: 50%;

         background:
            rgba(244, 196, 0, 0.08);

         top: -120px;
         right: -120px;
      }

      .error-card::after {
         content: '';

         position: absolute;

         width: 200px;
         height: 200px;

         border-radius: 50%;

         background:
            rgba(244, 196, 0, 0.06);

         bottom: -100px;
         left: -100px;
      }

      .content {
         position: relative;
         z-index: 2;
      }

      .error-code {
         font-size: 120px;
         font-weight: 800;
         line-height: 1;

         background:
            linear-gradient(135deg,
               #f7c600,
               #d9a700);

         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;

         margin-bottom: 16px;
      }

      .icon-box {
         width: 110px;
         height: 110px;

         border-radius: 34px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         display: flex;
         align-items: center;
         justify-content: center;

         margin:
            0 auto 28px;

         box-shadow:
            0 18px 35px rgba(244, 196, 0, 0.35);
      }

      .icon-box i {
         color: white;
         font-size: 48px;
      }

      h1 {
         font-size: 42px;
         font-weight: 700;

         color: var(--text-dark);

         margin-bottom: 18px;
      }

      p {
         font-size: 16px;

         line-height: 1.9;

         color: var(--text-light);

         margin-bottom: 38px;
      }

      .btn-home {
         height: 64px;

         padding: 0 34px;

         border: none;
         border-radius: 22px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #dfad00);

         color: white;

         font-size: 16px;
         font-weight: 700;

         transition: 0.3s ease;

         box-shadow:
            0 15px 30px rgba(244, 196, 0, 0.35);
      }

      .btn-home:hover {
         transform: translateY(-3px);

         box-shadow:
            0 18px 35px rgba(244, 196, 0, 0.45);
      }

      .btn-outline-custom {
         height: 64px;

         padding: 0 34px;

         border-radius: 22px;

         border:
            2px solid rgba(244, 196, 0, 0.3);

         background: white;

         color: var(--primary-dark);

         font-size: 16px;
         font-weight: 700;

         transition: 0.3s ease;
      }

      .btn-outline-custom:hover {
         background: #fff8db;
      }

      .btn-group-custom {
         display: flex;
         justify-content: center;
         gap: 16px;
         flex-wrap: wrap;
      }

      @media (max-width: 576px) {

         .error-card {
            padding: 45px 24px;
            border-radius: 28px;
         }

         .error-code {
            font-size: 90px;
         }

         h1 {
            font-size: 32px;
         }

         p {
            font-size: 14px;
         }

         .icon-box {
            width: 90px;
            height: 90px;
            border-radius: 28px;
         }

         .icon-box i {
            font-size: 40px;
         }

         .btn-home,
         .btn-outline-custom {
            width: 100%;
         }
      }
   </style>
</head>

<body>

   <div class="error-card">

      <div class="content">

         <!-- ICON -->
         <div class="icon-box">

            <i class="fa-solid fa-triangle-exclamation"></i>

         </div>

         <!-- CODE -->
         <div class="error-code">
            500
         </div>

         <!-- TITLE -->
         <h1>
            Internal Server Error
         </h1>

         <!-- DESC -->
         <p>
            Terjadi kesalahan pada server.
            Silakan coba beberapa saat lagi.
         </p>

         <!-- BUTTON -->
         <div class="btn-group-custom">

            <button class="btn btn-home"
               onclick="window.location.href='index'">

               <i class="fa-solid fa-house me-2"></i>

               Back Home

            </button>

            <button class="btn btn-outline-custom"
               onclick="window.history.back()">

               <i class="fa-solid fa-arrow-left me-2"></i>

               Go Back

            </button>

         </div>

      </div>

   </div>

</body>

</html>