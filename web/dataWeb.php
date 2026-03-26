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






function saisieCategorie():int{
    $categorie = readline("Donnez la categorie :");
    return $categorie;
}

function verifCategorie(array $categories,int $id_categorie ){
    foreach($categories as $key => $categorie){
        if($categorie["id"] == $id_categorie){
            return "vrai";
        }
    }
    return "faux";
}


function saisiPlat(int $id_categorie){
    $plats = getAllPlats();
    $code = count($plats) + 1;
    $nom =readline("Donnez le nom du plat :");
    do{
        $prix = readline("Donnez le prix du plat :");
    }while($prix < 0);
    $id_categorie = $id_categorie;
    $disponibilite = true;

    $plat =[
        "code" => $code,
        "nom" =>$nom ,
        "prix" =>$prix,
        "id_categorie" =>$id_categorie,
        "disponiblite" => $disponibilite 

    ];
    return $plat;
}
function ajoutPlat(array $plat,array &$tabPlats){
    $tabPlats[] = $plat;
}

function afficheUnplat(array $plat):void{
    global $categories;
    echo("code : ".$plat["code"]."\n");
    print("nom : ".$plat["nom"]."\n");
    print("prix: ".$plat["prix"]."\n");
    if($plat["disponiblite"] === true){
        print("disponibilite : disponible \n");
    }else{
        print("disponibilite : indisponible \n");

    }
    foreach($categories as $key => $categorie){
        if($categorie["id"] == $plat["id_categorie"]){
            print("categorie : ".$categorie["nom"]);
        }
    }
    echo ("\n=========================================\n");
    
}

function afficheAllPlat(){
    $plats = getAllPlats();
    foreach($plats as $key => $plat){
        afficheUnplat($plat);
    }
}

function menu(){
    
    print("1=>Ajouter plat \n");
    print("2=>Afficher tous les plats \n");
    print("3=>Rechercher un plat \n");
    print("4=>Afficher le prix moyen \n");
    print("5=>Afficher le plat le plus cher \n");
    print("6=>Quitter \n");

}
function rechercherPlat(int $code){
    $plats = getAllPlats();
    foreach($plats as $key => $plat){
        if($plat["code"] == $code){
           afficheUnplat($plat);
            break;
        }
    }
    return print "Ce plat n'existe pas \n";
}

function afficherPrixMoyen(){
    $plats = getAllPlats();
    $somme = 0;
    foreach($plats as $key => $plat){
        $somme += $plat["prix"];
    }
    $moyenne = $somme /count($plats);
    return $moyenne;
}

function affichePlatCher(){
    $plats = getAllPlats();
    
    foreach($plats as $key => $plat){
        $max =$plats[0]["prix"];
        $tabMax =$plats[0];
        if($plat["prix"] >$max){
            $max = $plat["prix"];
            $tabMax = $plat;
        }
    }
    afficheUnplat($tabMax);
}