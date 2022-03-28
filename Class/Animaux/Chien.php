<?php

/**
 * Class gérant les chiens de notre projet
 * @author Alex <email@email.com>
 * @category Animaux
 */
class Chien {

    /**
     * Nom du chien
     *
     * @var string
     */
    private string $nom;

    /**
     * race du chien
     *
     * @var string
     */
    private string $race;

    /**
     * Couleur de pelage du chien
     *
     * @var string
     */
    private string $pelage;

    /**
     * Age du chien
     *
     * @var integer
     */
    private int $age;

    /**
     * Constructeur de la class qui permet de générer un chien en fonction des informations passées
     *
     * @param string $nom Nom du chien
     * @param string $race Race du chien
     * @param string $pelage Couleur de pelage du chien
     * @param integer $age Age du chien
     */
    public function __construct(string $nom, string $race, string $pelage, int $age)
    {
        $this->nom = $nom;
        $this->race = $race;
        $this->pelage = $pelage;
        $this->age = $age;
    }

    /**
     * Pour récupérer l'information d'une propriété private, on utilise un getter ou accesseur
     * qui retourne la valeur.
     * @return string
     */
    public function getNom (): string
    {
        return $this->nom;
    }

    /**
     * Pour définir la valeur d'une propriété private, on utilise un setter ou mutateur
     * qui attribue une valeur grâce au paramètre de la méthode
     * @param string $nom
     */
    public function setNom (string $nom)
    {
        $this->nom = $nom;
    }

    /**
     * Affiche le cri du chien
     *
     * @return void
     */
    public function cri()
    {
        echo "Ouaf Ouaf";
    }

    /**
     * Get the value of age
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param int $age
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of race
     *
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @param string $race
     * @return self
     */
    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of pelage
     * @return string
     */
    public function getPelage(): string
    {
        return $this->pelage;
    }

    /**
     * Set the value of pelage
     * @param string $pelage
     * @return self
     */
    public function setPelage(string $pelage): self
    {
        $this->pelage = $pelage;

        return $this;
    }
}