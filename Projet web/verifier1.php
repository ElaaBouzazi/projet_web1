<?php
include('autoload.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cv = new CV();
    $cv->verifier1_mail(htmlspecialchars($_POST['mail']));
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification E-mail</title>
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

<body>
    <div class="container">
        <h1>Entrez votre adresse e-mail</h1>
        <form action="" method="post">
            <label for="mail">E-mail:</label><br>
            <input type="email" name="mail" placeholder="example@expmail.com" required><br>
            <input type="submit" value="modifier le cv">
        </form>
    </div>
</body>

</html>
