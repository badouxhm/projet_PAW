<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestion de recours</title>
</head>
    <body class="bg-slate-500">
        <div class="flex justify-center m-10">
            <table class="w-full table-auto border-collapse border-slate-950  m-10 my-0 rounded-lg shadow-md overflow-hidden" >
                <thead class="text-zinc-400 bg-slate-950">
                    <tr>
                    <th >ID Etudiant</th>
                    <th>Module</th>
                    <th>Nature</th>
                    <th>Note affichée</th>
                    <th>Note réelle</th>
                    <th>Décision</th>
                  </tr>
                </thead>
                <tbody class="text-center bg-zinc-300">
                    <?php      
                        try{
                            $connexion = new PDO("mysql:host=localhost;dbname=isil","root","8520");
                            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                            $sql="SELECT id_student,module,nature,note_affiche,note_reel FROM recours";
                            $liste = $connexion->query($sql);
    
                            foreach ($liste as $valeur) {
                                echo "<tr>";
                                for($i=0;$i<5;$i++){
                                    echo "<td>".$valeur[$i] ."</td>";
                                }
                                echo "<td> <a href=>favorable</a> <a href=>defavorable</a></td>";
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