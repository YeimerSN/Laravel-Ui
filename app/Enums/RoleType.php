<?php

namespace App\Enums;

enum RoleType: string
{
    // Enum with the roles supported for the application
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case USER = 'user';

    // Function to return the label of the role to be displayed
    public function roleLabel(){
        return match($this){
            self::ADMIN => 'Administrador',
            self::EDITOR => 'Editor',
            self::USER => 'Usuario',
        };
    }
}
