# Laravel 關聯式資料庫存取

> 說明 Laravel 自帶的 Eloquent，如何進行一對一.一對多.多對多等 CRUD 操作

[Laravel Socialite 官網說明](https://laravel.com/docs/5.5/eloquent-relationships)

## 專案表格結構，可以參考圖片 model_relations.jpg

## 測試網址

    http://localhost/laravel5.6_Adv/public/backend/item/1
    http://localhost/laravel5.6_Adv/public/backend/cgy/1
    http://localhost/laravel5.6_Adv/public/backend/user/1
    http://localhost/laravel5.6_Adv/public/backend/order/1

## 提醒

以下寫法均採用語法糖，限定外鍵欄位名稱需採用預設格式，例如 user_id . cgy_id 等等。

##知識點 1.何謂一對一

    每個Model實例只屬於/擁有另一個Model實例，例如每個商品(Item)只屬於一個分類(Cgy)。

    表單設計上，會增加所對應Model的流水號，作為外鍵。舉例來說，要說明某商品屬於哪個類別，會在商品表格上加上cgy_id這個欄位。

    如果需要建立商品對分類的關係，可以在Item的Model類別加入類似以下function

    class Item extends Model
    {
        ....

        //此商品"屬於"哪個類別
        public function cgy(){
            return $this->belongsTo('App\Cgy'); //傳入關聯Model的路徑與名稱，產生cgy()和cgy魔法屬性
        }
    }

    用法：$item->cgy

    反過來說，"假設"一個分類只有一個商品

    class Cgy extends Model
    {
        ....
        //此分類擁有哪一個商品
        public function item(){
            return $this->hasOne('App\Item');
        }
    }

##知識點 2.何謂一對多

    每個Model實例屬於/擁有多個Model實例，例如每個使用者(User)))擁有多筆訂單(Order)。

    表單設計上，會在另一個對應表單增加自己的流水號，作為外鍵。舉例來說，要說明使用者擁有哪個訂單，會在訂單表格上加上user_id這個欄位。

    如果需要建立使用者對訂單的關係，可以在User的Model類別加入類似以下function

    class User extends Model
    {
        ....

        //此用戶擁有哪些訂單
        public function orders(){
            return $this->hasMany('App\Order');
        }
    }

    用法：$user->orders

##知識點 3.何謂多對多

    類似一對多，每個Model實例屬於/擁有多個Model實例，但反過來也是相同的一對多關係。例如每個商品(Item))))屬於多筆訂單(Order)，但每筆訂單也擁有多個商品。

    表單設計上，會建立一個新的表單作為pivot，來紀錄多對多關係。欄位。舉例來說，商品和訂單的多對多關係就會建立名為item_order的表格，依照字母順序來排列。

    class Order extends Model
    {
        ....
        //此訂單屬於哪些商品
        public function items(){
            return $this->belongsToMany('App\Item')->withPivot(['qty','created_at'])->withTimestamps();
        }

    }

###注意：

    1.withPivot()說明 pivot 表格有哪些會使用到的額外欄位
    2.withTimestamps()通知 Laravel 要維護 pivot 表格的 created_at 和 updated_at 這兩個時間欄位

##知識點 4.如何取得多對多 pivot 表格的額外資料

    pivot表格除了紀錄對應Model雙方的流水號之外，也能夠儲存額外欄位資訊，取得方式如下：

    $order->items[0]->pivot->qty //取得訂單擁有的第一個商品，與其數量

##知識點 5.如何加入多對多資料

    語法：attach(對應Model流水號,[pivot表格額外欄位資訊])
    $order->items()->attach($item_id);
    $order->items()->attach($item_id, ['qty' => $faker->numberBetween($min = 1, $max = 10)]);

##知識點 6.如何移除多對多資料

    $order->items()->detach($item_id); //移除與流水號為$item_id商品的關係
    $order->items()->detach(); //移除所有商品的關係

##知識點 7.如何同步多對多資料

    $order->items()->sync([10=>['qty'=>98], 2=>['qty'=>97], 3=>['qty'=>96]]); //將該訂單的商品關係同步為此狀態

##知識點 8.關聯查詢

    $cgys = Cgy::has('items')->get(); //找出分類中至少有一個商品的
    $cgys = Cgy::has('items','>=',5)->get(); //找出分類中至少有5個以上商品的

    $cgys = Cgy::whereHas('items', function ($query) { //找出分類中至少擁有商品價格為8000以上的
        $query->where('price', '>', 8000);
    })->get();

##知識點 9.如何在 Migration 內加入外鍵關聯限制

    加入關聯限制，可使用foreign()，如下範例：

    class CreateOrdersTable extends Migration

{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            ...
            $table->integer('user_id')->unsigned()->index();  //unsigned()表示此欄位不接受負數，index()表示此欄位加入索引
            $table->foreign('user_id')->references('id')->on('users'); //語意為user_id為外鍵，參考到一個叫id的欄位，位置在users表格內
            ...
        });
    }

    移除關聯限制，可使用dropForeign()，如下範例：

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);  //移除user_id欄位的外鍵關係，需先於移除表格
        });
        Schema::dropIfExists('orders');
    }

##知識點 10(Option).Eager Loading? Lazy Loading?

    指的是在 Parent Model 查詢的時候就一併查詢其他關聯的 Model，預設是 lazy loading，也就是當初次使用該屬性時才進行查詢

    Eager Loading範例如下：
    $books = App\Book::with('author')->get(); //一併先查詢關聯的Author資料，如有多個，改傳入陣列到with()內

    foreach ($books as $book) {
        echo $book->author->name;
    }

    Nested Eager Loading：
    一併往下查詢到再下一層的Model，比如同時查詢該書的作者的聯絡單
    $books = App\Book::with('author.contacts')->get();

    Eager Loading限定欄位：
    $users = App\Book::with('author:id,name')->get(); //一併先查詢關聯的Author資料，但只先取id和name欄位

    Constraints Eager Loading:
    //一併查詢posts表格的時候，同時對posts表格查詢加入title欄位內有first字樣的條件
    $users = App\User::with(['posts' => function ($query) {
        $query->where('title', 'like', '%first%');
    }])->get();
