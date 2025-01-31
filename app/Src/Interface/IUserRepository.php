<?php

namespace App\Interface;

use App\Entities\User as EntitiesUser;
use Illuminate\Support\Collection;

interface IUserRepository extends IBaseRepository
{
    public function getUsers(?string $email, ?string $name): Collection;

    public function findUserById(string $id): ?EntitiesUser;

    public function emailExists(string $email): bool;

    public function storeUser(EntitiesUser $user): EntitiesUser;

    public function updateUser(EntitiesUser $user): void;

    public function deleteUser(string $id): void;
}
