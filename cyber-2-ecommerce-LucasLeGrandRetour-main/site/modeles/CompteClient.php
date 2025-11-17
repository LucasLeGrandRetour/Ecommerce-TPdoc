<?php
/**
 * Description of Developpeur
 *
 * @author Utilisateur
 */
class CompteClient {
    /**
     * Propriété int $num : numero du compte
     */
    private int $num; 
    /**
     * Propriété string nom : nom du titulaire du compte
     */
    private string $nom;
    /**
     * Propriété string prenom : prénom du du titulaire du compte
     */
    private string $prenom;
    
    /**
     * Propriété int solde : solde du compte
     */
    private int $solde;
    
    
    /**
     * Constructeur de la classe CompteClient avec 4 paramètres
     * à la propriété nom
     * @param int $unNum
     * @param string $unNom
     * @param string $unPrenom
     * @param int $unSolde
     */
    
    public function __construct(int $unNum, string $unNom, string $unPrenom,int $unSolde){
        $this->num = $unNum;
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->solde = $unSolde; 
    }
    
    /**
     * getter qui retourne le numéro du compte
     * @return int $num
     */
    public function getNum():int {
        return $this->num;
    }
    
    /**
     * getter qui retourne le nom du titulaire du compte
     * @return string $nom
     */
    public function getNom():string {
        return $this->nom;
    }
    
    /**
     * getter qui retourne le prenom du titulaire du compte
     * @return string $prenom
     */
    public function getPrenom():string {
        return $this->prenom;
    }
    
    /**
     * getter qui retourne le solde du compte
     * @return int $solde
     */
    public function getSolde():int {
        return $this->solde;
    }
    
    /**
     * Setter permettant d'affecter une valeur
     * à la propriété num
     * 
     * @param string $unNvNum
     */
    public function setId(int $unNvNum) {
        $this->id = $unNvNum;
    }
    
    /**
     * Setter permettant d'affecter une valeur
     * à la propriété nom
     * 
     * @param string $unNvNom
     * 
     * @param string $unNvNom
     */
    public function setNom(string $unNvNom){
        $this->nom=$unNvNom;
    }
    
    /**
     * Setter permettant d'affecter une valeur
     * à la propriété prenom
     * 
     * @param string $unNvPrenom
     */
    public function setPrenom(string $unNvPrenom){
        $this->prenom = $unNvPrenom;
    }
    
    /**
     * Setter permettant d'affecter une valeur
     * à la propriété solde
     * 
     * @param string $unNvSolde
     */
    public function setSolde(string $unNvSolde){
        $this->solde = $unNvSolde;
    }
  
}
