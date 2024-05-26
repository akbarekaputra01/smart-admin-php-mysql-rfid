<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA CUSTOMER</title>

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
    <?php include"../components/navbar.php" ?>

    <div class="container" style="min-height: 100vh">
        <div style="margin-top: 75px">
            <h1>DATA CUSTOMER</h1>
            <a>Berisi Data Customer Yang Disimpan Di Database</a>
        </div>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3 mt-3">
            <i class="fa fa-plus"></i>
            Tambah Customer
        </a>

        <div class="table-responsive">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>No.</th>
                        <th>No. Kartu</th>
                        <th>Nama Customer</th>
                        <th>Kelas Customer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from tb_customer";
                    $sql = mysqli_query ($conn, $query);
                    $no = 0;
                    while($result = mysqli_fetch_assoc ($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $no = $no+1; ?> </td>
                        <td><?php echo $result ['no_kartu']; ?></td>
                        <td><?php echo $result ['nama_cust']; ?></td>
                        <td><?php echo $result ['kelas_cust']; ?></td>
                        <td>
                            <center>
                                <!-- meminta $_POST. setiap tabel pada customer memiliki nilai "ubah" yang berbeda, misal customer 1, maka nilai "ubah" miliknya adalah "1" -->
                                <a href="kelola.php?ubah=<?php echo $result['id_cust']; ?>" type="button"
                                    class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <!-- meminta $_GET. setiap tabel pada customer memiliki nilai "hapus" yang berbeda, misal customer 1, maka nilai "hapus" miliknya adalah "1" -->
                                <a href="proses.php?hapus=<?php echo $result['no_kartu']; ?>" type="button"
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
                </tbody>
            </table>
        </div>
    </div>

    <!-- footer -->
    <?php include "../components/footer.php"; ?>
    <!-- ./footer -->

    <!-- JS -->
    <script>
        // untuk menggunakan datatables
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>
</body>

</html>