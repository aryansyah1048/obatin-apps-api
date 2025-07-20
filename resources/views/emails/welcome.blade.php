<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Akun Obatin Apps</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: #3E54C5;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            color: #333333;
        }
        .content h2 {
            margin-top: 0;
            color: #3E54C5;
        }
        .credentials {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
        }
        .credentials p {
            margin: 8px 0;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #888888;
            background: #f4f6f8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Obatin Apps</h1>
        </div>
        <div class="content">
            <h2>Selamat datang!</h2>
            <p>Akun Anda telah berhasil diverifikasi. Berikut detail akun Anda:</p>
            <div class="credentials">
                <p><strong>Username:</strong> {{ $email }}</p>
                <p><strong>Password:</strong> {{ $password }}</p>
            </div>
            <p>Silakan gunakan informasi di atas untuk login ke aplikasi. 
               Demi keamanan akun Anda, segera ubah password setelah login pertama.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Obatin Apps. Semua hak dilindungi.
        </div>
    </div>
</body>
</html>
