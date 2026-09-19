<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email PKPT UIN RIL</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FBF8F1; /* Cream */
            margin: 0;
            padding: 0;
            color: #1C231D;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #E7EFE6;
        }
        .email-header {
            background-color: #0F2A1F; /* Green 950 */
            padding: 30px 20px;
            text-align: center;
            border-bottom: 4px solid #D3A431; /* Gold 500 */
        }
        .email-header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .email-body {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #153B29; /* Green 900 */
        }
        .message {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #4B564C;
        }
        .btn-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            background-color: #317F52; /* Green 600 */
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #256B45;
        }
        .footer {
            background-color: #F2F6EF; /* Green 50 */
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #4B564C;
            border-top: 1px solid #E7EFE6;
        }
        .fallback-link {
            font-size: 12px;
            color: #4B564C;
            word-break: break-all;
            margin-top: 30px;
            padding: 15px;
            background-color: #FBF8F1;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>PKPT IPNU IPPNU</h1>
            <div style="color: #E4BC4E; font-size: 14px; margin-top: 5px;">UIN Raden Intan Lampung</div>
        </div>
        
        <div class="email-body">
            <div class="greeting">Assalamu'alaikum, {{ $user->name }}!</div>
            
            <div class="message">
                Terima kasih telah mendaftar di sistem informasi Pimpinan Komisariat Perguruan Tinggi (PKPT) IPNU IPPNU UIN Raden Intan Lampung.
                <br><br>
                Untuk menjaga keamanan akun Anda dan menyelesaikan proses pendaftaran, mohon verifikasi alamat email ini dengan menekan tombol hijau di bawah:
            </div>
            
            <div class="btn-container">
                <a href="{{ $url }}" class="btn">Verifikasi Email Saya</a>
            </div>
            
            <div class="message" style="margin-bottom: 0;">
                Setelah email terverifikasi, akun Anda akan masuk dalam daftar antrean untuk ditinjau oleh Admin (Validasi Manual).
                <br><br>
                <em>Wallahul Muwaffiq Ilaa Aqwamit Tharieq,</em><br>
                <strong>Admin PKPT UIN RIL</strong>
            </div>

            <div class="fallback-link">
                Jika tombol di atas tidak berfungsi, silakan copy dan paste link berikut ke browser Anda:<br>
                <a href="{{ $url }}" style="color: #317F52;">{{ $url }}</a>
            </div>
        </div>
        
        <div class="footer">
            &copy; {{ date('Y') }} PKPT IPNU IPPNU UIN Raden Intan Lampung.<br>
            Email otomatis ini dikirim oleh sistem, mohon tidak membalas email ini.
        </div>
    </div>
</body>
</html>
