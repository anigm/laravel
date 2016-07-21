<?php
namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Column;
use App\Models\Category;
use App\Models\Blog;
use App\Models\One;
use App\Models\Note;
use App\Models\NoteTag;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class IndexController extends Controller
{
  public function theme()
  {
    return $theme=config('app.theme');
  }
  public function index()
  {
    $theme=$this->theme();
    $datas= Note::orderBy('id','desc')->paginate(5);
    return view('theme.'.$theme.'.index',compact('datas'));
  }
  public function category($id)
  {
    $theme=$this->theme();
    $datas = Note::where('category_id',$id)->orderBy('id','desc')->paginate(5);
    return view('theme.'.$theme.'.category',compact('datas'));
  }
  public function guestbook()
  {
    $id=999;
    $theme=$this->theme();
    $comment=Comment::getlist(999);
    $commentcount=Comment::listcomment(999);
    return view('theme.'.$theme.'.guestbook',compact('datas','id','comment','commentcount'));
  }
  public function comment($id)
  {

    switch ($id)
    {
      case '999';
        $comment = Comment::create(Input::get());
        if($comment)
        {
          return redirect('guestbook/')->with('message', '评论成功！');
        }
        else
        {
          return redirect('guestbook/')->with('message', '评论失败！');
        }
      break;
      default;
        $comment = Comment::create(Input::get());
        if($comment)
        {
          return redirect('list/'.$id)->with('message', '评论成功！');
        }
        else
        {
          return redirect('list/'.$id)->with('message', '评论失败！');
        }
      break;
    }
  }
  public function lists($id)
  {
    $theme=$this->theme();
    $note= Note::findOrFail($id);
    $prevs = Note::find($this->getPrevId($id));
    $nexts = Note::find($this->getNextId($id));
    $rands= $this->randnote();
    $comment=Comment::getlist($id);
    $commentcount=Comment::listcomment($id);
    return view('theme.'.$theme.'.list',compact('note','prevs','nexts','rands','id','comment','commentcount'));
  }
  public function tag($id)
  {
    $theme=$this->theme();
    $tags=NoteTag::notetagall($id);
    if(count($tags)>0)
    {
      foreach($tags as $key)
      {
        $note[]=$key['note_id'];
      }
      $datas = Note::whereIn('id',$note)->orderBy('id','desc')->paginate(5);
      return view('theme.'.$theme.'.tag',compact('datas','tags'));
    }
    else
    {
      $datas=array();
      $tags=array();
      return view('theme.'.$theme.'.tag',compact('datas','tags'));
    }
  }
  public function archives()
  {
    $theme=$this->theme();
    return view('theme.'.$theme.'.archives');
  }
  public function archive($id)
  {
    $theme=$this->theme();
    $datas = Note::where(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d')"),'=',$id)->orderBy('id','desc')->paginate(5);
    return view('theme.'.$theme.'.archive',compact('datas'));
  }
  public function tags()
  {
    $theme=$this->theme();
    return view('theme.'.$theme.'.tags');
  }
  public function column($id)
  {
    $column=Column::findOrFail($id);
    $blogs = Blog::with('column')->where('parent_id','=',$id)->latest()->paginate(2);
    return view('skin.column',compact('blogs','column'));
  }
  public function about($id)
  {
    $theme=$this->theme();
    $ones = One::findOrFail($id);
    return view('theme.'.$theme.'.about',compact('ones'));
  }
  protected function getPrevId($id)
  {
    return Note::where('id', '<', $id)->max('id');
  }
  protected function randnote()
  {
    $data = Note::orderBy(\DB::raw('RAND()'))
        ->take(5)
        ->get();
    return $data;
  }
  protected function getNextId($id)
  {
    return Note::where('id', '>', $id)->min('id');
  }
  protected function makeOptions(Collection $items)
  {
    $options = [ '' => '请选择栏目' ];
    foreach ($items as $item)
    {
      $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->title;
    }
    return $options;
  }
  protected function getCategoryOptions($except = null)
  {
    $query = Column::select('id', 'title')->withDepth();
    if ($except)
    {
      $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
    }
    return $this->makeOptions($query->get());
  }
}
//  {!! $note->render() !!}