<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; margin: 0; padding: 20px;">
    
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        <!-- Logo Section -->
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('img/LOGO.png') }}" alt="Tagum UYnite Logo" style="width: 120px; height: auto;">
        </div>

        <!-- Greeting -->
        <h2 style="color: #1F486C; text-align: center;">Reset Your Password</h2>
        <p style="color: #333333; font-size: 16px;">Hello Ka-Uniters,</p>
        <p style="color: #555555; font-size: 14px; line-height: 1.5;">
            You are receiving this email because we received a password reset request for your account.
        </p>

        <!-- Button -->
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}" style="background-color: #31A871; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 16px;">
                Reset Password
            </a>
        </div>

        <!-- Expiry Notice -->
        <p style="color: #777777; font-size: 12px;">This password reset link will expire in 60 minutes.</p>
        <p style="color: #777777; font-size: 12px;">If you did not request a password reset, no further action is required.</p>

        <!-- Footer -->
        <div style="background: #f9fafb; border-top: 1px solid #e5e7eb; padding: 1.5rem 2rem; text-align: center; border-radius: 0 0 8px 8px; margin-top: 20px;">
            <p style="margin: 0; font-size: 0.75rem; color: #9ca3af;">
                This is an automated message from TAGUM UYnite. Please do not reply to this email.
            </p>
            <p style="margin: 0.5rem 0 0 0; font-size: 0.75rem; color: #9ca3af;">
                © {{ date('Y') }} TAGUM UYnite. All rights reserved.
            </p>
        </div>

        <!-- URL Fallback -->
        <p style="color: #aaaaaa; font-size: 10px; margin-top: 20px; word-break: break-all;">
            If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
            <br>
            <a href="{{ $url }}" style="color: #31A871;">{{ $url }}</a>
        </p>
    </div>

</body>
</html>
