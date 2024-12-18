<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$registrationDetails['title']}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #333333;
            color: #ffffff;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .content h1 {
            color: #333333;
        }
        .footer {
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
            color: #666666;
        }
        .footer a {
            color: #333333;
            text-decoration: none;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="https://yorkbritishacademy.uk/img/logo-light.png" alt="York British Academy Logo">
</div>
<div class="container">
    <div class="content">
        <h1>{{$registrationDetails['title']}}</h1>
        <h3>{{$registrationDetails['sub_title']}}</h3>
        <p>Dear {{$registrationDetails['full_name']}},</p>
        <p>We are pleased to inform you that you have successfully registered for the training plan.</p>
        <p>We are excited to have you onboard and look forward to supporting your learning journey with us.</p>
        <p>If you have any questions or need further assistance, feel free to contact us at the details below:</p>
        <p><strong>Email:</strong> <a href="mailto:training@yorkbritishacademy.uk">training@yorkbritishacademy.uk</a></p>
        <p><strong>Phone:</strong> +442087209292 / +447520619292⁩⁩</p>
    </div>
</div>
<div class="footer">
    <p>For more information, visit our website: <a href="https://yorkbritishacademy.uk">www.yorkbritishacademy.uk</a></p>
    <p>&copy; 2024 York British Academy, All rights reserved.</p>
</div>
</body>
</html>
