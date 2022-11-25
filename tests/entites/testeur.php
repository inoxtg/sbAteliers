<?php
    require_once "Atelier.php";
    require_once "ResponsableAteliers.php";

    $aujourdhui = new DateTime('now');
    $deuxJours = new DateTime('2022-11-27');
    $dixJour = new DateTime('2022-12-25');

    echo $aujourdhui->format("Y-m-d") . "\n";

    echo $aujourdhui->format("Y-m-d") . " --- " . $deuxJours->format("Y-m-d") ."\n";

    echo $aujourdhui->format("Y-m-d") . " --- " . $deuxJours->format("Y-m-d") . " --- " . $dixJour->format("Y-m-d") ."\n";


    $resp1 = new ResponsableAteliers(1,"PHP","Mehdi");
        $atelier1 = new Atelier(1,$aujourdhui,$deuxJours);
        $atelier2 = new Atelier(2,$aujourdhui,$deuxJours);
        $atelier3 = new Atelier(3,$aujourdhui,$deuxJours);
            $resp1->progAtelier($atelier1);
            $resp1->progAtelier($atelier2);
            $resp1->progAtelier($atelier3);

    echo "BALISE PROG 1 \n";
    foreach ($resp1->getAteliers() as $unAtelier){
        echo $unAtelier->toString() . "\n";
    }
    echo "\n" . "\n";

    $resp2 = new ResponsableAteliers(2,"JAVA","Gauvain");
        $atelier4 = new Atelier(4,$aujourdhui,$dixJour);
        $atelier5 = new Atelier(5,$aujourdhui,$dixJour);
        $atelier6 = new Atelier(6,$aujourdhui,$dixJour);
            $resp2->progAtelier($atelier4);
            $resp2->progAtelier($atelier5);
            $resp2->progAtelier($atelier6);

    echo "BALISE PROG 2 \n";
    foreach ($resp2->getAteliers() as $unAtelier){
        echo $unAtelier->toString() . "\n";
    }
    echo "\n" . "\n";

    echo "BALISE GET ATELIER PROG 1 FALSE \n";
    $resp1->getAteliersAvenir();
    echo "\n" . "\n";
    echo "BALISE GET ATELIER PROG 2 TRUE \n";
    $resp2->getAteliersAvenir();
    echo "\n" . "\n";

    $resp2->suppAteliers();
    echo "BALISE SUPR 1 \n";

    foreach ($resp2->getAteliers() as $unAtelier){
        echo $unAtelier->toString() . "\n";
    }

?>