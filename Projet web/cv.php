<?php
class CV extends base_donnees
{
   
     public function verifier1_mail($email)
    {
        try {
            $requete = "SELECT * FROM cv_info.donnees WHERE mail = ?";
            $resultat = $this->connect->prepare($requete);
            $resultat->execute([$email]);

            if ($resultat->rowCount() > 0) {
                // stockage des données dans la session
                $row = $resultat->fetch(PDO::FETCH_ASSOC);
                $_SESSION['fname'] = $row['nom'];
                $_SESSION['lname'] = $row['prenom'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['tel'] = $row['tel'];
                $_SESSION['add'] = $row['addr'];
                $_SESSION['media'] = $row['media'];
                $_SESSION['parcour'] = $row['parcour'];
                $_SESSION['experience'] = $row['experience'];
                $_SESSION['skill'] = $row['skill'];
                $_SESSION['langu'] = $row['langu'];
                header("location: modifier1.php");
                exit();
            } else {
                
                echo "E_mail inexistant, veuillez créer un CV d'abord <br>  <a href='insertion.php'> en cliquant ici</a>";
               
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function verifier_mail($email)
    {
        try {
            $requete = "SELECT * FROM cv_info.donnees WHERE mail = ?";
            $resultat = $this->connect->prepare($requete);
            $resultat->execute([$email]);

            if ($resultat->rowCount() > 0) {
                $row = $resultat->fetch(PDO::FETCH_ASSOC);
                $_SESSION['fname'] = $row['nom'];
                $_SESSION['lname'] = $row['prenom'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['tel'] = $row['tel'];
                $_SESSION['add'] = $row['addr'];
                $_SESSION['media'] = $row['media'];
                $_SESSION['parcour'] = $row['parcour'];
                $_SESSION['experience'] = $row['experience'];
                $_SESSION['skill'] = $row['skill'];
                $_SESSION['langu'] = $row['langu'];

                header("location: affichage.php");
                exit();
            } else {
               //utilisateur n'existe pas
               
               echo "e_mail inexistant, veuillez créer un CV d'abord <a href='insertion.php'>en cliquant ici</a>";
              
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function affichage_CV()
    {
        // Vérifiez si les variables de session existent avant de les utiliser
        $nom = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
        $prenom = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "";
        $email = isset($_SESSION["mail"]) ? $_SESSION["mail"] : "";
        $telephone = isset($_SESSION["tel"]) ? $_SESSION["tel"] : "";
        $adresse = isset($_SESSION["add"]) ? $_SESSION["add"] : "";
        $media = isset($_SESSION["media"]) ? $_SESSION["media"] : "";
        $parcour = isset($_SESSION["parcour"]) ? $_SESSION["parcour"] : "";
        $skill = isset($_SESSION["skill"]) ? $_SESSION["skill"] : "";
        $experiences = isset($_SESSION["experience"]) ? $_SESSION["experience"] : "";
        $langu = isset($_SESSION["langu"]) ? $_SESSION["langu"] : "";

        // HTML de l'affichage
        echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width ; initial-scale=1.0'>
            <title>Votre CV - $nom $prenom</title>
            <link rel='stylesheet' href='style_affichage.css'>
        </head>
        <body>
            <header>
                <h1>Votre CV</h1>
            </header>
            <section class='contact'>
                <h2>Informations personnelles</h2>
                <ul>
                    <li><strong>Nom : </strong> $nom</li>
                    <li><strong>Prénom : </strong> $prenom</li>
                    <li><strong>Email : </strong> $email</li>
                    <li><strong>Téléphone : </strong> $telephone</li>
                    <li><strong>Adresse : </strong> $adresse</li>
                    <li><strong>Liens réseaux sociaux : </strong> $media</li>
                </ul>
            </section>
            <section class='parcours'>
                <h2>Parcours académique</h2>
                <p>$parcour</p>
            </section>
            <section class='experiences'>
                <h2>Expériences professionnelles</h2>
                <ul>
                    $experiences
                </ul>
            </section>
            <section class='competences'>
                <h2>Compétences</h2>
                <ul>
                    <li><strong>Soft skills : </strong> $skill</li>
                    <li><strong>Langues : </strong> $langu</li>
                </ul>
            </section>
            <a href='verification.php'>Retour a la page d'acceuil</a>
            </form>
        </body>
        </html>
        ";
    }
  
    public function mail_exist($email)
    {
        $requete = "SELECT COUNT(*) FROM cv_info.donnees WHERE mail = ?";
        $resultat = $this->connect->prepare($requete);
        $resultat->execute([$email]);
        $count = $resultat->fetchColumn();
       return $count > 0;
       
        
           
    }
    public function inserer_donnees($fname, $lname, $mail, $tel, $addr, $media, $parcour, $experience, $skill, $langu)
    { 
        try { if ($this->mail_exist($mail)) {
        $Message_erreur = "L'e-mail '$mail' existe déjà. Veuillez utiliser un autre e-mail.";
        echo $Message_erreur;
    }
            $requete = "INSERT INTO cv_info.donnees (nom, prenom, mail, tel, addr, media, parcour, experience, skill, langu) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insererdonnees = $this->connect->prepare($requete);
            $insererdonnees->execute([$fname, $lname, $mail, $tel, $addr, $media, $parcour, $experience, $skill, $langu]);

            // Stockage des données dans la session
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['mail'] = $mail;
            $_SESSION['tel'] = $tel;
            $_SESSION['addr'] = $addr;
            $_SESSION['media'] = $media;
            $_SESSION['parcour'] = $parcour;
            $_SESSION['experience'] = $experience;
            $_SESSION['skill'] = $skill;
            $_SESSION['langu'] = $langu;

            header("location:affichage.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}

?>