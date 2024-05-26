<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPL Store</title>
    <link rel="icon" href="./assets/images/logoRobofive.png" type="image/icon type">

    <!-- Bootstrap -->
    <link href="./assets/vendor/bootstrap5.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/vendor/bootstrap5.3/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="./assets/vendor/fontawesome-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/vendor/fontawesome-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="./assets/vendor/fontawesome-6.4.0-web/css/solid.css" rel="stylesheet">

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

<body class="bg-secondary-color">
    <!-- Navbar -->
    <?php include "./components/navbar.php" ?>
    <!-- /.navbar -->

    <!-- card -->
    <div class="w-100 d-flex justify-content-center flex-column align-items-center" style="min-height: 100vh;">
        <div class="row w-75 mb-3">
            <div class="col-sm-4 mb-sm-0 p-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <i class="fas fa-users" style="font-size:25px;"></i>
                            <h5 class="card-title mx-3">Data Customer</h5>
                        </div>
                        <p class="card-text">Data Customer RPL Store</p>
                        <a href="./dataCust/" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-sm-0 p-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <i class="fas fa-file-invoice" style="font-size:25px;"></i>
                            <h5 class="card-title mx-3">Data Transaksi</h5>
                        </div>
                        <p class="card-text">Data Transaksi RPL Store</p>
                        <a href="./dataTransaksi/" class="btn btn-success">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-sm-0 p-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <i class="fas fa-qrcode" style="font-size:25px;"></i>
                            <h5 class="card-title mx-3">Scan Kartu</h5>
                        </div>
                        <p class="card-text">Halaman Scan Kartu</p>
                        <a href="./scanKartu/" class="btn btn-danger">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include "./components/footer.php"; ?>
    <!-- ./footer -->

    <!-- bs -->
    <script src="./assets/vendor/bootstrap5.3/js/bootstrap.js"></script>
    <script src="./assets/vendor/bootstrap5.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>