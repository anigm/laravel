<?php
namespace App\Http\Requests\Admin;
use App\Http\Requests\Admin\Request;
class ColumnRequest extends Request
{
	public function authorize()
	{
		return true;
	}
	public function rules()
	{
		return [
			'title' => 'required',
            'parent_id' => 'exists:columns,id',
		];
	}
}