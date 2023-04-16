<?php

namespace App;

class User 
{
    private string $pseudo;
    private string $mail;
    private string $pass;
    private string $confirmPass;

    public function __construct(string $pseudo,string $pass,?string $mail = "",?string $confirmPass = "")
    {
        $this->pseudo = $pseudo;
        $this->pass = $pass;
        $this->mail = $mail;
        $this->confirmPass = $confirmPass;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getConfirmPass()
    {
        return $this->confirmPass;
    }

}