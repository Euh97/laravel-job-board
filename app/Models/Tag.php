<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tag extends Model
{
    use HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['title'];

    public function posts()
    {
        return $this->belongsToMany(Post::class); // to define many-to-many relationship : y3ni posts can be associated with multiple tags, by2dr yjib related posts l elo 3n tari2 table post_tag
    }
}
