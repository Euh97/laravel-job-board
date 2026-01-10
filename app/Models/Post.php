<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['title', 'body', 'author','published','user_id']; //fields can be updated

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class); // to define many-to-many relationship : y3ni tags can be associated with multiple posts, by2dr yjib related tags l elo 3n tari2 table post_tag
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
