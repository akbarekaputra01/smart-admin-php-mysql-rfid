<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA TRANSAKSI</title>

    <!-- Bootstrap -->
    <link href="../assets/vendor/bootstrap5.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/vendor/bootstrap5.3/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="../assets/vendor/fontawesome-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-6.4.0-web/css/solid.css" rel="stylesheet">

    <!-- Data Tables/JQuery -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/datatables.min.css" />
    <script type="text/javascript" src="../assets/vendor/datatables/datatables.min.js"></script>

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
</head>

<body>
    <div style="display: none">
        <?php include '../scanKartu/bacaKartu.php' ?>
    </div>

    <?php include"../components/navbar.php" ?>

    <div class="container" style="min-height: 100vh">
        <div style="margin-top: 75px">
            <h1>DATA TRANSAKSI</h1>
            <a>Berisi Data Transaksi Yang Disimpan Di Database</a>
        </div>
        <a href="../scanKartu" type="button" class="btn btn-primary mb-3 mt-3">
            <i class="fa fa-plus"></i>
            Tambah Transaksi
        </a>

        <div class="table-responsive">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Customer</th>
                        <th>Kelas Customer</th>
                        <th>Total Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- memunculkan output result ke variable result-->
                <?php
                // mengambil nama_cust, kelas_cust, total_cust dan id_transaksi dari tabel tb_transaksi & tb_customer yang no_kartu nya sama
                $query = "SELECT b.nama_cust, b.kelas_cust, a.total_transaksi, a.id_transaksi FROM tb_transaksi a, tb_customer b WHERE a.no_kartu = b.no_kartu";
                // running query
                $sql = mysqli_query($conn, $query);
                
                // untuk nomer table
                $no = 0;
                
                // menyimpan output sql ke $result
                while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                <tr>
                    <td><?php echo $no = $no+1; ?> </td>
                    <td><?php echo $result ['nama_cust']; ?></td>
                    <td><?php echo $result ['kelas_cust']; ?></td>

                    <?php
                    // kalau tombol ubah di klik, maka
                    if (isset($_GET['ubah'])) {
                    ?>
                    <td>
                        <!-- tabel biasa berubah menjadi input untuk merubah nilai total_transaksi -->
                        <form method="POST" action="proses.php?id_transaksi=<?php echo $result['id_transaksi'];?>">
                            <input type="text" id="total_transaksi" name="total_transaksi"
                                value="<?php echo $result ['total_transaksi'];?>">

                            <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </td>
                    <?php
                    } else {
                        ?>
                    <td><?php echo $result ['total_transaksi']; ?></td>
                    <?php
                    }
                    ?>
                    <td>
                        <center>
                            <!-- meminta $_POST. setiap tabel pada user memiliki nilai "ubah" yang berbeda, misal user id 23, maka index.php?ubah=23 -->
                            <a href="index.php?ubah=<?php echo $result['id_transaksi']; ?>" type="button"
                                class="btn btn-success btn-sm mb-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <!-- meminta $_GET. setiap tabel pada user memiliki nilai "hapus" yang berbeda, misal user id 23, maka index.php?hapus=23 -->
                            <a href="proses.php?hapus=<?php echo $result['id_transaksi']; ?>" type="button"
                                class="btn btn-danger btn-sm"
                                onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </center>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>
    </div>

    <!-- footer -->
    <?php include "../components/footer.php"; ?>
    <!-- ./footer -->

    <!-- JS -->
    <script>
    // untuk menggunakan datatables
    $(document).ready(function() {
        $('#dt').DataTable();
    });
    </script>
</body>

</html>