<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-gray-100 to-gray-400  font-roboto p-4 h-screen">
    <h1 class="h-14 text-slate-700 text-6xl  font-roboto font-extrabold text-center pt-8 mb-4">Liste des étudiants </h1>
    <div>
        <form method="get" action="" class="m-10">   
           
            <div class="relative mt-4">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" placeholder="Nom, Prénom ou E-mail" class="block w-full p-4 ps-10 text-sm rounded-lg text-slate-50 placeholder-slate-25/20 bg-slate-700"  required>
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
                    try{
                        $connexion = new PDO("mysql:host=localhost;dbname=isil","root","8520");
                        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql="SELECT * FROM students";
                        $liste = $connexion->query($sql);

                        foreach ($liste as $valeur) {
                            echo "<tr>";
                            for($i=0;$i<5;$i++) {
                            echo "<td> $valeur[$i]  </td>";                                
                            }
                            echo "</tr>";
                            
                    }
                    }   
                    catch(PDOException $e){
                        echo ('ERROR :'.$e->getMessage());
                    }
                ?>
            </tbody>
          </table>
    </div>
</body>
</html>