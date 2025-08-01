<?php
class akunBank{
    private $nama;
    private $saldo;

    public function __construct($nama, $saldoAwal) {
        $this->nama = $nama;
        $this->saldo = $saldoAwal;
    }

    public function getNama() {
        return $this->nama;

    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function info(){
        echo "<h3>Pemilik Akun Bank</h3>";
        echo "Nama = " . $this->getNama() . "<br/>";
        echo "Saldo = " . $this->getSaldo() . "<br/>";
    }

    public function setor($jumlah){
        if ($jumlah >= 50000){
            $this->saldo += $jumlah;
            echo "Setor = " . $jumlah . "<br/>";
            echo "Jumlah saldo " . $this->getNama( ). "sekarang = " . $this->getSaldo() . "<br/>";
        }else {
            echo "Setor = ". $jumlah . "<br/>";
            echo "Setor gagal, jumlah setor minimal adalah 50.000<br/>";
        }
    }

    public function tarik($jumlah){
        if ($jumlah > 2000000) {
            echo "Tarik = ". $jumlah . "<br/>";
            echo "Tarik gagal, jumlah tarik maksimal adalah 2.000.000<br/>";
        } elseif ($jumlah <= $this->saldo){
            $this->saldo -= $jumlah;
            echo "Tarik = " . $jumlah . "<br/>";
            echo "Jumlah saldo " . $this->getNama() . " sekarang = " . $this->getSaldo() . "<br/>";
        } else {
            echo "Tarik = ". $jumlah . "<br/>";
            echo "Tarik gagal, saldo tidak mencukupi";
        }
    }

}


$akun1 = new akunBank("Budi", 10000000);
$akun1 ->info();
$akun1->setor(10000);
$akun1->tarik(2000000);

?>
