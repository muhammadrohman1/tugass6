<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
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
            width: 300px;
            text-align: center;
        }
        input[type="text"] {
            width: 90%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .ops {
            margin: 10px 0;
        }
        label {
            margin: 0 6px;
            font-weight: bold;
        }
        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            background: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
<div class="calc-container">
    <h2>Kalkulator Sederhana</h2>
    <form method="GET">
        <input type="text" required name="angka1" placeholder="Masukkan angka pertama"><br>
        <input type="text" required name="angka2" placeholder="Masukkan angka kedua"><br>
        
        <div class="ops">
            <label>+</label>
            <input type="radio" value="+" name="op" required>
            <label>-</label>
            <input type="radio" value="-" name="op">
            <label>*</label>
            <input type="radio" value="*" name="op">
            <label>/</label>
            <input type="radio" value="/" name="op">
        </div>

        <input type="submit" value="Hitung">
    </form>

    <?php
    if (isset($_GET['angka1'], $_GET['angka2'], $_GET['op'])) {
        $angka1 = (float) $_GET['angka1'];
        $angka2 = (float) $_GET['angka2'];
        $op = $_GET['op'];
        $hasil = "";

        switch ($op) {
            case "+":
                $hasil = $angka1 + $angka2;
                break;
            case "-":
                $hasil = $angka1 - $angka2;
                break;
            case "*":
                $hasil = $angka1 * $angka2;
                break;
            case "/":
                if ($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                } else {
                    $hasil = "Error: Tidak bisa dibagi dengan nol!";
                }
                break;
            default:
                $hasil = "Operator tidak valid.";
        }

        echo "<div class='result'>Hasil: <br>$angka1 $op $angka2 = <strong>$hasil</strong></div>";
    }
    ?>
</div>
</body>
</html>