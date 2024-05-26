<?php
// mengkoneksikan dengan file koneksi.php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Kartu</title>

    <!-- Bootstrap -->
    <link href="../assets/vendor/bootstrap5.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/vendor/bootstrap5.3/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        function loadKartu() {
            $("#cekKartu").load('bacaKartu.php', function() {
                setTimeout(loadKartu, 2000);
            });
        }

        loadKartu();
    });
    </script>

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
    <!-- Navbar -->
    <?php include "../components/navbar.php" ?>
    <!-- /.navbar -->

    <div id="cekKartu"></div>

    <!-- footer -->
    <?php include "../components/footer.php"; ?>
    <!-- ./footer -->
</body>

</html>