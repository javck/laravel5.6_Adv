# Validation 表單驗證

Laravel provides several different approaches to validate your application's incoming data. By default, Laravel's base controller class uses a ValidatesRequests trait which provides a convenient method to validate incoming HTTP request with a variety of powerful validation rules.

> Laravel 提供多個不同的方式來驗證你應用所傳來的資料。預設上 Laravel 的基礎 Controller 類別使用 ValidateRequests trait，它提供一個便利的方法和多個強大的驗證規則來驗證 HTTP 請求， 這一堂課將說明如何針對表單的欄位進行驗證。

[Validation] 官網說明](https://laravel.com/docs/5.6/validation)

##知識點 1.快速實作 Laravel Validation

    To learn about Laravel's powerful validation features, let's look at a complete example of validating a form and displaying the error messages back to the user.

    想要了解Laravel的強大驗證功能，先來看看一個驗證表單，並顯示錯誤訊息給使用者看的例子

    ###定義一個路由
    首先，在 routes/web.php 檔案定義表單相關的路由，如下範例：

        Route::get('item/create', 'ItemController@create');
        Route::post('item', 'ItemController@store');

    ###建立一個Controller
    接下來，確保有一個控制器來處理這些路由，現在先確保有store()即可，等會要撰寫。

    <?php
    ...

    class ItemController extends Controller
    {
        public function store(Request $request)
        {
            // Validate and store the item...
        }
    }

    ###寫驗證的邏輯
    現在準備要在store()寫驗證邏輯。我們將使用由 Illuminate\Http\Request 物件提供的驗證方法。假如驗證規則通過了，你的store()處理程式將會正常執行;但是，假如驗證失敗了，一個例外將會被丟出，同時對應的錯誤回應將會自動地被送回給使用者。以傳統的HTTP請求為例，將會生成一個轉址的回應。假如是一個AJAX請求則會發出JSON回應。

    為了更好的理解驗證方法，來看看store()可以怎麼做?

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:items|max:255',
            'price' => 'required',
        ]);

        // The item is valid...
    }

    如你所見，我們傳入所需要的驗證規則到驗證方法。再一次，假如驗證失敗了，對應的回應將會自動地被生成。假如驗證通過了，我們的Controller將會繼續被正常執行。

    ###顯示驗證錯誤
    所以，假如進來的請求參數並未通過所設定的驗證規則?如先前所提，Laravel將把使用者頁面自動轉址回到先前的位置，並且所有的驗證錯誤將自動的放入session內。
    我們不需要綁定錯誤訊息到GET路由的視圖，因為Laravel將會檢查session資料的錯誤。$errors變數將會是 Illuminate\Support\MessageBag 的一個實例。

    $errors變數是透過 Illuminate\View\Middleware\ShareErrorsFromSession 中介層來綁定到視圖上，它是由web中介層群組所提供。當採用此中介層，在你的視圖上就必然會有一個$errors變數。這表示此變數是一定存在的，你可以安全地去取用它。

    所以，在下面的例子，當驗證失敗後，使用者將會被轉址到Controller的create()，並得以顯示錯誤訊息到視圖上：

    <!-- /resources/views/post/create.blade.php -->

    <h1>建立一個商品</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error }}</li>
                @endforeach

            </ul>
        </div>
    @endif

    <!-- 以下寫POST表單 -->


    PS：非必填欄位需特別注意!
    Laravel預設包含 TrimStrings 和 ConvertEmptyStringsToNull 中介層到應用的全域中介層堆疊內。這些中介層被列在 App\Http\Kernel 類別內。因此，你常需要標注你的非必填請求欄位是 nullable，假如你不想要驗證器認為這些欄位的空值是錯誤的話。例如：

    $request->validate([
        'name' => 'required|unique:items|max:255',
        'price' => 'required',
        'publish_at' => 'nullable|date',
    ]);

    在上面的例子， publish_at 欄位可能為空值，表示立刻上線。假如 nullable 修飾子沒有被加到規則定義內，驗證器將會認為它是一個無效的日期，因為空值而報錯。

    PS2：針對AJAX請求的驗證！
    當在AJAX請求使用驗證方法，Laravel將不會生成轉址回應。相對的，Laravel產生包含了所有驗證錯誤的JSON回應。這個JSON回應將會帶422的HTTP狀態碼。

##知識點 2.驗證希望停止在第一次錯誤的位置

    有時候你會希望當有一個驗證規則失敗後就不再執行其後的驗證規則。為此，應加入一個bail規則。

    $request->validate([
        'title' => 'bail|required|unique:posts|max:255',
        'body' => 'required',
    ]);

    比如以上的例子，假如title屬性的unique規則失敗後，max規則將不會被確認，另外規則將會依照被分配的順序來執行驗證。

##知識點 3.巢狀屬性的處理

    假如你的HTTP請求包含了巢狀參數，你將使用".點語法"來指定針對它們的驗證規則，如下例：

    //_postForm.blade.php
    {!! Form::text('author[name]', null, [] !!}
    {!! Form::text('author[description]', null, [] )) !!}

    //PostController裡的store()
    $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author.name' => 'required',
        'author.description' => 'required',
    ]);
