<?php
namespace App\Http\Controllers\Admin;
use App\Models\Role;
use Doctrine\DBAL\Cache\CacheException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use Toastr;
use MCS\HtmlToPdf;
use Auth;
class NoteController extends BaseController
{
    public function index()
    {
        $datas = Note::orderBy('id','desc')->paginate(env('page'));
        foreach($datas as $key)
        {
            if($key->category_id==Category::getone($key->category_id)[0]['id'])
            {
                $category_name[]=Category::getone($key->category_id)[0]['name'];
            }
            else
            {
                $category_name[]='';
            }
        }
        return view('admin.note.index',compact('datas','category_name'));
    }
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        $categories = Category::getLeveledCategories(0);
        return view('admin.note.create',compact('categories','tags'));
    }
    public function store(Request $request)
    {
        $note = Note::create(Input::get());
        $tag_lists = Input::get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if($note)
        {
            $this->attachTags($note, $tag_list);
            Toastr::success('添加成功!');
            return redirect('admin/note')->with('message', '笔记添加成功！');
        }
        else
        {
            Toastr::error('添加失败!');
            return back()->withInput()->with('errors','笔记添加失败！');
        }
    }
    public function edit($id)
    {
        $data = Note::findOrFail($id);
        $categories = Category::getLeveledCategories(0);
        $tags = Tag::all();
        $article_tags = Note::findOrFail($id)->tags->toArray();
        foreach ($article_tags as $article_tag)
        {
            $ctags[]=$article_tag['pivot']['tag_id'];
        }
        $article_tags = empty($ctags) ? array('0') :$ctags;
        return view('admin.note.edit',compact('categories','tags','data','article_tags'));
    }
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update(Input::get());
        $tag_lists = Input::get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if ($note->save())
        {
            $this->syncTags($note, $tag_list);
            Toastr::success('修改成功!');
            return redirect('admin/note')->with('message', '笔记修改成功！');
        }
        else
        {
            Toastr::error('修改失败!');
            return Redirect::back()->withInput()->withErrors('笔记修改失败！');
        }
    }
    public function destroy($id)
    {
        $destory = Note::findOrFail($id)->delete();
        if ($destory)
        {
            Toastr::success('移至回收站成功!');
            return redirect('admin/note')->with('message', '笔记移至回收站成功！');
        }
        else
        {
            Toastr::error('移至回收站失败!');
            return Redirect::back()->withInput()->withErrors('笔记移至回收站失败！');
        }
    }
    public function recycle()
    {
        $datas = Note::onlyTrashed()->paginate(env('page'));
        return view('admin.note.recycle',compact('datas'));
    }
    public function restore($id)
    {
        $restore = Note::withTrashed()->where('id', $id)->restore();
        if($restore)
        {
            Toastr::success('还原成功!');
            return redirect('admin/note')->with('message', '笔记还原成功！');
        }
        else
        {
            Toastr::error('还原失败!');
            return Redirect::back()->withInput()->withErrors('笔记还原失败！');
        }
    }
    public function  delete($id)
    {
        $delete = Note::withTrashed()->where('id', $id)->forceDelete();
        if($delete)
        {
            Toastr::success('删除成功!');
            return redirect('admin/note/recycle')->with('message', '笔记删除成功！');
        }
        else
        {
            Toastr::error('删除失败!');
            return Redirect::back()->withInput()->withErrors('笔记删除失败！');
        }
    }
    public function attachTags(Note $note, array $tags)
    {
        foreach ($tags as $key => $tag)
        {
            if (!is_numeric($tag))
            {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $note->tags()->attach($tags);
    }
    public function syncTags(Note $note, array $tags)
    {
        foreach ($tags as $key => $tag)
        {
            if (!is_numeric($tag))
            {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $note->tags()->sync($tags);
    }
}
