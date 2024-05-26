<?php 
include "../koneksi.php";

// baca nomer kartu dari nodeMCU
$no_kartu = $_GET['no_kartu'];

// kosongkan tabel tmpRFID
mysqli_query($conn, "DELETE FROM tb_tmprfid");

// simpan nomor kartu yang baru ke tb_tmprfid
$simpan = mysqli_query($conn, "INSERT INTO tb_tmprfid(no_kartu) VALUES ('$no_kartu')");

if ($simpan){
    $cek_tb_transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE no_kartu = '$no_kartu'");
    $jumlah_data_cust = mysqli_fetch_array($cek_tb_transaksi);

    if($jumlah_data_cust == 0){
        echo "Kartu Tidak Dikenali";
    } else {
        echo "Berhasil Kirim Kartu";
    }
} else {
    echo "Gagal Kirim Kartu";
}