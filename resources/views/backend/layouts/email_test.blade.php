<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title> <!-- Changed the title to be static or another field -->
</head>
<body>
    <h1>New Message</h1>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Number:</strong> {{ $phone }}</p>
    <p><strong>Message:</strong> {{ $messageBody }}</p> <!-- Updated to use 'messageBody' -->
</body>
</html>
