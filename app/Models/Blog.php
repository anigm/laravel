<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
  use SoftDeletes;
  //public $timestamps = false;
  protected $dates = ['deleted_at'];
  protected $fillable = ['title','description','image','tag','datetime','thumb','parent_id'];
  public function column()
  {
    return $this->hasOne('App\Models\Column','parent_id','parent_id');
  }
}