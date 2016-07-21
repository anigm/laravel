<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Note extends Model
{
//    use SoftDeletes;
    protected $guarded = ['submit','tag_list'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\AdminUser');
    }
    public function palyers()
    {
        return $this->hasMany('NoteTag');
    }
    public static function last10()
    {
        $data= Note::select('id','title')
            ->orderBy('updated_at','desc')
            ->take(10)
            ->get();
        return $data;
    }
    public static function last5()
    {
        $data= Note::select('id','title')
            ->orderBy('updated_at','desc')
            ->take(5)
            ->get();
        return $data;
    }
    public static function scope($query, $arr)
    {
        if (!is_array($arr))
        {
            return $query;
        }
        foreach ($arr as $key => $value)
        {
            $query = $query->where($key, $value);
        }
        return $query;
    }

    public static function years()
    {
        $data = Note::select(DB::raw("DATE_FORMAT(updated_at, '%Y') years,COUNT(id) count"))
            ->groupBy('years')
            ->get();
        return $data;
    }
    public static function months($id)
    {
        $data = Note::select(DB::raw("DATE_FORMAT(updated_at,'%m') months,COUNT(id) count"))
            ->where(DB::raw("DATE_FORMAT(updated_at,'%Y')"),'=',$id)
            ->groupBy('months')
            ->get();
        return $data;
    }
    public static function days($id1,$id2)
    {
        $data = Note::select(DB::raw("DATE_FORMAT(updated_at,'%d') days,COUNT(id) count,id"))
            ->where(DB::raw("DATE_FORMAT(updated_at,'%Y-%m')"),'=',$id1.'-'.$id2)
            ->groupBy('days')
            ->get();
        return $data;
    }
    public static function archive($id)
    {
        $data = Note::select('*')
            ->where(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d')"),'=',$id)
            ->get();
        return $data;
    }
}