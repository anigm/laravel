<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class Category extends Model
{
    public $timestamps = false;
    protected $guarded = ['submit'];
    //protected $fillable = ['id','pid','name','slug','sort'];
    public function articles()
    {
        return $this->hasMany('App\Models\Article','category_id','id');
    }
    static public $treeList = array();
    public static function getLeveledCategories($id)
    {
        $categories = Category::all();
        if($id==0)
        {
            return self::tree($categories,0);
        }
        else
        {
            return self::tree($categories,$id);
        }
    }
    public static function tree(&$data,$pid = 0,$count = 1)
    {
        foreach ($data as $key => $value)
        {
            if($value['pid']==$pid){
                $value['count'] = $count;
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['id'],$count+1);
            }
        }
        return self::$treeList ;
    }
    public static function getone($id)
    {
        $categories= Category::select('id','name')
            ->where('id',$id)
            ->orderBy('id','desc')
            ->take(1)
            ->get();
        return $categories;
    }
}