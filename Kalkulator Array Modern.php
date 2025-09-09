<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Array Modern</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .calc-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .calc-container:hover {
            transform: translateY(-5px);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 30px;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input[type="text"] {
            padding: 15px 20px;
            border: 2px solid #e0e6ed;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="text"]::placeholder {
            color: #94a3b8;
            font-style: italic;
        }

        .ops {
            position: relative;
        }

        select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e6ed;
            border-radius: 12px;
            font-size: 16px;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
        }

        select:focus {
            outline: none;
            border-color: #667eea;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="submit"] {
            padding: 15px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            border-radius: 12px;
            text-align: center;
            font-size: 18px;
            box-shadow: 0 10px 25px rgba(17, 153, 142, 0.2);
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result strong {
            font-size: 24px;
            font-weight: 700;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .calc-container {
                padding: 25px;
                margin: 10px;
            }

            h2 {
                font-size: 1.5em;
            }

            input[type="text"], select, input[type="submit"] {
                font-size: 14px;
            }
        }

        /* Icon untuk operasi */
        select option[value="sum"]::before { content: "➕ "; }
        select option[value="avg"]::before { content: "📊 "; }
        select option[value="min"]::before { content: "⬇ "; }
        select option[value="max"]::before { content: "⬆ "; }
        select option[value="prod"]::before { content: "✖ "; }

        /* Loading animation untuk submit button */
        input[type="submit"]:hover::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }

        /* Floating particles effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 100px 100px, 150px 150px, 200px 200px;
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body>
    <div class="calc-container">
        <h2>🧮 Kalkulator Array</h2>
        <form method="GET">
            <input type="hidden" name="mode" value="array">
            <input type="text" required name="arr" placeholder="Pisahkan angka dengan koma, contoh: 2,3,4,5">
            
            <div class="ops">
                <select name="array_op" required>
                    <option value="">🎯 Pilih Operasi Array</option>
                    <option value="sum">➕ Jumlahkan Semua Elemen</option>
                    <option value="avg">📊 Hitung Rata-rata</option>
                    <option value="min">⬇ Cari Nilai Minimum</option>
                    <option value="max">⬆ Cari Nilai Maksimum</option>
                    <option value="prod">✖ Kalikan Semua Elemen</option>
                </select>
            </div>

            <input type="submit" value="🚀 Proses Data">
        </form>

        <?php
        if (isset($_GET['mode']) && $_GET['mode'] == 'array' && isset($_GET['arr'], $_GET['array_op'])) {
            $arrStr = explode(",", $_GET['arr']);
            $arr = array_map('floatval', $arrStr); // ubah jadi float
            $op = $_GET['array_op'];
            $hasil = "";
            $operasiNama = "";

            switch ($op) {
                case "sum":
                    $hasil = array_sum($arr);
                    $operasiNama = "Jumlah Total";
                    break;
                case "avg":
                    $hasil = array_sum($arr) / count($arr);
                    $operasiNama = "Rata-rata";
                    break;
                case "min":
                    $hasil = min($arr);
                    $operasiNama = "Nilai Minimum";
                    break;
                case "max":
                    $hasil = max($arr);
                    $operasiNama = "Nilai Maksimum";
                    break;
                case "prod":
                    $hasil = array_product($arr);
                    $operasiNama = "Hasil Perkalian";
                    break;
                default:
                    $hasil = "Operasi tidak valid.";
                    $operasiNama = "Error";
            }

            echo "<div class='result'>";
            echo "<div>📈 Data: [" . implode(", ", $arr) . "]</div>";
            echo "<div>🎯 Operasi: $operasiNama</div>";
            echo "<div>🎉 Hasil: <strong>" . number_format($hasil, 2) . "</strong></div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>