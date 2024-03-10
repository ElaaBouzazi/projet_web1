<?php
include('autoload.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $mail_effacer = htmlspecialchars($_POST['mail_supprimer']);

    // Vérifier si le mail existe
    try {
        $requete = "SELECT * FROM donnees WHERE mail = :mail";
        $db = new base_donnees();
        $stmt = $db->connect->prepare($requete);
        $stmt->bindParam(':mail', $mail_effacer);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Supprimer le CV de la base de données
            $requete_effacer = "DELETE FROM donnees WHERE mail = :mail_supprimer";
            $deleteStmt = $db->connect->prepare($requete_effacer);
            $deleteStmt->bindParam(':mail_supprimer', $mail_effacer);
            $deleteStmt->execute();

            echo "CV supprimé avec succès <a href='verification.php'>Retour a la page d'acceuil</a>";
        } else {
            echo "CV non trouvé. Veuillez vérifier l'e-mail.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer votre CV</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 400px;
    text-align: center;
}

h1 {
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    color: #555;
}

input[type="email"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
  color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
</head>
<body class="contact-form">
<div class="container">
<h1>Supprimez votre CV</h1>
    <form action="" method="post">
        <label for="mail_supprimer">Entrez votre e-mail pour supprimer votre CV :</label>
        <input type="email" name="mail_supprimer" placeholder="example@expmail.com" required>
        <input type="submit" value="SUPPRIMER" name="supprimer">
    </form>
</div>
   
</body>
</html>
