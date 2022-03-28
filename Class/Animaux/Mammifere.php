<?php

/**
 * La class Mammifere est la class parent de Chat et Chien.
 * Elle possède les propriétés et les méthodes que Chat et Chien ont en commun
 */
class Mammifere {

    /**
     * Une propriété protected est une propriété qui est accessible dans la class où elle est déclarée
     * et dans les class enfants
     *
     * @var string
     */
    protected string $cri;

    const CLASSIFICATION = 'Mammifere';

    /**
     * Constructeur de la class qui permet de générer un chien ou un chat en fonction des informations passées
     *
     * @param string $nom
     * @param string $race
     * @param string $pelage
     * @param integer $age
     */
    public function __construct(private string $nom, private string $race, private string $pelage, private int $age) {}
    
    public function cri ()
    {
        echo $this->cri;
    }

    /**
     * Get the value of nom
     * Pour récupérer l'information d'une propriété private, on utilise un getter ou accesseur
     * qui retourne la valeur.
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     * Pour définir la valeur d'une propriété private, on utilise un setter ou mutateur
     * qui attribue une valeur grâce au paramètre de la méthode
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race
     */
    public function setRace($race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of pelage
     */
    public function getPelage()
    {
        return $this->pelage;
    }

    /**
     * Set the value of pelage
     */
    public function setPelage($pelage): self
    {
        $this->pelage = $pelage;

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     */
    public function setAge($age): self
    {
        $this->age = $age;

        return $this;
    }
}