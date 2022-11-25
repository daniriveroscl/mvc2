<?php
// MODELO de nuestra app
// Capa de datos
// BASE DE DATOS

class User
{
    const USERS = [
        array(1, 'Juan'),
        array(2, 'Ana'),
        array(3, 'Pepa'),
        array(4, 'Toni')
    ];

    public static function all()
    {
        return User::USERS; // Devuelve todos los usuarios
    }
    public static function find($id)
    {
        foreach (User::USERS as $key => $user) {
            if ($user[0] == $id) {
                return $user; // Devuelve usuario por id
            }
        }
        return null;
    }
}