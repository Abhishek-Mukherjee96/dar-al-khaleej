<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .thankyou-card {
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            max-width: 480px;
            width: 100%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .thankyou-icon {
            font-size: 70px;
            color: #28a745;
            margin-bottom: 20px;
        }

        .thankyou-card h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .thankyou-card p {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .btn-custom {
            padding: 10px 25px;
            border-radius: 30px;
        }
    </style>
</head>

<body>

    <div class="thankyou-card">
        <div class="thankyou-icon">
            <i class="bi bi-check-circle-fill"></i>
        </div>

        <h1>Thank You!</h1>
        <p>
            Your enquiry has been successfully submitted.
            Our team will get back to you shortly.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{route('index')}}" class="btn btn-primary btn-custom">
                Back to Home
            </a>
            <a href="{{route('contact_us')}}" class="btn btn-outline-secondary btn-custom">
                Contact Again
            </a>
        </div>
    </div>

</body>

</html>