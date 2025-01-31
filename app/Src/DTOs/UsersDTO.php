<?php
namespace App\DTOs;

class UserDTO {

    public function __construct(
        // public int $id,
        public string $name,
        public string $username,
        public string $password,
        // public string $email_verified_at,
        public string $email,
        // public string $remember_token,
        public string $role_code,
    )
    {


    }

    public static function createUser (string $name,string $username, string $password, string $email, string $role_code) :self {
        return new self(
            name: $name,
            username: $username,
            password: $password,
            email: $email,
            role_code: $role_code
        );
    }

    public static function listUser(mixed $entity) {
        $resul[] = [
            'id' => $entity->id,
            'name' => $entity->name,
            'email' => $entity->email,
            'role' => $entity->role
        ];
    }

    public static function toResponse() {
        
    }

}
?>
