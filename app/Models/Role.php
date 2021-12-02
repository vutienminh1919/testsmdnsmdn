<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class Role extends Model
{
    protected $fillable = [
        'name'

    ];
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);

    }
}
