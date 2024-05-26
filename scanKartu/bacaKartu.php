<?php 
include "../koneksi.php";

$bacaKartu = mysqli_query($conn, "SELECT * FROM tb_tmprfid");
$data_kartu = mysqli_fetch_array($bacaKartu);
?>

<div class="container-fluid w-100 d-flex justify-content-center align align-items-center"
    style="text-align: center; height: 100vh;">

    <?php 
    if($data_kartu==""){
    ?>
    <div class="">
        <h3>
            Tempelkan Kartu RFID Anda
        </h3>
        <div style="display: flex; flex-direction: column;">
            <img src="../assets/images/rfid.png" alt="" style="width: 300px; margin-top: 10px;">
            <img src="../assets/images/animasi.gif" alt="" style="width: 300px; margin-top: 10px;">
        </div>
    </div>
    <?php 
    } else {
        $no_kartu = $data_kartu['no_kartu'];

        $cari_cust = mysqli_query($conn, "SELECT * FROM tb_customer WHERE no_kartu = '$no_kartu'");
        $jumlah_data_cust = mysqli_num_rows($cari_cust);

        if($jumlah_data_cust == 0){
            echo "<h1>Maaf, Kartu Tidak Dikenali.</h1>";
            mysqli_query($conn, "DELETE FROM tb_tmprfid");
        } else {
            $data_cust = mysqli_fetch_array($cari_cust);
            $nama_cust = $data_cust['nama_cust'];

            $cari_transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE no_kartu = '$no_kartu'");

            // mencari data transaksi dengan row "total_transaksi"
            $data_transaksi = mysqli_fetch_array($cari_transaksi);
            $total_transaksi = $data_transaksi['total_transaksi'];

            // hitung jumlah data
            $jumlah_transaksi = mysqli_num_rows($cari_transaksi);

            if($jumlah_transaksi == 0){
                echo "<h1>Selamat Datang <br> $nama_cust</h1>";
                mysqli_query($conn, "INSERT INTO `tb_transaksi`(`no_kartu`, `total_transaksi`) VALUES ('$no_kartu', 1)");
            } else {
                // update sesuai pilihan mode absen
                echo "<h1>Happy Shopping <br> $nama_cust</h1>";
                mysqli_query($conn, "UPDATE `tb_transaksi` SET total_transaksi = '$total_transaksi' + 1 WHERE no_kartu = '$no_kartu'");
            }
            // kosongkan tabel tmprfid
            mysqli_query($conn, "DELETE FROM tb_tmprfid");
        }
    }
    ?>
</div>