<?php
include('autoload.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv = new CV();
    $cv->inserer_donnees(
        htmlspecialchars($_POST['fname']),
        htmlspecialchars($_POST['lname']),
        htmlspecialchars($_POST['mail']),
        htmlspecialchars($_POST['tel']),
        htmlspecialchars($_POST['add']),
        htmlspecialchars($_POST['media']),
        htmlspecialchars($_POST['parcour']),
        htmlspecialchars($_POST['experience']),
        htmlspecialchars($_POST['skill']),
        htmlspecialchars($_POST['langu'])
    );
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire CV</title>
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
input[type="email"],
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

.submit-button {
    background-color: #4CAF50;
  color: #fff;
    padding: 10px 20px;
    border: 1px solid #000;
    border-radius: 5px;
    cursor: pointer;
}

.submit-button:hover {
    background-color: #45a049;
}
</style>



</head>

<body>
    <h1>Veuillez saisir vos données </h1>

    <form action="" method="post" class="contact-form">
        <h4>Informations personnelles</h4>
        <div class="form-group">
            <label for="fname">Nom :</label>
            <input type="text" name="fname" id="fname"  required>
        </div>
        <div class="form-group">
            <label for="lname">Prénom :</label>
            <input type="text" name="lname" id="lname"  required>
        </div>
        <div class="form-group">
            <label for="mail">E-mail :</label>
            <input type="email" name="mail" id="mail"  placeholder="example@expmail.com" required>
        </div>
        <div class="form-group">
            <label for="tel">Numéro de téléphone :</label>
            <input type="tel" name="tel" id="tel"  required>
        </div>
        <div class="form-group">
            <label for="add">Adresse :</label>
            <input type="text" name="add" id="add" required>
        </div>
        <div class="form-group">
            <label for="media">Liens réseaux sociaux :</label>
            <input type="text" name="media" id="media"  required>
        </div>
        <div class="form-group">
            <label for="parcour">Parcours académique :</label>
            <textarea name="parcour" id="parcour"  required></textarea>
        </div>
        <div class="form-group">
            <label for="experience">Expérience(s) professionnelle(s) :</label>
            <textarea name="experience" id= "experience" required></textarea>
        </div>
        <div class="form-group">
            <label for="skill">Soft skills :</label>
            <textarea name="skill"  id="skill"required></textarea>
        </div>
        <div class="form-group">
            <label for="langu">Langues :</label>
            <textarea name="langu" id="langu"  required></textarea>
        </div>
        <input type="submit" value="créer mon cv" class="submit-button">
    </form>
</body>
</html>

</body>

</html>
