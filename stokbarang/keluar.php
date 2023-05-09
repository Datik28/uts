<?php

require_once "app/func.php";
$keluar = new keluar();
$rows = $keluar->tampil();

if(isset($_GET["cari"])){
    $rows = $keluar->cari($_GET["penerima"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id_keluar'])) $vid_keluar =$_GET['id_keluar'];
else $vid_keluar ='';
if(isset($_GET['kd_keluar'])) $vkd_keluar =$_GET['kd_keluar'];
else $vkd_keluar ='';
if(isset($_GET['kd_barang'])) $vkd_barang =$_GET['kd_barang'];
else $vkd_barang ='';
if(isset($_GET['penerima'])) $vpenerima =$_GET['penerima'];
else $vpenerima ='';


if($vsimpan=='simpan' && ($vkd_keluar <>''||$vkd_barang <>''||$vpenerima <>'')){
    $keluar->simpan();
    $rows = $keluar->tampil();
    $vid_keluar ='';
    $vkd_keluar ='';
    $vkd_barang ='';
    $vpenerima ='';
    
}

if($vaksi=="hapus")  {
    $keluar->hapus();
    $rows = $keluar->tampil();
}
if($vaksi=="cari")  {
    $rows = $keluar->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $keluar->tampil_update();
    foreach ($urows as $row) {
        $vid_keluar = $row['id_keluar'];
        $vkd_keluar = $row['kd_keluar'];
        $vkd_barang = $row['kd_barang'];
        $vpenerima = $row['penerima'];
        
    }
 }

if ($vupdate=="update"){
    $keluar->update($vid_keluar,$vkd_keluar,$vkd_barang,$vpenerima);
    $rows = $keluar->tampil();
    $vid_keluar ='';
    $vkd_keluar ='';
    $vkd_barang ='';
    $vpenerima ='';
    
}
if ($vreset=="reset"){
    $vid_keluar ='';
    $vkd_keluar ='';
    $vkd_barang ='';
    $vpenerima ='';
    

}


?>

<form action="?" method="get">
<table>
    <tr><td>KODE KELUAR</td><td>:</td><td>
        <input type="hidden" name="id_keluar" value="<?php echo $vid_keluar; ?>" /><input type="text" name="kd_keluar" value="<?php echo $vkd_keluar; ?>" /></td></tr>
    <tr><td>KODE BARANG</td><td>:</td><td><input type="text" name="kd_barang" value="<?php echo $vkd_barang; ?>"/></td></tr>
    <tr><td>PENERIMA</td><td>:</td><td><input type="text" autocomplete="off" name="penerima" value="<?php echo $vpenerima; ?>"/></td></tr>
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
        <td>ID KELUAR</td>
        <td>KODE KELUAR</td>
        <td>KODE BARANG</td>
        <td>PENERIMA</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_keluar']; ?></td>
            <td><?php echo $row['kd_keluar']; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['penerima']; ?></td>
            <td><a href="?id_keluar=<?php echo $row['id_keluar']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_keluar=<?php echo $row['id_keluar']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php 
    }