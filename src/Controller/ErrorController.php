<?php
namespace App\Controller;

use Core\Controller\DefaultController;

class ErrorController extends DefaultController {

    /**
     * Affiche la page dédiées aux erreurs
     *
     * @param string $message
     * @param integer $code
     * @return void
     */
    public function error (string $message = "", $code = 0): void
    {
        $this->render("error/error", [
            "message" => $message,
            "code" => $code
        ]);
    }

    public function index () {}
    public function single (int $id) {}
    public function save (array $data) {}
    public function update (int $id, array $data) {}
    public function delete (int $id) {}
    public function test () {}
}