<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Support\Facades\Input;
use App\Models\Blog;
use Breadcrumbs, Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Column;
use Kalnoy\Nestedset\Collection;
use App\Http\Requests\Admin\ColumnRequest;
class BlogController extends BaseController
{
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(8);
        return view('admin.blog.index',compact('blogs'));
    }
    public function create(Request $input)
    {
        //  http://192.168.0.144/plugin/ckeditor/plugins/image/images/noimage.png?t=EAPE
        $data = $input->only('parent_id');
        $columns = $this->getCategoryOptions();
        return view('admin.blog.create', compact('data', 'columns'));
    }
    public function store()
    {
        $parent_id=Input::get('parent_id');
        if($parent_id=='')
        {
            Toastr::error('栏目未选择!');
            return redirect('admin/blog')->with('message', '栏目未选择！');
        }
        $datetime=Input::get('datetime');
        if(!isset($datetime))
        {
            Toastr::error('请添加时间!');
            return redirect('admin/blog')->with('message', '添加失败！');
        }
        $file = Input::file('image');
        if(!isset($file))
        {
            Toastr::error('请添加图片!');
            return redirect('admin/blog')->with('message', '添加失败！');
        }
        $filesize=$file->getClientSize();
        if($filesize==0)
        {
            Toastr::error('上传图片最大2M!');
            return redirect('admin/blog')->with('message', '添加失败！');
        }
        $filename = $file->getClientOriginalName();
        $extension = $file -> getClientOriginalExtension();
        $picture = sha1($filename . time()) . '.' . $extension;
        $path=date("Y-m-d");
        $destinationPath = public_path() . '/uploads/'.$path.'/';
        $fileupload=Input::file('image')->move($destinationPath, $picture);
        if($fileupload)
        {
            if($extension=='jpg' OR $extension=='gif' OR $extension=='bmp')
            {
                $blogs = Blog::create(['title'=>Input::get('title'),'datetime'=>Input::get('datetime'),'tag'=>Input::get('tag'),'parent_id'=>Input::get('parent_id'),'description'=>Input::get('description'),'thumb'=>Input::get('thumb'),'image'=>'/uploads/'.$path.'/'.$picture]);
                Toastr::success('添加成功!');
                return redirect('admin/blog')->with('message', '添加成功！');
            }
            else
            {
                Toastr::error('添加失败!');
                return redirect('admin/blog')->with('message', '添加失败！');
            }
        }
        else
        {
            Toastr::error('添加失败!');
            return redirect('admin/blog')->with('message', '添加失败！');
        }
    }
    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        $column = Column::findOrFail($blogs->parent_id);
        $columns = $this->getCategoryOptions($column);
        return view('admin.blog.edit',compact('blogs','column','columns'));
    }
    public function update($id)
    {
        $datetime=Input::get('datetime');
        $hiddenimg=Input::get('hiddenimg');
        if(!isset($datetime))
        {
            Toastr::error('请添加时间!');
            return redirect('admin/blog')->with('message', '请添加时间！');
        }
        $file = Input::file('image');
        $thumbs = Input::get('thumbs');
        $istrue=@unlink($thumbs);
        if(!isset($file))
        {
            $blogs = Blog::findOrFail($id);
            $blog = $blogs->update(['title'=>Input::get('title'),'datetime'=>Input::get('datetime'),'tag'=>Input::get('tag'),'parent_id'=>Input::get('parent_id'),'description'=>Input::get('description'),'thumb'=>Input::get('thumb')]);
            if($blog)
            {
                Toastr::success('修改成功!');
                return redirect('admin/blog')->with('message', '修改成功！');
            }
            else
            {
                Toastr::error('修改失败!');
                return redirect('admin/blog')->with('message', '修改失败！');
            }

        }
        else
        {
            $filesize=$file->getClientSize();
            if($filesize==0)
            {
                Toastr::error('上传图片最大2M!');
                return redirect('admin/blog')->with('message', '添加失败！');
            }
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
            $path=date("Y-m-d");
            $destinationPath = public_path() . '/uploads/'.$path.'/';
            $fileupload=Input::file('image')->move($destinationPath, $picture);
            if($fileupload)
            {
                if($extension=='jpg' OR $extension=='gif' OR $extension=='bmp')
                {
                    @unlink(public_path($hiddenimg));
                    $blogs = Blog::findOrFail($id);
                    $blogs->update(['title'=>Input::get('title'),'datetime'=>Input::get('datetime'),'tag'=>Input::get('tag'),'description'=>Input::get('description'),'image'=>'/uploads/'.$path.'/'.$picture]);
                    Toastr::success('添加成功!');
                    return redirect('admin/blog')->with('message', '添加成功！');
                }
                else
                {
                    Toastr::error('添加失败!');
                    return redirect('admin/blog')->with('message', '添加失败！');
                }
            }
            else
            {
                Toastr::error('添加失败!');
                return redirect('admin/blog')->with('message', '添加失败！');
            }
        }
    }
    public function destroy($id)
    {
        $destory = Blog::findOrFail($id)->delete();
        if ($destory)
        {
            Toastr::success('博客移至回收站成功!');
            return redirect('admin/blog/recycle')->with('message', '博客移至回收站成功！');
        }
        else
        {
            Toastr::error('博客移至回收站失败!');
            return Redirect::back()->withInput()->withErrors('博客移至回收站失败！');
        }
    }
    public function recycle()
    {
        $blogs = Blog::onlyTrashed()->paginate(15);
        return view('admin.blog.recycle',compact('blogs'));
    }
    public function restore($id)
    {
        $restore = Blog::withTrashed()->where('id', $id)->restore();
        if($restore)
        {
            Toastr::success('文章还原成功!');
            return redirect('admin/blog')->with('message', '文章还原成功！');
        }
        else
        {
            Toastr::error('文章还原失败!');
            return Redirect::back()->withInput()->withErrors('文章还原失败！');
        }
    }
    public function delete($id)
    {
        $blogs = Blog::withTrashed()->where('id',$id)->get();
        $mystr1=$blogs->pluck('thumb');
        $mystr2=$blogs->pluck('image');
        $istrue1=@unlink(zkhyh($mystr1));
        $istrue2=@unlink(zkhyh($mystr2));
        if($istrue1 || $istrue2)
        {
            $delete = Blog::withTrashed()->where('id', $id)->forceDelete();
            if($delete)
            {
                Toastr::success('博客删除成功!');
                return redirect('admin/blog/recycle')->with('message', '博客删除成功！');
            }
            else
            {
                Toastr::error('博客删除失败!');
                return redirect('admin/blog/recycle')->with('message', '博客删除失败！');
            }
        }
        else
        {
            Toastr::error('博客删除失败!');
            return redirect('admin/blog/recycle')->with('message', '博客删除失败！');
        }
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
