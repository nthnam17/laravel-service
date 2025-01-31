<?php 

namespace App\Repository;

namespace Src\User\Infrastructure\Repositories;

use App\DTOs\UserDTO;
use App\Entities\User as EntitiesUser;
use App\Interface\IUserRepository;
use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements IUserRepository
{

    public function getModel(): string
    {
        return User::class;
    }

    public function __construct() 
    {
    }

    public function getUsers(?string $email, ?string $name): Collection
    {
        $query = $this->model
            ->select(
                    'id',
                    'email',
                    'name',
                    'password',
                    'is_admin',
                    'is_active'
            );

        if($email) {
            $query->where('email', $email);
        }

        if($name) {
            $query->where('name', 'LIKE', "%$name%");
        }

        return $query->get()->map(function ($eloquent) {
            
            return UserDTO::listUser($eloquent);
        });
    }

    public function findUserById(string $id): ?EntitiesUser
    {
        $eloquent = $this->model->find($id);
        return $eloquent ? UserDTO::listUser($eloquent) : null;
    }

    public function emailExists(string $email): bool
    {
        return $this->model->where('email', $email)->exists();
    }

    public function storeUser(EntitiesUser $user): EntitiesUser
    {
        $userEloquent = $this->model->create($user->toArray());
        return $this->model->create($userEloquent);
    }

    public function updateUser(EntitiesUser $user): void
    {
        $this->model->find($user->id)->update($user->toArray());
    }

    public function deleteUser(string $id): void
    {
        $this->model->find($id)->delete();
    }
}
?>