<?php
    session_start();
    if (!isset($_SESSION['loginAdmin'])) {
        header("Location: authentifier.php");
        exit;
    }else{

    
    // remplir la liste deroulante (categories)
    require ('database.php');
    $statement = $pdo->prepare('SELECT idFiliere, intitule FROM filiere');
    $statement->execute();
    $filieres = $statement->fetchAll(PDO::FETCH_ASSOC);

    
?>


<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-200">
    <div class="heading text-center font-bold text-3xl m-5 text-yellow-500">Ajouter un nouveau stagiaire</div>
    <div class="heading text-center text-l m-5 text-black-400">Veuillez remplir tous les champs</div>
<style>
  body {background:white !important;}
</style>
  
    <form action="traitement.php" method="POST">
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <div>
                <label for="nom"  class="mb-2 block text-base font-medium text-[#07074D]" > Nom </label>
                <input type="text" name="nom" id="nom" placeholder="Entrer votre nom" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="prenom"  class="mb-2 block text-base font-medium text-[#07074D]" > Prénom </label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrer votre prenom" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="dateNaissance"  class="mb-2 block text-base font-medium text-[#07074D]" > Date Naissance </label>
                <input type="date" name="dateNaissance" id="dateNaissance" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="photoProfil"  class="mb-2 block text-base font-medium text-[#07074D]" > Photo profil </label>
                <input type="file" name="photoProfil" id="photoProfil"  class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label for="filiere"  class="mb-2 block text-base font-medium text-[#07074D]" > Filière </label>
                <select name="filiere" id="filiere" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >
                    <option value="" selected disabled>Selectionnez votre filière</option>
                    <?php foreach ($filieres as $filiere): ?>
                        <option value="<?php echo ($filiere['idFiliere']); ?>">
                            <?php echo ($filiere['intitule']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            
            <!-- icons -->
            <div class="icons flex text-gray-500 m-2">
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
            <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div>
            <!-- buttons -->
            <div class="buttons flex">
            <!-- <input type="reset" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" value="Cancel"> -->
            <input  class="btn border border-yellow-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 ml-2 bg-yellow-500 hover:bg-yellow-600" type="submit" value="Ajouter">
            <!-- <button class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" id="btn-connecter">Connect</button> -->
            </div>
        </div>
    </form>
    </script>
    </body>
</html>
<?php }?>