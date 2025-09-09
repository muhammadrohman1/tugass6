<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Eval Professional</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.08) 2px, transparent 2px),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 150px 150px, 200px 200px, 100px 100px;
            animation: float 25s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
        }

        .calc-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 50px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            max-width: 650px;
            width: 100%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .calc-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            animation: shimmer 2s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .calc-container:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 
                0 35px 70px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.3);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 1.1em;
            margin-bottom: 35px;
            font-weight: 400;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .input-group {
            position: relative;
        }

        input[type="text"] {
            width: 100%;
            padding: 20px 25px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 18px;
            font-family: 'Monaco', 'Consolas', monospace;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(145deg, #f8fafc, #ffffff);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
            background: #ffffff;
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.1),
                inset 0 2px 4px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        input[type="text"]::placeholder {
            color: #94a3b8;
            font-style: italic;
        }

        .input-helper {
            position: absolute;
            top: -12px;
            right: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus + .input-helper {
            opacity: 1;
            transform: translateY(0);
        }

        .examples-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 12px;
            margin: 20px 0;
        }

        .example-btn {
            background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 12px;
            font-family: 'Monaco', 'Consolas', monospace;
            font-size: 14px;
            color: #475569;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .example-btn:hover {
            background: linear-gradient(145deg, #e2e8f0, #cbd5e1);
            border-color: #94a3b8;
            transform: translateY(-2px);
            color: #334155;
        }

        .example-btn:active {
            transform: translateY(0);
        }

        input[type="submit"] {
            padding: 18px 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        input[type="submit"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s;
        }

        input[type="submit"]:hover::before {
            left: 100%;
        }

        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
        }

        input[type="submit"]:active {
            transform: translateY(-1px);
        }

        .result {
            margin-top: 30px;
            padding: 25px;
            border-radius: 16px;
            font-size: 16px;
            line-height: 1.6;
            animation: slideIn 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .result.success {
            background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
            color: white;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .result.error {
            background: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
            color: white;
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
        }

        .result::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .result-details {
            display: grid;
            gap: 15px;
            margin-top: 15px;
        }

        .result-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .result-icon {
            font-size: 20px;
            width: 30px;
            text-align: center;
        }

        .result-value {
            font-family: 'Monaco', 'Consolas', monospace;
            font-weight: 600;
            font-size: 18px;
        }

        .tips-section {
            margin-top: 30px;
            padding: 25px;
            background: linear-gradient(145deg, #f8fafc, #f1f5f9);
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .tips-title {
            color: #475569;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .tips-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            list-style: none;
        }

        .tips-list li {
            color: #64748b;
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tips-list code {
            background: #e2e8f0;
            padding: 3px 8px;
            border-radius: 6px;
            font-family: 'Monaco', 'Consolas', monospace;
            color: #1e293b;
            font-weight: 600;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .calc-container {
                padding: 30px 25px;
                margin: 10px;
            }

            h2 {
                font-size: 2em;
            }

            input[type="text"], input[type="submit"] {
                font-size: 16px;
                padding: 16px 20px;
            }

            .examples-grid {
                grid-template-columns: 1fr 1fr;
            }

            .tips-list {
                grid-template-columns: 1fr;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #ffffff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Floating Action Buttons */
        .fab-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .fab {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .fab:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="calc-container">
        <h2>🧮 Kalkulator Eval</h2>
        <p class="subtitle">Evaluasi ekspresi matematika dengan mudah dan akurat</p>
        
        <form method="GET">
            <input type="hidden" name="mode" value="eval">
            
            <div class="input-group">
                <input type="text" required name="expr" id="expression" 
                       placeholder="Masukkan ekspresi matematika..."
                       value="<?= htmlspecialchars($_GET['expr'] ?? '') ?>">
                <div class="input-helper">💡 Ketik ekspresi math</div>
            </div>

            <div class="examples-grid">
                <button type="button" class="example-btn" onclick="setExpression('(2+3)*4')">
                    (2+3)*4
                </button>
                <button type="button" class="example-btn" onclick="setExpression('15/3+7*2')">
                    15/3+7*2
                </button>
                <button type="button" class="example-btn" onclick="setExpression('sqrt(16)+2^3')">
                    sqrt(16)+2^3
                </button>
                <button type="button" class="example-btn" onclick="setExpression('sin(30)*cos(60)')">
                    sin(30)*cos(60)
                </button>
                <button type="button" class="example-btn" onclick="setExpression('log(100)/log(10)')">
                    log(100)/log(10)
                </button>
                <button type="button" class="example-btn" onclick="setExpression('abs(-5)*pi()')">
                    abs(-5)*pi()
                </button>
            </div>

            <input type="submit" value="🔍 Hitung Sekarang">
        </form>

        <?php
        if (isset($_GET['mode']) && $_GET['mode'] == 'eval' && isset($_GET['expr'])) {
            $expr = trim($_GET['expr']);
            
            // Fungsi untuk membersihkan dan memvalidasi ekspresi
            function sanitizeExpression($expression) {
                // Hapus spasi berlebih
                $expression = preg_replace('/\s+/', '', $expression);
                
                // Ganti simbol alternatif
                $expression = str_replace(['×', '÷'], ['*', '/'], $expression);
                
                // Tambahkan support untuk fungsi matematika
                $expression = preg_replace('/(\d)([a-zA-Z])/', '$1*$2', $expression); // 2sin -> 2*sin
                
                return $expression;
            }
            
            // Fungsi untuk validasi keamanan
            function isSecureExpression($expr) {
                // Daftar fungsi dan operator yang diizinkan
                $allowed_pattern = '/^[0-9+\-\/().eE\s]|sin|cos|tan|log|ln|sqrt|abs|pow|pi|exp|floor|ceil|round|max|min$/';
                
                // Check untuk karakter berbahaya
                $dangerous_patterns = [
                    '/[;\'"$_]/',     // Karakter berbahaya
                    '/\b(exec|eval|system|shell_exec|passthru|file|fopen|include|require)\b/i',
                    '/\$\w+/',        // Variabel PHP
                    '/\w+\s*\(.\)\s;/' // Function calls dengan semicolon
                ];
                
                foreach ($dangerous_patterns as $pattern) {
                    if (preg_match($pattern, $expr)) {
                        return false;
                    }
                }
                
                return true;
            }
            
            // Fungsi evaluasi yang aman
            function safeEval($expression) {
                // Definisi konstanta dan fungsi matematika
                $constants = [
                    'pi' => pi(),
                    'e' => exp(1)
                ];
                
                // Ganti konstanta
                foreach ($constants as $name => $value) {
                    $expression = preg_replace("/\b$name\(\)/", $value, $expression);
                    $expression = preg_replace("/\b$name\b/", $value, $expression);
                }
                
                // Support untuk pangkat (^)
                $expression = preg_replace('/(\d+(?:\.\d+)?)\s*\^\s*(\d+(?:\.\d+)?)/', 'pow($1,$2)', $expression);
                
                // Evaluasi dengan error handling
                $old_error_reporting = error_reporting(0);
                
                try {
                    $result = eval("return $expression;");
                    error_reporting($old_error_reporting);
                    return $result;
                } catch (Throwable $e) {
                    error_reporting($old_error_reporting);
                    throw new Exception("Evaluasi gagal: " . $e->getMessage());
                }
            }
            
            try {
                $cleanExpr = sanitizeExpression($expr);
                
                if (empty($cleanExpr)) {
                    throw new Exception("Ekspresi tidak boleh kosong");
                }
                
                if (!isSecureExpression($cleanExpr)) {
                    throw new Exception("Ekspresi mengandung karakter atau fungsi yang tidak diizinkan");
                }
                
                $hasil = safeEval($cleanExpr);
                
                if ($hasil === false || !is_numeric($hasil)) {
                    throw new Exception("Hasil evaluasi tidak valid");
                }
                
                echo "<div class='result success'>";
                echo "<div class='result-details'>";
                echo "<div class='result-item'>";
                echo "<span class='result-icon'>📝</span>";
                echo "<div><strong>Ekspresi:</strong> <span class='result-value'>$expr</span></div>";
                echo "</div>";
                
                if ($cleanExpr !== $expr) {
                    echo "<div class='result-item'>";
                    echo "<span class='result-icon'>🔧</span>";
                    echo "<div><strong>Diproses:</strong> <span class='result-value'>$cleanExpr</span></div>";
                    echo "</div>";
                }
                
                echo "<div class='result-item'>";
                echo "<span class='result-icon'>🎉</span>";
                echo "<div><strong>Hasil:</strong> <span class='result-value'>" . number_format($hasil, 8) . "</span></div>";
                echo "</div>";
                
                // Informasi tambahan jika hasil adalah integer
                if (is_int($hasil) || $hasil == intval($hasil)) {
                    echo "<div class='result-item'>";
                    echo "<span class='result-icon'>🔢</span>";
                    echo "<div><strong>Bilangan bulat:</strong> <span class='result-value'>" . intval($hasil) . "</span></div>";
                    echo "</div>";
                }
                
                echo "</div>";
                echo "</div>";
                
            } catch (Exception $e) {
                echo "<div class='result error'>";
                echo "<div class='result-details'>";
                echo "<div class='result-item'>";
                echo "<span class='result-icon'>❌</span>";
                echo "<div><strong>Error:</strong> " . $e->getMessage() . "</div>";
                echo "</div>";
                echo "<div class='result-item'>";
                echo "<span class='result-icon'>💡</span>";
                echo "<div><strong>Tips:</strong> Periksa sintaks dan gunakan operator yang valid</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } catch (ParseError $e) {
                echo "<div class='result error'>";
                echo "<div class='result-details'>";
                echo "<div class='result-item'>";
                echo "<span class='result-icon'>⚠</span>";
                echo "<div><strong>Syntax Error:</strong> Struktur ekspresi tidak valid</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>

        <div class="tips-section">
            <h3 class="tips-title">💡 Tips Penggunaan</h3>
            <ul class="tips-list">
                <li>➕ Penjumlahan: <code>5+3</code></li>
                <li>➖ Pengurangan: <code>10-4</code></li>
                <li>✖ Perkalian: <code>6*7</code></li>
                <li>➗ Pembagian: <code>15/3</code></li>
                <li>🔺 Pangkat: <code>2^3</code> atau <code>pow(2,3)</code></li>
                <li>📐 Akar kuadrat: <code>sqrt(16)</code></li>
                <li>🌊 Trigonometri: <code>sin(30)</code>, <code>cos(60)</code></li>
                <li>📊 Logaritma: <code>log(100)</code>, <code>ln(e)</code></li>
                <li>🔄 Absolut: <code>abs(-5)</code></li>
                <li>📍 Konstanta: <code>pi()</code>, <code>e</code></li>
                <li>📏 Pembulatan: <code>round(3.14159)</code></li>
                <li>🎯 Kurung: <code>(2+3)*4</code></li>
            </ul>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fab-container">
        <button class="fab" onclick="clearExpression()" title="Clear">
            🗑
        </button>
    </div>

    <script>
        function setExpression(expr) {
            document.getElementById('expression').value = expr;
            document.getElementById('expression').focus();
        }

        function clearExpression() {
            document.getElementById('expression').value = '';
            document.getElementById('expression').focus();
        }

        // Auto-focus pada load
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('expression').focus();
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + L untuk clear
            if ((e.ctrlKey || e.metaKey) && e.key === 'l') {
                e.preventDefault();
                clearExpression();
            }
            
            // Enter untuk submit
            if (e.key === 'Enter' && e.target.id !== 'expression') {
                e.preventDefault();
                document.querySelector('form').submit();
            }
        });

        // Live validation
        document.getElementById('expression').addEventListener('input', function(e) {
            const value = e.target.value;
            const dangerousChars = /[;"'$_]/;
            
            if (dangerousChars.test(value)) {
                e.target.style.borderColor = '#ef4444';
                e.target.style.backgroundColor = '#fef2f2';
            } else {
                e.target.style.borderColor = '#e2e8f0';
                e.target.style.backgroundColor = '';
            }
        });

        // Form submission animation
        document.querySelector('form').addEventListener('submit', function() {
            const submitBtn = document.querySelector('input[type="submit"]');
            const originalText = submitBtn.value;
            
            submitBtn.value = '⏳ Menghitung...';
            submitBtn.disabled = true;
            
            // Reset setelah 2 detik jika masih di halaman yang sama
            setTimeout(() => {
                submitBtn.value = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Add ripple effect to buttons
        document.querySelectorAll('button, input[type="submit"]').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255,255,255,0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // CSS untuk ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>