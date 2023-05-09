<?php
// class induk
class masuk {
	// property
	protected $id_masuk;
	protected $kd_masuk;
	protected $kd_barang;
	protected $tanggal;
	protected $keterangan;
	
	// constructor
	public function __construct($id, $kd, $kd_barang, $tanggal,$keterangan) {
	  $this->id_masuk = $id;
	  $this->kd_masuk = $kd;
	  $this->kd_barang = $kd;
	  $this->tanggal = $tanggal;
	  $this->keterangan = $keterangan;
	}
  
	// method
	public function getIdMasuk() {
	  return $this->id_masuk;
	}
	public function getkdMasuk() {
	  return $this->kd_masuk;
	}
	public function getmasuk() {
	  return $this->masuk;
	}
	public function getbarang() {
	  return $this->kd_barang;
	}
	public function tanggal() {
	  return $this->tanggal;
	}
	public function getketerangan() {
	  return $this->keterangan;
	}
  }
  
  // class turunan
  class TampilanMasuk extends masuk {
	// method
	public function tampilDataMasuk() {
	  // koneksi ke database
	  $servername = "localhost";
	  $username = "root"; // ganti sesuai dengan username database Anda
	  $password = ""; // ganti sesuai dengan password database Anda
	  $dbname = "stockbarang";
  
	  $conn = new mysqli($servername, $username, $password, $dbname);
  
	  // cek koneksi
	  if ($conn->connect_error) {
		die("Koneksi gagal: " . $conn->connect_error);
	  }
  
	  // query untuk mengambil data anggota
	  $sql = "SELECT * FROM id_masuk";
	  $result = $conn->query($sql);
  
	  // menampilkan data anggota dalam bentuk tabel
	  echo "<table border='1'>";
	  echo "<tr>";
	  echo "<th>ID Masuk</th>";
	  echo "<th>Kd Masuk</th>";
	  echo "<th>Kd barang</th>";
	  echo "<th>tanggal</th>";
	  echo "<th>keterangan</th>";
	  echo "</tr>";
  
	  if ($result) {
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row['id_masuk']."</td>";
			echo "<td>".$row['kd_masuk']."</td>";
			echo "<td>".$row['kd_barang']."</td>";
			echo "<td>".$row['tanggal']."</td>";
			echo "<td>".$row['keterangan']."</td>";
			echo "</tr>";
		  }
		} else {
		  echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
		}
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
  
	  echo "</table>";
  
	  $conn->close();
	}
  }
  
  // objek
  $data_anggota = new Tampilanmasuk("", "", ""," ", "", "");
  $data_anggota->tampilDatamasuk();
?>