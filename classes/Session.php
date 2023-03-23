<?php
class Session
{

    public function __construct()
    {
        session_start();
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
}
