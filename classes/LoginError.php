<?php
class LoginError
{
    public const PASS_PSEUDO_INVALID = 1;

    public static function getErrorMessage(int $code): string
    {
        switch ($code) {
            case self::PASS_PSEUDO_INVALID:
                return "Pseudo or Password invalid";
                break;
            default:
                return "ERROR ERROR ERROR";
        }
    }
}
