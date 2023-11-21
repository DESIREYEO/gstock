<?php
require 'connexionbd.php';

function getProduit($id=null){
if(!empty($id)){
    $sql =  "SELECT* FROM article WHERE id=?";
    $req = $GLOBALS["conn"]->prepare($sql);

    $req->execute(array($id));

    return $req->fetch();

}else{

    $sql =  "SELECT* FROM article";
    $req = $GLOBALS["conn"]->prepare($sql);

    $req->execute();

    return $req->fetchAll();
    }
}



function getClient($id=null){
if(!empty($id)){
    $sql =  "SELECT* FROM client WHERE id=?";
    $req = $GLOBALS["conn"]->prepare($sql);

    $req->execute(array($id));

    return $req->fetch();

}else{

    $sql =  "SELECT* FROM client";
    $req = $GLOBALS["conn"]->prepare($sql);

    $req->execute();

    return $req->fetchAll();
    }
}