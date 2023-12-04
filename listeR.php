<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-roboto  bg-gradient-to-b from-gray-400  to-gray-100 h-screen">
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