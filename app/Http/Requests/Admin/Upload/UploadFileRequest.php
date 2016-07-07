<?php
namespace App\Http\Requests\Admin\Upload;
use App\Http\Requests\Admin\Request;
class UploadFileRequest extends Request
{
  public function authorize()
  {
    return true;
  }
  public function rules()
  {
    return [
      'file' => 'required',
      'folder' => 'required',
    ];
  }
}