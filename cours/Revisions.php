<?php
namespace cours;
/**
 * La class est la représentation des objets que l'on va créer à l'instanciation. 
 * Elle est constituée de propriétés (variables) et de méthodes (fonctions)
 * Ces éléments ont une visibilité:
 * - Public: L'élément est accessible partout
 * - Private: L'élément n'est accessible que dans la class où il est déclaré
 * - Protected: L'élément est accessible dans la class où il est déclaré et dans les class enfants
 */
class Revisions {

    // Les propriétés peuvent avoir une valeur par défaut ou non.
    // Il est fortement conseillé de typer les informations.

    public string $publicProp;

    private int $privateProp;

    /**
     * @var array<object>
     */
    protected array $protectedProp;

    /**
     * Le constructeur est une méthode magique qui intervient automatiquement à l'instanciation d'une class.
     */
    public function __construct(string $publicProp, int $privateProp)
    {
        $this->publicProp = $publicProp;
        $this->privateProp = $privateProp;
    }

    /**
     * Avec php8, le constructeur et la déclaration des propriétés est la suivante:
     */
    // public function __construct(
        //     public string $publicProp, 
        //     private int $privateProp
        // ){}

    /**
     * Cette méthode est un getter ou accesseur. Elle permet de récupérer la valeur d'une propriété private.
     *
     * @return integer
     */
    public function getPrivateProp(): int
    {
        return $this->privateProp;
    }

    /**
     * Cette méthode est un setter ou mutateur. Elle permet d'assigner une valeur à une propriété private.
     *
     * @param integer $privateProp
     * @return void
     */
    public function setPrivateProp(int $privateProp)
    {
        $this->privateProp = $privateProp;
    }
}

// On instancie Revisions pour créer un objet Revisions
// $revisions = new Revisions("Coucou", 10);
// J'appelle un propriété public
// $revisions->publicProp;
// J'appelle une méthode public
// $revisions->getPrivateProp();

