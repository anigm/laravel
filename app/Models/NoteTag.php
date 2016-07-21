<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class NoteTag extends Model
{
    public $table='note_tag';
//    public function belongsToNote()
//    {
//        return NoteTag::belongsTo('App\Models\Tag', 'note_id', 'id');
//        //return $this->belongsTo('Note', 'note_id', 'id');
//    }
    public static function notetags($id)
    {
        $article_tags= NoteTag::select('tag_id')
            ->where('note_id',$id)
            ->orderBy('id','desc')
            ->get()
        ;
        return $article_tags;
    }
    public static function notetagall($id)
    {
        $noteids= NoteTag::select('note_id')
            ->where('tag_id',$id)
            ->orderBy('id','desc')
            ->get()
        ;
        return $noteids;
    }
    public static function count()
    {
        $data = NoteTag::select(DB::raw('count(note_id) as note_id,tag_id'))
            ->groupBy('tag_id')
            ->get();
        return $data;
    }
}