<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

   <title>Terms & Conditions</title>

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
         --text-dark: #363636;
         --text-light: #8b8b8b;
         --bg-card: rgba(255, 255, 255, 0.95);
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
         overflow: hidden;
      }

      .terms-wrapper {
         width: 100%;
         max-width: 1100px;
      }

      .terms-card {
         background: var(--bg-card);
         backdrop-filter: blur(16px);

         border-radius: 36px;
         overflow: hidden;

         box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.12);

         position: relative;

         height: 92vh;

         display: flex;
         flex-direction: column;
      }

      /* HEADER */
      .terms-header {
         position: relative;
         overflow: hidden;

         padding: 50px 60px 35px;

         background:
            linear-gradient(135deg,
               rgba(244, 196, 0, 0.97),
               rgba(224, 175, 0, 0.96));

         color: white;

         flex-shrink: 0;
      }

      .terms-header::before {
         content: '';
         position: absolute;

         width: 260px;
         height: 260px;

         border-radius: 50%;

         background: rgba(255, 255, 255, 0.08);

         top: -120px;
         right: -100px;
      }

      .terms-header::after {
         content: '';
         position: absolute;

         width: 200px;
         height: 200px;

         border-radius: 50%;

         background: rgba(255, 255, 255, 0.08);

         bottom: -100px;
         left: -80px;
      }

      .header-content {
         position: relative;
         z-index: 2;
      }

      .header-icon {
         width: 95px;
         height: 95px;

         border-radius: 28px;

         background: rgba(255, 255, 255, 0.18);

         display: flex;
         align-items: center;
         justify-content: center;

         font-size: 42px;

         margin-bottom: 28px;

         backdrop-filter: blur(10px);
      }

      .terms-header h1 {
         font-size: 48px;
         font-weight: 700;
         margin-bottom: 16px;
      }

      .terms-header p {
         font-size: 16px;
         line-height: 1.9;
         max-width: 720px;
         opacity: 0.95;
      }

      /* BODY */
      .terms-body {
         padding: 45px 60px;

         overflow-y: auto;
         flex: 1;

         scrollbar-width: thin;
         scrollbar-color: #d8ab00 #f5f5f5;
      }

      /* SCROLLBAR */
      .terms-body::-webkit-scrollbar {
         width: 10px;
      }

      .terms-body::-webkit-scrollbar-track {
         background: #f5f5f5;
         border-radius: 20px;
      }

      .terms-body::-webkit-scrollbar-thumb {
         background:
            linear-gradient(180deg,
               #f4c400,
               #d8ab00);

         border-radius: 20px;
      }

      .terms-section {
         margin-bottom: 42px;
      }

      .terms-section:last-child {
         margin-bottom: 0;
      }

      .terms-section h3 {
         display: flex;
         align-items: center;
         gap: 14px;

         font-size: 22px;
         font-weight: 700;

         color: var(--text-dark);

         margin-bottom: 18px;
      }

      .terms-section h3 i {
         width: 42px;
         height: 42px;

         border-radius: 14px;

         background: rgba(244, 196, 0, 0.12);
         color: var(--primary-dark);

         display: flex;
         align-items: center;
         justify-content: center;

         font-size: 18px;
      }

      .terms-section p {
         color: #666;
         line-height: 2;
         font-size: 15px;
         margin-bottom: 18px;
      }

      .terms-list {
         padding-left: 20px;
      }

      .terms-list li {
         color: #666;
         margin-bottom: 14px;
         line-height: 1.9;
         font-size: 15px;
      }

      .highlight-box {
         background:
            rgba(244, 196, 0, 0.08);

         border:
            1px solid rgba(244, 196, 0, 0.18);

         border-radius: 24px;

         padding: 24px;
         margin-top: 25px;
      }

      .highlight-box h5 {
         color: var(--primary-dark);
         font-weight: 700;
         margin-bottom: 12px;
      }

      .highlight-box p {
         margin: 0;
         color: #666;
      }

      /* FOOTER */
      .terms-footer {
         border-top: 1px solid #f0f0f0;

         padding: 24px 60px;

         display: flex;
         justify-content: space-between;
         align-items: center;
         gap: 16px;

         background: white;

         flex-shrink: 0;
      }

      .footer-text {
         color: #888;
         font-size: 14px;
      }

      .btn-back {
         height: 54px;
         padding: 0 28px;

         border: none;
         border-radius: 18px;

         background:
            linear-gradient(135deg,
               #f7c600,
               #e1af00);

         color: white;

         font-weight: 600;
         font-size: 15px;

         transition: 0.3s ease;

         box-shadow:
            0 10px 25px rgba(244, 196, 0, 0.28);
      }

      .btn-back:hover {
         transform: translateY(-2px);

         box-shadow:
            0 15px 30px rgba(244, 196, 0, 0.38);
      }

      /* MOBILE */
      @media (max-width: 768px) {

         .terms-card {
            height: 95vh;
            border-radius: 28px;
         }

         .terms-header,
         .terms-body,
         .terms-footer {
            padding-left: 24px;
            padding-right: 24px;
         }

         .terms-header {
            padding-top: 40px;
         }

         .terms-header h1 {
            font-size: 32px;
         }

         .terms-header p {
            font-size: 14px;
         }

         .terms-body {
            padding-top: 35px;
         }

         .terms-section h3 {
            font-size: 20px;
         }

         .terms-footer {
            flex-direction: column;
            align-items: flex-start;
         }
      }

      @media (max-width: 576px) {

         .header-icon {
            width: 82px;
            height: 82px;
            font-size: 34px;
         }

         .terms-section p,
         .terms-list li {
            font-size: 14px;
         }

         .btn-back {
            width: 100%;
         }
      }
   </style>
</head>

<body>

   <div class="terms-wrapper">

      <div class="terms-card">

         <!-- HEADER -->
         <div class="terms-header">

            <div class="header-content">

               <div class="header-icon">
                  <i class="fa-solid fa-file-contract"></i>
               </div>

               <h1>
                  Terms & Conditions
               </h1>

               <p>
                  Dengan menggunakan layanan dan sistem aplikasi ini,
                  anda dianggap telah membaca, memahami,
                  dan menyetujui seluruh syarat dan ketentuan
                  yang berlaku.
               </p>

            </div>

         </div>

         <!-- BODY -->
         <div class="terms-body">

            <!-- SECTION -->
            <div class="terms-section">

               <h3>
                  <i class="fa-solid fa-circle-info"></i>
                  Penggunaan Layanan
               </h3>

               <p>
                  Pengguna diwajibkan menggunakan layanan
                  secara bijak, legal dan tidak melanggar
                  hukum yang berlaku.
               </p>

               <ul class="terms-list">

                  <li>
                     Tidak melakukan aktivitas ilegal
                     menggunakan sistem.
                  </li>

                  <li>
                     Tidak mencoba merusak keamanan aplikasi.
                  </li>

                  <li>
                     Bertanggung jawab atas aktivitas akun sendiri.
                  </li>

               </ul>

            </div>

            <!-- SECTION -->
            <div class="terms-section">

               <h3>
                  <i class="fa-solid fa-shield-halved"></i>
                  Keamanan Akun
               </h3>

               <p>
                  Pengguna wajib menjaga kerahasiaan
                  password dan data login akun masing-masing.
               </p>

               <div class="highlight-box">

                  <h5>
                     Important Notice
                  </h5>

                  <p>
                     Kami tidak bertanggung jawab atas
                     kehilangan akses akun akibat kelalaian
                     pengguna dalam menjaga keamanan akun.
                  </p>

               </div>

            </div>

            <!-- SECTION -->
            <div class="terms-section">

               <h3>
                  <i class="fa-solid fa-lock"></i>
                  Privasi Data
               </h3>

               <p>
                  Seluruh data pengguna akan dijaga
                  kerahasiaannya dan hanya digunakan
                  untuk kebutuhan layanan aplikasi.
               </p>

               <ul class="terms-list">

                  <li>
                     Data tidak diperjualbelikan.
                  </li>

                  <li>
                     Data disimpan dengan sistem keamanan modern.
                  </li>

                  <li>
                     Pengguna dapat meminta penghapusan akun.
                  </li>

               </ul>

            </div>

            <!-- SECTION -->
            <div class="terms-section">

               <h3>
                  <i class="fa-solid fa-ban"></i>
                  Larangan Penggunaan
               </h3>

               <p>
                  Aktivitas berikut dilarang keras dilakukan:
               </p>

               <ul class="terms-list">

                  <li>
                     Penyalahgunaan sistem aplikasi.
                  </li>

                  <li>
                     Spam, phishing atau aktivitas merugikan lainnya.
                  </li>

                  <li>
                     Distribusi malware atau akses ilegal.
                  </li>

               </ul>

            </div>

            <!-- SECTION -->
            <div class="terms-section">

               <h3>
                  <i class="fa-solid fa-rotate"></i>
                  Perubahan Ketentuan
               </h3>

               <p>
                  Kami berhak mengubah syarat dan ketentuan
                  sewaktu-waktu demi peningkatan layanan
                  dan keamanan sistem.
               </p>

            </div>

            <!-- EXTRA -->
            <div class="terms-section">

               <h3>
                  <i class="fa-solid fa-user-shield"></i>
                  Hak Pengguna
               </h3>

               <p>
                  Pengguna memiliki hak untuk mengakses,
                  memperbarui dan menghapus data akun
                  sesuai kebijakan privasi yang berlaku.
               </p>

               <ul class="terms-list">

                  <li>
                     Meminta perubahan data akun.
                  </li>

                  <li>
                     Meminta penghapusan akun.
                  </li>

                  <li>
                     Menghubungi support jika terjadi masalah.
                  </li>

               </ul>

            </div>

         </div>

         <!-- FOOTER -->
         <div class="terms-footer">

            <div class="footer-text">
               Last Update : May 2026
            </div>

            <button class="btn btn-back" onclick="window.history.back()">

               <i class="fa-solid fa-arrow-left me-2"></i>

               Back

            </button>

         </div>

      </div>

   </div>

</body>

</html>