<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pendaftar | SMK Coding</title>

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
          padding: 40px 0;
        }

        .wrapper {
          width: 90%;
          max-width: 1100px;
          background: #fff;
          border-radius: 18px;
          padding: 30px;
          box-shadow: 0 30px 60px rgba(0,0,0,.25);
        }

        .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 20px;
        }

        .header h3 {
          color: #365314;
          font-size: 24px;
        }

        .header a {
          background: #365314;
          color: #fff;
          text-decoration: none;
          padding: 10px 16px;
          border-radius: 10px;
          font-size: 14px;
          transition: .3s;
        }

        .header a:hover {
          background: #facc15;
          color: #000;
        }

        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
        }

        thead {
          background: #365314;
        }

        thead th {
          color: #fff;
          padding: 14px;
          font-size: 14px;
          text-align: center;
          vertical-align: middle;
        }

        tbody td {
          padding: 14px;
          font-size: 14px;
          color: #334155;
          border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:hover {
          background: #f8fafc;
        }

        .aksi {
          display: flex;
          gap: 10px;
        }

        .aksi a {
          padding: 6px 12px;
          border-radius: 8px;
          font-size: 13px;
          font-weight: 500;
          text-decoration: none;
          transition: 0.3s;
        }

        /* EDIT */
        .btn-edit {
          background: #a3e635;
          color: #365314;
        }

        .btn-edit:hover {
          background: #84cc16;
        }

        /* HAPUS */
        .btn-hapus {
          background: #fecaca;
          color: #7f1d1d;
        }

        .btn-hapus:hover {
          background: #fca5a5;
        }

        .total {
          margin-top: 16px;
          font-size: 14px;
          color: #475569;
        }

        @media(max-width: 900px) {
          table {
            font-size: 13px;
          }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <div class="header">
        <h3>Siswa yang Sudah Mendaftar</h3>
        <a href="form-daftar.php">+ Tambah Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * FROM calon_siswa";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['id']."</td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['jenis_kelamin']."</td>";
            echo "<td>".$siswa['agama']."</td>";
            echo "<td>".$siswa['sekolah_asal']."</td>";
            echo "<td class='aksi'>
                    <a href='form-edit.php?id=".$siswa['id']."' class='btn-edit'>Edit</a> |
                    <a href='hapus.php?id=".$siswa['id']."' class='btn-hapus'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>

    <div class="total">
        Total Pendaftar: <strong><?php echo mysqli_num_rows($query) ?></strong>
    </div>

</div>

</body>
</html>