<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Support\Facades\Input;
use Breadcrumbs, Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Image;
use Config;
class SystemController extends BaseController
{
    public function base()
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $file = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        foreach ($file as $key=>$value)
        {
            $datas[]=explode('=',$value);
        }
        return view('admin.system.base',compact('datas'));
    }
    public function edit()
    {
        $input=Input::get();
        foreach ($input as $key=>$value)
        {
            $inputs[]=$value;
        }
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $file = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        foreach ($file as $key=>$value)
        {
            $datas[]=explode('=',$value);
        }
        if($datas)
        {
            $data=array();
            foreach($datas as $key=>$value)
            {
                $data[]=$value[0].'='.$inputs[$key+1];
            }
        }
        $content = implode("\n",$data);
        $txt=\File::put($envPath, $content);
        if($txt)
        {
            Toastr::success('修改成功!');
            return redirect('admin/system/base')->with('message', '配置修改成功！');
        }
        else
        {
            Toastr::success('修改失败!');
            return redirect('admin/system/base')->with('message', '配置修改失败！');
        }
    }
    public function test()
    {
//APP_ENV=local
//APP_DEBUG=true
//APP_KEY=ptqZuq1sdTThZwBLeK1B9s1kJfZHatEA
//APP_URL=http://127.0.0.1
//timezone=Asia/Shanghai
//locale=zh-CN
//fallback_locale=en
//CACHE_DRIVER=file
//SESSION_DRIVER=file
//QUEUE_DRIVER=sync
//REDIS_HOST=localhost
//REDIS_PASSWORD=nullsdfsdf
//REDIS_PORT=6379
//MAIL_DRIVER=smtp
//MAIL_HOST=smtp.163.com
//MAIL_PORT=25
//MAIL_USERNAME=15026857547@163.com
//MAIL_PASSWORD=3985741
//MAIL_ENCRYPTION=null
//UPLOAD_FULL_SIZE=\home\wwwroot\cms\public\uploads\full_size\
//UPLOAD_ICON_SIZE=\home\wwwroot\cms\public\uploads\icon_size\
//myedit=mkdown
//page=5
//DB_HOST=localhost
//DB_DATABASE=homestead
//DB_USERNAME=root
//DB_PASSWORD=root
    }
      //备份
//    public function base()
//    {
//        $storage=storage_path('base.json');
//        if(is_file($storage))
//        {
//            $file=file_get_contents($storage);
//            $datas=json_decode($file);
//        }
//        else
//        {
//            $file=array(
//                'url'=>array(
//                    '站点地址'=>'http://192.168.0.144'
//                ),
//                'lanage'=>array(
//                    '语言'=>'zh'
//                ),
//                'timezeno'=>array(
//                    '时区'=>'utf'
//                ),
//                'picpath'=>array(
//                    '图片路径'=>'hrelf'
//                ),
//                'debug'=>array(
//                    '调试模式'=>true
//                ),
//            );
//            file_put_contents($storage,json_encode($file));
//            $datas=$file;
//        }
//        return view('admin.system.base',compact('datas'));
//    }
//    public function del(Request $request)
//    {
//        $file=storage_path('base.json');
//        $result = @unlink ($file);
//        if($result)
//        {
//            $data=array(
//                'status'=>1,
//                'success'=>'删除成功'
//            );
//        }
//        else
//        {
//            $data=array(
//                'status'=>0,
//                'success'=>'删除失败'
//            );
//        }
//        return json_encode($data);
//    }

//    public function edit()
//    {
//        $input=Input::get();
//        foreach ($input as $key=>$value)
//        {
//            $inputs[]=$value;
//        }
//        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
//        $file = collect(file($envPath, FILE_IGNORE_NEW_LINES));
//        foreach ($file as $key=>$value)
//        {
//            $datas[]=explode('=',$value);
//        }
//        if($datas)
//        {
//            $data=array();
//            foreach($datas as $key=>$value)
//            {
//                $data[$key][0]=$value[0];
//                $data[$key][1]=$inputs[$key+1];
//            }
//        }
//        foreach($data as $key=>$value)
//        {
//            $json[]=$value[0].'=>'.$value[1];
//        }
//        print_r($json);
//        exit;
//        print_r($data);
//        exit;
//        $content = implode("",$data);
//        //$content = implode($data, "\n");
//        print_r($content);
//        exit;
//
//        $content = implode($data->toArray(), "\n");
//        \File::put($envPath, $content);
//
//    }
}
