<?php
require 'connexionbd.php';

if(!empty($_POST['nom_article']) 
&& !empty($_POST['categorie']) 
&& !empty($_POST['quantite']) 
&& !empty($_POST['prix_unitaire'])
&& !empty($_POST['date_fabrication'])
&& !empty($_POST['date_expiration'])){

$sql = 'INSERT INTO article(nom_article, categorie, quantite, prix_unitaire, date_fabrication, date_expiration ) VALUE(?, ?, ?, ?, ?, ?)';

$req = $conn->prepare($sql);
$req->execute(array(
$_POST['nom_article'],
$_POST['categorie'],
$_POST['quantite'],
$_POST['prix_unitaire'],
$_POST['date_fabrication'],
$_POST['date_expiration'],
));

if ($req->rowCount()!=0) {

    $_SESSION['message']['text'] = "Article ajouté avec succès";
    $_SESSION['message']['type'] = "success";

}else{
    $_SESSION['message']['text'] = "Une erreur est survenue lors de l'ajout de l'article";
    $_SESSION['message']['type'] = "danger";
}

}else {
    $_SESSION['message']['text'] = "Veuillez renseigner tout les champs...";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/produit.php');



?>