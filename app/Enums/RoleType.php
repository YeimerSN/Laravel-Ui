<?php

namespace App\Enums;

enum RoleType: string
{
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case USER = 'user';

    public function roleLabel(){
        return match($this){
            self::ADMIN => 'Administrador',
            self::EDITOR => 'Editor',
            self::USER => 'Usuario',
        };
    }
}
