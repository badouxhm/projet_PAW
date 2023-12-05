<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-roboto  bg-gradient-to-b from-gray-400  to-gray-100 h-screen">
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
    <h1 class="h-14 text-slate-700 text-6xl  font-roboto font-extrabold text-center pt-8 ">Liste des recours </h1>
    <div class="flex justify-center mt-12">
        <table class="w-full table-auto border-collapse border-slate-950  m-10 my-0 rounded-lg shadow-md overflow-hidden" >
            <thead class="text-slate-50 bg-slate-700 ">
                <tr>
                <th>ID</th>
                <th>ID etudiant</th>
                <th>Module</th>
                <th>Nature</th>
                <th>Note affichée</th>
                <th>Note réelle</th>
                <th>Décision</th>
              </tr>
            </thead>
            <tbody class="text-center text-slate-800 bg-slate-300">
            <?php
                    include_once("connexionBDD.class.php");
                    $c = new Database;
                    $c->__construct();      
                    $c->displayRecours();
                ?>
            </tbody>
          </table>
    </div>
</body>
</html>