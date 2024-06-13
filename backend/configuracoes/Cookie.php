<?php
// Classe responsável pelo armazenamento, no caso via cookies.
class Cookie
{
    public static function set($nome, $valor)
    {
        setcookie($nome, json_encode($valor), time() + (86400 * 30), "/");
    }

    public static function get($chave)
    {
        if (isset($_COOKIE[$chave])) {
            return json_decode($_COOKIE[$chave]);
        }
        return null;
    }

    public static function set_array($chave, $array)
    {
        setcookie($chave, serialize($array), time() + (86400 * 30), "/");
    }

    public static function get_array($chave)
    {
        if (isset($_COOKIE[$chave])) {
            return unserialize($_COOKIE[$chave]);
        }
        return null;
    }

    public static function vazio($chave)
    {
        if (isset($_COOKIE[$chave])) {
            return false;
        }
        return true;
    }
}