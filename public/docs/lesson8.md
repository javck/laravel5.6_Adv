# Localization 本地化

> 說明如何設定本地化，讓應用能夠支援多種語言版本。

[Localization] 官網說明](https://laravel.com/docs/5.6/localization)

##知識點 1.介紹本地化

    Laravel的本地化功能提供一個便利的方式來取得各種語系的字串，讓你能夠輕易的讓應用支持多語系。語系字串被存在 resources/lang資料夾內的檔案裡頭。在這個資料夾內應該有各種所要支持語系的子資料夾：

    //資料夾結構
    /resources
        /lang
            /en
                messages.php
            /es
                messages.php

    所有的語言檔案都回傳對應key的字串，例如：

    <?php

    return [
        'welcome' => 'Welcome to our application'
    ];

##知識點 2.如何設定本地化

    你應用的預設語言被存在 config/app.php 設定檔內。當然，你應該修正這個值以適合應用的需求。如有動態需要，你也能夠使用App類別的靜態方法 setLocale來設定語系，如下所示：

    Route::get('welcome/{locale}', function ($locale) {
        App::setLocale($locale);

        //
    });

    你也能夠設定 "fallback language"，也就是替代語系，以便當啟用的語系並不含所需的翻譯字串。就像是預設語系，替代語系也是被設定於 config/app.php 設定檔內：

    'fallback_locale' => 'en',

    取得當前語系，你也能夠使用App類別的 getLocale() 和 isLocale()，前者可以得知當前預設語系，後者可以確認預設語系是否為所傳入值：

    $locale = App::getLocale();

    if (App::isLocale('en')) {
        //預設語系確實為en
    }

##知識點 3.定義翻譯字串

    使用短 Key
    一般來說，翻譯字串都被寫在存於 resources/lang 資料夾內的檔案中。在該資料夾內應該有數個子資料夾用於存放各語系的文字檔：

    /resources
        /lang
            /en
                messages.php
            /es
                messages.php

    在上面的這兩個messages.php檔案內就是分別存放en和es這兩個語系的翻譯字串，內容範例如下：

    <?php

    // resources/lang/en/messages.php

    return [
        'welcome' => 'Welcome to our application'
    ];

    使用翻譯字串作為 Key
    對於有大量翻譯需求的應用來說，使用短 Key來定義每一個字串不但名字不好取又容易在視圖要取用時產生混淆。因此，Laravel也提供使用預設語系的翻譯文字作為Key的作法。

    儲存翻譯字串的翻譯檔需要以JSON檔的形式存在 resources/lang 資料夾內。例如，假如你的應用需要翻譯成Spanish語系，你應該創造一個 resources/lang/es.json 檔案：
    {
        "I love programming.": "Me encanta programar."
    }

##知識點 4.取得翻譯字串

    你能夠使用 __() 幫助函式來取得翻譯字串，這個 __() 接受該語系檔案的Key來作為第一參數。例如，希望從 resources/lang/messages.php 檔案取得welcome這個Key的對應翻譯字串：

    //使用短Key
    echo __('messages.welcome');

    //使用原語系翻譯文字
    echo __('I love programming.');

    當然假如你要在Blade檔案使用的話，你需要使用{{}}來包覆方法又或是使用 @lang 程式標籤，如下所示：

    {{ __('messages.welcome') }}

    @lang('messages.welcome')

    假如該指定翻譯字串不存在， __()將會回傳翻譯字串的Key。所以，以上面的例子來說當對應的翻譯字串不存在的話，將會回傳 messages.welcome。

##知識點 5.取得翻譯字串，並以傳入的參數替代指定的位置

    如有需要，你能夠在翻譯字串內放入佔位子字串。所有的佔位子字串以:開頭。例如，你能夠在welcome訊息內置入一個佔位子字串如下：

    'welcome' => 'Welcome, :name',

    當取得翻譯字串時如需替換佔位子字串，可傳入一個陣列作為 __()的第二參數：

    echo __('messages.welcome', ['name' => 'dayle']);

    有意思的是，如果佔位子字串為全大寫，那參數傳入後也會以全大寫來替代，否則就只會和子字串相同以首字母大寫而已：

    'welcome' => 'Welcome, :NAME', // Welcome, DAYLE
    'goodbye' => 'Goodbye, :Name', // Goodbye, Dayle

##知識點 6.Pluralization 複數型

    複數型是一個比較複雜的問題，因為不同的語言有眾多複雜的複數型規則。透過使用 | 字元，你能夠區別單數和複數的字串：

    'apples' => 'There is one apple|There are many apples',

    你甚至能夠創造更多更複雜的複數型規則，以支應多種數字範圍的翻譯字串：

    'apples' => '{0} There are none|[1,19] There are some|[20,*] There are many',

    在定義好擁有多個複數選項的翻譯字串，你能夠使用 trans_choice() 來取得所給定count(數量)的翻譯字串。在這個例子中，因為該count(數量)比1大，該翻譯字串的指定複數型會被回傳：

    echo trans_choice('messages.apples', 10);

    你同樣能夠為複數型翻譯字串定義佔位子字串。這些佔位子字串將會被所傳入的陣列作為 trans_choice() 的第三個參數所取代：

    'minutes_ago' => '{1} :value minute ago|[2,*] :value minutes ago',

    echo trans_choice('time.minutes_ago', 5, ['value' => 5]);

    假如你也想要將 trans_choice() 所傳入的count數量顯示在翻譯字串內，你可使用 :count 這個預定佔位子字串：

    'apples' => '{0} There are none|{1} There is one|[2,*] There are :count',
