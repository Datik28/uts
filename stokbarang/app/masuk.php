<?php

//echo "...............";
class masuk {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=stockbarang", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM masuk";
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
        $sql = "insert into masuk values ('','".$_GET['kd_masuk']."','".$_GET['kd_barang']."','".$_GET['tanggal']."','".$_GET['keterangan']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from masuk where id_masuk='".$_GET['id_masuk']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM masuk where id_masuk='".$_GET['id_masuk']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id_masuk, $kd_masuk,$kd_barang,$tanggal,$keterangan)
    {
        $sql = "update masuk set kd_masuk='".$kd_masuk."', kd_barang='".$kd_barang."', tanggal='".$tanggal."', keterangan='".$keterangan."' where id_masuk='".$id_masuk."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($keterangan){
        $sql = "SELECT * FROM masuk WHERE keterangan LIKE '%".$keterangan."%'
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