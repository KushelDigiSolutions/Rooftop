<!DOCTYPE html>
<html>
<head>
    <title>Leave a Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Leave a Comment for Contract</h4>
            </div>
            <div class="card-body">
               <form method="POST" action="{{ route('contract.comment.submit', ['token' => $contract->unique_id]) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">Your Comment</label>
                        <textarea name="comment" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
