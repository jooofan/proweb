<?php
class Balok {
    private $panjang;
    private $lebar;
    private $tinggi;

    public function __construct($panjang, $lebar, $tinggi) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
        $this->tinggi = $tinggi;
    }

    public function hitungLuasPermukaan() {
        return 2 * ($this->panjang * $this->lebar + $this->panjang * $this->tinggi + $this->lebar * $this->tinggi);
    }

    public function hitungVolume() {
        return $this->panjang * $this->lebar * $this->tinggi;
    }
}

// Proses saat form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membuat objek Balok dengan data dari form
    $balok = new Balok($_POST['panjang'], $_POST['lebar'], $_POST['tinggi']);
    // Menghitung luas permukaan dan volume
    $luasPermukaan = $balok->hitungLuasPermukaan();
    $volume = $balok->hitungVolume();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kalkulator Luas dan Volume Balok</title>
</head>
<body>
  <h1>Kalkulator Luas dan Volume Balok</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="panjang">Panjang:</label>
    <input type="number" id="panjang" name="panjang" required /> 
    <br /><br>
    <label for="lebar">Lebar:</label>
    <input type="number" id="lebar" name="lebar" required />
    <br /><br>
    <label for="tinggi">Tinggi:</label>
    <input type="number" id="tinggi" name="tinggi" required />
    <br />
    <br />
    <button type="submit">Hitung</button>
  </form>

  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <!-- Menampilkan hasil perhitungan jika formulir telah dikirimkan -->
    <h2>Hasil Perhitungan Balok</h2>
    <p>Panjang: <?php echo $_POST['panjang']; ?></p>
    <p>Lebar: <?php echo $_POST['lebar']; ?></p>
    <p>Tinggi: <?php echo $_POST['tinggi']; ?></p>
    <p>Luas Permukaan: <?php echo $luasPermukaan; ?> satuan luas</p>
    <p>Volume: <?php echo $volume; ?> satuan kubik</p>
  <?php endif; ?>
</body>
</html>
