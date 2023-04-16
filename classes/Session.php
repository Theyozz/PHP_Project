<?php

namespace App;
class Session
{

    public function __construct()
    {
        session_start();
    }

    public function setLogIn($message) : void
    {
        $_SESSION['connected'] = $message;
    }

    public function notLogIn(): void
    {
        if (empty($_SESSION)) {
                redirect('login.php');
                exit();
            }
    }

    public function logOut(): void
    {
        session_destroy();
        redirect('login.php');
    }
}
