<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kode OTP Obatin Apps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            color: #333333;
        }
        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #4CAF50;
        }
        .header h1 {
            color: #4CAF50;
            font-size: 24px;
            margin: 0;
        }
        .content {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .otp-code {
            display: inline-block;
            background: #f0f0f0;
            padding: 10px 20px;
            font-size: 28px;
            font-weight: bold;
            color: #333333;
            letter-spacing: 3px;
            margin: 20px 0;
            border-radius: 6px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Obatin Apps</h1>
        </div>
        <div class="content">
            <p>Halo,</p>
            <p>Terima kasih telah mendaftar di <strong>Obatin Apps</strong>. Berikut adalah kode OTP Anda untuk verifikasi akun:</p>
            <div class="otp-code">{{ $otp }}</div>
            <p>Kode ini hanya berlaku selama <strong>5 menit</strong>. Jangan bagikan kode ini kepada siapa pun demi keamanan akun Anda.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Obatin Apps. Semua hak dilindungi.
        </div>
    </div>
</body>
</html>
