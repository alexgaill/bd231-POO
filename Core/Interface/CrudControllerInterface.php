<?php
namespace Core\Interface;

interface CrudControllerInterface {

    public function index();

    public function single(int $id);

    public function save(array $data);

    public function update (int $id, array $data);

    public function delete (int $id);
}