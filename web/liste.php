
    <div class="flex-1 p-10">

        <h2 class="text-center text-3xl font-bold text-gray-700 mb-10">
            Liste des tâches
        </h2>


        
        <div class="flex justify-between mb-8">
<!-- 
            <form class="flex gap-3" action="<?=WEBROOT?>?page=filtre" method="post">
                <input
                    type="text"
                    placeholder="Filtrer par nom..."
                    class="border rounded-lg p-2 w-60 focus:ring-2 focus:ring-blue-500"
                    name=statut>

                <button 
                    class="bg-gray-700 text-white px-5 rounded-lg hover:bg-gray-800"
                    name="filtre">
                    Filtrer
                </button>

            </form> -->


            <a href="<?=WEBROOT?>?page=ajout" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i class="fa-solid fa-plus"></i>
                Ajouter
            </a>

        </div>


       
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="p-4 text-left">Nom</th>
                        <th class="p-4 text-left">Prix</th>
                        <th class="p-4 text-left">Categorie</th>
                        <th class="p-4 text-left">Disponibilite</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    <?php foreach ($plats as $key=>$plat ): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4"><?= $plat["nom"] ?></td>
                        <td class="p-4"><?= $plat["prix"] ?></td>
        
                        <?php $nom= getNomCategorie($plat["id_categorie"])?>
                        <td class="p-4 desct"><?= $nom ?></td>

                        <td class="p-4 text-yellow-600 font-semibold"><?= disponibilite($plat["disponiblite"]) ?></td>
                        
                        <td class="p-4 text-center space-x-4">
                            <a href="<?= WEBROOT ?>?page=detail&id=<?= $plat["code"] ?>" class="text-gray-600 hover:text-black">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
                
            </table>

        </div>

    </div>

</body>

</html>