<?php

require_once "app/stock.php";
$stock= new stock();
$rows = $stock->tampil();
if(isset($_GET["cari"])){
    $rows = $stock->cari($_GET["namabarang"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id_stok'])) $vid_stok =$_GET['id_stok'];
else $vid_stok ='';
if(isset($_GET['kd_barang'])) $vkd_barang =$_GET['kd_barang'];
else $vkd_barang ='';
if(isset($_GET['namabarang'])) $vnamabarang =$_GET['namabarang'];
else $vnamabarang ='';
if(isset($_GET['deskripsi'])) $vdeskripsi =$_GET['deskripsi'];
else $vdeskripsi ='';
if(isset($_GET['stock'])) $vstock =$_GET['stock'];
else $vstock ='';


if($vsimpan=='simpan' && ($vkd_barang <>''||$vnamabarang <>''||$vdeskripsi <>''||$vstock <>'')){
    $stock->simpan();
    //echo $_GET['kd_barang'];
    $rows = $stock->tampil();
    $vid_stok='';
    $vkd_barang ='';
    $vnamabarang ='';
    $vdeskripsi ='';
    $vstock ='';
    
}

if($vaksi=="hapus")  {
    $stock->hapus();
    $rows = $stock->tampil();
}
if($vaksi=="cari")  {
    $rows = $stock->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $stock->tampil_update();
    foreach ($urows as $row) {
        $vid_stok = $row['id_stock'];
        $vkd_barang = $row['kd_barang'];
        $vnamabarang = $row['namabarang'];
        $vdeskripsi = $row['deskripsi'];
        $vstock = $row['stock'];
        
    }
 }

if ($vupdate=="update"){
    $stock->update($vid_stok,$vkd_barang,$vnamabarang,$vdeskripsi,$vstock);
    $rows = $stock->tampil();
    $vid_stok ='';
    $vkd_barang ='';
    $vnamabarang ='';
    $vdeskripsi ='';
    $vstock ='';
    
}
if ($vreset=="reset"){
    $vid_stok ='';
    $vkd_barang ='';
    $vnamabarang ='';
    $vdeskripsi ='';
    $vstock ='';
    

}


?>

<form action="?" method="get">
<table>
    <tr><td>KODE STOCK</td><td>:</td><td>
        <input type="hidden" name="id_stok" value="<?php echo $vid_stok; ?>" /><input type="text" name="kd_barang" value="<?php echo $vkd_barang; ?>" /></td></tr>
    <tr><td>KODE BARANG</td><td>:</td><td><input type="text" name="kd_barang" value="<?php echo $vkd_barang; ?>"/></td></tr>
    <tr><td>NAMA BARANG</td><td>:</td><td><input type="text" name="namabarang" value="<?php echo $vnamabarang; ?>"/></td></tr>
    <tr><td>DESKRIPSI</td><td>:</td><td><input type="text" autocomplete="off" name="deskripsi" value="<?php echo $vdeskripsi; ?>"/></td></tr>
    <tr><td>STOCK</td><td>:</td><td><input type="text" name="stock" value="<?php echo $vstock; ?>"/></td></tr>
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
        <td>ID STOCK</td>
        <td>KODE BARANG</td>
        <td>NAMA BARANG</td>
        <td>DESKRIPSI</td>
        <td>STOCK</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_stok']; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['namabarang']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a href="?id_stok=<?php echo $row['id_stok']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_stok=<?php echo $row['id_stok']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php 
    }