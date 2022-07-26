<?php

namespace App\Models\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Thread extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];
    protected $with = ['tag', 'user'];

    public function searchableAs()
    {
        return 'threads';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('created_at', 'desc');
    }

    public function answer()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }
}
