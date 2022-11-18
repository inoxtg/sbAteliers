<?php
    require_once "Atelier.php";
    require_once "ResponsableAteliers.php";

    $dateCourante = new DateTime('2022-11-18');
    $aujourdhui = $dateCourante;
    $dixJour = ($dateCourante->setDate('2022','11','28'));


    $resp1 = new ResponsableAteliers(1,"PHP","Mehdi");
        $atelier1 = new Atelier(1,$aujourdhui,$dixJour);
        $atelier2 = new Atelier(2,$aujourdhui,$dixJour);
        $atelier3 = new Atelier(3,$aujourdhui,$dixJour);
            $resp1->progAtelier($atelier1);
            $resp1->progAtelier($atelier2);
            $resp1->progAtelier($atelier3);

    $resp2 = new ResponsableAteliers(2,"JAVA","Gauvain");
        $atelier4 = new Atelier(4,$aujourdhui,$dixJour);
        $atelier5 = new Atelier(5,$aujourdhui,$dixJour);
        $atelier6 = new Atelier(6,$aujourdhui,$dixJour);
            $resp2->progAtelier($atelier4);
            $resp2->progAtelier($atelier5);
            $resp2->progAtelier($atelier6);

    foreach ($resp1->getAteliers() as $unAtelier){
        echo $unAtelier->toString() . "\n";
    }
    echo "\n" . "\n";
    foreach ($resp2->getAteliers() as $unAtelier){
        echo $unAtelier->toString() . "\n";
    }

    $resp2->suppAteliers();

    foreach ($resp2->getAteliers() as $unAtelier){
        echo $unAtelier->toString() . "\n";
    }

