<?php
include 'db.php'; // Inclut le fichier de connexion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées depuis le formulaire
    $nom = strtoupper($_POST['nom']); // Convertir en majuscules
    $prenom = ucfirst(strtolower($_POST['prenom'])); // Première lettre en majuscule
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $type_bac = $_POST['typeBac'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hacher le mot de passe

    try {
        // Préparer et exécuter la requête SQL
        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, age, sexe, type_bac, contact, username, password) 
                       VALUES (:nom, :prenom, :age, :sexe, :type_bac, :contact, :username, :password)");
        $stmt->execute([
        ':nom' => strtoupper($_POST['nom']),
        ':prenom' => ucfirst(strtolower($_POST['prenom'])),
        ':age' => $_POST['age'],
        ':sexe' => $_POST['sexe'],
        ':type_bac' => $_POST['typeBac'],
        ':contact' => $_POST['contact'],
        ':username' => $_POST['username'],
        ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ]);

        echo "Inscription réussie !";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Erreur de doublon (UNIQUE)
            echo "Nom d'utilisateur déjà existant.";
        } else {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>