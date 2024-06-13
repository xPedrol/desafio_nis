<?php

class Cookie
{
    public static function set($nome, $valor)
    {
        setcookie($nome, serialize($valor), time() + (86400 * 30), "/");
    }

    public static function get($chave)
    {
        if (isset($_COOKIE[$chave])) {
            return unserialize($_COOKIE[$chave]);
        }
        return null;
    }
}