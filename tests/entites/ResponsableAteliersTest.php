<?php

require_once "/var/www/html/sbateliers/tests/entites/ResponsableAteliers.php";
require_once "/var/www/html/sbateliers/tests/entites/Atelier.php";

use PHPUnit\Framework\TestCase ;


class ResponsableAteliersTest extends TestCase {

    public function testProgAtelier(){
        $aujourdhui = new DateTime('now');
        $deuxJours = new DateTime('2022-11-27');
        $dixJour = new DateTime('2022-12-05');

        $resp1 = new ResponsableAteliers(1,"PHP","Mehdi");
            $atelier1 = new Atelier(1,$aujourdhui,$deuxJours);
            $atelier2 = new Atelier(2,$aujourdhui,$deuxJours);
            $atelier3 = new Atelier(3,$aujourdhui,$deuxJours);


        $resp2 = new ResponsableAteliers(2,"JAVA","Gauvain");
            $atelier4 = new Atelier(4,$aujourdhui,$dixJour);
            $atelier5 = new Atelier(5,$aujourdhui,$dixJour);
            $atelier6 = new Atelier(6,$aujourdhui,$dixJour);

        $this->assertEmpty($resp1->getAteliers());
        $this->assertFalse($resp1->progAtelier($atelier1));
        $this->assertEmpty($resp1->getAteliers());
        $this->assertEmpty($resp2->getAteliers());
        $this->assertTrue($resp2->progAtelier($atelier4));
        $this->assertNotEmpty($resp2->getAteliers());

    }
}
