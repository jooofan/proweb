<!DOCTYPE html>
<html>
<head>
    <title>Konversi Nilai</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Konversi Nilai</h1>
        <form method="post">
            <!-- Input untuk nilai numerik -->
            <label for="nilai">Masukkan Nilai (0 - 100):</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" required> <br><br>

            <!-- Tombol untuk mengirimkan nilai -->
            <button type="submit">Konversi</button> <br><br>
        </form>

        <?php
        // Jika form dikirimkan melalui POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai numerik yang diinputkan
            $nilai = floatval($_POST["nilai"]);
            $grade = '';

            // Konversi nilai numerik menjadi grade huruf berdasarkan kriteria
            if ($nilai >= 90) {
                $grade = 'A';
            } elseif ($nilai >= 80) {
                $grade = 'B';
            } elseif ($nilai >= 70) {
                $grade = 'C';
            } elseif ($nilai >= 60) {
                $grade = 'D';
            } else {
                $grade = 'F';
            }

            // Tampilkan hasil konversi
            echo "<h2>Nilai: $nilai</h2>";
            echo "<h2>Grade: $grade</h2>";
        }
        ?>
    </div>
</body>
</html>
