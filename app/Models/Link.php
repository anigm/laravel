<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Link extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','url','image'];
    public static function links()
    {
        $data= Link::select('*')
            ->orderBy('updated_at','desc')
            ->take(10)
            ->get();
        return $data;
    }
}