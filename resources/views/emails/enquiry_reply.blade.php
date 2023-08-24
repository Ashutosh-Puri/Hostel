
    <head>
        <meta charset="UTF-8">
        <title>Reply to Your Enquiry</title>
    </head>
    <body>
        <p>Dear {{ $name }},</p>
        <p>Thank you for reaching out to us with your enquiry. We appreciate your interest in {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel')) }}.</p>
        <p>Here is our response to your enquiry:</p>
        <blockquote>
            {!! $messageBody !!}
        </blockquote>
        <p>If you have any further questions or need additional assistance, please don't hesitate to contact us. We're here to help!</p>
        <p>Best regards,</p>
        <p>The {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel')) }} Team</p>
    </body>
</html>

