<?php
include "connect.php";
Class XIPPLG3 {

    public $name;
    public $age;
    public $gender;
    public $agama;

    
    public function __construct($name, $age, $gender, $agama) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->agama = $agama;
    }

    public function profilsiswa(): void{
        echo "<h1>Profil Siswa XI PPLG 3</h1>";
        echo "Nama : ". $this ->name . "<br>";
        echo "Umur : ". $this ->age . "<br>";
        echo "Jenis Kelamin : ". $this ->JenisKelaminLengkap() . "<br>";
        echo "Agama : ". $this ->agama . "<br>";
    }
    public function JenisKelaminLengkap(): string {
        if ($this->gender == "L") {
            return "Laki-laki";
        } else{
        return "Perempuan";
        }
    }
}

$kevin = new XIPPLG3("Kevin", "16", "L", "Islam");


$nabhan = new XIPPLG3("Nabhan","17", "L", "Islam");

$annisa = new XIPPLG3("Annisa", "15", "P", "Islam");


$faris = new XIPPLG3("Faris", "100", "L", "Islam");


$dzaky = new XIPPLG3("Dzaky", "16", "L", "Islam");


$semuaSiswa = array($kevin, $nabhan, $annisa, $faris, $dzaky);
foreach ($semuaSiswa as $siswa) {
    $siswa->profilsiswa();
}


?>