<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            text-align: center;
        }
        .code {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Hello,</h2>
        </div>
        <div class="content">
            <p>Thanks for verifying your email:!</p>
            <p>Your verification code is:</p>
            <p class="code">{{ $code }}</p>
            <p>If you didn’t request this code or believe it was sent by mistake, please contact us.</p>
        </div>
        <div class="footer">
            <p>The Nour Team</p>
            <p>Download our app on <span>App Store</span> or <span>Google Play</span>.</p>
            <p>Have questions? Email us at:
                <a href="mailto:support@nourkm.com">support@nourkm.com</a>
            </p>
        </div>
    </div>
</body>
</html>
