<?php
namespace App\Http\Requests\Admin\Upload;
use App\Http\Requests\Admin\Request;
class UploadNewFolderRequest extends Request
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
      'folder' => 'required',
      'new_folder' => 'required',
    ];
  }
}