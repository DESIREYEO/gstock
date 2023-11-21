<?php
require 'connexionbd.php';

if(!empty($_POST['nom']) 
&& !empty($_POST['prenom']) 
&& !empty($_POST['telephone']) 
&& !empty($_POST['adresse'])
&& !empty($_POST['id']))

{

$sql = "UPDATE client SET nom=?, prenom=?, telephone=?, adresse=? WHERE id=?";

$req = $conn->prepare($sql);
$req->execute(array(
$_POST['nom'],
$_POST['prenom'],
$_POST['telephone'],
$_POST['adresse'],
$_POST['id'],

));

if ($req->rowCount()!=0) {

    $_SESSION['message']['text'] = "Client modifié avec succès";
    $_SESSION['message']['type'] = "success";

}else{
    $_SESSION['message']['text'] = "Rien n'a été modifié";
    $_SESSION['message']['type'] = "warning";
}

}else {
    $_SESSION['message']['text'] = "Veuillez renseigner tout les champs...";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/client.php');



?>