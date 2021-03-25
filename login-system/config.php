<?php
    //Connexion à la base de donnée
    function bd_connect() {
            try 
        {
            $bdd = new PDO('mysql:host=localhost;dbname=ogites2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd;
        } 
        catch(Exeption $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Connexion à la base de données
    global $pdo;
    $pdo = bd_connect();
    
    // Chemin du dossier
    global $root;
    $root = 'localhost/ogites2';

    //Récupérer les gîtes en fonction de la ville
    function getGitesByVille($ville) {
        global $pdo;
        $query = "SELECT * FROM gites WHERE localisation = '$ville'";

        return $query;
    }

    //Récupérer tous les gîtes
    function getAllGites() {
        global $pdo;
        $query = 'SELECT * FROM gites';
        return $query;
    }

    function header_page($onglet) 
    {
        global $root;

        /*
        Fonction permettant d'ajouter le header en fonction du paramètre
        Liste des différents cas :
            0 : La page n'est pas dans le header
            1 : Page d'accueil (première page dans le header)
            2 : Page de présentation (deuixième page dans le header)
            3 : Page A propos (troisième page dans le header)
        */
    ?>
        <header>
      	    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            	<strong><a class="navbar-brand" href="/ogites2/index.php">Ô'GÎTES</a></strong>
            	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
              		aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              	    <span class="navbar-toggler-icon"></span>
            	</button>
            	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
              		<ul class="navbar-nav ml-auto">
                        <?php
                        switch ($onglet)
                        {
                            // Page non dans le header
                            case 0:
                                ?>
                                <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                                <?php
                                if (!isset($_SESSION['id_users']))
                                {
                                ?>
                		        <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                                }
                            break;

                            // Accueil
                            case 1:
                                ?>
                                <li class="nav-item active">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                                <?php
                                if (!isset($_SESSION['id_users']))
                                {
                                ?>
                		        <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                                }
                            break;
                            
                            // Présentation
                            case 2:
                                ?>
                                <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                                <?php
                                if (!isset($_SESSION['id_users']))
                                {
                                ?>
                		        <li class="nav-item active">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                                }
                            break;
                            
                            // À propos
                            case 3:
                                ?>
                                <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                                <?php
                                if (!isset($_SESSION['id_users']))
                                {
                                ?>
                		        <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item active">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                                }
                            break;
                        }
                        // Si l'utilisateur est connecté
                		if (isset($_SESSION['id_users']) AND isset($_SESSION['pseudo']))
                		{
                        ?>
                        
                        <?php
                        //echo $_SESSION["id_categorie"];
                        switch ($_SESSION['id_categorie'])
                        {
                            // Si l'utilisateur est un admin
                            case 1:
                        ?>
                            <li class="nav-item" >
                                <a class="nav-link" href="/ogites2/admin/index.php">Espace Admin</a>
                            </li>
                        <?php
                            break;

                            // Si l'utilisateur est un proprio
                            case 3:
                        ?>
                            <li class="nav-item" >
                                <a class="nav-link" href="/ogites2/proprio/index.php">Espace Proprio</a>
                            </li>
                        <?php
                            break;
                        }
                        ?>
                        <li class="nav-item">
                            <a href="/ogites2/all_reservation.php" class="nav-link">Mes réservations</a>
                        </li>
                        <li class="nav-item">
    	    				<a class="nav-link" href="/ogites2/login-system/param.php">Mon compte</a>
                		</li>
                        <?php
                        if ($_SESSION["id_categorie"] == 2){
                            $SQLParam = "SELECT * FROM messages WHERE"
                            . " destinataire = " . $_SESSION['id_users'] . " ORDER BY id_message DESC LIMIT 1";
                            //echo $SQLParam;
                            $response = requete($SQLParam);

                            if ($response["etat_message"] == 1)
                            {
                        ?>
                            <li class="nav-item">
                                <a href="/ogites2/messagerie.php" class="nav-link"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        <?php
                            } 
                            else 
                            {
                            ?>
                            <li class="nav-item">
                                <a href="/ogites2/messagerie.php" class="nav-link"><i class="fa fa-envelope"></i></a>
                            </li>
                            <span class='badge' style='width: 10px;height: 10px;border-radius: 10px;background:#F02F0C;color:#fff;' id='notifier-btn'> </span>
                            <?php
                            }
                        }
                            if ($_SESSION["id_users"] == 2)
                            {
                        ?>
                            <li class="nav-item">
                                <a href="#" class="btn btn-primary" id="notifier-btn">Devenir propriétaire</a>
                            </li>
                            <script>
                            document.getElementById("notifier-btn").onclick = notifier;

                            /* Quand le document sera chargé */
                            document.addEventListener('DOMContentLoaded', function () {
                            
                                /* Vérifie si le navigateur est compatible avec les notifications */
                                if (!Notification) {
                                    alert('Le navigateur ne supporte pas les notifications.');
                                }
                                /* Si le navigateur prend en charge les notifications,
                                on demande la permission si les notifications ne sont pas permises */
                                    else if (Notification.permission !== 'granted')
                                        Notification.requestPermission();
                            });
                        
                        
                            function notifier() {
                                /* On demande la permission si les notifications ne sont pas permises */
                                if (Notification.permission !== 'granted')
                                    Notification.requestPermission();
                                else {
                                    
                                    // Affichage du message avec le logo de l'application
                                    var notification = new Notification('OGÎTES TEAM', {
                                        icon: '/ogites2/images/new-logo.png',
                                        body: 'Les administrateurs vont bientôt vous recontacter !',
                                        //image: "",
                                    });
                                    
                                    // Redirection vers la page de gestion des réservations
                                    notification.onclick = function () {
                                        window.open("index.php")
                                    
                                    };
                                
                                    // Disparition de la notification au bout de 5 sec
                                    notification.onshow = function () {
                                        setTimeout(notification.close.bind(notification), 5000);
                                    }
                                
                                }
                            }
                        </script>
                        <?php
                            }
                        ?>
                		<li class="nav-item">
    	    				<a class="nav-link" href="/ogites2/login-system/deconnexion.php"><i class="fa fa-sign-out"></i></a>
                		</li>
                		<?php
                		}
                		else
                		{
                		?>
                		<li class="nav-item">
                		  	<a class="nav-link btn btn-success" href="/ogites2/login-system/connexion.php"><i class="fa fa-sign-in" style="color:white;"></i> <span style="color:white;">Connexion</span></a>
                		</li>
                		<?php
                		}
                		?>
              		</ul>
            	</div>
      	    </nav>
    </header>
    <?php
    }

    /**
    * Fonction de conversion de date du format am�ricain (AAAA-MM-JJ) ver le format fran�ais (JJ/MM/AAAA).
    * @param string $date Date au format am�ricain (AAAA-MM-JJ)
    * @return string Date au format fran�ais (JJ/MM/AAAA)
    */
    function dateFR($date)
    {
      $date = explode('-', $date);
      $date = array_reverse($date);
      $date = implode('/', $date);
      return $date;
    }

    /**
    * Fonction de conversion de date du format fran�ais (JJ/MM/AAAA) ver le format am�ricain (AAAA-MM-JJ).
    * @param string $date Date au format fran�ais (JJ/MM/AAAA)
    * @return string Date au format am�ricain (AAAA-MM-JJ)
    */
    function dateUS($date)
    {
      $date = explode('/', $date);
      $date = array_reverse($date);
      $date = implode('-', $date);
    
      return $date;
    }

    function get_date($date)
     {
        $TableJour = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $TableMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre','Novembre', 'Décembre');
		$tdate=array(0,0,0,0);
		//v�rification de la date et formattage en fran�ais 
		if (!empty($date))
		{
		//format français jj/mm/aaaa
		if (substr($date, 8 , 2 )=="/")
		{
		$j= substr($date, 0 , 2 );
		$m= substr($date, 3 , 2 );
		$a= substr($date, 5 , 4 );
		
		}
		if (substr($date, 8 , 2 )!="/")
			{
				//formattage en anglais aaaa-mm-jj
			$j     = substr($date, 8 , 2 );
			$m     = substr($date, 5 , 2 );
			$a    = substr($date, 0 , 4 );
				
			}
		
		$i=$j;
		if ($j=="1"){$j="1er";}
		$var=$TableJour[date("w", mktime(0,0,0,$m,$i,$a))]." ".$j." ".$TableMois[$m-1]." ".$a;
		
		}
		else
		{
		 	$j=date('j');
			if ($j=="1"){$j="1er";}
			$var=$TableJour[date('w')].' '.$j.' '.$TableMois[date('n')-1]." ".date('Y');
		}
	    $var=convert_html($var);
        return ($var);
    }

        function convert_html($text)
    {
    	$special_chars=array("�");
    
    
    	$special_chars = array( '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '/', '&#039;',"'");
    
    	$normal_chars  = array( 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i', 'O', 'O', 'O', 'O', 'O', 'O', 'o', 'o', 'o', 'o', 'o', 'o', 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'B', 'C', 'c', 'D', 'd', 'N', 'n', 'P', 'p', 'Y', '-', '-',"-");
    
    		$text = stripslashes($text);
    	$text = str_replace("�", "&eacute;", $text);
    	$text = str_replace("é","e", $text);
    	$text = str_replace("�", "&Eacute;", $text);
    	$text = str_replace("�", "&egrave;", $text);
    	$text = str_replace("�", "&agrave;", $text);
    	$text = str_replace("�", "&ugrave;", $text);
    	$text = str_replace("�", "&ecirc;", $text);
    	$text = str_replace("�", "&acirc;", $text);
    	$text = str_replace("�", "&ucirc;", $text);
    	$text = str_replace("�", "&ocirc;", $text);
    	$text = str_replace("�", "&icirc;", $text);
    	$text = str_replace("�", "&euml;", $text);
    	$text = str_replace("�", "&ccedil;", $text);
    	$text = str_replace("�", "&rsquo;", $text);
    	$text = str_replace("'", "&rsquo;", $text);
    	$text = str_replace("�", "&euro;", $text);
    	$text = str_replace("�", "&iuml;", $text);
    	return $text;
    }
    
    /**
     * Fonction permettant de réduire la taille d'un texte
     * en fonction de la taille entrée en paramètre
     */
    function reduceText($texte, $taille)
    {
        return (strlen($texte) > $taille) ? substr($texte, 0, $taille) . "..." : $texte;
        
    }

    /**
     * Fonction permettant d'envoyer un message à un autre utilisateur
     */
    function sendMessage($expediteur, $destinataire, $contenu)
    {
        global $pdo;

        $SQLParam = "INSERT INTO messages (expediteur, destinataire, contenu, type_message)"
        . " VALUES ('$expediteur', '$destinataire', '$contenu', '2')";
        $response = requete($SQLParam);
    }

    /**
     * Fonction qui retourne le nombre total de gîtes enregistrés dans la base de données
     */
    function showTotalGites()
    {
        global $pdo;

        $response = requete("SELECT COUNT(*) as totalGites FROM gites");
        return $response["totalGites"];
    }

    /**
     * Fonction qui retourne le nombre de gîtes créé par un utilisateur
     */
    function nbTotalGitesByCreator($createur)
    {
        global $pdo;

        $SQLParam = "SELECT COUNT(*) as nbGitesCreate FROM gites WHERE createur = $createur";
        $response = requete($SQLParam);
        return $response["nbGitesCreate"];
    }

    /**
     * Fonction qui retourne le nombre total de réservations enregistrées dans la base de données
     */
    function showTotalReserv()
    {
        global $pdo;

        $response = requete("SELECT COUNT(*) as totalReserv FROM reservation");
        return $response["totalReserv"];
    }

    /**
     * Fonction qui retourne à un proprétaire le nombre total de réservations de ses gîtes
     */
    function showTotalReservByCreator($createur)
    {
        global $pdo;

        $SQLParam = "SELECT COUNT(*) as totalReserv FROM reservation as P1"
        . " LEFT JOIN gites as P2 ON P1.id_gites = P2.id_gites"
        . " WHERE P2.createur = $createur";
        $response = requete($SQLParam);
        return $response["totalReserv"];
    }

    /**
     * Fonction qui retourne le nombre total de réservations actives
     */
    function showTotalActiveReserv()
    {
        global $pdo;

        $SQLParam = "SELECT COUNT(*) as totalActiveReserv FROM reservation"
        . " WHERE etat_reservation = 0";
        $response = requete($SQLParam);
    }

    /**
     * Fonction qui retourne à un propriétaire le nombre de réservations actives de ses gîtes
     */
    function showTotalActiveReservByCreator($createur)
    {
        global $pdo;

        $SQLParam = "SELECT COUNT(*) as totalReservActive FROM reservation as P1"
        . " LEFT JOIN gites as P2 ON P1.id_gites = P2.id_gites"
        . " WHERE P2.createur = $createur AND etat_reservation = 0";
        $response = requete($SQLParam);
        return $response["totalReservActive"];
    }

    /**
     * Fonction qui retourne le nombre total d'utilisateurs enregistrés dans la base de données
     */
    function showTotalUsers()
    {
        global $pdo;

        $response = requete("SELECT COUNT(*) as totalUsers FROM users");
        return $response["totalUsers"];
    }

    /**
     * Fonction permettant d'effectuer des requêtes plus simplement
     */
    function requete($requete)
    {
        global $pdo;

        // Définition du type de requête
        $def_type = explode(" ", $requete);
        $type_req = $def_type[0];
        // Si c'est une SELECT
        if ($type_req == "SELECT")
        {
            $Myresult = $pdo->query($requete);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            $response = $Myresult->fetch();

            return $response;
        }
        // Si c'est autre chose qu'une SELECT
        else {
            $response = $pdo->exec($requete);
        }
    }

    /**
     * Fonction qui retourne le résultat d'une requête à fetch pour une boucle
     */
    function toFetch($requete)
    {
        global $pdo;

        $Myresult = $pdo->query($requete);
        $Myresult->setFetchMode(PDO::FETCH_ASSOC);
        return $Myresult;
    }
    /**
     * Fonction qui retourne le nombre de résultat d'une requête
     */
    function toCount($requete)
    {
        global $pdo;

        $Myresult = toFetch($requete);
        $nb_result = $Myresult->rowCount();
        return $nb_result;
    }

    /**
     * Fonction qui permet d'ajouter une connexion au journal de connexion
     */
    function addLogConnection($id_users)
    {
        global $pdo;

        $SQLParam = "INSERT INTO connexion_log (id_users) VALUES ($id_users)";
        $Myresult = requete($SQLParam);
    }

    /**
     * Fonction permettant de changer la catégorie d'un utilisateur
     */
    function change_categ($categorie, $id_users)
    {
        global $pdo, $id_users;

        switch ($categorie)
        {
            // Changer en admin
            case "admin":
                requete("UPDATE users SET id_categorie = 1 WHERE id_users = $id_users");
            break;

            // Changer en client
            case "client":
                requete("UPDATE users SET id_categorie = 2 WHERE id_users = $id_users");
            break;

            // Changer en proprio
            case "proprio":
                requete("UPDATE users SET id_categorie = 3 WHERE id_users = $id_users");
            break;
        }
    }

     /**
     * Fonction retournant la dernière réservation d'un gîte
     */
    function lastReserv($id_gites)
    {
        $SQLParam = "SELECT * FROM reservation WHERE id_gites = $id_gites ORDER BY id_reservation DESC LIMIT 1";
        $lastReserv = requete($SQLParam);
        return $lastReserv;
    }

    /**
     * Fonction qui permet de verifer des choses
     */
    function verif($type)
    {
        global $pdo, $nom, $prenom, $pseudo, $email, $tel, $mdp, $erreurMessage, $id_gites;

        switch($type) 
        {
            case "inscription": // Verification à l'inscription
        
                // Vérifier si le pseudo existe déjà
                $SQLParam = "SELECT pseudo FROM users WHERE pseudo = '$pseudo' ";
                $info_pseudo = toCount($SQLParam);
                if ($info_pseudo != 0) // Si le pseudo existe
                {
                    $erreurMessage = "Ce pseudo est déja utilisé. Veuillez en choisir un autre.";
                    return false;
                } 
                else // S'il n'existe pas
                {
                    // Vérification de l'email
                    $SQLParam2 = "SELECT email FROM users WHERE email = '$email' ";
                    $info_mail = toCount($SQLParam2);
                    if ($info_mail != 0) // Si le mail existe
                    {
                        $erreurMessage = "Cette adresse e-mail est déja utilisée. Veuillez en choisir une autre.";
                        return false;
                    } 
                    else // Si l'email n'existe pas
                    {
                        //Insertion d'un client (requete SQL INSERT) 
                        $insererUnClient = $pdo->prepare("INSERT INTO users(pseudo, nom, prenom, email, tel, mdp, date_inscription, id_categorie) VALUES(?, ?, ?, ?, ?, ?, CURDATE(), 2)");
                        $insererUnClient->execute(array(
                            $pseudo,
                            $nom,
                            $prenom,
                            $email,
                            $tel,
                            $mdp
                        ));
                        return true;
                    }
                }
            break;

            case "reservation": // Vérification à la réservation
                global $pdo, $id_gites, $date_debut, $date_fin;
                // Récuperer la dernière réservation
                $lastReserv = lastReserv($id_gites);
                // Récupérer les dernières dates
                $lastDate_debut = $lastReserv["date_debut"];
                $lastDate_fin = $lastReserv["date_fin"];
                if (isset($lastDate_debut))
                {
                    // Vérifier que la date est disponible
                    $SQLParam4 = "SELECT * FROM reservation WHERE $date_debut BETWEEN $lastDate_debut AND $lastDate_fin";
                    //echo $SQLParam4;

                    $verif = toCount($SQLParam4);
                    if ($verif > 0)
                    {
                        $erreurMessage = "Ce gîte n'est pas disponible durant cette période.";
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
                else
                {
                    return true;
                }
                
                

            break;
        }
    }

   

    /**
     * Fonction permettant de valider une reservation
     */
    function valideReserv($id_reserv)
    {
        global $pdo;

        requete("UPDATE reservation SET etat_reservation = 1 WHERE id_reservation = $id_reserv");
    }

    /**
     * Fonction permettant de marquer un message comme vu
     */
    function valideMessage($id_message)
    {
        global $pdo;

        requete("UPDATE messages SET etat_message = 1 WHERE id_message = $id_message");
    }
?>

