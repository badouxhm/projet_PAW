<?php
                include_once("connexionBDD.class.php");
                $c = new Database();
                $c -> __construct();
                $c->getPendingRecours();
                ?>
                <?php
        if (isset($_GET['id'])) {
            $idS = $_GET['id'];
            $liste_r = $c->getRecoursById($idS);
            ?>
            <?php
                if (isset($_GET['id']) && isset($_GET['decision'])) {
                    
                    $idS = $_GET['id'];
                    $decision = $_GET['decision'];
                    updateRecoursStatus($idS, $decision);
                }
                }

            ?>