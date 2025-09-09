<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator If-Else</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calc-container {
            background: #fff;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
        }
        input[type="text"], select {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        .ops {
            margin: 10px 0;
        }
        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            background: #28a745;
            color: white;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #1e7e34;
        }
        .result {
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
            color: #222;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="calc-container">
    <h2>Kalkulator If-Else</h2>
    <form method="GET">
        <input type="hidden" name="mode" value="ifelse">
        <input type="text" required name="angka1" placeholder="Masukkan angka pertama"><br>
        <input type="text" required name="angka2" placeholder="Masukkan angka kedua"><br>
        <div class="ops">
            <select name="condition" required>
                <option value="">-- Pilih Kondisi --</option>
                <option value=">">Lebih Besar (>)</option>
                <option value="<">Lebih Kecil (<)</option>
                <option value=">=">Lebih Besar Sama Dengan (>=)</option>
                <option value="<=">Lebih Kecil Sama Dengan (<=)</option>
                <option value="==">Sama Dengan (==)</option>
                <option value="!=">Tidak Sama Dengan (!=)</option>
            </select>
        </div>
        <input type="submit" value="Cek Kondisi">
    </form>

    <?php
    if (isset($_GET['mode']) && $_GET['mode'] == 'ifelse' && isset($_GET['angka1'], $_GET['angka2'], $_GET['condition'])) {
        $a = (float) $_GET['angka1'];
        $b = (float) $_GET['angka2'];
        $cond = $_GET['condition'];
        $hasil = "";

        if ($cond == ">" && $a > $b) {
            $hasil = "TRUE ($a lebih besar dari $b)";
        } elseif ($cond == "<" && $a < $b) {
            $hasil = "TRUE ($a lebih kecil dari $b)";
        } elseif ($cond == ">=" && $a >= $b) {
            $hasil = "TRUE ($a lebih besar/sama dengan $b)";
        } elseif ($cond == "<=" && $a <= $b) {
            $hasil = "TRUE ($a lebih kecil/sama dengan $b)";
        } elseif ($cond == "==" && $a == $b) {
            $hasil = "TRUE ($a sama dengan $b)";
        } elseif ($cond == "!=" && $a != $b) {
            $hasil = "TRUE ($a tidak sama dengan $b)";
        } else {
            $hasil = "FALSE ($a $cond $b tidak benar)";
        }

        echo "<div class='result'>Hasil: <strong>$hasil</strong></div>";
    }
    ?>
</div>

</body>
</html>