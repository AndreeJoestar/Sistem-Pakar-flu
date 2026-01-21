<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Pakar Flu</title>

    <!-- GOOGLE FONT -->
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
        }

        /* CARD */
        .card {
            background: #ffffff;
            width: 420px;
            padding: 40px;
            border-radius: 22px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
            animation: fadeIn 0.8s ease;
        }

        /* ICON */
        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #3498db, #5dade2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
            box-shadow: 0 10px 25px rgba(52,152,219,0.4);
        }

        h1 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }

        p {
            color: #6c7a89;
            margin: 12px 0 30px;
            font-size: 14px;
        }

        /* BUTTON AREA */
        .menu-btn {
            display: flex;
            gap: 18px;
            justify-content: center;
        }

        .menu-btn a {
            text-decoration: none;
            padding: 14px 34px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;

            /* ANIMATION */
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* HOVER */
        .menu-btn a:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px rgba(0,0,0,0.25);
        }

        /* CLICK */
        .menu-btn a:active {
            transform: translateY(-2px) scale(0.96);
            box-shadow: 0 6px 14px rgba(0,0,0,0.2);
        }

        /* BUTTON COLORS */
        .btn-pasien {
            background: linear-gradient(135deg, #3498db, #5dade2);
        }

        .btn-admin {
            background: linear-gradient(135deg, #2ecc71, #58d68d);
        }

        /* FOOTER */
        .footer {
            margin-top: 28px;
            font-size: 12px;
            color: #95a5a6;
        }

        /* ANIMATION */
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
    </style>
</head>
<body>

    <div class="card">
        <div class="icon">🩺</div>

        <h1>Sistem Pakar Flu</h1>
        <p>Diagnosis awal penyakit flu berdasarkan gejala pasien</p>

        <div class="menu-btn">
            <a href="index.php" class="btn-pasien">
                👤 Pasien
            </a>

            <a href="admin.php" class="btn-admin">
                ⚙ Admin
            </a>
        </div>

        <div class="footer">
            © 2026 Sistem Pakar | By Andrewww
        </div>
    </div>

</body>
</html>
