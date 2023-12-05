<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Gestion des recours</title>
</head>
    <body class="bg-gradient-to-t from-gray-100 to-gray-400  font-roboto p-4 min-h-screen ">
        <nav class=" p-4 m-0 item-center">
            <div class="lg:inline-flex lg:inline-flex lg:w-auto  lg:mt-0 item-center" >
                <ul class ="flex lg:flex-row ">
                    <li>
                        <a href="accueille.html" class="flex  text-slate-700 px-4 font-medium hover:bg- ">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            Page d'accuil 
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <h1 class="h-14 text-slate-700 text-6xl  font-roboto font-extrabold text-center pt-4">Gestion des recours </h1>

        <div class="max-w-lg  duration-500 my-20 mx-auto bg-slate-700 p-6 rounded-lg shadow-sm text-slate-50">
            <form action="g_recours.php" method="GET" >
                <label for="recours" class="block mb-2 text-center font-semibold">Sélectionnez le recours :</label>
                <select name="id" id="recours" class="w-full px-4 py-2 mb-4 border rounded-md text-slate-950">
                    <?php
                    include_once("connexionBDD.class.php");
                    $c = new Database();
                    $c -> __construct();
                    $c->getPendingRecours();
                    ?>
                </select>
                <div class="flex justify-center">
                    <button type="submit" class="shadow-lg shadow-slate-500/50 bg-slate-900 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded-md flex justify-center">Envoyer</button>
                </div>
                

                        <?php
                           if (isset($_GET['id'])) {
                            $idS = $_GET['id'];
                            $liste_r = $c->getRecoursById($idS);
                        ?>
                         <fieldset class="mt-6">
                            <legend class="text-lg font-semibold text-center">Informations sur le recours</legend>
                        <div>
                           
                            <label for="ids"><strong>ID étudiant :</strong> <?php echo $liste_r[0][1]; ?></label><br>
                            <label for="module"><strong>Module :</strong> <?php echo $liste_r[0][2]; ?></label><br>
                            <label for="nature"><strong>Nature :</strong> <?php echo $liste_r[0][3]; ?></label><br>
                            <label for="noteA"><strong>Note affichée : </strong> <?php echo $liste_r[0][4]; ?></label><br>
                            <label for="noteR"><strong>Note réelle :</strong> <?php echo $liste_r[0][5]; ?></label><br>
                        </div>
                        <br>
                        <div>
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-slate-700   rounded-lg sm:flex ">
                                <li class="w-full ">
                                    <div class="flex items-center ps-3">
                                        <input id="bordered-radio-1" type="radio" value="1" name="decision" class="mr-2">
                                        <label for="bordered-radio-1" class="text-sm font-medium text-slate-50">Favorable </label>
                                    </div>
                                </li>
                                <li class="w-full ">
                                    <div class="flex items-center ps-3">
                                        <input id="bordered-radio-2" type="radio" value="2" name="decision" class="mr-2">
                                        <label for="bordered-radio-2" class="text-sm font-medium text-slate-50">Défavorable</label>
                                    </div>
                                </li>
                                <button type="submit" class="shadow-lg shadow-slate-500/50 bg-slate-900 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded-md flex justify-center">Enregistrer</button>
                            </ul>
                        </div>


                        
                    <?php
                       if (isset($_GET['id']) && isset($_GET['decision'])) {
                    
                        $idS = $_GET['id'];
                        $decision = $_GET['decision'];
                        $c->updateRecoursStatus($idS, $decision);
                    }
                    }
                    ?>
                </fieldset>
            </form>
        </div>

    </body>
</html>