<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Breadcrumbs, Toastr;
use Validator;
class PublicController extends BaseController
{
  protected $validatorMessages = array(
    'picture.image'   => '文件类型不允许,请上传常规的图片(bmp|gif|jpg|png)文件',
    'picture.max'    => '文件过大,文件大小不得超出2MB',
  );
  public function getUploadpic()
  {
    return view('admin.public.pic');
  }
  public function postUploadpic(Request $request)
  {
    $time=date('Y-m-d');
    if ($request->ajax())
    {
      $json = [
        'status' => 0,
        'info' => '失败原因为：<span class="text_error">不存在待上传的文件</span>',
        'operation' => '上传图片',
        'url' => '',
      ];
      if ($request->hasFile('picture'))
      {
        $file = $request->file('picture');
        $data = $request->all();
        $rules = [
          //'picture'    => 'image|max:2048',
          'picture' => 'max:2048',
        ];
        $messages = $this->validatorMessages;
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes())
        {
          $realPath = $file->getRealPath();
          $destPath = 'uploads/img/';
          $savePath = $destPath . '' . date('Y-m-d', time());
          is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
          $name = $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          //----------
          // 因本人生产服务器禁用掉fileinfo扩展特性，故无法通过框架自身Validation 'image'表单验证文件MIME类型，如果您的服务器开启fileinfo扩展可直接使用 'picture' => 'image|max:2048'验证规则
          // 这里根据客户端上传文件扩展名来验证，存在一定的安全隐患，请将上传目录执行权限去掉
          //----------
          $check_ext = in_array($ext, array('jpg', 'png', 'gif', 'bmp'), true);
          if ($check_ext)
          {
            $uniqid = uniqid() . '_' . date('s');
            $oFile = $uniqid . 'o.' . $ext;
            $rFile = $uniqid . 'rw300.' . $ext;
            $fullfilename= $savePath.'/'.$oFile;
            //$fullfilename = url('') . '/' . $savePath . '/' . $oFile;  //原始完整路径
            if ($file->isValid())
            {
              $uploadSuccess = $file->move($savePath, $oFile);  //移动文件
//              $user = user('object');
              $file = [
                'original_file_name' => $name,  //添加文件操作信息，原始文件名
                'uploaded_full_file_name' => $fullfilename,  //添加文件操作信息，上传之后存储在服务器上的原始完整路径
              ];
              //event(new UserUpload(user('object'), $file));  //触发上传文件事件
              $oFilePath = $savePath . '/' . $oFile;
              $rFilePath = $savePath . '/' . $rFile;
              $json = array_replace($json, ['status' => 1, 'info' => $fullfilename]);
            }
            else
            {
              $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件校验失败</span>']);
            }
          }
          else
          {
            $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件类型不允许,请上传常规的图片（bmp|gif|jpg|png）文件</span>']);
          }
        }
        else
        {
          $json = format_json_message($validator->messages(), $json);
        }
      }
      return response()->json($json);
    }
    else
    {
      return 'err';
      //非ajax请求抛出异常
      //return view('back.exceptions.jump', ['exception' => '非法请求，不予处理！']);
    }
  }
  public function getUploadfile()
  {
    return view('admin.public.file');
  }
  public function postUploadFile(Request $request)
  {
    if ($request->ajax())
    {
      $json = [
          'status' => 0,
          'info' => '失败原因为：<span class="text_error">不存在待上传的文件</span>',
          'operation' => '上传文件',
          'url' => '',
      ];
      if ($request->hasFile('picture'))
      {
        $file = $request->file('picture');
        $data = $request->all();
        $rules = [
          //'picture'    => 'image|max:2048',
          //'picture' => 'max:2048',
        ];
        $messages = $this->validatorMessages;
        $validator = Validator::make($data, $messages);
        if ($validator->passes())
        {
          $realPath = $file->getRealPath();
          $destPath = 'uploads/file/';
          $savePath = $destPath . '' . date('Y-m-d', time());
          //如果不存在则创建目录
          is_dir($savePath) || mkdir($savePath);
          $name = $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          $check_ext = in_array($ext, array('rar','txt','zip','tar','tar.gz','pdf','chm','doc','xls','docx','exe'), true);
          if ($check_ext)
          {
            $uniqid = uniqid() . '_' . date('s');
            $oFile = $uniqid . 'o.' . $ext;
            $rFile = $uniqid . 'rw300.' . $ext;
            $fullfilename= $savePath.'/'.$oFile;
            if ($file->isValid())
            {
              //移动文件
              $uploadSuccess = $file->move($savePath, $oFile);
              //$user = user('object');
              $file =
              [
                  //添加文件操作信息，原始文件名
                  'original_file_name' => $name,
                  //添加文件操作信息，上传之后存储在服务器上的原始完整路径
                  'uploaded_full_file_name' => $fullfilename,
              ];
              //event(new UserUpload(user('object'), $file));  //触发上传文件事件
              $oFilePath = $savePath . '/' . $oFile;
              $rFilePath = $savePath . '/' . $rFile;
              $json = array_replace($json, ['status' => 1, 'info' => $fullfilename]);
            }
            else
            {
              $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件校验失败</span>']);
            }
          }
          else
          {
            $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件类型不允许</span>']);
          }
        }
        else
        {
          $json = format_json_message($validator->messages(), $json);
        }
      }
      return response()->json($json);
    }
    else
    {
      return 'err';
      //非ajax请求抛出异常
      //return view('back.exceptions.jump', ['exception' => '非法请求，不予处理！']);
    }
  }
}