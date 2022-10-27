<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Ramsey\Uuid\Uuid;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function user() {

        return $this->belongsTo(User::class);
    }

    // protected static function booted(){
    //     static::creating(fn(User $user) => $user->uuid = (string) Uuid::uuid4());
    // }

}
