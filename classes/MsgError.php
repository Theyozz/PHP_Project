<?php

namespace App;
class MsgError
{
    public const PASS_PSEUDO_INVALID = 1;
    public const DUPLICATE_PSEUDO = 2;
    public const DUPLICATE_EMAIL = 3;
    public const ACCOUNT_CREATION_IMPOSSIBLE = 4;

    public static function getErrorMessage(int $code): string
    {
        switch ($code) {
            case self::PASS_PSEUDO_INVALID:
                return "Pseudo or Password invalid";
                break;
            case self::DUPLICATE_PSEUDO:
                return "Pseudo already used";
                break;
            case self::DUPLICATE_EMAIL:
                return "Email already used";
                break;
            case self::ACCOUNT_CREATION_IMPOSSIBLE :
                return "Impossible to create an account due to a pseudo already taken";
                break;
            default:
                return "ERROR ERROR ERROR";
        }
    }
}
