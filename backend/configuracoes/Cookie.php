<?php

class Cookie
{
    public static function set($nome, $valor)
    {
        setcookie($nome, $valor, time() + (86400 * 30), "/");
    }

    public static function get($chave)
    {
        if (isset($_COOKIE[$chave])) {
            return $_COOKIE[$chave];
        }
        return null;
    }

    public static function get_int($chave)
    {
        return self::get($chave) !== null ? intval(self::get($chave)) : null;
    }
}