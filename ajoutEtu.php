<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Ajouter un etudiant </title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gradient-to-t from-gray-100 to-gray-400  font-roboto ">
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
    <h1 class= "h-14 text-slate-700 text-6xl  font-roboto font-extrabold text-center pt-8">Ajouter un étudiant </h1>
    <form action="ajoutetu.php"  method="POST" class="max-w-lg  duration-500 my-28 mx-auto bg-slate-700 p-6 rounded-lg shadow-sm ">
      <input type="hidden" name="AjoutE">
      <div class="mb-4">
          <label for="nom" class="block text-zinc-50 font-bold mb-2">Nom :</label>
          <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom" class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-zinc-50 font-bold mb-2">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-zinc-50 font-bold mb-2">Email :</label>
          <input type="email" id="email" name="email" placeholder="Entrez votre E-mail" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="groupe" class="block text-zinc-50 font-bold mb-2">Groupe :</label>
          <select class="w-1/3 h-8 rounded-md p-1" name="groupe" id="groupe" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
          </select>
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
    $c -> __construct();
    if (isset($_POST['envoyer'])) { 
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $groupe = $_POST['groupe'];
      $c->insertStudent($nom, $prenom, $email, $groupe);
    }
?>