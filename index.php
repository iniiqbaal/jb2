<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Pajak Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h2>Kalkulator Pajak Sederhana</h2>

    <form method="post" action="">
        Masukkan pendapatan tahunan: <input type="text" name="pendapatan">
        <input type="submit" name="submit" value="Hitung Pajak">
    </form>

    <?php
    function hitungPajak($pendapatan) {
        $pajak = 0;

        if ($pendapatan > 0 && $pendapatan <= 50000) {
            $pajak = $pendapatan * 0.1; // Tarif pajak 10%
        } elseif ($pendapatan > 50000 && $pendapatan <= 100000) {
            $pajak = $pendapatan * 0.2; // Tarif pajak 20%
        } else {
            $pajak = $pendapatan * 0.3; // Tarif pajak 30%
        }

        return $pajak;
    }

    if (isset($_POST['submit']) && !empty($_POST['pendapatan'])) {
        $pendapatan = $_POST['pendapatan'];

        $jumlahPajak = hitungPajak($pendapatan);

        // Memformat angka ke dalam format Rupiah menggunakan number_format
        $pendapatan_formatted = "Rp " . number_format($pendapatan, 0, ',', '.');
        $jumlahPajak_formatted = "Rp " . number_format($jumlahPajak, 0, ',', '.');

        echo "<p>Pendapatan Tahunan: $pendapatan_formatted</p>";
        echo "<p>Jumlah Pajak yang Harus Dibayar: $jumlahPajak_formatted</p>";
    }
    ?>

</body>
</html>