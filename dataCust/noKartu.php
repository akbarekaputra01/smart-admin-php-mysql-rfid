<?php
include '../koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM tb_tmprfid");
$data = mysqli_fetch_array($sql);

if ($data){
$no_kartu = $data['no_kartu'];
}
?>

<div class="mb-3 row">
    <label for="no_kartu" class="col-sm-2 col-form-label">
        No. Kartu
    </label>
    <div class="col-sm-10">
        <input type="text" id="no_kartu" value="<?php echo $no_kartu;?>" name="no_kartu" readonly class="form-control">
    </div>
</div>