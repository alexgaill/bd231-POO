<?php
namespace Core\Interface;

/**
 * Une interface est un élément qui nous permet de définir des méthodes obligatoires à implémenter.
 * On se sert de schema pour créer nos class.
 */
interface UserInterface {

    public function getPassword();

    public function getRoles();
}