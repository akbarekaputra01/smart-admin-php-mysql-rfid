<?php
// mengkoneksikan dengan file koneksi.php
include '../koneksi.php';

// membuat function tambah data dengan mengambil parameter $_POST = $data
function tambah_data($data) {
	// membuat variable dari value $data
	$no_kartu = $data['no_kartu'];
	$nama_cust = $data['nama_cust'];
	$kelas_cust = $data['kelas_cust'];

	// query untuk menambahkan data ke database
	$query = "INSERT INTO tb_customer (id_cust, nama_cust, no_kartu, kelas_cust) VALUES (NULL,
	'$nama_cust', '$no_kartu', '$kelas_cust')";
	// running query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

function ubah_data($data) {
	// membuat variable dari value $data
	$id_cust = $data['id_cust'];
	$no_kartu = $data['no_kartu'];
	$nama_cust = $data['nama_cust'];
	$kelas_cust = $data['kelas_cust'];

	// query untuk mengubah update
	$query = "UPDATE `tb_customer` SET
	`nama_cust`='$nama_cust',`no_kartu`='$no_kartu',`kelas_cust`='$kelas_cust' WHERE id_cust = '$id_cust'";
	// running query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

// membuat function hapus data dengan mengambil parameter $_POST = $data
function hapus_data($data){
	// membuat variable dengan mengambil isi dari $data untuk dijadikan $no_kartu
	$no_kartu = $data['hapus'];

	// menghapus data di tb_customer yang no_kartu yang dipilih sesuai dengan no_kartu di database
	$queryDeleteCust = "DELETE FROM tb_customer WHERE no_kartu = '$no_kartu';";
	mysqli_query($GLOBALS['conn'], $queryDeleteCust);

	// menghapus data di tb_transaksi yang no_kartu yang dipilih sesuai dengan no_kartu di database
	$queryDeleteTransaksi = "DELETE FROM tb_transaksi WHERE no_kartu = '$no_kartu';";
	mysqli_query($GLOBALS['conn'], $queryDeleteTransaksi);

	return true;
}



// jika button meminta $_POST dan bernama "aksi"
if (isset($_POST['aksi'])) {
	// jika button aksi berisi post dan memiliki value = "add"
	if ($_POST['aksi'] == "add") {
		// running function tambah_data dan menyimpannya di variable $successTambahData
		$successTambahData = tambah_data($_POST);

		// jika $successTambahData dapat berjalan tanpa error
		if ($successTambahData) {
			// replace to loc: index.php
			header("location: index.php");
			
			// query untuk hapus data tmprfid
			$query = "DELETE FROM `tb_tmprfid`";
			// running query
			$sql = mysqli_query($GLOBALS['conn'], $query);
		}
		// jika $succesTambahData tidak berjalan atau error
		else {
			// echo $succesTambahData untuk megetahui titik error
			echo $successTambahData;
		}
	}
    
	// jika button $_POST bernama aksi dan memiliki value "edit"
	else if ($_POST['aksi'] == "edit") {
		// running function tambah_data dan menyimpannya di variable $successUbahData
		$successUbahData = ubah_data($_POST);

		// jika $successUbahData dapat berjalan tanpa error
		if ($successUbahData) {
			// replace to loc: index.php
			header("location: index.php");

			// query untuk hapus data tmprfid
			$query = "DELETE FROM `tb_tmprfid`";
			// running query
			$sql = mysqli_query($GLOBALS['conn'], $query);
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
		// alert with session
		$_SESSION['notif'] = "Data berhasil dihapus,success";
		// replace to loc: index.php
		header("location: index.php");
	}
	// jika $succesHapusData tidak berjalan atau error
	else {
		// echo $succesHapusData untuk megetahui titik error
		echo $succesHapusData;
	}
}