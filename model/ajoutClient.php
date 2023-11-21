<?php
require 'connexionbd.php';

if(!empty($_POST['nom']) 
&& !empty($_POST['prenom']) 
&& !empty($_POST['telephone']) 
&& !empty($_POST['adresse']))
{

$sql = 'INSERT INTO client(nom, prenom, telephone, adresse) VALUE(?, ?, ?, ?)';

$req = $conn->prepare($sql);
$req->execute(array(
$_POST['nom'],
$_POST['prenom'],
$_POST['telephone'],
$_POST['adresse'],
));

if ($req->rowCount()!=0) {

    $_SESSION['message']['text'] = "Client ajouté avec succès";
    $_SESSION['message']['type'] = "success";

}else{
    $_SESSION['message']['text'] = "Une erreur est survenue lors de l'ajout du client";
    $_SESSION['message']['type'] = "danger";
}

}else {
    $_SESSION['message']['text'] = "Veuillez renseigner tout les champs...";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/client.php');



?>