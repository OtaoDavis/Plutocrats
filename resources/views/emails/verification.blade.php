<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>Please click the link below to verify your email address:</p>
    <a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>
    <p>This link will expire in 60 minutes.</p>
    <p>If you did not create an account, no further action is required.</p>
</body>
</html>