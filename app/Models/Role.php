<?php
namespace App\Models;
use Zizaco\Entrust\EntrustRole;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;
    protected $fillable = ['name', 'display_name', 'description'];
    public function users()
    {
        return $this->belongsToMany('App\Models\AdminUser');
    }
}