<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','addtime','edittime'];
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }
}