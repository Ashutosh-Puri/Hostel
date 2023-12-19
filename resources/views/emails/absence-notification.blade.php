<!-- resources/views/emails/absence-notification.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Absence Notification</title>
</head>
<body>
    <p>Hello,</p>
    
    <p>This is to inform you that your child, {{ $student->name }}, is absent today in the hostel.</p>
    
    <p>Please contact the Hostel for more details.</p>

    <p>Thank you,</p>
    <p>{{ env('APP_NAME') }}</p>
</body>
</html>
