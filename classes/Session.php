<?php
class Session
{

    public function __construct()
    {
        session_start();
    }

    public function setLogIn($message)
    {
        $_SESSION['connected'] = $message;
    }

    public function setFlash($message)
    {
        $_SESSION['flash'] = $message;
    }
    public function flash()
    {
        if (isset($_SESSION['flash'])) {
            $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
    }

    public function notLogIn(): void
    {
        if (empty($_SESSION)) {
                redirect('login.php');
                exit();
            }
    }

    public function logOut()
    {
        session_destroy();
        redirect('login.php');
    }
}
