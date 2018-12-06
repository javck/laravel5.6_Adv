# File Upload 檔案上傳

> 這一節說明如何實作檔案上傳功能，包含一般檔案和圖片檔案。如希望保護檔案，可以改存到 storage 資料夾內。

##知識點 1.安裝 Intervention Image 套件

    因為處理圖片處理需要安裝這個套件，請利用Composer來安裝，指令如下：

    composer require intervention/image

    關於此套件的介紹，請參考網址：http://image.intervention.io/

##知識點 2.準備可以上傳檔案的檔案輸入項與表單

    這裡示範使用Form套件來建立表單和輸入項，如果需要了解Form套件的相關資訊，請參考以下這裡。
    (Laravel Collective)[https://laravelcollective.com/docs/5.4/html]

    {{ Form::open(['action'=>'ElementController@store','role'=>'form','files'=>true]) }} //要加上files屬性
    //表單內容
        <!-- picUpload 圖片上傳 -->
        @if (isset($errors) and $errors->has('picUpload'))
            <div class="form-group has-error">
                {{ Form::label('picUpload','圖片上傳') }}&nbsp;&nbsp;{{ Form::label('picUpload',$errors->first('picUpload'),['class'=>'text-danger control-label','for'=>'inputError']) }}<br>
                {{ Form::file('picUpload[]',['multiple'=>true]) }}
            </div>
        @else
            <div class="form-group">
                {{ Form::label('picUpload','圖片上傳') }}<br>
                {{ Form::file('picUpload[]',['multiple'=>true]) }}
            </div>
        @endif
    {{ Form::close() }}

##知識點 3.如何在控制器函式處理圖片上傳

    //如果有圖檔上傳...
    if (isset($inputs['picUpload'])) {
            $fileNames = PublicUtil::picsUpload($request); //圖片上傳處理
            //pic輸入項處理
            if (isset($fileNames)) {
                $inputs['pic'] = '';
                foreach ($fileNames as $value) {
                    if (strlen($inputs['pic']) > 0) { //支援多檔上傳處理
                        $inputs['pic'] = $inputs['pic'] . ',';
                    }
                    $inputs['pic'] = $inputs['pic'] . 'images/upload/' . $value;
                }

            } else {
                //送出flash訊息
                $request->session()->flash('error', '圖片上傳失敗!');
            }
        } else {

        }
    }

    PS:裡頭有使用到PublicUtil函式庫，使用前記得要匯入PublicUtil.php

##知識點 4.如何確保所上傳的檔案真的是某特定檔案

    1.如需確認所上傳檔案是否為圖片，可以在validation的rules加上image

    2.如需確認所需支援的副檔名，可以在validation的rules加上以下規則格式：

    'pics' => 'mimes:jpeg,bmp,png' //可接受的副檔名需為jpeg.bmp.png

##知識點 5.如何在控制器函式處理檔案上傳

    //附件处理
    if (isset($inputs['attachmentUpload']) and $inputs['attachmentUpload'][0] != null) {
        $fileNames = PublicUtil::filesUpload($request, 'attachmentUpload',false);
        if (isset($fileNames) && count($fileNames) > 0) {
            $inputs['attachment'] = implode(',', $fileNames);
        }
    }

    PS0:請在想要儲存的資料夾內新增files/upload子資料夾，並開放存取權限，資料夾包含了storage/app/public以及public。
    PS1:裡頭有使用到PublicUtil函式庫，使用前記得要匯入PublicUtil.php
    PS2:如有使用到Input這個類別，需要在 config/app.php的aliases加入以下程式碼：

        ....
        'Input' => Illuminate\Support\Facades\Input::class,
        ....

        並且要加入use Input;

##知識點 6.如果存在 storage/app/public 資料夾，該如何取用?

    可使用storage_path()來取得storage路徑，接著使用response的download方法，如下範例所示：

    $path = storage_path() . '/app/public/files/upload/1.pdf';
    return response()->download($path);
