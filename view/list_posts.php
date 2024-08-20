<?php
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Posts List</h2>

        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <a href="index.php?page=add" class="btn btn-primary mb-3">Add New Post</a>

        <?php if (empty($posts)): ?>
            <div class="alert alert-info">No posts found. Click "Add New Post" to create one.</div>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?= htmlspecialchars($post['id']) ?></td>
                            <td><?= htmlspecialchars($post['title']) ?></td>
                            <td><?= htmlspecialchars($post['content']) ?></td>
                            <td><?= htmlspecialchars($post['author']) ?></td>
                            <td>
                                <a href="index.php?page=view&id=<?= htmlspecialchars($post['id']) ?>" class="btn btn-info">View</a>
                                <a href="index.php?page=edit&id=<?= htmlspecialchars($post['id']) ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?page=delete&id=<?= htmlspecialchars($post['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>