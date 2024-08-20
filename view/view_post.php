<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>View Post</h2>
    <div class="mb-3">
        <strong>Title:</strong> <?= htmlspecialchars($post['title']) ?>
    </div>
    <div class="mb-3">
        <strong>Author:</strong> <?= htmlspecialchars($post['author']) ?>
    </div>
    <div class="mb-3">
        <strong>Content:</strong>
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    </div>
    <a href="../index.php?page=list" class="btn btn-secondary">Back to List</a>
</div>
</body>
</html>
