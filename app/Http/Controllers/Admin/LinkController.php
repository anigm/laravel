<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Support\Facades\Input;
use App\Models\Link;
use Breadcrumbs, Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Image;
use Config;
class LinkController extends BaseController
{
//    public function __construct()
//    {
//        parent::__construct();
//        Breadcrumbs::setView('admin._partials.breadcrumbs');
//        Breadcrumbs::register('link', function ($breadcrumbs)
//        {
//            $breadcrumbs->parent('dashboard');
//            $breadcrumbs->push('友情链接', route('admin.link.index'));
//        });
//    }
    public function index()
    {
        $links = Link::orderBy('id','desc')->paginate(15);
        return view('admin.link.index',compact('links'));
    }
    public function create(Request $input)
    {
//        Breadcrumbs::register('create', function ($breadcrumbs)
//        {
//            $breadcrumbs->parent('link');
//            $breadcrumbs->push('新建友情链接', route('admin.link.create'));
//        });
        return view('admin.link.create');
    }
    public function store()
    {
        $file = Input::file('image');
        if($file)
        {
            $filesize=$file->getClientSize();
            if($filesize==0)
            {
                Toastr::error('上传图片最大2M!');
                return redirect('admin/link')->with('message', '添加失败！');
            }
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            if (!in_array($extension, array('jpg', 'gif', 'png','bmp')))
            {
                Toastr::error('添加失败,图片格式不支持!');
                return redirect('admin/link')->with('message', '添加失败,图片格式不支持！');
            }
            $picture = sha1($filename . time()) . '.' . $extension;
            $path=date("Y-m-d");
            $destinationPath = public_path() . '/uploads/'.$path.'/';
            //mkdir($destinationPath);
            $fileupload=Image::make($file->getRealPath())->resize(200,200)->save($destinationPath.$picture);
            if($fileupload)
            {
                $blogs = Link::create(['name'=>Input::get('name'),'url'=>Input::get('url'),'image'=>'uploads/'.$path.'/'.$picture]);
                Toastr::success('添加成功!');
                return redirect('admin/link')->with('message', '添加成功！');
            }
            else
            {
                Toastr::error('添加失败!');
                return redirect('admin/link')->with('message', '添加失败！');
            }
        }
        else
        {
            $blogs = Link::create(['name'=>Input::get('name'),'url'=>Input::get('url')]);
            if($blogs)
            {
                Toastr::success('添加成功!');
                return redirect('admin/link')->with('message', '添加成功！');
            }
            else
            {
                Toastr::error('添加失败!');
                return redirect('admin/link')->with('message', '添加失败！');
            }
        }
    }
    public function edit($id)
    {
        $links = Link::findOrFail($id);
        return view('admin.link.edit',compact('links'));
    }
    public function update($id)
    {
        $hiddenimg=Input::get('hiddenimg');
        $file = Input::file('image');
        if($file)
        {
            $filesize=$file->getClientSize();
            if($filesize==0)
            {
                Toastr::error('上传图片最大2M!');
                return redirect('admin/link')->with('message', '添加失败！');
            }
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            if (!in_array($extension, array('jpg', 'gif', 'png','bmp')))
            {
                Toastr::error('添加失败,图片格式不支持!');
                return redirect('admin/link')->with('message', '添加失败,图片格式不支持！');
            }
            $picture = sha1($filename . time()) . '.' . $extension;
            $path=date("Y-m-d");
            $destinationPath = public_path() . '/uploads/'.$path.'/';
            $fileupload=Image::make($file->getRealPath())->resize(200,200)->save($destinationPath.$picture);
            if($fileupload)
            {
                $links = Link::findOrFail($id);
                $link = $links->update(['name'=>Input::get('name'),'url'=>Input::get('url'),'image'=>'uploads/'.$path.'/'.$picture]);
                if($link)
                {
                    if($hiddenimg)
                    {
                        $istrue=@unlink($hiddenimg);
                    }
                    Toastr::success('修改成功!');
                    return redirect('admin/link')->with('message', '修改成功！');
                }
                else
                {
                    Toastr::error('修改失败!');
                    return redirect('admin/link')->with('message', '修改失败！');
                }
            }
            else
            {
                Toastr::error('修改失败!');
                return redirect('admin/link')->with('message', '修改失败！');
            }
        }
        else
        {
            $links = Link::findOrFail($id);
            $link = $links->update(['name'=>Input::get('name'),'url'=>Input::get('url'),'image'=>null]);
            if($link)
            {
                if($hiddenimg)
                {
                    $istrue=@unlink($hiddenimg);
                }
                Toastr::success('修改成功!');
                return redirect('admin/link')->with('message', '修改成功！');
            }
            else
            {
                Toastr::error('修改失败!');
                return redirect('admin/link')->with('message', '修改失败！');
            }
        }
    }
    public function destroy($id)
    {
        $destory = Link::findOrFail($id)->delete();
        if ($destory)
        {
            Toastr::success('移至回收站成功!');
            return redirect('admin/link')->with('message', '移至回收站成功！');
        }
        else
        {
            Toastr::error('移至回收站失败!');
            return redirect('admin/link')->with('message', '移至回收站失败！');
        }
    }
    public function recycle()
    {
        $links = Link::onlyTrashed()->paginate(15);
        return view('admin.link.recycle',compact('links'));
    }
    public function restore($id)
    {
        $restore = Link::withTrashed()->where('id', $id)->restore();
        if($restore)
        {
            Toastr::success('还原成功!');
            return redirect('admin/link')->with('message', '还原成功！');
        }
        else
        {
            Toastr::error('还原失败!');
            return Redirect::back()->withInput()->withErrors('还原失败！');
        }
    }
    public function delete($id)
    {
        $links = Link::withTrashed()->where('id',$id)->get();
        $mystr=$links->pluck('image');
        $istrue=@unlink(zkhyh($mystr));
        if($istrue)
        {
            $delete = Link::withTrashed()->where('id', $id)->forceDelete();
            if($delete)
            {
                Toastr::success('删除成功!');
                return redirect('admin/link')->with('message', '删除成功！');
            }
            else
            {
                Toastr::error('删除失败!');
                return redirect('admin/link')->with('message', '删除失败！');
            }
        }
        else
        {
            Toastr::error('删除失败!');
            return redirect('admin/link')->with('message', '删除失败！');
        }
    }
}
