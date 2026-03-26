<?php
session_start();
if(!isset($_SESSION["categories"])){

    $_SESSION["categories"]=[
        [
            "id" =>1,
            "nom" =>"entree"
        ],
        [
            "id" =>2,
            "nom" =>"plat"
        ],
        [
            "id" =>3,
            "nom" =>"dessert"
        ]
    ];
}
if(!isset($_SESSION["plats"])){

    $_SESSION["plats"] = [
       [
        "code" => 1,
        "nom" =>"thieb",
        "prix" =>2000,
        "id_categorie" => 1,
        "disponiblite" => true
       ],
        [
        "code" => 2,
        "nom" =>"mafe",
        "prix" =>2000,
        "id_categorie" => 2,
        "disponiblite" => true
       ]
    ,
        [
        "code" => 3,
        "nom" =>"chocolat",
        "prix" =>3000,
        "id_categorie" => 3,
        "disponiblite" => false
       ]
      ,
        [
        "code" => 4,
        "nom" =>"chocolat au fraise",
        "prix" =>3500,
        "id_categorie" => 3,
        "disponiblite" => false
       ] 
    ];
}

function getAllPlats(){
    return  $_SESSION["plats"];
}
// print_r(getAllPlats());
function getAllCategorie(){
    return  $_SESSION["categories"];
}

function verifData($nom,$prix,$categorie){
    $errors = [];
    if($nom == ""){
        $errors["nom"] = "Veuillez saisir le nom";
    }
    if($prix == "" ){
        $errors["prix"] = "Veuillez saisir le prix";
    }
    if($categorie == "" ){
        $errors["categorie"] = "Veuillez saisir le categorie";
    }
    return $errors;
}
function getDetailPlat($id){
    $plats = getAllPlats();
    foreach($plats as $key => $plat){
        if($plat["code"] == $id){
            return $plat;
        }
    }
    return null;
}

function getNomCategorie($id){
    $categories = getAllCategorie();
    foreach($categories as $key=>$categorie){
        if($categorie["id"] == $id){
            return $categorie["nom"];
        }
    } 
    return "inconnue";
}

function disponibilite($dispo){
        return $dispo ? "Disponible" : "Indisponible";
}



