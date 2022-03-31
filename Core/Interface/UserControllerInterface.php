<?php
namespace Core\Interface;

interface UserControllerInterface {

    public function signup(array $data);

    public function login(array $data);

    public function logout ();

}