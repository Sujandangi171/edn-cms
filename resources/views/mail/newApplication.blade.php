<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations on Joining Our Company!</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content {
            padding: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="content">
            <p>Dear Sir/Ma'am,</p>

            @if ($jobTitle)
                <p>We have received a new job application for the vacancy title of {{ $jobTitle }}. </p>
            @else
                <p>We have received an application who is interested for the upcoming job/internship. </p>
            @endif
            <p>Click <a href="{{ $link }}">this</a> link to view the application. </p>
            <p>Thank you.</p>
        </div>
    </div>
</body>

</html>
