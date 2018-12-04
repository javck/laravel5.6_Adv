<?php namespace App\Http\Model;


use DB;
use Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Carbon\Carbon;
use Session;
use Log;

class PublicUtil
{

    /*
     *  生成隨機的檔名
     *  $qty 可傳入檔名的長度
     */
    public static function randomFileName($qty)
    {
        $ran_chars = '1234567890abcdefghijklmnopqrstuvwxyz';
        $ran_string = '';
        for ($i = 0; $i < $qty; $i++) {
            $ran_string .= $ran_chars[rand(0, 35)];
        }
        return $ran_string;
    }

    /*
		上傳多個圖檔，壓縮圖片檔案，並在本地端移動到upload資料夾，並複製一份到full/upload資料夾
	    回傳新檔名陣列
		$request 使用的request方法
		$picName 圖片欄位名稱
		$width 寬度
		$height 高度
		$isResize 是否要resize
     */
    public static function picsUpload(Request $request, $picsName = 'picUpload', $folderName = 'images', $width = 350, $height = 200, $isResize = false)
    {
		// 取得檔案輸入項的內容
        $files = Input::file($picsName);
	    // 計算檔案數量
        $file_count = count($files);
	    // 用來累積已經上傳的檔案數
        $uploadcount = 0;
        $fileNames = array();
        foreach ($files as $file) {
            $destinationPath = $folderName . '/upload';
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);//建立upload資料夾
            }
            $extension = $file->getClientOriginalExtension(); // 取得檔案的副檔名
            $fileName = PublicUtil::randomFileName(12) . '.' . $extension; // renameing image

            //複製一份到images/upload/full資料夾
            if ($isResize) {
                $destinationPath2 = $folderName . '/upload/full';
                if (!file_exists($destinationPath2)) {
                    mkdir($destinationPath2, 777, true); //建立full資料夾
                }
                $_publicPath = public_path($destinationPath2 . '/' . $fileName);
                Image::make($file->getRealPath())->save($_publicPath);
            }

            $_publicPath = public_path($destinationPath);
            $file->move($_publicPath, $fileName); // uploading file to given path
            
 			//重新調整原圖大小
            if ($isResize) {
                Image::make($_publicPath . '/' . $fileName)->resize($width, $height)->save();//上傳後規定的大小
            }

            $fileNames[] = $fileName;
            $uploadcount++;
        }
        if ($uploadcount == $file_count) {
            return $fileNames;
        } else {
            return null;
        }
    }

    /*
		上傳多個檔案，並在本地端移動到upload資料夾
		$request 使用的request方法
        $fieldName 圖片欄位名稱
        $isStorage 是否儲存在storage/app/pulbic資料夾內，若否就存在public資料夾
     */
    public static function filesUpload(Request $request, $fieldName = 'files_upload', $isStorage = false)
    {
		// getting all of the post data
        $files = Input::file($fieldName);
	    // Making counting of uploaded images
        $file_count = count($files);
	    // start count how many uploaded
        $uploadcount = 0;
        $fileNames = array();
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = PublicUtil::randomFileName(12) . '.' . $extension; // renameing image
            if ($isStorage) {
                //存到storage/app/public資料夾
                Storage::put('public/files/upload/' . $fileName, file_get_contents($file->getRealPath()));
            } else {
                //存到public資料夾
                $file->move('files/upload', $fileName); // uploading file to given path
            }

            $fileNames[] = 'upload/' . $fileName;
            $uploadcount++;
        }
        if ($uploadcount == $file_count) {
            return $fileNames;
        } else {
            return null;
        }
    }
}
