# Compiling Assets 如何將 js.css 等資源檔案打包成單一檔案

> 這一節說明如何將 js.css 等資源檔案打包成單一檔案，目的在於減少檔案的請求次數，以優化網頁效能。

    Laravel Mix 提供了一個便利的API來定義網頁打包作業，讓你輕鬆的處理你的網頁應用裡所使用的網頁資源，如javascript和css。透過簡單的方法串連呼叫，你能夠流暢的定義你的資源處理流。 如下例所示：

    mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');

    假如你曾經被Webpack和資源編譯給弄的頭昏腦脹，你將會愛上Laravel Mix。不過，你不需要在開發應用的時候去使用它。當然，你能夠自由的選用任何的資源處理流工具，甚至是完全不用。

    ##知識點 1.如何安裝?

        在你觸發Mix之前，首先你需要有Node.js，並確認NPM有安裝在你的電腦上面。可以透過以下指令來檢查是否擁有...

        node -v
        npm -v

        關於Node.js安裝，可以參考這個網頁(http://www.runoob.com/nodejs/nodejs-install-setup.html)
        至於NPM，Node.js在v0.63版本之後就已經內建NPM了。

        確保環境已經準備完成，最後剩下Laravel Mix的安裝。在一個新安裝的Laravel專案裡頭，你可以在根目錄找到一個package.json檔案。預設的package.json檔案包含了所有你需要的。就把它想成是composer.json檔案，除了它是定義Node依賴檔案而不是PHP。如需安裝依賴，你只需要開啟Terminal，在專案目錄執行以下指令：

        npm install

##知識點 2.運行 Mix

    Mix是一個最高層的Webpack設定層，所以要跑你的Mix工作只需要去執行某一個被包含在預設Laravel裡的package.json檔內的NPM腳本

    //執行所有Mix
    npm run dev

    //執行所有Mix並將輸入檔進行壓縮
    npm run production

    //觀察資源檔的變化
    npm run watch

    以上指令將會不斷的在你的Terminal執行，並追蹤關聯檔案的變化。一旦出現改變，Webpack將會自動的重新編譯資源檔。

    在某些環境，當關聯檔案變化卻不會自動編譯。在這個情況發生時，可以改用watch-poll命令。
    npm run watch-poll

##知識點 3.處理一般的樣式表

    假如你想要把多個一般樣式表壓縮成單檔，你可以使用styles()，如下例所示將vendor資料夾的normalize.css和videojs.css壓縮後生成public/css/all.css。

    //webpack.mix.js
    mix.styles([
        'public/css/vendor/normalize.css',
        'public/css/vendor/videojs.css'
    ], 'public/css/all.css');

##知識點 4.處理一般的 js 檔案

    假如你想要把多個js檔案壓縮成單檔，你可以使用scripts()，如下例所示將public/js資料夾的admin.js和dashboard.js壓縮後生成public/js/all.js。

    //webpack.mix.js
    mix.scripts([
        'public/js/admin.js',
        'public/js/dashboard.js'
    ], 'public/js/all.js');

##知識點 5.複製圖片或一般檔案

    Copying Files & Directories
    copy()用於複製檔案和資料夾到新的位置去。這在處理特定位於node_modules資料夾的資源，將之重新放至於public資料夾時非常有用。如下例：

    //webpack.mix.js
    mix.copy('node_modules/foo/bar.css', 'public/css/bar.css');

    當需要複製一個資料夾，copy()將會移除該資料夾的深層結構。如需保存其深層結構，只需要改用copyDirectory()即可，如下例：

    //webpack.mix.js
    mix.copyDirectory('resources/img', 'public/img');
