<?php
include('autoload.php');
session_start();
// Verification
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier'])) {
    // la validation des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $media = htmlspecialchars($_POST['media']);
    $parcour = htmlspecialchars($_POST['parcour']);
    $skill = htmlspecialchars($_POST['skill']);
    $langu = htmlspecialchars($_POST['langu']);

    // la mise a jour
    try {
        $requete = "UPDATE donnees SET nom = :nom, prenom = :prenom, tel = :tel, addr = :addr, media = :media, parcour = :parcour, skill = :skill, langu = :langu WHERE mail = :mail";
        $db = new base_donnees();
        $stmt = $db->connect->prepare($requete);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':tel', $telephone);
        $stmt->bindParam(':addr', $adresse);
        $stmt->bindParam(':media', $media);
        $stmt->bindParam(':parcour', $parcour);
        $stmt->bindParam(':skill', $skill);
        $stmt->bindParam(':langu', $langu);
        $stmt->bindParam(':mail', $_SESSION['mail']);
        
        $stmt->execute();
        echo"modifications effecuées avec succés <a href='verification.php'>cliquez ici pour retourner a la page d'acceuil</a>";
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
    <title>Modifiez votre CV</title>
    <style>
    body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    font-size: 2em;
    margin-bottom: 20px;
}

.contact-form {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="tel"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 3px;
}

textarea {
    width: 100%;
    height: 100px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 3px;
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
    <h1>Modifiez votre CV</h1>
    <form action="" method="post">
        <ul class="form-group"> 
            <li><strong>Nom : </strong> <input type="text" name="nom" value="<?php echo $_SESSION['fname']; ?>"></li>
            <li><strong>Prénom : </strong> <input type="text" name="prenom" value="<?php echo $_SESSION['lname']; ?>"></li>
            <li><strong>Téléphone : </strong> <input type="tel" name="telephone" value="<?php echo $_SESSION['tel']; ?>"></li>
            <li><strong>Adresse : </strong> <input type="text" name="adresse" value="<?php echo $_SESSION['add']; ?>"></li>
            <li><strong>Liens réseaux sociaux : </strong> <input type="text" name="media" value="<?php echo $_SESSION['media']; ?>"></li>
        </ul>
        <h2>Parcours académique</h2>
        <p><textarea name="parcour"><?php echo $_SESSION['parcour']; ?></textarea></p>
        <h2>Expériences professionnelles</h2>
        <ul class="form-group"> 
            <p><textarea name="experience"><?php echo $_SESSION['experience']; ?></textarea></p>
        </ul>
        <h2>Compétences</h2>
        <ul class="form-group"> 
            <li><strong>Soft skills : </strong> <input type="text" name="skill" value="<?php echo $_SESSION['skill']; ?>"></li>
            <li><strong>Langues : </strong> <input type="text" name="langu" value="<?php echo $_SESSION['langu']; ?>"></li>
        </ul>
        <input type="submit" value="MODIFIER" name="modifier">
    </form>
</body>

</html>
