<?php

require_once "app/masuk.php";
$masuk= new masuk();
$rows = $masuk->tampil();

if(isset($_GET["cari"])){
    $rows = $masuk->cari($_GET["keterangan"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id_masuk'])) $vid_masuk =$_GET['id_masuk'];
else $vid_masuk ='';
if(isset($_GET['kd_masuk'])) $vkd_masuk =$_GET['kd_masuk'];
else $vkd_masuk ='';
if(isset($_GET['kd_barang'])) $vkd_barang =$_GET['kd_barang'];
else $vkd_barang ='';
if(isset($_GET['tanggal'])) $vtanggal =$_GET['tanggal'];
else $vtanggal ='';
if(isset($_GET['keterangan'])) $vketerangan =$_GET['keterangan'];
else $vketerangan ='';


if($vsimpan=='simpan' && ($vkd_masuk <>''||$vkd_barang <>''||$vtanggal <>''||$vketerangan <>'')){
    $masuk->simpan();
    //echo $_GET['kd_masuk'];
    $rows = $masuk->tampil();
    $vid_masuk ='';
    $vkd_masuk ='';
    $vkd_barang ='';
    $vtanggal ='';
    $vketerangan ='';
    
}

if($vaksi=="hapus")  {
    $masuk->hapus();
    $rows = $masuk->tampil();
}
if($vaksi=="cari")  {
    $rows = $masuk->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $masuk->tampil_update();
    foreach ($urows as $row) {
        $vid_masuk = $row['id_masuk'];
        $vkd_masuk = $row['kd_masuk'];
        $vkd_barang = $row['kd_barang'];
        $vtanggal = $row['tanggal'];
        $vketerangan = $row['keterangan'];
        
    }
 }

if ($vupdate=="update"){
    $masuk->update($vid_masuk,$vkd_masuk,$vkd_barang,$vtanggal,$vketerangan);
    $rows = $masuk->tampil();
    $vid_masuk ='';
    $vkd_masuk ='';
    $vkd_barang ='';
    $vtanggal ='';
    $vketerangan ='';
    
}
if ($vreset=="reset"){
    $vid_masuk ='';
    $vkd_masuk ='';
    $vkd_barang ='';
    $vpenerima ='';
    $vketerangan ='';
    

}


?>

<form action="?" method="get">
<table>
    <tr><td>KODE MASUK</td><td>:</td><td>
        <input type="hidden" name="id_masuk" value="<?php echo $vid_masuk; ?>" /><input type="text" name="kd_masuk" value="<?php echo $vkd_masuk; ?>" /></td></tr>
    <tr><td>KODE BARANG</td><td>:</td><td><input type="text" name="kd_barang" value="<?php echo $vkd_barang; ?>"/></td></tr>
    <tr><td>TANGGAL</td><td>:</td><td><input type="date" autocomplete="off" name="tanggal" value="<?php echo $vtanggal; ?>"/></td></tr>
    <tr><td>KETERANGAN</td><td>:</td><td><input type="text" name="keterangan" value="<?php echo $vketerangan; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>ID MASUK</td>
        <td>KODE MASUK</td>
        <td>KODE BARANG</td>
        <td>TANGGAL</td>
        <td>KETERANGAN</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_masuk']; ?></td>
            <td><?php echo $row['kd_masuk']; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td><a href="?id_masuk=<?php echo $row['id_masuk']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_masuk=<?php echo $row['id_masuk']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php 
    }