<?php
require_once("../data/data.php");
do{
    menu();
    $choix = readline("Donnez votre choix :");
    switch($choix){
        case 1 :
            
                do{
                
                    $id_categorie = saisieCategorie();
                    $verif = verifCategorie($categories,$id_categorie);
                }while($verif =="faux");
                $plat = saisiPlat($id_categorie);
                ajoutPlat($plat,$plats);
            break;
        case 2 :
            afficheAllPlat();
            break;
        case 3:
            $codeRechercher =readline("Donnez le code à rechercher\n");
            rechercherPlat($codeRechercher);
            break;
        case 4:
            $moyenne = afficherPrixMoyen();
            print("La moyenne est ".$moyenne)."\n";
            break;
        case 5 :
            print("\nLeplat le plus cher est: \n");
            affichePlatCher();
            break;
    }
}while($choix != 7);


// print_r($plats);

















?>