<?php
include 'db.php'; // Connexion à la base de données

// Activer l'affichage des erreurs pour aider au débogage (à désactiver en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? ''; // Récupère le username
    $password = $_POST['password'] ?? ''; // Récupère le mot de passe

    // Vérifier que les champs ne sont pas vides
    if (empty($username) || empty($password)) {
        die("Les champs username et password sont obligatoires.");
    }

    try {
        // Recherche de l'utilisateur dans la base
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie, démarrage de la session
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION['user'] = $user; // Stockage des données utilisateur dans la session

            // Redirection
            header("Location: user_space.php");
            exit;
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        // Message d'erreur générique (aucun détail technique exposé)
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
    }
}
?>


