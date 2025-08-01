<?php
Class Rumah{ 
    private $kamarUtama = "Kamar utama hanya bisa diakses oleh pemilik rumah<br/>";
    protected $ruangKeluarga = "Ruang keluarga bisa diakses oleh penghuni rumah</br/>";
    public $ruangTamu = "Ruang tamu bisa diakses oleh siapa saja<br/>";
    
    public function aksesDariDalam() {
    echo "<h3>Akses dari dalam class rumah</h3>";
    echo $this->kamarUtama;
    echo $this->ruangKeluarga;
    echo $this->ruangTamu;
    }
}
class Anak extends Rumah{
    public function aksesDariAnak() {
    echo "<h3>Akses dari dalam class rumah</h3>";
    // echo $this->kamarUtama;
    /** Kamar utama eror karena
     * hanya bisa diakses oleh
     * classnya sendiri atau pemilik rumah**/
    echo $this->ruangKeluarga;
    echo $this->ruangTamu;
    }
}

echo"<h3>Akses dari luar class</h3>";
$anak = new Anak();
$rumah = new Rumah();
// echo $rumah->kamarUtama;
echo $rumah->ruangTamu;
// echo $rumah->ruangKeluarga;
$rumah->aksesDariDalam();
$anak->aksesDariAnak();

?>
