<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Recours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class=" font-roboto  bg-gradient-to-b from-gray-400  to-gray-100 h-max">
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
                            Page d'accueil
                        </a>
                     </li>
                </ul>
            </div>
        </nav>
        <h1 class="h-14 text-slate-700 text-6xl  font-roboto font-extrabold text-center pt-8">Ajouter un recours </h1>
        <form action="ajoutRecours.php" method="POST" class="max-w-lg  my-20 mx-auto bg-slate-700 p-6 rounded-xl shadow-sm ">
            <div class="mb-4">
                <label for="idE" class="block text-zinc-50 font-bold mb-2">Id étudiant :</label>
                <input type="number" id="idE" name="idE" placeholder="Id étudiant (example : 1)" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="module" class="block text-zinc-50 font-bold mb-2">Module :</label>
                <input type="text" id="module" name="module" placeholder="Module (example : PAW)"required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="nature" class="block text-zinc-50 font-bold mb-2">Nature :</label>
                <select class="w-1/3 h-8 rounded-md p-1" name="nature" id="nature" required>
                  <option value="cc">CC</option>
                  <option value="exam">Examen</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="NoteA" class="block text-zinc-50 font-bold mb-2">Note affichée :</label>
                <input type="number" id="NoteA" name="NoteA" placeholder="Note affiché (example : 12)" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="NoteR" class="block text-zinc-50 font-bold mb-2">Note réelle :</label>
                <input type="number" id="NoteR" name="NoteR" placeholder="Note réel (example : 18)" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="envoyer" class=" shadow-lg shadow-slate-500/50 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded-md">Envoyer</button>
            </div>
        </form>
    </body>
</html>
<?php
  include_once("connexionBDD.class.php");
  $c = new Database();
  $c -> connect();
  if (isset($_POST['envoyer'])) { 
    $id = $_POST['idE'];
    $module = $_POST['module'];
    $nature = $_POST['nature'];
    $noteA = $_POST['NoteA'];
    $noteR = $_POST['NoteR'];
    $c->insererRecours($id, $module, $nature, $noteA, $noteR);
    
  }
?>