<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\ServiceException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function upload()
    {
        $data = validtor([
            'type' => 'in:image,video,file'
        ], 'POST');
        if ($data['type'] == 'image') {
            $save_path = '/storage/image/';
        } elseif ($data['type'] == 'video') {
            $save_path = '/storage/video/';
        } elseif ($data['type'] == 'file') {
            $save_path = '/storage/file/';
        } else {
            $save_path = '/storage/other/';
        }
        $fileCharater = \request()->file('file');
        if (empty($fileCharater)) {
            throw new ServiceException('上传文件为空');
        }
        if ($fileCharater->isValid()) { //括号里面的是必须加的哦
            //如果括号里面的不加上的话，下面的方法也无法调用的
            //获取文件的扩展名
            $ext = $fileCharater->getClientOriginalExtension();
            //获取文件的绝对路径
            $path = $fileCharater->getRealPath();
            $origin_filename = $fileCharater->getClientOriginalName();
            $filename = date('Ymdhis') . random_int(1000, 9999) . '.' . $ext;      //定义文件名
            //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
            $res = \Storage::disk('image')->put($filename, file_get_contents($path));
            if (!$res) {
                jsonResponse(null, 1000, '文件上传失败');
            }
            $url = \request()->getSchemeAndHttpHost() . $save_path . $filename;
            $des_path = $save_path . $filename;

            return jsonResponse(['file_url' => $url, 'file_name' => $origin_filename, 'path' => $des_path]);
        } else {
            return jsonResponse(null, 1001, '文件不可用');
        }

    }
}
