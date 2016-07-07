<?php
namespace App\Http\Controllers\Admin;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Breadcrumbs, Toastr;
use Validator;
class MailController extends BaseController
{
  protected $validatorMessages = array(
    'picture.image'   => '文件类型不允许,请上传常规的图片(bmp|gif|jpg|png)文件',
    'picture.max'    => '文件过大,文件大小不得超出2MB',
  );
  public function seed()
  {
    $description = Input::get('description');
    $flag = Mail::raw($description, function ($message)
    {
      $title = Input::get('title');
      $emailto = Input::get('emailto');
      $to = $emailto;
      $message ->to($to)->subject($title);
    });
    if ($flag)
    {
      Toastr::success('发送邮件成功，请查收!');
      return redirect('admin/home')->with('message', '发送邮件成功，请查收！');
    }
    else
    {
      Toastr::error('发送邮件失败，请查收!');
      return redirect('admin/home')->with('message', '发送邮件失败，请查收！');
    }
  }
  public function index()
  {
    $name = '新邮件';
    $flag = Mail::send('admin.email.index', ['name' => $name], function ($message)
    {
      $to = '160294913@qq.com';
      $message->to($to)->subject('测试邮件');
    });
    if ($flag)
    {
      echo '发送邮件成功，请查收！';
    }
    else
    {
      echo '发送邮件失败，请重试！';
    }
  }
  public function getUpload()
  {
    return view('admin.upload.form');
  }
  public function postUpload(Request $request)
  {
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
            'picture' => 'max:2048',
        ];
        $messages = $this->validatorMessages;
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes())
        {
          $realPath = $file->getRealPath();
          $destPath = 'uploads/file/';
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
}