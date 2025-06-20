<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css"> <!-- ✅ Ajout du CSS -->
</head>
<body>
<div class="container">
    <h2>Bienvenue <?= htmlspecialchars($_SESSION['user']['username']) ?> !</h2>
    <a href="logout.php">Déconnexion</a>
</div>
</body>
</html>