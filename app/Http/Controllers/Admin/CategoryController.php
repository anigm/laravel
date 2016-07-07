<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Toastr;
class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::getLeveledCategories(0);
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        $categories = Category::getLeveledCategories(0);
        return view('admin.categories.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $category = Category::create(Input::get());
        if($category)
        {
            Toastr::success('添加成功!');
            return redirect('admin/category')->with('message', '分类添加成功！');
        }
        else
        {
            Toastr::error('添加失败!');
            return back()->withInput()->with('errors','分类添加失败！');
        }
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::getLeveledCategories(0);
        return view('admin.categories.edit',compact('categories','category','id'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update(Input::get());
        if($category)
        {
            Toastr::success('修改成功!');
            return redirect('admin/category')->with('message', '分类修改成功！');
        }
        else
        {
            Toastr::error('修改失败!');
            return back()->withInput()->with('errors','分类修改失败！');
        }
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete())
        {
            Toastr::success('删除成功!');
            return back()->with('message', '分类删除成功！');
        }
        else
        {
            Toastr::error('删除失败!');
            return back()->withInput()->with('errors','分类删除失败！');
        }
    }
}