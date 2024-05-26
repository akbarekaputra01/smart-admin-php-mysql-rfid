<?php
// mengkoneksikan dengan file koneksi.php
include '../koneksi.php';

function ubah_data($data) {
	// membuat variable dari value $_GET dan $data
	$id_transaksi = $_GET['id_transaksi'];
	$total_transaksi = $data['total_transaksi'];

	// query untuk update data ke database
	$query = "UPDATE `tb_transaksi` SET
	`total_transaksi`='$total_transaksi' WHERE id_transaksi = '$id_transaksi'";
	// running query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

// membuat function hapus data dengan mengambil parameter $_POST = $data
function hapus_data($data){
	// membuat variable dengan mengambil isi dari $data untuk dijadikan $id_transaksi
	$id_transaksi = $data['hapus'];
	
	// menghapus data di tb_transaksi yang id nya sesuai dengan yang di
	$queryDeleteTransaksi = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id_transaksi';";
	mysqli_query($GLOBALS['conn'], $queryDeleteTransaksi);

	return true;
}



// jika button meminta $_POST dan bernama "aksi"
if (isset($_POST['aksi'])) {
	// jika button $_POST bernama aksi dan memiliki value "edit"
	if ($_POST['aksi'] == "edit") {
		// running function ubah_data dan menyimpannya di variable $successUbahData
		$successUbahData = ubah_data($_POST);

		// jika $successUbahData dapat berjalan tanpa error
		if ($successUbahData) {
			// replace to loc: index.php
			header("location: index.php");
		}
		// jika $successUbahData tidak berjalan atau error
		else {
			// echo $successUbahData untuk megetahui titik error
			echo $successTambahData;
		}
	}
}

// jika button meminta $_GET dan bernama hapus
if (isset($_GET['hapus'])) {

	// run function hapus_data dan menyimpan di varibale $successHapusData
	$successHapusData = hapus_data($_GET);

	// jika $successHapusData dapat berjalan tanpa error
	if ($successHapusData) {
		header("location: index.php");
	}
	// jika $succesHapusData tidak berjalan atau error
	else {
		// echo $succesHapusData untuk megetahui titik error
		echo $succesHapusData;
	}
}