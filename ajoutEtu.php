<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un etudiant </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-gray-100 to-gray-400  font-roboto p-4">
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