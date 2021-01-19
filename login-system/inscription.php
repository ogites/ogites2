<?php
/*
    Script d'inscription au site
*/
//  Lien avec la base de donnée
require_once 'config.php';

if(isset($_POST['submit']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);

    //Chiffrage du mot de passe
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $mdp_confirm = password_hash($_POST['mdp_confirm'], PASSWORD_DEFAULT);

    //Définir la date
    date_default_timezone_set('America/Guadeloupe');
    
    //Verification des champs
    if((!empty($pseudo)) && (!empty($nom)) && (!empty($prenom)) && (!empty($email)) && (!empty($mdp)) && (!empty($mdp_confirm))) 
    {
        //Vérification du pseudo
        if(strlen($pseudo) > 1 AND strlen($pseudo) <= 20)
        {
            //Vérification de l'email
            if (preg_match("!^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$!", $email)) 
            {
                //Verification du mot de passe 
                if($_POST['mdp'] == $_POST['mdp_confirm']) 
                {
                    //Insertion
                    $database = bd_connect();
                    $insererUnClient = $database->prepare("INSERT INTO users(pseudo, nom, prenom, email, mdp, date_inscription, id_categorie) VALUES(?, ?, ?, ?, ?, CURDATE(), 2)");
                    $insererUnClient->execute(array(
                        $pseudo,
                        $nom,
                        $prenom,
                        $email,
                        $mdp
                    ));
                    $messageReussi = "Vous êtes bien inscrit";
                    header('refresh:3; url=connexion.php');
                } 
                else 
                {
                    $erreurMessage = "Mauvais mot de passe. Réessayer !";
                }
            } 
            else 
            {
                $erreurMessage = "Votre adresse mail n'est pas valide. Réessayer !";
            }
        } 
        else 
        {
            $erreurMessage = "Votre pseudo doit être compris entre 0 et 15 caractère";
        }
    } 
    else 
    {
        $erreurMessage = "Veuillez remplir tous les champs";
    }
}
?>

<link rel="stylesheet" type="text/css" href="../style.css"/>
<link rel="stylesheet" type="text/css" href="../scss/register.scss"/>
<script src="https://kit.fontawesome.com/a076d05399.js"> </script>

<body>
    <div class="container">

        <div class="logo">
            <i class="fas fa-user"></i>
        </div>

        <div class="tab-body" id="titre">
            <h2>PAS ENCORE INSCRIT ?</h2>
            <h3>N'attendez plus ! Réservez en créant votre compte</h3>
        </div>

        <div class="tab-body-message1" id="message">
            <h4>
                    <?php 
                        if(isset($erreurMessage)) 
                        { 
                            echo '<p style="
                            margin-bottom: 0px;
                            margin-right: 10px;
                            margin-left: 10px;
                            margin-top: 10px;"> ' . $erreurMessage . ' </p>';
                        } 
                    ?>
            </h4>            
        </div>

        <div class="tab-body-message2" id="message">
            <h4>
                    <?php 
                        if(isset($messageReussi)) 
                        { 
                            echo '<p style="
                            margin-bottom: 0px;
                            margin-right: 10px;
                            margin-left: 10px;
                            margin-top: 10px;"> ' . $messageReussi . ' </p>';
                        } 
                    ?>
            </h4>            
        </div>

        <div class="tab-other-body" id="inscription">
            <form method="post">

                <div class="ligne">
                    <i class="fas fa-user"></i>
                    <input type="text" class="input" name="pseudo" placeholder="Pseudo" />
                </div>

                <div class="ligne">
                    <i class="fas fa-portrait"></i>
                    <input type="text" class="input" name="nom" placeholder="Nom de famille" />
                </div>

                <div class="ligne">
                    <i class="fas fa-portrait"></i>
                    <input type="text" class="input" name="prenom" placeholder="Prénom" />
                </div>

                <div class="ligne">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="input" name="email" placeholder="Adresse mail" />
                </div>

                <div class="ligne">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" name="mdp" placeholder="Mot de passe" />
                </div>

                <div class="ligne">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" name="mdp_confirm" placeholder="Confirmation de mot de passe" />
                </div>

                <input type="submit" name="submit" value="Créer un compte" />
                        
            </form>
        </div>

    </div>
</body>

