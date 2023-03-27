<?php
class MsgValidate
{
    public const CREATE_USER = 1;

    public static function getValidateMessage(int $code): string
    {
        switch ($code) {
            case self::CREATE_USER:
                return "User well created";
                break;
            default:
                return "VALIDATE";
        }
    }
}