<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Formulir Pendaftaran | SMK Coding</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  margin: 0;
  min-height: 100vh;
  background: linear-gradient(0deg, #365314, #a3e635);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* CARD */
.wrapper {
  width: 90%;
  max-width: 1100px;
  background: #fff;
  border-radius: 18px;
  display: flex;
  overflow: hidden;
  box-shadow: 0 30px 60px rgba(0,0,0,.25);
}

/* LEFT IMAGE */
.illustration {
  width: 50%;
  background-image: url("logo/form.png");
  background-size: cover;
  background-position: left center;
  display: flex;
  align-items: center;
  justify-content: center;
}

.illustration img {
  width: 85%;
}

/* RIGHT FORM */
.form-box {
  width: 50%;
  padding: 50px 60px;
}

.form-box h3 {
  margin-bottom: 10px;
  color: #365314;
  font-size: 26px;
}

.form-box p {
  margin-bottom: 30px;
  color: #64748b;
}

/* FORM */
form p {
  margin-bottom: 18px;
}

label {
  display: block;
  font-weight: 500;
  margin-bottom: 6px;
  color: #334155;
}

input[type="text"],
textarea,
select {
  width: 100%;
  padding: 12px 14px;
  border-radius: 10px;
  border: 1px solid #cbd5e1;
  font-size: 14px;
}

textarea {
  resize: none;
  height: 80px;
}

.radio-group {
  display: flex;
  gap: 20px;
}

.radio-group label {
  font-weight: normal;
}

/* BUTTON */
input[type="submit"] {
  width: 100%;
  background: #365314;
  color: #fff;
  border: none;
  padding: 14px;
  font-size: 16px;
  border-radius: 12px;
  cursor: pointer;
  transition: .3s;
}

input[type="submit"]:hover {
  background: #facc15;
  color: black;
}

/* RESPONSIVE */
@media(max-width: 900px) {
  .wrapper {
    flex-direction: column;
  }

  .illustration,
  .form-box {
    width: 100%;
  }

  .form-box {
    padding: 40px;
  }
}
</style>
</head>

<body>

<div class="wrapper">

  <!-- LEFT -->
  <div class="illustration"></div>

  <!-- RIGHT -->
  <div class="form-box">
    <h3>Formulir Pendaftaran</h3>
    <p>Silakan isi data diri dengan lengkap</p>

    <form action="proses-pendaftaran.php" method="POST">

      <p>
        <label>Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Nama lengkap">
      </p>

      <p>
        <label>Alamat</label>
        <textarea name="alamat" placeholder="Alamat lengkap"></textarea>
      </p>

      <p>
        <label>Jenis Kelamin</label>
        <div class="radio-group">
          <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
          <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
        </div>
      </p>

      <p>
        <label>Agama</label>
        <select name="agama">
          <option>Islam</option>
          <option>Kristen</option>
          <option>Katholik</option>
          <option>Hindu</option>
          <option>Budha</option>
          <option>Konghucu</option>
        </select>
      </p>

      <p>
        <label>Sekolah Asal</label>
        <input type="text" name="sekolah_asal" placeholder="Nama sekolah asal">
      </p>

      <p>
        <input type="submit" value="Daftar" name="daftar">
      </p>

    </form>
  </div>

</div>

</body>
</html>