<?php
namespace App\Models;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminUser extends Authenticatable
{
    use EntrustUserTrait;
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_super',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
