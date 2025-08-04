<?php
class akunBank{
    protected $nama;
    protected $saldo;

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
        echo "Jenis Akun = " . get_class($this) . "<br/>";
    }

    //Fungsi Setor
    public function setor($jumlah){
        if ($jumlah >= 50000){
            $this->saldo += $jumlah;
            echo "Setor = " . $jumlah . "<br/>";
        }else {
            echo "Setor = ". $jumlah . "<br/>";
            echo "Setor gagal, jumlah setor minimal adalah 50.000<br/>";
        }
    }

    //Fungsi Tarik
    public function tarik($jumlah){
        if ($jumlah > 2000000) {
            echo "Tarik = ". $jumlah . "<br/>";
            echo "Tarik gagal, jumlah tarik maksimal adalah 2.000.000<br/>";
        } elseif ($jumlah <= $this->saldo){
            $this->saldo -= $jumlah;
            echo "Tarik = " . $jumlah . "<br/>";
            echo "Jumlah saldo " . $this->getNama() . " = " . $this->getSaldo() . "<br/>";
        } else {
            echo "Tarik = ". $jumlah . "<br/>";
            echo "Tarik gagal, saldo tidak mencukupi";
        }
    }

    //Fungsi Transfer
    public function transfer($jumlah, $akunTujuan) {
        if ($jumlah < 50000) {
            echo "Transfer = " . $jumlah . "<br/>";
            echo "Transfer gagal, jumlah transfer minimal adalah 50.000<br/>";
        } elseif ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            $akunTujuan->setor($jumlah);
            echo "Transfer = " . $jumlah . "<br/>";
            echo "Jumlah saldo " . $this->getNama() . " = " . $this->getSaldo() . "<br/>";
        } else {
            echo "Transfer = " . $jumlah . "<br/>";
            echo "Transfer gagal, saldo tidak mencukupi";
        }
    }

}


// Class akunReguler
Class akunReguler extends akunBank {
    public function setor($jumlah){
        $kuponCashback = 0.2;
        $cashback = $jumlah * $kuponCashback;
        $this->saldo += $cashback;
        parent::setor($jumlah);
        echo "Cashback = " . $cashback . "<br/>";
        echo "Jumlah saldo " . $this->getNama( ). " = " . $this->getSaldo() . "<br/>";
        
    }
    public function tarik($jumlah){
        $kuponCashback = 0.2;
        $cashback = $jumlah * $kuponCashback;
        $this->saldo += $cashback;
        $limitTarik = 2000000;
        if ($jumlah > $limitTarik) {
            echo "Tarik = " . $jumlah . "<br/>";
            echo "Tarik gagal, jumlah tarik maksimal adalah " . $limitTarik . "<br/>";
        } elseif ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            echo "Tarik = " . $jumlah . "<br/>";
            echo "Jumlah saldo " . $this->getNama() . " = " . $this->getSaldo() . "<br/>";
        } else {
            echo "Tarik = " . $jumlah . "<br/>";
            echo "Tarik gagal, saldo tidak mencukupi";
        parent::tarik($jumlah);
        echo "Cashback = " . $cashback . "<br/>";
        }
    }

    public function transfer($jumlah, $akunTujuan) {
        $biayaTransfer = 6500;
        $jumlah -= $biayaTransfer;
        $kuponCashback = 0.2;
        $cashback = $jumlah * $kuponCashback;
        $this->saldo += $cashback;
        parent::transfer($jumlah, $akunTujuan);
        echo "Biaya Transfer = " . $biayaTransfer . "<br/>";
        echo "Cashback = " . $cashback . "<br/>";
    }
}

//Class akunPremium
Class akunPremium extends akunBank{
    public function setor($jumlah){
        $kuponCashback = 0.5;
        $cashback = $jumlah * $kuponCashback;
        $this->saldo += $cashback;
        parent::setor($jumlah);
        echo "Cashback = " . $cashback . "<br/>";
    }
    public function tarik($jumlah){;
        $kuponCashback = 0.5;
        $cashback = $jumlah * $kuponCashback;
        $this->saldo += $cashback;
        echo "Cashback = " . $cashback . "<br/>";
    }

    public function transfer($jumlah, $akunTujuan) {
        $biayaTransfer = 2500;
        $jumlah -= $biayaTransfer;
        $kuponCashback = 0.5;
        $cashback = $jumlah * $kuponCashback;
        $this->saldo += $cashback;
        parent::transfer($jumlah, $akunTujuan);
        echo "Biaya Transfer = " . $biayaTransfer . "<br/>";
        echo "Cashback = " . $cashback . "<br/>";
    }
}

$akun1 = new akunReguler("Budi", 10000000);
$akun1 ->info();
$akun1->setor(100000);
$akun1->tarik(2000000);

$akun2 = new akunPremium("Siti", 5000000);
$akun2->info();
$akun2->transfer(2000000, $akun1);

?>
