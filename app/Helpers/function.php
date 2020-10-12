<?php
// Đây là Fuction Upload ảnh 
if(!function_exists('upload_image'))
{
    function upload_image($file , $folder = '' , array $extend =array() )
    {
        $code =1;

        $baseFilename = public_path().'/uploads/'.$_FILES[$file]['name'];

        $info = new SplFileInfo($baseFilename);

        //Đuôi file image

        $ext =strtolower($info->getExtension());

        //Kiểm Tra định dạng file 

        if(!$extend)
        {
            $extend = ['png','jpg','jpeg'];
        }

        if(!in_array($ext,$extend))
        {
            return $data['code']=0;
        }

        //Tên File Mới
        $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename = date('Y-m-d__').str_slug($nameFile) . '.' . $ext;

        //Thư Mục dể upload
        $path = public_path().'/uploads/'.date('Y/m/d/');

        if($folder)
        {
            $path = public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');
        }

        if(!\File::exists($path))
        {
            mkdir($path,0777,true);
        }

        //Di chuyển File vào thư mục uploads

        move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);
        $data = [
            'name'              => $filename,
            'code'              => $code,
            'path_img'          => 'uploads/'.$filename
        ];
        return $data;
    }
}
if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/images/default.jpg';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
if (!function_exists('get_data_user')) 
{
    function get_data_user($type, $field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}
