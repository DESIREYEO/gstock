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
           <input value="<?= !empty($_GET['id']) ? $produit['id'] : "" ?>" type="hidden" id="id" name="id">

           <label for="id_produit">Article</label>
                <select onchange="setPrix()" name="id_produit" id="id_produit">
                    <?php
                    $produits = getProduit();
                    if (!empty($produits) && is_array($produits)) {
                        foreach ($produits as $key => $value) {
                    ?>
                            <option data-prix="<?= $value['prix_unitaire'] ?>" value="<?= $value['id'] ?>"><?= $value['nom_article'] . " - " . $value['quantite'] . " disponible" ?></option>
                    <?php

                        }
                    }

                    ?>
                </select>


                <label for="id_client">Client</label>
                <select name="id_client" id="id_client">
                    <?php
                    $clients = getClient();
                    if (!empty($clients) && is_array($clients)) {
                        foreach ($clients as $key => $value) {
                    ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nom'] . " " . $value['prenom'] ?></option>
                    <?php

                        }
                    }

                    ?>
                </select>

           <label for="quantite">Quantité:</label>
           <input value="<?= !empty($_GET['id']) ? $produit['quantite'] : "" ?>"type="number" id="quantite" name="quantite" placeholder="Veuillez saisir la quantité">

           <label for="prix">Prix</label>
           <input value="<?= !empty($_GET['id']) ? $produit['prix'] : "" ?>" type="number" id="prix" name="prix"  placeholder="Veuillez saisir le prix">

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