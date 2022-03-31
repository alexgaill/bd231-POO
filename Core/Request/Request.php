<?php
namespace Core\Request;

class Request {

    private static array $get;

    private static array $post;

    public static function createFromGlobals ()
    {
        self::createGet();
        self::createPost();
    }

    public static function createGet ()
    {
        if (isset($_GET['id'])) {
            if (is_numeric($_GET['id']) && $_GET['id'] > 0) {   
            } else {
                // TODO: erreur;
            }
        }

        if (isset($_GET['page'])) {
            if (!empty($_GET['page'] && is_string($_GET['page']))) {
            } else {
                // TODO: erreur;
            }
        }
        self::$get = $_GET;
    }

    public static function createPost ()
    {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value);
        }
        self::$post = $_POST;
    }

    public function query ()
    {
        return self::$get;
    }

    public function getContent()
    {
        return self::$post;
    }
}