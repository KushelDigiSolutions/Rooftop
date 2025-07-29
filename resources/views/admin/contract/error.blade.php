<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center">
    <div class="container mt-5">
        <div class="alert alert-danger">
            Something went wrong: {{ $error }}
        </div>
    </div>
</body>
</html>
