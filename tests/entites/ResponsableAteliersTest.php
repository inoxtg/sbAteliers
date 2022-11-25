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

        $resp2 = new ResponsableAteliers(2,"JAVA","Gauvain");
            $atelier2 = new Atelier(4,$aujourdhui,$dixJour);

        $this->assertEmpty($resp1->getAteliers());
        $this->assertFalse($resp1->progAtelier($atelier1));
        $this->assertEmpty($resp1->getAteliers());
        $this->assertEmpty($resp2->getAteliers());
        $this->assertTrue($resp2->progAtelier($atelier2));
        $this->assertNotEmpty($resp2->getAteliers());
        $this->assertNotEquals($resp1, $atelier1->getRespAtelier());
        $this->assertSame($resp2, $atelier2->getRespAtelier());
    }
    public function testGetAteliersVenir(){
        $aujourdhui = new DateTime('now');
        $deuxJours = new DateTime('2022-11-27');
        $dixJour = new DateTime('2022-12-05');

        $resp1 = new ResponsableAteliers(1,"PHP","Mehdi");
            $atelier1 = new Atelier(1,$aujourdhui,$deuxJours);
                $resp1->progAtelier($atelier1);

        $resp2 = new ResponsableAteliers(2,"JAVA","Gauvain");
            $atelier2 = new Atelier(4,$aujourdhui,$dixJour);
                $resp2->progAtelier($atelier2);

        $this->assertEmpty($resp1->getAteliersAvenir());
        $this->assertNotEmpty($resp2->getAteliersAvenir());
    }
    public function testSuppAteliers(){
        $aujourdhui = new DateTime('now');
        $deuxJours = new DateTime('2022-11-27');
        $dixJour = new DateTime('2022-12-05');

        $resp1 = new ResponsableAteliers(1,"PHP","Mehdi");
            $atelier1 = new Atelier(1,$aujourdhui,$deuxJours);
                $resp1->progAtelier($atelier1);

        $resp2 = new ResponsableAteliers(2,"JAVA","Gauvain");
            $atelier2 = new Atelier(4,$aujourdhui,$dixJour);
            $atelier3 = new Atelier(4,$aujourdhui,$dixJour);
            $atelier4 = new Atelier(4,$aujourdhui,$dixJour);
                $resp2->progAtelier($atelier2);
                $resp2->progAtelier($atelier3);
                $resp2->progAtelier($atelier4);

        $resp2->suppAteliers();

        $this->assertEmpty($resp2->getAteliers());
        $this->assertEquals(null,$atelier2->getRespAtelier());
        $this->assertEquals(null,$atelier3->getRespAtelier());
        $this->assertEquals(null,$atelier4->getRespAtelier());
    }
}
