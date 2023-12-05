<?php

class Database
{
    private $server = "localhost";
    private $login = "root";
    private $pass = "8520";
    private $dbname = "isil";
    private $connexion;

    public function __construct()
    {
        try {
            $this->connexion = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->login, $this->pass);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Echec : ' . $e->getMessage();
        }
    }

    public function insertStudent($nom, $prenom, $email, $groupe)
    {
        try {
            if (isset($_POST['envoyer'])) {
                $sql = "INSERT INTO students (nom, prenom, email, groupe) VALUES (:nom, :prenom, :email, :groupe)";
                $query = $this->connexion->prepare($sql);
                $query->bindParam(':nom', $nom);
                $query->bindParam(':prenom', $prenom);
                $query->bindParam(':email', $email);
                $query->bindParam(':groupe', $groupe);
                $query->execute();
            }
        } catch (PDOException $e) {
            echo 'Echec : ' . $e->getMessage();
        }
    }

    public function insertRecours($id, $module, $nature, $noteA, $noteR)
    {
        try {
            if (isset($_POST['envoyer'])) {
                $status = "0";
                $sql = "INSERT INTO recours (id_student, module, nature, note_affiche, note_reel, status) VALUES (:id, :module, :nature, :noteA, :noteR, :s)";
                $query = $this->connexion->prepare($sql);
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
    }

    public function getPendingRecours()
    {
        try {
            $sql = "SELECT id FROM recours WHERE status=:nbr";
            $query = $this->connexion->prepare($sql);
            $query->bindValue(':nbr', '0');
            $query->execute();
            $liste = $query->fetchAll();

            foreach ($liste as $valeur) {
                echo "<option value='" . $valeur['id'] . "'>" . $valeur['id'] . "</option>";
            }
        } catch (PDOException $e) {
            echo 'Echec : ' . $e->getMessage();
        }
    }
    public function getRecoursById($idS){
        try {
            $sql = "SELECT * FROM recours WHERE id=:id";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':id', $idS);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo 'Echec : ' . $e->getMessage();
        }
    }


    public function updateRecoursStatus($idS, $decision)
    {
        try {
            if (isset($_GET['id']) && isset($_GET['decision'])) {
                $update = "UPDATE recours SET status='" . $decision . "' WHERE id='" . $idS . "'";
                $this->connexion->exec($update);
            }
        } catch (PDOException $e) {
            echo 'Echec : ' . $e->getMessage();
        }
    }

    public function getStudents($searchTerm )
    {
        try {
            $sql = "SELECT * FROM students";

            if ($searchTerm !== null) {
                $sql = "SELECT * FROM students WHERE nom LIKE :searchTerm OR prenom LIKE :searchTerm OR email LIKE :searchTerm";
                $query = $this->connexion->prepare($sql);
                $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
                $query->execute();
            } else {
                $query = $this->connexion->query($sql);
            }

            $liste = $query->fetchAll();

            foreach ($liste as $valeur) {
                echo "<tr>";
                for ($i = 0; $i < 5; $i++) {
                    echo "<td> $valeur[$i]  </td>";
                }
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }


    public function displayRecours()
    {
        try {
            $sql = "SELECT * FROM recours";
            $liste = $this->connexion->query($sql);
            
            foreach ($liste as $valeur) {
                echo "<tr>";
                for ($i = 0; $i < 7; $i++) {
                    if ($i==6){
                        if ($valeur[$i]==1){
                            echo "<td> Favorable  </td>";
                        }else{
                            echo "<td> Defavorable  </td>";
                        }
                    }else{
                    echo "<td> $valeur[$i]  </td>";
                    }
                }
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo 'ERROR : ' . $e->getMessage();
        }
    }
}

?>

