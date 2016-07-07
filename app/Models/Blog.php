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
  //获取当前时间
//  public function freshTimestamp()
//  {
//    return time();
//  }
//  //避免转换时间戳为时间字符串
//  public function fromDateTime($value)
//  {
//    return $value;
//  }
//  //select的时候避免转换时间为Carbon
//  protected function asDateTime($value)
//  {
//	  return $value;
//  }
//  //从数据库获取的为获取时间戳格式
//  public function getDateFormat()
//  {
//    return 'U';
//  }
  public function column()
  {
    return $this->hasOne('App\Models\Column','parent_id','parent_id');
    //return $this->hasOne('App\Models\Column','parent_id');
  }
}