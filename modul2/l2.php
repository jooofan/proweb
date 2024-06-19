<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kalkulator Luas dan Volume Bola</title>
</head>
<body>
  <h1>Kalkulator Luas dan Volume Bola</h1>
  <form action="" method="post">
    <label for="jariJari">Jari-jari:</label>
    <input type="number" id="jariJari" name="jariJari" required />
    <br />
    <br />
    <button type="submit">Hitung</button>
  </form>

  <?php

if (isset($_POST['jariJari'])) {
  $jariJari = $_POST['jariJari'];

  $luasPermukaan = 4 * pi() * $jariJari * $jariJari; // Menghitung luas permukaan bola
  $volume = (4/3) * pi() * $jariJari * $jariJari * $jariJari; // Menghitung volume bola

  echo "Luas Permukaan: " . $luasPermukaan . " satuan luas";
  echo "<br>";
  echo "Volume: " . $volume . " satuan kubik";
} else {
  echo "Input tidak valid";
}

?>

</body>
</html>
