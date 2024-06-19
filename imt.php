<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KALKULATOR BMI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Gaya CSS */
        body {
            background-color: #d3d3d3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .jkelamin label {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
            background-color: #6c757d;
            color: white;
        }

        /* Ubah warna tombol saat dipilih */
        .jkelamin input[type="radio"]:checked + label {
            background-color: #007bff;
        }

        .btn {
            background-color: red;
        }
    </style>
</head>

<body>
    <div class="card">
        <h3 class="text-center">KALKULATOR BMI</h3>
        <form method="POST" action="">

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                <input type="number" id="tinggi" name="tinggi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="berat" class="form-label">Berat Badan (kg)</label>
                <input type="number" id="berat" name="berat" class="form-control" required>
            </div>

            <div class="mb-3 jkelamin">
                <label>Jenis Kelamin:</label><br><br>
                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
                <label for="laki-laki">
                    <i class="bi bi-person-fill"></i> Laki-laki
                </label>

                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                <label for="perempuan">
                    <i class="bi bi-person-fill"></i> Perempuan
                </label>
            </div>

            <button type="submit" class="btn">Hitung</button>
        </form>

        <div class="mt-3">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Ambil data yang dikirimkan dari form
                $tanggal_lahir = $_POST["tanggal_lahir"];
                $tinggi_cm = floatval($_POST["tinggi"]);
                $berat_kg = floatval($_POST["berat"]);
                $jenis_kelamin = $_POST["jenis_kelamin"];

                // Ubah tinggi dari cm ke meter
                $tinggi_m = $tinggi_cm / 100;

                // Hitung BMI
                $bmi = $berat_kg / ($tinggi_m * $tinggi_m);

                // Tentukan kategori BMI
                if ($bmi < 18.5) {
                    $kategori = "Kekurangan Bobot";
                } elseif ($bmi >= 18.5 && $bmi < 22.9) {
                    $kategori = "Sehat";
                } elseif ($bmi >= 23 && $bmi < 24.9) {
                    $kategori = "Kelebihan Bobot";
                } elseif ($bmi >= 25 && $bmi < 29.9) {
                    $kategori = "Obesitas 1";
                } else {
                    $kategori = "Obesitas 2";
                }

                // Tampilkan hasil
                echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
                echo "<p>Tinggi Badan: $tinggi_cm cm</p>";
                echo "<p>Berat Badan: $berat_kg kg</p>";
                echo "<p>BMI: " . number_format($bmi, 1) . "</p>";
                echo "<p>Kategori: $kategori</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
