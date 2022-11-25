<?php

date_default_timezone_set('UTC');
require_once "Atelier.php";

class ResponsableAteliers
{

    protected int $numero = 0;
    protected String $nom = "Aucun Responsable";
    protected String $prenom = "Aucun Responsable";

    protected array $ateliers = [];

    /**
     * @param int $numero
     * @param String $nom
     * @param String $prenom
     */
    public function __construct(int $numero, string $nom, string $prenom)
    {
        $this->numero = $numero;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

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
     * @return String
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return array
     */
    public function getAteliers(): array
    {
        return $this->ateliers;
    }

    /**
     * @param array $ateliers
     */
    public function setAteliers(array $ateliers): void
    {
        $this->ateliers = $ateliers;
    }




    public function progAtelier(Atelier $atelier): bool{
        $cpt = count($this->ateliers);
        if(
            $atelier->getDateProg()->format("Y-m-d") > $atelier->getDateEnreg()->format("Y-m-d")
        ){
            if(
                 date_diff($atelier->getDateProg(), $atelier->getDateEnreg())->format('%d') >= 7
                |date_diff($atelier->getDateProg(), $atelier->getDateEnreg())->format('%m') >= 1
                |date_diff($atelier->getDateProg(), $atelier->getDateEnreg())->format('%y') >= 1
            ){
                $atelier->setRespAtelier($this);
                $this->ateliers[] = $atelier;
            }
        }
        $cpt2 = count($this->ateliers);
        if(
            $cpt2 - $cpt == 1
        ){
            return true;
        }
        return false;
    }

    public function suppAteliers(){
        foreach($this->getAteliers() as $unAtelier){
            array_pop($this->ateliers);
            $unAtelier->supResp();
        }

    }

    public function getAteliersAvenir(){
        $date = new DateTime("now");
        $dateFormat = $date->format('Y-m-d');
        $ats = [];

        foreach($this->ateliers as $ateliers){
            if($ateliers->getDateProg()->format('Y-m-d') > $dateFormat){
                $ats = $ateliers;
            }
        }
        return $ats;
    }

    public function toString(): String {
        return "[RESP-ATELIERS] "
            . " Numero : " . $this->getNumero()
            . " Nom : " . $this->getNom()
            ." Prenom : " . $this->getPrenom();
    }

}