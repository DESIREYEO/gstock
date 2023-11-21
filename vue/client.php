<?php
include 'header.php';
if(!empty($_GET['id'])){
  $client = getClient ($_GET['id']);
}
?>

<div class="home-content">
        <div class="overview-boxes">
          <div class="box">
           <form action="<?= !empty($_GET['id']) ? "../model/modifClient.php" : "../model/ajoutClient.php" ?>" method="POST">
           <input value="<?= !empty($_GET['id']) ? $client['id'] : "" ?>" type="hidden" id="id" name="id">

           <label for="nom">Nom</label>
           <input value="<?= !empty($_GET['id']) ? $client['nom'] : "" ?>" type="text" id="nom" name="nom" placeholder="Veuillez saisir le nom">

           <label for="prenom">Prénom</label>
           <input value="<?= !empty($_GET['id']) ? $client['prenom'] : "" ?>" type="text" id="prenom" name="prenom" placeholder="Veuillez saisir le prénom">


           <label for="telephone">N° de Téléphone</label>
           <input value="<?= !empty($_GET['id']) ? $client['telephone'] : "" ?>"type="text" id="telephone" name="telephone" placeholder="Veuillez le n° de téléphone">

           <label for="adresse">Adresse</label>
           <input value="<?= !empty($_GET['id']) ? $client['adresse'] : "" ?>"type="text" id="adresse" name="adresse" placeholder="Veuillez l'adresse">

           <button type="submit">Valider</button>
            
           <?php
if (!empty($_SESSION['message']['text'])){
?>
<div class= "alert <?= $_SESSION['message']['type'] ?>"> 
<?= $_SESSION['message']['text']?>
</div>
<?php
}
?>
             </form>
             
          </div>

          <div class="box">
            <table class="mtable">
              <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>N° téléphone</th>
                <th>Adresse</th>
                <th>Action</th>

              </tr>
                <?php
                $clients = getClient();
                
                if(!empty($clients) AND is_array($clients)){
                    foreach($clients as $key => $value){
                      ?>
                      <tr>
                        <td><?= $value['nom']?></td>
                        <td><?= $value['prenom']?></td>
                        <td><?= $value['telephone']?></td>
                        <td><?= $value['adresse']?></td>
                        <td><a href="?id=<?= $value['id']?>"><i class='bx bx-edit-alt'></i></a></td>
                      </tr>
                      <?php
                    }
                }
                
                ?>
            </table>

          </div>
          
    </section>

    <?php
    include 'footer.php';
    ?>