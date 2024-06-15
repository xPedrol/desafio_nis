<?php

// Classe responsável pelo armazenamento, no caso via cookies.
class Cookie
{
    public static function set(string $chave, string $valor): void
    {
        setcookie($chave, json_encode($valor), time() + (86400 * 30), "/");
    }

    public static function get(string $chave)
    {
        if (isset($_COOKIE[$chave])) {
            return json_decode($_COOKIE[$chave]);
        }
        return null;
    }

    public static function set_array(string $chave, array $array): bool
    {
        return setcookie($chave, serialize($array), time() + (86400 * 30), "/");
    }

    public static function get_array(string $chave)
    {
        if (isset($_COOKIE[$chave])) {
            return unserialize($_COOKIE[$chave]);
        }
        return null;
    }

    public static function vazio(string $chave): bool
    {
        if (isset($_COOKIE[$chave])) {
            return false;
        }
        return true;
    }
}