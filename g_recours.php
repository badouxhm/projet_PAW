<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de recours</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">

<div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md p-6">
    <form action="g_recours.php" method="GET">
        <label for="recours" class="block mb-2">Sélectionnez le recours :</label>
        <select name="id" id="recours" class="w-full px-4 py-2 mb-4 border rounded-md">
            <?php
            $server = "localhost";
            $login = "root";
            $pass = "8520";
            $dbname = "isil";

            try {
                $connexion = new PDO("mysql:host=$server;dbname=$dbname", $login, $pass);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT id FROM recours WHERE status=:nbr";

                $query = $connexion->prepare($sql);

                $query->bindValue(':nbr', '0');
                $query->execute();
                $liste = $query->fetchAll();

                foreach ($liste as $valeur) {
                    echo "<option value='" . $valeur['id'] . "'>" . $valeur['id'] . "</option>";
                }
                ?>
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Envoyer</button>
    

    <fieldset class="mt-6">
        <legend class="text-lg font-semibold">Informations sur le recours</legend>

        <?php
        if (isset($_GET['id'])) {
            $idS = $_GET['id'];
            $sql = "SELECT * FROM recours WHERE id=:id";
            $req = $connexion->prepare($sql);
            $req->bindParam(':id', $idS);
            $req->execute();
            $liste_r = $req->fetchAll();
            ?>

            <div>
                <label for="id">ID : <?php echo $liste_r[0][0]; ?></label><br>
                <label for="ids">ID étudiant : <?php echo $liste_r[0][1]; ?></label><br>
                <label for="module">Module : <?php echo $liste_r[0][2]; ?></label><br>
                <label for="nature">Nature : <?php echo $liste_r[0][3]; ?></label><br>
                <label for="noteA">Note affichée : <?php echo $liste_r[0][4]; ?></label><br>
                <label for="noteR">Note réelle : <?php echo $liste_r[0][5]; ?></label><br>
            </div>
            <div>
                <div class="flex items-center mb-4">
                    <input id="bordered-radio-1" type="radio" value="1" name="decision" class="mr-2">
                    <label for="bordered-radio-1" class="text-sm font-medium text-gray-900">Favorable</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="bordered-radio-2" type="radio" value="2" name="decision" class="mr-2" checked>
                    <label for="bordered-radio-2" class="text-sm font-medium text-gray-900">Défavorable</label>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enregistrer</button>
            </div>
    </form>

            <?php
                if (isset($_GET['id']) && isset($_GET['decision'])) {
                    $idS = $_GET['id'];
                    $decision = $_GET['decision'];
        
                    $update = "UPDATE recours SET status='".$decision."' WHERE id='".$idS."'";
                    $x=$connexion->exec($update);
                }
                }
                    
                } catch (PDOException $e) {
                    echo 'Echec : ' . $e->getMessage();
                }
            ?>
    </fieldset>
</div>

</body>
</html>