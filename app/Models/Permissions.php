<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Permissions extends Model {
    use HasPermissions;

    protected $fillabe = [];

}
?>
