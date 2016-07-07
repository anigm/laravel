<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Column;
use App\Models\Blog;
use App\Models\One;
use Kalnoy\Nestedset\Collection;
use App\Http\Requests\Admin\ColumnRequest;
class IndexController extends Controller
{
  public function index()
  {
    $column = Column::get()->toTree();
    $blogs = Blog::orderBy('id','desc')->paginate(4);
    return view('skin.index',compact('blogs','column'));
  }
  public function lists($id)
  {
    $column = Column::get()->toTree();
    $blogs = Blog::findOrFail($id);
    //$column = Column::findOrFail($blogs->parent_id);
    //$columns = $this->getCategoryOptions($column);
    $prevs = Blog::find($this->getPrevId($id));
    $nexts = Blog::find($this->getNextId($id));
    return view('skin.list',compact('blogs','column','columns','prevs','nexts'));
  }
  public function column($id)
  {
    $column=Column::findOrFail($id);
    $blogs = Blog::with('column')->where('parent_id','=',$id)->latest()->paginate(2);
    return view('skin.column',compact('blogs','column'));
  }
  public function about($id)
  {
    $ones = One::findOrFail($id);
    return view('skin.about',compact('ones'));
  }
  protected function getPrevId($id)
  {
    return Blog::where('id', '<', $id)->max('id');
  }
  protected function getNextId($id)
  {
    return Blog::where('id', '>', $id)->min('id');
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
