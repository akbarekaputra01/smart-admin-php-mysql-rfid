<?php
include "../koneksi.php";

$id_cust = '';
$nama_cust = '';
$no_kartu = '';
$kelas_cust = '';

// jika klik buton berisi $_GET dan bernama "ubah"
if (isset($_GET['ubah'])) {
    // membuat id cust dari $_GET
    $id_cust = $_GET['ubah'];

    // query untuk mengambil data dari db dimana id cust yang diminta haru sesuai dengan di db
    $query = "SELECT * FROM tb_customer WHERE id_cust = '$id_cust';";
    // run query
    $sql = mysqli_query($conn, $query);
    // menyimpan output query ke variable $result
    $result = mysqli_fetch_assoc($sql);

    // membuat variable dari db untuk view atau value input ketika user mengedit data
    $nama_cust = $result['nama_cust'];
    $no_kartu = $result['no_kartu'];
    $kelas_cust = $result['kelas_cust'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robofive</title>
    <link rel="icon" href="./assets/images/logoRobofive.png" type="image/icon type">

    <!-- Bootstrap -->
    <link href="../assets/vendor/bootstrap5.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/vendor/bootstrap5.3/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="../assets/vendor/fontawesome-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-6.4.0-web/css/solid.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #F4D800;
            --secondary-color: #ECF1F2
        }

        .bg-primary-color {
            background-color: var(--primary-color);
        }

        .bg-secondary-color {
            background-color: var(--secondary-color);
        }

        .text-primary-color {
            color: var(--primary-color);
        }

        .text-secondary-color {
            color: var(--secondary-color);
        }

        .border-primary-color {
            border-color: var(--primary-color);
        }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="bg-secondary-color">
    <!-- Navbar -->
    <?php include "../components/navbar.php" ?>
    <!-- /.navbar -->

    <div class="container" style="margin-top: 75px">
        <form method="POST" action="proses.php">
            <input type="hidden" value="<?php echo $id_cust;?>" name="id_cust">

            <?php
            // jika tujuannya bukan untuk edit atau tujuannya untuk tambah data, maka
            if (!isset($_GET['ubah'])) {
            ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    setInterval(function () {
                        $("#noRFID").load('./noKartu.php')
                    }, 0);
                });
            </script>

            <div id="noRFID"></div>
            <?php
            } else {
            ?>
            <div class="mb-3 row">
                <label for="no_kartu" class="col-sm-2 col-form-label">
                    No. Kartu
                </label>
                <div class="col-sm-10">
                    <input type="text" id="no_kartu" value="<?php echo $no_kartu;?>" name="no_kartu" readonly
                        class="form-control">
                </div>
            </div>
            <?php
            }
            ?>

            <div class="mb-3 row">
                <label for="nama_cust" class="col-sm-2 col-form-label">
                    Nama Customer
                </label>
                <div class="col-sm-10">
                    <input type="text" id="nama_cust" name="nama_cust" value="<?php echo $nama_cust;?>"
                        class="form-control">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kelas_cust" class="col-sm-2 col-form-label">
                    Kelas Customer
                </label>
                <div class="col-sm-10">
                    <input type="text" id="kelas_cust" name="kelas_cust" value="<?php echo $kelas_cust;?>"
                        class="form-control">
                </div>
            </div>

            <!-- button -->
            <div>
                <div>
                    <?php
                // kalau tujuannya bukan untuk edit atau tujuannya untuk tambah data
                if (isset($_GET['ubah'])) {
                    ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fas fa-floppy-disk" aria-hidden="true"></i>
                        Simpan Perubahan
                    </button>
                    <?php
                } else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                        Tambahkan
                    </button>
                    <?php
                }
                ?>
                    <a href="#" onclick="history.back();" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>