<?php

//echo "...............";
class stock {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=stockbarang", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM stock";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into stock values ('','".$_GET['kd_barang']."','".$_GET['namabarang']."','".$_GET['deskripsi']."','".$_GET['stock']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from stock where id_stok='".$_GET['id_stok']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM stock where id_stok='".$_GET['id_stok']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id_stok, $kd_barang,$namabarang,$deskripsi,$stock)
    {
        $sql = "update stock set kd_barang='".$kd_barang."', namabarang='".$namabarang."', deskripsi='".$deskripsi."', stock='".$stock."' where id_stock='".$id_stock."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($keterangan){
        $sql = "SELECT * FROM stock WHERE namabarang LIKE '%".$namabarang."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  


 }