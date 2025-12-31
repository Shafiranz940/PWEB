<?php
include("config.php");

if (!isset($_GET['id'])) {
  header('Location: list-siswa.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
  die("data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Siswa | SMK Coding</title>

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
  max-width: 600px;
  background: #fff;
  border-radius: 18px;
  padding: 40px 45px;
  box-shadow: 0 30px 60px rgba(0,0,0,.25);
}

/* HEADER */
.wrapper h3 {
  margin-bottom: 25px;
  color: #365314;
  font-size: 26px;
  text-align: center;
}

/* FORM */
form p {
  margin-bottom: 18px;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 500;
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

/* RADIO */
.radio-group {
  display: flex;
  gap: 20px;
}

/* BUTTON */
.btn-group {
  display: flex;
  gap: 15px;
  margin-top: 25px;
}

.btn {
  flex: 1;
  padding: 14px;
  border-radius: 12px;
  font-size: 15px;
  font-weight: 500;
  border: none;
  cursor: pointer;
  transition: .3s;
}

/* SIMPAN */
.btn-simpan {
  background: #365314;
  color: #fff;
}

.btn-simpan:hover {
  background: #facc15;
  color: #000;
}

/* KEMBALI */
.btn-kembali {
  background: #e5e7eb;
  color: #374151;
  text-decoration: none;
  text-align: center;
  line-height: 42px;
}

.btn-kembali:hover {
  background: #d1d5db;
}
</style>
</head>

<body>

<div class="wrapper">
  <h3>Form Edit Siswa</h3>

  <form action="proses-edit.php" method="POST">
    <input type="hidden" name="id" value="<?= $siswa['id'] ?>">

    <p>
      <label>Nama</label>
      <input type="text" name="nama" value="<?= $siswa['nama'] ?>" required>
    </p>

    <p>
      <label>Alamat</label>
      <textarea name="alamat" required><?= $siswa['alamat'] ?></textarea>
    </p>

    <p>
      <label>Jenis Kelamin</label>
      <div class="radio-group">
        <label>
          <input type="radio" name="jenis_kelamin" value="laki-laki"
          <?= ($siswa['jenis_kelamin'] == 'laki-laki') ? 'checked' : '' ?>>
          Laki-laki
        </label>
        <label>
          <input type="radio" name="jenis_kelamin" value="perempuan"
          <?= ($siswa['jenis_kelamin'] == 'perempuan') ? 'checked' : '' ?>>
          Perempuan
        </label>
      </div>
    </p>

    <p>
      <label>Agama</label>
      <select name="agama">
        <?php
        $agama = $siswa['agama'];
        $list = ['Islam','Kristen', 'Katholik', 'Hindu','Budha','Konghucu'];
        foreach ($list as $a) {
          echo "<option ".($agama==$a?'selected':'').">$a</option>";
        }
        ?>
      </select>
    </p>

    <p>
      <label>Sekolah Asal</label>
      <input type="text" name="sekolah_asal" value="<?= $siswa['sekolah_asal'] ?>" required>
    </p>

    <div class="btn-group">
      <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
      <a href="list-siswa.php" class="btn btn-kembali">Kembali</a>
    </div>
  </form>
</div>

</body>
</html>