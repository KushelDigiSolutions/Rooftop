<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Auto-redirect to Gmail after 5 seconds -->
    <meta http-equiv="refresh" content="5;url=https://mail.google.com" />
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="text-center border p-5 rounded shadow-sm bg-light">
        <h2 class="text-warning mb-4">
            {{ $message ?? 'You have already approved this contract.' }}
        </h2>

        <p class="text-muted">If you have any questions or believe this is a mistake, please contact our support team.</p>

        
    </div>
</div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
