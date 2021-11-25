<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static findOrFail($id)
 * @method static where(string $string, string $string1)
 * @method static find(mixed $input)
 */
class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }
}
