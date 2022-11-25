<?php

date_default_timezone_set('UTC');
require_once "ResponsableAteliers.php";

class Atelier{

    protected int $numero;
    protected DateTime $dateEnreg;
    protected DateTime $dateProg;

    protected $respAtelier;

    /**
     * @param int $numero
     * @param DateTime $dateEnreg
     * @param DateTime $dateProg
     */
    public function __construct(int $numero, DateTime $dateEnreg, DateTime $dateProg)
    {
        $this->numero = $numero;
        $this->dateEnreg = $dateEnreg;
        $this->dateProg = $dateProg;

    }

    public function supResp(){
        $this->respAtelier = null;
    }

    public function __contruct(){}

    /**
     * @return int
     */

    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return Date
     */
    public function getDateEnreg(): DateTime
    {
        return $this->dateEnreg;
    }

    /**
     * @param Date $dateEnreg
     */
    public function setDateEnreg(DateTime $dateEnreg): void
    {
        $this->dateEnreg = $dateEnreg;
    }

    /**
     * @return Date
     */
    public function getDateProg(): DateTime
    {
        return $this->dateProg;
    }

    /**
     * @param Date $dateProg
     */
    public function setDateProg(DateTime $dateProg): void
    {
        $this->dateProg = $dateProg;
    }

    /**
     * @return ResponsableAteliers
     */
    public function getRespAtelier()
    {
        return $this->respAtelier;
    }

    /**
     * @param ResponsableAteliers $respAtelier
     */
    public function setRespAtelier( $respAtelier): void
    {
        $this->respAtelier = $respAtelier;
    }

    public function toString(){
        if($this->respAtelier != null){
            return "[ATELIER] "
                . " Numero : " . $this->getNumero()
                . " DateEnregistrement : " . $this->getDateEnreg()->format('Y-m-d')
                . " DateProgrammée : " . $this->getDateProg()->format('Y-m-d')
                . " Responsable : " . $this->getRespAtelier()->toString();
        }else{
            return "[ATELIER] "
                . " Numero : " . $this->getNumero()
                . " DateEnregistrement : " . $this->getDateEnreg()->format('Y-m-d')
                . " DateProgrammée : " . $this->getDateProg()->format('Y-m-d');
        }

    }
}
