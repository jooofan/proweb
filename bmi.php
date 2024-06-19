<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator BMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Gaya CSS */
        .jkelamin label {
            display: inline-block;
            padding: 5px;
            border: solid 2px black;
            margin-right: 10px;
            cursor: pointer;
        }

        /* Mengubah warna label saat input radio dipilih */
        .jkelamin input[type="radio"]:checked + label {
            background-color: lightblue;
        }

        /* Ubah warna label default */
        .jkelamin label {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container bg-secondary" style="height:100vh">
        <div class="card text-center bg-secondary" style="height:100%">
            <div class="card-body d-flex align-items-center justify-content-center">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir Anda</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                    </div>

                    <div class="mb-3 jkelamin">
                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="l" class="d-none">
                        <label for="laki-laki">Laki-laki</label>

                        <input type="radio" id="perempuan" name="jenis_kelamin" value="p" class="d-none">
                        <label for="perempuan">Perempuan</label>
                    </div>

                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                        <input type="number" id="tinggi" name="tinggi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat Badan (kg)</label>
                        <input type="number" id="berat" name="berat" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Hitung</button>
                </form>

                <div class="mt-3">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tinggi_cm = floatval($_POST["tinggi"]);
                        $berat_kg = floatval($_POST["berat"]);
                        $tanggal_lahir = $_POST["tanggal_lahir"];
                        $jenis_kelamin = $_POST["jenis_kelamin"];

                        // Ubah tinggi dari cm ke meter
                        $tinggi_m = $tinggi_cm / 100;

                        // Hitung BMI
                        $bmi = $berat_kg / ($tinggi_m * $tinggi_m);

                        // Tentukan kategori BMI
                        if ($bmi < 18.5) {
                            $kategori = "Kurus";
                        } elseif ($bmi >= 18.5 && $bmi < 25) {
                            $kategori = "Normal";
                        } elseif ($bmi >= 25 && $bmi < 30) {
                            $kategori = "Gemuk";
                        } else {
                            $kategori = "Obesitas";
                        }

                        // Tampilkan hasil
                        echo "Tanggal Lahir: $tanggal_lahir<br>";
                        echo "Jenis Kelamin: " . ($jenis_kelamin == "l" ? "Laki-laki" : "Perempuan") . "<br>";
                        echo "Tinggi Badan: $tinggi_cm cm<br>";
                        echo "Berat Badan: $berat_kg kg<br>";
                        echo "BMI: " . number_format($bmi, 1) . "<br>";
                        echo "Kategori: $kategori<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
x