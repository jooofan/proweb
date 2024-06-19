<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
</head>
<body>
    <h1>Konversi Nilai</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nilaiAngka">Nilai Angka:</label>
        <input type="number" id="nilaiAngka" name="nilaiAngka" required>
        <br><br>
        <button type="submit">Konversi</button>
    </form>

    <?php
    if (isset($_POST['nilaiAngka'])) {
        $nilaiAngka = $_POST['nilaiAngka'];
        $nilaiHuruf = '';

        if ($nilaiAngka >= 80) {
            $nilaiHuruf = 'A';
        } elseif ($nilaiAngka >= 65) {
            $nilaiHuruf = 'B';
        } elseif ($nilaiAngka >= 50) {
            $nilaiHuruf = 'C';
        } elseif ($nilaiAngka >= 35) {
            $nilaiHuruf = 'D';
        } else {
            $nilaiHuruf = 'E';
        }

        echo "<br>Hasil Konversi:<br>";
        echo "Nilai Angka: $nilaiAngka<br>";
        echo "Nilai Huruf: $nilaiHuruf";
    }
    ?>
</body>
</html>
