<?php
namespace App\Http\Controllers\Admin;
use App\Models\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Breadcrumbs, Toastr;
class TagController extends BaseController
{
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->get();
        return view('admin.tags.index',compact('tags'));
    }
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $articles = Article::all();
        foreach($articles as $article)
        {
            $article_ids[] = $article->id;
        }
        //删除与文章关联的tag
        $tag->articles()->detach($article_ids);
        if($tag->delete())
        {
            Toastr::success('删除成功!');
            return redirect('admin/tags')->with('message', '标签删除成功！');
        }
        else
        {
            Toastr::error('删除失败!');
            return back()->withInput()->with('errors','标签删除失败！');
        }
    }
    public function edit($id)
    {
        $tags = Tag::findOrFail($id);
        return view('admin.tags.edit',compact('tags'));
    }
    public function update($id)
    {
        $edittime=Carbon::now();
        $tags = Tag::findOrFail($id);
        $data=array('edittime'=>$edittime,'name'=>Input::get('name'));
        $tags->update($data);
        if($tags)
        {
            Toastr::success('更新发布!');
            return redirect('admin/tags')->with('message', '标签更新发布！');
        }
        else
        {
            Toastr::error('更新失败!');
            return back()->withInput()->with('errors','标签更新失败！');
        }
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store()
    {
        $addtime=Carbon::now();
        $data=array('addtime'=>$addtime,'name'=>Input::get('name'));
        $tags = Tag::create($data);
        if($tags)
        {
            Toastr::success('添加发布!');
            return redirect('admin/tags')->with('message', '标签添加发布！');
        }
        else
        {
            Toastr::error('添加失败!');
            return back()->withInput()->with('errors','标签添加失败！');
        }
    }
}