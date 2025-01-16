<?php
use App\Controllers\Site\MailController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email from Dental Clinic Mushegh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-body p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .email-footer {
            background: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>New Message from Dental Clinic Mushegh</h1>
    </div>
    <div class="email-body">
        <p><strong>Name:</strong> <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Message:</strong></p>
        <p><?= nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')); ?></p>
    </div>
    <div class="email-footer">
        <p>&copy; <?= date('Y'); ?> Dental Clinic Mushegh. All rights reserved.</p>
    </div>
</div>
</body>
</html>
