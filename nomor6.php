<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan Data Dari Database PHP </title>
    <style>
        table,tr,td {
            border: 1px solid black;
        }
        thead {
            background-color: #cccddd;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

    <div class="container p-3">
    <h2 class="mb-3">Menampilkan Pegawai Yang Usianya di Antara 31 Sampai 45 Tahun</h2>
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Nip</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>                
                <td>Tanggal lahir</td>                
                <td>status</td>                
                <td>mulai kerja</td>               
            </tr>
        </thead>
        <?php
        include "database.php";
        $no = 1;
        $query = mysqli_query($kon, "SELECT *, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM tbl_oop WHERE (YEAR(CURDATE())-YEAR(tgl_lahir)) > 30");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nip'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['jns_kel'] ?></td>
                <td><?php echo $data['tgl_lahir'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td><?php echo $data['mulai_kerja'] ?></td>
            </tr>
        <?php } ?>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>