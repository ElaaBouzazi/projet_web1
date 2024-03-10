<?php
include('autoload.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv = new CV();
    $cv->verifier_mail(htmlspecialchars($_POST['mail']));
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur d'un cv</title>
    <style>
  <style> 
body {
  display: grid;
  place-items: center;
  height: 100vh;
}

.container {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-gap: 10px;
  width: 60%;
  max-width: 800px;
}

h1 {
  grid-area: 1 / 1;
}

form {
  grid-area: 2 / 1;
}

p {
  grid-area: 3 / 1;
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
h3 {
  color: #333;
  text-align:left;
}
input[type="submit"]:hover {
  background-color: #45a049;
}

        </style>
</head>

<body>
  <?php
 if (isset($errorMessage)) {
        echo "<p>$errorMessage</p>";
    }
    ?>
<div class="container">
    <h1>Bienvenue sur notre site de création de CV</h1>
    <h3>
      C'est votre premier pas sur notre site ?
      <a href="insertion.php">Cliquez ici pour créer votre CV</a>.
  </h3>

    
    <h3>Si vous avez déjà créé votre CV au préalable :</h">
    <div class="container">
        <h2>Entrez votre adresse e-mail</h2>
        <form action="" method="post">
            <label for="mail">E-mail:</label><br>
            <input type="email" name="mail" placeholder="example@expmail.com" required><br>
            <input type="submit" value="Vérifier l'e-mail">
        </form>
    </div>
    <div class="container">
    <p>
      Si vous souhaitez modifier votre CV, cliquez ici :
      <a href="verifier1.php">Modifier mon CV</a>
    </p>
  </div> 
  <div class="container">
    <p>
      Si vous souhaitez supprimer votre CV, cliquez ici :
      <a href="supression.php">Supprimer mon CV</a>
    </p>
  </div> 
</body>

</html>
