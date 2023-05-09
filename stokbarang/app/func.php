<?php
 class keluar {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=stockbarang", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM keluar";
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
        $sql = "insert into keluar values ('','".$_GET['kd_keluar']."','".$_GET['kd_barang']."','".$_GET['penerima']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from keluar where id_keluar='".$_GET['id_keluar']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM keluar where id_keluar='".$_GET['id_keluar']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id_keluar, $kd_keluar,$kd_barang,$penerima)
    {
        $sql = "update keluar set kd_keluar='".$kd_keluar."', kd_barang='".$kd_barang."', penerima='".$penerima."' where id_keluar='".$id_keluar."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($penerima){
        $sql = "SELECT * FROM keluar WHERE penerima LIKE '%".$penerima."%'
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