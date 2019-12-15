<?php

namespace App\Model;

use App\Book;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey='id';

    protected $fillable = [
        'name', 'phone_number', 'password','national_code'
    ];

    protected $hidden = [
        'password',
    ];

    public function books()
    {
        return $this->hasMany(Book::class,'user_id');
    }

}
