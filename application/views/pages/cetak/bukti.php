<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bukti Peminjaman Buku <?= $item['judul'] ?></title>
  </head>
  <body>
    <h1>Bukti Peminjaman Buku</h1>
    <h1>Perpustakaan SMAN 13 Banjarmasin</h1>
    
    <hr>
    <br>

    <table style="width: 100%;">
        <tr>
            <td style="width: 30%; font-weight: 800;">Nomor Peminjaman</td>
            <td style="width: 40px;">:</td>
            <td><?= $item['no_peminjaman'] ?></td>
        </tr>
        <tr>
            <td style="font-weight: 800;">Siswa</td>
            <td>:</td>
            <td><?= $item['nama'] ?></td>
        </tr>
        <tr>
            <td style="font-weight: 800;">Judul Buku</td>
            <td>:</td>
            <td><?= $item['judul'] ?></td>
        </tr>
        <tr>
            <td style="font-weight: 800;">Tanggal Pinjam</td>
            <td>:</td>
            <td><?= date('d-m-Y', strtotime($item['tanggal_pinjam'])) ?></td>
        </tr>
        <tr>
            <td style="font-weight: 800;">Tanggal Tenggat</td>
            <td>:</td>
            <td><?= date('d-m-Y', strtotime($item['tanggal_tenggat'])) ?></td>
        </tr>
        <?php if($item['tanggal_kembali']): ?>
        <tr>
            <td style="font-weight: 800;">Tanggal Kembali</td>
            <td>:</td>
            <td><?= date('d-m-Y', strtotime($item['tanggal_kembali'])) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td style="font-weight: 800;">Jumlah</td>
            <td>:</td>
            <td>1</td>
        </tr>
    </table>

    <br>
    <br>
    <br>

    <p>Banjarmasin, <?= date('d M Y') ?></p>
    <br>
    <br>
    <p>Petugas Perpustakaan</p>
    <br>
    <p>Harap resi ini diserahkan kepada petugas perpustakaan</p>
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>