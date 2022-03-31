<?php
namespace Core\Controller;

class DefaultController {

    public function render (string $view, array $params = []): void
    {
        ob_start();
            extract($params);
            if (file_exists(ROOT . "/templates/$view.phtml")) {
                require ROOT . "/templates/$view.phtml";
            } else {
                throw new \Exception("Le template demandé n'existe pas", 1);
            }
        $content = ob_get_clean();
        require ROOT . "/templates/base.phtml";
    }
}