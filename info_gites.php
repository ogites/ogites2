<?php  
  // Ajout du header
  require_once 'head.php';
  // Initialisation de la session
  session_start(); 
  // Navbar de la page de résultat
  header_page(0);

  if(isset($_REQUEST["id_gites"])){
    $id_gites = $_REQUEST["id_gites"];
  }

  $sql_gite = "select * from gites where id_gites = $id_gites";
  $Myresult = $pdo->query($sql_gite);
  $Myresult->setFetchMode(PDO::FETCH_ASSOC);
  $Allgite = $Myresult->fetch();

?>



<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
    <!--Bouton retour-->
    <a href="view_gites.php?query=all" class="btn btn-info btn-lg" style="float: right;">RETOUR</a>
		<center>
      <!-- Headline -->
      <h2><?php echo $Allgite["libelle"]; ?></h2>
    </center>
    <br>
		<div class="container">
      <div class="row">
        <?php

          $sql_image_gite = "select * from images_gites where id_gites = $id_gites";
          $Myresult2 = $pdo->query($sql_image_gite);
          $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
          $image_gites = $Myresult2->fetch();

          $image_link = $image_gites["link_url"];
        ?>
        <!-- Image du gite -->
        <img src="<?php echo $image_link; ?>" alt="image-gite" style="height:450px; box-shadow: 1px 1px 12px #555;">
         
        <!-- info sur le gite -->
        <div class="col-sm-4">
          <?php echo $Allgite["description"]; ?>
          <br><br>
          Localisation : <br>
          <?php echo $Allgite["localisation"]; ?>
          <br><br>
          <!-- Lien vers le site pour voir le gite -->
          <a target="_blank" href="<?php echo $Allgite["link_url"] ?>" class="btn btn-warning" style="color: white;">Voir plus</a>  
          <br><br><br>

          <table class="table table-success">
            <tr>
              <th>
                <center>
                  <i class="fa fa-info-circle"></i> Pour réserver, remplir les champs suivants :
                </center>
              </th>
            </tr>
          </table>
          <!-- Formulaire pour réserver un gite -->
          <form action="reserv_gite.php?id_gites=<?php echo $id_gites; ?>" method="post">
            <div class="form-group row">
              <label class="col-4 col-form-label">Date d'arrivée</label>
              <div class="col-6">
                <input type="date" name="date_debut">
                
              </div>
              <br><br>
              <label class="col-4 col-form-label">Date de départ</label>
              <div class="col-6">
              <input type="date" name="date_fin">
              </div>
            </div>
            <?php 
              $sql = "select * from gites where id_gites = $id_gites";
              $result = $pdo->query($sql);
              $result->setFetchMode(PDO::FETCH_ASSOC);
              while($info = $result->fetch()){
                $nb_personne_max = $info["nb_personnes_max"];
            ?>
            <i class="fa fa-users"></i> Choisir un nombre de personnes :
            <select name="selectPersonne" class="ui dropdown" id="select">
              <?php 
                for($i = 1; $i <= $nb_personne_max; $i++){
              ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?> personnes</option>
              <?php } ?>
            </select>
            <?php 
              }
            ?>
            <br><br>
            <input type="submit" value="Réserver" class="btn btn-outline-success btn-sm">
          </form>
        </div>

      </div>
		</div>
  </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>