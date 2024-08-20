<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db/Database.php';
require_once 'model/Model.php';
require_once 'model/Post.php';
require_once 'controller/Controller.php';
require_once 'controller/PostController.php';

$base_path = __DIR__ . '/view/';
$controller = new PostController();

$page = isset($_GET['page']) ? $_GET['page'] : 'list';

switch ($page) {
    case 'add':
        $view = $base_path . 'create_post.php';
        break;

    case 'add_post':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])) {
                $message = $controller->create($_POST);
                $_SESSION['message'] = $message;
                header('Location: index.php?page=list');
                exit;
            } else {
                $_SESSION['message'] = "All fields are required.";
                header('Location: index.php?page=add');
                exit;
            }
        }
        break;

    case 'edit':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $post = $controller->read($_GET['id']);
            $view = $base_path . 'edit_post.php';
        } else {
            $view = $base_path . '404.php';
        }
        break;

    case 'edit_post':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
            if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])) {
                $message = $controller->update($_POST, $_POST['id']);
                $_SESSION['message'] = $message;
                header('Location: index.php?page=list');
                exit;
            } else {
                $_SESSION['message'] = "All fields are required.";
                header('Location: index.php?page=edit&id=' . $_POST['id']);
                exit;
            }
        }
        break;

    case 'delete':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $message = $controller->delete($_GET['id']);
            $_SESSION['message'] = $message;
            header('Location: index.php?page=list');
            exit;
        } else {
            $view = $base_path . '404.php';
        }
        break;

    case 'view':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $post = $controller->read($_GET['id']);
            $view = $base_path . 'view_post.php';
        } else {
            $view = $base_path . '404.php';
        }
        break;

    case 'list':
    default:
        $posts = $controller->index();
        $view = $base_path . 'list_posts.php';
        break;
}

if (isset($view) && file_exists($view)) {
    include $view;
} else {
    echo "<h1>404 Not Found</h1>";
    echo "<p>The page you are looking for does not exist.</p>";
}
