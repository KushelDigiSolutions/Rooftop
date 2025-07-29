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
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container text-center mt-5">
			<h2 class="text-danger">Approval Failed</h2>
			<p>{{ $error }}</p>
			<a href="https://mail.google.com" class="btn btn-secondary mt-3">Back to Email</a>
		</div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
