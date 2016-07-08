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
        $storage=storage_path('base.json');
        if(is_file($storage))
        {
            $file=file_get_contents($storage);
        }
        else
        {
            $file=array(
                '站点url'=>'http://192.168.0.144'
            );
            file_put_contents($storage,json_encode($file));
        }
        $datas=json_decode($file);
        return view('admin.system.base',compact('datas'));
    }
}
