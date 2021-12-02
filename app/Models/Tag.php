<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static where(string $string, string $string1, $id)
 * @method static findOrFail($id)
 */
class Tag extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_tag');
    }
}
