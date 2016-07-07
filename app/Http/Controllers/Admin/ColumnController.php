<?php
namespace App\Http\Controllers\Admin;
use App\Models\Column;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColumnRequest;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;
use Breadcrumbs, Toastr;
class ColumnController extends BaseController
{
	public function index()
	{
		return view('admin.column.index');
	}
	public function create(Request $input)
	{
		$data = $input->only('parent_id');
		$columns = $this->getCategoryOptions();
		return view('admin.column.create', compact('data', 'columns'));
	}
	public function store(ColumnRequest $input)
	{
		$column = Column::create($input->all());
		if($column)
		{
			Toastr::success('栏目添加成功!');
			return redirect()->route('admin.column.show', [ $column->getKey() ]);
		}
		else
		{
			Toastr::error('栏目添加失败!');
			return back()->withInput()->with('errors','标签更新失败！');
		}
	}
	public function show($id)
	{
		$column = Column::findOrFail($id);
		return view('admin.column.show', compact('column'));
	}
	public function edit($id)
	{
		$column = Column::findOrFail($id);
		$columns = $this->getCategoryOptions($column);
		return view('admin.column.edit', compact('column', 'columns'));
	}
	public function update(ColumnRequest $input, $id)
	{
		$column = Column::findOrFail($id);
		$column->update($input->all());
		if($column)
		{
			Toastr::success('栏目修改成功!');
			return redirect()->route('admin.column.show', [ $id ])->with('success', '栏目修改成功!');
		}
		else
		{
			Toastr::error('栏目修改失败!');
			return back()->withInput()->with('errors','栏目修改失败！');
		}
	}
	protected function makeOptions(Collection $items)
    {
        $options = [ '' => 'Root' ];
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