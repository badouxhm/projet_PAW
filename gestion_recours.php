<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestion de recours</title>
</head>
    <body class="bg-slate-500">
<option value=""></option>
                <tbody class="text-center bg-zinc-300">
                    <label for=""> Selectionez le recour :</label>
                    <form action="gestion_recours.php" method="GET">
                        <select name="id">
                            <?php
                                $server = "localhost"; 
                                $login = "root";
                                $pass = "8520";
                                $dbname = "isil";
                                
                                try{
                                    $connexion = new PDO("mysql:host=$server;dbname=$dbname", $login, $pass); 
                                    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT id FROM recours WHERE status=:nbr"; 
                                
                                    $query = $connexion->prepare($sql);
                                
                                    $query->bindValue(':nbr','0');
                                    $query->execute();
                                    $liste = $query->fetchall();

                                    foreach($liste as $valeur){
                                        echo "<option value='".$valeur['id']."'>".$valeur['id']."</option>";
                                    }       
                            ?>
                        </select>
                        <button type="submit">envoyer</button>
                    </form>
                    <fieldset>
                        <legend>informations du recour</legend>

                        <?php
                            $idS=$_GET['id'];
                                $sql="SELECT * FROM recours WHERE id=:id";
                                $req=$connexion->prepare($sql);
                                $req->bindParam(':id',$idS);
                                $req->execute();
                                $liste_r =$req->fetchall();      
                                
                        ?>
                        <label for="id">
                            ID : <?php echo $liste_r[0][0]; ?>
                        </label>
                        <label for="ids">
                            ID etudiant: <?php echo $liste_r[0][1]; ?>
                        </label>
                        <label for="module">
                            module : <?php echo $liste_r[0][2]; ?>
                        </label>
                        <label for="nature">
                            nature : <?php echo $liste_r[0][3]; ?>
                        </label>
                        <label for="noteA">
                            note affichée : <?php echo $liste_r[0][4]; ?>
                        </label>
                        <label for="noteR">
                            note réelle : <?php echo $liste_r[0][5]; ?>
                        </label>

                        

                    </fieldset>

                    <div>
                        <form action="gestion_recours.php" method="get">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="1" name="decision" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Favorable</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input checked id="bordered-radio-2" type="submit" value="2" name="decision" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Defavorble</label>
                                </div>
                                <button type="submit">Enregistrer</button>
                        </form>
                        <?php
                            $decision=$_GET['decision'];
                            if ($decision=="1"){
                                $sql="UPDATE recours SET status='1'  WHERE id=:IDR";
                                $req1=$connexion->prepare($sql);
                                $req1->bindParam(':IDR',$idS);
                                $req1->execute();      
                            }else if ($decision=="2"){
                                $sql="UPDATE recours SET status='2'  WHERE id=:IDR";
                                $req2=$connexion->prepare($sql);
                                $req2->bindParam(':IDR',$idS);
                                $req2->execute();  
                            }
                        ?>
                        
                    </div>
                </tbody>
            </table>
        </div>
    </body>
</html>
                    
<?php
                            }
                                
                            catch (PDOException $e) {
                                    echo 'Echec : ' . $e->getMessage();
}
?>
