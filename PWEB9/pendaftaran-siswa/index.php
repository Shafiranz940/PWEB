<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Siswa Baru | SMK Coding</title>

  <!-- FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/plus-jakarta-sans" rel="stylesheet">

  <style>
    /* ==== PAKAI STYLE KAMU (DISINGKAT + DIADAPTASI) ==== */

    body {
    margin: 0;
    font-family: 'Kanit', sans-serif;
    background-color: #f7fee7;
    color: #365314;
    }

    /* NAVBAR */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 5%;
      background-color: #f7fee7;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .logo h1 {
      font-size: 22px;
      color: #365314;
      margin: 0;
    }

    nav a {
      text-decoration: none;
      font-size: 1rem;
      color: #365314;
      font-weight: bold;
      margin: 0 12px;
      font-family: 'Poppins', sans-serif;
      transition: 0.3s;
    }

    nav a:hover {
      color: #84cc16;
    }

    .btn-nav {
      background-color: #a3e635;
      color: #365314;
      padding: 8px 16px;
      border-radius: 8px;
    }

    /* HERO */
    .hero {
      padding: 80px 7%;
      background: linear-gradient(135deg, #a3e635, #facc15);
      color: #365314;
      text-align: left;
      padding-bottom: 150px;
      background-image: url('logo/bg.png'); 
      background-size: 100% auto;
      background-repeat: no-repeat; 
      background-position: center;
      min-height: 500px;
    }

    .hero-text {
      max-width: 70%;
      position: relative;
      z-index: 2;
      margin-left: 30%;
    }

    .hero-text p {                                            
      font-size: 1.5rem;
      font-family: 'Plus Jakarta Sans', sans-serif;
      line-height: 1.5;
      margin-top: 0px;
      max-width: 450px;
      font-weight: 800;
      color: #facc15;
    }

    .hero-text h2 {
    font-family: 'Konkhmer Sleokchher', sans-serif;
    font-size: 48px;
    line-height: 1.2;
    margin-bottom: 12px;
    text-transform: uppercase;
    color: white;
    }

    .hero-text h2 span {
    color: #facc15; /* kuning seperti contoh */
    }

    .hero-text h2 strong {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    }

    .logo {
      display: flex;
      align-items: center;   
      gap: 10px;             
      padding: 5px 0;      
    }

    .logo img {
      width: 45px;           
      height: 45px;
      object-fit: cover;
    }

    .logo h1 {
      font-family: 'Kanit', sans-serif;
      color: #365314;
      font-size: 20.5px;
      margin: 0;             
    }

    .btn-primary {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 24px;
      border-radius: 10px;
      background: #84cc16;
      color: #365314;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    .btn-primary:hover {
      transform: scale(1.05);
      background: #65a30d;
      background: white;
    }

    /* CONTENT */
    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 0 20px;
    }

    .menu-box {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 30px;
    }

    .menu-box a {
      padding: 18px 36px; 
      border-radius: 10px;
      background: #a3e635;
      color: #365314;
      text-decoration: none;
      font-weight: bold;
      font-family: 'Poppins', sans-serif;
      transition: 0.3s;
    }

    .menu-box a:hover {
      background: #84cc16;
      color: black;
    }

    /* STATUS */
    .status {
      padding: 15px;
      border-radius: 10px;
      font-weight: bold;
      font-family: 'Poppins', sans-serif;
    }

    .sukses {
      background: #ecfccb;
      color: #365314;
      border-left: 6px solid #84cc16;
    }

    .gagal {
      background: #fef9c3;
      color: #854d0e;
      border-left: 6px solid #facc15;
    }

    /* FOOTER */
    footer {
      margin-top: 80px;
      background: linear-gradient(180deg,#84cc16, #4d7c0f);
      color: #f7fee7;
      text-align: center;
      padding: 20px;
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
  <div class="logo">
    <img src="./logo/logo.png" alt="Website Logo">
    <h1>SMK Coding</h1>
  </div>
  <nav>
    <a href="#" class="active">Home</a>
    <a href="list-siswa.php">Pendaftar</a>
    <a href="form-daftar.php" class="btn-nav">Daftar</a>
  </nav>
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-text">
      <h2>PENDAFTARAN <span>SISWA BARU</span><br>
           <strong>SMK CODING</strong>
        </h2>
      <p>| Tahun Ajaran 2025/2026.</p>
    </div>
</section>

<!-- CONTENT -->
<div class="container">
  <div class="menu-box">
    <a href="form-daftar.php">Daftar Baru</a>
    <a href="list-siswa.php">Lihat Pendaftar</a>
  </div>

  <?php if(isset($_GET['status'])): ?>
    <?php if($_GET['status'] == 'sukses'): ?>
      <div class="status sukses"> Pendaftaran siswa baru berhasil!</div>
    <?php else: ?>
      <div class="status gagal"> Pendaftaran gagal!</div>
    <?php endif; ?>
  <?php endif; ?>
</div>

<footer>
  © 2025 SMK Coding • Pendaftaran Siswa Baru
</footer>

</body>
</html>
