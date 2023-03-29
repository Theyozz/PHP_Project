<?php

namespace App;

class User 
{
    private string $pseudo;
    private string $mail;
    private string $pass;

    public function __construct(string $pseudo,string $mail,string $pass)
    {
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->pass = $pass;
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
}