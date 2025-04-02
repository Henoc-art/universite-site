<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.html"); // Redirige vers la page de connexion si non connecté
    exit;
}

$user = $_SESSION['user']; // Récupère les données utilisateur
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Utilisateur</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <header>
        <h1>Bienvenue, <?= htmlspecialchars($user['prenom']) ?> <?= htmlspecialchars($user['nom']) ?> !</h1>

        <nav><a href="index.html">Acceuil</a></nav>
    </header>
    <main>
        <section>
            <h2>Vos informations personnelles</h2>
            <ul>
                <li><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></li>
                <li><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></li>
                <li><strong>Contact :</strong> <?= htmlspecialchars($user['contact']) ?></li>
            </ul>
            <a href="logout.php">Se déconnecter</a>
        </section>
    </main>

    <footer>
        <p>&copy;2025 Miayi Soukoulou. Tous droits réservés.</p>
     </footer>
</body>
</html>
