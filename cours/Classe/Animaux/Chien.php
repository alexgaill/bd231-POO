<?php
namespace Classe\Animaux;


/**
 * Class gérant les chiens de notre projet
 * @author Alex <email@email.com>
 * @category Animaux
 * 
 * Chien est la class enfant de Mammifere.
 * Quand une class est une class enfant, elle extends (étend) de la class parent. Elle peut ainsi utiliser les propriétés et les méthodes du parent.
 * 
 */
class Chien extends Mammifere{

    protected string $cri = "Ouaf ouaf";

    public function getgetNom():string
    {
        /**
         * Les propriétés et les méthodes du parent sont considérées comme appartenant à l'enfant. On peut donc les utiliser avec $this
         */
        return $this->getNom();
    }
}