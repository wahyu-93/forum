<?php

namespace App\Models\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'user_id'];
    protected $with = ['user'];

    public function getRouteKeyName()
    {
        return 'hash';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
