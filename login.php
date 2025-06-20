<?php
global $pdo;
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnérable à SQL Injection 👇
    $stmt = $pdo->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

    if ($user = $stmt->fetch()) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();
    } else {
        $error = 'Identifiants incorrects';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- ✅ Ajout du CSS -->
</head>
<body>
<div class="container">
    <h2>Connexion</h2>
    <?php if ($error): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
</div>
</body>
</html>