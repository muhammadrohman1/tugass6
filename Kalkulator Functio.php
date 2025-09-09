<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Function</title>
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
            background: #007bff;
            color: white;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
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
    <h2>Kalkulator Function</h2>
    <form method="GET">
        <input type="hidden" name="mode" value="function">
        <input type="text" required name="x" placeholder="Masukkan nilai x"><br>
        <div class="ops">
            <select name="func" required>
                <option value="">-- Pilih Fungsi --</option>
                <option value="sin">sin(x)</option>
                <option value="cos">cos(x)</option>
                <option value="tan">tan(x)</option>
                <option value="sqrt">√x</option>
                <option value="log">log(x) basis e</option>
                <option value="exp">e^x</option>
                <option value="abs">|x|</option>
            </select>
        </div>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if (isset($_GET['mode']) && $_GET['mode'] == 'function' && isset($_GET['x'], $_GET['func'])) {
        $x = (float) $_GET['x'];
        $func = $_GET['func'];
        $hasil = "";

        switch ($func) {
            case "sin":
                $hasil = sin($x);
                break;
            case "cos":
                $hasil = cos($x);
                break;
            case "tan":
                $hasil = tan($x);
                break;
            case "sqrt":
                $hasil = ($x >= 0) ? sqrt($x) : "Error: Tidak bisa √ bilangan negatif!";
                break;
            case "log":
                $hasil = ($x > 0) ? log($x) : "Error: log hanya untuk x > 0!";
                break;
            case "exp":
                $hasil = exp($x);
                break;
            case "abs":
                $hasil = abs($x);
                break;
            default:
                $hasil = "Fungsi tidak valid.";
        }

        echo "<div class='result'>Hasil $func($x) = <strong>$hasil</strong></div>";
    }
    ?>
</div>

</body>
</html>