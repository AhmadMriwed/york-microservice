<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Review</title>
</head>
<body>

<h1>Certificate Review</h1>
<p>Name: {{ $mailData['first_name'] }}</p>
<p>last_name: {{ $mailData['last_name'] }}</p>
<p>Email: {{ $mailData['email'] }}</p>
<p>certificate_code: {{ $mailData['certificate_code'] }}</p>
<p>Message: {{ $mailData['message'] }}</p>
</body>
</html>
