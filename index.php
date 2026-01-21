<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Diagnosis Flu - Pasien</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #eef4ff, #f9fbff);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .card {
            background: white;
            width: 700px;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
            animation: fadeIn 0.8s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            color: #2c3e50;
        }

        .back-btn {
            text-decoration: none;
            padding: 10px 18px;
            background: #ecf0f1;
            border-radius: 10px;
            color: #2c3e50;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #dfe6e9;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #34495e;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid #dcdde1;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52,152,219,0.2);
        }

        .gejala {
            grid-column: span 2;
            margin-top: 10px;
        }

        .gejala-box {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-top: 10px;
        }

        .gejala label {
            background: #f4f6f8;
            padding: 12px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: 0.2s;
            font-weight: 500;
        }

        .gejala input {
            transform: scale(1.2);
        }

        .gejala label:hover {
            background: #eaf2ff;
        }

        .submit-area {
            margin-top: 30px;
            text-align: center;
        }

        button {
            padding: 14px 36px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            color: white;
            background: linear-gradient(135deg, #3498db, #5dade2);
            box-shadow: 0 10px 25px rgba(52,152,219,0.35);
            transition: 0.25s;
        }

        button:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(52,152,219,0.45);
        }

        button:active {
            transform: scale(0.96);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .gejala-box {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>

<div class="card">

    <div class="header">
        <h2>🩺 Form Diagnosis Flu</h2>
        <a href="home.php" class="back-btn">← Home</a>
    </div>

    <form method="post" action="proses.php">

        <div class="form-grid">

            <div>
                <label>Nama Pasien</label>
                <input type="text" name="nama" required>
            </div>

            <div>
                <label>Suhu Tubuh (°C)</label>
                <input type="number" step="0.1" name="suhu" required>
            </div>

            <div>
                <label>Umur</label>
                <input type="number" name="umur" required>
            </div>

            <div>
                <label>Lama Demam (hari)</label>
                <input type="number" name="lama_demam" required>
            </div>

            <div class="gejala">
                <label>Gejala yang Dialami</label>

                <div class="gejala-box">
                    <label><input type="checkbox" name="demam" value="1"> Demam</label>
                    <label><input type="checkbox" name="batuk" value="1"> Batuk</label>
                    <label><input type="checkbox" name="pilek" value="1"> Pilek</label>
                    <label><input type="checkbox" name="tenggorokan" value="1"> Tenggorokan</label>
                    <label><input type="checkbox" name="nyeri_otot" value="1"> Nyeri Otot</label>
                    <label><input type="checkbox" name="sesak_napas" value="1"> Sesak Napas</label>
                </div>
            </div>

        </div>

        <div class="submit-area">
            <button type="submit">🔍 Proses Diagnosis</button>
        </div>

    </form>

</div>

</body>
</html>
