<?php
namespace App\Http\Controllers\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use Toastr;
use MCS\HtmlToPdf;
use Auth;
class ArticleController extends BaseController
{
    public function pdf()
    {
        try
        {
            $html = file_get_contents('demo.html');
            $pathToWkhtmltopdf = '/';
            $pdf = new HtmlToPdf($html, $pathToWkhtmltopdf);
            $pdf->setParam('grayscale');
            $pdf->setParam('orientation', 'landscape');
            $pdfString = $pdf->generate();
            header('Content-Type: application/pdf');
            die($pdfString);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        exit;
    }
    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(15);
        return view('admin.articles.index',compact('articles'));
    }
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        $categories='';
        //$categories = Category::getLeveledCategories();
        return view('admin.articles.create',compact('categories','tags'));
    }
    public function store(Request $request)
    {
        $article = Article::create(Input::get());
        $tag_lists = Input::get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if($article)
        {
            $this->attachTags($article, $tag_list);
            Toastr::success('文章添加成功!');
            return redirect('admin/article')->with('message', '文章添加成功！');
        }
        else
        {
            Toastr::error('文章添加失败!');
            return back()->withInput()->with('errors','文章添加失败！');
        }
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::getLeveledCategories();
        $tags = Tag::all();
        $article_tags = Article::findOrFail($id)->tags->toArray();
        foreach ($article_tags as $article_tag)
        {
            $ctags[]=$article_tag['pivot']['tag_id'];
        }
        $article_tags = empty($ctags) ? array('0') :$ctags;
        return view('admin.articles.edit',compact('categories','tags','article','article_tags'));
    }
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update(Input::get());
        $tag_lists = Input::get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if ($article->save())
        {
            $this->syncTags($article, $tag_list);
            Toastr::success('文章修改成功!');
            return redirect('admin/article')->with('message', '文章修改成功！');
        }
        else
        {
            Toastr::error('文章修改失败!');
            return Redirect::back()->withInput()->withErrors('文章修改失败！');
        }
    }
    public function destroy($id)
    {
        $destory = Article::findOrFail($id)->delete();
        if ($destory)
        {
            Toastr::success('文章移至回收站成功!');
            return redirect('admin/article')->with('message', '文章移至回收站成功！');
        }
        else
        {
            Toastr::error('文章移至回收站失败!');
            return Redirect::back()->withInput()->withErrors('文章移至回收站失败！');
        }
    }
    public function recycle()
    {
        $articles = Article::onlyTrashed()->paginate(15);
        return view('admin.articles.recycle',compact('articles'));
    }
    public function restore($id)
    {
        $restore = Article::withTrashed()->where('id', $id)->restore();
        if($restore)
        {
            Toastr::success('文章还原成功!');
            return redirect('admin/article')->with('message', '文章还原成功！');
        }
        else
        {
            Toastr::error('文章还原失败!');
            return Redirect::back()->withInput()->withErrors('文章还原失败！');
        }
    }
    public function  delete($id)
    {
        $delete = Article::withTrashed()->where('id', $id)->forceDelete();
        if($delete)
        {
            Toastr::success('文章删除成功!');
            return redirect('admin/article/recycle')->with('message', '文章删除成功！');
        }
        else
        {
            Toastr::error('文章删除失败!');
            return Redirect::back()->withInput()->withErrors('文章删除失败！');
        }
    }
    public function attachTags(Article $article, array $tags)
    {
        foreach ($tags as $key => $tag)
        {
            if (!is_numeric($tag))
            {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $article->tags()->attach($tags);
    }
    public function syncTags(Article $article, array $tags)
    {
        foreach ($tags as $key => $tag)
        {
            if (!is_numeric($tag))
            {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $article->tags()->sync($tags);
    }
}
