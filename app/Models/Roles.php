<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Roles extends Model {
    use HasRoles;

    protected $fillable = ['id','name', 'guard_name'];
}

?>
