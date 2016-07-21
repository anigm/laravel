<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    protected $guarded = ['submit','_token'];
//    use SoftDeletes;
    public static function getlist($id)
    {
        $data=Comment::select('*')
            ->where('list_id',$id)
            ->where('pid',0)
            ->orderBy('updated_at','desc')
            ->get();
        foreach($data as $key=>$value)
        {
            $data[$key]['comment']=Comment::select('*')
                ->where('pid',$value['id'])
                ->orderBy('updated_at','desc')
                ->get();
        }
        $datas=self::comments($data);
        return $data;
    }
    public static function comments($data)
    {
        foreach($data as $key=>$value)
        {
            foreach ($value['comment'] as $keys=>$values)
            {
                $data[$key]['comment'][$keys]['comments']=Comment::select('*')
                    ->where('pid',$values['id'])
                    ->orderBy('updated_at','desc')
                    ->get();
            }
        }
        return $data;
    }
    public static function listcomment($id)
    {
        $data=Comment::select('id')
            ->where('list_id',$id)
            ->count();
        return $data;
    }
  public static function tree($array,$child="child", $pid = null)
  {
    $temp = [];
    foreach ($array as $v)
    {
      if ($v['pid'] == $pid)
      {
        $v[$child] = self::tree($array,$child,$v['id']);
        $temp[] = $v;
      }
    }
    return $temp;
  }
  public static function traverseArray($array)
  {
    foreach ($array as $v)
    {
      echo "<div class='comment' style='width: 100%;margin: 10px;background: #EDEFF0;padding: 20px 10px;border: 1px solid #777;'>";
      echo $v['content'];
      if ($v['child'])
      {
        self::traverseArray($v['child']);
      }
      echo "</div>";

    }
  }
}