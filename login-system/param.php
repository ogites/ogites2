<?php 
    require_once '../head.php';
    session_start();
    require_once 'config.php';
    header_page(0);
?>

<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
        
		<div class="container">
        <div class="row">
            
            <div class="col-4">
                <table class="table table-striped">
                    <style>
                        td a:focus,
                        td a {
                            display: block;
                            text-decoration: none;
                            color: black;
                        }
                        td a:hover{
                            text-decoration: none;
                            color: #1ABC9C;
                            font-weight: bold;
                        }
                        
                        th a {
                            display: block;
                            text-decoration: none;
                            color: black;
                        }
                        th a:hover{
                            display: block;
                            text-decoration: none;
                            color: black;
                        }
                    </style>
                    <thead>
                        <tr>
                            <th><h3><center><a href="param.php">Paramètre</a></center></h3></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td><a href="info.php">Mes informations personnelles</a></td>
                        </tr>
                        <tr>
                            <td><a href="change_pass.php">Changer de mot de passe</a></td>
                        </tr>

                    </tbody>
                </table>
            </div>
           
            <div class="col-8">
               <h2>
                <center>Bienvenue sur Ô'gîtes <br> 
                <br>
                <?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?>
                </center>
               </h2>

               
            </div>
            
        </div>
       
        
	</div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>
