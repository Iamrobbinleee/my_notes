<?php include '../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Request detected.";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo "Logging in successful.";
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: /views/my_notes.php');
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>