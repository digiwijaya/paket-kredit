<?php

// var_dump($_POST["TYPE"]);
// var_dump($_POST["TENOR"]);
// var_dump($_POST["BBN_ONGKIR"]);
$type = $_POST["TYPE"];
$tenor = $_POST["TENOR"];
$daerah = $_POST["BBN_ONGKIR"];

//Membuat koneksi ke database
$kon = mysqli_connect("localhost", 'root', "", "daihatsu");
if (!$kon) {
    die("Koneksi database gagal:" . mysqli_connect_error());
}

//Perintah sql untuk menampilkan semua data pada tabel
$sql = "SELECT * FROM kredit WHERE TYPE='$type' AND TENOR='$tenor' AND BBN_ONGKIR='$daerah' ORDER BY down_payment DESC";

$hasil = mysqli_query($kon, $sql);
// $data = mysqli_fetch_assoc($hasil);
$data = [];
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

// var_dump($data);

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Kredit</title>
</head>

<body>
    <div class="w3-container">
        <div class="row">
            <div class="col">
                <h2>Daihatsu Balikpapan & Kaltim</h2>

                <div class="w3-card-4">
                    <div class="w3-container w3-green">
                        <h2>Tabel Kredit</h2>
                    </div>

                    <form class="w3-container" action="">
                        <p>

                            <label>Type</label>
                            <input class="w3-input" type="text" value="<?= $type; ?>" readonly>
                        </p>
                        <p>
                            <label>Daerah</label>
                            <input class="w3-input" type="text" value="<?= $daerah; ?>" readonly>
                        </p>
                        <p>
                            <label>Harga OTR</label>
                            <input class="w3-input" type="text" value="<?php error_reporting(1);
                                                                        echo $data[0]["OTR"]; ?>" readonly>
                        </p>
                        </p>
                    </form>
                </div>
                <div>
                    <table class="w3-table-all">
                        <thead>
                            <tr class="w3-red">
                                <th>Finance</th>
                                <th>DP %</th>
                                <th title="DP Finance sebelum potong diskon">Down Payment</th>
                                <th>Angsuran</th>
                                <th>Tenor</th>
                                <th>Assuransi</th>
                                <th title="Jaminan Pelunasan apabila meninggal dunia / cacat permanen">ACP</th>

                            </tr>
                        </thead>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row["FINANCE"]; ?></td>
                                <td><?= $row["dp_persen"]; ?></td>
                                <td><?= $row["down_payment"]; ?></td>
                                <td><?= $row["ANGSURAN"]; ?></td>
                                <td><?= $row["BULAN"]; ?> Bulan</td>
                                <td><?= $row["JENIS ASSURANSI"]; ?></td>
                                <td><?= $row["ASSURANSI JIWA KREDIT"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div>
                    <p><a href="index.php" class="w3-button w3-light-green">Cari Lagi</a>
                </div>
            </div>
        </div>
    </div>


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