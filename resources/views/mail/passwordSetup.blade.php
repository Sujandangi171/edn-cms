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
            <p>Dear {{ printFirstNameOnly($name) }},</p>
            <p>We are thrilled to welcome you to our team at <b>
                    <p>{{ getConfig('company-name') }}</p>
                </b>. Your skills and experience
                will be a valuable addition to our organization, and we look forward to achieving great success
                together.</p>
            <p>We have created your account, here is the username and the password of your account.</p>
            <p><b>Username:</b> {{ $username ?? '' }}</p>
            <p><b>Password:</b> {{ $password ?? '' }}</p>
            <b>Click <a href="{{ $link }}">this</a> login to login to the system.</b>
            <p>Once again, Welcome aboard!</p>
            <p>Best Regards,</p>
            <p>{{ Auth::user()->name }}</p>
        </div>
    </div>
</body>

</html>
