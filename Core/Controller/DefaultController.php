<?php
namespace Core\Controller;

class DefaultController {

    public function render (string $view, array $params = []): void
    {
        ob_start();
            extract($params);
            require ROOT . "/templates/$view.phtml";
        $content = ob_get_clean();
        require ROOT . "/templates/base.phtml";
    }
}