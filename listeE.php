<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-gray-100 to-gray-400  font-roboto p-4 h-full min-h-screen">
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
    <h1 class="h-14 text-slate-700 text-6xl  font-roboto font-extrabold text-center pt-8 mb-4">Liste des étudiants </h1>
    <div>
        <form method="GET" action="listeE.php" class="m-10">   
           
            <div class="relative mt-4">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="s" placeholder="Nom, Prénom ou E-mail" class="block w-full p-4 ps-10 text-sm rounded-lg text-slate-50 placeholder-slate-25/20 bg-slate-700"  required>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-slate-900 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-lg shadow-slate-500/50">Chercher</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center">
        <table class="w-full table-auto border-collapse border-slate-950  m-10 my-0 rounded-lg shadow-md overflow-hidden" >
            <thead class="text-slate-50 bg-slate-700">
                <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Groupe</th>
              </tr>
            </thead>
            <tbody class="text-center text-slate-800 bg-slate-300">
               
                 <?php
                 
                    include_once("connexionBDD.class.php");
                    $c = new Database;
                    $c->connect(); 
                    $searchTerm = NULL ;
                    if (isset($_GET['s'])){
                        $searchTerm = $_GET['s']  ;
                    }
                    $c->afficherEtudiants($searchTerm);
                ?>
            </tbody>
          </table>
    </div>
</body>
</html>