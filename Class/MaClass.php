<?php

/**
 * Une class possède des propriétés (variables) et des méthodes (fonctions).
 * Les propriétés et les méthodes sont soumises à une visibilité (on appelle ça l'encapsulation).
 * Il existe 3 visibilités: 
 * - public: Un élément public est accessible partout dans le code (dans les class, sur l'index, ...). On peut afficher et modifier son information
 * - private: Un élément private n'est accessible que dans la class où il est définit. On ne peut donc pas l'utiliser sur l'index
 * - protected: 
 */
class MaClass {

    
    private $prop1 = "Coucou";

    private $prop2 = 13;

    private $prop3;

    public function hello ()
    {
        return "Hello World";
    }

    public function helloName ($name)
    {
        return "Hello $name";
    }

    public function getProp1 ()
    {
        // $this-> fait référence à l'objet qui est instancié et permet ainsi de récupérer les éléments de cet objet pour les utiliser dans lui-même
        return $this->prop1;
    }
}