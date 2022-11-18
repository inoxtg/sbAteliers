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

    public function supResp(ResponsableAteliers $resp){
        unset($resp);
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
        $atelier->setRespAtelier($this);
        $this->ateliers[] = $atelier;
        $cpt2 = count($this->ateliers);

        if($cpt2 - $cpt == 1){
            return true;
        }
        return false;
    }

    public function suppAteliers(){
        array_pop($this->ateliers);
        foreach($this->getAteliers() as $unAtelier){
            $unAtelier->setRespAtelier($this->supResp($this));
        }
    }

    public function getAteliersAvenir(){
        foreach($this->ateliers->getDateProg() as $date){
            return $date;
        }
    }

    public function toString(): String {
        return "[RESP-ATELIERS] "
            . " Numero : " . $this->getNumero()
            . " Nom : " . $this->getNom()
            ." Prenom : " . $this->getPrenom();
    }

}