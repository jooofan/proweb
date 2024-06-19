<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Kalkulator Sederhana</h1>
        <form method="post">
            <!-- Input untuk angka pertama -->
            <input type="number" name="num1" placeholder="Nilai Pertama" required> 

            <!-- Input untuk angka kedua -->
            <input type="number" name="num2" placeholder="Nilai Kedua" required> 

            <br><br>
            
            <!-- Tombol operasi -->
            <button type="submit" name="operation" value="tambah">+</button>
            <button type="submit" name="operation" value="kurang">-</button>
            <button type="submit" name="operation" value="kali">x</button>
            <button type="submit" name="operation" value="bagi">/</button>
            <button type="submit" name="operation" value="modulus">%</button>
            <br><br>

            <!-- Input placeholder untuk menampilkan hasil perhitungan -->
            <input type="text" id="result" placeholder="Hasil" readonly>
        </form>

        <?php
        // Pastikan form dikirimkan melalui POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai yang diinputkan
            $num1 = floatval($_POST["num1"]);
            $num2 = floatval($_POST["num2"]);
            $operation = $_POST["operation"];
            $hasil = 0;

            // Lakukan operasi berdasarkan pilihan pengguna
            switch ($operation) {
                case "tambah":
                    $hasil = $num1 + $num2;
                    break;
                case "kurang":
                    $hasil = $num1 - $num2;
                    break;
                case "kali":
                    $hasil = $num1 * $num2;
                    break;
                case "bagi":
                    if ($num2 == 0) {
                        echo "<h2>Kesalahan: Pembagian dengan nol tidak diperbolehkan!</h2>";
                    } else {
                        $hasil = $num1 / $num2;
                    }
                    break;
                case "modulus":
                    if ($num2 == 0) {
                        echo "<h2>Kesalahan: Pembagian dengan nol tidak diperbolehkan!</h2>";
                    } else {
                        $hasil = $num1 % $num2;
                    }
                    break;
                default:
                    echo "<h2>Operasi tidak valid!</h2>";
                    break;
            }
            
            // Menampilkan hasil perhitungan di placeholder elemen input dengan id "result"
            echo '<script>';
            echo 'document.getElementById("result").placeholder = "' . $hasil . '";';
            echo '</script>';
        }
        ?>
    </div>
</body>
</html>
