<?php

namespace App\Entities;

use App\ValueObject\Email;
use App\ValueObject\Name;
use App\ValueObject\Password;

class User
{
    public function __construct(
        public ?int $id,
        public Name $name,
        public Email $email,
        public ?Password $password = null,
        public bool $is_active = false
    ) {}

    // --- Business logic methods ---

    public function activate(): void
    {
        $this->is_active = true;
    }

    public function deactivate(): void
    {
        $this->is_active = false;
    }

    public function changePassword(Password $newPassword): void
    {
        $this->password = $newPassword;
    }

    public function changeEmail(Email $newEmail): void
    {
        $this->email = $newEmail;
    }

    public function changeName(Name $newName): void
    {
        $this->name = $newName;
    }

    // --- Getters ---
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getIsActive(): bool
    {
        return $this->is_active;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => (string)$this->getName(),
            'email' => (string)$this->getEmail(),
            'password' => (string)$this->getPassword(),
            'is_active' => $this->is_active,
        ];
    }
}
