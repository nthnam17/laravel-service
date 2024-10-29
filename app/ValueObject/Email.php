<?php

namespace App\ValueObject;

final class Email
{
    public function __construct(private string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // throw new IncorrectEmailFormatException();
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
