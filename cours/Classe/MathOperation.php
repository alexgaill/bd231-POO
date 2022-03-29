<?php
namespace Classe;
/**
 * Une class est "un moule" qui permet de créer des objets. 
 * On s'en sert pour définir les informations rattachées à une aprtie de notre code.
 * Ici on va stocker toutes les fonctions de calcul.
 */
class MathOperation {

    function addition (... $nb)
    {
        $total = 0;
        foreach ($nb as $value) {
            $total += $value;
        }
        return $total;
    }
}