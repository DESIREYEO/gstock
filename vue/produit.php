<?php
include 'header.php';
if(!empty($_GET['id'])){
  $produit = getProduit ($_GET['id']);
}
?>

<div class="home-content">
        <div class="overview-boxes">
          <div class="box">
           <form action="<?= !empty($_GET['id']) ? "../model/modifProduit.php" : "../model/ajoutProduit.php" ?>" method="POST">
           <label for="nom_article">Nom de l'article:</label>
           <input value="<?= !empty($_GET['id']) ? $produit['nom_article'] : "" ?>" type="text" id="nom_article" name="nom_article" placeholder="Veuillez saisir le nom">
           <input value="<?= !empty($_GET['id']) ? $produit['id'] : "" ?>" type="hidden" id="id" name="id">

           <label for="categorie">Catégorie:</label>
           <select name="categorie" id="categorie">
            <option <?= !empty($_GET['id']) && $produit['categorie']== "Banane" ? "selected" : "" ?> value="banane">Banane</option>
            <option <?= !empty($_GET['id']) && $produit['categorie']== "Orange" ? "selected" : "" ?> value="orange">Orange</option>
            <option <?= !empty($_GET['id']) && $produit['categorie']== "Ananas" ? "selected" : "" ?> value="ananas">Ananas</option>
            <option <?= !empty($_GET['id']) && $produit['categorie']== "Mandarine" ? "selected" : "" ?> value="mandarine">Mandarine</option>
            <option <?= !empty($_GET['id']) && $produit['categorie']== "Goyave" ? "selected" : "" ?> value="goyave">Goyave</option>
           </select>

           <label for="quantite">Quantité:</label>
           <input value="<?= !empty($_GET['id']) ? $produit['quantite'] : "" ?>"type="number" id="quantite" name="quantite" placeholder="Veuillez saisir la quantité">

           <label for="prix_unitaire">Prix unitaire:</label>
           <input value="<?= !empty($_GET['id']) ? $produit['prix_unitaire'] : "" ?>" type="number" id="prix_unitaire" name="prix_unitaire" step="0.01" placeholder="Veuillez saisir le prix">

           <label for="date_fabrication">Date de fabrication:</label>
           <input value="<?= !empty($_GET['id']) ? $produit['date_fabrication'] : "" ?>" type="datetime-local" id="date_fabrication" name="date_fabrication">

           <label for="date_expiration">Date d'expiration:</label>
           <input value="<?= !empty($_GET['id']) ? $produit['date_expiration'] : "" ?>" type="datetime-local" id="date_expiration" name="date_expiration">

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
                <th>Nom d'article</th>
                <th>Catégorie</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Date fabrication</th>
                <th>Date expiration</th>
                <th>Action</th>

              </tr>
                <?php
                $produits = getProduit();
                
                if(!empty($produits) AND is_array($produits)){
                    foreach($produits as $key => $value){
                      ?>
                      <tr>
                        <td><?= $value['nom_article']?></td>
                        <td><?= $value['categorie']?></td>
                        <td><?= $value['quantite']?></td>
                        <td><?= $value['prix_unitaire']?></td>
                        <td><?= date('d/m/y H:i:s', strtotime($value['date_fabrication']))?></td>
                        <td><?= date('d/m/y H:i:s', strtotime($value['date_expiration']))?></td>
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