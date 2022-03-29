<?php
namespace cours;

use cours\Revisions;
/**
 * Revisions2 étend de Revisions. C'est donc un enfant de Revisions.
 * Avec l'héritage, les class enfants récupèrent et peuvent utiliser les éléments public et protected du parent.
 * 
 * @property string $publicProp
 * @property array<object> $protectedProp
 * @method int getPrivateProp()
 * @method void setPrivateProp(int $privateProp)
 */
class Revisions2 extends Revisions {

    private string $persoProp;

    private static int $staticProp = 10;

    public static int $staticProp2 = 25;


    const TYPE_FICHIER = "Fichier de révision";

    /**
     * Lorsqu'on instancie une class enfant qui possède un constructeur, celui-ci écrase l'appel du constructeur du parent.
     * On a la possibilité d'indiquer que l'on souhaite tout de même l'utiliser pour attribuer des valeurs aux propriétés du parent.
     * On appelle ça la surcharge.
     * https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-surcharge-operateur-resolution-portee/
     *
     * @param string $persoProp
     * @param string $publicProp
     * @param integer $privateProp
     */
    public function __construct(string $persoProp, string $publicProp, int $privateProp)
    {
        $this->persoProp = $persoProp;
        /**
         * parent est un mot-clé permettant de faire référence à la class parent
         */
        parent::__construct($publicProp, $privateProp);
    }

    /**
     * Get the value of persoProp
     *
     * @return string
     */
    public function getPersoProp(): string
    {
        return $this->persoProp;
    }

    /**
     * Set the value of persoProp
     *
     * @param string $persoProp
     *
     * @return self
     */
    public function setPersoProp(string $persoProp): self
    {
        $this->persoProp = $persoProp;

        return $this;
    }

    /**
     * Une méthode static est une méthode qui est appelée sans avoir à instancier la class.
     * Elle est appelée à partir de la class avec l'opérateur de résolution de portée "::"
     * Revision2::getStaticInfo()
     * 
     * Cette méthode ne peut retourner qu'une information qui est dans le même contexte:
     *  - class pour le nom de la class
     *  - une constante
     *  - une propriété static
     *
     * @return void
     */
    public static function getStaticInfo ()
    {
        return self::$staticProp;
    }

    public function getResultStatic ()
    {
        return self::$staticProp + self::$staticProp2;
    }
}

/**
 * Certains éléments sont des éléments qui appartiennent à la class et non à l'objet.
 * Ces éléments sont des informations auxquelles on a besoin d'accéder rapidement sans avoir à instancier.
 * ex: Le nom de la class qui ne changera jamais ou la valeur d'une constante qui ne changera pas non plus.
 * 
 * Pour récupérer ces informations on va donc faire référence à la class directement 
 * et utiliser l'opérateur de résolution de portée "::" ou Paamayim Nekudotayim
 * 
 */

// Permet de récupérer le nom de la class
echo Revisions2::class;
echo "<br>";
// Permet de récupérer la valeur d'une constante
echo Revisions2::TYPE_FICHIER;
// Permet d'utiliser une méthode static
echo "<br>";
echo Revisions2::getStaticInfo();

echo "<br>";
$reva = new Revisions2("test", "test", 10);
echo $reva->getResultStatic();
echo "<br>";
Revisions2::$staticProp2 = 12;
$reva2 = new Revisions2("test", "test", 10);
echo $reva2->getResultStatic();
echo "<br>";
echo $reva->getResultStatic();
