<?php
namespace App\Models;
use App\Models\NoteTag;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','addtime','edittime'];
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }
//    public function hasManyPays()
//    {
//        return $this->hasMany('App\Models\NoteTag','note_id', 'id');
//    }
    public static function getname($id)
    {
        $arrs=NoteTag::notetags($id);
        foreach ($arrs as $arr)
        {
            $data[]= Tag::select('id','name')
                ->where('id',$arr['tag_id'])
                ->orderBy('id','desc')
                ->get();
        }
        return $data;
    }
    public static function getall()
    {
        $data= Tag::select('id','name')
            ->orderBy('id','desc')
            ->get();
        return $data;
    }
}