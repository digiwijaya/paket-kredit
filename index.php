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
        <h2>Daihatsu Balikpapan & Kaltim</h2>

        <div class="w3-card-4">
            <div class="w3-container w3-green">
                <h2>Form Kredit</h2>
            </div>

            <form class="w3-container" action="tabel.php" method="POST">
                <p>
                    <select class="w3-select" name="TYPE" id="TYPE">
                        <option value="" disabled selected>Silahkan Pilih Tipe...</option>
                        <?php
                        //Membuat koneksi ke database
                        $kon = mysqli_connect("localhost", 'root', "", "daihatsu");
                        if (!$kon) {
                            die("Koneksi database gagal:" . mysqli_connect_error());
                        }

                        //Perintah sql untuk menampilkan semua data pada tabel tipe
                        // $sql = "select * from type";
                        $sql = "SELECT DISTINCT TYPE FROM kredit";

                        $hasil = mysqli_query($kon, $sql);
                        $no = 0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                        ?>
                            <option value="<?php echo $data['TYPE']; ?>"><?php echo $data['TYPE']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!-- <label>Type</label> -->
                </p>
                <p>
                    <select class="w3-select" name="TENOR" id="TENOR">
                        <option value="" disabled selected>Tenor Kredit...</option>
                        <option value="12">1 Tahun</option>
                        <option value="24">2 Tahun</option>
                        <option value="36">3 Tahun</option>
                        <option value="48">4 Tahun</option>
                        <option value="60">5 Tahun</option>
                    </select>
                    <!-- <label>Tenor</label> -->
                </p>
                <p>
                    <select class="w3-select" name="BBN_ONGKIR" id="BBN_ONGKIR">
                        <option value="" disabled selected>Daerah...</option>
                        <option value="BALIKPAPAN">Balikpapan</option>
                        <option value="PPU">PPU</option>
                        <option value="PASER">Paser</option>
                    </select>
                    <!-- <label>Daerah</label> -->
                </p>
                <p><button class="w3-button w3-light-green" name="cari">Cari</button></p>
            </form>
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