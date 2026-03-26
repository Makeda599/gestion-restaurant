<div class="flex-1 flex flex-col items-center justify-center p-10">

    <h2 class="text-3xl font-bold text-gray-700 mb-10">
        DETAIL PLAT
    </h2>



    <div class="bg-white shadow-xl rounded-xl p-8 w-[450px]">

        <div class="space-y-4 text-gray-700">

            <div class="flex justify-between">
                <span class="font-semibold">Nom :</span>
                <span><?= $plat["nom"] ?></span>
            </div>

            <div class="flex justify-between">
                <span class="font-semibold">Prix :</span>
                <span><?= $plat["prix"] ?></span>
            </div>

            <?php $nom = getNomCategorie($plat["id_categorie"]) ?>
            <div class="flex justify-between">
                <span class="font-semibold">Categorie :</span>

                <span class="font-semibold"><?= $nom ?></span>

            </div>
            <div class="flex justify-between">
                <span class="font-semibold">disponibilite :</span>

                <span class="font-semibold"><?= disponibilite($plat["disponiblite"]) ?></span>

            </div>
        </div>





    </div>


    <!-- Bouton retour -->
    <a href="<?= WEBROOT ?>?page=liste" class="mt-6 text-blue-600 hover:underline">
        ← Retour à la liste
    </a>

</div>

</body>

</html>