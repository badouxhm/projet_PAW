<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des etudiants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-500">
    <div>
        <div >
            <a href="accueille.html">
                <img src="house-64.ico" alt="La page d'accueille" >
            </a>
        </div>
        <form method="get" action="" class="m-10">   
           
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" placeholder="Nom, Prénom ou E-mail" class="block w-full p-4 ps-10 text-sm rounded-lg text-zinc-400 placeholder-slate-700 bg-slate-950"  required>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-yellow-800 hover:bg-slate-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chercher</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center">
        <table class="w-full table-auto border-collapse border-slate-950  m-10 my-0 rounded-lg shadow-md overflow-hidden" >
            <thead>
                <tr>
                <th class="text-zinc-400 bg-slate-950">ID</th>
                <th class="text-zinc-400 bg-slate-950">Nom</th>
                <th class="text-zinc-400 bg-slate-950">Prénom</th>
                <th class="text-zinc-400 bg-slate-950">E-mail</th>
                <th class="text-zinc-400 bg-slate-950">Groupe</th>
              </tr>
            </thead>
            <tbody class="text-center bg-zinc-300">
                 <?php      
                    
                ?>
            </tbody>
          </table>
    </div>
</body>
</html>