
    <head>
        <meta charset="UTF-8">
        <title>Payment Success</title>
    </head>
    <body>
        <p><strong>Thank you for your payment! Here are the payment details:</strong></p>
        <br>
        <table style="border: 2px solid black; width:50%;">
            <tr>
                <th><strong>Payment ID:</strong></th>
                <td>{{ $paymentData['id'] }}</td>
            </tr>
            <tr>
                <th><strong>Payment Method:</strong></th>
                <td style="text-transform: uppercase;">{{ $paymentData['method'] }}</td>
            </tr>
            <tr>
                <th><strong>Payment Amount:</strong></th>
                <td>{{ $paymentData['amount'] }} Rs.</td>
            </tr>
            <tr>
                <th><strong>Payment Status:</strong></th>
                <td style="text-transform: uppercase;">{{ $paymentData['status'] }}</td>
            </tr>
        </table>
        <br>
        <p>If you have any further questions or need additional assistance, please don't hesitate to contact us. We're here to help!</p>
        <p>Best regards,</p>
        <p>The {{ preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel')) }} Team</p>
    </body>
</html>

