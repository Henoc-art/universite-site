<?php
$host = 'localhost'; // Hôte (serveur local)
$dbname = 'universite_avocats'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur (par défaut sous XAMPP)
$password = ''; // Mot de passe (vide sous XAMPP)

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
echo "Connexion réussie à la base de données";
?>