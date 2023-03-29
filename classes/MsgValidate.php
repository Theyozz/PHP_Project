<?php

namespace App;
class MsgValidate
{
    public const CREATE_USER = 1;
    public const DELETE_USER = 2;

    public static function getValidateMessage(int $code): string
    {
        switch ($code) {
            case self::CREATE_USER:
                return "User well created";
                break;
            case self::DELETE_USER:
                return "User well deleted";
                break;
            default:
                return "VALIDATE";
        }
    }
}