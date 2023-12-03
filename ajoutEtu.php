<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un etudiant </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-500 font-roboto p-4">
  <form action="ajoutetu.php"  method="POST" class="max-w-md hover:max-w-lg duration-500 my-28 mx-auto bg-slate-900 p-6 rounded-lg shadow-sm hover:shadow-2xl">
    <input type="hidden" name="AjoutE">
    <div class="mb-4">
        <label for="nom" class="block text-zinc-400 font-bold mb-2">Nom :</label>
        <input type="text" id="nom" name="nom" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="mb-4">
          <label for="prenom" class="block text-zinc-400 font-bold mb-2">Prénom :</label>
          <input type="text" id="prenom" name="prenom" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-zinc-400 font-bold mb-2">Email :</label>
        <input type="email" id="email" name="email" required class="p-1 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="groupe" class="block text-zinc-400 font-bold mb-2">Groupe :</label>
        <select class="w-1/3 h-8 rounded-md p-1" name="groupe" id="groupe" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
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
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $groupe = $_POST['groupe'];

      $sql = "INSERT INTO students (nom, prenom, email, groupe) VALUES (:nom, :prenom, :email, :groupe)"; 

      $query = $connexion->prepare($sql);

      $query->bindParam(':nom', $nom); 
      $query->bindParam(':prenom', $prenom);
      $query->bindParam(':email', $email);
      $query->bindParam(':groupe', $groupe);
      $query->execute();
    }
  } catch (PDOException $e) {
    echo 'Echec : ' . $e->getMessage();
  }
?>