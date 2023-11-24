<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Library</title>
</head>
<body>
    <p>Hello {{ $data['name'] }},</p>

    <p>Welcome to our site! Your account has been successfully registered.</p>

    <p>Here are your account details:</p>

    <ul>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Password:</strong> {{ $data['password'] }}</li>
    </ul>

    <p>You can now log in using your email and the provided password.</p>

    <p>Thank you for joining us!</p>

    <p>Best regards,<br>
       Library</p>
</body>
</html>