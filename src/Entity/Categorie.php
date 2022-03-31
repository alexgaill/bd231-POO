<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

/**
 * Représentation de la table catégorie de la BDD
 */
final class Categorie extends DefaultEntity{

    private readonly int $id;

    private string $name;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Méthode magique appelée quand on utilise l'objet comme une fonction
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            "name" => $this->getName()
        ];
    }
}