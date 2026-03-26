<?php
define("WEBROOT","http://localhost:8000/");
require_once("dataWeb.php");
require_once("nav.php");


$page = $_REQUEST["page"] ?? "ajout";

if($page=="ajout"){
    $categories =getAllCategorie();
    $plats =getAllPlats();
    // print_r($_SESSION["plats"]);
    require_once("ajoutPlat.php");
}else if($page=="liste"){
    $categories =getAllCategorie();
    $plats =getAllPlats();
    require_once("liste.php");
}else if($page =="detail"){
    if(isset($_GET["id"])){
        $categories =getAllCategorie();
        $plat = getDetailPlat($_GET["id"]);
        require_once("detail.php");
    }
}
?>