<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Recours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="bg-slate-500 font-roboto p-4">
        <form action="ajoutRecours.php" method="POST" class="max-w-md hover:max-w-lg duration-500 my-20 mx-auto bg-slate-900 p-6 rounded-xl shadow-sm hover:shadow-2xl">
            <div class="mb-4">
                <label for="idE" class="block text-zinc-400 font-bold mb-2">Id étudiant :</label>
                <input type="number" id="idE" name="idE" placeholder="Id étudiant (example : 1)" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="module" class="block text-zinc-400 font-bold mb-2">Module :</label>
                <input type="text" id="module" name="module" placeholder="Module (example : PAW)"required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="nature" class="block text-zinc-400 font-bold mb-2">Nature :</label>
                <select class="w-1/3 h-8 rounded-md p-1" name="nature" id="nature" required>
                    <option value="cc">CC</option>
                    <option value="exam">Examen</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="NoteA" class="block text-zinc-400 font-bold mb-2">Note affichée :</label>
                <input type="number" id="NoteA" name="NoteA" placeholder="Note affiché (example : 12)" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="NoteR" class="block text-zinc-400 font-bold mb-2">Note réelle :</label>
                <input type="number" id="NoteR" name="NoteR" placeholder="Note réel (example : 18)" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="envoyer" class=" bg-zinc-400 hover:bg-zinc-600 text-white font-bold py-2 px-4 rounded-md">Envoyer</button>
            </div>
        </form>
  
    </body>
</html>
<?php
  $server = "localhost"; 
  $login = "root";
  $pass = "8520";
  $dbname = "isil";

  try {
    $connexion = new PDO("mysql:host=$server;dbname=$dbname", $login, $pass); 
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['envoyer'])) { 
      $id = $_POST['idE'];
      $module = $_POST['module'];
      $nature = $_POST['nature'];
      $noteA = $_POST['NoteA'];
      $noteR = $_POST['NoteR'];
      $status="0";  
      $sql = "INSERT INTO recours (id_student, module, nature, note_affiche, note_reel, status ) VALUES (:id, :module, :nature, :noteA, :noteR , :s)"; 

      $query = $connexion->prepare($sql);

      $query->bindParam(':id', $id); 
      $query->bindParam(':module', $module);
      $query->bindParam(':nature', $nature);
      $query->bindParam(':noteA', $noteA);
      $query->bindParam(':noteR', $noteR);
      $query->bindParam(':s', $status);
      $query->execute();
    }
  } catch (PDOException $e) {
    echo 'Echec : ' . $e->getMessage();
  }
?>