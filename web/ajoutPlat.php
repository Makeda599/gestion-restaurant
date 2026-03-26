<?php
$nom = $_REQUEST["nom"] ?? "";
$prix = $_REQUEST["prix"] ?? "";
$id_categorie = $_REQUEST["categorie"] ?? "";
$disponibilite = true;
if(isset($_REQUEST["envoyer"])){
    $errors = verifData($nom,$prix,$id_categorie);
    if(empty($errors) ){
        $code = count($plats) + 1;
        $plat =[
            "code" =>$code,
            "nom" =>$nom,
            "prix" => $prix,
            "id_categorie"=>$id_categorie,
            "disponiblite" => $disponibilite
        ];
        $_SESSION["plats"][] = $plat;
        header("Location:".WEBROOT."?page=liste");
    }

}

?>

<div class="flex-1 flex justify-center items-center">

    <div class="bg-white p-10 rounded-xl shadow-xl w-[500px]">
        <h2 class="text-center text-2xl font-bold mb-8 text-gray-700">
            FORMULAIRE D'AJOUT PLAT
        </h2>

        <form class="space-y-6" action="<?=WEBROOT?>?page=ajout"  method="post" >
            <div>
                <h5 class="text-red-500"><?= $errors["nom"] ?? "" ?></h5>
                <label class="text-gray-600">Nom</label>
                <input
                    type="text"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nom du plat"
                    name ="nom">
                    
            </div>
            <div>
                <h5 class="text-red-500"><?= $errors["prix"] ?? "" ?></h5>
                <label class="text-gray-600">Prix</label>
                <input
                
                    type="number"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="prix du plat"
                    name ="prix">
                    
            </div>
            <div>
                <h5 class="text-red-500"><?= $errors["categorie"] ?? "" ?></h5>
                <label class="text-gray-600">Categorie</label>
                <select
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                rows="4"
                name="categorie">
                <?php foreach($categories as $key=>$categorie): ?>
                <option value="<?= $categorie["id"] ?>"> <?= $categorie["nom"] ?></option>
                <?php endforeach; ?>
                </select>
            </div>


            <button
                class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                name="envoyer">
                Envoyer
            </button>

        </form>

    </div>

</div>

</body>

</html>