<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Support\Facades\Input;
use App\Models\One;
use Breadcrumbs, Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Image;
use Config;
class OneController extends BaseController
{
    public function index()
    {
        $ones = One::orderBy('id','desc')->paginate(15);
        return view('admin.one.index',compact('ones'));
    }
    public function create(Request $input)
    {
        return view('admin.one.create');
    }
    public function store()
    {
        $ones = One::create(['title'=>Input::get('title'),'datetime'=>Input::get('datetime'),'tag'=>Input::get('tag'),'description'=>Input::get('description'),'thumb'=>Input::get('thumb'),'file'=>Input::get('file'),'user_id'=>Input::get('user_id')]);
        if($ones)
        {
            Toastr::success('添加成功!');
            return redirect('admin/one')->with('message', '添加成功！');
        }
        else
        {
            Toastr::error('添加失败!');
            return redirect('admin/one')->with('message', '添加失败！');
        }
    }
    public function edit($id)
    {
        $ones = One::findOrFail($id);
        return view('admin.one.edit',compact('ones'));
    }
    public function update($id)
    {
//        $datetime=Input::get('datetime');
//        if(!isset($datetime))
//        {
//            Toastr::error('请添加时间!');
//            return redirect('admin/blog')->with('message', '请添加时间！');
//        }
        $ones = One::findOrFail($id);
        if($ones)
        {
            $thumb=Input::get('thumb');
            $thumbs=Input::get('thumbs');
            $file =Input::get('file');
            $files =Input::get('files');
            if($ones['thumb'])
            {
                if($thumbs!=$thumb)
                {
                    @unlink($ones['thumb']);
                    $thumb='';
                }
            }
            if($ones['file'])
            {
                if($files!=$file)
                {
                    @unlink($ones['file']);
                    $file='';
                }
            }
            $one = $ones->update(['title'=>Input::get('title'),'datetime'=>Input::get('datetime'),'tag'=>Input::get('tag'),'description'=>Input::get('description'),'thumb'=>$thumb,'file'=>$file,'user_id'=>Input::get('user_id')]);
            if($one)
            {
                Toastr::success('修改成功!');
                return redirect('admin/one')->with('message', '修改成功！');
            }
            else
            {
                Toastr::error('修改失败!');
                return redirect('admin/one')->with('message', '修改失败！');
            }
        }
        else
        {
            Toastr::error('非法操作!');
            return redirect('admin/one')->with('message', '单页非法操作！');
        }
    }
    public function destroy($id)
    {
        $destory = One::findOrFail($id)->delete();
        if ($destory)
        {
            Toastr::success('单页移至回收站成功!');
            return redirect('admin/one')->with('message', '单页移至回收站成功！');
        }
        else
        {
            Toastr::error('单页移至回收站失败!');
            return Redirect::back()->withInput()->withErrors('单页移至回收站失败！');
        }
    }
    public function recycle()
    {
        $ones = One::onlyTrashed()->paginate(15);
        return view('admin.one.recycle',compact('ones'));
    }
    public function restore($id)
    {
        $restore = One::withTrashed()->where('id', $id)->restore();
        if($restore)
        {
            Toastr::success('单页还原成功!');
            return redirect('admin/one')->with('message', '单页还原成功！');
        }
        else
        {
            Toastr::error('文章还原失败!');
            return Redirect::back()->withInput()->withErrors('单页还原失败！');
        }
    }
    public function delete($id)
    {
        $ones = One::withTrashed()->where('id',$id)->get();
        $mystr=$ones->pluck('thumb');
        $istrue=@unlink(zkhyh($mystr));
        if($istrue)
        {
            $delete = One::withTrashed()->where('id', $id)->forceDelete();
            if($delete)
            {
                Toastr::success('单页删除成功!');
                return redirect('admin/one/recycle')->with('message', '单页删除成功！');
            }
            else
            {
                Toastr::error('单页删除失败!');
                return redirect('admin/one/recycle')->with('message', '单页删除失败！');
            }
        }
        else
        {
            Toastr::error('单页删除失败!');
            return redirect('admin/one/recycle')->with('message', '单页删除失败！');
        }
    }
}
