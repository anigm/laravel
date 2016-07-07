<?php
namespace App\Http\Controllers\Admin;
use App\Models\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Input;
use Breadcrumbs, Toastr;
class TagController extends BaseController
{
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->paginate(15);
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
            Toastr::success('标签删除成功!');
            return redirect('admin/tags')->with('message', '标签删除成功！');
        }
        else
        {
            Toastr::error('标签删除失败!');
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
        $tags = Tag::findOrFail($id);
        $tags->update(Input::get());
        if($tags)
        {
            Toastr::success('标签更新发布!');
            return redirect('admin/tags')->with('message', '标签更新发布！');
        }
        else
        {
            Toastr::error('标签更新失败!');
            return back()->withInput()->with('errors','标签更新失败！');
        }
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store()
    {
        $tags = Tag::create(Input::get());
        if($tags)
        {
            Toastr::success('标签添加发布!');
            return redirect('admin/tags')->with('message', '标签添加发布！');
        }
        else
        {
            Toastr::error('标签添加失败!');
            return back()->withInput()->with('errors','标签添加失败！');
        }
    }
}